<?php

defined('BASEPATH') or die('No direct script access allowed!');

?>



<div class="modal-dialog modal-lg">

    <div class="modal-content">

        <form class="form-horizontal" role="form" id="formEditPengalaman" action="<?= base_url('Materi_C/edit_produk') ?>" method="POST" enctype="multipart/form-data">

            <input type="reset" class="hidden">

            <input type="hidden" name="id_materi" value="<?= $data->id_materi ?>">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h3 class="smaller lighter blue no-margin">Edit Materi</h3>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="alert alert-warning text-center">

                        <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->

                        <strong>Peringatan!</strong><br>

                        Max Dimension : 800 x 533 (px)<br>

                        Allowed Image : JPG | PNG

                    </div>

					<div class="col-md-12">

<label>Nama Materi</label>

<input type="text" class="form-control" name="judul_materi" placeholder="judul Materi" value="<?= $data->judul_materi ?>"required>

</div>

<div class="col-md-12">

<label>Foto Materi</label><br>
                                <?php if ($data->foto_materi) { ?>

                                    <img src="<?= base_url('assets/img/fotomateri/' . $data->foto_materi) ?>" width="100"style="margin-bottom:10px;">

                                <?php } ?>
<input type="file" class="form-control" name="foto_materi" id="input_foto5" >
</div>

<div class="col-md-12">

<label>Thumbnail</label><br>

<?php if ($data->thumbnail_materi) { ?>

<img src="<?= base_url('assets/img/thumbnail/' . $data->thumbnail_materi) ?>" width="100"style="margin-bottom:10px;" >

<?php } ?>

<input type="file" class="form-control" name="thumbnail_materi" id="input_foto5">

</div>
                    <div class="col-md-12">

                        <label>Kategori</label>

                        <br>

                        <select class="custom-select" name="kategori">

                            <?php foreach ($joindata as $j) : ?>

                                <option value="<?= $j->id_kategori_materi; ?>"><?= $j->nama_kategori_materi; ?></option>

                            <?php endforeach; ?>

                            <?php foreach ($kategori as $k) : ?>

                                <option value="<?= $k['id_kategori_materi'] ?>"><?= $k['nama_kategori_materi'] ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div>
					<div class="col-md-12">

<label>Penulis</label>

<br>

<select class="custom-select" name="kategori">

	<?php foreach ($joindata2 as $j) : ?>

		<option value="<?= $j->id_penulis; ?>"><?= $j->nama_penulis; ?></option>

	<?php endforeach; ?>

	<?php foreach ($penulis as $k) : ?>

		<option value="<?= $k['id_penulis'] ?>"><?= $k['nama_penulis'] ?></option>

	<?php endforeach; ?>

</select>

</div>

<div class="col-md-12">

<label>Tags </label>
									<textarea class="form-control" name="tags_materi" placeholder="Deskripsi Layanan"><?= $data->tags_materi ?></textarea>

</div>

<div class="col-md-12">

<label>Isi Materi</label>

<textarea class="form-control" name="isi_materi" id="edit_input_deskripsi" placeholder="Deskripsi Layanan"><?= $data->isi_materi ?></textarea>

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

<script>

    $(document).ready(function() {

        tinyMCE.init({

            mode: "exact",

            elements: "edit_input_deskripsi",

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

            elements: "edit_input_deskripsi2",

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



    $('#formEditPengalaman').submit(function(e) {

        e.preventDefault();



        let formData = new FormData(this);

        let elementsForm = $(this).find('button, textarea, input');



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

                        $('#modalresult').modal('hide');

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

</script>
