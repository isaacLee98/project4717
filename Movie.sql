-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2021 at 01:08 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f32ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `Movie`
--

CREATE TABLE IF NOT EXISTS `Movie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Image_path` varchar(100) NOT NULL,
  `Length` int(11) NOT NULL,
  `Language` varchar(30) NOT NULL,
  `Casting` varchar(200) NOT NULL,
  `Rating` char(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Movie`
--

INSERT INTO `Movie` (`ID`, `Name`, `Image_path`, `Length`, `Language`, `Casting`, `Rating`) VALUES
(1, 'Iron Man 3', 'movie_img\\Iron_Man_3_poster.jpg', 131, 'English', '	\r\nRobert Downey Jr.\r\nGwyneth Paltrow\r\nDon Cheadle\r\nGuy Pearce\r\nRebecca Hall\r\nStéphanie Szostak\r\nJames Badge Dale\r\nJon Favreau\r\nBen Kingsley', 'U'),
(2, 'Captain America: Civil War', 'movie_img\\Captain_America_Civil_War_poster.jpg', 147, 'English', '	\r\nChris Evans\r\nRobert Downey Jr.\r\nScarlett Johansson\r\nSebastian Stan\r\nAnthony Mackie\r\nDon Cheadle\r\nJeremy Renner', 'U'),
(3, 'Ant-Man', 'movie_img\\Ant-Man_poster.jpg', 117, 'English', 'Paul Rudd\r\nEvangeline Lilly\r\nCorey Stoll\r\nBobby Cannavale\r\nMichael Peña\r\nTip "T.I." Harris\r\nAnthony Mackie\r\nWood Harris', 'PG13'),
(4, 'Spider-Man: Homecoming', 'movie_img\\Captain_America_Civil_War_poster.jpg', 133, 'English', '	\r\nTom Holland\r\nMichael Keaton\r\nJon Favreau\r\nGwyneth Paltrow\r\nZendaya\r\nDonald Glover\r\nJacob Batalon', 'U'),
(5, 'Black Panther', 'movie_img\\Black_Panther_poster.jpg', 134, 'English', '	\r\nChadwick Boseman\r\nMichael B. Jordan\r\nLupita Nyong''o\r\nDanai Gurira\r\nMartin Freeman\r\nDaniel Kaluuya\r\nLetitia Wright', 'PG13'),
(6, 'Doctor Strange', 'movie_img\\Doctor_Strange_poster.jpg', 115, 'English', '	\r\nBenedict Cumberbatch\r\nChiwetel Ejiofor\r\nRachel McAdams\r\nBenedict Wong\r\nMichael Stuhlbarg\r\nBenjamin Bratt', 'U'),
(7, 'Avengers: Infinity War', 'movie_img\\Avengers_Infinity_War_poster.jpg', 149, 'English', '	\r\nRobert Downey Jr.\r\nChris Hemsworth\r\nMark Ruffalo\r\nChris Evans\r\nScarlett Johansson\r\nBenedict Cumberbatch\r\nDon Cheadle', 'U'),
(8, 'Shang-Chi and the Legend of the Ten Rings', 'movie_img\\Shang-Chi_and_the_Legend_of_the_Ten_Rings_poster.jpeg', 132, 'English', '	\r\nSimu Liu\r\nAwkwafina\r\nMeng''er Zhang\r\nFala Chen\r\nFlorian Munteanu\r\nBenedict Wong', 'U'),
(9, 'Black Widow', 'movie_img\\Black_Widow_poster.jpg', 134, 'English', '	\r\nScarlett Johansson\r\nFlorence Pugh\r\nDavid Harbour\r\nO-T Fagbenle\r\nOlga Kurylenko\r\nWilliam Hurt', 'U'),
(10, 'Captain America: The Winter Soldier', 'movie_img\\Captain_America_The_Winter_Soldier_poster.jpg', 136, 'English', '	\r\nChris Evans\r\nScarlett Johansson\r\nSebastian Stan\r\nAnthony Mackie\r\nCobie Smulders\r\nFrank Grillo', 'PG13'),
(11, 'Avengers: Endgame', 'movie_img\\Avengers_Endgame_poster.jpg', 181, 'English', '	\r\nRobert Downey Jr.\r\nChris Evans\r\nMark Ruffalo\r\nChris Hemsworth\r\nScarlett Johansson\r\nJeremy Renner\r\nDon Cheadle', 'PG13'),
(12, 'Captain Marvel', 'movie_img\\Captain_Marvel_poster.jpg', 124, 'English', '	\r\nBrie Larson\r\nSamuel L. Jackson\r\nBen Mendelsohn\r\nDjimon Hounsou\r\nLee Pace\r\nLashana Lynch', 'U');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
