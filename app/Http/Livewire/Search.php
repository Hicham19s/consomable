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
        
        if ($queryMatch == '%%') {
            $Utilisateurs = Utilisateur::paginate(5);
            // $Utilisateurs = Utilisateur:: where('pseudo', 'like',$queryMatch)->pagination(4);
            //$this->Utilisateurs = Utilisateur::all();
            return view('livewire.search',[
                'Utilisateurs' =>$Utilisateurs ]);
            # code...
        }else{

            $Utilisateurs = Utilisateur:: where('pseudo', 'like',$queryMatch)->paginate(5);
            // $Utilisateurs = Utilisateur:: where('pseudo', 'like',$queryMatch)->pagination(4);
            //$this->Utilisateurs = Utilisateur::all();
            return view('livewire.search',[
                'Utilisateurs' =>$Utilisateurs ]);
        }
              
            }
}
