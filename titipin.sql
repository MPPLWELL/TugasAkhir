-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 03:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `titipin`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `Username`, `Password`) VALUES
(1, 'admin', 'admin'),
(4, 'tes', ''),
(5, 'tesagi', 'saldkj');

-- --------------------------------------------------------

--
-- Table structure for table `paketinformasi`
--

CREATE TABLE `paketinformasi` (
  `id` int(8) NOT NULL,
  `informasi` varchar(300) NOT NULL,
  `detail` varchar(300) NOT NULL,
  `idsupir` varchar(8) NOT NULL,
  `kodepengirimanbarang` varchar(300) NOT NULL,
  `tanggal` varchar(300) NOT NULL,
  `namapaket` varchar(300) NOT NULL,
  `jumlahpaket` varchar(300) NOT NULL,
  `notif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paketinformasi`
--

INSERT INTO `paketinformasi` (`id`, `informasi`, `detail`, `idsupir`, `kodepengirimanbarang`, `tanggal`, `namapaket`, `jumlahpaket`, `notif`) VALUES
(2, 'Paket telah dikirim ke kulonprogo', 'Paket telah berada di gudang sortir kota Makassar dan akan dikirim ke gudang sortir kota Bandung.', 'S0J001P0', 'P09B2121', 'Jum’at 20/05/2012', 'Pembasmi jerawat dari korea', '10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(12) NOT NULL,
  `namaproduk` varchar(200) NOT NULL,
  `hargaproduk` int(12) NOT NULL,
  `deskripsiproduk` varchar(500) NOT NULL,
  `kategoriproduk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `namaproduk`, `hargaproduk`, `deskripsiproduk`, `kategoriproduk`) VALUES
(1, 'koko kranch', 2000, 'Lejat dan bergiji', 'Food'),
(2, 'Marbatak', 3000, 'Beta suka', 'Food'),
(3, 'Terang Bulan', 5000, 'Cerah sekali malam ini', 'Food'),
(4, 'Gula jawa', 9000, 'Medok parah', 'Food'),
(6, 'Gula Melayu', 500, 'Kemayune', 'Food');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paketinformasi`
--
ALTER TABLE `paketinformasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paketinformasi`
--
ALTER TABLE `paketinformasi`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
