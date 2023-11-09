<?php
 

class c_login extends CI_Controller{
		function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	function index(){
		
		// $this->load->view('header');
		$this->load->view('login');
        $this->load->view('footer');
	}
	function aksi_login(){
		$username_member = $this->input->post('username_member');
		$password_member = $this->input->post('password_member');
		$where = array(
		'username_member' => $username_member,
		'password_member' => $password_member,
		'status_member' => 1
	);
	$cek = $this->m_login->cek_login("member",$where)->num_rows();
	if($cek > 0){
		$data_session = array(
		'nama' => $username_member,
		'status' => "login"
		);
		$this->session->set_userdata($data_session);
		redirect(base_url("materi"));
	}else{
		$this->session->set_flashdata('status','Username dan password salah atau akun anda belum aktif !');
		redirect(base_url('login'));
	}

	}
	function logout(){

	$this->session->sess_destroy();

	redirect(base_url('beranda'));

	}

}

