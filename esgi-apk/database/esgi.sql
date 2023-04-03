-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 avr. 2023 à 18:01
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `esgi`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `psw` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nom`, `prenom`, `email`, `psw`) VALUES
(1, 'adminName', 'adminPrenom', 'admin@gmail.com', 'admin1234');

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `idFormateur` int(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `CIN` varchar(10) NOT NULL,
  `Module` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`idFormateur`, `nom`, `prenom`, `CIN`, `Module`) VALUES
(1, 'formateurName', 'formateurPrenom', 'U12345', 'module1'),
(3, 'nom3', 'prenom3', 'u4545', 'module3');

-- --------------------------------------------------------

--
-- Structure de la table `recu`
--

CREATE TABLE `recu` (
  `idRecu` int(40) NOT NULL,
  `lasomme` int(40) NOT NULL,
  `mois` varchar(14) NOT NULL,
  `anne` varchar(40) NOT NULL,
  `numInscription` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recu`
--

INSERT INTO `recu` (`idRecu`, `lasomme`, `mois`, `anne`, `numInscription`) VALUES
(1, 900, 'Août', '2023', '798djd908'),
(2, 500, 'Janvier', '2023', '798djd908');

-- --------------------------------------------------------

--
-- Structure de la table `stagaire`
--

CREATE TABLE `stagaire` (
  `numInscription` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `CIN` varchar(10) NOT NULL,
  `tele` varchar(14) NOT NULL,
  `filiere` varchar(50) NOT NULL,
  `dateInsc` varchar(10) NOT NULL,
  `anne` varchar(4) NOT NULL,
  `dateN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stagaire`
--

INSERT INTO `stagaire` (`numInscription`, `nom`, `prenom`, `CIN`, `tele`, `filiere`, `dateInsc`, `anne`, `dateN`) VALUES
('23768jkkuty', 'nom4', 'prenom4', 'y6767', '2147483647', 'tsg', '2023-03-15', '1', '2023-03-23'),
('798djd908', 'hafidi', 'hafid', 'm5686778', '064545978978', 'Systeme Reseux', '2023-04-05', '1', '2023-04-11'),
('94fjk74', 'hafidi', 'hafid', 'f5678', '064545776', 'tsg', '2023-04-13', '1', '2023-04-11');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `CIN` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `psw` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `nom`, `prenom`, `CIN`, `email`, `psw`) VALUES
(1, 'userNom', 'userPrenom', 'U12345', 'user1@gmail.com', 'user11234'),
(2, 'nom2', 'prenom2', 'u2345', 'user2@gmail.com', 'user21234'),
(3, 'nom3', 'prenom3', 'u4567', 'user3@gmail.com', 'user31234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`idFormateur`);

--
-- Index pour la table `recu`
--
ALTER TABLE `recu`
  ADD PRIMARY KEY (`idRecu`),
  ADD KEY `numInscription` (`numInscription`);

--
-- Index pour la table `stagaire`
--
ALTER TABLE `stagaire`
  ADD PRIMARY KEY (`numInscription`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `idFormateur` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recu`
--
ALTER TABLE `recu`
  ADD CONSTRAINT `id_stagaire` FOREIGN KEY (`numInscription`) REFERENCES `stagaire` (`numInscription`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
