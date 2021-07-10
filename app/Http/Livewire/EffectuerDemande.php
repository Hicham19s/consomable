<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Demande;
use App\Models\categorie;

class EffectuerDemande extends Component
{

    public function render()
    {   
        $DemandeEffectuee = Demande::where('etat_traitement','')
        ->whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%'.session()->get('pseudo').'%');})
        ->with('Produit_DemandePrestation')
        ->firstOrCreate(['etat_traitement'=>'',
                        'utilisateur_id' =>session()->get('id'),]);
        //dd($DemandeEffectuee);
        return view('livewire.effectuer-demande',['DemandeEffectuee'=>$DemandeEffectuee]);

    }
}
