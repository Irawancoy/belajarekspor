<?php

defined('BASEPATH') or die('No direct script access allowed!');

?>

<div class="page-header">

    <h1>Data Link Youtube</h1>

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

                    <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url('Ytb_C/create') ?>" method="POST" enctype="multipart/form-data">

                        <input type="reset" class="hidden">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h3 class="smaller lighter blue no-margin">Tambah Data</h3>

                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-12">

								<label>Link Youtube</label>
									<input type="text" class="form-control" name="youtube_link" required>
								
									<fieldset class="form-group">
                        <div class="col-md-12">
						
                            <div class="col-md-12">
							<label>  Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="status_link" name="status_link" value="1" >
                                    <label class="form-check-label" for="status_link">
                                        Aktif
                                    </label>
									
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="status_link" name="status_link" value="0" >
                                    <label class="form-check-label" for="status_link">
                                       Tidak Aktif
                                    </label>
                                </div>
                                <small class="text-danger">
                                    <?php echo form_error('status_link') ?>
                                </small>
                            </div>
                        </div>
                    </fieldset>
						
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

<th>Link Youtube</th>
<th>Status</th>
                <th>Action</th>

            </thead>

            <tbody>

			<?php $i = 1; ?>

<?php foreach ($tb_link_youtube as $k) : ?>

	<tr>

		<td><?= $i++; ?></td>

		
		<td><?= $k['youtube_link'] ?></td>
		
		
 		
		
		<td class="text-center text-gray">
							<?php if ($k['status_link'] === '1') : ?>
								Aktif
								<form action="<?= base_url('Ytb_C/updatestatus') ?>" method="post">
									<input type="hidden" name="id_link" value="<?= $k['id_link']; ?>">
									<input type="hidden" name="status_link" value="0">
									<button type="submit" class="btn btn-success btn-sm" style="margin-right: 5px;">Update Status</button>
								</form>
							<?php else : ?>
								Tidak Aktif
								<form action="<?= base_url('Ytb_C/updatestatus') ?>" method="post">
									<input type="hidden" name="id_link" value="<?= $k['id_link']; ?>">
									<input type="hidden" name="status_link" value="1">
									<button type="submit" class="btn btn-success btn-sm" style="margin-right: 5px;">Update Status</button>
								</form>
							<?php endif ?>
						</td>

                        <td>

                            <a href="#editmember" type="button" class="btn btn-primary btn-xs" data-toggle="modal" id="btn-edit-data-member" data-id_link="<?= $k['id_link']; ?>" data-youtube_link="<?= $k['youtube_link'] ?>" ><i class="fa fa-edit"> Edit</i></a>

                            <a href="<?= base_url('Ytb_C/delete/'); ?><?= $k['id_link']; ?>" type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="auto" title="Hapus Surat" onclick="return confirm('Yakin ingin menghapus data');"><i class="far fa-trash-alt"> Hapus</i></a>

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

            <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url('Ytb_C/edit') ?>" method="POST" enctype="multipart/form-data">

                <input type="reset" class="hidden">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h3 class="smaller lighter blue no-margin">Edit Data Youtube</h3>

                </div>

                <input type="hidden" name="id_link" id="edit_id_member">

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                         

							<label>Youtube Link</label>
									<input type="text" class="form-control" name="youtube_link"id="edit_youtube_link" required>
									
	

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

        let id_link = $(this).data('id_link');

        let youtube_link = $(this).data('youtube_link');
	
      



        $('#edit_id_member').val(id_link);

        $('#edit_youtube_link').val(youtube_link);
	

       

    })

</script>
