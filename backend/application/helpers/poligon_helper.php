<?php
if (!function_exists('list_berkas')) {
    function list_berkas(){
        $CI =& get_instance();
        $CI->load->model('pmb/m_berkas');
        $berkas = $CI->m_berkas->get_all();
        if (!empty($berkas)) {
            foreach ($berkas as $b) {
                $berkas_b[''] = 'Status Berkas';
                $berkas_b[$b->id_pendaftar] = $b->berkas;
            }
        }
        return $berkas_b;
    }
}
if (!function_exists('list_gol_darah')) {
    function list_gol_darah(){
        $CI = & get_instance();
        $CI->load->model('pmb/m_golongan_darah');
        $gol_darah = $CI->m_golongan_darah->get_all();
        if (!empty($gol_darah)) {
            foreach ($gol_darah as $d) {
                $listgd['']='Pilih Golongan Darah';
                $listgd[$d->id_golongan_darah] = $d->golongan_darah;
            }
        }
        return $listgd;
    }
}
if(!function_exists('list_verivikasi')){
    function list_verivikasi(){
        $verifikasi = array(
            '' => 'Status Verifikasi',
            '0'=> 'Belum diVerifiaksi',
            '1'=> 'diVerifiaksi'
            );
        return $verifikasi;
    }
}

if (!function_exists('list_sberkas')) {
    function list_sberkas(){
        $sberkas = array(
            ''  => 'Status Berkas',
            '0' => 'Belum Lengkap',
            '1' => 'Lengkap',
            );
        return $sberkas;
    }
}

if (!function_exists('list_sseleksi')) {
    function list_sseleksi(){
        $sseleksi = array(
            '' => 'Status Seleksi',
            '0' => 'Tidak Lulus',
            '1' => 'Lulus',
            );
        return $sseleksi;
    }
}


if (!function_exists('list_gender')) {
    function list_gender(){
        $CI = & get_instance();
        $CI->load->model('pmb/m_gender');
        $gender = $CI->m_gender->get_all();
        if (!empty($gender)) {
            foreach ($gender as $g) {
                $listg['']='Jenis Kelamin';
                $listg[$g->id_gender] = $g->gender;
            }
        }
        return $listg;
    }
}
if (!function_exists('list_pendidikan')) {
    function list_pendidikan(){
        $CI = & get_instance();
        $CI->load->model('pmb/m_pendidikan');
        $pendidikan = $CI->m_pendidikan->get_all();
        if (!empty($pendidikan)) {
            foreach ($pendidikan as $p) {
                $listp['']='Pendidikan';
                $listp[$p->id_pendidikan] = $p->pendidikan;
            }
        }
        return $listp;
    }
}
if (!function_exists('list_jurusan')) {
    function list_jurusan(){
        $CI = & get_instance();
        $CI->load->model('pmb/m_jurusan');
        $jurusan = $CI->m_jurusan->get_all();
        if (!empty($jurusan)) {
            foreach ($jurusan as $j) {
                $listj['']='Pilih Jurusan';
                $listj[$j->id_jurusan] = $j->jurusan;
            }
        }
        return $listj;
    }
}
if (!function_exists('list_agama')) {
    function list_agama(){
        $CI = & get_instance();
        $CI->load->model('pmb/m_agama');
        $agama = $CI->m_agama->get_all();
        if (!empty($agama)) {
            foreach ($agama as $a) {
                $lista['']='Pilih Agama';
                $lista[$a->id_agama] = $a->agama;
            }
        }
        return $lista;
    }
}
if (!function_exists('list_perkawinan')) {
    function list_perkawinan(){
        $status_perkawinan = array(
            ''=>'Status Perkawinan',
            '0'=>'Belum Menikah',
            '1'=> 'Menikah'
            );
        return $status_perkawinan;
    }
}
if (!function_exists('list_penghasilan')) {
    function list_penghasilan(){
        $penghasilan = array(
            ''=>'Penghasilan',
            '0'=>'<1 Juta',
            '1'=> '1-2.5 Juta',
            '2'=>'2.5-5 Juta',
            '3'=>'>5 Juta'
            );
        return $penghasilan;
    }
}
if (!function_exists('list_active')) {
    function list_active(){
        $data_active = array(
            '0' => 'Verifikasi Email',
            '1' => 'Formulir',
            '2' => 'Upload Berkas',
            '3' => 'Ujian',
            '4' => 'Selesai Ujian',
            );
        return $data_active;
    }
}

if (!function_exists('list_tahun_ajaran')) {
    function list_tahun_ajaran(){
        $CI =& get_instance();

         $CI->load->model('pmb/m_tahun_ajaran');
         $tahun_ajaran = $CI->m_tahun_ajaran->get_all();
        if (!empty($tahun_ajaran)) {
            foreach ($tahun_ajaran as $tj) {
                $tahun[''] = 'Pilih Tahun Ajaran';
                $tahun[$tj->id_tahun_ajaran] = $tj->tahun;
            }
        }
        return $tahun;
    }
}

if (!function_exists('list_nama_pendaftar')) {
    function list_nama_pendaftar(){
        $CI =& get_instance();

         $CI->load->model('pmb/m_calonpendaftar');
         $nama_pendaftar = $CI->m_calonpendaftar->get_all();
        if (!empty($nama_pendaftar)) {
            foreach ($nama_pendaftar as $n) {
                $nama[''] = 'Nama Pendaftar';
                $nama[$n->id_pendaftar] = $n->nama;
            }
        }
        return $nama;
    }
}

if (!function_exists('list_level')) {
    function list_level(){
        $level = array(
            '' => 'Pilih Level',
            '0' => 'Administrator',
            '1' => 'Panitia',
            );
        return $level;
    }
}