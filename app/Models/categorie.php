<?php

namespace App\Models;
use App\Models\Produit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;

    protected $fillable=['designation',];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
