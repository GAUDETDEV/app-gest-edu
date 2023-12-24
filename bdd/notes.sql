-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 28 juil. 2023 à 00:06
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
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valeur` varchar(100) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `code_eleve` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `valeur`, `libelle`, `code_eleve`) VALUES
(3, '12.75', 'Anglais', 'ELV1'),
(4, '14', 'Mathematiques', 'ELV1'),
(5, '17', 'Francais', 'ELV1'),
(6, '15.5', 'Histoire-Geographie', 'ELV1'),
(7, '17', 'EDHC', 'ELV1'),
(8, '14.25', 'Espagnol', 'ELV1'),
(9, '15', 'Mathematiques', 'ELV1'),
(10, '15', 'Mathematiques', 'ELV1'),
(13, '12.75', 'Mathematiques', 'ELV3'),
(16, '12.75', 'EDHC', 'ELV2'),
(17, '15.5', 'Francais', 'ELV1'),
(18, '15', 'Mathematiques', 'ELV1'),
(19, '15.5', 'Mathematiques', 'ELV3'),
(20, '15.5', 'Francais', 'ELV0'),
(21, '14.25', 'Anglais', 'ELV0'),
(22, '17', 'Histoire-Geographie', 'ELV0'),
(23, '15.5', 'EDHC', 'ELV0'),
(24, '17', 'SVT', 'ELV0'),
(25, '14.25', 'Mathematiques', 'ELV0'),
(26, '15.5', 'Sciences-Physiques', 'ELV0'),
(27, '14.25', 'Philosophie', 'ELV0'),
(28, '12.75', 'Allemand', 'ELV0'),
(29, '17', 'Espagnol', 'ELV0'),
(30, '14', 'Mathematiques', 'ELV20'),
(31, '14', 'Mathematiques', 'ELV20'),
(32, '2', 'Mathematiques', 'ELV20'),
(33, '15.5', 'Sciences-Physiques', 'ELV20'),
(34, '14.5', 'Sciences-Physiques', 'ELV20'),
(35, '15.5', 'Histoire-Geographie', 'ELV2'),
(36, '20', 'Mathematiques', 'ELV1'),
(37, '15.5', 'SVT', 'ELV1'),
(38, '15.5', 'Anglais', 'ELV1'),
(39, '15.5', 'Histoire-Geographie', 'ELV20'),
(40, '15.5', 'Histoire-Geographie', 'ELV20'),
(41, '14.25', 'Francais', 'ELV0'),
(42, '18', 'Mathematiques', 'ELV21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
