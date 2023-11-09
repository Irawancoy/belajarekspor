<?php

class m_beranda extends CI_Model 
{
	public function getBuyers(){
		return $this->db->get('data_buyers')->num_rows();
	}

	public function getNegara(){
		$this->db->select('negara_buyers');
		$this->db->distinct();
		return $this->db->get('data_buyers')->num_rows();
	}

	public function getMateri(){
		return $this->db->get('materi')->num_rows();
	}

	public function cekIp($ip, $tanggal){
		return $this->db->query("SELECT * FROM pengunjung WHERE ip='".$ip."' AND tanggal='".$tanggal."'")->num_rows();
	}

	public function tambahData($ip, $tanggal, $waktu){
		$this->db->query("INSERT INTO pengunjung(ip, tanggal, jumlah, waktu) VALUES('".$ip."','".$tanggal."','1','".$waktu."')");
	}

	public function getLog(){
		$data = $this->db->query("SELECT COUNT(jumlah) as jumlah FROM pengunjung")->row(); 
		return isset($data->jumlah)?($data->jumlah):0;
	}

}
