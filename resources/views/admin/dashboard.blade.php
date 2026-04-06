<x-app-layout>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Barlow:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --gold-soft: #e2b857;
            --admin-bg: #111827; 
            --admin-card: #1f2937;
            --font-heading: 'Instrument Serif', serif;
            --font-body: 'Barlow', sans-serif;
        }

        body {
            background-color: var(--admin-bg);
            font-family: var(--font-body);
            color: #f3f4f6;
        }

        .sidebar {
            width: 260px;
            background-color: var(--admin-card);
            border-right: 1px solid rgba(226, 184, 87, 0.1);
            height: 100vh;
            position: fixed;
            left: 0; top: 0; z-index: 50;
        }

        .main-content {
            margin-left: 260px;
            padding: 2.5rem;
        }

        .card-admin {
            background: var(--admin-card);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 1rem;
        }

        .nav-item {
            display: flex; align-items: center;
            padding: 0.8rem 1.5rem; color: #9ca3af;
            transition: all 0.2s; margin: 0.25rem 1rem; border-radius: 0.5rem;
        }

        .nav-item:hover, .nav-item.active {
            background: rgba(226, 184, 87, 0.1);
            color: var(--gold-soft);
        }
    </style>

    <aside class="sidebar hidden lg:block">
        <div class="py-8 px-6">
            <div class="mb-10 px-4">
                <span class="text-2xl font-bold text-white" style="font-family: var(--font-heading)">
                    Admin<span style="color: var(--gold-soft)">.</span>
                </span>
            </div>
            <nav>
                <a href="{{ route('dashboard') }}" class="nav-item active"><i class="fas fa-tachometer-alt mr-3"></i> Dashboard</a>
                <a href="{{ route('admin.users') }}" class="nav-item"><i class="fas fa-users mr-3"></i> Utilisateurs</a>
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
                    <i class="fas fa-tachometer-alt text-blue-500 mr-3"></i> Dashboard Administrateur
                </h1>
                <div class="text-sm text-gray-400">Dernière mise à jour: {{ now()->format('d/m/Y H:i') }}</div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="card-admin p-6 border-l-4 border-blue-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-300 text-sm font-medium">Utilisateurs actifs</p>
                            <p class="text-2xl font-bold text-white">{{ $activeUsers }}</p>
                        </div>
                        <i class="fas fa-users text-3xl text-blue-500/30"></i>
                    </div>
                </div>

                <div class="card-admin p-6 border-l-4 border-purple-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-300 text-sm font-medium">Administrateurs</p>
                            <p class="text-2xl font-bold text-white">{{ $adminUsers }}</p>
                        </div>
                        <i class="fas fa-user-shield text-3xl text-purple-500/30"></i>
                    </div>
                </div>

                <div class="card-admin p-6 border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-300 text-sm font-medium">Solde global</p>
                            <p class="text-2xl font-bold text-white">{{ number_format($soldeGlobal, 2) }} €</p>
                        </div>
                        <i class="fas fa-euro-sign text-3xl text-green-500/30"></i>
                    </div>
                </div>

                <div class="card-admin p-6 border-l-4 border-orange-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-orange-300 text-sm font-medium">Alertes actives</p>
                            <p class="text-2xl font-bold text-white">{{ $recentAlerts->where('is_read', false)->count() }}</p>
                        </div>
                        <i class="fas fa-bell text-3xl text-orange-500/30"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="card-admin p-6">
                    <h3 class="text-lg font-semibold text-white mb-4" style="font-family: var(--font-heading)">
                        <i class="fas fa-calendar-alt text-blue-500 mr-2"></i> Activité des 30 derniers jours
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center"><span class="text-gray-400">Nouveaux utilisateurs</span><span class="font-semibold text-blue-400">{{ $recentUsers->count() }}</span></div>
                        <div class="flex justify-between items-center"><span class="text-gray-400">Revenus totaux</span><span class="font-semibold text-green-400">{{ number_format($revenus30Days, 2) }} €</span></div>
                        <div class="flex justify-between items-center"><span class="text-gray-400">Dépenses totales</span><span class="font-semibold text-red-400">{{ number_format($depenses30Days, 2) }} €</span></div>
                    </div>
                </div>

                <div class="card-admin p-6">
                    <h3 class="text-lg font-semibold text-white mb-4" style="font-family: var(--font-heading)">
                        <i class="fas fa-chart-pie text-green-500 mr-2"></i> Répartition globale
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center"><span class="text-gray-400">Total revenus</span><span class="font-semibold text-green-400">{{ number_format($totalRevenus, 2) }} €</span></div>
                        <div class="flex justify-between items-center"><span class="text-gray-400">Total dépenses</span><span class="font-semibold text-red-400">{{ number_format($totalDepenses, 2) }} €</span></div>
                        <div class="flex justify-between items-center"><span class="text-gray-400">Solde net</span><span class="font-semibold {{ $soldeGlobal >= 0 ? 'text-green-400' : 'text-red-400' }}">{{ number_format($soldeGlobal, 2) }} €</span></div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="card-admin p-6">
                    <h3 class="text-lg font-semibold text-white mb-4" style="font-family: var(--font-heading)"><i class="fas fa-bell text-orange-500 mr-2"></i> Alertes récentes</h3>
                    <div class="space-y-3 max-h-64 overflow-y-auto">
                        @forelse($recentAlerts as $alert)
                            <div class="flex items-start space-x-3 p-3 bg-gray-800/50 rounded-lg">
                                <i class="fas fa-exclamation-triangle text-orange-500 mt-1"></i>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-200">{{ $alert->message }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $alert->user->name }} • {{ $alert->created_at->diffForHumans() }}</p>
                                </div>
                                @if (!$alert->is_read) <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-orange-500/20 text-orange-400">Non lu</span> @endif
                            </div>
                        @empty <p class="text-gray-500 text-sm">Aucune alerte.</p> @endforelse
                    </div>
                </div>

                <div class="card-admin p-6">
                    <h3 class="text-lg font-semibold text-white mb-4" style="font-family: var(--font-heading)"><i class="fas fa-exclamation-circle text-red-500 mr-2"></i> Budgets dépassés</h3>
                    <div class="space-y-3 max-h-64 overflow-y-auto">
                        @forelse($budgetsDepasses as $budget)
                            <div class="flex items-start space-x-3 p-3 bg-red-500/10 rounded-lg">
                                <i class="fas fa-times-circle text-red-500 mt-1"></i>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-200">Budget dépassé pour {{ $budget->user->name }}</p>
                                    <p class="text-xs text-gray-400 mt-1">Catégorie: {{ $budget->category->nom ?? 'N/A' }}</p>
                                    <p class="text-xs text-red-400 font-medium">Dépensé: {{ number_format($budget->depenses->sum('montant'), 2) }} € / {{ number_format($budget->montant, 2) }} €</p>
                                </div>
                            </div>
                        @empty <p class="text-gray-500 text-sm">Aucun budget dépassé.</p> @endforelse
                    </div>
                </div>
            </div>

            <div class="card-admin p-6 bg-gray-800/30">
                <h3 class="text-lg font-semibold text-white mb-4" style="font-family: var(--font-heading)"><i class="fas fa-rocket text-blue-500 mr-2"></i> Navigation rapide</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                    <a href="{{ route('admin.users') }}" class="flex flex-col items-center p-4 bg-gray-800 rounded-lg hover:border-gold-soft border border-transparent transition-all"><i class="fas fa-users text-2xl text-blue-400 mb-2"></i><span class="text-xs font-medium text-gray-300 uppercase">Utilisateurs</span></a>
                    <a href="{{ route('admin.transactions') }}" class="flex flex-col items-center p-4 bg-gray-800 rounded-lg hover:border-gold-soft border border-transparent transition-all"><i class="fas fa-exchange-alt text-2xl text-green-400 mb-2"></i><span class="text-xs font-medium text-gray-300 uppercase">Transactions</span></a>
                    <a href="{{ route('admin.budgets') }}" class="flex flex-col items-center p-4 bg-gray-800 rounded-lg hover:border-gold-soft border border-transparent transition-all"><i class="fas fa-wallet text-2xl text-purple-400 mb-2"></i><span class="text-xs font-medium text-gray-300 uppercase">Budgets</span></a>
                    <a href="{{ route('admin.categories') }}" class="flex flex-col items-center p-4 bg-gray-800 rounded-lg hover:border-gold-soft border border-transparent transition-all"><i class="fas fa-tags text-2xl text-orange-400 mb-2"></i><span class="text-xs font-medium text-gray-300 uppercase">Catégories</span></a>
                    <a href="{{ route('admin.alerts') }}" class="flex flex-col items-center p-4 bg-gray-800 rounded-lg hover:border-gold-soft border border-transparent transition-all"><i class="fas fa-bell text-2xl text-red-400 mb-2"></i><span class="text-xs font-medium text-gray-300 uppercase">Alertes</span></a>
                    <a href="{{ route('dashboard') }}" class="flex flex-col items-center p-4 bg-gray-800 rounded-lg hover:border-gold-soft border border-transparent transition-all"><i class="fas fa-home text-2xl text-gray-400 mb-2"></i><span class="text-xs font-medium text-gray-300 uppercase">Dashboard</span></a>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>