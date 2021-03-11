-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 25, 2020 la 12:57 PM
-- Versiune server: 10.4.11-MariaDB
-- Versiune PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `bank`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` char(25) DEFAULT NULL,
  `pwd` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `beneficiary4`
--

CREATE TABLE `beneficiary4` (
  `benef_id` int(11) NOT NULL,
  `benef_cust_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `beneficiary5`
--

CREATE TABLE `beneficiary5` (
  `benef_id` int(11) NOT NULL,
  `benef_cust_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `beneficiary6`
--

CREATE TABLE `beneficiary6` (
  `benef_id` int(11) NOT NULL,
  `benef_cust_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `beneficiary6`
--

INSERT INTO `beneficiary6` (`benef_id`, `benef_cust_id`, `email`, `phone_no`, `account_no`) VALUES
(1, 5, 'bbb@bbb.com', '0722222222', '3573457'),
(2, 7, 'fff@fff.com', '07200000003', 'ROCEC150000123423525');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `beneficiary7`
--

CREATE TABLE `beneficiary7` (
  `benef_id` int(11) NOT NULL,
  `benef_cust_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `beneficiary7`
--

INSERT INTO `beneficiary7` (`benef_id`, `benef_cust_id`, `email`, `phone_no`, `account_no`) VALUES
(1, 6, 'ccc@ccc.com', '0722222223', 'ROING1000');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `aadhar_no` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `branch` varchar(30) DEFAULT NULL,
  `account_no` varchar(200) DEFAULT NULL,
  `pin` int(4) DEFAULT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `customer`
--

INSERT INTO `customer` (`cust_id`, `first_name`, `last_name`, `gender`, `dob`, `aadhar_no`, `email`, `phone_no`, `address`, `branch`, `account_no`, `pin`, `uname`, `pwd`) VALUES
(4, 'Lucovid', 'Orban', 'female', '1997-08-06', '21474', 'aaa@aaa.com', '0732666666', 'Sector 6', 'ING', '2147483647', 1234, 'aaa', 'aaa'),
(5, 'Viorica', 'Dancila', 'female', '1997-08-06', '2147483647', 'bbb@bbb.com', '0722222222', 'Panselutei nr 7 Bucuresti', 'BRD', '3573457', 1234, 'bbb', 'bbb'),
(6, 'Ciprian', 'Tatarusanu', 'male', '1997-08-06', '24635734', 'ccc@ccc.com', '0722222223', 'Sector 6', 'ING', 'ROING1000', 1234, 'ccc', 'ccc'),
(7, 'Corina', 'Maria', 'others', '2000-08-05', '2200000000000', 'fff@fff.com', '07200000003', 'Bd. Expozitiei nr. 15 Bucuresti', 'CEC', 'ROCEC150000123423525', 1234, 'fff', 'fff');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `news`
--

INSERT INTO `news` (`id`, `title`, `created`) VALUES
(7, 'aaaafsa dgdsf bsdf bgsd bsdg bnsdf', '2020-05-24 19:38:32'),
(8, 'Notificare test 1', '2020-05-25 13:34:07'),
(9, 'Notificare test 2', '2020-05-25 13:35:49'),
(10, 'Notificare test 3', '2020-05-25 13:36:34');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `news_body`
--

CREATE TABLE `news_body` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `news_body`
--

INSERT INTO `news_body` (`id`, `body`) VALUES
(7, 'v sdfbvdf nfdg df dgfgbgf nmdfhn sfh ndfhmdf vbsdg dfnhd ndfn sfgnbgfb sf'),
(8, 'Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti '),
(9, 'Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti '),
(10, 'Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti Lorem ipsum shiti 3');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `passbook4`
--

CREATE TABLE `passbook4` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `passbook4`
--

INSERT INTO `passbook4` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2020-05-24 19:42:16', 'Deschidere cont', 0, 10000, 10000),
(2, '2020-05-24 22:50:02', 'Trimis către: Veronica, IBAN: 11223344', 100, 0, 9900),
(3, '2020-05-24 22:51:55', 'Bani de la', 100, 0, 9800),
(4, '2020-05-24 22:53:16', 'Depozit la bancomat', 0, 100, 9900),
(5, '2020-05-24 22:54:01', 'Retragere la bancomat', 1000, 0, 8900),
(6, '2020-05-25 12:44:12', 'Depozit la bancă', 0, 100, 9000),
(7, '2020-05-25 12:44:47', 'Retragere la bancă', 1200, 0, 7800),
(8, '2020-05-25 13:12:46', 'Depozit la bancomat', 0, 100, 7900);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `passbook5`
--

CREATE TABLE `passbook5` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `passbook5`
--

INSERT INTO `passbook5` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2020-05-24 23:34:49', 'Deschidere cont', 0, 15000, 15000),
(2, '2020-05-24 23:48:25', 'Primit de la: Ciprian Marica, IBAN: ROING1000', 0, 1200, 16200),
(3, '2020-05-25 13:17:00', 'Depozit la bancă', 0, 100, 16300),
(4, '2020-05-25 13:18:14', 'Retragere la bancă', 100, 0, 16200);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `passbook6`
--

CREATE TABLE `passbook6` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `passbook6`
--

INSERT INTO `passbook6` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2020-05-24 23:43:53', 'Deschidere cont', 0, 1000, 1000),
(2, '2020-05-24 23:47:38', 'Depozit la bancomat', 0, 10000, 11000),
(3, '2020-05-24 23:48:24', 'Trimis către: Viorica Dancila, IBAN: 3573457', 1200, 0, 9800),
(4, '2020-05-25 13:41:02', 'Primit de la: Corina Maria, IBAN: ROCEC150000123423525', 0, 120, 9920),
(5, '2020-05-25 13:42:48', 'Trimis către: Corina Maria, IBAN: ROCEC150000123423525', 2000, 0, 7920);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `passbook7`
--

CREATE TABLE `passbook7` (
  `trans_id` int(11) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `passbook7`
--

INSERT INTO `passbook7` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2020-05-25 13:32:38', 'Deschidere cont', 0, 1200, 1200),
(2, '2020-05-25 13:33:23', 'Depozit la bancă', 0, 150, 1350),
(3, '2020-05-25 13:33:29', 'Retragere la bancă', 50, 0, 1300),
(4, '2020-05-25 13:38:17', 'Depozit la bancomat', 0, 100, 1400),
(5, '2020-05-25 13:38:24', 'Retragere la bancomat', 100, 0, 1300),
(6, '2020-05-25 13:41:02', 'Trimis către: Ciprian Tatarusanu, IBAN: ROING1000', 120, 0, 1180),
(7, '2020-05-25 13:42:48', 'Primit de la: Ciprian Tatarusanu, IBAN: ROING1000', 0, 2000, 3180);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `beneficiary4`
--
ALTER TABLE `beneficiary4`
  ADD PRIMARY KEY (`benef_id`),
  ADD UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Indexuri pentru tabele `beneficiary5`
--
ALTER TABLE `beneficiary5`
  ADD PRIMARY KEY (`benef_id`),
  ADD UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Indexuri pentru tabele `beneficiary6`
--
ALTER TABLE `beneficiary6`
  ADD PRIMARY KEY (`benef_id`),
  ADD UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Indexuri pentru tabele `beneficiary7`
--
ALTER TABLE `beneficiary7`
  ADD PRIMARY KEY (`benef_id`),
  ADD UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- Indexuri pentru tabele `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `aadhar_no` (`aadhar_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `account_no` (`account_no`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexuri pentru tabele `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `news_body`
--
ALTER TABLE `news_body`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `passbook4`
--
ALTER TABLE `passbook4`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexuri pentru tabele `passbook5`
--
ALTER TABLE `passbook5`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexuri pentru tabele `passbook6`
--
ALTER TABLE `passbook6`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexuri pentru tabele `passbook7`
--
ALTER TABLE `passbook7`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `beneficiary4`
--
ALTER TABLE `beneficiary4`
  MODIFY `benef_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `beneficiary5`
--
ALTER TABLE `beneficiary5`
  MODIFY `benef_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `beneficiary6`
--
ALTER TABLE `beneficiary6`
  MODIFY `benef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `beneficiary7`
--
ALTER TABLE `beneficiary7`
  MODIFY `benef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `news_body`
--
ALTER TABLE `news_body`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `passbook4`
--
ALTER TABLE `passbook4`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `passbook5`
--
ALTER TABLE `passbook5`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `passbook6`
--
ALTER TABLE `passbook6`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `passbook7`
--
ALTER TABLE `passbook7`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
