-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2019 at 10:14 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aditperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `username_admin` varchar(100) DEFAULT NULL,
  `password_admin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`) VALUES
('1427', 'Adit', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_kelas_anggota` int(11) DEFAULT NULL,
  `nis_anggota` varchar(100) DEFAULT NULL,
  `nama_anggota` varchar(100) DEFAULT NULL,
  `email_anggota` varchar(100) DEFAULT NULL,
  `username_anggota` varchar(100) DEFAULT NULL,
  `password_anggota` varchar(100) DEFAULT NULL,
  `status_anggota` varchar(20) DEFAULT NULL,
  `token_anggota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_kelas_anggota`, `nis_anggota`, `nama_anggota`, `email_anggota`, `username_anggota`, `password_anggota`, `status_anggota`, `token_anggota`) VALUES
(3, 1, '7879909', 'Rino Oktavianto', 'rinookta1427@gmail.com', 'rinookta', 'rinookta', 'aktif', NULL),
(4, 2, '67687999', 'Muzaki', 'rinookta1427@gmail.com', 'muzaki', 'muzaki', 'aktif', NULL),
(7, 2, '87984637', 'Zidan', 'zidan@gmail.com', 'zidan', 'zidan', 'aktif', NULL),
(9, 1, '67859467', 'Dian Muti', 'dianmuti0406@gmail.com', 'Dian', 'dian', 'aktif', NULL),
(10, 1, '476476878', 'Lala Intan', 'inkanasosh@gmail.com', 'Lala', 'lala', 'aktif', NULL),
(12, 1, '54678976', 'Erlina', 'erlinann15@gmail.com', 'Erlina', 'erlina', 'aktif', NULL),
(13, 2, '123456789', 'Veyna Dinda', 'Sitiverida@gmail.com', 'Veyna Dinda', 'Veyna1427', 'aktif', NULL),
(14, 1, '555322', 'Adit pur', 'Aditpurnomoaji93@gmail.com', 'Adit', 'adit', 'aktif', NULL),
(15, 1, '333', 'amat', 'amat@gmail.com', 'ahmad', 'ahmad', 'aktif', NULL),
(37, 2, '9900', 'puwiyatna', 'as@gmail.com', 'ipung', '1', 'aktif', NULL),
(38, 2, '9900', 'ipung kw', 'as@gmail.com', 'puw21', '1', 'aktif', NULL),
(39, 2, '999999', 'menoba', 'amat@gmail.com', 'mencoba', '1', 'aktif', NULL),
(40, 2, '989899', 'baru', 'amat@gmail.com', 'baru', '1', 'aktif', NULL),
(51, 1, '212', 'puwiyatna', 'as@gmail.com', 'saud', '1', 'aktif', NULL),
(53, 1, '22', 'anton', 'as@gmail.com', 'anton', '1', 'aktif', NULL),
(54, 2, '35423', 'jelas', 'amat@gmail.com', 'ajj', 'sdd', 'aktif', NULL),
(55, 1, '3434', 'ssss', 'asfdf', 'era', '1', 'aktif', NULL),
(56, 1, '333', 'we', 'aditpur93@gmail.com', 'putri', '34', 'aktif', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` varchar(20) NOT NULL,
  `id_anggota_booking` int(11) DEFAULT NULL,
  `id_buku_booking` varchar(20) DEFAULT NULL,
  `jumlah_booking` int(11) DEFAULT NULL,
  `tgl_booking` datetime DEFAULT NULL,
  `batasambil_booking` datetime DEFAULT NULL,
  `status_booking` varchar(20) DEFAULT NULL,
  `id_admin` int(20) DEFAULT '1427',
  `id_rakbuku` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_anggota_booking`, `id_buku_booking`, `jumlah_booking`, `tgl_booking`, `batasambil_booking`, `status_booking`, `id_admin`, `id_rakbuku`) VALUES
('162576872', 14, '314854521', 1, '2019-08-15 22:40:51', '2019-08-17 22:40:51', 'sukses', 1427, NULL),
('288257782', 3, '314854521', 2, '2019-10-17 13:15:39', '2019-10-19 13:15:39', 'pending', 1427, NULL),
('453868623', 14, '147678273', 1, '2019-09-03 20:42:03', '2019-09-05 20:42:03', 'sukses', 1427, NULL),
('564373418', 14, '147678273', 1, '2019-09-03 19:55:56', '2019-09-05 19:55:56', 'sukses', 1427, NULL),
('565664192', 12, '849516127', 1, '2019-04-20 11:02:50', '2019-04-22 11:02:50', 'sukses', 1427, NULL),
('583839946', 14, '314854521', 1, '2019-08-15 22:49:29', '2019-08-17 22:49:29', 'sukses', 1427, NULL),
('584145266', 14, '849516127', 1, '2019-07-02 09:56:31', '2019-07-04 09:56:31', 'sukses', 1427, NULL),
('718857676', 14, '849516127', 1, '2019-06-25 20:10:44', '2019-06-27 20:10:44', 'sukses', 1427, NULL),
('817834691', 14, '147678273', 1, '2019-09-28 16:39:07', '2019-09-30 16:39:07', 'sukses', 1427, NULL),
('911433624', 14, '779468295', 1, '2019-09-03 20:58:06', '2019-09-05 20:58:06', 'sukses', 1427, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(20) NOT NULL,
  `id_rakbuku_buku` int(11) DEFAULT NULL,
  `nama_buku` varchar(200) DEFAULT NULL,
  `tahun_buku` int(11) DEFAULT NULL,
  `stok_buku` int(11) DEFAULT NULL,
  `klasifikasi_buku` varchar(20) DEFAULT NULL,
  `foto_buku` text,
  `file_buku` text,
  `status_buku` varchar(20) DEFAULT NULL,
  `id_kategori` varchar(20) DEFAULT NULL,
  `id_penulis` varchar(25) DEFAULT NULL,
  `id_penerbit` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_rakbuku_buku`, `nama_buku`, `tahun_buku`, `stok_buku`, `klasifikasi_buku`, `foto_buku`, `file_buku`, `status_buku`, `id_kategori`, `id_penulis`, `id_penerbit`) VALUES
