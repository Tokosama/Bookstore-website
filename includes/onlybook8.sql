-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 24 juil. 2023 à 05:45
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `onlybook1.2`
--

-- --------------------------------------------------------

--
-- Structure de la table `domaines`
--

CREATE TABLE `domaines` (
  `id_domaine` int(255) NOT NULL,
  `nom_domaine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `domaines`
--

INSERT INTO `domaines` (`id_domaine`, `nom_domaine`) VALUES
(0, 'Littérature'),
(1, 'Informatique'),
(2, 'Droit'),
(3, 'Mathématiques'),
(4, 'Musique'),
(5, 'Sciences'),
(6, 'Economie'),
(7, 'Technologie');

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

CREATE TABLE `emprunts` (
  `id_emprunt` int(255) NOT NULL,
  `id_utilisateur` int(255) NOT NULL,
  `id_livre` int(255) NOT NULL,
  `date_emprunt` date NOT NULL DEFAULT current_timestamp(),
  `date_retour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emprunts`
--

INSERT INTO `emprunts` (`id_emprunt`, `id_utilisateur`, `id_livre`, `date_emprunt`, `date_retour`) VALUES
(31, 1, 9, '2023-07-20', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id_livre` int(255) NOT NULL,
  `Titre` varchar(500) NOT NULL,
  `Auteur` varchar(255) NOT NULL,
  `Affiche` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Nb_pages` int(255) NOT NULL,
  `exemplaires_disponibles` int(255) NOT NULL,
  `fichier_pdf` varchar(255) NOT NULL,
  `id_domaine` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id_livre`, `Titre`, `Auteur`, `Affiche`, `Description`, `Nb_pages`, `exemplaires_disponibles`, `fichier_pdf`, `id_domaine`) VALUES
