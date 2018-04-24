-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 31 Mars 2018 à 19:34
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alan`
--

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` int(99) NOT NULL,
  `author` int(99) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `attachments` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projects`
--

INSERT INTO `projects` (`id`, `author`, `title`, `description`, `attachments`, `date`, `status`) VALUES
(1, 1, 'New Project', 'new projec is cool', '', '2018-03-30 21:53:53', 'publish'),
(6, 1, 'Test', 'Desc', '', '2018-03-31 15:03:37', 'publish'),
(7, 1, 'Project for allen', 'New Project', '', '2018-03-31 15:44:52', 'publish'),
(8, 1, 'Test project notification', 'Test', '', '2018-03-31 16:21:07', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `project_meta`
--

CREATE TABLE `project_meta` (
  `id` bigint(99) NOT NULL,
  `project_id` bigint(99) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `project_meta`
--

INSERT INTO `project_meta` (`id`, `project_id`, `meta_key`, `meta_value`) VALUES
(1, 0, 'anonymousSubmit', ''),
(2, 0, 'anonymousSubmit', ''),
(3, 0, 'assignees', '2'),
(4, 0, 'assignees', '5'),
(5, 1, 'assignees', '2'),
(6, 1, 'assignees', '5'),
(7, 2, 'assignees', '2'),
(8, 2, 'assignees', '5'),
(9, 3, 'assignees', '2'),
(10, 3, 'assignees', '5'),
(11, 4, 'assignees', '1'),
(12, 4, 'assignees', '2'),
(13, 5, 'assignees', '2'),
(14, 6, 'assignees', '2'),
(15, 7, 'assignees', '2'),
(16, 8, 'assignees', '2'),
(17, 8, 'assignees', '5');

-- --------------------------------------------------------

--
-- Structure de la table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(99) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `terms`
--

INSERT INTO `terms` (`id`, `name`, `color`) VALUES
(2, 'Computer', '#4C4CFF'),
(3, 'Architecture', '#cdf239');

-- --------------------------------------------------------

--
-- Structure de la table `term_project`
--

CREATE TABLE `term_project` (
  `id` bigint(99) NOT NULL,
  `project_id` bigint(99) NOT NULL,
  `term_id` bigint(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `term_project`
--

INSERT INTO `term_project` (`id`, `project_id`, `term_id`) VALUES
(1, 0, 3),
(2, 1, 3),
(3, 2, 3),
(4, 3, 3),
(5, 4, 3),
(6, 5, 3),
(7, 6, 2),
(8, 6, 3),
(9, 7, 2),
(10, 7, 3),
(11, 8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(99) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `display_name`, `password`, `email`, `role`) VALUES
(1, 'Alan', '$2a$12$769a6fda1d4de82eb0dc3ec7uPoFixGioWE/JRVHxs.p9a4BRS95C', 'sw3456q@greenwich.ac.uk', 0),
(2, 'Allen', '$2a$12$05447101d89773ba13566uq.nSkic0CUt2rmoeZF9/ytOmc2uVJxG', 'alanw235@hotmail.com', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project_meta`
--
ALTER TABLE `project_meta`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `term_project`
--
ALTER TABLE `term_project`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `project_meta`
--
ALTER TABLE `project_meta`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `term_project`
--
ALTER TABLE `term_project`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
