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

    public function curr_pass($pass)
    {
        $user = $this->account_model->get_pass($this->session->username)->result();

        if (count($user) > 0 && password_verify($pass, $user[0]->pass))
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

    public function password_change()
    {
        if ($this->session->logged_in)
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules(
                'passchange_passcurr',
                $this->lang->line('account__section_password_form_label_1'),
                'required|callback_curr_pass',
                array(
                    'required'          => sprintf($this->lang->line('field_required'), '{field}'),
                    'curr_pass'         => $this->lang->line('account__section_password_curr_invalid')
                )
            );

            /**
             * For some ludicrous reasons the callback is always being executed first
             */
            $this->form_validation->set_rules(
                'passchange_password',
                $this->lang->line('account__section_password_form_label_2'),
                'required|min_length[8]|differs[passchange_passcurr]|callback_valid_pass',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'differs'       => sprintf($this->lang->line('account__section_password_same'), '{field}'),
                    'min_length'    => sprintf($this->lang->line('account__section_signup_input_short'), '{field}', '{param}'),
                    'valid_pass'    => $this->lang->line('account__section_signup_pass_invalid')
                )
            );
            $this->form_validation->set_rules(
                'passchange_passconf',
                $this->lang->line('account__section_password_form_label_3'),
                'required|matches[passchange_password]',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'matches'       => $this->lang->line('account__section_signup_pass_diff')
                )
            );

            if ($this->form_validation->run())
            {
                $this->account_model->update_pass($this->session->username, password_hash($this->input->post('passchange_password'), PASSWORD_DEFAULT));
                $this->session->set_flashdata('account_status', array('success', 0));
                redirect('account');
            }
            else
            {
                $data['title'] = $this->class_title;
                $this->load->view('templates/header', $data);
                $this->load->view('account/password_change', $data);
                $this->load->view('templates/footer');
                echo link_tag(asset_url().'css/form_normal.css');
            }
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

            echo link_tag(asset_url().'css/form_normal.css');
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
        else if (isset($this->session->account_created))
        {
            redirect('account/login');
        }
        else
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules(
                'signup_username', 
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
                'signup_password', 
                $this->lang->line('account__section_signup_form_label_2'), 
                'required|min_length[8]|callback_valid_pass',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'min_length'    => sprintf($this->lang->line('account__section_signup_input_short'), '{field}', '{param}'),
                    'valid_pass'    => $this->lang->line('account__section_signup_pass_invalid')
                )
            );
            $this->form_validation->set_rules(
                'signup_passconf', 
                $this->lang->line('account__section_signup_form_label_3'), 
                'required|matches[signup_password]',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'matches'       => $this->lang->line('account__section_signup_pass_diff')
                )
            );
            $this->form_validation->set_rules(
                'signup_email', 
                $this->lang->line('account__section_signup_form_label_4'), 
                'required|valid_email|is_unique[users.email]',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'valid_email'   => $this->lang->line('account__section_signup_form_email_invalid'),
                    'is_unique'     => $this->lang->line('account__section_signup_form_email_taken') 
                )
            );
            $this->form_validation->set_rules(
                'signup_given_names', 
                $this->lang->line('account__section_signup_form_label_5'), 
                'required|regex_match[/(*UTF8)^[\p{Latin}a-z\s\-\.\']+$/i]',
                array(
                    'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                    'regex_match'   => sprintf($this->lang->line('field_invalid_chars'), '{field}')
                )
            );
            $this->form_validation->set_rules(
                'signup_surname', 
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
                $email_config = array(
                    'protocol'      => 'smtp',
                    'smtp_host'     => 'smtp.gmail.com',
                    'smtp_port'     => 587,
                    'smtp_crypto'   => 'tls',
                    'smtp_user'     => 'krymeer@gmail.com',
                    'smtp_pass'     => 'ed3ceb3a66',
                    'charset'       => 'utf-8',
                    'crlf'          => "\r\n",
                    'newline'       => "\r\n"
                );

                $this->session->signup_token    = bin2hex(random_bytes(48));
                $this->session->signup_id       = intval($this->account_model->add_user()->row()->id);
                $this->session->mark_as_temp('signup_token', 3600);
                $this->session->mark_as_temp('signup_id', 3600);
                $activation_url = '<a href="https://'.$_SERVER['SERVER_NAME'].'/account/activate/'.$this->session->signup_token.'" target="_blank">https://'.$_SERVER['SERVER_NAME'].'/account/activate/'.$this->session->signup_token.'</a>';

                $this->load->library('email', $email_config);
                $this->email->from($email_config['smtp_user'], $this->lang->line('account__activation_email_from'));
                $this->email->message(sprintf($this->lang->line('account__activation_email_message'), $this->input->post('signup_given_names'), $this->input->post('signup_surname'), $activation_url));
                $this->email->subject($this->lang->line('account__activation_email_subject'));
                $this->email->to($this->input->post('signup_email'));
                $this->email->set_mailtype('html');
                $this->email->send();

                $data['username'] = $this->input->post('signup_username');
                $this->session->set_flashdata('account_created', 1);

                $this->load->view('account/signup_success', $data);
            }
            else
            {
                echo link_tag(asset_url().'css/form_normal.css');
                $this->load->view('account/signup', $data);
            }

            $this->load->view('templates/footer', $data);
        }
    }

    public function activate($token)
    {
        $msg_type = 'error';

        if (isset($this->session->signup_token) && isset($this->session->signup_id) && $this->session->signup_token === $token && $this->session->signup_id >= 0)
        {
            $this->account_model->activate($this->session->signup_id);
            $msg_type = 'success';
        }

        $this->session->unset_userdata('signup_id');
        $this->session->unset_userdata('signup_token');
        $this->session->set_flashdata('account_status', $msg_type);

        redirect('account/login');
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