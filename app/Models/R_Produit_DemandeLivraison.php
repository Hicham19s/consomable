<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_Produit_DemandeLivraison extends Model
{
    use HasFactory;
    protected $fillable=['id',
    'qtedemandee',
    'qtelivrai',
    'produit_id',
    'demande_livraison_id',];

public function produits()
{
return $this->belongsTo(Produit::class,'produit_id')->withDefault();
}
public function demandeslivraison()
{
return $this->belongsTo(Demandelivraison::class);
}
}
