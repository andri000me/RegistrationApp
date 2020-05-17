<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('pagination','encrypt');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->load->database();
		$this->load->model('M_admin');
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
			$data['content_view']='admin/v_home';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('PA/Walikelas');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}
	
	public function kelola_user(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$data['list_user_pegawai']=$this->M_admin->kelola_user_pegawai();
			$data['list_user_guru']=$this->M_admin->kelola_user_guru();
			$data['content_view']='admin/v_kelola_user';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function edit_user(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

			$username=$this->uri->segment(3);
			$data['user']=$this->M_admin->get_user($username);
			$data['content_view']='admin/v_edit_user';
		$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
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
			$username=$this->session->userdata('username');
			$data['user']=$this->M_admin->get_user($username);
			$data['content_view']='admin/v_edit_password';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
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

			$username=$this->input->post('username');
			$password=$this->input->post('password1');
			$this->M_admin->simpan_password($username,$password);
			$this->session->set_flashdata('pesan','berhasil');
			redirect('Admin/ubah_password_user');

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function ubah_password(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$username=$this->uri->segment(3);
			$data['user']=$this->M_admin->get_user($username);
			$data['content_view']='admin/v_edit_password';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	function update_user(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$username=$this->input->post('username');
			$user=$this->input->post('user');
			$pass=$this->input->post('pass');
			$password=$this->input->post('password');
			$status_user=$this->input->post('status_user');
			$status=$this->input->post('status');

			if($username!=$user){

				$cek = $this->M_admin->validasi_username($username)->row();

				$dat = count($cek);

				if($dat>0) {
					$data['user'] = $this->M_admin->get_user($user);
					$this->session->set_flashdata('pesan','username');
					$data['content_view']='admin/v_edit_user';
					$this->load->view('admin/v_template',$data);
				}
			}

			if (md5($password) != $pass && $password != $pass && $username != $user && $status != $status_user) {

				$this->M_admin->edit_user_pass($username, $password, $status_user, $user);

				$data['user'] = $this->M_admin->get_user($username);
				$this->session->set_flashdata('pesan','bisa kali');
				$data['content_view']='admin/v_edit_user';
				$this->load->view('admin/v_template',$data);			
			}

			if (md5($password) != $pass && $password != $pass && $username == $user && $status != $status_user) {

				$this->M_admin->edit_user_pass($username, $password, $status_user, $user);

				$data['user'] = $this->M_admin->get_user($username);	
				$this->session->set_flashdata('pesan','bisa kali');
				$data['content_view']='admin/v_edit_user';
				$this->load->view('admin/v_template',$data);			
			}

			if (md5($password) != $pass && $password != $pass && $username != $user && $status == $status_user) {

				$this->M_admin->edit_user_pass($username, $password, $status_user, $user);

				$data['user'] = $this->M_admin->get_user($username);
				$this->session->set_flashdata('pesan','bisa kali');
				$data['content_view']='admin/v_edit_user';
				$this->load->view('admin/v_template',$data);			
			}

			if (md5($password) != $pass && $password != $pass && $username == $user && $status == $status_user) {

				$this->M_admin->edit_user_pass($username, $password, $status_user, $user);

				$data['user'] = $this->M_admin->get_user($username);
				$this->session->set_flashdata('pesan','bisa kali');
				$data['content_view']='admin/v_edit_user';
				$this->load->view('admin/v_template',$data);			
			}

			if ((md5($password) == $pass || $password == $pass) && $username != $user && $status == $status_user) {

				$this->M_admin->edit_user_no_pass($username, $password, $status_user, $user);

				$data['user'] = $this->M_admin->get_user($username);
				$this->session->set_flashdata('pesan','bisa kali');
				$data['content_view']='admin/v_edit_user';
				$this->load->view('admin/v_template',$data);			
			}

			if ((md5($password) == $pass || $password == $pass) && $username != $user && $status != $status_user) {

				$this->M_admin->edit_user_no_pass($username, $password, $status_user, $user);

				$data['user'] = $this->M_admin->get_user($username);
				$this->session->set_flashdata('pesan','bisa kali');
				$data['content_view']='admin/v_edit_user';
				$this->load->view('admin/v_template',$data);			
			}

			if ((md5($password) == $pass || $password == $pass) && $username == $user && $status != $status_user) {

				$this->M_admin->edit_user_no_pass($username, $password, $status_user, $user);

				$data['user'] = $this->M_admin->get_user($username);
				$this->session->set_flashdata('pesan','bisa kali');
				$data['content_view']='admin/v_edit_user';
				$this->load->view('admin/v_template',$data);			
			}
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}	
	}

	public function set_tahun($a){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

			$a=$a+1;
			echo '<input type="text" class="form-control" name="tahun2" id="tahun2" value="'.$a.'" Readonly>';

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function atur_tahun_ajaran(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
		
			$data['content_view']='admin/v_atur_tahun_ajaran';
			$this->load->view('admin/v_template',$data);

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function edit_tahun_ajaran(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

			$data['thn']=$this->M_admin->get_tahun_ajaran();
			$data['content_view']='admin/v_edit_tahun_ajaran';
			$this->load->view('admin/v_template',$data);

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	function update_tahun_ajaran(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$tahun_ajaran = $this->input->post('tahun1').'/'.$this->input->post('tahun2');
			$semester=$this->input->post('semester');
			$kds=0;
			if($semester='ganjil'){
				$kds=1;
			}else{
				$kds=2;
			}

			$id_thn_ajar=$tahun_ajaran.'-'.$kds;
		
			$cek=$this->M_admin->cek_thn_ajar($id_thn_ajar)->row();
			$dat = count($cek);

			if($dat<=0){
				$thn=$this->M_admin->thn_ajar();
				$siswa=$this->M_admin->get_siswa_daftar($thn);
				$this->M_admin->update_tahun_ajaran($id_thn_ajar, $tahun_ajaran, $semester);

				foreach ($siswa->result() as $key) {
				
					$total=125000;
					$nis=$key->nis;

					if($semester=='ganjil'){
						$a=6;
						$b=1;
					}else{
						$a=12;
						$b=7;
					}

					for($i=$b;$i<=$a;$i++){

							$angka=range(0,9);
							shuffle($angka);
							$ambilangka = array_rand($angka,5);
							$angkastring = implode('', $ambilangka);
							$id_iuran = $angkastring.'RK';

							for($dat = 1 ; $dat <= 0 ; $dat = $dat + 0){

								$cek = $this->M_admin->cek_id_iuran($id_iuran)->row();

								$dat = count($cek);

								if($dat>0) {
									$angka=range(0,9);
									shuffle($angka);
									$ambilangka = array_rand($angka,5);
									$angkastring = implode('', $ambilangka);
									$id_iuran = $angkastring.'EQ';
								}
							}

							$this->M_admin->insert_tagihan($id_iuran,$total,$i,$id_thn_ajar,$nis);
						}
				}
				
				$this->session->set_flashdata('pesan','Tahun');
				redirect('Admin/edit_tahun_ajaran');
			}else{
				$this->session->set_flashdata('pesan','gagal');
				redirect('Admin/atur_tahun_ajaran');
			}

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	function simpan_kelas_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

			$kd_kelas=$this->input->post('kelas');
			$nis=$this->input->post('siswa');

			$this->M_admin->simpan_kelas_siswa($kd_kelas, $nis);
			$this->session->set_flashdata('pesan','tersimpan');
			redirect('Admin/kelola_siswa');	

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	function update_kelas_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

			$kd_kelas=$this->input->post('kelas');
			$id=$this->input->post('id');

			$this->M_admin->update_kelas_siswa($kd_kelas, $id);
			$this->session->set_flashdata('pesan','tersimpan');
			redirect('Admin/kelola_siswa');	

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function kelola_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$tahun_ajaran = $this->M_admin->thn_ajar();
			
			$data['list_siswa']=$this->M_admin->getsiswa();
			$data['siswa']=$this->M_admin->get_siswa($tahun_ajaran);
			$data['siswa_baru']=$this->M_admin->get_siswa_baru();
			$data['siswa_sudah_daftar']=$this->M_admin->get_siswa_sudah_daftar();
			$data['thn_ajar']=$this->M_admin->thn_ajar();
			$data['content_view']='admin/v_kelola_siswa';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('PA/Walikelas');
		}
	}

	public function atur_kelas_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$data['thn']=$this->M_admin->thn_ajar();
			$tahun=$this->M_admin->thn_ajar();
			$data['kelas']=$this->M_admin->get_kelas_dibentuk($tahun);
			$data['list_siswa']=$this->M_admin->get_siswa_no_kelas($tahun);
			$data['content_view']='admin/v_atur_kelas_siswa';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('PA/Walikelas');
		}
	}

	public function ganti_kelas_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$nis=$this->uri->segment(4);
			$kds=$this->uri->segment(5);
			$data['id']=$this->uri->segment(3);
			$tahun=$this->M_admin->thn_ajar();
			$data['kelas']=$this->M_admin->get_kelas_prodi($kds,$tahun);
			$data['list_siswa']=$this->M_admin->get_sis($nis);
			$data['content_view']='admin/v_ganti_kelas_siswa';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function kelola_walikelas(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$tahun_ajaran = $this->M_admin->thn_ajar();
			$data['walikelas']=$this->M_admin->get_walikelas($tahun_ajaran);
			$data['content_view']='admin/v_kelola_walikelas';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function set_walikelas_ajaran_baru(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$data['kelas']=$this->M_admin->get_kelas();
			$data['guru']=$this->M_admin->get_guru();
			$data['thn']=$this->M_admin->get_tahun_ajaran();
			$data['content_view']='admin/v_set_walikelas_ajaran_baru';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function update_walikelas_ajaran_baru(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$thn_ajar=$this->input->post('thn_ajar');
			$kd_kelas=$this->input->post('kelas');
			$kd_guru=$this->input->post('guru');
			$kuota_kelas=$this->input->post('kuota');
			$cek=$this->M_admin->cek_walikelas($thn_ajar, $kd_kelas, $kd_guru)->row();
			$data=count($cek);
			if($data>0){
				$this->session->set_flashdata('pesan','nggak berhasil');
				redirect('Admin/kelola_walikelas');	
			}else{
				$this->M_admin->update_walikelas_ajaran_baru($thn_ajar, $kd_kelas, $kd_guru, $kuota_kelas);
				$this->session->set_flashdata('pesan','tersimpan');
				redirect('Admin/kelola_walikelas');	
			}
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
		
	}

	public function ganti_walikelas(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

			$id=$this->uri->segment(3);
			$kd_guru=$this->uri->segment(4);
			$data['id'] = $id;
			$data['kelas']=$this->M_admin->get_kelas();
			$data['guru']=$this->M_admin->get_update_guru($kd_guru);
			$data['walikelas']=$this->M_admin->get_update_walikelas($id);
			$data['content_view']='admin/v_ganti_walikelas';
			$this->load->view('admin/v_template',$data);

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function simpan_pergantian_walikelas(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$id=$this->input->post('id_walikelas');
			$kd_guru=$this->input->post('kd_guru');
			$this->M_admin->update_pergantian_walikelas($id, $kd_guru);
			$this->session->set_flashdata('pesan','ganti walikelas');
			redirect('admin/kelola_walikelas');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function update_walikelas(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$kelas=$this->input->post('kelas');
			$guru=$this->input->post('guru');
			$this->M_admin->update_walikelas_ajaran_baru($thn_ajar, $semester, $kelas, $guru);
			$this->session->set_flashdata('pesan','berhasil');
			redirect('Admin/set_walikelas_ajaran_baru');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function kelola_kelas(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			
			$data['kelas']=$this->M_admin->getkelas();
			$data['content_view']='admin/v_kelola_kelas';
			$this->load->view('admin/v_template',$data);

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function tambah_kelas(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
		
			$data['prodi']=$this->M_admin->get_prodi();
			$data['content_view']='admin/v_tambah_kelas';
			$this->load->view('admin/v_template',$data);

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('PA/Walikelas');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function hapus_kelas(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('PA/Walikelas');
		} else if($logged_in==true && $kategori=='admin') {
		
			$kd=$this->uri->segment(3);
			$this->M_admin->hapus_kelas($kd);
			$this->session->set_flashdata('pesan','hapus kelas');
			redirect('admin/kelola_kelas');

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function hapus_thn_ajar(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
		
			$kd=$this->uri->segment(3).'/'.$this->uri->segment(4);
			$this->M_admin->hapus_thn_ajar($kd);
			$this->session->set_flashdata('pesan','hapus');
			redirect('admin/edit_tahun_ajaran');

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}


	public function simpan_kelas(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$nama_kelas=$this->input->post('nama_kelas');
			$prodi=$this->input->post('prodi');
			$tingkat=$this->input->post('tingkat');
			$angka=$this->input->post('angka');
			$a='';

			if($tingkat==1){
				$a = 'X';
			}else if($tingkat==2){
				$a = 'XI';
			}else if($tingkat==3){
				$a = 'XII';
			}
		

			$kd_kelas= $a.$prodi.$angka;

			$cek = $this->M_admin->cek_kelas($kd_kelas, $nama_kelas)->row();

			$dat = count($cek);

			if($dat>0) {
				$data['user'] = $this->M_admin->get_user($user);
				$this->session->set_flashdata('pesan','unavailable');
				$data['content_view']='admin/v_tambah_kelas';
				$this->load->view('admin/v_template',$data);

			}

			$this->M_admin->tambah_kelas($kd_kelas, $nama_kelas, $tingkat, $angka, $prodi);

			$this->session->set_flashdata('pesan','berhasil');
			redirect('admin/kelola_kelas');	

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function tambah_prodi(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
		
			$data['content_view']='admin/v_tambah_prodi';
			$this->load->view('admin/v_template',$data);

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function kelola_prodi(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
		
			$data['prodi']=$this->M_admin->get_prodi();
			$data['content_view']='admin/v_kelola_prodi';
			$this->load->view('admin/v_template',$data);

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function simpan_prodi(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

			$kd=$this->input->post('kd_prodi');
			$nama=$this->input->post('nama_prodi');
			$thn=$this->input->post('thn');

			$cek = $this->M_admin->cek_prodi($kd, $nama)->row();

			$dat = count($cek);

			if($dat>0) {
				$this->session->set_flashdata('pesan','unavailable');
				redirect('admin/tambah_prodi');
			}

			$this->M_admin->tambah_prodi($kd, $nama, $thn);

			$this->session->set_flashdata('pesan','berhasil');
			redirect('admin/kelola_prodi');	

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function hapus_prodi(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$kd=$this->uri->segment(3);
			$this->M_admin->hapus_prodi($kd);
			$this->session->set_flashdata('pesan','hapus');
			redirect('admin/kelola_prodi');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function kelola_Pegawai_guru(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$data['pegawai']=$this->M_admin->get_Pegawai();
			$data['guru']=$this->M_admin->get_guru();
			$data['content_view']='admin/v_kelola_pegawai_guru';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function tambah_pegawai(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$data['content_view']='admin/v_tambah_pegawai';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function simpan_pegawai(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

			$kd=$this->input->post('kd_pegawai');
			$nama=$this->input->post('nama_pegawai');
			$bagian=$this->input->post('bagian');

			$cek = $this->M_admin->cek_pegawai($kd)->row();

			$dat = count($cek);

			if($dat>0) {
				$this->session->set_flashdata('pesan','unavailable');
				redirect('admin/tambah_pegawai');
			}

			$this->M_admin->tambah_pegawai($kd, $nama, $bagian);

			$this->session->set_flashdata('pesan','pegawai berhasil');
			redirect('admin/kelola_Pegawai_guru');		
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function hapus_pegawai(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$kd=$this->uri->segment(3);
			$this->M_admin->hapus_pegawai($kd);
			$this->session->set_flashdata('pesan','hapus pegawai');
			redirect('admin/kelola_Pegawai_guru');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function tambah_guru(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

			$data['content_view']='admin/v_tambah_guru';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function tambah_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

			$data['prodi']=$this->M_admin->get_prodi();
			$data['content_view']='admin/v_tambah_siswa';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	function simpan_guru(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$kd=$this->input->post('kd_guru');
			$nip=$this->input->post('nip');
			$nama=$this->input->post('nama_guru');
			$jk=$this->input->post('jk');
			$agama=$this->input->post('agama');
			$alamat=$this->input->post('alamat');

			$cek = $this->M_admin->cek_guru($kd)->row();
			$cek1 = $this->M_admin->cek_nip_guru($nip)->row();

			$dat = count($cek);
			$dat1 = count($cek1);

			if($dat>0) {
				$this->session->set_flashdata('pesan','kode');
				redirect('admin/tambah_guru');
			}else if($dat1>0){
				$this->session->set_flashdata('pesan','nip');
				redirect('admin/tambah_guru');
			}else{
				$berkas=  array(
    							"kd_guru"=> $kd,
    							"nip"=>  $nip,
     							"nama_guru"=> $nama,
     							"jenkel"=> $jk,
     							"agama"=> $agama,
     							"alamat"=> $alamat			
    						);

				$this->M_admin->tambah_guru($berkas);

				$this->session->set_flashdata('pesan','berhasil');
				redirect('admin/kelola_Pegawai_guru');	
			}

			

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}	
	}

	public function hapus_guru(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

			$kd=$this->uri->segment(3);
			$this->M_admin->hapus_guru($kd);
			$this->session->set_flashdata('pesan','hapus guru');
			redirect('admin/kelola_Pegawai_guru');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function tambah_user_pegawai(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$data['pegawai']=$this->M_admin->get_pegawai_no_username();
			$data['kategori']=$this->M_admin->get_kategori_pegawai();
			$data['content_view']='admin/v_tambah_user_pegawai';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function tambah_user_walikelas(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

			$data['guru']=$this->M_admin->get_guru_no_username();
			$data['kategori']=$this->M_admin->get_kategori_guru();
			$data['content_view']='admin/v_tambah_user_walikelas';
			$this->load->view('admin/v_template',$data);

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function simpan_user_pegawai(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$username=$this->input->post('username');
			$pass=$this->input->post('password');
			$kd=$this->input->post('kd_pegawai');
			$id=$this->input->post('id_kategori');

			$cek = $this->M_admin->cek_user($username)->row();

				$dat = count($cek);

			if($dat>0) {
				$this->session->set_flashdata('pesan','unavailable');
				redirect('admin/tambah_user_pegawai');
			}

			$this->M_admin->tambah_user_pegawai($username, $pass, $kd, $id);

			$this->session->set_flashdata('pesan','berhasil');
			redirect('admin/kelola_user');			
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function simpan_user_walikelas(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$username=$this->input->post('username');
			$pass=$this->input->post('password');
			$kd=$this->input->post('kd_guru');
			$id=$this->input->post('id_kategori');

			$cek = $this->M_admin->cek_user($username)->row();

			$dat = count($cek);

			if($dat>0) {
				$this->session->set_flashdata('pesan','unavailable');
				redirect('admin/tambah_user_walikelas');
			}

			$this->M_admin->tambah_user_walikelas($username, $pass, $kd, $id);

			$this->session->set_flashdata('pesan','berhasil');
			redirect('admin/kelola_user');		
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function import_user_siswa_baru(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$data['content_view']='admin/v_import_user_siswa_baru';
			$this->load->view('admin/v_template',$data);	
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function proses(){

		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {

     	if($this->input->post('submit')=='input'){

     		$ukuran = $_FILES['user']['size'];
     	if($ukuran<=2000000){
        	$fileName = $this->input->post('user', TRUE);

  			$config['upload_path'] = './gambar/user/'; 
  			$config['file_name'] = $fileName;
			$config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
  			$config['max_size'] = 10000;

  			$this->load->library('upload', $config);
  			$this->upload->initialize($config); 
  
	  		if (!$this->upload->do_upload('user')) {
   				$error = array('error' => $this->upload->display_errors());
   				$this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
   				redirect('Welcome'); 
  			} else {
   				$media = $this->upload->data();
   				$inputFileName = 'gambar/user/'.$media['file_name'];
   
   				try {
    				$inputFileType = IOFactory::identify($inputFileName);
    				$objReader = IOFactory::createReader($inputFileType);
    				$objPHPExcel = $objReader->load($inputFileName);
   				} catch(Exception $e) {
    				die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
   				}

   				$sheet = $objPHPExcel->getSheet(0);
   				$highestRow = $sheet->getHighestRow();
   				$highestColumn = $sheet->getHighestColumn();

   				for ($row = 2; $row <= $highestRow; $row++){  
     				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
       												NULL,
       												TRUE,
       												FALSE);
     				$nis=$this->M_admin->get_nis();

     				$data = array(
    							"nis"=>$nis,
    							"nama_siswa"=> $rowData[0][0],
    							"password"=> md5($nis),
     							"tempat_lahir"=> $rowData[0][1],
     							"tgl_lahir"=> $rowData[0][2],
     							"alamat"=> $rowData[0][3],
     							"jenkel"=> $rowData[0][4],
     							"agama"=> $rowData[0][5],
     							"thn_diterima"=> $rowData[0][6],
     							"sekolah_asal"=> $rowData[0][7],
     							"nama_ayah"=> $rowData[0][8],
     							"nama_ibu"=> $rowData[0][9],
     							"pekerjaan_ayah"=> $rowData[0][10],
     							"pekerjaan_ibu"=> $rowData[0][11],
     							"kd_prodi"=> $rowData[0][12]
    						);

    				$this->M_admin->insert_import_siswa($data);

    				$total=125000;
					$semester=$this->M_admin->semester();
					$thn_ajar=$this->M_admin->thn_ajar();

					if($semester=='ganjil'){
						$a=6;
						$b=1;
					}else{
						$a=12;
						$b=7;
					}

					for($i=$b;$i<=$a;$i++){

							$angka=range(0,9);
							shuffle($angka);
							$ambilangka = array_rand($angka,8);
							$angkastring = implode('', $ambilangka);
							$id_iuran = $angkastring.'RK';

							for($dat = 1 ; $dat > 0 ; $dat = $dat + 0){

								$cek = $this->M_admin->cek_id_iuran($id_iuran)->row();

								$dat = count($cek);

								if($dat>0) {
									$angka=range(0,9);
									shuffle($angka);
									$ambilangka = array_rand($angka,6);
									$angkastring = implode('', $ambilangka);
									$id_iuran = $angkastring.'EQ';
								}
							}

							$this->M_admin->insert_tagihan($id_iuran,$total,$i,$thn_ajar,$nis);
						}
   				} 
   				$this->session->set_flashdata('pesan','file'); 
   				redirect('Admin/kelola_siswa');
  			}
  		}else{
  			$this->session->set_flashdata('pesan','max'); 
   			redirect('Admin/import_user_siswa_baru');		
  		}

       	}
       	
       	} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
    }

	public function simpan_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$nama=$this->input->post('nama');
			$tempat=$this->input->post('tempat_lahir');
			$tgl_lahir=$this->input->post('tgl_lahir');
			$bulan_lahir=$this->input->post('bulan_lahir');
			$tahun_lahir=$this->input->post('tahun_lahir');
			$alamat=$this->input->post('alamat');
			$agama=$this->input->post('agama');
			$sekolah_asal=$this->input->post('sekolah_asal');
			$nama_ayah=$this->input->post('nama_ayah');
			$nama_ibu=$this->input->post('nama_ibu');
			$pekerjaan_ayah=$this->input->post('pekerjaan_ayah');
			$pekerjaan_ibu=$this->input->post('pekerjaan_ibu');
			$thn_diterima=$this->input->post('thn_diterima');
			$jk=$this->input->post('jenis_kelamin');
			$kd=$this->input->post('kd_prodi');

			$cek = checkdate($bulan_lahir, $tgl_lahir, $tahun_lahir);

			if($cek==true){
				$nis=$this->M_admin->get_nis();
				$tgl= $tgl_lahir.'-'.$bulan_lahir.'-'.$tahun_lahir;

				$data = array(
    							"nis"=>$nis,
    							"password"=> md5($nis),
    							"nama_siswa"=> $nama,
     							"tempat_lahir"=> $tempat,
     							"tgl_lahir"=> $tgl,
     							"alamat"=> $alamat,
     							"jenkel"=> $jk,
     							"agama"=> $agama,
     							"thn_diterima"=> $thn_diterima,
     							"sekolah_asal"=> $sekolah_asal,
     							"nama_ayah"=> $nama_ayah,
     							"nama_ibu"=> $nama_ibu,
     							"pekerjaan_ayah"=> $pekerjaan_ayah,
     							"pekerjaan_ibu"=> $pekerjaan_ibu,
     							"kd_prodi"=> $kd
    						);	
					$this->M_admin->tambah_siswa($data);

					$total=125000;
					$semester=$this->M_admin->semester();
					$thn_ajar=$this->M_admin->thn_ajar();

					if($semester=='ganjil'){
						$a=6;
						$b=1;
					}else{
						$a=12;
						$b=7;
					}

					for($i=$b;$i<=$a;$i++){

							$angka=range(0,9);
							shuffle($angka);
							$ambilangka = array_rand($angka,8);
							$angkastring = implode('', $ambilangka);
							$id_iuran = $angkastring.'RK';

							for($dat = 1 ; $dat > 0 ; $dat = $dat + 0){

								$cek = $this->M_admin->cek_id_iuran($id_iuran)->row();

								$dat = count($cek);

								if($dat>0) {
									$angka=range(0,9);
									shuffle($angka);
									$ambilangka = array_rand($angka,7);
									$angkastring = implode('', $ambilangka);
									$id_iuran = $angkastring.'EQ';
								}
							}

							$this->M_admin->insert_tagihan($id_iuran,$total,$i,$thn_ajar,$nis);
						}

				$this->session->set_flashdata('pesan','berhasil');
				redirect('admin/kelola_siswa');
			}else{
				$this->session->set_flashdata('pesan','no');
				redirect('admin/tambah_siswa');
			}		

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}		
	}

	public function hapus_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
		
			$nis=$this->uri->segment(3);
			$this->M_admin->hapus_siswa($nis);
			$this->session->set_flashdata('pesan','hapus');
			redirect('admin/kelola_siswa');

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}	   

	public function hapus_user(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
		
			$user=$this->uri->segment(3);
			$this->M_admin->hapus_user($user);
			$this->session->set_flashdata('pesan','hapus');
			redirect('admin/kelola_user');

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	function filter_atur_kelas_siswa($a){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$thn=$this->M_admin->thn_ajar();
		
			$kd=$this->M_admin->filter_atur_kelas_siswa($a);
			foreach ($kd->result() as $key) {
				$kds=$key->kd_prodi;
			}

			$list=$this->M_admin->get_list_siswa($thn, $kds);

			$cek=count($list->row());

			if($cek>0){
				
				echo '<option value="">Pilih Siswa</option>';
				foreach($list->result() as $d){
					echo '<option value="'.$d->nis.'">'.$d->nama_siswa.'</option>';
				} 

			}else{

				echo  '<option value="">Semua Siswa Prodi ini sudah memilki kelas</option>';
			}

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}

	public function filter_kelas_siswa($a){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$thn=$this->M_admin->thn_ajar();
		
			$kd=$this->M_admin->filter_kelas_siswa($a);
			foreach ($kd->result() as $key) {
				$kds=$key->kd_prodi;
			}

			$list=$this->M_admin->get_kelas_prodi($kds,$thn);

			$cek=count($list->row());

			if($cek>0){
				
				echo '<option value="">Pilih Kelas</option>';
				foreach($list->result() as $d){
					echo '<option value="'.$d->id_kelas_dibentuk.'">'.$d->nama_kelas.'</option>';
				} 

			}

		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		}
	}
	

	public function pilih_kelas_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='siswa') {
			redirect('Siswa');
		} else if($logged_in==true && $kategori=='admin') {
			$nis=$this->uri->segment(3);
			$kd_prodi=$this->uri->segment(4);
			$tahun=$this->M_admin->thn_ajar();
			$data['kelas']=$this->M_admin->get_kelas_prodi($kd_prodi,$tahun);
			$data['list_siswa']=$this->M_admin->get_sis($nis);
			$data['content_view']='admin/v_pilih_kelas_siswa';
			$this->load->view('admin/v_template',$data);
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
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