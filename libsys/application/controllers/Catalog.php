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

    public function isbn_match($str)
    {
        if (preg_match_all('/\d/', $str, $n) === 13 && preg_match('/^(\d+\-)+(\d)+$/', $str)) 
        {
            return true;
        }

        return false;
    }

    public function ean_match($str)
    {
        if (preg_match_all('/\d/', $str, $n) === 13 && preg_match('/^(\d+\s?)+(\d)+$/', $str)) 
        {
            return true;
        }

        return false;
    }

    public function index($n = 1)
    {
        $data['title']      = $this->lang->line('catalog__title');
        $data['num_pages']  = ceil($this->catalog_model->get_books('')->num_rows() / 10);
        $data['books']      = $this->catalog_model->get_books($n)->result();
        $data['page_no']    = (int)$n;
        $this->load->view('templates/header', $data);
        $this->load->view('catalog/index', $data);
        $this->load->view('templates/footer');
        echo link_tag(asset_url().'css/catalog.css');
        echo link_tag(asset_url().'css/pagenav.css');
    }

    public function add()
    {
        $msg            = 'auth_err';
        $msg_type       = 'error';

        if ($this->session->is_librarian)
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules(
                'book_title', 
                $this->lang->line('catalog__section_add_form_label_1'), 
                'required',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}')
                )
            );
            $this->form_validation->set_rules(
                'book_author_1', 
                $this->lang->line('catalog__section_add_form_label_2'), 
                'required|regex_match[/(*UTF8)^[\p{Latin}a-z\s\-\.\']+$/i]',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'regex_match'    => sprintf($this->lang->line('field_invalid_chars'), '{field}')
                )
            );
            $this->form_validation->set_rules(
                'book_author_2', 
                $this->lang->line('catalog__section_add_form_label_3'), 
                'required|regex_match[/(*UTF8)^[\p{Latin}a-z\s\-\.\']+$/i]',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'regex_match'    => sprintf($this->lang->line('field_invalid_chars'), '{field}')
                )
            );

            $this->form_validation->set_rules(
                'book_isbn', 
                $this->lang->line('catalog__section_add_form_label_4'), 
                'required|callback_isbn_match',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'isbn_match'    => $this->lang->line('field_invalid_isbn')
                )
            );

            $this->form_validation->set_rules(
                'book_ean', 
                $this->lang->line('catalog__section_add_form_label_5'), 
                'required|callback_ean_match',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'ean_match'     => $this->lang->line('field_invalid_ean')
                )
            );

            if (!$this->form_validation->run())
            {
                $data['title']  = $this->lang->line('catalog__title');
                $this->load->view('templates/header', $data);
                $this->load->view('catalog/add', $data);
                $this->load->view('templates/footer');
                echo link_tag(asset_url().'css/catalog_add.css');
            }
            else
            {
                $this->catalog_model->add_book();
                $msg        = 'add_book';
                $msg_type   = 'success';
                $this->session->set_flashdata('borrowing_status', array($msg, $msg_type));
                redirect('catalog');
            }
        }
        else
        {
            $this->session->set_flashdata('borrowing_status', array($msg, $msg_type));
            redirect('catalog');
        }
    }

    public function cancel($book_id = -1, $user_id = -1)
    {
        $msg        = 'auth_err';
        $msg_type   = 'error';
        
        if ($this->session->is_librarian)
        {
            $msg    = 'misc_err';
            $result = $this->catalog_model->update_book_status($book_id, $user_id, 1, 2);

            if ($result)
            {
                $msg        = 'bw_cancel';
                $msg_type   = 'success';
            }
        }

        $this->session->set_flashdata('borrowing_status', array($msg, $msg_type));
        redirect('catalog');
    }

    public function return($book_id = -1, $user_id = -1)
    {
        $msg        = 'auth_err';
        $msg_type   = 'error';

        if ($this->session->is_librarian)
        {
            $msg    = 'misc_err';
            $result = $this->catalog_model->update_book_status($book_id, $user_id, 0, 2);

            if ($result)
            {
                $msg        = 'bw_return';
                $msg_type   = 'success';
            }
        }

        $this->session->set_flashdata('borrowing_status', array($msg, $msg_type));
        redirect('catalog');
    }

    public function confirm($book_id = -1, $user_id = -1)
    {
        $msg        = 'auth_err';
        $msg_type   = 'error';

        if ($this->session->is_librarian)
        {
            $msg    = 'misc_err';
            $result = $this->catalog_model->update_book_status($book_id, $user_id, 1, 0);

            if ($result)
            {
                $msg        = 'bw_confirm';
                $msg_type   = 'success';
            }
        }

        $this->session->set_flashdata('borrowing_status', array($msg, $msg_type));
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
                $u = $this->account_model->get_user($b[0]->book_user_id)->result();

                if (empty($u))
                {
                    $this->session->set_flashdata('borrowing_status', 2);
                    redirect('catalog');
                }
                else
                {
                    $data['book_id']        = (int)$this->uri->segment(3);
                    $data['book_author']    = $b[0]->book_author_surname.' '.$b[0]->book_author_given_names; 
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
            $result     = $this->catalog_model->update_book_status($book_id, $this->session->user_id, 2, 1);
            $msg        = 'misc_err';
            $msg_type   = 'error';

            if ($result)
            {
                $msg        = 'bw_reserve';
                $msg_type   = 'success';
            }

            $this->session->set_flashdata('borrowing_status', array($msg, $msg_type));
            redirect('catalog');
        }
        else
        {
            $this->session->set_flashdata('borrowing_status', array('auth_err', 'error'));
            redirect('catalog');
        }
    }
}