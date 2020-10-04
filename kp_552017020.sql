-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 05:53 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kp_552017020`
--
CREATE DATABASE IF NOT EXISTS `kp_552017020` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kp_552017020`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE IF NOT EXISTS `tb_jabatan` (
  `kode` int(20) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(100) NOT NULL,
  `kategori_jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`kode`),
  UNIQUE KEY `nama_jabatan` (`nama_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`kode`, `nama_jabatan`, `kategori_jabatan`) VALUES
(1, 'koordinat', 'Staff'),
(2, 'Pemasak', 'Staff Lain-Lain'),
(3, 'Petugas Kebersihan', 'Staff Lain-Lain'),
(4, 'Mentor Kelas Khusus', 'Mentor'),
(6, 'IPIA', 'Mentor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE IF NOT EXISTS `tb_pengguna` (
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `imagefile` text NOT NULL,
  `nip` varchar(15) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`username`, `password`, `level`, `imagefile`, `nip`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '35tv9w.jpg', '1504142'),
('budi', '00dfc53ee86af02e742515cdcf075ed3', 'user', '1204217.jpg', '1504149');

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE IF NOT EXISTS `t_pegawai` (
  `nip` int(30) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(35) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_jabatan` varchar(30) NOT NULL,
  PRIMARY KEY (`nip`),
  KEY `id_jabatan` (`id_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15013179 ;

--
-- Dumping data for table `t_pegawai`
--

INSERT INTO `t_pegawai` (`nip`, `nama_pegawai`, `tgl_lhr`, `tlp`, `alamat`, `id_jabatan`) VALUES
(1504142, 'komisi', '2017-10-19', '085766876123', 'salatiga', '1'),
(1504146, 'mulyani', '0000-00-00', '085728845849', 'boyolali', '2'),
(1504149, 'Budi', '2014-05-01', '08123456789', 'Semarang', '4'),
(15013178, 'bob', '0000-00-00', '081222333444', 'jl ahmad yani', '3');

-- --------------------------------------------------------

--
-- Table structure for table `t_penggajian`
--

CREATE TABLE IF NOT EXISTS `t_penggajian` (
  `no_penggajian` int(20) NOT NULL AUTO_INCREMENT,
  `tanggal_penggajian` date DEFAULT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `Evaluasi` int(50) DEFAULT NULL,
  `inkeh` int(50) DEFAULT NULL,
  `insfile` int(50) DEFAULT NULL,
  `kontribusi_gereja` int(20) DEFAULT NULL,
  `kontribusi_yci` int(20) DEFAULT NULL,
  `jumlah_anak` int(30) DEFAULT NULL,
  `kehadiran_anak` int(30) DEFAULT NULL,
  `j_kehadirananak` int(30) DEFAULT NULL,
  `j_kunjungan` int(30) DEFAULT NULL,
  `j_pertemuan` int(30) DEFAULT NULL,
  `lesson` int(30) DEFAULT NULL,
  `id_gaji` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no_penggajian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `t_penggajian`
--

INSERT INTO `t_penggajian` (`no_penggajian`, `tanggal_penggajian`, `bulan`, `tahun`, `nip`, `Evaluasi`, `inkeh`, `insfile`, `kontribusi_gereja`, `kontribusi_yci`, `jumlah_anak`, `kehadiran_anak`, `j_kehadirananak`, `j_kunjungan`, `j_pertemuan`, `lesson`, `id_gaji`) VALUES
(5, '2020-08-02', 'Desember', '2022', '1504146', 0, 0, 0, 500000, 750000, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2020-08-28', 'Februari', '2020', '1504149', 100000, 50000, 15000, NULL, NULL, 2, 1, 0, 2, 3, 8, 'Mentor Kelas Khusus'),
(10, '2020-09-06', 'Agustus', '2020', '1504142', NULL, NULL, NULL, 9999, 6666, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2020-09-07', 'Januari', '2020', '1504146', NULL, NULL, NULL, 9999, 888, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_tarif_mentor`
--

CREATE TABLE IF NOT EXISTS `t_tarif_mentor` (
  `id_gaji` varchar(100) NOT NULL,
  `gaji` double NOT NULL,
  `bonus` double DEFAULT NULL,
  `kunjungan` int(20) NOT NULL,
  `tutorial` int(20) NOT NULL,
  `lesson` int(20) NOT NULL,
  PRIMARY KEY (`id_gaji`),
  UNIQUE KEY `id_gaji` (`id_gaji`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tarif_mentor`
--

INSERT INTO `t_tarif_mentor` (`id_gaji`, `gaji`, `bonus`, `kunjungan`, `tutorial`, `lesson`) VALUES
('IPIA', 123, 333, 421, 11, 3333),
('Mentor Kelas Khusus', 35000, 688, 25000, 8000, 8000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_gaji_staff`
--
CREATE TABLE IF NOT EXISTS `view_gaji_staff` (
`No` int(20)
,`Tanggal` date
,`Bulan` varchar(10)
,`Tahun` varchar(4)
,`Nama Pegawai` varchar(35)
,`NIP` varchar(15)
,`Kontribusi Gereja` int(20)
,`Kontribusi YCI` int(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pengguna`
--
CREATE TABLE IF NOT EXISTS `view_pengguna` (
`username` varchar(50)
,`password` text
,`level` enum('admin','user')
,`imagefile` text
,`nip` varchar(15)
,`nama_pegawai` varchar(35)
,`tgl_lhr` date
,`tlp` varchar(12)
);
-- --------------------------------------------------------

--
-- Structure for view `view_gaji_staff`
--
DROP TABLE IF EXISTS `view_gaji_staff`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_gaji_staff` AS select `pg`.`no_penggajian` AS `No`,`pg`.`tanggal_penggajian` AS `Tanggal`,`pg`.`bulan` AS `Bulan`,`pg`.`tahun` AS `Tahun`,`p`.`nama_pegawai` AS `Nama Pegawai`,`pg`.`nip` AS `NIP`,`pg`.`kontribusi_gereja` AS `Kontribusi Gereja`,`pg`.`kontribusi_yci` AS `Kontribusi YCI` from ((`t_penggajian` `pg` join `t_pegawai` `p` on((`p`.`nip` = `pg`.`nip`))) join `tb_jabatan` `j` on((`j`.`kode` = `p`.`id_jabatan`))) where (not((`j`.`kategori_jabatan` like 'Mentor')));

-- --------------------------------------------------------

--
-- Structure for view `view_pengguna`
--
DROP TABLE IF EXISTS `view_pengguna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pengguna` AS select `pe`.`username` AS `username`,`pe`.`password` AS `password`,`pe`.`level` AS `level`,`pe`.`imagefile` AS `imagefile`,`pe`.`nip` AS `nip`,`p`.`nama_pegawai` AS `nama_pegawai`,`p`.`tgl_lhr` AS `tgl_lhr`,`p`.`tlp` AS `tlp` from (`tb_pengguna` `pe` join `t_pegawai` `p` on((`pe`.`nip` = `p`.`nip`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