('147678273', 6, 'Bahasa Indonesia SMA kelas X', 2017, 3, '542.67', 'upload/fotobuku/1566975853.PNG', NULL, NULL, '18', 'Yadi mulyadi dan Heni roh', 'Yrama widya'),
('294631683', 8, 'filsafat politik', 2011, 3, '167.14', 'upload/fotobuku/1566977043.PNG', NULL, NULL, '15', 'Hendry J. Schmandt', 'pustaka pelajar'),
('314854521', 5, '400 Kebiasaan Keliru Dalam Hidup Muslim', 2009, 7, '235.13', 'upload/fotobuku/1555737060.jpg', 'upload/filebuku/1566978753.pdf', NULL, '16', 'abdullah firmazah hasan', 'Deepublish'),
('354545635', 8, 'pas', 33, 3, '44', NULL, NULL, NULL, '22', 'andrea hirata', 'PT elex media computindo'),
('426192678', 15, 'Tes dan pengukuran Olahraga', 2012, 5, '966.53', 'upload/fotobuku/1566978698.PNG', NULL, NULL, '21', 'Dr. Widiastuti, M.Pd', 'Erlangga'),
('631984745', 7, 'Sejarah ', 2016, 4, '956.04', 'upload/fotobuku/1566976330.PNG', NULL, NULL, '23', 'samsul farid', 'Yrama widya'),
('684424235', 11, 'Sejarah 3 untuk SMA Kelas XII Program Ilmu Sosial ', 2006, 4, '332.67', 'upload/fotobuku/1566977941.PNG', NULL, NULL, '17', 'I Wayan Badrika', 'Erlangga'),
('744396182', 8, 'wer', 33, 3, '44', NULL, NULL, NULL, '14', '13', '7'),
('779468295', 10, 'Interaksi Manusia Dan Komputer', 2014, 6, '638.01', 'upload/fotobuku/1555737962.jpg', NULL, NULL, '20', 'supriyanta, M.Kom', 'Deepublish'),
('789931531', 13, 'Senyum Karyamin', 2004, 2, '843.44', 'upload/fotobuku/1566978356.PNG', NULL, NULL, '22', 'Ahmad Tohari', 'PT elex media computindo'),
('849516127', 9, 'Laskar pelangi', 2005, 4, '45.22', 'upload/fotobuku/1555733213.jpg', 'upload/filebuku/1561981599.pdf', NULL, '14', 'andrea hirata', 'bentang pustaka');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu2`
--

CREATE TABLE `buku_tamu2` (
  `id_pengunjung` int(20) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `nik_nis` varchar(100) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `keperluan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_tamu2`
--

INSERT INTO `buku_tamu2` (`id_pengunjung`, `nama`, `nik_nis`, `tanggal`, `keperluan`) VALUES
(11, 'pinjam', 'anton', '2019-10-02', 'waii'),
(599849834, 'sadfas', '223', '2019-10-12', 'dfs'),
(772199295, 'as', '2', '2019-10-12', 'd'),
(985379904, 'sepatu convrese', '56668', '2019-07-12', NULL),
(985379905, 'sepatu convrese', '56668', '10-10-1001', NULL),
(985379906, 'sepatu convrese', '56668a', '11 July 2019', NULL),
(985379907, 'ad', '44', '11 July 2019', NULL),
(985379908, 'ADIT', '5546', '12 July 2019', NULL),
(985379909, 'aaa', '222', '12 July 2019', NULL),
(985379910, 'dd', '666', '16 July 2019', NULL),
(985379911, 'ww', '334', '2019-07-18', NULL),
(985379912, 'dsdsd', '4445', '2019-07-18', NULL),
(985379913, 'adit', '334', '2019-08-15', NULL),
(985379914, 'aa', '123', '2019-08-15', 'ww'),
(985379915, 'adit', '63635', '2019-08-22', 'berkunjung'),
(985379916, 'www', '2222', '2019-09-04', 'eee'),
(985379917, 'contoh', 'cont', '2019-09-04', 'wwded'),
(985379918, 'aa', '222', '2019-09-04', 'ee'),
(985379919, 'ss', '3334', '2019-09-04', 'ee'),
(985379920, 'aa', '22', '2019-09-04', 'wee'),
(985379921, 'a', '33', '2019-09-04', 'ee'),
(985379922, 'aa', '33', '2019-09-04', 'ss'),
(985379923, 'sdsds', 'sdsd', '2019-09-04', 'sdsd'),
(985379924, 'sdsd', '', '2019-09-04', ''),
(985379925, 'ss', '33', '2019-09-04', ''),
(985379926, 'aaa', '', '2019-09-05', 'eee'),
(985379927, 's', '', '2019-09-05', 'd'),
(985379928, 'e', 'aaa', '2019-09-05', 'd'),
(985379929, 'ee', 'ee', '2019-09-05', 'ee'),
(985379930, 'awan', '123', '2019-09-05', 'pinjqm'),
(985379931, 'adit', '123', '2019-09-05', 'pinjam'),
(985379932, 'aa', '22', '2019-09-08', 'ww'),
(985379933, 'aa', '22', '2019-09-08', 'ss'),
(985379934, 'dd', '123', '2019-09-08', 'eee'),
(985379935, 'aa', '12', '2019-09-10', 'we'),
(985379936, 'andi', '123', '2019-09-10', 'www'),
(985379937, 'aa', '123', '2019-09-10', 'ss'),
(985379938, 'aa', '22', '2019-09-10', 'ee'),
(985379939, 'ad', '33', '2019-09-12', 'ww'),
(985379940, 'adit', '123', '2019-09-13', 'ee'),
(985379941, 'ss', '33', '2019-09-16', 'ww'),
(985379942, 'ss', '22', '2019-09-23', 'we'),
(985379943, 'aa', '33', '2019-09-28', 'ee'),
(985379944, 'kkk', '44', '2019-09-28', 'hh'),
(985379945, 'ee', '22', '2019-09-28', 'ff'),
(985379946, 'we', '333', '2019-10-01', 'fff'),
(985379947, 'dd', '222', '2019-10-01', 'd'),
(985379948, 'hh', '44', '2019-10-01', 'rr'),
(985379949, 'ee', '12', '2019-10-01', 'ee'),
(985379950, 'ww', '123', '2019-10-01', 'ff'),
(985379951, 'tt', '66', '2019-10-01', 'bb'),
(985379952, 'hh', '66', '2019-10-01', 'nn'),
(985379953, 'aa', '44', '2019-09-29', 'rr'),
(985379954, 'amri', '334', '2019-10-08', 'hh'),
(985379955, 'anin', '34', '2019-10-08', 'rt'),
(985379956, 'sdf', '352', '2019-10-12', 'we'),
(985379957, 'sad', '32342', '2019-10-12', 'asdf'),
(985379958, 'aaaaa', '121', '2019-10-12', 'ssd'),
(985379959, 'ss', '44', '2019-10-12', 'yy'),
(985379960, 'asd', '2323', '2019-10-12', 'keperluan'),
(985379961, 'aku', '232', '2019-10-12', 'keperluan'),
(1570868616, 'kaa', '13', '2019-10-12', 'keperluan'),
(1570868785, 'asdf', '12', '2019-10-12', 'keperluan'),
(1570868786, 'as', '2', '2019-10-12', 'd'),
(1570868787, 'asdf', '3', '2019-10-12', 'sds'),
(1570868788, 'adit', '6676', '2019-10-16', 'pinjam'),
(1570868789, 'Rino', '13132131', '2019-10-17', 'Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `kategori` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(14, 'karya umum'),
(15, 'filsafat'),
(16, 'agama'),
(17, 'ilmu sosial'),
(18, 'bahasa'),
(19, 'ilmu pengetahuan murni'),
(20, 'ilmu pengetahuan terapan'),
(21, 'seni, olahraga, hiburan'),
(22, 'kesusasteraan'),
(23, 'biografi ilmu bumi dan sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'Guru'),
(2, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(20) NOT NULL,
  `id_anggota_peminjaman` int(11) DEFAULT NULL,
  `id_buku_peminjaman` varchar(20) DEFAULT NULL,
  `jumlah_peminjaman` int(11) DEFAULT NULL,
  `tgl_peminjaman` datetime DEFAULT NULL,
  `tglkembali_peminjaman` datetime DEFAULT NULL,
  `tgldikembalikan_peminjaman` datetime DEFAULT NULL,
  `telat_peminjaman` int(11) DEFAULT NULL,
  `denda_peminjaman` int(11) DEFAULT NULL,
  `status_peminjaman` varchar(20) DEFAULT NULL,
  `id_admin` varchar(10) DEFAULT '1427'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_anggota_peminjaman`, `id_buku_peminjaman`, `jumlah_peminjaman`, `tgl_peminjaman`, `tglkembali_peminjaman`, `tgldikembalikan_peminjaman`, `telat_peminjaman`, `denda_peminjaman`, `status_peminjaman`, `id_admin`) VALUES
