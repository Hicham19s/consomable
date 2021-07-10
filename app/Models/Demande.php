<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable=['id',
                        'etat_traitement',
                        'utilisateur_id',];

    protected static function booted(){
        static::created(function($demande){
            $demande->etat_traitement='';
            //
        });
    }


    
    public function Produit_DemandePrestation()
    {
        return $this->hasMany(R_Produit_DemandePrestation::class)->with('produits');
    }
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
