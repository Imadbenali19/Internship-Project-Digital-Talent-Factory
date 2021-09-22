@extends('layouts.app')

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <!-- Left links -->
      
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
            
          <a class="nav-link" href="/showSchool/{{ $ecole->id }}" id="info">Informations générales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/UStudentList/{{ $ecole->id }}" id="etud">Liste des étudiants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/statistiquesEcoles/{{ $ecole->id }}" id="data">Statistiques</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="//{{ $ecole->SiteWebEcole }}" target="_blank" id="web">Site Web</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar -->


<main class="py-4">

    @yield('content3')
  </main>


@endsection