('172947476', 14, '147678273', 1, '2019-09-05 19:16:24', '2019-09-12 19:16:24', '2019-09-12 13:58:53', 0, 0, 'kembali', '1427'),
('184487556', 15, '779468295', 1, '2019-08-19 13:45:53', '2019-08-26 13:45:53', '2019-08-19 15:41:52', 0, 0, 'kembali', '1427'),
('197683137', 14, '147678273', 1, '2019-10-08 11:08:15', '2019-10-15 11:08:15', NULL, NULL, NULL, 'dipinjam', '1427'),
('253733198', 15, '294631683', 1, '2019-09-12 13:49:25', '2019-09-19 13:49:25', '2019-09-28 13:54:00', 9, 9000, 'kembali', '1427'),
('275779463', 14, '849516127', 1, '2019-04-21 18:50:01', '2019-04-28 18:50:01', '2019-04-24 15:21:24', 0, 0, 'kembali', '1427'),
('298492465', 14, '849516127', 1, '2019-06-25 20:11:45', '2019-07-02 20:11:45', '2019-06-25 20:13:09', 0, 0, 'kembali', '1427'),
('427241147', 14, '147678273', 1, '2019-09-03 19:56:43', '2019-09-10 19:56:43', '2019-09-28 13:48:37', 18, 18000, 'kembali', '1427'),
('441119377', 14, '314854521', 1, '2019-07-17 18:45:04', '2019-07-24 18:45:04', '2019-07-22 14:58:12', 0, 0, 'kembali', '1427'),
('483615817', 14, '849516127', 1, '2019-07-02 10:00:45', '2019-07-09 10:00:45', '2019-07-02 10:04:09', 0, 0, 'kembali', '1427'),
('496222343', 14, '314854521', 1, '2019-08-15 22:41:30', '2019-08-22 22:41:30', '2019-09-16 14:21:01', 25, 25000, 'kembali', '1427'),
('682341758', 15, '294631683', 1, '2019-09-08 19:04:49', '2019-09-15 19:04:49', NULL, NULL, NULL, 'dipinjam', '1427'),
('738823381', 14, '147678273', 1, '2019-10-01 16:48:22', '2019-10-08 16:48:22', '2019-10-01 16:49:15', 0, 0, 'kembali', '1427'),
('948677546', 14, '779468295', 1, '2019-09-03 20:58:25', '2019-09-10 20:58:25', '2019-09-03 20:59:29', 0, 0, 'kembali', '1427'),
('998947373', 14, '314854521', 1, '2019-08-15 22:49:55', '2019-08-22 22:49:55', '2019-08-15 22:51:12', 0, 0, 'kembali', '1427');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(33) NOT NULL,
  `nama_penerbit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(3, 'PT elex media computindo'),
(4, 'Yrama widya'),
(5, 'pustaka pelajar'),
(6, 'bentang pustaka'),
(7, 'Deepublish'),
(8, 'Erlangga');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` int(20) NOT NULL,
  `id_pinjam` int(20) DEFAULT NULL,
  `telat_pinjam` varchar(20) DEFAULT NULL,
  `denda` varchar(20) DEFAULT NULL,
  `status_kembali` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `id_pinjam`, `telat_pinjam`, `denda`, `status_kembali`) VALUES
