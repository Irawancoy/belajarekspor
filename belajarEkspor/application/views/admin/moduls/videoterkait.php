
    <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!--          
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
      </head>
      <body>
          <div class="container">
              <div class="row">
                  <div class="box-header with-border">
                      <div class="text-center">
					  <?php foreach($judul->row() as $jdl): ?>
                          <h2 >Vidio Terkait <?php echo $jdl ?></h2>
                         <?php endforeach; ?>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div id="notif"></div>
                  </div>
                  <div class="col-md-12" style="margin: 10px;">
                      <div class="box box-solid">
                          <form action="<?php echo base_url('videoterkait_c/post/'. $id) ?>" method="post" id="SimpanData">
                              <div class="box-body">
                                <!-- <blockquote>
                                  <p><b>Keterangan!!</b></p>
                                  <small><cite title="Source Title">Inputan Yang Ditanda Bintang Merah (<span style="color: red;">*</span>) Harus Di Isi !!</cite></small>
                                </blockquote> -->

                                <br>
                                  <table class="table table-bordered" id="tableLoop">
                                      <thead>
                                          <tr>
                                              <th class="text-center">No</th>
                                              <th class="text-center">Link Video</th>
                                              <!-- <th>Last Name</th> -->
                                              <th><button class="btn btn-success " id="BarisBaru"><i class="fa fa-plus"></i> </button></th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                      
                                  </table>
                              </div>
                              <div class="box-footer ">
                                  <div class="form-group text-right">
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
                                      <button type="reset" class="btn btn-default">Batal</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>    
          </div>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

          <script>
              $(document).ready(function() {
                 for(B=1; B<=1; B++){
                  Barisbaru();
                 } 
                 $('#BarisBaru').click(function(e) {
                     e.preventDefault();
                     Barisbaru();
                 });

                 $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
              });

              function Barisbaru() {
                  $(document).ready(function() {
                      $("[data-toggle='tooltip']").tooltip(); 
                  });
                  var Nomor = $("#tableLoop tbody tr").length + 1;
                  var Baris = '<tr>';
                          Baris += '<td class="text-center">'+Nomor+'</td>';
                          Baris += '<td>';
						  Baris += '<input type="text" name="link_video_materi[]" class="form-control link_video_materi" placeholder="Link Video Materi" required="">';
                          Baris += '</td>';
                        //   Baris += '<td>';
                        //       Baris += '<input type="text" name="last_name[]" class="form-control last_name" placeholder="Last Name..." required="">';
                        //   Baris += '</td>';
                          Baris += '<td class="text-center">';
                              Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="fa fa-times"></i></a>';
                          Baris += '</td>';
                      Baris += '</tr>';

                  $("#tableLoop tbody").append(Baris);
                  $("#tableLoop tbody tr").each(function () {
                     $(this).find('td:nth-child(2) input').focus(); 
                  });

              }

              $(document).on('click', '#HapusBaris', function(e) {
                 e.preventDefault();
                 var Nomor = 1;
                 $(this).parent().parent().remove();
                 $('tableLoop tbody tr').each(function() {
                     $(this).find('td:nth-child(1)').html(Nomor);
                     Nomor++;
                 });
              });

              $(document).ready(function() {
                 $('#SimpanData').submit(function(e) {
                     e.preventDefault();
                     biodata();
                 });
              });

              function biodata() {
                  $.ajax({
                      url:$("#SimpanData").attr('action'),
                      type:'post',
                      cache:false,
                      dataType:"json",
                      data: $("#SimpanData").serialize(),
                      success:function (data) {
                          if (data.success == true) {
                              $('.link_video_materi').val('');
                              $('.id_materi').val('');
                              $('#notif').fadeIn(800, function() {
                                 $("#notif").html(data.notif).fadeOut(5000).delay(800); 
                              });
                          }
                          else{
                              $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
                          }
                      },

                      error:function (error) {
                          alert(error);
                      }

                  });
              }
          </script>
      </body>
      </html>
  