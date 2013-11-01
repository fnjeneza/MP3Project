-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mer 30 Octobre 2013 à 15:52
-- Version du serveur: 5.6.11-log
-- Version de PHP: 5.4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mp3_project_database`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE IF NOT EXISTS `artiste` (
  `nom` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chanson`
--

CREATE TABLE IF NOT EXISTS `chanson` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `artiste` varchar(255) NOT NULL,
  `annee` int(11) NOT NULL,
  `album` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `date_d_ajout` date NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `url_chanson` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(`artiste`) REFERENCES artiste(`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom_utilisateur` varchar(255) NOT NULL,
  `prenom_utilisateur` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `url_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_commentateur` varchar(255) NOT NULL,
  `titre_commentaire` varchar(255) NOT NULL,
  `intitule` text NOT NULL,
  `date_commentaire` date NOT NULL,
  `id_chanson` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(`pseudo_commentateur`) REFERENCES utilisateur(`pseudo`),
  FOREIGN KEY(`id_chanson`) REFERENCES chanson(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_playlist` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(`pseudo`) REFERENCES utilisateur(`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `playlist_chanson`
--

CREATE TABLE IF NOT EXISTS `playlist_chanson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_playlist` int(11) NOT NULL,
  `id_chanson` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(`id_chanson`) REFERENCES chanson(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
