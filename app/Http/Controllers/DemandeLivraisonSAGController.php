<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeLivraison;
use App\Models\R_Produit_DemandeLivraison;
use Illuminate\Support\Facades\log;
use App\Models\Produit;

class DemandeLivraisonSAGController extends Controller
{
    public function __construct()
    {
        $this->middleware('psession'); 
        $this->middleware('SAG_Session'); 
        
    }
    public function index()
    {
        Log::debug('Id SAG:'.session()->get('id').' DemandeLivraisonSAGController');
        $DemandesLivraisonNonTraitees = DemandeLivraison::where('traitement_livraison','=','NonTraitée')
        ->with('Produit_DemandeLivraison')->get();
        //dd($DemandesLivraisonNonTraitees);
        return view('SAG.DemandeLivraisonSAG',['DemandesLivraisonNonTraitees'=>$DemandesLivraisonNonTraitees]);    
    }
    public function indexAll()
    {
        $DemandesLivraisonNonToutes = DemandeLivraison::with('Produit_DemandeLivraison')->paginate(2);
        //dd($DemandesLivraisonNonToutes);
        return view('SAG.HistoriqueDemandesLivraison',['DemandesLivraisonNonToutes'=>$DemandesLivraisonNonToutes]);    
    }
    public function LivreeDemandeLivraison(Request $request, $id)
    {
        //dd($id);
        Log::debug('Id SAG:'.session()->get('id').' LivreeDemandeLivraison demande_id='.$id);
        $DemandeLivraison=DemandeLivraison::find($id);
        $DemandeLivraison->traitement_livraison='Traitée';
        $DemandeLivraison->save();
        return redirect()->route('demandeslivraisonssag')->withSuccess('La demande de livraison est livree avec succes');
    }
    public function ModifierQTELivree(Request $request, $id)
    {
        // dd($request['QteLivree']);
        Log::debug('Id SAG:'.session()->get('id').' ModifierQTELivree R_demande_id='.$id);
        $Produit_DemandeLivraison=R_Produit_DemandeLivraison::find($id);
        //dd($Produit_DemandeLivraison);
        $Produit_DemandeLivraison->qtelivrai=$request['QteLivree'];
        $Produit_DemandeLivraison->save();
        return redirect()->route('demandeslivraisonssag')->withSuccess('QTE livree est modifiee avec succes');
    }
}
