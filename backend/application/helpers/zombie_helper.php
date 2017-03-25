<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('auto_inc')){
    function auto_inc($model_name,$pk){
    $CI = & get_instance();
    $id = $CI->$model_name->get_last_id();
        if (!empty($id)) {
            $idd = $id->$pk + 1;
        } else {
            $idd = '1';
        }
        return $idd;
    }
}


if (!function_exists('uid')){
    function uid(){
        return random_string('numeric',10);
    }
}

if (!function_exists('multiple_list')){
    function multiple_list($models,$pk,$name){
         $CI = & get_instance();
         $get = $CI->$models->get_all();
            if (!empty($get)){
                foreach ($get as $val) {
                    $list[$val->$pk] = $val->$name;
                }
            }else{
                $list[''] = "Tidak ada data";
            }
            return $list;
    }
}

if (!function_exists('drop_list')){
    function drop_list($models,$pk,$name,$label,$method=NULL,$param=NULL){
        $CI = & get_instance();
        if ($method === NULL){
            $get = $CI->$models->get_all();
            if (!empty($get)){
                foreach ($get as $val) {
                    $list[''] = $label;
                    $list[$val->$pk] = $val->$name;
                }
            }else{
                $list[''] = "Tidak ada data";
            }
            return $list;
        }

        if ($param === NULL){
            $get = $CI->$models->$method();
            if (!empty($get)){
                foreach ($get as $val) {
                    $list[''] = $label;
                    $list[$val->$pk] = $val->$name;
                }
            }else{
                $list[''] = "Tidak ada data";
            }
            return $list;
        }

        $get = $CI->$models->$method($param);
        if (!empty($get)){
            foreach ($get as $val) {
                $list[''] = $label;
                $list[$val->$pk] = $val->$name;
            }
        }else{
            $list[''] = "Tidak ada data";
        }
        return $list;
    }
}

if (!function_exists('send_mail_confirm')){
    function send_mail_confirm($email,$subject,$message){
        $CI =& get_instance();
        $config = array();
        $config['charset'] = 'utf-8';
        $config['useragent'] = 'Codeigniter';
        $config['protocol'] = "smtp";
        $config['mailtype'] = "html";
        $config['smtp_host'] = MAIL_HOST;
        $config['smtp_port'] = MAIL_PORT;
        $config['smtp_timeout'] = "400";
        $config['smtp_user'] = MAIL_USER;
        $config['smtp_pass'] = MAIL_PASS;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
        $CI->email->initialize($config);
        $CI->email->from($config['smtp_user']);
        $CI->email->to($email);
        $CI->email->subject($subject);
        $CI->email->message($message);
        if ($CI->email->send() == TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('get_menu')){
    function get_menu($level){
        $CI = & get_instance();
        $cek_level = $CI->m_level->get_by(array('id_level_user'=>$level));
        if ($cek_level->level_user === 'admin'){
            return $CI->m_menu->get_all('asc');
        }else{
             $sql = "select * from v_hak_akses where level_id = '$level'";
             $menu = $CI->db->query($sql)->result();
        }
        return $menu;
    }
}

if (!function_exists('cek_role')){
    function cek_role($level,$prm){
        $CI = & get_instance();
        $cek_level = $CI->m_level->get_by(array('id_level_user'=>$level));
        if ($cek_level->level_user === 'admin'){
            return true;
        }
        $sql = "select * from v_hak_akses where level_id = '$level' and menu = '$prm' ";
        $menu = $CI->db->query($sql)->row();
        if (!empty($menu)){
            return true;
        }
        return FALSE;
    }
}

if (!function_exists('query_sql')){
    function query_sql($sql,$type = NULL){
        $CI = & get_instance();
        if ($type === NULL){
            return $CI->db->query($sql)->result();
        }
        return $CI->db->query($sql)->$type();
    }
}

if (!function_exists('get_front')) {

    function get_front($kat, $except = FALSE) {
        $CI = & get_instance();
        $CI->load->model('berita/m_berita');
        $one_art = $CI->m_berita->get_artikel($kat, $except);
        return $one_art;
    }

}
if (!function_exists('get_kat')) {

    function get_kat($kat) {
        $CI = & get_instance();
        $CI->load->model('kategori/m_kategori');
        $kategori = $CI->m_kategori->get_by(array('kategori' => $kat));
        return $kategori->id_kategori;
    }

}

if (!function_exists('jumlah_komentar')) {
    function jumlah_komentar($id) {
        $CI = & get_instance();
        $CI->load->model('komentar/m_komentar');
        $jml = $CI->m_komentar->get_jml_komen($id);
        return $jml;
    }

}

if (!function_exists('widget')) {
    function widget($model,$func = FALSE){
       $CI = & get_instance(); 
       if ($func == FALSE) {
           return $CI->$model->get_all();
       }

       return $CI->$model->$func();

    }
}

if (!function_exists('get_map')){
    function get_map(){
    $CI = & get_instance();
    $config['center'] = '0.560654, 123.059684';
    $config['zoom'] = '15';
    $CI->googlemaps->initialize($config);
    $marker = array();
    $marker['position'] = '0.560654, 123.059684';
    $marker['infowindow_content'] = '<div style="color:#000">BAPPEDA KOTA GORONTALO</div>';
    $marker['map_type'] = 'satellite';
    // $marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
    $CI->googlemaps->add_marker($marker);
    return $CI->googlemaps->create_map();
    }   
}

