@extends('layouts.app')

@section('content')

<link href="../about_contactUS/aos/aos.css" rel="stylesheet">
<link href="../about_contactUS/css/style.css" rel="stylesheet">

<section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">Few Words About Us</h2>
            <p>
            Mc Digital Talent Factory est une application qui suit et fournit des données brutes et des statistiques sur les établissements d'enseignement et leurs étudiants qui traitent le Digital Talent.
            </p>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fa fa-briefcase"></i></div>
              <h4 class="title">Notre équipe</h4>
              <p class="description">Notre équipe est composée de professionnels dans tout le pays pour maintenir l'application à jour 24h/24 et 7j/7</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="fa fa-list"></i></div>
              <h4 class="title">Services</h4>
              <p class="description">Nous fournissons les meilleures et les plus fiables et pertinentes données sur l'établissement ou l'étudiant concerné</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="fa fa-binoculars"></i></div>
              <h4 class="title">Sécurité et mises à jour</h4>
              <p class="description">Nous maintenons notre application Web à jour et fonctionnelle et, plus important encore, nous gardons les données de nos clients sécurisées et privées</p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100"></div>
        </div>

      </div>
    </section>
  
  <script src="../about_contactUS/aos/aos.js"></script>
  <script src="../about_contactUS/glightbox/js/glightbox.min.js"></script>
  <script src="../about_contactUS/swiper/swiper-bundle.min.js"></script>

  <script src="../about_contactUS/js/main.js"></script>

@endsection
