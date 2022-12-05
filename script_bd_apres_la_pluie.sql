-- phpMyAdmin SQL Dump
-- version 5.1.1deb3+bionic1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 05 déc. 2022 à 18:42
-- Version du serveur : 5.7.40
-- Version de PHP : 7.2.24-0ubuntu0.18.04.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dutinfopw201648`
--

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `reponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `question`, `reponse`) VALUES
(1, 'Pourquoi le nom \'Apres la pluie\' ?', 'Par ce que apres la pluie voila le beau temps.trhdhdfhh'),
(2, 'Est ce que t de l\'eau ça réchauffe vraiment? ', 'Oui'),
(3, 'Qu\'est-ce-que \'Après la pluie\' ?', 'Nous sommes proposons des prestations afin de tourner puis monter vos clips !\r\nPour faire un devis, veuillez vous diriger vers la page \"Je réserve mon clip\".'),
(5, 'Est-ce que de grands rapeurs seront sur le projet?', 'ouiouioui'),
(8, 'MERGE BRANCHE UPLOAD FICHIER', 'OKAYOKAY'),
(9, 'MERGE BRANCHE MES RESERVATIONS', 'APRES VERIF\r\n'),
(11, 'vardump perdu ', 'quand on modifie ses données'),
(13, 'header pour refresh ', 'du coup check de toutes les pages nécéssitants par commencer supprimer faq'),
(14, 'ajouter supplément ', 'redirection chelou');

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(20) NOT NULL,
  `nb_places` varchar(20) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`id`, `nom`, `nb_places`, `adresse`, `type`) VALUES
(123, 'chez mathéo', '4', 'je sais pas encore', 'appart'),
(124, 'Egouts de Montreuil', '15', '4 rue de l\'archeduq, Montreuil', 'Egouts');

-- --------------------------------------------------------

--
-- Structure de la table `realisations`
--

CREATE TABLE `realisations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lien_photo` varchar(300) DEFAULT NULL,
  `titre` text NOT NULL,
  `lien_video` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `realisations`
--

INSERT INTO `realisations` (`id`, `lien_photo`, `titre`, `lien_video`) VALUES
(37, 'Shinzo - Autre Rêve.png', 'Shinzo - Autre Rêve (Clip officiel)', 'https://www.youtube.com/embed/A5lKApnMY_Y'),
(38, 'Shinzo - Murcielago.png', 'Shinzo - Murcielago (prod. Apher)', 'https://www.youtube.com/embed/El9HTo_jknA'),
(47, 'Shinzo - GG (Prod. Bro Connexion).png', 'Shinzo - GG (Prod. Bro Connexion)', 'http://localhost/~nfenollosa/Apres_La_Pluie/administration/index.php?module=rea&action=form_ajout_rea'),
(52, 'maladresse.png', 'maladresse', 'http://localhost/~nfenollosa/Apres_La_Pluie/administration/index.php?module=rea&action=form_ajout_rea'),
(54, 'illegal.png', 'illegal', 'http://localhost/~nfenollosa/Apres_La_Pluie/administration/index.php?module=rea&action=form_ajout_rea');

-- --------------------------------------------------------

--
-- Structure de la table `resasupp`
--

CREATE TABLE `resasupp` (
  `id_reservation` bigint(20) UNSIGNED NOT NULL,
  `id_supplement` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resasupp`
--

INSERT INTO `resasupp` (`id_reservation`, `id_supplement`) VALUES
(100, 16);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idee_generale` text NOT NULL,
  `duree` varchar(20) DEFAULT NULL,
  `date` varchar(20) NOT NULL,
  `heure` varchar(20) NOT NULL,
  `id_lieu` bigint(20) UNSIGNED NOT NULL,
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `idee_generale`, `duree`, `date`, `heure`, `id_lieu`, `id_utilisateur`) VALUES
(99, 'On est chez mathéo et on casse tout sauf mathéo', NULL, '2022-12-16', '14:00', 123, 12),
(100, 'Combat de rat dans les égouts', NULL, '2022-12-03', '16:50', 124, 8);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `membre` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_utilisateur`, `admin`, `membre`) VALUES
(2, 1, 1),
(1, 0, 1),
(7, 1, 1),
(8, 1, 1),
(9, 1, 1),
(10, 0, 1),
(11, 0, 1),
(12, 0, 1),
(13, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `supplements`
--

CREATE TABLE `supplements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `prix` double NOT NULL,
  `gif_avec` varchar(100) NOT NULL,
  `gif_sans` varchar(100) NOT NULL,
  `choix` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `supplements`
