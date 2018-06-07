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
            $q      = 'SELECT * FROM news ORDER BY news_date DESC';
            $news   = $this->db->query($q)->result_array();

            for ($k = 0; $k < count($news); $k++)
            {
                $words_array = explode(' ', $news[$k]['news_text']);

                if (count($words_array) > 20)
                {
                    $news[$k]['news_text'] = implode(' ', array_slice($words_array, 0, 20)).'...';
                }
            }

            return $news;
        }

        $q = 'SELECT * FROM news WHERE news_slug = ?';
        return $this->db->query($q, $slug);
    }

    public function set_news()
    {
        $this->load->helper('url');
        $this->load->helper('text_helper');
        $title      = htmlentities($this->input->post('news_title'));
        $text       = nl2br(htmlentities($this->input->post('news_text')));
        $author     = $this->session->user_id;
        $id         = 1;
        $q          = 'SELECT MAX(news_id) AS max_id FROM news';
        $r          = $this->db->query($q)->result();

        if (!empty($r) && is_numeric($r[0]->max_id))
        {
            $id += intval($r[0]->max_id);
        }

        $slug       = url_title(convert_accented_characters($title).' '.$id, 'dash', true);
        $q          = 'INSERT INTO news (news_title, news_author, news_slug, news_text) VALUES (?, ?, ?, ?)';
        return $this->db->query($q, array($title, $author, $slug, $text));
    }
}