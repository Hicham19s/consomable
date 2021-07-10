<div> 
    <div class="form-group row col-md-12">
      <label  class="font-weight-bolder col-md-12 col-form-label text-md-center">Pseudo : {{$Utilisateur->pseudo}}</label>
    </div>
    <div class="form-group row col-md-12">
      <label  class="font-weight-bolder col-md-12 col-form-label text-md-center">Nom : {{$Utilisateur->nom}}</label>
    </div>
    <div class="form-group row col-md-12">
      <label  class="font-weight-bolder col-md-12 col-form-label text-md-center">Prénom : {{$Utilisateur->prenom}}</label>
    </div>
    <div class="form-group row col-md-12">
      <label  class="font-weight-bolder col-md-12 col-form-label text-md-center">Service : {{$Utilisateur->nomservice}}</label>
    </div>
    <div class="form-group row col-md-12">
      <label  class="font-weight-bolder col-md-12 col-form-label text-md-center">Mot de passe : {{$Utilisateur->password}}</label>
    </div>
</div>
<div class="font-weight-bolder col-md-12 text-md-center">
    <a  class="nav-item nav-link font-weight-bolder text-justify-right btn btn-link" 
    data-toggle="modal" data-target="#ModifierMotDePasse" href="#" > 
              <i>Modifier mot de passe</i>
    </a>
</div>


<div class="modal fade" id="ModifierMotDePasse">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 400px;">
                        <div class="modal-header">
                            <h4 class="modal-title">Mon profil:</h4>              
                            <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body fluid ">
                            modification de mot de passe...
                        </div>
                    </div>
                </div>
</div>

<div> 
</div>