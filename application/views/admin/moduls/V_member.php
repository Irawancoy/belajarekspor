<?php

defined('BASEPATH') or die('No direct script access allowed!');

?>

<div class="page-header">

    <h1>Data Member</h1>

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

                    <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url('Member_C/create') ?>" method="POST" enctype="multipart/form-data">

                        <input type="reset" class="hidden">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h3 class="smaller lighter blue no-margin">Tambah Data</h3>

                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-12">

								<label>Username</label>
									<input type="text" class="form-control" name="username_member" required>
									<label>Password</label>
									<input type="text" class="form-control" name="password_member" required>
									<label>Nama</label>
									<input type="text" class="form-control" name="nama_member" required>
									<label>Email</label>
									<input type="text" class="form-control" name="email_member" required>
									<label>NO HP</label>
									<input type="text" class="form-control" name="no_hp_member" required>
									<label>Website</label>
									<input type="text" class="form-control" name="website_member" required>
									<fieldset class="form-group">
                        <div class="col-md-12">
						
                            <div class="col-md-12">
							<label>  Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="status_member" name="status_member" value="1" >
                                    <label class="form-check-label" for="status_member">
                                        Member
                                    </label>
									
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="status_member" name="status_member" value="0" required>
                                    <label class="form-check-label" for="status_member">
                                        Bukan Member
                                    </label>
                                </div>
                                <small class="text-danger">
                                    <?php echo form_error('status_member') ?>
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



        <table class="table table-striped table-bordered table-hover" id="tableMahasiswa" >

            <thead>

			<th>No</th>

<th>Id</th>

<th>Username</th>

<th>Password</th>
<th>Nama</th>
<th>Email</th>
<th>No HP</th>
<th>Website</th>
<th>Status</th>
                <th>Action</th>

            </thead>

            <tbody>

			<?php $i = 1; ?>

<?php foreach ($member as $k) : ?>

	<tr>

		<td><?= $i++; ?></td>

		<td><?= $k['id_member'] ?></td>
		<td><?= $k['username_member'] ?></td>
		<td><?= $k['password_member'] ?></td>
		<td><?= $k['nama_member'] ?></td>
		<td><?= $k['email_member'] ?></td>
		<td><?= $k['no_hp_member'] ?></td>
		<td><?= $k['website_member'] ?></td>
		
 		
		
		<td class="text-center text-gray">
							<?php if ($k['status_member'] === '1') : ?>
								Aktif
								<form action="<?= base_url('Member_C/updatemember') ?>" method="post">
									<input type="hidden" name="id_member" value="<?= $k['id_member']; ?>">
									<input type="hidden" name="status_member" value="0">
									<button type="submit" class="btn btn-success btn-sm" style="margin-right: 5px;">Update Status</button>
								</form>
							<?php else : ?>
								Tidak Aktif
								<form action="<?= base_url('Member_C/updatemember') ?>" method="post">
									<input type="hidden" name="id_member" value="<?= $k['id_member']; ?>">
									<input type="hidden" name="status_member" value="1">
									<button type="submit" class="btn btn-success btn-sm" style="margin-right: 5px;">Update Status</button>
								</form>
							<?php endif ?>
						</td>

                        <td>

                            <a href="#editmember" type="button" class="btn btn-primary btn-xs" data-toggle="modal" id="btn-edit-data-member" data-id_member="<?= $k['id_member']; ?>" data-password_member="<?= $k['password_member'] ?>" data-nama_member="<?= $k['nama_member'] ?>"data-username_member="<?= $k['username_member'] ?>"data-email_member="<?= $k['email_member'] ?>"data-no_hp_member="<?= $k['no_hp_member'] ?>"data-website_member="<?= $k['website_member'] ?>"data-status_member="<?= $k['status_member'] ?>"><i class="fa fa-edit"> Edit</i></a>

                            <a href="<?= base_url('Member_C/delete/'); ?><?= $k['id_member']; ?>" type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="auto" title="Hapus Surat" onclick="return confirm('Yakin ingin menghapus data');"><i class="far fa-trash-alt"> Hapus</i></a>

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

            <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url('Member_C/edit') ?>" method="POST" enctype="multipart/form-data">

                <input type="reset" class="hidden">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h3 class="smaller lighter blue no-margin">Edit Data Member</h3>

                </div>

                <input type="hidden" name="id_member" id="edit_id_member">

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                         

							<label>Username</label>
									<input type="text" class="form-control" name="username_member"id="edit_username_member" required>
									<label>Password</label>
									<input type="text" class="form-control" name="password_member"id="edit_password_member" required>
									<label>Nama</label>
									<input type="text" class="form-control" name="nama_member" id="edit_nama_member"required>
									<label>Email</label>
									<input type="text" class="form-control" name="email_member" id="edit_email_member"required>
									<label>NO HP</label>
									<input type="text" class="form-control" name="no_hp_member" id="edit_no_hp_member"required>
									<label>Website</label>
									<input type="text" class="form-control" name="website_member" id="edit_website_member"required>
	

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

        let id_member = $(this).data('id_member');

        let username_member = $(this).data('username_member');
		let password_member = $(this).data('password_member');
		let nama_member = $(this).data('nama_member');
		let email_member = $(this).data('email_member');
		let no_hp_member = $(this).data('no_hp_member');
		let website_member = $(this).data('website_member');
		// let status_member = $(this).data('status_member');
		// let status_member2 = $(this).data('status_member');

      



        $('#edit_id_member').val(id_member);

        $('#edit_username_member').val(username_member);
		$('#edit_password_member').val(password_member);
		$('#edit_nama_member').val(nama_member);
		$('#edit_email_member').val(email_member);
		$('#edit_no_hp_member').val(no_hp_member);
		$('#edit_website_member').val(website_member);
		// $('#edit_status_member').val(status_member);
		// $('#edit_status_member2').val(status_member2);

       

    })

</script>
