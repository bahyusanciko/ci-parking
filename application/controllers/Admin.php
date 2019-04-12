<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->getsecurity();
		$this->load->library('form_validation');
		date_default_timezone_set("Asia/Jakarta");
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
            return "A".$kd;
        }
	function getsecurity($value=''){
		$username = $this->session->userdata('level');
		if ($username == '2') {
			// $this->session->sess_destroy();
			redirect('home');
		}
	}
	public function index(){
		$data['title'] = "List Admin";
		$data['admin'] = $this->db->query("SELECT * FROM tbl_admin")->result_array();
		// die(print_r($data));
		$this->load->view('admin', $data);
	}
	public function daftar(){
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[tbl_admin.username_admin]',array(
			'required' => 'Email Wajib Di isi.',
			'is_unique' => 'Username Sudah Di Gunakan'
			 ));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',array(
			'required' => 'Email Wajib Di isi.',
			 ));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[password2]',array(
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		$this->form_validation->set_rules('password2', 'Password2', 'trim|required|matches[password]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Admin';
			$this->load->view('tambahadmin',$data);
		} else {
			// die(print_r($_POST));
			$kode = $this->get_kod();
			$data = array(
				'kd_admin' => $kode,
				'nama_admin' => $this->input->post('name'),
				'email_admin'		 => $this->input->post('email'),
				'no_hp_admin'	=> $this->input->post('no_hp'),
				'img_admin'		=> 'assets/dist/img/default.png',
				'username_admin' => strtolower($this->input->post('username')),
				'password_admin' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'level_admin'	=> $this->input->post('level'),
				'create_date_admin' => time()
				 );
			// die(print_r($data));
			$this->db->insert('tbl_admin', $data);
    		redirect('admin');
		}

	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */