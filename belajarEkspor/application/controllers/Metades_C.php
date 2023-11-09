<?php



class Metades_C extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();
		$this->auth->restrict();

        $this->load->library('session');

        $this->load->model('metades_m');

    }

    public function index()

    {

        $data = [

            'view_file' => "admin/moduls/V_metades",

            'metades' => $this->metades_m->getAllKategori()

        ];

        return $this->load->view('admin/admin_view', $data);

    }

    public function create()

    {

		$data = [

          
			"meta_description_beranda" => $this->input->post('meta_description_beranda', true),
			"meta_description_tentang" => $this->input->post('meta_description_tentang', true),
			"meta_description_materi" => $this->input->post('meta_description_materi', true),
			"meta_description_importir" => $this->input->post('meta_description_importir', true),
			
			
				
           

        ];
        $this->db->insert('tb_meta_description', $data);

        redirect('Metades_C');

    }
	

    public function delete($id)

    {

        $data = $this->metades_m->getKategoriById($id);

        $this->metades_m->delete($data['id_meta_description']);

        redirect('Metades_C');

    }

    public function edit()

    {

        $data = [

         
			"meta_description_beranda" => $this->input->post('meta_description_beranda', true),
			"meta_description_tentang" => $this->input->post('meta_description_tentang', true),
			"meta_description_materi" => $this->input->post('meta_description_materi', true),
			"meta_description_importir" => $this->input->post('meta_description_importir', true),
			
			
            // "nama_Data_buyers_model_en" => $this->input->post('nama_Data_buyers_model_en', true),

        ];

        $this->db->where('id_meta_description', $this->input->post('id_meta_description'));

         $this->db->update('tb_meta_description', $data);
		

        redirect('Metades_C');

    }

}

