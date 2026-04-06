<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Depense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    /**
     * Afficher le dashboard budget
     */
    public function index()
    {
        $userId = Auth::id();
        $month = now()->month;
        $year = now()->year;

        // Récupérer le budget du mois
        $budget = Budget::where('user_id', $userId)
            ->where('month', $month)
            ->where('year', $year)
            ->first();

        // Dépenses totales du mois
        $depensesMois = Depense::where('user_id', $userId)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('amount');

        // Dépenses par catégorie pour le graphique
        $depensesParCategorie = Depense::where('user_id', $userId)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get()
            ->groupBy(fn($d) => $d->category->name)
            ->map(fn($items) => $items->sum('amount'));

        // Dernières dépenses
        $dernieresDepenses = Depense::where('user_id', $userId)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('budgets.index', compact(
            'budget', 
            'depensesMois', 
            'depensesParCategorie', 
            'dernieresDepenses'
        ));
    }

    /**
     * Créer ou mettre à jour le budget du mois
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:2000'
        ]);

        $userId = Auth::id();

        // Vérifier si un budget existe déjà pour ce mois
        $budget = Budget::updateOrCreate(
            [
                'user_id' => $userId,
                'month' => $request->month,
                'year' => $request->year
            ],
            [
                'amount' => $request->amount
            ]
        );

        return redirect()->back()->with('success', 'Budget enregistré avec succès !');
    }
}