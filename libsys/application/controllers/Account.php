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

    public function valid_pass($pass)
    {
        if (preg_match_all('/[A-Z]/', $pass, $n) >= 1 && preg_match_all('/\d/', $pass, $n) >= 1) 
        {
            return true;
        }

        return false;
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
            $this->form_validation->set_rules(
                'username', 
                $this->lang->line('account__section_login_form_label_1'), 
                'required',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}')
                )
            );
            $this->form_validation->set_rules(
                'password', 
                $this->lang->line('account__section_login_form_label_2'), 
                'required',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}')
                )
            );

            echo link_tag(asset_url().'css/login.css');
            $data['title'] = $this->class_title;

            if ($this->form_validation->run())
            {
                $auth = $this->account_model->auth();

                if (empty($auth->result()) || !password_verify($this->input->post('password'), $auth->result()[0]->pass))
                {
                    $data['auth_err'] = $this->lang->line('account__form_validation_incorrect_data');
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
        redirect('/');
    }

    public function signup()
    {
        if ($this->session->logged_in)
        {
            redirect('account');
        }
        else
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules(
                'username', 
                $this->lang->line('account__section_signup_form_label_1'), 
                'required|regex_match[/^[a-z\d_\.]+$/i]|min_length[4]|is_unique[users.name]',
                array(
                    'required'          => sprintf($this->lang->line('field_required'), '{field}'),
                    'min_length'        => sprintf($this->lang->line('account__section_signup_input_short'), '{field}', '{param}'),
                    'regex_match'       => $this->lang->line('account__section_signup_username_invalid'),
                    'is_unique'         => $this->lang->line('account__section_signup_username_taken')
                )
            );
            $this->form_validation->set_rules(
                'password', 
                $this->lang->line('account__section_signup_form_label_2'), 
                'required|min_length[8]|callback_valid_pass',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'min_length'    => sprintf($this->lang->line('account__section_signup_input_short'), '{field}', '{param}'),
                    'valid_pass'    => $this->lang->line('account__section_signup_pass_invalid')
                )
            );
            $this->form_validation->set_rules(
                'passconf', 
                $this->lang->line('account__section_signup_form_label_3'), 
                'required|matches[password]',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'matches'       => $this->lang->line('account__section_signup_pass_diff')
                )
            );
            $this->form_validation->set_rules(
                'email', 
                $this->lang->line('account__section_signup_form_label_4'), 
                'required|valid_email|is_unique[users.email]',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'valid_email'   => $this->lang->line('contact__section_main_form_email_invalid'),
                    'is_unique'     => $this->lang->line('contact__section_main_form_email_taken') 
                )
            );
            $this->form_validation->set_rules(
                'given_names', 
                $this->lang->line('account__section_signup_form_label_5'), 
                'required|regex_match[/(*UTF8)^[\p{Latin}a-z\s\-\.\']+$/i]',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'regex_match'   => sprintf($this->lang->line('field_invalid_chars'), '{field}')
                )
            );
            $this->form_validation->set_rules(
                'surname', 
                $this->lang->line('account__section_signup_form_label_6'), 
                'required|regex_match[/(*UTF8)^[\p{Latin}a-z\s\-\.\']+$/i]',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'regex_match'   => sprintf($this->lang->line('field_invalid_chars'), '{field}')
                )
            );


            $data['title'] = $this->class_title;
            $this->load->view('templates/header', $data);

            if ($this->form_validation->run()) 
            {
                if (isset($this->session->account_created))
                {
                    redirect('account/login');
                }
                else
                {
                    $this->account_model->add_user();
                    $data['username'] = $this->input->post('username');
                    $this->session->set_flashdata('account_created', $this->lang->line('account__msg_account_created'));
                    $this->load->view('account/signup_success', $data);
                }
            }
            else
            {                
                echo link_tag(asset_url().'css/signup.css');
                $this->load->view('account/signup', $data);
            }

            $this->load->view('templates/footer', $data);
        }
    }

    public function view($page = 'login')
    {
        if (!(file_exists(APPPATH.'views/account/'.$page.'.php')))
        {
            show_libsys_error(404);
        }
        else
        {
            if (file_exists(APPPATH.'../assets/css/'.$page.'.css'))
            {
                echo link_tag(asset_url().'css/'.$page.'.css');
            }

            $data['title'] = $this->lang->line($page.'__title');

            $this->load->view('templates/header', $data);
            $this->load->view('account/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }
    }
}