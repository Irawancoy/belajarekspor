<?php

class Materi_C extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->restrict();
		$this->load->library('session');
		$this->load->model('M_layanan', 'layanan');
		$this->load->model('Kategori_m');
		$this->load->model('Penulis_model');
	}
	public function index()
	{
		$data = [
			'view_file' => 'admin/moduls/V_layanan',
			'result' => $this->layanan->layanan()->result(),
			'tags_materi' => $this->Kategori_m->getAllKategori(),
			'penulis' => $this->Penulis_model->getAllKategori(),
			'kategori' => $this->Kategori_m->getAllKategori(),
		];

		return $this->load->view('admin/admin_view', $data);
	}

	private function uploader($upload, $index = [])
	{
		$data = [];

		foreach ($index as $key => $value) {
			if (isset($_FILES[$value]['size']) > 0) {
				if ($upload->upload($value)) {
					$file_name = $upload->get_file_name();
					$data[$key] = $file_name;
				} else {
					return false;
				}
			} else {
				$data[$key] = null;
			}
		}

		return $data;
	}

	public function remover($upload, $index, $location)
	{
		foreach ($index as $key => $value) {
			if (!$upload->remove($value, $location)) {
				return false;
			}
		}
		return true;
	}
	public function remover2($upload2, $index, $location)
	{
		foreach ($index as $key => $value) {
			if (!$upload2->remove($value, $location)) {
				return false;
			}
		}
		return true;
	}

	public function add_produk()
	{
		$judul_materi = $this->input->post('judul_materi');
		$isi_materi = $this->input->post('isi_materi');
		$id_kategori_materi = $this->input->post('id_kategori_materi');
		$id_penulis = $this->input->post('id_penulis');
		$tags_materi = $this->input->post('tags_materi');
		$upload = new FileUploadLibrary();
		$upload->setConfig([
			'upload_path' => realpath('assets/img/fotomateri'),
			'allowed_types' => 'jpg|png|jpeg',
			'file_name' => $judul_materi . '-fotomateri',
			'max_size' => 2048,
		]);
		$upload->initialize();
		$dataUpload = $this->uploader(
			$upload,
			[
				'foto_materi' => 'foto_materi',
			],
		);
		$upload2 = new FileUploadLibrary();
		$upload2->setConfig([
			'upload_path' => './assets/img/thumbnail',
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' => 2048, //2 MB
			'file_name' => $judul_materi . '-thumbnailmateri',
		]);
		$upload2->initialize();
		$dataUpload2 = $this->uploader(
			$upload2,
			[
				'thumbnail_materi' => 'thumbnail_materi',
			],
		);
		$dataInsert['judul_materi'] = $judul_materi;
		$dataInsert['isi_materi'] = $isi_materi;
		$dataInsert['id_kategori_materi'] = $id_kategori_materi;
		$dataInsert['id_penulis'] = $id_penulis;
		$dataInsert['tags_materi'] = $tags_materi;
		foreach ($dataUpload as $key => $value) {
			$dataInsert[$key] = $value;
		}
		foreach ($dataUpload2 as $key => $value) {
			$dataInsert[$key] = $value;
		}
		$uploadre = new FileUploadLibrary();
		$uploadre->setConfig2([
			'image_librabry' => 'gd2',
			'source_image' => $this->upload->upload_path . $this->upload->file_name,
			'new_image' => './assets/img/a/',
			'maintain_ratio' => true,
			'width' => 40,
			'height' => 40,
		]);
		$uploadre->initialize();
		$dataUploadre = $this->uploader(
			$uploadre,
			[
				'foto_materi' => 'foto_materi',
			],
		);
		foreach ($dataUploadre as $key => $value) {
			$dataInsert[$key] = $value;
		}
		if ($this->layanan->insert($dataInsert)) {
			echo json_encode([
				'RESULT' => 'OK',
				'MESSAGE' => 'Data berhasil ditambahkan',
			]);
			exit();
		} else {
			echo json_encode([
				'RESULT' => 'FAILED',
				'MESSAGE' => 'Gagal menambahkan data',
			]);

			exit();
		}
	}
	public function hapus_produk()
	{
		$id = getPost('id', null);
		if ($id == null) {
			return JSONResponseDefault('FAILED', 'ID tidak ditemukan');
		}
		$getData = $this->layanan->layanan($id);
		if ($getData->num_rows() == 0) {
			return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
		}
		$upload = new FileUploadLibrary();
		$row = $getData->row();
		$row2 = $getData->row();
		$remove = $this->remover(
			$upload,
			[$row->foto_materi],
			'assets/img/fotomateri',
		);
		$remove2 = $this->remover(
			$upload,
			[$row2->thumbnail_materi],
			'assets/img/thumbnail',
		);
		if (!$remove) {
			return JSONResponseDefault('FAILED', 'Gagal menghapus beberapa gambar');
		}
		if ($this->layanan->delete($id)) {
			return JSONResponseDefault('OK', 'Data berhasil dihapus');
		} else {
			return JSONResponseDefault('FAILED', 'Gagal menghapus data');
		}
	}
	public function modal_edit_produk()
	{
		$id = getPost('id');
		if ($id == null) {
			return JSONResponseDefault('FAILED', 'ID tidak ditemukan');
		}
		$getData = $this->layanan->layanan($id);
		if ($getData->num_rows() == 0) {
			return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
		}
		$data = [
			'data' => $getData->row(),
			'penulis' => $this->Penulis_model->getAllKategori(),
			'kategori' => $this->Kategori_m->getAllKategori(),
			'joindata' => $this->Kategori_m->joinKategori($id),
			'joindata2' => $this->Penulis_model->joinPenulis($id),
			'tags_materi' => $this->Kategori_m->getAllKategori(),
		];
		return JSONResponse([
			'RESULT' => 'OK',
			'HTML' => $this->load->view('admin/moduls/layanan/edit', $data, true),
		]);
	}
	private function edit_img_remover($upload, $row, $index = [])
	{
		$data = [];
		$deletedData = [];
		foreach ($index as $key => $value) {
			if ($_FILES[$value]['size'] > 0) {
				$data[$key] = $value;
				$deletedData[] = $row->$key;
			}
		}
		$this->remover($upload, $deletedData, 'assets/img/foto_materi');
		return $this->uploader($upload, $data);
	}
	private function edit_img_remover2($upload2, $row, $index = [])
	{
		$data = [];
		$deletedData = [];
		foreach ($index as $key => $value) {
			if ($_FILES[$value]['size'] > 0) {
				$data[$key] = $value;
				$deletedData[] = $row->$key;
			}
		}
		$this->remover($upload2, $deletedData, 'assets/img/thumbnail_materi');
		return $this->uploader($upload2, $data);
	}
	public function edit_produk()
	{
		$id = getPost('id_materi');
		if ($id == null) {
			return JSONResponseDefault('FAILED', 'ID tidak ditemukan');
		}
		$getData = $this->layanan->layanan($id);
		if ($getData->num_rows() == 0) {
			return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
		}
		$judul_materi = getPost('judul_materi');
		$isi_materi = getPost('isi_materi');
		$id_kategori_materi = getPost('id_kategori_materi');
		$id_penulis = getPost('id_penulis');
		$tags_materi = getPost('tags_materi');
		$updateData['judul_materi'] = $judul_materi;
		$updateData['isi_materi'] = $isi_materi;
		$updateData['id_kategori_materi'] = $id_kategori_materi;
		$updateData['id_penulis'] = $id_penulis;
		$updateData['tags_materi'] = $tags_materi;
		$upload = new FileUploadLibrary();
		$upload->setConfig([
			'upload_path' => realpath('assets/img/fotomateri'),
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' => 2048, //2 MB
			'encrypt_name' => true,
		]);
		$upload->initialize();
		$dataUpload = $this->edit_img_remover(
			$upload,
			$getData->row(),
			[
				'foto_materi' => 'foto_materi',
			],
		);
		$upload2 = new FileUploadLibrary();
		$upload2->setConfig([
			'upload_path' => realpath('assets/img/thumbnail'),
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' => 2048, //2 MB
			'encrypt_name' => true,
		]);
		$upload2->initialize();
		$dataUpload2 = $this->edit_img_remover2(
			$upload2,
			$getData->row(),
			[
				'thumbnail_materi' => 'thumbnail_materi',
			],
		);
		foreach ($dataUpload as $key => $value) {
			$updateData[$key] = $value;
		}
		foreach ($dataUpload2 as $key => $value) {
			$updateData[$key] = $value;
		}
		if ($this->layanan->update($id, $updateData)) {
			return JSONResponseDefault('OK', 'Data berhasil diubah');
		} else {
			return JSONResponseDefault('FAILED', 'Gagal mengubah data');
		}
	}
}
