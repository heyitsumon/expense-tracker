<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
        content="Expense Tracker helps you track income, manage expenses, understand spending and take control of your finances.">

    <title>Expense Tracker — Take Control of Your Money</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,400,0,0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg: #f7faf9;
            --surface: #ffffff;
            --surface-2: #f1f7f5;

            --ink: #0f172a;
            --muted: #64748b;

            --primary: #0f766e;
            --primary-light: #d8f5ee;

            --accent: #8b5cf6;
            --orange: #f97316;

            --border: #e2e8f0;

            --shadow-sm: 0 10px 30px rgba(15, 23, 42, .06);
            --shadow-lg: 0 30px 90px rgba(15, 23, 42, .13);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            color: var(--ink);
            background: var(--bg);
            font-family: 'DM Sans', sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .material-symbols-outlined {
            font-size: 20px;
            line-height: 1;
            vertical-align: middle;
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;
        }

        .landing {
            overflow: hidden;
        }

        .container {
            width: min(1180px, calc(100% - 40px));
            margin: auto;
        }

        /* =========================
           NAVBAR
        ========================== */

        .navbar {
            position: relative;
            z-index: 20;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 22px 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            font-family: 'Space Grotesk', sans-serif;
            font-size: 17px;
            font-weight: 700;
        }

        .brand-icon {
            display: grid;
            place-items: center;

            width: 42px;
            height: 42px;

            border-radius: 13px;

            color: white;
            background: linear-gradient(135deg, #0f766e, #14b8a6);

            box-shadow:
                0 10px 25px rgba(15, 118, 110, .25);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;

            color: var(--muted);

            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a {
            transition: .2s ease;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-login {
            padding: 10px 0;
        }

        .nav-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 11px 17px;

            color: white !important;
            background: var(--ink);

            border-radius: 10px;

            transition: .2s ease;
        }

        .nav-button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        /* =========================
           HERO
        ========================== */

        .hero {
            position: relative;

            display: grid;
            grid-template-columns: .92fr 1.08fr;

            align-items: center;

            gap: 70px;

            min-height: 680px;

            padding: 55px 0 100px;
        }

        .hero::before {
            content: '';

            position: absolute;
            z-index: -2;

            width: 500px;
            height: 500px;

            top: -150px;
            left: -220px;

            border-radius: 50%;

            background: #d9f7ef;

            filter: blur(10px);

            opacity: .8;
        }

        .hero::after {
            content: '';

            position: absolute;
            z-index: -2;

            width: 400px;
            height: 400px;

            right: -200px;
            top: 50px;

            border-radius: 50%;

            background: #ede9fe;

            filter: blur(15px);

            opacity: .7;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 7px 12px;

            border: 1px solid #ccece4;
            border-radius: 999px;

            color: var(--primary);

            background: rgba(255,255,255,.7);

            font-size: 12px;
            font-weight: 700;
        }

        .badge-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #14b8a6;

            box-shadow: 0 0 0 5px #d8f5ee;
        }

        h1,
        h2,
        h3 {
            font-family: 'Space Grotesk', sans-serif;
        }

        h1 {
            max-width: 650px;

            margin: 22px 0 0;

            font-size: clamp(48px, 6vw, 78px);

            line-height: .98;

            letter-spacing: -.055em;
        }

        h1 span {
            color: var(--primary);
        }

        .hero-description {
            max-width: 530px;

            margin: 26px 0 32px;

            color: var(--muted);

            font-size: 18px;
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 12px;

            flex-wrap: wrap;
        }

        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;

            padding: 15px 20px;

            color: white;

            background: var(--ink);

            border-radius: 11px;

            font-weight: 700;

            box-shadow: 0 12px 25px rgba(15,23,42,.12);

            transition: .2s ease;
        }

        .primary-button:hover {
            color: white;

            transform: translateY(-3px);

            box-shadow:
                0 18px 35px rgba(15,23,42,.18);
        }

        .secondary-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 15px 18px;

            color: var(--ink);

            border: 1px solid var(--border);

            border-radius: 11px;

            background: rgba(255,255,255,.7);

            font-weight: 600;
        }

        .trust-row {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-top: 28px;

            color: var(--muted);

            font-size: 12px;
        }

        .trust-avatars {
            display: flex;
        }

        .avatar {
            display: grid;
            place-items: center;

            width: 29px;
            height: 29px;

            margin-left: -7px;

            border: 2px solid var(--bg);

            border-radius: 50%;

            color: white;

            background: var(--primary);

            font-size: 9px;
            font-weight: 700;
        }

        .avatar:first-child {
            margin-left: 0;
        }

        .avatar:nth-child(2) {
            background: var(--accent);
        }

        .avatar:nth-child(3) {
            background: var(--orange);
        }

        /* =========================
           DASHBOARD PREVIEW
        ========================== */

        .dashboard-area {
            position: relative;
        }

        .floating-card {
            position: absolute;
            z-index: 5;

            display: flex;
            align-items: center;
            gap: 10px;

            padding: 12px 14px;

            border: 1px solid rgba(255,255,255,.9);

            border-radius: 13px;

            background: rgba(255,255,255,.88);

            backdrop-filter: blur(15px);

            box-shadow: var(--shadow-sm);

            font-size: 11px;
            font-weight: 700;

            animation: floating 4s ease-in-out infinite;
        }

        .floating-card.top {
            top: -25px;
            right: -25px;
        }

        .floating-card.bottom {
            bottom: -22px;
            left: -30px;

            animation-delay: 1s;
        }

        .floating-icon {
            display: grid;
            place-items: center;

            width: 32px;
            height: 32px;

            border-radius: 9px;

            color: var(--primary);

            background: var(--primary-light);
        }

        @keyframes floating {
            0%,100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .dashboard {
            position: relative;

            padding: 20px;

            border: 1px solid rgba(255,255,255,.8);

            border-radius: 24px;

            background: rgba(255,255,255,.72);

            backdrop-filter: blur(20px);

            box-shadow: var(--shadow-lg);
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 16px;
        }

        .dashboard-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 16px;
            font-weight: 700;
        }

        .dashboard-date {
            padding: 7px 10px;

            border: 1px solid var(--border);

            border-radius: 8px;

            color: var(--muted);

            background: white;

            font-size: 10px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1.4fr .6fr;
            gap: 13px;
        }

        .balance-card {
            min-height: 230px;

            padding: 21px;

            border-radius: 17px;

            color: white;

            background:
                radial-gradient(circle at 100% 0%, #1d9d90, transparent 45%),
                #0f172a;
        }

        .balance-label {
            color: #9fb2c1;

            font-size: 11px;
        }

        .balance-value {
            margin-top: 8px;

            font-family: 'Space Grotesk', sans-serif;

            font-size: 34px;
            font-weight: 700;
        }

        .balance-change {
            display: inline-flex;
            align-items: center;
            gap: 5px;

            margin-top: 8px;

            color: #7de1ca;

            font-size: 11px;
            font-weight: 700;
        }

        .chart {
            display: flex;
            align-items: end;
            gap: 8px;

            height: 75px;

            margin-top: 27px;
        }

        .bar {
            flex: 1;

            border-radius: 5px 5px 2px 2px;

            background: linear-gradient(
                to top,
                #14b8a6,
                #7de1ca
            );
        }

        .bar:nth-child(1) { height: 35%; }
        .bar:nth-child(2) { height: 52%; }
        .bar:nth-child(3) { height: 44%; }
        .bar:nth-child(4) { height: 68%; }
        .bar:nth-child(5) { height: 55%; }
        .bar:nth-child(6) { height: 88%; }
        .bar:nth-child(7) { height: 74%; }

        .income-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            padding: 17px;

            border: 1px solid var(--border);

            border-radius: 17px;

            background: white;
        }

        .income-card small {
            color: var(--muted);

            font-size: 10px;
        }

        .income-card strong {
            font-family: 'Space Grotesk', sans-serif;

            font-size: 24px;
        }

        .income-positive {
            color: var(--primary);

            font-size: 11px;
            font-weight: 700;
        }

        .transactions {
            margin-top: 13px;

            padding: 17px;

            border: 1px solid var(--border);

            border-radius: 17px;

            background: white;
        }

        .transactions-header {
            display: flex;
            justify-content: space-between;

            margin-bottom: 12px;

            font-size: 12px;
            font-weight: 700;
        }

        .transactions-header span {
            color: var(--primary);

            font-size: 10px;
        }

        .transaction {
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 11px 0;

            border-top: 1px solid #edf2f0;
        }

        .transaction-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .transaction-icon {
            display: grid;
            place-items: center;

            width: 31px;
            height: 31px;

            border-radius: 9px;

            color: var(--orange);

            background: #fff3ea;
        }

        .transaction-icon.income {
            color: var(--primary);
            background: var(--primary-light);
        }

        .transaction-name {
            font-size: 11px;
            font-weight: 700;
        }

        .transaction-meta {
            margin-top: 3px;

            color: var(--muted);

            font-size: 9px;
        }

        .expense {
            color: #ef4444;

            font-size: 11px;
            font-weight: 700;
        }

        .income {
            color: var(--primary);

            font-size: 11px;
            font-weight: 700;
        }

        /* =========================
           LOGOS / TRUST
        ========================== */

        .trust-section {
            padding: 30px 0;

            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);

            background: white;
        }

        .trust-section p {
            margin: 0 0 20px;

            text-align: center;

            color: var(--muted);

            font-size: 11px;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .trust-items {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 55px;

            color: #94a3b8;

            font-family: 'Space Grotesk', sans-serif;
            font-size: 15px;
            font-weight: 700;
        }

        /* =========================
           FEATURES
        ========================== */

        .section {
            padding: 105px 0;
        }

        .section.white {
            background: white;
        }

        .section-heading {
            max-width: 680px;

            margin-bottom: 45px;
        }

        .section-label {
            margin-bottom: 12px;

            color: var(--primary);

            font-size: 12px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        h2 {
            margin: 0;

            font-size: clamp(35px, 4vw, 53px);

            line-height: 1.03;

            letter-spacing: -.05em;
        }

        .section-description {
            max-width: 560px;

            margin: 18px 0 0;

            color: var(--muted);

            font-size: 16px;
            line-height: 1.7;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 17px;
        }

        .feature-card {
            position: relative;

            min-height: 235px;

            padding: 25px;

            border: 1px solid var(--border);

            border-radius: 18px;

            background: #fbfdfc;

            transition: .25s ease;
        }

        .feature-card:hover {
            transform: translateY(-6px);

            border-color: #b8ded6;

            box-shadow: var(--shadow-sm);
        }

        .feature-icon {
            display: grid;
            place-items: center;

            width: 44px;
            height: 44px;

            border-radius: 12px;

            color: var(--primary);

            background: var(--primary-light);
        }

        .feature-number {
            position: absolute;

            top: 23px;
            right: 23px;

            color: #cbd5e1;

            font-family: 'Space Grotesk', sans-serif;

            font-size: 12px;
            font-weight: 700;
        }

        .feature-card h3 {
            margin: 32px 0 9px;

            font-size: 19px;
        }

        .feature-card p {
            margin: 0;

            color: var(--muted);

            font-size: 13px;

            line-height: 1.65;
        }

        /* =========================
           STEPS
        ========================== */

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 25px;
        }

        .step {
            padding: 30px 0;

            border-top: 2px solid var(--border);
        }

        .step-number {
            color: var(--primary);

            font-family: 'Space Grotesk', sans-serif;

            font-size: 14px;
            font-weight: 700;
        }

        .step h3 {
            margin: 24px 0 10px;

            font-size: 21px;
        }

        .step p {
            margin: 0;

            color: var(--muted);

            font-size: 14px;
            line-height: 1.7;
        }

        /* =========================
           TESTIMONIALS
        ========================== */

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 17px;
        }

        .testimonial {
            padding: 25px;

            border: 1px solid var(--border);

            border-radius: 18px;

            background: #fbfdfc;
        }

        .stars {
            color: #f59e0b;

            letter-spacing: 2px;
        }

        .testimonial blockquote {
            margin: 20px 0 25px;

            font-size: 14px;

            line-height: 1.7;
        }

        .person {
            display: flex;
            align-items: center;

            gap: 10px;
        }

        .person-avatar {
            display: grid;
            place-items: center;

            width: 36px;
            height: 36px;

            border-radius: 50%;

            color: white;

            background: var(--primary);

            font-size: 11px;
            font-weight: 700;
        }

        .person strong {
            display: block;

            font-size: 12px;
        }

        .person small {
            display: block;

            margin-top: 3px;

            color: var(--muted);

            font-size: 10px;
        }

        /* =========================
           CTA
        ========================== */

        .cta {
            padding: 90px 0;

            color: white;

            background:
                radial-gradient(
                    circle at 80% 20%,
                    rgba(20,184,166,.35),
                    transparent 35%
                ),
                #0f172a;
        }

        .cta-inner {
            display: flex;

            justify-content: space-between;
            align-items: center;

            gap: 50px;
        }

        .cta h2 {
            max-width: 650px;
        }

        .cta p {
            max-width: 550px;

            margin: 17px 0 0;

            color: #a9b7c8;

            font-size: 16px;

            line-height: 1.7;
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            padding: 16px 21px;

            white-space: nowrap;

            color: #0f172a;

            background: #d8f5ee;

            border-radius: 11px;

            font-weight: 700;

            transition: .2s ease;
        }

        .cta-button:hover {
            transform: translateY(-3px);

            color: #0f172a;

            box-shadow: 0 15px 35px rgba(0,0,0,.2);
        }

        .cta-badges {
            display: flex;
            flex-wrap: wrap;

            gap: 9px;

            margin-top: 28px;

            color: #9fb0c2;

            font-size: 11px;
        }

        .cta-badges span {
            padding: 7px 10px;

            border: 1px solid #334155;

            border-radius: 999px;
        }

        /* =========================
           FOOTER
        ========================== */

        footer {
            padding: 25px 0;

            color: var(--muted);

            background: white;

            font-size: 12px;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-links {
            display: flex;
            gap: 20px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {

            .hero {
                grid-template-columns: 1fr;

                gap: 60px;
            }

            .dashboard-area {
                width: min(650px, 100%);

                margin: auto;
            }

            .feature-grid,
            .testimonial-grid,
            .steps-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .cta-inner {
                display: block;
            }

            .cta-button {
                margin-top: 28px;
            }
        }

        @media (max-width: 650px) {

            .container {
                width: min(100% - 28px, 1180px);
            }

            .nav-links a:not(.nav-button) {
                display: none;
            }

            .hero {
                min-height: auto;

                padding: 55px 0 80px;
            }

            h1 {
                font-size: 49px;
            }

            .hero-description {
                font-size: 16px;
            }

            .dashboard {
                padding: 12px;

                border-radius: 17px;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .floating-card.top {
                right: -5px;
            }

            .floating-card.bottom {
                left: -5px;
            }

            .trust-items {
                flex-wrap: wrap;

                gap: 20px;
            }

            .feature-grid,
            .testimonial-grid,
            .steps-grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 75px 0;
            }

            .footer-inner {
                display: block;
            }

            .footer-links {
                margin-top: 12px;
            }
        }

        @media (max-width: 420px) {

            h1 {
                font-size: 44px;
            }

            .hero-buttons {
                align-items: stretch;

                flex-direction: column;
            }

            .primary-button,
            .secondary-button {
                width: 100%;
            }

            .floating-card {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="landing">

    <!-- =========================
         NAVBAR
    ========================== -->

    <div class="container">

        <nav class="navbar">

            <a href="{{ route('home') }}" class="brand">

                <span class="brand-icon">
                    <span class="material-symbols-outlined">
                        account_balance_wallet
                    </span>
                </span>

                <span>Expense Tracker</span>

            </a>

            <div class="nav-links">

                <a href="#features">
                    Features
                </a>

                <a href="#how-it-works">
                    How it works
                </a>

                <a href="#reviews">
                    Reviews
                </a>

                <a href="{{ route('login') }}" class="nav-login">
                    Sign in
                </a>

                <a href="{{ route('google.login') }}" class="nav-button">
                    Get started

                    <span class="material-symbols-outlined">
                        arrow_forward
                    </span>
                </a>

            </div>

        </nav>

    </div>


    <!-- =========================
         HERO
    ========================== -->

    <main>

        <section class="hero container">

            <div>

                <div class="badge">

                    <span class="badge-dot"></span>

                    Simple money management

                </div>

                <h1>
                    Your money.
                    <span>Your clarity.</span>
                </h1>

                <p class="hero-description">

                    Track income, manage expenses, understand
                    your spending and build better financial habits —
                    all from one beautiful dashboard.

                </p>

                <div class="hero-buttons">

                    <a href="{{ route('google.login') }}"
                       class="primary-button">

                        Start Tracking Free

                        <span class="material-symbols-outlined">
                            arrow_forward
                        </span>

                    </a>

                    <a href="#features"
                       class="secondary-button">

                        Explore features

                        <span class="material-symbols-outlined">
                            expand_more
                        </span>

                    </a>

                </div>

                <div class="trust-row">

                    <div class="trust-avatars">

                        <span class="avatar">AR</span>
                        <span class="avatar">NS</span>
                        <span class="avatar">TM</span>

                    </div>

                    <span>
                        Built for everyday financial decisions
                    </span>

                </div>

            </div>


            <!-- DASHBOARD -->

            <div class="dashboard-area">

                <div class="floating-card top">

                    <span class="floating-icon">
                        <span class="material-symbols-outlined">
                            trending_up
                        </span>
                    </span>

                    Spending is under control

                </div>


                <div class="dashboard">

                    <div class="dashboard-header">

                        <div class="dashboard-title">
                            Financial Overview
                        </div>

                        <div class="dashboard-date">
                            AUG 2026
                        </div>

                    </div>


                    <div class="dashboard-grid">

                        <div class="balance-card">

                            <div class="balance-label">
                                Available balance
                            </div>

                            <div class="balance-value">
                                ৳84,250.50
                            </div>

                            <div class="balance-change">

                                <span class="material-symbols-outlined">
                                    trending_up
                                </span>

                                12.4% this month

                            </div>

                            <div class="chart">

                                <i class="bar"></i>
                                <i class="bar"></i>
                                <i class="bar"></i>
                                <i class="bar"></i>
                                <i class="bar"></i>
                                <i class="bar"></i>
                                <i class="bar"></i>

                            </div>

                        </div>


                        <div class="income-card">

                            <small>
                                Income this month
                            </small>

                            <strong>
                                ৳125,240
                            </strong>

                            <span class="income-positive">
                                ↗ 12.4%
                            </span>

                        </div>

                    </div>


                    <div class="transactions">

                        <div class="transactions-header">

                            <span>
                                Recent activity
                            </span>

                            <span>
                                View all →
                            </span>

                        </div>


                        <div class="transaction">

                            <div class="transaction-left">

                                <div class="transaction-icon">

                                    <span class="material-symbols-outlined">
                                        shopping_cart
                                    </span>

                                </div>

                                <div>

                                    <div class="transaction-name">
                                        Groceries
                                    </div>

                                    <div class="transaction-meta">
                                        Today · Food
                                    </div>

                                </div>

                            </div>

                            <strong class="expense">
                                -৳2,450
                            </strong>

                        </div>


                        <div class="transaction">

                            <div class="transaction-left">

                                <div class="transaction-icon income">

                                    <span class="material-symbols-outlined">
                                        payments
                                    </span>

                                </div>

                                <div>

                                    <div class="transaction-name">
                                        Monthly Salary
                                    </div>

                                    <div class="transaction-meta">
                                        Yesterday · Income
                                    </div>

                                </div>

                            </div>

                            <strong class="income">
                                +৳65,000
                            </strong>

                        </div>


                        <div class="transaction">

                            <div class="transaction-left">

                                <div class="transaction-icon">

                                    <span class="material-symbols-outlined">
                                        directions_car
                                    </span>

                                </div>

                                <div>

                                    <div class="transaction-name">
                                        Transport
                                    </div>

                                    <div class="transaction-meta">
                                        Aug 19 · Transport
                                    </div>

                                </div>

                            </div>

                            <strong class="expense">
                                -৳850
                            </strong>

                        </div>

                    </div>

                </div>


                <div class="floating-card bottom">

                    <span class="floating-icon">

                        <span class="material-symbols-outlined">
                            savings
                        </span>

                    </span>

                    Save more. Stress less.

                </div>

            </div>

        </section>


        <!-- =========================
             TRUST
        ========================== -->

        <section class="trust-section">

            <div class="container">

                <p>
                    A simple dashboard for a clearer financial life
                </p>

                <div class="trust-items">

                    <span>TRACK</span>
                    <span>ANALYZE</span>
                    <span>PLAN</span>
                    <span>SAVE</span>
                    <span>GROW</span>

                </div>

            </div>

        </section>


        <!-- =========================
             FEATURES
        ========================== -->

        <section class="section white" id="features">

            <div class="container">

                <div class="section-heading">

                    <div class="section-label">
                        Everything you need
                    </div>

                    <h2>
                        Financial clarity without the complexity.
                    </h2>

                    <p class="section-description">

                        Expense Tracker gives you the essential tools
                        to understand where your money comes from,
                        where it goes and what you can do next.

                    </p>

                </div>


                <div class="feature-grid">


                    <article class="feature-card">

                        <div class="feature-icon">
                            <span class="material-symbols-outlined">
                                payments
                            </span>
                        </div>

                        <span class="feature-number">
                            01
                        </span>

                        <h3>
                            Track Income
                        </h3>

                        <p>
                            Keep salary, freelance, business and
                            other income organized in one place.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-icon">
                            <span class="material-symbols-outlined">
                                receipt_long
                            </span>
                        </div>

                        <span class="feature-number">
                            02
                        </span>

                        <h3>
                            Monitor Expenses
                        </h3>

                        <p>
                            Record daily spending and instantly
                            understand where your money is going.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-icon">
                            <span class="material-symbols-outlined">
                                pie_chart
                            </span>
                        </div>

                        <span class="feature-number">
                            03
                        </span>

                        <h3>
                            Category Breakdown
                        </h3>

                        <p>
                            See exactly how your income and expenses
                            are distributed across categories.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-icon">
                            <span class="material-symbols-outlined">
                                tune
                            </span>
                        </div>

                        <span class="feature-number">
                            04
                        </span>

                        <h3>
                            Custom Categories
                        </h3>

                        <p>
                            Create categories that match your personal
                            financial life.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-icon">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                        </div>

                        <span class="feature-number">
                            05
                        </span>

                        <h3>
                            Easy Management
                        </h3>

                        <p>
                            Quickly edit or delete transactions whenever
                            you need to correct your records.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-icon">
                            <span class="material-symbols-outlined">
                                security
                            </span>
                        </div>

                        <span class="feature-number">
                            06
                        </span>

                        <h3>
                            Secure & Private
                        </h3>

                        <p>
                            Your financial information stays protected
                            behind secure authentication.
                        </p>

                    </article>


                </div>

            </div>

        </section>


        <!-- =========================
             HOW IT WORKS
        ========================== -->

        <section class="section" id="how-it-works">

            <div class="container">

                <div class="section-heading">

                    <div class="section-label">
                        How it works
                    </div>

                    <h2>
                        Start building better money habits today.
                    </h2>

                </div>


                <div class="steps-grid">

                    <article class="step">

                        <div class="step-number">
                            STEP 01
                        </div>

                        <h3>
                            Create your account
                        </h3>

                        <p>
                            Sign in securely and get your personal
                            financial dashboard ready in seconds.
                        </p>

                    </article>


                    <article class="step">

                        <div class="step-number">
                            STEP 02
                        </div>

                        <h3>
                            Add transactions
                        </h3>

                        <p>
                            Record your income and expenses with
                            categories, dates and useful notes.
                        </p>

                    </article>


                    <article class="step">

                        <div class="step-number">
                            STEP 03
                        </div>

                        <h3>
                            Understand your money
                        </h3>

                        <p>
                            Watch your balance, spending patterns
                            and category breakdowns update instantly.
                        </p>

                    </article>

                </div>

            </div>

        </section>


        <!-- =========================
             REVIEWS
        ========================== -->

        <section class="section white" id="reviews">

            <div class="container">

                <div class="section-heading">

                    <div class="section-label">
                        User feedback
                    </div>

                    <h2>
                        Built to make financial tracking feel simple.
                    </h2>

                </div>


                <div class="testimonial-grid">

                    <article class="testimonial">

                        <div class="stars">
                            ★★★★★
                        </div>

                        <blockquote>
                            “I finally know where my money goes every
                            month. The category breakdown makes
                            everything much easier to understand.”
                        </blockquote>

                        <div class="person">

                            <div class="person-avatar">
                                AR
                            </div>

                            <div>

                                <strong>
                                    Arif Rahman
                                </strong>

                                <small>
                                    Small business owner
                                </small>

                            </div>

                        </div>

                    </article>


                    <article class="testimonial">

                        <div class="stars">
                            ★★★★★
                        </div>

                        <blockquote>
                            “Adding an expense takes only a few seconds.
                            The dashboard makes it easy to stay consistent.”
                        </blockquote>

                        <div class="person">

                            <div class="person-avatar"
                                 style="background:#8b5cf6;">
                                NS
                            </div>

                            <div>

                                <strong>
                                    Nadia Sultana
                                </strong>

                                <small>
                                    Freelance designer
                                </small>

                            </div>

                        </div>

                    </article>


                    <article class="testimonial">

                        <div class="stars">
                            ★★★★★
                        </div>

                        <blockquote>
                            “Clean, focused and easy to use. I especially
                            like being able to generate reports.”
                        </blockquote>

                        <div class="person">

                            <div class="person-avatar"
                                 style="background:#f97316;">
                                TM
                            </div>

                            <div>

                                <strong>
                                    Tanvir Mahmud
                                </strong>

                                <small>
                                    Project manager
                                </small>

                            </div>

                        </div>

                    </article>

                </div>

            </div>

        </section>


        <!-- =========================
             FINAL CTA
        ========================== -->

        <section class="cta">

            <div class="container">

                <div class="cta-inner">

                    <div>

                        <div class="section-label"
                             style="color:#7de1ca;">
                            Take the next step
                        </div>

                        <h2>
                            Make your money easier to understand.
                        </h2>

                        <p>
                            Start tracking your income and expenses today.
                            Build better habits with a simple financial
                            dashboard designed for everyday life.
                        </p>

                        <div class="cta-badges">

                            <span>
                                Free to use
                            </span>

                            <span>
                                Secure authentication
                            </span>

                            <span>
                                Easy to use
                            </span>

                        </div>

                    </div>


                    <a href="{{ route('google.login') }}"
                       class="cta-button">

                        Get Started Free

                        <span class="material-symbols-outlined">
                            arrow_forward
                        </span>

                    </a>

                </div>

            </div>

        </section>

    </main>


    <!-- =========================
         FOOTER
    ========================== -->

    <footer>

        <div class="container">

            <div class="footer-inner">

                <div>
                    © {{ now()->year }} Expense Tracker
                    · Make money feel simpler.
                </div>

                <div class="footer-links">

                    <a href="{{ route('login') }}">
                        Sign in
                    </a>

                    <a href="{{ route('google.login') }}">
                        Get started
                    </a>

                </div>

            </div>

        </div>

    </footer>

</div>

</body>

</html>