<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../about_contactUS/css/backTop.css" rel="stylesheet">
    <title>MS Digital Talent Factory</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/pricing/">

    <!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <style>
      body {
    background-image: linear-gradient(180deg, #eee, #fff 100px, #fff);
  }
  
  .container {
    max-width: 1350px;
  }

  #logo{
    width: 85px;
    height: 73px;
  }

  i.fa:hover {
    color: #2074bd;
    transform: translateY(-5.5px);

}
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
        font-size: 3.5rem;
        }
    }
    </style>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    
</head>
<body> 
    <div class="container py-3">
  <header>

    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="../Images/Logo.png" alt="Logo" title="Logo" id="logo"></a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/aboutus">About us</a></li>
                        <li class="nav-item"><a class="nav-link" href="/contactus">Contact us</a></li>

                        <!-- Authentication Links -->
                        @guest
                            
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                        @else
                            <li class="nav-item dropdown">
                            <input class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false" value="{{ Auth::user()->name }}">
                              
 
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      
    </div>
  </header>


  <main class="py-4">

    @yield('content')
  </main>
  

  <footer class="text-center text-white" style="background-color: #f1f1f1;">
  <!-- Grid container -->
  <div class="container pt-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="https://facebook.com"
        target="_blank"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fa fa-facebook-square" aria-hidden="true"></i></a>

      <!-- Twitter -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="https://twitter.com"
        target="_blank"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fa fa-twitter-square" aria-hidden="true"></i></a>

      <!-- Linkedin -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="https://linkedin.com"
        target="_blank"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
      <!-- Github -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="https://github.com"
        target="_blank"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fa fa-github-square" aria-hidden="true"></i></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    <img class="mb-2" src="../Images/Logo.png" alt="" width="24" height="19">
    <small class="d-block mb-3 text-muted">&copy; 2021 Copyright</small>
    <a class="text-dark" href="/">MS_DIGITAL_TALENT_FACTORY</a>
  </div>
  <!-- Copyright -->
</footer>

@include('sweetalert::alert')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa fa-chevron-up"></i></a>

</body>
<script src="../about_contactUS/js/main.js"></script>
<!-- MDB -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script> -->
<script type="text/javascript" src="{{ asset('mdb.min.js') }}"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>