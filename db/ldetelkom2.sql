-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 07 Des 2018 pada 07.19
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `ldetelkom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE IF NOT EXISTS `monitoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelatihan` int(11) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `cycle1_status` tinyint(1) NOT NULL DEFAULT '0',
  `cycle2_status` tinyint(1) NOT NULL DEFAULT '0',
  `cycle2_pre_test` int(11) DEFAULT NULL,
  `cycle2_post_test` int(11) DEFAULT NULL,
  `cycle3_status` tinyint(1) NOT NULL DEFAULT '0',
  `cycle3_pre_test` int(11) DEFAULT NULL,
  `cycle3_post_test` int(11) DEFAULT NULL,
  `cycle4_status` tinyint(1) NOT NULL DEFAULT '0',
  `cycle4_judul_laporan` varchar(128) DEFAULT NULL,
  `cycle4_tanggal` date DEFAULT NULL,
  `cycle5_status` tinyint(1) NOT NULL DEFAULT '0',
  `cycle5_judul_laporan` varchar(128) DEFAULT NULL,
  `cycle5_tanggal` date DEFAULT NULL,
  `cycle6_status` tinyint(1) NOT NULL DEFAULT '0',
  `cycle6_judul_laporan` varchar(128) DEFAULT NULL,
  `cycle6_tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nik` (`nik`),
  KEY `id_pelatihan` (`id_pelatihan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `monitoring`
--

INSERT INTO `monitoring` (`id`, `id_pelatihan`, `nik`, `cycle1_status`, `cycle2_status`, `cycle2_pre_test`, `cycle2_post_test`, `cycle3_status`, `cycle3_pre_test`, `cycle3_post_test`, `cycle4_status`, `cycle4_judul_laporan`, `cycle4_tanggal`, `cycle5_status`, `cycle5_judul_laporan`, `cycle5_tanggal`, `cycle6_status`, `cycle6_judul_laporan`, `cycle6_tanggal`) VALUES
(4, 1, '1505439', 1, 1, 70, 70, 1, 70, 70, 1, 'Validasi Data membantu percepatan proses penyelesaian pasang baru dan proses penyelesaian gangguan', '2018-11-30', 1, 'Validasi Data membantu percepatan proses penyelesaian pasang baru dan proses penyelesaian gangguan', '2018-11-30', 1, 'Validasi Data membantu percepatan proses penyelesaian pasang baru dan proses penyelesaian gangguan', '2018-11-30'),
(11, 1, '640445', 1, 1, 80, 80, 1, 80, 80, 1, 'laporan PLA', '2018-12-07', 1, 'laporan PLA', '2018-12-07', 1, 'Laporan PLA', '2018-12-07'),
(12, 1, '650549', 0, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan`
--

CREATE TABLE IF NOT EXISTS `pelatihan` (
  `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelatihan` varchar(255) NOT NULL,
  `tempat_pelatihan` varchar(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  PRIMARY KEY (`id_pelatihan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `nama_pelatihan`, `tempat_pelatihan`, `tgl_mulai`, `tgl_akhir`) VALUES
(1, 'Bootcamp AM BGES Treg', 'Learning Area 3 Bandung', '2018-11-06', '2018-11-09'),
(2, 'Digital Leadership for SO Commanders', 'Learning Area 2 Jakarta', '2018-11-12', '2018-11-16'),
(3, 'TCIF', 'Learning Area 2 Jakarta', '2018-11-21', '2018-11-23'),
(4, 'Digi Op & Teritory Leader for Kakandatel', 'Learning Area 5 Surabaya', '2018-11-06', '2018-11-08'),
(5, 'Digi Op & Teritory Leader for Kakandatel', 'Learning Area 7 Makasar', '2018-11-06', '2018-11-08'),
(6, 'Marketing Analysis', 'Hotel di Surabaya', '2018-11-23', '2018-11-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE IF NOT EXISTS `peserta` (
  `nik` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`nik`, `nama`, `jabatan`) VALUES
('1504215', 'Yuniarti', 'Web Designer'),
('1505439', 'Muhammad Naufal Fazanadi', 'Mahasiswa Tua'),
('1802512', 'Nopal', 'Mahasiswa Baru'),
('640445', 'RAMIDI, SE., M.M.', 'ACCOUNT MANAGER'),
('650549', 'WENDARNA', 'ASMAN BUSINESS QUALITY & DELIVERY'),
('870064', 'ALINE ZIVANA', 'ASMAN GES QUALITY & PROJECT MGT'),
('900090', 'SANDRO PIBA', 'JUNIOR ACCOUNT MANAGER 1');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD CONSTRAINT `fk_nik` FOREIGN KEY (`nik`) REFERENCES `peserta` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monitoring_ibfk_1` FOREIGN KEY (`id_pelatihan`) REFERENCES `pelatihan` (`id_pelatihan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
