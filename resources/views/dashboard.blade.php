<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Barlow:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --gold: #C9A84C;
            --gold-l: #E8C96D;
            --gold-dim: rgba(201, 168, 76, 0.13);
            --gold-bd: rgba(201, 168, 76, 0.24);
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
            --red: #E05252;
            --rd: rgba(224, 82, 82, 0.12);
            --rbd: rgba(224, 82, 82, 0.22);
            --grn: #52C97B;
            --gd: rgba(82, 201, 123, 0.12);
            --gbd: rgba(82, 201, 123, 0.22);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .ff {
            display: flex;
            min-height: 100vh;
            background: var(--bg);
            font-family: 'Barlow', sans-serif;
            color: var(--text);
        }

        /* SIDEBAR */
        .sb {
            width: 230px;
            flex-shrink: 0;
            background: var(--sb);
            border-right: 1px solid var(--sb-bd);
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .sb-logo {
            font-family: 'Instrument Serif', serif;
            font-size: 20px;
            color: #fff;
            padding: 30px 26px 26px;
            border-bottom: 1px solid var(--sb-bd);
        }

        .sb-logo span {
            color: var(--gold);
        }

        .sb-sec {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .22);
            padding: 20px 26px 8px;
        }

        .sb-nav {
            flex: 1;
            padding-top: 8px;
        }

        .sb-a {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px 26px;
            font-size: 13.5px;
            font-weight: 500;
            color: var(--sb-t);
            text-decoration: none;
            transition: all .18s;
            border-left: 2px solid transparent;
        }

        .sb-a:hover {
            color: rgba(255, 255, 255, .80);
            background: rgba(255, 255, 255, .04);
        }

        .sb-a.on {
            color: var(--gold);
            background: var(--gold-dim);
            border-left-color: var(--gold);
            font-weight: 600;
        }

        .sb-a svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .sb-foot {
            padding: 18px 22px;
            border-top: 1px solid var(--sb-bd);
        }

        .sb-pill {
            display: flex;
            align-items: center;
            gap: 9px;
            background: rgba(255, 255, 255, .05);
            border: 1px solid var(--sb-bd);
            border-radius: 50px;
            padding: 7px 13px 7px 7px;
        }

        .av {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), var(--gold-l));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 12px;
            color: #1A1916;
            flex-shrink: 0;
        }

        .sb-name {
            font-size: 13px;
            font-weight: 600;
            color: rgba(255, 255, 255, .75);
        }

        /* MAIN */
        .mn {
            flex: 1;
            padding: 34px 38px;
            overflow-y: auto;
            min-width: 0;
        }

        .tp {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 32px;
        }

        .tp-gr {
            font-size: 11px;
            font-weight: 600;
            color: var(--t2);
            letter-spacing: .1em;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .tp-h {
            font-family: 'Instrument Serif', serif;
            font-size: 38px;
            color: var(--text);
            letter-spacing: -.7px;
            line-height: 1;
        }

        .tp-r {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .ic-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--dark3);
            border: 1px solid var(--bd2);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--t2);
            transition: all .2s;
        }

        .ic-btn:hover {
            border-color: var(--gold-bd);
            color: var(--gold);
        }

        .ic-btn svg {
            width: 16px;
            height: 16px;
        }

        .tp-av {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), var(--gold-l));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            color: var(--dark);
            box-shadow: 0 4px 14px rgba(201, 168, 76, 0.3);
        }

        /* ALERT */
        .alt {
            background: var(--rd);
            border: 1px solid var(--rbd);
            border-radius: 18px;
            padding: 13px 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            color: var(--red);
            font-size: 13px;
            font-weight: 500;
        }

        .alt svg {
            width: 17px;
            height: 17px;
            flex-shrink: 0;
        }

        /* GRID */
        .gr {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 16px;
        }

        .card {
            background: var(--dark2);
            border: 1px solid var(--bd);
            border-radius: 24px;
            padding: 22px;
            transition: border-color .2s, transform .2s;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            border-color: var(--bd2);
            transform: translateY(-2px);
        }

        /* SOLDE */
        .card-sol {
            grid-column: span 2;
            background: linear-gradient(135deg, #131000 0%, #1A1600 55%, #0A0A0A 100%);
            border-color: var(--gold-bd);
            padding: 30px 34px;
        }

        .card-sol::before {
            content: '';
            position: absolute;
            top: -70px;
            right: -70px;
            width: 260px;
            height: 260px;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.1) 0%, transparent 65%);
            pointer-events: none;
        }

        .lbl {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--t2);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .sol-amt {
            font-family: 'Instrument Serif', serif;
            font-size: 54px;
            letter-spacing: -2px;
            color: var(--text);
            line-height: 1;
            margin: 8px 0 16px;
        }

        .sol-amt span {
            font-size: 19px;
            color: var(--t2);
            font-family: 'Barlow', sans-serif;
            font-weight: 300;
            margin-left: 6px;
            letter-spacing: 0;
        }

        .mo-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(201, 168, 76, 0.1);
            border: 1px solid var(--gold-bd);
            color: var(--gold);
            border-radius: 50px;
            padding: 5px 15px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .03em;
        }

        /* STAT */
        .stat {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .s-icon {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .s-icon svg {
            width: 21px;
            height: 21px;
        }

        .s-icon.g {
            background: var(--gd);
            color: var(--grn);
            border: 1px solid var(--gbd);
        }

        .s-icon.r {
            background: var(--rd);
            color: var(--red);
            border: 1px solid var(--rbd);
        }

        .s-val {
            font-family: 'Instrument Serif', serif;
            font-size: 27px;
            letter-spacing: -.5px;
            line-height: 1;
            margin-top: 5px;
        }

        .s-val.g {
            color: var(--grn);
        }

        .s-val.r {
            color: var(--red);
        }

        .s-sub {
            font-size: 11px;
            color: var(--t2);
            margin-top: 3px;
        }

        /* CHART */
        .card-ch {
            grid-column: span 2;
        }

        .ch-hd {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .ch-ttl {
            font-size: 14px;
            font-weight: 700;
            color: var(--text);
        }

        .badges {
            display: flex;
            gap: 7px;
        }

        .bdg {
            font-size: 10px;
            font-weight: 700;
            padding: 4px 11px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .bdg.g {
            background: var(--gd);
            color: var(--grn);
            border: 1px solid var(--gbd);
        }

        .bdg.r {
            background: var(--rd);
            color: var(--red);
            border: 1px solid var(--rbd);
        }

        .ch-w {
            height: 188px;
        }

        /* TRANS */
        .tr-hd {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: var(--text);
        }

        .tr-hd svg {
            width: 16px;
            height: 16px;
            color: var(--t3);
        }

        .tr-list {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .tr-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 9px 10px;
            border-radius: 13px;
            transition: background .15s;
        }

        .tr-item:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .tr-l {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .tr-dot {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--rd);
            color: var(--red);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: 1px solid var(--rbd);
        }

        .tr-dot svg {
            width: 14px;
            height: 14px;
        }

        .tr-nm {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
        }

        .tr-dt {
            font-size: 11px;
            color: var(--t2);
        }

        .tr-amt {
            font-size: 13px;
            font-weight: 700;
            color: var(--red);
        }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 24px 0;
            color: var(--t2);
            font-size: 13px;
        }

        .empty svg {
            width: 30px;
            height: 30px;
            margin: 0 auto 8px;
            display: block;
            opacity: .25;
        }

        /* QUICK NAV */
        .qnav {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-top: 16px;
        }

        .qcard {
            background: var(--dark2);
            border: 1px solid var(--bd);
            border-radius: 22px;
            padding: 20px 18px;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
            transition: all .2s;
        }

        .qcard:hover {
            border-color: var(--gold-bd);
            transform: translateY(-3px);
        }

        .q-icon {
            width: 42px;
            height: 42px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--dark4);
            border: 1px solid var(--bd2);
            color: var(--gold);
        }

        .q-icon svg {
            width: 19px;
            height: 19px;
        }

        .q-lbl {
            font-size: 13.5px;
            font-weight: 700;
            color: var(--text);
        }

        .q-desc {
            font-size: 11px;
            color: var(--t2);
            margin-top: -7px;
        }

        .q-arr {
            margin-top: auto;
            display: flex;
            justify-content: flex-end;
        }

        .q-arr svg {
            width: 14px;
            height: 14px;
            color: var(--t3);
        }

        @media(max-width:1100px) {
            .gr {
                grid-template-columns: 1fr 1fr;
            }

            .card-sol,
            .card-ch {
                grid-column: span 2;
            }

            .qnav {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width:720px) {
            .sb {
                display: none;
            }

            .mn {
                padding: 18px;
            }

            .gr {
                grid-template-columns: 1fr;
            }

            .card-sol,
            .card-ch {
                grid-column: span 1;
            }

            .qnav {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>

    <div class="ff">
        <aside class="sb">
            <div class="sb-logo">Finance<span>Flow</span></div>
            <nav class="sb-nav">
                <div class="sb-sec">Principal</div>
                <a href="/dashboard" class="sb-a on">
                    <i class="fas fa-th"></i>
                    Tableau de bord
                </a>
                <div class="sb-sec">Finances</div>
                <a href="/revenus" class="sb-a">
                    <i class="fas fa-arrow-trend-up"></i>
                    Revenus
                </a>
                <a href="/depenses" class="sb-a">
                    <i class="fas fa-wallet"></i>
                    Dépenses
                </a>
                <a href="/budgets" class="sb-a">
                    <i class="fas fa-chart-pie"></i>
                    Budget
                </a>
                <a href="/rapports" class="sb-a">
                    <i class="fas fa-chart-bar"></i>
                    Rapports
                </a>
            </nav>
            <div class="sb-foot">
                <div class="sb-pill">
                    <div class="av">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                    <span class="sb-name">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </aside>

        <main class="mn">
            <div class="tp">
                <div>
                    <p class="tp-gr">Bienvenue, {{ auth()->user()->name }}</p>
                    <h1 class="tp-h">Tableau de bord</h1>
                </div>
                <div class="tp-r">
                    <div class="ic-btn"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg></div>
                    <div class="tp-av">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                </div>
            </div>

            @if ($alerteBudget)
                <div class="alt">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path
                            d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
                        <line x1="12" y1="9" x2="12" y2="13" />
                        <line x1="12" y1="17" x2="12.01" y2="17" />
                    </svg>
                    Attention : Vous avez dépassé votre budget mensuel ce mois-ci.
                </div>
            @endif

            <div class="gr">
                <div class="card card-sol">
                    <div class="lbl"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            style="width:12px;height:12px;color:var(--gold)">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg> Solde actuel</div>
                    <div class="sol-amt">{{ number_format($solde ?? 0, 0, ',', ' ') }}<span>FCFA</span></div>
                    <div class="mo-badge"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            style="width:11px;height:11px">
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>{{ now()->format('F Y') }}</div>
                </div>

                <div class="card stat">
                    <div>
                        <div class="lbl">Revenus du mois</div>
                        <div class="s-val g">{{ number_format($revenusMois ?? 0, 0, ',', ' ') }}</div>
                        <div class="s-sub">FCFA cumulés</div>
                    </div>
                    <div class="s-icon g"><svg fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                            <polyline points="17 6 23 6 23 12" />
                        </svg></div>
                </div>

                <div class="card card-ch">
                    <div class="ch-hd">
                        <span class="ch-ttl">Statistiques mensuelles</span>
                        <div class="badges"><span class="bdg g">Revenus</span><span class="bdg r">Dépenses</span>
                        </div>
                    </div>
                    <div class="ch-w"><canvas id="financeChart"></canvas></div>
                </div>

                <div class="card" style="grid-row:span 2;overflow:hidden;">
                    <div class="tr-hd">Dernières dépenses<svg fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                        </svg></div>
                    <div class="tr-list">
                        @forelse($dernieresDepenses as $d)
                            <div class="tr-item">
                                <div class="tr-l">
                                    <div class="tr-dot"><svg fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <line x1="12" y1="5" x2="12" y2="19" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                        </svg></div>
                                    <div>
                                        <div class="tr-nm">{{ $d->titre }}</div>
                                        <div class="tr-dt">{{ $d->created_at->format('d M, Y') }}</div>
                                    </div>
                                </div>
                                <div class="tr-amt">-{{ number_format($d->montant, 0, ',', ' ') }} F</div>
                            </div>
                        @empty
                            <div class="empty"><svg fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" y1="8" x2="12" y2="12" />
                                    <line x1="12" y1="16" x2="12.01" y2="16" />
                                </svg>Aucune transaction.</div>
                        @endforelse
                    </div>
                </div>

                <div class="card stat">
                    <div>
                        <div class="lbl">Dépenses du mois</div>
                        <div class="s-val r">{{ number_format($depensesMois ?? 0, 0, ',', ' ') }}</div>
                        <div class="s-sub">FCFA dépensés</div>
                    </div>
                    <div class="s-icon r"><svg fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <polyline points="23 18 13.5 8.5 8.5 13.5 1 6" />
                            <polyline points="17 18 23 18 23 12" />
                        </svg></div>
                </div>
            </div>

            <div class="qnav">
                @php $ni=[['url'=>'/revenus','label'=>'Revenus','desc'=>'Gérer les entrées','icon'=>'<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/>'],['url'=>'/depenses','label'=>'Dépenses','desc'=>'Suivre les sorties','icon'=>'<rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/>'],['url'=>'/budgets','label'=>'Budget','desc'=>'Planifier le mois','icon'=>'<path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/>'],['url'=>'/rapports','label'=>'Rapports','desc'=>'Analyses & Stats','icon'=>'<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>']]; @endphp
                @foreach ($ni as $i)
                    <a href="{{ $i['url'] }}" class="qcard">
                        <div class="q-icon"><svg fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">{!! $i['icon'] !!}</svg></div>
                        <div class="q-lbl">{{ $i['label'] }}</div>
                        <div class="q-desc">{{ $i['desc'] }}</div>
                        <div class="q-arr"><svg fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <polyline points="9 18 15 12 9 6" />
                            </svg></div>
                    </a>
                @endforeach
            </div>
        </main>
    </div>

    <script>
        const dd = @json($depensesStats),
            rd = @json($revenusStats);
        const lb = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];
        const dep = [],
            rev = [];
        for (let i = 1; i <= 12; i++) {
            dep.push(dd[i] ?? 0);
            rev.push(rd[i] ?? 0);
        }
        new Chart(document.getElementById('financeChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: lb,
                datasets: [{
                        label: 'Dépenses',
                        data: dep,
                        backgroundColor: 'rgba(224,82,82,0.7)',
                        borderRadius: 7,
                        barThickness: 12
                    },
                    {
                        label: 'Revenus',
                        data: rev,
                        backgroundColor: 'rgba(201,168,76,0.75)',
                        borderRadius: 7,
                        barThickness: 12
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                family: "'Barlow',sans-serif",
                                size: 11,
                                weight: '600'
                            },
                            boxWidth: 9,
                            boxHeight: 9,
                            usePointStyle: true,
                            padding: 14,
                            color: '#80807A'
                        }
                    },
                    tooltip: {
                        backgroundColor: '#111',
                        titleFont: {
                            size: 12,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 11
                        },
                        padding: 11,
                        cornerRadius: 10,
                        displayColors: false,
                        titleColor: '#C9A84C',
                        bodyColor: '#F0EEE8'
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                family: "'Barlow',sans-serif",
                                weight: '600',
                                size: 10
                            },
                            color: '#505050'
                        }
                    },
                    y: {
                        grid: {
                            color: 'rgba(255,255,255,0.04)'
                        },
                        ticks: {
                            color: '#505050',
                            font: {
                                size: 10
                            },
                            callback: v => v.toLocaleString() + ' F'
                        },
                        border: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
