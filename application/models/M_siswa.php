<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

	function thn_ajar(){
		$query=$this->db->query("select max(tahun_ajaran) as thn from tahun_ajaran;");
		$thn_ajar='20';
		foreach ($query->result() as $row) {
			$thn_ajar=$row->thn;
		}
		return $thn_ajar;
	}

	function semester(){
		$query=$this->db->query("select max(tahun_ajaran) as thn, semester from tahun_ajaran;");
		$thn_ajar='20';
		foreach ($query->result() as $row) {
			$semester=$row->semester;
		}
		return $semester;
	}

	/*function hapus_pembayaran($id_iuran){
		$this->db->query("delete from program_studi where kd_prodi='$kd'");
	}*/

	function get_data_user($kd){
		$this->db->select('*');
		$this->db->from('siswa');	
		$this->db->where('nis', $kd);
		return $this->db->get();
	}

	function get_notifikasi($user){
		$this->db->select('*');
		$this->db->from('notifikasi');	
		$this->db->where('username_penerima', $user);
		$this->db->order_by('id_notifikasi','desc');
		$this->db->limit('5');
		return $this->db->get();
	}

	function get_user($username){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('nis', $username);
		return $this->db->get();
	}

	function simpan_password($username, $password){
		$this->db->query("UPDATE siswa SET password=md5('$password') WHERE nis='$username';");
	}

	function cek_daftar_ulang($nis,$ta){
		$query=$this->db->query("select * from daftar_ulang WHERE nis='$nis' and tahun_ajaran='$ta';");
		return $query;
	}
    
	function get_riwayat_tagihan() {
		$query = $this->db->get('daftar_ulang');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
    
	function cek_status($nis) {
		$this->db->where('nis',$nis);
		$query = $this->db->get('daftar_ulang');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	function riwayat_daftar_ulang($nis){
		$this->db->select('*');
		$this->db->from('daftar_ulang');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = daftar_ulang.tahun_ajaran');
		$this->db->where('nis',$nis);
		$query = $this->db->get();
		return $query;
		
	}

	function simpan_rapor_baru($id,$namabaru){
		$query = $this->db->query("UPDATE daftar_ulang SET rapor='$namabaru',status_rapor='proses' WHERE id_daftar='$id';");
	}

	function lihat_nota($id){
		$this->db->select('*');
		$this->db->from('tb_bayar_iuran');
		$this->db->where('id_bayar', $id);
		return $this->db->get();
	}

	function lihat_rapor($id){
		$query=$this->db->query("select * from daftar_ulang WHERE id_daftar='$id';");
		return $query;
	}

	function cek_iuran($id){
		$query=$this->db->query("select * from iuran_bulanan i join siswa s on (i.nis_siswa=s.nis) join tahun_ajaran t on(t.tahun_ajaran=i.tahun_ajaran) WHERE i.id_iuran='$id';");
		return $query;
	}

	function riwayat_bayar($id){
		$query=$this->db->query("select * from tb_bayar_iuran i join siswa s on (i.nis_siswa=s.nis) join pegawai on(i.kd_pegawai = pegawai.kd_pegawai) WHERE i.id_iuran='$id' and i.status_bayar='selesai';");
		return $query;
	}

	function riwayat_pembayaran($nis){
		$query=$this->db->query("select * from tb_bayar_iuran i join siswa s on (i.nis_siswa=s.nis) join pegawai on(i.kd_pegawai = pegawai.kd_pegawai) join iuran_bulanan ib on(ib.id_iuran = i.id_iuran) join tahun_ajaran ta on(ib.tahun_ajaran = ta.tahun_ajaran)  WHERE i.nis_siswa='$nis' and (i.status_bayar='selesai' or i.status_bayar='ditolak');");
		return $query;
	}

	function riwayat_bayar1($id){
		$query=$this->db->query("select * from tb_bayar_iuran i join siswa s on (i.nis_siswa=s.nis) WHERE i.id_iuran='$id' and i.status_bayar='proses';");
		return $query;
	}

	function riwayat_bayar_siswa($nis){
		$query=$this->db->query("select * from tb_bayar_iuran i join siswa s on (i.nis_siswa=s.nis) WHERE i.nis_siswa='$nis' and i.status_bayar='selesai';");
		return $query;
	}

	function riwayat_bayar_siswa_proses($nis){
		$query=$this->db->query("select * from tb_bayar_iuran i join siswa s on (i.nis_siswa=s.nis) WHERE i.nis_siswa='$nis' and i.status_bayar='proses';");
		return $query;
	}

	function cek_id_bayar($id){
		$query=$this->db->query("select * from tb_bayar_iuran i join siswa s on (i.nis_siswa=s.nis) WHERE i.id_bayar='$id';");
		return $query;
	}

	function cek_id_daftar($id){
		$query=$this->db->query("select * from daftar_ulang WHERE id_daftar='$id';");
		return $query;
	}

	function cek_riwayat_daftar_ulang($nis){
		$this->db->where('nis',$nis);
		$query = $this->db->get('daftar_ulang');
		if ($query->num_rows() > 0) {
			return $query;
		}
	}

	function list_iuran_ganjil($id, $tahun_ajaran){
		$bln = 	date('m');
		$query=$this->db->query("select * FROM iuran_bulanan i join tahun_ajaran t on(i.tahun_ajaran=t.tahun_ajaran) join siswa s on(s.nis=i.nis_siswa) where nis_siswa='$id' and bulan>='7' and bulan<='$bln' and i.tahun_ajaran='$tahun_ajaran' order by i.bulan asc;");
		return $query;
	}

	function list_iuran_genap($id, $tahun_ajaran){
		$bln = date('m');
		$query=$this->db->query("select * FROM iuran_bulanan i join tahun_ajaran t on(i.tahun_ajaran=t.tahun_ajaran) join siswa s on(s.nis=i.nis_siswa) where nis_siswa='$id' and bulan>='1' and bulan<='$bln' and i.tahun_ajaran='$tahun_ajaran' order by i.bulan asc;");
		return $query;
	}

	function simpan_pembayaran($data, $id_bayar, $id_iuran){

		$notif=$this->db->query("select * from user u join kategori_user k on(u.id_kategori=k.id_kategori) where nama_kategori='keuangan';");

		foreach($notif->result() as $row) {
        	$pesan = 'Pengajuan pembayaran baru oleh '.$this->session->userdata('nama');
        	$user = $row->username;
        	$link = 'Keuangan/verifikasi_bayar_iuran_online/'.$id_bayar.'/'.$id_iuran.'/';

        	$this->db->query("INSERT INTO notifikasi (id_notifikasi, pesan, username_penerima, status_pesan, id_bayar, link, nama_pengirim) VALUES ('', '$pesan', '$user', 'belum terbaca', '$id_bayar', '$link', 'sistem');");
        }

		$this->db->insert('tb_bayar_iuran ', $data);



	}

	function simpan_pendaftaran($data){
		$this->db->insert('daftar_ulang ', $data);
		return TRUE;
	}

	function get_nis(){
		$query=$this->db->query("select max(nis) as nis_baru from siswa;");
		foreach ($query->result() as $key) {
			$nis=$key->nis_baru+1;
		}
		return $nis;
	}

    function get_insert($data){
		$this->db->insert('daftar_ulang ', $data);
		return TRUE;
	}

	function get_waktu($tahun_ajaran){
		$this->db->select('*');
		$this->db->from('masa_daftar_ulang');
		$this->db->where('tahun_ajaran', $tahun_ajaran);
		return $this->db->get();
	}

	function update_notifikasi($user){
		$this->db->query("UPDATE notifikasi SET status_pesan='terbaca' WHERE username_penerima='$user';");
	}
}
?>