<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::firstOrCreate(
                [
                    'email' => $googleUser->getEmail(),
                ],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                ]
            );
            $isNewUser = $user->wasRecentlyCreated;

            $user->update([
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
            ]);

            if ($isNewUser) {
                try {
                    Mail::to($user)->send(new WelcomeUser($user));
                } catch (Throwable $exception) {
                    report($exception);
                }
            }

            Auth::login($user, true);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {

            return redirect()
                ->route('login')
                ->with('error', 'Google login failed. Please try again.');
        }
    }
}
