<!DOCTYPE html>
<html lang="en">

<head>
<!-- 	
<title>Materi Belajar Ekspor Bersama Coach Fernandes Raymond - BelajarEkspor.id</title> -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- <title>belajarekspor.id</title> -->
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

  <!-- =======================================================
  * Template Name: Moderna - v4.9.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>
<head>
	
<title>Login - BelajarEkspor.id</title>
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
          <li class="dropdown"><a href="#"><span>Akun</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo site_url('login')?>">Login</a></li>
              <li><a href="<?php echo site_url('register')?>">Daftar</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  </head>

  <main id="main">

   

<div class="py-5" data-aos="fade-down">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <?php if($this->session->flashdata('status')) : ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('status'); ?>
                    </div>
                <?php endif; ?>

                <div class="card shadow">
                    <div class="card-header">
                        <h5>Buat Akun</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('register') ?>" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>" class="form-control">
                                        <small><?php echo form_error('nama_lengkap'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control">
                                        <small><?php echo form_error('username'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email"  value="<?php echo set_value('email'); ?>"  class="form-control">
                                        <small><?php echo form_error('email'); ?></small>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nomor HP</label>
                                        <input type="nomor_hp" name="nomor_hp"  value="<?php echo set_value('nomor_hp'); ?>"  class="form-control">
                                        <small><?php echo form_error('nomor_hp'); ?></small>
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Website (Opsional)</label>
                                        <input type="website" name="website"  value="<?php echo set_value('website'); ?>"  class="form-control">
                                        <small><?php echo form_error('website'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control">
                                        <small><?php echo form_error('password'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Konfirmasi Password</label>
                                        <input type="password" name="cpassword" class="form-control">
                                        <small><?php echo form_error('cpassword'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary px-5">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
                    
</body>
</html>
