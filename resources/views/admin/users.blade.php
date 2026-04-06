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
        .badge-admin { background: rgba(168,85,247,0.15); color: #c084fc; }
        .badge-user { background: rgba(59,130,246,0.15); color: #60a5fa; }
        .badge-active { background: rgba(34,197,94,0.15); color: #4ade80; }
        .badge-inactive { background: rgba(248,113,113,0.15); color: #f87171; }
        .badge-orange { background: rgba(249,115,22,0.15); color: #fb923c; }
        .badge-gray { background: rgba(107,114,128,0.15); color: #9ca3af; }
        .avatar { width: 40px; height: 40px; border-radius: 50%; background: rgba(226,184,87,0.15); color: var(--gold-soft); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.9rem; flex-shrink: 0; }
        .stat-card { background: var(--admin-card); border-radius: 0.875rem; padding: 1.25rem 1.5rem; border: 1px solid rgba(255,255,255,0.05); display: flex; align-items: center; gap: 1rem; }
        .stat-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0; }
        .action-btn { width: 30px; height: 30px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; border: none; cursor: pointer; transition: all 0.2s; background: transparent; }
        .action-btn:hover { background: rgba(255,255,255,0.06); }
        .mini-info { display: flex; align-items: center; gap: 5px; font-size: 0.75rem; color: #9ca3af; margin-bottom: 2px; }
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
                <a href="{{ route('admin.users') }}" class="nav-item active"><i class="fas fa-users mr-3"></i> Utilisateurs</a>
                <a href="{{ route('admin.transactions') }}" class="nav-item"><i class="fas fa-exchange-alt mr-3"></i> Transactions</a>
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
                    <i class="fas fa-users mr-3" style="color: var(--gold-soft)"></i> Gestion des Utilisateurs
                </h1>
                <div class="text-sm text-gray-500">{{ now()->format('d/m/Y H:i') }}</div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(59,130,246,0.12)">
                        <i class="fas fa-users" style="color: #60a5fa"></i>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Total utilisateurs</p>
                        <p class="text-2xl font-bold text-white">{{ $users->total() }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(34,197,94,0.12)">
                        <i class="fas fa-user-check" style="color: #4ade80"></i>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Utilisateurs actifs</p>
                        <p class="text-2xl font-bold text-white">{{ $users->where('is_active', true)->count() }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(168,85,247,0.12)">
                        <i class="fas fa-user-shield" style="color: #c084fc"></i>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Administrateurs</p>
                        <p class="text-2xl font-bold text-white">{{ $users->where('is_admin', true)->count() }}</p>
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
                                <th>Rôle</th>
                                <th>Statut</th>
                                <th>Activité</th>
                                <th>Alertes</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                                            <div>
                                                <div class="font-medium text-white">{{ $user->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($user->is_admin)
                                            <span class="badge badge-admin"><i class="fas fa-user-shield"></i> Admin</span>
                                        @else
                                            <span class="badge badge-user"><i class="fas fa-user"></i> Utilisateur</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->is_active ?? true)
                                            <span class="badge badge-active"><i class="fas fa-check-circle"></i> Actif</span>
                                        @else
                                            <span class="badge badge-inactive"><i class="fas fa-times-circle"></i> Inactif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="mini-info"><i class="fas fa-euro-sign" style="color:#4ade80"></i> {{ $user->revenus->count() }} revenus</div>
                                        <div class="mini-info"><i class="fas fa-credit-card" style="color:#f87171"></i> {{ $user->depenses->count() }} dépenses</div>
                                        <div class="mini-info"><i class="fas fa-wallet" style="color:#60a5fa"></i> {{ $user->budgets->count() }} budgets</div>
                                    </td>
                                    <td>
                                        @if ($user->alerts_count > 0)
                                            <span class="badge badge-orange"><i class="fas fa-bell"></i> {{ $user->alerts_count }} non lues</span>
                                        @else
                                            <span class="badge badge-gray"><i class="fas fa-bell-slash"></i> Aucune</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex gap-2">
                                            @if (!$user->is_admin || $users->where('is_admin', true)->count() > 1)
                                                <form method="POST" action="{{ route('admin.users.toggle-status', $user) }}" class="inline">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" class="action-btn" title="Changer le statut" style="color: #60a5fa;">
                                                        <i class="fas fa-toggle-{{ $user->is_active ?? true ? 'on' : 'off' }}"></i>
                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                                    onsubmit="return confirm('Supprimer cet utilisateur ?')" class="inline">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="action-btn" title="Supprimer" style="color: #f87171;">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($users->hasPages())
                    <div class="px-6 pb-6 mt-4">{{ $users->links() }}</div>
                @endif
            </div>

        </div>
    </main>
</x-app-layout>