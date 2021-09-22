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
            
          <a class="nav-link" href="/admin" id="dash">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/usersList" id="user">Users List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/schoolsList" id="school">Schools/Univ List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/studentsList" id="student">Students List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/specialitiesList" id="specialite">Specialities List</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar -->


<main class="py-4">

    @yield('content2')
  </main>


@endsection
