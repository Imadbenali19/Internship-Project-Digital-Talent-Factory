@extends('layouts.app3')

@section('content3')


<a href="{{ route('root') }}"><i class="fa fa-arrow-left"></i></a> <br><br>


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
        <center><h5 class="card-title">Nombre d'étudiants dans {{ $ecole->NomEcole }}</h5>
        <h6 class="card-text">
         {{$nbetudiant}}
        </h6></center>
      </div>
    </div>
  </div>

  <div class="col"> 
    <div class="card">
      <div class="card-body">
        <center><h5 class="card-title">Nombre de spécialités dans {{ $ecole->NomEcole }}</h5>
        <h6 class="card-text">
         {{$nbspec}}
        </h6></center>
      </div>
    </div>
  </div>
</div>

<!-- //////////////////////////// -->
@include('/admin/sidebar')
<!-- /////////////////////// -->
<!-- Nombre d'etudiants par spécialité-->

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


<label for="chart1">Sélectionner le type du graph</label>
	<select name="chart1" onchange="myFunction1()" class="form-control" id="chart1" style="width:120px;">
		<option value=""></option>
		<option value="pie">Pie</option>
		<option value="column">Column</option>
		<option value="pyramid">Pyramid</option>
		<option value="bar">Bar</option>
	</select>

    <!-- affichage du graph -->
	
	<div class="product-index" align="right" style="margin-top:40px;">
		<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
	</div>


<label for="chart2">Sélectionner le type du graph</label>
	<select name="chart2" onchange="myFunction2()" class="form-control" id="chart2" style="width:120px;">
		<option value=""></option>
		<option value="pie">Pie</option>
		<option value="column">Column</option>
		<option value="pyramid">Pyramid</option>
		<option value="bar">Bar</option>
	</select>

    <!-- affichage du graph -->
	
	<div class="product-index" align="right" style="margin-top:40px;">
		<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
	</div>

    
	
	<br>
	<!-- Pick a year -->
	<form action="{{ route('statistics', $ecole->id) }}" method="POST">
	@csrf
		<label for="year">Sélectionner une année</label>
		<select name="year" class="form-control" id="year" style="width:120px;" onchange="this.form.submit()">
			@foreach($year as $x )
                <option value="{{ $x->AG }}" <?php if(isset($y) && $y==$x->AG){?> selected <?php } ?>>{{ $x->AG }}</option>
        	@endforeach
		</select>
	</form>

	

	<!-- affichage du graph -->
	
	<div class="product-index" align="right" style="margin-top:40px;">
		<div id="chartContainer3" style="height: 370px; width: 100%;"></div>
	</div>


<script>
function myFunction() 
{
var chartType = document.getElementById("chart").value;
  var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
  axisY:{includeZero:true,title:"Nombre d'etudiants"},
  axisX:{includeZero:true,title:"Spécialité"},
	title: {
		text: "Nombre d'etudiants par spécialité"
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

////////////////////

function myFunction1() 
{
  var chartType = document.getElementById("chart1").value;
  var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
  axisY:{includeZero:true,title:"Nombre d'etudiants"},
  axisX:{includeZero:true,title:"Niveau scolaire"},
	title: {
		text: "Nombre d'etudiants par niveau scolaire"
	},
	subtitles: [{
		text: ""
	}],
	data: [{
	    type:chartType, //"column",  type: "pie",
		yValueFormatString: "#,##0.\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($data1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
}

////////////////////

function myFunction2() 
{
  var chartType = document.getElementById("chart2").value;
  var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
  axisY:{includeZero:true,title:"Nombre d'etudiants gradués"},
  axisX:{includeZero:true,title:"Année de graduation (prévue)"},
	title: {
		text: "Nombre d'etudiants gradués par années"
	},
	subtitles: [{
		text: ""
	}],
	data: [{
	    type:chartType, //"column",  type: "pie",
		yValueFormatString: "#,##0.\"\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($data2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();
}

////////////////////




function myFunction3() {
	var y=document.getElementById('year').value;
	var chartype='column';
	var chart3 = new CanvasJS.Chart("chartContainer3", {
	  animationEnabled: true,
	axisY:{includeZero:true,title:"Nombre d'etudiants gradués"},
	axisX:{includeZero:true,title:"Spécialité"},
	  title: {
		  text: "Nombre d'etudiants gradués par spécialités en "+y
	  },
	  subtitles: [{
		  text: ""
	  }],
	  data: [{
		  type:chartype, //"column",  type: "pie",
		  yValueFormatString: "#,##0.\"\"",
		  indexLabel: "{label} ({y})",
		  dataPoints: <?php echo json_encode($data3, JSON_NUMERIC_CHECK); ?>
	  }]
  });
  chart3.render();
  }


window.onload=function(){
    myFunction();
    myFunction1();
    myFunction2();
    myFunction3();
    
  }
</script>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script>
    document.getElementById('data').className+=" active";
</script>

@endsection