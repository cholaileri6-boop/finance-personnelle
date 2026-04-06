<?php

namespace App\Http\Controllers;
use App\Models\Revenu;
use App\Models\Depense;
use App\Models\Budget;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

public function index()
{
if (auth()->user()->is_admin == 1) {
return redirect()->route('admin.dashboard');
}


$userId = auth()->id();

$revenusTotal = Revenu::where('user_id',$userId)->sum('amount');
$depensesTotal = Depense::where('user_id',$userId)->sum('amount');

$solde = $revenusTotal - $depensesTotal;

$revenusMois = Revenu::where('user_id',$userId)
->whereMonth('created_at',now()->month)
->sum('amount');

$depensesMois = Depense::where('user_id',$userId)
->whereMonth('created_at',now()->month)
->sum('amount');

$dernieresDepenses = Depense::where('user_id',$userId)
->latest()
->take(5)
->get();


// ⭐ GRAPH STATS DEPENSES
$depensesStats = Depense::selectRaw('MONTH(created_at) as mois, SUM(amount) as total')
->where('user_id',$userId)
->groupBy('mois')
->pluck('total','mois');


// ⭐ GRAPH STATS REVENUS
$revenusStats = Revenu::selectRaw('MONTH(created_at) as mois, SUM(amount) as total')
->where('user_id',$userId)
->groupBy('mois')
->pluck('total','mois');


// ⭐ BUDGET
$budget = Budget::where('user_id',$userId)
->whereMonth('month',now()->month)
->first();

$alerteBudget = false;

if($budget){
if($depensesMois > $budget->amount){
$alerteBudget = true;
}
}

return view('dashboard',compact(
'solde',
'revenusMois',
'depensesMois',
'dernieresDepenses',
'depensesStats',
'revenusStats',
'alerteBudget'
));

}

}