<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Log;

class VoirProfil extends Component
{   
    public function ModifierMotDePasse($id)
    {
        Log::debug('ModifierMotDePasse Utilisateur_id='.$id);
        dd('updatePassword');


        // $ValidatePassword=$this->validate(
        //                     ['password' => $this->password],
        //                     ['password' => 'required|string|between:8,12',],
        //                    ['password.required' => 'Le mot de passe est obligatoire',
        //                     'password.between' => 'Mot de passe entre 8 et 12 caractères',
        //                     'password.confirmed' => 'Le mot de passe n\'est pas confirmé',]);

        // $this->Utilisateur->password= $this->password;
        // $Utilisateur->save($ValidatePassword);
        //return redirect()->back();
    }
    public function render()
    {   

        $Utilisateur=Utilisateur::where('pseudo','LIKE','%'.session()->get('pseudo').'%')
                                        ->first();
        //dump($Utilisateur);
        return view('livewire.voir-profil',['Utilisateur'=>$Utilisateur]);
    }
    
}
