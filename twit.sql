-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 13 mai 2018 à 11:51
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `twit`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user`, `content`, `creation_date`) VALUES
(1, 16, 'hi there', '2018-05-13 11:37:16'),
(2, 16, 'im eddydyd', '2018-05-13 11:37:22'),
(3, 16, 'ee', '2018-05-13 11:38:06'),
(4, 1, 'coucou', '2018-05-13 11:44:13'),
(5, 1, 'dddddddd', '2018-05-13 11:44:17'),
(6, 1, 'couocu', '2018-05-13 11:46:07'),
(7, 1, 'je suis la', '2018-05-13 11:46:30'),
(8, 1, 'voila', '2018-05-13 11:48:00'),
(9, 1, 'HAPPY DAY', '2018-05-13 13:48:47'),
(10, 1, 'coucou', '2018-05-13 13:50:00'),
(11, 2, 'i love my life', '2018-05-13 13:50:41');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creation` datetime NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `creation`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, '2018-05-13 11:43:56', 'line', 'line', 'line@line.com', '$2y$10$.SgGLtzGyLEvBRlsAIQmhO9tM.Sp7mvzGJoIxecscOINaPwoAHdfu'),
(2, '2018-05-13 11:50:26', 'bibi', 'bibi', 'bibi@bb.com', '$2y$10$qQTgc8DzR1Ndltd74jkvhueJ2C7WZfncHA2Ty4Oh5s7RSNCxm7/Nu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
