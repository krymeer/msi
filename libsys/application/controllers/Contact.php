<?php
class Contact extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('contact_model');
        $this->lang->load('libsys_lang', 'polish');
        $this->load->helper('html');
    }

    public function name_match($string)
    {
        return preg_match('/(*UTF8)^[\p{Latin}a-z\s -\']+$/i', $string);
    }

    public function index()
    {
        $data['title'] = $this->lang->line('contact__title');

        $this->load->helper('form');        
        $this->load->library('form_validation');        
        $this->form_validation->set_rules(
            'contact_name', 
            $this->lang->line('contact__section_main_form_label_1'), 
            'required|regex_match[/(*UTF8)^[\p{Latin}a-z\s\-\.\']+$/i]',
            array(
                'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                'regex_match'    => sprintf($this->lang->line('field_invalid_chars'), '{field}')
            )
        );
        $this->form_validation->set_rules(
            'contact_email', 
            $this->lang->line('contact__section_main_form_label_2'), 
            'required|valid_email',
            array(
                'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                'valid_email'   => $this->lang->line('contact__section_main_form_err_email') 
            )
        );
        $this->form_validation->set_rules(
            'contact_message', 
            $this->lang->line('contact__section_main_form_label_3'), 
            'required|min_length[10]',
            array(
                'required'      => sprintf($this->lang->line('field_required'), '{field}'),
                'min_length'    => sprintf($this->lang->line('contact__section_main_form_err_msg'), '{param}')
            )
        );

        
        if ($this->form_validation->run()) 
        {
            $this->session->set_flashdata('contact_form_status', 'success');
            redirect('contact');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('contact/index', $data);
        $this->load->view('templates/footer');
        echo link_tag(asset_url().'css/contact.css');

    }
}