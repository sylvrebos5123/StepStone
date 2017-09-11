-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 11 Septembre 2017 à 18:02
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bakery`
--

-- --------------------------------------------------------

--
-- Structure de la table `cakes`
--

CREATE TABLE `cakes` (
  `id_cake` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `pastry` varchar(255) NOT NULL,
  `topping` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cakes`
--

INSERT INTO `cakes` (`id_cake`, `name`, `pastry`, `topping`) VALUES
(1, 'Cupcake', 'Sponge', ''),
(2, 'Eclairs', 'Choux pastry', 'Chocolate'),
(3, 'Mille-feuille', 'Puff pastry', 'fruits'),
(4, 'Cheese cake', 'Shortcrust', '');

-- --------------------------------------------------------

--
-- Structure de la table `cakes_filling`
--

CREATE TABLE `cakes_filling` (
  `id_cakes_filling` int(11) UNSIGNED NOT NULL,
  `id_cake` int(11) NOT NULL,
  `id_filling` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cakes_filling`
--

INSERT INTO `cakes_filling` (`id_cakes_filling`, `id_cake`, `id_filling`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 2, 3),
(7, 3, 2),
(8, 3, 3),
(9, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `filling`
--

CREATE TABLE `filling` (
  `id_filling` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `filling`
--

INSERT INTO `filling` (`id_filling`, `name`) VALUES
(1, 'Icing'),
(2, 'Butter crème'),
(3, 'Whipped crème'),
(4, 'Cheese cake crème');

-- --------------------------------------------------------

--
-- Structure de la table `filling_flavour`
--

CREATE TABLE `filling_flavour` (
  `id_filling_flavour` int(11) UNSIGNED NOT NULL,
  `id_filling` int(11) NOT NULL,
  `id_flavour` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `filling_flavour`
--

INSERT INTO `filling_flavour` (`id_filling_flavour`, `id_filling`, `id_flavour`) VALUES
(1, 2, 0),
(2, 2, 1),
(3, 3, 3),
(4, 3, 4),
(5, 3, 2),
(6, 4, 4),
(7, 1, 1),
(8, 1, 2),
(9, 1, 3),
(10, 1, 4),
(11, 2, 2),
(12, 2, 3),
(13, 2, 4),
(14, 3, 0),
(15, 3, 1),
(16, 4, 0),
(17, 4, 1),
(18, 4, 2),
(19, 4, 3),
(20, 1, 5),
(21, 1, 6),
(22, 1, 7),
(23, 1, 8),
(24, 1, 9),
(25, 1, 10),
(26, 2, 5),
(27, 2, 6),
(28, 2, 7),
(29, 2, 8),
(30, 2, 9),
(31, 2, 10),
(32, 3, 5),
(33, 3, 6),
(34, 3, 7),
(35, 3, 8),
(36, 3, 9),
(37, 3, 10),
(38, 4, 5),
(39, 4, 6),
(40, 4, 7),
(41, 4, 8),
(42, 4, 9);

-- --------------------------------------------------------

--
-- Structure de la table `flavour`
--

CREATE TABLE `flavour` (
  `id_flavour` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `flavour`
--

INSERT INTO `flavour` (`id_flavour`, `name`) VALUES
(1, 'Coffee'),
(2, 'Lemon'),
(3, 'Vanilla'),
(4, 'Orange'),
(5, 'Raspberry'),
(6, 'Strawberry'),
(7, 'Banana'),
(8, 'Coconut'),
(9, 'Caramel'),
(10, 'Peach');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) UNSIGNED NOT NULL,
  `id_cakes_filling` int(11) NOT NULL,
  `id_filling_flavour` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`id_order`, `id_cakes_filling`, `id_filling_flavour`, `client_name`) VALUES
(1, 1, 7, 'Anna'),
(2, 1, 7, 'Sylvie'),
(3, 1, 8, 'Lucy'),
(4, 1, 9, 'Lucy'),
(5, 1, 10, 'Anna');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`id_cake`);

--
-- Index pour la table `cakes_filling`
--
ALTER TABLE `cakes_filling`
  ADD PRIMARY KEY (`id_cakes_filling`);

--
-- Index pour la table `filling`
--
ALTER TABLE `filling`
  ADD PRIMARY KEY (`id_filling`);

--
-- Index pour la table `filling_flavour`
--
ALTER TABLE `filling_flavour`
  ADD PRIMARY KEY (`id_filling_flavour`);

--
-- Index pour la table `flavour`
--
ALTER TABLE `flavour`
  ADD PRIMARY KEY (`id_flavour`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cakes`
--
ALTER TABLE `cakes`
  MODIFY `id_cake` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `cakes_filling`
--
ALTER TABLE `cakes_filling`
  MODIFY `id_cakes_filling` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `filling`
--
ALTER TABLE `filling`
  MODIFY `id_filling` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `filling_flavour`
--
ALTER TABLE `filling_flavour`
  MODIFY `id_filling_flavour` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `flavour`
--
ALTER TABLE `flavour`
  MODIFY `id_flavour` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
