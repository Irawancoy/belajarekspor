<?php 

class m_auth extends CI_Model {


    public function registerUser($data)
    {
        return $this->db->insert('member', $data);
    }


}
