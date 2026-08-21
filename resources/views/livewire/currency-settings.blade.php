<main class="currency-page">
    <section class="currency-card">
        <div class="currency-kicker">Personal preferences</div>
        <h1>Choose your currency</h1>
        <p class="currency-intro">Your selected currency appears across dashboard totals, transactions, category breakdowns, and PDF reports.</p>

        @if (session('success'))
            <div class="currency-success">{{ session('success') }}</div>
        @endif

        <form wire:submit="saveCurrency">
            <label class="currency-label" for="currency">Preferred currency</label>
            <select class="currency-input" wire:model="currency" id="currency">
                @foreach ($currencies as $code => $label)
                    <option value="{{ $code }}">{{ $label }}</option>
                @endforeach
            </select>
            @error('currency') <div class="currency-error">{{ $message }}</div> @enderror

            <button class="currency-button" type="submit">
                <span wire:loading.remove wire:target="saveCurrency">Save currency</span>
                <span wire:loading wire:target="saveCurrency">Saving...</span>
            </button>
        </form>
    </section>

    <style>
        .currency-page { min-height: calc(100vh - 75px); display:grid; place-items:center; padding:32px 16px; background:#f7f9fc; }
        .currency-card { width:min(440px,100%); padding:32px; border:1px solid #e4ebf2; border-radius:18px; background:#fff; box-shadow:0 18px 50px rgba(16,33,59,.08); }
        .currency-kicker { margin-bottom:9px; color:#147d72; font-size:12px; font-weight:800; letter-spacing:.08em; text-transform:uppercase; }
        .currency-card h1 { margin:0; color:#10213b; font-family:'Space Grotesk',sans-serif; font-size:28px; }
        .currency-intro { margin:12px 0 25px; color:#68778b; font-size:13px; line-height:1.6; }
        .currency-label { display:block; margin:15px 0 6px; color:#29405c; font-size:12px; font-weight:700; }
        .currency-input { width:100%; padding:11px 12px; border:1px solid #dce5ef; border-radius:9px; outline:0; }
        .currency-input:focus { border-color:#147d72; box-shadow:0 0 0 3px rgba(20,125,114,.1); }
        .currency-button { width:100%; margin-top:23px; padding:12px; border:0; border-radius:9px; color:#fff; background:#10213b; font-weight:700; }
        .currency-error { margin-top:5px; color:#e11d48; font-size:11px; } .currency-success { padding:10px 12px; border-radius:8px; color:#087a5d; background:#e9fbf4; font-size:12px; }
        html[data-theme="dark"] .currency-page { background:#0f172a; } html[data-theme="dark"] .currency-card { border-color:#293b55; background:#17243a; } html[data-theme="dark"] .currency-card h1, html[data-theme="dark"] .currency-label { color:#edf4fa; } html[data-theme="dark"] .currency-intro { color:#91a4bc; } html[data-theme="dark"] .currency-input { color:#edf4fa; border-color:#40536d; background:#111c31; }
    </style>
</main>