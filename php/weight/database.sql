-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2015 at 05:42 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `opendata`
--

-- --------------------------------------------------------

--
-- Table structure for table `myweight`
--

CREATE TABLE IF NOT EXISTS `myweight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `low` float(5,2) NOT NULL,
  `high` float(5,2) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `myweight`
--

INSERT INTO `myweight` (`id`, `low`, `high`, `date`, `comment`) VALUES
(1, 81.20, 82.30, '2011-01-01', 'Jan 1 11'),
(2, 61.30, 62.20, '2012-01-01', 'jan 1 12'),
(3, 71.30, 72.40, '2013-01-01', 'jan 1 13'),
(4, 91.80, 92.80, '2014-01-01', 'Jan 1 14'),
(5, 81.90, 82.40, '2015-01-01', 'jan 1 15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
