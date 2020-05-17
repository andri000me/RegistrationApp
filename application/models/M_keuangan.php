<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keuangan extends CI_Model {
    
	function thn_ajar(){
		$query=$this->db->query("select max(tahun_ajaran) as thn from tahun_ajaran;");
		$thn_ajar='20';
		foreach ($query->result() as $row) {
			$thn_ajar=$row->thn;
		}
		return $thn_ajar;
	}

	function update_notifikasi($user){
		$this->db->query("UPDATE notifikasi SET status_pesan='terbaca' WHERE username_penerima='$user';");
	}

	function get_notifikasi($user){
		$this->db->select('*');
		$this->db->from('notifikasi');	
		$this->db->where('username_penerima', $user);
		$this->db->where('status_pesan', 'belum terbaca');
		$this->db->order_by('id_notifikasi','desc');
		$this->db->limit('5');
		return $this->db->get();
	}

	function get_notifikasi_lebih($user){
		$this->db->select('*');
		$this->db->from('notifikasi');	
		$this->db->where('username_penerima', $user);
		$this->db->where('status_pesan', 'belum terbaca');
		$this->db->order_by('id_notifikasi','desc');
		return $this->db->get();
	}

	function get_data_user($kd){
		$this->db->select('*');
		$this->db->from('pegawai');	
		$this->db->where('kd_pegawai', $kd);
		return $this->db->get();
	}

	function get_user($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $this->db->get();
	}

	function simpan_password($username, $password){
		$this->db->query("UPDATE user SET password=md5('$password') WHERE username='$username';");
	}

	function get_daftar_ulang($nis){
		$thn = $this->M_keuangan->thn_ajar();
		$this->db->select('*');
		$this->db->from('daftar_ulang');
		$this->db->where('tahun_ajaran', $thn);
		$this->db->where('nis', $nis);
		return $this->db->get();
	}

	function daftar_siswa(){
		
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk = kelas_siswa.id_kelas_dibentuk');
		$this->db->join('kelas', 'kelas_dibentuk.kd_kelas = kelas.kd_kelas');
		$this->db->join('program_studi', 'program_studi.kd_prodi = kelas.kd_prodi');
		return $this->db->get();
	}

	function daftar_siswa_aktif($thn){
		
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk = kelas_siswa.id_kelas_dibentuk');
		$this->db->join('kelas', 'kelas_dibentuk.kd_kelas = kelas.kd_kelas');
		$this->db->join('program_studi', 'program_studi.kd_prodi = kelas.kd_prodi');
		$this->db->where('kelas_dibentuk.tahun_ajaran', $thn);
		return $this->db->get();
	}

	function daftar_siswa_proses($id){
		$query=$this->db->query("select * FROM siswa s join daftar_ulang d on(s.nis= d.nis) join kelas_siswa ks on(s.nis = ks.nis) join kelas_dibentuk kd on(kd.id_kelas_dibentuk = ks.id_kelas_dibentuk) join kelas k on(kd.kd_kelas = k.kd_kelas) join program_studi p on(p.kd_prodi = k.kd_prodi) join tahun_ajaran ta on (ta.tahun_ajaran = d.tahun_ajaran) where d.status_tagihan='proses' OR d.status_tagihan='belum lunas' AND d.tahun_ajaran='$id';");
		

		return $query;
	}

	function daftar_Iuran_onine(){
		$query=$this->db->query("select * FROM tb_bayar_iuran t join siswa s on(t.nis_siswa=s.nis) join iuran_bulanan i on(i.id_iuran=t.id_iuran) where t.status_bayar='proses' AND t.tipe_pembayaran='online';");
		return $query;	
	}

	function riwayat_transaksi(){
		$query=$this->db->query("select * FROM tb_bayar_iuran t join siswa s on (t.nis_siswa=s.nis) join iuran_bulanan i on (t.id_iuran=i.id_iuran) join pegawai on(t.kd_pegawai = pegawai.kd_pegawai) where status_bayar='ditolak' or status_bayar='selesai';");
		return $query;
	}

	function riwayat_bayar($id){
		$query=$this->db->query("select * FROM tb_bayar_iuran t join siswa s on (t.nis_siswa=s.nis) join iuran_bulanan i on (t.id_iuran=i.id_iuran) join pegawai p on(t.kd_pegawai=p.kd_pegawai) where t.id_iuran='$id' and t.status_bayar='selesai';");
		return $query;
	}

	function validasi_Iuran_online($id){
		$query=$this->db->query("select * FROM tb_bayar_iuran t join iuran_bulanan i on(t.id_iuran=i.id_iuran) join siswa s on(s.nis=t.nis_siswa) where id_bayar='$id';");
		return $query;
	}

	function konfirmasi_pembayaran_online($idb, $nama, $kd){
		$this->db->query("UPDATE notifikasi SET status_pesan='terbaca' WHERE id_bayar='$idb';");
		$this->db->query("UPDATE tb_bayar_iuran SET status_bayar='selesai', nota_pembayaran='$nama', kd_pegawai='$kd' WHERE id_bayar='$idb';");
	}

	function list_iuran($id,$thn){
		$query=$this->db->query("select * FROM iuran_bulanan i join siswa s on(i.nis_siswa = s.nis) join tahun_ajaran ta on(ta.tahun_ajaran=i.tahun_ajaran) where nis_siswa='$id' and ta.tahun_ajaran='$thn' order by bulan asc;");
		return $query;
	}

	function riwayat_bayar_siswa($nis){
		$query=$this->db->query("select * from tb_bayar_iuran i join siswa s on(i.nis_siswa=s.nis) WHERE i.nis_siswa='$nis' and i.status_bayar='selesai';");
		return $query;
	}

	function cek_iuran($id){
		$query=$this->db->query("select * from iuran_bulanan i join siswa s on (i.nis_siswa=s.nis) WHERE i.id_iuran='$id';");
		return $query;
	}

	function cek_id_bayar($id){
		$query=$this->db->query("select * from tb_bayar_iuran i join siswa s on (i.nis_siswa=s.nis) WHERE i.id_iuran='$id';");
		return $query;
	}

	function lihat_nota($id){
		$query=$this->db->query("select * from tb_bayar_iuran WHERE id_bayar='$id';");
		return $query;
	}

	function bayar_iuran($id_bayar, $nis, $id_iuran, $nama, $jlh_bayar, $tipe_bayar, $jenis_bayar, $tgl, $bukti, $status, $kd){
		$this->db->query("INSERT INTO tb_bayar_iuran (id_bayar, nis_siswa, id_iuran, jumlah_dibayarkan, tipe_pembayaran, jenis_pembayaran, tgl_bayar, nota_pembayaran, status_bayar, kd_pegawai) VALUES ('$id_bayar', '$nis', '$id_iuran', '$jlh_bayar', '$tipe_bayar', '$jenis_bayar', '$tgl', '$bukti', '$status', '$kd');");
	}

	function get_pegawai($kd){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('pegawai', 'user.username = pegawai.username');
		$this->db->where('kd_pegawai',$kd);
		$query= $this->db->get();

		foreach ($query->result() as $row) {
			$nama_pegawai = $row->nama_pegawai;
		}

		return $nama_pegawai;
	}

	function get_siswa($nis){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk = kelas_siswa.id_kelas_dibentuk');
		$this->db->join('kelas', 'kelas_dibentuk.kd_kelas = kelas.kd_kelas');
		$this->db->join('program_studi', 'program_studi.kd_prodi = kelas.kd_prodi');
		$this->db->join('tahun_ajaran', 'kelas_dibentuk.tahun_ajaran = tahun_ajaran.tahun_ajaran');
		$this->db->where('siswa.nis',$nis);
		return $this->db->get();
	}

	function konfirmasi($nis, $id_daftar){
		$this->db->query("UPDATE daftar_ulang SET status_tagihan='lunas' WHERE id_daftar='$id_daftar';");

		$kd = $this->session->userdata('primary_key');

		$this->db->select('*');
		$this->db->from('daftar_ulang');
		$this->db->where('id_daftar',$id_daftar);
		$this->db->where('status_rapor', 'valid');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$this->db->query("UPDATE daftar_ulang SET status_registrasi='selesai' WHERE id_daftar='$id_daftar';");				
			$array = array(
        			'id_notifikasi' => '',
        			'pesan' => 'Registrasi Ulang Anda Telah Selesai',
        			'username_penerima' => $nis,
        			'status_pesan' => 'belum terbaca',
        			'nama_pengirim'=> $this->session->userdata('nama')
			);
			$this->db->insert('notifikasi',$array);
		}else{
			$array = array(
        			'id_notifikasi' => '',
        			'pesan' => 'Status Tagihan Anda Telah Lunas',
        			'username_penerima' => $nis,
        			'status_pesan' => 'belum terbaca',
        			'nama_pengirim'=> $this->session->userdata('nama')
			);
				$this->db->insert('notifikasi',$array);
		}

		return TRUE;
	}

	function konfirmasi_penolakan($nis, $id_daftar){
		$this->db->query("UPDATE daftar_ulang SET status_tagihan='belum lunas' WHERE id_daftar='$id_daftar';");

		$kd = $this->session->userdata('nama');

		$array = array(
       			'id_notifikasi' => '',
       			'pesan' => 'Tagihan Anda Belum Lunas, Silahkan Lunasi Tagihan Anda',
       			'username_penerima' => $nis,
       			'status_pesan' => 'belum terbaca',
       			'nama_pengirim'=> $kd
		);
		$this->db->insert('notifikasi',$array);

		return TRUE;
	}

	function konfirmasi_penolakan_pembayaran_online($id, $ket, $nis){
		$this->db->query("UPDATE notifikasi SET status_pesan='terbaca' WHERE id_bayar='$id';");

		$peg=$this->session->userdata('primary_key');
		$this->db->query("UPDATE tb_bayar_iuran SET status_bayar='ditolak', kd_pegawai='$peg' WHERE id_bayar='$id';");

		$kd = $this->session->userdata('nama');

		$array = array(
       			'id_notifikasi' => '',
       			'pesan' => $ket,
       			'username_penerima' => $nis,
       			'status_pesan' => 'belum terbaca',
       			'nama_pengirim'=> $kd
		);
		$this->db->insert('notifikasi',$array);

		return TRUE;
	}

	function getsiswa($nis, $thn){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk = kelas_siswa.id_kelas_dibentuk');
		$this->db->join('kelas', 'kelas_dibentuk.kd_kelas = kelas.kd_kelas');
		$this->db->join('program_studi', 'program_studi.kd_prodi = kelas.kd_prodi');
		$this->db->join('tahun_ajaran', 'kelas_dibentuk.tahun_ajaran = tahun_ajaran.tahun_ajaran');
		$this->db->where('siswa.nis',$nis);
		$this->db->where('kelas_dibentuk.tahun_ajaran',$thn);
		return $this->db->get();
	}

	function get_riwayat_bayar(){
		$this->db->select('*');
		$this->db->from('tb_bayar_iuran');
		$this->db->where('status_bayar','selesai');
		return $this->db->get();
	}

	function update_status_tagihan($id){
		$this->db->query("UPDATE daftar_ulang SET status_tagihan='proses' WHERE id_daftar='$id';");
	}

	function get_iuran(){
		$this->db->select('*');
		$this->db->from('iuran_bulanan');
		return $this->db->get();
	}

}
?>
