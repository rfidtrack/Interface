-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2015 at 03:58 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `lt_map`
--

CREATE TABLE IF NOT EXISTS `lt_map` (
`id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `width_px` int(11) NOT NULL,
  `height_px` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_map`
--

INSERT INTO `lt_map` (`id`, `name`, `width_px`, `height_px`) VALUES
(10, 'Sample Map 1', 700, 450);

-- --------------------------------------------------------

--
-- Table structure for table `lt_position`
--

CREATE TABLE IF NOT EXISTS `lt_position` (
`id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `xpos` int(11) NOT NULL,
  `ypos` int(11) NOT NULL,
  `map_id` int(11) NOT NULL,
  `reported` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_reader`
--

CREATE TABLE IF NOT EXISTS `lt_reader` (
`id` int(11) NOT NULL,
  `map_id` int(11) NOT NULL,
  `addr` char(6) NOT NULL,
  `name` tinytext NOT NULL,
  `xpos` int(11) NOT NULL,
  `ypos` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_reader`
--

INSERT INTO `lt_reader` (`id`, `map_id`, `addr`, `name`, `xpos`, `ypos`) VALUES
(1, 10, '', 'Starter Value', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lt_tag`
--

CREATE TABLE IF NOT EXISTS `lt_tag` (
`id` int(11) NOT NULL,
  `addr` char(6) NOT NULL,
  `name` tinytext NOT NULL,
  `role` varchar(70) NOT NULL,
  `colour` char(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lt_user`
--

CREATE TABLE IF NOT EXISTS `lt_user` (
`id` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `password` char(32) NOT NULL,
  `name` tinytext NOT NULL,
  `registered` datetime NOT NULL,
  `lastlogin` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lt_user`
--

INSERT INTO `lt_user` (`id`, `email`, `password`, `name`, `registered`, `lastlogin`) VALUES
(1, 'demo@ns-tech.co.uk', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Demo User', '2010-01-03 16:44:58', '2010-02-06 17:42:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lt_map`
--
ALTER TABLE `lt_map`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lt_position`
--
ALTER TABLE `lt_position`
 ADD PRIMARY KEY (`id`), ADD KEY `tag_id` (`tag_id`), ADD KEY `map_id` (`map_id`);

--
-- Indexes for table `lt_reader`
--
ALTER TABLE `lt_reader`
 ADD PRIMARY KEY (`id`), ADD KEY `alias` (`addr`), ADD KEY `map_id` (`map_id`);

--
-- Indexes for table `lt_tag`
--
ALTER TABLE `lt_tag`
 ADD PRIMARY KEY (`id`), ADD KEY `alias` (`addr`);

--
-- Indexes for table `lt_user`
--
ALTER TABLE `lt_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lt_map`
--
ALTER TABLE `lt_map`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `lt_position`
--
ALTER TABLE `lt_position`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `lt_reader`
--
ALTER TABLE `lt_reader`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `lt_tag`
--
ALTER TABLE `lt_tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lt_user`
--
ALTER TABLE `lt_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lt_position`
--
ALTER TABLE `lt_position`
ADD CONSTRAINT `lt_position_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `lt_tag` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `lt_position_ibfk_2` FOREIGN KEY (`map_id`) REFERENCES `lt_map` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lt_reader`
--
ALTER TABLE `lt_reader`
ADD CONSTRAINT `lt_reader_ibfk_1` FOREIGN KEY (`map_id`) REFERENCES `lt_map` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
