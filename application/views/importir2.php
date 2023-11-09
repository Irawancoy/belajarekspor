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
                                <button class="btn btn-primary" style="background-color: #1e4356"><a href="<?php echo site_url('importir_detail/' . $p->id_buyers) ?>" style="color: white">Lihat Detail Perusahaan</a></button>
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

