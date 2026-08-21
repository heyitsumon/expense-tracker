<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PasswordSettings extends Component
{
    public string $currentPassword = '';

    public string $password = '';

    public string $passwordConfirmation = '';

    public function savePassword(): void
    {
        $rules = [
            'password' => ['required', 'string', 'min:8', 'same:passwordConfirmation'],
        ];

        if (Auth::user()->password) {
            $rules['currentPassword'] = ['required', 'current_password'];
        }

        $validated = $this->validate($rules);
        Auth::user()->update(['password' => $validated['password']]);

        $this->reset(['currentPassword', 'password', 'passwordConfirmation']);
        session()->flash('success', 'Password saved successfully.');
    }


    public function render(): View
    {
        return view('livewire.password-settings', [
            'hasPassword' => (bool) Auth::user()->password,
        ]);
    }
}
