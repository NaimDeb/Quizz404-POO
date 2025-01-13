-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2025 at 03:11 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizz404`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) NOT NULL,
  `id_question` int NOT NULL,
  `is_correct` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `intitule`, `id_question`, `is_correct`) VALUES
(1, 'Vrai', 1, 1),
(2, 'Faux', 1, 0),
(3, 'Vrai', 2, 1),
(4, 'Faux', 2, 0),
(5, 'Oui', 3, 1),
(6, 'Oui', 3, 1),
(7, 'Peter fait attention a toi ', 4, 0),
(8, 'Peter a tu preparé mon donuts ?', 4, 0),
(9, 'Un grand pouvoir implique de grande responsabilité ', 4, 1),
(10, 'Peter un grand pouvoir 1plike140', 4, 0),
(11, 'Les golmons ', 5, 0),
(12, 'Oh les baltrou', 5, 0),
(13, 'Les moldu', 5, 1),
(14, 'OUI', 6, 0),
(15, 'NON', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_quiz` int NOT NULL,
  `question` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `id_quiz`, `question`, `img`) VALUES
(1, 1, 'Naim et karl sont-il entrain de galèrer ?', ''),
(2, 1, 'Est ce que php terrifie Naim et Karl ?', ''),
(3, 1, 'A ton fais le meilleure projet ?', ''),
(4, 2, 'Dans spiderman 1 Oncle Ben dis a Peter ?', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQCfz7FAATV64YPTNYN0SNyK6E-xOf5fDwGg&s'),
(5, 2, 'Dans harry potter comment appelle t-on \r\nles humains sans magie', 'https://media-mcetv.ouest-france.fr/wp-content/uploads/2021/11/harry-potter-top-10-des-moldus-les-plus-courageux-dans-la-saga.jpg'),
(6, 1, 'Cette photo est elle un photo montage ?', 'https://i.ibb.co/gjBMWcQ/Nouveau-projet-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `titre`, `img`) VALUES
(1, 'Pour le quizz404', 'https://i.ibb.co/1fZj8KZ/Th-me.png'),
(2, 'Film et Serie', 'https://i.ibb.co/sPr3d0y/Nouveau-projet-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id` int NOT NULL AUTO_INCREMENT,
  `score` int NOT NULL,
  `id_user` int NOT NULL,
  `id_quiz` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pseudo`) VALUES
(1, 'qsdqdqd'),
(2, 'Karl'),
(3, 'NaimLeGameur'),
(4, 'jesuisfou'),
(5, 'Ali'),
(6, 'ENfoirejsuistoujourspresent'),
(7, '&lt;script&gt; console.log(&quot;baiser vous&quot;'),
(8, 'Alibaba'),
(9, 'JEBALTROU'),
(10, 'SimonGaming404'),
(11, 'Karltest');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
