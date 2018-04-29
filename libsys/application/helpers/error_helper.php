<?php
    function show_libsys_error($code)
    {
        $CI =& get_instance();

        $data['error_code'] = $code;
        $data['title']      = $CI->lang->line('error__title');

        $CI->load->view('templates/header', $data);
        $CI->load->view('pages/'.$code, $data);
        $CI->load->view('templates/footer', $data);
    }