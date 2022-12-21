<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Db_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }           

#region LOGIN KARYAWAN
    public function setKaryawan($data){
         $this->db->insert('karyawan', $data);
    }
    public function getKaryawan(){
        $this->db->select('karyawan.*,posisi.ID_POSISI,posisi.POSISI');
        $this->db->from('karyawan');
        $this->db->join('posisi','posisi.ID_POSISI = karyawan.ID_POSISI', 'left');  
        $query = $this->db->get();
		return $query->result();
       }
    public function getKaryawanId($id_karyawan){
        $this->db->select('karyawan.*,posisi.ID_POSISI,posisi.POSISI');
        $this->db->from('karyawan');
        $this->db->join('posisi','posisi.ID_POSISI = karyawan.ID_POSISI', 'left');  
		$this->db->where('id_karyawan',$id_karyawan);
		$query = $this->db->get();
		return $query->row();
    }
     public function hapusKaryawan($data){
        $this->db->where('id_karyawan',$data['id_karyawan']);
		$this->db->delete('karyawan',$data);    
    }
     public function editKaryawan($data){
        $this->db->where('id_karyawan', $data['id_karyawan']);        
        $this->db->update('karyawan', $data);     
    }
    public function getTotalKaryawan(){
        $this->db->select('count(*) as total');
        $this->db->from('karyawan');
		$query = $this->db->get();
		return $query->row();
    }
#endregion

#region PENGIRIMAN
public function setPengiriman($data)
{
    $this->db->insert('pengiriman', $data);
}
 public function getPengiriman(){
    $this->db->select('pengiriman.*,karyawan.*,posisi.ID_POSISI,posisi.POSISI ');
    $this->db->from('pengiriman');
    $this->db->join('posisi','posisi.ID_POSISI = pengiriman.ID_POSISI', 'left');  
    $this->db->join('karyawan','karyawan.id_karyawan = pengiriman.id_karyawan', 'left');  
    $query = $this->db->get();
    return $query->result();    
 }
 public function editPengiriman($data){ 
    $this->db->where('id_pengiriman', $data['id_pengiriman']);        
    $this->db->update('pengiriman', $data);     
}
public function getPengirimanId($id_pengiriman){
    $this->db->select('pengiriman.*,karyawan.*,posisi.ID_POSISI,posisi.POSISI ');
    $this->db->from('pengiriman');
    $this->db->join('posisi','posisi.ID_POSISI = pengiriman.ID_POSISI', 'left');  
    $this->db->join('karyawan','karyawan.id_karyawan = pengiriman.id_karyawan', 'left');  
    $this->db->where('id_pengiriman',$id_pengiriman);
    $query = $this->db->get();
    return $query->row();
}
public function hapusPengiriman($data){
    $this->db->where('id_pengiriman',$data['id_pengiriman']);
    $this->db->delete('pengiriman',$data); 
}
public function getPengirimanHarian()
{
    $this->db->select('COALESCE(SUM(shipment),0) total ');
    $this->db->from('pengiriman');
    $this->db->where('tanggal',date('y-m-d'));
    $query = $this->db->get();
    return $query->row();
}
public function getPengirimanDsb()
{
    $this->db->select('b.nama,SUM(a.shipment) as shipment, SUM(a.pickup) as pickup ');
    $this->db->from('pengiriman as a');
    $this->db->join('karyawan as b ','b.id_karyawan = a.id_karyawan', 'left');  
    $this->db->where('month(a.tanggal)',date('m'));
    $this->db->group_by('b.nama');
    $query = $this->db->get();
    return $query->result();
}
 #endregion
#region ABSEN
    public function setAbsen($data){
        $this->db->insert('absen', $data);
    }
    public function keluar($data){
        $this->db->where('id_karyawan', $data['id_karyawan']);        
        $this->db->where('tgl_absen', date('y-m-d') );        
        $this->db->update('absen', $data );      
     }
    public function cekAbsenMasuk($id_karyawan)
    {
        $this->db->select('absen.masuk,absen.keluar');
        $this->db->from('absen');
        $this->db->where('tgl_absen', date('y-m-d'));
        $this->db->where('masuk', 1);
        $this->db->where('id_karyawan', $id_karyawan);
        $query = $this->db->get();
		return $query->row();
    }
    public function getDataAbsensiHarian()
    {
        $this->db->select('COUNT(*) as total');
        $this->db->from('absen');
        $this->db->order_by('tgl_absen', 'asc');
        $this->db->where('tgl_absen', date('y-m-d'));

        $query = $this->db->get();
        return $query->row();
    } public function getDataAbsensiHarianTbl()
    {
        $this->db->select('b.nama, a.jam_absen');
        $this->db->from('absen as a');
        $this->db->join('karyawan as b ','b.id_karyawan = a.id_karyawan', 'left');  
        $this->db->order_by('tgl_absen', 'asc');
        $this->db->where('tgl_absen', date('y-m-d'));
        $query = $this->db->get();
        return $query->result();
    }
