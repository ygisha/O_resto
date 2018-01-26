-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 26 jan. 2018 à 15:41
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_resto`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `libelle` varchar(300) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `image`) VALUES
(14, 'Cuisine Africaine', 'ragout.jpg'),
(15, 'Cuisine Asiatique', 'cury.jpg'),
(16, 'Cuisine Europeenne', 'buche.jpg'),
(17, 'Cuisine Libanaise', 'pizal.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_resto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `description`, `id_resto`) VALUES
(1, ' hfjnKDcxikcjkxnjbhjc', 0),
(2, ' hgshiqguOGGICSJ', 0),
(3, ' hgshiqguOGGICSJ', 38),
(4, ' hgjsldjgjk', 38),
(5, ' jhifkwkofncj,b vb;f;xijcixl;jnyhty', 33),
(6, ' jhifkwkofncj,b vb;f;xijcixl;jnyhty', 33),
(7, ' bonne cuisine', 26);

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE `communes` (
  `id` int(11) NOT NULL,
  `commune` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `communes`
--

INSERT INTO `communes` (`id`, `commune`) VALUES
(1, 'yopougon'),
(2, 'marcory'),
(3, 'cocody'),
(4, 'plateau'),
(5, 'treichville');

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `telephone` varchar(250) NOT NULL,
  `adresse` text NOT NULL,
  `id_categories` int(11) NOT NULL,
  `id_commune` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `restaurants`
--

INSERT INTO `restaurants` (`id`, `titre`, `description`, `image`, `telephone`, `adresse`, `id_categories`, `id_commune`) VALUES
(21, 'Wasabi', 'Sushi Asiatique', 'wasabi.png', '21 56 94 78', 'saint jean, prÃ¨s de l\'Ã©glise', 14, 1),
(22, 'Restaurant Seoul', 'Asiatique', 'restoseoul.png', '', '', 15, 4),
(23, 'Kaiten', 'Asiatique', 'kaiten.jpg', '', '', 15, 2),
(24, 'Hai Phong', 'Asiatique', 'haiphong.png', '', '', 15, 2),
(25, 'Osuchi', 'Asiatique', 'osushimarcory.jpg', '', '', 15, 3),
(26, 'Manaiche', 'Burger, pizza libanaise', 'manaiche.jpg', '22 45 98 71', 'blauckauss', 17, 3),
(27, 'Chez Rifat', 'Burger, chawarma, pizza poulet', 'rifat.png', '', '', 17, 2),
(28, 'Amore', 'Burger, chawarma, glace', 'amore.jpg', '', '', 17, 2),
(30, 'Chicken Hut', 'Burger, chawarma', 'chiken.jpg', '', '', 17, 3),
(32, 'O Mechoui', 'Chawarma, burger, viande', 'mechoui.png', '23 56 41 98', 'complexe sportif', 17, 1),
(33, 'Chez Astou', 'poulet, Africain', 'astou.png', '', '', 14, 1),
(34, 'Chez Arthur', 'Poulets, salades, poulets', 'arthur.png', '', '', 14, 2),
(35, 'Saakan', 'Africaine', 'saakan.jpg', '', '', 14, 4),
(36, 'Le reservoir', 'Africain', 'reservoir.jpg', '', '', 14, 4),
(37, 'Le grattie', 'Africain', 'grattie.jpg', '', '', 14, 3),
(38, 'La dolce vita', 'Europeen', 'dolcevita.jpg', '', '', 16, 3),
(39, 'Assiette Sante', 'Vegetarien', 'assiettesante.png', '', '', 16, 4),
(40, 'Barasserie des arts', 'Burger, pates, salades', 'brasseriearts.png', '', '', 16, 2),
(44, 'Delicity', 'Burger, europeen', 'delicity.png', '', '', 16, 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenoms` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `mdp`, `nom`, `prenoms`) VALUES
(1, 'aichagyeo@gmail.com', 'ygisha', 'aicha', 'yeo'),
(2, 'oresto@gmail.com', 'resto', 'isabelle', 'success'),
(3, 'oresto@gmail.com', 'restoration', 'nast', 'resto'),
(5, '', 'xxg', 'reste', 'foug');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `restaurants`
--
ALTER TABLE `restaurants`
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
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `communes`
--
ALTER TABLE `communes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
