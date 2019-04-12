<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
	function get_kod(){
            $q = $this->db->query("SELECT MAX(RIGHT(kd_keluar,3)) AS kd_max FROM tbl_keluar");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%08s", $tmp);
                }
            }else{
                $kd = "001";
            }
            return "K".$kd;
        }
	public function index(){
		$data['title'] = 'Parkir Keluar';
		$data['keluar'] = $this->db->query("SELECT * FROM tbl_keluar RIGHT JOIN tbl_masuk ON tbl_keluar.kd_masuk = tbl_masuk.kd_masuk WHERE tgl_jam_keluar LIKE '".date('Y-m-d')."%' AND status_keluar LIKE '1'")->result_array();
		// die(print_r($data));
		$this->load->view('parkirkeluar', $data, FALSE);
	}
	public function kendaraankeluar($value=''){
		$kode = str_replace("'","",$this->input->post('karcis'));
		$sqlcek = $this->db->query("SELECT * FROM tbl_masuk RIGHT JOIN tbl_kendaraan ON tbl_masuk.kd_kendaraan = tbl_kendaraan.kd_kendaraan WHERE kd_masuk LIKE '".$kode."'")->row_array();
		if ($sqlcek) {
			if ($sqlcek['status_masuk'] == '1') {
				$awal  = strtotime($sqlcek['tgl_masuk']); //waktu awal
				$akhir = strtotime(date('Y-m-d H:i:s')); //waktu akhir
				$diff  = $akhir - $awal;
				$jam   = floor($diff / (60 * 60));
				$menit = $diff - $jam * (60 * 60);
				if ($jam == 0) {
					$total = 1*$sqlcek['harga_kendaraan'];
				}else{
					$total = ($jam+1)*$sqlcek['harga_kendaraan'];
				}
				$where = array('kd_masuk' => $kode );
				$update = array('status_masuk' => 2 );
				$this->db->update('tbl_masuk', $update, $where);
				$data = array(
					'kd_keluar' => $this->get_kod(),
					'kd_masuk'	=> $kode,
					'tgl_jam_masuk' => $sqlcek['tgl_masuk'],
					'tgl_jam_keluar' => date("Y-m-d H:i:s",$akhir),
					'lama_parkir_keluar' =>  $jam .  ' Jam,' . floor( $menit / 60 ) . ' Menit',
					'tarif_keluar' => $sqlcek['harga_kendaraan'],
					'total_keluar' => $total,
					'status_keluar' => 1,
					'create_keluar' => $this->session->userdata('nama_admin')
					 );
				// die(print_r($data));
				$this->db->insert('tbl_keluar', $data);
				$data['cetak'] = $data;
				$data['tipe'] = $this->db->query("SELECT * FROM tbl_kendaraan WHERE kd_kendaraan = '".$sqlcek['kd_kendaraan']."'")->row_array();
				// die(print_r($data));
				$this->load->view('strukparkir', $data);
				$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Karcis Keluar Selesai",{
                		type: "success",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
				redirect('keluar');
			}else{
				$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Kode Karcis Sudah Keluar parkir",{
                		type: "danger",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
			redirect('keluar');
			}
		}else{
			$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Kode Karcis Tidak Ada",{
                		type: "danger",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
			redirect('keluar');
		}
	}
	public function cetakstruk($id=''){
		$sqlcek = $this->db->query("SELECT * FROM tbl_keluar RIGHT JOIN tbl_masuk ON tbl_masuk.kd_masuk = tbl_masuk.kd_masuk WHERE kd_keluar LIKE '".$id."'")->row_array();
		// die(print_r($sqlcek));
		if ($sqlcek) {
			$data['cetak'] = $sqlcek;
			$data['tipe'] = $this->db->query("SELECT * FROM tbl_kendaraan WHERE kd_kendaraan = '".$sqlcek['kd_kendaraan']."'")->row_array();
			// die(print_r($data));
			$this->load->view('strukparkir', $data);
			$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Cetak Struk Selesai",{
                		type: "success",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
				redirect('keluar');
		}else{
			$this->session->set_flashdata('alert', '$(function() {
                $.bootstrapGrowl("Kode Karcis Tidak Ada",{
                		type: "danger",
                        align: "right",
                        width: "auto",
                        allow_dismiss: false
                });
            	});');
			redirect('keluar');
		}
	}
}

/* End of file Keluar.php */
/* Location: ./application/controllers/Keluar.php */