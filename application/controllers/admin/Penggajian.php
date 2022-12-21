<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Penggajian extends CI_Controller {

public function index()
{   
    $data = array(
        'title' => 'Laporan Data Gaji Karyawan',
        'isi' => 'admin/pengiriman/penggajian',
    );
    $this->load->view('admin/_partials/list', $data, FALSE);     
}
public function getDataGaji($bulan)
{
    $pengiriman = $this->db_model->getDataGaji($bulan);
    $data = array();
    foreach($pengiriman as $dt){
        $ro["id_karyawan"] = $dt->id_karyawan;
        $ro["nama"] = $dt->nama;
        $ro["jumlah_masuk"] = $dt->jumlah_masuk;
        $ro["gapok"] = $dt->gapok;
        $ro["shipment"] = $dt->shipment;
        $ro["pick_up"] = $dt->pickup;
        $ro["insentif_shipment"] = $dt->insentif_shipment;
        $ro["insentif_pickup"]= $dt->insentif_pickup;
        $ro["BPJS"]= $dt->BPJS;
        $ro["hold_sallary"]= $dt->hold_sallary;
        $ro["lembur"]= $dt->lembur;
        $ro["kehadiran"]= $dt->kehadiran;
        $ro["thp"]= ($dt->gapok + $dt->insentif_shipment + $dt->insentif_pickup + $dt->BPJS+ $dt->lembur + $dt->kehadiran + $dt->hold_sallary);
        $ro["bulan"]= $dt->bulan;
    $data[] = $ro;
    }
$output = array(
        "data" => $data
    );
echo json_encode($output);}
}    
        
    /* End of file  Penggajian.php */
        
                            