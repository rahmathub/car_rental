-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2023 at 10:59 AM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1593493_reztajy`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `konfirmasi_pembayaran` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `kode_booking`, `id_login`, `id_mobil`, `ktp`, `nama`, `alamat`, `no_tlp`, `tanggal`, `lama_sewa`, `total_harga`, `konfirmasi_pembayaran`, `tgl_input`) VALUES
(9, '1682132088', 15, 12, '3217025602000003', '\'Siti halimah tusadiah\'', '\'Pasar panjang\'', '081287051512', '\'2023-04-21\'', 1, 300939, '\'Belum Bayar\'', '\'2023-04-22\''),
(10, '1682132687', 15, 12, '3217025602000003', '\'Siti halimah tusadiah\'', '\'Pasar panjang\'', '081287051512', '\'2023-04-22\'', 1, 300604, '\'Belum Bayar\'', '\'2023-04-22\''),
(12, '1693740485', 17, 20, '1234567890', '\'rahmat wijayanto\'', '\'kelurahan kolono\'', '082292830149', '\'2023-09-01\'', 1, 350718, '\'Belum Bayar\'', '\'2023-09-03\'');

-- --------------------------------------------------------

--
-- Table structure for table `infoweb`
--

CREATE TABLE `infoweb` (
  `id` int(11) NOT NULL,
  `nama_rental` varchar(255) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_rek` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `infoweb`
--

INSERT INTO `infoweb` (`id`, `nama_rental`, `telp`, `alamat`, `email`, `no_rek`, `updated_at`) VALUES
(1, 'REZTA JAYA', '085346066644', 'Jl. HEA Mokodompit, Kambu, Kec. Kambu, Kota Kendari, Sulawesi Tenggara', 'rahmathadiatullah92@gmail.com', 'BRI   0086 0116 2483 504', '2022-01-24 04:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Rahmat', 'ReztaRentalMobil', '1844156d4166d94387f1a4ad031ca5fa', 'admin'),
(7, 'Lala', 'Lala', '55d0dabc40ffb0ebc972cafe67841835', 'pengguna'),
(8, 'Muh zulfadiansyah', 'Zulfadiansyah', 'e532740111c08674e08803def23d2f13', 'pengguna'),
(12, 'jaya', 'rahmat12', '81dc9bdb52d04dc20036dbd8313ed055', 'pengguna'),
(14, 'mama', 'mama', 'eeafbf4d9b3957b139da7b7f2e7f2d4a', 'pengguna'),
(15, 'Halimah', 'Shalimaht016@gmail.com', '6db1c6e4373adf4adbb4508276d1a271', 'pengguna'),
(17, 'rahmat', 'aji', '81dc9bdb52d04dc20036dbd8313ed055', 'pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `merk`, `harga`, `deskripsi`, `status`, `gambar`) VALUES
(7, 'Pajero Sport Dakar 4X4', 1500000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673271292WhatsApp Image 2023-01-09 at 19.55.09.jpeg'),
(8, 'New Toyota Alphard', 9000000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673271572WhatsApp Image 2023-01-09 at 19.55.17.jpeg'),
(9, 'Innova Reborn', 600000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673271630WhatsApp Image 2023-01-09 at 19.55.18.jpeg'),
(10, 'Terios', 350000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673271663WhatsApp Image 2023-01-09 at 19.55.20.jpeg'),
(11, 'Mitsubishi Expander', 350000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673271728WhatsApp Image 2023-01-09 at 19.55.21.jpeg'),
(12, 'New Avanza/Xenia ', 300000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673271748WhatsApp Image 2023-01-09 at 19.55.22.jpeg'),
(13, 'Bryo', 300000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673271767WhatsApp Image 2023-01-09 at 19.55.27.jpeg'),
(14, 'Hilux', 1500000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673271790WhatsApp Image 2023-01-09 at 19.55.30.jpeg'),
(15, ' Mobil BRV 2022', 350000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673272107WhatsApp Image 2023-01-09 at 19.55.31(1).jpeg'),
(16, 'New Fortuner GR 4X4', 1500000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673271549WhatsApp Image 2023-01-09 at 19.55.12.jpeg'),
(17, 'Ayla', 300000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673271872WhatsApp Image 2023-01-09 at 19.55.24.jpeg'),
(18, 'Agya', 300000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673271910WhatsApp Image 2023-01-09 at 19.55.25.jpeg'),
(19, 'Mitsu Triton', 1500000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673271946WhatsApp Image 2023-01-09 at 19.55.31.jpeg'),
(20, 'Rush', 350000, 'PLUS LEPAS KUNCI', 'Tersedia', '1673272063WhatsApp Image 2023-01-09 at 19.55.19.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_booking` int(255) NOT NULL,
  `no_rekening` int(255) NOT NULL,
  `nama_rekening` varchar(255) NOT NULL,
  `nominal` int(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `denda` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