#endregion

#region REPORT
    public function getDataAbsensi(){
        $this->db->select('absen.*,karyawan.nama AS nama_karyawan,posisi.POSISI as posisi');
        $this->db->from('absen as absen');
        $this->db->join('karyawan', 'absen.id_karyawan = karyawan.id_karyawan', 'left');
        $this->db->join('posisi', 'posisi.ID_POSISI = absen.ID_POSISI', 'left');
        $this->db->order_by('tgl_absen', 'asc');
        $query = $this->db->get();
        return $query->result();
        }
    public function getDataGaji($data){
        $this->db->select('a.id_karyawan, `a`.`nama`,b.jumlah_masuk ,case when sum(d.shipment) != 0 then (d.shipment * 1500) else c.GAPOK END as gapok, COALESCE(sum(d.shipment),0) as shipment,COALESCE(sum(d.pickup),0) as pickup , COALESCE((d.shipment * 200),0) as insentif_shipment, COALESCE((d.pickup * 200),0) as insentif_pickup, 0 as `BPJS`, 0 as `hold_sallary`, 0 as `lembur`, 0 `kehadiran`, 0 as `thp`, 
        case when month(d.tanggal) !=0 then month(d.tanggal) else b.tgl_absen end as bulan ');
        $this->db->from('karyawan as a');
        $this->db->join('(select a.id_karyawan,a.nama, COUNT(b.masuk) as jumlah_masuk,month(b.tgl_absen) AS tgl_absen
        from karyawan a left join absen b on b.id_karyawan = a.id_karyawan
       group by a.id_karyawan,a.nama, month(b.tgl_absen)
       ) b','b.id_karyawan = a.id_karyawan','left' );
        $this->db->join('posisi as c', 'c.ID_POSISI = a.ID_POSISI', 'left');
        $this->db->join('pengiriman as d', 'd.id_karyawan = a.id_karyawan', 'left');
        $this->db->join('penggajian as e', 'e.id_karyawan = a.id_karyawan', 'left');
        $this->db->where('month(d.tanggal)', $data);
        $this->db->or_where('b.tgl_absen',$data );

        $this->db->group_by('b.id_karyawan,b.nama,c.ID_POSISI,e.id_penggajian,b.tgl_absen');
        $query = $this->db->get();
        return $query->result();
    }
#endregion

#region LOGIN KARYAWAN
        public function setPosisi($data){
            $this->db->insert('Posisi', $data);
        }
        public function getPosisi(){
        $this->db->order_by('posisi', 'asc');
        $query = $this->db->get('Posisi');
        return $query->result();
        }
        public function getPosisiId($id_Posisi){
        $this->db->select('*');
        $this->db->from('Posisi');
        $this->db->where('ID_POSISI',$id_Posisi);
        $query = $this->db->get();
        return $query->row();
        }
        public function hapusPosisi($data){
        $this->db->where('ID_POSISI',$data['id_posisi']);
        $this->db->delete('Posisi',$data);    
        }
        public function editPosisi($data){
        $this->db->where('id_Posisi', $data['id_posisi']);        
        $this->db->update('Posisi', $data);     
        }
        #endregion
    
   public function login($username,$password)
    {
        $this->db->select('karyawan.*,posisi.ID_POSISI,posisi.POSISI as akses_level');
        $this->db->from('karyawan');
        $this->db->join('posisi','posisi.ID_POSISI = karyawan.ID_POSISI', 'left'); 
        $this->db->where(array('username'=>$username,
                                'password'=>md5($password)));    
        $this->db->order_by('id_karyawan', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
       
                        
                            
                        
}
                        
/* End of file Db_model.php */
    
                        