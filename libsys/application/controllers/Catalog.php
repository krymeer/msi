<?php
class Catalog extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('catalog_model');
        $this->load->model('account_model');
        $this->lang->load('libsys_lang', 'polish');
        $this->load->helper('html');
    }

    public function index()
    {
        $data['title'] = $this->lang->line('catalog__title');
        $data['books'] = $this->catalog_model->get_books()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('catalog/index', $data);
        $this->load->view('templates/footer');
        echo link_tag(asset_url().'css/catalog.css');
    }

    public function cancel($book_id = -1, $user_id = -1)
    {
        $f_code = 0;

        if ($this->session->is_librarian && $book_id > 0 && $user_id > 0)
        {
            $status = $this->catalog_model->update_book_status($book_id, $user_id, 1, 2);

            if ($status)
            {
                $f_code = 5;
            }
        }

        $this->session->set_flashdata('borrowing_status', $f_code);
        redirect('catalog');
    }

    public function return($book_id = -1, $user_id = -1)
    {
        $f_code = 0;

        if ($this->session->is_librarian && $book_id > 0 && $user_id > 0)
        {
            $status = $this->catalog_model->update_book_status($book_id, $user_id, 0, 2);

            if ($status)
            {
                $f_code = 7;
            }
        }

        $this->session->set_flashdata('borrowing_status', $f_code);
        redirect('catalog');
    }

    public function confirm($book_id = -1, $user_id = -1)
    {
        $f_code = 0;

        if ($this->session->is_librarian && $book_id > 0 && $user_id > 0)
        {
            $status = $this->catalog_model->update_book_status($book_id, $user_id, 1, 0);

            if ($status)
            {
                $f_code = 3;
            }
        }

        $this->session->set_flashdata('borrowing_status', $f_code);
        redirect('catalog');
    }

    public function borrow($book_id = -1, $action = '')
    {
        if ($this->session->is_librarian && ($action === 'confirm' || $action === 'cancel' || $action === 'return'))
        {
            $b = $this->catalog_model->get_book($book_id)->result();

            if (empty($b))
            {
                $this->session->set_flashdata('borrowing_status', 0);
                redirect('catalog');
            }
            else
            {
                $u = $this->account_model->get_username($b[0]->book_user_id)->result();

                if (empty($u))
                {
                    $this->session->set_flashdata('borrowing_status', 2);
                    redirect('catalog');
                }
                else
                {
                    $data['book_id']        = (int)$this->uri->segment(3);
                    $data['book_author']    = $b[0]->book_author; 
                    $data['book_title']     = $b[0]->book_title;
                    $data['book_user_id']   = $b[0]->book_user_id;
                    $data['book_user']      = $u[0]->name;
                    $data['title']          = $this->lang->line('catalog__title');
                    $this->load->view('templates/header', $data);
                    $this->load->view('catalog/'.$this->uri->segment(4), $data);
                    $this->load->view('templates/footer');
                }
            }


        }
        else if ($this->session->logged_in && $book_id > 0)
        {
            $status = $this->catalog_model->update_book_status($book_id, $this->session->user_id, 2, 1);
            $this->session->set_flashdata('borrowing_status', $status);
            redirect('catalog');
        }
        else
        {
            // Handle invalid operation
        }
    }
}