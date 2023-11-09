<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_belum extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('m_importir');
	}
	
	public function index()
	{
		$data['buyer'] = $this->m_importir->produk();
		$data['page'] = 1;
		if($this->session->userdata('status') != "login"){
			
			$this->load->view('header', $data);
			$this->load->view('importir', $data);
			$this->load->view('footer');
		}
		else{
				
			$this->load->view('header2', $data);
			$this->load->view('importir', $data);
			$this->load->view('footer');
	
		}	
	}

	public function detail($page)
	{
		$data['buyer'] = $this->m_importir->produk();
		$data['page'] = $page;
		$data['jumlah'] = $this->m_importir->countData();

		if($this->session->userdata('status') != "login"){
			
			$this->load->view('header', $data);
			$this->load->view('importir', $data);
			$this->load->view('footer');
		}
		else{
				
			$this->load->view('header2', $data);
			$this->load->view('importir', $data);
			$this->load->view('footer');
	
		}	
	}

	public function detail_data($datas)
	{
		$data['profil'] = $this->m_importir->getData($datas);

		if($this->session->userdata('status') != "login"){
			$this->load->view('header2', $data);
			$this->load->view('importir_detail', $data);
			$this->load->view('footer',$data);
		}
		else{
				
			$this->load->view('header2', $data);
			$this->load->view('importir_detail', $data);
			$this->load->view('footer',$data);
	
		}	
	}

	public function cari_data($hal = null)
	{
		$cari = $this->input->get('search');
		$data['buyer'] = $this->m_importir->cariData($cari);
		$data['jumlah'] = $data['buyer']->num_rows();
		$data['cari'] = $cari;

		if($hal == null){
			$data['page'] = 1;
		} else {
			$data['page'] = $hal;
		}


		if($this->session->userdata('status') != "login"){
			
			$this->load->view('header', $data);
			$this->load->view('importir', $data);
			$this->load->view('footer',$data);
		}
		else{
				
			$this->load->view('header2', $data);
			$this->load->view('importir', $data);
			$this->load->view('footer', $data);
	
		}	
	}
	public function cari_data_page($hal = null)
	{
		$cari = $this->input->get('search');
		$data['buyer'] = $this->m_importir->cariData($cari);
		$data['jumlah'] = $data['buyer']->num_rows();
		$data['cari'] = $cari;
		
		if($hal == null){
			$data['page'] = 1;
		} else {
			$data['page'] = $hal;
		}

		if($this->session->userdata('status') != "login"){
			
			$this->load->view('header', $data);
			$this->load->view('importir', $data);
			$this->load->view('footer',$data);
		}
		else{
				
			$this->load->view('header2', $data);
			$this->load->view('importir', $data);
			$this->load->view('footer', $data);
	
		}	
	}
}
