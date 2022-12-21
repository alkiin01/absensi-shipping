<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Slogin
{
    protected $CI;      
    public function __construct()
    {
    $this->CI = get_instance();
    $this->CI->load->model('Db_model');   
    }                
    public function login($username,$password)
    {
        $cek = $this->CI->db_model->login($username,$password);
        if($cek){
            $id_karyawan = $cek->id_karyawan;
            $nama = $cek->nama;
            $username = $cek->username;
            $akses_level = $cek->akses_level;
            $id_posisi = $cek->ID_POSISI;
// Create session
            $this->CI->session->set_userdata('id_karyawan',$id_karyawan);
            $this->CI->session->set_userdata('nama',$nama);
            $this->CI->session->set_userdata('username',$username);
            $this->CI->session->set_userdata('id_posisi',$id_posisi);
            $this->CI->session->set_userdata('akses_level',$akses_level);
            if($this->CI->session->userdata('akses_level')=='Admin') {
            redirect(base_url('admin/home'),'refresh');
            } else{
            redirect(base_url('presensi'),'refresh');
            }
        } else{
            $this->CI->session->set_flashdata('salah', 'Username atau password salah');
            redirect(base_url(),'refresh');
        }
    }

    public function cek_login()
    {
        if($this->CI->session->userdata('username') == ""){
            $this->CI->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }else if($this->CI->session->userdata('akses_level')!= "Admin"){
            $this->CI->session->set_flashdata('warning','Anda bukan Admin Silakan login ulang');
            redirect(base_url('presensi'),'refresh');
            
        }
    } 
    public function cek_login_absen()
    {
        if($this->CI->session->userdata('username') == ""){
            $this->CI->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    } 
    public function logout()
    {
        $this->CI->session->unset_userdata('id_karyawan');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('posisi');
        redirect(base_url(),'refresh');
    }  
    
    
}
                                                
/* End of file Slogin.php */
    
                        