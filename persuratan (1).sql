-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 03:46 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persuratan`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_log`
--

CREATE TABLE `t_log` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `log_aktivitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_moa`
--

CREATE TABLE `t_moa` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_moumoa` date NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_partner` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `id_log` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_mou`
--

CREATE TABLE `t_mou` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_moumoa` date NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_partner` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `id_log` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_keluar`
--

CREATE TABLE `t_surat_keluar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `untuk` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `email`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'handi@seamolec.org', '$2y$12$Cn4DPDFO/kAPO6FtaWmLC.WjDEQ632tagxB6k7HU1zZ5F.lLdhuq.', 'Handi Pradana', 'admin'),
(2, 'elvin', 'elnisa@seamolec.org', '$2y$12$0GMi32pwG5tA61x0b0UsO.HwGkaNy84b5jOGlX9jHY6wVaJjjaKWy', 'Elvin Khoirunnisa', 'sekretaris'),
(3, 'firda', 'firdanuristianah@gmail.com', '$2y$12$z5vtYgsEqgwrLvl1C1n2feu4N7FFjCB4fw1IsSt4k/pL2HutP.v1y', 'Firda Nuristianah', 'magang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_log`
--
ALTER TABLE `t_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_moa`
--
ALTER TABLE `t_moa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_log` (`id_log`);

--
-- Indexes for table `t_mou`
--
ALTER TABLE `t_mou`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_log` (`id_log`);

--
-- Indexes for table `t_surat_keluar`
--
ALTER TABLE `t_surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_log`
--
ALTER TABLE `t_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_moa`
--
ALTER TABLE `t_moa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_mou`
--
ALTER TABLE `t_mou`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_surat_keluar`
--
ALTER TABLE `t_surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_log`
--
ALTER TABLE `t_log`
  ADD CONSTRAINT `t_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_mou`
--
ALTER TABLE `t_mou`
  ADD CONSTRAINT `t_mou_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_mou_ibfk_2` FOREIGN KEY (`id_log`) REFERENCES `t_log` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_surat_keluar`
--
ALTER TABLE `t_surat_keluar`
  ADD CONSTRAINT `t_surat_keluar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
