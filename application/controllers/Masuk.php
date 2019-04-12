<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
		$data['title'] = 'Parkir Masuk';
		$data['jenis'] = $this->db->query("SELECT * FROM tbl_kendaraan")->result_array();
		$data['masuk'] = $this->db->query("SELECT * FROM tbl_masuk RIGHT JOIN tbl_kendaraan ON tbl_masuk.kd_kendaraan = tbl_kendaraan.kd_kendaraan WHERE tgl_masuk LIKE '".date('Y-m-d')."%' AND status_masuk LIKE '1'")->result_array();
		// die(print_r($data));
		$this->load->view('parkirmasuk', $data, FALSE);
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
	function get_kod(){
            $q = $this->db->query("SELECT MAX(RIGHT(kd_masuk,3)) AS kd_max FROM tbl_masuk");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%08s", $tmp);
                }
            }else{
                $kd = "001";
            }
            return "M".$kd;
        }
	public function kendaraanmasuk(){
		// print_r($_POST);
		$plat = strtoupper($this->input->post('plat'));
		$nomor = strtoupper($this->input->post('nomor'));
		$back = strtoupper($this->input->post('back'));
		$data = array(
			'kd_masuk' => $this->get_kod(),
			'kd_kendaraan' => $this->input->post('jenis'),
			'plat_masuk' 	=> $plat." ".$nomor." ".$back,
			'tgl_masuk'		=> date('Y-m-d H:i:s'),
			'status_masuk' => 1,	
			'create_masuk' => $this->session->userdata('nama_admin')
			 );
		$this->db->insert('tbl_masuk', $data);
		$data['cetak'] = $data;
		$this->load->view('cetakparkir', $data);
		$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Karcis Sudah Dibuat",{
                		type: "success",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
		redirect('masuk');
	}
	public function cetakstruk($id=''){
		$sqlcek = $this->db->query("SELECT * FROM tbl_masuk WHERE kd_masuk LIKE '".$id."'")->row_array();
		// die(print_r($sqlcek));
		if ($sqlcek) {
			$data['cetak'] = $sqlcek;
			// die(print_r($data));
			$this->load->view('cetakparkir', $data);
			$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Cetak Struk Selesai",{
                		type: "success",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
				redirect('masuk');
		}else{
			$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Kode Karcis Tidak Ada",{
                		type: "danger",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
			redirect('masuk');
		}
	}
}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */