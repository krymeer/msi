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

    public function borrow_book($id)
    {
        $q = 'UPDATE books SET books.status = 1 WHERE id = ?';
        return $this->db->query($q, $id);
    }
}