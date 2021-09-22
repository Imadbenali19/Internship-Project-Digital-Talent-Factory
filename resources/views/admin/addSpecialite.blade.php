@extends('layouts.app')

@section('content')

<a href="{{ route('admin.specialiteList') }}"><i class="fa fa-arrow-left"></i></a> <br><br>

<h2 align="center">@if(isset($data)) Modifier @else Ajouter  @endif une spécialité</h2>

@if(count($errors)>0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="@if(isset($data)) /addSpecialite/{{$data->id;}}  @else /addSpecialite  @endif" method="POST">
@csrf
  <div class="form-group">
    <label for="NomSpec">Nom</label>
    <input type="text" class="form-control" name="NomSpec" id="NomSpec" placeholder="Nom de la spécialité" value="@if(isset($data)){{$data->NomSpec}}@else{{Request::old('NomSpec')}}@endif" onchange="validNom()" required >
    <span id="s1"></span>
  </div>

  <div class="form-group">
    <label for="DescriptionSpec">Description</label>
    <input type="text" class="form-control" name="DescriptionSpec" id="DescriptionSpec" placeholder="Description de la spécialité" value="@if(isset($data)){{$data->DescriptionSpec;}}@else{{Request::old('DescriptionSpec')}}@endif" onchange="validSpecialite()">
    <span id="s2"></span>
  </div>

  <div class="col-12-md">
    <input type="submit" class="btn btn-primary"  name="add" value="@if(isset($data)) Modifier @else Ajouter  @endif" onclick="valid()">
  </div>

</form>

<script src="../JS_validation/validation3.js"></script>


@endsection