<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_Produit_DemandePrestation extends Model
{
    use HasFactory;
    protected $fillable=['id',
                        'qtedemandee',
                        'qteprise',];

    public function produits()
    {
        return $this->belongsTo(Produit::class,'id')->withDefault();
    }
    public function demandes()
    {
        return $this->belongsTo(Demande::class);
    }
}
