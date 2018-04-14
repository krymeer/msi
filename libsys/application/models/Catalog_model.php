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

    public function update_book_status($book_id, $user_id)
    {
        $q = 'SELECT * FROM books WHERE book_status = 2 AND book_id = ?';

        if (empty($this->db->query($q, $book_id)->result()))
        {
            return false;
        }

        $q = 'UPDATE books SET book_status = 1, book_user_id = ? WHERE book_id = ?';

        return $this->db->query($q, array($user_id, $book_id));
    }
}