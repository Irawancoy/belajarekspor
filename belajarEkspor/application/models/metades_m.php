<?php



class metades_m extends CI_Model


{
	private $table = 'tb_meta_description';

    public function getAllKategori()

    {

        return $this->db->get('tb_meta_description')->result_array();

    }

    public function getKategoriById($id)

    {

        return $this->db->get_where('tb_meta_description', ['id_meta_description' => $id])->row_array();

    }
	

    public function delete($id)

    {

        $this->db->where('id_meta_description', $id);

        $this->db->delete('tb_meta_description');

    }

   

}

