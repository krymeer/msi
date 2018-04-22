<?php
class Account_model extends CI_model {
    public function __construct()
    {
        $this->load->database();
    }

    public function remove($id)
    {
        $q = 'DELETE FROM users WHERE id = ?';
        return $this->db->query($q, $id);
    }

    public function auth()
    {
        $q = 'SELECT * FROM users WHERE name = ?';
        return $this->db->query($q, $this->input->post('username'));
    }

    public function get_username($id)
    {
        $q = 'SELECT * FROM users WHERE id = ?';
        return $this->db->query($q, $id);
    }
}