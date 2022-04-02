@extends('clients.clientMinLayout')
@php $user = session('user');
@endphp
@role('client')
{{ ('fdsfsdf')}}
@endrole
@section('contenu')
    <div class="col-lg-11 mx-auto card adC2">
        <div class="w-100 mb-5 text-center adC" >
        <img src="{{url($user->photo)}}" alt="user-default-profil" style="z-index:2;border: 1px double green;" id="img" class="align-self-center adC rounded-circle mt-3" width="200rem" height="200rem">
        </div>
        <div class="row mx-auto p-0">
            <div class="col-lg-6 card adC">
                <div class="w-100">
                    <div class="card-header text-success h4 text-uppercase">
                        <span class="bi-info-circle"></span>{{ __("Information basique") }}
                    </div>
                    <div class="card-body px-0">
                        <div class="list-group">
                            @php $x =  [ __('Noms')=>$user['nom'].' '.$user['prenom'],__('Email')=>$user['adresse_mail'],'Nuru Banque ID'=>$user['matricule'], 'Password'=>'******************************'];
                            
                            @endphp
                            @foreach ($x as $item => $val)
                                <div class="list-group-item d-flex adC">
                                    <div class="col-5 text-white">
                                        {{$item}}
                                    </div>
                                    <div class="col-7 text-muted">
                                        {{ $val }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="w-100">
                    <div class="card-header text-success h4 text-uppercase">
                        <span class="bi-gear"></span>{{ __("Parametre du Compte") }}
                    </div>
                    <div class="card-body px-0">
                        <div class="list-group">
                            <div class="list-group-item d-flex adC">
                                <div class="col-5 text-white">
                                    {{ __("Langage") }}
                                </div>
                                <div class="col-7 text-muted">
                                @if(session('locale')=='fr')
                                    {{ __("Français") }}
                                @elseif(session('locale')=='en')
                                {{ __("English") }}
                                @else 
                                {{ __("Français") }}
                                @endif
                                </div>
                            </div>
                            <div class="list-group-item d-flex adC">
                                <div class="col-5 text-white">
                                    {{ __("Parametres de confidentialite") }}
                                </div>
                                <div class="col-7 text-muted">
                                    {{ __("Seuls les administrateurs et les agents de la banque
                                     peuvent avoir acces a vos donnees pour mieux proteger votre compte") }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0 adC align-self-center">
                <div class="card-header text-success h4 text-uppercase">
                    <span class="bi-info-circle-fill"></span>{{ __("Information Supplementaire") }}
                </div>
                <div class="card-body">
                    <div class="list-group">              
                        @php 
                        if($user['genre']=='M') $genre=__("Masculin");
                        else $genre= __("Feminin");
                        $x = [__('Genre')=>$genre,__('Numero Tel')=>$user['numero_tel'],__('Type de Compte')=>$user['type_compte'], __('Adresse')=>$user['quart_av'],__('Ville')=>$user['ville'], __('Province')=>$user['province'], __('Pays')=>$user['pays'],__('À propos')=>$user['apropos']];
                        @endphp
                        @foreach ($x as $item => $val)
                            <div class="list-group-item d-flex adC">
                                <div class="col-5 text-white">
                                    {{$item}}
                                </div>
                                <div class="col-7 text-muted">
                                    {{ $val }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop