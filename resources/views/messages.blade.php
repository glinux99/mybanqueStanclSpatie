@extends( (session('user')->hasRole('client')) ? 'clients.clientMinLayout' : 'adminsCaissiers.AdminCaissLayout')
@section('titre') {{__('Messages')}} @stop
@section('contenu')
    <div class="card adC ">
        <div class="row w-100">
            <div class="col-md-8">
                <div class="card-header text-white adC">
                @php
                if(isset($dest) AND ($dest!='nuru_banque')){
                    $nom =$dest->nom.' '.$dest->prenom;
                    $photo =$dest->photo;
                }else {
                    $nom = "Nuru Banque Groupe";
                    $photo ="assets/img/icon-group.png";
                }
                @endphp
                <img src="{{url($photo)}}" alt='profil' width='40' height='40' class='rounded-circle'>
                <span>{{ $nom }}</span>
                </div >
                <div class="card-body position-relative">
                    <div class="overflow-auto p-0"style="height: 21rem;">
                    
                    @php
                        $def=0;
                        $validator=0;
                        if($message->count()>0) $validator=0;
                        else $validator=1;
                    @endphp
                    @if($validator)
                            <div class="text-white adC card rounded text-break ps-2 pe-2 pt-2 pb-2 d-flex">
                                            {{ __("Les messages sont chiffres par un algorithme propre a nuru_banque. Aucun autre tiers 
                                            ne peut les lire. Commencer une discussion avec les autres sans les importunes svp.
                                            En cas de probleme, contactez-nous 24/24!") }}
                            </div>
                    @endif
                    @foreach($message as $items)
                        @if(($items->source_mat)==session('user')->matricule)
                            <div class="d-flex mb-1" >
                                <div class="text-white d-flex table-card rounded ms-4 text-break ps-2 pe-2 pt-2 pb-2 adC">
                                    <img src="{{url($photo)}}" alt='profil' width='40' height='40' class='rounded-circle'>
                                    <div class="ms-2">
                                        <div><span>{{ $items->message}}</span></div>
                                        <div class="text-end">
                                            <small class="text-muted mt-2">
                                                <i>{{ $items->created_at}}</i>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        @foreach($list as $pic)
                            @php if($pic->matricule ==$items->dest_mat)
                                $photo = $pic->photo;
                            @endphp
                        @endforeach
                        <div class="d-flex text-white justify-content-end table-card rounded ms-4 text-break ps-2 pe-2 pt-2 pb-2  mb-1" >
                        <div class="adC rounded"><div class="text-end"><small class="text-muted" style="font-size: 10px">{{ $items->noms}}</small></div>
                        &nbsp;&nbsp;<img src="{{url($photo)}}" alt='profil' width='40' height='40' class='rounded-circle'><span>&nbsp;{{ $items->message}}</span>
                        <br><small class="text-muted float-right pt-2 px-2"><i>{{ $items->created_at}}</i></small></div>
                        </div>
                        @endif
                    @endforeach
                    </div>
                   <div class="w-100">
                        <form action="/send_message" method="post">
                        @csrf
                            <div class="row w-100">
                                <div class="col-10">
                                <textarea name="message" id="" rows="" class="form-control "></textarea>
                                </div>
                                <div class="col-2"><button type="submit" class="btn btn-success">{{ __("Envoyer") }}</button></div>
                            </div>
                        </form>
                   </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-header adC text-center text-white">
                    Chat Live
                </div>
                <div class="card-body">
                    <div class="list-group">
                            <a href="/message/nuru_banque" class="nav-link p-0 m-0">
                                <div class="list-group-item adC text-white">
                                    <img src="{{url('assets/img/icon-group.png')}}" alt='profil' width='40' height='40' class='rounded-circle'><span>Nuru banque</span>
                                </div>
                            </a>
                        @foreach($list as $items)
                            <a href="/message/{{$items->matricule}}" class="nav-link p-0 m-0">
                                <div class="list-group-item adC text-white">
                                    <img src="{{url($items->photo)}}" alt='profil' width='40' height='40' class='rounded-circle'><span>{{ $items->nom.' '.$items->prenom}}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop