<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_walikelas extends CI_Model {
       
	function thn_ajar(){
		$query=$this->db->query("select max(tahun_ajaran) as thn from tahun_ajaran;");
		$thn_ajar='20';
		foreach ($query->result() as $row) {
			$thn_ajar=$row->thn;
		}
		return $thn_ajar;
	}

	function get_user($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $this->db->get();
	}

	function simpan_password($username, $password){
		$this->db->query("UPDATE user SET username='$username', password='$password' WHERE username='$user';");
	}

	function get_data_user($kd){
		$this->db->select('*');
		$this->db->from('guru');	
		$this->db->where('kd_guru', $kd);
		return $this->db->get();
	}

	function status_daftar_ulang($kd){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk = kelas_siswa.id_kelas_dibentuk');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('guru', 'guru.kd_guru = kelas_dibentuk.kd_guru');		
		$this->db->where('guru.kd_guru', $kd);
		return $this->db->get();
	}

	function list_daftar_ulang($kd, $thn){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('daftar_ulang', 'siswa.nis = daftar_ulang.nis');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = daftar_ulang.tahun_ajaran');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk = kelas_siswa.id_kelas_dibentuk');
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('guru', 'guru.kd_guru = kelas_dibentuk.kd_guru');		
		$this->db->where('guru.kd_guru', $kd);
		$this->db->where('daftar_ulang.tahun_ajaran', $thn);
		return $this->db->get();
	}

	function list_pengajuan_daftar_ulang($kd,$thn){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('daftar_ulang', 'siswa.nis = daftar_ulang.nis');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk = kelas_siswa.id_kelas_dibentuk');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('guru', 'guru.kd_guru = kelas_dibentuk.kd_guru');		
		$this->db->where('kelas_dibentuk.kd_guru', $kd);
		$this->db->where('daftar_ulang.status_rapor', 'proses');
		$this->db->where('daftar_ulang.tahun_ajaran', $thn);
		return $this->db->get();
	}

	function konfirmasi_detail($id){
		$this->db->select('*');
		$this->db->from('daftar_ulang');
		$this->db->join('siswa', 'siswa.nis = daftar_ulang.nis');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk = kelas_siswa.id_kelas_dibentuk');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('guru', 'guru.kd_guru = kelas_dibentuk.kd_guru');		
		$this->db->where('daftar_ulang.id_daftar', $id);
		return $this->db->get();
	}

	function konfirmasi($nis, $id_daftar){
		$this->db->query("UPDATE daftar_ulang SET status_rapor='valid' WHERE id_daftar='$id_daftar';");

		$this->db->select('*');
		$this->db->from('daftar_ulang');
		$this->db->join('siswa', 'daftar_ulang.nis = siswa.nis');
		$this->db->where('daftar_ulang.id_daftar', $id_daftar);
		$this->db->where('daftar_ulang.status_tagihan', 'lunas');
		$this->db->where('daftar_ulang.status_rapor', 'valid');
		$data = $this->db->get();

		$kd=$this->session->userdata('nama');

		if ($data->num_rows() > 0) {
			$this->db->query("UPDATE daftar_ulang SET status_registrasi='selesai' WHERE id_daftar='$id_daftar';");	
						
			$array = array(
        			'id_notifikasi' => '',
        			'pesan' => 'Registrasi Ulang Anda Telah Selesai',
        			'username_penerima' => $nis,
        			'status_pesan' => 'belum terbaca',
        			'nama_pengirim'=> $kd
			);
			$this->db->insert('notifikasi',$array);
		}else{
			if(count($data)>0){
				$array = array(
        				'id_notifikasi' => '',
        				'pesan' => 'Rapor Sudah Diverifikasi',
        				'username_penerima' => $nis,
        				'status_pesan' => 'belum terbaca',
        				'nama_pengirim'=> $kd
				);
				$this->db->insert('notifikasi',$array);
			}
		}

		return TRUE;
	}

	function konfirmasi_penolakan($id, $ket, $nis){
		$kd=$this->session->userdata('nama');
		$this->db->query("UPDATE daftar_ulang SET status_rapor='tidak valid' WHERE id_daftar='$id';");

			$array = array(
        			'id_notifikasi' => '',
        			'pesan' => $ket,
        			'username_penerima' => $nis,
        			'status_pesan' => 'belum terbaca',
        			'nama_pengirim'=> $kd
			);
			$this->db->insert('notifikasi',$array);		

	}

	function kirim_notifikasi($nis, $ket){

		$kd=$this->session->userdata('nama');

			if(count($data)>0){
				$array = array(
        				'id_notifikasi' => '',
        				'pesan' => $ket,
        				'username_penerima' => $nis,
        				'status_pesan' => 'belum terbaca',
        				'nama_pengirim'=> $kd
				);
				$this->db->insert('notifikasi',$array);
			}
		return TRUE;
	}
}
?>
