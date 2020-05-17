-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Jun 2018 pada 14.05
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkn02`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_ulang`
--

CREATE TABLE `daftar_ulang` (
  `id_daftar` char(10) NOT NULL,
  `nis` char(15) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `rapor` varchar(100) NOT NULL,
  `status_rapor` char(15) NOT NULL,
  `status_tagihan` char(15) NOT NULL,
  `status_registrasi` varchar(40) NOT NULL,
  `tahun_ajaran` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_ulang`
--

INSERT INTO `daftar_ulang` (`id_daftar`, `nis`, `tanggal_daftar`, `rapor`, `status_rapor`, `status_tagihan`, `status_registrasi`, `tahun_ajaran`) VALUES
('02348D', '2078', '2018-06-30', 'gambar/raport/02348D_2078.pdf', 'valid', 'lunas', 'selesai', '2017/2018-2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `kd_guru` char(15) NOT NULL,
  `nip` char(20) DEFAULT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jenkel` char(15) NOT NULL,
  `agama` char(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`kd_guru`, `nip`, `nama_guru`, `jenkel`, `agama`, `alamat`, `username`) VALUES
('CJ', NULL, 'Carl Johnson', 'laki-laki', '', '', NULL),
('mfc', '609827', 'Moch Faizal', 'laki-laki', 'islam', 'jl. jambu', 'walikelas1'),
('MI', NULL, 'muhammad indi', 'laki-laki', '', '', 'muhammad'),
('MIQ', '6701154100', 'mubaroq iqbal', 'laki-laki', 'islam', 'jl.jambu', 'walikelas'),
('MSI', NULL, 'Meilitha Sari', 'laki-laki', '', '', 'walikelas2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iuran_bulanan`
--

CREATE TABLE `iuran_bulanan` (
  `id_iuran` char(10) NOT NULL,
  `total_tagihan` int(10) NOT NULL,
  `bulan` int(15) NOT NULL,
  `tahun_ajaran` char(15) NOT NULL,
  `nis_siswa` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `iuran_bulanan`
--

INSERT INTO `iuran_bulanan` (`id_iuran`, `total_tagihan`, `bulan`, `tahun_ajaran`, `nis_siswa`) VALUES
('01234567RK', 125000, 4, '2017/2018-2', '2382'),
('01234568RK', 125000, 2, '2017/2018-2', '2385'),
('01234569RK', 125000, 2, '2017/2018-2', '2381'),
('01234578RK', 125000, 4, '2017/2018-2', '2387'),
('01234579RK', 125000, 1, '2017/2018-2', '2383'),
('01234589RK', 125000, 2, '2017/2018-2', '2379'),
('01234678RK', 125000, 5, '2017/2018-2', '2383'),
('01234679RK', 125000, 4, '2017/2018-2', '2383'),
('01234689RK', 125000, 6, '2017/2018-2', '2383'),
('01234789RK', 125000, 4, '2017/2018-2', '2384'),
('01235678RK', 125000, 6, '2017/2018-2', '2382'),
('01235679RK', 125000, 1, '2017/2018-2', '2385'),
('01235689RK', 125000, 3, '2017/2018-2', '2391'),
('01235789RK', 125000, 5, '2017/2018-2', '2381'),
('012359EQ', 125000, 4, '2017/2018-2', '2388'),
('01236789RK', 125000, 4, '2017/2018-2', '2380'),
('01245678RK', 125000, 1, '2017/2018-2', '2379'),
('01245679RK', 125000, 2, '2017/2018-2', '2380'),
('01245689RK', 125000, 1, '2017/2018-2', '2389'),
('01245789RK', 125000, 1, '2017/2018-2', '2382'),
('012469EQ', 125000, 3, '2017/2018-2', '2384'),
('01256789RK', 125000, 3, '2017/2018-2', '2381'),
('012569EQ', 125000, 1, '2017/2018-2', '2388'),
('012679EQ', 125000, 4, '2017/2018-2', '2390'),
('01345678RK', 125000, 3, '2017/2018-2', '2382'),
('01345679RK', 125000, 3, '2017/2018-2', '2379'),
('013456EQ', 125000, 5, '2017/2018-2', '2390'),
('01345789RK', 125000, 6, '2017/2018-2', '2384'),
('013468EQ', 125000, 4, '2017/2018-2', '2386'),
('013469EQ', 125000, 6, '2017/2018-2', '2381'),
('013489EQ', 125000, 1, '2017/2018-2', '2384'),
('01356789RK', 125000, 1, '2017/2018-2', '2386'),
('013569EQ', 125000, 1, '2017/2018-2', '2381'),
('013579EQ', 125000, 6, '2017/2018-2', '2389'),
('013689EQ', 125000, 5, '2017/2018-2', '2387'),
('01456789RK', 125000, 6, '2017/2018-2', '2387'),
('0145678EQ', 125000, 6, '2017/2018-2', '2391'),
('014569EQ', 125000, 5, '2017/2018-2', '2388'),
('014579EQ', 125000, 2, '2017/2018-2', '2390'),
('014589EQ', 125000, 1, '2017/2018-2', '2390'),
('014789EQ', 125000, 4, '2017/2018-2', '2385'),
('015678EQ', 125000, 5, '2017/2018-2', '2386'),
('02345689RK', 125000, 6, '2017/2018-2', '2379'),
('02346789RK', 125000, 2, '2017/2018-2', '2383'),
('02356789RK', 125000, 3, '2017/2018-2', '2380'),
('023589EQ', 125000, 4, '2017/2018-2', '2389'),
('023679EQ', 125000, 3, '2017/2018-2', '2385'),
('02456789RK', 125000, 3, '2017/2018-2', '2386'),
('024567EQ', 125000, 1, '2017/2018-2', '2387'),
('024578EQ', 125000, 3, '2017/2018-2', '2389'),
('03456789RK', 125000, 5, '2017/2018-2', '2380'),
('034567EQ', 125000, 2, '2017/2018-2', '2384'),
('034578EQ', 125000, 1, '2017/2018-2', '2380'),
('034589EQ', 125000, 2, '2017/2018-2', '2387'),
('034679EQ', 125000, 3, '2017/2018-2', '2383'),
('045679EQ', 125000, 5, '2017/2018-2', '2389'),
('12345679RK', 125000, 5, '2017/2018-2', '2384'),
('1234567EQ', 125000, 4, '2017/2018-2', '2391'),
('12345689RK', 125000, 5, '2017/2018-2', '2382'),
('12345789RK', 125000, 5, '2017/2018-2', '2379'),
('12346789RK', 125000, 6, '2017/2018-2', '2388'),
('1234679EQ', 125000, 1, '2017/2018-2', '2391'),
('123468EQ', 125000, 3, '2017/2018-2', '2390'),
('123489EQ', 125000, 6, '2017/2018-2', '2390'),
('12356789RK', 125000, 4, '2017/2018-2', '2381'),
('1235679EQ', 125000, 5, '2017/2018-2', '2391'),
('123578EQ', 125000, 6, '2017/2018-2', '2385'),
('123789EQ', 125000, 2, '2017/2018-2', '2388'),
('12456789RK', 125000, 5, '2017/2018-2', '2385'),
('1245689EQ', 125000, 2, '2017/2018-2', '2391'),
('124678EQ', 125000, 6, '2017/2018-2', '2380'),
('124679EQ', 125000, 6, '2017/2018-2', '2386'),
('124789EQ', 125000, 3, '2017/2018-2', '2388'),
('134569EQ', 125000, 2, '2017/2018-2', '2386'),
('134689EQ', 125000, 2, '2017/2018-2', '2382'),
('23456789RK', 125000, 4, '2017/2018-2', '2379'),
('246789EQ', 125000, 3, '2017/2018-2', '2387'),
('456789EQ', 125000, 2, '2017/2018-2', '2389'),
('bsnsd341', 125000, 6, '2017/2018-2', '2078'),
('doprgy121', 125000, 4, '2017/2018-2', '2078'),
('epwla290', 125000, 5, '2017/2018-2', '2078'),
('hasdk126', 125000, 1, '2017/2018-2', '2078'),
('irbt298', 125000, 2, '2017/2018-2', '2078'),
('wusgy171', 125000, 3, '2017/2018-2', '2078');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_user`
--

CREATE TABLE `kategori_user` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_user`
--

INSERT INTO `kategori_user` (`id_kategori`, `nama_kategori`) VALUES
(1, 'admin'),
(2, 'kesiswaan'),
(3, 'keuangan'),
(4, 'wali kelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` char(10) NOT NULL,
  `tingkat` char(5) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `angka` char(5) NOT NULL,
  `kd_prodi` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `tingkat`, `nama_kelas`, `angka`, `kd_prodi`) VALUES
('XIIELK01', '3', 'XII Elektronika 01', '01', 'ELK'),
('XIIMM02', '2', 'XII Multimedia 02', '02', 'MM'),
('XIIMM04', '3', 'XII Multimedia 04', '04', 'MM'),
('XIIMM05', '3', 'XII Multimedia 05', '05', 'MM'),
('XIMM03', '2', 'XI Multimedia 03', '03', 'MM'),
('XMM01', '1', 'X Multimedia 01', '01', 'MM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_dibentuk`
--

CREATE TABLE `kelas_dibentuk` (
  `id_kelas_dibentuk` int(255) NOT NULL,
  `kuota` int(100) NOT NULL,
  `tahun_ajaran` char(15) NOT NULL,
  `kd_guru` char(15) DEFAULT NULL,
  `kd_kelas` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas_dibentuk`
--

INSERT INTO `kelas_dibentuk` (`id_kelas_dibentuk`, `kuota`, `tahun_ajaran`, `kd_guru`, `kd_kelas`) VALUES
(15, 1, '2017/2018-2', 'CJ', 'XIIELK01'),
(16, 5, '2017/2018-2', 'CJ', 'XIIMM02'),
(17, 10, '2017/2018-2', 'mfc', 'XIIMM04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `idkelas_siswa` int(15) NOT NULL,
  `nis` char(15) NOT NULL,
  `id_kelas_dibentuk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`idkelas_siswa`, `nis`, `id_kelas_dibentuk`) VALUES
(1, '2078', 15),
(2, '2092', 16),
(3, '2378', 16),
(4, '2379', 16),
(5, '2078', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masa_daftar_ulang`
--

CREATE TABLE `masa_daftar_ulang` (
  `id_masa` int(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `tahun_ajaran` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masa_daftar_ulang`
--

INSERT INTO `masa_daftar_ulang` (`id_masa`, `start_date`, `end_date`, `tahun_ajaran`) VALUES
(9, '2018-06-30 00:00:00', '2018-07-31 00:00:00', '2017/2018-2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(255) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `status_pesan` char(20) NOT NULL,
  `link` varchar(100) NOT NULL,
  `id_bayar` char(20) NOT NULL,
  `username_penerima` varchar(50) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `pesan`, `status_pesan`, `link`, `id_bayar`, `username_penerima`, `nama_pengirim`) VALUES
(10, 'Pengajuan pembayaran baru oleh Rhacka Falevi', 'terbaca', 'Keuangan/verifikasi_bayar_iuran_online/02369A/hasdk126/', '02369A', 'keuangan', 'sistem'),
(11, 'Pengajuan pembayaran baru oleh Rhacka Falevi', 'terbaca', 'Keuangan/verifikasi_bayar_iuran_online/03567A/irbt298/', '03567A', 'keuangan', 'sistem'),
(12, 'Pengajuan pembayaran baru oleh Rhacka Falevi', 'terbaca', 'Keuangan/verifikasi_bayar_iuran_online/35679A/wusgy171/', '35679A', 'keuangan', 'sistem'),
(13, 'Pengajuan pembayaran baru oleh Rhacka Falevi', 'terbaca', 'Keuangan/verifikasi_bayar_iuran_online/14569A/doprgy121/', '14569A', 'keuangan', 'sistem'),
(14, 'Pengajuan pembayaran baru oleh Rhacka Falevi', 'terbaca', 'Keuangan/verifikasi_bayar_iuran_online/03589A/epwla290/', '03589A', 'keuangan', 'sistem'),
(15, 'Pengajuan pembayaran baru oleh Rhacka Falevi', 'terbaca', 'Keuangan/verifikasi_bayar_iuran_online/01279A/bsnsd341/', '01279A', 'keuangan', 'sistem'),
(16, 'Pengajuan pembayaran baru oleh Rhacka Falevi', 'terbaca', 'Keuangan/verifikasi_bayar_iuran_online/02367A/bsnsd341/', '02367A', 'keuangan', 'sistem'),
(17, 'bukti bayar salah ', 'belum terbaca', '', '', '2078', 'muhaimin'),
(18, 'Tagihan Anda Belum Lunas, Silahkan Lunasi Tagihan Anda', 'belum terbaca', '', '', '2078', 'muhaimin'),
(19, 'Rapor Sudah Diverifikasi', 'belum terbaca', '', '', '2078', 'mubaroq iqbal'),
(20, 'Registrasi Ulang Anda Telah Selesai', 'belum terbaca', '', '', '2078', 'muhaimin'),
(21, 'silahkan lakukan daftar ulang segera', 'belum terbaca', '', '', '2092', 'roni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `kd_pegawai` char(15) NOT NULL,
  `nip` char(20) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `agama` char(15) NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`kd_pegawai`, `nip`, `nama_pegawai`, `bagian`, `alamat`, `jk`, `agama`, `username`) VALUES
('CJ', '', 'Carl Johnson', 'kesiswaan', '', '', '', NULL),
('DNH', '113', 'Deni Hardi', 'Kesiswaan', 'jl. jambu', 'laki-laki', 'islam', 'admin'),
('MHN', '6701154100', 'muhaimin', 'keuangan', 'jl. mangga', 'laki-laki', 'islam', 'keuangan'),
('RN', '', 'roni', 'kesiswaan', 'jl. jambu', 'laki-laki', 'Islam', 'kesiswaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `kd_prodi` char(5) NOT NULL,
  `nama_prodi` varchar(40) NOT NULL,
  `thn_pertama` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program_studi`
--

INSERT INTO `program_studi` (`kd_prodi`, `nama_prodi`, `thn_pertama`) VALUES
('ELK', 'Elektronika', '2010'),
('MM', 'Multimedia', '2010'),
('TB', 'Teknik Bangunan', '2010'),
('TKR', 'Teknik Kendaraan RIngan', '2010'),
('TSB', 'Tata Busana', '2010'),
('TSM', 'Teknik Sepeda Motor', '2010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` char(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenkel` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `thn_diterima` char(15) NOT NULL,
  `sekolah_asal` varchar(100) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(60) NOT NULL,
  `pekerjaan_ayah` varchar(60) NOT NULL,
  `pekerjaan_ibu` varchar(60) NOT NULL,
  `kd_prodi` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `password`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `alamat`, `jenkel`, `agama`, `thn_diterima`, `sekolah_asal`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `kd_prodi`) VALUES
('2078', 'f410588e48dc83f2822a880a68f78923', 'Rhacka Falevi', 'Tanjung Raya', '2001-06-03', 'Padang Lekat', 'laki-laki', 'islam', '2017', 'SMPN 03 Kepahiang', 'Helmi', 'Rosa Mardiana', 'Petani', 'Ibu Rumah Tangga', 'ELK'),
('2092', '1a1dc91c907325c69271ddf0c944bc72', 'Aldi Bimantara', 'Kepahiang', '2002-04-27', 'KGS.Hasan Pasar Ujung', 'laki-laki', 'Islam', '2017', 'SMPN 03 Kepahiang', 'Ruspan Effendi', 'Mardi Yani', 'Wiraswasta', 'Wiraswasta', 'MM'),
('2230', '1a1dc91c907325c69271ddf0c944bc72', 'Gandari', 'Tabah Air Pauh', '2001-07-01', 'Tabah Air Pauh', 'Perempuan', 'Islam', '', 'SMPN 02 Kepahiang', 'Zainal Basri', 'Aji Sumani', 'Petani', 'Petani', 'MM'),
('2268', '1a1dc91c907325c69271ddf0c944bc72', 'A Rahman', 'Bengkulu', '1999-06-30', 'padang lekat', 'laki-laki', 'islam', '2016', 'SMPN 04 Kepahiang', 'Nirozan', 'Titin Sumarni', 'PNS/Guru', 'Ibu Rumah Tangga', 'TSM'),
('2333', '1a1dc91c907325c69271ddf0c944bc72', 'Jumardi Effendi', 'Kepahiang', '1999-01-17', 'Gg. Kelapa Kelurahan Kepahiang', 'laki-laki', 'islam', '2016', 'MTSN 02 Kepahiang', 'Mulyadi', 'Unisah', 'Petani', 'Petani', 'TB'),
('2378', '1a1dc91c907325c69271ddf0c944bc72', 'Juleni', 'Kelilik', '2000-06-10', 'Jl. Benjang Galing Kel. Lubuk Saung', 'Perempuan', 'Islam', '2016', 'SMPN 01 Seberang Musi', 'Turah', 'Lili M', 'PNS/Guru', 'Ibu Rumah Tangga', 'MM'),
('2379', 'add217938e07bb1fd8796e0315b88c10', 'nike arbiansyah', 'Curup', '0000-00-00', 'jl. Pensiunan', 'laki-laki', 'islam', '2018', 'smpn 1 kepahiang', 'deni', 'meri', 'petani', 'Petani', 'MM'),
('2380', 'da4902cb0bc38210839714ebdcf0efc3', 'tomas', 'Kepahiang', '0000-00-00', 'dusun kepahiang', 'laki-laki', 'islam', '2018', 'smpn 1 kepahiang', 'riko', 'dini', 'wiraswasta', 'PNS', 'MM'),
('2381', '7b66b4fd401a271a1c7224027ce111bc', 'evan pratama', 'Lahat', '0000-00-00', 'tebat monok', 'laki-laki', 'islam', '2018', 'smpn 3 kepahiang', 'heri', 'yesi', 'pedagang', 'pedagang', 'ELK'),
('2382', 'ee8fe9093fbbb687bef15a38facc44d2', 'bayu aditya', 'Palembang', '0000-00-00', 'jl. Tunggal', 'laki-laki', 'islam', '2018', 'smpn 1 kepahiang', 'ferry', 'lena', 'pedagang', 'ibu rumah tangga', 'ELK'),
('2383', '3baa271bc35fe054c86928f7016e8ae6', 'ani danila', 'Bengkulu', '0000-00-00', 'pasar kepahiang', 'perempuan', 'kristen', '2018', 'smpn 2 kepahiang', 'medi', 'ria', 'PNS', 'ibu rumah tangga', 'TKR'),
('2384', 'ea159dc9788ffac311592613b7f71fbb', 'diana', 'Curup', '0000-00-00', 'kampung bogor', 'perempuan', 'islam', '2018', 'smpn 2 kepahiang', 'ronal', 'reni', 'petani', 'ibu rumah tangga', 'TKR'),
('2385', '1a68e5f4ade56ed1d4bf273e55510750', 'nike arbiansyah', 'Curup', '0000-00-00', 'jl. Pensiunan', 'laki-laki', 'islam', '2018', 'smpn 1 kepahiang', 'deni', 'meri', 'petani', 'Petani', 'MM'),
('2386', '99f59c0842e83c808dd1813b48a37c6a', 'tomas', 'Kepahiang', '0000-00-00', 'dusun kepahiang', 'laki-laki', 'islam', '2018', 'smpn 1 kepahiang', 'riko', 'dini', 'wiraswasta', 'PNS', 'MM'),
('2387', '8b4224068a41c5d37f5e2d54f3995089', 'evan pratama', 'Lahat', '0000-00-00', 'tebat monok', 'laki-laki', 'islam', '2018', 'smpn 3 kepahiang', 'heri', 'yesi', 'pedagang', 'pedagang', 'MM'),
('2388', 'd04863f100d59b3eb688a11f95b0ae60', 'bayu aditya', 'Palembang', '0000-00-00', 'jl. Tunggal', 'laki-laki', 'islam', '2018', 'smpn 1 kepahiang', 'ferry', 'lena', 'pedagang', 'ibu rumah tangga', 'ELK'),
('2389', '063e26c670d07bb7c4d30e6fc69fe056', 'ani danila', 'Bengkulu', '0000-00-00', 'pasar kepahiang', 'perempuan', 'kristen', '2018', 'smpn 2 kepahiang', 'medi', 'ria', 'PNS', 'ibu rumah tangga', 'MM'),
('2390', '999600eb275cc7196161261972daa59b', 'diana', 'Curup', '0000-00-00', 'kampung bogor', 'perempuan', 'islam', '2018', 'smpn 2 kepahiang', 'ronal', 'reni', 'petani', 'ibu rumah tangga', 'TKR'),
('2391', '102f0bb6efb3a6128a3c750dd16729be', 'mubarok iqbal', 'kepahiang', '0000-00-00', 'Kepahiang, Bengkulu, Indonesia', 'laki-laki', 'islam', '2017', 'SMPN 02 Kepahiang', 'kusmayadi', 'sakdia', 'PNS/Guru', 'Ibu Rumah Tangga', 'TKR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `tahun_ajaran` char(15) NOT NULL,
  `tahun` char(15) NOT NULL,
  `semester` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`tahun_ajaran`, `tahun`, `semester`) VALUES
('2016/2017-1', '2016/2017', 'ganjil'),
('2016/2017-2', '2016/2017', 'genap'),
('2017/2018-1', '2017/2018', 'ganjil'),
('2017/2018-2', '2017/2018', 'genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayar_iuran`
--

CREATE TABLE `tb_bayar_iuran` (
  `id_bayar` char(15) NOT NULL,
  `nis_siswa` char(15) NOT NULL,
  `id_iuran` char(10) NOT NULL,
  `jumlah_dibayarkan` int(11) NOT NULL,
  `tipe_pembayaran` char(20) NOT NULL,
  `jenis_pembayaran` char(20) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bukti_bayar` varchar(50) NOT NULL,
  `nota_pembayaran` varchar(100) NOT NULL,
  `status_bayar` char(20) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `kd_pegawai` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_bayar_iuran`
--

INSERT INTO `tb_bayar_iuran` (`id_bayar`, `nis_siswa`, `id_iuran`, `jumlah_dibayarkan`, `tipe_pembayaran`, `jenis_pembayaran`, `tgl_bayar`, `bukti_bayar`, `nota_pembayaran`, `status_bayar`, `keterangan`, `kd_pegawai`) VALUES
('01279A', '2078', 'bsnsd341', 25000, 'online', 'Kredit', '2018-06-30', 'gambar/bukti/01279A_2078.jpg', '', 'ditolak', '', 'MHN'),
('02367A', '2078', 'bsnsd341', 100000, 'online', 'Lunas', '2018-06-30', 'gambar/bukti/02367A_2078.jpg', 'gambar/nota/02367A_Rhacka Falevi.pdf', 'selesai', '', 'MHN'),
('02369A', '2078', 'hasdk126', 125000, 'online', 'lunas', '2018-06-29', 'gambar/bukti/02369A_2078.jpg', 'gambar/nota/02369A_Rhacka Falevi.pdf', 'selesai', 'bukti bayar digunakan untuk pembayaran bulan berikut Januari(125000) Februari(125000) Maret(125000)  dengan total bayar Rp.375000', 'MHN'),
('03567A', '2078', 'irbt298', 125000, 'online', 'lunas', '2018-06-29', 'gambar/bukti/03567A_2078.jpg', 'gambar/nota/03567A_Rhacka Falevi.pdf', 'selesai', 'bukti bayar digunakan untuk pembayaran bulan berikut Januari(125000) Februari(125000) Maret(125000)  dengan total bayar Rp.375000', 'MHN'),
('03589A', '2078', 'epwla290', 125000, 'online', 'lunas', '2018-06-30', 'gambar/bukti/03589A_2078.jpg', 'gambar/nota/03589A_Rhacka Falevi.pdf', 'selesai', 'bukti bayar digunakan untuk pembayaran bulan berikut April(125000) Mei(125000)  dengan total bayar Rp.250000', 'MHN'),
('14569A', '2078', 'doprgy121', 125000, 'online', 'lunas', '2018-06-30', 'gambar/bukti/14569A_2078.jpg', 'gambar/nota/14569A_Rhacka Falevi.pdf', 'selesai', 'bukti bayar digunakan untuk pembayaran bulan berikut April(125000) Mei(125000)  dengan total bayar Rp.250000', 'MHN'),
('23458A', '2078', 'bsnsd341', 25000, 'online', 'Lunas', '2018-06-30', '', 'gambar/nota/23458A_.pdf', 'selesai', '', 'MHN'),
('35679A', '2078', 'wusgy171', 125000, 'online', 'lunas', '2018-06-29', 'gambar/bukti/35679A_2078.jpg', 'gambar/nota/35679A_Rhacka Falevi.pdf', 'selesai', 'bukti bayar digunakan untuk pembayaran bulan berikut Januari(125000) Februari(125000) Maret(125000)  dengan total bayar Rp.375000', 'MHN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` char(25) NOT NULL,
  `status_user` char(20) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `last_login`, `status_user`, `id_kategori`) VALUES
('admin', '1a1dc91c907325c69271ddf0c944bc72', '', 'aktif', 1),
('kesiswaan', '1a1dc91c907325c69271ddf0c944bc72', '', 'aktif', 2),
('keuangan', '1a1dc91c907325c69271ddf0c944bc72', '', 'aktif', 3),
('muhammad', '1a1dc91c907325c69271ddf0c944bc72', '', 'aktif', 4),
('walikelas', '1a1dc91c907325c69271ddf0c944bc72', '', 'aktif', 4),
('walikelas1', '1a1dc91c907325c69271ddf0c944bc72', '', 'aktif', 4),
('walikelas2', '1a1dc91c907325c69271ddf0c944bc72', '', '', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `fk_sissswa` (`nis`),
  ADD KEY `fk_tahun_ajar` (`tahun_ajaran`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kd_guru`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `fk_username_walikelas` (`username`);

--
-- Indexes for table `iuran_bulanan`
--
ALTER TABLE `iuran_bulanan`
  ADD PRIMARY KEY (`id_iuran`),
  ADD KEY `fk_siswa` (`nis_siswa`),
  ADD KEY `fk_thn_ajar_iuran` (`tahun_ajaran`);

--
-- Indexes for table `kategori_user`
--
ALTER TABLE `kategori_user`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`),
  ADD UNIQUE KEY `nama_kelas` (`nama_kelas`),
  ADD KEY `fk_prodi_kelas` (`kd_prodi`);

--
-- Indexes for table `kelas_dibentuk`
--
ALTER TABLE `kelas_dibentuk`
  ADD PRIMARY KEY (`id_kelas_dibentuk`),
  ADD KEY `fk_kelas` (`kd_kelas`),
  ADD KEY `fk_tahun_ajaran` (`tahun_ajaran`),
  ADD KEY `fk_walikelas` (`kd_guru`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`idkelas_siswa`),
  ADD KEY `fk_kelas_dibentuk` (`id_kelas_dibentuk`),
  ADD KEY `fk_sisswa` (`nis`);

--
-- Indexes for table `masa_daftar_ulang`
--
ALTER TABLE `masa_daftar_ulang`
  ADD PRIMARY KEY (`id_masa`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `fk_user_penerima` (`username_penerima`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kd_pegawai`),
  ADD KEY `fk_pegawai` (`username`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`kd_prodi`),
  ADD UNIQUE KEY `nama_prodi` (`nama_prodi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fkprodiiiiiiiiiiiiiiiiiiiiiiiiii` (`kd_prodi`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`tahun_ajaran`);

--
-- Indexes for table `tb_bayar_iuran`
--
ALTER TABLE `tb_bayar_iuran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `fk_sis` (`nis_siswa`),
  ADD KEY `fk_iuran` (`id_iuran`),
  ADD KEY `fk_pegawai_iuran` (`kd_pegawai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_user`
--
ALTER TABLE `kategori_user`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kelas_dibentuk`
--
ALTER TABLE `kelas_dibentuk`
  MODIFY `id_kelas_dibentuk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `idkelas_siswa` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `masa_daftar_ulang`
--
ALTER TABLE `masa_daftar_ulang`
  MODIFY `id_masa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  ADD CONSTRAINT `fk_sissswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tahun_ajar` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tahun_ajaran` (`tahun_ajaran`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `fk_username_walikelas` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `iuran_bulanan`
--
ALTER TABLE `iuran_bulanan`
  ADD CONSTRAINT `fk_siswa` FOREIGN KEY (`nis_siswa`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_thn_ajar_iuran` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tahun_ajaran` (`tahun_ajaran`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_prodi_kelas` FOREIGN KEY (`kd_prodi`) REFERENCES `program_studi` (`kd_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas_dibentuk`
--
ALTER TABLE `kelas_dibentuk`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tahun_ajaran` FOREIGN KEY (`tahun_ajaran`) REFERENCES `tahun_ajaran` (`tahun_ajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_walikelas` FOREIGN KEY (`kd_guru`) REFERENCES `guru` (`kd_guru`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `fk_kelas_dibentuk` FOREIGN KEY (`id_kelas_dibentuk`) REFERENCES `kelas_dibentuk` (`id_kelas_dibentuk`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sisswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_pegawai` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fkprodiiiiiiiiiiiiiiiiiiiiiiiiii` FOREIGN KEY (`kd_prodi`) REFERENCES `program_studi` (`kd_prodi`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_bayar_iuran`
--
ALTER TABLE `tb_bayar_iuran`
  ADD CONSTRAINT `fk_iuran` FOREIGN KEY (`id_iuran`) REFERENCES `iuran_bulanan` (`id_iuran`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pegawai_iuran` FOREIGN KEY (`kd_pegawai`) REFERENCES `pegawai` (`kd_pegawai`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_sis` FOREIGN KEY (`nis_siswa`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_user` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
