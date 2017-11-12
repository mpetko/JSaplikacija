-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2017 at 04:43 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geb_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `ime` varchar(25) NOT NULL,
  `prezime` varchar(25) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`user_id`, `user_name`, `user_password`, `user_email`, `ime`, `prezime`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin@mail.com', 'Mario', 'Petkovic');

-- --------------------------------------------------------

--
-- Table structure for table `upitnik`
--

DROP TABLE IF EXISTS `upitnik`;
CREATE TABLE IF NOT EXISTS `upitnik` (
  `id_upitnik` int(11) NOT NULL AUTO_INCREMENT,
  `imekorisnika` varchar(60) NOT NULL,
  `prezimekorisnika` varchar(60) NOT NULL,
  `spol` varchar(20) NOT NULL,
  `grad` varchar(30) NOT NULL,
  `vozilo` varchar(30) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id_upitnik`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upitnik`
--

INSERT INTO `upitnik` (`id_upitnik`, `imekorisnika`, `prezimekorisnika`, `spol`, `grad`, `vozilo`, `komentar`) VALUES
(1, 's', 's', 'zena', 'Rijeka', 'bicikl', 'sss'),
(72, 'pro', 'peric', 'muskarac', 'Rijeka', 'bicikl', 'xc'),
(73, 'Leo', 'Skibola-Radivojevic', 'muskarac', 'Rijeka', 'auto', 'aaa'),
(74, 'sss', 'sss', 'zena', 'Rijeka', 'bicikl', 'ssss'),
(75, 'aa', 'aa', 'muskarac', 'Rijeka', 'auto', 'aa'),
(76, 'dap', 'dap', 'muskarac', 'Rijeka', 'auto', 'dada'),
(77, 'xc', 'xc', 'zena', 'Rijeka', 'bicikl', 'xcxcx'),
(78, 'yxyxy', 'yxyxy', 'zena', 'Rijeka', 'auto', 'xyxy'),
(79, 'vvv', 'vvv', 'muskarac', 'Rijeka', 'auto', 'vvv'),
(87, 'ss', 'ss', 'muskarac', 'Osijek', 'auto', 'ss'),
(88, 'maamm', 'mamamam', 'zena', 'Rijeka', 'auto', 'ss'),
(89, 'aa', 'aaa', 'zena', 'Rijeka', 'auto', 'sss'),
(90, 'a', 'a', 'zena', 'Rijeka', 'bicikl', 'aaa'),
(91, 'veve', 'veve', 'muskarac', 'Osijek', 'bicikl', 'veve'),
(92, 'daro', 'daric', 'muskarac', 'Osijek', 'bicikl', 'a'),
(93, 'nikola', 'kos', 'muskarac', 'Split', 'bicikl', 'a'),
(94, 'da', 'da', 'zena', 'Osijek', 'bicikl', 'da'),
(95, 'ca', 'ca', 'zena', 'Osijek', 'auto', 'ca'),
(96, 'a', 'a', 'zena', 'Osijek', 'bicikl', 'a'),
(97, 'a', 'a', 'zena', 'Rijeka', 'auto', 'a'),
(98, 'a', 'vvv', 'zena', 'Rijeka', 'bicikl', 'v'),
(99, 'da', 'da', 'muskarac', 'Osijek', 'auto', 'da'),
(100, 'da', 'da', '', 'Split', 'bicikl', 'dada'),
(101, 'vv', 'vv', 'muskarac', 'Osijek', 'auto', 'vvv'),
(102, 'Mario', 'Petkovic', 'muskarac', 'Rijeka', 'bicikl', ''),
(103, 'M', 'Petkovic', 'muskarac', 'Rijeka', 'bicikl', 'Nemam komentar'),
(104, 'Mario', 'Petkovic', 'muskarac', 'Rijeka', 'bicikl', 'Nemam komentar'),
(105, 'Mario', 'Petkovic', 'muskarac', 'Rijeka', 'bicikl', 'Nemam komentar'),
(106, 'Mari', 'Petkovic', 'muskarac', 'Rijeka', 'bicikl', 'Nemam komentar'),
(107, 'Mari', 'Petkovic', 'muskarac', 'Rijeka', 'bicikl', 'Nemam komentar'),
(108, 'Ma', 'Petkovic', 'muskarac', 'Rijeka', 'bicikl', 'Nemam komentar'),
(109, 'M', 'Petkovic', 'muskarac', 'Rijeka', 'bicikl', 'Nemam komentar');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
