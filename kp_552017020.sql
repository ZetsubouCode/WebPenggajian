-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 03:54 AM
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
-- Table structure for table `tb_absensi_mentor`
--

CREATE TABLE IF NOT EXISTS `tb_absensi_mentor` (
  `id_absen` int(50) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jumlah_anak` int(50) NOT NULL,
  `kehadiran_anak` int(50) NOT NULL,
  `j_kehadirananak` int(50) NOT NULL,
  `j_kunjungan` int(50) NOT NULL,
  `j_pertemuan` int(50) NOT NULL,
  `lesson` int(50) NOT NULL,
  `evaluasi` int(50) NOT NULL,
  `inskeh` int(50) NOT NULL,
  `insfile` int(50) NOT NULL,
  `id_gaji` int(50) NOT NULL,
  `nip` int(30) NOT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_absensi_mentor`
--

INSERT INTO `tb_absensi_mentor` (`id_absen`, `bulan`, `tahun`, `jumlah_anak`, `kehadiran_anak`, `j_kehadirananak`, `j_kunjungan`, `j_pertemuan`, `lesson`, `evaluasi`, `inskeh`, `insfile`, `id_gaji`, `nip`) VALUES
(1, 'maret', '2020', 6, 1, 5, 4, 4, 3, 123, 321, 333, 2, 1506969),
(2, 'Januari', '2020', 12, 44, 1, 5, 4, 10, 122, 221, 12, 6, 1504149);

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
(1506969, 'Bambang', '2020-10-01', '1234565432', 'jakarta', '6'),
(15013178, 'bob', '0000-00-00', '081222333444', 'jl ahmad yani', '3');

-- --------------------------------------------------------

--
-- Table structure for table `t_penggajian`
--

CREATE TABLE IF NOT EXISTS `t_penggajian` (
  `no_penggajian` int(20) NOT NULL AUTO_INCREMENT,
  `tanggal_penggajian` date NOT NULL,
  `keterangan_gaji` varchar(10) NOT NULL,
  `slip_mentor` int(30) DEFAULT NULL,
  `slip_staff` int(30) DEFAULT NULL,
  PRIMARY KEY (`no_penggajian`),
  KEY `slip_mentor` (`slip_mentor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `t_penggajian`
--

INSERT INTO `t_penggajian` (`no_penggajian`, `tanggal_penggajian`, `keterangan_gaji`, `slip_mentor`, `slip_staff`) VALUES
(5, '2020-08-02', '', 0, 1),
(9, '2020-08-28', '', 0, 2),
(10, '2020-09-06', '', 0, 3),
(11, '2020-09-07', '', 1, 0),
(12, '2020-10-04', '', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_tarif_mentor`
--

CREATE TABLE IF NOT EXISTS `t_tarif_mentor` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `gaji` double NOT NULL,
  `bonus` double DEFAULT NULL,
  `kunjungan` int(20) NOT NULL,
  `tutorial` int(20) NOT NULL,
  `lesson` int(20) NOT NULL,
  `evaluasi` int(50) NOT NULL,
  `inskeh` int(50) NOT NULL,
  `insfile` int(50) NOT NULL,
  `id_jabatan` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_gaji` (`id`),
  UNIQUE KEY `id_jabatan` (`id_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `t_tarif_mentor`
--

INSERT INTO `t_tarif_mentor` (`id`, `gaji`, `bonus`, `kunjungan`, `tutorial`, `lesson`, `evaluasi`, `inskeh`, `insfile`, `id_jabatan`) VALUES
(2, 35000, 688, 25000, 8000, 8000, 0, 0, 0, 6),
(6, 123, 123, 123, 123, 123, 123, 123, 123, 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_tarif_staff`
--

CREATE TABLE IF NOT EXISTS `t_tarif_staff` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `gereja` int(50) NOT NULL,
  `yci` int(50) NOT NULL,
  `nip` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `t_tarif_staff`
--

INSERT INTO `t_tarif_staff` (`id`, `bulan`, `tahun`, `gereja`, `yci`, `nip`) VALUES
(1, 'maret', '2020', 99997, 88888, 1504142),
(2, 'september', '2020', 696969, 777776, 1504146),
(3, 'juni', '2020', 56746574, 3324242, 15013178),
(6, 'Januari', '2020', 444, 555, 1504146),
(17, 'Februari', '2020', 123, 123, 1504146);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_gaji_staff`
--
CREATE TABLE IF NOT EXISTS `view_gaji_staff` (
`no_penggajian` int(20)
,`nip` int(30)
,`nama_pegawai` varchar(35)
,`nama_jabatan` varchar(100)
,`tanggal_penggajian` date
,`bulan` varchar(10)
,`tahun` varchar(4)
,`gereja` int(50)
,`yci` int(50)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_gaji_staff` AS select `pg`.`no_penggajian` AS `no_penggajian`,`s`.`nip` AS `nip`,`p`.`nama_pegawai` AS `nama_pegawai`,`j`.`nama_jabatan` AS `nama_jabatan`,`pg`.`tanggal_penggajian` AS `tanggal_penggajian`,`s`.`bulan` AS `bulan`,`s`.`tahun` AS `tahun`,`s`.`gereja` AS `gereja`,`s`.`yci` AS `yci` from (((`t_penggajian` `pg` join `t_tarif_staff` `s` on((`s`.`id` = `pg`.`slip_staff`))) join `t_pegawai` `p` on((`p`.`nip` = `s`.`nip`))) join `tb_jabatan` `j` on((`j`.`kode` = `p`.`id_jabatan`))) where (not((`j`.`kategori_jabatan` like 'Mentor')));

-- --------------------------------------------------------

--
-- Structure for view `view_pengguna`
--
DROP TABLE IF EXISTS `view_pengguna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pengguna` AS select `pe`.`username` AS `username`,`pe`.`password` AS `password`,`pe`.`level` AS `level`,`pe`.`imagefile` AS `imagefile`,`pe`.`nip` AS `nip`,`p`.`nama_pegawai` AS `nama_pegawai`,`p`.`tgl_lhr` AS `tgl_lhr`,`p`.`tlp` AS `tlp` from (`tb_pengguna` `pe` join `t_pegawai` `p` on((`pe`.`nip` = `p`.`nip`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
