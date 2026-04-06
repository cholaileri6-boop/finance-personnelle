<x-app-layout>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Barlow:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --gold: #B8932A;
            --gold-l: #D4A843;
            --gold-dim: rgba(184, 147, 42, .10);
            --gold-bd: rgba(184, 147, 42, .22);
            --gold-sh: rgba(184, 147, 42, .16);
            --bg: #F7F6F3;
            --sur: #FFFFFF;
            --sur2: #FAFAF8;
            --sur3: #F2F1EE;
            --bd: rgba(0, 0, 0, .07);
            --bd2: rgba(0, 0, 0, .11);
            --text: #1A1916;
            --t2: #6B6860;
            --t3: #A8A49E;
            --sb: #1A1916;
            --sb-bd: rgba(255, 255, 255, .07);
            --sb-t: rgba(255, 255, 255, .50);
            --pos: #2D6A4F;
            --pos-bg: rgba(45, 106, 79, .08);
            --pos-bd: rgba(45, 106, 79, .18);
            --neg: #7A2020;
            --neg-bg: rgba(122, 32, 32, .08);
            --neg-bd: rgba(122, 32, 32, .18);
            --r24: 24px;
            --r18: 18px;
            --r12: 12px;
            --r8: 8px;
            --rfull: 9999px;
            --sh: 0 2px 16px rgba(0, 0, 0, .06);
            --shm: 0 4px 28px rgba(0, 0, 0, .08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Barlow', sans-serif;
            color: var(--text);
            background: var(--bg);
            -webkit-font-smoothing: antialiased;
        }

        .ff {
            display: flex;
            min-height: 100vh;
        }

        .sb {
            width: 224px;
            flex-shrink: 0;
            background: var(--sb);
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .sb-logo {
            padding: 26px 20px 22px;
            border-bottom: 1px solid var(--sb-bd);
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .sb-logo-t {
            font-family: 'Instrument Serif', serif;
            font-size: 17px;
            color: #fff;
        }

        .sb-logo-t span {
            color: var(--gold-l);
        }

        .sb-sec {
            font-size: 9.5px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .22);
            padding: 18px 20px 6px;
        }

        .sb-nav {
            flex: 1;
            padding-top: 8px;
        }

        .sb-a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 20px;
            font-size: 13px;
            font-weight: 500;
            color: var(--sb-t);
            text-decoration: none;
            transition: all .15s;
            border-left: 2px solid transparent;
        }

        .sb-a:hover {
            color: rgba(255, 255, 255, .80);
            background: rgba(255, 255, 255, .04);
        }

        .sb-a.on {
            color: var(--gold-l);
            background: rgba(212, 168, 67, .10);
            border-left-color: var(--gold-l);
            font-weight: 600;
        }

        .sb-a svg {
            width: 15px;
            height: 15px;
            flex-shrink: 0;
            opacity: .7;
        }

        .sb-a.on svg {
            opacity: 1;
        }

        .sb-foot {
            padding: 16px 18px;
            border-top: 1px solid var(--sb-bd);
        }

        .upill {
            display: flex;
            align-items: center;
            gap: 9px;
            background: rgba(255, 255, 255, .05);
            border: 1px solid var(--sb-bd);
            border-radius: var(--rfull);
            padding: 7px 12px 7px 7px;
        }

        .av {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), var(--gold-l));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 11px;
            color: #1A1916;
            flex-shrink: 0;
        }

        .sb-nm {
            font-size: 12px;
            font-weight: 600;
            color: rgba(255, 255, 255, .75);
        }

        /* MAIN CENTRÉ */
        .mn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            overflow-y: auto;
        }

        /* BUDGET CARD */
        .bwrap {
            width: 100%;
            max-width: 440px;
        }

        .bcard {
            background: var(--sur);
            border: 1px solid var(--bd);
            border-radius: 28px;
            padding: 34px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shm);
        }

        .bcard::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold-bd), transparent);
        }

        /* header */
        .bc-hd {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 26px;
        }

        .bc-tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--gold-dim);
            border: 1px solid var(--gold-bd);
            color: var(--gold);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            padding: 6px 13px;
            border-radius: var(--rfull);
        }

        .bc-tag::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--gold);
            animation: pd 2s infinite;
        }

        @keyframes pd {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .3;
            }
        }

        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--sur2);
            border: 1px solid var(--bd2);
            color: var(--t2);
            font-size: 12px;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: var(--rfull);
            cursor: pointer;
            transition: all .2s;
        }

        .btn-edit:hover {
            border-color: var(--gold-bd);
            color: var(--gold);
        }

        .btn-edit svg {
            width: 12px;
            height: 12px;
        }

        /* amount */
        .bc-lbl {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .10em;
            text-transform: uppercase;
            color: var(--t3);
            margin-bottom: 6px;
        }

        .bc-amt {
            font-family: 'Instrument Serif', serif;
            font-size: 46px;
            letter-spacing: -2px;
            color: var(--text);
            line-height: 1;
            margin-bottom: 26px;
        }

        .bc-amt span {
            font-size: 17px;
            font-family: 'Barlow', sans-serif;
            font-weight: 300;
            color: var(--t3);
            margin-left: 5px;
        }

        /* ring */
        .ring-wrap {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto 24px;
        }

        .ring-wrap svg {
            width: 100%;
            height: 100%;
        }

        .ring-center {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .ring-pct {
            font-family: 'Instrument Serif', serif;
            font-size: 38px;
            color: var(--text);
            letter-spacing: -1px;
            line-height: 1;
        }

        .ring-lbl {
            font-size: 11px;
            color: var(--t3);
            font-weight: 500;
            margin-top: 2px;
        }

        /* bar */
        .bar-wrap {
            margin-bottom: 18px;
        }

        .bar-lbls {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: var(--t3);
            margin-bottom: 7px;
            font-weight: 500;
        }

        .bar-track {
            height: 6px;
            background: var(--sur3);
            border-radius: var(--rfull);
            overflow: hidden;
            border: 1px solid var(--bd);
        }

        .bar-fill {
            height: 100%;
            border-radius: var(--rfull);
            background: linear-gradient(90deg, var(--gold), var(--gold-l));
            transition: width 1.2s cubic-bezier(.4, 0, .2, 1);
        }

        .bar-fill.danger {
            background: linear-gradient(90deg, #B8932A, var(--neg));
        }

        /* stats grid */
        .bc-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 18px;
        }

        .bc-stat {
            background: var(--sur2);
            border: 1px solid var(--bd);
            border-radius: var(--r18);
            padding: 15px 17px;
            position: relative;
            overflow: hidden;
        }

        .bc-stat::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            border-radius: var(--r18) var(--r18) 0 0;
        }

        .bc-stat.sp::after {
            background: var(--neg);
        }

        .bc-stat.lf::after {
            background: var(--gold);
        }

        .stat-lbl {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--t3);
            margin-bottom: 6px;
        }

        .stat-val {
            font-family: 'Instrument Serif', serif;
            font-size: 21px;
            letter-spacing: -.5px;
            line-height: 1;
        }

        .stat-val.neg {
            color: var(--neg);
        }

        .stat-val.gold {
            color: var(--gold);
        }

        .stat-sub {
            font-size: 10px;
            color: var(--t3);
            margin-top: 3px;
        }

        /* over */
        .bc-over {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--neg-bg);
            border: 1px solid var(--neg-bd);
            color: var(--neg);
            border-radius: var(--r12);
            padding: 12px 15px;
            font-size: 12px;
            font-weight: 600;
        }

        .bc-over svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        /* empty */
        .bc-empty {
            text-align: center;
            padding: 10px 0;
        }

        .e-ico {
            width: 72px;
            height: 72px;
            background: var(--gold-dim);
            border: 1px solid var(--gold-bd);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 22px;
            color: var(--gold);
        }

        .e-ico svg {
            width: 32px;
            height: 32px;
        }

        .e-h {
            font-family: 'Instrument Serif', serif;
            font-size: 24px;
            color: var(--text);
            margin-bottom: 8px;
        }

        .e-p {
            font-size: 13px;
            color: var(--t2);
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .btn-create {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--gold);
            color: #fff;
            font-family: 'Barlow', sans-serif;
            font-size: 13px;
            font-weight: 700;
            padding: 12px 26px;
            border-radius: var(--r12);
            border: none;
            cursor: pointer;
            transition: all .2s;
            box-shadow: 0 4px 14px var(--gold-sh);
        }

        .btn-create:hover {
            background: var(--gold-l);
            transform: translateY(-1px);
        }

        .btn-create svg {
            width: 15px;
            height: 15px;
        }

        /* MODAL */
        .m-ov {
            position: fixed;
            inset: 0;
            background: rgba(20, 18, 14, .55);
            backdrop-filter: blur(6px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 200;
            padding: 20px;
        }

        .m-ov.open {
            display: flex;
        }

        .modal {
            background: var(--sur);
            border: 1px solid var(--bd2);
            border-radius: 24px;
            padding: 28px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 32px 80px rgba(0, 0, 0, .14);
            position: relative;
        }

        .modal::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold-bd), transparent);
            border-radius: 24px 24px 0 0;
        }

        .m-ttl {
            font-family: 'Instrument Serif', serif;
            font-size: 20px;
            color: var(--text);
            margin-bottom: 4px;
        }

        .m-sub {
            font-size: 12px;
            color: var(--t3);
            margin-bottom: 22px;
        }

        .f-lbl {
            display: block;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .10em;
            text-transform: uppercase;
            color: var(--t3);
            margin-bottom: 6px;
        }

        .f-inp {
            width: 100%;
            background: var(--sur2);
            border: 1.5px solid var(--bd2);
            border-radius: var(--r12);
            padding: 12px 14px;
            font-size: 18px;
            font-family: 'Instrument Serif', serif;
            color: var(--text);
            outline: none;
            transition: border-color .18s;
            margin-bottom: 20px;
        }

        .f-inp:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px var(--gold-dim);
        }

        .f-inp::placeholder {
            color: var(--t3);
            font-family: 'Barlow', sans-serif;
            font-size: 15px;
        }

        .btn-row {
            display: flex;
            gap: 10px;
        }

        .btn-ghost {
            flex: 1;
            background: var(--sur2);
            border: 1px solid var(--bd2);
            color: var(--t2);
            font-family: 'Barlow', sans-serif;
            font-size: 13px;
            font-weight: 600;
            padding: 13px;
            border-radius: var(--r12);
            cursor: pointer;
        }

        .btn-ghost:hover {
            background: var(--sur3);
            color: var(--text);
        }

        .btn-primary {
            flex: 1;
            background: var(--gold);
            color: #fff;
            font-family: 'Barlow', sans-serif;
            font-size: 13px;
            font-weight: 700;
            padding: 13px;
            border-radius: var(--r12);
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: var(--gold-l);
        }

        @media(max-width:720px) {
            .sb {
                display: none;
            }

            .mn {
                padding: 20px;
            }
        }
    </style>

    <div class="ff">
        <aside class="sb">
            <a href="/dashboard" class="sb-logo">
                <svg viewBox="0 0 32 32" fill="none" style="width:32px;height:32px;flex-shrink:0">
                    <rect width="32" height="32" rx="8" fill="#D4A843" fill-opacity=".12" />
                    <circle cx="16" cy="16" r="9.5" stroke="#D4A843" stroke-width="1.4" fill="none" />
                    <circle cx="16" cy="16" r="6" stroke="#D4A843" stroke-width=".8" fill="none"
                        opacity=".45" /><text x="16" y="20.5" text-anchor="middle" font-family="Georgia,serif"
                        font-size="9.5" font-weight="bold" fill="#D4A843">₣</text>
                </svg>
                <div class="sb-logo-t">Finance<span>Flow</span></div>
            </a>
            <nav class="sb-nav">
                <div class="sb-sec">Principal</div>
                <a href="/dashboard" class="sb-a"><i class="fas fa-th"></i>Tableau de bord</a>
                <div class="sb-sec">Finances</div>
                <a href="/revenus" class="sb-a"><i class="fas fa-arrow-trend-up"></i>Revenus</a>
                <a href="/depenses" class="sb-a"><i class="fas fa-wallet"></i>Dépenses</a>
                <a href="/budgets" class="sb-a on"><i class="fas fa-chart-pie"></i>Budget</a>
                <a href="/rapports" class="sb-a"><i class="fas fa-chart-bar"></i>Rapports</a>
            </nav>
            <div class="sb-foot">
                <div class="upill">
                    <div class="av">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div><span
                        class="sb-nm">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </aside>

        <main class="mn">
            <div class="bwrap">
                @if ($budget)
                    @php
                        $progression = $budget->amount > 0 ? ($depensesMois / $budget->amount) * 100 : 0;
                        $reste = $budget->amount - $depensesMois;
                        $circ = 2 * M_PI * 72;
                        $offset = $circ - ($circ * min($progression, 100)) / 100;
                        $ringColor = $progression >= 100 ? '#7A2020' : ($progression >= 75 ? '#B8932A' : '#B8932A');
                        $ringOpacity = $progression >= 100 ? 1 : 0.85;
                    @endphp
                    <div class="bcard">
                        <div class="bc-hd">
                            <div class="bc-tag">Budget mensuel</div>
                            <button onclick="document.getElementById('budgetModal').classList.add('open')"
                                class="btn-edit">
                                <i class="fas fa-pencil"></i>
                                Modifier
                            </button>
                        </div>
                        <div class="bc-lbl">Limite fixée</div>
                        <div class="bc-amt">{{ number_format($budget->amount, 0, ',', ' ') }}<span>FCFA</span></div>

                        <div class="ring-wrap">
                            <svg viewBox="0 0 200 200" style="transform:rotate(-90deg)">
                                <circle cx="100" cy="100" r="72" fill="none" stroke="rgba(0,0,0,0.06)"
                                    stroke-width="13" />
                                <circle cx="100" cy="100" r="72" fill="none" stroke="{{ $ringColor }}"
                                    stroke-width="13" stroke-dasharray="{{ $circ }}"
                                    stroke-dashoffset="{{ $offset }}" stroke-linecap="round"
                                    style="transition:stroke-dashoffset 1.2s cubic-bezier(.4,0,.2,1)" />
                            </svg>
                            <div class="ring-center">
                                <span class="ring-pct">{{ number_format(min($progression, 999), 0) }}%</span>
                                <span class="ring-lbl">utilisé</span>
                            </div>
                        </div>

                        <div class="bar-wrap">
                            <div class="bar-lbls"><span>0</span><span>{{ number_format($budget->amount, 0, ',', ' ') }}
                                    FCFA</span></div>
                            <div class="bar-track">
                                <div class="bar-fill {{ $progression >= 75 ? 'danger' : '' }}"
                                    style="width:{{ min($progression, 100) }}%"></div>
                            </div>
                        </div>

                        <div class="bc-stats">
                            <div class="bc-stat sp">
                                <div class="stat-lbl">Dépensé</div>
                                <div class="stat-val neg">{{ number_format($depensesMois, 0, ',', ' ') }}</div>
                                <div class="stat-sub">FCFA sortis</div>
                            </div>
                            <div class="bc-stat lf">
                                <div class="stat-lbl">{{ $reste >= 0 ? 'Restant' : 'Dépassement' }}</div>
                                <div class="stat-val gold">{{ number_format(abs($reste), 0, ',', ' ') }}</div>
                                <div class="stat-sub">FCFA {{ $reste >= 0 ? 'disponibles' : 'en trop' }}</div>
                            </div>
                        </div>

                        @if ($progression >= 100)
                            <div class="bc-over">
                                <i class="fas fa-exclamation-triangle"></i>
                                Budget dépassé — Ajustez vos dépenses.
                            </div>
                        @endif
                    </div>
                @else
                    <div class="bcard bc-empty">
                        <div class="e-ico"><i class="fas fa-chart-pie"></i></div>
                        <div class="e-h">Aucun budget défini</div>
                        <p class="e-p">Définissez un budget mensuel pour suivre vos dépenses et garder le contrôle
                            de vos finances.</p>
                        <button onclick="document.getElementById('budgetModal').classList.add('open')"
                            class="btn-create">
                            <i class="fas fa-plus"></i>
                            Créer mon budget
                        </button>
                    </div>
                @endif
            </div>
        </main>
    </div>

    <div id="budgetModal" class="m-ov">
        <div class="modal">
            <div class="m-ttl">Définir le budget</div>
            <p class="m-sub">Saisissez votre limite de dépenses pour ce mois</p>
            <form method="POST" action="{{ route('budgets.store') }}">
                @csrf
                <label class="f-lbl">Montant (FCFA)</label>
                <input type="number" name="amount" placeholder="Ex : 150 000" class="f-inp" min="0">
                <input type="hidden" name="month" value="{{ now()->month }}">
                <input type="hidden" name="year" value="{{ now()->year }}">
                <div class="btn-row">
                    <button type="button" onclick="document.getElementById('budgetModal').classList.remove('open')"
                        class="btn-ghost">Annuler</button>
                    <button type="submit" class="btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('budgetModal').addEventListener('click', function(e) {
            if (e.target === this) this.classList.remove('open');
        });
    </script>
</x-app-layout>
