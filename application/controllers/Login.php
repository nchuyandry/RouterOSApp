<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('Mdb');
		
	}
	public function index()
	{
		$this->load->view('signin');
	}
	public function dologin()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		}else{
			$u = $this->input->post('username');
			$p = $this->input->post('password');
			$data = array(
				'nik_baru' => $u,
				'password' => md5($p),
				'dept_struktur' => 'Information Communication and Technology'
			);
			$log = $this->Mdb->login($data);
			//var_dump($data);
			if ($log->num_rows() == 1) {
				$row = $log->row_array();
				$datasession = array(
					'name' => $row['nama_karyawan_struktur'],
					'status' => "login"
				);
				$this->session->set_userdata($datasession);
				$this->session->set_flashdata("success", "Welcome  ". $datasession['name']);
				redirect(base_url().'home');
			} else {
				$this->session->set_flashdata("failed","&nbsp;Login Failed!");
				redirect('login');
			}
		}
		
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}