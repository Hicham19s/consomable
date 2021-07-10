<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categorie;
use App\Models\Produit;
use App\Models\DemandeLivraison;

class SelectCategorieProduitLivraison extends Component
{   public  $select_categorie_id;
  


    public function render()
    {   
        
        
        $categories = categorie::with('produits')->get();
        $Produits = Produit::where('categorie_id','=',$this->select_categorie_id)->get();
     
        $DemandeEffectuee = DemandeLivraison::where('traitement_livraison','')
        ->with('Produit_DemandeLivraison')
        ->whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%'.session()->get('pseudo').'%');})
        ->first();
         //dd($DemandeEffectuee->id);

        return view('livewire.select-categorie-produit-livraison',['categories'=>$categories,
                                                        'Produits'=>$Produits,  
                                                        'DemandeId'=>$DemandeEffectuee->id]);
        $this->select_categorie_id=0;

    }
   
}
