<?php

namespace App\Http\Controllers;
use App\Models\R_Produit_DemandeLivraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\DemandeLivraison;
use App\Models\Produit;

class DemandeLivraisonDGSIController extends Controller
{    public function __construct()
    {
        $this->middleware('psession');
        $this->middleware('DGSI_Session');
    }

    
    public function GetPrevisionTrimestrille()
    {
        $ProduitsPlusDemandes = Produit::whereRaw('qtestock < qtemin')->take(5)->get();
        $ProduitsQteMin = Produit::whereRaw('qtestock < qtemin')->paginate(4);
        //dd($ProduitsQteMin); 
        
        return view('livraison.ListePrevisionTrimestrille',
        ['ProduitsQteMin'=>$ProduitsQteMin,'ProduitsPlusDemandes'=>$ProduitsPlusDemandes]);

    }
    public function GetDemandesLivraisons()
    {
        $DemandesLivraisons = DemandeLivraison::where('traitement_livraison','=','Traitée')
        ->Orwhere('traitement_livraison','=','NonTraitée')->with('Produit_DemandeLivraison')->
        whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%'.session()->get('pseudo').'%');})->get();
         //dump($DemandesLivraisons); 
        
        return view('livraison.ListeDemandeLivraisonDGSI',['DemandesLivraisons'=>$DemandesLivraisons]);

    }
    public function EffectuerDemandeLivraison()
    {
        return view('livraison.EffectuerDemandeLivraison');

    }
    public function AjouterProduitAuDemandeLivraisonparPrevision(Request $request,$id)
    {   
        $DemandeLivraisonEffectuee = DemandeLivraison::where('traitement_livraison','')
        ->whereHas('utilisateur',function($q){$q->where('pseudo','LIKE','%'.session()->get('pseudo').'%');})
        ->with('Produit_DemandeLivraison')
        ->firstOrCreate(['traitement_livraison'=>'',
                        'utilisateur_id' =>session()->get('id'),]);

        R_Produit_DemandeLivraison::create(['qtedemandee' => 0,
        'produit_id' => $id,
        'demande_livraison_id' => $DemandeLivraisonEffectuee->id,
        ]);
        Log::debug('Id DGSI:'.session()->get('id').' AjouterProduitAuDemandeLivraisonparPrevision 
        demande_livraison_id='.$DemandeLivraisonEffectuee->id.' produit ajoute ='.$id);
        return view('livraison.EffectuerDemandeLivraison');
    }
    public function AjouterProduitAuDemandeLivraison(Request $request, $id)
    {   
        //dd($request);
        R_Produit_DemandeLivraison::create(['qtedemandee' => $request['QteDemandee'],
                                                'produit_id' => $request['ProduitId'],
                                                'demande_livraison_id' => $id,
                                                ]);
        Log::debug('Id DGSI:'.session()->get('id').' demande_livraison_id='.$id.' produit ajoute ='.$request['ProduitId']);
        return view('livraison.EffectuerDemandeLivraison');
    }
    
    public function EffectuerValidationDemandeLivraison(Request $request, $id)
    {

        $Demande=DemandeLivraison::find($id);
        $Demande->traitement_livraison='NonTraitée';
        $Demande->save();
        return redirect()->route('demandeslivDGSI')->withSuccess('La demande est validée avec succés');
    }  
      public function DemandeLivraisonRecue(Request $request, $id)
    {
        Log::debug('Id SAG:'.session()->get('id').' LivreeDemandeLivraison demande_id='.$id);
        $DemandeLivraison=DemandeLivraison::with('Produit_DemandeLivraison')->find($id);
        foreach ($DemandeLivraison->Produit_DemandeLivraison as $Produit_Quantitee) {
            $produit=Produit::find($Produit_Quantitee->produit_id);
            $produit->qtestock=$produit->qtestock+$Produit_Quantitee->qtelivrai;
            $produit->save();
        }
        $DemandeLivraison->traitement_livraison='Recue';
        $DemandeLivraison->save();
        return redirect()->route('demandeslivDGSI')->withSuccess('La demande est validée avec succés');
    }
    
    public function SupprimerProduitDemandeLivraison(Request $request, $id)
    {   
        R_Produit_DemandeLivraison::destroy($id);
        return view('livraison.EffectuerDemandeLivraison');
    }
    public function store(Request $request)
    {
    $request->validate([
        'designation' => 'bail|required|unique:produits',],
        ['designation.unique' => 'ce pseudo est déjà utiliser',
        'designation.required' => 'Le champ du designation est obligatoire',]);  

        Produit::create(['designation' => $request['designation'],
                            'qtemin' => $request['Qtemin'],
                            'categorie_id' => $request['CategorieId'],
                           ]);
        return redirect()->route('demandeslivDGSI')->withSuccess('produit ajouter avec succés');
}
public function ModifierQteDemandee(Request $request, $id)
    {
        // dd($request['QteLivree']);
        Log::debug('Id SAG:'.session()->get('id').' ModifierQteDemandee R_demande_id='.$id);
        $Produit_DemandeLivraison=R_Produit_DemandeLivraison::find($id);
        //dd($Produit_DemandeLivraison);
        $Produit_DemandeLivraison->qtedemandee=$request['QteDemadee'];
        $Produit_DemandeLivraison->save();
        return redirect()->route('effectuerdemandelivraison')->withSuccess('QTE demandee est modifiee avec succes');
    }
}

