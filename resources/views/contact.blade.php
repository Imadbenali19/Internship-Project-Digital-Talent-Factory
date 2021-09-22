@extends('layouts.app')

@section('content')

<link href="../about_contactUS/aos/aos.css" rel="stylesheet">
  
<link href="../about_contactUS/css/style2.css" rel="stylesheet">

<section id="contact">
<div class="section-header">
    <h3 class="section-title">Contact us</h3>
</div>
<div class="container mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                <p>61, Quartier Industriel Sidi Ghanem Route Safi<br> À côté de la MouqataâaMarrakech, 40000</p>
              </div>
            
              <div>
                <i class="fa fa-envelope"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="fa fa-phone"></i>
                <p>+212 661-404643</p>
              </div>
            </div>

          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              
              <form action="/contactus" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group mt-3">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required style="margin-top: 0px; margin-bottom: 0px; height: 136px;"></textarea>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
  </section>

  <script src="../about_contactUS/js/main.js"></script>

@endsection
