@extends( (session('user')->hasRole('client')) ? 'clients.clientMinLayout' : 'adminsCaissiers.AdminCaissLayout')
@section('titre') {{__("Verification des vos transactions")}} @stop
@section('contenu')
@php $transaction = session('trans'); @endphp
    <div class="card adC">
        <div class="card-header text-center text-success">
            <div class="card-header bi--lg">
            {{ __("HISTORIQUE DE TRANSACTIONS ")}}
            </div> 
            <a class="btn btn-success mt-2" href="/pdf">{{ __("Générer l'apperçu en pdf")}}</a>
            <div class=" mx-auto" style="max-width:max-content">
                <div class="input-group mt-2">
                    <button type="submit" class="btn btn-dark">{{ __("Transaction durant")}}</button>
                    <input type="number" name="" id="" min='1' class="form-control" style="width:6rem;" value="1" ><span class="ms-2 mt-1">{{ __("jours")}}</span>
                </div>
            </div>
        </div>
        <div class="w-100 overflow-auto">
            <table class="text-center table table-bordered table-hover adC text-white">
                <thead>
                    <tr>
                        <td>{{ __("Date") }}</td>
                        <td>{{ __("Transaction") }}</td>
                        @if(!session('user')->hasRole('client'))
                        <td>{{ __("Matricule Client") }}</td>
                        @endif
                        <td>{{ __("Solde") }}</td>
                        <td>{{ __("Retrait / Dépôt ") }}</td>
                        <td>{{ __("Montant_Ret") }}</td>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($transaction as $items)
                    <tr>
                        <td>
                            {{ $items->created_at}}
                        </td>
                        <td>
                            {{ $items->trans_mat}}
                        </td>
                        @if(!session('user')->hasRole('client'))
                        <td>
                            {{ $items->client_mat}}
                        </td>
                        @endif
                        <td>
                            {{ $items->solde}}
                        </td>
                        <td>
                            {{ $items->motif}}
                        </td>
                        <td>
                            {{ $items->montant_ret}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop