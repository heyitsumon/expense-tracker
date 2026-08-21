<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', 'Expense Tracker')
    </title>

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    >

    {{-- Google Material Symbols --}}
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,400,0,0"
    >

    @livewireStyles

    <style>

        /* =====================================================
           GLOBAL
        ====================================================== */

        :root {
            color-scheme: light;
        }

        html,
        body {
            min-height: 100%;
        }

        body {
            margin: 0;
            background: #f8fafc;
            color: #1f2937;
            transition:
                background-color .25s ease,
                color .25s ease;
        }

        .material-symbols-outlined {
            font-size: 1.2em;
            line-height: 1;
            vertical-align: middle;

            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;
        }


        /* =====================================================
           PAGE WRAPPER
        ====================================================== */

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }


        /* =====================================================
           NAVBAR
        ====================================================== */

        .main-navbar {
            background: #ffffff !important;
            border-bottom: 1px solid #e5e7eb !important;
            transition: .25s ease;
        }

        .navbar-brand {
            text-decoration: none;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            background: #111827;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            box-shadow:
                0 4px 10px rgba(15, 23, 42, .12);
        }

        .brand-icon span {
            font-size: 23px;
        }

        .brand-name {
            color: #111827;
            font-size: 16px;
            line-height: 1.2;
        }

        .nav-link {
            color: #475569 !important;
            font-size: 14px;
            font-weight: 500;

            padding: 9px 12px !important;

            border-radius: 9px;

            transition: .2s ease;
        }

        .nav-link:hover {
            color: #0f766e !important;
            background: #f0fdfa;
        }

        .nav-link.active {
            color: #0f766e !important;
            background: #f0fdfa;
        }


        /* =====================================================
           THEME BUTTON
        ====================================================== */

        .theme-toggle {
            display: inline-grid;
            place-items: center;

            width: 38px;
            height: 38px;

            border: 1px solid #dce5ef;
            border-radius: 10px;

            color: #526b86;
            background: transparent;

            cursor: pointer;

            transition: .2s ease;
        }

        .theme-toggle:hover {
            color: #0f766e;
            border-color: #0f766e;
            background: #f0fdfa;
        }


        /* =====================================================
           USER AVATAR
        ====================================================== */

        .user-avatar {
            width: 38px;
            height: 38px;

            object-fit: cover;

            border-radius: 50%;

            border: 2px solid #e2e8f0;
        }

        .user-avatar-placeholder {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: #111827;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 600;
        }


        /* =====================================================
           DROPDOWN
        ====================================================== */

        .dropdown-menu {
            border-radius: 12px;
            padding: 7px;

            border: 1px solid #e5e7eb;

            box-shadow:
                0 12px 35px rgba(15, 23, 42, .12);
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 9px 10px;

            font-size: 14px;
        }

        .dropdown-item:hover {
            background: #f1f5f9;
        }


        /* =====================================================
           FOOTER
        ====================================================== */

        .main-footer {
            margin-top: 50px;

            background: #111827;
            color: #cbd5e1;

            border-top: 1px solid #1e293b;
        }

        .footer-container {
            padding-top: 45px;
            padding-bottom: 25px;
        }

        .footer-brand {
            color: #ffffff;
            font-weight: 700;
            font-size: 18px;

            text-decoration: none;
        }

        .footer-brand-icon {
            width: 38px;
            height: 38px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            background: #0f766e;
            color: white;

            border-radius: 10px;

            margin-right: 8px;
        }

        .footer-description {
            color: #94a3b8;
            font-size: 13px;
            line-height: 1.7;

            max-width: 360px;

            margin-top: 14px;
        }

        .footer-title {
            color: #ffffff;

            font-size: 14px;
            font-weight: 600;

            margin-bottom: 16px;
        }

        .footer-link {
            display: flex;
            align-items: center;
            gap: 7px;

            color: #94a3b8;

            font-size: 13px;

            text-decoration: none;

            margin-bottom: 10px;

            transition: .2s ease;
        }

        .footer-link:hover {
            color: #ffffff;
            transform: translateX(2px);
        }

        .footer-link .material-symbols-outlined {
            font-size: 18px;
        }


        /* =====================================================
           FOOTER BOTTOM
        ====================================================== */

        .footer-bottom {
            border-top: 1px solid #263244;

            padding: 18px 0;
        }

        .footer-copy {
            color: #94a3b8;
            font-size: 12px;
        }

        .footer-bottom-links {
            display: flex;
            justify-content: flex-end;
            gap: 18px;
        }

        .footer-bottom-link {
            color: #94a3b8;

            font-size: 12px;

            text-decoration: none;
        }

        .footer-bottom-link:hover {
            color: #ffffff;
        }


        /* =====================================================
           MOBILE
        ====================================================== */

        @media (max-width: 991.98px) {

            .navbar-collapse {
                padding: 15px 0;
            }

            .navbar-nav {
                align-items: stretch !important;
            }

            .nav-item {
                margin-bottom: 4px;
            }

            .theme-toggle {
                margin-bottom: 5px;
            }

            .dropdown-menu {
                border: 1px solid #e5e7eb;
                box-shadow: none;
                margin-top: 5px !important;
            }

            .footer-container {
                padding-top: 35px;
            }

        }


        @media (max-width: 767.98px) {

            .footer-description {
                max-width: 100%;
            }

            .footer-column {
                margin-bottom: 25px;
            }

            .footer-bottom {
                text-align: center;
            }

            .footer-bottom-links {
                justify-content: center;
                margin-top: 10px;
            }

        }


        @media (max-width: 575.98px) {

            .brand-name {
                font-size: 15px;
            }

            .brand-icon {
                width: 39px;
                height: 39px;
            }

            .footer-bottom-links {
                flex-wrap: wrap;
                gap: 12px;
            }

        }


        /* =====================================================
           DARK MODE
        ====================================================== */

        html[data-theme="dark"] {
            color-scheme: dark;
        }

        html[data-theme="dark"] body {
            background: #0f172a;
            color: #e5edf5;
        }

        html[data-theme="dark"] .main-navbar {
            background: #111c31 !important;
            border-color: #26354b !important;
        }

        html[data-theme="dark"] .brand-name {
            color: #f8fafc !important;
        }

        html[data-theme="dark"] .nav-link {
            color: #cbd5e1 !important;
        }

        html[data-theme="dark"] .nav-link:hover,
        html[data-theme="dark"] .nav-link.active {
            color: #5eead4 !important;
            background: #17313b;
        }

        html[data-theme="dark"] .dropdown-menu {
            color: #e5edf5;
            background: #18253b;
            border-color: #2d3d55;
        }

        html[data-theme="dark"] .dropdown-item {
            color: #d8e3ee;
        }

        html[data-theme="dark"] .dropdown-item:hover {
            color: #ffffff;
            background: #243650;
        }

        html[data-theme="dark"] .dropdown-divider {
            border-color: #34465f;
        }

        html[data-theme="dark"] .text-dark {
            color: #edf4fa !important;
        }

        html[data-theme="dark"] .text-secondary,
        html[data-theme="dark"] .text-muted {
            color: #a7b8ca !important;
        }

        html[data-theme="dark"] .theme-toggle {
            color: #c9d7e6;
            border-color: #40536d;
        }

        html[data-theme="dark"] .theme-toggle:hover {
            color: #5eead4;
            border-color: #5eead4;
            background: #17313b;
        }

        html[data-theme="dark"] .navbar-toggler-icon {
            filter: invert(1);
        }

    </style>


    {{-- Load theme before page renders --}}
    <script>
        (() => {

            const savedTheme =
                localStorage.getItem('expense-tracker-theme');

            const preferredTheme =
                window.matchMedia('(prefers-color-scheme: dark)').matches
                    ? 'dark'
                    : 'light';

            document.documentElement.dataset.theme =
                savedTheme || preferredTheme;

        })();
    </script>

     <link
        rel="icon"
        type="image/png"
        href="{{ asset('favicon.png') }}"
    >

