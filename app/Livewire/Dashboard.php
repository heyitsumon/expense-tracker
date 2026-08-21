<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Income;
use App\Models\IncomeCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public const CURRENCY_SYMBOLS = [
        'BDT' => '৳',
        'INR' => '₹',
        'USD' => '$',
        'EUR' => '€',
        'GBP' => '£',
    ];
    public string $filter = 'all';

    public bool $showTransactionModal = false;

    public string $transactionType = 'income';

    public string $amount = '';

    public ?int $categoryId = null;

    public string $date = '';

    public string $note = '';

    public ?int $editingId = null;

    public ?string $editingType = null;

    public bool $showDeleteModal = false;

    public ?int $deletingId = null;

    public ?string $deletingType = null;

    public string $deletePassword = '';

    public function mount(): void
    {
        $this->date = now()->toDateString();
    }

    public function setFilter(string $filter): void
    {
        if (in_array($filter, ['all', 'income', 'expense'], true)) {
            $this->filter = $filter;
        }
    }

    public function openTransactionModal(string $type = 'income'): void
    {
        $this->resetValidation();
        $this->transactionType = in_array($type, ['income', 'expense'], true) ? $type : 'income';
        $this->categoryId = null;
        $this->amount = '';
        $this->note = '';
        $this->date = now()->toDateString();
        $this->showTransactionModal = true;
    }

    public function editTransaction(string $type, int $id): void
    {
        $this->resetValidation();
        $this->editingType = $type;
        $this->editingId = $id;
        $transaction = $type === 'income'
            ? Income::whereBelongsTo(Auth::user())->findOrFail($id)
            : Expense::whereBelongsTo(Auth::user())->findOrFail($id);

        $this->transactionType = $type;
        $this->amount = (string) $transaction->amount;
        $this->categoryId = $type === 'income' ? $transaction->income_category_id : $transaction->expense_category_id;
        $this->date = date('Y-m-d', strtotime($transaction->getRawOriginal('date')));
        $this->note = $transaction->note ?? '';
        $this->showTransactionModal = true;
    }

    public function closeTransactionModal(): void
    {
        $this->showTransactionModal = false;
        $this->resetValidation();
    }

    public function requestDelete(string $type, int $id): void
    {
        $this->deletingType = $type;
        $this->deletingId = $id;
        $this->deletePassword = '';
        $this->resetValidation();
        $this->showDeleteModal = true;
    }

    public function closeDeleteModal(): void
    {
        $this->showDeleteModal = false;
        $this->deletingId = null;
        $this->deletingType = null;
        $this->deletePassword = '';
        $this->resetValidation();
    }

    public function deleteTransaction(): void
    {
        $this->validate(['deletePassword' => ['required', 'string']]);

        $user = Auth::user();
        if (! $user || ! $user->password || ! Hash::check($this->deletePassword, $user->password)) {
            $this->addError('deletePassword', 'The password is incorrect.');

            return;
        }

        $transaction = $this->deletingType === 'income'
            ? Income::whereBelongsTo($user)->findOrFail($this->deletingId)
            : Expense::whereBelongsTo($user)->findOrFail($this->deletingId);

        $transaction->delete();
        $type = $this->deletingType;
        $this->closeDeleteModal();
        session()->flash('success', ucfirst($type).' deleted successfully.');
    }

    public function saveTransaction(): void
    {
        $validated = $this->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
            'categoryId' => ['required', 'integer'],
            'date' => ['required', 'date'],
            'note' => ['nullable', 'string', 'max:255'],
        ]);

        if ($this->transactionType === 'income') {
            $categoryExists = IncomeCategory::whereKey($validated['categoryId'])->exists();

            abort_unless($categoryExists, 422);

            $incomeData = [
                'amount' => $validated['amount'],
                'user_id' => Auth::id(),
                'income_category_id' => $validated['categoryId'],
                'date' => $validated['date'],
                'note' => $validated['note'] ?? null,
            ];

            $this->editingId ? Income::whereBelongsTo(Auth::user())->findOrFail($this->editingId)->update($incomeData) : Income::create($incomeData);
        } else {
            $categoryExists = ExpenseCategory::whereKey($validated['categoryId'])->exists();

            abort_unless($categoryExists, 422);

            $expenseData = [
                'amount' => $validated['amount'],
                'user_id' => Auth::id(),
                'expense_category_id' => $validated['categoryId'],
                'date' => $validated['date'],
                'note' => $validated['note'] ?? null,
            ];

            $this->editingId ? Expense::whereBelongsTo(Auth::user())->findOrFail($this->editingId)->update($expenseData) : Expense::create($expenseData);
        }

        $wasEditing = $this->editingId !== null;
        $type = $this->transactionType;
        $this->closeTransactionModal();
        $this->editingId = null;
        $this->editingType = null;
        session()->flash('success', ucfirst($type).' '.($wasEditing ? 'updated' : 'added').' successfully.');
    }

    public function render(): View
    {
        $user = Auth::user();
        $incomeQuery = Income::with('category')->whereBelongsTo($user);
        $expenseQuery = Expense::with('category')->whereBelongsTo($user);

        $totalIncome = (clone $incomeQuery)->sum('amount');
        $totalExpense = (clone $expenseQuery)->sum('amount');
        $expenseBreakdown = (clone $expenseQuery)
            ->get()
            ->groupBy(fn (Expense $expense) => $expense->category?->name ?? 'Uncategorized')
            ->map(fn ($items, $name) => ['name' => $name, 'amount' => $items->sum('amount')])
            ->sortByDesc('amount')
            ->values();
        $incomeBreakdown = (clone $incomeQuery)
            ->get()
            ->groupBy(fn (Income $income) => $income->category?->name ?? 'Uncategorized')
            ->map(fn ($items, $name) => ['name' => $name, 'amount' => $items->sum('amount')])
            ->sortByDesc('amount')
            ->values();
        $transactions = collect();

        if ($this->filter !== 'expense') {
            $transactions = $transactions->concat(
                (clone $incomeQuery)->latest('date')->latest()->get()->map(fn (Income $income) => [
                    'id' => $income->id,
                    'date' => $income->date,
                    'category' => $income->category?->name ?? 'Uncategorized',
                    'amount' => $income->amount,
                    'type' => 'income',
                ])
            );
        }

        if ($this->filter !== 'income') {
            $transactions = $transactions->concat(
                (clone $expenseQuery)->latest('date')->latest()->get()->map(fn (Expense $expense) => [
                    'id' => $expense->id,
                    'date' => $expense->date,
                    'category' => $expense->category?->name ?? 'Uncategorized',
                    'amount' => $expense->amount,
                    'type' => 'expense',
                ])
            );
        }

        return view('livewire.dashboard', [
            'incomeCategories' => IncomeCategory::orderBy('name')->get(),
            'expenseCategories' => ExpenseCategory::orderBy('name')->get(),
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'balance' => $totalIncome - $totalExpense,
            'expenseBreakdown' => $expenseBreakdown,
            'incomeBreakdown' => $incomeBreakdown,
            'transactions' => $transactions->sortByDesc('date')->take(12)->values(),
            'entryCount' => $transactions->count(),
            'currencySymbol' => self::CURRENCY_SYMBOLS[$user->currency ?? 'BDT'] ?? '৳',
        ]);
    }
}
