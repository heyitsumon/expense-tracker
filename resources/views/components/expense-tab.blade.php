{{-- =====================================================
EXPENSE
====================================================== --}}

<div class="tab-pane fade" id="expense" role="tabpanel" aria-labelledby="expense-tab">

    <form action="{{ route('expenses.store') }}" method="POST">

        @csrf

        {{-- Amount --}}
        <div class="mb-3">

            <label for="expenseAmount" class="form-label">
                Amount
            </label>

            <input type="number" name="amount" class="form-control {{ isset($errors) && $errors->has('amount') ? 'is-invalid' : '' }}"
                id="expenseAmount" placeholder="Enter expense amount" step="0.01" min="0" value="{{ old('amount') }}"
                required>

            @if (isset($errors) && $errors->has('amount'))
                <div class="invalid-feedback">
                    {{ $errors->first('amount') }}
                </div>
            @endif

        </div>


        {{-- Category --}}
        <div class="mb-3">

            <label for="expenseCategory" class="form-label">
                Category
            </label>

            <select name="expense_category_id" class="form-select {{ isset($errors) && $errors->has('expense_category_id') ? 'is-invalid' : '' }}"
                id="expenseCategory" required>

                <option value="">
                    Select category
                </option>

                @foreach ($expenseCategories as $category)
                    <option value="{{ $category->id }}" {{ old('expense_category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

            @if (isset($errors) && $errors->has('expense_category_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('expense_category_id') }}
                </div>
            @endif

        </div>


        {{-- Date --}}
        <div class="mb-3">

            <label for="expenseDate" class="form-label">
                Date
            </label>

            <input type="date" name="date" class="form-control {{ isset($errors) && $errors->has('date') ? 'is-invalid' : '' }}" id="expenseDate"
                value="{{ old('date', date('Y-m-d')) }}" required>

            @if (isset($errors) && $errors->has('date'))
                <div class="invalid-feedback">
                    {{ $errors->first('date') }}
                </div>
            @endif

        </div>


        {{-- Note --}}
        <div class="mb-3">

            <label for="expenseNote" class="form-label">
                Note
            </label>

            <textarea name="note" id="expenseNote" class="form-control" rows="3"
                placeholder="Optional note">{{ old('note') }}</textarea>

        </div>


        {{-- Submit --}}
        <button type="submit" class="btn btn-danger w-100">

            <i class="bi bi-dash-circle"></i>

            Save Expense

        </button>

    </form>

</div>