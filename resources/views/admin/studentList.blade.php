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

<a href="/addStudent">Vouler-vous ajouter un étudiant ?</a> <br><br>

<div class="table-responsive">  
<table class="display" id="myTab" >
    <thead class="table-light">
		<th>#</th>
		<th>Photo</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Date de naissance</th>
		<th>Age</th>
		<th>Ecole/Université</th>
        <th>Spécialité</th>
		<th>Niveau scolaire</th>
		<th>Email</th>
        <th>N° Tel</th>
        <th>LinkedIn</th>
        <th>Gradué(e)</th>
        <th>Année de graduation(Prévue)</th>
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
              <td><img src="Images/Etudiants/{{$el->PhotoEtud;}}" class="img-thumbnail" height="25px" width="80px" title="Photo {{$el->NomEtud;}}"></td>
              <td>{{$el->NomEtud;}}</td>
              <td>{{$el->PrenomEtud;}}</td>
              <td>{{$el->DateNaissEtud;}}</td>
              <td>{{$el->AgeEtud;}}</td>
              <td>{{$el->ecole->NomEcole;}}</td>
              <td>{{$el->specialite->NomSpec;}}</td>
              <td>{{$el->NiveauEtud;}}</td>
              <td>{{$el->EmailEtud;}}</td>
              <td>{{$el->TelEtud;}}</td>
              <td>{{$el->LinkedInEtud;}}</td>
              <td>@if($el->IsGradueEtud==0) Non @else Oui @endif</td>
              <td>{{$el->AnneeDeGraduationEtud;}}</td>
              <td>{{$el->created_at;}}</td>
              <td>{{$el->updated_at;}}</td>
              <td><a href="/addStudent/{{$el->id;}}" role="button" class="btn btn-outline-primary">Modifier</a></td>
              <td><a href="/studentsList/{{$el->id;}}" role="button" class="btn btn-outline-danger" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cet étudiant?'));">Supprimer</a></td>
            </tr>          
            <?php } 
            ?>  	
	</tbody>
</table>
</div>

<script>
    document.getElementById('student').className+=" active";
</script>

@endsection