@extends('layouts.app')

@section('content')

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<a href="{{ route('admin.schoolList') }}"><i class="fa fa-arrow-left"></i></a> <br><br>

<h2 align="center">@if(isset($data)) Modifier @else Ajouter  @endif une école/université</h2>

@if(count($errors)>0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="@if(isset($data)) /addSchool/{{$data->id;}}  @else /addSchool  @endif" method="POST" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="NomEcole">Nom</label>
    <input type="text" class="form-control" name="NomEcole" id="NomEcole" placeholder="Nom de l'école" value="@if(isset($data)){{$data->NomEcole;}}@else{{Request::old('NomEcole')}}@endif" onchange="validNom()" required >
    <span id="s1"></span>
  </div>

  <div class="form-group">
    <label for="TypeEcole">Type</label>
    <select id="TypeEcole" name="TypeEcole" class="form-control">
        <option value="Publique" <?php if(isset($data) && $data->TypeEcole=="Publique"){?> selected <?php } ?> >Publique</option>
        <option value="Privée" <?php if(isset($data) && $data->TypeEcole=="Privée"){?> selected <?php } ?> >Privée</option>
    </select>
  </div>

  <div class="form-group">
    <label for="AdresseEcole">Adresse</label>
    <textarea class="form-control" name="AdresseEcole" id="AdresseEcole" placeholder="Adresse de l'école" cols="30" rows="5" onchange="validAdresse()" required >@if(isset($data)){{$data->AdresseEcole;}}@else{{Request::old('AdresseEcole')}}@endif</textarea>
    <span id="s2"></span>
  </div>

  <div class="form-group">
    <label for="DateFondationEcole">Date de fondation</label>
    <input type="date" class="form-control" name="DateFondationEcole" id="DateFondationEcole" value="@if(isset($data)){{$data->DateFondationEcole;}}@else{{Request::old('DateFondationEcole')}}@endif" required >
  </div>

  <div class="form-group">
    <label for="VilleEcole" class="form-label">Ville</label>
    <input list="villes" name="VilleEcole" id="VilleEcole" class="form-control" placeholder="Ville de l'école" value="@if(isset($data)){{$data->VilleEcole;}}@else{{Request::old('VilleEcole')}}@endif" onchange="validVille()" required />
    <datalist id="villes">
      @foreach($ecole as $x )
        <option value="{{ $x->VilleEcole }}">
      @endforeach
    </datalist>
    <span id="s3"></span>
  </div>
  
  <div class="form-group">
    <label for="EmailEcole">Adresse Email</label>
    <input type="email" class="form-control" name="EmailEcole" id="EmailEcole" placeholder="name@example.com" value="@if(isset($data)){{$data->EmailEcole;}}@else{{Request::old('EmailEcole')}} @endif">
  </div>

  <div class="form-group">
    <label for="TelEcole">N° Tel</label>
    <input type="tel" class="form-control" name="TelEcole" id="TelEcole" placeholder="N° Tel de l'école" onchange="validTel()" value="@if(isset($data)){{$data->TelEcole;}}@else{{Request::old('TelEcole')}}@endif" required>
    <span id="s4"></span>
  </div>

  <div class="form-group">
    <label for="LinkedInEcole">Page LinkedIn</label>
    <input type="text" class="form-control" name="LinkedInEcole" id="LinkedInEcole" placeholder="Page LinkedIn de l'école" onchange="validLinkedIn()" value="@if(isset($data)){{$data->LinkedInEcole;}}@else{{Request::old('LinkedInEcole')}}@endif">
    <span id="s5"></span>
  </div>

  <div class="form-group">
    <label for="SiteWebEcole">Site Web</label>
    <input type="text" class="form-control" name="SiteWebEcole" id="SiteWebEcole" placeholder="Site Web de l'école (www.exemple.ma)" onchange="validSiteWeb()" value="@if(isset($data)){{$data->SiteWebEcole;}}@else{{Request::old('SiteWebEcole')}}@endif">
    <span id="s6"></span>
  </div>

  <div class="form-group">
    <label for="HistoireEcole">Histoire</label>
    <textarea class="form-control" name="HistoireEcole" id="HistoireEcole" placeholder="Histoire de l'école" cols="30" rows="8">@if(isset($data)){{$data->HistoireEcole;}}@else{{Request::old('HistoireEcole')}}@endif</textarea>
  </div>

  <div class="form-group">
    <label for="spec" class="form-label">Specialité</label>
    <select class="selectpicker form-control" id="spec" name="spec[]" multiple data-live-search="true" required>
      @foreach($specialites as $x )
<option value="{{ $x->id }}" <?php if(isset($data2)){foreach($data2 as $y){ if($y->specialite_id==$x->id){ ?> selected <?php break; }}} ?> >
  {{ $x->NomSpec }}
</option>
      @endforeach
    </select>
    <span id="s7"></span>
  </div>
 
  <label class="form-label" for="customFile">Logo de l'école</label>
  <input type="file" class="form-control" id="customFile" name="customFile" />  
 
  <br>

  <div class="col-12-md">
    <input type="submit" class="btn btn-primary"  name="add" value="@if(isset($data)) Modifier @else Ajouter  @endif" onclick="valid()">
  </div>

</form>

<script src="../JS_validation/validation2.js"></script>

<script>  
  $('.selectpicker').selectpicker();
</script>


@endsection