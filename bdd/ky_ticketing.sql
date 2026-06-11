-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 juin 2026 à 10:46
-- Version du serveur : 10.11.16-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ky_ticketing`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_message` text NOT NULL,
  `created_at_message` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `ticket_id`, `user_id`, `content_message`, `created_at_message`) VALUES
(1, 1, 2, 'Bonjour, votre ticket a été pris en charge par notre équipe. Merci', '2026-05-16 12:16:08'),
(2, 1, 3, 'Merci, j&#039;attend votre retour !\r\n', '2026-05-16 12:22:52'),
(3, 1, 1, 'Votre ticket a été résolu !', '2026-05-18 16:37:47'),
(4, 9, 7, 'Bonjour, je ne reçois plus vos emails.', '2026-05-19 11:08:54'),
(5, 7, 7, 'Bonjour, je modifie mon adresse mais rien ne s’enregistre.', '2026-05-19 11:12:33'),
(6, 9, 4, 'Bonjour, nous avons pris connaissance de votre problème. \r\n', '2026-05-19 11:16:28'),
(7, 9, 4, 'Avez-vous vérifié vos spams ?', '2026-05-19 11:16:41'),
(8, 3, 4, 'Bonjour, nous avons pris connaissance de votre préoccupation. ', '2026-05-19 11:19:38'),
(9, 3, 4, 'Quel navigateur utilisez-vous ?', '2026-05-19 11:20:55'),
(10, 5, 2, 'Bonjour, nous avons pris en compte votre préoccupation. Cela se produit sur tous vos appareils ou seulement un ?', '2026-05-19 11:45:36'),
(11, 6, 6, 'Bonjour, j’ai une erreur 500 quand j’essaie d’envoyer le formulaire d’inscription.', '2026-05-19 11:46:10'),
(12, 7, 2, 'Bonjour, nous avons pris en compte votre probleme. Avez-vous un message d’erreur ?', '2026-05-19 11:48:17'),
(13, 6, 5, 'Bonjour, merci pour votre message. Cela arrive dès que vous cliquez sur “Valider&quot; ?', '2026-05-19 11:50:01'),
(14, 6, 6, 'Oui, immédiatement.', '2026-05-19 11:52:41'),
(15, 6, 5, 'Avez-vous joint un fichier ou rempli un champ particulier ?', '2026-05-19 11:58:28'),
(16, 6, 6, 'Oui, j’ai ajouté une photo de profil.', '2026-05-19 11:59:09'),
(17, 6, 5, 'Je ne vois rien d’anormal côté client. Je passe le ticket à un collègue backend.', '2026-05-19 11:59:42'),
(18, 6, 2, 'Bonjour, j&#039;ai regardé et l’erreur vient d’une validation serveur sur le champ &quot;avatar&quot;. Le système refuse certains formats.', '2026-05-19 12:01:31'),
(19, 6, 1, ' Je viens de corriger la règle de validation et d’augmenter la taille maximale autorisée...', '2026-05-19 12:07:07'),
(20, 6, 1, '\r\nVous pouvez réessayer maintenant.', '2026-05-19 12:07:56'),
(21, 6, 6, 'Ça marche, merci à toute l’équipe !\r\n', '2026-05-19 12:08:16'),
(22, 2, 1, 'Je suis entrain de vérifier ce ticket', '2026-05-19 13:04:11'),
(23, 5, 6, 'J’ai essayé sur mon PC et mon téléphone, même problème.', '2026-05-19 13:14:11'),
(24, 5, 2, 'Pouvez-vous essayer en navigation privée ?', '2026-05-19 13:20:45'),
(25, 5, 6, 'En navigation privée, ça marche.', '2026-05-19 13:26:01'),
(26, 2, 1, 'Je suis entrain de vérifier ce ticket', '2026-05-19 13:27:49'),
(27, 3, 3, 'edge, chrome', '2026-05-20 08:39:05'),
(28, 3, 3, 'aussi safari', '2026-05-20 08:39:39'),
(29, 7, 7, ' Non, ça revient juste à l’ancienne adresse.', '2026-05-20 08:42:07'),
(30, 7, 2, 'Je vois une erreur côté serveur sur votre profil. ', '2026-05-20 08:43:49'),
(31, 5, 2, ' Le problème vient probablement du cache. ', '2026-05-20 08:57:11'),
(32, 5, 2, 'Pouvez-vous vider le cache de votre navigateur ?', '2026-05-20 09:06:00'),
(33, 3, 4, 'Nous avons corrigé le problème. Vous pouvez tester et nous confirmer\r\n', '2026-06-10 18:45:24'),
(34, 3, 3, 'Oui, les onglets s&#039;affichent correctement maintenant! Merci.', '2026-06-10 18:46:54');

-- --------------------------------------------------------

--
-- Structure de la table `priorities`
--

