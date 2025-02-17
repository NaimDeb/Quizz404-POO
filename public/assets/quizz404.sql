-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 17 fév. 2025 à 11:30
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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `answer`
--

INSERT INTO `answer` (`id`, `intitule`, `id_question`, `is_correct`) VALUES
(1, '200', 1, 0),
(2, '403', 1, 0),
(3, '404', 1, 1),
(4, '500', 1, 0),
(5, 'Hyper Transfer Text Protocol', 2, 0),
(6, 'HyperText Transfer Protocol', 2, 1),
(7, 'High Technical Text Protocol', 2, 0),
(8, 'Hyperlink Transport Protocol', 2, 0),
(9, 'Chris Evans', 3, 0),
(10, 'Robert Downey Jr.', 3, 1),
(11, 'Chris Hemsworth', 3, 0),
(12, 'Mark Ruffalo', 3, 0),
(13, 'Better Call Saul', 4, 0),
(14, 'Breaking Bad', 4, 1),
(15, 'Sons of Anarchy', 4, 0),
(16, 'Dexter', 4, 0),
(17, 'Personal Hypertext Processor', 5, 0),
(18, 'PHP: Hypertext Preprocessor', 5, 1),
(19, 'Programming HTML Processor', 5, 0),
(20, 'Predefined Hypertext Processor', 5, 0),
(21, '&', 6, 0),
(22, '$', 6, 1),
(23, '#', 6, 0),
(24, '%', 6, 0);

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
(1, 1, 'Quel est le code HTTP pour une page non trouvée ?', '', 'Le code 404 est utilisé pour indiquer qu\'une ressource demandée n\'existe pas sur le serveur.'),
(2, 1, 'Que signifie HTTP ?', '', 'HTTP signifie HyperText Transfer Protocol, utilisé pour la communication sur le web.'),
(3, 2, 'Quel acteur incarne Iron Man dans le MCU ?', '', 'Robert Downey Jr. joue le rôle d\'Iron Man depuis 2008 dans le Marvel Cinematic Universe.'),
(4, 2, 'Dans quelle série trouve-t-on le personnage de Walter White ?', '', 'Walter White est le personnage principal de Breaking Bad.'),
(5, 3, 'Que signifie PHP ?', '', 'PHP signifie à l\'origine Personal Home Page, mais aujourd\'hui, cela signifie PHP: Hypertext Preprocessor.'),
(6, 3, 'Quel symbole est utilisé pour déclarer une variable en PHP ?', '', 'Le symbole \"$\" est utilisé pour déclarer une variable en PHP.');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `quiz`
--

INSERT INTO `quiz` (`id`, `titre`, `img`) VALUES
(1, 'Pour le quizz404', 'https://i.ibb.co/1fZj8KZ/Th-me.png'),
(2, 'Film et Serie', 'https://i.ibb.co/sPr3d0y/Nouveau-projet-1.png'),
(3, 'PHP', 'https://upload.wikimedia.org/wikipedia/commons/3/32/Codigo_php.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `score`, `id_user`, `id_quiz`) VALUES
(3, 653, 16, 1),
(4, 437, 16, 2),
(5, 470, 16, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`) VALUES
(16, 'naim');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
