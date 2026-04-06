<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'month',
        'year',
        'amount',
    ];

    /**
     * Relation vers l'utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function depenses()
{
    return $this->hasMany(Depense::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}


public function budgets()
{
$budgets = Budget::with(['user'])
->orderBy('created_at', 'desc')
->paginate(20);

return view('admin.budgets', compact('budgets'));
}
}