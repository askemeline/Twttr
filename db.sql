-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 06 mai 2018 à 16:35
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
-- Base de données :  `twitter`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `creation` datetime NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `firstname` (`firstname`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `creation`, `firstname`, `lastname`, `email`, `password`) VALUES
(13, '2018-05-05 20:04:37', 'aaa', 'aaa', 'aa@aa.com', '$2y$10$VM8e4QW7fg/eY7W/xyW09.38Y2ME7HNLXU/sYh0bE0BjtQ9ekGTIy'),
(14, '2018-05-05 20:07:57', 'bb', 'bb', 'BB@BB.COM', '$2y$10$53NQaduwPOifDQSZPH4WgOTnPnBZn3zs6klxR5d0SawLsXfGFRh6W'),
(15, '2018-05-05 20:55:58', 'zz', 'zz', 'zz@zz.com', '$2y$10$u6iOVQWiiJRR2xmu0WvE0uzlg0Eq95rGBGbrVM35FkhnUhcTz8bDG'),
(16, '2018-05-05 20:56:09', 'uu', 'uu', 'uu@uu.com', '$2y$10$I8ck.Y6AloQKSnVqGUpRI.uf/g9kUrgPXqlsTewkS0utyidzRLuEW'),
(17, '2018-05-05 21:13:52', 'tt', 'tt', 'tt@tt.com', '$2y$10$ZITt4gHSV5cguAqDcuI1UOlxVrXcav6NHbYKS3JNiWfu5K1L/6oy2'),
(18, '2018-05-06 16:03:55', 'emeline', 'emeline', 'emeline.garo@gmail.com', '$2y$10$.13z54QWRLnzxGG2/4Uo1eeRnwYu/H09oukA0sCKtsVZkIOCVVhgy'),
(19, '2018-05-06 16:04:20', 'karla', 'karla', 'karla@karla.com', '$2y$10$U47pbXLU3J8tYj5GR771/.QzM4/iO9suSzyQCyF5bbDA4qVd/1ikG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
