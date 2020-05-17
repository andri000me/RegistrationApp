<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->database();
		$this->load->model('M_keuangan');
		include_once APPPATH . 'third_party/fpdf.php';
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			$data['content_view']='keuangan/v_home';
			$this->load->view('keuangan/v_template',$data);
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

			$username=$this->session->userdata('username');
			$data['user']=$this->M_keuangan->get_user($username);
			$data['content_view']='Keuangan/v_edit_password';
			$this->load->view('keuangan/v_template',$data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

			$username=$this->input->post('username');
			$password=$this->input->post('password1');
			$this->M_keuangan->simpan_password($username,$password);
			$this->session->set_flashdata('pesan','berhasil');
			redirect('Keuangan/ubah_password_user');

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function update_notifikasi(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
				$user = $this->session->userdata('username');

				$notifikasi=$this->M_keuangan->get_notifikasi_lebih($user);				

				echo '<div class="dropdown-content-heading">';
				echo		'Notifikasi';
				echo		'<ul class="icons-list">';
				echo		'</ul>';
				echo	'</div>';
					foreach ($notifikasi->result() as $row) {

				echo	'<a href="'.base_url().$row->link.'">';
				echo	'<ul class="media-list dropdown-content-body">';
				echo		'<li class="media">';
				echo			'<div class="media-left">';
				echo				'<img src="'.base_url().'assets/images/placeholder.jpg" class="img-circle img-sm" alt="">';
				echo				'<span class="badge bg-danger-400 media-badge"></span>';
				echo			'</div>';

				echo			'<div class="media-body">';
				echo				'<div class="media-heading">';
				echo					'<span class="text-semibold">'.$row->nama_pengirim.'</span>';
				echo					'<span class="media-annotation pull-right"></span>';
				echo				'</div>';

				echo				'<span class="text-muted">'.$row->pesan.'</span>';
				echo			'</div>';
				echo		'</li>';
				echo	'</ul>';
				echo	'</a>';
					} 
				echo 	'<div class="dropdown-content-footer" >';
				echo		'<a  id="notifikasi" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>';
				echo	'</div>';
				
			
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
	
	public function bayar_iuran_langsung(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			$tahun_ajaran = $this->M_keuangan->thn_ajar();

			$data['list_siswa'] = $this->M_keuangan->daftar_siswa_aktif($tahun_ajaran);
			//$data['periode'] = $this->M_siswa->tahun_ajaran();
			$data['content_view']='keuangan/v_daftar_siswa.php';
			$this->load->view('keuangan/v_template', $data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function bayar_iuran_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			$nis=$this->uri->segment(3);
			$tahun_ajaran = $this->M_keuangan->thn_ajar();

			$data['nis']=$this->uri->segment(3);

			$data['riwayat_bayar'] = $this->M_keuangan->riwayat_bayar_siswa($nis);

			$data['list_iuran'] = $this->M_keuangan->list_iuran($nis, $tahun_ajaran);
			//$data['periode'] = $this->M_siswa->tahun_ajaran();
			$data['content_view']='keuangan/v_daftar_iuran.php';
			$this->load->view('keuangan/v_template', $data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function form_bayar_iuran_langsung(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			$id=$this->uri->segment(3);			
			$data['iuran'] = $this->M_keuangan->cek_iuran($id);
			$data['riwayat_bayar'] = $this->M_keuangan->riwayat_bayar($id);
			//$data['periode'] = $this->M_siswa->tahun_ajaran();
			$data['content_view']='keuangan/v_konfirmasi_bayar_langsung.php';
			$this->load->view('keuangan/v_template', $data);
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function form_bayar_lebih(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			$nis=$this->uri->segment(3);			
			$tahun_ajaran = $this->M_keuangan->thn_ajar();	
			$data['list_iuran'] = $this->M_keuangan->list_iuran($nis, $tahun_ajaran);
			$data['riwayat_bayar'] = $this->M_keuangan->riwayat_bayar_siswa($nis);
			$data['content_view']='keuangan/v_form_bayar_lebih.php';
			$this->load->view('keuangan/v_template', $data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function konfirmasi_bayar_lebih(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			$jlh=$this->input->POST('jlh_bulan');
			$nis=$this->input->POST('nis');
			$pembayar=$this->input->POST('nama_siswa');
			$tipe_bayar='langsung';
			$jenis_bayar='lunas';
			$tgl=date("Y-m-d");
			$kd = $this->session->userdata('primary_key');

			$pegawai = $this->M_keuangan->get_pegawai($kd);

			for ($i=0; $i < $jlh ; $i++) { 
				if(isset($_POST['bulan'][$i])){
					$id_iuran = $_POST['id_iuran'][$i];
					$jlh_bayar = $_POST['sisa_iuran_bulan'][$i];
					$bln=$_POST['bulan'][$i];

					$angka=range(0,9);
					shuffle($angka);
					$ambilangka = array_rand($angka,5);
					$angkastring = implode('', $ambilangka);
					$id_bayar = $angkastring.'A';
					$status='selesai';
					$nama='gambar/nota/'.$id_bayar.'_'.$this->input->POST('nama').'.pdf';

					for($dat = 1 ; $dat > 0 ; $dat = $dat + 0){

						$cek = $this->M_keuangan->cek_id_bayar($id_bayar)->row();

						$dat = count($cek);

						if($dat>0) {
							shuffle($angka);
							$ambilangka = array_rand($angka,5);
							$angkastring = implode('', $ambilangka);
							$id_bayar = $angkastring.'A';
						}
					}

					$this->M_keuangan->bayar_iuran($id_bayar, $nis, $id_iuran, $pembayar, $jlh_bayar, $tipe_bayar, $jenis_bayar, $tgl, $nama, $status, $kd);

					$pdfFilePath = FCPATH."$nama";

					$pt='SMKN 02 Kepahiang';
					$jl='JL. DS. WESKUST - KEPAHIANG';
					$tel='0852-1400-6362';
					$cash='10000';
		
					$admins = $pegawai;
					$payment='Iuran Bulanan';
					$notevalid='validasi pembayaran dianggap sah bila disertai tanda tangan dan stempel';
		

					$tanggal=Date("d-m-Y");
					$admins=$admins;
					$kwnums='apa aja';

					$pdf = new FPDF('l','mm','A5');	

					$pdf->setMargins(5,5,5);
					$pdf->AddPage();
					$pdf->SetFont('Arial','B',12);
					$pdf->Cell(55,7,$pt,0,1,'L');
					$pdf->SetFont('Arial','B',11);
					$pdf->Cell(0,7,$jl,0,1,'L');
					$pdf->Cell(120,7,$tel,0,0,'L');
					$pdf->SetFont('Arial','',12);
					$pdf->Cell(28,7,'ID Transaksi : ',0,0,'L');
					$pdf->SetFont('Courier','',12);
					$pdf->Cell(0,7,$id_bayar,0,1,'L');
					$pdf->SetFillColor(95, 95, 95);
					$pdf->Rect(5, 27.5, 198, 3, 'FD');

					$pdf->SetLineWidth(0.6);
					$pdf->Ln(10);
					$pdf->Cell(20);
					$pdf->SetFont('Arial','B',14);
					$pdf->Cell(40,8,'Terima Dari  : ',0,0,'R');
					$pdf->SetFont('Courier','',14);
					$pdf->Cell(16,8,$pembayar,0,1,'L');
					$pdf->SetFont('Arial','B',14);
					$pdf->Cell(20);
					$pdf->Cell(40,8,'Uang Sejumlah  : ',0,0,'R');
					$pdf->SetFillColor(255, 255, 255);
					$pdf->SetFont('Courier','',12);
					$pdf->MultiCell(120,8,'### '.$jlh_bayar.' RUPIAH ###',0,'L');
					$pdf->SetFont('Arial','B',14);
					$pdf->SetY(-90);
					$pdf->Cell(20);
					$pdf->Cell(40,8,'Untuk Pembayaran  : ',0,0,'R');
					$pdf->SetFont('Courier','',12);
					$pdf->MultiCell(120,8,$payment,0,'L');

					$pdf->SetFont('Arial','B',14);
					$pdf->SetY(-80);
					$pdf->Cell(20);
					$pdf->Cell(40,8,'Iuran Bulan  : ',0,0,'R');
					$pdf->SetFont('Courier','',12);
					$pdf->MultiCell(120,8,$bln,0,'L');

					$pdf->SetY(-55);
					$pdf->SetFont('Courier','B','16');
					$pdf->Cell(60,12,'Rp '.$jlh_bayar.',-',1,0,'C');
					$pdf->SetY(-55);
					$pdf->SetFont('Courier','',12);
					$pdf->Cell(130);
					$pdf->Cell(0,6,'Kepahiang, '.$tanggal,0,1,'C');
					$pdf->Ln(10);
					$pdf->SetY(-32);
					$pdf->Cell(130);
					$pdf->SetFont('Courier','B',12);
					$pdf->Cell(0,6,$admins,0,1,'C');
					$pdf->Ln(1);
					$pdf->SetY(-27);
					$pdf->SetFont('Arial','I',10);
					$pdf->Cell(0,6,$notevalid,0,1,'R');
					$pdf->Output($pdfFilePath,'F');

					$status=$this->M_keuangan->get_daftar_ulang($nis);

					$thn = $this->M_keuangan->thn_ajar();

					$riwayat_bayar = $this->M_keuangan->riwayat_bayar_siswa($nis);
					$list_iuran = $this->M_keuangan->list_iuran($nis, $thn);

					$cek=count($status->row());
					$stat='';
					$id='';
					if($cek>0){
						foreach ($status->result() as $key) {
							$stat=$key->status_tagihan;
							$id=$key->id_daftar;
						}

						if($stat=='belum lunas'){
							$total_semua=0;
							foreach($list_iuran->result() as $row) { 
								$total_bayar=0;                                    
								foreach ($riwayat_bayar->result() as $key) {
    		   						if($key->id_iuran == $row->id_iuran && $key->status_bayar=='selesai'){
    		        					$total_bayar = $total_bayar+$key->jumlah_dibayarkan;     
    		    					}
    							}
   								$sisa_iuran=$row->total_tagihan-$total_bayar;
								$total_semua=$total_semua+$sisa_iuran;
							}

							if ($total_semua<=0) {
								$this->M_keuangan->update_status_tagihan($id);
							}
						}

					}
					
				}
			}
			
			$this->session->set_flashdata('pesan','Data Tersimpan');
			redirect('Keuangan/bayar_iuran_langsung');
				

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function konfirmasi_bayar_iuran_langsung(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

				$id_iuran=$this->input->POST('id_iuran');
				$pembayar=$this->input->POST('nama');
				$jlh_bayar=$this->input->POST('jumlah');
				$bln=$this->input->POST('bln');
				$tipe_bayar=$this->input->POST('tipe');
				$jenis_bayar=$this->input->POST('jenis_bayar');
				$nis=$this->input->POST('nis');
				$tgl=date("Y-m-d");
				$kd = $this->session->userdata('primary_key');

				$pegawai = $this->M_keuangan->get_pegawai($kd);

				$angka=range(0,9);
				shuffle($angka);
				$ambilangka = array_rand($angka,5);
				$angkastring = implode('', $ambilangka);
				$id_bayar = $angkastring.'A';
				$status='selesai';
				$nama='gambar/nota/'.$id_bayar.'_'.$this->input->POST('nama').'.pdf';

				for($dat = 1 ; $dat > 0 ; $dat = $dat + 0){

					$cek = $this->M_keuangan->cek_id_bayar($id_bayar)->row();

					$dat = count($cek);

					if($dat>0) {
						shuffle($angka);
						$ambilangka = array_rand($angka,5);
						$angkastring = implode('', $ambilangka);
						$id_bayar = $angkastring.'A';
					}
				}

				$this->M_keuangan->bayar_iuran($id_bayar, $nis, $id_iuran, $pembayar, $jlh_bayar, $tipe_bayar, $jenis_bayar, $tgl, $nama, $status, $kd);

				$pdfFilePath = FCPATH."$nama";

				$pt='SMKN 02 Kepahiang';
				$jl='JL. DS. WESKUST - KEPAHIANG';
				$tel='0852-1400-6362';
				$cash='10000';
		
				$admins = $pegawai;
				$payment='Iuran Bulanan';
				$notevalid='validasi pembayaran dianggap sah bila disertai tanda tangan dan stempel';
		

				$tanggal=Date("d-m-Y");
				$admins=$admins;
				$kwnums='apa aja';

				$pdf = new FPDF('l','mm','A5');	

				$pdf->setMargins(5,5,5);
				$pdf->AddPage();
				$pdf->SetFont('Arial','B',12);
				$pdf->Cell(55,7,$pt,0,1,'L');
				$pdf->SetFont('Arial','B',11);
				$pdf->Cell(0,7,$jl,0,1,'L');
				$pdf->Cell(120,7,$tel,0,0,'L');
				$pdf->SetFont('Arial','',12);
				$pdf->Cell(28,7,'ID Transaksi : ',0,0,'L');
				$pdf->SetFont('Courier','',12);
				$pdf->Cell(0,7,$id_bayar,0,1,'L');
				$pdf->SetFillColor(95, 95, 95);
				$pdf->Rect(5, 27.5, 198, 3, 'FD');

				$pdf->SetLineWidth(0.6);
				$pdf->Ln(10);
				$pdf->Cell(20);
				$pdf->SetFont('Arial','B',14);
				$pdf->Cell(40,8,'Terima Dari  : ',0,0,'R');
				$pdf->SetFont('Courier','',14);
				$pdf->Cell(16,8,$pembayar,0,1,'L');
				$pdf->SetFont('Arial','B',14);
				$pdf->Cell(20);
				$pdf->Cell(40,8,'Uang Sejumlah  : ',0,0,'R');
				$pdf->SetFillColor(255, 255, 255);
				$pdf->SetFont('Courier','',12);
				$pdf->MultiCell(120,8,'### '.$jlh_bayar.' RUPIAH ###',0,'L');
				$pdf->SetFont('Arial','B',14);
				$pdf->SetY(-90);
				$pdf->Cell(20);
				$pdf->Cell(40,8,'Untuk Pembayaran  : ',0,0,'R');
				$pdf->SetFont('Courier','',12);
				$pdf->MultiCell(120,8,$payment,0,'L');

				$pdf->SetFont('Arial','B',14);
				$pdf->SetY(-80);
				$pdf->Cell(20);
				$pdf->Cell(40,8,'Iuran Bulan  : ',0,0,'R');
				$pdf->SetFont('Courier','',12);
				$pdf->MultiCell(120,8,$bln,0,'L');

				$pdf->SetY(-55);
				$pdf->SetFont('Courier','B','16');
				$pdf->Cell(60,12,'Rp '.$jlh_bayar.',-',1,0,'C');
				$pdf->SetY(-55);
				$pdf->SetFont('Courier','',12);
				$pdf->Cell(130);
				$pdf->Cell(0,6,'Kepahiang, '.$tanggal,0,1,'C');
				$pdf->Ln(10);
				$pdf->SetY(-32);
				$pdf->Cell(130);
				$pdf->SetFont('Courier','B',12);
				$pdf->Cell(0,6,$admins,0,1,'C');
				$pdf->Ln(1);
				$pdf->SetY(-27);
				$pdf->SetFont('Arial','I',10);
				$pdf->Cell(0,6,$notevalid,0,1,'R');
				$pdf->Output($pdfFilePath,'F');

				$status=$this->M_keuangan->get_daftar_ulang($nis);

				$thn = $this->M_keuangan->thn_ajar();

				$riwayat_bayar = $this->M_keuangan->riwayat_bayar_siswa($nis);
				$list_iuran = $this->M_keuangan->list_iuran($nis, $thn);

				$cek=count($status->row());
				$stat='';
				$id='';
				if($cek>0){
					foreach ($status->result() as $key) {
						$stat=$key->status_tagihan;
						$id=$key->id_daftar;
					}

					if($stat=='belum lunas'){
						$total_semua=0;
						foreach($list_iuran->result() as $row) { 
							$total_bayar=0;                                    
							foreach ($riwayat_bayar->result() as $key) {
    	   						if($key->id_iuran == $row->id_iuran && $key->status_bayar=='selesai'){
    	        					$total_bayar = $total_bayar+$key->jumlah_dibayarkan;     
    	    					}
    						}
   							$sisa_iuran=$row->total_tagihan-$total_bayar;
							$total_semua=$total_semua+$sisa_iuran;
						}

						if ($total_semua<=0) {
							$this->M_keuangan->update_status_tagihan($id);
						}
					}

				}
				printf($cek);

			$this->session->set_flashdata('pesan','Data Tersimpan');
			redirect('Keuangan/bayar_iuran_langsung');

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function lunas($b){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			//echo '<option value="'. $b.'">'.$b.'</option>';

			echo '<input name="jumlah" type="number" class="form-control" value="'.$b.'" readonly>';

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
	
	public function bayar_iuran_online(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			$data['list_siswa'] = $this->M_keuangan->daftar_Iuran_onine();
			
			$data['content_view']='keuangan/v_bayar_iuran_online.php';
			$this->load->view('keuangan/v_template', $data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function verifikasi_bayar_iuran_online(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			$id_bayar=$this->uri->segment(3);
			$id_iuran=$this->uri->segment(4);
			$data['list_bayar'] = $this->M_keuangan->validasi_Iuran_online($id_bayar);
			$data['riwayat_bayar'] = $this->M_keuangan->riwayat_bayar($id_iuran);
			//$data['periode'] = $this->M_siswa->tahun_ajaran();
			$data['content_view']='keuangan/v_detail_pembayaran_online.php';
			$this->load->view('keuangan/v_template', $data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function konfirmasi_pembayaran_online(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			if($this->input->post('tombol')=='terima'){
				$id = $this->input->POST('id');
				$nis = $this->input->POST('nis');
				$idb = $this->input->POST('id_bayar');
				$pembayar = $this->input->POST('nama_siswa');
				$jlh_bayar = $this->input->POST('jumlah_bayar');
				$bulan = $this->input->POST('bln');
				$kd = $this->session->userdata('primary_key');

				$pegawai = $this->M_keuangan->get_pegawai($kd);

				$nama='gambar/nota/'.$idb.'_'.$pembayar.'.pdf';

				$this->M_keuangan->konfirmasi_pembayaran_online($idb, $nama, $kd);

				$pdfFilePath = FCPATH."$nama";

				$pt='SMKN 02 Kepahiang';
				$jl='JL. DS. WESKUST - KEPAHIANG';
				$tel='0852-1400-6362';
			
		
				$admins=$pegawai;
				$payment='Iuran Bulanan';
				$notevalid='validasi pembayaran dianggap sah bila disertai tanda tangan dan stempel';
			

				$tanggal=Date("d-m-Y");
				$admins=$admins;

				$pdf = new FPDF('l','mm','A5');

				$pdf->setMargins(5,5,5);
				$pdf->AddPage();
				$pdf->SetFont('Arial','B',12);
				$pdf->Cell(55,7,$pt,0,1,'L');
				$pdf->SetFont('Arial','B',11);
				$pdf->Cell(0,7,$jl,0,1,'L');
				$pdf->Cell(120,7,$tel,0,0,'L');
				$pdf->SetFont('Arial','',12);
				$pdf->Cell(28,7,'ID Transaksi : ',0,0,'L');
				$pdf->SetFont('Courier','',12);
				$pdf->Cell(0,7,$idb,0,1,'L');
				$pdf->SetFillColor(95, 95, 95);
				$pdf->Rect(5, 27.5, 198, 3, 'FD');

				$pdf->SetLineWidth(0.6);
				$pdf->Ln(10);
				$pdf->Cell(20);
				$pdf->SetFont('Arial','B',14);
				$pdf->Cell(40,8,'Terima Dari  : ',0,0,'R');	
				$pdf->SetFont('Courier','',14);
				$pdf->Cell(16,8,$pembayar,0,1,'L');
				$pdf->SetFont('Arial','B',14);
				$pdf->Cell(20);
				$pdf->Cell(40,8,'Uang Sejumlah  : ',0,0,'R');
				$pdf->SetFillColor(255, 255, 255);
				$pdf->SetFont('Courier','',12);
				$pdf->MultiCell(120,8,'### '.$jlh_bayar.' RUPIAH ###',0,'L');
				$pdf->SetFont('Arial','B',14);
				$pdf->SetY(-90);
				$pdf->Cell(20);
				$pdf->Cell(40,8,'Untuk Pembayaran  : ',0,0,'R');
				$pdf->SetFont('Courier','',12);
				$pdf->MultiCell(120,8,$payment,0,'L');

				$pdf->SetFont('Arial','B',14);
				$pdf->SetY(-80);
				$pdf->Cell(20);
				$pdf->Cell(40,8,'Iuran Bulan  : ',0,0,'R');
				$pdf->SetFont('Courier','',12);
				$pdf->MultiCell(120,8,$bulan,0,'L');

				$pdf->SetY(-55);
				$pdf->SetFont('Courier','B','16');
				$pdf->Cell(60,12,'Rp '.$jlh_bayar.',-',1,0,'C');
				$pdf->SetY(-55);
				$pdf->SetFont('Courier','',12);
				$pdf->Cell(130);
				$pdf->Cell(0,6,'Kepahiang, '.$tanggal,0,1,'C');
				$pdf->Ln(10);
				$pdf->SetY(-32);
				$pdf->Cell(130);
				$pdf->SetFont('Courier','B',12);
				$pdf->Cell(0,6,$admins,0,1,'C');
				$pdf->Ln(1);
				$pdf->SetY(-27);
				$pdf->SetFont('Arial','I',10);
				$pdf->Cell(0,6,$notevalid,0,1,'R');
				$pdf->Output($pdfFilePath,'F');

				$status=$this->M_keuangan->get_daftar_ulang($nis);

				$thn = $this->M_keuangan->thn_ajar();

				$riwayat_bayar = $this->M_keuangan->riwayat_bayar_siswa($nis);
				$list_iuran = $this->M_keuangan->list_iuran($nis, $thn);

				$cek=count($status->row());
				$stat='';
				$id='';
				if($cek>0){
					foreach ($status->result() as $key) {
						$stat=$key->status_tagihan;
						$id=$key->id_daftar;
					}

					if($stat=='belum lunas'){
						$total_semua=0;
						foreach($list_iuran->result() as $row) { 
							$total_bayar=0;                                    
							foreach ($riwayat_bayar->result() as $key) {
    	   						if($key->id_iuran == $row->id_iuran && $key->status_bayar=='selesai'){
    	        					$total_bayar = $total_bayar+$key->jumlah_dibayarkan;     
    	    					}
    						}
   							$sisa_iuran=$row->total_tagihan-$total_bayar;
							$total_semua=$total_semua+$sisa_iuran;
						}

						if ($total_semua<=0) {
							$this->M_keuangan->update_status_tagihan($id);
						}
					}

				}

				$this->session->set_flashdata('pesan','terima');
				redirect('keuangan/bayar_iuran_online');
			}else{
				$data['nis']=$this->input->post('nis');
				$data['id_bayar']=$this->input->post('id_bayar');
				$data['content_view']='keuangan/v_konfirmasi_penolakan_pembayaran_online';
				$this->load->view('Keuangan/v_template',$data);
			}

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	function konfirmasi_penolakan_pembayaran_online(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			$id_bayar=$this->input->post('id_bayar');
			$nis=$this->input->post('nis');
			$ket=$this->input->post('ket');
			$this->M_keuangan->konfirmasi_penolakan_pembayaran_online($id_bayar, $ket, $nis);
			$this->session->set_flashdata('pesan','tolak');
			redirect('Keuangan/bayar_iuran_online');

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function bayar_iuran_sisa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			
			$nis=$this->uri->segment(3);
			$data['list_iuran'] = $this->M_keuangan->list_tagihan_siswa($nis);
			//$data['periode'] = $this->M_siswa->tahun_ajaran();
			$data['content_view']='keuangan/v_daftar_tagihan.php';
			$this->load->view('keuangan/v_template', $data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function list_status_pembayaran(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			$nis=$this->uri->segment(3);
			$thn = $this->M_keuangan->thn_ajar();

			$data['riwayat_bayar'] = $this->M_keuangan->riwayat_bayar_siswa($nis);

			$data['list_iuran'] = $this->M_keuangan->list_iuran($nis,$thn);
		
			$data['content_view']='keuangan/v_list_status_pembayaran.php';
			$this->load->view('keuangan/v_template', $data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function status_pembayaran_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			$data['list_siswa'] = $this->M_keuangan->daftar_siswa();

			$data['riwayat_bayar'] = $this->M_keuangan->get_riwayat_bayar();

			$data['list_iuran'] = $this->M_keuangan->get_iuran();

			$data['nip'] = $this->session->userdata('nip');
			$data['nama'] = $this->session->userdata('nama');
		
			$data['content_view']='keuangan/v_status_pembayaran_siswa.php';
			$this->load->view('keuangan/v_template', $data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function riwayat_transaksi_siswa(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			$data['list_transaksi'] = $this->M_keuangan->riwayat_transaksi();
		
			$data['content_view']='keuangan/v_riwayat_transaksi.php';
			$this->load->view('keuangan/v_template', $data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function lihat_nota_pdf(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			$id = $this->uri->segment(3);
			$data['lokasi'] = $this->M_keuangan->lihat_nota($id);
		
			$this->load->view('keuangan/v_tampil_nota.php', $data);	

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function lihat_bukti_bayar(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			$id = $this->uri->segment(3);
			$data['lokasi'] = $this->M_keuangan->lihat_nota($id);
		
			$this->load->view('keuangan/v_tampil_bukti_bayar', $data);	

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function lihat_riwayat_bayar(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			$id = $this->uri->segment(3);
			$data['list_transaksi'] = $this->M_keuangan->riwayat_bayar($id);
		
			$data['content_view']='keuangan/v_riwayat_transaksi.php';
			$this->load->view('keuangan/v_template', $data);
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function konfirmasi_status_tagihan(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			$tahun_ajaran = $this->M_keuangan->thn_ajar();
			$data['list_siswa'] = $this->M_keuangan->daftar_siswa_proses($tahun_ajaran);
			//$data['periode'] = $this->M_siswa->tahun_ajaran();
			$data['content_view']='keuangan/v_konfirmasi_status_tagihan.php';
			$this->load->view('keuangan/v_template', $data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function detail_konfirmasi_status_tagihan(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {

			$nis = $this->uri->segment(3);
			$tahun_ajaran = $this->M_keuangan->thn_ajar();
			$data['id_daftar'] = $this->uri->segment(4);
			$data['status'] = $this->uri->segment(5);

			$data['riwayat_bayar'] = $this->M_keuangan->riwayat_bayar_siswa($nis);
			$data['siswa'] = $this->M_keuangan->get_siswa($nis);
			$data['list_iuran'] = $this->M_keuangan->list_iuran($nis, $tahun_ajaran);
			$data['content_view']='keuangan/v_detail_konfirmasi_status_tagihan.php';
			$this->load->view('keuangan/v_template', $data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	public function simpan_konfirmasi_status_tagihan(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
			if($this->input->post('tombol')=='lunas'){
				$id_daftar=$this->input->post('id_daftar');
				$nis=$this->input->post('nis');
				$this->M_keuangan->konfirmasi($nis, $id_daftar);	
				$this->session->set_flashdata('pesan','lunas');	
				redirect('Keuangan/konfirmasi_status_tagihan');
			}else if($this->input->post('tombol')=='belum lunas'){
				$id_daftar=$this->input->post('id_daftar');
				$nis=$this->input->post('nis');
				$this->M_keuangan->konfirmasi_penolakan($nis, $id_daftar);
				$this->session->set_flashdata('pesan','belum lunas');
				redirect('Keuangan/konfirmasi_status_tagihan');
			}
		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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

	function pdf(){
		$logged_in = $this->session->userdata('logged_in');
		$kategori = $this->session->userdata('kategori');

		if (!$logged_in) {
			$this->load->view('v_login.php');
		} else if($logged_in==true && $kategori=='keuangan') {
				$this->load->library('fpdf');

				$tahun_ajaran = $this->M_keuangan->thn_ajar();
				$nis = $this->uri->segment(3);
				$data['nama']= $this->uri->segment(5);
				$data['nip']= $this->uri->segment(4);
				$data['siswa']= $this->M_keuangan->getsiswa($nis, $tahun_ajaran);

				$data['bayar'] = $this->M_keuangan->riwayat_bayar_siswa($nis);
				$data['iuran'] = $this->M_keuangan->list_iuran($nis, $tahun_ajaran);

				$this->load->view('keuangan/v_surat_teguran',$data);

		} else if($logged_in==true && $kategori=='wali kelas') {
			redirect('Walikelas');
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