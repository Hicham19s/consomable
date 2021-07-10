<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DemandeLivraison;
use App\Models\categorie;

class EffectuerDemandeLivraison extends Component
{    public function render()
    {          
        $categories = categorie::with('produits')->get();
        $DemandeLivraisonEffectuee = DemandeLivraison::where('traitement_livraison','')
        ->whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%'.session()->get('pseudo').'%');})
        ->with('Produit_DemandeLivraison')
        ->firstOrCreate(['traitement_livraison'=>'',
                        'utilisateur_id' =>session()->get('id'),]);
        //dd($DemandeLivraisonEffectuee);
        return view('livewire.effectuer-demande-livraison',['DemandeLivraisonEffectuee'=>$DemandeLivraisonEffectuee,
       'categories'=>$categories]);

    }
    
}
