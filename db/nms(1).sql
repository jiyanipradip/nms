-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2014 at 03:02 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorymaster`
--

CREATE TABLE IF NOT EXISTS `categorymaster` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(155) NOT NULL,
  `categorytype` varchar(155) NOT NULL,
  `crdate` date NOT NULL DEFAULT '0000-00-00',
  `crtime` time NOT NULL DEFAULT '00:00:00',
  `userlog` varchar(10) NOT NULL DEFAULT '',
  `ipadd` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categorymaster`
--

INSERT INTO `categorymaster` (`id`, `categoryname`, `categorytype`, `crdate`, `crtime`, `userlog`, `ipadd`) VALUES
(3, 'incoming source', 'school', '2014-12-19', '16:03:27', 'incoming s', '::1'),
(2, 'incoming source', 'Volantar', '2014-12-19', '17:05:48', 'incoming s', '::1'),
(6, 'incoming source', 'walking', '2014-12-19', '16:03:19', 'incoming s', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `incomingsourcemaster`
--

CREATE TABLE IF NOT EXISTS `incomingsourcemaster` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` int(10) NOT NULL,
  `codetype` varchar(155) NOT NULL,
  `name` varchar(155) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(155) NOT NULL,
  `state` varchar(155) NOT NULL,
  `zip` varchar(155) NOT NULL,
  `phone` varchar(155) NOT NULL,
  `mobile` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `crdate` date NOT NULL DEFAULT '0000-00-00',
  `crtime` time NOT NULL DEFAULT '00:00:00',
  `userlog` varchar(10) NOT NULL,
  `ipadd` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `incomingsourcemaster`
--

INSERT INTO `incomingsourcemaster` (`id`, `code`, `codetype`, `name`, `address`, `city`, `state`, `zip`, `phone`, `mobile`, `email`, `crdate`, `crtime`, `userlog`, `ipadd`) VALUES
(1, 101, '1', 'NAVI KATRODI PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:56:17', 'pj1', '::1'),
(17, 117, '2', 'ABAY', '', '', '', '', '', '', '', '2014-12-23', '15:01:00', 'pj1', '::1'),
(3, 103, '1', 'SHREE VIRDI PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:57:12', 'pj1', '::1'),
(4, 104, '1', 'SHREE THAVI PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:57:22', 'pj1', '::1'),
(5, 105, '1', 'SHRIJI NAGAR PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:57:31', 'pj1', '::1'),
(6, 106, '1', 'SHREE RABARIKA PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:57:41', 'pj1', '::1'),
(7, 107, '1', 'SHREE PEEPARDI PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:58:39', 'pj1', '::1'),
(8, 108, '1', 'ZADAKLA PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:58:49', 'pj1', '::1'),
(9, 109, '1', 'SHREE KEDARIYA PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:58:59', 'pj1', '::1'),
(10, 110, '1', 'GHOBA PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:59:08', 'pj1', '::1'),
(11, 111, '1', 'KATRODI PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:59:22', 'pj1', '::1'),
(12, 112, '1', 'NAAL PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:59:30', 'pj1', '::1'),
(13, 113, '1', 'SHREE PATI PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:59:40', 'pj1', '::1'),
(14, 114, '1', 'FIFAD PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '21:59:51', 'pj1', '::1'),
(15, 115, '1', 'MOTHA BHAMODRA PRIMARY SCHOOL', '', '', '', '', '', '', '', '2014-12-22', '22:00:00', 'pj1', '::1'),
(16, 116, '2', 'TEST', '', '', '', '', '', '', '', '2014-12-22', '22:05:21', 'pj1', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `paramgroup`
--

CREATE TABLE IF NOT EXISTS `paramgroup` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(155) NOT NULL,
  `crdate` date NOT NULL DEFAULT '0000-00-00',
  `crtime` time NOT NULL DEFAULT '00:00:00',
  `userlog` varchar(155) NOT NULL,
  `ipadd` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `paramgroup`
--

INSERT INTO `paramgroup` (`id`, `name`, `crdate`, `crtime`, `userlog`, `ipadd`) VALUES
(1, 'INCOMING SOURCE', '2014-12-22', '21:21:32', 'pj1', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `paramtype`
--

CREATE TABLE IF NOT EXISTS `paramtype` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `groupid` int(10) NOT NULL COMMENT 'refer to id from paramgroup',
  `name` varchar(155) NOT NULL,
  `crdate` date NOT NULL DEFAULT '0000-00-00',
  `crtime` time NOT NULL DEFAULT '00:00:00',
  `userlog` varchar(155) NOT NULL,
  `ipadd` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `paramtype`
--

INSERT INTO `paramtype` (`id`, `groupid`, `name`, `crdate`, `crtime`, `userlog`, `ipadd`) VALUES
(1, 1, 'SCHOOL', '2014-12-22', '21:01:08', 'pj1', '::1'),
(2, 1, 'WALKIN', '2014-12-22', '21:01:23', 'pj1', '::1'),
(3, 1, 'VOLENTEER', '2014-12-22', '21:01:30', 'pj1', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `patientmaster`
--

CREATE TABLE IF NOT EXISTS `patientmaster` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `incomingsouceid` int(10) NOT NULL,
  `fname` varchar(155) NOT NULL,
  `lname` varchar(155) NOT NULL,
  `mname` varchar(155) NOT NULL,
  `dob` varchar(155) NOT NULL,
  `gender` varchar(155) NOT NULL,
  `studentflag` int(11) NOT NULL DEFAULT '0',
  `standard` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(155) NOT NULL,
  `state` varchar(155) NOT NULL,
  `zip` varchar(155) NOT NULL,
  `phone` varchar(155) NOT NULL,
  `mobile` varchar(155) NOT NULL,
  `emailid` varchar(155) NOT NULL,
  `crdate` date NOT NULL DEFAULT '0000-00-00',
  `crtime` time NOT NULL DEFAULT '00:00:00',
  `userlog` varchar(10) NOT NULL,
  `ipadd` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE IF NOT EXISTS `userlogin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `phoneNo` varchar(255) NOT NULL,
  `userType` int(1) NOT NULL DEFAULT '0' COMMENT '0 for admin, 1 for user',
  `crdate` date NOT NULL DEFAULT '0000-00-00',
  `crtime` time NOT NULL DEFAULT '00:00:00',
  `userlog` varchar(10) NOT NULL,
  `ipadd` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `username`, `password`, `emailid`, `phoneNo`, `userType`, `crdate`, `crtime`, `userlog`, `ipadd`) VALUES
(1, 'pradip', 'pradip', 'pradip.dentaweb@gmail.com', '', 0, '2014-12-22', '20:57:05', 'pj1', '::1'),
(2, 'samir', 'samir', 'samir.dentaweb@gmail.com', '', 0, '2014-12-22', '20:57:57', 'pj1', '::1'),
(3, 'pj', 'pj', 'jiyanipradip@gmail.com', '', 0, '2014-12-22', '20:58:24', 'pj1', '::1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
