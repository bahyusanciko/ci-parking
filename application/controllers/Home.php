<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
		$data['title'] = 'Dashboard';
		$data['masuk'] = $this->db->query("SELECT count(kd_masuk) FROM tbl_masuk WHERE tgl_masuk LIKE '".date('Y-m-d')."%' AND status_masuk LIKE '1'")->row_array();
		$data['keluar'] = $this->db->query("SELECT count(kd_keluar) FROM tbl_keluar WHERE tgl_jam_keluar LIKE '".date('Y-m-d')."%' AND status_keluar LIKE '1'")->row_array();
		$data['jenis'] = $this->db->query("SELECT count(kd_kendaraan) FROM tbl_kendaraan")->row_array();
		$data['admin'] = $this->db->query("SELECT count(kd_admin) FROM tbl_admin")->row_array();
		// die(print_r($data));
		$this->load->view('home', $data);
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */