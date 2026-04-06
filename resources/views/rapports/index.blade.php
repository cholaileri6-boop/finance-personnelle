<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700;9..144,900&family=Outfit:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --gold: #B8922A;
            --gold-l: #D4AA4A;
            --gold-xl: #F0CC70;
            --gold-dim: rgba(184, 146, 42, .10);
            --gold-bd: rgba(184, 146, 42, .22);
            --gold-glow: rgba(184, 146, 42, .18);
            --bg: #F5F3EE;
            --bg2: #FFFFFF;
            --bg3: #F0EDE6;
            --text: #1C1A16;
            --t2: #5A5650;
            --t3: #9A9590;
            --bd: rgba(0, 0, 0, .07);
            --bd2: rgba(0, 0, 0, .12);
            --pos: #2E7D52;
            --pd: rgba(46, 125, 82, .08);
            --pb: rgba(46, 125, 82, .20);
            --neg: #B84040;
            --nd: rgba(184, 64, 64, .08);
            --nb: rgba(184, 64, 64, .20);
            --sb: #1A1916;
            --sb-bd: rgba(255, 255, 255, .07);
            --sb-t: rgba(255, 255, 255, .50);
            --r: 26px;
            --r2: 20px;
            --r3: 14px;
            --sh: 0 2px 8px rgba(0, 0, 0, .06);
            --shm: 0 4px 20px rgba(0, 0, 0, .08);
        }

        --sh: 0 2px 8px rgba(0, 0, 0, .06);
        --shm: 0 4px 20px rgba(0, 0, 0, .08);
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
            font-family: 'Outfit', sans-serif;
            color: var(--text);
        }

        .sb {
            width: 240px;
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

        .sb-top {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 26px 22px 24px;
            border-bottom: 1px solid var(--sb-bd);
        }

        .sb-icon {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
        }

        .sb-brand {
            font-family: 'Fraunces', serif;
            font-size: 17px;
            font-weight: 700;
            color: #fff;
            letter-spacing: -.3px;
            line-height: 1.1;
        }

        .sb-brand small {
            display: block;
            font-family: 'Outfit', sans-serif;
            font-size: 10px;
            font-weight: 500;
            color: rgba(255, 255, 255, .50);
            letter-spacing: .06em;
            text-transform: uppercase;
            margin-top: 1px;
        }

        .sb-nav {
            flex: 1;
            padding: 10px 0;
        }

        .sb-sec {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .22);
            padding: 14px 22px 6px;
        }

        .sb-a {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px 22px;
            font-size: 13.5px;
            font-weight: 500;
            color: var(--sb-t);
            text-decoration: none;
            transition: all .16s;
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
            width: 17px;
            height: 17px;
            flex-shrink: 0;
        }

        .sb-foot {
            padding: 14px 18px;
            border-top: 1px solid var(--sb-bd);
        }

        .sb-pill {
            display: flex;
            align-items: center;
            gap: 9px;
            background: var(--bg3);
            border: 1px solid var(--bd);
            border-radius: 50px;
            padding: 7px 13px 7px 7px;
        }

        .av {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), var(--gold-xl));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 12px;
            color: #fff;
            flex-shrink: 0;
        }

        .sb-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
        }

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
            margin-bottom: 30px;
        }

        .tp-sub {
            font-size: 11px;
            font-weight: 600;
            color: var(--t3);
            letter-spacing: .08em;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .tp-h {
            font-family: 'Fraunces', serif;
            font-size: 34px;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -.4px;
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
            background: var(--bg2);
            border: 1px solid var(--bd2);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--t2);
            transition: all .18s;
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
            background: linear-gradient(135deg, var(--gold), var(--gold-xl));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            color: #fff;
            box-shadow: 0 3px 12px var(--gold-glow);
        }

        /* KPI */
        .kpi-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 20px;
        }

        .kpi {
            background: var(--bg2);
            border: 1px solid var(--bd);
            border-radius: var(--r);
            padding: 22px 24px;
            box-shadow: var(--sh);
            transition: box-shadow .18s, transform .18s;
            position: relative;
            overflow: hidden;
        }

        .kpi:hover {
            box-shadow: var(--shm);
            transform: translateY(-1px);
        }

        .kpi::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            border-radius: var(--r) var(--r) 0 0;
        }

        .kpi.g-t::after {
            background: linear-gradient(90deg, var(--gold), var(--gold-xl));
        }

        .kpi.r-t::after {
            background: linear-gradient(90deg, var(--neg), transparent);
        }

        .kpi.p-t::after {
            background: linear-gradient(90deg, var(--pos), transparent);
        }

        .kpi-lbl {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .09em;
            text-transform: uppercase;
            color: var(--t3);
            margin-bottom: 8px;
        }

        .kpi-val {
            font-family: 'Fraunces', serif;
            font-size: 30px;
            font-weight: 700;
            letter-spacing: -.8px;
            line-height: 1;
            margin-bottom: 3px;
        }

        .kpi-val.g {
            color: var(--gold);
        }

        .kpi-val.r {
            color: var(--neg);
        }

        .kpi-val.p {
            color: var(--pos);
        }

        .kpi-sub {
            font-size: 11px;
            color: var(--t3);
        }

        /* GRID */
        .ag {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .card {
            background: var(--bg2);
            border: 1px solid var(--bd);
            border-radius: var(--r);
            padding: 22px;
            box-shadow: var(--sh);
            transition: box-shadow .18s;
        }

        .card:hover {
            box-shadow: var(--shm);
        }

        .card-ttl {
            font-size: 14px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 14px;
        }

        /* PERF card */
        .perf {
            background: var(--text);
            border-color: rgba(0, 0, 0, .2);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .perf .card-ttl {
            color: rgba(255, 255, 255, .4);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .09em;
            text-transform: uppercase;
        }

        .perf-val {
            font-family: 'Fraunces', serif;
            font-size: 42px;
            font-weight: 700;
            letter-spacing: -1.5px;
            line-height: 1;
            margin-bottom: 10px;
        }

        .perf-val.p {
            color: var(--gold-xl);
        }

        .perf-val.n {
            color: var(--neg);
        }

        .perf-val span {
            font-size: 16px;
            font-family: 'Outfit', sans-serif;
            font-weight: 300;
            color: rgba(255, 255, 255, .3);
            margin-left: 4px;
        }

        .perf-desc {
            font-size: 12px;
            color: rgba(255, 255, 255, .4);
            line-height: 1.5;
        }

        /* Table card */
        .mini-tbl {
            width: 100%;
            border-collapse: collapse;
        }

        .mini-tbl th {
            padding: 8px 12px;
            text-align: left;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .09em;
            text-transform: uppercase;
            color: var(--t3);
            border-bottom: 1px solid var(--bd);
            background: var(--bg3);
        }

        .mini-tbl th:last-child {
            text-align: right;
        }

        .mini-tbl td {
            padding: 11px 12px;
            font-size: 13px;
            border-bottom: 1px solid var(--bd);
            color: var(--t2);
        }

        .mini-tbl td:first-child {
            font-weight: 600;
            color: var(--text);
        }

        .mini-tbl td:last-child {
            text-align: right;
        }

        .mini-tbl tr:last-child td {
            border-bottom: none;
        }

        .mini-tbl tr:hover td {
            background: var(--bg3);
        }

        .a-pill {
            display: inline-flex;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 50px;
            background: var(--nd);
            color: var(--neg);
            border: 1px solid var(--nb);
        }

        .ch-w {
            height: 200px;
        }

        @media(max-width:1100px) {
            .kpi-row {
                grid-template-columns: 1fr 1fr;
            }

            .ag {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width:720px) {
            .sb {
                display: none;
            }

            .mn {
                padding: 18px;
            }

            .kpi-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="ff">
        <aside class="sb">
            <div class="sb-top">
                <svg class="sb-icon" viewBox="0 0 38 38" fill="none">
                    <path d="M19 3L34 11.5V27.5L19 36L4 27.5V11.5L19 3Z" fill="#1C1A16" stroke="#B8922A"
                        stroke-width="1.4" />
                    <path d="M14 14H22M14 19H20M14 24H18" stroke="#B8922A" stroke-width="1.8" stroke-linecap="round" />
                    <circle cx="24" cy="22" r="1.2" fill="#B8922A" />
                </svg>
                <div class="sb-brand">FinanceFlow <small>Gestion budgétaire</small></div>
            </div>
            <nav class="sb-nav">
                <div class="sb-sec">Principal</div>
                <a href="/dashboard" class="sb-a"><i class="fas fa-th"></i>Tableau de bord</a>
                <div class="sb-sec">Finances</div>
                <a href="/revenus" class="sb-a"><i class="fas fa-arrow-trend-up"></i>Revenus</a>
                <a href="/depenses" class="sb-a"><i class="fas fa-wallet"></i>Dépenses</a>
                <a href="/budgets" class="sb-a"><i class="fas fa-chart-pie"></i>Budget</a>
                <a href="/rapports" class="sb-a on"><i class="fas fa-chart-bar"></i>Rapports</a>
            </nav>
            <div class="sb-foot">
                <div class="sb-pill">
                    <div class="av">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div><span
                        class="sb-name">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </aside>

        <main class="mn">
            <div class="tp">
                <div>
                    <p class="tp-sub">Analyses</p>
                    <h1 class="tp-h">Rapports</h1>
                </div>
                <div class="tp-r">
                    <div class="ic-btn"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg></div>
                    <div class="tp-av">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                </div>
            </div>

            <!-- KPI -->
            <div class="kpi-row">
                <div class="kpi p-t">
                    <div class="kpi-lbl">Total Revenus</div>
                    <div class="kpi-val p">{{ number_format($totalRevenus) }}</div>
                    <div class="kpi-sub">FCFA encaissés</div>
                </div>
                <div class="kpi r-t">
                    <div class="kpi-lbl">Total Dépenses</div>
                    <div class="kpi-val r">{{ number_format($totalDepenses) }}</div>
                    <div class="kpi-sub">FCFA dépensés</div>
                </div>
                <div class="kpi g-t">
                    <div class="kpi-lbl">Solde net</div>
                    <div class="kpi-val g">{{ number_format($solde) }}</div>
                    <div class="kpi-sub">FCFA disponibles</div>
                </div>
            </div>

            <div class="ag">
                <!-- Doughnut -->
                <div class="card">
                    <div class="card-ttl">Répartition des dépenses</div>
                    <div class="ch-w"><canvas id="pieChart"></canvas></div>
                </div>

                <!-- Performance -->
                <div class="card perf">
                    <div class="card-ttl">Performance financière</div>
                    <div class="perf-val {{ $solde >= 0 ? 'p' : 'n' }}">{{ number_format($solde) }}<span>FCFA</span>
                    </div>
                    <p class="perf-desc">
                        {{ $solde >= 0 ? 'Vos revenus couvrent vos dépenses — bonne gestion ce mois.' : 'Vos dépenses dépassent vos revenus — pensez à réduire certains postes.' }}
                    </p>
                </div>

                <!-- Bar catégories -->
                <div class="card">
                    <div class="card-ttl">Dépenses par catégorie</div>
                    <div class="ch-w"><canvas id="barChart"></canvas></div>
                </div>

                <!-- Table -->
                <div class="card">
                    <div class="card-ttl">Détail par catégorie</div>
                    <table class="mini-tbl">
                        <thead>
                            <tr>
                                <th>Catégorie</th>
                                <th>Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($depensesCategorie as $cat => $val)
                                <tr>
                                    <td>{{ $cat }}</td>
                                    <td><span class="a-pill">{{ number_format($val) }} F</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Line évolution -->
                <div class="card" style="grid-column:span 2;">
                    <div class="card-ttl">Évolution mensuelle des dépenses</div>
                    <div class="ch-w"><canvas id="lineChart"></canvas></div>
                </div>
            </div>
        </main>
    </div>

    <script>
        const font = "'Outfit',sans-serif";
        const grid = 'rgba(0,0,0,0.04)';
        const tick = '#9A9590';
        const tip = {
            backgroundColor: '#1C1A16',
            titleFont: {
                size: 12,
                weight: 'bold'
            },
            bodyFont: {
                size: 11
            },
            padding: 10,
            cornerRadius: 8,
            displayColors: false,
            titleColor: '#D4AA4A',
            bodyColor: '#F5F3EE'
        };
        const cats = [
            @foreach ($depensesCategorie as $c => $v)
                "{{ $c }}",
            @endforeach
        ];
        const vals = [
            @foreach ($depensesCategorie as $c => $v)
                {{ $v }},
            @endforeach
        ];
        const evL = [
            @foreach ($evolution as $m => $v)
                "{{ $m }}",
            @endforeach
        ];
        const evV = [
            @foreach ($evolution as $m => $v)
                {{ $v }},
            @endforeach
        ];

        // Palette monochrome or — nuances de l'or
        const shades = ['#B8922A', '#C8A44A', '#D4B060', '#DEC07A', '#E8CE96', '#F0DAB0'];

        new Chart(document.getElementById('pieChart'), {
            type: 'doughnut',
            data: {
                labels: cats,
                datasets: [{
                    data: vals,
                    backgroundColor: shades,
                    borderColor: '#F5F3EE',
                    borderWidth: 3,
                    hoverOffset: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '62%',
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: {
                                family: font,
                                size: 11,
                                weight: '500'
                            },
                            color: tick,
                            padding: 10,
                            boxWidth: 10,
                            boxHeight: 10,
                            usePointStyle: true
                        }
                    },
                    tooltip: tip
                }
            }
        });

        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: cats,
                datasets: [{
                    data: vals,
                    backgroundColor: 'rgba(184,146,42,0.70)',
                    borderRadius: 7,
                    barThickness: 16,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: tip
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                family: font,
                                size: 10,
                                weight: '500'
                            },
                            color: tick
                        }
                    },
                    y: {
                        grid: {
                            color: grid
                        },
                        ticks: {
                            color: tick,
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

        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: evL,
                datasets: [{
                    data: evV,
                    borderColor: '#B8922A',
                    backgroundColor: 'rgba(184,146,42,0.08)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#B8922A',
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    tension: .35,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: tip
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                family: font,
                                size: 10,
                                weight: '500'
                            },
                            color: tick
                        }
                    },
                    y: {
                        grid: {
                            color: grid
                        },
                        ticks: {
                            color: tick,
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
