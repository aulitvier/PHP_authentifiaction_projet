-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 fév. 2023 à 11:36
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `authentification`
--

-- --------------------------------------------------------

--
-- Structure de la table `droit_administation`
--

CREATE TABLE `droit_administation` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `droit_administation`
--

INSERT INTO `droit_administation` (`id`, `nom`, `description`) VALUES
(2, 'administrateur', 'Vous etes un administrateur, vous avez donc tous les droits'),
(3, 'utilisateur', 'Vous etes un utilisateur vous ne pouvez que modifier les page et voir celle qui sont utilisateur et invite'),
(4, 'invite', 'Vous etes un invite votre droit se limite a la lecture des pages invite');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `page_administrateur` tinyint(1) NOT NULL,
  `page_utilisateur` int(11) NOT NULL,
  `page_invite` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `paragraphe` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `nom`, `page_administrateur`, `page_utilisateur`, `page_invite`, `titre`, `paragraphe`) VALUES
(2, 'page2', 0, 0, 1, 'ma page 2', 'ceci est ma page 2 modifier encore et encore'),
(3, 'page3', 1, 0, 0, 'ma page 3', 'ceci est ma page 3'),
(5, 'ma nouvelle page', 0, 0, 1, 'ma page4', 'page 4 qui est aussi une page test'),
(7, 'page 6', 0, 1, 0, 'Ma page 6', 'Cela est ma page 6'),
(9, 'page1', 0, 0, 1, 'ma page 2', 'ygftycfjytftyf');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `droit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `pseudo`, `age`, `email`, `mot_de_passe`, `droit`) VALUES
(1, 'evrard', 'olivier', 'olivierevrard', 23, 'olivier.evrard29@gmail.com', '$2y$12$VsAMSbPM1y9W9M/dtZlyXumfJHQ1YVVCbJ0sUGoWTCF6KBVNlLchi', 1),
(4, 'Dupont', 'Jean', 'Superdupont', 28, 'Jean.dupont@gmail.com', '$2y$12$IkcP.8GyYubeCubay4OdKOAVFWTaAB0TChtm0EtZx73EitCg7qo72', 2),
(5, 'Durand', 'Albert', 'AllBier', 20, 'Albert.Durand@gmail.com', '$2y$12$N/4BxdbanQNjqvw5e1.cSu1Ii8xqecfWpkR3fQ9PN1k6qNbBLujw2', 3),
(7, 'yukgu', 'uyguygyu', 'ugykukgu', 25, 'fkugyugy@gmail.com', '$2y$12$9hbwHPOvC4vaYGRDSq5JvOWp8etEGIsy6MOomRUotuKSf/69r3aTS', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `droit_administation`
--
ALTER TABLE `droit_administation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `droit_administation`
--
ALTER TABLE `droit_administation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
