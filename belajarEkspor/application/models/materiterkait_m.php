<?php



class materiterkait_m extends CI_Model

{
	private $_table = 'materi_terkait';
	

    public function getAllKategori()

    {

        return $this->db->get('materi_terkait')->result_array();

    }
	
    public function Layanan($id = '')

    {

        $this->db->select('*')

            ->from($this->_table);



        if ($id) {

            $this->db->where('id_materi_terkait', $id);

        }

        return $this->db->get();

    }
	

    public function getKategoriById($id)

    {

        return $this->db->get_where('materi_terkait', ['id_materi_terkait' => $id])->row_array();

    }
	

    public function delete($id)

    {

        $this->db->where('id_materi_terkait', $id);

        $this->db->delete('materi_terkait');

    }
	
	function getJudul($id){
		$this->db->where('id_materi', $id);
		$this->db->select('judul_materi');
		return $this->db->get('materi');
	 }
  

}

