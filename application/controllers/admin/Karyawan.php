<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('db_model');
        $this->slogin->cek_login();
    }
    public function index()
    {
            // $this->load->view('admin/karyawan/index');
            $data = array(
                'title' => 'Data Karyawan',
                'isi' => 'admin/karyawan/index',
            );
            $this->load->view('admin/_partials/list', $data, FALSE);     
    }
    public function getData(){
        $karyawan = $this->db_model->getKaryawan();
    $data = array();

        foreach($karyawan as $dt){
            $ro["id_karyawan"] = $dt->id_karyawan;
            $ro["nama"] = $dt->nama;
            $ro["jenkel"] = $dt->jenkel;
            $ro["tlp"] = $dt->tlp;
            $ro["alamat"] = $dt->alamat;
            $ro["tanggal_masuk"] = $dt->tanggal_masuk;
            $ro["tanggal_keluar"] = $dt->tanggal_keluar;
            $ro["username"] = $dt->username;
            $ro["posisi"]=$dt->POSISI;
        $data[] = $ro;
        }

    $output = array(
            "data" => $data
        );
    echo json_encode($output);
    }
     public function tambah($id){
        $id =  $this->input->post('id');
        if($id == 0 ){
           $data = array( 'nama' => $this->input->post('nama'),
            'jenkel' => $this->input->post('jenkel'),
            'tlp' => $this->input->post('tlp'),
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'password'=> md5($this->input->post('password')),
            'ID_POSISI' => $this->input->post('akses_level'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'tanggal_keluar' => $this->input->post('tanggal_keluar')

        );
            $this->db_model->setKaryawan($data);
            echo json_encode( array('success'=>true));
        } else{
            if (strlen( $this->input->post('password')) > 6){
         $data = array( 
                'id_karyawan' => $id,
                'nama' => $this->input->post('nama'),
                'jenkel' => $this->input->post('jenkel'),
                'tlp' => $this->input->post('tlp'),
                'alamat' => $this->input->post('alamat'),
                'username' => $this->input->post('username'),
                'password'=> md5($this->input->post('password')),
                'ID_POSISI' => $this->input->post('akses_level'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'tanggal_keluar' => $this->input->post('tanggal_keluar')
            );
            $this->db_model->editKaryawan($data);
            echo json_encode(array('success' => true ));
        } else{
        $data = array( 
                'id_karyawan' => $id,
                'nama' => $this->input->post('nama'),
                'jenkel' => $this->input->post('jenkel'),
                'tlp' => $this->input->post('tlp'),
                'alamat' => $this->input->post('alamat'),
                'username' => $this->input->post('username'),
                'ID_POSISI' => $this->input->post('akses_level'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'tanggal_keluar' => $this->input->post('tanggal_keluar')
        );
            $this->db_model->editKaryawan($data);
            echo json_encode(array('success' => true ));
        }
        }
    }
    public function Edit($id){
       $karyawan =  $this->db_model->getKaryawanId($id);
      
    echo json_encode($karyawan);
    }
        public function Hapus($id){
            $data = array('id_karyawan'=> $id);
            $this->db_model->hapusKaryawan($data);
            echo json_encode(array('success' => true ));
        }
    public function getDataPosisi(){
        $posisi = $this->db_model->getposisi();
        $data = array();
            foreach($posisi as $dt){
                $ro["ID_POSISI"] = $dt->ID_POSISI;
                $ro["POSISI"] = $dt->POSISI;
                $ro["GAPOK"] = $dt->GAPOK;
            $data[] = $ro;
            }
    
        $output = array('data'=>$data);
        $json =  json_encode($output);
        echo json_encode($json,true);
      
    }   
       
       
        // public function subah($id_karyawan){
        //     $nama = $this->input->post('nama');
        //     $kelamin = $this->input->post('kelamin');
        //     $tlp = $this->input->post('tlp');
        //     $alamat = $this->input->post('alamat');
        //     $username = $this->input->post('username');
        //     $password = $this->input->post('password');
        //     $data = array(  'id_karyawan' => $id_karyawan,
        //             'nama' => $nama,
        //             'jenkel' => $kelamin,
        //             'tlp' => $tlp,
        //             'alamat' => $alamat,
        //             'username' => $username,
        //             );
        //             $this->db_model->editKaryawan($data);
        //             $this->session->set_flashdata('sukses', 'Data Berhasil Diubah');
        //             redirect(base_url('gejala'),'refresh');
          
              
        // }
        // public function hapus($id)
        // {
        //     $this->db->where('id_karyawan',$id);
        //     $this->db->delete('karyawan');
        //     $this->session->set_flashdata('success','Berhasil dihapus!');
        //     redirect('admin/karyawan');
        // }   


}
