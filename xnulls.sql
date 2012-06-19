-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2011 at 07:15 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `krestnol`
--

-- --------------------------------------------------------

--
-- Table structure for table `situation`
--

CREATE TABLE IF NOT EXISTS `situation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xtable` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `mode` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `enemy` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=265 ;

--
-- Dumping data for table `situation`
--

INSERT INTO `situation` (`id`, `user`, `xtable`, `mode`, `enemy`) VALUES
(264, 'dasa', '101101010', 'a', 'dasda'),
(263, 'dasda', '010010101', 'a', 'dasa'),
(262, 'asho', '011110001', 'a', 'novey'),
(261, 'novey', '100001110', 'a', 'asho');
