@extends('adminsCaissiers.AdminCaissLayout')
@section('titre'){{("Ajouter un agent")}} @endsection
@section('contenu')
@if(((session('user')!==null)) AND !session('user')->hasRole('client'))
@php
$user = session('user');
$matricule = substr(str_shuffle("1234567890"), 0, 12);
$matricule2 = substr(str_shuffle("1234567890"),0,2);
$matricule = "4970".$matricule.$matricule2;
@endphp
@endif
<!-- A enlever lors du deployement -->
    <form action="/CreateCustomers_by_agent" method="post">
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
                            <input type="text" name="nom" id="" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="nomB" >
                                {{ __("Prenom")}}
                            </label>
                            <input type="text" name="prenom" id="" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="nomB" >
                                {{ __("Adresse e-mail")}}
                            </label>
                            <input type="mail" name="adresse_mail" id="" class="form-control" placeholder="nurubanque@gmail.com" required>
                        </div>                    
                    </div>
                    <div class="row">
                    <div class="col-lg-4">
                        <label for="nomB" >{{ __("Matricule Client")}}</label>
                        <input type="text" name="matricule" id="" class="form-control" placeholder="matricule" hidden value="{{ $matricule }}">
                        <input type="text" name="" id="" class="form-control" placeholder="matricule" disabled value="{{ $matricule }}">
                    </div>
                    <div class="col-lg-4">
                        <label for="nomB" >{{ __("Password")}}</label>
                        <input type="text" name="psswd" id="" class="form-control" placeholder="******************" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="nomB" >{{ __("Numero Tel:")}} </label>
                        <input type="numero_tel" name="numero_tel" id="" class="form-control" placeholder="+243970912428" required>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="nomB" >{{ __("Type de Compte")}}</label>
                            <select name="type_compte" id="" class="form-control">
                            @if(((session('user')!==null)) AND session('user')->hasRole('admin'))
                                    <option disabled selected value value="Caissier">--{{ __("Select Categorie Agent")}}--</option>
                                    <option value="Caissier">{{ __("Caissier")}}</option>
                                    <option value="Informaticien">{{ __("Informaticien")}}</option>
                                    <option value="Securite">{{ __("Securite")}}</option>
                                    <option value="autres">{{ __("Autres")}}</option>
                            @else
                                    <option disabled selected value value="Particulier">--{{ __("Select Categorie Client")}}--</option>
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
                                <option disabled selected value="M">
                                {{ __("Masculin")}}
                                 </option>
                                <option required>--{{ __("Select Genre")}}--</option>
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
                                <input type="text" name="quart_av" id="" class="form-control" placeholder="Goma, 22 Box Dego" value="Goma, 22 Box Dego">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="nomB"  >{{ __("Ville")}}</label>
                                <input type="text" name="ville" id="" class="form-control" placeholder="Goma" value="Goma">
                            </div>
                            <div class="col-lg-4">
                                <label for="nomB" >{{ __("Province")}}</label>
                                <input type="text" name="province" id="" class="form-control" placeholder="Nord-Kivu" value="Nord-Kivu">
                            </div>
                            <div class="col-lg-4">
                                <label for="nomB" >{{ __("Pays")}}</label>
                                <input type="mail" name="pays" id="" class="form-control" placeholder="RDC" value="RDC">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="apropos">{{ __("À propos de moi")}}:</label>
                                <textarea name="apropos" placeholder="À propos de moi" class="form-control"> </textarea>
                            </div>
                        </div>
                        <input type="image" src="" alt="" id="sendimage" class="d-none" name="photo6"> 
                        <input type="hidden" name="photo" class="image_cli">
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark  mt-2 mb-lg-2 col-lg-3">{{ __("Ajouter")}}</button>
                        </div>
                    </div>
                </div>
            <div class="col-lg-3 align-self-center text-center">
                <p class="card-header text-muted">{{ __("Photo par défaut du client")}}</p>
                <img src="{{ url('assets/img/default_user.png') }}" alt="user-default-profil" id="mm" class="adC card-img-top rounded-circle" width="80%" height="80%">
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