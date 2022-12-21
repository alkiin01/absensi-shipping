<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Pengiriman extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('db_model');
        $this->slogin->cek_login();
    }
    public function index()
    {
        $data = array(
            'title' => 'Pengiriman',
            'isi' => 'admin/pengiriman/index',
        );
        $this->load->view('admin/_partials/list', $data, FALSE);     

    }
    public function getData (){
        $pengiriman = $this->db_model->getPengiriman();
        $data = array();
        foreach($pengiriman as $dt){
            $ro["id_pengiriman"] = $dt->id_pengiriman;
            $ro["nama"] = $dt->nama;
            $ro["posisi"] = $dt->POSISI;
            $ro["shipment"] = $dt->shipment;
            $ro["pickup"] = $dt->pickup;
            $ro["tanggal"]= $dt->tanggal;
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
           $data = array(  'id_pengiriman' => $id,
           'id_karyawan' => $this->input->post('id_karyawan'),
           'id_posisi' => $this->input->post('id_posisi'),
           'shipment' => $this->input->post('shipment'),
           'pickup' => $this->input->post('pickup'),
           'tanggal' => $this->input->post('tanggal'),
        );
            $this->db_model->setPengiriman($data);
            echo json_encode( array('success'=>true));
        } else{
            $data = array(  'id_pengiriman' => $id,
            'id_karyawan' => $this->input->post('id_karyawan'),
            'id_posisi' => $this->input->post('id_posisi'),
            'shipment' => $this->input->post('shipment'),
            'pickup' => $this->input->post('pickup'),
            'tanggal' => $this->input->post('tanggal'),
            );
            $this->db_model->editPengiriman($data);
            echo json_encode(array('success' => true ));
        }
    }
    public function edit($id){
        $posisi =  $this->db_model->getPengirimanId($id);
        echo json_encode($posisi);    
    }
    public function Hapus($id){
        $data = array('id_pengiriman'=> $id);
        $this->db_model->hapusPengiriman($data);
        echo json_encode(array('success' => true ));
    }
    public function getKaryawan(){
        $posisi = $this->db_model->getKaryawan();
        echo json_encode($posisi);
    }
}
        
    /* End of file  pengiriman.php */
        
                            