<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesiswaan extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->database();
		$this->load->model('M_kesiswaan');
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			$data['content_view']='kesiswaan/v_home';
			$this->load->view('kesiswaan/v_template',$data);
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function ubah_password_user(){

		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			$username=$this->session->userdata('username');
			$data['user']=$this->M_kesiswaan->get_user($username);
			$data['content_view']='kesiswaan/v_edit_password';
			$this->load->view('Kesiswaan/v_template',$data);
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function simpan_password(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			$username=$this->input->post('username');
			$password=$this->input->post('password1');
			$this->M_kesiswaan->simpan_password($username,$password);
			$this->session->set_flashdata('pesan','berhasil');
			redirect('Kesiswaan/ubah_password_user');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}
	
	public function status_daftar_ulang(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			$tahun_ajaran = $this->M_kesiswaan->thn_ajar();
			$data['list_siswa'] = $this->M_kesiswaan->get_siswa();
			$data['list_daftar_ulang'] = $this->M_kesiswaan->get_list_daftar($tahun_ajaran);
			$data['content_view'] = 'kesiswaan/v_siswa_belum_daftar';
			$this->load->view('kesiswaan/v_template',$data);
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function riwayat_daftar_ulang(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {

			$data['list_daftar_ulang'] = $this->M_kesiswaan->get_daftar_ulang();
			$data['content_view'] = 'kesiswaan/v_riwayat_daftar_ulang';
			$this->load->view('kesiswaan/v_template',$data);

		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function ingatkan_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {

			$nis = $this->uri->segment(3);
			$data['list_siswa'] = $this->M_kesiswaan->get_data_siswa($nis);
			$data['content_view'] = 'kesiswaan/v_kirim_notifikasi';
			$this->load->view('kesiswaan/v_template',$data);

		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	function kirim_notifikasi(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {

			$ket=$this->input->post('ket');
			$username=$this->input->post('username');
			$this->M_kesiswaan->kirim_notifikasi($username, $ket);
			$this->session->set_flashdata('pesan','terkirim');
			redirect('kesiswaan/status_daftar_ulang');

		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	function laporan_daftar_ulang(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {

			$data['thn']=$this->M_kesiswaan->get_tahun_ajar();

			$data['kelas']=$this->M_kesiswaan->get_kelas();

			$data['siswa']=$this->M_kesiswaan->get_siswa_aktif();
			$data['siswa_daftar']=$this->M_kesiswaan->get_siswa_sudah_daftar();

			$data['content_view'] = 'kesiswaan/v_laporan_daftar_ulang';
			$this->load->view('kesiswaan/v_template',$data);

		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	function atur_waktu_daftar_ulang(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			
			$data['thn']=$this->M_kesiswaan->thn_ajar();
			$data['list']=$this->M_kesiswaan->get_waktu();
			$data['content_view'] = 'kesiswaan/v_atur_waktu_daftar_ulang';
			$this->load->view('kesiswaan/v_template',$data);

		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	function atur_waktu(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {

			$data['waktu']= $this->M_kesiswaan->waktu()->row();

			$cek = count($this->M_kesiswaan->waktu()->row());

			if($cek<=0){
				$data['content_view'] = 'kesiswaan/v_form_atur_waktu';				
			}else{
				$data['content_view'] = 'kesiswaan/v_update_waktu_daftar_ulang';				
			}
			$this->load->view('kesiswaan/v_template',$data);

		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function simpan_waktu(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {

			$tgl1 = substr($this->input->post('tgl1'),6).'-'.substr($this->input->post('tgl1'),0,-8).'-'.substr($this->input->post('tgl1'),3,-5).' 00:00:00';
			$tgl2 = substr($this->input->post('tgl2'),6).'-'.substr($this->input->post('tgl2'),0,-8).'-'.substr($this->input->post('tgl2'),3,-5).' 00:00:00';

			$this->M_kesiswaan->simpan_waktu($tgl1, $tgl2);
			$this->session->set_flashdata('pesan','berhasil');
			redirect('Kesiswaan/atur_waktu_daftar_ulang');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function update_waktu(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {

			$tgl1 = substr($this->input->post('tgl1'),6).'-'.substr($this->input->post('tgl1'),0,-8).'-'.substr($this->input->post('tgl1'),3,-5).' 00:00:00';
			$tgl2 = substr($this->input->post('tgl2'),6).'-'.substr($this->input->post('tgl2'),0,-8).'-'.substr($this->input->post('tgl2'),3,-5).' 00:00:00';
			$id=$this->input->post('id');

			$this->M_kesiswaan->update_waktu($id, $tgl1, $tgl2);
			$this->session->set_flashdata('pesan','update');
			redirect('Kesiswaan/atur_waktu_daftar_ulang');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	function kelas_belum(){
		$id_kelas_dibentuk = $_POST['id_kelas_dibentuk'];

		$siswa=$this->M_kesiswaan->get_siswa_kelas_belum($id_kelas_dibentuk);

			echo '<table class="table">';
            echo    '<thead>';
            echo        '<tr>';
            echo             '<th>NIS</th> ';
            echo             '<th>NAMA SISWA</th>';
            echo             '<th>KELAS</th>';
            echo             '<th>TAHUN AJARAN</th>';
            echo             '<th>PROGRAM STUDI</th>';
            echo         '</tr>';
            echo    '</thead>';
            echo    '<tbody>';
        foreach($siswa->result() as $row) { 
        	echo          '<tr>';
        	echo           	'<td>'.$row->nis.'</td>';
        	echo           	'<td>'.$row->nama_siswa.'</td>';
        	echo           	'<td>'.$row->nama_kelas.'</td>';
        	echo           	'<td>'.$row->tahun_ajaran.'</td>';
        	echo           	'<td>'.$row->nama_prodi.'</td>';
        	echo          '</tr>';
    	}
			echo    '</tbody>';
        	echo    '</table>';


	}

	function kelas_sudah(){
		$id_kelas_dibentuk=$_POST['id_kelas_dibentuk'];

		$siswa=$this->M_kesiswaan->get_siswa_kelas_sudah($id_kelas_dibentuk);

			echo '<table class="table">';
            echo    '<thead>';
            echo        '<tr>';
            echo             '<th>NIS</th> ';
            echo             '<th>NAMA SISWA</th>';
            echo             '<th>KELAS</th>';
            echo             '<th>TAHUN AJARAN</th>';
            echo             '<th>PROGRAM STUDI</th>';
            echo         '</tr>';
            echo    '</thead>';
            echo    '<tbody>';
        foreach($siswa->result() as $row) { 
        	echo          '<tr>';
        	echo           	'<td>'.$row->nis.'</td>';
        	echo           	'<td>'.$row->nama_siswa.'</td>';
        	echo           	'<td>'.$row->nama_kelas.'</td>';
        	echo           	'<td>'.$row->tahun_ajaran.'</td>';
        	echo           	'<td>'.$row->nama_prodi.'</td>';
        	echo          '</tr>';
    	}
			echo    '</tbody>';
        	echo    '</table>';
	}

	function filter_laporan_daftar_ulang(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			$th=$this->input->post('thn_ajar');

			$data['thn']=$this->M_kesiswaan->get_tahun_ajar();

			$data['kelas']=$this->M_kesiswaan->get_kelas_filter($th);

			$data['siswa']=$this->M_kesiswaan->get_siswa_aktif_filter($th);
			$data['siswa_daftar']=$this->M_kesiswaan->get_siswa_sudah_daftar_filter($th);

			$data['content_view'] = 'kesiswaan/v_laporan_daftar_ulang';
			$this->load->view('kesiswaan/v_template',$data);

		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function keluar() {
		$this->session->sess_destroy();
		redirect('Home');
	}
}
?>