<?php

class m_kategori extends CI_Model
{
	public function kategori()
	{	
		return $this->db->get('kategori_materi');
	}
}
