<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->database();
		$this->load->model('M_home');
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		}
	}

	public function login_sekolah(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login_pegawai.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		}
	}

	public function Walikelas(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login_walikelas.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		}
	}
	
	public function pegawai(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login_pegawai.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} 
	}


	public function login_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {

			$this->form_validation->set_rules('nama', 'nama', 'required');
			$this->form_validation->set_rules('sandi', 'sandi', 'required');

			if (!isset($_POST['submit'])) {
				$this->load->view('v_login');
			} else {
				$nama = $this->input->post('username', 'true');
				$sandi = $this->input->post('password', 'true');

				$cek_username = $this->M_home->cek_username_siswa($nama)->row();

				$cek1 = count($cek_username);

				if($cek1>0){

					$cek_password = $this->M_home->cek_user_siswa($nama, $sandi)->row();
					$cek2 = count($cek_password);

					If($cek2>0){
						$array_items = array(
							'username' => $cek_password->nis,
							'password' => $cek_password->password,
							'nama' => $cek_password->nama_siswa,
							'primary_key' => $cek_password->nis,
							'kategori' => 'siswa',
							'logged_in' => true
						);

						$this->session->set_userdata($array_items);
						$this->session->set_tempdata($array_items, NULL, 1800);

						redirect('Siswa');
					}else{
						$this->session->set_flashdata('pesan', 'password');
						redirect('Home');	
					}
						
				}else{
					$this->session->set_flashdata('pesan', 'username');
					redirect('Home');
				}
			}
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} 
	}

	public function login_pegawai(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {

			$this->form_validation->set_rules('nama', 'nama', 'required');
			$this->form_validation->set_rules('sandi', 'sandi', 'required');

			if (!isset($_POST['submit'])) {
				$this->load->view('v_login_pegawai');
			} else {
				$nama = $this->input->post('username', 'true');
				$sandi = $this->input->post('password', 'true');

				//$temp_account = $this->M_home->cek_user_walikelas($nama, $sandi)->row();
				$cek_username = $this->M_home->cek_username_pegawai($nama)->row();

				$cek1 = count($cek_username);	

				if ($cek1 > 0) {

					$cek_password = $this->M_home->cek_user_pegawai($nama,$sandi)->row();

					$cek2 = count($cek_password);

					if($cek2>0){
						$array_items = array(
							'username' => $cek_password->username,
							'password' => $cek_password->password,
							'primary_key' => $cek_password->kd_pegawai,
							'nama' => $cek_password->nama_pegawai,
							'nip' => $cek_password->nip,
							'kategori' => $cek_password->nama_kategori,
							'logged_in' => true
						);
						
						$this->session->set_userdata($array_items);
						$this->session->set_tempdata($array_items, NULL, 1800);

						if($cek_password->nama_kategori=='keuangan') {
							redirect('keuangan');
						} else if($cek_password->nama_kategori=='kesiswaan') {
							redirect('Kesiswaan');
						} else if($cek_password->nama_kategori=='admin') {
							redirect('admin');
						}
					}else{
						$this->session->set_flashdata('pesan', 'password');
						redirect('Home/pegawai');
					}

				}else{
					$this->session->set_flashdata('pesan', 'username');
					redirect('Home/pegawai');
				}
			}
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} 
	}

	public function login_walikelas(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {

			$this->form_validation->set_rules('nama', 'nama', 'required');
			$this->form_validation->set_rules('sandi', 'sandi', 'required');

			if (!isset($_POST['submit'])) {
				$this->load->view('v_login_walikelas');
			} else {
				$nama = $this->input->post('username', 'true');
				$sandi = $this->input->post('password', 'true');

				$cek_username = $this->M_home->cek_username_walikelas($nama)->row();
				
				$cek1 = count($cek_username);	

				if ($cek1>0) {

					$cek_password = $this->M_home->cek_user_walikelas($nama, $sandi)->row();
					$cek2 = count($cek_password);

					if($cek2>0){
						$array_items = array(
							'username' => $cek_password->username,
							'password' => $cek_password->password,
							'primary_key' => $cek_password->kd_guru,
							'nama' => $cek_password->nama_guru,
							'nip' => $cek_password->nip,
							'kategori' => $cek_password->nama_kategori,
							'logged_in' => true
						);
						
						$this->session->set_userdata($array_items);
						$this->session->set_tempdata($array_items, NULL, 1800);

						redirect('Walikelas');
					}else if($cek2<=0){
						$this->session->set_flashdata('pesan', 'password');
						redirect('Home/Walikelas');
					}
						
				} else if($cek1<=0){
					$this->session->set_flashdata('pesan', 'username');
					redirect('Home/Walikelas');
				} 
			}
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} 
	}

	public function keluar() {
		$this->session->sess_destroy();
		redirect('Home');
	}
}
?>