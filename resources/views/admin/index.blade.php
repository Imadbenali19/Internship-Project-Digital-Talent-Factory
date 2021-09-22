@extends('layouts.app2')

@section('content2')


<style>
    .card-body{
        background-color: #f1f1f1;
    }
    .card-text{
        color: #0d6efd;
        font-size: xx-large;
    }
</style>

<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <center><h5 class="card-title">Nombre d'utlisateurs de l'application</h5>
        <h6 class="card-text">
         {{$nbu}}
        </h6></center>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card">
      <div class="card-body">
        <center><h5 class="card-title">Nombre de spécialités dans l'application</h5>
        <h6 class="card-text">
         {{$nbspec}}
        </h6></center>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card">
      <div class="card-body">
        <center><h5 class="card-title">Nombre d'écoles et universités dans l'application</h5>
        <h6 class="card-text">
         {{$nbe}}
        </h6></center>
      </div>
    </div>
  </div>

  <div class="col"> 
    <div class="card">
      <div class="card-body">
        <center><h5 class="card-title">Nombre d'étudiants dans l'application</h5>
        <h6 class="card-text">
         {{$nbetd}}
        </h6></center>
      </div>
    </div>
  </div>
</div>

<!-- //////////////////////////// -->
@include('/admin/sidebar')
<!-- /////////////////////// -->

<label for="chart">Sélectionner le type du graph</label>
	<select name="chart" onchange="myFunction()" class="form-control" id="chart" style="width:120px;">
		<option value=""></option>
		<option value="pie">Pie</option>
		<option value="column">Column</option>
		<option value="pyramid">Pyramid</option>
		<option value="bar">Bar</option>
	</select>

    <!-- affichage du graph -->
	
	<div class="product-index" align="right" style="margin-top:40px;">
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	</div>


</section>

<script>
function myFunction() 
{
  var chartType = document.getElementById("chart").value;
  var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
  axisY:{includeZero:true,title:"Nombre d'etudiants"},
  axisX:{title:"Ecole"},
	title: {
		text: "Nombre d'etudiants par école"
	},
	subtitles: [{
		text: ""
	}],
	data: [{
	    type:chartType, //"column",  type: "pie",
		yValueFormatString: "#,##0.\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}



window.onload=function(){
    myFunction();
  }
</script>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
    document.getElementById('dash').className+=" active";
</script>

@endsection
