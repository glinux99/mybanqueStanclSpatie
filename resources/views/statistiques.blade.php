@extends('layouts.layoutAccLog')
@section('titre') {{ __("Statistiques de la Banque")}} @endsection
@php 
$login='non';
@endphp
@section('contenu-start')
<div class="w-100">
<div class="mx-auto mx-4" style="background: #0f222b!important;">
<canvas id="cours" width="30" height="20" style="
    height: 30vw;
    object-fit: cover;"></canvas>
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
                    <a href="" class="nav-link">
                        <li class="nav-item">
                            <span class="bi-person-rolodex"></span><span>{{  __("Un particulier") }}</span>
                        </li>
                    </a>
                    <a href="" class="nav-link">
                        <li class="nav-item">
                            <span class="bi-people-fill"></span><span>{{  __("Actionnaire / Investisseur") }}</span>
                        </li>
                    </a>
                    <a href="" class="nav-link">
                        <li class="nav-item">
                            <span class="bi-person-workspace"></span><span>{{  __("Un candidat a l'emploi") }}</span>
                        </li>
                    </a>
                    <a href="" class="nav-link">
                        <li class="nav-item">
                            <span class="bi-person"></span><span>{{  __("Une PME") }}</span>
                        </li>
                    </a>
                    <a href="" class="nav-link">
                        <li class="nav-item">
                            <span class="bi-wallet-fill"></span><span>{{  __("Une entreprise") }}</span>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="w-100">
            <div class="card-group">
                <div class="card">

                </div>
                <div class="card">
                    <div class="w-100">

                    </div>
                    <div class="w-100">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100">
        <div class="card-header text-center h2 text-white mt-2">
            {{ __("RAPPORT ET DEVISES")}}
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
        <div class="row container-fluid">
            <div class="card col-md-7 mx-auto">
                <div class="card-header text-center">
                    {{__("Rapport de performance des monnaies Internationales")}}
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>
                                    {{__("Periode")}}
                                </td>
                                <td class="text-end">
                                    {{__("Variation")}}
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{ __("1er Janvier")}}
                                </td>
                                <td class="text-end">
                                    -3.09%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{__("Depuis 24h")}}
                                </td>
                                <td class="text-end">
                                    +0.29%
                                </td>
                            </tr>
                            <tr>
                                <td >
                                {{__("1 semaine")}}
                                </td>
                                <td class="text-end">
                                    +1.25%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ __("1 mois")}}
                                </td>
                                <td class="text-end">
                                    -3.39%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ __("6 mois")}}
                                </td>
                                <td class="text-end">
                                    -5.74%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ __("1 an")}}
                                </td>
                                <td class="text-end">
                                    -6.59%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ __("3 ans")}}
                                </td>
                                <td class="text-end">
                                    +19.41%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ __("5 ans")}}
                                </td>
                                <td class="text-end">
                                    +54.95%
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <i><a href="https://www.capital.fr/devises/cours/EUR/CDF" class="nav-link">capital (source)</a></i>
                    <span>{{ __("Toutes les informations sur le cours Euro Franc congolais : taux de change, convertisseur et données historiques") }}</span>
                </div>
            </div>
            <div class="col-md-5 card">
                <div class="card-header">
                    {{ __("Principale devises")}}
                </div>
                <div class="card-body">
                    <table class="table">
                        @php
                            $devises = [
                                'Kuwaiti Dinar'=>[
                                'USD rate'=>3.30,
                                'EURO Rate'=>2.88,
                                'Code'=>'KWD'],
                                'Bahraini Dinar'=>[
                                'USD rate'=>2.66,
                                'EURO Rate'=>2.32,
                                'Code'=>'BHD'],
                                'Omani Rial'=>[
                                'USD rate'=>2.60,
                                'EURO Rate'=>2.27,
                                'Code'=>'OMR'],
                                'Jordanian Dinar'=>[
                                'USD rate'=>1.41,
                                'EURO Rate'=>1.23,
                                'Code'=>'JOD'],
                                'British Pound Sterling'=>[
                                'USD rate'=>1.22,
                                'EURO Rate'=>1.07,
                                'Code'=>'GBP'],
                                'Cayman Islands Dollar'=>[
                                'USD rate'=>1.22,
                                'EURO Rate'=>1.07,
                                'Code'=>'KYD'],
                                'European Euro'=>[
                                'USD rate'=>1.14,
                                'EURO Rate'=>1,
                                'Code'=>'EURO'],
                                'Swiss Franc'=>[
                                'USD rate'=>1.08,
                                'EURO Rate'=>0.94,
                                'Code'=>'CHF'],
                                'US Dollar'=>[
                                'USD rate'=>1,
                                'EURO Rate'=>0.87,
                                'Code'=>'USD'],
                                'Canadian Dollar'=>[
                                'USD rate'=>0.78,
                                'EURO Rate'=>0.68,
                                'Code'=>'CAD'],
                                'Singapore Dollar'=>[
                                'USD rate'=>0.74,
                                'EURO Rate'=>0.65,
                                'Code'=>'SGD'],
                                'Brunei Dollar'=>[
                                'USD rate'=>0.74,
                                'EURO Rate'=>0.75,
                                'Code'=>'BND'],
                                'Australian Dollar'=>[
                                'USD rate'=>0.71,
                                'EURO Rate'=>0.62,
                                'Code'=>'AUD'],
                                'New Zealand Dollar'=>[
                                'USD rate'=>0.66,
                                'EURO Rate'=>0.59,
                                'Code'=>'NZD'],
                                'Azerbaijani Manat'=>[
                                'USD rate'=>0.59,
                                'EURO Rate'=>0.51,
                                'Code'=>'AZN'],
                                'Bulgarian Lev'=>[
                                'USD rate'=>0.58,
                                'EURO Rate'=>0.51,
                                'Code'=>'BGN'],
                                'Bosnia and Herzegovina Convertible Mark'=>[
                                'USD rate'=>0.58,
                                'EURO Rate'=>0.51,
                                'Code'=>'BAM'],
                                'Aruban Florin'=>[
                                'USD rate'=>0.56,
                                'EURO Rate'=>0.49,
                                'Code'=>'AWG'],
                                'Fijian Dollar'=>[
                                'USD rate'=>0.47,
                                'EURO Rate'=>0.41,
                                'Code'=>'FJD'],
                                'Israeli Shekel'=>[
                                'USD rate'=>0.31,
                                'EURO Rate'=>0.27,
                                'Code'=>'ILS']
                                
                                ];
                        @endphp
                        <thead>
                            <tr>
                                <td></td>
                                <td>
                                    {{ __("USD Rate")}}
                                </td>
                                <td>
                                    {{ __("Euro Rate")}}
                                </td>
                                <td>
                                    {{ __("Code")}}
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devises as $items => $values)
                            <tr>
                            <td>{{ $items }} </td>
                            @foreach ($values as $item)
                                <td>{{ $item}}</td>
                            @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <i> <a href="https://fr.fxssi.com/top-10-les-monnaies-les-plus-cheres-du-monde" class="nav-link">{{ __("Données tire du site") }} fxssi {{ __("(TOP 10 - les monnaies les plus chères du monde 2022) ")}}(source)</a></i>
                </div>
            </div>
        </div>
    </div>
</div> 
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

