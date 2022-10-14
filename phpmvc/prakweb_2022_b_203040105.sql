-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 12:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakweb_2022_b_203040105`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `gambar_buku` varchar(50) NOT NULL,
  `penerbit_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `tahun_terbit`, `gambar_buku`, `penerbit_buku`) VALUES
(5, 'Melangkah', '2022-09-01', 'Melangkah.jpg', 'Gramedia Widiasarana Indonesia'),
(6, 'Miiko', '2022-09-19', 'Miiko.jpeg', 'Gramedia Widiasarana Indonesia'),
(7, 'Di Tanah Lada', '2022-09-12', 'Ditanah.jpg', 'Gramedia Widiasarana Indonesia'),
(8, 'Sagaras', '2022-09-18', 'sagaras.jpeg', 'Gramedia Widiasarana Indonesia'),
(9, 'Kita Pergi Hari Ini', '2022-09-16', 'Kita.jpg', 'Gramedia Widiasarana Indonesia'),
(10, 'Anak Bajang Mengayun Bulan', '2022-04-01', 'Anak.jpg', 'Gramedia Pustaka Utama'),
(11, 'Sang Alkemis', '2021-08-21', 'Sang_Alkemis.jpg', 'Gramedia Pustaka Utama'),
(12, 'Novel Bedebah Di Ujung Tanduk', '2021-10-29', 'Bedebah.jpg', 'PENERBIT SABAK GRIP'),
(13, 'Kecamuk Darah (Troubled Blood)', '2021-09-04', 'Kacamuk.jpg', 'Gramedia Pustaka Utama'),
(14, 'Kekasih Musim Gugur', '2020-07-09', 'Kekasih.jpg', 'Gramedia Pustaka Utama'),
(23, 'raplih', '0000-00-00', 'gaada.jpg', 'rafli');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`) VALUES
(1, 'Rafliansyah', '203040105', 'raflians@gmail.com', 'Teknik informatika'),
(2, 'Hamzah', '203040888', 'Hamzahimut@gmail.com', 'Teknik Informatika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
