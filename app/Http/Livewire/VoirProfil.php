<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Utilisateur;

class VoirProfil extends Component
{   
    public function render()
    {   

        $Utilisateur=Utilisateur::where('pseudo','LIKE','%'.session()->get('pseudo').'%')
                                        ->first();
        //dump($Utilisateur);
        return view('livewire.voir-profil',['Utilisateur'=>$Utilisateur]);
    }
    
}
