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
		$data['jenis'] = $this->db->query("SELECT * FROM tbl_kendaraan WHERE jenis_kendaraan = '1'")->result_array();
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
		// die(print_r($_POST));
		$jenis = $this->input->post('jenis');
		$plat = strtoupper($this->input->post('plat'));
		$nomor = strtoupper($this->input->post('nomor'));
		$back = strtoupper($this->input->post('back'));
		$member = $this->input->post('member');
		if ($member == NULL) {
			if ($jenis) {
				$sqlcek_masuk = $this->db->query("SELECT * FROM tbl_masuk WHERE plat_masuk LIKE '".$plat." ".$nomor." ".$back."' AND status_masuk LIKE '1' ")->row_array();
			if ($sqlcek_masuk == NULL) {
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
			}else{
				$this->session->set_flashdata('alert', '$(function() {
			                $.bootstrapGrowl("Kode Plat Sudah Masuk",{
			                		type: "error",
			                        align: "right",
			                        width: "auto",
			                        allow_dismiss: false
			                });
			            	});');
				redirect('masuk');	
			}
			}else{
				$this->session->set_flashdata('alert', '$(function() {
			                $.bootstrapGrowl("Pilih Jenis Kendaraan",{
			                		type: "error",
			                        align: "right",
			                        width: "auto",
			                        allow_dismiss: false
			                });
			            	});');
				redirect('masuk');	
			}
		}else{
			$sqlcek = $this->db->query("SELECT * FROM tbl_member WHERE kd_member LIKE '".$member."'")->row_array();
			if ($sqlcek) {
				$sqlcek_masuk = $this->db->query("SELECT * FROM tbl_masuk WHERE plat_masuk LIKE '".$sqlcek['plat_member']."' AND status_masuk LIKE '1' ")->row_array();
				if ($sqlcek_masuk == NULL) {
					$data = array(
					'kd_masuk' => $this->get_kod(),
					'kd_kendaraan' => $sqlcek['kd_kendaraan'],
					'plat_masuk' 	=> $sqlcek['plat_member'],
					'tgl_masuk'		=> date('Y-m-d H:i:s'),
					'status_masuk' => 1,	
					'create_masuk' => $this->session->userdata('nama_admin')
					 );
					// die(print_r($data));
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
				}else{
					$this->session->set_flashdata('alert', '$(function() {
	                $.bootstrapGrowl("Member Sudah Masuk",{
	                		type: "error",
	                        align: "right",
	                        width: "auto",
	                        allow_dismiss: false
	                });
	            	});');
					redirect('masuk');
				}
			}else{
				$this->session->set_flashdata('alert', '$(function() {
	                $.bootstrapGrowl("Member Tidak Ada",{
	                		type: "error",
	                        align: "right",
	                        width: "auto",
	                        allow_dismiss: false
	                });
	            	});');
			redirect('masuk');
			}
		}
	}
	public function delete($id=''){
		$sqlcek = $this->db->query("SELECT * FROM tbl_masuk WHERE kd_masuk LIKE '".$id."'")->row_array();
		if ($sqlcek) {
			$this->db->where('kd_masuk', $id); 
			$this->db->delete('tbl_masuk'); 
			$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Kode Karcis Dihapus",{
                		type: "danger",
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
	public function listkendaraanmasuk($value=''){
		$data['title'] = 'List Kendaraan Yang Belum Keluar';
		$data['masuk'] = $this->db->query("SELECT * FROM tbl_masuk RIGHT JOIN tbl_kendaraan ON tbl_masuk.kd_kendaraan = tbl_kendaraan.kd_kendaraan WHERE status_masuk LIKE '1'")->result_array();
		// die(print_r($data));
		$this->load->view('listkendaraan', $data, FALSE);
	}
	public function getmember($id=''){
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('tbl_member')->like('kd_member',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'plat_member'	=>$row->plat_member,
				'nama_member'	=>$row->nama_member,
				'kd_member'	=>$row->kd_member

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */