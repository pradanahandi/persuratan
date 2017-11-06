-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 05:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_moa`
--

CREATE TABLE `t_moa` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_moa` date NOT NULL,
  `no_m` int(11) NOT NULL,
  `nomoa` varchar(255) NOT NULL,
  `nama_partner` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_mou`
--

CREATE TABLE `t_mou` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_mou` date NOT NULL,
  `no_m` int(11) NOT NULL,
  `nomou` varchar(255) NOT NULL,
  `nama_partner` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_keluar`
--

CREATE TABLE `t_surat_keluar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `no_s` int(11) NOT NULL,
  `nosurat` varchar(255) NOT NULL,
  `untuk` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `email`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'handi@seamolec.org', '$2y$12$Cn4DPDFO/kAPO6FtaWmLC.WjDEQ632tagxB6k7HU1zZ5F.lLdhuq.', 'Handi Pradana', 'admin'),
(2, 'elvin', 'elvin@seamolec.org', '$2y$12$WaMWgxPtW9J3/JMrjiWHcO6q/c3Tc4bl5r4Rr08sM0iT/.qseP0aa', 'Elvin Khoirunnisa', 'sekretaris'),
(3, 'novel', 'novelmeilanie@seamolec.org', '$2y$12$NNWrzWqNyUyIz//RbgYj4O33NFdZTelhY6AbnSrNM5gBouCUPVa66', 'Novel Meilanie', 'sekretaris'),
(4, 'firda', 'firdanuristianah@gmail.com', '$2y$12$CIsdFcl6hfjJKWoElQOqAuTUE4OyeHFfsfOmBEMSVjPvtV0sPX3pS', 'Firda Nuristianah', 'magang'),
(5, 'agun', 'agun@seamolec.org', '$2y$12$.kREESqCtMWJwghb50AeIePBnrHz08B/3JmqoT.yxIFRxXo7rJz0i', 'Agun Gunawan', 'sekretaris'),
(6, 'yoanda', 'yoanda@seamolec.org', '$2y$12$3mMUWtlO9mrkTVJt8jtOWu/gQGebpk7sRzJNV4iWgAtKyAVvqB.Ai', 'Yoanda Adana', 'compart');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_moa`
--
ALTER TABLE `t_moa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_mou`
--
ALTER TABLE `t_mou`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

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
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_mou`
--
ALTER TABLE `t_mou`
  ADD CONSTRAINT `t_mou_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
