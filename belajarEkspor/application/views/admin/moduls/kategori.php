<?php

defined('BASEPATH') or die('No direct script access allowed!');

?>

<div class="page-header">

    <h1>Kategori</h1>

</div>



<div class="row">

    <div class="col-md-12">

        <div style="padding-bottom: 10px;">

            <a href="#tambahkategori" role="button" class="btn btn-primary" data-toggle="modal">Tambah Kategori</a>

        </div>

        <!-- Modal Tambah Kategori -->

        <div id="tambahkategori" class="modal fade" tabindex="-1">

            <div class="modal-dialog modal-sm">

                <div class="modal-content">

                    <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url('kategori_C/create') ?>" method="POST" enctype="multipart/form-data">

                        <input type="reset" class="hidden">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h3 class="smaller lighter blue no-margin">Tambah Kategori</h3>

                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-12">

                                    <label>Nama Kategori</label>

                                    <input type="text" class="form-control" name="nama_kategori_materi" required>
									

                                </div>
								<fieldset class="form-group">
                        <div class="col-md-12">
						
                            <div class="col-md-12">
							<label>  Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="status_kategori_materi" name="status_kategori_materi" value="1" >
                                        Aktif
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="status_kategori_materi2" name="status_kategori_materi" value="0"> 
                                    <label class="form-check-label" for="status_kategori_materi2">
                                        Tidak Aktif
                                    </label>
                                </div>
                                <small class="text-danger">
                                    <?php echo form_error('status_kategori_materi') ?>
                                </small>
                            </div>
                        </div>
                    </fieldset>

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

                <th>Nama Kategori</th>

              
				<th>Status Kategori</th>

                <th>Action</th>

            </thead>

            <tbody>

                <?php $i = 1; ?>

                <?php foreach ($kategori as $k) : ?>

                    <tr>

                        <td><?= $i++; ?></td>

                        <td><?= $k['nama_kategori_materi'] ?></td>
						
					
			
						<td class="text-center text-gray">
							<?php if ($k['status_kategori_materi'] === '1') : ?>
								Aktif
								<form action="<?= base_url('Kategori_C/updatekategori') ?>" method="post">
									<input type="hidden" name="id_kategori_materi" value="<?= $k['id_kategori_materi']; ?>">
									<input type="hidden" name="status_kategori_materi" value="0">
									<button type="submit" class="btn btn-success btn-sm" style="margin-right: 5px;">Update Status</button>
								</form>
							<?php else : ?>
								Tidak Aktif
								<form action="<?= base_url('Kategori_C/updatekategori') ?>" method="post">
									<input type="hidden" name="id_kategori_materi" value="<?= $k['id_kategori_materi']; ?>">
									<input type="hidden" name="status_kategori_materi" value="1">
									<button type="submit" class="btn btn-success btn-sm" style="margin-right: 5px;">Update Status</button>
								</form>
							<?php endif ?>
						</td>


                        <td>

                            <a href="#editkategori" type="button" class="btn btn-primary btn-xs" data-toggle="modal" id="btn-edit-kategori" data-id_kategori_materi="<?= $k['id_kategori_materi']; ?>"data-nama_kategori_materi="<?= $k['nama_kategori_materi']; ?>"  ><i class="fa fa-edit"> Edit</i></a>

                            <a href="<?= base_url('kategori_C/delete/'); ?><?= $k['id_kategori_materi']; ?>" type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="auto" title="Hapus Surat" onclick="return confirm('Yakin ingin menghapus data');"><i class="far fa-trash-alt"> Hapus</i></a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody> 
			
			



<div id="editkategori" class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-sm">

        <div class="modal-content">

            <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url('kategori_C/edit') ?>" method="POST" enctype="multipart/form-data">

                <input type="reset" class="hidden">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h3 class="smaller lighter blue no-margin">Edit Kategori</h3>

                </div>

                <input type="hidden" name="id_kategori_materi" id="edit_id_kategori_materi">

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                            <label>Nama Kategori</label>

                            <input type="text" class="form-control" name="nama_kategori_materi" id="edit_nama_kategori_materi" required>
						
                        </div>
						


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




<div id="editMem" class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-sm">

        <div class="modal-content">

            <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url('kategori/updatekategori') ?>" method="POST" enctype="multipart/form-data">

                <input type="reset" class="hidden">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h3 class="smaller lighter blue no-margin">Edit Kategori</h3>

                </div>

                <input type="hidden" name="id_kategori_materi" id="edit_id_kategori_materi">

                <div class="modal-body">

                    <div class="row">

                        <!-- <div class="col-md-12">

                            <label>Nama Kategori</label>

                            <input type="text" class="form-control" name="nama_kategori_materi"  required>

                        </div> -->
						<div class="col-md-12">

<label>status</label>

<input type="text" class="form-control" name="status_kategori_materi" required>

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

    $(document).on('click', '#btn-edit-kategori', function() {

        let id_kategori_materi = $(this).data('id_kategori_materi');

        let nama_kategori_materi = $(this).data('nama_kategori_materi');

        // let status_kategori_materi = $(this).data('status_kategori_materi');



        $('#edit_id_kategori_materi').val(id_kategori_materi);

        $('#edit_nama_kategori_materi').val(nama_kategori_materi);

        // $('#edit_status_kategori_materi').val(status_kategori_materi);

    })

</script>