--

INSERT INTO `supplements` (`id`, `nom`, `description`, `prix`, `gif_avec`, `gif_sans`, `choix`) VALUES
(15, 'Déplacement', 'La plus grande distance que nous allons parcourir lors de notre tournage', 10, '20km.jpg', '10km.jpg', 1),
(16, 'nombre de lieux', 'nombre de lieux de tournage (plus de lieux, plus de variété dans les plans)', 10, '5lieux.jpg', '1 lieu.jpg', 1),
(17, 'stabilisateur', 'permet de stabiliser l\'image et éviter les flous sur des plans en mouvement', 10, 'nette.jpg', 'flou.jpg', 0),
(18, 'Effets', 'Les effets permettent d\'avoir un clip plus vivant et de meilleurs transitions entre les plans. Les effets du pack 1 seront moins complexes que les effets du pack 3', 10, 'effets.png', 'sanseffet.jpg', 1),
(19, 'VFX', 'les VFX sont des effet audios, telles les onomatopées dans une bande-dessiner ils ajoutent quelque choise à un geste ou à des mots', 10, 'boomavec.jpg', 'bommsans.jpg', 0),
(20, 'éclairage', 'Très utiles pour mettre une ambiance dans un clip ou tout simplement si le clip content des plans dans des lieux sombres. plus d\'éclairages, plus d\'ambiances différentes ', 10, 'avececl.jpg', 'sansecl.jpg', 1),
(21, 'étalonage', 'améliore les couleurs sur les plans capturé durant le tournage', 10, 'avecetalo.PNG', 'sansetalo.PNG', 0),
(22, 'cover', 'cover pour les plateformes de streaming fait par un membre de AZ Record', 10, 'cover2.PNG', 'cover.PNG', 0);

-- --------------------------------------------------------

--
-- Structure de la table `suppsAvecChoix`
--

