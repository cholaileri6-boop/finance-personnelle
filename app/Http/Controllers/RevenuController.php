<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revenu;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Category;

class RevenuController extends Controller
{
   public function index()
   {
  $revenus = Revenu::with('category')
  ->where('user_id', auth()->id())
  ->latest()
  ->get();

  $categories = Category::where('user_id', auth()->id())->get();

  $chartData=[];

  return view('revenus.index', compact('revenus','chartData','categories'));
}

   public function store(Request $request)
   {
   $request->validate([
   'amount'=>'required|numeric',
   'category_id'=>'required',
   'date'=>'required'
   ]);

   Revenu::create([
   'user_id'=>auth()->id(),
   'category_id'=>$request->category_id,
   'amount'=>$request->amount,
   'description'=>$request->description,
   'date'=>$request->date
   ]);


   

   return redirect()
   ->route('revenus.index')
   ->with('success','Revenu ajouté');
   }

    

  public function update(Request $request, Revenu $revenu)
  {
  $revenu->update([
  'category_id'=>$request->category_id,
  'amount'=>$request->amount,
  'description'=>$request->description,
  'date'=>$request->date
  ]);

  return redirect()
  ->route('revenus.index')
  ->with('success','Revenu modifié');
  }

    
    public function destroy(Revenu $revenu)
    {
    $revenu->delete();

    return redirect()
    ->route('revenus.index')
    ->with('success','Revenu supprimé');
    }

    public function edit(Revenu $revenu)
    {
    $categories = Category::all();

    return view('revenus.edit', compact('revenu','categories'));
    }
}