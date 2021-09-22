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


<a href="/addSchool">Vouler-vous ajouter une école/université ?</a> <br><br>

<div class="table-responsive">
<table class="display" id="myTab">
    <thead class="table-light">
      <th>#</th>
      <th>Logo</th>
      <th>Nom</th>
      <th>Type</th>
      <th>Ville</th>
      <th>Adresse</th>
      <th>Date de fondation</th>
      <th>Date de création</th>
      <th>Date de modification</th>
      <th>Action 1</th>
      <th>Action 2</th>
      <th>Action 3</th>
	  </thead>
	<tbody>
        <?php
          $i=0;
            foreach($data as $el){
              $i++;
             ?>
            <tr>   
              <td>{{$i;}}</td>
              <td><img src="Images/Ecoles/{{$el->PhotoEcole;}}" class="img-thumbnail" height="25px" width="80px" title="Logo {{$el->NomEcole;}}"></td>
              <td>{{$el->NomEcole;}}</td>
              <td>{{$el->TypeEcole;}}</td>
              <td>{{$el->VilleEcole;}}</td>
              <td>{{$el->AdresseEcole;}}</td>
              <td>{{$el->DateFondationEcole;}}</td>
              <td>{{$el->created_at;}}</td>
              <td>{{$el->updated_at;}}</td>
              <td><a href="/showSchool/{{$el->id;}}" role="button" class="btn btn-outline-info">Découvrir</a></td>
              <td><a href="/addSchool/{{$el->id;}}" role="button" class="btn btn-outline-primary">Modifier</a></td>
              <td><a href="/schoolsList/{{$el->id;}}" role="button" class="btn btn-outline-danger" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette école/université?'));">Supprimer</a></td>
            </tr>          
            <?php } 
            ?>  	
	</tbody>
</table>
</div>
<script>
    document.getElementById('school').className+=" active";
</script>

@endsection