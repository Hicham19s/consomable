<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
        protected $fillable=['id',
                            'designation',
                            'qtestock',
                            'qtemin',
                            'categorie_id',];
    public function demande()
    {
        return $this->hasOne(R_Produit_DemandePrestation::class);
    }
    public function categorie()
    {
        return $this->belongsTo(categorie::class);
    }

}
