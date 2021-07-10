<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categorie;
use App\Models\Produit;
use App\Models\Demande;

class SelectCategorieProduit extends Component
{
    public  $select_categorie_id;
  


    public function render()
    {   
        
        
        $categories = categorie::with('produits')->get();
        $Produits = Produit::where('categorie_id','=',$this->select_categorie_id)->get();
     
        $DemandeEffectuee = Demande::where('etat_traitement','')
        ->with('Produit_DemandePrestation')
        ->whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%'.session()->get('pseudo').'%');})
        ->first();
         //dd($DemandeEffectuee->id);

        return view('livewire.select-categorie-produit',['categories'=>$categories,
                                                        'Produits'=>$Produits,  
                                                        'DemandeId'=>$DemandeEffectuee->id]);
        $this->select_categorie_id=0;

    }
}

