<x-mail::message>
# 🎉 Welcome, {{ $user->name }}!

Thank you for joining **{{ config('app.name') }}**.

Your account has been successfully created, and your personal financial dashboard is ready to use.

## 💰 Manage Your Finances Easily

With {{ config('app.name') }}, you can keep your financial activity organized and get a clear picture of where your money is going.

### ✨ What You Can Do

**📈 Track Income & Expenses**  
Record one-time and recurring transactions using customizable categories.

**📊 View Your Financial Overview**  
Monitor your total income, expenses, and current balance from your dashboard.

**📂 Analyze Categories**  
Understand your spending patterns with organized category-based analytics.

**🔐 Secure Your Data**  
Manage your financial records securely with authenticated account access.

**📄 Generate Reports**  
Export filtered financial activity as PDF reports for your personal records.

<x-mail::button :url="route('dashboard')">
Open My Dashboard →
</x-mail::button>

### Need Help?

If you have any questions or need assistance, our support team is happy to help.

**Email:** support@expensetracker.com

Thank you for choosing **{{ config('app.name') }}**. We're excited to help you take control of your finances.

Best regards,  
**The {{ config('app.name') }} Team**

---

*This is an automated email. Please do not reply directly to this message.*
</x-mail::message>