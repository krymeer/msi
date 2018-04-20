<?php
class Account extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('account_model');
        $this->lang->load('libsys_lang', 'polish');
        $this->class_title = 'Moje konto';
    }

    public function index()
    {
        if ($this->session->logged_in)
        {
            $data['title'] = $this->class_title;
            $this->load->view('templates/header', $data);
            $this->load->view('account/index', $data);

            if ($this->session->is_librarian)
            {
                $this->load->view('account/librarian');
            }

            $this->load->view('templates/footer');
        }
        else
        {
            redirect('account/login');
        }
    }

    public function login()
    {
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->config->set_item('language', 'polish');
        $this->form_validation->set_rules('username', 'Nazwa użytkownika', 'required|alpha_dash');
        $this->form_validation->set_rules('password', 'Hasło', 'required');

        echo link_tag(asset_url().'css/alerts.css');
        echo link_tag(asset_url().'css/buttons.css');
        echo link_tag(asset_url().'css/forms.css');
        echo link_tag(asset_url().'css/login.css');
        $data['title'] = $this->class_title;

        if ($this->form_validation->run())
        {
            $auth = $this->account_model->auth();

            if (empty($auth->result()) || !password_verify($this->input->post('password'), $auth->result()[0]->pass))
            {
                $data['auth_err'] = 'Nieprawidłowa nazwa użytkownika lub hasło.';
            }
            else
            {
                $this->session->username        = $this->input->post('username');
                $this->session->user_id         = $auth->result()[0]->id;
                $this->session->is_librarian    = $auth->result()[0]->is_librarian;
                $this->session->logged_in       = true;
                redirect('/account');
            }
        }
                
        $this->load->view('templates/header', $data);
        $this->load->view('account/login', $data);
        $this->load->view('templates/footer', $data);
    }

    public function logout()
    {

        $this->session->sess_destroy();
        redirect('/');
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