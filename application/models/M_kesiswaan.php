<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kesiswaan extends CI_Model {
	
	function thn_ajar(){
		$query=$this->db->query("select max(tahun_ajaran) as thn from tahun_ajaran;");
		$thn_ajar='20';
		foreach ($query->result() as $row) {
			$thn_ajar=$row->thn;
		}
		return $thn_ajar;
	}

	function get_tahun_ajar(){
		$query=$this->db->query("select * from tahun_ajaran;");
		return $query;
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

	function get_list_daftar($tahun_ajaran){
		$query=$this->db->query("select * from daftar_ulang where tahun_ajaran='$tahun_ajaran';");

		return $query;
	}

	function get_data_siswa($nis){
    	$query=$this->db->query("select * from siswa where nis='$nis';");

		return $query;
	}
    
    function get_siswa(){
    	$tahun_ajaran=$this->M_kesiswaan->thn_ajar();
    	$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk=kelas_siswa.id_kelas_dibentuk');
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('program_studi', 'program_studi.kd_prodi = kelas.kd_prodi');
		$this->db->join('guru', 'guru.kd_guru = kelas_dibentuk.kd_guru');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->where('kelas_dibentuk.tahun_ajaran', $tahun_ajaran);
		return $this->db->get();
    }

    function kirim_notifikasi($username, $ket){
    	$nama=$this->session->userdata('nama');
    	$this->db->query("INSERT INTO notifikasi (id_notifikasi, pesan, status_pesan,username_penerima, nama_pengirim) VALUES ('','$ket', 'belum terbaca' ,'$username', '$nama');");
    }

    function get_daftar_ulang(){
		$this->db->select('*');
		$this->db->from('daftar_ulang');
		$this->db->join('siswa', 'daftar_ulang.nis = siswa.nis ');
		$this->db->join('tahun_ajaran', 'daftar_ulang.tahun_ajaran = tahun_ajaran.tahun_ajaran');
		$this->db->where('status_registrasi <>', 'proses');
		return $this->db->get();
	}

	function simpan_waktu($tgl1, $tgl2){
		$thn=$this->M_kesiswaan->thn_ajar();

		$this->db->query("INSERT INTO masa_daftar_ulang(start_date, end_date, tahun_ajaran) VALUES ('$tgl1', '$tgl2', '$thn');");
	}

	function update_waktu($id, $tgl1, $tgl2){
		$this->db->query("UPDATE masa_daftar_ulang SET start_date='$tgl1', end_date='$tgl2' WHERE id_masa='$id';");
	}

	function get_waktu(){
		$this->db->select('*');
		$this->db->from('masa_daftar_ulang');
		$this->db->join('tahun_ajaran', 'masa_daftar_ulang.tahun_ajaran = tahun_ajaran.tahun_ajaran');
		return $this->db->get();
	}

	function waktu(){
		$thn=$this->M_kesiswaan->thn_ajar();

		$this->db->select('*');
		$this->db->from('masa_daftar_ulang');
		$this->db->join('tahun_ajaran', 'masa_daftar_ulang.tahun_ajaran = tahun_ajaran.tahun_ajaran');
		$this->db->where('masa_daftar_ulang.tahun_ajaran', $thn);
		return $this->db->get();
	}

	function get_kelas(){
		$thn=$this->M_kesiswaan->thn_ajar();

		$this->db->select('*');
		$this->db->from('kelas_dibentuk');
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->where('kelas_dibentuk.tahun_ajaran', $thn);
		return $this->db->get();
	}

	function get_kelas_filter($th){
		$this->db->select('*');
		$this->db->from('kelas_dibentuk');
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->where('kelas_dibentuk.tahun_ajaran', $th);
		return $this->db->get();
	}

	function get_siswa_sudah_daftar_filter($th){

		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('daftar_ulang', 'daftar_ulang.nis = siswa.nis ');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');	
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk = kelas_siswa.id_kelas_dibentuk');	
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->where('kelas_dibentuk.tahun_ajaran', $th);
		$this->db->where('status_registrasi', 'selesai');

		return $this->db->get();	
	}

	function get_siswa_sudah_daftar(){
		$thn=$this->M_kesiswaan->thn_ajar();

		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('daftar_ulang', 'daftar_ulang.nis = siswa.nis ');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');	
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk = kelas_siswa.id_kelas_dibentuk');	
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->where('kelas_dibentuk.tahun_ajaran', $thn);
		$this->db->where('status_registrasi', 'selesai');
		return $this->db->get();	
	}

	function get_siswa_aktif(){
		$thn=$this->M_kesiswaan->thn_ajar();

    	$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');	
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk = kelas_siswa.id_kelas_dibentuk');	
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->where('kelas_dibentuk.tahun_ajaran', $thn);
		return $this->db->get();	
    }

    function get_siswa_aktif_filter($th){
    	$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');	
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk = kelas_siswa.id_kelas_dibentuk');	
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->where('kelas_dibentuk.tahun_ajaran', $th);
		return $this->db->get();	
    }

    function get_siswa_kelas_belum($id){
    	$query = $this->db->query("SELECT * from siswa s 
    		join kelas_siswa kss on(s.nis=kss.nis)
			join kelas_dibentuk kdb on(kdb.id_kelas_dibentuk=kss.id_kelas_dibentuk) 
			join tahun_ajaran ta on(kdb.tahun_ajaran=ta.tahun_ajaran) 
			join kelas k on(kdb.kd_kelas=k.kd_kelas)
			join program_studi p on(p.kd_prodi=k.kd_prodi)
			WHERE NOT EXISTS
				(select * from siswa ss
						join daftar_ulang du on(du.nis=ss.nis)
						join kelas_siswa ks on(ss.nis=ks.nis)
						join kelas_dibentuk kd on (kd.id_kelas_dibentuk=ks.id_kelas_dibentuk)
						where kd.id_kelas_dibentuk='$id' and du.status_registrasi='selesai' and s.nis=ss.nis)
			And kdb.id_kelas_dibentuk='$id';");
		return $query;
    }

     function get_siswa_kelas_sudah($id){
    	$query = $this->db->query("select * from siswa ss
						join daftar_ulang du on(du.nis=ss.nis)
						join kelas_siswa ks on(ss.nis=ks.nis)
						join kelas_dibentuk kdb on (kdb.id_kelas_dibentuk=ks.id_kelas_dibentuk)
						join tahun_ajaran ta on(kdb.tahun_ajaran=ta.tahun_ajaran) 
						join kelas k on(kdb.kd_kelas=k.kd_kelas)
						join program_studi p on(p.kd_prodi=k.kd_prodi)
						where kdb.id_kelas_dibentuk='$id' and du.status_registrasi='selesai'");
		return $query;
    }
}
?>
