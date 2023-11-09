<?php

defined('BASEPATH') or die('No direct script access allowed!');

?>

<div class="page-header">

    <h1>Materi</h1>

</div>

<div class="row">

    <div class="col-md-12">

        <div style="padding-bottom: 10px;">

            <a href="#tambahproduk" role="button" class="btn btn-primary" data-toggle="modal">Tambah Materi</a>

        </div>



        <!-- Modal Tambah Produk -->

        <div id="tambahproduk" class="modal fade" tabindex="-1">

            <div class="modal-dialog modal-lg">

                <div class="modal-content">

                    <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url(uri_string() . '/add_produk') ?>" method="POST" enctype="multipart/form-data">

                        <input type="reset" class="hidden">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h3 class="smaller lighter blue no-margin">Tambah Materi</h3>

                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <div class="alert alert-warning text-center">

                                    <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->

                                    <strong>Peringatan!</strong><br>

                                    Max Dimension : 1024 x 768 (px)<br>

                                    Allowed Image : JPG | PNG

                                </div>
								
                                <div class="col-md-12">

                                    <label>Nama Materi</label>

                                    <input type="text" class="form-control" name="judul_materi" placeholder="judul Materi" required>

                                </div>

                                <div class="col-md-12">

                                    <label>Foto Materi</label>

                                    <input type="file" class="form-control" name="foto_materi" id="input_foto5" required>

                                </div>
								
                                <div class="col-md-12">

                                    <label>Thumbnail</label>

                                    <input type="file" class="form-control" name="thumbnail_materi" id="input_foto5" required>

                                </div>




                            

                                <div class="col-md-12">

                                    <label>Kategori Materi</label>

                                    <br>

                                    <select class="custom-select" name="id_kategori_materi">

                                        <option selected>Kategori</option>

                                        <?php foreach ($kategori as $k) : ?>

                                            <option value="<?= $k['id_kategori_materi']; ?>"><?= $k['nama_kategori_materi'] ?></option>

                                        <?php endforeach; ?>

                                    </select>

                                </div>
								<div class="col-md-12">

<label>Penulis</label>

<br>

<select class="custom-select" name="id_penulis">

	<option selected>Penulis</option>

	<?php foreach ($penulis as $p) : ?>

		<option value="<?= $p['id_penulis']; ?>"><?= $p['nama_penulis'] ?></option>

	<?php endforeach; ?>

</select>

</div> 

								
								<div class="col-md-12">

<label>Tags </label>

<textarea class="form-control" name="tags_materi" id="input_tags" placeholder="Tags"></textarea>

</div>

                                <div class="col-md-12">

                                    <label>Isi Materi</label>

                                    <textarea class="form-control" name="isi_materi" id="input_isi" placeholder="DeskripsiIsi"></textarea>

                                </div>

                              

                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal">Cancel</button>

                            <button type="submit" class="btn btn-success btn-sm pull-right" style="margin-right: 5px;">Submit</button>
							

                        </div>

                    </form>

                </div>

            </div>

        </div>



        <table class="table table-striped table-bordered table-hover" id="tableMahasiswa">

          

			<thead>

<th>No</th>

<th>Foto Materi</th>

<th>Nama Materi</th>
<th>Tags</th>
<th>Thumbnail</th>


<th>Isi Materi</th>
<th>Dibaca</th>
<th>Materi Terkait</th>
<th>Vidio Terkait</th>



<th>Action</th>

