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

    public function add_book()
    {
        $q          = 'INSERT INTO books (book_title, book_author_given_names, book_author_surname, book_isbn, book_ean) VALUES (?, ?, ?, ?, ?)';
        $book_data  = array(
            htmlentities($this->input->post('book_title')),
            $this->input->post('book_author_1'),
            $this->input->post('book_author_2'),
            $this->input->post('book_isbn'),
            $this->input->post('book_ean')
        );

        return $this->db->query($q, $book_data);
    }

    public function update_book_status($book_id, $user_id, $curr_code, $new_code)
    {
        $q = 'SELECT * FROM books WHERE book_status = ? AND book_id = ? AND book_user_id = ?';
        
        if ($curr_code === 2 && $new_code === 1)
        {
            $r = $this->db->query($q, array($curr_code, $book_id, -1))->result();
        }
        else
        {
            $r = $this->db->query($q, array($curr_code, $book_id, $user_id))->result();
        }

        if (empty($r))
        {
            return false;
        }

        $q = 'SELECT * FROM users WHERE id = ?';

        if (empty($this->db->query($q, $user_id)->result()))
        {
            return false;
        }

        $q = 'UPDATE books SET book_status = ?, book_user_id = ? WHERE book_id = ?';

        if ($curr_code === 0 && $new_code === 2)
        {
            return $this->db->query($q, array($new_code, -1, $book_id));
        }

        return $this->db->query($q, array($new_code, $user_id, $book_id));
    }
}