<?php

namespace App\View\Components;

use Closure;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IncomeTab extends Component
{
    public function __construct(public Collection $incomeCategories)
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.income-tab');
    }
}