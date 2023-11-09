<?php

class m_materi extends CI_Model
{
	private $table = 'materi';
	public function getAllPosting()
   {
      $this->db->from('materi as a');
      $this->db->join('penulis as b', 'b.id_penulis = a. id_penulis', 'left');
	  
      $this->db->order_by('a.id_penulis', 'desc');
      return $this->db->get()->result();
   }
	public function materi()
	{	
		return $this->db->get('materi');
	}

	public function materi2()
	{	
		//$this->db->limit(3);
		return $this->db->get('materi');
	}

	function joinmatkat(){
		$this->db->select('*');
		$this->db->from('materi');
		$this->db->join('kategori_materi','kategori_materi.id_kategori_materi = materi.id_kategori_materi');      
		$query = $this->db->get();
		return $query;
	 }

	public function kategori()
	{	
		return $this->db->get('kategori_materi');
	}

	public function penulis()
	{	
		return $this->db->get('penulis');
	}
	
	public function idpen()
	{
		
		$query = $this->db->query("SELECT id_penulis FROM materi");
		return $query->result();
	}

	public function get_by_id($id)
	{
		
		$query = $this->db->query("SELECT * FROM materi WHERE judul_materi='$id'");
		return $query->result();
	}


	public function bykategori($id){
		$this->db->from('kategori_materi as b');
		$this->db->join('materi as a', 'a.id_kategori_materi = b.id_kategori_materi');
		$this->db->where('b.nama_kategori_materi',$id);
		$result= $this->db->get();
		return $result;
	}

	public function jumkat($id){
		$this->db->select('*');
		$this->db->from('kategori_materi as b');
		$this->db->join('materi as a', 'a.id_kategori_materi = b.id_kategori_materi');
		$this->db->where('b.nama_kategori_materi',$id);
		$query= $this->db->get();
		return $query->num_rows();
		
	}

	public function jumpen($id){
		$this->db->select('*');
		$this->db->from('penulis as b');
		$this->db->join('materi as a', 'a.id_penulis = b.id_penulis');
		$this->db->where('b.username_penulis',$id);
		$query= $this->db->get();
		
		return $query->num_rows();
		
	}

	public function namakategori($id){
		$this->db->from('kategori_materi as b');
		$this->db->join('materi as a', 'a.id_kategori_materi = b.id_kategori_materi');
		$this->db->where('b.nama_kategori_materi',$id);
		$result= $this->db->get();
		return $result;
	}

	public function namapenulis($id){
		
		$this->db->select();
		$this->db->from('materi as a');
		$this->db->join('penulis as b', 'a.id_penulis = b.id_penulis');
		$this->db->where('a.judul_materi',$id);
		$result= $this->db->get();
		return $result;
	}

	public function bypenulisa($id){
		
		$this->db->select();
		$this->db->from('penulis as b');
		$this->db->join('materi as a', 'a.id_penulis = b.id_penulis');
		$this->db->where('b.username_penulis',$id);
		$result= $this->db->get();
		return $result;
	}

	public function bypenulis($id, $limit, $offset){
		$this->db->limit($limit, $offset);
		$this->db->select();
		$this->db->from('penulis as b');
		$this->db->join('materi as a', 'a.id_penulis = b.id_penulis', 'LEFT');
		$this->db->join('kategori_materi as c', 'a.id_kategori_materi = c.id_kategori_materi', 'LEFT');
		$this->db->where('b.username_penulis',$id);
		$result= $this->db->get();
		return $result;
	}
	
	function get_materi_list($limit, $start){
        $query = $this->db->get('materi', $limit, $start);
        return $query;
    }

	public function get_count() {
        return $this->db->count_all($this->table);
    }

