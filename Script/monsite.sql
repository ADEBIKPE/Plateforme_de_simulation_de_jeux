-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 nov. 2023 à 00:32
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `monsite`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `idJeu` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `regle` longblob NOT NULL,
  `categorie` varchar(1500) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `idPartie` int(2) NOT NULL,
  `date` date NOT NULL,
  `h_deb` time(3) NOT NULL,
  `h_fin` time(3) NOT NULL,
  `nb_max_necessaires` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(2) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `passwd` varchar(150) NOT NULL,
  `role` int(2) NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `nom_de_avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `email`, `passwd`, `role`, `date_de_naissance`, `nom_de_avatar`) VALUES
(1, 'KOTIN', 'Chancel', 'chancelkotin24@gmail.com', '$2y$12$MYoBpyNy.9Y7RZB8G0oUXu1Tf9xFd22d5MYDct30BR84WNCMsuiMi', 2, '2003-04-24', 'Chancel KOTIN'),
(2, 'KOTIN', 'Chancel', 'chancelmerveil24@gmail.com', '$2y$12$zM7TOT4uDi2gbJ4K4tAte.OWD97h2n30jeB2SlU0XhaijMK34ksI6', 2, '2001-04-23', 'Chancel KOTIN'),
(3, 'jhg', 'ygtfd', 'chancel@gmail.com', '$2y$10$PjTlrQxvsGLBMCxDWQ8SueqCjWaNf2xkO346/Kpi1x.X/Kc9FfXQO', 1, '2023-11-15', 'kjhgfd');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`idJeu`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`idPartie`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `idJeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `idPartie` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