</head>


<body>

<div class="page-wrapper">

     {{-- Global scrolling announcement --}}
    <x-global-ticker />

    {{-- =====================================================
         NAVBAR
    ====================================================== --}}

    <header>

        <nav class="navbar navbar-expand-lg main-navbar shadow-sm">

            <div class="container">


                {{-- BRAND --}}

                <a
                    href="{{ route('dashboard') }}"
                    wire:navigate
                    class="navbar-brand d-flex align-items-center gap-2"
                >

                    <div class="brand-icon">

                        <span class="material-symbols-outlined">
                            account_balance_wallet
                        </span>

                    </div>

                    <div>

                        <div class="brand-name fw-bold">
                            {{ config('app.name') }}
                        </div>

                    </div>

                </a>


                {{-- MOBILE TOGGLE --}}

                <button
                    class="navbar-toggler border-0 shadow-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >

                    <span class="navbar-toggler-icon"></span>

                </button>


                {{-- NAVBAR CONTENT --}}

                <div
                    class="collapse navbar-collapse"
                    id="mainNavbar"
                >

                    <ul
                        class="navbar-nav ms-auto align-items-lg-center gap-lg-2 mt-3 mt-lg-0"
                    >


                        {{-- THEME --}}

                        <li class="nav-item">

                            <button
                                type="button"
                                class="theme-toggle"
                                data-theme-toggle
                                aria-label="Switch theme"
                                title="Switch theme"
                            >

                                <span
                                    class="material-symbols-outlined"
                                    data-theme-icon
                                >
                                    dark_mode
                                </span>

                            </button>

                        </li>


                        {{-- DASHBOARD --}}

                        <li class="nav-item">

                            <a
                                href="{{ route('dashboard') }}"
                                wire:navigate
                                class="nav-link d-flex align-items-center gap-1
                                {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}"
                            >

                                <span class="material-symbols-outlined">
                                    dashboard
                                </span>

                                Dashboard

                            </a>

                        </li>


                        {{-- USER --}}

                        @auth

                        <li class="nav-item dropdown">

                            <a
                                class="nav-link dropdown-toggle d-flex align-items-center gap-2"
                                href="#"
                                id="userDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >

                                @if(auth()->user()->avatar)

                                    <img
                                        src="{{ auth()->user()->avatar }}"
                                        alt="Profile"
                                        class="user-avatar"
                                    >

                                @else

                                    <div class="user-avatar-placeholder">

                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                                    </div>

                                @endif

                            </a>


                            {{-- USER DROPDOWN --}}

                            <ul
                                class="dropdown-menu dropdown-menu-end mt-2"
                                style="min-width:260px;"
                            >

                                {{-- USER INFO --}}

                                <li class="px-3 py-2">

                                    <div class="d-flex align-items-center gap-2">

                                        @if(auth()->user()->avatar)

                                            <img
                                                src="{{ auth()->user()->avatar }}"
                                                alt="Profile"
                                                width="44"
                                                height="44"
                                                class="rounded-circle"
                                            >

                                        @else

                                            <div
                                                class="rounded-circle bg-dark text-white
                                                d-flex align-items-center justify-content-center"
                                                style="width:44px;height:44px;"
                                            >

                                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                                            </div>

                                        @endif


                                        <div class="overflow-hidden">

                                            <div class="fw-semibold text-dark">

                                                {{ auth()->user()->name }}

                                            </div>

                                            <small class="text-secondary text-truncate d-block">

                                                {{ auth()->user()->email }}

                                            </small>

                                        </div>

                                    </div>

                                </li>


                                <li>
                                    <hr class="dropdown-divider">
                                </li>


                                {{-- CURRENCY --}}

                                <li>

                                    <a
                                        href="{{ route('currency.edit') }}"
                                        wire:navigate
                                        class="dropdown-item"
                                    >

                                        <span class="material-symbols-outlined me-1">
                                            currency_exchange
                                        </span>

                                        Currency

                                        <small class="text-secondary d-block ps-4">

                                            Current:
                                            {{ auth()->user()->currency ?? 'BDT' }}

                                        </small>

                                    </a>

                                </li>


                                {{-- SECURITY --}}

                                <li>

                                    <a
                                        href="{{ route('password.edit') }}#security"
                                        wire:navigate
                                        class="dropdown-item d-flex align-items-center"
                                    >

                                        <span class="material-symbols-outlined me-1">
                                            lock
                                        </span>

                                        Password & Security

                                    </a>

                                </li>


                                <li>
                                    <hr class="dropdown-divider">
                                </li>


                                {{-- LOGOUT --}}

                                <li class="px-2">

                                    <form
                                        action="{{ route('logout') }}"
                                        method="POST"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="dropdown-item text-danger rounded d-flex align-items-center"
                                        >

                                            <span class="material-symbols-outlined me-1">
                                                logout
                                            </span>

                                            Sign Out

                                        </button>

                                    </form>

                                </li>

                            </ul>

                        </li>

                        @endauth

                    </ul>

                </div>

            </div>

        </nav>

    </header>


    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <main>

        @yield('content')

    </main>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <footer class="main-footer">

        <div class="container footer-container">

            <div class="row g-4">


                {{-- BRAND COLUMN --}}

                <div class="col-12 col-md-6 col-lg-5 footer-column">

                    <a
                        href="{{ route('dashboard') }}"
                        wire:navigate
                        class="footer-brand d-inline-flex align-items-center"
                    >

                        <span class="footer-brand-icon">

                            <span class="material-symbols-outlined">
                                account_balance_wallet
                            </span>

                        </span>

                        {{ config('app.name') }}

                    </a>


                    <p class="footer-description">

                        A simple and powerful way to manage your
                        income, expenses, and personal finances
                        in one place.

                    </p>

                </div>


                {{-- QUICK LINKS --}}

                <div class="col-6 col-md-3 col-lg-3 footer-column">

                    <div class="footer-title">
                        Quick Links
                    </div>


                    <a
                        href="{{ route('dashboard') }}"
                        wire:navigate
                        class="footer-link"
                    >

                        <span class="material-symbols-outlined">
                            dashboard
                        </span>

                        Dashboard

                    </a>


                    @auth

                        <a
                            href="{{ route('currency.edit') }}"
                            wire:navigate
                            class="footer-link"
                        >

                            <span class="material-symbols-outlined">
                                currency_exchange
                            </span>

                            Currency

                        </a>

                    @endauth

                </div>


                {{-- ACCOUNT --}}

                <div class="col-6 col-md-3 col-lg-4 footer-column">

                    <div class="footer-title">
                        Account
                    </div>


                    @auth

                        <a
                            href="{{ route('password.edit') }}#security"
                            wire:navigate
                            class="footer-link"
                        >

                            <span class="material-symbols-outlined">
                                security
                            </span>

                            Security

                        </a>


                        <a
                            href="{{ route('password.edit') }}#security"
                            wire:navigate
                            class="footer-link"
                        >

                            <span class="material-symbols-outlined">
                                lock
                            </span>

                            Password

                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="footer-link"
                        >

                            <span class="material-symbols-outlined">
                                login
                            </span>

                            Sign In

                        </a>

                    @endauth

                </div>

            </div>

        </div>


        {{-- FOOTER BOTTOM --}}

        <div class="footer-bottom">

            <div class="container">

                <div class="row align-items-center g-2">

                    <div class="col-12 col-md-6">

                        <div class="footer-copy">

                            © {{ date('Y') }}
                            {{ config('app.name') }}.
                            All rights reserved.

                        </div>

                    </div>


                    <div class="col-12 col-md-6">

                        <div class="footer-bottom-links">

                            <a
                                href="#"
                                class="footer-bottom-link"
                            >
                                Privacy
                            </a>

                            <a
                                href="#"
                                class="footer-bottom-link"
                            >
                                Terms
                            </a>

                            <span class="footer-bottom-link">

                                <span class="material-symbols-outlined"
                                    style="font-size:14px;">
                                    favorite
                                </span>

                                Built with Laravel

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </footer>

</div>


{{-- =====================================================
     BOOTSTRAP
====================================================== --}}

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"
></script>

@livewireScripts


{{-- =====================================================
     DARK MODE SCRIPT
====================================================== --}}

<script>

    (() => {

        const toggle =
            document.querySelector('[data-theme-toggle]');

        const icon =
            document.querySelector('[data-theme-icon]');


        const updateIcon = () => {

            const isDark =
                document.documentElement.dataset.theme === 'dark';


            if (icon) {

                icon.textContent =
                    isDark
                        ? 'light_mode'
                        : 'dark_mode';

            }


            if (toggle) {

                toggle.setAttribute(
                    'aria-label',
                    isDark
                        ? 'Switch to light mode'
                        : 'Switch to dark mode'
                );

            }

        };


        toggle?.addEventListener('click', () => {

            const nextTheme =
                document.documentElement.dataset.theme === 'dark'
                    ? 'light'
                    : 'dark';


            document.documentElement.dataset.theme =
                nextTheme;


            localStorage.setItem(
                'expense-tracker-theme',
                nextTheme
            );


            updateIcon();

        });


        updateIcon();

    })();

</script>

</body>

</html>