(11, 'The 7 Habits of Highly Effective People', 'Stephen Covey', '7habits.WEBP', 'Un livre de développement personnel présentant sept habitudes des personnes hautement efficaces.', 381, 8, 'microsoft-office-excel-2010-for-dummies.pdf', 0),
(12, 'Excel 2010 for Dummies', 'Greg Harvey', 'excel.JPG', 'Un guide pour débutants sur l\'utilisation de Microsoft Excel 2010.', 416, 8, '9782311620177.pdf', 1),
(13, 'Les Misérables - Victor Hugo', 'Victor Hugo', 'miserable.JPG', 'Un roman classique de Victor Hugo se déroulant en France au 19e siècle.', 251, 8, 'Austen_ Orgueil et prejuges.pdf', 0),
(14, 'Les Métamorphoses', 'Ovide', 'metamorph.JPEG', 'Un livre contenant le poème narratif mythologique \"Les Métamorphoses\" d\'Ovide.', 256, 8, 'Think-And-Grow-Rich 2011-06.pdf', 0),
(15, 'Programmer en langage C (5e édition)', 'Claude Delannoy', 'langc.JPEG', 'Un guide pour la programmation en langage C par Claude Delannoy.', 962, 8, 'F034214.pdf', 1),
(16, '101 Dos & Don\'ts of UI Design', 'Will Grant', 'dosdont.PNG', 'Un guide fournissant des conseils et les bonnes pratiques pour la conception d\'interfaces utilisateur.', 216, 8, 'Feuilletage_1087', 1),
(17, '12 Rules for Life', 'Jordan B. Peterson', '12rul.JPEG', 'Un livre de développement personnel de Jordan B. Peterson offrant des conseils sur le développement personnel.', 448, 8, '12-Rules-for-Life.pdf', 3),
(18, 'Thomas Piketty', 'Thomas Piketty', 'piket.JPEG', 'Un livre écrit par Thomas Piketty, un économiste connu pour ses travaux sur les inégalités de richesse et de revenus.', 816, 8, 'For Outliers 171 (1).pdf', 6),
(19, 'Python Pour les Nuls', 'John Paul Mueller', 'python.JPEG', 'Un guide pour débutants sur la programmation en Python destiné aux lecteurs francophones.', 384, 8, 'python-pour-les-nuls.pdf', 1),
(20, 'Introduction au droit fiscal', 'Sébastien Salles', 'fisc.JPG', 'Une introduction au droit fiscal en français.', 480, 8, 'introduction-au-droit-fiscal.pdf', 2),
(21, '1984 (George Orwell)', 'George Orwell', '1984.jpeg', 'Un roman dystopique de George Orwell décrivant une société totalitaire.', 328, 8, 'PDF Orwell-1949 1984.pdf', 6),
(22, 'Devenez un leader', 'John C. Maxwell', 'leader.JPEG', 'Un livre de motivation explorant les principes et les stratégies de leadership.', 300, 8, 'devenez-un-leader.pdf', 5),
(23, 'Orgueil et Préjugés', 'Jane Austen', 'orgpre.JPEG', 'Un roman classique de Jane Austen, connu en anglais sous le titre \"Pride and Prejudice\".', 265, 8, 'Austen_Orgueil_et_prejuges.pdf', 0),
(24, 'Crime et Châtiment', 'Fyodor Dostoevsky', 'crime.JPEG', 'Un roman de Fyodor Dostoevsky explorant les thèmes de la culpabilité, de la morale et de la rédemption.', 671, 8, 'crime-et-chatiment.pdf', 2),
(25, 'Concevoir et développer des sites web avec Drupal', 'Hervé Soulard', 'drupal.JPEG', 'Un guide pour la conception et le développement de sites web utilisant le système de gestion de contenu Drupal.', 496, 8, 'concevoir-et-developper-des-sites-web-avec-drupal.pdf', 1),
(26, 'La Vente et la Négociation pas à pas', 'Daniel Pink', 'nego.JPG', 'Un guide sur les techniques de vente et de négociation.', 400, 8, 'la-vente-et-la-negociation-pas-a-pas.pdf', 6),
(27, 'Droit pénal général', 'Philippe Conte', 'penal.JPEG', 'Un livre fournissant une vue d\'ensemble du droit pénal général.', 360, 8, 'droit-penal-general.pdf', 2),
(28, 'Les Aventures de Tom', 'Mark Twain', 'tom.JPEG', 'Un livre en français présentant les aventures de Tom.', 320, 8, 'les-aventures-de-tom.pdf', 0),
(29, 'Internet Pour Les Nuls', 'John R. Levine', 'internul.JPEG', 'Un guide pour les débutants sur l\'utilisation d\'Internet destiné aux lecteurs francophones.', 464, 8, 'internet-pour-les-nuls.pdf', 1),
(30, 'WordPress 3: Toutes les clés pour créer, maintenir et faire évoluer votre site web', 'Hervé Sabourin', 'web.JPEG', 'Un guide complet sur l\'utilisation de WordPress pour la création et la gestion de sites web.', 520, 8, 'wordpress-3-toutes-les-cles.pdf', 2),
(31, 'Outliers', 'Malcolm Gladwell', 'outlier.JPEG', 'Un livre de Malcolm Gladwell explorant les facteurs qui contribuent à un haut niveau de réussite.', 309, 8, 'outliers.pdf', 5),
(32, 'Design of Everyday Things', 'Don Norman', 'design.JPEG', 'Un livre de Don Norman explorant les principes du design centré sur l\'utilisateur.', 368, 8, 'design-of-everyday-things.pdf', 6),
(33, 'Design Systems', 'Alla Kholmatova', 'desigsys.PNG', 'Un livre abordant le concept et la mise en place de systèmes de design.', 264, 8, 'design-systems.pdf', 1),
(34, 'Man\'s Search for Meaning', 'Viktor E. Frankl', 'meaning.jpeg', 'Un livre de Viktor E. Frankl explorant son expérience dans les camps de concentration nazis et la quête de sens dans la vie.', 165, 8, 'mans-search-for-meaning.pdf', 5),
(35, 'Meditations (Marcus Aurelius)', 'Marcus Aurelius', 'medit.jpg', 'Une collection d\'écrits philosophiques de l\'empereur romain Marcus Aurelius.', 0, 8, 'meditations-marcus-aurelius.pdf', 7),
(36, 'Spark Joy: An Illustrated Master Class on the Art of Organizing and Tidying Up (Marie Kondo)', 'Marie Kondo', 'art.JPEG', 'Un livre de Marie Kondo offrant des conseils sur le rangement et l\'organisation de l\'espace de vie.', 304, 8, 'Marie_Kondo-Spark_Joy_An_Illustrated_Master_Class_.pdf', 1),
(37, 'Designing Interfaces (2nd Edition)', 'Jenifer Tidwell', 'interfaces.jpeg', 'Un livre sur les principes et les meilleures pratiques de conception d\'interfaces.', 349, 8, 'designing-interfaces-2nd-edition.pdf', 6),
(38, 'Think and Grow Rich', 'Napoleon Hill', 'think.JPEG', 'Un livre de développement personnel de Napoleon Hill mettant l\'accent sur l\'importance de la pensée positive et de la fixation d\'objectifs.', 238, 8, 'F034214.pdf', 5),
(39, 'What to Do Next', 'N/A', 'todo.JPEG', 'Un livre inconnu avec le titre \"What to Do Next.\"', 0, 8, 'design-systems.pdf', 1),
(40, 'Who Moved My Cheese?', 'Spencer Johnson', 'cheese.JPEG', 'Un livre de motivation de Spencer Johnson utilisant une parabole pour illustrer l\'importance de s\'adapter au changement.', 96, 8, 'mat.pdf', 1),
(41, 'Père riche père pauvre', 'Robert T. Kiyosaki', 'perep.JPG', 'Un livre sur les leçons financières apprises de deux pères.', 0, 8, '9782311620177.pdf', 7),
(42, 'L\'Homme inutile : Du bon usage de l\'économie', 'Hélène Durand', 'men.png', 'Un livre explorant l\'utilité et l\'impact de l\'économie sur les individus et la société.', 0, 8, 'homme-inutile-du-bon-usage-de-l-economie.pdf', 7),
(43, 'Elon Musk – Tesla, Paypal, SpaceX : l’entrepreneur qui va changer le monde', 'Ashlee Vance', 'musk.jpeg', 'Un livre sur la vie et les réalisations d\'Elon Musk, un entrepreneur visionnaire.', 0, 8, 'elon-musk-tesla-paypal-spacex.pdf', 7),
(44, 'Stephen Hawking - Par-delà la légende', 'Christophe Galfard', 'hawk.jpeg', 'Un livre retraçant la vie et les contributions de Stephen Hawking à la science.', 0, 8, 'stephen-hawking-par-dela-la-legende.pdf', 6),
(45, 'Récoltes et semailles — Alexandre Grothedieck', 'Jean-Pierre Bourguignon', 'recolte.jpeg', 'Un livre sur la vie et les travaux du mathématicien Alexandre Grothendieck.', 0, 8, 'recoltes-et-semailles-alexandre-grothendieck.pdf', 4),
(46, 'COURS DE MATHEMATIQUE 1ère année', 'Arnaud Bodin', 'exo7.jpg', 'Recueil des fonctions mathematiques', 246, 8, 'mat.pdf', 3),
(47, 'COURS DE BASE DE MUSIQUE', 'L’Eglise de Jésus-Christ des Saints des Derniers Jours', 'direction.jpg', 'Une introduction aux concepts musicaux', 110, 8, 'ma1.pdf', 4),
(48, 'Mathématiques Méthodes et Exercices PC-PSI-PT', 'Guillaume Haberer', 'matpc.jpg', 'Des cours de mathématique PC-PSI-PT', 527, 8, 'm1.pdf', 3),
(49, 'COURS DE CLAVIER (piano)', 'L’Eglise de Jésus-Christ des Saints des Derniers Jours', 'piano.jpg', 'Introduction au clavier (piano)', 163, 8, 'pia.pdf', 4),
(50, 'Extrait de cours 3eme Technologie', 'Thors', 'tech.jpg', 'Un cours de 3ème en Technologie', 265, 8, 'tec.pdf', 7),
(51, 'Introduction à la technologie', 'Bernard Lavallée', 'techno.jpg', 'La base de la technologie', 148, 8, 'tek1.pdf', 7);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL,
  `Nb_D'emprunt` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `Nom`, `Prenom`, `Email`, `Mot_de_passe`, `Nb_D'emprunt`) VALUES
(1, 'Paraiso', 'Parker', 'fouzoparaiso@gmail.com', '1234', 1),
(2, 'Marina', 'Agbessy', 'fouzamerfzm@gmail.com', '1234', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `domaines`
--
ALTER TABLE `domaines`
  ADD PRIMARY KEY (`id_domaine`);

--
-- Index pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD PRIMARY KEY (`id_emprunt`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id_livre`),
  ADD UNIQUE KEY `id_livre` (`id_livre`),
  ADD KEY `id_livre_2` (`id_livre`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emprunts`
--
ALTER TABLE `emprunts`
  MODIFY `id_emprunt` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id_livre` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
