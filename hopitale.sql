-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 24 Janvier 2018 à 17:47
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hopitale`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambres`
--

CREATE TABLE `chambres` (
  `id` int(10) UNSIGNED NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numChambre` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `chambres`
--

INSERT INTO `chambres` (`id`, `service`, `numChambre`, `num`, `created_at`, `updated_at`) VALUES
(1, 'B', '666', 3, NULL, NULL),
(2, 'D', '646', 1, NULL, NULL),
(3, 'A', '1', 0, NULL, NULL),
(4, 'E', '546', 0, NULL, NULL),
(5, 'F', 'A5', 0, '2018-01-23 21:43:08', '2018-01-23 21:43:08'),
(6, 'G', '546', 0, '2018-01-23 22:48:25', '2018-01-23 22:48:25'),
(7, 'C', '555', 0, '2018-01-23 22:48:44', '2018-01-23 22:48:44'),
(8, 'C', '667', 0, '2018-01-23 22:49:10', '2018-01-23 22:49:10'),
(10, 'Z', '1995', 1, '2018-01-24 11:23:36', '2018-01-24 11:23:36'),
(11, 'AA', 'A6', 0, '2018-01-24 14:34:46', '2018-01-24 14:34:46');

-- --------------------------------------------------------

--
-- Structure de la table `consultations`
--

CREATE TABLE `consultations` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `consultations`
--

INSERT INTO `consultations` (`id`, `patient_id`, `created_at`, `updated_at`) VALUES
(23, 6, '2018-01-22 23:00:00', '2018-01-23 18:38:56'),
(22, 7, '2018-01-22 23:00:00', '2018-01-23 18:27:27'),
(19, 7, '2018-01-22 23:00:00', '2018-01-23 18:17:11'),
(15, 7, '2018-01-07 23:00:00', '2018-01-08 13:10:19');

-- --------------------------------------------------------

--
-- Structure de la table `examens`
--

CREATE TABLE `examens` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rendez_vous` date DEFAULT NULL,
  `fichier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'examen',
  `patient_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `examens`
--

INSERT INTO `examens` (`id`, `nom`, `rendez_vous`, `fichier`, `desc`, `type`, `patient_id`, `created_at`, `updated_at`) VALUES
(27, 'IRM fonctionnelle', '2018-01-24', NULL, NULL, 'examen', 7, '2018-01-23 23:12:51', '2018-01-23 23:12:51'),
(26, '"qeyrhtyukogf', NULL, '1516738154.jpg', 'trfygufhklgfy', 'examen', 7, '2018-01-23 19:09:14', '2018-01-23 19:09:14'),
(28, 'scanner', '2018-01-24', NULL, NULL, 'examen', 7, '2018-01-24 14:37:28', '2018-01-24 14:37:28'),
(23, 'NomEx', NULL, NULL, 'Ficher d\'e', 'examen', 7, '2018-01-07 23:00:00', '2018-01-08 13:07:33'),
(22, 'Examen11', '2018-03-16', NULL, NULL, 'examen', 7, '2018-01-07 23:00:00', '2018-01-08 13:06:33'),
(21, 'Ax3', '2018-05-27', NULL, NULL, 'examen', 6, '2018-01-07 23:00:00', '2018-01-08 12:30:14'),
(20, 'Ex2', '2018-01-13', NULL, NULL, 'examen', 6, '2018-01-07 23:00:00', '2018-01-08 12:30:00'),
(19, 'Ex1', NULL, NULL, NULL, 'examen', 7, '2018-01-07 23:00:00', '2018-01-08 12:09:16');

-- --------------------------------------------------------

--
-- Structure de la table `hospitalisations`
--

CREATE TABLE `hospitalisations` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `lit_num` int(10) UNSIGNED DEFAULT NULL,
  `chambre_num` int(10) UNSIGNED DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hospitalisation',
  `rendez_vous` date DEFAULT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `hospitalisations`
--

INSERT INTO `hospitalisations` (`id`, `patient_id`, `lit_num`, `chambre_num`, `service`, `type`, `rendez_vous`, `debut`, `fin`, `created_at`, `updated_at`) VALUES
(35, 7, 4, 666, 'B', 'hospitalisation', NULL, '2018-01-28', '2018-04-26', '2018-01-24 11:33:08', '2018-01-24 11:33:08'),
(34, 7, 2, 646, 'A', 'hospitalisation', NULL, '2018-01-24', '2018-01-24', '2018-01-24 09:42:59', '2018-01-24 09:42:59'),
(33, 7, 3, 666, 'B', 'hospitalisation', NULL, '2018-04-14', '2018-06-16', '2018-01-24 09:33:08', '2018-01-24 09:33:08'),
(31, 7, 1, 666, 'B', 'hospitalisation', '2018-04-14', '2018-04-14', '2018-05-25', '2018-01-24 09:09:50', '2018-01-24 09:09:50'),
(30, 7, 3, 1, 'A', 'hospitalisation', NULL, '2018-03-17', '2018-07-21', '2018-01-24 08:42:52', '2018-01-24 08:42:52'),
(29, 7, 3, 1, 'A', 'hospitalisation', NULL, '2018-01-24', '2018-01-24', '2018-01-24 08:36:59', '2018-01-24 08:36:59'),
(32, 7, 2, 646, 'A', 'hospitalisation', NULL, '2018-01-24', '2018-01-24', '2018-01-24 09:32:09', '2018-01-24 09:32:09'),
(25, 6, NULL, NULL, NULL, 'hospitalisation', NULL, '2018-03-10', '2018-06-23', '2018-01-07 23:00:00', '2018-01-08 12:30:38'),
(23, 6, 1, 546, 'A', 'hospitalisation', '2018-06-16', '2018-06-16', '2018-08-19', '2018-01-07 23:00:00', '2018-01-08 12:24:13'),
(27, 7, NULL, NULL, NULL, 'hospitalisation', '2018-04-15', '2018-04-15', '2018-05-26', '2018-01-07 23:00:00', '2018-01-08 13:35:13'),
(22, 6, 2, 646, 'B', 'hospitalisation', NULL, '2018-01-08', '2018-01-08', '2018-01-07 23:00:00', '2018-01-08 11:35:17');

-- --------------------------------------------------------

--
-- Structure de la table `infermiers`
--

CREATE TABLE `infermiers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image.jpg',
  `archive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non',
  `song` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlf` int(11) NOT NULL,
  `IdUser` int(11) DEFAULT NULL,
  `datNai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `infermiers`
--

INSERT INTO `infermiers` (`id`, `nom`, `prenom`, `adresse`, `email`, `sexe`, `grade`, `image`, `archive`, `song`, `specialite`, `tlf`, `IdUser`, `datNai`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin', 'adresse', 'admin@gmail.com', 'Homme', 'grade', '1515413938.jpg', 'non', 'A+', 'specialite', 512456348, 21, NULL, '2018-01-07 23:50:40', '2018-01-08 11:18:58'),
(12, 'guerrab', 'leila', 'remchi', 'guerrab@gmail.com', 'Femme', 'ATS', '1515414139.jpg', 'non', 'A+', 'radio', 556565312, 43, '1978-05-05', '2018-01-08 11:22:19', '2018-01-08 11:22:19'),
(13, 'mohemd', 'mohamed', 'remchi', 'mohamedgh@gmail.com', 'Homme', 'OP', '1515414290.png', 'non', 'A+', 'radio', 335585550, 44, '1958-08-07', '2018-01-08 11:24:51', '2018-01-08 11:24:51');

-- --------------------------------------------------------

--
-- Structure de la table `lettre_d_orientations`
--

CREATE TABLE `lettre_d_orientations` (
  `id` int(10) UNSIGNED NOT NULL,
  `consultation_id` int(10) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `lettre_d_orientations`
--

INSERT INTO `lettre_d_orientations` (`id`, `consultation_id`, `desc`, `created_at`, `updated_at`) VALUES
(6, 15, 'fdhgjhufkc\r\ntxfujkigy', '2018-01-22 23:00:00', '2018-01-23 18:09:24'),
(5, 14, 'salam alaikom', '2018-01-07 23:00:00', '2018-01-08 11:33:32'),
(9, 23, 'gdfhvjkblm,jk;bhgvcf', '2018-01-22 23:00:00', '2018-01-23 18:39:06');

-- --------------------------------------------------------

--
-- Structure de la table `liste_examens`
--

CREATE TABLE `liste_examens` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `liste_examens`
--

INSERT INTO `liste_examens` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(2, 'scanner', '2018-01-23 20:58:59', '2018-01-23 20:58:59'),
(3, 'scanner', '2018-01-23 20:59:11', '2018-01-23 20:59:11'),
(4, 'scanner11', '2018-01-23 21:19:20', '2018-01-23 21:19:20'),
(20, 'examens sanguins', '2018-01-24 11:23:00', '2018-01-24 11:23:00'),
(7, 'examens sanguins', '2018-01-23 21:25:05', '2018-01-23 21:25:05'),
(8, 'urographie intra-veineuse', '2018-01-23 21:25:38', '2018-01-23 21:25:38'),
(9, 'lavement baryté', '2018-01-23 21:25:51', '2018-01-23 21:25:51'),
(10, 'échographie', '2018-01-23 21:26:05', '2018-01-23 21:26:05'),
(11, 'électrocardiogramme (ECG)', '2018-01-23 21:26:24', '2018-01-23 21:26:24'),
(12, 'électroencéphalogramme (EEG)', '2018-01-23 21:26:41', '2018-01-23 21:26:41'),
(13, 'tomographie à émission de positron', '2018-01-23 21:27:13', '2018-01-23 21:27:13'),
(14, 'IRM fonctionnelle', '2018-01-23 21:27:42', '2018-01-23 21:27:42'),
(15, 'pléthysmographie', '2018-01-23 21:28:15', '2018-01-23 21:28:15'),
(16, 'examen de l\'ouïe', '2018-01-23 21:28:50', '2018-01-23 21:28:50'),
(17, 'ophtalmoscopie', '2018-01-23 21:29:14', '2018-01-23 21:29:14'),
(18, 'scanner123', '2018-01-23 23:06:57', '2018-01-23 23:06:57'),
(21, 'scanner13', '2018-01-24 14:36:40', '2018-01-24 14:36:40');

-- --------------------------------------------------------

--
-- Structure de la table `lits`
--

CREATE TABLE `lits` (
  `id` int(10) UNSIGNED NOT NULL,
  `numLit` int(11) NOT NULL,
  `dispo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non',
  `chambre_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `lits`
--

INSERT INTO `lits` (`id`, `numLit`, `dispo`, `chambre_id`, `created_at`, `updated_at`) VALUES
(2, 1, 'oui', 1, NULL, NULL),
(3, 2, 'oui', 2, NULL, NULL),
(4, 3, 'oui', 1, '2018-01-23 22:49:52', '2018-01-23 22:49:52'),
(9, 1, 'non', 10, '2018-01-24 11:24:00', '2018-01-24 11:24:00'),
(6, 4, 'oui', 1, '2018-01-23 22:51:25', '2018-01-23 22:51:25');

-- --------------------------------------------------------

--
-- Structure de la table `medecins`
--

CREATE TABLE `medecins` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image.jpg',
  `archive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non',
  `specialite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlf` int(11) NOT NULL,
  `song` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IdUser` int(11) DEFAULT NULL,
  `datNai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `medecins`
--

INSERT INTO `medecins` (`id`, `nom`, `prenom`, `adresse`, `email`, `sexe`, `grade`, `image`, `archive`, `specialite`, `tlf`, `song`, `IdUser`, `datNai`, `created_at`, `updated_at`) VALUES
(2, 'bendaoud', 'sihem', 'tlemcen', 'bendaoud@gmail.com', 'Femme', 'resident', '1515412836.jpg', 'non', 'Cardiologue', 556565312, 'B+', 32, '1978-12-31', '2018-01-08 11:00:36', '2018-01-08 11:00:36'),
(3, 'bendaoud', 'wided', 'tlemcen', 'wided@gmail.com', 'Femme', 'resident', '1515412963.jpg', 'non', 'dentiste', 535585550, 'A+', 49, '1978-04-08', '2018-01-08 11:02:43', '2018-01-08 11:02:43'),
(4, 'khaled', 'mohamed', 'remchi', 'khaled@gmail.com', 'Homme', 'generaliste', '1516452829.jpg', 'non', 'radio', 556565312, 'B-', 34, '1950-12-31', '2018-01-08 11:03:57', '2018-01-20 11:53:49'),
(5, 'bendaoud', 'sihem', 'tlemcen', 'bendaoud1@gmail.com', 'Femme', 'resident', '1515412836.jpg', 'non', 'Cardiologue', 556565312, 'B+', 37, '1978-12-31', '2018-01-08 11:00:36', '2018-01-08 11:00:36'),
(6, 'bendaoud', 'wided', 'tlemcen', 'wided1@gmail.com', 'Femme', 'resident', '1516452812.jpg', 'non', 'dentiste', 535585550, 'A+', 40, '1978-04-08', '2018-01-08 11:02:43', '2018-01-20 11:53:32'),
(13, 'Ben', 'Sihem', 'tlemcen', 'smmd@gmail.com', 'Femme', 'Docteur', '1515420185.jpg', 'non', 'Cardiologue', 335585550, 'A+', 50, '1950-12-31', '2018-01-08 13:03:06', '2018-01-08 13:03:06'),
(8, 'bendaoud', 'sihem', 'tlemcen', 'bendaoud2@gmail.com', 'Femme', 'resident', '1515412836.jpg', 'non', 'Cardiologue', 556565312, 'B+', 38, '1978-12-31', '2018-01-08 11:00:36', '2018-01-08 11:00:36'),
(9, 'bendaoud', 'wided', 'tlemcen', 'wided2@gmail.com', 'Femme', 'resident', '1515412963.jpg', 'oui', 'dentiste', 535585550, 'A+', 41, '1978-04-08', '2018-01-08 11:02:43', '2018-01-08 11:02:43'),
(10, 'khaled', 'mohamed', 'remchi', 'khaled2@gmail.com', 'Homme', 'generaliste', '1515413037.jpg', 'non', 'radio', 556565312, 'B-', 36, '1950-12-31', '2018-01-08 11:03:57', '2018-01-08 11:03:57'),
(12, 'bendaoud', 'wided', 'tlemcen', 'wided3@gmail.com', 'Femme', 'resident', '1515412963.jpg', 'non', 'dentiste', 535585550, 'A+', 42, '1978-04-08', '2018-01-08 11:02:43', '2018-01-08 11:02:43');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ordonnances`
--

CREATE TABLE `ordonnances` (
  `id` int(10) UNSIGNED NOT NULL,
  `consultation_id` int(10) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `ordonnances`
--

INSERT INTO `ordonnances` (`id`, `consultation_id`, `desc`, `created_at`, `updated_at`) VALUES
(10, 15, 'nb ,nvhjk;:nk:j', '2018-01-22 23:00:00', '2018-01-23 18:27:46'),
(8, 19, 'sqfdghxgcjkhkgjf', '2018-01-22 23:00:00', '2018-01-23 18:17:15'),
(13, 23, 'xcghjkl, nn; jh', '2018-01-22 23:00:00', '2018-01-23 18:39:00'),
(6, 14, 'salam alaikom  hi', '2018-01-07 23:00:00', '2018-01-08 11:32:20');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NumSecurite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image.jpg',
  `archive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non',
  `song` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlf` int(11) NOT NULL,
  `taille` double(8,2) NOT NULL,
  `poid` double(8,2) NOT NULL,
  `IdUser` int(11) DEFAULT NULL,
  `datNai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `patients`
--

INSERT INTO `patients` (`id`, `nom`, `prenom`, `adresse`, `email`, `sexe`, `NumSecurite`, `image`, `archive`, `song`, `tlf`, `taille`, `poid`, `IdUser`, `datNai`, `created_at`, `updated_at`) VALUES
(6, 'bendaoud', 'radjaa', 'tlemcen', 'radjaa@gmail.com', 'Enfant', '123859', '1515414490.jpg', 'oui', 'B+', 335585550, 140.00, 33.00, 52, '2015-05-05', '2018-01-07 23:00:00', '2018-01-08 11:28:10'),
(7, 'khaled', 'ritedj', 'remchi', 'ritedj@gmail.com', 'Enfant', '124766', '1515414601.jpg', 'non', 'A+', 556565312, 100.00, 20.00, 51, '2015-11-15', '2018-01-07 23:00:00', '2018-01-08 11:30:01');

-- --------------------------------------------------------

--
-- Structure de la table `rapports`
--

CREATE TABLE `rapports` (
  `id` int(10) UNSIGNED NOT NULL,
  `consultation_id` int(10) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `rapports`
--

INSERT INTO `rapports` (`id`, `consultation_id`, `desc`, `created_at`, `updated_at`) VALUES
(6, 19, 'dfhcgjhkcjf', '2018-01-22 23:00:00', '2018-01-23 18:17:18'),
(8, 23, 'dfghjklmjùjmnbuhgyfcd', '2018-01-22 23:00:00', '2018-01-23 18:39:03'),
(5, 15, 'Un rapport', '2018-01-07 23:00:00', '2018-01-08 13:12:53'),
(4, 14, 'salam alaikom', '2018-01-07 23:00:00', '2018-01-08 11:33:22');

-- --------------------------------------------------------

--
-- Structure de la table `secretaires`
--

CREATE TABLE `secretaires` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image.jpg',
  `archive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non',
  `song` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlf` int(11) NOT NULL,
  `IdUser` int(11) DEFAULT NULL,
  `datNai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `secretaires`
--

INSERT INTO `secretaires` (`id`, `nom`, `prenom`, `adresse`, `email`, `sexe`, `image`, `archive`, `song`, `tlf`, `IdUser`, `datNai`, `created_at`, `updated_at`) VALUES
(2, 'bendaoud', 'amel', 'tlemcen', 'amel@gmail.com', 'Femme', '1515414397.jpg', 'non', 'B+', 556565312, 45, '1986-12-29', '2018-01-08 11:26:37', '2018-01-08 11:26:37');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `email`, `utilisateur`, `admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(42, 'bendaoud', 'wided', 'wided3@gmail.com', 'Medecin', 'non', '$2y$10$98wN0ST3Xa8uSWKmqHeAfOEdPXjiwydlVB0HWnd/96mHXG7O72Jci', NULL, '2018-01-08 11:02:43', '2018-01-08 11:02:43'),
(38, 'bendaoud', 'sihem', 'bendaoud2@gmail.com', 'Medecin', 'non', '$2y$10$sN5R9DzrkIpMAXu2m0dxDO1QrH22yO8tb0PeLXbSVZiDCYsVCLI9u', NULL, '2018-01-08 11:00:36', '2018-01-08 11:00:36'),
(40, 'bendaoud', 'wided', 'wided1@gmail.com', 'Medecin', 'non', '$2y$10$98wN0ST3Xa8uSWKmqHeAfOEdPXjiwydlVB0HWnd/96mHXG7O72Jci', NULL, '2018-01-08 11:02:43', '2018-01-08 11:02:43'),
(37, 'bendaoud', 'sihem', 'bendaoud1@gmail.com', 'Medecin', 'non', '$2y$10$sN5R9DzrkIpMAXu2m0dxDO1QrH22yO8tb0PeLXbSVZiDCYsVCLI9u', NULL, '2018-01-08 11:00:36', '2018-01-08 11:00:36'),
(50, 'Ben', 'Sihem', 'smmd@gmail.com', 'Medecin', 'non', '$2y$10$K.XN0psRZrzg1e0r0sxNDuLGKDdYxpmMTqaxxCyt96bQTOIG7l2xm', NULL, '2018-01-08 13:03:05', '2018-01-08 13:03:05'),
(36, 'khaled', 'mohamed', 'khaled2@gmail.com', 'Medecin', 'non', '$2y$10$ECn.zBFN2.AHAgKTWDaFR.vKmPItqnKx96/oBM1bmDXWLP98SAUuu', NULL, '2018-01-08 11:03:57', '2018-01-08 11:03:57'),
(49, 'bendaoud', 'wided', 'wided@gmail.com', 'Medecin', 'non', '$2y$10$q4s.nDsi6KM4TEKI8tDzkOCgqsNFaSrOIvuk4p/PvzENbg4d6f8au', NULL, '2018-01-08 13:00:49', '2018-01-08 13:00:49'),
(34, 'khaled', 'mohamed', 'khaled@gmail.com', 'Medecin', 'non', '$2y$10$ECn.zBFN2.AHAgKTWDaFR.vKmPItqnKx96/oBM1bmDXWLP98SAUuu', NULL, '2018-01-08 11:03:57', '2018-01-08 11:03:57'),
(32, 'bendaoud', 'sihem', 'bendaoud@gmail.com', 'Medecin', 'non', '$2y$10$sN5R9DzrkIpMAXu2m0dxDO1QrH22yO8tb0PeLXbSVZiDCYsVCLI9u', 'bPj2FzGkvFo7JbBZ7CCU0RyW4pmpHZvVeepmPb5LsxyPV56VTiEgrg1f7iID', '2018-01-08 11:00:36', '2018-01-08 11:00:36'),
(21, 'admin', 'admin', 'admin@gmail.com', 'Infermier', 'oui', '$2y$10$NFvtJVq6vYkPnHfHXcF7q./AkiN5Y5.GLAkWvNgkLvMcF6cZgtwv6', 'lf2f3bNKMVZgXgQsyc6OXsnMtnpALtRirFThEk364dKW2ELoNbQGRpsoZ9GI', '2018-01-07 23:57:10', '2018-01-07 23:57:10'),
(43, 'guerrab', 'leila', 'guerrab@gmail.com', 'Infermier', 'non', '$2y$10$P0JZ0MrHSaR1Xc9ZjhiQFudRI8omT6bAop3Z.21S8cdC1cExxORY2', NULL, '2018-01-08 11:22:19', '2018-01-08 11:22:19'),
(44, 'mohemd', 'mohamed', 'mohamedgh@gmail.com', 'Infermier', 'non', '$2y$10$raJSaPWziOqzzNmmuPT3y.PhNx.Eg6g3AQYE2U9Pwc6kjIoV2BOQO', NULL, '2018-01-08 11:24:50', '2018-01-08 11:24:50'),
(45, 'bendaoud', 'amel', 'amel@gmail.com', 'Secretaire', 'non', '$2y$10$kKPN81kucLYBtP7u.r2Q1eBm/I0xn/Kl.aIBKGEGQplSeZc0IaBNa', NULL, '2018-01-08 11:26:37', '2018-01-08 11:26:37'),
(51, 'khaled', 'ritedj', 'ritedj@gmail.com', 'Patient', 'non', '$2y$10$S5a63tNe2aQxYtbZEEcIyOSSVVNw.ZT6T0MEVhYjIKiB3xeHT/Qje', NULL, '2018-01-23 17:50:42', '2018-01-23 17:50:42');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultations_patient_id_foreign` (`patient_id`);

--
-- Index pour la table `examens`
--
ALTER TABLE `examens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examens_patient_id_foreign` (`patient_id`);

--
-- Index pour la table `hospitalisations`
--
ALTER TABLE `hospitalisations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospitalisations_patient_id_foreign` (`patient_id`),
  ADD KEY `hospitalisations_lit_num_foreign` (`lit_num`),
  ADD KEY `hospitalisations_chambre_num_foreign` (`chambre_num`);

--
-- Index pour la table `infermiers`
--
ALTER TABLE `infermiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lettre_d_orientations`
--
ALTER TABLE `lettre_d_orientations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lettre_d_orientations_consultation_id_foreign` (`consultation_id`);

--
-- Index pour la table `liste_examens`
--
ALTER TABLE `liste_examens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lits`
--
ALTER TABLE `lits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medecins`
--
ALTER TABLE `medecins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ordonnances`
--
ALTER TABLE `ordonnances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordonnances_consultation_id_foreign` (`consultation_id`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rapports`
--
ALTER TABLE `rapports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rapports_consultation_id_foreign` (`consultation_id`);

--
-- Index pour la table `secretaires`
--
ALTER TABLE `secretaires`
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
-- AUTO_INCREMENT pour la table `chambres`
--
ALTER TABLE `chambres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `examens`
--
ALTER TABLE `examens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `hospitalisations`
--
ALTER TABLE `hospitalisations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `infermiers`
--
ALTER TABLE `infermiers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `lettre_d_orientations`
--
ALTER TABLE `lettre_d_orientations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `liste_examens`
--
ALTER TABLE `liste_examens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `lits`
--
ALTER TABLE `lits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `medecins`
--
ALTER TABLE `medecins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `ordonnances`
--
ALTER TABLE `ordonnances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `rapports`
--
ALTER TABLE `rapports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `secretaires`
--
ALTER TABLE `secretaires`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
