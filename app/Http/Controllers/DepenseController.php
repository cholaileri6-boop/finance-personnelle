<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepenseController extends Controller
{
    /**
     * Afficher la liste des dépenses
     */
    public function index()
    {
        // On récupère uniquement les dépenses de l'utilisateur connecté
        $depenses = Depense::where('user_id', Auth::id())
                            ->orderBy('created_at', 'desc')
                            ->get();

        // Calcul du total pour le petit badge de stats qu'on a mis dans le design
        $depensesMois = Depense::where('user_id', Auth::id())
                                ->whereMonth('created_at', now()->month)
                                ->sum('amount');

        return view('depenses.index', compact('depenses', 'depensesMois'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        return view('depenses.create');
    }

    /**
     * Enregistrer une nouvelle dépense
     */
  public function store(Request $request)
  {
  $request->validate([
  'montant' => 'required|numeric',
  'description' => 'required|string',
  'category_id' => 'required|exists:categories,id'
  ]);

  Depense::create([
  'user_id' => auth()->id(),
  'amount' => $request->montant,
  'description' => $request->description,
  'category_id' => $request->category_id,
  'date' => now()
  ]);

  return back()->with('success','Dépense ajoutée');
  }
      

    

    public function update(Request $request, Depense $depense)
    {
    $request->validate([
    'montant'=>'required|numeric',
    'description'=>'required',
    'category_id'=>'required'
    ]);

    $depense->update([
    'amount'=>$request->montant,
    'description'=>$request->description,
    'category_id'=>$request->category_id
    ]);

    return back()->with('success','Dépense modifiée');
    }

    public function destroy(Depense $depense)
    {
    $depense->delete();
    return back()->with('success','Dépense supprimée');
    }

    public function show(Depense $depense)
    {
    return redirect()->back();
    }


}