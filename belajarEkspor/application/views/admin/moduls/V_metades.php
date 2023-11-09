<?php

defined('BASEPATH') or die('No direct script access allowed!');

?>

<div class="page-header">

    <h1>Data Meta Description</h1>

</div>



<div class="row">

    <div class="col-md-12">

        <div style="padding-bottom: 10px;">

            <a href="#tambahbuyers" role="button" class="btn btn-primary" data-toggle="modal">Tambah Data</a>

        </div>

        <!-- Modal Tambah buyers -->

        <div id="tambahbuyers" class="modal fade" tabindex="-1">

            <div class="modal-dialog modal-sm">

                <div class="modal-content">

                    <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url('Metades_C/create') ?>" method="POST" enctype="multipart/form-data">

                        <input type="reset" class="hidden">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h3 class="smaller lighter blue no-margin">Tambah Data</h3>

                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-12">

								<label>Meta description beranda</label>
									<input type="text" class="form-control" name="meta_description_beranda" required>
									<label>Meta description tentang</label>
									<input type="text" class="form-control" name="meta_description_tentang" required>
									<label>Meta description materi</label>
									<input type="text" class="form-control" name="meta_description_materi" required>
									<label>Meta description importir</label>
									<input type="text" class="form-control" name="meta_description_importir" required>
									
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



<th>Meta description beranda</th>

<th>Meta description tentang</th>
<th>Meta description materi</th>
<th>Meta description importir</th>

                <th>Action</th>

            </thead>

            <tbody>

			<?php $i = 1; ?>

<?php foreach ($metades as $k) : ?>

	<tr>

		<td><?= $i++; ?></td>

		
		<td><?= $k['meta_description_beranda'] ?></td>
		<td><?= $k['meta_description_tentang'] ?></td>
		<td><?= $k['meta_description_materi'] ?></td>
		<td><?= $k['meta_description_importir'] ?></td>
		
		
 		

                        <td>

                            <a href="#editmember" type="button" class="btn btn-primary btn-xs" data-toggle="modal" id="btn-edit-data-member" data-id_meta_description="<?= $k['id_meta_description']; ?>" data-meta_description_tentang="<?= $k['meta_description_tentang'] ?>" data-meta_description_materi="<?= $k['meta_description_materi'] ?>"data-meta_description_beranda="<?= $k['meta_description_beranda'] ?>"data-meta_description_importir="<?= $k['meta_description_importir'] ?>"><i class="fa fa-edit"> Edit</i></a>

                            <a href="<?= base_url('Metades_C/delete/'); ?><?= $k['id_meta_description']; ?>" type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="auto" title="Hapus Surat" onclick="return confirm('Yakin ingin menghapus data');"><i class="far fa-trash-alt"> Hapus</i></a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<div id="editmember" class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-sm">

        <div class="modal-content">

            <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url('Metades_C/edit') ?>" method="POST" enctype="multipart/form-data">

                <input type="reset" class="hidden">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h3 class="smaller lighter blue no-margin">Edit Data Member</h3>

                </div>

                <input type="hidden" name="id_meta_description" id="edit_id_meta_description">

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                         

							<label>Meta description beranda</label>
									<input type="text" class="form-control" name="meta_description_beranda"id="edit_username_member" required>
									<label>Meta description tentang</label>
									<input type="text" class="form-control" name="meta_description_tentang"id="edit_password_member" required>
									<label>Meta description materi</label>
									<input type="text" class="form-control" name="meta_description_materi" id="edit_nama_member"required>
									<label>Meta description importir</label>
									<input type="text" class="form-control" name="meta_description_importir" id="edit_email_member"required>
								

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

<script>
	 $('#tableMahasiswa').DataTable();

    $(document).on('click', '#btn-edit-data-member', function() {

        let id_meta_description = $(this).data('id_meta_description');

        let meta_description_beranda = $(this).data('meta_description_beranda');
		let meta_description_tentang = $(this).data('meta_description_tentang');
		let meta_description_materi = $(this).data('meta_description_materi');
		let meta_description_importir = $(this).data('meta_description_importir');
		let no_hp_member = $(this).data('no_hp_member');
		let website_member = $(this).data('website_member');
		// let status_member = $(this).data('status_member');
		// let status_member2 = $(this).data('status_member');

      



        $('#edit_id_meta_description').val(id_meta_description);

        $('#edit_username_member').val(meta_description_beranda);
		$('#edit_password_member').val(meta_description_tentang);
		$('#edit_nama_member').val(meta_description_materi);
		$('#edit_email_member').val(meta_description_importir);
		$('#edit_no_hp_member').val(no_hp_member);
		$('#edit_website_member').val(website_member);
		// $('#edit_status_member').val(status_member);
		// $('#edit_status_member2').val(status_member2);

       

    })

</script>
