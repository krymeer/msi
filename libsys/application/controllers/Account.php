<?php
class Account extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('account_model');
        $this->load->helper('html');
        $this->lang->load('libsys_lang', 'polish');
        $this->class_title = $this->lang->line('account__title');
    }

    public function index()
    {
        echo link_tag(asset_url().'css/account.css');

        if ($this->session->logged_in)
        {
            $data['title'] = $this->class_title;
            $this->load->view('templates/header', $data);
            $this->load->view('account/index', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('account/login');
        }
    }
 
    public function remove()
    {
        if ($this->session->logged_in)
        {
            if ($this->uri->segment(3) === 'no')
            {
                redirect('account');
            }
            else if ($this->uri->segment(3) === 'yes')
            {
                $this->account_model->remove($this->session->user_id);
                $this->session->set_flashdata('account_removed', 1);
                redirect('account/remove/success');
            }
            else
            {
                $data['title'] = $this->class_title;
                $this->load->view('templates/header', $data);
                $this->load->view('account/remove', $data);
                $this->load->view('templates/footer');
            }
        }
        else
        {
            redirect('account/login');
        }
    }

    public function removal_success()
    {
        if (isset($this->session->account_removed))
        {
            $data['title'] = $this->class_title;
            $this->load->view('templates/header', $data);
            $this->load->view('account/removal_success', $data);
            $this->load->view('templates/footer');
            $this->session->sess_destroy();
        }
        else
        {
            redirect('');
        }
    }

    public function login()
    {
        if (!$this->session->logged_in)
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->config->set_item('language', 'polish');
            $this->form_validation->set_rules('username', $this->lang->line('account__section_login_form_label_1'), 'required|alpha_dash');
            $this->form_validation->set_rules('password', $this->lang->line('account__section_login_form_label_2'), 'required');

            echo link_tag(asset_url().'css/login.css');
            $data['title'] = $this->class_title;


            if ($this->form_validation->run())
            {
                $auth = $this->account_model->auth();

                if (empty($auth->result()) || !password_verify($this->input->post('password'), $auth->result()[0]->pass))
                {
                    $data['auth_err'] = $this->lang->line('form_validation_incorrect_data');
                }
                else
                {
                    $this->session->username        = $this->input->post('username');
                    $this->session->user_id         = intval($auth->result()[0]->id);
                    $this->session->is_librarian    = $auth->result()[0]->is_librarian;
                    $this->session->logged_in       = true;
                    redirect('account');
                }
            }
                    
            $this->load->view('templates/header', $data);
            $this->load->view('account/login', $data);
            $this->load->view('templates/footer', $data);
        }
        else
        {
            redirect('account');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }

    public function view($page = 'login')
    {
        if (!(file_exists(APPPATH.'views/account/'.$page.'.php')))
        {
            show_404();
        }

        $data['title'] = ucfirst($page);

        $this->load->view('templates/header', $data);
        $this->load->view('account/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}