	public function count_kat() {
		$query = $this->db->query('SELECT b.id_materi, a.nama_kategori_materi, a.id_kategori_materi, COUNT( * ) FROM materi as b
				JOIN kategori_materi as a ON a.id_kategori_materi = b.id_kategori_materi
                 GROUP BY id_kategori_materi
				');
			return $query->result();
		// $this->db->select();
		// $this->db->count_all('id_materi');
        // $this->db->from('kategori_materi as b');
		// $this->db->join('materi as a', 'a.id_kategori_materi = b.id_kategori_materi');
		// $this->db->where('b.nama_kategori_materi','Legalitas');
		// // $result= $this->db->get();
		// return $this->db->result();
    }
	
	public function get_materi($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('materi');
		$this->db->join('kategori_materi','kategori_materi.id_kategori_materi = materi.id_kategori_materi');      
		$this->db->order_by('id_materi desc');
        $query = $this->db->get();

        return $query->result();
    }

	public function get_kat($limit, $start,$id) {
        $this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('kategori_materi as b');
		$this->db->join('materi as a', 'a.id_kategori_materi = b.id_kategori_materi');
		$this->db->where('b.nama_kategori_materi',$id);
		$query= $this->db->get();
		return $query;
    }
	public function cari()
	{
		
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from materi as b	 JOIN kategori_materi as a ON a.id_kategori_materi = b.id_kategori_materi where isi_materi like '%$cari%' or tags_materi like '%$cari%' or judul_materi like '%$cari%'  ");
		return $data->result();
		
	}

	public function cari2($limit, $offset)
	{
		$cari = $this->input->GET('cari', TRUE);
		$this->db->limit($limit, $offset);
		$this->db->select('*');
		$this->db->from('materi as b');
		$this->db->join('kategori_materi as a','a.id_kategori_materi = b.id_kategori_materi');      
		// $this->db->on();
		$this->db->where("isi_materi like '%$cari%' or tags_materi like '%$cari%' or judul_materi like '%$cari%'");
		// $query = $this->db->get();
        $query = $this->db->get();

        return $query->result();
	}

	public function jumcari()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from materi as b	 JOIN kategori_materi as a ON a.id_kategori_materi = b.id_kategori_materi where isi_materi like '%$cari%' or tags_materi like '%$cari%' or judul_materi like '%$cari%'  ");
		return $data->num_rows();
	}

	public function tag()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from materi as b	 JOIN kategori_materi as a ON a.id_kategori_materi = b.id_kategori_materi where tags_materi like '%$cari%'  ");
		return $data->result();
	}

	public function tag2($limit,$offset)
	{
		$cari = $this->input->GET('cari', TRUE);
		$this->db->limit($limit, $offset);
		$this->db->select('*');
		$this->db->from('materi as b');
		$this->db->join('kategori_materi as a','a.id_kategori_materi = b.id_kategori_materi');      
		// $this->db->on();
		$this->db->where("tags_materi like '%$cari%'");
		// $query = $this->db->get();
        $query = $this->db->get();

        return $query->result();
	}

	public function klik()
	{
		$cari = $this->input->GET('p', TRUE);
		$data = $this->db->query("SELECT * from materi_terkait as b	 JOIN materi as a ON a.id_materi = b.id_materi where id_materi_terkait like '%$cari%'  ");
		return $data->result();
	}

	public function terkait($id){
		$this->db->from('materi_terkait as b');
		$this->db->join('materi as a', 'a.id_materi = b.id_materi');
		$this->db->where('a.judul_materi',$id);
		$result= $this->db->get();
		return $result;
	}

	public function video($id){
		$this->db->from('tb_video_materi as b');
		$this->db->join('materi as a', 'a.id_materi = b.id_materi');
		$this->db->where('a.judul_materi',$id);
		$result= $this->db->get();
		return $result;
	}
	public function get_by_ter()
	{
		$id = $this->input->get('p');
		$query = $this->db->query("SELECT * FROM materi_terkait WHERE id_materi_terkait='$id'");
		return $query->result();
	}
	public function akses()
	{
		$this->db->from('materi_terkait');
        $query = $this->db->get();
        return $query->result();
	}

	public function counte($id){
		$this->db->from('materi_terkait as b');
		$this->db->join('materi as a', 'a.id_materi = b.id_materi');
		$this->db->where('a.judul_materi',$id);
		$result= $this->db->get();
		return $result;
	}
}
