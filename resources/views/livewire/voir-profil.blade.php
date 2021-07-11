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


<div class="modal fade" id="Modifiermotdepasse" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modification de mot de passe:</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
            
                <div class="modal-body">
                <form action="/modifierpassword/{{$Utilisateur->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Ancien mot de passe:</label>
                        <label class="col-md-6 col-form-label text-md-right">{{$Utilisateur->password}}</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Mot de passe :</label>

                        <div class="col-md-6">
                            <input  id="modifierpassword"   class="form-control @error('modifierpassword') is-invalid @enderror" name="modifierpassword" required autocomplete="new-modifierpassword">

                            <!-- @error('modifierpassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script type="text/javascript">
                                    $('#Modifiermotdepasse').modal('show');
                                </script>
                            @enderror -->
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                      <label  class="col-md-4 col-form-label text-md-right">Confirmation du mot de passe :</label>

                      <div class="col-md-6">
                            <input id="modifierpassword_confirmation" name="modifierpassword_confirmation" type="text" class="form-control" required autocomplete="new-password">
                      </div>
                    </div> -->
                    <div class="modal-footer">                 
                        <button type="submit" id="btnEnreg" class="btn btn-primary">
                        Enregistrer les modifications
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
                </div>
                    </form>
                </div>
                    

                    
                 
        </div>
    </div>
</div>

<div> 
</div>