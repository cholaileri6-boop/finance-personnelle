<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alert;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Depense;
use App\Models\Revenu;


class AdminController extends Controller
{
    public function dashboard()
    {
        // Métriques générales
        $totalUsers = User::count();
        $activeUsers = User::where('is_admin', false)->count();
        $adminUsers = User::where('is_admin', true)->count();

        // Métriques financières
        $totalRevenus = Revenu::sum('amount');
        $totalDepenses = Depense::sum('amount');
        $soldeGlobal = $totalRevenus - $totalDepenses;

        // Métriques des 30 derniers jours
        $date30DaysAgo = now()->subDays(30);
        $revenus30Days = Revenu::where('created_at', '>=', $date30DaysAgo)->sum('amount');
        $depenses30Days = Depense::where('created_at', '>=', $date30DaysAgo)->sum('amount');

        // Alertes récentes
        $recentAlerts = Alert::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Utilisateurs actifs récemment
        $recentUsers = User::where('created_at', '>=', $date30DaysAgo)
            ->orderBy('created_at', 'desc')
            ->get();

        // Budgets dépassés
     // Par ceci :
     $budgetsDepasses = collect(); // tableau vide pour l'instant

        // Statistiques par catégorie
        $categoriesStats = Category::withCount(['depenses', 'revenus'])
            ->with(['depenses' => function($query) {
                $query->selectRaw('category_id, SUM(amount) as total_depenses')
                      ->groupBy('category_id');
            }, 'revenus' => function($query) {
                $query->selectRaw('category_id, SUM(amount) as total_revenus')
                      ->groupBy('category_id');
            }])->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'activeUsers',
            'adminUsers',
            'totalRevenus',
            'totalDepenses',
            'soldeGlobal',
            'revenus30Days',
            'depenses30Days',
            'recentAlerts',
            'recentUsers',
            'budgetsDepasses',
            'categoriesStats'
        ));
    }

    public function users()
    {
        $users = User::with(['budgets', 'depenses', 'revenus', 'alerts'])
            ->withCount(['alerts' => function($query) {
                $query->where('is_read', false);
            }])
            ->paginate(20);

        return view('admin.users', compact('users'));
    }

    public function transactions()
    {
        $depenses = Depense::with(['user', 'category'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $revenus = Revenu::with(['user', 'category'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.transactions', compact('depenses', 'revenus'));
    }

   public function budgets()
   {
   $budgets = Budget::with(['user'])
   ->orderBy('created_at', 'desc')
   ->paginate(20);

   return view('admin.budgets', compact('budgets'));
   }

   public function categories()
   {
   $categories = Category::withCount(['depenses', 'revenus'])
   ->paginate(20);

   return view('admin.categories', compact('categories'));
   }

    public function alerts()
    {
        $alerts = Alert::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.alerts', compact('alerts'));
    }

    public function toggleUserStatus(User $user)
    {
        // Pour l'instant, on peut activer/désactiver un utilisateur
        // On pourrait ajouter un champ 'is_active' dans la table users
        $user->update(['is_active' => !$user->is_active]);

        return redirect()->back()->with('success', 'Statut de l\'utilisateur mis à jour.');
    }

    public function deleteUser(User $user)
    {
        // Vérifier qu'on ne supprime pas le dernier admin
        if ($user->is_admin && User::where('is_admin', true)->count() <= 1) {
            return redirect()->back()->with('error', 'Impossible de supprimer le dernier administrateur.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Utilisateur supprimé.');
    }
}


