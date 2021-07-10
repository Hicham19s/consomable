<div class="ml-4">

    <form action="/ajouterproduitdemandelivraison/{{$DemandeId}}" method="POST" class="d-flex">
        @csrf
        @method('PUT')
        <div class="select">
                    <label class="label d-block">Catégorie:</label>
            <select wire:model="select_categorie_id" style="width: 115px;" name="CategorieId" id="CategorieId">
                @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->designation}}</option>
                    
                @endforeach
            </select>
        </div>
        
        <div class="select mr-2">
            <label class="label d-block">Produit:</label>
            <select style="width: 115px;" name="ProduitId" id="ProduitId">

                @foreach ($Produits as $produit)
                    <option value="{{$produit->id}}">{{$produit->designation}}</option>    
                @endforeach
            </select>
        </div>

    
        <div class="select">
            <label class="label d-block">QTE demandée:</label>
            <select style="width: 60px;" name="QteDemandee" id="QteDemandee">

                @foreach (range(1,20) as $qte)
                    <option value="{{$qte}}">{{$qte}}</option>    
                @endforeach
            </select>
        </div>
        <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
        </div>
    </form>
</div>
