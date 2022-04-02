@extends( (session('user')->hasRole('client')) ? 'clients.clientMinLayout' : 'adminsCaissiers.AdminCaissLayout')
@section('titre'){{("Ajouter un agent")}} @endsection
@section('contenu')
@if(((session('user')!==null)) AND session('user')->hasRole('client'))
@php
$user = session('user');
@endphp
@else
@php
$user = session('agent');
@endphp
@endif
<!-- A enlever lors du deployement -->
    <form action="{{ url('update')}}" method="post">
    @csrf
        <div class="row mx-auto">
            <div class="col-lg-9 card adC ">
                <div class="card-header text-success text-center bi--lg">
                    {{ __("Modification du compte ")}}
                </div>
                <div class="card-body text-muted">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="nomB" >
                                {{ __("Nom")}}
                            </label>
                            <input type="text" name="nom" id="" class="form-control" placeholder="" value="{{ $user->nom }}" >
                        </div>
                        <div class="col-lg-4">
                            <label for="nomB" >
                                {{ __("Prenom")}}
                            </label>
                            <input type="text" name="prenom" id="" class="form-control" placeholder="" value="{{ $user->prenom }}">
                        </div>
                        <div class="col-lg-4">
                            <label for="nomB" >
                                {{ __("Adresse e-mail")}}
                            </label>
                            <input type="mail" name="adresse_mail" id="" class="form-control" placeholder="nurubanque@gmail.com" value="{{ $user->adresse_mail }}">
                        </div>                    
                    </div>
                    <div class="row">
                    <div class="col-lg-4">
                        <label for="nomB" >{{ __("Matricule Client")}}</label>
                        <input type="text" name="" id="" class="form-control" placeholder="matricule" disabled value="{{ $user->matricule }}">
                        <input type="text" name="matricule" id="" class="form-control" placeholder="matricule" value="{{ $user->matricule }}" hidden>
                    </div>
                    <div class="col-lg-4">
                        <label for="nomB" >{{ __("Password")}}</label>
                        <input type="text" name="psswd" id="" class="form-control" placeholder="******************" value="">
                    </div>
                    <div class="col-lg-4">
                        <label for="nomB" >{{ __("Numero Tel:")}} </label>
                        <input type="numero_tel" name="numero_tel" id="" class="form-control" placeholder="+243970912428" value="{{ $user->numero_tel }}">
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="nomB" >{{ __("Type de Compte")}}</label>
                            <select name="type_compte" id="" class="form-control">
                            <option disabled selected value value="{{ $user->type_compte }}"> {{ $user->type_compte }}</option>
                            @if(((session('user')!==null)) AND session('user')->hasRole('caisser'))
                                    <option value="">--{{ __("Select Categorie client")}}--</option>
                                    <option value="Particulier">{{ __("Particulier")}}</option>
                                    <option value="Actionnaire">{{ __("Actionnaire / Investisseur")}}</option>
                                    <option value="Emploi">{{ __("Candidat à l'emploi")}}</option>
                                    <option value="PME">{{ __("PME")}}</option>
                                    <option value="Entreprise">{{ __("Entreprise")}}</option>
                            @elseif(((session('user')!==null)) AND session('user')->hasRole('admin'))
                                    <option value="">--{{ __("Select Categorie Agent")}}--</option>
                                    <option value="Caissier">{{ __("Caissier")}}</option>
                                    <option value="Informaticien">{{ __("Informaticien")}}</option>
                                    <option value="Securite">{{ __("Securite")}}</option>
                                    <option value="autres">{{ __("Autres")}}</option>
                            @else
                                    <option value="Particulier">{{ __("Particulier")}}</option>
                                    <option value="Actionnaire">{{ __("Actionnaire / Investisseur")}}</option>
                                    <option value="Emploi">{{ __("Candidat à l'emploi")}}</option>
                                    <option value="PME">{{ __("PME")}}</option>
                            @endif    
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="nomB" >Genre</label>
                            <select name="genre" id="" class="form-control">
                                <option disabled selected value>
                                    @if($user->genre=='F')
                                    {{ __("Féminin")}}
                                    @else
                                    {{ __("Masculin")}}
                                    @endif
                                 </option>
                                <option value="">--{{ __("Select Genre")}}--</option>
                                <option value="F">{{ __("Féminin")}}</option>
                                <option value="M">{{ __("Masculin")}}</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="nomB" >{{ __("Prendre une photo ") }}</label>
                            <input type="button" class="form-control" value='{{ __("Capture") }}' data-bs-toggle="modal" data-bs-target="#photo">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="nomB" >{{ __("Adresse")}}</label>
                                <input type="text" name="quart_av" id="" class="form-control" placeholder="Goma, 22 Box Dego" value="{{ $user->quart_av }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="nomB"  >{{ __("Ville")}}</label>
                                <input type="text" name="ville" id="" class="form-control" placeholder="Goma" value="{{ $user->ville }}">
                            </div>
                            <div class="col-lg-4">
                                <label for="nomB" >{{ __("Province")}}</label>
                                <input type="text" name="province" id="" class="form-control" placeholder="Nord-Kivu" value="{{ $user->province }}">
                            </div>
                            <div class="col-lg-4">
                                <label for="nomB" >{{ __("Pays")}}</label>
                                <input type="mail" name="pays" id="" class="form-control" placeholder="RDC" value="{{ $user->pays }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="apropos">{{ __("À propos de moi")}}:</label>
                                <textarea name="apropos" placeholder="À propos de moi" class="form-control">{{ $user->apropos}} </textarea>
                            </div>
                        </div>
                        <input type="image" src="" alt="" id="sendimage" class="d-none" name="photo6"> 
                        <input type="hidden" name="photo" class="image_cli">
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark  mt-2 mb-lg-2 col-lg-3">{{ __("Mettre a jour")}}</button>
                        </div>
                    </div>
                </div>
            <div class="col-lg-3 align-self-center text-center">
                <p class="card-header text-muted">{{ __("Photo par défaut du client")}}</p>
                <img src="{{ url($user->photo) }}" alt="user-default-profil" id="mm" class="adC card-img-top rounded-circle" width="80%" height="80%">
                <canvas id="canvas" width=350 height=340 style="display: none"></canvas>
            </div>
        </div>
    </form>
    <!-- fin div prendre photo -->
<script>

  const video_capture = document.getElementById('video_capture');
  var canvas = document.getElementById('canvas');
  var img = canvas.getContext('2d');
  const constraints = {
    video: true,
  };
  $('#capture').click(function(){
    img.drawImage(video_capture, 0, 0, canvas.width, canvas.height);
    var imgurl= canvas.toDataURL();
    $(".image_cli").val(imgurl);
    $('#mm').attr('src', imgurl).load(function(){
    this.width; 

});
    $('#confirmer').css('display', '');
   
  });
  navigator.mediaDevices.getUserMedia(constraints)
    .then((stream) => {
      video_capture.srcObject = stream;
    });
</script>
@stop