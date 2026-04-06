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
        .badge-purple { background: rgba(168,85,247,0.15); color: #c084fc; }
        .cat-icon { width: 40px; height: 40px; border-radius: 10px; background: rgba(226,184,87,0.12); color: var(--gold-soft); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
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
                <a href="{{ route('admin.transactions') }}" class="nav-item"><i class="fas fa-exchange-alt mr-3"></i> Transactions</a>
                <a href="{{ route('admin.budgets') }}" class="nav-item"><i class="fas fa-wallet mr-3"></i> Budgets</a>
                <a href="{{ route('admin.categories') }}" class="nav-item active"><i class="fas fa-tags mr-3"></i> Catégories</a>
                <a href="{{ route('admin.alerts') }}" class="nav-item"><i class="fas fa-bell mr-3"></i> Alertes</a>
            </nav>
        </div>
    </aside>

    <main class="main-content">
        <div class="max-w-7xl mx-auto">

            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-white" style="font-family: var(--font-heading)">
                    <i class="fas fa-tags mr-3" style="color: var(--gold-soft)"></i> Gestion des Catégories
                </h1>
                <div class="text-sm text-gray-500">{{ now()->format('d/m/Y H:i') }}</div>
            </div>

            <div class="card-admin overflow-hidden">
                <div class="overflow-x-auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Catégorie</th>
                                <th>Revenus</th>
                                <th>Dépenses</th>
                                <th>Solde</th>
                                <th>Transactions</th>
                                <th>Budgets</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                @php
                                    $totalRevenus = $category->revenus->sum('amount') ?? 0;
                                    $totalDepenses = $category->depenses->sum('amount') ?? 0;
                                    $solde = $totalRevenus - $totalDepenses;
                                    $totalTransactions = $category->depenses_count + $category->revenus_count;
                                @endphp
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="cat-icon"><i class="fas fa-tag"></i></div>
                                            <div>
                                                <div class="font-medium text-white">{{ $category->nom }}</div>
                                                <div class="text-xs text-gray-500">ID: {{ $category->id }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="color: #4ade80; font-weight: 600;">{{ number_format($totalRevenus, 2) }} €</div>
                                        <div class="text-xs text-gray-500">{{ $category->revenus_count }} trans.</div>
                                    </td>
                                    <td>
                                        <div style="color: #f87171; font-weight: 600;">{{ number_format($totalDepenses, 2) }} €</div>
                                        <div class="text-xs text-gray-500">{{ $category->depenses_count }} trans.</div>
                                    </td>
                                    <td style="color: {{ $solde >= 0 ? '#4ade80' : '#f87171' }}; font-weight: 600;">
                                        {{ number_format($solde, 2) }} €
                                    </td>
                                    <td>
                                        <span class="badge badge-blue"><i class="fas fa-exchange-alt"></i> {{ $totalTransactions }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-purple"><i class="fas fa-wallet"></i> {{ $category->budgets_count }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($categories->hasPages())
                    <div class="px-6 pb-6 mt-4">{{ $categories->links() }}</div>
                @endif
            </div>

        </div>
    </main>
</x-app-layout>