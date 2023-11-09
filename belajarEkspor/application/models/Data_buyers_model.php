<?php



class Data_buyers_model extends CI_Model

{

    public function getAllKategori()

    {

        return $this->db->get('data_buyers')->result_array();

    }

    public function getKategoriById($id)

    {

        return $this->db->get_where('data_buyers', ['id_buyers' => $id])->row_array();

    }
	

    public function delete($id)

    {

        $this->db->where('id_buyers', $id);

        $this->db->delete('data_buyers');

    }

    // public function joinKategori($id)

    // {

    //     $this->db->select('*');

    //     $this->db->from('materi');

    //     $this->db->join('data_buyers', 'data_buyers.id_buyers=materi.kategori');

    //     $return = $this->db->where('id_materi', $id)->get();

    //     if ($return->num_rows() > 0) {

    //         return $return->result();

    //     } else {

    //         return false;

    //     }

    // }

}

