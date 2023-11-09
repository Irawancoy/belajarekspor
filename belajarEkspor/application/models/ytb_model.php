<?php



class ytb_model extends CI_Model


{
	// private $table = 'tb_link_youtube';

    public function getAllKategori()

    {

        return $this->db->get('tb_link_youtube')->result_array();

    }

    public function getKategoriById($id)

    {

        return $this->db->get_where('tb_link_youtube', ['id_link' => $id])->row_array();

    }
	

    public function delete($id)

    {

        $this->db->where('id_link', $id);

        $this->db->delete('tb_link_youtube');

    }

   

}

