<!DOCTYPE html>
<!--
	Cosmix by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Informasi Alumni</title>
<!--Bootstrap-->
<link rel="stylesheet" type="text/css" href="temp/css/bootstrap.css">
<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="temp/css/style.css">
<!--Responsive-->
<link rel="stylesheet" type="text/css" href="temp/css/responsive.css">
<!--Animation-->
<link rel="stylesheet" type="text/css" href="temp/css/animate.css">
<!--Prettyphoto-->
<link rel="stylesheet" type="text/css" href="temp/css/prettyPhoto.css">
<!--Font-Awesome-->
<link rel="stylesheet" type="text/css" href="temp/css/font-awesome.css">
<!--Owl-Slider-->
<link rel="stylesheet" type="text/css" href="temp/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="temp/css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="temp/css/owl.transitions.css">
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  [endif]-->
</head>
<body data-spy="scroll" data-target=".navbar-default" data-offset="100">
<!--Navigation-->
<header id="menu">
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="#menu"><img src="/temp/images/Logo/01.png" alt=""></a> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a class="scroll" href="#menu">Beranda</a></li>
            <li><a class="scroll" href="#about">Tentang</a></li>
            <li><a class="scroll" href="#testimonials">Testimoni</a></li>
            <li><a class="scroll" href="{{ route('login') }}">Login</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </div>
  </div>
</header>

<!--Slider-Start-->
<section id="slider">
  <div id="home-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active" style="background-image:url(temp/images/Slider/01.jpg)">
        <div class="carousel-caption container">
          <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12">
              <h1>Selamat Datang Di</h1>
              <h2>Sistem Informasi Alumni</h2>
            </div>
          </div>
        </div>
      </div>
  </div>
  <!--/#home-carousel-->
</section>
<!--About-Section-Start-->
<section id="about">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>ABOUT <span>US</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ab-sec">
        <div class="col-md-6">
          <h3 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms"><span>W</span>e Are Creative And Awesome</h3>
          <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.Lorem Ipsum is simply dummy text of the printing and typesetting industry. book. </p>
        </div>
        <div class="col-md-6 ab-sec-img wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms"><img src="temp/images/Aboutus/01.jpg" alt=""> </div>
      </div>
    </div>
  </div>
</section>

<!--Testimonials-Section-Start-->
<section id="testimonials" class="parallex">
  <div class="container">
    <div class="quote"> <i class="fa fa-quote-left"></i> </div>
    <div class="clearfix"></div>
    <div class="slider-text">
      <div id="owl-testi" class="owl-carousel owl-theme">
          @foreach($testimoni as $testi)
          @if($testi->user->foto)
            <div  class="col-md-10 col-md-offset-1"> <img src="temp/images/Testimonials/02.jpg" class="img-circle" alt="">
          @else
                <div class="col-md-10 col-md-offset-1"> <img src="temp/images/Testimonials/02.jpg" class="img-circle" alt="">
          @endif
                <h5>{!! $testi->testimoni !!}</h5>
                <h6>{{$testi->user->name}}</h6>
                <p>{{$testi->sekolah}}</p>
            </div>
          @endforeach
      </div>
    </div>
  </div>
</section>
<footer id="footer">
  <div class="bg-sec">
    <div class="container">
      <h2>JADILAH GENERASI BERAKHLAK MULIA DAN BERPRESTASI</h2>
    </div>
  </div>
</footer>
<!--Jquery-->
<script type="text/javascript" src="temp/js/jquery.min.js"></script>
<!--Boostrap-Jquery-->
<script type="text/javascript" src="temp/js/bootstrap.js"></script>
<!--Preetyphoto-Jquery-->
<script type="text/javascript" src="temp/js/jquery.prettyPhoto.js"></script>
<!--NiceScroll-Jquery-->
<script type="text/javascript" src="temp/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="temp/js/waypoints.min.js"></script>
<!--Isotopes-->
<script type="text/javascript" src="temp/js/jquery.isotope.js"></script>
<!--Wow-Jquery-->
<script type="text/javascript" src="temp/js/wow.js"></script>
<!--Count-Jquey-->
<script type="text/javascript" src="temp/js/jquery.countTo.js"></script>
<script type="text/javascript" src="temp/js/jquery.inview.min.js"></script>
<!--Owl-Crousels-Jqury-->
<script type="text/javascript" src="temp/js/owl.carousel.js"></script>
<!--Main-Scripts-->
<script type="text/javascript" src="temp/js/script.js"></script>
</body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->