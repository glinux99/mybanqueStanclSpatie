@extends('layouts.layoutAccLog')
@section('titre'){{ __("Veuillez vous connecter")}} @endsection
@php
$login ='ok';
@endphp
@section ('menu-second')
    <div class="text-end col-lg-8 col-7 my-auto">
        <a href="mailto:security@nurubanque.cd">{{ __("Securite") }}</a>&nbsp;&nbsp;|
        <a href="mailto:security@nurubanque.cd">{{ __("Aide") }}</a>
    </div>
    <div class="col-md-10 row mx-auto my-4 text-white-50" style="background: #011720d3">
    <div class="col-md-6 " style="background:#0f222b;">
            <div class="card-body shadow">
                <ul class="nav nav-tabs" id="" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="username-log" data-bs-toggle="tab" href="#username" role="tab" aria-controls="username" aria-selected="true">{{ __("Username login") }}</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="card-log" data-bs-toggle="tab" href="#card-login" role="tab" aria-controls="card-login" aria-selected="false">{{ __("Création du compte ") }}</a>
                    </li>
                </ul>
                <div class="tab-content m-auto " id="">
                    <p class="m-0 p-0 text-center">
                        <span class="bi-person bi--8xl"></span>
                    </p>
                    <div class="tab-pane fade show  active" id="username" role="tabpanel" aria-labelledby="username-log">
                        <div class="text-center w-75 m-auto">
                            <p class="m-0 p-0">{{ __("Veuillez vous connecter a votre compte") }}</p>
                            <div class="w-100">
                                <form action="/connect" method="post">
                                @csrf
                                    <input type="text" name="mail" id="" class="form-control mb-3" placeholder='{{ __("nom d utilisateur ou adresse mail") }}' required>
                                    <input type="password" name="psswd" id="" class="form-control mb-3" placeholder="*************************" required>
                                    <button type="submit" class="btn btn-dark w-50">{{ __("Connection") }}</button>
                                </form>
                            </div>
                        </div>
                        <div class="row m-auto">
                            <div class="col-6 text-start d-flex py-1">
                                <input class="form-check-input text-white" type="checkbox" id="check">
                                <label class="form-check-label" for="check">
                                    {{ __(" Se souvenir de vous") }}
                                </label>
                            </div>
                            <div class="col-6 px-0">
                                <a href="/recovery" class="nav-link ">
                                    {{ __("Mot de passe oublie?") }}
                                </a>
                            </div>
                            <p class="text-center"><i>{{ __("Privacy term of visit") }}</i></p> 
                        </div>
                    </div>
                    <div class="tab-pane fade " id="card-login" role="tabpanel" aria-labelledby="card-log">
                        <form action="/CreateCustomers" method="post">
                        @csrf
                            <div class="text-center w-75 m-auto">
                                <p class="m-0 p-0">{{ __("Créez votre compte facilement") }}</p>
                                <div class="w-100">
                                    <input type="text" name="nom" id="" class="form-control mb-3" placeholder="{{ __('votre nom') }}" required>
                                    <input type="text" name="prenom" id="" class="form-control mb-3" placeholder="{{ __('votre prenom') }}" required>
                                    <input type="text" name="mail" id="" class="form-control mb-3" placeholder="{{ __('votre adresse mail') }}" required>
                                    <!-- <input type="text" name="matricule" id="" class="form-control" placeholder="matricule" value="" hidden> -->
                                    <input type="password" name="psswd" id="" class="form-control mb-3" placeholder="*********************" required>
                                </div>
                            </div>
                            <div class="w-75 m-auto mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                    {{ __(" J'ai lu et j'accepte les termes de politiques de confidentialites") }}
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark w-50 mt-2">{{ __("Soumettre") }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 align-self-center border border-2 border-success" style="background: #0f222b!important;">
            <div class="card-body shadow">
                <p>{{ __("Bienvenu sur") }}</p>
                <p class="h3 col-8" style="color: rgb(39, 148, 29);">{{ __("NURU MERCHANT PORTAIL") }}</p>
                <div class="d-flex border-bottom border-white border-2">
                    <span class="bi-hand-index bi--3xl me-2"></span>
                    <p>
                        {{ __(" Vous pouvez vous connecter a notre banque en ligne et faire
                                            des transferts, achetez en ligne etc. juste en vous connectant
                                            sur votre compte sur www.nurubanque.cd") }}
                    </p>
                </div>
                <div class="d-flex mt-2">
                    <span class="bi-shield-lock bi--3xl me-2"></span>
                    <p>
                        {{ __(" Avis de ne pas partager ou publier vos identifiants sur internet
                                            /Mobile banking et ATM pin avec d'autres personnes incluant le staff de Nurubanque") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection