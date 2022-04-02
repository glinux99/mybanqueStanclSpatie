@extends('layouts.layoutAccLog')
@section('titre') {{ __("Mon epargne d'argent")}} @endsection
@php 
$login='non';
@endphp
@section('contenu-start')
<div class="container-fluid">
    <div class="card">
        <img src="{{url('assets/img/save.jpg')}}" alt="" height="300" width="90%" class="card-img-top d-block mx-auto">
        <div class="card-img-overlay m-4">
            <div class="card col-md-4 bg-success">
                <div class="card-title text-center h4 pt-2 border-bottom border-2 pb-2">
                    {{ __("COMPTES D'ÉPARGNE")}}
                </div>
                <div class="card-body">
                    {{ __("Trouvez le bon compte d'épargne pour vous aider à vous rendre là où vous voulez aller. Comme alternative à l'épargne, nous avons inclus quelques options d'investissement que vous pourriez également envisager.")}}
                </div>
            </div>
        </div>
    </div>
    <div class="card-group mx-auto container-fluid">
        <div class="card m-2 shadow-lg text-white my-auto rounded" style="background: #0f222b!important; height: 20rem;">
            <div class="card-title text-center h4 pt-2 border-bottom border-2 pb-2">
                <span class="bi-people-fill"></span> {{ __("Un coffre fort pour votre enfant")}}
            </div>
            <div class="card-body ">
                {{ __("Coffre-fort est notre nouveau compte d'épargne pour les 11 à 15 ans sous surveillance parentale. Les bonnes habitudes financières pour votre enfant commencent ici. ")}}
                <div class="text-center m-auto mt-4"><button type="submit" class="btn btn-success " style="height: 5rem">{{ __("Lire plus a propos de Coffre Fort Epargne?") }} </button></div>
            </div>
        </div>
        <div class="card m-2 shadow-lg bg-success rounded" style="">
            <div class="card-title text-center h4 pt-2 border-bottom border-2 pb-2">
            {{ __("Vous aider à comprendre le changement du taux de base")}}
            <div class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <span class="bi-currency-dollar"></span>
                        </div>
                        <div class="carousel-item ">
                            <span class="bi-currency-euro"></span>
                        </div>
                        <div class="carousel-item">
                            <span class="bi-currency-pound"></span>
                        </div>
                        <div class="carousel-item ">
                            <span class="bi-currency-yen"></span>
                        </div>
                        <div class="carousel-item ">
                            <span class="bi-currency-bitcoin"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                {{ __("Le principe est donc que tout ce qui pousse les congolais à rechercher davantage le dollar, et donc à vouloir l'obtenir en échange contre la monnaie nationale, est de nature à provoquer la dépréciation du franc congolais par rapport au dollar si on ne trouve pas des vendeurs de dollar au taux de change en vigueur.")}}
                <div class="text-center mt-2" title="cliquez pour avoir ample information"><button type="submit" class="btn text-white" style="height: 5rem;background: #0f222b!important;">{{ __("Lire plus a propos du changement de taux") }} </button></div>
            </div>
        </div>
        <div class="m-2 card shadow-lg text-white my-auto rounded" style="background: #0f222b!important; height: 20rem;">
            <div class="card-title text-center h4 pt-2 border-bottom border-2 pb-2">
                <span class="bi-calculator-fill"></span> {{ __("Calculateur de taux d'échange")}}
            </div>
            <div class="card-body">
                {{ __("Essayer de calculer le montant totale de votre sommes en une monnaie locale ou Internationnale avec Notre Super Calculateur. Ainsi vous pouvez retirer partout dans nos distributeur sur le meilleur taux du jour.")}}
                <div class="text-center mt-4"><button type="submit" class="btn btn-success" style="height: 5rem">{{ __("Essayer de calculer votre monnaie au taux courant") }} </button></div>
            </div>
        </div>
    </div>
</div>
@endsection

