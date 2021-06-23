<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\R_Produit_DemandePrestation;
use App\Models\Utilisateur;

class DemandeAgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('psession'); 
        $this->middleware('Agent_Service_Session'); 
        
    }
    public function DemandeTraitees()
    {
        //en_attente
        //acceptée
        //refusée

        $Demandesacceptees = Demande::where('etat_traitement','acceptée')->with('Produit_DemandePrestation')->
        whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%'.session()->get('pseudo').'%');})->get();
                   //dd($Demandesacceptees); 
        $Demandesrefusees = Demande::where('etat_traitement','refusée')->with('Produit_DemandePrestation')->
        whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%'.session()->get('pseudo').'%');})->take(5)->latest("updated_at")->get();
                   //dd($Demandesrefusees); 
        return view('demandeAgent.ListeDemandesTraiteesAgent',[
            'Demandesacceptees'=>$Demandesacceptees,'Demandesrefusees'=>$Demandesrefusees]);
    }

     public function DemandeNonTraitees()
    {
        $Demandeseffectuees = Demande::where('etat_traitement','')->with('Produit_DemandePrestation')->
        whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%'.session()->get('pseudo').'%');})->get();
                   //dd($Demandesacceptees);
        $Demandesenattente = Demande::where('etat_traitement','en_attente')->with('Produit_DemandePrestation')->
        whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%'.session()->get('pseudo').'%');})->get();
                   //dd($Demandesacceptees);
        return view('demandeAgent.ListeDemandesNonTraiteesAgent',[
            'Demandeseffectuees'=>$Demandeseffectuees,'Demandesenattente'=>$Demandesenattente]);
    }
    
}
