
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class materiterkait_c extends CI_Controller {


	public function __construct()

    {

        parent::__construct();
				$this->auth->restrict();

        $this->load->library('session');


        $this->load->model('materiterkait_m');
        
		


    }
    public function index($id)

    {
				$query = $this->materiterkait_m->getJudul($id);
        $data = [

            'view_file' => "admin/moduls/materiterkait",
						'id' => $id,
						'judul' => $query
        ];
		return $this->load->view('admin/admin_view', $data);

    }
//   public function index()
//   {
//     $data['title'] = "Insert Form Looping Using Javascript";
//     $this->load->view('moduls/materiterkait', $data);
//   }


  public function post($id)
  {
    $i = 0; // untuk loopingnya
    // $a = $this->input->post('first_name');
    $b = $this->input->post('nama_materi_terkait');
    if ($b[0] !== null) 
    {
      foreach ($b as $row) 
      {
        $data = [
        //   'first_name'=>$row,
          'nama_materi_terkait'=>$b[$i],
					'id_materi' => $id
        ];

        $insert = $this->db->insert('materi_terkait', $data);
        if ($insert) {
          $i++;
        }
      }
    }

    $arr['success'] = true;
    $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> Data Berhasil Disimpan
    </div>';
    return $this->output->set_output(json_encode($arr));

  }

}
