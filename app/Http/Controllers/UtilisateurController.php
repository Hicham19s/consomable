<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Session;


class UtilisateurController extends Controller
{
    public function __construct()
    {
        $this->middleware('psession');
        $this->middleware('DGSI_Session');
    }
    public function index(Request $request)
    {   
        //dd($request->session());
            $nbrutilisateurs = Utilisateur::count();
            $nbrutilisateursactifs = Utilisateur::where('activation',true)->count();
            $nbrutilisateursdesactifs = $nbrutilisateurs-$nbrutilisateursactifs;

            $nbrutilisateursactifs = round(($nbrutilisateursactifs*100)/$nbrutilisateurs,1) . ' %';
            $nbrutilisateursdesactifs = round(($nbrutilisateursdesactifs*100)/$nbrutilisateurs,1) . ' %';

            $TypeServices = Utilisateur::enumutilisateur();
            return view('utilisateur.ListeUtilisateurs',['TypeServices'=>$TypeServices,
            'nbrutilisateurs'=>$nbrutilisateurs,
            'nbrutilisateursactifs'=>$nbrutilisateursactifs,
            'nbrutilisateursdesactifs'=>$nbrutilisateursdesactifs]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $TypeServices = Utilisateur::enumutilisateur();
        return view('utilisateur.AjouterUtilisateur',['TypeServices'=>$TypeServices]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //$this->validate($request , ['pseudo'=>'required|max:20',]);
        //dd($request);      
        $request->validate([
        'pseudo' => 'bail|required|unique:utilisateurs',
        'nom' => 'bail|required|string|max:20|alpha',
        'prenom' => 'bail|required|string|max:20|alpha',
        'password' => 'bail|required|string|confirmed|between:8,12',],
        ['pseudo.unique' => 'ce pseudo est déjà utiliser',
        'pseudo.required' => 'Le champ du pseudo est obligatoire',
        'nom.required' => 'Le nom est obligatoire',
        'nom.alpha' => 'Seulement l\'alphabet est autorisé',
        'prenom.alpha' => 'Seulement l\'alphabet est autorisé',
        'password.required' => 'Le mot de passe est obligatoire',
        'password.between' => 'Mot de passe entre 8 et 12 caractères',
        'password.confirmed' => 'Le mot de passe n\'est pas confirmé',]);  

        Utilisateur::create(['pseudo' => $request['pseudo'],
                            'nom' => $request['nom'],
                            'prenom' => $request['prenom'],
                            'nomservice' => $request['nomservice'],
                            'password' => $request['password'],]);
        return redirect()->route('utilisateurs')->withSuccess('Utilisateur créé avec succés');
       // Return redirect::back()->route('utilisateurs')->withSuccess('Utilisateur créé avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $TypeServices = Utilisateur::enumutilisateur();
        $Utilisateur=Utilisateur::find($id);
        return view('utilisateur.ModifierUtilisateur',['Utilisateur'=>$Utilisateur,'TypeServices'=>$TypeServices]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $request->validate([
        'pseudo' => 'required',
        'nom' => 'required|string|max:20|alpha',
        'prenom' => 'required|string|max:20',
        'password' => 'required|string|between:8,12',],
        ['pseudo.required' => 'Le champ du pseudo est obligatoire',
        'nom.required' => 'Le nom est obligatoire',
        'nom.alpha' => 'Seulement l\'alphabet est autorisé',
        'password.required' => 'Le mot de passe est obligatoire',
        'password.between' => 'Mot de passe entre 8 et 12 caractères',]);

        if (Utilisateur::where('pseudo',$request['pseudo'])->first() ) {
            $Utilisateur=Utilisateur::find($id);
            $Utilisateur->nom = $request['nom'];
            $Utilisateur->prenom =$request['prenom'];
            $Utilisateur->nomservice =$request['nomservice'];
            $Utilisateur->password= $request['password'];
            $Utilisateur->save();
            return redirect()->route('utilisateurs')->withSuccess('Ce pseudo existe déja');
            }
        else{
            $Utilisateur=Utilisateur::find($id);
            if($Utilisateur->pseudo==session()->get('pseudo'))
                {
                 session()->put('pseudo', $request->pseudo);
                }
            $Utilisateur->pseudo=$request['pseudo'];
            $Utilisateur->nom = $request['nom'];
            $Utilisateur->prenom =$request['prenom'];
            $Utilisateur->nomservice =$request['nomservice'];
            $Utilisateur->password= $request['password'];
            $Utilisateur->save();
            return redirect()->route('utilisateurs')->withSuccess('Utilisateur modifie avec succés');
            }
    }
    
    public function updateActivate(Request $request, $id)
    {   
        $Utilisateur=Utilisateur::find($id);
        if ($Utilisateur->activation ==1) {
            $Utilisateur->activation= 0;
            $Utilisateur->save();
            return redirect()->route('utilisateurs')->withSuccess('Cet utilisateur est désactivé avec succes.');

        }else {
            $Utilisateur->activation= 1;
            $Utilisateur->save();
            return redirect()->route('utilisateurs')->withSuccess('Cet utilisateur est activé avec succes.');

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
