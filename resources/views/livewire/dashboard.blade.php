<div class="dashboard-shell" wire:poll.15s>
    <style>
        .dashboard-shell {
            min-height: calc(100vh - 75px);
            background: #f7f9fc;
            color: #10213b;
        }

        html[data-theme="dark"] .dashboard-shell {
            background: #0f172a;
            color: #e5edf5;
        }

        html[data-theme="dark"] .dashboard-heading {
            color: #f1f5f9;
        }

        html[data-theme="dark"] .dashboard-subtitle,
        html[data-theme="dark"] .entry-count,
        html[data-theme="dark"] .transaction-date,
        html[data-theme="dark"] .category-meta {
            color: #91a4bc;
        }

        html[data-theme="dark"] .summary-card,
        html[data-theme="dark"] .activity-card,
        html[data-theme="dark"] .breakdown-card,
        html[data-theme="dark"] .transaction-modal {
            border-color: #293b55;
            background: #17243a;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .16);
        }

        html[data-theme="dark"] .summary-income {
            background: #102e2c;
            border-color: #1d5c51;
        }

        html[data-theme="dark"] .summary-expense {
            background: #351d2a;
            border-color: #673044;
        }

        html[data-theme="dark"] .summary-balance {
            background: #122d42;
            border-color: #245777;
        }

        html[data-theme="dark"] .summary-value,
        html[data-theme="dark"] .transaction-name,
        html[data-theme="dark"] .breakdown-title,
        html[data-theme="dark"] .category-line,
        html[data-theme="dark"] .modal-header-custom h2,
        html[data-theme="dark"] .form-label-custom {
            color: #edf4fa;
        }

        html[data-theme="dark"] .filter-tabs {
            background: #23334c;
        }

        html[data-theme="dark"] .filter-tab.active {
            color: #10213b;
            background: #e8f0f5;
        }

        html[data-theme="dark"] .filter-tab {
            color: #b8c9da;
        }

        html[data-theme="dark"] .filter-tab:hover {
            color: #fff;
            background: #304661;
        }

        html[data-theme="dark"] .transaction-row {
            border-color: #293b55;
        }

        html[data-theme="dark"] .form-input-custom {
            color: #e5edf5;
            border-color: #40536d;
            background: #111c31;
        }

        html[data-theme="dark"] .empty-state {
            color: #91a4bc;
        }

        html[data-theme="dark"] .report-button {
            color: #82e2d0;
            border-color: #3f6170;
            background: #17243a;
        }

        html[data-theme="dark"] .report-button:hover {
            color: #10213b;
            background: #b9ead8;
        }

        html[data-theme="dark"] .transaction-action {
            color: #c1d1df;
            border-color: #40536d;
            background: #1e3049;
        }

        html[data-theme="dark"] .transaction-action:hover {
            color: #9ce8da;
            border-color: #55cdbb;
            background: #263d59;
        }

        html[data-theme="dark"] .transaction-action.delete {
            color: #ff9aae;
        }

        html[data-theme="dark"] .transaction-action.delete:hover {
            color: #fff;
            border-color: #f8385e;
            background: #5b263d;
        }

        html[data-theme="dark"] .modal-close {
            color: #b8c9da;
        }

        html[data-theme="dark"] .modal-close:hover {
            color: #fff;
        }

        html[data-theme="dark"] .loading-screen {
            background: rgba(15, 23, 42, .78);
        }

        html[data-theme="dark"] .loader-card {
            color: #edf4fa;
            border-color: #40536d;
            background: #17243a;
        }

        html[data-theme="dark"] .password-toggle {
            color: #b8c9da;
        }

        html[data-theme="dark"] .transaction-modal p {
            color: #b8c9da !important;
        }

        .dashboard-inner {
            width: min(980px, calc(100% - 32px));
            margin: 0 auto;
            padding: 30px 0 56px;
        }

        .dashboard-header {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 22px;
        }

        .dashboard-kicker {
            margin-bottom: 5px;
            color: #147d72;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        .dashboard-heading {
            margin: 0;
            color: #10213b;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 28px;
            letter-spacing: -.04em;
        }

        .dashboard-subtitle {
            margin: 6px 0 0;
            color: #8292a8;
            font-size: 13px;
        }

        .report-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 13px;
            border: 1px solid #d7e5eb;
            border-radius: 9px;
            color: #147d72;
            background: #fff;
            font-size: 12px;
            font-weight: 800;
            text-decoration: none;
            white-space: nowrap;
        }

        .report-button:hover {
            border-color: #147d72;
            background: #f3fffb;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .summary-card,
        .activity-card,
        .breakdown-card {
            border: 1px solid #e8edf4;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 3px 10px rgba(18, 42, 76, .04);
        }

        .summary-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 122px;
            padding: 20px;
        }

        .summary-label {
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 600;
        }

        .summary-value {
            font-size: 25px;
            line-height: 1;
            font-weight: 800;
            letter-spacing: -.03em;
        }

        .summary-income {
            border-color: #c9f1e1;
            background: #f5fffb;
        }

        .summary-income .summary-label {
            color: #008d72;
        }

        .summary-income .summary-value {
            color: #006f62;
        }

        .summary-expense {
            border-color: #ffdbe1;
            background: #fff8f9;
        }

        .summary-expense .summary-label {
            color: #eb2247;
        }

        .summary-expense .summary-value {
            color: #a70f35;
        }

        .summary-balance {
            border-color: #d9ecfb;
            background: #f7fcff;
        }

        .summary-balance .summary-label {
            color: #006ba6;
        }

        .summary-balance .summary-value {
            color: #075885;
        }

        .summary-icon {
            display: grid;
            place-items: center;
            width: 43px;
            height: 43px;
            border-radius: 12px;
            color: #fff;
            font-size: 23px;
        }

        .summary-income .summary-icon {
            background: #09b786;
        }

        .summary-expense .summary-icon {
            background: #f8385e;
        }

        .summary-balance .summary-icon {
            background: #079dde;
        }

        .dashboard-columns {
            display: grid;
            grid-template-columns: 1.35fr .95fr;
            gap: 20px;
            margin-top: 20px;
        }

        .filter-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .filter-tabs {
            display: flex;
            gap: 3px;
            padding: 4px;
            border-radius: 11px;
            background: #eef3f8;
        }

        .filter-tab {
            padding: 7px 13px;
            border: 0;
            border-radius: 8px;
            color: #55708f;
            background: transparent;
            font-size: 12px;
            cursor: pointer;
        }

        .filter-tab.active {
            color: #10213b;
            background: #fff;
            box-shadow: 0 1px 4px rgba(18, 42, 76, .08);
            font-weight: 700;
        }

        .entry-count {
            color: #8292a8;
            font-size: 12px;
        }

        .activity-card {
            overflow: hidden;
        }

        .transaction-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 65px;
            padding: 11px 20px;
            border-bottom: 1px solid #edf1f6;
        }

        .transaction-row:last-child {
            border-bottom: 0;
        }

        .transaction-main {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 0;
        }

        .transaction-icon {
            display: grid;
            flex: 0 0 auto;
            place-items: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            font-size: 18px;
        }

        .transaction-icon.income {
            color: #00a97e;
            background: #e9fbf4;
        }

        .transaction-icon.expense {
            color: #f52f52;
            background: #fff0f3;
        }

        .transaction-name {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 13px;
            font-weight: 600;
        }

        .transaction-date {
            margin-top: 3px;
            color: #8ca0b8;
            font-size: 11px;
        }

        .transaction-amount {
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
        }

        .transaction-amount.income {
            color: #009c75;
        }

        .transaction-amount.expense {
            color: #ef1d4b;
        }

        .empty-state {
            padding: 36px 20px;
            text-align: center;
            color: #8ca0b8;
            font-size: 13px;
        }

        .breakdown-card {
            padding: 20px;
        }

        .breakdown-title {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 800;
        }

        .breakdown-title span {
            color: #8ea6c1;
            font-size: 20px;
        }

        .breakdown-heading {
            margin-bottom: 13px;
            font-size: 13px;
        }

        .breakdown-heading.expenses {
            color: #f2244a;
        }

        .breakdown-heading.incomes {
            margin-top: 25px;
            color: #00a67b;
        }

        .category-row {
            margin-bottom: 13px;
        }

        .category-line {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-size: 11px;
        }

        .category-meta {
            color: #7f95af;
        }

        .progress-track {
            height: 7px;
            overflow: hidden;
            border-radius: 8px;
            background: #edf2f7;
        }

        .progress-fill {
            height: 100%;
            border-radius: inherit;
            background: #f76482;
        }

        .category-row:nth-of-type(2) .progress-fill {
            background: #ffb91f;
        }

        .category-row:nth-of-type(3) .progress-fill {
            background: #27c697;
        }

        .add-button {
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 10;
            padding: 13px 17px;
            border: 0;
            border-radius: 11px;
            color: #fff;
            background: #10213b;
            box-shadow: 0 8px 20px rgba(16, 33, 59, .22);
            font-size: 13px;
            font-weight: 700;
        }

        .add-button:hover {
            background: #183250;
        }

        .modal-backdrop-custom {
            position: fixed;
            inset: 0;
            z-index: 20;
            display: grid;
            place-items: center;
            padding: 20px;
            background: rgba(16, 33, 59, .35);
        }

        .transaction-modal {
            width: min(420px, 100%);
            padding: 24px;
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 20px 60px rgba(16, 33, 59, .2);
        }

        .modal-header-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .modal-header-custom h2 {
            margin: 0;
            font-size: 20px;
        }

        .modal-close {
            border: 0;
            color: #7f95af;
            background: transparent;
            font-size: 24px;
        }

        .form-label-custom {
            display: block;
            margin-bottom: 6px;
            font-size: 12px;
            font-weight: 700;
        }

        .form-input-custom {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #dce5ef;
            border-radius: 9px;
            outline: 0;
        }

        .form-input-custom:focus {
            border-color: #159bd5;
            box-shadow: 0 0 0 3px rgba(21, 155, 213, .1);
        }

        .form-group {
            margin-bottom: 14px;
        }

        .modal-submit {
            width: 100%;
            padding: 12px;
            border: 0;
            border-radius: 9px;
            color: #fff;
            background: #10213b;
            font-weight: 700;
        }

        .field-error {
            margin-top: 4px;
            color: #e11d48;
            font-size: 11px;
        }

        .password-field {
            position: relative;
        }

        .password-field .form-input-custom {
            padding-right: 42px;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 9px;
            display: grid;
            place-items: center;
            width: 28px;
            height: 28px;
            transform: translateY(-50%);
            border: 0;
            color: #71869e;
            background: transparent;
            cursor: pointer;
            font-size: 16px;
        }

        .password-toggle:hover {
            color: #147d72;
        }

        .transaction-actions {
            display: flex;
            gap: 6px;
            margin-left: 12px;
            opacity: 0;
            transition: opacity .2s ease;
        }

        .transaction-row:hover .transaction-actions,
        .transaction-row:focus-within .transaction-actions {
            opacity: 1;
        }

        .transaction-action {
            padding: 5px 7px;
            border: 1px solid #dce5ef;
            border-radius: 6px;
            color: #68809b;
            background: #fff;
            font-size: 10px;
            cursor: pointer;
        }

        .transaction-action:hover {
            border-color: #147d72;
            color: #147d72;
        }

        .transaction-action.delete {
            color: #e11d48;
        }

        .transaction-action.delete:hover {
            border-color: #e11d48;
        }

        .loading-screen {
            position: fixed;
            inset: 0;
            z-index: 40;
            display: grid;
            place-items: center;
            background: rgba(247, 249, 252, .72);
            backdrop-filter: blur(3px);
        }

        .loader-card {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 19px;
            border: 1px solid #e2eaf2;
            border-radius: 12px;
            color: #10213b;
            background: #fff;
            box-shadow: 0 12px 30px rgba(16, 33, 59, .13);
            font-size: 13px;
            font-weight: 700;
        }

        .loader-spinner {
            width: 22px;
            height: 22px;
            border: 3px solid #dbe9f2;
            border-top-color: #079dde;
            border-radius: 50%;
            animation: spin .75s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 720px) {
            .dashboard-inner {
                padding-top: 22px;
            }

            .dashboard-header {
                align-items: start;
                flex-direction: column;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .summary-card {
                min-height: 92px;
            }

            .dashboard-columns {
                grid-template-columns: 1fr;
            }

            .add-button {
                right: 16px;
                bottom: 16px;
            }

            .transaction-actions {
                opacity: 1;
            }

            .transaction-row {
                padding: 11px 14px;
            }

            .transaction-action {
                padding: 5px 6px;
            }
        }
    </style>

    <div class="dashboard-inner">
        <header class="dashboard-header">
            <div>
                <div class="dashboard-kicker">Personal overview</div>
                <h1 class="dashboard-heading">Welcome to, {{ auth()->user()?->name ?? 'there' }}</h1>
                <p class="dashboard-subtitle">Here is your current financial picture.</p>
            </div>

        </header>
        <div class="summary-grid">
            <article class="summary-card summary-income">
                <div>
                    <div class="summary-label">Total Income</div>
                    <div class="summary-value">{{ $currencySymbol }}{{ number_format((float) $totalIncome, 0) }}</div>
                </div>
                <div class="summary-icon"><span class="material-symbols-outlined">trending_up</span></div>
            </article>
            <article class="summary-card summary-expense">
                <div>
                    <div class="summary-label">Total Expense</div>
                    <div class="summary-value">{{ $currencySymbol }}{{ number_format((float) $totalExpense, 0) }}</div>
                </div>
                <div class="summary-icon"><span class="material-symbols-outlined">trending_down</span></div>
            </article>
            <article class="summary-card summary-balance">
                <div>
                    <div class="summary-label">Balance</div>
                    <div class="summary-value">{{ $currencySymbol }}{{ number_format((float) $balance, 0) }}</div>
                </div>
                <div class="summary-icon"><span class="material-symbols-outlined">account_balance_wallet</span></div>
            </article>
        </div>

        <div class="dashboard-columns">
            <section>
                <div class="filter-bar">
                    <div class="filter-tabs"><button class="filter-tab {{ $filter === 'all' ? 'active' : '' }}"
                            wire:click="setFilter('all')">All</button><button
                            class="filter-tab {{ $filter === 'income' ? 'active' : '' }}"
                            wire:click="setFilter('income')">Income</button><button
                            class="filter-tab {{ $filter === 'expense' ? 'active' : '' }}"
                            wire:click="setFilter('expense')">Expense</button></div><span
                        class="entry-count">{{ $entryCount }} entries</span>
                </div>
                <div class="activity-card">
                    @forelse ($transactions as $transaction)
                        <div class="transaction-row" wire:key="{{ $transaction['type'] }}-{{ $transaction['id'] }}">
                            <div class="transaction-main">
                                <div class="transaction-icon {{ $transaction['type'] }}"><span
                                        class="material-symbols-outlined">{{ $transaction['type'] === 'income' ? 'arrow_upward' : 'arrow_downward' }}</span>
                                </div>
                                <div>
                                    <div class="transaction-name">{{ $transaction['category'] }}</div>
                                    <div class="transaction-date">{{ $transaction['date']->format('d M Y') }}</div>
                                </div>
                            </div>
                            <div style="display:flex;align-items:center;">
                                <div class="transaction-amount {{ $transaction['type'] }}">
                                    {{ $transaction['type'] === 'income' ? '+' : '-' }}{{ $currencySymbol }}{{ number_format((float) $transaction['amount'], 0) }}
                                </div>
                                <div class="transaction-actions"><button class="transaction-action"
                                        wire:click="editTransaction('{{ $transaction['type'] }}', {{ $transaction['id'] }})">Edit</button><button
                                        class="transaction-action delete"
                                        wire:click="requestDelete('{{ $transaction['type'] }}', {{ $transaction['id'] }})">Delete</button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">No transactions yet. Add your first entry to see it here.</div>
                    @endforelse
                </div>
            </section>

            <aside class="breakdown-card">
                <div class="breakdown-title"><span>◷</span> Category Breakdown</div>
                <div class="breakdown-heading expenses">Expenses by Category</div>@forelse ($expenseBreakdown as $item)
                    <div class="category-row">
                        <div class="category-line"><span>{{ $item['name'] }}</span><span
                                class="category-meta">{{ $currencySymbol }}{{ number_format((float) $item['amount'], 0) }}
                                {{ $totalExpense > 0 ? number_format($item['amount'] / $totalExpense * 100, 0) : 0 }}%</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill"
                                style="width: {{ $totalExpense > 0 ? min(100, $item['amount'] / $totalExpense * 100) : 0 }}%">
                            </div>
                        </div>
                </div>@empty<div class="empty-state" style="padding: 10px 0 0;">No expenses recorded.</div>@endforelse
                <div class="breakdown-heading incomes">Income by Category</div>@forelse ($incomeBreakdown as $item)
                    <div class="category-row">
                        <div class="category-line"><span>{{ $item['name'] }}</span><span
                                class="category-meta">{{ $currencySymbol }}{{ number_format((float) $item['amount'], 0) }}
                                {{ $totalIncome > 0 ? number_format($item['amount'] / $totalIncome * 100, 0) : 0 }}%</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill"
                                style="background:#ffb91f;width: {{ $totalIncome > 0 ? min(100, $item['amount'] / $totalIncome * 100) : 0 }}%">
                            </div>
                        </div>
                </div>@empty<div class="empty-state" style="padding: 10px 0 0;">No income recorded.</div>@endforelse
            </aside>
        </div>
    </div>

    <button class="add-button" wire:click="openTransactionModal('income')">+ Add transaction</button>

    <div wire:loading.flex class="loading-screen">
        <div class="loader-card"><span class="loader-spinner"></span>Updating your money view...</div>
    </div>

    @if ($showTransactionModal)
        <div class="modal-backdrop-custom" wire:click.self="closeTransactionModal">
            <div class="transaction-modal">
                <div class="modal-header-custom">
                    <h2>{{ $editingId ? 'Edit' : 'Add' }} {{ ucfirst($transactionType) }}</h2><button class="modal-close"
                        wire:click="closeTransactionModal" aria-label="Close">×</button>
                </div>
                <div class="filter-tabs" style="margin-bottom: 18px;"><button
                        class="filter-tab {{ $transactionType === 'income' ? 'active' : '' }}"
                        wire:click="$set('transactionType', 'income')">Income</button><button
                        class="filter-tab {{ $transactionType === 'expense' ? 'active' : '' }}"
                        wire:click="$set('transactionType', 'expense')">Expense</button></div>
                <div class="form-group"><label class="form-label-custom">Amount</label><input class="form-input-custom"
                        type="number" step="0.01" min="0.01" wire:model="amount" placeholder="0.00">@error('amount')
                        <div class="field-error">{{ $message }}</div>@enderror
                </div>
                <div class="form-group"><label class="form-label-custom">Category</label><select class="form-input-custom"
                        wire:model="categoryId">
                        <option value="">Select category</option>
                        @foreach ($transactionType === 'income' ? $incomeCategories : $expenseCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>@endforeach
                    </select>@error('categoryId')
                    <div class="field-error">{{ $message }}</div>@enderror
                </div>
                <div class="form-group"><label class="form-label-custom">Date</label><input class="form-input-custom"
                        type="date" wire:model="date">@error('date')
                        <div class="field-error">{{ $message }}</div>@enderror
                </div>
                <div class="form-group"><label class="form-label-custom">Note</label><textarea class="form-input-custom"
                        wire:model="note" rows="2" placeholder="Optional note"></textarea></div>
                <button class="modal-submit" wire:click="saveTransaction"><span wire:loading.remove
                        wire:target="saveTransaction">{{ $editingId ? 'Update' : 'Save' }}
                        {{ ucfirst($transactionType) }}</span><span wire:loading
                        wire:target="saveTransaction">Saving...</span></button>
            </div>
        </div>
    @endif

    @if ($showDeleteModal)
        <div class="modal-backdrop-custom" wire:click.self="closeDeleteModal">
            <div class="transaction-modal">
                <div class="modal-header-custom">
                    <h2>Confirm deletion</h2><button class="modal-close" wire:click="closeDeleteModal"
                        aria-label="Close">×</button>
                </div>
                <p style="margin:0 0 18px;color:#68778b;font-size:13px;line-height:1.55;">Enter your account password to
                    permanently delete this {{ $deletingType }}.</p>
                <div class="form-group"><label class="form-label-custom" for="deletePassword">Password</label>
                    <div class="password-field" x-data="{ showPassword: false }"><input id="deletePassword"
                            class="form-input-custom" x-bind:type="showPassword ? 'text' : 'password'"
                            wire:model="deletePassword" placeholder="Your password"><button type="button"
                            class="password-toggle" x-on:click="showPassword = !showPassword"
                            x-bind:aria-label="showPassword ? 'Hide password' : 'Show password'"
                            x-text="showPassword ? '◉' : '◌'"></button></div>@error('deletePassword')
                            <div class="field-error">{{ $message }}</div>@enderror
                </div>
                <button class="modal-submit" style="background:#e11d48;" wire:click="deleteTransaction"><span
                        wire:loading.remove wire:target="deleteTransaction">Delete permanently</span><span wire:loading
                        wire:target="deleteTransaction">Checking password...</span></button>
            </div>
        </div>
    @endif
</div>