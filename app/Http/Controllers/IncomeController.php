<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    /**
     * Display a listing of incomes.
     */
    public function index()
    {
        $userID = Auth::id();

        $incomes = Income::with('category')
            ->where('user_id', $userID)
            ->latest('date')
            ->latest()
            ->get();

        return view('incomes.index', compact('incomes'));
    }

    /**
     * Show the form for creating a new income.
     */
    public function create()
    {
        $incomeCategories = IncomeCategory::orderBy('name')->get();

        return view('incomes.create', compact('incomeCategories'));
    }

    /**
     * Store a newly created income.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
            'income_category_id' => ['required', 'exists:income_categories,id'],
            'date' => ['required', 'date'],

            'note' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        Income::create([
            'amount' => $validated['amount'],
            'user_id' => Auth::id(),
            'income_category_id' => $validated['income_category_id'],
            'date' => $validated['date'],
            'note' => $validated['note'] ?? null,
        ]);

        return redirect()
            ->route('incomes.index')
            ->with('success', 'Income added successfully.');
    }

    /**
     * Display the specified income.
     */
    public function show(Income $income)
    {
        // Security check:
        // User can only see their own income.
        $userID = Auth::id();

        abort_if(
            $income->user_id !== $userID,
            403
        );

        $income->load('category');

        return view('incomes.show', compact('income'));
    }

    /**
     * Show the form for editing the specified income.
     */
    public function edit(Income $income)
    {
        // Security check

        $userID = Auth::id();
        abort_if(
            $income->user_id !== $userID,
            403
        );

        $incomeCategories = IncomeCategory::orderBy('name')->get();

        return view(
            'incomes.edit',
            compact('income', 'incomeCategories')
        );
    }

    /**
     * Update the specified income.
     */
    public function update(
        Request $request,
        Income $income
    ) {
        $userID = Auth::id();
        abort_if(
            $income->user_id !== $userID,
            403
        );

        $validated = $request->validate([
            'amount' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'income_category_id' => [
                'required',
                'exists:income_categories,id',
            ],

            'date' => [
                'required',
                'date',
            ],

            'note' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        $income->update([
            'amount' => $validated['amount'],

            'income_category_id' => $validated['income_category_id'],

            'date' => $validated['date'],

            'note' => $validated['note'] ?? null,
        ]);

        return redirect()
            ->route('incomes.index')
            ->with('success', 'Income updated successfully.');
    }

    /**
     * Remove the specified income.
     */
    public function destroy(Request $request, Income $income)
    {
        // Security check

        abort_if(
            $income->user_id !== Auth::id(),
            403
        );

        $validated = $request->validate([
            'password' => ['required', 'string'],
        ]);

        if (! Auth::user()->password || ! Hash::check($validated['password'], Auth::user()->password)) {
            return back()->withErrors(['password' => 'The password is incorrect.']);
        }

        $income->delete();

        return redirect()
            ->route('incomes.index')
            ->with('success', 'Income deleted successfully.');
    }
}
