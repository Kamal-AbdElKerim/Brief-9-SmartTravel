-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 28 déc. 2023 à 09:26
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
-- Base de données : `smarttravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bus`
--

CREATE TABLE `bus` (
  `Numero_de_bus` int(11) NOT NULL,
  `busNumber` varchar(20) DEFAULT NULL,
  `Plaque_immatriculation` varchar(20) DEFAULT NULL,
  `Capacite` int(11) DEFAULT NULL,
  `Company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bus`
--

INSERT INTO `bus` (`Numero_de_bus`, `busNumber`, `Plaque_immatriculation`, `Capacite`, `Company_id`) VALUES
(18, 'BUS002', 'XYZ456', 40, 33),
(22, 'BUS22', 'BUS002BUS002', 100, 33),
(24, 'BUS003', 'BUS002BUS002', 150, 35),
(25, 'BUS0056', 'BUS002BUS002', 200, 36);

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `cityID` int(11) NOT NULL,
  `cityName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`cityID`, `cityName`) VALUES
(48, 'Agadir'),
(63, 'Al Hoceima'),
(60, 'Beni Mellal'),
(71, 'Berrechid'),
(43, 'Casablanca'),
(55, 'Chefchaouen'),
(61, 'Dakhla'),
(54, 'El Jadida'),
(59, 'Errachidia'),
(53, 'Essaouira'),
(46, 'Fès'),
(76, 'Guelmim'),
(56, 'Ifrane'),
(51, 'Kenitra'),
(68, 'Khémisset'),
(74, 'Khouribga'),
(62, 'Laayoune'),
(75, 'Larache'),
(45, 'Marrakech'),
(79, 'Martil'),
(49, 'Meknes'),
(70, 'Midelt'),
(64, 'Nador'),
(78, 'Ouarzazate'),
(50, 'Oujda'),
(44, 'Rabat'),
(65, 'Safi'),
(66, 'Settat'),
(73, 'Sidi Ifni'),
(72, 'Skhirat'),
(47, 'Tangier'),
(69, 'Taourirt'),
(58, 'Taroudant'),
(57, 'Taza'),
(77, 'Témara'),
(52, 'Tetouan'),
(67, 'Tiznit');

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Bio` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `name`, `Bio`, `img`) VALUES
(33, ' CTM - ستيام', '\r\nCTM - ستيام', 'public/Dashboard/photo_Company/image_658c2975d58fd2.68751187.jpg'),
(35, 'Voyages Arrahman - أسفار الرحمان', 'Voyages Arrahman - أسفار الرحمان', 'public/Dashboard/photo_Company/image_658c29af85b305.21815617.jpg'),
(36, 'LIBRA TOURS - الكشاف السريع', 'LIBRA TOURS - الكشاف السريع', 'public/Dashboard/photo_Company/image_658c29e4e01a36.85353889.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Heure_depart` time DEFAULT NULL,
  `Heure_arrivee` time DEFAULT NULL,
  `Sieges_disponibles` int(11) DEFAULT NULL,
  `ID_Bus` int(11) DEFAULT NULL,
  `ID_Route` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`ID`, `Date`, `Heure_depart`, `Heure_arrivee`, `Sieges_disponibles`, `ID_Bus`, `ID_Route`, `price`) VALUES
(12, '2023-12-28', '23:43:00', '00:43:00', 100, 22, 7, 70.00),
(13, '2023-12-28', '03:44:00', '03:44:00', 151, 22, 6, 80.00),
(14, '2023-12-29', '08:49:00', '16:49:00', 5, 18, 7, 150.00),
(15, '2023-12-29', '18:49:00', '20:49:00', 5, 18, 7, 200.00),
(16, '2023-12-28', '16:07:00', '20:07:00', 100, 18, 12, 150.00),
(17, '2023-12-28', '17:49:00', '18:49:00', 20, 24, 12, 123.00),
(18, '2023-12-28', '19:01:00', '22:01:00', 200, 25, 12, 95.00),
(19, '2023-12-28', '09:03:00', '13:03:00', 20, 25, 12, 166.00),
(20, '2023-12-28', '13:03:00', '16:03:00', 20, 25, 12, 166.00),
(21, '2023-12-28', '09:01:00', '11:01:00', 200, 25, 12, 95.00),
(22, '2023-12-28', '01:07:00', '05:07:00', 100, 18, 12, 150.00);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `ID` int(11) NOT NULL,
  `ID_Horaire` int(11) DEFAULT NULL,
  `Details_reservation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `route`
--

CREATE TABLE `route` (
  `ID` int(11) NOT NULL,
  `Ville_depart` varchar(50) DEFAULT NULL,
  `Ville_destination` varchar(50) DEFAULT NULL,
  `Distance` int(11) DEFAULT NULL,
  `Duree` varchar(20) DEFAULT NULL,
  `city_ID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `route`
--

INSERT INTO `route` (`ID`, `Ville_depart`, `Ville_destination`, `Distance`, `Duree`, `city_ID`) VALUES
(6, 'Agadir', 'Safi', 150, '10', NULL),
(7, 'Marrakech', 'Khouribga', 80, '20', NULL),
(10, 'Marrakech', 'Khouribga', 200, '20', NULL),
(11, 'Marrakech', 'Khouribga', 200, '20', NULL),
(12, 'Safi', 'Agadir', 155, '20', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`Numero_de_bus`),
  ADD KEY `Company_id` (`Company_id`);

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityID`),
  ADD UNIQUE KEY `cityName` (`cityName`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `horaire_ibfk_1` (`ID_Bus`),
  ADD KEY `horaire_ibfk_2` (`ID_Route`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Horaire` (`ID_Horaire`);

--
-- Index pour la table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cityID` (`city_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bus`
--
ALTER TABLE `bus`
  MODIFY `Numero_de_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `route`
--
ALTER TABLE `route`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`Company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD CONSTRAINT `horaire_ibfk_1` FOREIGN KEY (`ID_Bus`) REFERENCES `bus` (`Numero_de_bus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horaire_ibfk_2` FOREIGN KEY (`ID_Route`) REFERENCES `route` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`ID_Horaire`) REFERENCES `horaire` (`ID`);

--
-- Contraintes pour la table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`city_ID`) REFERENCES `city` (`cityID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
