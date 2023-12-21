<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		ini_set('display_errors', 0); 
		date_default_timezone_set("Asia/Jakarta");
		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);
		$this->load->library('RouterosAPI');
		//$this->load->library('apimikrotikI/MikrotikAPI');
		$this->load->library('Ppping');
		$this->load->model('Mdb');
		if ($this->session->userdata('status') != "login") {
			redirect(base_url('login'));
		}
		
		
	}
	
	public function index()
	{
		$data['routers'] = $this->Mdb->routers()->result();
		$this->load->view('home', $data);
	}
	public function reboot($ip)
	{
		$this->RouterosAPI = new RouterosAPI();
		$username = 'monitor';
		$password = 'monitor@tvip.co.id';
		$this->RouterosAPI->debug = TRUE;
		if ($this->RouterosAPI->connect($ip, $username, $password)) {
			$this->RouterosAPI->write('/system/reboot');
			$this->RouterosAPI->read();
			if ($this->RouterosAPI) {
				echo "Reboot Success!";
				$this->session->set_flashdata("success","Reboot Success!");
				redirect(base_url());
			}else{
				echo "Reboot Failed!";
				$this->session->set_flashdata("failed","Reboot Failed!");
				redirect(base_url());
			}
			$this->RouterosAPI->disconnect();

		}else{
			echo "Connection Failed!";
			$this->session->set_flashdata("error","Connection Failed!");
			redirect(base_url());
		}
	}
	public function showdhcp($ip)
	{
		$username = 'monitor';
		$password = 'monitor@tvip.co.id';
		//$this->RouterosAPI->debug = TRUE;
		if ($this->RouterosAPI->connect($ip, $username, $password)) {
			$array = $this->RouterosAPI->comm("/ip/dhcp-server/lease/print");
			$this->RouterosAPI->disconnect();
			$data['leases'] = $array;
			$this->load->view('lease', $data);
		}
	}
	public function route($ip)
	{
		$this->RouterosAPI = new RouterosAPI();
		$username = 'monitor';
		$password = 'monitor@tvip.co.id';
		//$this->RouterosAPI->debug = TRUE;
		if ($this->RouterosAPI->connect($ip, $username, $password)) {
			$array = $this->RouterosAPI->comm("/ip/route/print");
			$this->RouterosAPI->disconnect();
			$this->session->set_flashdata("address", $ip);
			$data['route'] = $array;
			$this->load->view('route', $data);
		}
	}
	public function disabled()
	{
		
		$this->RouterosAPI = new RouterosAPI();
		$username = 'monitor';
		$password = 'monitor@tvip.co.id';
		$this->RouterosAPI->debug = TRUE;
		$ip = $this->session->flashdata("address");
		/*if ($this->RouterosAPI->connect($ip, $username, $password)) {
			$this->RouterosAPI->write("/ip/route/set", false);
			$this->RouterosAPI->write("=disable=yes");
			$this->RouterosAPI->write("=.id=". $id);
			//$this->RouterosAPI->read();*/
			if ($this->RouterosAPI) {
				echo "Disabled!";
				$this->session->set_flashdata("success","Disabled!");
				redirect(base_url(). "route/" . $ip);
			}else{
				echo "Failed!";
				$this->session->set_flashdata("failed","Failed!");
				redirect(base_url(). "route/" . $ip);
			}
			$this->RouterosAPI->disconnect();
			
		//}
	}
	function tes()
	{
		$this->load->view('tes');
	}
}
