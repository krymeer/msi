<?php
class Pages extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('html');
        $this->lang->load('libsys_lang', 'polish');
    }

    public function view($page = 'home')
    {
        if (!(file_exists(APPPATH.'views/pages/'.$page.'.php')))
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
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }
    }
}