(123654287, 976352718, '0', '0', NULL),
(321893674, 773635429, '0', '0', NULL),
(437280498, 645122847, '23', '23000', NULL),
(473892736, 281939764, '0', '0', NULL),
(567775846, 876483567, '0', '0', NULL),
(648291836, 843281736, '0', '0', NULL),
(847454635, 464482726, '0', '0', NULL),
(847635253, 643536457, '13', '13000', NULL),
(984765348, 429186455, '8', '8000', NULL),
(987654585, 397176627, '0', '0', NULL),
(992103826, 474929038, '0', '0', NULL),
(2147483647, 46453527, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(33) NOT NULL,
  `nama_penulis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`) VALUES
(5, 'abdullah firmazah hasan'),
(6, 'Yadi mulyadi dan Heni rohaeni'),
(7, 'samsul farid'),
(8, 'Hendry J. Schmandt'),
(9, 'andrea hirata'),
(10, 'supriyanta, M.Kom'),
(11, 'I Wayan Badrika'),
(12, 'Ahmad Tohari'),
(13, 'Dr. Widiastuti, M.Pd');

-- --------------------------------------------------------

--
-- Table structure for table `rakbuku`
--

CREATE TABLE `rakbuku` (
  `id_rakbuku` int(11) NOT NULL,
  `nama_rakbuku` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rakbuku`
--

INSERT INTO `rakbuku` (`id_rakbuku`, `nama_rakbuku`) VALUES
(5, 'A1'),
(6, 'A2'),
(7, 'A3'),
(8, 'A4'),
(9, 'B1'),
(10, 'B2'),
(11, 'B3'),
(12, 'B4'),
(13, 'C1'),
(14, 'C2'),
(15, 'C3'),
(16, 'C4');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `batasambil_setting` int(11) DEFAULT NULL,
  `lamapinjam_setting` int(11) DEFAULT NULL,
  `denda_setting` int(11) DEFAULT NULL,
  `email_setting` varchar(100) DEFAULT NULL,
  `atasnama_setting` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `batasambil_setting`, `lamapinjam_setting`, `denda_setting`, `email_setting`, `atasnama_setting`) VALUES
(1, 2, 7, 1000, 'aditpurnomoaji93@gmailcom', 'Adit purnomo aji');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `buku_tamu2`
--
ALTER TABLE `buku_tamu2`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `rakbuku`
--
ALTER TABLE `rakbuku`
  ADD PRIMARY KEY (`id_rakbuku`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `buku_tamu2`
--
ALTER TABLE `buku_tamu2`
  MODIFY `id_pengunjung` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1570868790;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rakbuku`
--
ALTER TABLE `rakbuku`
  MODIFY `id_rakbuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
