-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- HÃ´te : 127.0.0.1
-- GÃ©nÃ©rÃ© le : mer. 11 jan. 2023 Ã  10:12
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
-- Base de donnÃ©es : `favoris`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categ_liens`
--

CREATE TABLE `categ_liens` (
  `id_categorie` int(11) NOT NULL,
  `id_liens` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `liens`
--

CREATE TABLE `liens` (
  `id` int(11) NOT NULL,
  `nom_liens` varchar(255) NOT NULL,
  `url_liens` varchar(1000) NOT NULL,
  `desc_liens` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- DÃ©chargement des donnÃ©es de la table `liens`
--

INSERT INTO `liens` (`id`, `nom_liens`, `url_liens`, `desc_liens`) VALUES
(1, 'Youtube', 'https://www.youtube.com/', 'Voici mon favoris youtube');

--
-- Index pour les tables dÃ©chargÃ©es
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `liens`
--
ALTER TABLE `liens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables dÃ©chargÃ©es
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `liens`
--
ALTER TABLE `liens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
