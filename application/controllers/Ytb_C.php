<?php



class Ytb_C extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();
		$this->auth->restrict();

        $this->load->library('session');


        $this->load->model('ytb_model');

    }

    public function index()

    {

        $data = [

            'view_file' => "admin/moduls/V_ytb",

            'tb_link_youtube' => $this->ytb_model->getAllKategori()

        ];

        return $this->load->view('admin/admin_view', $data);

    }

    public function create()

    {

		$data = [

          
			"youtube_link" => $this->input->post('youtube_link', true),
			"status_link" => $this->input->post('status_link', true),

		
			
			
				
           

        ];
        $this->db->insert('tb_link_youtube', $data);

        redirect('Ytb_C');

    }
	public function updatestatus()

    {

		$data = [

          
			
			"status_link" => $this->input->post('status_link', true),
			
			
				
           

        ];
		$this->db->where('id_link', $this->input->post('id_link'));

        $this->db->update('tb_link_youtube', $data);
        redirect('Ytb_C');

    }

    public function delete($id)

    {

        $data = $this->ytb_model->getKategoriById($id);

        $this->ytb_model->delete($data['id_link']);

        redirect('Ytb_C');

    }

    public function edit()

    {

        $data = [

         
			"youtube_link" => $this->input->post('youtube_link', true),
			
			
			
            // "nama_Data_buyers_model_en" => $this->input->post('nama_Data_buyers_model_en', true),

        ];

        $this->db->where('id_link', $this->input->post('id_link'));

         $this->db->update('tb_link_youtube', $data);
		

        redirect('Ytb_C');

    }

}

