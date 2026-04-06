<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\Revenu;

class RapportController extends Controller
{
   public function index(Request $request)
   {

   $userId = auth()->id();

   $mois = $request->mois ?? now()->month;
   $annee = $request->annee ?? now()->year;

   $totalDepenses = Depense::where('user_id',$userId)
   ->whereMonth('created_at',$mois)
   ->whereYear('created_at',$annee)
   ->sum('amount');

   $totalRevenus = Revenu::where('user_id',$userId)
   ->whereMonth('created_at',$mois)
   ->whereYear('created_at',$annee)
   ->sum('amount');

   $solde = $totalRevenus - $totalDepenses;

   $depensesCategorie = Depense::where('user_id',$userId)
   ->whereMonth('created_at',$mois)
   ->get()
   ->groupBy(fn($d)=>$d->category->name)
   ->map(fn($items)=>$items->sum('amount'));

   $transactions = Depense::where('user_id',$userId)
   ->latest()
   ->take(5)
   ->get();

   $evolution = Depense::where('user_id',$userId)
   ->selectRaw('MONTH(created_at) mois, SUM(amount) total')
   ->groupBy('mois')
   ->pluck('total','mois');

   $score = $totalRevenus > 0
   ? round(($solde / $totalRevenus)*100)
   : 0;

   return view('rapports.index',compact(
   'totalDepenses',
   'totalRevenus',
   'solde',
   'depensesCategorie',
   'transactions',
   'evolution',
   'score'
   ));

   }
}