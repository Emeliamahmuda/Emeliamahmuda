-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2020 pada 06.51
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `ci32020`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `proddi`
--

CREATE TABLE IF NOT EXISTS `proddi` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(20) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `proddi`
--

INSERT INTO `proddi` (`no`, `nama_prodi`) VALUES
(1, 'Teknik Sipil'),
(2, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alumni`
--

CREATE TABLE IF NOT EXISTS `tb_alumni` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `npm` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jk` varchar(9) NOT NULL,
  `alamat` text NOT NULL,
  `prodi` varchar(25) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `id_pekerjaan` int(5) NOT NULL,
  `alamat_kantor` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npm` (`npm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_alumni`
--

INSERT INTO `tb_alumni` (`id`, `npm`, `nama`, `jk`, `alamat`, `prodi`, `angkatan`, `id_pekerjaan`, `alamat_kantor`, `keterangan`) VALUES
(1, '17420029', 'Emelia Mahmuda', 'Perempuan', 'Tanjung Payang', 'Teknik Informatika', 2017, 1, 'Pagar Alam', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku_tamu`
--

CREATE TABLE IF NOT EXISTS `tb_buku_tamu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  `tgl_pesan` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `npm` varchar(9) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jk` varchar(9) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `npm`, `nama`, `jk`, `prodi`) VALUES
(5, '17420029', 'Emelia Mahmuda', 'Perempuan', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `tb_pekerjaan` (
  `id_pekerjaan` int(5) NOT NULL AUTO_INCREMENT,
  `pekerjaan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