CREATE TABLE `priorities` (
  `id_priority` int(11) NOT NULL,
  `name_priority` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `priorities`
--

INSERT INTO `priorities` (`id_priority`, `name_priority`) VALUES
(4, 'Critique'),
(1, 'Faible'),
(3, 'Haute'),
(2, 'Moyenne');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `name_role`) VALUES
(3, 'Administrateur'),
(2, 'Technicien'),
(1, 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE `statuts` (
  `id_statut` int(11) NOT NULL,
  `name_statut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `statuts`
--

INSERT INTO `statuts` (`id_statut`, `name_statut`) VALUES
(4, 'En attente utilisateur'),
(3, 'En cours'),
(6, 'Fermé'),
(1, 'Nouveau'),
(2, 'Ouvert'),
(5, 'Résolu');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL,
  `title_ticket` varchar(255) NOT NULL,
  `description_ticket` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `statut_id` int(11) NOT NULL,
  `priority_id` int(11) NOT NULL,
  `created_at_ticket` timestamp NULL DEFAULT current_timestamp(),
  `updated_at_ticket` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id_ticket`, `title_ticket`, `description_ticket`, `user_id`, `assigned_to`, `statut_id`, `priority_id`, `created_at_ticket`, `updated_at_ticket`) VALUES
(1, 'Problème de connexion', 'Lorsque je saisi mes identifiants, je ne quitte pas la page de connexion pourtant les identifiants sont correctes. ', 3, 2, 6, 4, '2026-05-01 18:19:53', '2026-05-18 16:38:33'),
(2, 'Envoi Formulaire', 'Le bouton du formulaire ne fonctionne pas', 3, 4, 1, 3, '2026-05-19 09:44:47', '2026-05-19 10:42:27'),
(3, 'Affichage onglet', 'La barre des onglets ne s&#039;affiche pas correctement', 3, 4, 3, 1, '2026-05-19 09:45:37', '2026-05-24 11:17:11'),
(4, 'Mot de passe oublié non réinitialisable', 'Le lien de réinitialisation envoyé par email ne fonctionne pas ou expire immédiatement, empêchant le client de récupérer son compte.', 6, 5, 2, 1, '2026-05-19 10:00:22', '2026-06-11 08:12:01'),
(5, 'Chargement infini de la page', 'Lorsqu’il tente d’accéder à une fonctionnalité (dashboard, panier, profil…), la page reste bloquée sur un écran de chargement.', 6, 2, 4, 3, '2026-05-19 10:00:53', '2026-05-19 11:46:41'),
(6, 'Erreur 500 lors de la validation d’un formulaire', 'Le client reçoit une erreur serveur lorsqu’il soumet un formulaire (inscription, commande, demande de contact…).', 6, 5, 5, 4, '2026-05-19 10:01:50', '2026-05-19 12:11:50'),
(7, 'Données du profil qui ne se sauvegardent pas', 'Le client modifie ses informations (adresse, téléphone, préférences), mais les changements ne sont pas enregistrés.', 7, 2, 4, 3, '2026-05-19 10:06:04', '2026-05-19 11:48:33'),
(8, 'Problème d’affichage sur certains navigateurs', 'Le site apparaît déformé ou certaines fonctionnalités ne fonctionnent pas sur Safari, Firefox ou mobile.', 7, 5, 1, 2, '2026-05-19 10:06:29', '2026-05-19 13:28:56'),
(9, 'Notifications email non reçues', 'Le client ne reçoit plus les emails automatiques (confirmation, facture, alertes…), même dans les spams.', 7, 4, 4, 2, '2026-05-19 10:07:13', '2026-05-19 11:25:30'),
(10, 'azert', 'rfdtfjkkj', 3, NULL, 1, 4, '2026-06-11 08:09:42', '2026-06-11 08:09:42');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `email_user` varchar(150) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at_user` timestamp NOT NULL DEFAULT current_timestamp(),
  `isActif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `email_user`, `password_user`, `role_id`, `created_at_user`, `isActif`) VALUES
(1, 'PhilE', 'phil@test.com', '$2y$10$fa5E/7WIBGJ0IbIhkeukpOahWBB5nPLpIX.BjTwBFxljmW0jbHrRC', 3, '2026-04-30 22:22:01', 1),
(2, 'Paul', 'paul@test.com', '$2y$10$Q/AT/a6KN9mHg.H/D6c.mOik6QNfJPvjrugNc2YXJLARGW8G4qgVq', 2, '2026-05-01 17:00:18', 0),
(3, 'Juleszz', 'jules@test.com', '$2y$10$bOV8Zq8LQgvqkLjdJOcs6ucuCkrwAyfs2wPUP28Nv5th5cAwDmY12', 1, '2026-05-01 17:00:57', 1),
(4, 'Patrick', 'patrick@test.com', '$2y$10$IZYvmvJeKvMzQL80RG3BR.cQEskmHmewkNBeAxtBWwgYTbkNDwX6e', 2, '2026-05-19 09:49:54', 1),
(5, 'Papy', 'papy@test.com', '$2y$10$YXpe1OHz2KclN/mIc2yLBuBxhXY8Lpe0Q/TbkrJsUR/6EzYyB/Cle', 2, '2026-05-19 09:50:44', 1),
(6, 'John', 'john@test.com', '$2y$10$WiwSI.LNJdP4oTXi79eKZu1GpHFC8hyZ.NToQl4cwaE6RktgBgocu', 1, '2026-05-19 09:51:18', 1),
(7, 'Jean', 'jean@test.com', '$2y$10$yRwkChI3spZsmwBmkGnHPenF7/47cjSEpF2B1qo1HuoCLzJDsXi/i', 1, '2026-05-19 09:51:53', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id_priority`),
  ADD UNIQUE KEY `name_priority` (`name_priority`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `name_role` (`name_role`);

--
-- Index pour la table `statuts`
--
ALTER TABLE `statuts`
  ADD PRIMARY KEY (`id_statut`),
  ADD UNIQUE KEY `name_statut` (`name_statut`);

--
-- Index pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `assigned_to` (`assigned_to`),
  ADD KEY `statut_id` (`statut_id`),
  ADD KEY `priority_id` (`priority_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_user` (`email_user`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id_priority` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `statuts`
--
ALTER TABLE `statuts`
  MODIFY `id_statut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id_ticket`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id_user`) ON DELETE SET NULL,
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`statut_id`) REFERENCES `statuts` (`id_statut`),
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`priority_id`) REFERENCES `priorities` (`id_priority`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id_role`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
