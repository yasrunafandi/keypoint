-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2019 pada 16.11
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keypoint`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `baterai`
--

CREATE TABLE `baterai` (
  `Id_Baterai` int(11) NOT NULL,
  `Merk` varchar(15) DEFAULT NULL,
  `Kapasitas` varchar(10) DEFAULT NULL,
  `Jumlah` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `baterai`
--

INSERT INTO `baterai` (`Id_Baterai`, `Merk`, `Kapasitas`, `Jumlah`) VALUES
(1, 'sad12', 'sdfs', 12),
(2, 'gfhf', 'fj', 3),
(3, 'fjf', 'ukuy', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gatway`
--

CREATE TABLE `gatway` (
  `Id_Gatway` int(11) NOT NULL,
  `Nama_Gatway` varchar(10) DEFAULT NULL,
  `IP_Gatway` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gembok`
--

CREATE TABLE `gembok` (
  `Id_Gembok` int(11) NOT NULL,
  `Gembok_Panel` varchar(20) DEFAULT NULL,
  `Ket` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `Id_Lokasi` int(11) NOT NULL,
  `Area` varchar(10) NOT NULL,
  `Rayon` varchar(15) NOT NULL,
  `Gardu_Induk` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menyulang`
--

CREATE TABLE `menyulang` (
  `Id_Penyulang` int(11) NOT NULL,
  `Penyulang1` varchar(10) DEFAULT NULL,
  `Penyulang2` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `modem`
--

CREATE TABLE `modem` (
  `Id` int(11) NOT NULL,
  `Id_Modem` varchar(10) DEFAULT NULL,
  `Type_Modem` varchar(15) DEFAULT NULL,
  `No_IMEI_SN` varchar(20) DEFAULT NULL,
  `IP_Modem` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `Id_Pemeliharaan` int(11) NOT NULL,
  `Id_Keypoint` int(11) NOT NULL,
  `Id_Baterai` int(11) NOT NULL,
  `Id_Gatway` int(11) NOT NULL,
  `Id_Gembok` int(11) NOT NULL,
  `Id_Lokasi` int(11) NOT NULL,
  `Id_Penyulangan` int(11) NOT NULL,
  `Id_Modem` int(11) NOT NULL,
  `Id_SIM` int(11) NOT NULL,
  `Id_Status_Switch_Gear` int(11) NOT NULL,
  `Status_Akhir` enum('Normal','Pending','Karantina','Modem Bongkar') NOT NULL,
  `Kesiapan_Peralatan` enum('Siap','Tidak Siap') NOT NULL,
  `Titik_Terpelihara` enum('0','1') NOT NULL,
  `TGL_HAR_TERAKHIR` date NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sim_card`
--

CREATE TABLE `sim_card` (
  `Id_SIM` int(11) NOT NULL,
  `Provider` varchar(15) DEFAULT NULL,
  `IP_SIM` varchar(20) DEFAULT NULL,
  `No_SIM` varchar(15) DEFAULT NULL,
  `No_ICCID` int(30) DEFAULT NULL,
  `Ket` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `switch_gear`
--

CREATE TABLE `switch_gear` (
  `Id_Status_Switch_Gear` int(11) NOT NULL,
  `Status_Switch_Gear` varchar(2) DEFAULT NULL,
  `Penyulang1` varchar(7) DEFAULT NULL,
  `Penyulang2` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keypoint`
--

CREATE TABLE `tb_keypoint` (
  `Id_Keypoint` int(11) NOT NULL,
  `Nama_Keypoint_Dilokasi` varchar(20) DEFAULT NULL,
  `Nama_Keypoint_Discada` varchar(20) DEFAULT NULL,
  `Jenis_Keypoint` varchar(8) DEFAULT NULL,
  `Merk_RTU` varchar(20) DEFAULT NULL,
  `No_Seri_RTU` varchar(20) DEFAULT NULL,
  `Alamat_Keypoint` varchar(40) DEFAULT NULL,
  `GPS` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `baterai`
--
ALTER TABLE `baterai`
  ADD PRIMARY KEY (`Id_Baterai`);

--
-- Indeks untuk tabel `gatway`
--
ALTER TABLE `gatway`
  ADD PRIMARY KEY (`Id_Gatway`);

--
-- Indeks untuk tabel `gembok`
--
ALTER TABLE `gembok`
  ADD PRIMARY KEY (`Id_Gembok`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`Id_Lokasi`);

--
-- Indeks untuk tabel `menyulang`
--
ALTER TABLE `menyulang`
  ADD PRIMARY KEY (`Id_Penyulang`);

--
-- Indeks untuk tabel `modem`
--
ALTER TABLE `modem`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`Id_Pemeliharaan`);

--
-- Indeks untuk tabel `sim_card`
--
ALTER TABLE `sim_card`
  ADD PRIMARY KEY (`Id_SIM`);

--
-- Indeks untuk tabel `switch_gear`
--
ALTER TABLE `switch_gear`
  ADD PRIMARY KEY (`Id_Status_Switch_Gear`);

--
-- Indeks untuk tabel `tb_keypoint`
--
ALTER TABLE `tb_keypoint`
  ADD PRIMARY KEY (`Id_Keypoint`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `baterai`
--
ALTER TABLE `baterai`
  MODIFY `Id_Baterai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gatway`
--
ALTER TABLE `gatway`
  MODIFY `Id_Gatway` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gembok`
--
ALTER TABLE `gembok`
  MODIFY `Id_Gembok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `Id_Lokasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menyulang`
--
ALTER TABLE `menyulang`
  MODIFY `Id_Penyulang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `modem`
--
ALTER TABLE `modem`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `Id_Pemeliharaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sim_card`
--
ALTER TABLE `sim_card`
  MODIFY `Id_SIM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `switch_gear`
--
ALTER TABLE `switch_gear`
  MODIFY `Id_Status_Switch_Gear` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_keypoint`
--
ALTER TABLE `tb_keypoint`
  MODIFY `Id_Keypoint` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
