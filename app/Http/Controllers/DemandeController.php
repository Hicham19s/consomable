<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Produit;
use App\Models\R_Produit_DemandePrestation;


class DemandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('psession');
        $this->middleware('DGSI_Session')->except('updateAbandonner');
        $this->middleware('Agent_Service_Session')->only('updateAbandonner'); 

    }
     public function indexAll()
    {
        
        $ToutesDemandes = Demande::latest("updated_at")->with(['Produit_DemandePrestation','utilisateur'])->paginate(10);
       //dd($ToutesDemandes);

        return view('demande.HistoriqueDemandes',['ToutesDemandes'=>$ToutesDemandes]);
    }
     public function index()
    {
    $Demandesnontraitees = Demande::where('etat_traitement','NonTraitée')->with(['Produit_DemandePrestation','utilisateur'])->get();
                   //dd($Demandesnontraitees);    
    $Demandesenattentedevalidation = Demande::where('etat_traitement','acceptée')->with(['Produit_DemandePrestation','utilisateur'])->get();
            //dump($Demandesenattentedevalidation); 
    $Demandeenattente = Demande::where('etat_traitement','en_attente')->with(['Produit_DemandePrestation','utilisateur'])->get();
                    //dd($Demandeenattente); 

        //$Demandes=Demande::with(['produit','utilisateur'])->whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%w%');})->paginate(5);
        //dd($Demandesnontraitees);
        return view('demande.ListeDemandes',[
            'Demandesnontraitees'=>$Demandesnontraitees,
            'Demandesenattentedevalidation'=>$Demandesenattentedevalidation,
            'Demandeenattente'=>$Demandeenattente,'ViewDemendeId'=>2 
                                    ]);
    }
    
    
    public function updateAccepter(Request $request, $id)
    {
        $Demande=Demande::find($id);
        $Demande->etat_traitement='acceptée';
        $Demande->save();
        return redirect()->route('demandesp',['ViewDemendeId'=>2])->withSuccess('cette demane est acceptée avec succes');
    }
    public function updateRefuser(Request $request, $id)
    {
        $Demande=Demande::find($id);
        $Demande->etat_traitement='refusée';
        $Demande->save();
        return redirect()->route('demandesp',['ViewDemendeId'=>1])->withSuccess('cette demane est refusée avec succes');
    }
    public function updateValider(Request $request, $id)
    {   
        $Demande=Demande::with('Produit_DemandePrestation')->find($id);
        foreach ($Demande->Produit_DemandePrestation as $Produit_Quantitee) {
            $produit=Produit::find($Produit_Quantitee->produit_id);
            $produit->qtestock=$produit->qtestock-$Produit_Quantitee->qteprise;
            $produit->save();
        }
        $Demande->etat_traitement='validée';
        $Demande->save();

        //return redirect()->route('demandesp')->withSuccess('cette demane est validée avec succes');
        return redirect()->route('demandesp',['ViewDemendeId'=>2])->withSuccess('cette demane est validée avec succes');
    }
    
    public function updateAbandonner(Request $request, $id)
    {
        $Demande=Demande::find($id);
        $Demande->etat_traitement='abandonnée';
        $Demande->save();
        return redirect()->route('demandesp',['ViewDemendeId'=>3])->withSuccess('cette demane est abandonnée avec succes');
    }
    public function updateQTEPrise(Request $request, $id)
    {
        //dump($id);
        //dump($request);
        $Produit_DemandePrestation=R_Produit_DemandePrestation::find($id);
        //dd($Produit_DemandePrestation);
        $Produit_DemandePrestation->qteprise=$request['Qteprise'];
        $Produit_DemandePrestation->save();
        return redirect()->route('demandesp',['ViewDemendeId'=>2])->withSuccess('QTE 2prise est modifiee avec succes');


    }
}
