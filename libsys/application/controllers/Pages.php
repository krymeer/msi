<?php
class Pages extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
    }

    public function view($page = 'home')
    {
        if (!(file_exists(APPPATH.'views/pages/'.$page.'.php')))
        {
            show_404();
        }

        $data['title'] = ucfirst($page);

        if ($page === 'home')
        {
            $data['title'] = 'Strona główna';
        }

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}