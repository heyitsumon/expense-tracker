<main class="password-page">
    <section class="password-card">
        <div class="password-kicker">Account security</div>
        <h1>{{ $hasPassword ? 'Change your password' : 'Create a password' }}</h1>
        <p class="password-intro">This password confirms sensitive actions, including deleting income and expenses.</p>

        @if (session('success'))
            <div class="password-success">{{ session('success') }}</div>
        @endif

        <form wire:submit="savePassword">
            <div id="security">
            @if ($hasPassword)
                <label class="password-label" for="currentPassword">Current password</label>
                <input class="password-input" type="password" wire:model="currentPassword" id="currentPassword" required>
                @error('currentPassword') <div class="password-error">{{ $message }}</div> @enderror
            @endif

            <label class="password-label" for="password">New password</label>
            <input class="password-input" type="password" wire:model="password" id="password" minlength="8" required>
            @error('password') <div class="password-error">{{ $message }}</div> @enderror

            <label class="password-label" for="passwordConfirmation">Confirm new password</label>
            <input class="password-input" type="password" wire:model="passwordConfirmation" id="passwordConfirmation" minlength="8" required>

            <button class="password-button" type="submit">
                <span wire:loading.remove wire:target="savePassword">Save settings</span>
                <span wire:loading wire:target="savePassword">Saving...</span>
            </button>
            </div>
        </form>
    </section>

    <style>
        .password-page { min-height: calc(100vh - 75px); display: grid; place-items: center; padding: 32px 16px; background: #f7f9fc; }
        html[data-theme="dark"] .password-page { background: #0f172a; }
        .password-card { width: min(440px, 100%); padding: 32px; border: 1px solid #e4ebf2; border-radius: 18px; background: #fff; box-shadow: 0 18px 50px rgba(16, 33, 59, .08); }
        html[data-theme="dark"] .password-card { border-color: #293b55; background: #17243a; box-shadow: 0 18px 50px rgba(0, 0, 0, .18); }
        .password-kicker { margin-bottom: 9px; color: #147d72; font-size: 12px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; }
        .password-card h1 { margin: 0; color: #10213b; font-family: 'Space Grotesk', sans-serif; font-size: 28px; }
        html[data-theme="dark"] .password-card h1, html[data-theme="dark"] .password-label { color: #edf4fa; }
        .password-intro { margin: 12px 0 25px; color: #68778b; font-size: 13px; line-height: 1.6; }
        html[data-theme="dark"] .password-intro { color: #91a4bc; }
        .password-label { display: block; margin: 15px 0 6px; color: #29405c; font-size: 12px; font-weight: 700; }
        .password-input { width: 100%; padding: 11px 12px; border: 1px solid #dce5ef; border-radius: 9px; outline: 0; }
        html[data-theme="dark"] .password-input { color: #edf4fa; border-color: #40536d; background: #111c31; }
        .password-input:focus { border-color: #147d72; box-shadow: 0 0 0 3px rgba(20, 125, 114, .1); }
        .password-button { width: 100%; margin-top: 23px; padding: 12px; border: 0; border-radius: 9px; color: #fff; background: #10213b; font-weight: 700; }
        .password-error { margin-top: 5px; color: #e11d48; font-size: 11px; }
        .password-success { padding: 10px 12px; border-radius: 8px; color: #087a5d; background: #e9fbf4; font-size: 12px; }
    </style>
</main>
