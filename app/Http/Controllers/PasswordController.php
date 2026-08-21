<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PasswordController extends Controller
{
    public function edit(): View
    {
        return view('auth.password');
    }

    public function update(Request $request): RedirectResponse
    {
        $rules = [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        if ($request->user()->password) {
            $rules['current_password'] = ['required', 'current_password'];
        }

        $validated = $request->validate($rules);
        $request->user()->update(['password' => $validated['password']]);

        return redirect()->route('password.edit')->with('success', 'Password saved successfully.');
    }
}