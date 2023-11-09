<?php



class member_model extends CI_Model


{
	private $table = 'member';

    public function getAllKategori()

    {

        return $this->db->get('member')->result_array();

    }

    public function getKategoriById($id)

    {

        return $this->db->get_where('member', ['id_member' => $id])->row_array();

    }
	

    public function delete($id)

    {

        $this->db->where('id_member', $id);

        $this->db->delete('member');

    }

   

}

