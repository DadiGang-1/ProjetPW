-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 12 mai 2022 à 16:13
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `Login` varchar(20) NOT NULL,
  `Pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`Login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`Login`, `Pwd`) VALUES
('root', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Identifiant` varchar(20) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Portable` int(11) NOT NULL,
  `Adresse` varchar(20) NOT NULL,
  PRIMARY KEY (`Identifiant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Identifiant`, `Pass`, `Nom`, `Prenom`, `Email`, `Portable`, `Adresse`) VALUES
('tomas', 'tomas', 'tomas', 'tomas', 'tomas@tomas', 70345, 'tomas'),
('david', 'david', 'david', 'david', 'david@david', 7410, 'david');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `Identifiant` varchar(20) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Box1` int(11) DEFAULT NULL,
  `Box2` int(11) DEFAULT NULL,
  `Box3` int(11) DEFAULT NULL,
  `Rope1` int(11) DEFAULT NULL,
  `Rope2` int(11) DEFAULT NULL,
  `Rope3` int(11) DEFAULT NULL,
  `Glove1` int(11) DEFAULT NULL,
  `Glove2` int(11) DEFAULT NULL,
  `Glove3` int(11) DEFAULT NULL,
  PRIMARY KEY (`Identifiant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`Identifiant`, `Pass`, `Box1`, `Box2`, `Box3`, `Rope1`, `Rope2`, `Rope3`, `Glove1`, `Glove2`, `Glove3`) VALUES
('tomas', 'tomas', 0, 1, 0, 1, 0, 0, 1, 0, 0),
('david', 'david', 0, 1, 0, 0, 0, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
