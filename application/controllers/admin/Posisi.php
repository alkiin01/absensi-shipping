<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Posisi extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->slogin->cek_login();
    }
    public function index()
    {
        $data = array(
            'title' => 'Data Posisi',
            'isi' => 'admin/posisi/index',
        );
        $this->load->view('admin/_partials/list', $data, FALSE);     
    }
public function getData(){
        $posisi = $this->db_model->getposisi();
    $data = array();
        foreach($posisi as $dt){
            $ro["ID_POSISI"] = $dt->ID_POSISI;
            $ro["POSISI"] = $dt->POSISI;
            $ro["GAPOK"] = $dt->GAPOK;
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
           $data = array(  'ID_POSISI' => $id,
           'POSISI' => $this->input->post('POSISI'),
           'GAPOK' => $this->input->post('GAPOK'),

        );
            $this->db_model->setposisi($data);
            echo json_encode( array('success'=>true));
        } else{
         $data = array( 
                'ID_POSISI' => $id,
                'POSISI' => $this->input->post('POSISI'),
                'GAPOK' => $this->input->post('GAPOK'),
                
            );
            $this->db_model->editposisi($data);
            echo json_encode(array('success' => true ));
        }
    }
public function Edit($id){
    $posisi =  $this->db_model->getposisiId($id);
     echo json_encode($posisi);
     }
public function Hapus($id){
    $data = array('id_posisi'=> $id);
    $this->db_model->hapusposisi($data);
    echo json_encode(array('success' => true ));
         }
}
        
    /* End of file  Posisi.php */
        
                            