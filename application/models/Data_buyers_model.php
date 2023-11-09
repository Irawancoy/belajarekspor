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
}
