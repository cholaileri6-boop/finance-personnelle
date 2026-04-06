<x-app-layout>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Barlow:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --gold-soft: #e2b857;
            --admin-bg: #111827;
            --admin-card: #1f2937;
            --admin-border: rgba(226, 184, 87, 0.1);
            --font-heading: 'Instrument Serif', serif;
            --font-body: 'Barlow', sans-serif;
        }
        body { background-color: var(--admin-bg); font-family: var(--font-body); color: #f3f4f6; }
        .sidebar {
            width: 260px; background-color: var(--admin-card);
            border-right: 1px solid var(--admin-border);
            height: 100vh; position: fixed; left: 0; top: 0; z-index: 50;
        }
        .main-content { margin-left: 260px; padding: 2.5rem; }
        .card-admin { background: var(--admin-card); border: 1px solid rgba(255,255,255,0.05); border-radius: 1rem; }
        .nav-item {
            display: flex; align-items: center;
            padding: 0.8rem 1.5rem; color: #9ca3af;
            transition: all 0.2s; margin: 0.25rem 1rem; border-radius: 0.5rem;
            text-decoration: none;
        }
        .nav-item:hover, .nav-item.active { background: rgba(226, 184, 87, 0.1); color: var(--gold-soft); }
        table { border-collapse: collapse; width: 100%; }
        thead th { background: #111827; color: #9ca3af; font-size: 0.7rem; letter-spacing: 0.08em; text-transform: uppercase; padding: 0.85rem 1.25rem; text-align: left; }
        tbody tr { border-bottom: 1px solid rgba(255,255,255,0.04); transition: background 0.15s; }
        tbody tr:hover { background: rgba(255,255,255,0.03); }
        tbody td { padding: 1rem 1.25rem; font-size: 0.875rem; color: #d1d5db; }
        .badge { display: inline-flex; align-items: center; gap: 4px; padding: 3px 10px; border-radius: 999px; font-size: 0.7rem; font-weight: 600; }
        .badge-blue { background: rgba(59,130,246,0.15); color: #60a5fa; }
        .badge-green { background: rgba(34,197,94,0.15); color: #4ade80; }
        .avatar { width: 34px; height: 34px; border-radius: 50%; background: rgba(226,184,87,0.15); color: var(--gold-soft); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.8rem; flex-shrink: 0; }
        .tab-btn {
            padding: 0.6rem 1.5rem; border-radius: 8px; font-size: 0.85rem; font-weight: 600;
            cursor: pointer; transition: all 0.2s; border: none; background: transparent; color: #6b7280;
        }
        .tab-btn.active { background: rgba(226,184,87,0.12); color: var(--gold-soft); }
        .tab-btn:hover:not(.active) { color: #d1d5db; }
    </style>

    <aside class="sidebar hidden lg:block">
        <div class="py-8 px-6">
            <div class="mb-10 px-4">
                <span class="text-2xl font-bold text-white" style="font-family: var(--font-heading)">
                    Admin<span style="color: var(--gold-soft)">.</span>
                </span>
            </div>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="nav-item"><i class="fas fa-tachometer-alt mr-3"></i> Dashboard</a>
                <a href="{{ route('admin.users') }}" class="nav-item"><i class="fas fa-users mr-3"></i> Utilisateurs</a>
                <a href="{{ route('admin.transactions') }}" class="nav-item active"><i class="fas fa-exchange-alt mr-3"></i> Transactions</a>
                <a href="{{ route('admin.budgets') }}" class="nav-item"><i class="fas fa-wallet mr-3"></i> Budgets</a>
                <a href="{{ route('admin.categories') }}" class="nav-item"><i class="fas fa-tags mr-3"></i> Catégories</a>
                <a href="{{ route('admin.alerts') }}" class="nav-item"><i class="fas fa-bell mr-3"></i> Alertes</a>
            </nav>
        </div>
    </aside>

    <main class="main-content">
        <div class="max-w-7xl mx-auto">

            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-white" style="font-family: var(--font-heading)">
                    <i class="fas fa-exchange-alt mr-3" style="color: var(--gold-soft)"></i> Gestion des Transactions
                </h1>
                <div class="text-sm text-gray-500">{{ now()->format('d/m/Y H:i') }}</div>
            </div>

            <!-- Tabs -->
            <div class="flex gap-2 mb-6">
                <button class="tab-btn active" id="tab-depenses" onclick="showTab('depenses')">
                    <i class="fas fa-credit-card mr-2"></i>Dépenses
                </button>
                <button class="tab-btn" id="tab-revenus" onclick="showTab('revenus')">
                    <i class="fas fa-euro-sign mr-2"></i>Revenus
                </button>
            </div>

            <!-- Dépenses -->
            <div id="content-depenses" class="tab-content card-admin overflow-hidden">
                <div class="overflow-x-auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Description</th>
                                <th>Catégorie</th>
                                <th>Montant</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($depenses as $depense)
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">{{ strtoupper(substr($depense->user->name, 0, 1)) }}</div>
                                            <div>
                                                <div class="font-medium text-white">{{ $depense->user->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $depense->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-gray-300">{{ $depense->description }}</td>
                                    <td><span class="badge badge-blue"><i class="fas fa-tag"></i> {{ $depense->category->nom ?? 'Non catégorisée' }}</span></td>
                                    <td style="color: #f87171; font-weight: 600;">-{{ number_format($depense->amount, 2) }} €</td>
                                    <td class="text-gray-400">{{ $depense->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($depenses->hasPages())
                    <div class="px-6 pb-6 mt-4">{{ $depenses->links() }}</div>
                @endif
            </div>

            <!-- Revenus -->
            <div id="content-revenus" class="tab-content card-admin overflow-hidden" style="display:none">
                <div class="overflow-x-auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Description</th>
                                <th>Catégorie</th>
                                <th>Montant</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($revenus as $revenu)
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">{{ strtoupper(substr($revenu->user->name, 0, 1)) }}</div>
                                            <div>
                                                <div class="font-medium text-white">{{ $revenu->user->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $revenu->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-gray-300">{{ $revenu->description }}</td>
                                    <td><span class="badge badge-green"><i class="fas fa-tag"></i> {{ $revenu->category->nom ?? 'Non catégorisée' }}</span></td>
                                    <td style="color: #4ade80; font-weight: 600;">+{{ number_format($revenu->amount, 2) }} €</td>
                                    <td class="text-gray-400">{{ $revenu->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($revenus->hasPages())
                    <div class="px-6 pb-6 mt-4">{{ $revenus->links() }}</div>
                @endif
            </div>

        </div>
    </main>

    <script>
        function showTab(tab) {
            document.querySelectorAll('.tab-content').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
            document.getElementById('content-' + tab).style.display = 'block';
            document.getElementById('tab-' + tab).classList.add('active');
        }
    </script>
</x-app-layout>