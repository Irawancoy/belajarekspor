<?php



class Member_C extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();
		$this->auth->restrict();

        $this->load->library('session');

        $this->load->model('member_model');

    }

    public function index()

    {

        $data = [

            'view_file' => "admin/moduls/V_member",

            'member' => $this->member_model->getAllKategori()

        ];

        return $this->load->view('admin/admin_view', $data);

    }

    public function create()

    {

		$data = [

          
			"username_member" => $this->input->post('username_member', true),
			"password_member" => $this->input->post('password_member', true),
			"nama_member" => $this->input->post('nama_member', true),
			"email_member" => $this->input->post('email_member', true),
			"no_hp_member" => $this->input->post('no_hp_member', true),
			"website_member" => $this->input->post('website_member', true),
			"status_member" => $this->input->post('status_member', true),
			
			
				
           

        ];
        $this->db->insert('member', $data);

        redirect('Member_C');

    }
	public function updatemember()

    {

		$data = [

          
			
			"status_member" => $this->input->post('status_member', true),
			
			
				
           

        ];
		$this->db->where('id_member', $this->input->post('id_member'));

        $this->db->update('member', $data);
        redirect('Member_C');

    }

    public function delete($id)

    {

        $data = $this->member_model->getKategoriById($id);

        $this->member_model->delete($data['id_member']);

        redirect('Member_C');

    }

    public function edit()

    {

        $data = [

         
			"username_member" => $this->input->post('username_member', true),
			"password_member" => $this->input->post('password_member', true),
			"nama_member" => $this->input->post('nama_member', true),
			"email_member" => $this->input->post('email_member', true),
			"no_hp_member" => $this->input->post('no_hp_member', true),
			"website_member" => $this->input->post('website_member', true),
			"status_member" => $this->input->post('status_member', true),
			
			
            // "nama_Data_buyers_model_en" => $this->input->post('nama_Data_buyers_model_en', true),

        ];

        $this->db->where('id_member', $this->input->post('id_member'));

         $this->db->update('member', $data);
		

        redirect('Member_C');

    }

}

