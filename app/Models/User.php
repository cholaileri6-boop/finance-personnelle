<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
    'name',
    'email',
    'password',
    'is_admin', // ← ajoutez cette ligne
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
   protected $casts = [
   'email_verified_at' => 'datetime',
   'password' => 'hashed',
   'is_admin' => 'boolean',
   ];

   
    public function revenus()
    {
    return $this->hasMany(Revenu::class);
    }

    public function depenses()
    {
    return $this->hasMany(Depense::class);
    }

    public function categories()
    {
    return $this->hasMany(Category::class);
    }

    public function budgets()
    {
    return $this->hasMany(Budget::class);
    }

    public function alerts()
    {
    return $this->hasMany(Alert::class);
    }
}
