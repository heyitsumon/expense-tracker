{{-- =====================================================
INCOME
====================================================== --}}

<div class="tab-pane fade show active" id="income" role="tabpanel" aria-labelledby="income-tab">

    <form action="{{ route('incomes.store') }}" method="POST">

        @csrf

        {{-- Amount --}}
        <div class="mb-3">

            <label for="incomeAmount" class="form-label">
                Amount
            </label>

            <input type="number" name="amount" class="form-control {{ isset($errors) && $errors->has('amount') ? 'is-invalid' : '' }}"
                id="incomeAmount" placeholder="Enter income amount" step="0.01" min="0" value="{{ old('amount') }}"
                required>

            @if (isset($errors) && $errors->has('amount'))
                <div class="invalid-feedback">
                    {{ $errors->first('amount') }}
                </div>
            @endif

        </div>


        {{-- Category --}}
        <div class="mb-3">

            <label for="incomeCategory" class="form-label">
                Category
            </label>

            <select name="income_category_id" class="form-select {{ isset($errors) && $errors->has('income_category_id') ? 'is-invalid' : '' }}"
                id="incomeCategory" required>

                <option value="">
                    Select category
                </option>

                @foreach ($incomeCategories as $category)
                  
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>

                @endforeach

            </select>

            @if (isset($errors) && $errors->has('income_category_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('income_category_id') }}
                </div>
            @endif

        </div>


        {{-- Date --}}
        <div class="mb-3">

            <label for="incomeDate" class="form-label">
                Date
            </label>

            <input type="date" name="date" class="form-control {{ isset($errors) && $errors->has('date') ? 'is-invalid' : '' }}" id="incomeDate"
                value="{{ old('date', date('Y-m-d')) }}" required>

            @if (isset($errors) && $errors->has('date'))
                <div class="invalid-feedback">
                    {{ $errors->first('date') }}
                </div>
            @endif

        </div>


        {{-- Note --}}
        <div class="mb-3">

            <label for="incomeNote" class="form-label">
                Note
            </label>

            <textarea name="note" id="incomeNote" class="form-control" rows="3"
                placeholder="Optional note">{{ old('note') }}</textarea>

        </div>

        {{-- <input type="hidden" name="user_id" value="{{ auth()->id() }}"> --}}

        {{-- Submit --}}
        <button type="submit" class="btn btn-success w-100">

            <i class="bi bi-plus-circle"></i>

            Save Income

        </button>

    </form>

</div>