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

    public function get_user($id)
    {
        $q = 'SELECT * FROM users WHERE id = ?';
        return $this->db->query($q, $id);
    }

    public function add_user()
    {
        $q              = 'INSERT INTO users (name, pass, given_names, surname, email) VALUES (?, ?, ?, ?, ?)';
        $user_data      = array(
            $this->input->post('username'),
            password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            $this->input->post('given_names'),
            $this->input->post('surname'),
            $this->input->post('email'),
        );

        return $this->db->query($q, $user_data);
    }
}