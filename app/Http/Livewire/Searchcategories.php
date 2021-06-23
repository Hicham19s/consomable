<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categorie;
use Livewire\WithPagination;
class SearchCategories extends Component
{
       public  $query  ;
    use WithPagination;
    
    public function render()
    { 
        $queryMatch = '%' . $this->query . '%';
        
        if ($queryMatch == '%%') {
            $categories = categorie::with('produits')->latest("updated_at")->paginate(4);
            //dd($categories);
            return view('livewire.search-categories',[
                'categories' =>$categories ]);
            # code...
        }else{

            $categories = categorie:: where('designation', 'like',$queryMatch)->latest()->paginate(4);
            return view('livewire.search-categories',['categories' =>$categories ]);
        }
              
            }
}
