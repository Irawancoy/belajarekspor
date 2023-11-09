<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_materi extends CI_Controller {

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
		$this->load->model('m_materi');
	}
	public function index()
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('/materi');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->m_materi->get_count();
		$config['per_page'] = 2;
		$config['full_tag_open'] = '<div class="pagination">';
  		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = html_escape($this->input->get('per_page'));

		$data['articles'] = $this->m_materi->get_materi($limit, $offset);
		//$id = $this->m_materi->idpen();*******
		$data['materi'] = $this->m_materi->materi();
		//$data['materi2'] = $this->m_materi->namakategori2();
		$data['materii'] = $this->m_materi->materi2();
		$data['getAllPosting'] = $this->m_materi->getAllPosting();
		$data['kategori'] = $this->m_materi->kategori();
		$data['katmat'] = $this->m_materi->joinmatkat()->result();
		$data['head_title'] = ('Materi Belajar Ekspor Bersama Coach Fernandes Raymond - BelajarEkspor.id');
		//$data['penulis'] = $this->m_materi->bypenulis($id);*****
		// if($this->session->userdata('status') != "login"){
		// 	 
		// 	$this->load->view('materi', $data);
		// 	$this->load->view('footer');
		// }
		// else{
		// 	 
		// 	$this->load->view('materi', $data);
		// 	$this->load->view('footer');	
		if(count($data['articles']) > 0  )
		if($this->session->userdata('status') != "login")
		{
			// $this->load->view('header',$data);
			$this->load->view('materi', $data);
			$this->load->view('footer');
		}else
		{
			//  
			$this->load->view('member/materi', $data);
			$this->load->view('footer');
		}
		
		else {
			$this->load->view('materi');
		}
		// }
	}
	
	public function detail($id, $idk)
	{
		$cara = $this->input->get('p');
		$data['cara'] = $cara;
		$data['cari'] = $this->m_materi->akses();
		$id = $this->uri->segment(3);
		$idk = $this->uri->segment(2);
		$data['materi'] = $this->m_materi->get_by_id(str_replace('-',' ',$id));
		$data['materii'] = $this->m_materi->materi2();
		$data['materi2'] = $this->m_materi->materi();
		$data['katmateri2'] = $this->m_materi->namakategori($idk);
		$data['katmaterii'] = $this->m_materi->bykategori($idk);
		$data['katmateri'] = $this->m_materi->bykategori($idk);
		$data['penulis'] = $this->m_materi->namapenulis(str_replace('-',' ',$id));
		$data['kategori'] = $this->m_materi->kategori();
		$data['katmat'] = $this->m_materi->joinmatkat()->result();
		$data['akses'] = $this->m_materi->klik();
		$data['terkait'] = $this->m_materi->terkait(str_replace('-',' ',$id));
		$data['video'] = $this->m_materi->video(str_replace('-',' ',$id));
		$data['terkait2'] = $this->m_materi->get_by_ter();
		// head_data
		if($this->session->userdata('status') != "login"){
			$this->load->view('detailmateri', $data);
			$this->load->view('footer');
			
		}
		else{
			$this->load->view('member/detailmateri', $data);
			$this->load->view('footer');	
	
		}
		
	}

	public function kategori($id){
		$this->load->library('pagination');
		$idk = $this->uri->segment(2);
		$id = str_replace('-',' ',$idk);
		$config['base_url'] = site_url('kategori/'.$id);
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->m_materi->jumkat($id);
		$config['per_page'] = 3;
		$config['full_tag_open'] = '<div class="pagination">';
  		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = html_escape($this->input->get('per_page'));

		$data['katmateri'] = $this->m_materi->get_kat($limit, $offset, $id);
		
		// $data['katmateri'] = $this->m_materi->bykategori($id);
		$data['katmateri2'] = $this->m_materi->namakategori($id);
		
		$data['katmat'] = $this->m_materi->joinmatkat()->result();
		$data['kategori'] = $this->m_materi->kategori();
		
		$data['materii'] = $this->m_materi->materi2();
		if(count($data['katmateri']->result()) > 0  )
		if($this->session->userdata('status') != "login"){
			//  
			$this->load->view('detailkategori', $data);
			$this->load->view('footer');
		}
		else{
			//  
			$this->load->view('member/detailkategori', $data);
			$this->load->view('footer');	
	
		}
		else {
			$this->load->view('detailkategori');
		}
	}

	public function penulis($id){
		$this->load->library('pagination');
		$id = $this->uri->segment(2);
		$config['base_url'] = site_url('penulis/'.$id);
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->m_materi->jumpen($id);
		$config['per_page'] = 3;
		$config['full_tag_open'] = '<div class="pagination">';
  		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = html_escape($this->input->get('per_page'));

		$data['katmateri'] = $this->m_materi->bykategori($id);
		$data['katmateri2'] = $this->m_materi->namapenulis($id);
		$data['katmateri3'] = $this->m_materi->bypenulis($id, $limit, $offset);
		$data['kategori'] = $this->m_materi->kategori();
		$data['katmat'] = $this->m_materi->joinmatkat()->result();
		$data['materii'] = $this->m_materi->materi();
		if($this->session->userdata('status') != "login"){
			 
			$this->load->view('detailpenulis', $data);
			$this->load->view('footer');
		}
		else{
			 
			$this->load->view('member/detailpenulis', $data);
			$this->load->view('footer');	
	
		}
	}
	public function hasil()
	{
		$cara = $this->input->get('cari');
		$this->load->library('pagination');
		$config['base_url'] = site_url('materi_cari?cari='.$cara);
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = count($this->m_materi->cari());
		$config['per_page'] = 3;
		$config['full_tag_open'] = '<div class="pagination">';
  		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = html_escape($this->input->get('per_page'));

		
		$data['materi'] = $this->m_materi->materi();
		//$data['materi2'] = $this->m_materi->namakategori2();
		$data['materii'] = $this->m_materi->materi2();
		$data['getAllPosting'] = $this->m_materi->getAllPosting();
		$data['kategori'] = $this->m_materi->kategori();
		$data['katmat'] = $this->m_materi->joinmatkat()->result();
		$data['cari'] = $this->m_materi->cari2($limit, $offset);
		$data['cara'] = $cara;
		 
		if($this->session->userdata('status') != "login")
		{
			// $this->load->view('header',$data);
			$this->load->view('search', $data);
			$this->load->view('footer');
		}else
		{
			//  
			$this->load->view('member/search', $data);
			$this->load->view('footer');
		}
	}

	public function tag()
	{
		$cara = $this->input->get('cari');
		$this->load->library('pagination');
		$config['base_url'] = site_url('tag_cari?cari='.$cara);
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = count($this->m_materi->tag());
		$config['per_page'] = 3;
		$config['full_tag_open'] = '<div class="pagination">';
  		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = html_escape($this->input->get('per_page'));

		$cara = $this->input->get('cari');
		$data['materi'] = $this->m_materi->materi();
		//$data['materi2'] = $this->m_materi->namakategori2();
		$data['materii'] = $this->m_materi->materi2();
		$data['getAllPosting'] = $this->m_materi->getAllPosting();
		$data['kategori'] = $this->m_materi->kategori();
		$data['katmat'] = $this->m_materi->joinmatkat()->result();
		$data['cari'] = $this->m_materi->tag2($limit,$offset);
		$data['cara'] = $cara;
		 
		if($this->session->userdata('status') != "login")
		{
			// $this->load->view('header',$data);
			$this->load->view('tag', $data);
			$this->load->view('footer');
		}else
		{
			//  
			$this->load->view('member/tag', $data);
			$this->load->view('footer');
		}
	}

}
