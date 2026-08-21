<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Expense Tracker helps you see where your money goes and plan what comes next.">
    <title>Expense Tracker | Take control of your money</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,400,0,0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { --ink:#122033; --muted:#68778b; --paper:#f5f8f7; --mint:#b9ead8; --teal:#147d72; --coral:#ef765f; --line:#dfe9e6; }
        * { box-sizing:border-box; }
        .material-symbols-outlined { font-size:1.15em; line-height:1; vertical-align:middle; font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24; }
        body { margin:0; color:var(--ink); background:var(--paper); font-family:'DM Sans',sans-serif; }
        a { color:inherit; text-decoration:none; }
        .landing { overflow:hidden; }
        .shell { width:min(1160px,calc(100% - 40px)); margin:0 auto; }
        .nav { display:flex; align-items:center; justify-content:space-between; padding:26px 0; }
        .brand { display:flex; align-items:center; gap:11px; font-family:'Space Grotesk',sans-serif; font-weight:700; }
        .brand-mark { display:grid; place-items:center; width:36px; height:36px; border-radius:11px; color:white; background:var(--ink); box-shadow:5px 5px 0 var(--mint); }
        .nav-links { display:flex; align-items:center; gap:28px; color:var(--muted); font-size:14px; font-weight:600; }
        .nav-links a:hover { color:var(--teal); }
        .nav-action,.hero-action { display:inline-flex; align-items:center; gap:10px; border-radius:9px; color:white; background:var(--ink); font-weight:700; transition:transform .2s ease,box-shadow .2s ease; }
        .nav-action { padding:11px 17px; font-size:14px; }
        .hero-action { padding:16px 21px; }
        .nav-action:hover,.hero-action:hover { color:white; transform:translateY(-2px); box-shadow:0 9px 18px rgba(18,32,51,.17); }
        .hero { display:grid; grid-template-columns:.9fr 1.1fr; align-items:center; gap:68px; min-height:610px; padding:56px 0 96px; }
        .eyebrow { display:inline-flex; align-items:center; gap:9px; margin-bottom:23px; color:var(--teal); font-size:12px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; }
        .eyebrow:before { content:''; width:28px; height:2px; background:var(--coral); }
        h1,h2 { margin:0; font-family:'Space Grotesk',sans-serif; letter-spacing:-.04em; }
        h1 { max-width:560px; font-size:clamp(46px,6vw,78px); line-height:.98; }
        h1 span { color:var(--teal); }
        .hero-copy { max-width:470px; margin:25px 0 30px; color:var(--muted); font-size:18px; line-height:1.65; }
        .trust { display:flex; align-items:center; gap:10px; margin-top:22px; color:var(--muted); font-size:13px; }
        .trust-dots { display:flex; }
        .trust-dots i { width:24px; height:24px; margin-right:-6px; border:2px solid var(--paper); border-radius:50%; background:#f4b49b; }
        .trust-dots i:nth-child(2) { background:#89c7b7; } .trust-dots i:nth-child(3) { background:#e7c76d; }
        .hero-stats { display:grid; grid-template-columns:repeat(3, 1fr); gap:8px; max-width:430px; margin-top:26px; } .hero-stats div { padding:12px 13px; border:1px solid var(--line); border-radius:10px; background:rgba(255,255,255,.68); } .hero-stats span { display:block; margin-bottom:5px; color:var(--muted); font-size:10px; } .hero-stats strong { font-family:'Space Grotesk',sans-serif; font-size:16px; } .hero-stats div:nth-child(1) strong { color:var(--teal); } .hero-stats div:nth-child(2) strong { color:var(--coral); } .hero-stats div:nth-child(3) strong { color:#0872a8; }
        .visual-wrap { position:relative; }
        .visual-wrap:before { content:''; position:absolute; z-index:-1; top:-34px; right:-55px; width:270px; height:270px; border-radius:50%; background:var(--mint); opacity:.7; }
        .visual-wrap:after { content:''; position:absolute; z-index:-1; bottom:-30px; left:-35px; width:120px; height:120px; border:2px solid var(--coral); border-radius:50%; opacity:.45; }
        .dashboard-preview { padding:18px; border:1px solid rgba(255,255,255,.8); border-radius:18px; background:rgba(255,255,255,.84); box-shadow:0 25px 70px rgba(33,59,73,.15); backdrop-filter:blur(12px); }
        .preview-top { display:flex; align-items:center; justify-content:space-between; margin-bottom:15px; }
        .preview-title { font-family:'Space Grotesk',sans-serif; font-size:15px; font-weight:700; }
        .preview-date { padding:7px 10px; border:1px solid var(--line); border-radius:7px; color:var(--muted); font-size:10px; }
        .balance { display:grid; grid-template-columns:1.2fr .8fr; gap:12px; }
        .balance-main { min-height:180px; padding:19px; border-radius:13px; color:white; background:var(--ink); }
        .balance-label { color:#a7bac5; font-size:11px; }
        .balance-value { margin-top:9px; font-family:'Space Grotesk',sans-serif; font-size:31px; font-weight:700; }
        .chart { display:flex; align-items:end; gap:7px; height:66px; margin-top:24px; }
        .bar { flex:1; border-radius:4px 4px 1px 1px; background:#62cdb5; }
        .bar:nth-child(1) { height:35%; } .bar:nth-child(2) { height:54%; } .bar:nth-child(3) { height:43%; } .bar:nth-child(4) { height:76%; } .bar:nth-child(5) { height:62%; } .bar:nth-child(6) { height:91%; } .bar:nth-child(7) { height:70%; }
        .mini-stat { display:flex; flex-direction:column; justify-content:space-between; padding:16px; border:1px solid var(--line); border-radius:13px; background:#fff; }
        .mini-stat strong { font-family:'Space Grotesk',sans-serif; font-size:24px; } .mini-stat small { color:var(--muted); font-size:11px; } .trend { color:var(--teal); font-size:11px; font-weight:700; }
        .transactions { margin-top:12px; padding:16px; border:1px solid var(--line); border-radius:13px; background:#fff; }
        .transactions-head { display:flex; justify-content:space-between; margin-bottom:12px; font-size:12px; font-weight:700; } .transactions-head span { color:var(--teal); font-size:10px; }
        .transaction { display:flex; align-items:center; justify-content:space-between; padding:9px 0; border-top:1px solid #edf2f0; font-size:11px; }
        .transaction-left { display:flex; align-items:center; gap:9px; } .transaction-icon { display:grid; place-items:center; width:25px; height:25px; border-radius:7px; background:#fff1ec; color:var(--coral); font-size:12px; }
        .transaction:nth-child(3) .transaction-icon { color:var(--teal); background:#e5f5f0; } .transaction small { display:block; margin-top:2px; color:var(--muted); font-size:9px; } .transaction strong { font-size:11px; } .income { color:var(--teal); }
        .features { padding:78px 0 96px; border-top:1px solid var(--line); background:#fff; }
        .section-heading { display:flex; justify-content:space-between; align-items:end; gap:30px; margin-bottom:37px; } h2 { max-width:500px; font-size:clamp(31px,4vw,48px); line-height:1.04; } .section-heading p { max-width:300px; margin:0; color:var(--muted); line-height:1.6; }
        .feature-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; } .feature { min-height:190px; padding:23px; border:1px solid var(--line); border-radius:12px; background:#fbfdfc; } .feature-number { color:var(--coral); font-family:'Space Grotesk',sans-serif; font-weight:700; } .feature h3 { margin:36px 0 8px; font-family:'Space Grotesk',sans-serif; font-size:19px; } .feature p { margin:0; color:var(--muted); font-size:14px; line-height:1.55; }
        .steps { padding:78px 0 96px; background:var(--paper); }
        .feedback { padding:78px 0 96px; border-top:1px solid var(--line); background:#fff; }
        .feedback-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; }
        .feedback-card { padding:24px; border:1px solid var(--line); border-radius:12px; background:#fbfdfc; }
        .feedback-stars { color:#e5a928; letter-spacing:2px; font-size:14px; }
        .feedback-card blockquote { margin:20px 0 24px; color:var(--ink); font-size:15px; line-height:1.65; }
        .feedback-person { display:flex; align-items:center; gap:10px; }
        .feedback-avatar { display:grid; place-items:center; width:34px; height:34px; border-radius:50%; color:#fff; background:var(--teal); font-family:'Space Grotesk',sans-serif; font-weight:700; }
        .feedback-person strong { display:block; font-size:13px; } .feedback-person small { display:block; margin-top:2px; color:var(--muted); font-size:11px; }
        @media (max-width:820px) { .feedback-grid { grid-template-columns:1fr; } }
        .final-cta { padding:78px 0; color:#fff; background:var(--ink); }
        .final-cta .shell { display:flex; align-items:center; justify-content:space-between; gap:40px; }
        .final-cta h2 { max-width:600px; color:#fff; }
        .final-cta p { margin:16px 0 0; color:#b9c9d5; font-size:16px; }
        .final-cta .eyebrow { margin-bottom:16px; color:var(--mint); }
        .final-cta .hero-action { color:var(--ink); background:var(--mint); white-space:nowrap; }
        .cta-badges { display:flex; flex-wrap:wrap; gap:10px; margin-top:30px; color:#b9c9d5; font-size:12px; } .cta-badges span { padding:8px 11px; border:1px solid #3a4e66; border-radius:999px; }
        footer { padding:25px 0; color:var(--muted); font-size:12px; }
        @media (max-width:820px) { .nav-links a:not(.nav-action) { display:none; } .hero { grid-template-columns:1fr; gap:50px; padding-top:35px; } .visual-wrap { width:min(100%,570px); margin:0 auto; } .feature-grid { grid-template-columns:1fr; } .feature { min-height:auto; } .final-cta .shell { display:block; } .final-cta .hero-action { margin-top:28px; } }
        @media (max-width:520px) { .shell { width:min(100% - 28px,1160px); } .brand span:last-child { display:none; } .nav { padding:19px 0; } .hero { min-height:auto; padding:48px 0 75px; } h1 { font-size:48px; } .hero-copy { font-size:16px; } .hero-stats { max-width:none; } .hero-stats strong { font-size:14px; } .balance { grid-template-columns:1fr; } .balance-main { min-height:165px; } .mini-stat { min-height:115px; } .section-heading { display:block; } .section-heading p { margin-top:18px; } }
    </style>
</head>

<body>
    <div class="landing">
        <div class="shell">
            <nav class="nav" aria-label="Main navigation">
                <a href="{{ route('home') }}" class="brand"><span class="brand-mark" aria-hidden="true"><span class="material-symbols-outlined">account_balance_wallet</span></span><span>Expense Tracker</span></a>
                <div class="nav-links"><a href="#features">Why it works</a><a href="{{ route('login') }}">Sign in</a><a href="{{ route('google.login') }}" class="nav-action">Get started <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span></a></div>
            </nav>
            <main>
                <section class="hero">
                    <div>
                        <div class="eyebrow">A calmer way to manage money</div>
                        <h1>Take control of <span>your money.</span></h1>
                        <p class="hero-copy">A simple, beautiful way to track your income and expenses. See your balance at a glance, understand your spending patterns, and make smarter financial decisions.</p>
                        <a href="{{ route('google.login') }}" class="hero-action">Start Tracking Free <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span></a>
                        <div class="trust"><span class="trust-dots" aria-hidden="true"><i></i><i></i><i></i></span><span>Built for everyday decisions</span></div>
                        <div class="hero-stats"><div><span>Income</span><strong>₹15,200</strong></div><div><span>Expenses</span><strong>₹12,520</strong></div><div><span>Balance</span><strong>₹2,680</strong></div></div>
                    </div>
                    <div class="visual-wrap" aria-label="Expense Tracker dashboard preview">
                        <div class="dashboard-preview">
                            <div class="preview-top"><div class="preview-title">Overview</div><div class="preview-date">AUG 2026⌄</div></div>
                            <div class="balance"><div class="balance-main"><div class="balance-label">Available balance</div><div class="balance-value">$2,840.50</div><div class="chart" aria-hidden="true"><i class="bar"></i><i class="bar"></i><i class="bar"></i><i class="bar"></i><i class="bar"></i><i class="bar"></i><i class="bar"></i></div></div><div class="mini-stat"><small>Income this month</small><strong>$5,240</strong><span class="trend">↗ 12.4%</span></div></div>
                            <div class="transactions"><div class="transactions-head"><span>Recent activity</span><span>View all →</span></div><div class="transaction"><div class="transaction-left"><div class="transaction-icon">−</div><div><strong>Home essentials</strong><small>Today · Needs</small></div></div><strong>-$84.20</strong></div><div class="transaction"><div class="transaction-left"><div class="transaction-icon">+</div><div><strong>Monthly salary</strong><small>Yesterday · Income</small></div></div><strong class="income">+$3,200</strong></div></div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
        <section class="features" id="features"><div class="shell"><div class="section-heading"><h2>Everything you need to manage money</h2><p>Powerful features wrapped in a clean, intuitive design that makes tracking finances effortless.</p></div><div class="feature-grid"><article class="feature"><div class="feature-number">01</div><h3>Track Income</h3><p>Log every source of income — salary, freelance, business, and more — in one organized place.</p></article><article class="feature"><div class="feature-number">02</div><h3>Monitor Expenses</h3><p>Record every expense with categories like rent, EMI, groceries, and transport to see where your money goes.</p></article><article class="feature"><div class="feature-number">03</div><h3>Category Breakdown</h3><p>Visual charts show exactly how your spending and earning is distributed across categories.</p></article><article class="feature"><div class="feature-number">04</div><h3>Custom Categories</h3><p>Pick from preset categories or create your own — full flexibility to match your financial life.</p></article><article class="feature"><div class="feature-number">05</div><h3>Edit Anytime</h3><p>Made a mistake? No problem. Edit or delete any transaction with a single tap.</p></article><article class="feature"><div class="feature-number">06</div><h3>Secure &amp; Private</h3><p>Your data is protected with secure authentication. Only you can see your transactions.</p></article></div></div></section>
        <section class="steps"><div class="shell"><div class="section-heading"><h2>Get started in 3 simple steps</h2><p>From your first sign-in to a clearer money picture in just a few minutes.</p></div><div class="feature-grid"><article class="feature"><div class="feature-number">01</div><h3>Create your account</h3><p>Sign up with your email in seconds. No credit card needed.</p></article><article class="feature"><div class="feature-number">02</div><h3>Add your transactions</h3><p>Log income and expenses with categories and notes.</p></article><article class="feature"><div class="feature-number">03</div><h3>Track &amp; analyze</h3><p>Watch your balance update and see spending breakdowns.</p></article></div></div></section>
        <section class="feedback" id="feedback"><div class="shell"><div class="section-heading"><h2>Loved by people building better money habits.</h2><p>Simple tools, clearer decisions, and a little less financial noise every day.</p></div><div class="feedback-grid"><article class="feedback-card"><div class="feedback-stars" aria-label="5 out of 5 stars">★★★★★</div><blockquote>“I finally know where my money goes each month. The category breakdown makes everything click.”</blockquote><div class="feedback-person"><div class="feedback-avatar">AR</div><div><strong>Arif Rahman</strong><small>Small business owner</small></div></div></article><article class="feedback-card"><div class="feedback-stars" aria-label="5 out of 5 stars">★★★★★</div><blockquote>“Adding an expense takes seconds, and seeing the balance update instantly keeps me consistent.”</blockquote><div class="feedback-person"><div class="feedback-avatar" style="background:#ef765f;">NS</div><div><strong>Nadia Sultana</strong><small>Freelance designer</small></div></div></article><article class="feedback-card"><div class="feedback-stars" aria-label="5 out of 5 stars">★★★★★</div><blockquote>“Clean, focused, and easy to trust. The PDF report is especially useful when I review my month.”</blockquote><div class="feedback-person"><div class="feedback-avatar" style="background:#0872a8;">TM</div><div><strong>Tanvir Mahmud</strong><small>Project manager</small></div></div></article></div></div></section>
        <section class="final-cta"><div class="shell"><div><div class="eyebrow">Your next clear decision</div><h2>Ready to take control?</h2><p>Join now and start tracking your finances today. It's free and secure.</p></div><a href="{{ route('google.login') }}" class="hero-action">Get Started Now <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span></a></div><div class="cta-badges"><span>Free to use</span><span>Secure data</span><span>No credit card</span></div></section>
        <footer class="shell">© {{ now()->year }} Expense Tracker <span aria-hidden="true">·</span> Make money feel simpler.</footer>
    </div>
</body>

</html>