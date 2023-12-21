<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdb extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);
	}
	public function routers()
	{
		return $this->db->query('SELECT * FROM routers ORDER BY ip ASC');
	}
	public function login($data)
	{
		$query = $this->db2->where($data)->get('tbl_karyawan_struktur');
		return $query;
	}
}