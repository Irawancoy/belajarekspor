
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class videoterkait_c extends CI_Controller {


	public function __construct()

    {

        parent::__construct();
				$this->auth->restrict();

        $this->load->library('session');


        $this->load->model('videoterkait_m');


    }
    public function index($id)

    {
			$query = $this->videoterkait_m->getJudul($id);
        $data = [

            'view_file' => "admin/moduls/videoterkait",
						'id' => $id,
						'judul' => $query
	

        ];
		return $this->load->view('admin/admin_view', $data);

    }


  public function post($id)
  {
    $i = 0; // untuk loopingnya
    // $a = $this->input->post('first_name');
    $b = $this->input->post('link_video_materi');
    if ($b[0] !== null) 
    {
      foreach ($b as $row) 
      {
        $data = [
        //   'first_name'=>$row,
          'link_video_materi'=>$b[$i],
					'id_materi'=>$id
        ];

        $insert = $this->db->insert('tb_video_materi', $data);
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
