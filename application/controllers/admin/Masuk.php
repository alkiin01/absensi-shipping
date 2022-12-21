<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller 
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
            'title' => 'Login',
            'isi' => 'masuk'
        );
        $this->load->view('admin/_partials/list', $data, FALSE);
    }
    
    public function proses(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->slogin->login($username, $password);
            redirect('admin/home');
    }
    public function keluar(){
        $this->slogin->logout();
    }   
}
