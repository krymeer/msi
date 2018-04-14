<?php
class Catalog extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('catalog_model');
        $this->lang->load('libsys_lang', 'polish');
        $this->load->helper('html');
    }

    public function index()
    {
        $data['title'] = 'Katalog';
        $data['books'] = $this->catalog_model->get_books()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('catalog/index', $data);
        $this->load->view('templates/footer');
        echo link_tag(asset_url().'css/alerts.css');
        echo link_tag(asset_url().'css/catalog.css');
        echo link_tag(asset_url().'css/buttons.css');
    }

    public function borrow($id)
    {
        $status = $this->catalog_model->update_book_status($id, $this->session->user_id);
        $this->session->set_flashdata('borrowing_status', $status);
        redirect('/catalog');
    }
}