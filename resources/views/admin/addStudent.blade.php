@extends('layouts.app')

@section('content')

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<a href="{{ route('admin.studentList') }}"><i class="fa fa-arrow-left"></i></a> <br><br>

<h2 align="center">@if(isset($data)) Modifier @else Ajouter  @endif un étudiant</h2>

@if(count($errors)>0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="@if(isset($data)) /addStudent/{{$data->id;}}  @else /addStudent  @endif" method="POST" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="NomEtud">Nom</label>
    <input type="text" class="form-control" name="NomEtud" id="NomEtud" placeholder="Nom de l'étudiant" value="@if(isset($data)){{$data->NomEtud;}}@else{{Request::old('NomEtud')}}@endif" onchange="validNom()" required >
    <span id="s1"></span>
  </div>

  <div class="form-group">
    <label for="PrenomEtud">Prénom</label>
    <input type="text" class="form-control" name="PrenomEtud" id="PrenomEtud" placeholder="Prenom de l'étudiant" value="@if(isset($data)){{$data->PrenomEtud;}}@else{{Request::old('PrenomEtud')}}@endif" onchange="validPrenom()" required >
    <span id="s2"></span>
  </div>

  <div class="form-group">
     <label for="DateNaissEtud">Date de naissance</label>
     <input type="date" class="form-control" name="DateNaissEtud" id="DateNaissEtud" value="@if(isset($data)){{$data->DateNaissEtud;}}@else{{Request::old('DateNaissEtud')}}@endif" required >
  </div>

  <div class="form-group">
    <label for="NiveauEtud">Niveau</label>
    <select id="NiveauEtud" name="NiveauEtud" class="form-control">
        <option value="1" <?php if(isset($data) && $data->NiveauEtud=="1"){?> selected <?php } ?> >1ère année</option>
        <option value="2" <?php if(isset($data) && $data->NiveauEtud=="2"){?> selected <?php } ?> >2ème année</option>
        <option value="3/Niveau Licence" <?php if(isset($data) && $data->NiveauEtud=="3/Niveau Licence"){?> selected <?php } ?> >3ème année/Niveau Licence</option>
        <option value="4" <?php if(isset($data) && $data->NiveauEtud=="4"){?> selected <?php } ?> >4ème année</option>
        <option value="5" <?php if(isset($data) && $data->NiveauEtud=="5"){?> selected <?php } ?> >5ème année</option>
        <option value="Niveau Master" <?php if(isset($data) && $data->NiveauEtud=="Niveau Master"){?> selected <?php } ?> >Niveau Master</option>
        <option value="Niveau Doctorat" <?php if(isset($data) && $data->NiveauEtud=="Niveau Doctorat"){?> selected <?php } ?> >Niveau Doctorat</option>
    </select>
  </div>
  
  <div class="form-group">
    <label for="EmailEtud">Adresse Email</label>
    <input type="email" class="form-control" name="EmailEtud" id="EmailEtud" placeholder="name@example.com" value="@if(isset($data)){{$data->EmailEtud;}}@else{{Request::old('EmailEtud')}} @endif">
  </div>

  <div class="form-group">
    <label for="TelEtud">N° Tel</label>
    <input type="tel" class="form-control" name="TelEtud" id="TelEtud" placeholder="N° Tel de l'étudiant" onchange="validTel()" value="@if(isset($data)){{$data->TelEtud;}}@else{{Request::old('TelEtud')}}@endif" required>
    <span id="s3"></span>
  </div>

  <div class="form-group">
    <label for="LinkedInEtud">Page LinkedIn</label>
    <input type="text" class="form-control" name="LinkedInEtud" id="LinkedInEtud" placeholder="Page LinkedIn de l'étudiant" onchange="validLinkedIn()" value="@if(isset($data)){{$data->LinkedInEtud;}}@else{{Request::old('LinkedInEtud')}}@endif">
    <span id="s4"></span>
  </div>

  <div class="form-group">
     <label for="AnneeDeGraduationEtud">Annee de graduation (Prévue)</label>
     <input type="number" class="form-control" name="AnneeDeGraduationEtud" id="AnneeDeGraduationEtud" onchange="validDate()" value="@if(isset($data)){{$data->AnneeDeGraduationEtud;}}@else{{Request::old('AnneeDeGraduationEtud')}}@endif" required >
     <span id="s5"></span>
    </div>


<!-- ////////// -->


  <div class="form-group">
    <label for="EcoleSpecEtud" class="form-label">Ecole:Spécialité</label>
    <input list="EcolesSpecialites" name="EcoleSpecEtud" id="EcoleSpecEtud" class="form-control" placeholder="Ecole:Spécialité" value="@if(isset($data)){{$MY_ecole_Name;}}:{{$MY_spec_Name;}}@endif" onchange="validVille()" required />
    <datalist id="EcolesSpecialites">
      @foreach($ecole_spec as $x )
        <option value="{{$x->NomEcole}}:{{$x->NomSpec}}">
      @endforeach
    </datalist>
  </div>


<!-- //////////////: -->



  <label class="form-label" for="customFile">Photo de l'étudiant</label>
  <input type="file" class="form-control" id="customFile" name="customFile" />  
 
  <br>

  <div class="col-12-md">
    <input type="submit" class="btn btn-primary"  name="add" value="@if(isset($data)) Modifier @else Ajouter  @endif" onclick="valid()">
  </div>

</form>

<script src="../JS_validation/validation4.js"></script>

@endsection