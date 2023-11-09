<?php
class Data_buyers_C extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->auth->restrict();
		$this->load->library('session');
		$this->load->model('Data_buyers_model');
	}
	public function index()
	{
		$data = [
			'view_file' => "admin/moduls/V_Data_buyers",
			'data_buyers' => $this->Data_buyers_model->getAllKategori()
		];
		return $this->load->view('admin/admin_view', $data);
	}
	public function create()
	{
		$data = [
			"negara_buyers" => $this->input->post('negara_buyers', true),
			"nama_perusahaan_buyers" => $this->input->post('nama_perusahaan_buyers', true),
			"email_buyers" => $this->input->post('email_buyers', true),
			"produk_buyers" => $this->input->post('produk_buyers', true),
		];
		$this->db->insert('Data_buyers', $data);
		redirect('Data_buyers_C');
	}
	public function delete($id)
	{
		$data = $this->Data_buyers_model->getKategoriById($id);
		$this->Data_buyers_model->delete($data['id_buyers']);
		redirect('Data_buyers_C');
	}
	public function edit()
	{
		$data = [
			"negara_buyers" => $this->input->post('negara_buyers', true),
			"nama_perusahaan_buyers" => $this->input->post('nama_perusahaan_buyers', true),
			"email_buyers" => $this->input->post('email_buyers', true),
			"produk_buyers" => $this->input->post('produk_buyers', true),
		];
		$this->db->where('id_buyers', $this->input->post('id_buyers'));
		$this->db->update('Data_buyers', $data);
		redirect('Data_buyers_C');
	}
}
