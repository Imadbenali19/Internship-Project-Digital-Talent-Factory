@extends('layouts.app2')

@section('content2')

<link rel="stylesheet" href="datatables/jquery.dataTables.min.css">
<script src="datatables/jquery-3.5.1.js"></script>
<script src="datatables/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
		$('#myTab').DataTable();
	} );	
</script>


<a href="/addSpecialite">Vouler-vous ajouter une spécialité ?</a> <br><br>

<div class="table-responsive">  
<table class="display" id="myTab">
    <thead class="table-light">
		<th>#</th>
		<th>Nom</th>
		<th>Description</th>
		<th>Date de création</th>
		<th>Date de modification</th>
		<th>Action 1</th>
		<th>Action 2</th>
	</thead>
	<tbody>
        <?php
            $i=0;
            foreach($data as $el){
              $i++;
             ?>
            <tr>   
              <td>{{$i;}}</td>
              <td>{{$el->NomSpec;}}</td>
              <td>{{$el->DescriptionSpec;}}</td>
              <td>{{$el->created_at;}}</td>
              <td>{{$el->updated_at;}}</td>
              <td><a href="/addSpecialite/{{$el->id;}}" role="button" class="btn btn-outline-primary">Modifier</a></td>
              <td><a href="/specialitiesList/{{$el->id;}}" role="button" class="btn btn-outline-danger" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette spécialité?'));">Supprimer</a></td>
            </tr>          
            <?php } 
            ?>  	
	</tbody>
</table>
</div>

<script>
    document.getElementById('specialite').className+=" active";
</script>

@endsection