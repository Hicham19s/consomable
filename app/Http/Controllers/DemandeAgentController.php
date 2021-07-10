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
        $Demandeseffectuees = Demande::where('etat_traitement','NonTraitée')->with('Produit_DemandePrestation')->
        whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%'.session()->get('pseudo').'%');})->get();
                   //dd($Demandesacceptees);
        $Demandesenattente = Demande::where('etat_traitement','en_attente')->with('Produit_DemandePrestation')->
        whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%'.session()->get('pseudo').'%');})->get();
                   //dd($Demandesacceptees);
        return view('demandeAgent.ListeDemandesNonTraiteesAgent',[
            'Demandeseffectuees'=>$Demandeseffectuees,'Demandesenattente'=>$Demandesenattente]);
    }
     public function EffectuerDemande()
    {
        return view('demandeAgent.EffectuerDemandeAgent');
    }
     public function AjouterProduitAuDemande(Request $request, $id)
    {   
        //dd($request);
        R_Produit_DemandePrestation::create(['qtedemandee' => $request['QteDemandee'],
                                                'produit_id' => $request['ProduitId'],
                                                'demande_id' => $id,
                                                ]);
        
        return view('demandeAgent.EffectuerDemandeAgent');
    }


    public function SupprimerProduitDemande(Request $request, $id)
    {   
        R_Produit_DemandePrestation::destroy($id);
        return view('demandeAgent.EffectuerDemandeAgent');
    }
    
    public function EffectuerValidationDemande(Request $request, $id)
    {

        $Demande=Demande::find($id);
        $Demande->etat_traitement='NonTraitée';
        $Demande->save();
        return redirect()->route('demandespagentnontraitees')->withSuccess('La demande est validée avec succés');
    }
}
