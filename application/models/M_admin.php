<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

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

	function get_data_user($kd){
		$this->db->select('*');
		$this->db->from('pegawai');	
		$this->db->where('kd_pegawai', $kd);
		return $this->db->get();
	}

	function kelola_user_siswa(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('kategori_user', 'kategori_user.id_kategori = user.id_kategori ');
		$this->db->join('siswa', 'user.username = siswa.username');
		return $this->db->get();
	}

	function get_user($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $this->db->get();
	}

	function simpan_kelas_siswa($kd_kelas, $nis){
		$this->db->query("INSERT INTO kelas_siswa(id_kelas_dibentuk, nis) VALUES ('$kd_kelas','$nis');");
	}

	function update_kelas_siswa($kd_kelas, $id){
		$this->db->query("UPDATE kelas_siswa SET id_kelas_dibentuk='$kd_kelas' WHERE idkelas_siswa='$id';");
	}

	function simpan_password($username, $password){
		$this->db->query("UPDATE user SET password=md5('$password') WHERE username='$username';");
	}

	function validasi_username($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $this->db->get();
	}

	function edit_user($username, $password, $status_user, $user){
		$this->db->query("UPDATE user SET username='$username', password='$password' WHERE username='$user';");
	}

	function edit_user_pass($username, $password, $status_user, $user){
		$this->db->query("UPDATE user SET username='$username', password = md5('$password') WHERE username='$user';");
		return ;
	}

	function edit_user_no_pass($username, $password, $status_user, $user){
		$this->db->query("UPDATE user SET username='$username', password = '$password' WHERE username='$user';");
		return ;
	}

	function kelola_user_pegawai(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('kategori_user', 'kategori_user.id_kategori = user.id_kategori ');
		$this->db->join('pegawai', 'user.username = pegawai.username');
		return $this->db->get();
	}

	function kelola_user_guru(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('kategori_user', 'kategori_user.id_kategori = user.id_kategori ');
		$this->db->join('guru', 'user.username = guru.username');
		return $this->db->get();
	}

	function update_tahun_ajaran($id_thn_ajar,$tahun_ajar, $semester){
		$this->db->query("INSERT INTO tahun_ajaran(tahun_ajaran, tahun, semester) VALUES ('$id_thn_ajar','$tahun_ajar','$semester');");
	}

	function cek_thn_ajar($id_thn_ajar){
		$this->db->select('*');
		$this->db->from('tahun_ajaran');
		$this->db->where('tahun_ajaran', $id_thn_ajar);
		return $this->db->get();
	}

	public function tambah_kelas($kd_kelas, $nama_kelas, $tingkat, $angka, $prodi){
		$this->db->query("INSERT INTO kelas(kd_kelas, tingkat, nama_kelas, angka, kd_prodi) VALUES ('$kd_kelas', '$tingkat', '$nama_kelas', '$angka', '$prodi');");
	}

	public function tambah_prodi($kd, $nama, $thn){
		$this->db->query("INSERT INTO program_studi(kd_prodi, nama_prodi, thn_pertama) VALUES ('$kd', '$nama', '$thn');");
	}

	public function tambah_pegawai($kd, $nama, $bagian){
		$this->db->query("INSERT INTO pegawai(kd_pegawai, nama_pegawai, bagian, username) VALUES ('$kd', '$nama', '$bagian', null);");
	}

	public function tambah_guru($data){
		$this->db->insert('guru', $data);
	}
	
	public function tambah_user_pegawai($username, $pass, $kd, $id){
		$this->db->query("INSERT INTO user(username, password, id_kategori) VALUES ('$username', md5('$pass'), '$id');");	
		$this->db->query("UPDATE pegawai SET username='$username' WHERE kd_pegawai='$kd';");
	}

	public function tambah_user_walikelas($username, $pass, $kd, $id){
		$this->db->query("INSERT INTO user(username, password, id_kategori) VALUES ('$username', md5('$pass'), '$id');");	
		$this->db->query("UPDATE guru SET username='$username' WHERE kd_guru='$kd';");
	}

	public function cek_kelas($kd_kelas, $nama_kelas){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->where('nama_kelas', $nama_kelas);

		$this->db->where('kd_kelas', $kd_kelas);
		return $this->db->get();
	}

	public function cek_pegawai($kd){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('kd_pegawai', $kd);
		return $this->db->get();
	}

	public function cek_guru($kd){
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->where('kd_guru', $kd);
		return $this->db->get();
	}

	public function cek_prodi($kd, $nama){
		$query = $this->db->query("select * from program_studi where nama_prodi = '$nama' or kd_prodi='$kd';");
		return $query;
	}

	public function cek_user($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $this->db->get();
	}

	public function hapus_prodi($kd){
		$this->db->query("delete from program_studi where kd_prodi='$kd'");
	}

	public function hapus_kelas($kd){
		$this->db->query("delete from kelas where kd_kelas='$kd'");
	}

	function hapus_thn_ajar($kd){
		$this->db->query("delete from tahun_ajaran where tahun_ajaran='$kd'");
	}

	function hapus_siswa($nis){
		$this->db->query("delete from siswa where nis='$nis'");	
	}

	public function hapus_guru($kd){
		$this->db->query("delete from guru where kd_guru='$kd'");
	}

	public function hapus_pegawai($kd){
		$this->db->query("delete from pegawai where kd_pegawai='$kd'");
	}

	function cek_walikelas($thn_ajar, $kd_kelas, $kd_guru){
		$query = $this->db->query("SELECT * from kelas_dibentuk WHERE kd_kelas = '$kd_kelas' or kd_guru = '$kd_guru' and tahun_ajaran = '$id_thn_ajar'");
		return $query;
	}

	function cek_nip_guru($nip){
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->where('nip', $nip);
		return $this->db->get();
	}

	function get_siswa($tahun_ajaran){
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

	function get_siswa_baru(){
		$tahun=date('Y');
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('program_studi', 'program_studi.kd_prodi = siswa.kd_prodi');
		$this->db->where('siswa.thn_diterima', $tahun);
		return $this->db->get();
	}

	function get_siswa_daftar($tahun_ajaran){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('daftar_ulang', 'daftar_ulang.nis = siswa.nis');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk=kelas_siswa.id_kelas_dibentuk');
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('program_studi', 'program_studi.kd_prodi = kelas.kd_prodi');
		$this->db->join('guru', 'guru.kd_guru = kelas_dibentuk.kd_guru');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->where('daftar_ulang.tahun_ajaran', $tahun_ajaran);
		$this->db->where('daftar_ulang.status_registrasi', 'selesai');
		return $this->db->get();
	}

	function get_sis($nis){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('nis', $nis);
		return $this->db->get();
	}

	function getsiswa(){
		$this->db->select('*');
		$this->db->from('siswa');
		return $this->db->get();
	}

	function cek_kelas_siswa($kd_kelas, $nis, $thn_ajar){
		$query = $this->db->query("SELECT * from kelas_siswa join kelas_dibentuk on (kelas_dibentuk.id_kelas_dibentuk=kelas_siswa.id_kelas_dibentuk) WHERE kelas_siswa.id_kelas_dibentuk = '$kd_kelas' or nis = '$nis' and tahun_ajaran='$thn_ajar'");
		return $query;
	}

	function get_siswa_no_kelas($tahun){
		$query = $this->db->query("SELECT * from siswa s WHERE NOT EXISTS
			(select * from siswa ss
			join kelas_siswa ks on(ss.nis=ks.nis)
			join kelas_dibentuk kd on (kd.id_kelas_dibentuk=ks.id_kelas_dibentuk)
			where kd.tahun_ajaran='$tahun' and s.nis=ks.nis);");
		return $query;
	}

	function get_kelas_dibentuk($tahun){
		$query=$this->db->query("SELECT * from kelas_dibentuk join kelas on(kelas.kd_kelas = kelas_dibentuk.kd_kelas) join program_studi on(kelas.kd_prodi = program_studi.kd_prodi) 
			WHERE NOT EXISTS
				(select * from kelas_dibentuk kd
					where kd.tahun_ajaran='$tahun' 
					and kelas_dibentuk.id_kelas_dibentuk=kd.id_kelas_dibentuk
                	and (select count(kss.nis) from kelas_siswa kss 
                     		join kelas_dibentuk kdd on (kdd.id_kelas_dibentuk=kss.id_kelas_dibentuk)
                     		where kd.tahun_ajaran='$tahun' and kdd.id_kelas_dibentuk=kd.id_kelas_dibentuk)=kd.kuota)
			AND kelas_dibentuk.tahun_ajaran='$tahun';");
		return $query;
	}

	public function get_prodi(){
		$this->db->select('*');
		$this->db->from('program_studi');
		return $this->db->get();
	}

	public function get_kelas(){
		$this->db->select('*');
		$this->db->from('kelas');
		return $this->db->get();
	}

	public function getkelas(){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('program_studi', 'program_studi.kd_prodi = kelas.kd_prodi');
		return $this->db->get();
	}

	public function get_guru(){
		$this->db->select('*');
		$this->db->from('guru');
		return $this->db->get();	
	}

	public function get_pegawai(){
		$this->db->select('*');
		$this->db->from('pegawai');
		return $this->db->get();	
	}

	public function	get_pegawai_no_username(){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('username', null);
		return $this->db->get();
	}

	public function get_kategori_pegawai(){
		$query = $this->db->query("SELECT * from kategori_user WHERE id_kategori != '4' and id_kategori != '5'");
		return $query;
	}

	public function	get_guru_no_username(){
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->where('username', null);
		return $this->db->get();
	}

	public function get_kategori_guru(){
		$query = $this->db->query("SELECT * from kategori_user WHERE id_kategori = '4'");
		return $query;
	}

	public function get_update_guru($kd_guru){
		$query = $this->db->query("SELECT * from guru WHERE kd_guru != '$kd_guru'");
		
		return $query;	
	}

	function get_tahun_ajaran(){
		$query = $this->db->query("SELECT * from tahun_ajaran;");
		
		return $query;
	}

	public function get_walikelas($thn_ajar){
		$this->db->select('*');
		$this->db->from('kelas_dibentuk');
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('guru', 'guru.kd_guru = kelas_dibentuk.kd_guru');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->where('kelas_dibentuk.tahun_ajaran', $thn_ajar);
		return $this->db->get();	
	}

	public function get_update_walikelas($id){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('kelas_dibentuk', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('guru', 'guru.kd_guru = kelas_dibentuk.kd_guru');
		$this->db->where('kelas_dibentuk.id_kelas_dibentuk', $id);
		return $this->db->get();	
	}

	public function update_pergantian_walikelas($id, $kd_guru){
		$this->db->query("UPDATE kelas_dibentuk SET kd_guru='$kd_guru' WHERE id_kelas_dibentuk='$id';");
	}

	public function update_walikelas_ajaran_baru($thn_ajar, $kd_kelas, $kd_guru, $kuota){
		$this->db->query("INSERT INTO kelas_dibentuk(tahun_ajaran, kd_guru, kd_kelas, kuota) VALUES ('$thn_ajar', '$kd_guru', '$kd_kelas', '$kuota');");
	}

	function insert_import_siswa($data){
		$this->db->insert('siswa', $data);
	}

	function tambah_siswa($data){
		$this->db->insert('siswa', $data);
	}

	function hapus_user($user){
		$this->db->query("delete from user where username='$user'");
	}

	function cek_id_iuran($id_iuran){
		$this->db->select('*');
		$this->db->from('iuran_bulanan');
		$this->db->where('id_iuran', $id_iuran);
		return $this->db->get();
	}

	function insert_tagihan($id_iuran,$total,$bln,$id_thn_ajar,$nis){
		$this->db->query("INSERT INTO iuran_bulanan(id_iuran, total_tagihan, bulan, tahun_ajaran, nis_siswa) VALUES ('$id_iuran', '$total', '$bln', '$id_thn_ajar', '$nis');");	
	}

	function get_nis(){
		$query=$this->db->query("select max(nis) as nis_baru from siswa;");
		foreach ($query->result() as $key) {
			$nis=$key->nis_baru+1;
		}
		return $nis;
	}

	function filter_atur_kelas_siswa($a){
		$query=$this->db->query("select * from kelas_dibentuk join kelas on(kelas.kd_kelas = kelas_dibentuk.kd_kelas) join program_studi on(kelas.kd_prodi = program_studi.kd_prodi) where kelas_dibentuk.id_kelas_dibentuk='$a';");
		return $query;
	}

	function get_list_siswa($thn, $kd){
		$query = $this->db->query("SELECT * from siswa s WHERE NOT EXISTS
			(select * from siswa ss
			join kelas_siswa ks on(ss.nis=ks.nis)
			join kelas_dibentuk kd on (kd.id_kelas_dibentuk=ks.id_kelas_dibentuk)
			where kd.tahun_ajaran='$thn' and s.nis=ks.nis and ss.kd_prodi='$kd')
			and s.kd_prodi='$kd';");
		return $query;
	}

	function get_siswa_sudah_daftar(){
		$query=$this->db->query("select max(tahun_ajaran) as thn from daftar_ulang;");
		$thn_ajar='20';
		foreach ($query->result() as $row) {
			$thn_ajar=$row->thn;
		}
		$thn_ajar;

		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('daftar_ulang', 'daftar_ulang.nis = siswa.nis');
		$this->db->join('kelas_siswa', 'siswa.nis = kelas_siswa.nis');
		$this->db->join('kelas_dibentuk', 'kelas_dibentuk.id_kelas_dibentuk=kelas_siswa.id_kelas_dibentuk');
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('program_studi', 'program_studi.kd_prodi = kelas.kd_prodi');
		$this->db->join('guru', 'guru.kd_guru = kelas_dibentuk.kd_guru');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->where('daftar_ulang.tahun_ajaran', $thn_ajar);
		$this->db->where('daftar_ulang.status_registrasi', 'selesai');
		return $this->db->get();
	}

	function get_kelas_prodi($kd_prodi,$tahun){
		$this->db->select('*');
		$this->db->from('kelas_dibentuk');
		$this->db->join('kelas', 'kelas.kd_kelas = kelas_dibentuk.kd_kelas');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.tahun_ajaran = kelas_dibentuk.tahun_ajaran');
		$this->db->where('kelas_dibentuk.tahun_ajaran', $tahun);
		$this->db->where('kelas.kd_prodi', $kd_prodi);
		return $this->db->get();
	}

	function filter_kelas_siswa($a){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('nis', $a);
		return $this->db->get();
	}
}
?>