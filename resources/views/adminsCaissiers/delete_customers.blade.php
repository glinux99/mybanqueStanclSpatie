@extends('adminsCaissiers.AdminCaissLayout')
@section('titre'){{__("Suppression desactivation ou activation des agents et Clients")}} @endsection
@section('contenu')
<div class="card-body text-success text-center overflow-auto w-100 p-1">
    <table class="adC table w-100 table-striped table-hover table-bordered text-primary table-card">
        <thead>
            <tr>
                <td>
                    {{ __("Nom") }}
                </td>
                <td>
                    {{ __("Prenom") }}
                </td>
                <td>
                    {{ __("Status du compte") }}
                </td>
                <td>
                    {{ __("Matricule / E-mail") }}
                </td>
                <td>
                    {{ __("Solde") }}
                </td>
                <td>
                    {{ __("Type de compte") }}
                </td>
                     </tr>
                    </thead>
                    <tbody >
            @foreach($allUser as $items)
                @if(!empty($items->type_compte))
                <tr class="text-white-50">
                <td >
                    {{ $items->nom}}
                </td>
                <td>
                {{ $items->prenom}}
                </td>
                
                <td>
                    @if($items->haspermissionTo('connect'))
                        <a class="btn btn-dark" href="/desactive/{{$items->id}}">{{ __("Désactiver") }}</a>
                    @else
                        <a  class="btn btn-success" href="/active/{{$items->id}}">{{ __("Activer") }}</a>
                    @endif
                        <a class="btn btn-danger" href="/delete/{{$items->id}}">{{ __("Suppression") }}</a>
                </td>
                <td>
                    <small>{{ $items->matricule}}</small><br>
                    <small>{{ $items->adresse_mail}}</small>
                </td>
                <td>
                {{ $items->solde}}
                </td>
                <td>
                {{ $items->type_compte}}
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
@stop   