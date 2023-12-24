-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 28 juil. 2023 à 00:05
-- Version du serveur : 8.0.33
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ges_edu`
--

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
CREATE TABLE IF NOT EXISTS `eleves` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenoms` varchar(100) NOT NULL,
  `annee` int NOT NULL,
  `code_eleve` varchar(100) NOT NULL,
  `genre` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `nom`, `prenoms`, `annee`, `code_eleve`, `genre`) VALUES
(13, 'gaudet', 'la jeune', 2023, 'ELV3', 'fille'),
(14, 'gaudet', 'andre', 2023, 'ELV1', 'garcon'),
(15, 'yao', 'berenger', 2023, 'ELV2', 'garcon'),
(16, 'gaudet', 'marie', 2023, 'ELV4', 'fille'),
(18, 'gaudet', 'issac', 2023, 'ELV6', 'garcon'),
(19, 'ayehi', 'julie', 2023, 'ELV7', 'fille'),
(21, 'gaudet', 'cherubin', 2023, 'ELV5', 'garcon'),
(23, 'gaudet', 'azoley', 2023, 'ELV0', 'garcon'),
(24, 'Kouakou', 'anderson', 2023, 'ELV20', 'garcon'),
(25, 'gaudet', 'ede', 2023, 'ELV15', 'garcon'),
(26, 'yao', 'ede', 2023, 'ELV11', 'garcon'),
(27, 'gaudet', 'cherubin', 2023, 'ELV21', 'garcon');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
