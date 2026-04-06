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
        .card-admin {
            background: var(--admin-card);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 1rem;
        }
        .nav-item {
            display: flex; align-items: center;
            padding: 0.8rem 1.5rem; color: #9ca3af;
            transition: all 0.2s; margin: 0.25rem 1rem; border-radius: 0.5rem;
            text-decoration: none;
        }
        .nav-item:hover, .nav-item.active {
            background: rgba(226, 184, 87, 0.1); color: var(--gold-soft);
        }
        table { border-collapse: collapse; width: 100%; }
        thead th { background: #111827; color: #9ca3af; font-size: 0.7rem; letter-spacing: 0.08em; text-transform: uppercase; padding: 0.85rem 1.25rem; text-align: left; }
        tbody tr { border-bottom: 1px solid rgba(255,255,255,0.04); transition: background 0.15s; }
        tbody tr:hover { background: rgba(255,255,255,0.03); }
        tbody td { padding: 1rem 1.25rem; font-size: 0.875rem; color: #d1d5db; }
        .badge { display: inline-flex; align-items: center; gap: 4px; padding: 3px 10px; border-radius: 999px; font-size: 0.7rem; font-weight: 600; }
        .badge-unread { background: rgba(249,115,22,0.15); color: #fb923c; }
        .badge-read { background: rgba(34,197,94,0.15); color: #4ade80; }
        .avatar { width: 34px; height: 34px; border-radius: 50%; background: rgba(226,184,87,0.15); color: var(--gold-soft); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.8rem; flex-shrink: 0; }
        .stat-card { background: var(--admin-card); border-radius: 0.875rem; padding: 1.25rem 1.5rem; border: 1px solid rgba(255,255,255,0.05); display: flex; align-items: center; gap: 1rem; }
        .stat-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0; }
        .pagination-wrapper { margin-top: 1.5rem; }
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
                <a href="{{ route('admin.categories') }}" class="nav-item"><i class="fas fa-tags mr-3"></i> Catégories</a>
                <a href="{{ route('admin.alerts') }}" class="nav-item active"><i class="fas fa-bell mr-3"></i> Alertes</a>
            </nav>
        </div>
    </aside>

    <main class="main-content">
        <div class="max-w-7xl mx-auto">

            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-white" style="font-family: var(--font-heading)">
                    <i class="fas fa-bell mr-3" style="color: var(--gold-soft)"></i> Gestion des Alertes
                </h1>
                <div class="text-sm text-gray-500">{{ now()->format('d/m/Y H:i') }}</div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(226,184,87,0.12)">
                        <i class="fas fa-bell" style="color: var(--gold-soft)"></i>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Total alertes</p>
                        <p class="text-2xl font-bold text-white">{{ $alerts->total() }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(249,115,22,0.12)">
                        <i class="fas fa-envelope" style="color: #fb923c"></i>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Non lues</p>
                        <p class="text-2xl font-bold text-white">{{ $alerts->where('is_read', false)->count() }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(34,197,94,0.12)">
                        <i class="fas fa-check-circle" style="color: #4ade80"></i>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Lues</p>
                        <p class="text-2xl font-bold text-white">{{ $alerts->where('is_read', true)->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="card-admin overflow-hidden">
                <div class="overflow-x-auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Message</th>
                                <th>Statut</th>
                                <th>Date création</th>
                                <th>Dernière lecture</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alerts as $alert)
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">{{ strtoupper(substr($alert->user->name, 0, 1)) }}</div>
                                            <div>
                                                <div class="font-medium text-white">{{ $alert->user->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $alert->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="max-w-xs truncate text-gray-300" title="{{ $alert->message }}">
                                            {{ $alert->message }}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($alert->is_read)
                                            <span class="badge badge-read"><i class="fas fa-check-circle"></i> Lu</span>
                                        @else
                                            <span class="badge badge-unread"><i class="fas fa-envelope"></i> Non lu</span>
                                        @endif
                                    </td>
                                    <td class="text-gray-400">{{ $alert->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="text-gray-400">
                                        @if ($alert->updated_at != $alert->created_at)
                                            {{ $alert->updated_at->format('d/m/Y H:i') }}
                                        @else
                                            <span class="text-gray-600">—</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($alerts->hasPages())
                    <div class="pagination-wrapper px-6 pb-6">{{ $alerts->links() }}</div>
                @endif
            </div>

        </div>
    </main>
</x-app-layout>