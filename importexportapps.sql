-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 02:54 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `importexportapps`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_export`
--

CREATE TABLE `tbl_export` (
  `id` bigint(20) NOT NULL,
  `idInvoices` varchar(30) NOT NULL,
  `dateOfPib` date NOT NULL,
  `docNo` varchar(10) NOT NULL,
  `docType` varchar(10) NOT NULL,
  `noPengajuanDokumen` varchar(10) NOT NULL,
  `blNo` varchar(15) NOT NULL,
  `vesselName` varchar(80) NOT NULL,
  `consignee` varchar(100) NOT NULL,
  `remark` varchar(10) NOT NULL,
  `valuta` varchar(5) NOT NULL,
  `value` float NOT NULL,
  `valueIdr` float NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_export`
--

INSERT INTO `tbl_export` (`id`, `idInvoices`, `dateOfPib`, `docNo`, `docType`, `noPengajuanDokumen`, `blNo`, `vesselName`, `consignee`, `remark`, `valuta`, `value`, `valueIdr`, `qty`) VALUES
(1, 'inv-00000003', '2021-04-13', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'test', 'trial', 'EUR', 5, 1000000, 0),
(2, 'inv-00000006', '2021-05-12', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'test', 'trial', 'EUR', 5, 5, 0),
(3, 'inv-00000006', '2021-05-12', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'test', 'trial', 'EUR', 5, 5, 0),
(4, 'inv-00000006', '2021-05-12', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'test', 'trial', 'EUR', 5, 5, 0),
(5, 'inv-00000009', '2021-05-03', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'test', 'trial', 'EUR', 5, 5, 0),
(6, 'inv-00000018', '0000-00-00', '108658', 'PEB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'test', 'trial', 'EUR', 5, 25, 5),
(7, 'inv-00000020', '2021-08-03', '108658', 'PEB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'test', 'trial', 'EUR', 5, 25, 5),
(8, 'inv-00000020', '2021-08-03', '108658', 'PEB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'test', 'trial', 'EUR', 5, 25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exporttemp`
--

CREATE TABLE `tbl_exporttemp` (
  `dateOfPib` date NOT NULL,
  `docNo` varchar(10) NOT NULL,
  `docType` varchar(10) NOT NULL,
  `noPengajuanDokumen` varchar(10) NOT NULL,
  `blNo` varchar(15) NOT NULL,
  `vesselName` varchar(80) NOT NULL,
  `consignee` varchar(100) NOT NULL,
  `remark` varchar(10) NOT NULL,
  `valuta` varchar(5) NOT NULL,
  `value` float NOT NULL,
  `valueIdr` float NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_import`
--

CREATE TABLE `tbl_import` (
  `id` bigint(20) NOT NULL,
  `idInvoices` varchar(30) NOT NULL,
  `dateOfPib` date NOT NULL,
  `docNo` varchar(10) NOT NULL,
  `docType` varchar(10) NOT NULL,
  `noPengajuanDokumen` varchar(15) NOT NULL,
  `blNo` varchar(15) NOT NULL,
  `vesselName` varchar(50) NOT NULL,
  `shipper` varchar(80) NOT NULL,
  `remark` varchar(10) DEFAULT NULL,
  `valuta` varchar(5) NOT NULL,
  `value` float NOT NULL,
  `valueIdr` float NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_import`
--

INSERT INTO `tbl_import` (`id`, `idInvoices`, `dateOfPib`, `docNo`, `docType`, `noPengajuanDokumen`, `blNo`, `vesselName`, `shipper`, `remark`, `valuta`, `value`, `valueIdr`, `qty`) VALUES
(1, 'inv-00000001', '2021-03-06', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 13, 130000, 0),
(2, 'inv-00000002', '2021-04-06', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 5, 100000, 0),
(3, 'inv-00000005', '2021-05-03', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 5, 5, 0),
(4, 'inv-00000005', '2021-05-03', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 5, 5, 0),
(5, 'inv-00000005', '2021-05-03', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 5, 5, 0),
(6, 'inv-00000005', '2021-05-10', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 5, 5, 0),
(7, 'inv-00000005', '2021-05-05', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 5, 5, 0),
(8, 'inv-00000007', '2021-05-03', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 5, 5, 0),
(9, 'inv-00000008', '2021-05-03', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 5, 5, 0),
(10, 'inv-00000016', '2021-08-03', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 5, 5, 0),
(11, 'inv-00000016', '2021-08-03', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 5, 5, 0),
(12, 'inv-00000017', '0000-00-00', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 5, 25, 5),
(13, 'inv-00000017', '0000-00-00', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', 'EUR', 5, 25, 5),
(14, 'inv-00000019', '2021-08-03', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', '5', 5, 25, 5),
(15, 'inv-00000019', '2021-08-03', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', '5', 5, 25, 5),
(16, 'inv-00000019', '2021-08-03', '108658', 'PIB', '016841', 'E200702-31', 'KLM. BINTANG FAJAR-1/5710A', 'AMERICAN POWER CONVERSION CORPORATION', 'trial', '5', 5, 25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_importtemp`
--

CREATE TABLE `tbl_importtemp` (
  `dateOfPib` date NOT NULL,
  `docNo` varchar(10) NOT NULL,
  `docType` varchar(10) NOT NULL,
  `noPengajuanDokumen` varchar(15) NOT NULL,
  `blNo` varchar(15) NOT NULL,
  `vesselName` varchar(50) NOT NULL,
  `shipper` varchar(80) NOT NULL,
  `remark` varchar(10) NOT NULL,
  `valuta` varchar(5) NOT NULL,
  `value` float NOT NULL,
  `valueIdr` float NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoices`
--

CREATE TABLE `tbl_invoices` (
  `id` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `fromto` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoices`
--

INSERT INTO `tbl_invoices` (`id`, `date`, `type`, `fromto`) VALUES
('inv-00000001', '2021-03-13', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000002', '2021-04-06', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000003', '2021-04-06', 'Export', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000004', '2021-05-02', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000005', '2021-05-02', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000006', '2021-05-03', 'Export', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000007', '2021-05-03', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000008', '2021-05-03', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000009', '2021-05-03', 'Export', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000010', '2021-08-03', 'Import', 'test'),
('inv-00000011', '2021-08-03', 'Import', 'test'),
('inv-00000012', '0000-00-00', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000013', '0000-00-00', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000014', '2021-08-10', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000015', '2021-08-10', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000016', '2021-08-10', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000017', '2021-08-03', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000018', '2021-08-03', 'Export', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000019', '2021-08-03', 'Import', 'PT Schneider Electric Manufacturing Batam'),
('inv-00000020', '2021-08-03', 'Export', 'PT Schneider Electric Manufacturing Batam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`username`, `password`, `name`) VALUES
('admin', '$2y$10$2cshVJV2D96K.WqgDxPSAuWtYSVDe4QsyX3BbB5vM1Zr88bTXtPoS', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_export`
--
ALTER TABLE `tbl_export`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_import`
--
ALTER TABLE `tbl_import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoices`
--
ALTER TABLE `tbl_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_export`
--
ALTER TABLE `tbl_export`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_import`
--
ALTER TABLE `tbl_import`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
