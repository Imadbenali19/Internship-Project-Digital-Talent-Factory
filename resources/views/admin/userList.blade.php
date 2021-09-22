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

<a href="/addUser">Vouler-vous ajouter un utilisateur ?</a> <br><br>

<div class="table-responsive">  
<table class="display" id="myTab" >
  <thead class="table-light">
		<th>#</th>
		<th>Nom Complet</th>
		<th>Email</th>
		<th>Admin?</th>
		<th>Date de création</th>
		<th>Date de modification</th>
		<th>Action 1</th>
		<th>Action 2</th>
	</thead>
	<tbody id="user_table">
        <?php
            $i=0;
            foreach($data as $el){
              $i++;
             ?>
            <tr>   
              <td>{{$i;}}</td>
              <td>{{$el->name;}}</td>
              <td>{{$el->email;}}</td>
              <td>@if($el->admin==0) Non @else Oui @endif</td>
              <td>{{$el->created_at;}}</td>
              <td>{{$el->updated_at;}}</td>
              <td><a href="/addUser/{{$el->id;}}" role="button" class="btn btn-outline-primary">Modifier</a></td>
              <td><a href="/usersList/{{$el->id;}}" role="button" class="btn btn-outline-danger" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cet utilisateur?'));">Supprimer</a></td>
            </tr>          
            <?php } 
            ?>  	
	</tbody>
</table>
</div>

<script>
    document.getElementById('user').className+=" active";
</script>
<br>

@endsection