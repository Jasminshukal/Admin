-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2018 at 08:06 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `beachcombers_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '2018-03-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_details`
--

CREATE TABLE IF NOT EXISTS `tbl_company_details` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` text NOT NULL,
  `header_color` varchar(10) NOT NULL,
  `title` text NOT NULL,
  `email` text NOT NULL,
  `usa_epay_id` text NOT NULL,
  `page_url` text NOT NULL,
  `created_dt` datetime NOT NULL,
  `modify_dt` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_company_details`
--

INSERT INTO `tbl_company_details` (`company_id`, `company_name`, `header_color`, `title`, `email`, `usa_epay_id`, `page_url`, `created_dt`, `modify_dt`, `status`) VALUES
(4, 'XYZ2 PVT. LTD.', '#ffff00', 'XYZ', 'xyz@gmail.com', '1234567890', 'XYZ2PVTLTD', '2018-08-21 08:37:57', '2018-08-22 08:05:14', 0),
(5, 'XYZ PVT. LTD.', '#00ffff', 'XYZ', 'xyz@gmail.com', '1234567890', 'XYZPVTLTD', '2018-08-22 07:49:28', '2018-08-22 07:49:28', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
