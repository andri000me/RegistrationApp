<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Walikelas extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->database();
		$this->load->model('M_walikelas');
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
		
			$data['content_view']='walikelas/v_home';
			$this->load->view('walikelas/v_template',$data);

		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
	}

	public function ubah_password_user(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			$username=$this->session->userdata('username');
			$data['user']=$this->M_walikelas->get_user($username);
			$data['content_view']='walikelas/v_edit_password';
			$this->load->view('Walikelas/v_template',$data);
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
	}

	public function simpan_password(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {

			$username=$this->input->post('username');
			$password=$this->input->post('password1');
			$this->M_walikelas->simpan_password($username,$password);
			$this->session->set_flashdata('pesan','berhasil');
			redirect('Walikelas/ubah_password_user');

		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
	}
	
	public function status_registrasi_siswa_kelas(){

		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {

			$tahun_ajaran = $this->M_walikelas->thn_ajar();
			$kd = $this->session->userdata('primary_key');
			$data['list_siswa']=$this->M_walikelas->status_daftar_ulang($kd);
			$data['list_daftar']=$this->M_walikelas->list_daftar_ulang($kd,$tahun_ajaran);
			$data['content_view']='walikelas/v_status_registrasi_siswa_kelas';
			$this->load->view('walikelas/v_template',$data);

		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
	}

	public function konfirmasi_rapor(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {

			$tahun_ajaran = $this->M_walikelas->thn_ajar();
			$kd = $this->session->userdata('primary_key');
			$data['list_dftr']=$this->M_walikelas->list_pengajuan_daftar_ulang($kd,$tahun_ajaran);
			$data['content_view']='walikelas/v_konfirmasi_rapor';
			$this->load->view('walikelas/v_template',$data);

		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
	}

	public function konfirmasi_detail(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
		
			$id_daftar=$this->uri->segment(3);
			$data['detail']=$this->M_walikelas->konfirmasi_detail($id_daftar);
			$data['content_view']='walikelas/v_konfirmasi_detail';
			$this->load->view('walikelas/v_template',$data);

		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
	}

	public function konfirmasi_akhir_rapor(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {

			if($this->input->post('tombol')=='konfirmasi'){
				$id_daftar=$this->input->post('id_daftar');
				$nis=$this->input->post('nis');
				$berhasil=$this->M_walikelas->konfirmasi($nis, $id_daftar);
				$this->session->set_flashdata('pesan','simpan');
				redirect('Walikelas/konfirmasi_rapor');
			}else{
				$data['nis']=$this->input->post('nis');
				$data['id_daftar']=$this->input->post('id_daftar');
				$data['content_view']='walikelas/v_penolakan_rapor';
				$this->load->view('walikelas/v_template',$data);
			}
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
		
	}

	function Konfirmasi_penolakan_rapor(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {

			$id_daftar=$this->input->post('id_daftar');
			$ket=$this->input->post('ket');
			$nis=$this->input->post('nis');
			$this->M_walikelas->konfirmasi_penolakan($id_daftar, $ket, $nis);
			$this->session->set_flashdata('pesan','tolak');
			redirect('Walikelas/konfirmasi_rapor');

		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
	}

	function ingatkan(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {

			$data['nis']=$this->uri->segment(3);
			$data['content_view']='walikelas/v_kirim_notifikasi';
			$this->load->view('walikelas/v_template',$data);

		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
	}

	function kirim_notifikasi(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			
			$ket=$this->input->post('ket');
			$nis=$this->input->post('nis');
			$berhasil=$this->M_walikelas->kirim_notifikasi($nis, $ket);
			$this->session->set_flashdata('pesan','terkirim');
			redirect('Walikelas/status_registrasi_siswa_kelas');

		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
	}

	public function keluar() {
		$this->session->sess_destroy();
		redirect('Home');
	}
}
?>