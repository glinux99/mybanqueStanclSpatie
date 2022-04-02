@extends('adminsCaissiers.AdminCaissLayout')
@section('titre')  
{{__("Bienvenu cher ")}}  
@if(session('user')!=null AND session('user')->hasRole('admin'))
@php 
$agent2 =__("PDG");
$adCliAg =__("Agent");
@endphp
{{ $agent2 }}
@else
@php 
$agent2 =__("Caissier");
$adCliAg =__("Client");
@endphp 
{{ $agent2}}
@endif
@endsection
@section('contenu')
@include('layouts.modal')
    <div class="row mb-5 mt-1 w-100 p-0 m-0 ">
        <div class="col-md-6 m-0 p-0 mx-auto" style="background:#0f222bd2;">
            <div class="card-header text-success text-uppercase text-center bi--lg">
                Nuru Banque {{ __("Administation $agent2 ") }}
            </div>
            <div class="card-group shadow mb-1 col-11 mx-auto" >
                <div class="card adC me-1">
                    <a href="/infoUsers/clients" class="nav-link text-center">
                        <span class="bi-person bi--5xl text-center"></span><br>
                        <small class="text-center text-muted">{{ __("Comptes Clients") }}</small>
                    </a>
                </div>
                <div class="card adC m-0 p-0">
                    <a href="/add_CliAg" class="nav-link text-center">
                        <span class="bi-person-plus-fill bi--5xl"></span><br>
                        <small class="text-center text-muted">{{ __("Ajouter $adCliAg") }}</small>
                    </a>
                </div>
            </div>
            <div class="card-group shadow mb-1 col-11 mx-auto">
                <div class="card text-center adC me-1">
                    <a href="/soldebanque" class="nav-link">
                    <span class="bi-bank2 bi--5xl"></span><br>
                    <small class="text-center text-muted">{{ __("Solde courant de la banque") }}</small>
                    </a>
                </div>
                @if(session('user')->hasRole('admin'))
                <div class="card adC">
                    <a href="/infoUsers/clientCaissiers" class="nav-link text-center">
                        <span class="bi-person-x-fill text-center bi--5xl"></span><br>
                        <small class="text-center text-muted">{{ __(" Supprimer un Client/Agent") }}</small>
                    </a>
                </div>
                @else
                <div class="card adC">
                    <a href="#" class="nav-link text-center">
                        <span class="bi-arrow-counterclockwise text-center bi--5xl"></span><br>
                        <small class="text-center text-muted">{{ __(" Annuler la dernière transaction") }}</small>
                    </a>
                </div>
                @endif
            </div>
            <div class="card-group mb-1 col-11 mx-auto">
                <div class="card text-center adC me-1">
                    <a href="" class="nav-link text-center">
                        <span class="bi-currency-exchange bi--5xl"></span><br>
                        <small class="text-center text-muted">{{ __("Vérifier les payements") }}</small>
                    </a>
                </div>
                <div class="card adC">
                    <a href="/administration" class="nav-link text-center">
                        <span class="bi-house-door bi--5xl text-center"></span><br>
                        <small class="text-center text-muted">{{ __("Menu principal") }}</small>
                    </a>
                </div>
            </div>
        </div>
        <!-- Affichage du solde -->
        @if(isset($solde))
            <div class="col-md-6 col-12 adC text-success text-center align-self-center">
                <div class='carousel in ' data-bs-ride='carousel' id='soldeC'>
                    <div class='carousel-inner text-success'>
                        <div class='carousel-item active'>
                            <span class='bi-currency-dollar bi--5xl'><span>
                        </div>
                        <div class='carousel-item'>
                            <span class='bi-currency-bitcoin bi--5xl'><span>
                        </div>
                    </div>
              </div>
              <span class='text-muted'>
                  {{ __("Le solde du compte principale de la banque s'eleve a un montant de") }}<span class='text-danger' style='font-weight: bolder'> {{ $solde_all }}</span> USD 
              </span>
            </div>
        @endif
        @if (isset($clientOnly) AND ($clientOnly==1))
        <div class="col-md-6 col-12 adC text-success text-center align-self-center">
            <div class="card-header text-uppercase text-center">
                {{ __("INFORMATION SUR LES CLIENTS") }}
            </div>
            <div class="card-body text-success overflow-auto px-auto">
                <table class="adC w-100 table table-striped table-hover table-bordered text-primary table-card">
                    <thead>
                        <tr>
                            <td>
                                {{ __("Nom") }}
                            </td>
                            <td>
                                {{ __("Prenom") }}
                            </td>
                            <td>
                                {{ __("Matricule / E-mail") }}
                            </td>
                            <td>
                                {{ __("Solde") }}
                            </td>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach($allUser as $items)
                            <tr class="text-white-50">
                                <td >
                                    {{ $items->nom}}
                                </td>
                                <td>
                                    {{$items->prenom}}
                                </td>
                                <td>
                                    <small>{{$items->matricule}}</small><br>
                                    <small>{{$items->adresse_mail}}</small>
                                </td>
                                <td>
                                {{$items->solde}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
@endsection