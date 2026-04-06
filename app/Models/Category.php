<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

public function user()
{
return $this->belongsTo(User::class);
}

public function revenus()
{
return $this->hasMany(Revenu::class);
}

public function depenses()
{
return $this->hasMany(Depense::class);
}

public function budgets()
{
return $this->hasMany(Budget::class);
}

public function categories()
{
$categories = Category::withCount(['depenses', 'revenus'])
->paginate(20);

return view('admin.categories', compact('categories'));
}
    //
}
