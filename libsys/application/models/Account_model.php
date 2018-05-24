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

    public function get_pass($username)
    {
        $q = 'SELECT pass FROM users WHERE name = ?';
        return $this->db->query($q, $username);
    }

    public function update_pass($username, $passhash)
    {
        $q = 'UPDATE users SET pass = ? WHERE name = ?';

        return $this->db->query($q, array($passhash, $username));
    }

    public function add_user()
    {
        $q_1            = 'INSERT INTO users (name, pass, given_names, surname, email) VALUES (?, ?, ?, ?, ?)';
        $q_2            = 'SELECT id FROM users WHERE name = ?';
        $user_data      = array(
            $this->input->post('signup_username'),
            password_hash($this->input->post('signup_password'), PASSWORD_DEFAULT),
            $this->input->post('signup_given_names'),
            $this->input->post('signup_surname'),
            $this->input->post('signup_email'),
        );

        if (!$this->db->query($q_1, $user_data))
        {
            return -1;
        }

        return $this->db->query($q_2, $user_data[0]);
    }

    public function activate($id)
    {
        $q = 'UPDATE users SET is_active = 1 WHERE id = ?';

        return $this->db->query($q, $id);
    }
}