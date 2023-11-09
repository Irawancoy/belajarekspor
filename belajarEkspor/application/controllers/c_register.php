<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('m_auth');
    }

    public function index()
    {
        $this->load->view('/register.php');
        // $this->load->view('/header.php');
        $this->load->view('/footer.php');
    }

    public function register()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required',array('required' => 'Nama Lengkap wajib diisi'));
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[member.username_member]',array('is_unique' => 'Username Sudah Terdaftar','required' => 'Username wajib diisi'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[member.email_member]',array('is_unique' => 'Email Sudah Terdaftar','required' => 'Email wajib diisi'));
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'trim|required|is_unique[member.no_hp_member]',array('is_unique' => 'Nomor HP Sudah Terdaftar','required' => 'Nomor HP wajib diisi'));
        
		$this->form_validation->set_rules('website', 'Website', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|required',array('required' => 'Password wajib diisi'));
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]',array('required' => 'Konfirmasi Password wajib diisi','matches' => 'Password dan konfirmasi password harus sama'));
        
		if($this->form_validation->run() == FALSE)
        {
            // failed
            $this->index();
        }
        else
        {
            $data = array(
                'nama_member' => $this->input->post('nama_lengkap'),
                'username_member' => $this->input->post('username'),
                'email_member' => $this->input->post('email'),
                'no_hp_member' => $this->input->post('nomor_hp'),
                'website_member' => $this->input->post('website'),
                'password_member' => $this->input->post('password')
            );
            $register_user = new m_auth;
            $checking = $register_user->registerUser($data);
            if($checking)
            {
                $this->session->set_flashdata('status','Sukses register. Silahkan login');
                redirect(base_url('register'));
            }
            else
            {
                $this->session->set_flashdata('status','Something Went Wrong.!');
                redirect(base_url('register'));
            }
        }
    }
}

?>
