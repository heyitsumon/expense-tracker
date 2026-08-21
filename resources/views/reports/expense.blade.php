<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>{{ $title }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #1f2937;
        }

        h1 {
            margin-bottom: 4px;
            color: #10213b;
            font-size: 24px;
            text-align: center;
        }

        .date {
            text-align: center;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background: #f3f3f3;
            color: #475569;
            font-size: 11px;
            text-align: left;
        }

        .income {
            color: green;
        }

        .expense {
            color: red;
        }

        .summary {
            width: 100%;
            margin-top: 24px;
            border-collapse: separate;
            border-spacing: 8px 0;
        }

        .summary td {
            width: 33.33%;
            padding: 13px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            background: #f8fafc;
        }

        .summary-label {
            display: block;
            margin-bottom: 6px;
            color: #64748b;
            font-size: 10px;
            text-transform: uppercase;
        }

        .summary-value {
            font-size: 17px;
            font-weight: bold;
        }

        .summary-income {
            color: #00856b;
            background: #effcf7 !important;
            border-color: #b9ead8 !important;
        }

        .summary-expense {
            color: #d9234d;
            background: #fff4f6 !important;
            border-color: #ffd1dc !important;
        }

        .summary-balance {
            color: #086b9f;
            background: #f0f9ff !important;
            border-color: #c7e5f7 !important;
        }

        .section-title {
            margin-top: 28px;
            margin-bottom: 0;
            padding: 9px 12px;
            color: #fff;
            font-size: 14px;
        }

        .income-title {
            background: #00856b;
        }

        .expense-title {
            background: #d9234d;
        }

        .section-total {
            float: right;
        }

        .empty-row {
            color: #64748b;
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>{{ $title }}</h1>

    <p class="date">
        Generated: {{ $date }}
        @if ($from || $to)
            <br>Period: {{ $from ?? 'Beginning' }} to {{ $to ?? 'Today' }}
        @endif
    </p>

    @php
        $incomeTransactions = $transactions->where('type', 'Income');
        $expenseTransactions = $transactions->where('type', 'Expense');
        $incomeTotal = $incomeTransactions->sum('amount');
        $expenseTotal = $expenseTransactions->sum('amount');
        $netBalance = $incomeTotal - $expenseTotal;
    @endphp

    <table class="summary">
        <tr>
            <td class="summary-income">
                <span class="summary-label">Total Income</span>
                <span class="summary-value">{{ $currencySymbol }}{{ number_format((float) $incomeTotal, 2) }}</span>
            </td>
            <td class="summary-expense">
                <span class="summary-label">Total Expenses</span>
                <span class="summary-value">{{ $currencySymbol }}{{ number_format((float) $expenseTotal, 2) }}</span>
            </td>
            <td class="summary-balance">
                <span class="summary-label">Net Balance</span>
                <span class="summary-value">{{ $currencySymbol }}{{ number_format((float) $netBalance, 2) }}</span>
            </td>
        </tr>
    </table>

   

    <table>

        <thead>
            <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Type</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($incomeTransactions as $transaction)
                <tr>
                    <td>{{ $transaction['date']->format('d M Y') }}</td>
                    <td>{{ $transaction['category'] ?? 'Uncategorized' }}</td>
                    <td class="{{ strtolower($transaction['type']) }}">{{ $transaction['type'] }}</td>
                    <td>{{ $currencySymbol }}{{ number_format((float) $transaction['amount'], 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td class="empty-row" colspan="4">No income found for this period.</td>
                </tr>
            @endforelse

        </tbody>

    </table>
     <h2 class="section-title income-title">
        Income
        <span class="section-total">{{ $currencySymbol }}{{ number_format((float) $incomeTotal, 2) }}</span>
    </h2>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Type</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($expenseTransactions as $transaction)
                <tr>
                    <td>{{ $transaction['date']->format('d M Y') }}</td>
                    <td>{{ $transaction['category'] ?? 'Uncategorized' }}</td>
                    <td class="expense">{{ $transaction['type'] }}</td>
                    <td>{{ $currencySymbol }}{{ number_format((float) $transaction['amount'], 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td class="empty-row" colspan="4">No expenses found for this period.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <h2 class="section-title expense-title">
        Expenses
        <span class="section-total">{{ $currencySymbol }}{{ number_format((float) $expenseTotal, 2) }}</span>
    </h2>

</body>
</html>