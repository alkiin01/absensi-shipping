<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('db_model');
        $this->slogin->cek_login();
    }
        public function index()
        {
            $data = array(
                'title' => 'Report Data',
                'isi' => 'admin/report/index',
            );
            $this->load->view('admin/_partials/list', $data, FALSE);     
            
        }

        public function getDataAbsensi()
        {
            $absensi = $this->db_model->getDataAbsensi();
            $data = array();

            foreach($absensi as $dt){
                $ro["id_absen"] = $dt->id_absen;
                $ro["nama"] = $dt->nama_karyawan;
                $ro["tgl_absen"] = $dt->tgl_absen;
                $ro["jam_masuk"] = $dt->jam_absen;
                $ro["jam_keluar"] = $dt->jam_keluar;
            $data[] = $ro;
            }
    
        $output = array(
                "data" => $data
            );
        echo json_encode($output);       
     }
        // public function getDataGaji(){
            
        // }

        // public function filter(){
        //     $jenis = $this->input->post('jenis');
        //     $tanggal = $this->input->post('tanggal');
        //     // die($tanggal);
        //     $this->db->select('*');
        //     $this->db->from('absen');
        //     $this->db->join('karyawan','karyawan.id_karyawan=absen.id_karyawan');
        //     $this->db->where('absen.status_absen', $jenis);
        //     if ($tanggal == '') { 
        //         $data['absen']=$this->db->get()->result();
        //     } else { 
        //         $this->db->where('absen.tgl_absen', "$tanggal");
        //         $data['absen']=$this->db->get()->result();
        //     }
        //     $data['link']= base_url('admin/report/cetak/' . $jenis);
        //     $data['jenis'] = $this->input->post('jenis');
        //     $data['tanggal'] = $this->input->post('tanggal');
        //     $this->load->view('admin/report/index', $data);
        // }

        // public function cetak($ket = null)
        // {
        //     if($ket == NULL){
        //         $this->db->select('*');
        //         $this->db->from('absen');
        //         $this->db->join('karyawan','karyawan.id_karyawan=absen.id_karyawan');
        //         $data['absen']=$this->db->get()->result();
        //         $data['jenis']= "keseluruhan";
        //         $this->load->view('admin/report/cetak', $data);
        //     }else{
        //         $jenis = $ket;
        //         $this->db->select('*');
        //         $this->db->from('absen');
        //         $this->db->join('karyawan','karyawan.id_karyawan=absen.id_karyawan');
        //         $this->db->where('status_absen', $jenis);
        //         $data['absen']=$this->db->get()->result();
        //         $data['jenis']=$jenis;
        //         $this->load->view('admin/report/cetak', $data);
        //     }
        // }
}
