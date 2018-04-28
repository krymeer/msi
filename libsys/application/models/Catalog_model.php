<?php
class Catalog_model extends CI_model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_books()
    {
        $q = 'SELECT * FROM books';
        return $this->db->query($q);
    }

    public function get_book($id)
    {
        $q = 'SELECT * FROM books WHERE book_id = ?';
        return $this->db->query($q, $id);
    }

    public function update_book_status($book_id, $user_id, $curr_code, $new_code)
    {
        $q = 'SELECT * FROM books WHERE book_status = ? AND book_id = ?';

        if (empty($this->db->query($q, array($curr_code, $book_id))->result()))
        {
            return false;
        }

        $q = 'SELECT * FROM users WHERE id = ?';

        if (empty($this->db->query($q, $user_id)->result()))
        {
            return false;
        }

        $q = 'UPDATE books SET book_status = ?, book_user_id = ? WHERE book_id = ?';

        return $this->db->query($q, array($new_code, $user_id, $book_id));
    }
}