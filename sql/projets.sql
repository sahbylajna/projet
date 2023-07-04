-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 04 juil. 2023 à 11:51
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projets`
--

-- --------------------------------------------------------

--
-- Structure de la table `acceptation_clients`
--

CREATE TABLE `acceptation_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `User_id` int(10) UNSIGNED DEFAULT NULL,
  `Client_id` int(10) UNSIGNED DEFAULT NULL,
  `commenter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `acceptation_clients`
--

INSERT INTO `acceptation_clients` (`id`, `created_at`, `updated_at`, `User_id`, `Client_id`, `commenter`) VALUES
(1, '2023-06-13 08:55:17', '2023-06-13 08:55:17', 1, 5, NULL),
(2, '2023-06-13 09:42:00', '2023-06-13 09:42:00', 1, 5, '$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request'),
(3, '2023-06-13 09:42:06', '2023-06-13 09:42:06', 1, 5, '$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request'),
(4, '2023-06-13 09:42:21', '2023-06-13 09:42:21', 1, 5, '$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request$request'),
(5, '2023-06-13 10:43:34', '2023-06-13 10:43:34', 1, 2, 'accepted'),
(6, '2023-06-13 11:32:54', '2023-06-13 11:32:54', 1, 5, 'accepted'),
(7, '2023-06-13 14:37:06', '2023-06-13 14:37:06', 1, 5, 'accepted'),
(8, '2023-06-13 14:54:21', '2023-06-13 14:54:21', 1, 2, 'test refused');

-- --------------------------------------------------------

--
-- Structure de la table `api_users`
--

CREATE TABLE `api_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `access_token` varchar(2500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `api_users`
--

INSERT INTO `api_users` (`id`, `created_at`, `updated_at`, `Username`, `Password`, `access_token`) VALUES
(1, '2023-07-03 08:04:56', '2023-07-03 08:04:56', 'HIJIN', 'H!J!N@2023', '4S9EAfJYVtjK87xgMmryuf1x9NVxmzaz_uhsm4DyvJXuD6rYTN_fwk7Zpb1Vw5qHYcCYnkDvqgi_WbDNhVHE_19U1o4jAjbd5G3VAH08AxllkHzl2WoHbpbWYkQM3WMH_mHqWQbbV3MEFi3C-xga1FANA5lBIeXMhvXNIt1jrY-rCmScvxeHtMmNrI9xVIdOywhMQFq6o6Q5f3-ULElVsR2rq9fDknpoT7HjMSGcU6V4HDz2VUBGf7sU-eWt4YvxFTZ4w37_r6KjZAXiBz0XYM00FnTlZ5tNHa8dSVR_C1qQ9WcN6-JXsMTdCEDV0s3h');

-- --------------------------------------------------------

--
-- Structure de la table `a_n_i_m_a_l__i_n_f_os`
--

CREATE TABLE `a_n_i_m_a_l__i_n_f_os` (
  `id` int(10) UNSIGNED NOT NULL,
  `EXPORT_COUNTRY` varchar(255) DEFAULT NULL,
  `ORIGIN_COUNTRY` varchar(255) DEFAULT NULL,
  `TRANSIET_COUNTRY` varchar(255) DEFAULT NULL,
  `ANML_SPECIES` varchar(255) DEFAULT NULL,
  `ANML_SEX` varchar(255) DEFAULT NULL,
  `ANML_NUMBER` varchar(255) DEFAULT NULL,
  `ANML_USE` varchar(255) DEFAULT NULL,
  `ANIMAL_BREED` varchar(255) DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `a_n_i_m_a_l__i_n_f_os`
--

INSERT INTO `a_n_i_m_a_l__i_n_f_os` (`id`, `EXPORT_COUNTRY`, `ORIGIN_COUNTRY`, `TRANSIET_COUNTRY`, `ANML_SPECIES`, `ANML_SEX`, `ANML_NUMBER`, `ANML_USE`, `ANIMAL_BREED`, `client_id`, `created_at`, `updated_at`) VALUES
(22, 'QATAR', 'QATAR', 'QATAR', 'ابل هجن', 'ذكر', '999999545', 'مشاركة', 'مزاين', NULL, NULL, NULL),
(23, 'QATAR', 'QATAR', 'QATAR', 'ابل هجن', 'ذكر', '999999545', 'مشاركة', 'مزاين', NULL, NULL, NULL),
(24, 'QATAR', 'QATAR', 'QATAR', 'ابل هجن', 'ذكر', '999999545', 'مشاركة', 'مزاين', NULL, NULL, NULL),
(25, 'QATAR', 'QATAR', 'QATAR', 'ابل هجن', 'ذكر', '999999545', 'مشاركة', 'مزاين', NULL, NULL, NULL),
(26, 'QATAR', 'QATAR', 'QATAR', 'ابل هجن', 'ذكر', '999999545', 'مشاركة', 'مزاين', NULL, NULL, NULL),
(27, 'QATAR', 'QATAR', 'QATAR', 'ابل هجن', 'ذكر', '999999545', 'مشاركة', 'مزاين', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ud` varchar(255) DEFAULT NULL,
  `photo_ud_frent` varchar(255) DEFAULT NULL,
  `photo_ud_back` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contry_id` int(10) UNSIGNED DEFAULT NULL,
  `accepted` varchar(255) DEFAULT NULL,
  `refused` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `singateur` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `virification` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `created_at`, `updated_at`, `first_name`, `last_name`, `phone`, `email`, `ud`, `photo_ud_frent`, `photo_ud_back`, `password`, `contry_id`, `accepted`, `refused`, `deleted_at`, `singateur`, `code`, `virification`, `remember_token`) VALUES
(2, '2023-06-12 15:27:15', '2023-06-13 14:54:21', 'Bellgha', 'Youssef', '568188803', 'bellaghayoussef20@gmail.com', '123245678901', 'C:\\xampp1\\tmp\\phpF25D.tmp', 'C:\\xampp1\\tmp\\phpF25E.tmp', 'password', 217, '0', '1', NULL, '7KMeivj8svCn.png', '9688', '1', NULL),
(5, '2023-06-13 08:45:03', '2023-06-13 14:53:48', 'Bellgha', 'Youssef', '56818880', 'bellaghayoussef200@gmail.com', '12345679802', 'images/EcjLG487fI7JgQwWUcoZtQIUeTheI6x6MBIbgacH.png', 'images/clC8AMw2pCZAgxBcWJIQJXqsJlxxBn0ccjHTysly.png', '$2y$10$dByVifMfHJmSw763HM/v7OaXufVSkzX0ZKDi07UdcdO.TEAt3/ezC', 217, '1', '0', NULL, 'mRJf8jDLchQ0.png', '7397', '1', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(11) NOT NULL,
  `active` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `iso3`, `numcode`, `phonecode`, `active`) VALUES
(1, 'AF', 'Afghanistan', 'AFG', 4, 93, '0'),
(2, 'AL', 'Albania', 'ALB', 8, 355, '0'),
(3, 'DZ', 'Algeria', 'DZA', 12, 213, '0'),
(4, 'AS', 'American Samoa', 'ASM', 16, 1684, '1'),
(5, 'AD', 'Andorra', 'AND', 20, 376, '1'),
(6, 'AO', 'Angola', 'AGO', 24, 244, '0'),
(7, 'AI', 'Anguilla', 'AIA', 660, 1264, '0'),
(8, 'AQ', 'Antarctica', NULL, NULL, 0, '0'),
(9, 'AG', 'Antigua and Barbuda', 'ATG', 28, 1268, '0'),
(10, 'AR', 'Argentina', 'ARG', 32, 54, '0'),
(11, 'AM', 'Armenia', 'ARM', 51, 374, '0'),
(12, 'AW', 'Aruba', 'ABW', 533, 297, '0'),
(13, 'AU', 'Australia', 'AUS', 36, 61, '0'),
(14, 'AT', 'Austria', 'AUT', 40, 43, '0'),
(15, 'AZ', 'Azerbaijan', 'AZE', 31, 994, '0'),
(16, 'BS', 'Bahamas', 'BHS', 44, 1242, '0'),
(17, 'BH', 'Bahrain', 'BHR', 48, 973, '0'),
(18, 'BD', 'Bangladesh', 'BGD', 50, 880, '0'),
(19, 'BB', 'Barbados', 'BRB', 52, 1246, '0'),
(20, 'BY', 'Belarus', 'BLR', 112, 375, '0'),
(21, 'BE', 'Belgium', 'BEL', 56, 32, '0'),
(22, 'BZ', 'Belize', 'BLZ', 84, 501, '0'),
(23, 'BJ', 'Benin', 'BEN', 204, 229, '0'),
(24, 'BM', 'Bermuda', 'BMU', 60, 1441, '0'),
(25, 'BT', 'Bhutan', 'BTN', 64, 975, '0'),
(26, 'BO', 'Bolivia', 'BOL', 68, 591, '0'),
(27, 'BA', 'Bosnia and Herzegovina', 'BIH', 70, 387, '0'),
(28, 'BW', 'Botswana', 'BWA', 72, 267, '0'),
(29, 'BV', 'Bouvet Island', NULL, NULL, 0, '0'),
(30, 'BR', 'Brazil', 'BRA', 76, 55, '0'),
(31, 'IO', 'British Indian Ocean Territory', NULL, NULL, 246, '0'),
(32, 'BN', 'Brunei Darussalam', 'BRN', 96, 673, '0'),
(33, 'BG', 'Bulgaria', 'BGR', 100, 359, '0'),
(34, 'BF', 'Burkina Faso', 'BFA', 854, 226, '0'),
(35, 'BI', 'Burundi', 'BDI', 108, 257, '0'),
(36, 'KH', 'Cambodia', 'KHM', 116, 855, '0'),
(37, 'CM', 'Cameroon', 'CMR', 120, 237, '0'),
(38, 'CA', 'Canada', 'CAN', 124, 1, '0'),
(39, 'CV', 'Cape Verde', 'CPV', 132, 238, '0'),
(40, 'KY', 'Cayman Islands', 'CYM', 136, 1345, '0'),
(41, 'CF', 'Central African Republic', 'CAF', 140, 236, '0'),
(42, 'TD', 'Chad', 'TCD', 148, 235, '0'),
(43, 'CL', 'Chile', 'CHL', 152, 56, '0'),
(44, 'CN', 'China', 'CHN', 156, 86, '0'),
(45, 'CX', 'Christmas Island', NULL, NULL, 61, '0'),
(46, 'CC', 'Cocos (Keeling) Islands', NULL, NULL, 672, '0'),
(47, 'CO', 'Colombia', 'COL', 170, 57, '0'),
(48, 'KM', 'Comoros', 'COM', 174, 269, '0'),
(49, 'CG', 'Congo', 'COG', 178, 242, '0'),
(50, 'CD', 'Congo, the Democratic Republic of the', 'COD', 180, 242, '0'),
(51, 'CK', 'Cook Islands', 'COK', 184, 682, '0'),
(52, 'CR', 'Costa Rica', 'CRI', 188, 506, '0'),
(53, 'CI', 'Cote D\'Ivoire', 'CIV', 384, 225, '0'),
(54, 'HR', 'Croatia', 'HRV', 191, 385, '0'),
(55, 'CU', 'Cuba', 'CUB', 192, 53, '0'),
(56, 'CY', 'Cyprus', 'CYP', 196, 357, '0'),
(57, 'CZ', 'Czech Republic', 'CZE', 203, 420, '0'),
(58, 'DK', 'Denmark', 'DNK', 208, 45, '0'),
(59, 'DJ', 'Djibouti', 'DJI', 262, 253, '0'),
(60, 'DM', 'Dominica', 'DMA', 212, 1767, '0'),
(61, 'DO', 'Dominican Republic', 'DOM', 214, 1809, '0'),
(62, 'EC', 'Ecuador', 'ECU', 218, 593, '0'),
(63, 'EG', 'Egypt', 'EGY', 818, 20, '0'),
(64, 'SV', 'El Salvador', 'SLV', 222, 503, '0'),
(65, 'GQ', 'Equatorial Guinea', 'GNQ', 226, 240, '0'),
(66, 'ER', 'Eritrea', 'ERI', 232, 291, '0'),
(67, 'EE', 'Estonia', 'EST', 233, 372, '0'),
(68, 'ET', 'Ethiopia', 'ETH', 231, 251, '0'),
(69, 'FK', 'Falkland Islands (Malvinas)', 'FLK', 238, 500, '0'),
(70, 'FO', 'Faroe Islands', 'FRO', 234, 298, '0'),
(71, 'FJ', 'Fiji', 'FJI', 242, 679, '0'),
(72, 'FI', 'Finland', 'FIN', 246, 358, '0'),
(73, 'FR', 'France', 'FRA', 250, 33, '0'),
(74, 'GF', 'French Guiana', 'GUF', 254, 594, '0'),
(75, 'PF', 'French Polynesia', 'PYF', 258, 689, '0'),
(76, 'TF', 'French Southern Territories', NULL, NULL, 0, '0'),
(77, 'GA', 'Gabon', 'GAB', 266, 241, '0'),
(78, 'GM', 'Gambia', 'GMB', 270, 220, '0'),
(79, 'GE', 'Georgia', 'GEO', 268, 995, '0'),
(80, 'DE', 'Germany', 'DEU', 276, 49, '0'),
(81, 'GH', 'Ghana', 'GHA', 288, 233, '0'),
(82, 'GI', 'Gibraltar', 'GIB', 292, 350, '0'),
(83, 'GR', 'Greece', 'GRC', 300, 30, '0'),
(84, 'GL', 'Greenland', 'GRL', 304, 299, '0'),
(85, 'GD', 'Grenada', 'GRD', 308, 1473, '0'),
(86, 'GP', 'Guadeloupe', 'GLP', 312, 590, '0'),
(87, 'GU', 'Guam', 'GUM', 316, 1671, '0'),
(88, 'GT', 'Guatemala', 'GTM', 320, 502, '0'),
(89, 'GN', 'Guinea', 'GIN', 324, 224, '0'),
(90, 'GW', 'Guinea-Bissau', 'GNB', 624, 245, '0'),
(91, 'GY', 'Guyana', 'GUY', 328, 592, '0'),
(92, 'HT', 'Haiti', 'HTI', 332, 509, '0'),
(93, 'HM', 'Heard Island and Mcdonald Islands', NULL, NULL, 0, '0'),
(94, 'VA', 'Holy See (Vatican City State)', 'VAT', 336, 39, '0'),
(95, 'HN', 'Honduras', 'HND', 340, 504, '0'),
(96, 'HK', 'Hong Kong', 'HKG', 344, 852, '0'),
(97, 'HU', 'Hungary', 'HUN', 348, 36, '0'),
(98, 'IS', 'Iceland', 'ISL', 352, 354, '0'),
(99, 'IN', 'India', 'IND', 356, 91, '0'),
(100, 'ID', 'Indonesia', 'IDN', 360, 62, '0'),
(101, 'IR', 'Iran, Islamic Republic of', 'IRN', 364, 98, '0'),
(102, 'IQ', 'Iraq', 'IRQ', 368, 964, '0'),
(103, 'IE', 'Ireland', 'IRL', 372, 353, '0'),
(104, 'IL', 'Israel', 'ISR', 376, 972, '0'),
(105, 'IT', 'Italy', 'ITA', 380, 39, '0'),
(106, 'JM', 'Jamaica', 'JAM', 388, 1876, '0'),
(107, 'JP', 'Japan', 'JPN', 392, 81, '0'),
(108, 'JO', 'Jordan', 'JOR', 400, 962, '0'),
(109, 'KZ', 'Kazakhstan', 'KAZ', 398, 7, '0'),
(110, 'KE', 'Kenya', 'KEN', 404, 254, '0'),
(111, 'KI', 'Kiribati', 'KIR', 296, 686, '0'),
(112, 'KP', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850, '0'),
(113, 'KR', 'Korea, Republic of', 'KOR', 410, 82, '0'),
(114, 'KW', 'Kuwait', 'KWT', 414, 965, '0'),
(115, 'KG', 'Kyrgyzstan', 'KGZ', 417, 996, '0'),
(116, 'LA', 'Lao People\'s Democratic Republic', 'LAO', 418, 856, '0'),
(117, 'LV', 'Latvia', 'LVA', 428, 371, '0'),
(118, 'LB', 'Lebanon', 'LBN', 422, 961, '0'),
(119, 'LS', 'Lesotho', 'LSO', 426, 266, '0'),
(120, 'LR', 'Liberia', 'LBR', 430, 231, '0'),
(121, 'LY', 'Libyan Arab Jamahiriya', 'LBY', 434, 218, '0'),
(122, 'LI', 'Liechtenstein', 'LIE', 438, 423, '0'),
(123, 'LT', 'Lithuania', 'LTU', 440, 370, '0'),
(124, 'LU', 'Luxembourg', 'LUX', 442, 352, '0'),
(125, 'MO', 'Macao', 'MAC', 446, 853, '0'),
(126, 'MK', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389, '0'),
(127, 'MG', 'Madagascar', 'MDG', 450, 261, '0'),
(128, 'MW', 'Malawi', 'MWI', 454, 265, '0'),
(129, 'MY', 'Malaysia', 'MYS', 458, 60, '0'),
(130, 'MV', 'Maldives', 'MDV', 462, 960, '0'),
(131, 'ML', 'Mali', 'MLI', 466, 223, '0'),
(132, 'MT', 'Malta', 'MLT', 470, 356, '0'),
(133, 'MH', 'Marshall Islands', 'MHL', 584, 692, '0'),
(134, 'MQ', 'Martinique', 'MTQ', 474, 596, '0'),
(135, 'MR', 'Mauritania', 'MRT', 478, 222, '0'),
(136, 'MU', 'Mauritius', 'MUS', 480, 230, '0'),
(137, 'YT', 'Mayotte', NULL, NULL, 269, '0'),
(138, 'MX', 'Mexico', 'MEX', 484, 52, '0'),
(139, 'FM', 'Micronesia, Federated States of', 'FSM', 583, 691, '0'),
(140, 'MD', 'Moldova, Republic of', 'MDA', 498, 373, '0'),
(141, 'MC', 'Monaco', 'MCO', 492, 377, '0'),
(142, 'MN', 'Mongolia', 'MNG', 496, 976, '0'),
(143, 'MS', 'Montserrat', 'MSR', 500, 1664, '0'),
(144, 'MA', 'Morocco', 'MAR', 504, 212, '0'),
(145, 'MZ', 'Mozambique', 'MOZ', 508, 258, '0'),
(146, 'MM', 'Myanmar', 'MMR', 104, 95, '0'),
(147, 'NA', 'Namibia', 'NAM', 516, 264, '0'),
(148, 'NR', 'Nauru', 'NRU', 520, 674, '0'),
(149, 'NP', 'Nepal', 'NPL', 524, 977, '0'),
(150, 'NL', 'Netherlands', 'NLD', 528, 31, '0'),
(151, 'AN', 'Netherlands Antilles', 'ANT', 530, 599, '0'),
(152, 'NC', 'New Caledonia', 'NCL', 540, 687, '0'),
(153, 'NZ', 'New Zealand', 'NZL', 554, 64, '0'),
(154, 'NI', 'Nicaragua', 'NIC', 558, 505, '0'),
(155, 'NE', 'Niger', 'NER', 562, 227, '0'),
(156, 'NG', 'Nigeria', 'NGA', 566, 234, '0'),
(157, 'NU', 'Niue', 'NIU', 570, 683, '0'),
(158, 'NF', 'Norfolk Island', 'NFK', 574, 672, '0'),
(159, 'MP', 'Northern Mariana Islands', 'MNP', 580, 1670, '0'),
(160, 'NO', 'Norway', 'NOR', 578, 47, '0'),
(161, 'OM', 'Oman', 'OMN', 512, 968, '0'),
(162, 'PK', 'Pakistan', 'PAK', 586, 92, '0'),
(163, 'PW', 'Palau', 'PLW', 585, 680, '0'),
(164, 'PS', 'Palestinian Territory, Occupied', NULL, NULL, 970, '0'),
(165, 'PA', 'Panama', 'PAN', 591, 507, '0'),
(166, 'PG', 'Papua New Guinea', 'PNG', 598, 675, '0'),
(167, 'PY', 'Paraguay', 'PRY', 600, 595, '0'),
(168, 'PE', 'Peru', 'PER', 604, 51, '0'),
(169, 'PH', 'Philippines', 'PHL', 608, 63, '0'),
(170, 'PN', 'Pitcairn', 'PCN', 612, 0, '0'),
(171, 'PL', 'Poland', 'POL', 616, 48, '0'),
(172, 'PT', 'Portugal', 'PRT', 620, 351, '0'),
(173, 'PR', 'Puerto Rico', 'PRI', 630, 1787, '0'),
(174, 'QA', 'Qatar', 'QAT', 634, 974, '1'),
(175, 'RE', 'Reunion', 'REU', 638, 262, '0'),
(176, 'RO', 'Romania', 'ROM', 642, 40, '0'),
(177, 'RU', 'Russian Federation', 'RUS', 643, 70, '0'),
(178, 'RW', 'Rwanda', 'RWA', 646, 250, '0'),
(179, 'SH', 'Saint Helena', 'SHN', 654, 290, '0'),
(180, 'KN', 'Saint Kitts and Nevis', 'KNA', 659, 1869, '0'),
(181, 'LC', 'Saint Lucia', 'LCA', 662, 1758, '0'),
(182, 'PM', 'Saint Pierre and Miquelon', 'SPM', 666, 508, '0'),
(183, 'VC', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784, '0'),
(184, 'WS', 'Samoa', 'WSM', 882, 684, '0'),
(185, 'SM', 'San Marino', 'SMR', 674, 378, '0'),
(186, 'ST', 'Sao Tome and Principe', 'STP', 678, 239, '0'),
(187, 'SA', 'Saudi Arabia', 'SAU', 682, 966, '0'),
(188, 'SN', 'Senegal', 'SEN', 686, 221, '0'),
(189, 'CS', 'Serbia and Montenegro', NULL, NULL, 381, '0'),
(190, 'SC', 'Seychelles', 'SYC', 690, 248, '0'),
(191, 'SL', 'Sierra Leone', 'SLE', 694, 232, '0'),
(192, 'SG', 'Singapore', 'SGP', 702, 65, '0'),
(193, 'SK', 'Slovakia', 'SVK', 703, 421, '0'),
(194, 'SI', 'Slovenia', 'SVN', 705, 386, '0'),
(195, 'SB', 'Solomon Islands', 'SLB', 90, 677, '0'),
(196, 'SO', 'Somalia', 'SOM', 706, 252, '0'),
(197, 'ZA', 'South Africa', 'ZAF', 710, 27, '0'),
(198, 'GS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0, '0'),
(199, 'ES', 'Spain', 'ESP', 724, 34, '0'),
(200, 'LK', 'Sri Lanka', 'LKA', 144, 94, '0'),
(201, 'SD', 'Sudan', 'SDN', 736, 249, '0'),
(202, 'SR', 'Suriname', 'SUR', 740, 597, '0'),
(203, 'SJ', 'Svalbard and Jan Mayen', 'SJM', 744, 47, '0'),
(204, 'SZ', 'Swaziland', 'SWZ', 748, 268, '0'),
(205, 'SE', 'Sweden', 'SWE', 752, 46, '0'),
(206, 'CH', 'Switzerland', 'CHE', 756, 41, '0'),
(207, 'SY', 'Syrian Arab Republic', 'SYR', 760, 963, '0'),
(208, 'TW', 'Taiwan, Province of China', 'TWN', 158, 886, '0'),
(209, 'TJ', 'Tajikistan', 'TJK', 762, 992, '0'),
(210, 'TZ', 'Tanzania, United Republic of', 'TZA', 834, 255, '0'),
(211, 'TH', 'Thailand', 'THA', 764, 66, '0'),
(212, 'TL', 'Timor-Leste', NULL, NULL, 670, '0'),
(213, 'TG', 'Togo', 'TGO', 768, 228, '0'),
(214, 'TK', 'Tokelau', 'TKL', 772, 690, '0'),
(215, 'TO', 'Tonga', 'TON', 776, 676, '0'),
(216, 'TT', 'Trinidad and Tobago', 'TTO', 780, 1868, '0'),
(217, 'TN', 'Tunisia', 'TUN', 788, 216, '1'),
(218, 'TR', 'Turkey', 'TUR', 792, 90, '0'),
(219, 'TM', 'Turkmenistan', 'TKM', 795, 7370, '0'),
(220, 'TC', 'Turks and Caicos Islands', 'TCA', 796, 1649, '0'),
(221, 'TV', 'Tuvalu', 'TUV', 798, 688, '0'),
(222, 'UG', 'Uganda', 'UGA', 800, 256, '0'),
(223, 'UA', 'Ukraine', 'UKR', 804, 380, '0'),
(224, 'AE', 'United Arab Emirates', 'ARE', 784, 971, '0'),
(225, 'GB', 'United Kingdom', 'GBR', 826, 44, '0'),
(226, 'US', 'United States', 'USA', 840, 1, '0'),
(227, 'UM', 'United States Minor Outlying Islands', NULL, NULL, 1, '0'),
(228, 'UY', 'Uruguay', 'URY', 858, 598, '0'),
(229, 'UZ', 'Uzbekistan', 'UZB', 860, 998, '0'),
(230, 'VU', 'Vanuatu', 'VUT', 548, 678, '0'),
(231, 'VE', 'Venezuela', 'VEN', 862, 58, '0'),
(232, 'VN', 'Viet Nam', 'VNM', 704, 84, '0'),
(233, 'VG', 'Virgin Islands, British', 'VGB', 92, 1284, '0'),
(234, 'VI', 'Virgin Islands, U.S.', 'VIR', 850, 1340, '0'),
(235, 'WF', 'Wallis and Futuna', 'WLF', 876, 681, '0'),
(236, 'EH', 'Western Sahara', 'ESH', 732, 212, '0'),
(237, 'YE', 'Yemen', 'YEM', 887, 967, '0'),
(238, 'ZM', 'Zambia', 'ZMB', 894, 260, '0'),
(239, 'ZW', 'Zimbabwe', 'ZWE', 716, 263, '0'),
(240, 'RS', 'Serbia', 'SRB', 688, 381, '0'),
(241, 'AP', 'Asia / Pacific Region', '0', 0, 0, '0'),
(242, 'ME', 'Montenegro', 'MNE', 499, 382, '0'),
(243, 'AX', 'Aland Islands', 'ALA', 248, 358, '0'),
(244, 'BQ', 'Bonaire, Sint Eustatius and Saba', 'BES', 535, 599, '0'),
(245, 'CW', 'Curacao', 'CUW', 531, 599, '0'),
(246, 'GG', 'Guernsey', 'GGY', 831, 44, '0'),
(247, 'IM', 'Isle of Man', 'IMN', 833, 44, '0'),
(248, 'JE', 'Jersey', 'JEY', 832, 44, '0'),
(249, 'XK', 'Kosovo', '---', 0, 381, '0'),
(250, 'BL', 'Saint Barthelemy', 'BLM', 652, 590, '0'),
(251, 'MF', 'Saint Martin', 'MAF', 663, 590, '0'),
(252, 'SX', 'Sint Maarten', 'SXM', 534, 1, '0'),
(253, 'SS', 'South Sudan', 'SSD', 728, 211, '0');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `importations`
--

CREATE TABLE `importations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `CER_TYPE` varchar(255) DEFAULT NULL,
  `CER_LANG` varchar(255) DEFAULT NULL,
  `COMP_ID` varchar(255) DEFAULT NULL,
  `EUSER_QID` varchar(255) DEFAULT NULL,
  `EXP_NAME` varchar(255) DEFAULT NULL,
  `EXP_TEL` varchar(255) DEFAULT NULL,
  `EXP_QID` varchar(255) DEFAULT NULL,
  `EXP_FAX` varchar(255) DEFAULT NULL,
  `EXP_COUNTRY` varchar(255) DEFAULT NULL,
  `IMP_NAME` varchar(255) DEFAULT NULL,
  `IMP_ADDRESS` varchar(255) DEFAULT NULL,
  `IMP_FAX` varchar(255) DEFAULT NULL,
  `IMP_TEL` varchar(255) DEFAULT NULL,
  `IMP_POBOX` varchar(255) DEFAULT NULL,
  `IMP_COUNTRY` varchar(255) DEFAULT NULL,
  `ORIGIN_COUNTRY` varchar(255) DEFAULT NULL,
  `SHIPPING_PLACE` varchar(255) DEFAULT NULL,
  `ENTERY_PORT` varchar(255) DEFAULT NULL,
  `EXPECTED_ARRIVAL_DATE` varchar(255) DEFAULT NULL,
  `TRANSPORT` varchar(255) DEFAULT NULL,
  `SHIPPING_DATE` varchar(255) DEFAULT NULL,
  `APPLICANT_NAME` varchar(255) DEFAULT NULL,
  `APPLICANT_TEL` varchar(255) DEFAULT NULL,
  `EXP_NATIONALITY` varchar(255) DEFAULT NULL,
  `EXP_PASSPORT_NUM` varchar(255) DEFAULT NULL,
  `accepted` varchar(255) DEFAULT NULL,
  `reson` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `importations`
--

INSERT INTO `importations` (`id`, `created_at`, `updated_at`, `client_id`, `CER_TYPE`, `CER_LANG`, `COMP_ID`, `EUSER_QID`, `EXP_NAME`, `EXP_TEL`, `EXP_QID`, `EXP_FAX`, `EXP_COUNTRY`, `IMP_NAME`, `IMP_ADDRESS`, `IMP_FAX`, `IMP_TEL`, `IMP_POBOX`, `IMP_COUNTRY`, `ORIGIN_COUNTRY`, `SHIPPING_PLACE`, `ENTERY_PORT`, `EXPECTED_ARRIVAL_DATE`, `TRANSPORT`, `SHIPPING_DATE`, `APPLICANT_NAME`, `APPLICANT_TEL`, `EXP_NATIONALITY`, `EXP_PASSPORT_NUM`, `accepted`, `reson`) VALUES
(1, '2023-07-03 11:35:48', '2023-07-03 11:35:48', 5, 'vcbmn', 'cvbn', 'cvbn', 'cvbn', 'ddd', '231', '321d3', 'd1', '313', '1d32', '32d1321', 'd13', '2d131', 'd323', '1321', '321', '32', '1d32d', '13', 'd131d', '31', 'd32', '1d3', '21d3', '1d3', NULL, NULL),
(2, '2023-07-03 11:37:17', '2023-07-03 11:37:17', 5, 'vcbmn', 'cvbn', 'cvbn', 'cvbn', 'ddd', '231', '321d3', 'd1', '313', '1d32', '32d1321', 'd13', '2d131', 'd323', '1321', '321', '32', '1d32d', '13', 'd131d', '31', 'd32', '1d3', '21d3', '1d3', NULL, NULL),
(3, '2023-07-03 11:37:49', '2023-07-03 11:37:49', 5, 'vcbmn', 'cvbn', 'cvbn', 'cvbn', 'ddd', '231', '321d3', 'd1', '313', '1d32', '32d1321', 'd13', '2d131', 'd323', '1321', '321', '32', '1d32d', '13', 'd131d', '31', 'd32', '1d3', '21d3', '1d3', NULL, NULL),
(4, '2023-07-03 12:07:25', '2023-07-03 12:07:25', 5, 'vcbmn', 'cvbn', 'cvbn', 'cvbn', 'ddd', '231', '321d3', 'd1', '313', '1d32', '32d1321', 'd13', '2d131', 'd323', '1321', '321', '32', '1d32d', '13', 'd131d', '31', 'd32', '1d3', '21d3', '1d3', NULL, NULL),
(5, NULL, NULL, 5, 'IMPLC', 'A', '01003501', NULL, 'HEJEN RACING COMMITTEE', '332244553', '4433221144', '33223344', 'QATAR', 'سعيد', 'DOHA', '554433', '44332211', '44332211', 'EMARITS', 'EMARITS', 'DOHA', 'DOHA', '2010-06-10', NULL, '2010-06-10', NULL, '77665544', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `importation_a_n_i_m_a_l__i_n_f_os`
--

CREATE TABLE `importation_a_n_i_m_a_l__i_n_f_os` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `importation_id` bigint(20) UNSIGNED NOT NULL,
  `a_n_i_m_a_l__i_n_f_os_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `importation_a_n_i_m_a_l__i_n_f_os`
--

INSERT INTO `importation_a_n_i_m_a_l__i_n_f_os` (`id`, `importation_id`, `a_n_i_m_a_l__i_n_f_os_id`, `created_at`, `updated_at`) VALUES
(21, 5, 22, NULL, NULL),
(22, 5, 23, NULL, NULL),
(23, 5, 24, NULL, NULL),
(24, 5, 25, NULL, NULL),
(25, 5, 26, NULL, NULL),
(26, 5, 27, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_06_12_092840_create_permission_tables', 2),
(7, '2018_11_07_102223_create_countries_table', 3),
(8, '2023_06_12_105638_add_delet_users', 4),
(9, '2023_06_12_121522_create_clients_table', 5),
(10, '2023_06_12_135940_add_delet_client', 6),
(11, '2023_06_12_150603_add_code_client', 7),
(12, '2023_06_13_092531_create_acceptation_clients_table', 8),
(13, '2023_06_13_123459_add_remaber_client', 9),
(15, '2023_07_03_084139_create_api_users_table', 10),
(18, '2023_07_03_093147_add_files_to_importation', 13),
(19, '2023_07_03_093536_importaion_animal', 14),
(20, '2023_07_03_091154_create_a_n_i_m_a_l__i_n_f_os_table', 15),
(23, '2023_07_03_092257_create_importations_table', 16);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-06-12 10:04:49', '2023-06-12 10:04:49');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-06-12 10:04:49', '2023-06-12 10:04:49'),
(2, 'Super-Admin', 'web', '2023-06-12 10:04:49', '2023-06-12 10:04:49');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `ud` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `ud`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin', '12345679802', 'admin@admin.com', NULL, '$2y$10$dByVifMfHJmSw763HM/v7OaXufVSkzX0ZKDi07UdcdO.TEAt3/ezC', NULL, '2023-06-12 08:02:37', '2023-06-12 08:02:37', NULL),
(5, 'Bellgha', 'Youssef', '145679802', 'bellaghayoussef20@gmail.com', NULL, '$2y$10$dByVifMfHJmSw763HM/v7OaXufVSkzX0ZKDi07UdcdO.TEAt3/ezC', NULL, '2023-06-12 09:16:25', '2023-06-12 09:57:08', NULL),
(9, 'Bellgha', 'Youssef', '123456798023', 'bellaghvayousssef20@gmail.com', NULL, '$2y$10$MgEBpdsDnwPqQmstr3fxxOvqnJRTAl6KUEggVD5d6cv0BbqZ6aSoG', NULL, '2023-06-12 10:11:12', '2023-06-12 10:11:12', NULL),
(10, 'Bellgha', 'Youssef', '12345679sa8023', 'bellaghayouasssef20@gmail.com', NULL, '$2y$10$h.z.CEe1R4vwzFI4P99NgOu.kdcX52PdX51rcHmMFYxfxCn8RHymS', NULL, '2023-06-12 10:12:10', '2023-06-12 10:12:10', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acceptation_clients`
--
ALTER TABLE `acceptation_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acceptation_clients_user_id_index` (`User_id`),
  ADD KEY `acceptation_clients_client_id_index` (`Client_id`);

--
-- Index pour la table `api_users`
--
ALTER TABLE `api_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `a_n_i_m_a_l__i_n_f_os`
--
ALTER TABLE `a_n_i_m_a_l__i_n_f_os`
  ADD PRIMARY KEY (`id`),
  ADD KEY `a_n_i_m_a_l__i_n_f_os_client_id_index` (`client_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_contry_id_index` (`contry_id`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `importations`
--
ALTER TABLE `importations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `importations_client_id_index` (`client_id`);

--
-- Index pour la table `importation_a_n_i_m_a_l__i_n_f_os`
--
ALTER TABLE `importation_a_n_i_m_a_l__i_n_f_os`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_ud_unique` (`ud`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acceptation_clients`
--
ALTER TABLE `acceptation_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `api_users`
--
ALTER TABLE `api_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `a_n_i_m_a_l__i_n_f_os`
--
ALTER TABLE `a_n_i_m_a_l__i_n_f_os`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `importations`
--
ALTER TABLE `importations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `importation_a_n_i_m_a_l__i_n_f_os`
--
ALTER TABLE `importation_a_n_i_m_a_l__i_n_f_os`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
