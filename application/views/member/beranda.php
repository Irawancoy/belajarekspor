<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Belajar Ekspor Bersama Coach Fernandes Raymond - BelajarEkspor.id</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/'); ?>img/favicon.png" rel="icon">
  <link href="<?php echo base_url('assets/'); ?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/'); ?>vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/'); ?>vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/'); ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/'); ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/'); ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/'); ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">


</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>belajarEkspor.id</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="<?php echo base_url('assets/'); ?>img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

			<nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php echo site_url('beranda')?>">Beranda</a></li>
          <li><a href="<?php echo site_url('tentang_kami')?>">Tentang Kami</a></li>
          <li><a href="<?php echo site_url('materi')?>">Materi Ekspor</a></li>
          <li><a href="<?php echo site_url('importir/1')?>">Importir</a></li>
          <li class="dropdown"><a href="#"><span>Hai, <?php echo $this->session->userdata("nama"); ?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo site_url('c_login/logout')?>">logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h1 style ="color: white" class="animate__animated animate__fadeInDown">Belajar Ekspor Bersama Coach Fernandes Raymond - BelajarEkspor.id</h1>
          <h3 style="color: #d1d1d1" class="animate__animated animate__fadeInUp">Ayo bergabung bersama dengan eksportir-eksportir lainnya!!!</h3>
          <a href="<?php echo site_url('register')?>" class="btn-get-started animate__animated animate__fadeInUp">Ayo Daftar Sekarang Juga!!!</a>
        </div>
      </div>
    </div>
		
  </section><!-- End Hero -->

  <main id="main">
		<center><h3 class="animate__animated animate__fadeInDown">Apa Yang Akan Anda Dapatkan Dengan Bergabung Dengan BelajarEkspor.id?</h3></center>

    <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink"><br>
							<a href="<?php echo site_url('importir/1') ?>">
								<center><h1><?php echo $buyer ?></h1><br>
              	<h4 class="title">Data Importir / Buyers</h4></center>
							</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan"><br>
              <a href="<?php echo site_url('importir/1') ?>">
								<center><h1><?php echo $video ?></h1><br>
              	<h4 class="title">Video Edukasi</h4></center>
							</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green"><br>
						<a href="<?php echo site_url('importir/1') ?>">
								<center><h1><?php echo $materi ?></h1><br>
              	<h4 class="title">Materi Ekspor</h4></center>
							</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue"><br>
								<center><h4 style="margin-top: -35px" class="title">Bersama Dengan</h4>
								<h1><?php echo $log ?></h1><br>
              	<h4 class="title">Pengunjung Lainnya</h4></center>
            </div>
          </div>
					<center><a href="<?php echo site_url('register')?>" class="button1 animate__animated animate__fadeInUp">Ayo Daftar Sekarang Juga!!!</a><br><br></center>
        </div>

      </div>
    </section>
		<!-- End Services Section -->

  </main><!-- End #main -->

</body>

</html>
