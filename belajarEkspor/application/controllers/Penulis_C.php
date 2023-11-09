<?php



class Penulis_C extends CI_Controller

{
	private $table ='penulis';

    public function __construct()

    {

        parent::__construct();
		$this->auth->restrict();

        $this->load->library('session');


        $this->load->model('Penulis_model');

    }

    public function index()

    {

        $data = [

            'view_file' => "admin/moduls/V_Penulis",

            'penulis' => $this->Penulis_model->getAllKategori()

        ];

        return $this->load->view('admin/admin_view', $data);

    }

    public function create()

    {

		$data = [

            "nama_penulis" => $this->input->post('nama_penulis', true),
			"deskripsi_penulis" => $this->input->post('deskripsi_penulis', true),
			"website_penulis" => $this->input->post('website_penulis', true),
			"email_penulis" => $this->input->post('email_penulis', true),
				
           

        ];
        $this->db->insert('penulis', $data);

        redirect('penulis_C');

    }

    public function delete($id)

    {

        $data = $this->Penulis_model->getKategoriById($id);

        $this->Penulis_model->delete($data['id_penulis']);

        redirect('penulis_C');

    }

    public function edit()

    {

		$data = [

            "nama_penulis" => $this->input->post('nama_penulis', true),
			"deskripsi_penulis" => $this->input->post('deskripsi_penulis', true),
			"website_penulis" => $this->input->post('website_penulis', true),
			"email_penulis" => $this->input->post('email_penulis', true),
				
           

        ];

        $this->db->where('id_penulis', $this->input->post('id_penulis'));

        $this->db->update('penulis', $data);

        redirect('penulis_C');
		// return $this->db->update($this->table, $data, array('id_penulis' => $this->input->post('id_penulis')));
		//   redirect('penulis');

    }

}

