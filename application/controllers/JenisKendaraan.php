<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisKendaraan extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
		$data['title'] = 'Jenis Kendaraan';
		$data['jenis'] = $this->db->query("SELECT * FROM tbl_kendaraan")->result_array();
		// die(print_r($data));
		$this->load->view('JenisKendaraan', $data);
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('level');
		if ($username == '2') {
			// $this->session->sess_destroy();
			redirect('home');
		}
	}
	function get_kod(){
            $q = $this->db->query("SELECT MAX(RIGHT(kd_kendaraan,3)) AS kd_max FROM tbl_kendaraan");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "001";
            }
            return "JK".$kd;
        }
	public function tambahkendaraan(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Nama', 'required');
		$this->form_validation->set_rules('harga','Harga', 'required');
		if ($this->form_validation->run() == false) {
			// print_r($_POST);
			$data['title'] ='Tambah Jenis Kendaraan';
			$this->load->view('tambahjeniskendaraan', $data);
		}else{
			$data = array(
				'kd_kendaraan' => $this->get_kod(),
				'nama_kendaraan' => $this->input->post('nama'),
				'harga_kendaraan' => $this->input->post('harga'),
				'jenis_kendaraan' => $this->input->post('tipe'),
				'create_by_kendaraan' => $this->session->userdata('username_admin')
				 );
			// die(print_r($data));
			$this->db->insert('tbl_kendaraan', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil", "Berhasil Tambah Jenis Kendaraan", "success");');
    		redirect('jeniskendaraan');
		}
	}
	public function view($id=''){
		$sqlcek = $this->db->query("SELECT * FROM tbl_kendaraan WHERE kd_kendaraan = '".$id."'")->row_array();
				// die(print_r($sqlcek));
		if ($sqlcek) {
			$data = array(
				'kendaraan' => $sqlcek,
				'title'		=> 'VIEW'
				 );
							// die(print_r($data));
			$this->load->view('viewkendaraan', $data, FALSE);
		}else{
			$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Jenis Tidak Ada",{
                		type: "danger",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
			redirect('jeniskendaraan');	
		}
	}
}

/* End of file Kendaraan.php */
/* Location: ./application/controllers/JenisKendaraan.php */