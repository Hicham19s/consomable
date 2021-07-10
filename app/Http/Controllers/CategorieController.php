<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie;
class CategorieController extends Controller
{
    public function __construct()
    {
        $this->middleware('psession');
        $this->middleware('DGSI_Session');
    }
    public function index()
    {
        $NbrCategories = categorie::count();
        $categories = categorie::latest("updated_at")->with('produits')->paginate(5);
        //$categories = categorie::with('produits')->first();
        return view('categorie.ListeCategories',['categories'=>$categories,'NbrCategories'=>$NbrCategories]);
    }
    public function store(Request $request)
    {
        // $this->validate($request , ['designation'=>'required|max:20',]);
        // if (categorie::where('designation',$request['designation'])->first() ) {
        //     return back()->withSuccess('Cette categorie existe déja');
        //     }
        // else{
        // categorie::create(['designation' => $request['designation'],]);
        // return redirect()->route('categories')->withSuccess('Categorie créée avec succés');
        //     }
        $validator = \Validator::make($request->all(), [
            'designation' => 'bail|required|unique:categories',],
            ['designation.unique' => 'cette designation est déjà utiliser',
            'designation.required' => 'Le champ du designation est obligatoire',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
    
        $input = $request->all();
        
        categorie::create($input);
        
        return response()->json(['success'=>'categorie saved successfully.']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $categorie=categorie::find($id);
        return view('categorie.ModifierCategorie',['categorie'=>$categorie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , ['designation'=>'required|max:20',]);
        if (categorie::where('designation',$request['designation'])->first() ) {
            return redirect()->route('categories')->withSuccess('Cette categorie existe déja');
            }
        else{
        // dd($request['designation']);
            $categorie=categorie::find($id);
            $categorie->designation=$request['designation'];
            $categorie->save();
        return redirect()->route('categories')->withSuccess('Categorie mise à jour avec succés');
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
      
        categorie::destroy($id);
        return redirect()->route('categories')->withSuccess('Categorie supprimée avec succés');
    }
}
