<?php



class videoterkait_m extends CI_Model

{
	private $_table = 'tb_video_materi';

    public function getAllKategori()

    {

        return $this->db->get('tb_video_materi')->result_array();

    }
	
    public function Layanan($id = '')

    {

        $this->db->select('*')

            ->from($this->_table);



        if ($id) {

            $this->db->where('id_video_materi', $id);

        }

        return $this->db->get();

    }
	

    public function getKategoriById($id)

    {

        return $this->db->get_where('tb_video_materi', ['id_video_materi' => $id])->row_array();

    }
	

    public function delete($id)

    {

        $this->db->where('id_video_materi', $id);

        $this->db->delete('tb_video_materi');

    }

   
	function getJudul($id){
		$this->db->where('id_materi', $id);
		$this->db->select('judul_materi');
		return $this->db->get('materi');
	 }
  
}

