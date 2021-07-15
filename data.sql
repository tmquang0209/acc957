-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 09:20 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopnick`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `text` int(11) NOT NULL,
  `before` int(11) NOT NULL,
  `after` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `muanick`
--

CREATE TABLE `muanick` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `id_acc` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `muanick`
--

INSERT INTO `muanick` (`id`, `username`, `id_acc`, `cash`, `date`) VALUES
(1, 'admin', 22, 1000, '1000000000'),
(2, 'tmquang', 23, 1000, '1626250410');

-- --------------------------------------------------------

--
-- Table structure for table `napthe`
--

CREATE TABLE `napthe` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `serial` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `telco` text NOT NULL,
  `status` text NOT NULL,
  `tran_id` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nick`
--

CREATE TABLE `nick` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `account` text NOT NULL,
  `password` text NOT NULL,
  `cash` int(11) NOT NULL,
  `loainick` int(11) NOT NULL,
  `info1` text NOT NULL,
  `info2` text NOT NULL,
  `info3` text NOT NULL,
  `info4` text NOT NULL,
  `info5` text NOT NULL,
  `info6` text NOT NULL,
  `status` int(11) NOT NULL,
  `noibat` text NOT NULL,
  `image` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nick`
--

INSERT INTO `nick` (`id`, `user`, `account`, `password`, `cash`, `loainick`, `info1`, `info2`, `info3`, `info4`, `info5`, `info6`, `status`, `noibat`, `image`, `date`) VALUES
(17, 'admin', 'taikhoan', 'matkhau', 1000, 4, '100', '10', '9', '8', '8', 'tinhanh_v', 0, 'noi bat11', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '12:07:58 12-07-2021'),
(18, 'admin', 'taikhoan', 'matkhau', 1000, 4, '5', '0', '0', '0', '0', 'thachdau', 0, 'noi bat', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:05 12-07-2021'),
(19, 'admin', 'taikhoan', 'matkhau', 1000, 4, '5', '0', '0', '0', '0', 'thachdau', 0, 'noi bat', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:07 12-07-2021'),
(20, 'admin', 'taikhoan', 'matkhau', 1000, 4, '0', '0', '0', '0', '0', 'thachdau', 0, 'noi bat', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:08 12-07-2021'),
(21, 'admin', 'taikhoan', 'matkhau', 1000, 4, '0', '0', '0', '0', '0', 'thachdau', 0, 'noi bat', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:09 12-07-2021'),
(22, 'admin', 'admin', 'matkhau', 1000, 0, '8', 'XD', 'That', 'win', '', '', 0, 'noi bat so sinh', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:34 12-07-2021'),
(23, 'admin', 'admin', 'matkhau', 1000, 0, '8', 'TD', 'That', 'win', '', '', 1, 'noi bat so sinh', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:36 12-07-2021'),
(24, 'admin', 'admin', 'matkhau', 1000, 0, '8', 'NM', 'That', 'win', '', '', 0, 'noi bat so sinh', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:37 12-07-2021'),
(25, 'admin', 'admin', 'matkhau', 1000, 0, '8', 'NM', 'That', 'win', '', '', 0, 'noi bat so sinh', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:37 12-07-2021'),
(26, 'admin', 'admin', 'matkhau', 1000, 0, '8', 'NM', 'That', 'win', '', '', 0, 'noi bat so sinh', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:38 12-07-2021'),
(27, 'admin', 'admin', 'matkhau', 1000, 0, '8', 'NM', 'That', 'win', '', '', 0, 'noi bat so sinh', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:38 12-07-2021'),
(28, 'admin', 'admin', 'matkhau', 1000, 0, '8', 'NM', 'That', 'win', '', '', 0, 'noi bat so sinh', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:39 12-07-2021'),
(29, 'admin', 'admin', 'matkhau', 1000, 0, '8', 'NM', 'That', 'win', '', '', 0, 'noi bat so sinh', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:39 12-07-2021'),
(30, 'admin', 'admin', 'matkhau', 1000, 0, '8', 'NM', 'That', 'win', '', '', 0, 'noi bat so sinh', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:39 12-07-2021'),
(31, 'admin', 'admin', 'matkhau', 1000, 0, '8', 'NM', 'That', 'win', '', '', 0, 'noi bat so sinh', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:23:40 12-07-2021'),
(32, 'admin', 'tmquang', 'matkhau', 1000, 1, 'nuocngoai', 'NM', 'That', 'Khong', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:47:15 12-07-2021'),
(33, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:12 12-07-2021'),
(34, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:12 12-07-2021'),
(35, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:12 12-07-2021'),
(36, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:13 12-07-2021'),
(37, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:13 12-07-2021'),
(38, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:13 12-07-2021'),
(39, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:13 12-07-2021'),
(40, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:14 12-07-2021'),
(41, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:14 12-07-2021'),
(42, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:15 12-07-2021'),
(43, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:16 12-07-2021'),
(44, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:16 12-07-2021'),
(45, 'admin', 'tmquang', 'matkhau', 1000, 1, '1', 'TD', 'Ao', 'Co', '', '', 0, 'noi bat tam trung', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:16 12-07-2021'),
(46, 'admin', '', '', 1000, 2, '8', 'NM', 'That', 'setdo', 'ki', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:54:26 12-07-2021'),
(47, 'admin', '', '', 1000, 2, '1', 'TD', 'Ao', 'quan', 'sucdanh', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:47 12-07-2021'),
(48, 'admin', '', '', 1000, 2, '1', 'TD', 'Ao', 'quan', 'sucdanh', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:47 12-07-2021'),
(49, 'admin', '', '', 1000, 2, '1', 'TD', 'Ao', 'quan', 'sucdanh', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:48 12-07-2021'),
(50, 'admin', '', '', 1000, 2, '1', 'TD', 'Ao', 'quan', 'sucdanh', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:49 12-07-2021'),
(51, 'admin', '', '', 1000, 2, '1', 'TD', 'Ao', 'quan', 'sucdanh', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:49 12-07-2021'),
(52, 'admin', '', '', 1000, 2, '1', 'TD', 'Ao', 'quan', 'sucdanh', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:50 12-07-2021'),
(53, 'admin', '', '', 1000, 2, '1', 'TD', 'Ao', 'quan', 'sucdanh', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:50 12-07-2021'),
(54, 'admin', '', '', 1000, 2, '1', 'TD', 'Ao', 'quan', 'sucdanh', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:51 12-07-2021'),
(55, 'admin', '', '', 1000, 2, '1', 'TD', 'Ao', 'quan', 'sucdanh', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:51 12-07-2021'),
(56, 'admin', '', '', 1000, 2, '1', 'TD', 'Ao', 'quan', 'sucdanh', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:52 12-07-2021'),
(57, 'admin', '', '', 1000, 2, '1', 'TD', 'Ao', 'quan', 'sucdanh', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:24:53 12-07-2021'),
(58, 'admin', 'tmquang1', 'matkhau1', 1000, 3, '2', '1', '1', '', '', '', 0, 'noi bat freefire1', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '12:11:05 12-07-2021'),
(59, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:28 12-07-2021'),
(60, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:29 12-07-2021'),
(61, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:29 12-07-2021'),
(62, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:30 12-07-2021'),
(63, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:30 12-07-2021'),
(64, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:30 12-07-2021'),
(65, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:31 12-07-2021'),
(66, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:31 12-07-2021'),
(67, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:31 12-07-2021'),
(70, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:32 12-07-2021'),
(71, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:32 12-07-2021'),
(72, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:33 12-07-2021'),
(73, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:33 12-07-2021'),
(74, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:33 12-07-2021'),
(75, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:34 12-07-2021'),
(76, 'admin', 'tmquang', 'matkhau', 1000, 3, '2', '2', '2', '', '', '', 0, 'noi bat freefire', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:25:35 12-07-2021'),
(77, 'admin', '', '', 1000, 0, '8', 'NM', 'That', 'setdo', 'ki', '', 0, '', 'http://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg\r\nhttp://localhost/admin/img/undraw_profile.svg', '11:53:41 12-07-2021');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `account` text NOT NULL,
  `password` text NOT NULL,
  `amount` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `server` int(11) NOT NULL,
  `type` text NOT NULL,
  `status` text NOT NULL,
  `note` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `username`, `account`, `password`, `amount`, `cash`, `server`, `type`, `status`, `note`, `date`) VALUES
(1, 'admin', 'taikhoan', 'matkhau', 450000000, 0, 1, 'banngoc', '2', '123', '1626329793'),
(2, 'admin', 'taikhoan', 'pasword', 20, 10000, 2, 'banngoc', '1', 'TESST ADMIN', '1626329793'),
(3, 'admin', 'taikhoan', 'pasword', 20, 10000, 2, 'banngoc', '0', '', '1626329820'),
(4, 'admin', 'taikhoan', 'pasword', 20, 10000, 2, 'banngoc', '0', '', '1626329864'),
(5, 'admin', 'taikhoan', 'pasword', 20, 10000, 2, 'banngoc', '0', '', '1626329895'),
(6, 'admin', 'taikhoan', 'pasword', 20, 10000, 2, 'banngoc', '0', '', '1626329990'),
(7, 'admin', 'taikhoan', 'pasword', 20, 10000, 2, 'banngoc', '0', '', '1626329996'),
(8, 'admin', 'taikhoannn', 'matkhauuu', 100, 100000, 1, 'banngoc', '0', '', '1626331443'),
(9, 'admin', 'taikhoan', 'matkhauuuu', 300000000, 100000, 3, 'banvang', '0', '', '1626332035'),
(10, 'admin', 'taikhoan', 'matkhauuuu', 300000000, 100000, 3, 'banvang', '0', '', '1626332065');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `key` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key`, `text`) VALUES
(1, 'title', 'Trần Minh Quang'),
(2, 'facebook', 'https://www.facebook.com/tmq.dz.pro'),
(3, 'youtube', 'https://www.facebook.com/tmq.dz.pro'),
(4, 'phone', '0585589918'),
(5, 'email', 'tmquang0209@gmail.com'),
(6, 'maintenance', 'on'),
(7, 'notification', 'test'),
(8, 'logo', 'http://localhost/admin/img/undraw_profile.svg'),
(9, 'noti_sosinh', 'test thong bao so sinh'),
(10, 'noti_tamtrung', 'test thong bao tam trung'),
(11, 'noti_vatpham', 'testtt'),
(12, 'noti_freefire', '123'),
(13, 'noti_lienquan', 'tessttt'),
(14, 'api_napthe', '{\"service\":\"TheSieuRe\",\"id\":\"id\",\"secret\":\"key\"}'),
(16, 'gold_server_1', '1000'),
(17, 'gold_server_2', '2000'),
(18, 'gold_server_3', '3000'),
(19, 'gold_server_4', '4000'),
(20, 'gold_server_5', '5000'),
(21, 'gold_server_6', '6000'),
(22, 'gold_server_7', '7000'),
(23, 'gold_server_8', '8000'),
(24, 'gold_server_9', '9000'),
(25, 'gem_server_1', '0.001'),
(26, 'gem_server_2', '0.002'),
(27, 'gem_server_3', '0.003'),
(28, 'gem_server_4', '0.004'),
(29, 'gem_server_5', '0.005'),
(30, 'gem_server_6', '0.006'),
(31, 'gem_server_7', '0.007'),
(32, 'gem_server_8', '0.008'),
(33, 'gem_server_9', '0.009'),
(34, 'gem_cash_min', '50000'),
(35, 'gold_cash_min', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `phone` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `ban` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone`, `cash`, `admin`, `ban`, `date`) VALUES
(1, 'admin', '14e1b600b1fd579f47433b88e8d85291', '', 397847805, 680000, 9, 0, '11'),
(2, 'tmquang', '14e1b600b1fd579f47433b88e8d85291', '', 397847805, 4999000, 0, 0, '14-07-2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muanick`
--
ALTER TABLE `muanick`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `napthe`
--
ALTER TABLE `napthe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nick`
--
ALTER TABLE `nick`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `muanick`
--
ALTER TABLE `muanick`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `napthe`
--
ALTER TABLE `napthe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nick`
--
ALTER TABLE `nick`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
