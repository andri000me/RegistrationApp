<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->database();
		$this->load->model('M_siswa');
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
			$data['content_view']='siswa/v_home';
			$this->load->view('siswa/v_template',$data);
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
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
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			$username = $this->session->userdata('username');
			$data['user']=$this->M_siswa->get_user($username);
			$data['content_view']='siswa/v_edit_password';
			$this->load->view('siswa/v_template',$data);
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
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
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			$username=$this->input->post('username');
			$password=$this->input->post('password1');
			$this->M_siswa->simpan_password($username,$password);
			$this->session->set_flashdata('pesan','berhasil');
			redirect('Siswa/ubah_password_user');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} 
	}

	public function daftar_ulang(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			$tahun_ajaran=$this->M_siswa->thn_ajar();
			$waktu=$this->M_siswa->get_waktu($tahun_ajaran);
			$startdate='';
			$enddate='';
			$todays_date = strtotime(date("Y-m-d H:m:s"));
			foreach ($waktu->result() as $w) {
				$startdate=strtotime($w->start_date);
				$enddate=strtotime($w->end_date);
			}

			if($todays_date >= $startdate && $todays_date <= $enddate){
				$buka=1;
			}else{
				$buka=0;
			}

			$da = count($waktu->row());

			if($da<=0 or $buka<=0){
				$data['content_view']="siswa/v_daftar_ulang_belum.php";
				$this->load->view('siswa/v_template',$data);
			}else{
				$nis_siswa=$this->session->userdata('primary_key');
				$cek_daftar=$this->M_siswa->cek_daftar_ulang($nis_siswa,$tahun_ajaran)->row();
				$da = count($cek_daftar);

				if($da<=0){

					if(isset($_POST['submit'])){
						$ukuran = $_FILES['rapor']['size'];
						if($ukuran<2000000){
							$tahun_ajar=$this->input->POST('thn_ajar');
							$nis=$this->input->POST('nis');
							$tgl=date("Y-m-d");

							$angka=range(0,9);
							shuffle($angka);
							$ambilangka = array_rand($angka,5);
							$angkastring = implode('', $ambilangka);
							$id_daftar = $angkastring.'D';

							for($dat = 1 ; $dat <= 0 ; $dat = $dat + 0){

								$cek = $this->M_siswa->cek_id_daftar($id_daftar)->row();

								$dat = count($cek);

								if($dat>0) {
									shuffle($angka);
									$ambilangka = array_rand($angka,5);
									$angkastring = implode('', $ambilangka);
									$id_daftar = $angkastring.'U';
								}
							}

							$nama = $_FILES['rapor']['name'];
							$lokasi = $_FILES['rapor']['tmp_name'];
							$namabaru = "gambar/raport/".$id_daftar.'_'.$nis.'.pdf';

							move_uploaded_file($lokasi, $namabaru);
				
							$berkas = array(
							'id_daftar'=> $id_daftar,
							'nis'=>$nis,
							'tanggal_daftar'=> $tgl,
							'rapor'=>$namabaru,
							'status_rapor'=>'proses',
							'status_tagihan'=>'proses',
							'status_registrasi'=>'proses',
							'tahun_ajaran'=>$tahun_ajar
							);

							$this->M_siswa->simpan_pendaftaran($berkas);
							$this->session->set_flashdata('pesan','tersimpan');
							redirect('Siswa/daftar_ulang');
						}else{
							$this->session->set_flashdata('pesan','max');
							redirect('siswa/daftar_ulang');
						}
				
					}else{			
						$data['nis']=$this->session->userdata('primary_key');
 						$data['thn_ajar']=$this->M_siswa->thn_ajar();
						$data['content_view']="siswa/v_daftar_ulang.php";
						$this->load->view('siswa/v_template',$data);
					}
				}else{
					$nis_siswa=$this->session->userdata('primary_key');
					$tahun_ajaran=$this->M_siswa->thn_ajar();

					$data['list_daftar']=$this->M_siswa->cek_daftar_ulang($nis_siswa,$tahun_ajaran);
					$data['content_view']="siswa/v_daftar_ulang_proses.php";
					$this->load->view('siswa/v_template',$data);
				}
			}
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} 
	}

	public function upload_ulang_rapor(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {

			if(isset($_POST['submit'])){
				$ukuran = $_FILES['rapor']['size'];
				if($ukuran<2000000){
					$id=$this->input->POST('id_daftar');

					$angka=range(0,9);
					shuffle($angka);
					$ambilangka = array_rand($angka,5);
					$angkastring = implode('', $ambilangka);
					$id_daftar = $angkastring.'Z';

					$nama = $_FILES['rapor']['name'];
					$lokasi = $_FILES['rapor']['tmp_name'];
					$namabaru = "gambar/raport/".$id_daftar.'_'.$id.'.pdf';

					move_uploaded_file($lokasi, $namabaru);

					//$this->m_pasien->jumlah_data();

					$this->M_siswa->simpan_rapor_baru($id,$namabaru);
					$this->session->set_flashdata('pesan','tersimpan');
					redirect('Siswa/daftar_ulang');
				}else{
					$this->session->set_flashdata('pesan','max');
					redirect('siswa/daftar_ulang');
				}
				
			}else{			
				$data['id_daftar']=$this->uri->segment(3);
				$data['content_view']="siswa/v_upload_ulang_rapor.php";
				$this->load->view('siswa/v_template',$data);
			}
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} 
	}

	public function bayar_iuran(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			$nis=$this->session->userdata('primary_key');
			$tahun_ajaran=$this->M_siswa->thn_ajar();
			$semester=$this->M_siswa->semester();
			$data['nis']=$this->session->userdata('primary_key');
			
			if($semester='ganjil'){
				$data['list_iuran'] = $this->M_siswa->list_iuran_ganjil($nis, $tahun_ajaran);	
			}

			if($semester='genap'){
				$data['list_iuran'] = $this->M_siswa->list_iuran_genap($nis, $tahun_ajaran);
			}

			$data['riwayat_bayar1'] = $this->M_siswa->riwayat_bayar1($nis, $tahun_ajaran);

			$data['riwayat_bayar'] = $this->M_siswa->riwayat_bayar_siswa($nis);

			$data['content_view']='siswa/v_bayar_iuran.php';
			$this->load->view('siswa/v_template', $data);
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
	}

	public function form_bayar_lebih(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			$nis=$this->session->userdata('primary_key');
			$tahun_ajaran=$this->M_siswa->thn_ajar();
			$semester=$this->M_siswa->semester();
			$data['nis']=$this->session->userdata('primary_key');
			
			if($semester='ganjil'){
				$data['list_iuran'] = $this->M_siswa->list_iuran_ganjil($nis, $tahun_ajaran);	
			}

			if($semester='genap'){
				$data['list_iuran'] = $this->M_siswa->list_iuran_genap($nis, $tahun_ajaran);
			}

			$data['riwayat_bayar'] = $this->M_siswa->riwayat_bayar_siswa($nis);
			$data['riwayat_bayar_proses'] = $this->M_siswa->riwayat_bayar_siswa_proses($nis);
			$data['content_view']='siswa/v_form_bayar_lebih.php';
			$this->load->view('siswa/v_template', $data);
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
	}

	public function konfirmasi_bayar_lebih(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			if(isset($_POST['submit'])){
				$ukuran = $_FILES['bukti']['size'];
				if($ukuran<=2000000){
					$jlh=$this->input->POST('jlh_bulan');
					$jenis='lunas';
					$tipe_bayar='online';
					$nis=$this->input->POST('nis');
					$total=$this->input->POST('total');
					$tgl=date("Y-m-d");

					$no=0;
					$bulan_ket='';
					for ($j=0; $j < $jlh ; $j++) { 
						if(isset($_POST['bulan'][$j])){
							$no++;
							$bulan_ket=$bulan_ket.''.$_POST['bulan'][$j].'('.$_POST['sisa_iuran_bulan'][$j].') ';
						}	
					}

					$lokasi = $_FILES['bukti']['tmp_name'];
					$namabaru = "";

					for ($i=0; $i < $jlh ; $i++) { 
						if(isset($_POST['bulan'][$i])){
							if($namabaru==''){

							}else{
								$lokasi=$namabaru;
							}

							$id_iuran = $_POST['id_iuran'][$i];
							$jlh_bayar = $_POST['sisa_iuran_bulan'][$i];
							$bln=$_POST['bulan'][$i];

							$angka=range(0,9);
							shuffle($angka);
							$ambilangka = array_rand($angka,5);
							$angkastring = implode('', $ambilangka);
							$id_bayar = $angkastring.'A';

							for($dat = 1 ; $dat > 0 ; $dat = $dat + 0){

								$cek = $this->M_siswa->cek_id_bayar($id_bayar)->row();

								$dat = count($cek);

								if($dat>0) {
									shuffle($angka);
									$ambilangka = array_rand($angka,5);
									$angkastring = implode('', $ambilangka);
									$id_bayar = $angkastring.'A';
								}
							}
							
							$nama = $_FILES['bukti']['name'];
							$namabaru = "gambar/bukti/".$id_bayar.'_'.$nis.'.jpg';

							copy($lokasi, $namabaru);

				//$this->m_pasien->jumlah_data();
							
							if($no>1){
								$berkas = array(
									'id_bayar'=> $id_bayar,
									'nis_siswa'=>$nis,
									'id_iuran'=> $id_iuran,
									'jumlah_dibayarkan'=>$jlh_bayar,
									'tipe_pembayaran'=>'online',
									'jenis_pembayaran'=>$jenis,
									'tgl_bayar'=> date("y/m/d"),
									'bukti_bayar'=>$namabaru,
									'keterangan'=>'bukti bayar digunakan untuk pembayaran bulan berikut '.$bulan_ket.' dengan total bayar Rp.'.$total,
									'status_bayar'=>'proses',
									'kd_pegawai'=>null
								);
							}else{
								$berkas = array(
									'id_bayar'=> $id_bayar,
									'nis_siswa'=>$nis,
									'id_iuran'=> $id_iuran,
									'jumlah_dibayarkan'=>$jlh_bayar,
									'tipe_pembayaran'=>'online',
									'jenis_pembayaran'=>$jenis,
									'tgl_bayar'=> date("y/m/d"),
									'bukti_bayar'=>$namabaru,
									'status_bayar'=>'proses',
									'kd_pegawai'=>null
								);
							}
							
							$this->M_siswa->simpan_pembayaran($berkas, $id_bayar, $id_iuran);				
						}
					}

					$this->session->set_flashdata('pesan','tersimpan');
					redirect('Siswa/bayar_iuran');
				}else{
					$this->session->set_flashdata('pesan','max');
					redirect('Siswa/bayar_iuran');
				}
			}else{
				redirect('Siswa/form_bayar_lebih');
			}
			$this->session->set_flashdata('pesan','Data Tersimpan');
			redirect('Siswa/bayar_iuran');
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} else if($logged_in==true && $kategori=='no kategori') {
			redirect('Siswa/isi_biodata');
		}
	}

	public function form_bayar_iuran(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {

			$id=$this->uri->segment(3);
			$data['iuran'] = $this->M_siswa->cek_iuran($id);
			$data['riwayat_bayar'] = $this->M_siswa->riwayat_bayar($id);
			$data['riwayat_bayar1'] = $this->M_siswa->riwayat_bayar1($id);
			//$data['periode'] = $this->M_siswa->tahun_ajaran();
			$data['content_view']='siswa/v_form_bayar_iuran.php';
			$this->load->view('siswa/v_template', $data);
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		}
	}

	public function lunas($b){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
		
			echo '<input name="jlh" type="number" class="form-control" value="'.$b.'" readonly>';
		
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		}
	}

	public function simpan_pembayaran(){

		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {		
				
			if(isset($_POST['submit'])){
				$ukuran = $_FILES['bukti']['size'];
				if($ukuran<=2000000){
					$id_iuran=$this->input->POST('id_iuran');
					$jlh_bayar=$this->input->POST('jlh');
					$jenis=$this->input->POST('jenis_bayar');
					$bln=$this->input->POST('bln');
					$tipe_bayar=$this->input->POST('tipe');
					$nis=$this->input->POST('nis');
					$tgl=date("Y-m-d");

					$angka=range(0,9);
					shuffle($angka);
					$ambilangka = array_rand($angka,5);	
					$angkastring = implode('', $ambilangka);
					$id_bayar = $angkastring.'A';

					for($dat = 1 ; $dat > 0 ; $dat = $dat + 0){

						$cek = $this->M_siswa->cek_id_bayar($id_bayar)->row();

						$dat = count($cek);

						if($dat>0) {
							shuffle($angka);
							$ambilangka = array_rand($angka,5);
							$angkastring = implode('', $ambilangka);
							$id_bayar = $angkastring.'B';
						}
					}

					$nama = $_FILES['bukti']['name'];
					$lokasi = $_FILES['bukti']['tmp_name'];
					$namabaru = "gambar/bukti/".$id_bayar.'_'.$nis.'.jpg';

					move_uploaded_file($lokasi, $namabaru);

				//$this->m_pasien->jumlah_data();
				
					$berkas = array(
						'id_bayar'=> $id_bayar,
						'nis_siswa'=>$nis,
						'id_iuran'=> $id_iuran,
						'jumlah_dibayarkan'=>$jlh_bayar,
						'tipe_pembayaran'=>'online',
						'jenis_pembayaran'=>$jenis,
						'tgl_bayar'=> date("y/m/d"),
						'bukti_bayar'=>$namabaru,
						'status_bayar'=>'proses',
						'kd_pegawai'=>null
					);
			
					$this->M_siswa->simpan_pembayaran($berkas, $id_bayar, $id_iuran);
					$this->session->set_flashdata('pesan','tersimpan');
					redirect('Siswa/bayar_iuran');
				}else{
					$this->session->set_flashdata('pesan','max');
					redirect('Siswa/bayar_iuran');
				}
			
			}else{
				redirect('Siswa/bayar_iuran');
			}
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} 
	}


	public function riwayat_daftar_ulang(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {

			$nis=$this->session->userdata('primary_key');
			$data['list_daftar_ulg'] = $this->M_siswa->riwayat_daftar_ulang($nis);
			//$data['periode'] = $this->M_siswa->tahun_ajaran();
			$data['content_view']='siswa/v_riwayat_daftar_ulang.php';
			$this->load->view('siswa/v_template', $data);

		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} 
	}

	public function lihat_riwayat_bayar(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			$id = $this->uri->segment(3);
			$data['list_transaksi'] = $this->M_siswa->riwayat_bayar($id);
			//$data['periode'] = $this->M_siswa->tahun_ajaran();
			$data['content_view']='siswa/v_riwayat_transaksi.php';
			$this->load->view('siswa/v_template', $data);
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} 
	}

	public function riwayat_pembayaran(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {

			$nis=$this->session->userdata('primary_key');
			
			$data['list_transaksi'] = $this->M_siswa->riwayat_pembayaran($nis);
			//$data['periode'] = $this->M_siswa->tahun_ajaran();
			$data['content_view']='siswa/v_riwayat_pembayaran.php';
			$this->load->view('siswa/v_template', $data);
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		}
	}

	public function lihat_nota_pdf(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			$id = $this->uri->segment(3);
			$data['lokasi'] = $this->M_siswa->lihat_nota($id);
			//$data['content_view']='keuangan/v_tampil_nota.php';
			$this->load->view('siswa/v_tampil_nota.php', $data);	
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		}
	}

	public function lihat_rapor_pdf(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			$id = $this->uri->segment(3);
			$data['lokasi'] = $this->M_siswa->lihat_rapor($id);
			//$data['content_view']='keuangan/v_tampil_nota.php';
			$this->load->view('siswa/v_tampil_rapor.php', $data);	
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} 
	}

	public function lihat_bukti_bayar(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {
			$id = $this->uri->segment(3);
			$data['lokasi'] = $this->M_siswa->lihat_nota($id);
			//$data['content_view']='keuangan/v_tampil_bukti_bayar.php';
			$this->load->view('keuangan/v_tampil_bukti_bayar', $data);	
		} else if($logged_in==true && $kategori=='admin') {
			redirect('Admin');
		} else if($logged_in==true && $kategori=='kesiswaan') {
			redirect('Kesiswaan');
		} 
	}

	public function update_notifikasi(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			redirect('Keuangan');
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
		} else if($logged_in==true && $kategori=='siswa') {

				$user = $this->session->userdata('username');

				$this->M_siswa->update_notifikasi($user);				

				$notifikasi=$this->M_siswa->get_notifikasi($user);

				$jlh=0;
					foreach ($notifikasi->result() as $key) {
						if($key->status_pesan=='belum terbaca'){
							$jlh++;
						}
					}
				
				echo '<i class="icon-bell3"></i>';
				echo '<span class="visible-xs-inline-block position-right">Notifikasi</span>';
				echo '<span class="badge bg-warning-400">'.$jlh.'</span>';

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