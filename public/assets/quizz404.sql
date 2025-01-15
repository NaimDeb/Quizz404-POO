-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 15 jan. 2025 à 15:55
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quizz404`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
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
-- Déchargement des données de la table `answer`
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
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_quiz` int NOT NULL,
  `question` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `explication` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `id_quiz`, `question`, `img`, `explication`) VALUES
(1, 1, 'Naim et karl sont-il entrain de galèrer ?', '', 'ils m\'ont meme pas rajouté a la question '),
(2, 1, 'Est ce que php terrifie Naim et Karl ?', '', NULL),
(3, 1, 'A ton fais le meilleure projet ?', '', NULL),
(4, 2, 'Dans spiderman 1 Oncle Ben dis a Peter ?', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQCfz7FAATV64YPTNYN0SNyK6E-xOf5fDwGg&s', NULL),
(5, 2, 'Dans harry potter comment appelle t-on \r\nles humains sans magie', 'https://media-mcetv.ouest-france.fr/wp-content/uploads/2021/11/harry-potter-top-10-des-moldus-les-plus-courageux-dans-la-saga.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `quiz`
--

INSERT INTO `quiz` (`id`, `titre`, `img`) VALUES
(1, 'Pour le quizz404', 'https://i.ibb.co/1fZj8KZ/Th-me.png'),
(2, 'Film et Serie', 'https://i.ibb.co/sPr3d0y/Nouveau-projet-1.png');

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id` int NOT NULL AUTO_INCREMENT,
  `score` int NOT NULL,
  `id_user` int NOT NULL,
  `id_quiz` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `score`, `id_user`, `id_quiz`) VALUES
(1, 492, 13, 2),
(2, 980, 13, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
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
(11, 'Karltest'),
(12, 'a'),
(13, 'l'),
(14, 'ZEZADSQD'),
(15, 'ss');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
