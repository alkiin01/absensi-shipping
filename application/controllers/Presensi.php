<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Presensi extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('db_model');
        $this->slogin->cek_login_absen();
    }
public function index()
{
    $data = array(
        'title' => 'Absensi',
    );
    $this->load->view('home/absen',$data, FALSE);                   
}
public function absen(){
    $id_karyawan = $this->input->post('id_karyawan');
    $id_posisi = $this->input->post('id_posisi');
    $tgl = date('y-m-d');
    $jam = date('H:i:s');
    $masuk = $this->input->post('masuk');
    $keluar = $this->input->post('keluar');
        if($masuk == 1 ){
        $data = array(
            'id_karyawan' => $id_karyawan,
            'id_posisi '  =>$id_posisi,
            'tgl_absen' => $tgl,
            'jam_absen' => $jam,
            'masuk' => $masuk,
            'keluar' => '0',
        );
        $this->db_model->setAbsen($data);
        echo json_encode( array('success'=>true));
        }else if($keluar == 1){
            $data = array(
            'id_karyawan' => $id_karyawan,
            'id_posisi '  =>$id_posisi,
            'tgl_absen' => $tgl,
            'jam_keluar' => $jam,
            'masuk' => 1,
            'keluar' => $keluar
        );
        $this->db_model->keluar($data);
        echo json_encode( array('success'=>true));
}
    /* End of file  Presensi.php */

}
    public function cekabsenmasuk()
    {
    $id_karyawan = $this->input->post('id_karyawan');
    $cek = $this->db_model->cekAbsenMasuk($id_karyawan);
    echo json_encode($cek,true);
    }
    
}
                            