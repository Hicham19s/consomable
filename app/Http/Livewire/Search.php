<?php

namespace App\Http\Livewire;
use App\Models\Utilisateur;
use Livewire\Component;
use Livewire\WithPagination;
class Search extends Component
{
    public  $query  ;
    use WithPagination;

      public function updateActivate( $id)
    {   
        $Utilisateur=Utilisateur::find($id);
        if ($Utilisateur->activation ==1) {
            $Utilisateur->activation= 0;
            $Utilisateur->save();
            return redirect()->back()->withSuccess('Cet utilisateur est désactivé avec succes.');

        }else {
            $Utilisateur->activation= 1;
            $Utilisateur->save();
            return redirect()->back()->withSuccess('Cet utilisateur est activé avec succes.');

        }
    }
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
                //dump($queryMatch);
            $Utilisateurs = Utilisateur:: where('pseudo', 'like',$queryMatch)
                                        ->orWhere('nom', 'like',$queryMatch)
                                        ->orWhere('prenom', 'like',$queryMatch)
                                        ->orWhere('nomservice', 'like',$queryMatch)->latest()->paginate(5);
            return view('livewire.search',['TypeServices'=>$TypeServices,'Utilisateurs' =>$Utilisateurs ]);
        }
              
            }
}