</thead>


            <tbody>

                <?php

                if (count($result) > 0) {

                    $start = 1;

                    foreach ($result as $key => $value) { ?>

                        <tr>

                            <td><?= $start++ ?></td>

                            <td class="text-center">

                                <?php if ($value->foto_materi) { ?>

                                    <img src="<?= base_url('assets/img/fotomateri/' . $value->foto_materi) ?>" width="100">

                                <?php } ?>

                            </td>

                            <td><?= $value->judul_materi ?></td>

							<td><?= $value->tags_materi ?></td>
							<td class="text-center">

<?php if ($value->thumbnail_materi) { ?>

	<img src="<?= base_url('assets/img/thumbnail/' . $value->thumbnail_materi) ?>" width="100">

<?php } ?>

</td>
							
                            <td><?= $value->isi_materi ?></td>
						
						<td><?= $value->dibaca_materi ?></td>
						<td class="text-center text-gray">
							
								
								
								
									<a class="btn btn-success btn-sm" style="margin-right: 5px;" href="<?php echo site_url('materiterkait_join/' . $value->id_materi ) ?>">Kelola</a>
						
						</td>
						<td class="text-center text-gray">
							
								
								
								
									<a class="btn btn-success btn-sm" style="margin-right: 5px;"href="<?php echo site_url('videoterkait_join/' . $value->id_materi ) ?>">Kelola</a>
						
						</td>
                        

                            <td>

                                <button type="button" class="btn btn-primary btn-xs" onclick="edit_produk('<?= $value->id_materi ?>')">

                                    <i class="fa fa-edit"> Edit</i>

                                </button> 
								<!-- <a href="#editmateri" type="button" class="btn btn-primary btn-xs" data-toggle="modal" id="btn-edit-data_materi" data-id_buyers="<?= $value->id_materi  ?>"><i class="fa fa-edit"> Edit</i></a> -->


                                <button type="button" class="btn btn-danger btn-xs" onclick="delete_produk('<?= $value->id_materi ?>')">

                                    <i class="fa fa-trash"> Hapus</i>

                                </button>

                            </td>

                        </tr>

                    <?php }

                } else { ?>

                    <tr>

                        <td colspan="5" class="text-center">Tidak ada data yang tersedia</td>

                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>

<div id="modalresult" class="modal fade" tabindex="-1"></div>

<script>
	 $('#tableMahasiswa').DataTable();

    $(document).ready(function() {

        tinyMCE.init({

            mode: "exact",

            elements: "input_isi",

            theme: "advanced",

            plugins: "jbimages,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

            language: "en",

            theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",

            theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",

            theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",

            theme_advanced_buttons4: "jbimg,|,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",

            theme_advanced_toolbar_location: "top",

            theme_advanced_toolbar_align: "left",

            theme_advanced_statusbar_location: "bottom",

            theme_advanced_resizing: true,

            relative_urls: false,

            width: '100%'

        });

    });

    $(document).ready(function() {

        tinyMCE.init({

            mode: "exact",

            elements: "input_isi2",

            theme: "advanced",

            plugins: "jbimages,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

            language: "en",

            theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",

            theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",

            theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",

            theme_advanced_buttons4: "jbimg,|,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",

            theme_advanced_toolbar_location: "top",

            theme_advanced_toolbar_align: "left",

            theme_advanced_statusbar_location: "bottom",

            theme_advanced_resizing: true,

            relative_urls: false,

            width: '100%'

        });

    });



    $('#formAddPengalaman').submit(function(e) {

        e.preventDefault();

        tinyMCE.triggerSave();



        let formData = new FormData(this);

        let elementsForm = $(this).find('button, input, textarea');



        elementsForm.attr('disabled', true);



        $.ajax({

            url: $(this).attr('action'),

            method: $(this).attr('method'),

            dataType: 'json',

            data: formData,

            processData: false,

            contentType: false,

            success: function(response) {

                elementsForm.removeAttr('disabled');



                if (response.RESULT == 'OK') {

                    swal({

                        title: response.MESSAGE,

                        type: 'success'

                    }, function() {

                        $("a[data-dismiss='modal']").click();

                        window.location.reload();

                    });

                } else {

                    swal({

                        title: response.MESSAGE,

                        type: 'error'

                    });

                }

            }

        }).fail(function() {

            elementsForm.removeAttr('disabled');

            swal({

                title: 'Terjadi kesalahan',

                type: 'error'

            });

        });

    });



    $("a[href='#tambahproduk']").click(function() {

        $('input[type="reset"]').click();

    });



    function delete_produk(id) {

        let confirmation = confirm('Apakah anda yakin ingin menghapus data?');



        if (confirmation) {

            $.ajax({

                url: '<?= base_url(uri_string() . '/hapus_produk') ?>',

                method: 'POST',

                dataType: 'json',

                data: {

                    id: id

                },

                success: function(response) {

                    if (response.RESULT == 'OK') {

                        swal({

                            title: response.MESSAGE,

                            type: 'success'

                        }, function() {

                            window.location.reload();

                        });

                    } else {

                        swal({

                            title: response.MESSAGE,

                            type: 'error'

                        });

                    }

                }

            })

        }

    }



    function edit_produk(id) {

        $.ajax({

            url: '<?= base_url(uri_string() . '/modal_edit_produk') ?>',

            method: 'POST',

            dataType: 'json',

            data: {

                id: id

            },

            success: function(response) {

                if (response.RESULT == 'OK') {

                    $('#modalresult').html(response.HTML);

                    $('#modalresult').modal('show');

                } else {

                    swal({

                        title: response.MESSAGE,

                        type: 'error'

                    });

                }

            }

        }).fail(function() {

            swal({

                title: 'Terjadi kesalahan',

                type: 'error'

            });

        });

    }
	
    $(document).on('click', '#btn-edit-data_materi', function() {

let id_materi = $(this).data('id_materi');





$('#edit_id_materi').val(id_materi);


})

</script>
