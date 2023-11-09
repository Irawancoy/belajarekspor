<?php



class Penulis_model extends CI_Model

{

    public function getAllKategori()

    {

        return $this->db->get('penulis')->result_array();

    }

    public function getKategoriById($id)

    {

        return $this->db->get_where('penulis', ['id_penulis' => $id])->row_array();

    }
	

    public function delete($id)

    {

        $this->db->where('id_penulis', $id);

        $this->db->delete('penulis');

    }
	public function joinPenulis($id)

    {

        $this->db->select('*');

        $this->db->from('materi');

        $this->db->join('penulis', 'penulis.id_penulis=materi.id_penulis');

        $return = $this->db->where('id_materi', $id)->get();

        if ($return->num_rows() > 0) {

            return $return->result();

        } else {

            return false;

        }

    }


}

