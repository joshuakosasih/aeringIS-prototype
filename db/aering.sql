-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 06:31 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aering`
--

-- --------------------------------------------------------

--
-- Table structure for table `communications`
--

CREATE TABLE `communications` (
  `id_comm` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `id_emp` int(11) DEFAULT NULL,
  `attn` varchar(45) DEFAULT NULL,
  `via` varchar(20) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `docname` varchar(60) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `communications`
--

INSERT INTO `communications` (`id_comm`, `date`, `id_emp`, `attn`, `via`, `id_project`, `docname`, `last_updated`) VALUES
(2, '0000-00-00', 1, 'sdf', 'fsc', 1, 'com', '2017-04-11 11:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_cust` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `docname` varchar(60) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP,
  `company` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_cust`, `name`, `phone`, `docname`, `last_updated`, `company`, `address`) VALUES
(1, 'cust', '081', NULL, NULL, NULL, NULL),
(2, 'cust2', '93', NULL, NULL, 'com', 'jalan');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id_emp` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `division` varchar(45) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `docname` varchar(60) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id_emp`, `name`, `division`, `username`, `password`, `docname`, `last_updated`) VALUES
(1, 'Tes', 'GA', 'tes123', 'tes123', NULL, NULL),
(2, 'saya', 'S', 'ss', 'ss', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id_inv` int(11) NOT NULL,
  `no_inv` varchar(45) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `via` varchar(10) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `docname` varchar(60) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `docname` varchar(60) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id_payment` int(11) NOT NULL,
  `duedate` date DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `docname` varchar(60) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id_project` int(11) NOT NULL,
  `created_date` date DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `id_customer` int(11) DEFAULT NULL,
  `docname` varchar(60) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id_project`, `created_date`, `name`, `description`, `id_customer`, `docname`, `last_updated`) VALUES
(1, '0000-00-00', 'lala', 'sda', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id_quotation` int(11) NOT NULL,
  `no_quot` varchar(45) DEFAULT NULL,
  `publish` date DEFAULT NULL,
  `tat` int(11) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `docname` varchar(60) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ref_po_wo`
--

CREATE TABLE `ref_po_wo` (
  `id_ref` int(11) NOT NULL,
  `no_ref` varchar(45) DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `approv_date` date DEFAULT NULL,
  `unit_receive_date` date DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `docname` varchar(60) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tax_invoices`
--

CREATE TABLE `tax_invoices` (
  `id_tax` int(11) NOT NULL,
  `no_tax_inv` varchar(45) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `via` varchar(10) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `docname` varchar(60) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `communications`
--
ALTER TABLE `communications`
  ADD PRIMARY KEY (`id_comm`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id_inv`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id_quotation`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `ref_po_wo`
--
ALTER TABLE `ref_po_wo`
  ADD PRIMARY KEY (`id_ref`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `tax_invoices`
--
ALTER TABLE `tax_invoices`
  ADD PRIMARY KEY (`id_tax`),
  ADD KEY `id_project` (`id_project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `communications`
--
ALTER TABLE `communications`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id_inv` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id_quotation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tax_invoices`
--
ALTER TABLE `tax_invoices`
  MODIFY `id_tax` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `communications`
--
ALTER TABLE `communications`
  ADD CONSTRAINT `communications_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`),
  ADD CONSTRAINT `communications_ibfk_3` FOREIGN KEY (`id_emp`) REFERENCES `employees` (`id_emp`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_cust`);

--
-- Constraints for table `quotations`
--
ALTER TABLE `quotations`
  ADD CONSTRAINT `quotations_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`);

--
-- Constraints for table `ref_po_wo`
--
ALTER TABLE `ref_po_wo`
  ADD CONSTRAINT `ref_po_wo_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`);

--
-- Constraints for table `tax_invoices`
--
ALTER TABLE `tax_invoices`
  ADD CONSTRAINT `tax_invoices_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
