@extends('layouts.app')

@section('content')
<div class="p-3">
<h3>
    Statistiques vente par produits
</h3>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="barchart_material"></div>
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
      var data = google.visualization.arrayToDataTable([
             ['Produit', 'Total vente'],
             @foreach($ventesByProduit as $vbp) 
             [ {{ $vbp->total }}, {{ $vbp->total }} ],
             @endforeach
         ]);
      var options = {
        title: "Bar Graph | Total vente",
        subtitle: "Total",
        width: 600,
        height: 400,
      };
      var chart = new google.visualization.BarChart(document.getElementById('barchart_material'));
      chart.draw(data, options);
  }
</script>

</div>        
@endsection