CREATE TABLE `suppsAvecChoix` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_supplement` bigint(20) UNSIGNED NOT NULL,
  `choix` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `suppsAvecChoix`
--

INSERT INTO `suppsAvecChoix` (`id`, `id_supplement`, `choix`) VALUES
(17, 15, '0-10km'),
(18, 15, '10-20km'),
(19, 16, '1 lieu'),
(20, 16, '2 lieux'),
(21, 16, '3 lieux'),
(22, 16, '4 lieux'),
(23, 16, '5 lieux'),
(24, 17, NULL),
(25, 18, 'pack 1'),
(26, 18, 'pack 2'),
(27, 18, 'pack 3'),
(28, 19, NULL),
(29, 20, '1 éclairage'),
(30, 20, '2 éclairage'),
(31, 20, '3 éclairage'),
(32, 21, NULL),
(33, 22, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `nom_artiste` varchar(30) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `num_tel` varchar(10) NOT NULL,
  `preference_contact` enum('mail','telephone') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `nom`, `prenom`, `nom_artiste`, `mail`, `num_tel`, `preference_contact`) VALUES
(1, 'isis', '$2y$10$tU3RuPy2ZDrJC.N0zlo/9uJrkQF8ptkIQ6KS0WkUVAsYN6nXfbtx.', 'argence', 'ismael', 'djWinstonRed', 'ismaelargence3@gmail.com', '0749284732', 'telephone'),
(2, 'nnn', '$2y$10$qj98ddrCXdb7COZ3RBDTOefFbTJSzHl8X5KYuCDA0HGQrXruN7aC6', 'feno', 'nathan', 'onur', 'nathan.fnls@gmail.com', '0783302322', 'telephone'),
(7, 'login', '$2y$10$kcoZUih/vB2sWqhoN8LuyOybyxcbX3U7lHdhXVKuE4msT.Of9IwQ6', 'nom', 'prenom', 'lartiste', 'yolo@gmail.com', '1231231452', 'mail'),
(8, 'oue', '$2y$10$wmRQTo5l4mH2CJWdnZz0g.PNSP.slFSerB7O1.xC6eZP/Ji9ZXv6i', 'nom', 'prenom', 'lartiste', 'artiste@gmail.com', '1234568910', 'mail'),
(9, 'poto', '$2y$10$uvpPlZlmAUUaJOxfH//DkeaLLM3gIU7yLFVi2L9RBGPQ3qOPP/r3q', 'siiiiiiiiiii', 'poto', 'Mr.Président', 'poto@yesir.com', '0609201507', 'telephone'),
(10, 'waf', '$2y$10$a1nDhJdhg.OvhIpdd5dzm.blTXRf2rXuvg4wxeVUjbr7vCB17iPg6', 'waf', 'waf', 'clebs', 'chien@chien.fr', '0101010101', 'mail'),
(11, 'istier', '$2y$10$DmhZHZBxKh6LAHuLk0LDruAT.7Q53A4vsepTvTHD3AHSEdRhadXbi', 'istier', 'istier', 'istierG', 'istier@gmail.com', '0102030405', 'telephone'),
(12, 'Carré', '$2y$10$5Xm54y2.XlQvHdYOqbtz8uICen4m0WKvX/h5GjtXpTNcxu51H2Sfa', 'MAMAMIHA', 'Yanis', 'Dijay Carray', 'DC.officiel@free.fr', '0404040440', 'mail'),
(13, 'ismael', '$2y$10$qV6.nSGM7VWW56vn21c1j.Y5QPNjxEF/oNUKqhBfSoKEtvpEd0FOm', 'argence', 'ismael', 'shmeil', 'oui@gmail.com', '0609201507', 'telephone');

--
-- Déclencheurs `utilisateurs`
--
DELIMITER $$
CREATE TRIGGER `trig_role` AFTER INSERT ON `utilisateurs` FOR EACH ROW INSERT INTO roles VALUES(
    NEW.id, 0, 1)
$$
DELIMITER ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `realisations`
--
ALTER TABLE `realisations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `resasupp`
--
ALTER TABLE `resasupp`
  ADD PRIMARY KEY (`id_reservation`,`id_supplement`),
  ADD KEY `cle etrangere supp` (`id_supplement`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `lieu` (`id_lieu`),
  ADD KEY `utilisateur` (`id_utilisateur`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD KEY `utilisateurs` (`id_utilisateur`);

--
-- Index pour la table `supplements`
--
ALTER TABLE `supplements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `suppsAvecChoix`
--
ALTER TABLE `suppsAvecChoix`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `supplements` (`id_supplement`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT pour la table `realisations`
--
ALTER TABLE `realisations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `supplements`
--
ALTER TABLE `supplements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `suppsAvecChoix`
--
ALTER TABLE `suppsAvecChoix`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `resasupp`
--
ALTER TABLE `resasupp`
  ADD CONSTRAINT `cle etrangere resa` FOREIGN KEY (`id_reservation`) REFERENCES `reservations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `lieu` FOREIGN KEY (`id_lieu`) REFERENCES `lieu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `utilisateurs` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `suppsAvecChoix`
--
ALTER TABLE `suppsAvecChoix`
  ADD CONSTRAINT `supplements` FOREIGN KEY (`id_supplement`) REFERENCES `supplements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
