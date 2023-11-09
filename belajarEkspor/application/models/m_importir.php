<?php

class m_importir extends CI_Model
{
	public function produk()
	{	
		// return $this->db->get('data_buyers', $limit, $start)->result_array();
		$this->db->order_by('id_buyers', 'DESC');
		return $this->db->get('data_buyers');
	}

	public function getData($datas){
		$this->db->where('id_buyers', $datas);
		// $data['buyer'] = $this->db->get('data_buyers');

		// $this->db->update('data_buyers', $data);

		return $this->db->get('data_buyers')->row();
	}

	public function countData(){
		return  $this->db->get('data_buyers')->num_rows();
	}

	public function cariData($cari){
		$this->db->like('produk_buyers', $cari);
		$this->db->order_by('id_buyers', 'DESC');
		return $this->db->get('data_buyers');
	}

	public function get_published($limit = null, $offset = null)
	{
		if (!$limit && $offset) {
			$query = $this->db->get_where('data_buyers');
		} else {
			$query = $this->db->get_where('data_buyers', $limit, $offset);
		}
		return $query->result();
	}
	
	public function getLink(){
	    $this->db->where('status_link', '1');
	    $this->db->order_by('rand()');
	    $this->db->limit(1);
	    return $this->db->get('tb_link_youtube')->row();
	}

	// public function updateData($data, $datas){
	// 	$this->db->where('id_buyers', $data);
	// 	$temp['buyer'] = $this->db->get('data_buyers');
	// 	$this->db->update('data_buyers', $temp);
	// }
}
