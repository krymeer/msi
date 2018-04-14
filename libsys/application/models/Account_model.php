<?php
class Account_model extends CI_model {
    public function __construct()
    {
        $this->load->database();
    }

    public function auth()
    {
        $q = 'SELECT id, pass FROM users WHERE name = ?';
        return $this->db->query($q, $this->input->post('username'));
    }
}