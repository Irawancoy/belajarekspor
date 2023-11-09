<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_beranda extends CI_Controller {

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
		$this->load->model('m_beranda');
	}
	
	public function index()
	{
		$ip    = $this->input->ip_address();
		$tanggal  = date("Y-m-d");
		$waktu = date("Y-m-d H:i:s");
		
		$s = $this->m_beranda->cekIp($ip, $tanggal);
		$ss = isset($s)?($s):0;
		
		if($ss == 0){
			$this->m_beranda->tambahData($ip, $tanggal, $waktu);
		}
		
		$data['buyer'] = $this->m_beranda->getBuyers();
		$data['negara'] = $this->m_beranda->getNegara();
		$data['materi'] = $this->m_beranda->getMateri();
		$data['log'] = $this->m_beranda->getLog();

		if($this->session->userdata('status') != "login"){
			
			$this->load->view('beranda', $data);
			$this->load->view('footer');
		}
		else{
				
			$this->load->view('member/beranda', $data);
			$this->load->view('footer');
	
		}	
	}
}
