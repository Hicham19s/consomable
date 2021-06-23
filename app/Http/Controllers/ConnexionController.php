<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Session;
class ConnexionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SeConnecter(Request $request)
    {    //dd('$request->all()');
        $this->validate($request,[
        'Pseudo' => 'required|string',
        'password' => 'required|string|between:8,12',],
        ['Pseudo.required' => 'Mot de passe ou pseudo n\'ont pas correctes',
        'password.required' => 'Mot de passe ou pseudo n\'ont pas correctes',
        'password.between' => 'Mot de passe ou pseudo n\'ont pas correctes',]);
        $utilisateur=Utilisateur::where([['pseudo',$request->Pseudo],
                                         ['password',$request->password],
                                         ['activation',1]
                                     ])->first();
       //dd($utilisateur);
        if ($utilisateur) {
            $utilisateur['remember_token']=$request->_token;
            $utilisateur->save();
            //dd($utilisateur->pseudo);
            $request->session()->put('nomservice', $utilisateur->nomservice);
            $request->session()->put('pseudo', $request->Pseudo);
            //$request->session()->regenerateToken();
            //dd($request->session());
            if ($utilisateur->nomservice =='DGSI') {
                return redirect()->route('utilisateurs');
            }
            if ($utilisateur->nomservice =='Agent_Service') {
                return redirect()->route('demandespagenttraitees');
            }
            
        }
        else{
           //dd('echec de...'); 
             return redirect()->route('seconnecter')->
             withErrors(['Pseudo'=>'Mot de passe ou pseudo n\'ont pas correctes',
                'password'=>'Mot de passe ou pseudo n\'ont pas correctes'])->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Deconnecter(Request $request)
    {
        //echo $request->session()->get('pseudo');
       // $request->session()->pull('pseudo',$request->Pseudo);
        $request->session()->invalidate();
        //$request->session()->regenerateToken();

        echo 'Deconnecter connexContrler';
        //echo $request->session()->get('pseudo');
        //dd($request->session());
        return redirect()->route('seconnecter');
    }
}
