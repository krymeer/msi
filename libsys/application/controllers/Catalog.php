<?php
class Catalog extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('catalog_model');
        $this->load->library('session');
        $this->load->helper('html');
    }

    public function index()
    {
        $data['title'] = 'Katalog';
        $data['books'] = $this->catalog_model->get_books()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('catalog/index', $data);
        $this->load->view('templates/footer');
        echo link_tag(asset_url().'css/catalog.css');
    }

    public function b_orrow($id)
    {
        $this->catalog_model->borrow_book($id);
        redirect('/catalog');
    }
}