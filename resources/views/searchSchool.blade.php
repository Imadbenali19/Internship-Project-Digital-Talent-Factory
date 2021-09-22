@extends('layouts.app')

@section('content')

<a href="{{ route('root') }}"><i class="fa fa-arrow-left"></i></a> <br><br>


<h5>{{ $nb }} résultat(s) trouvés</h5>
<br>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center" >
      <!-- /////////// -->
        @foreach($ecole as $x)
            <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">{{ $x->NomEcole }}</h4>
                    </div>
                    <div class="card-body">
                        <img  height="155px"  src="{{ asset('Images/Ecoles/'. $x->PhotoEcole) }}" alt="{{ $x->NomEcole }}.{{ $x->TypeEcole }}" title="{{ $x->NomEcole }}.{{ $x->TypeEcole }}">
                        <a href="/showSchool/{{$x->id;}}" class="w-100 btn btn-lg btn-outline-info">Découvrir</a>
                    </div>
                    </div>
            </div>
        @endforeach
      <!-- /////////// -->
    </div>


@endsection
