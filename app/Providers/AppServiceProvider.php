<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::share('globalTicker', [
            '
            Welcome to Expense Tracker! 💰

আয়-ব্যয়ের হিসাব রাখা এখন আরও সহজ ও নিরাপদ।

🎯 Get Started-এ ক্লিক করে Google দিয়ে সহজেই সাইন-আপ করুন।

🔒 অ্যাকাউন্ট নিরাপদ রাখতে Settings থেকে Password সেট করুন।

📈 Income & Expense যোগ করে পান সঠিক Balance আপডেট।

🏷️ Category অনুযায়ী খরচ দেখে নিশ্চিত করুন সেরা আর্থিক ব্যবস্থাপনা।

আপনার আর্থিক স্বাধীনতা শুরু হোক আজ থেকেই!',

        ]);
    }
}
