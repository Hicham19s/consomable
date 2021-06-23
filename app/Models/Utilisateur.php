<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Utilisateur extends Model
{
    use HasFactory;
        protected $fillable=[
                            'pseudo' ,
                            'nom'  ,
                            'prenom'  ,
                            'nomservice' ,
                            'password',
                            'activation',
                            'remember_token'];

    public static function enumutilisateur(){
        $TypeService = array('SAG','DGSI','Agent_Service');
        return $TypeService;
    }

    protected static function booted(){
        static::created(function($utilisateur){
            $utilisateur->nomservice='SAG';
            //
        });
    }
    

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
    public function demandesp()
    {
        return $this->hasManyThrough(Demande::class,R_Produit_DemandePrestation::class);
    }    
}
