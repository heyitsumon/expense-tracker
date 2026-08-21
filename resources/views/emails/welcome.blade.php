<x-mail::message>
# Welcome to {{ config('app.name') }}, {{ $user->name }}

Thank you for choosing {{ config('app.name') }}. Your account has been successfully created, and you now have full
access to your personal financial dashboard.

Our platform provides a secure, streamlined way to manage your income, track expenses, and gain complete visibility over
your financial health.

Key Features Available to You:

Income & Expense Tracking: Record recurring and one-time transactions across customizable categories.

Real-Time Financial Overview: Monitor total revenue, total expenditure, and net balance in real time.

Category Analytics: Review structured breakdowns to identify spending trends and optimization opportunities.

Secure Data Management: Update or delete entries safely with built-in password authentication.

Exportable Reporting: Generate and download PDF reports of filtered financial activity for your records.

<x-mail::button :url="route('dashboard')">
Access Your Dashboard
</x-mail::button>

If you have any questions or require support, please reach out to our team at support@expensetracker.com.

Regards,

The {{ config('app.name') }} Team
</x-mail::message>