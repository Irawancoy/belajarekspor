<?php

defined('BASEPATH') or die('No direct script access allowed!');

?>

<div class="page-header">

    <h1>Data Buyers</h1>

</div>



<div class="row">

    <div class="col-md-12">

        <div style="padding-bottom: 10px;">

            <a href="#tambahkategori" role="button" class="btn btn-primary" data-toggle="modal">Tambah Data</a>

        </div>

        <!-- Modal Tambah Kategori -->

        <div id="tambahkategori" class="modal fade" tabindex="-1">

            <div class="modal-dialog modal-sm">

                <div class="modal-content">

                    <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url('Data_buyers_C/create') ?>" method="POST" enctype="multipart/form-data">

                        <input type="reset" class="hidden">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h3 class="smaller lighter blue no-margin">Tambah Data</h3>

                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-12">

                                    <label>Negara</label>

                                    <input type="text" class="form-control" name="negara_buyers" required>
									<label>Nama perusahaan</label>
									<input type="text" class="form-control" name="nama_perusahaan_buyers" required>
									<label>Email</label>
									<input type="text" class="form-control" name="email_buyers" required>
									<label>Produk</label>
									<input type="text" class="form-control" name="produk_buyers" required>

                                </div>

                            </div>

                            <!-- <div class="row">

                                <div class="col-md-12">

                                    <label>Nama Kategori (english)</label>

                                    <input type="text" class="form-control" name="nama_kategori_en" required>

                                </div>

                            </div> -->

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

                <th>Negara</th>
				
                <th>Nama Perusahaan</th>

                <!-- <th>Nama Kategori (english)</th>  id="datatablesPengalaman" -->
				<th>Email</th>
				<th>Produk</th>
				<th>Dilihat</th>

                <th>Action</th>

            </thead>

            <tbody>

                <?php $i = 1; ?>

                <?php foreach ($data_buyers as $k) : ?>

                    <tr>

                        <td><?= $i++; ?></td>

                        <td><?= $k['negara_buyers'] ?></td>
						<td><?= $k['nama_perusahaan_buyers'] ?></td>
						<td><?= $k['email_buyers'] ?></td>
						<td><?= $k['produk_buyers'] ?></td>
						<td><?= $k['dilihat'] ?></td>

						
					


                        <td>

                            <a href="#editkategori" type="button" class="btn btn-primary btn-xs" data-toggle="modal" id="btn-edit-data_buyers" data-id_buyers="<?= $k['id_buyers']; ?>"data-negara_buyers="<?= $k['negara_buyers'] ?>" data-nama_perusahaan_buyers="<?= $k['nama_perusahaan_buyers'] ?>" data-email_buyers="<?= $k['email_buyers'] ?>"data-produk_buyers="<?= $k['produk_buyers'] ?>"><i class="fa fa-edit"> Edit</i></a>

                            <a href="<?= base_url('Data_buyers_C/delete/'); ?><?= $k['id_buyers']; ?>" type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="auto" title="Hapus Surat" onclick="return confirm('Yakin ingin menghapus data');"><i class="far fa-trash-alt"> Hapus</i></a>
							<!-- <a href="javascript:void(0);" data="<?= $k['id_buyers']; ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i> </a> -->
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<div id="editkategori" class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-sm">

        <div class="modal-content">

            <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url('Data_buyers_C/edit') ?>" method="POST" enctype="multipart/form-data">

                <input type="reset" class="hidden">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h3 class="smaller lighter blue no-margin">Edit Data Buyers</h3>

                </div>

                <input type="hidden" name="id_buyers" id="edit_id_buyers">

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                           
							<label>Negara</label>

<input type="text" class="form-control" name="negara_buyers" id="edit_negara_buyers"required>
<label>Nama perusahaan</label>
<input type="text" class="form-control" name="nama_perusahaan_buyers"id="edit_nama_perusahaan_buyers" required>
<label>Email</label>
<input type="text" class="form-control" name="email_buyers" id="edit_email_buyers" required>
<label>Produk</label>
<input type="text" class="form-control" name="produk_buyers" id="edit_produk_buyers"required>

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

    $(document).on('click', '#btn-edit-data_buyers', function() {

        let id_buyers = $(this).data('id_buyers');

        let negara_buyers = $(this).data('negara_buyers');
		let nama_perusahaan_buyers = $(this).data('nama_perusahaan_buyers');
		let email_buyers = $(this).data('email_buyers');
		let produk_buyers = $(this).data('produk_buyers');

       


        $('#edit_id_buyers').val(id_buyers);

        $('#edit_negara_buyers').val(negara_buyers);
		$('#edit_nama_perusahaan_buyers').val(nama_perusahaan_buyers);
		$('#edit_email_buyers').val(email_buyers);
		$('#edit_produk_buyers').val(produk_buyers);

       
    })

</script>
