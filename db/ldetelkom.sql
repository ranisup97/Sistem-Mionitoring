-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2018 pada 10.45
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
-- Struktur dari tabel `peserta`
--

CREATE TABLE IF NOT EXISTS `peserta` (
  `id_peserta` varchar(64) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id_peserta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` varchar(64) NOT NULL,
  `eName` varchar(255) NOT NULL,
  `ePlace` varchar(255) NOT NULL,
  `tglMulai` date NOT NULL,
  `tglAkhir` date NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `eName`, `ePlace`, `tglMulai`, `tglAkhir`) VALUES
('5bf51dc054f3b', 'Bootcamp AM BGES Treg', 'Learning Area 3 Bandung', '2018-11-06', '2018-11-09'),
('5bf524d76543e', 'Digital Leadership for SO Commanders', 'Learning Area 2 Jakarta', '2018-11-12', '2018-11-16'),
('5bf524f3e8883', 'TCIF', 'Learning Area 2 Jakarta', '2018-11-21', '2018-11-23'),
('5bf5250ee2f90', 'Digi Op & Teritory Leader for Kakandatel', 'Learning Area 5 Surabaya', '2018-11-06', '2018-11-08'),
('5bf52523916ef', 'Digi Op & Teritory Leader for Kakandatel', 'Learning Area 7 Makasar', '2018-11-06', '2018-11-08'),
('5bf525455c893', 'Marketing Analysis', 'Hotel di Surabaya', '2018-11-23', '2018-11-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcycle1`
--

CREATE TABLE IF NOT EXISTS `tblcycle1` (
  `id_cycle1` varchar(64) NOT NULL,
  `eName` varchar(255) NOT NULL,
  `ePlace` varchar(255) NOT NULL,
  `tglMulai` date NOT NULL,
  `tglAkhir` date NOT NULL,
  PRIMARY KEY (`id_cycle1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblcycle1`
--

INSERT INTO `tblcycle1` (`id_cycle1`, `eName`, `ePlace`, `tglMulai`, `tglAkhir`) VALUES
('5bf4eb3d2f431', 'Bootcamp AM BGES Treg', 'Learning Area 3 Bandung', '2018-11-06', '2018-11-09'),
('5bf4eb55dd2c0', 'Digital Leadership for SO Commanders', 'Learning Area 2 Jakarta', '2018-11-12', '2018-11-16'),
('5bf4eb7267078', 'TCIF', 'Learning Area 2 Jakarta', '2018-11-21', '2018-11-23'),
('5bf4eb8d76aee', 'Digi Op & Teritory Leader for Kakandatel', 'Learning Area 5 Surabaya', '2018-11-06', '2018-11-08'),
('5bf4ebab4f22c', 'Digi Op & Teritory Leader for Kakandatel', 'Learning Area 7 Makasar', '2018-11-06', '2018-11-08'),
('5bf4ebc416c42', 'Marketing Analysis', 'Hotel di Surabaya', '2018-11-23', '2018-11-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcycle2`
--

CREATE TABLE IF NOT EXISTS `tblcycle2` (
  `id_cycle2` varchar(64) NOT NULL,
  `eName` varchar(255) NOT NULL,
  `ePlace` varchar(255) NOT NULL,
  `tglMulai` date NOT NULL,
  `tglAkhir` date NOT NULL,
  PRIMARY KEY (`id_cycle2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcycle3`
--

CREATE TABLE IF NOT EXISTS `tblcycle3` (
  `id_cycle3` varchar(64) NOT NULL,
  `eName` varchar(255) NOT NULL,
  `ePlace` varchar(255) NOT NULL,
  `tglMulai` date NOT NULL,
  `tglAkhir` date NOT NULL,
  PRIMARY KEY (`id_cycle3`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcycle4`
--

CREATE TABLE IF NOT EXISTS `tblcycle4` (
  `id_cycle4` varchar(64) NOT NULL,
  `eName` varchar(255) NOT NULL,
  `ePlace` varchar(255) NOT NULL,
  `tglMulai` date NOT NULL,
  `tglAkhir` date NOT NULL,
  PRIMARY KEY (`id_cycle4`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcycle5`
--

CREATE TABLE IF NOT EXISTS `tblcycle5` (
  `id_cycle5` varchar(64) NOT NULL,
  `eName` varchar(255) NOT NULL,
  `ePlace` varchar(255) NOT NULL,
  `tglMulai` date NOT NULL,
  `tglAkhir` date NOT NULL,
  PRIMARY KEY (`id_cycle5`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcycle6`
--

CREATE TABLE IF NOT EXISTS `tblcycle6` (
  `id_cycle6` varchar(64) NOT NULL,
  `eName` varchar(255) NOT NULL,
  `ePlace` varchar(255) NOT NULL,
  `tglMulai` date NOT NULL,
  `tglAkhir` date NOT NULL,
  PRIMARY KEY (`id_cycle6`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
