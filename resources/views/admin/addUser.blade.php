@extends('layouts.app')

@section('content')

<a href="{{ route('admin.userList') }}"><i class="fa fa-arrow-left"></i></a> <br><br>

<h2 align="center">@if(isset($data)) Modifier @else Ajouter  @endif un utilisateur</h2>

@if(count($errors)>0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="@if(isset($data)) /addUser/{{$data->id;}}  @else /addUser  @endif" method="POST">
@csrf
  <div class="form-group">
    <label for="name">Nom complet</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Nom complet" value="@if(isset($data)){{$data->name;}}@else{{Request::old('name')}}@endif" onchange="validNom()" required >
    <span id="s1"></span>
</div>

  <div class="form-group">
    <label for="email">Adresse Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="@if(isset($data)){{$data->email;}}@else{{Request::old('email')}}@endif" required >
  </div>

  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" onchange="validPassword()" required>
    <span id="s2"></span>
  </div>

  <div class="form-group">
    <label for="confirmation">Confirmation du mot de passe</label>
    <input type="password" class="form-control" name="confirmation" id="confirmation" placeholder="confirmation du mot de passe" onchange="validConfPassword()" required>
    <span id="s3"></span>
  </div>


  <div class="col-12-md">
    <input type="submit" class="btn btn-primary"  name="add" value="@if(isset($data)) Modifier @else Ajouter  @endif" onclick="valid()">
  </div>

</form>

<script src="../JS_validation/validation1.js"></script>


@endsection