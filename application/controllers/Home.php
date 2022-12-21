<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('slogin');
    }
        public function index()
        {
        $data = array( 
            'title' => 'Login'
            );
        $this->load->view('home/index', $data, FALSE);
        }
        public function login() {
          $this->form_validation->set_rules('username', 'Username', 'required',
          array('required' => '%s Harus diisi'));
        $this->form_validation->set_rules('password', 'Password', 'required', 
          array('required'=> '%s Harus diisi'));
        
          if ($this->form_validation->run()){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->slogin->login($username, $password);
          }
        }
        
        public function absen($ket){
            $data['keterangan'] = $ket;
            $this->load->view('home/absen', $data);
        }
        
        public function isi()
        {
        date_default_timezone_set('Asia/Jakarta');
         $tgl = date('Y-m-d');
          $jam = date('H:i:s');
          $keterangan = $this->input->post('keterangan');
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          $lat = $this->input->post('lat');
          $long = $this->input->post('long');
          $lat_kantor="-6.2944904107282404";
          $long_kantor="107.29481637863145";
          $jarak=$this->distance($lat, $long, $lat_kantor, $long_kantor, "k");
          
          $cari =$this->db->get_where('karyawan', array('username' => $username, 'password' => md5($password)))->result();
          $id_karyawan=$cari[0]->id_karyawan;
          $data=array(
            'id_karyawan' => $id_karyawan,
            'tgl_absen' => $tgl,
            'jam_absen' => $jam,
            'lat' => $lat,
            'long' => $long,
            'status_absen' => $keterangan,
          );
          $this->db->insert('absen', $data);
          $this->session->set_flashdata('success', 'absensi ' . $keterangan . ' berhasil disimpan!');
          redirect('home');
        }
        function distance($lat1, $lon1, $lat2, $lon2, $unit)
        {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));     
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);

          if ($unit == "K") {
              return ($miles * 1609344);
          }else if ($unit == "N") {
              return ($miles * 0.8684);
          }else {
            return $miles;
          }
        } 
} 
