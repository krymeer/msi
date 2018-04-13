<?php
class Account extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('account_model');
        $this->load->library('session');
        $this->load->helper('html');
        $this->class_title = 'Moje konto';
    }

    public function index()
    {
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

    public function login()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

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
                $this->session->username = $this->input->post('username');
                $this->session->logged_in = true;
                redirect('account');
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