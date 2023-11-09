<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- <title>belajarekspor.id</title> -->
	<?php foreach ($materi as $p) : ?>
	<title><?php echo $p->judul_materi;  ?> - BelajarEkspor.id</title>
	<meta name="description" content="<?php echo substr($p->isi_materi,0,102)?> - Bersama Coach Fernandes Raymond - BelajarEkspor.id" />       
	<?php endforeach?>
  <meta content="" name="keywords">

  
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

  <link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">


</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>belajarEkspor.id</span></a></h1>
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
    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h1>Materi Ekspor</h1>

          <ol>
            <li><a href="<?php echo site_url('beranda') ?>">Beranda</a></li>
            <li><a href="<?php echo site_url('materi') ?>">Materi Ekspor</a></li>
            <li></li>
          </ol>
        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Single Section ======= -->
		
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
					<?php foreach ($terkait2 as $q) : ?>      
						<?php
																													$q->jumlah_materi_terkait_diklik +=1;
																													$this->db->where('id_materi_terkait', $q->id_materi_terkait);
																													$this->db->update('materi_terkait',$q);
						
                                        ?>
                <?php endforeach?>

					<?php foreach ($materi as $p) : ?>
						<?php
							$p->dibaca_materi +=1;
							$this->db->where('id_materi', $p->id_materi);
							$this->db->update('materi',$p);
						?>
						
						<article class="entry entry-single">

              <div class="entry-img">
                <img src="<?php echo base_url('assets/'); ?>img/fotomateri/<?php echo $p->foto_materi; ?>" alt="<?php echo $p->judul_materi; ?> - BelajarEkspor.id" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="<?php echo str_replace([' '],'-',$p->judul_materi)?>"><?php echo $p->judul_materi;  ?></a>
              </h2>

							
              <div class="entry-meta">
                <ul><?php foreach ($penulis->result() as $q) : ?>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="<?php echo base_url('penulis/'. $q->username_penulis); ?>"><?php echo $q->nama_penulis; ?></a></li>
									
							<?php endforeach?>
                </ul>
              </div>
              <div class="entry-content">
                <p>
								<?php echo $p->isi_materi;  ?>
                </p>

              </div>
							<?php $i=0; foreach ($katmateri2->result() as $q) : if (++$i == 2) break; ?>
              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="<?php echo base_url('kategori/'. $q->nama_kategori_materi); ?>"><?php echo $q->nama_kategori_materi; ?></a></li>
                </ul>
								<?php endforeach ?>
                <i class="bi bi-tags"></i>
                <ul class="tags" id="tag" name="tag">
									<?php
									$litag = $p->tags_materi;
									$tag = explode(",", $litag);
									$i = 0;
									for ( $i = 0; $i < count( $tag ); $i++ ) {?>
                  <li><a id="tag" name="tag" class="tag" href="<?php echo base_url('tag_cari?cari='. $tag[$i]); ?>"><?php echo $tag[$i]; ?></a></li>
									<?php } ?>
                </ul>
								<i class="bi bi-eye"></i>
                <ul class="tags">
                  <li><?php echo $p->dibaca_materi ?></li>
                </ul>
              </div>

            </article><!-- End blog entry -->
<?php endforeach ?>
          </div><!-- End blog entries list -->

          <div class="col-lg-4">

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
<h3 class="sidebar-title">Materi Terkait</h3>
							<?php foreach (array_reverse($katmaterii->result()) as $p) : ?>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="<?php echo base_url('assets/'); ?>img/thumbnail/<?php echo $p->thumbnail_materi; ?>" alt="">
                  <h4><a href="<?php echo base_url('detail/'.$p->nama_kategori_materi.'/'. str_replace([' ','!',':',','],'-', $p->judul_materi)); ?>"><?php echo $p->judul_materi; ?></a></h4>
                  <time class="bi bi-eye">  <?php echo $p->dibaca_materi ?></time>
                </div>
              </div><!-- End sidebar recent posts-->
							<?php endforeach?>
              <h3 class="sidebar-title">Materi Terbaru</h3>
							<?php $i=0; foreach (array_reverse($katmat) as $p) : if ($i++==3) break;  ?>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="<?php echo base_url('assets/'); ?>img/thumbnail/<?php echo $p->thumbnail_materi; ?>" alt="">
                  <h4><a href="<?php echo base_url('detail/'.$p->nama_kategori_materi.'/'. str_replace([' ','!',':',','],'-', $p->judul_materi)); ?>"><?php echo $p->judul_materi; ?></a></h4>
                  <time class="bi bi-eye">  <?php echo $p->dibaca_materi ?></time>
									
                </ul>
                </div>
              </div><!-- End sidebar recent posts-->
							<?php endforeach ?>
              <h3 class="sidebar-title">Teks Terkait</h3>
              <div class="sidebar-item categories">
                <ul>
								<?php foreach ($terkait->result() as $q) : ?>
									<li><a href="<?php echo current_url()?>?p=<?php echo $q->id_materi_terkait; ?>"><?php echo $q->nama_materi_terkait; ?> 
									
									<?php endforeach ?>
                  
                </ul>
              </div><!-- End sidebar categories-->
							<h3 class="sidebar-title">Video Terkait</h3>
              <div class="sidebar-item categories">
                <ul>
									<li>
								<?php foreach ($video->result() as $q) : ?>
									<?php 
											$livid = $q->link_video_materi;
											$vid = explode("https://www.youtube.com/watch?v=", $livid)[1];
									?>
                            <div class="embed-video" data-id="<?php echo $vid ?>" data-controls="0" frameborder="0" width="330px" height="200"></div>
														<br>
                            
                 
								 <?php endforeach?>
									</li>
                </ul>
              </div>
            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>
				
      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->
	<script
                src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://www.youtube.com/iframe_api"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery.embedVideo.js?v=1.1"></script>
        <script type="text/javascript">

            function onYouTubeIframeAPIReady() {
                $('.embed-video').embedVideo({
                    enablejsapi: 1,
                    callback: function(iframe) {
                        player = new YT.Player(iframe, {
                            events: {
                                'onReady': function(){
                                    if (!$(iframe).parent().data('autoplay')) {
                                        player.playVideo();
                                    }
                                }
                            }
                        });
                    }
                });
            }
        </script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

