<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseReportController extends Controller
{
    public function download(Request $request)
    {
        $validated = $request->validate([
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date', 'after_or_equal:from'],
        ]);

        $from = $validated['from'] ?? null;
        $to = $validated['to'] ?? null;
        $userID = Auth::id();

        $incomes = Income::with('category')
            ->where('user_id', $userID)
            ->when($from, fn ($query) => $query->whereDate('date', '>=', $from))
            ->when($to, fn ($query) => $query->whereDate('date', '<=', $to))
            ->get()
            ->map(fn (Income $income) => [
                'date' => $income->date,
                'category' => $income->category?->name,
                'type' => 'Income',
                'amount' => $income->amount,
            ]);

        $expenses = Expense::with('category')
            ->where('user_id', $userID)
            ->when($from, fn ($query) => $query->whereDate('date', '>=', $from))
            ->when($to, fn ($query) => $query->whereDate('date', '<=', $to))
            ->get()
            ->map(fn (Expense $expense) => [
                'date' => $expense->date,
                'category' => $expense->category?->name,
                'type' => 'Expense',
                'amount' => $expense->amount,
            ]);

        $data = [
            'title' => 'Expense Report',
            'date' => now()->format('d M Y'),
            'from' => $from,
            'to' => $to,
            'transactions' => $incomes->concat($expenses)->sortByDesc('date')->values(),
            'currencySymbol' => [
                'BDT' => '৳',
                'INR' => '₹',
                'USD' => '$',
                'EUR' => '€',
                'GBP' => '£',
            ][Auth::user()->currency ?? 'BDT'] ?? '৳',
        ];

        $pdf = Pdf::loadView('reports.expense', $data);

        return $pdf->download('expense-report.pdf');
    }
}
