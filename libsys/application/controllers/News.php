<?php
class News extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('news_model');
        $this->lang->load('libsys_lang', 'polish');
        $this->load->helper('html');
        $this->load->helper('url_helper');
    }

    private function get_full_date($news)
    {
        $date           = explode(' ', $news['date']);
        $dmy            = explode('-', $date[0]);
        $hms            = explode(':', $date[1]);
        $news['date']   = $dmy[2].' '.$this->lang->line('months_genitives')[(int)$dmy[1]-1].' '.$dmy[0].' '.$this->lang->line('year_genitive').', '.$this->lang->line('hour_abbreviated').' '.(int)$hms[0].':'.$hms[1];

        return $news;
    }

    public function index()
    {
        $data['title']  = $this->lang->line('news__title');
        $data['news']   = $this->news_model->get_news();
        echo link_tag(asset_url().'css/news.css');

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = null)
    {
        $data['news_item']  = $this->news_model->get_news($slug);
        $data['news_item']  = $this->get_full_date($data['news_item']);

        if (empty($data['news_item']))
        {
            show_404();
        }

        $data['title'] = $this->lang->line('news__title');
        echo link_tag(asset_url().'css/news_item.css');

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if (!$this->form_validation->run()) 
        {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }
}