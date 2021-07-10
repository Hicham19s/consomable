<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeLivraison extends Model
{
    use HasFactory;
    protected $fillable=['id',
    'traitement_livraison',
    'utilisateur_id',];
    public function Produit_DemandeLivraison()
    {
        return $this->hasMany(R_Produit_DemandeLivraison::class)->with('produits');
    }
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
