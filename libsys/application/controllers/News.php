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
        $date               = explode(' ', $news['news_date']);
        $dmy                = explode('-', $date[0]);
        $hms                = explode(':', $date[1]);
        $news['news_date']  = $dmy[2].' '.$this->lang->line('months_genitives')[(int)$dmy[1]-1].' '.$dmy[0].' '.$this->lang->line('year_genitive').', '.$this->lang->line('hour_abbreviated').' '.(int)$hms[0].':'.$hms[1];

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
        $data['news_item']  = $this->news_model->get_news(urldecode($slug))->row_array();

        if (empty($data['news_item']))
        {
            show_libsys_error(404);
        }
        else
        {
            $data['news_item']  = $this->get_full_date($data['news_item']);
            $data['title']      = $this->lang->line('news__title');
            echo link_tag(asset_url().'css/news_item.css');

            $this->load->view('templates/header', $data);
            $this->load->view('news/view', $data);
            $this->load->view('templates/footer');
        }
    }

    public function create()
    {
        if ($this->session->is_librarian)
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            echo link_tag(asset_url().'css/news_create.css');

            $data['title'] = $this->lang->line('news__title');

            $this->form_validation->set_rules(
                'news_title', 
                $this->lang->line('news__section_add_form_label_1'), 
                'required|min_length[4]|max_length[48]',
                array(
                    'required'      => $this->lang->line('news__section_add_form_label_1__err_req'),
                    'min_length'    =>  sprintf($this->lang->line('news__section_add_form_label_1__min_len'), '{param}'),
                    'max_length'    =>  sprintf($this->lang->line('news__section_add_form_label_1__max_len'), '{param}')
                )
            );
            $this->form_validation->set_rules(
                'news_text',
                $this->lang->line('news__section_add_form_label_2'),
                'required|min_length[50]|max_length[10000]',
                array(
                    'required'      => $this->lang->line('news__section_add_form_label_2__err_req'),
                    'min_length'    =>  sprintf($this->lang->line('news__section_add_form_label_2__min_len'), '{param}'),
                    'max_length'    =>  sprintf($this->lang->line('news__section_add_form_label_2__max_len'), '{param}')
                )
            );

            if (!$this->form_validation->run()) 
            {
                $this->load->view('templates/header', $data);
                $this->load->view('news/create');
                $this->load->view('templates/footer');
            }
            else
            {
                $this->news_model->set_news();
                $this->session->set_flashdata('news_status', 'success');
                redirect('news/create');
            }
        }
        else
        {
            redirect('news');
        }
    }
}