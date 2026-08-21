<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CurrencySettings extends Component
{
    public string $currency = 'BDT';

    public array $currencies = [
        'BDT' => '৳ Bangladeshi Taka',
        'INR' => '₹ Indian Rupee',
        'USD' => '$ US Dollar',
        'EUR' => '€ Euro',
        'GBP' => '£ British Pound',
    ];

    public function mount(): void
    {
        $this->currency = Auth::user()->currency ?? 'BDT';
    }

    public function saveCurrency(): void
    {
        $this->validate([
            'currency' => ['required', 'in:BDT,INR,USD,EUR,GBP'],
        ]);

        Auth::user()->update(['currency' => $this->currency]);
        session()->flash('success', 'Currency updated successfully.');
    }

    public function render(): View
    {
        return view('livewire.currency-settings');
    }
}