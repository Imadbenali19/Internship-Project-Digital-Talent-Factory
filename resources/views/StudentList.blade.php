@extends('layouts.app3')

@section('content3')

<a href="{{ route('root') }}"><i class="fa fa-arrow-left"></i></a> <br><br>

<link rel="stylesheet" href="../datatables/jquery.dataTables.min.css">
<script src="../datatables/jquery-3.5.1.js"></script>
<script src="../datatables/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
		$('#myTab').DataTable();
	} );	
</script>

<div class="table-responsive">  
<table class="display" id="myTab" >
    <thead class="table-light">
		<th>#</th>
		<th>Photo</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Date de naissance</th>
		<th>Age</th>
        <th>Spécialité</th>
		<th>Niveau scolaire</th>
		<th>Email</th>
        <th>N° Tel</th>
        <th>LinkedIn</th>
        <th>Gradué(e)</th>
        <th>Année de graduation(Prévue)</th>
		<th>Date de création</th>
		<th>Date de modification</th>
	</thead>
	<tbody>
        <?php
            $i=0;
            foreach($data as $el){
            $i++;
             ?>
            <tr>   
              <td>{{$i;}}</td>
              <td><img src="../Images/Etudiants/{{$el->PhotoEtud;}}" class="img-thumbnail" height="25px" width="80px" title="Photo {{$el->NomEtud;}}"></td>
              <td>{{$el->NomEtud;}}</td>
              <td>{{$el->PrenomEtud;}}</td>
              <td>{{$el->DateNaissEtud;}}</td>
              <td>{{$el->AgeEtud;}}</td>
              <td>{{$el->specialite->NomSpec;}}</td>
              <td>{{$el->NiveauEtud;}} année</td>
              <td>{{$el->EmailEtud;}}</td>
              <td>{{$el->TelEtud;}}</td>
              <td>{{$el->LinkedInEtud;}}</td>
              <td>@if($el->IsGradueEtud==0) Non @else Oui @endif</td>
              <td>{{$el->AnneeDeGraduationEtud;}}</td>
              <td>{{$el->created_at;}}</td>
              <td>{{$el->updated_at;}}</td>
            </tr>          
            <?php } 
            ?>  	
	</tbody>
</table>
</div>



<script>
    document.getElementById('etud').className+=" active";
</script>

@endsection