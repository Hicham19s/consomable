<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_Produit_DemandePrestation extends Model
{
    use HasFactory;
    protected $fillable=['id',
                        'qtedemandee',
                        'qteprise',
                        'produit_id',
                        'demande_id',];

    public function produits()
    {
        return $this->belongsTo(Produit::class,'produit_id')->withDefault();
    }
    public function demandes()
    {
        return $this->belongsTo(Demande::class);
    }
}
