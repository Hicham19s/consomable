<?php

namespace App\Http\Livewire;
use App\Models\Utilisateur;
use Livewire\Component;
use Livewire\WithPagination;
class Search extends Component
{
    public  $query  ;
    use WithPagination;
    
    public function render()
    { 
        $queryMatch = '%' . $this->query . '%';
        $TypeServices = Utilisateur::enumutilisateur();
        if ($queryMatch == '%%') {
            $Utilisateurs = Utilisateur::latest("updated_at")->paginate(5);
            return view('livewire.search',['TypeServices'=>$TypeServices,
                'Utilisateurs' =>$Utilisateurs ]);
            # code...
        }else{

            $Utilisateurs = Utilisateur:: where('pseudo', 'like',$queryMatch)
                                        ->orWhere('nom', 'like',$queryMatch)
                                        ->orWhere('prenom', 'like',$queryMatch)
                                        ->orWhere('nomservice', 'like',$queryMatch)->latest()->paginate(5);
            return view('livewire.search',['TypeServices'=>$TypeServices,'Utilisateurs' =>$Utilisateurs ]);
        }
              
            }
}
