@extends('layouts.app3')

@section('content3')

<a href="{{ route('root') }}"><i class="fa fa-arrow-left"></i></a> <br><br>


<section class="container-fluid">
    
        <img src="../Images/Ecoles/{{ $ecole->PhotoEcole }}" title="Logo" height="150">
    <div class="row">
        <h2 align='center' style="color: #007bff;">{{ $ecole->NomEcole }}</h2>

        <br><br><br>

        <div class="col-sm">
            <p style="text-align: justify;font-size: 20px;" >
            <b>{{ $ecole->NomEcole }}</b> est une école <b>{{ $ecole->TypeEcole }}</b> à <b>{{ $ecole->VilleEcole }}</b> fondée le <b>{{ $ecole->DateFondationEcole }}</b>.
            </p>
            <p style="text-align: justify;font-size: 20px;">
            {{ $ecole->HistoireEcole }}
            </p>
        </div>
    </div>
</section>
    <div class="container pt-4">
    <center>
    <section class="mb-4">
      
        <i class="fa fa-map-marker"></i>
        <span>{{ $ecole->AdresseEcole }}</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        @if(!empty($ecole->EmailEcole))
            <i class="fa fa-envelope"></i>
            <span>{{ $ecole->EmailEcole }}</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        @endif
      
        <i class="fa fa-phone"></i>
        <span>{{ $ecole->TelEcole }}</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        @if(!empty($ecole->LinkedInEcole))
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.linkedin.com/school/{{ $ecole->LinkedInEcole }}" target="_blank" data-mdb-ripple-color="dark"><i class="fa fa-linkedin-square"></i></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        @endif
        
    </section>
</center>
  </div>


<script>
    document.getElementById('info').className+=" active";
</script>

@endsection