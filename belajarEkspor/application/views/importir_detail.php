<!DOCTYPE html>
<html lang="en">

<head>
<!-- 	
<title>Materi Belajar Ekspor Bersama Coach Fernandes Raymond - BelajarEkspor.id</title> -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php $desc = "Data Importir / Buyers Dengan Hasil Pencarian Produk '$cari' - Belajar Ekspor Bersama Coach Fernandes Raymond - BelajarEkspor.id"; ?>
  
	<?php $desc = " $profil->nama_perusahaan_buyers - Data Importir / Buyers - Belajar Ekspor Bersama Coach Fernandes Raymond - BelajarEkspor.id"; ?>
   
	 <title><?php echo $profil->nama_perusahaan_buyers ?>. - BelajarEkspor.id</title>
	 <meta name="description" content="<?php echo $desc ?>">

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
 <main id="main">
 <?php 
	 // $dummy = $profil->dilihat + 1;
	 $profil->dilihat += 1 ;
	 $this->db->where('id_buyers', $profil->id_buyers);
	 $this->db->update('data_buyers', $profil);
 ?>
	 <!-- ======= Our Portfolio Section ======= -->
	 <section class="breadcrumbs">
		 <div class="container">

			 <div class="d-flex justify-content-between align-items-center">
				 <h2>Profil Perusahaan</h2>
				 <ol>
					 <li><a href="<?php echo base_url()?>">Beranda</a></li>
					 <li><a href="<?php echo site_url('importir/1')?>">Importir</a></li>
					 <li>Profil Perusahaan</li>
				 </ol>
			 </div>

		 </div>
	 </section><!-- End Our Portfolio Section -->

 <?php 
	 $temp = str_replace(' ', '<br>', $profil->email_buyers);
 ?>

	 <!-- ======= Portfolio Details Section ======= -->
	 <section id="portfolio-details" class="portfolio-details">
		 <div class="container">
			 <h2 style="text-align: center; margin-bottom: 30px"> <?php echo $profil->nama_perusahaan_buyers ?></h2>
			 <div class="row gy-4">

				 <div class="col-lg-6">
					 <div class="portfolio-info">
				 <a><strong>Produk Yang Diimpor</strong> : <?php echo $profil->produk_buyers; ?></a><br>
				 <a><strong>Negara </strong>: <?php echo $profil->negara_buyers?></a>
				 <h3></h3>
						 <ul>
			 <li><strong>Nama Perusahaan</strong> : <?php echo $profil->nama_perusahaan_buyers; ?></li>
							 <li><strong>Alamat Email </strong>: <?php echo $temp?></li>
				 <h3></h3>
				 <li><strong>Data Ini Dilihat</strong> : <?php echo $profil->dilihat ?> Kali</li>
						 </ul>
					 </div>
					 
					 <!-- <div class="portfolio-description">
						 <h2>...</h2>
						 <p>
							 Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
						 </p>
					 </div> -->
				 </div>
					 <?php 
		 echo '<iframe width="auto" height="315" src="https://www.youtube.com/embed/'. $link->youtube_link .'?autoplay=0&mute=1" 
				 rameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
				 allowfullscreen style="max-width: 560px"></iframe>';
					 ?>
			 </div>

		 </div>
	 </section><!-- End Portfolio Details Section -->

 </main><!-- End #main -->
</body>
