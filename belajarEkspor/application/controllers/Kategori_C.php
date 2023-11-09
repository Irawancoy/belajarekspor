<?php



class Kategori_C extends CI_Controller

{

	// private $table = 'kategori_materi';
    public function __construct()

    {

        parent::__construct();
		$this->auth->restrict();

        $this->load->library('session');


        $this->load->model('Kategori_m');

    }

    public function index()

    {

        $data = [

            'view_file' => "admin/moduls/kategori",
		//  'result' => $this->Layanan->Layanan()->result(),

            'kategori' => $this->Kategori_m->getAllKategori()

        ];

        return $this->load->view('admin/admin_view', $data);

    }
	public function updatekategori()

    {

		$data = [

          
			
			"status_kategori_materi" => $this->input->post('status_kategori_materi', true),
			
			
				
           

        ];
		$this->db->where('id_kategori_materi', $this->input->post('id_kategori_materi'));

        $this->db->update('kategori_materi', $data);
        redirect('Kategori_C');

    }

    public function create()

    {

        $data = [

            "nama_kategori_materi" => $this->input->post('nama_kategori_materi', true),
			"status_kategori_materi" => $this->input->post('status_kategori_materi', true),

            // "nama_kategori_materi_en" => $this->input->post('nama_kategori_materi_en', true),

        ];

        $this->db->insert('kategori_materi', $data);

        redirect('Kategori_C');

    }

    public function delete($id)

    {

        $data = $this->Kategori_m->getKategoriById($id);

        $this->Kategori_m->delete($data['id_kategori_materi']);

        redirect('Kategori_C');

    }

    public function edit()

    {

        $data = [

            "nama_kategori_materi" => $this->input->post('nama_kategori_materi', true),
			"status_kategori_materi" => $this->input->post('status_kategori_materi', true),

    

        ];

        $this->db->where('id_kategori_materi', $this->input->post('id_kategori_materi'));

        $this->db->update('kategori_materi', $data);

        redirect('kategori_C');


    }
	

}

