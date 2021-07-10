<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\log;
class DemandesDGSI extends Component
{
    public $select_QtePrise;

    public function AbandonnerDemande($id)
    {
        $Demande = Demande::find($id);
        $Demande->etat_traitement='abandonnée';
        $Demande->save();
        Log::debug('Id DGSI:'.session()->get('id').' AbandonnerDemande demande_id='.$id);
        return redirect()->back()->withSuccess('Cette demane est abandonnée avec succés.');
    }
    public function ValiderDemande($id)
    {
        $Demande = Demande::find($id);
        $Demande->etat_traitement='validée';
        $Demande->save();
        Log::debug('Id DGSI:'.session()->get('id').' ValiderDemande demande_id='.$id);
        return redirect()->back()->withSuccess('Cette demane est validée avec succés.');
    }
    public function AccepterDemande($id)
    {
        $Demande = Demande::find($id);
        $Demande->etat_traitement='acceptée';
        $Demande->save();
        Log::debug('Id DGSI:'.session()->get('id').' AccepterDemande demande_id='.$id);
        return redirect()->back()->withSuccess('Cette demane est acceptée avec succés.');
    }
    public function RefuserDemande($id)
    {
        $Demande=Demande::find($id);
        $Demande->etat_traitement='refusée';
        $Demande->save();
        Log::debug('Id DGSI:'.session()->get('id').' RefuserDemande demande_id='.$id);
        return redirect()->back()->withSuccess('Cette demane est refusée avec succés.');
    }
    public function ModifierQTEPrise($Id_R_Produit_DemandePrestation)
    {
        $Produit_DemandePrestation=R_Produit_DemandePrestation::find($Id_R_Produit_DemandePrestation);
        $Produit_DemandePrestation->qteprise=$this->select_QtePrise;  
        $Produit_DemandePrestation->save();
        Log::debug('Id DGSI:'.session()->get('id').' ModifierQTEPrise Produit_DemandePrestation_id='.$Id_R_Produit_DemandePrestation);
        return redirect()->back()->withSuccess('QTE prise est modifiée avec succés.');
    }
    public function render()
    {
        $this->select_QtePrise=0;
        $Demandesnontraitees = Demande::where('etat_traitement','NonTraitée')->with(['Produit_DemandePrestation','utilisateur'])->get();
        $Demandesenattentedevalidation = Demande::where('etat_traitement','acceptée')->with(['Produit_DemandePrestation','utilisateur'])->get();
        $Demandeenattente = Demande::where('etat_traitement','en_attente')->with(['Produit_DemandePrestation','utilisateur'])->get();

        return view('livewire.demandes-d-g-s-i',['Demandesnontraitees'=>$Demandesnontraitees,
                              'Demandesenattentedevalidation'=>$Demandesenattentedevalidation,
                              'Demandeenattente'=>$Demandeenattente]);

    }
}
