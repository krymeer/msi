<?php
class News_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($slug = false)
    {
        if (!$slug)
        {
            $query  = $this->db->get('news');
            $news   = $query->result_array();

            for ($k = 0; $k < count($news); $k++)
            {
                $words_array = explode(' ', $news[$k]['text']);

                if (count($words_array) > 20)
                {
                    $news[$k]['text'] = implode(' ', array_slice($words_array, 0, 20)).'...';
                }
            }

            return $news;
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    public function set_news()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', true);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('news', $data);
    }
}