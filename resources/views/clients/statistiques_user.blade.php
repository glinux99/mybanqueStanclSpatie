@extends('clients.clientMinLayout')
@section('contenu')
@php
    $x=0; 
    $in =array();    
    $out =array(); 
    $solde =array(); 
    foreach($stats as $items)
        {
            if(strpos($items->motif,"par")){
                $in []= $items->montant_ret; 
                $solde[]= $items->solde;
            }else {$out[]= $items->montant_ret; $solde[]= $items->solde;}
        }    
    @endphp
    <div class="col-lg-11 mx-auto card adC2">
    <canvas id="cours_G" width="30" height="20" style="background: #0f222b!important;" class="rounded"></canvas>
    </div>
<script>    
const ctx2 = document.getElementById('cours_G');
var input = <?php echo json_encode($in);?>;
var output = <?php echo json_encode($out);?>;
var solde = <?php echo json_encode($solde);?>;
var myArray = input.length;
var myArray2 = output.length;
var myArray3 = solde.length;
var nbr = myArray+myArray2+myArray3;
var tableau = [];
for (var j = 1; j <=(nbr/2)+1; j++){
    tableau.push(j);
}
const data2 = {
  labels: tableau,
  datasets: [{
    label: 'Montant entrant',
    data: input,
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
  },
  {
    label: 'Solde Courant',
    data: solde,
    fill: false,
    borderColor: 'blue',
  },
  {
    label: 'Montant Sortant',
    data: output,
    fill: false,
    borderColor: 'red',
  }]
};
const myChart2 = new Chart(ctx2, {
  type: 'line',
  data: data2,
  options: {
    plugins: {
            title: {
                display: true,
                text: 'Montant Entrant et Sortant',
                color: 'green',
            }
        },
    animations: {
      tension: {
        duration: 3000,
        easing: 'linear',
        from: 0.09,
        to: -0.01,
        loop: true
      }
    }
  }
});
</script>
@stop