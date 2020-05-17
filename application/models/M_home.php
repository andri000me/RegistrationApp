<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {
    
	function cek_user_siswa($nis, $sandi) {
		$query = $this->db->query("select * from siswa
								where nis = '$nis' and password = md5('$sandi')");  
		return $query;
	}

	function cek_username_siswa($nis) {
		$query = $this->db->query("select * from siswa
								where nis = '$nis'");  
		return $query;
	}

	function cek_user($nama, $sandi, $kategori){
		$query = $this->db->query("select * from user
									WHERE username = '$nama' and password = md5('$sandi') and id_kategori='5'");  
		return $query;
	}

	function cek_user_pegawai($nama, $sandi) {
		$query = $this->db->query("select * from user
								join kategori_user on(user.id_kategori = kategori_user.id_kategori)
								join pegawai on(user.username = pegawai.username)
								where user.username = '$nama' and user.password = md5('$sandi')");  
		return $query;
	}

	function cek_user_walikelas($nama, $sandi) {
		$query = $this->db->query("select * from user
								join kategori_user on(user.id_kategori = kategori_user.id_kategori)
								join guru on(user.username = guru.username)
								where user.username = '$nama' and user.password = md5('$sandi')");  
		return $query;
	}

	function cek_username_walikelas($nama) {
		$query = $this->db->query("select * from user
								join kategori_user on(user.id_kategori = kategori_user.id_kategori)
								join guru on(user.username = guru.username)
								where user.username = '$nama';");  
		return $query;
	}

	function cek_username_pegawai($nama) {
		$query = $this->db->query("select * from user
								join kategori_user on(user.id_kategori = kategori_user.id_kategori)
								join pegawai on(user.username = pegawai.username)
								where user.username = '$nama'");  
		return $query;
	}

}
?>
