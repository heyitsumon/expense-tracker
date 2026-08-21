<main class="password-page">

    <section class="password-card">

        <div class="security-icon">
            <span class="material-symbols-outlined">
                lock
            </span>
        </div>

        <div class="password-kicker">
            Account Security
        </div>

        <h1>
            {{ $hasPassword ? 'Change your password' : 'Create a password' }}
        </h1>

        <p class="password-intro">
            Protect your account and sensitive financial actions
            with a strong password.
        </p>


        @if (session('success'))
            <div class="password-success">
                <span class="material-symbols-outlined">
                    check_circle
                </span>

                <span>{{ session('success') }}</span>
            </div>
        @endif


        <form wire:submit="savePassword">

            <div class="security-form">

                {{-- CURRENT PASSWORD --}}
                @if ($hasPassword)

                    <div class="field">

                        <label class="password-label"
                               for="currentPassword">
                            Current password
                        </label>

                        <div class="password-wrapper">

                            <input
                                class="password-input"
                                type="password"
                                wire:model="currentPassword"
                                id="currentPassword"
                        
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword(
                                    'currentPassword',
                                    this
                                )"
                                aria-label="Show current password"
                            >
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </button>

                        </div>

                        @error('currentPassword')
                            <div class="password-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                @endif


                {{-- NEW PASSWORD --}}
                <div class="field">

                    <label class="password-label"
                           for="password">
                        New password
                    </label>

                    <div class="password-wrapper">

                        <input
                            class="password-input"
                            type="password"
                            wire:model="password"
                            id="password"
                            minlength="8"
                            autocomplete="new-password"
                            required
                            oninput="checkPasswordStrength(this.value)"
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword(
                                'password',
                                this
                            )"
                            aria-label="Show new password"
                        >
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                        </button>

                    </div>


                    {{-- PASSWORD STRENGTH --}}
                    <div class="strength-container">

                        <div class="strength-bars">

                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>

                        </div>

                        <span id="strengthText">
                            Enter a password
                        </span>

                    </div>


                    @error('password')
                        <div class="password-error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- CONFIRM PASSWORD --}}
                <div class="field">

                    <label class="password-label"
                           for="passwordConfirmation">
                        Confirm new password
                    </label>

                    <div class="password-wrapper">

                        <input
                            class="password-input"
                            type="password"
                            wire:model="passwordConfirmation"
                            id="passwordConfirmation"
                            minlength="8"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword(
                                'passwordConfirmation',
                                this
                            )"
                            aria-label="Show password confirmation"
                        >
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                        </button>

                    </div>

                </div>


                {{-- PASSWORD TIPS --}}
                <div class="password-tips">

                    <div class="tips-title">
                        <span class="material-symbols-outlined">
                            verified_user
                        </span>

                        Password tips
                    </div>

                    <div class="tips-grid">

                        <span>
                            <i></i>
                            8+ characters
                        </span>

                        <span>
                            <i></i>
                            Uppercase letter
                        </span>

                        <span>
                            <i></i>
                            Number
                        </span>

                        <span>
                            <i></i>
                            Special character
                        </span>

                    </div>

                </div>


                {{-- SAVE --}}
                <button
                    class="password-button"
                    type="submit"
                >

                    <span
                        wire:loading.remove
                        wire:target="savePassword"
                    >
                        Save password

                        <span class="material-symbols-outlined">
                            arrow_forward
                        </span>
                    </span>

                    <span
                        wire:loading
                        wire:target="savePassword"
                    >
                        <span class="spinner"></span>
                        Saving...
                    </span>

                </button>

            </div>

        </form>

    </section>


    <style>

        /* =========================
           PAGE
        ========================== */

        .password-page {
            min-height: calc(100vh - 75px);

            display: grid;
            place-items: center;

            padding: 50px 16px;

            position: relative;

            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(20,125,114,.10),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 85% 80%,
                    rgba(99,102,241,.08),
                    transparent 30%
                ),
                #f6f9fc;
        }

        html[data-theme="dark"] .password-page {
            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(20,125,114,.14),
                    transparent 30%
                ),
                #0b1220;
        }


        /* =========================
           CARD
        ========================== */

        .password-card {
            width: min(470px, 100%);

            padding: 36px;

            position: relative;

            border: 1px solid rgba(255,255,255,.8);

            border-radius: 24px;

            background: rgba(255,255,255,.88);

            backdrop-filter: blur(20px);

            box-shadow:
                0 30px 80px rgba(15,23,42,.10);

            animation: cardIn .5s ease;
        }

        @keyframes cardIn {

            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        html[data-theme="dark"] .password-card {
            border-color: #26364d;

            background: rgba(20,32,52,.92);

            box-shadow:
                0 30px 80px rgba(0,0,0,.28);
        }


        /* =========================
           SECURITY ICON
        ========================== */

        .security-icon {
            display: grid;
            place-items: center;

            width: 52px;
            height: 52px;

            margin-bottom: 20px;

            border-radius: 15px;

            color: #147d72;

            background: #e3f7f2;

            box-shadow:
                0 8px 20px rgba(20,125,114,.12);
        }

        .security-icon .material-symbols-outlined {
            font-size: 25px;
        }


        /* =========================
           HEADING
        ========================== */

        .password-kicker {
            margin-bottom: 8px;

            color: #147d72;

            font-size: 11px;

            font-weight: 800;

            letter-spacing: .12em;

            text-transform: uppercase;
        }

        .password-card h1 {
            margin: 0;

            color: #10213b;

            font-family: 'Space Grotesk', sans-serif;

            font-size: 30px;

            line-height: 1.15;

            letter-spacing: -.035em;
        }

        html[data-theme="dark"] .password-card h1 {
            color: #f1f5f9;
        }

        .password-intro {
            margin: 12px 0 27px;

            color: #68778b;

            font-size: 13px;

            line-height: 1.65;
        }

        html[data-theme="dark"] .password-intro {
            color: #91a4bc;
        }


        /* =========================
           SUCCESS
        ========================== */

        .password-success {
            display: flex;
            align-items: center;

            gap: 9px;

            margin-bottom: 22px;

            padding: 12px 14px;

            border: 1px solid #bcebdc;

            border-radius: 11px;

            color: #087a5d;

            background: #ecfbf5;

            font-size: 12px;

            font-weight: 600;
        }

        .password-success .material-symbols-outlined {
            font-size: 19px;
        }


        /* =========================
           FORM
        ========================== */

        .field {
            margin-bottom: 19px;
        }

        .password-label {
            display: block;

            margin-bottom: 7px;

            color: #29405c;

            font-size: 12px;

            font-weight: 700;
        }

        html[data-theme="dark"] .password-label {
            color: #e5edf6;
        }


        /* =========================
           PASSWORD INPUT
        ========================== */

        .password-wrapper {
            position: relative;
        }

        .password-input {
            width: 100%;

            height: 48px;

            padding: 0 48px 0 14px;

            border: 1px solid #dce5ef;

            border-radius: 11px;

            outline: none;

            color: #10213b;

            background: #fff;

            font-family: 'DM Sans', sans-serif;

            font-size: 14px;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .password-input:hover {
            border-color: #b8c8d8;
        }

        .password-input:focus {
            border-color: #147d72;

            box-shadow:
                0 0 0 4px rgba(20,125,114,.10);
        }

        html[data-theme="dark"] .password-input {
            color: #edf4fa;

            border-color: #40536d;

            background: #101b2d;
        }

        html[data-theme="dark"] .password-input:focus {
            border-color: #2bb7a5;

            box-shadow:
                0 0 0 4px rgba(43,183,165,.12);
        }


        /* =========================
           SHOW / HIDE BUTTON
        ========================== */

        .password-toggle {
            position: absolute;

            right: 7px;
            top: 50%;

            display: grid;
            place-items: center;

            width: 36px;
            height: 36px;

            transform: translateY(-50%);

            border: 0;

            border-radius: 8px;

            color: #718096;

            background: transparent;

            cursor: pointer;

            transition: .2s ease;
        }

        .password-toggle:hover {
            color: #147d72;

            background: #eef8f6;
        }

        html[data-theme="dark"] .password-toggle:hover {
            color: #5eead4;

            background: #1d3340;
        }

        .password-toggle .material-symbols-outlined {
            font-size: 20px;
        }


        /* =========================
           STRENGTH
        ========================== */

        .strength-container {
            display: flex;

            align-items: center;

            gap: 10px;

            margin-top: 8px;
        }

        .strength-bars {
            display: flex;

            gap: 4px;

            flex: 1;
        }

        .strength-bars span {
            height: 4px;

            flex: 1;

            border-radius: 99px;

            background: #e2e8f0;

            transition: .25s ease;
        }

        html[data-theme="dark"] .strength-bars span {
            background: #334155;
        }

        #strengthText {
            min-width: 95px;

            color: #94a3b8;

            font-size: 10px;

            text-align: right;
        }


        /* =========================
           PASSWORD TIPS
        ========================== */

        .password-tips {
            margin-top: 4px;

            padding: 14px;

            border: 1px solid #e5ecef;

            border-radius: 12px;

            background: #f8fbfa;
        }

        html[data-theme="dark"] .password-tips {
            border-color: #2c3d55;

            background: #111c2e;
        }

        .tips-title {
            display: flex;
            align-items: center;

            gap: 6px;

            margin-bottom: 10px;

            color: #29405c;

            font-size: 11px;

            font-weight: 700;
        }

        html[data-theme="dark"] .tips-title {
            color: #e2e8f0;
        }

        .tips-title .material-symbols-outlined {
            color: #147d72;

            font-size: 17px;
        }

        .tips-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 7px;
        }

        .tips-grid span {
            display: flex;
            align-items: center;

            gap: 6px;

            color: #75869a;

            font-size: 10px;
        }

        .tips-grid i {
            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: #cbd5e1;
        }


        /* =========================
           BUTTON
        ========================== */

        .password-button {
            width: 100%;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            min-height: 49px;

            margin-top: 22px;

            border: 0;

            border-radius: 11px;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #10213b,
                    #193654
                );

            font-family: 'DM Sans', sans-serif;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 10px 25px rgba(16,33,59,.15);

            transition: .2s ease;
        }

        .password-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 15px 30px rgba(16,33,59,.22);
        }

        .password-button:active {
            transform: translateY(0);
        }

        .password-button .material-symbols-outlined {
            font-size: 18px;
        }


        /* =========================
           SPINNER
        ========================== */

        .spinner {
            width: 15px;
            height: 15px;

            border: 2px solid rgba(255,255,255,.35);

            border-top-color: white;

            border-radius: 50%;

            animation: spin .7s linear infinite;
        }

        @keyframes spin {

            to {
                transform: rotate(360deg);
            }

        }


        /* =========================
           ERROR
        ========================== */

        .password-error {
            margin-top: 6px;

            color: #e11d48;

            font-size: 11px;

            font-weight: 500;
        }


        /* =========================
           MOBILE
        ========================== */

        @media (max-width: 520px) {

            .password-page {
                padding: 25px 14px;
            }

            .password-card {
                padding: 26px 21px;

                border-radius: 20px;
            }

            .password-card h1 {
                font-size: 26px;
            }

            .tips-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>


    <script>

        /*
        |--------------------------------------------------------------------------
        | Show / Hide Password
        |--------------------------------------------------------------------------
        */

        function togglePassword(inputId, button) {

            const input = document.getElementById(inputId);

            const icon = button.querySelector(
                '.material-symbols-outlined'
            );

            if (input.type === 'password') {

                input.type = 'text';

                icon.textContent = 'visibility_off';

                button.setAttribute(
                    'aria-label',
                    'Hide password'
                );

            } else {

                input.type = 'password';

                icon.textContent = 'visibility';

                button.setAttribute(
                    'aria-label',
                    'Show password'
                );

            }

        }


        /*
        |--------------------------------------------------------------------------
        | Password Strength
        |--------------------------------------------------------------------------
        */

        function checkPasswordStrength(password) {

            const bars = document.querySelectorAll(
                '.strength-bars span'
            );

            const text = document.getElementById(
                'strengthText'
            );

            let strength = 0;

            if (password.length >= 8) {
                strength++;
            }

            if (/[A-Z]/.test(password)) {
                strength++;
            }

            if (/[0-9]/.test(password)) {
                strength++;
            }

            if (/[^A-Za-z0-9]/.test(password)) {
                strength++;
            }


            bars.forEach((bar, index) => {

                bar.style.background = '#e2e8f0';

                if (index < strength) {

                    if (strength === 1) {
                        bar.style.background = '#ef4444';
                    }

                    if (strength === 2) {
                        bar.style.background = '#f59e0b';
                    }

                    if (strength === 3) {
                        bar.style.background = '#14b8a6';
                    }

                    if (strength === 4) {
                        bar.style.background = '#0f766e';
                    }

                }

            });


            if (!password) {

                text.textContent =
                    'Enter a password';

                text.style.color =
                    '#94a3b8';

            } else if (strength === 1) {

                text.textContent =
                    'Weak';

                text.style.color =
                    '#ef4444';

            } else if (strength === 2) {

                text.textContent =
                    'Fair';

                text.style.color =
                    '#f59e0b';

            } else if (strength === 3) {

                text.textContent =
                    'Good';

                text.style.color =
                    '#14b8a6';

            } else {

                text.textContent =
                    'Strong';

                text.style.color =
                    '#0f766e';

            }

        }

    </script>

</main>