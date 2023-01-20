-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 jan. 2023 à 11:39
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `favoris`
--

-- --------------------------------------------------------

--
-- Structure de la table `categ_liens`
--

CREATE TABLE `categ_liens` (
  `id_categorie` int(11) NOT NULL, --NOT NUL on dit que ce champs ne soit jamais NULL (NULL sert a rien, il est vide) ce champs devras toujours etre renseigner. | On specifiant sa on dit que un favoris ne seras jamais ajouter tant qu'il ne choisis pas de categorie 
  `id_liens` int(11) NOT NULL,

  FOREIGN KEY (id_liens) REFERENCES liens (id), -- On crée une contrainte de clefs etrangeres (FOREIGN KEYS) sur la colonne id_liens, qui reference l'id de la table liens 
  FOREIGN KEY (id_categorie) REFERENCES categorie (id_categorie),
  PRIMARY KEY (id_liens, id_categorie), -- C'est une contrainte que l'on rajoute ( de la primary keys) qui porte sur les deux champs au dessus 
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categ_liens`
--

INSERT INTO `categ_liens` (`id_categorie`, `id_liens`) VALUES
(3, 1),
(3, 2),
(1, 3)
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
