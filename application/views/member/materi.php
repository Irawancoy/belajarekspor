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
	
<title>Materi Belajar Ekspor Bersama Coach Fernandes Raymond - BelajarEkspor.id</title>
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

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h1>Materi Ekspor</h1>

          <ol>
            <li><a href="<?php echo site_url('beranda') ?>">Beranda</a></li>
            <li>Materi Ekspor</li>
          </ol>
        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries" data-aos="fade-right">
					<?php foreach ($articles as $p) : ?>
            <article class="entry">

              <div class="entry-img2" style="margin-right: 10px;">
                <img src="<?php echo base_url('assets/'); ?>img/thumbnail/<?php echo $p->thumbnail_materi; ?> " alt="" class="img-fluid">
              
							</div>

              <h2 class="entry-title2">
                <a href="<?php echo base_url('detail/'.$p->nama_kategori_materi.'/'. str_replace([' ','!',':',','],'-', $p->judul_materi)); ?>"><?php echo $p->judul_materi; ?></a>
              </h2>

              <div class="entry-footer">
              <div class="entry-content">
                <p>
								<?php echo substr($p->isi_materi,0,250).'...' ?>
								</p>
                <div class="read-more">
                  <a href="<?php echo base_url('detail/'.$p->nama_kategori_materi.'/'. str_replace([' ','!',':',','],'-', $p->judul_materi)); ?>">Baca Selengkapnya</a>
                </div>
              </div>

            </article><!-- End blog entry -->
						<?php endforeach;?>
            
            
                <?=  $this->pagination->create_links(); ?>
             

          </div><!-- End blog entries list -->

          <div class="col-lg-4"  data-aos="fade-up">

            <div class="sidebar">

						<h3 class="sidebar-title">Cari Materi</h3>
              <div class="sidebar-item search-form">
                <form action="<?php echo base_url('materi_cari')?>">
								<input type="text" class="form-control" id="cari" name="cari" placeholder="">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Kategori Materi</h3>
              <div class="sidebar-item categories">
                <ul>
								<?php foreach ($kategori->result() as $p) : ?>
                  <li><a href="<?php echo base_url('kategori/'. $p->nama_kategori_materi); ?>"><?php echo $p->nama_kategori_materi; ?> 
									
									<?php endforeach ?>
                  
                </ul>
              </div><!-- End sidebar categories-->
							
              <h3 class="sidebar-title">Materi Terbaru</h3>
							<?php $i=0; foreach (array_reverse($katmat) as $p) : if ($i++==3) break;  ?>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="<?php echo base_url('assets/'); ?>img/thumbnail/<?php echo $p->thumbnail_materi; ?>" alt="">
                  <h4><a href="<?php echo base_url('detail/'.$p->nama_kategori_materi.'/'. str_replace([' ','!',':',','],'-', $p->judul_materi)); ?>"><?php echo $p->judul_materi; ?></a></h4>
                  <time class="bi bi-eye">  <?php echo $p->dibaca_materi ?></time>
                </div>
              </div><!-- End sidebar recent posts-->
							<?php endforeach ?>
              
            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

</body>

</html>
