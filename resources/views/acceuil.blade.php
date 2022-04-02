@extends('layouts.layoutAccLog')
@section('titre') {{ __("Bienvenu sur notre banque en ligne")}} @endsection
@php 
$login='non';
@endphp
@section('contenu-start')
@include('layouts.modal')
<div class="w-100 ">
<div class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="card carousel-item active">
                    <img src="{{url('assets/img/fr4.jpg')}}" alt="" class="card-img-top">
                    <div class="card-img-overlay d-flex ">
                    <div class="mx-auto align-self-center pb-5 text-center">
                            <h3 class="text-uppercase fw-bold text-warning" style="font-weight: 200; color: rgb(255, 102, 0)"><span style="color: rgb(39, 148, 29);"><span style="color: rgb(39, 148, 29);">{{  __("Nuru Banque") }}</span></span>{{  __(" avec plus d'avantages") }}
                            </h3>
                            <h6 class="text-white"style="font-weight: 100;">{{ __("Bénéficiez de nombreux produits et services lié à votre compte: ")}}
                            </h6>
                            <div class="col-6 col-lg-4 mx-auto">
                                <a class="list-group-item text-warning rounded" href="/login" >{{  __("Débuter avec nous") }}
                                </a>
                            </div>
                    </div>
                    </div>
                </div>
                <div class="card carousel-item">
                    <img src="{{url('assets/img/fr5.png')}}" alt="" class="card-img-top w-50 mx-auto d-block" style="transform: scale(2);">
                    <div class="card-img-overlay d-flex pb-5">
                    <div class="mx-auto align-self-center  text-center">
                            <h3 class="text-uppercase fw-bold text-warning " ><span style="color: rgb(39, 148, 29);">{{  __("Nuru Banque") }}</span>{{  __(" avec plus de facilité") }}
                            </h3>
                            <h6 class="text-white"style="font-weight: 100;">{{ __("Epargnez avec Nuru Merchant Bank et realisez vos projets avec facilité")}}
                            </h6>
                            <div class="col-6 col-lg-4 mx-auto">
                                <a class="list-group-item text-warning rounded" href="/login" >{{  __("Débuter avec nous") }}
                                </a>
                            </div>
                    </div>
                    </div>
                </div>
                <div class="card carousel-item">
                    <img src="{{url('assets/img/money3.jpg')}}" alt="" class="card-img-top w-50 mx-auto d-block" style="transform: scale(2);">
                    <div class="card-img-overlay d-flex pb-5">
                    <div class="mx-auto align-self-center  text-center">
                            <h3 class="text-uppercase fw-bold text-warning " ><span style="color: rgb(39, 148, 29);">{{  __("Nuru Banque") }}</span>{{  __(" avec plus de facilité") }}
                            </h3>
                            <h6 class="text-white"style="font-weight: 100;">{{ __("Epargnez avec Nuru Merchant Bank et realisez vos projets avec facilité")}}
                            </h6>
                            <div class="col-6 col-lg-4 mx-auto">
                                <a class="list-group-item text-warning rounded" href="/login" >{{  __("Débuter avec nous") }}
                                </a>
                            </div>
                    </div>
                    </div>
                </div>
                <div class="card carousel-item">
                    <img src="{{url('assets/img/money.jpg')}}" alt="" class="card-img-top w-50 mx-auto d-block" style="transform: scale(2);">
                    <div class="card-img-overlay d-flex pb-5">
                    <div class="mx-auto align-self-center  text-center">
                            <h3 class="text-uppercase fw-bold text-warning " ><span style="color: rgb(39, 148, 29);">{{  __("Nuru Banque") }}</span>{{  __(" avec plus de facilité") }}
                            </h3>
                            <h6 class="text-white"style="font-weight: 100;">{{ __("Epargnez avec Nuru Merchant Bank et realisez vos projets avec facilité")}}
                            </h6>
                            <div class="col-6 col-lg-4 mx-auto">
                                <a class="list-group-item text-warning rounded" href="/login" >{{  __("Débuter avec nous") }}
                                </a>
                            </div>
                    </div>
                    </div>
                </div>
                <div class="card carousel-item">
                    <img src="{{url('assets/img/nuru1.png')}}" alt="" class="card-img-top mx-auto d-block"  >
                    <div class="card-img-overlay d-flex pb-5">
                    <div class="mx-auto align-self-center  text-center">
                            <h3 class="text-uppercase fw-bold text-warning " ><span style="color: rgb(39, 148, 29);">{{  __("Nuru Banque") }}</span>{{  __(" avec plus de facilité") }}
                            </h3>
                            <h6 class="text-white"style="font-weight: 100;">{{ __("Epargnez avec Nuru Merchant Bank et realisez vos projets avec facilité")}}
                            </h6>
                            <div class="col-6 col-lg-4 mx-auto">
                                <a class="list-group-item text-warning rounded" href="/login" >{{  __("Débuter avec nous") }}
                                </a>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 text-white px-3" style="background: #011720d3!important;">
            <div class="navbar navbar-dark d-flex justify-content-center">
                <div class=" d-flex flex-columns">
                    {{  __("POUR UN ACCES RAPIDE, DITES-NOUS QUI VOUS ETES") }}
                    <button class="navbar-toggler mx-4 " data-bs-toggle="collapse" data-bs-target=".coll2">
                        <span class="bi-chevron-down "></span><span class="bi-chevron-up"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse coll2">
                    <ul class="nav nav-pills d-flex justify-content-center">
                        <a href="/login" class="nav-link">
                            <li class="nav-item">
                                <span class="bi-person-rolodex"></span><span>{{  __("Un particulier") }}</span>
                            </li>
                        </a>
                        <a href="/login" class="nav-link">
                            <li class="nav-item">
                                <span class="bi-people-fill"></span><span>{{  __("Actionnaire / Investisseur") }}</span>
                            </li>
                        </a>
                        <a href="/login" class="nav-link">
                            <li class="nav-item">
                                <span class="bi-person-workspace"></span><span>{{  __("Un candidat a l'emploi") }}</span>
                            </li>
                        </a>
                        <a href="/login" class="nav-link">
                            <li class="nav-item">
                                <span class="bi-person"></span><span>{{  __("Une PME") }}</span>
                            </li>
                        </a>
                        <a href="/login" class="nav-link">
                            <li class="nav-item">
                                <span class="bi-wallet-fill"></span><span>{{  __("Une entreprise") }}</span>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-100" id="taux">
            <div class="card-header text-center h2 text-white mt-2">
            <span class="bi-graph-up-arrow text-success bi--1xl"></span> {{ __("TAUX D'ECHANGE")}} 
            </div>
            @php
                $taux = array (
                        array(
                        "unite"=>1,
                        "code"=>"AOA",
                        "libele"=>"KWANZA ANGOLAIS",
                        "cours_a"=>3.7576,
                        "cours_m"=>3.8342,
                        "cours_v"=>3.9109
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"BIF",
                        "libele"=>"FRANC BURUNDAIS",
                        "cours_a"=>0.9789,
                        "cours_m"=>0.9989,
                        "cours_v"=>1.0188
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"CNY",
                        "libele"=>"YUAN CHINOIS",
                        "cours_a"=>309.3899,
                        "cours_m"=>315.7040,
                        "cours_v"=>322.0180
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"JPY",
                        "libele"=>"YEN JAPONAIS",
                        "cours_a"=>17.0727,
                        "cours_m"=>17.4212,
                        "cours_v"=>17.7696
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"RWF",
                        "libele"=>"FRANC RWANDAIS",
                        "cours_a"=>1.8860,
                        "cours_m"=>1.9245,
                        "cours_v"=>1.9630
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"TZS",
                        "libele"=>"SHILLING TANZANIEN",
                        "cours_a"=>0.8472,
                        "cours_m"=>0.8645,
                        "cours_v"=>0.8817
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"UGX",
                        "libele"=>"SHILLING OUGANDAIS",
                        "cours_a"=>0.5577,
                        "cours_m"=>0.5691,
                        "cours_v"=>0.5805
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"USD",
                        "libele"=>"DOLLAR AMERICAIN",
                        "cours_a"=>1960.1392,
                        "cours_m"=>2000.1420,
                        "cours_v"=>2040.1449
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"ZMW",
                        "libele"=>"KWACHA ZAMBIEN",
                        "cours_a"=>111.3718,
                        "cours_m"=>113.6447,
                        "cours_v"=>115.9175
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"EUR",
                        "libele"=>"EURO",
                        "cours_a"=>2223.9894,
                        "cours_m"=>2269.3770,
                        "cours_v"=>2314.7645
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"XAF",
                        "libele"=>"FRANC CFA",
                        "cours_a"=>3.3905,
                        "cours_m"=>3.4596,
                        "cours_v"=>3.5288
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"ZAR",
                        "libele"=>"RAND SUD AFRICAIN",
                        "cours_a"=>129.3587,
                        "cours_m"=>131.9987,
                        "cours_v"=>134.6387
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"AUD",
                        "libele"=>"DOLLAR AUSTRALIEN",
                        "cours_a"=>1413.7104,
                        "cours_m"=>1442.5616,
                        "cours_v"=>1471.4129
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"CAD",
                        "libele"=>"DOLLAR CANADIEN",
                        "cours_a"=>1528.2164,
                        "cours_m"=>1569.6089,
                        "cours_v"=>1601.0008
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"CHF",
                        "libele"=>"FRANC SUISSE",
                        "cours_a"=>2141.8313,
                        "cours_m"=>2185.5421,
                        "cours_v"=>2229.2529
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"GBP",
                        "libele"=>"LIVRE STERLING",
                        "cours_a"=>2668.0016,
                        "cours_m"=>2722.4506,
                        "cours_v"=>2776.8996
                        ),
                        array(
                        "unite"=>1,
                        "code"=>"XDR",
                        "libele"=>"D.T.S",
                        "cours_a"=>2748.7620,
                        "cours_m"=>2804.8592,
                        "cours_v"=>2860.9563
                        )
                );
            @endphp
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7 card overflow-auto"style="clip-path: polygon(100% 0, 100% 46%, 93% 50%, 100% 54%, 100% 100%, 0 100%, 0% 80%, 0 0);">
                    <p>
                    <div class="row " style="background: #0f222b!important;">
                        <div class="col-1">
                        <span class="bi-calendar-date bi--4xl text-success"></span>
                        </div>
                        <div class="col-11 row text-white" style="background: #0f222b!important;">
                            <div class="col-7 d-flex flex-column p-0 m-auto">
                                <span class="h3 p-0 m-0"> {{ __("Cours d'échange actuel") }}</span>
                                <small class="text-muted">{{ \Carbon\Carbon::now()->toDateString() }}</small>
                            </div>
                            <div class="col-5 m-auto">
                                {{ __("1 USD = 2000.1420 CDF") }} <br> <span class="text-muted">{{ __("cours moyen") }}</span>
                            </div>
                        </div>
                    </div>
                    </p>    
                    <div class="table-responsive-lg">
                    <table  class="table table-bordered text-primary table-hover text-center table-striped rounded">
                            <thead style="background: #0f222b!important;">
                                <tr>
                                    <td >{{ __("Unite") }}</td>
                                    <td>{{ __("code") }}</td>
                                    <td> {{ __("libele") }}</td>
                                    <td> {{ __("Cours acheteur") }}</td>
                                    <td> {{ __("Cours moyen ") }}</td>
                                    <td> {{ __("Cours vendeur ") }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($taux as $items)
                                    <tr>
                                    @foreach($items as $item)
                                    <td>{{ $item}}</td>
                                    @endforeach
                                    </tr>
                                    @endforeach
                                </tr>
                            </tbody>
                    </table>
                    </div>
                    </div>
                    <div class="col-lg-5 card mx-auto pt-3">
                    <div class="row " style="background: #0f222b!important;">
                        <div class="col-2">
                            <div class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner text-success">
                                    <div class="carousel-item active ">
                                        <span class="bi-currency-dollar bi--4xl"></span>
                                    </div>
                                    <div class="carousel-item">
                                        <span class="bi-currency-yen bi--4xl"></span>
                                    </div>
                                    <div class="carousel-item">
                                        <span class="bi-currency-euro bi--4xl"></span>
                                    </div>
                                    <div class="carousel-item">
                                        <span class="bi-currency-pound bi--4xl"></span>
                                    </div>
                                    <div class="carousel-item">
                                        <span class="bi-currency-bitcoin bi--4xl"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-10 text-white" style="background: #0f222b!important;">
                            <div class="p-0 m-0 text-center" id="echange">
                                <span class="h3 p-0 m-0"> {{ __("Bureau d'échange au taux courant") }}</span>
                                <br><small>{{ __("Passez dans tout nos distributeurs suivant le meme taux.") }}</small>
                            </div>
                        </div>
                    </div>
                        <form action="/calcul_money" method="post">
                        @csrf
                        <div class="row" >
                            <div class="col-4">
                                <label for="">{{ __("Montant") }} </label>
                                <input type="number" class="form-control text-end" name="montant" value="0" min="0"> 
                            </div>
                            <div class="col-4">
                                <label for="">De</label>
                                <select name="from_conv" id="" class="form-control">
                                    <option value="1" >CDF</option>
                                @foreach ($taux as $items)
                                    @php
                                    if(is_array($items)){
                                            echo "<option value='".$items['cours_m']."'>".$items['code']."</option>";                               
                                        
                                    }
                                    @endphp
                                @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">A</label><i class="flag flag-us"></i>
                                <select name="to_conv" id="" class="form-control">
                                <option value="1">CDF</option>
                                @foreach ($taux as $items)
                                    @php
                                    if(is_array($items)){
                                            echo "<option value='".$items['cours_m']."'>".$items['code']."</option>";                               
                                        
                                    }
                                    @endphp
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn"><span class="text-center bi-caret-down bi--5xl"></span></button>
                        </div>
                        </form>
                        <p class="result text-white text-center pt-2 rounded" style="height: 50px;background: #0f222b!important;">
                                <span>{{
                                    session('result') ?? '0'
                                    }}</span>
                        </p>
                        <div>
                            <canvas id="cours_G" width="30" height="20" style="background: #0f222b!important;" class="rounded"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div> 
<style>
    .card-img-top {
    width: 100%;
    height: 35vw;
    object-fit: cover;
}
</style>
<script>
const ctx = document.getElementById('cours_G');
var tb = <?php echo json_encode($taux);?>;
var datax=new Array();
var datay=new Array();
var dataz=new Array();
var dataf=new Array();
var min_tb = ['CNY','JPY','RWF','CHF','USD','EURO','GBP'];
for(var x=0; x<tb.length; x++){
    //alert(tb[x]['code']);
    for(var y=0; y<min_tb.length; y++){
        if(min_tb[y]=== tb[x]['code']){
            datax[x]=tb[x]['code'];
            datay [x] = tb[x]['cours_a'];
            dataz [x] = tb[x]['cours_m'];
            dataf [x] = tb[x]['cours_v'];
        };
    }
}
const data = {
  labels: datax,
  datasets: [{
    label: 'Money Analyse Data : Cours Acheteur',
    data: datay,
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    backgroundColor: 'red',
  },
  {
    label: 'Money Analyse Data : Cours Moyen',
    data: dataz,
    fill: false,
    backgroundColor: 'green',
    borderColor: 'blue',
  },
  {
    label: 'Money Analyse Data : Cours Vendeur',
    data: dataf,
    fill: false,
    backgroundColor: 'blue',
    borderColor: 'red',
  }]
};
const myChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    plugins: {
            title: {
                display: true,
                text: 'Graphique de Money par rapport a la money congolaise',
                color: 'green',
            }
        },
    animations: {
      tension: {
        duration: 3000,
        easing: 'linear',
        from: 2,
        to: 1,
        loop: true
      }
    }
  }
});
</script>

<script>
const ctx2 = document.getElementById('cours');
var tb = <?php echo json_encode($taux);?>;
var datax=new Array();
var datay=new Array();
var dataz=new Array();
var dataf=new Array();
for(var x=0; x<tb.length; x++){
    //alert(tb[x]['code']);
    datax[x]=tb[x]['code'];
    datay [x] = tb[x]['cours_a'];
    dataz [x] = tb[x]['cours_m'];
    dataf [x] = tb[x]['cours_v'];
}
const data2 = {
  labels: datax,
  datasets: [{
    label: 'Money Analyse Data : Cours Acheteur',
    data: datay,
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
  },
  {
    label: 'Money Analyse Data : Cours Moyen',
    data: dataz,
    fill: false,
    borderColor: 'blue',
  },
  {
    label: 'Money Analyse Data : Cours Vendeur',
    data: dataf,
    fill: false,
    borderColor: 'red',
  }]
};
const myChart2 = new Chart(ctx2, {
  type: 'line',
  data: data2,
  options: {
    animations: {
      tension: {
        duration: 3000,
        easing: 'linear',
        from: 0.5,
        to: -0.1,
        loop: true
      }
    }
  }
});
</script>

 
@endsection

