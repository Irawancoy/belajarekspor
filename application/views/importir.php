<!DOCTYPE html>
<html lang="en">

<head>
<!-- 	
<title>Materi Belajar Ekspor Bersama Coach Fernandes Raymond - BelajarEkspor.id</title> -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php $desc = "Data Importir / Buyers Dengan Hasil Pencarian Produk '$cari' - Belajar Ekspor Bersama Coach Fernandes Raymond - BelajarEkspor.id"; ?>
  <?php if($cari == null || $jumlah == null){ ?>
    
    <title>List Data Importir / Buyers Belajar Ekspor - BelajarEkspor.id</title>
    <meta name="description" content="">
  <?php }else{ ?>
    
    <title> "<?php echo $cari ?>" Hasil Pencarian Data Importir / Buyers - BelajarEkspor.id</title>
    <meta name="description" content="<?php echo $desc ?>">
  <?php } ?>

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

  <main id="main">

    <!-- ======= Our Services Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Data Importir</h2>
          <ol>
            <li><a href="<?php echo site_url('beranda')?>">Beranda</a></li>
            <li>Importir</li>
          </ol>
        </div>

      </div>
    </section><!-- End Our Services Section -->

    <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">

			<div class="search-bar" data-aos="fade-up">
				<form action="<?php echo site_url('importir_cari')?>" method="get">
					<div class="input-group">
						<input name="search" type="search" class="form-control rounded" placeholder="Masukkan Produk (Bahasa Inggris)" autocomplete="off" />
					</div>
					<input type="submit" name="cari" class="btn btn-outline-primary" value="Cari Importir"></input>
				</form>
			</div><br><br>

        <div class="row">
            <?php if($cari != null && $jumlah != null) { ?>
				<div data-aos="fade-up">
					<h3>Menampilkan Data Importir Untuk Produk "<?php echo $cari ?>"</h3><br><br>
				</div>
			<?php } else if($jumlah == null) { ?>
			    <div data-aos="fade-up">
					<h3>Data Untuk Produk "<?php echo $cari ?>" Tidak Ditemukan</h3><br><br><br><br><br><br><br>
				</div>
			<?php }?>
				<?php $a = 0; $b = $page*15; foreach ($buyer->result() as $p) : ?>
					<?php if($a < $b && $a >= ($page-1)*15){ ?>
						<div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up">
							<div class="icon-box icon-box-pink">
								<!-- <h4 class="title"><a href=""><?php echo $p->produk_buyers; ?></a></h4> -->
								<ul>
									<li><strong>Produk Yang Diimpor :</strong> <?php echo $p->produk_buyers; ?></li>
									<li><strong>Negara :</strong> <?php echo $p->negara_buyers; ?></li><br>
									<li><strong>Nama Perusahaan :</strong><a href="<?php echo site_url('importir_detail/' . $p->id_buyers) ?>"> <?php echo substr($p->nama_perusahaan_buyers,0, 8);?> ... </a></li>
									<li><strong>Alamat Email :</strong><a href="<?php echo site_url('importir_detail/' . $p->id_buyers) ?>"> <?php echo substr($p->email_buyers,0, 8) ?> ... </a></li>
								</ul>
								<div class="read-more float-right" style="margin-top: 10px">
                                <button class="btn btn-primary" onclick="contoh()" style="background-color: #1e4356"><a style="color: white">Lihat Detail Perusahaan</a></button>
								<script type="text/javascript">

function contoh() {

Swal.fire(
  '',
  'Untuk mengakses halaman ini anda harus login',
  'error'
).then(function() {
window.location = "<?php echo site_url('login') ?>";
});

}

</script>

							</div>
							</div>
						</div>
						
	<!-- pagination -->
					<?php 
					};
					$a += 1;
					endforeach;
					$hasil = $this->m_importir->countData();
					$temp = ($this->m_importir->countData())/15;
					$temp = ceil($temp);
					$temps = $jumlah/15;
					$temps = ceil($temps);
					?>
                    
                    <?php if ($jumlah != null){ ?>
					<div class="pages_number" style="text-align: center">
					    <?php if($jumlah < $hasil){ ?>
    					    <?php if($page == 1 ){ ?>
    							<a href="<?php echo site_url($page.'/importir_cari_page?search=' . $cari . '&cari=Cari+Importir')?>"> &emsp; < Sebelumnya </a>
    						<?php } else{ ?>
    							<a href="<?php echo site_url(($page-1).'/importir_cari_page?search=' . $cari . '&cari=Cari+Importir')?>"> &emsp; < Sebelumnya </a>
    						<?php } ?>
    					<?php } else { ?>
    						<?php if($page == 1 ){ ?>
    							<a href="<?php echo site_url('importir/'.$page)?>"> &emsp; < Sebelumnya </a>
    						<?php } else{ ?>
    							<a href="<?php echo site_url('importir/'.($page-1))?>"> &emsp; < Sebelumnya </a>
    						<?php }
						} ?>
						
					    
				        <?php if($page <= 6){
				            for($i = 1; $i <= 11; $i++){?>
								<?php if($jumlah < $hasil){ ?>
									<a href="<?php echo site_url($i.'/importir_cari_page?search=' . $cari . '&cari=Cari+Importir')?>"> &emsp; <?php echo $i;?> </a>
								<?php }else{ ?>
									<a href="<?php echo site_url('importir/'.$i)?>"> &emsp; <?php echo $i;?> </a>
								<?php } 
							} ?>
						<?php } else if($page > 6 && $page < ($temps - 5)){
						    for($i = ($page - 5); $i <= ($page + 5); $i++){?>
								<?php if($jumlah < $hasil){ ?>
									<a href="<?php echo site_url($i.'/importir_cari_page?search=' . $cari . '&cari=Cari+Importir')?>"> &emsp; <?php echo $i;?> </a>
								<?php }else{ ?>
									<a href="<?php echo site_url('importir/'.$i)?>"> &emsp; <?php echo $i;?> </a>
								<?php } 
							} ?>
				        <?php } else {
				            for($i = ($temps - 10); $i <= ($temps); $i++){?>
								<?php if($jumlah < $hasil){ ?>
									<a href="<?php echo site_url($i.'/importir_cari_page?search=' . $cari . '&cari=Cari+Importir')?>"> &emsp; <?php echo $i;?> </a>
								<?php }else{ ?>
									<a href="<?php echo site_url('importir/'.$i)?>"> &emsp; <?php echo $i;?> </a>
								<?php } 
							} ?>
				        <?php }?>
				        
				        
				        <?php if($jumlah < $hasil){
						    if($page == $temps ){ ?>
    							<a href="<?php echo site_url($page.'/importir_cari_page?search=' . $cari . '&cari=Cari+Importir')?>"> &emsp; Selanjutnya > </a>
    						<?php } else { ?>
    							<a href="<?php echo site_url(($page+1).'/importir_cari_page?search=' . $cari . '&cari=Cari+Importir')?>"> &emsp; Selanjutnya > </a>
    						<?php } ?>
    					<?php } else {
    						if($page == $temp){ ?>
    							<a href="<?php echo site_url('importir/'.$page)?>"> &emsp; Selanjutnya > </a>
    						<?php } else{ ?>
    							<a href="<?php echo site_url('importir/'.($page+1))?>"> &emsp; Selanjutnya > </a>
    						<?php }
						} ?>
						
					<?php } ?>
					</div>
					
	<!--END pagination-->
				</div>
      </div>
    </section><!-- End Services Section -->

	</main><!-- End #main -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

</body>

</html>
