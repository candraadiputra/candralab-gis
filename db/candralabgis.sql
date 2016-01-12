-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 27. Oktober 2013 jam 16:27
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `candralabgis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE IF NOT EXISTS `kabupaten` (
  `idkabupaten` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `idprovinsi` int(11) DEFAULT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`idkabupaten`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`idkabupaten`, `nama`, `idprovinsi`, `lat`, `lng`) VALUES
(2, 'Sleman', 9, -7.691938999862423, 110.34063779296878),
(3, 'Kulon progo', 9, -7.888888, 110.127614),
(4, 'Bantul', 9, -7.881917, 110.330346),
(5, 'kota jogja', 9, -7.792296, 110.368455),
(6, 'Gunung Kidul', 9, -7.958937, 110.609957),
(11, 'Pemalang', 8, -6.899160854296265, 109.3625795390625),
(12, 'Padang Sidempuan', 2, 1.5324098515095648, 99.34057675781253),
(13, 'Cilacap', 8, -7.615720029903289, 109.005523875),
(14, 'Tegal', 8, -6.937333033133075, 109.1538393046875);

-- --------------------------------------------------------

--
-- Struktur dari tabel `polisi`
--

CREATE TABLE IF NOT EXISTS `polisi` (
  `idpolisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `idkabupaten` int(11) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpolisi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `polisi`
--

INSERT INTO `polisi` (`idpolisi`, `nama`, `no_telp`, `alamat`, `lat`, `lng`, `idkabupaten`, `foto`) VALUES
(1, 'Polsek Banguntapan', '0274 123456', 'Jl. Wonosari Km 6 Banguntapan', -7.81202448808979, 110.40716488391115, 2, 'BANGUNTAPAN.jpg'),
(2, 'Polsek Tirto Harjo', '12324343', 'Jl Magelang no 20', -7.692619466416046, 110.34398518981936, 2, 'pol.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `idprovinsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`idprovinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`idprovinsi`, `nama`, `lat`, `lng`) VALUES
(1, 'Aceh', 4.565473, 96.632446),
(2, 'Sumatra Utara', 2.811371, 98.47815),
(3, 'Bengkulu', -3.590177, 102.345337),
(6, 'Lampung', -4.455951, 105.412994),
(7, 'Sumatra Selatan', -3.195364, 103.896881),
(8, 'Jawa Tengah', -6.986407, 110.148102),
(9, 'Yogyakarta', -7.798078526354301, 110.34338437500003),
(10, 'Jawa timur', -8.363692646841818, 113.85900937500003),
(11, 'Kalimantan Tengah', -1.406108830388993, 113.94690000000003);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumahsakit`
--

CREATE TABLE IF NOT EXISTS `rumahsakit` (
  `idrumahsakit` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `jenis` enum('RSUD','SWASTA') DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(45) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `idkabupaten` int(11) DEFAULT NULL,
  PRIMARY KEY (`idrumahsakit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `rumahsakit`
--

INSERT INTO `rumahsakit` (`idrumahsakit`, `nama`, `jenis`, `alamat`, `no_telp`, `lat`, `lng`, `foto`, `idkabupaten`) VALUES
(3, 'Jogja International Hospital', 'SWASTA', 'Ring Road Utara No. 160 Condong Catur, Sleman', '0274-4463 555', -7.757939, 110.403817, 'jih.jpg', 2),
(4, 'RS Dr. Sardjito2', 'SWASTA', 'Alamat Kompl RS Dr Sardjito Yogyakarta', '0274-587333', -7.787193786866054, 110.36073048144533, 'sarjito.jpg', 2),
(5, 'RS PKU Muhammadiyah', 'SWASTA', 'Jl. KH. Ahmad Dahlan 20 Yk 512653', '512653', -7.801224908902954, 110.36253268249516, 'pkujogja.jpg', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spbu`
--

CREATE TABLE IF NOT EXISTS `spbu` (
  `idspbu` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `idkabupaten` int(11) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idspbu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `spbu`
--

INSERT INTO `spbu` (`idspbu`, `nama`, `alamat`, `lat`, `lng`, `idkabupaten`, `foto`) VALUES
(1, 'SPBU janti', 'Jl Janti No 200 Yogyakarta', -7.798758954377782, 110.40776569873049, 2, 'spbujanti.jpg'),
(2, 'SPBU Adisucipto', 'Jl Adisucipto no 20 Yogyakarta', -7.782091405560922, 110.40484745532228, 2, 'spbuadisucipto.jpg'),
(3, 'Pom Bensin jetis', 'Jl Raya jetis no 20', -7.7826015404515605, 110.36794001586918, 5, 'pom.jpg'),
(4, 'Pom Bensin Jeruk Legi', 'Jl Jeruk Legi', -7.606021530422187, 109.02191753649902, 13, 'pom2.jpg');
