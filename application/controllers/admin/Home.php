<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        // $this->load->helper('url');
    }
        public function index()
        {
            $kirim = $this->db_model->getPengirimanHarian();
            $absen = $this->db_model->getDataAbsensiHarian();
            $emp = $this->db_model->getTotalKaryawan();
            $dt = $this->db_model->getPengirimanDsb();
            $dta = $this->db_model->getDataAbsensiHarianTbl();
            $data = array( 
                'title' => 'Dashboard',
                'kirim' => $kirim->total,
                'absen' => $absen->total,
                'emp' => $emp->total,
                'dt'=> $dt,
                'dta' => $dta,
                'isi' => 'admin/home'
            );
            
            $this->load->view('admin/_partials/list', $data, FALSE);
        }
        
}
