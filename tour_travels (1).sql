-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 11:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour_travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `razorpay_id` text DEFAULT NULL,
  `cust_id` varchar(255) NOT NULL,
  `order_id` text DEFAULT NULL,
  `guide` int(11) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `price_id` int(11) DEFAULT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `person` int(11) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `product_id`, `razorpay_id`, `cust_id`, `order_id`, `guide`, `price`, `price_id`, `start_date`, `person`, `location`, `status`, `created_at`, `updated_at`) VALUES
(13, '4', NULL, '16', NULL, NULL, '8990.00', NULL, '26-06-2023', 4, NULL, '1', '2023-06-26 05:44:14', '2023-06-26 05:44:14'),
(14, '4', NULL, '17', NULL, NULL, '8990.00', NULL, '28-06-2023', 1, NULL, '1', '2023-06-28 03:42:02', '2023-06-28 03:42:02'),
(15, '2', NULL, '2', NULL, NULL, '458', NULL, '28-06-2023', 3, NULL, '1', '2023-06-28 03:44:28', '2023-06-28 03:44:28'),
(16, '2', NULL, '2', NULL, NULL, '458', NULL, '28-06-2023', 3, NULL, '1', '2023-06-28 03:44:40', '2023-06-28 03:44:40'),
(17, '2', NULL, '2', NULL, NULL, '458', NULL, '28-06-2023', 3, NULL, '1', '2023-06-28 03:44:46', '2023-06-28 03:44:46'),
(18, '4', NULL, '1', NULL, NULL, '8990.00', NULL, '28-06-2023', 1, NULL, '1', '2023-06-28 03:46:43', '2023-06-28 03:46:43'),
(19, '3', NULL, '18', NULL, NULL, '7599.00', NULL, '30-06-2023', 3, 'adhasdjh jhaas', '1', '2023-06-28 05:08:38', '2023-06-28 05:08:38'),
(20, '4', NULL, '1', NULL, NULL, '8990.00', NULL, '29-06-2023', 1, NULL, '1', '2023-06-28 05:14:32', '2023-06-28 05:14:32'),
(21, '4', NULL, '19', NULL, NULL, '8990.00', NULL, '15-07-2023', 1, NULL, '1', '2023-06-28 06:43:49', '2023-06-28 06:43:49'),
(22, '6', 'order_M9IursToLKcJyC', '2', '8412525', 2, '5046.94', NULL, '28-07-2023', 2, NULL, '2', '2023-07-03 05:29:47', '2023-07-03 05:29:47'),
(23, '6', 'order_M9IzXufZxlGSND', '1', '4701841', 2, '15000', NULL, '29-07-2023', 2, NULL, '2', '2023-07-03 05:34:13', '2023-07-03 05:34:13'),
(24, '6', 'order_M9J2GKkGhDJQH6', '2', '8700793', 2, '15000', NULL, '29-07-2023', 2, NULL, '2', '2023-07-03 05:36:47', '2023-07-03 05:36:47'),
(25, '6', 'order_M9J2yE8uVaanKr', '2', '9618505', 2, '15000', NULL, '29-07-2023', 2, NULL, '2', '2023-07-03 05:37:27', '2023-07-03 05:37:27'),
(26, '6', 'order_M9cMLIMAJHBnSo', '20', '8036640', 3, '8000', NULL, '29-07-2023', 3, 'New Delhi', '2', '2023-07-04 00:30:58', '2023-07-04 00:30:58'),
(27, '6', 'order_M9cO1J8EQEcbPm', '21', '1466223', 2, '8000', NULL, '29-07-2023', 3, 'Delhi', '2', '2023-07-04 00:32:33', '2023-07-04 00:32:33'),
(28, '6', 'order_M9cQfHrOsW6sfN', '2', '8427288', 2, '8000', NULL, '29-07-2023', 3, NULL, '2', '2023-07-04 00:35:03', '2023-07-04 00:35:03'),
(29, '6', 'order_M9dyEaN8MD6qPA', '2', '6061446', 2, '5046.94', NULL, '04-07-2023', 2, 'sola', '1', '2023-07-04 02:05:32', '2023-07-04 02:07:56'),
(30, '6', 'order_M9ejKxDBqbOOsc', '1', '4155475', 3, '15000', 13, '28-07-2023', 5, 'New Delhi', '2', '2023-07-04 02:50:08', '2023-07-04 02:50:08'),
(31, '6', 'order_M9euSmskfNl5qM', '22', '3464470', 2, '15000', 13, '28-07-2023', 5, 'GKP', '2', '2023-07-04 03:00:39', '2023-07-04 03:00:39'),
(32, '6', 'order_M9evRmteIlyH0Z', '23', '9681277', 2, '15000', 13, '28-07-2023', 5, NULL, '1', '2023-07-04 03:01:35', '2023-07-04 03:06:49'),
(33, '6', 'order_MA2rtMOXGmberY', '2', '4598242', 2, '5046.94', 11, '05-07-2023', 1, NULL, '2', '2023-07-05 02:26:55', '2023-07-05 02:26:55'),
(34, '6', 'order_MA2sfpUTMNzHdn', '2', '7517897', 2, '5046.94', 11, '05-07-2023', 1, NULL, '1', '2023-07-05 02:27:36', '2023-07-05 02:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `image`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Demo', 'Test Vrin', 'testvrin06@mailinator.com', '01254854455', NULL, NULL, 1, '2023-06-24 04:15:02', '2023-07-04 02:50:04'),
(2, 'Vrin', 'soft', 'demovrintest@mailinator.com', '1254854458', NULL, NULL, 1, '2023-06-24 04:17:15', '2023-07-05 02:27:30'),
(3, 'Vrin', 'soft', 'demovrintest@mailinator.com', '07845854755', NULL, NULL, 1, '2023-06-24 04:17:41', '2023-06-24 04:17:41'),
(4, 'Vrin', 'soft', 'demovrintest@mailinator.com', '07845854755', NULL, NULL, 1, '2023-06-24 04:18:01', '2023-06-24 04:18:01'),
(5, 'Demo test', 'test', 'demovrintest@mailinator.com', '1254854458', NULL, NULL, 1, '2023-06-24 04:26:26', '2023-06-24 04:26:26'),
(6, 'Demo', 'Test Vrin', 'demovrintest@mailinator.com', '01254854455', NULL, NULL, 1, '2023-06-24 04:27:12', '2023-06-24 04:27:12'),
(7, 'Demo', 'Test Vrin', 'testvrin06@mailinator.com', '01254854455', NULL, NULL, 1, '2023-06-24 04:34:16', '2023-06-24 04:34:16'),
(8, 'Demo', 'Test Vrin', 'testvrin06@mailinator.com', '01254854455', NULL, NULL, 1, '2023-06-24 04:35:14', '2023-06-24 04:35:14'),
(9, 'Demo', 'Test Vrin', 'testvrin06@mailinator.com', '01254854455', NULL, NULL, 1, '2023-06-24 04:35:34', '2023-06-28 05:24:17'),
(10, 'Demo test', 'test', 'demovrintest@mailinator.com', '1254854458', NULL, NULL, 1, '2023-06-24 04:35:55', '2023-06-28 05:24:17'),
(11, 'Demo', 'Test Vrin', 'demovrintest@mailinator.com', '01254854455', NULL, NULL, 1, '2023-06-24 04:39:18', '2023-06-28 05:24:17'),
(12, 'Demo test', 'test', 'demovrintest@mailinator.com', '1254854458', NULL, NULL, 1, '2023-06-24 04:41:29', '2023-06-28 05:24:17'),
(13, 'Demo test', 'test', 'demovrintest@mailinator.com', '1254854458', NULL, NULL, 1, '2023-06-24 04:42:32', '2023-06-28 05:24:17'),
(14, 'Vrin', 'test', 'testvrin06@mailinator.com', '15885458544', NULL, NULL, 1, '2023-06-24 04:51:01', '2023-06-28 05:24:17'),
(15, 'Demo test', 'test', 'demovrintest@mailinator.com', '1254854458', NULL, NULL, 1, '2023-06-26 02:10:49', '2023-06-28 05:24:17'),
(16, 'Demo', 'Test Vrin', 'demovrintest@mailinator.com', '01254854455', NULL, NULL, 1, '2023-06-26 05:44:14', '2023-06-28 05:24:17'),
(17, 'Demo', 'Test Vrin', 'testvrin0688@mailinator.com', '01254854455', NULL, NULL, 1, '2023-06-28 03:40:00', '2023-06-28 05:24:17'),
(18, 'Deepak', 'Kumar', 'deepak@jaja', '875844444', NULL, NULL, 1, '2023-06-28 05:08:38', '2023-06-28 05:24:17'),
(19, 'pankaj', 'kumar', 'pankaj123@mailinator.com', '879555488', NULL, NULL, 1, '2023-06-28 06:43:49', '2023-06-28 06:43:49'),
(20, 'Deepak', 'kumar', 'deepka56@mailinator.com', '14588554444', NULL, NULL, 1, '2023-07-04 00:30:56', '2023-07-04 00:30:56'),
(21, 'deepak', 'kumar', 'deepak56@mailinator.com', '7854758444', NULL, NULL, 1, '2023-07-04 00:32:27', '2023-07-04 00:32:27'),
(22, 'suraj', 'singh', 'suraj1232@mailinator.com', '01254854455', NULL, NULL, 1, '2023-07-04 03:00:38', '2023-07-04 03:00:38'),
(23, 'suraj', 'singh', 'suraj1232@gmail.com', '1254855578', NULL, NULL, 1, '2023-07-04 03:01:34', '2023-07-04 03:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `language` varchar(50) DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `facebook_link` text DEFAULT NULL,
  `inst_link` text DEFAULT NULL,
  `twi_link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `phone`, `language`, `company_id`, `status`, `image`, `facebook_link`, `inst_link`, `twi_link`, `created_at`, `updated_at`) VALUES
(1, 'suraj', 'singh', 'suraj@gmail.com', '985685444', 'English', NULL, 1, '1687255190.jpg', NULL, NULL, NULL, '2023-06-20 03:12:16', '2023-06-28 05:40:53'),
(2, 'Mark', 'Wood', 'mark@gmail.com', '785845547', 'English', NULL, 1, '1687255164.jpg', NULL, NULL, NULL, '2023-06-20 03:27:15', '2023-06-28 05:40:53'),
(3, 'asd', 'ada', 'asdas@dfs', '4858777', 'hin', NULL, 1, '1687253329.jpg', 'aasd', 'asd', 'asd', '2023-06-20 03:39:08', '2023-06-28 05:40:53'),
(4, 'pappu', 'dsasd', 'asdas@sdfsd', '45454', 'asddasd', NULL, 1, '1687253365.png', 'asd', 'asd', 'asda', '2023-06-20 03:59:25', '2023-06-28 05:40:53'),
(5, 'demo', 'demo', 'demo@gmail.com', '123456', 'demo', NULL, 1, '1687254702.jpg', NULL, NULL, NULL, '2023-06-20 04:21:42', '2023-06-28 05:40:53'),
(6, 'demo1', 'demo1', 'demo1@demo1.com', '789654', 'demo1', NULL, 1, '1687254738.jpg', NULL, NULL, NULL, '2023-06-20 04:22:18', '2023-06-28 05:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_09_075052_create_companies_table', 2),
(6, '2023_06_09_075225_create_employees_table', 2),
(7, '2023_06_13_060430_create_products_table', 2),
(9, '2023_06_24_092537_create_bookings_table', 4),
(10, '2023_06_19_063815_create_customers_table', 5),
(11, '2023_07_01_074342_create_price_details_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_details`
--

CREATE TABLE `price_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `price_title` longtext DEFAULT NULL,
  `price_value` varchar(255) NOT NULL,
  `price_desc` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_details`
--

INSERT INTO `price_details` (`id`, `product_id`, `price_title`, `price_value`, `price_desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'title1', 'price1', 'desc1', 1, '2023-07-01 02:31:17', '2023-07-01 02:31:17'),
(2, 4, 'title2', 'price2', 'desc2', 1, '2023-07-01 02:31:17', '2023-07-01 02:31:17'),
(3, 4, 'title3', 'price3', 'desc3', 1, '2023-07-01 02:31:17', '2023-07-01 02:31:17'),
(4, 4, 'asd', 'asd', 'dsa', 1, '2023-07-01 02:55:32', '2023-07-01 02:55:32'),
(5, 4, 'ada', 'asd', 'asd', 1, '2023-07-01 03:07:41', '2023-07-01 03:07:41'),
(6, 4, 'sad', 'ad', 'asd', 1, '2023-07-01 03:07:42', '2023-07-01 03:07:42'),
(7, 4, 'asd', 'da', 'asda', 1, '2023-07-01 03:07:42', '2023-07-01 03:07:42'),
(8, 4, 'das', 'asasd', 'as', 1, '2023-07-01 03:09:48', '2023-07-01 03:09:48'),
(9, 4, 'sad', 'asd', 'asdsda', 1, '2023-07-01 03:09:48', '2023-07-01 03:09:48'),
(10, 4, 'asd', 'asd', 'asd', 1, '2023-07-01 03:09:48', '2023-07-01 03:09:48'),
(11, 6, 'Tour Without Entrance Fees', '5046.94', 'Without Entrance Fees : With this option you will Get Only Transport Driver and Guides. Pickup included', 1, '2023-07-01 03:25:01', '2023-07-01 04:33:06'),
(12, 6, 'Tour With Entrance Fees', '8000', 'With Entrance Fees: With this option you will Get Transport Driver, Guide and Entrance Fees Of Monuments.', 1, '2023-07-01 03:25:01', '2023-07-01 04:33:06'),
(13, 6, '4 start hotel', '15000', 'with 4 star hoter', 1, '2023-07-01 04:32:15', '2023-07-01 04:33:06'),
(14, 3, 'aassdfas', '5454', 'asdasasd', 1, '2023-07-01 04:41:41', '2023-07-01 04:41:41'),
(15, 1, 'With car', '5599.56', 'With Car', 1, '2023-07-05 22:41:45', '2023-07-05 22:41:45'),
(16, 1, 'Wthout Car', '4599.60', 'Without Car', 1, '2023-07-05 22:41:45', '2023-07-05 22:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `location` varchar(150) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `person` int(11) DEFAULT NULL,
  `guider` int(11) DEFAULT NULL,
  `cancel` int(11) DEFAULT NULL,
  `description` longtext NOT NULL,
  `included` longtext DEFAULT NULL,
  `expect` longtext DEFAULT NULL,
  `policy` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `rating`, `price`, `location`, `day`, `person`, `guider`, `cancel`, `description`, `included`, `expect`, `policy`, `status`, `created_at`, `updated_at`) VALUES
(1, '3-Day Private Golden Triangle Tour: Delhi, Agra and Jaipur', '1859542489.jpg', NULL, '25845.55', 'Jaipur', 3, 4, 1, 2, '<p>Discover the best of India on a flexible 3-day tour to Jaipur, Agra, and Delhi, also known as the Golden Triangle. Let a dedicated guide show you the highlights of each city such as the Taj Mahal, Amber Fort, Palace of the Winds, and Qutub Minar. Transport and entrance fees are provided with this private tour package, which includes the option to book 4- or 5-star accommodation with daily breakfast. Read more about 3-Day Private Golden Triangle Tour: Delhi, Agra and Jaipur - https://www.viator.com/tours/New-Delhi/3-Day-Private-Golden-Triangle-Tour-Delhi-Agra-and-Jaipur/d804-8173P9?mcid=56757</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Discover the best of India on a flexible 3-day tour to Jaipur, Agra, and Delhi, also known as the Golden Triangle. Let a dedicated guide show you the highlights of each city such as the Taj Mahal, Amber Fort, Palace of the Winds, and Qutub Minar. Transport and entrance fees are provided with this private tour package, which includes the option to book 4- or 5-star accommodation with daily breakfast.<quillbot-extension-portal></quillbot-extension-portal></p>', '<p><quillbot-extension-portal></quillbot-extension-portal>Discover the best of India on a flexible 3-day tour to Jaipur, Agra, and Delhi, also known as the Golden Triangle. Let a dedicated guide show you the highlights of each city such as the Taj Mahal, Amber Fort, Palace of the Winds, and Qutub Minar. Transport and entrance fees are provided with this private tour package, which includes the option to book 4- or 5-star accommodation with daily breakfast.</p>', '<p>Discover the best of India on a flexible 3-day tour to Jaipur, Agra, and Delhi, also known as the Golden Triangle. Let a dedicated guide show you the highlights of each city such as the Taj Mahal, Amber Fort, Palace of the Winds, and Qutub Minar. Transport and entrance fees are provided with this private tour package, which includes the option to book 4- or 5-star accommodation with daily breakfast.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', 1, '2023-06-16 01:47:51', '2023-07-05 22:41:45'),
(2, 'Delhi to Agra and Taj Mahal Private Day Trip by Express Train with Lunch', '1048112868.jpg|1062655865.jpg|956494533.jpg|1316562617.jpg', NULL, '8067.95', 'Agra', 2, 5, NULL, NULL, 'Spare day in Delhi and eager to see the Taj Mahal? This full-day private trip to Agra by fast train makes the excursion easy and comfortable. Settle into the Gatimaan Express for your journey to Agra, and on arrival, enjoy guided tours of the UNESCO-listed Taj Mahal, Agra Fort, and Baby Taj before returning to Delhi. Includes Delhi hotel pickup and drop-off, return rail fares, guides, and buffet lunch in Agra. Upgrade to include entrance fees and a ride on the business class train car.\r\n\r\nRead more about Delhi to Agra and Taj Mahal Private Day Trip by Express Train with Lunch - https://www.viator.com/tours/New-Delhi/ONE-DAY-TOUR-TO-TAJ-MAHAL-BY-FASTEST-TRAIN/d804-18407P9?mcid=56757', NULL, NULL, 'Spare day in Delhi and eager to see the Taj Mahal? This full-day private trip to Agra by fast train makes the excursion easy and comfortable. Settle into the Gatimaan Express for your journey to Agra, and on arrival, enjoy guided tours of the UNESCO-listed Taj Mahal, Agra Fort, and Baby Taj before returning to Delhi. Includes Delhi hotel pickup and drop-off, return rail fares, guides, and buffet lunch in Agra. Upgrade to include entrance fees and a ride on the business class train car.\r\n\r\nRead more about Delhi to Agra and Taj Mahal Private Day Trip by Express Train with Lunch - https://www.viator.com/tours/New-Delhi/ONE-DAY-TOUR-TO-TAJ-MAHAL-BY-FASTEST-TRAIN/d804-18407P9?mcid=56757', 1, '2023-06-20 04:42:13', '2023-06-28 05:29:17'),
(3, 'Private Taj Mahal Tour from Delhi by Car - All Inclusive', '353127855.jpg|653637680.jpg|828771131.jpg|1914938211.jpg', NULL, '7599.00', 'Delhi', 4, 3, 1, 1, '<p>Got a free day in Delhi? Then seeing the Taj Mahal in Agra is a must. This private round-trip makes it easy, with private air-conditioned road transport and private guiding on arrival. Marvel at the UNESCO-listed Taj as well as the Agra Fort. Your tour includes central Delhi or airport pickup or drop-off, with an optional upgrade to include lunch and entrance fees.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p>Got a free day in Delhi? Then seeing the Taj Mahal in Agra is a must. This private round-trip makes it easy, with private air-conditioned road transport and private guiding on arrival. Marvel at the UNESCO-listed Taj as well as the Agra Fort. Your tour includes central Delhi or airport pickup or drop-off, with an optional upgrade to include lunch and entrance fees.<quillbot-extension-portal></quillbot-extension-portal></p>', '<p>Got a free day in Delhi? Then seeing the Taj Mahal in Agra is a must. This private round-trip makes it easy, with private air-conditioned road transport and private guiding on arrival. Marvel at the UNESCO-listed Taj as well as the Agra Fort. Your tour includes central Delhi or airport pickup or drop-off, with an optional upgrade to include lunch and entrance fees.<quillbot-extension-portal></quillbot-extension-portal></p>', '<p>Got a free day in Delhi? Then seeing the Taj Mahal in Agra is a must. This private round-trip makes it easy, with private air-conditioned road transport and private guiding on arrival. Marvel at the UNESCO-listed Taj as well as the Agra Fort. Your tour includes central Delhi or airport pickup or drop-off, with an optional upgrade to include lunch and entrance fees.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', 1, '2023-06-20 04:44:57', '2023-07-01 04:41:41'),
(4, 'Four-Day Private Luxury Golden Triangle Tour to Agra and Jaipur From New Delhi', '1748499972.jpg|681907865.jpg|1846490661.jpg', NULL, '8990.00', 'New Delhi', 4, 4, 1, 1, '<p>See some of India&#39;s most iconic cities on this comprehensive 4-day Golden Triangle tour. Relax in the comfort of a private air-conditioned vehicle and make your way between Delhi, Agra, and Jaipur. Your driver shares details, insight, and the history of historic landmarks along the way. See the sunrise over the Taj Mahal&mdash;a UNESCO World Heritage Site&mdash;head up to Amber Fort, and explore the Maharaja&rsquo;s City Palace, with guides provided at each sight. See iconic India sights such as the UNESCO-listed Taj Mahal, Agra Fort, Amber Fort, and the City Palace Your driver guide and private guides at each stop provide historical commentary throughout the trip Transport in a private, air-conditioned vehicle Hotel, airport, railway, or other New Delhi pickup and drop-off included</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>conditioned vehicle Hotel, airport, railway, or other New Delhi pickup and drop-off included\\</p>\r\n	</li>\r\n	<li>\r\n	<div>\r\n	<p>conditioned vehicle Hotel, airport, railway, or other New Delhi pickup and drop-off included</p>\r\n\r\n	<ol>\r\n		<li>d vehicle Hotel, airport, railway, or other New Delhi pickup and drop-off include</li>\r\n		<li>d vehicle Hotel, airport, railway, or other New Delhi pickup and drop-off include</li>\r\n		<li>d vehicle Hotel, airport, railway, or other New Delhi pickup and drop-off include</li>\r\n		<li>d vehicle Hotel, airport, railway, or other New Delhi pickup and drop-off include</li>\r\n	</ol>\r\n\r\n	<div>&nbsp;</div>\r\n\r\n	<ol>\r\n	</ol>\r\n	</div>\r\n	</li>\r\n</ol>\r\n<quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal>', '<p><quillbot-extension-portal></quillbot-extension-portal>aasdsa</p>\r\n<quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal>', '<p><quillbot-extension-portal></quillbot-extension-portal>asdd</p>\r\n<quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal>', '<p>You can cancel up to 24 hours in advance of the experience for a full refund. For a full refund, you must cancel at least 24 hours before the experience&rsquo;s start time. If you cancel less than 24 hours before the experience&rsquo;s start time, the amount you paid will not be refunded. Any changes made less than 24 hours before the experience&rsquo;s start time will not be accepted. Cut-off times are based on the experience&rsquo;s local time.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Some great feature name here</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"row mb-2\">\r\n<div class=\"col-12 col-md-6\">\r\n<ul class=\"list-unstyled mb-0\">\r\n	<li>Lorem ipsum dolor sit amet, consectetur</li>\r\n	<li>Duis aute irure dolor in reprehenderit</li>\r\n	<li>Optical heart sensor</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-12 col-md-6 mb-0\">\r\n<ul class=\"list-unstyled\">\r\n	<li>Easy fast and ver good</li>\r\n	<li>Some great feature name here</li>\r\n	<li>Modern style and design<quillbot-extension-portal></quillbot-extension-portal></li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><quillbot-extension-portal></quillbot-extension-portal></p>', 1, '2023-06-20 05:12:38', '2023-07-01 02:02:14'),
(5, 'sdasd', '78446615.png', NULL, '54545', 'asdas', 44, 45, 1, 1, '<p>das<quillbot-extension-portal></quillbot-extension-portal></p>\r\n<quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal>', '<p>asdasdasdsad<quillbot-extension-portal></quillbot-extension-portal></p>\r\n<quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal>', '<p>asdasdasdsa<quillbot-extension-portal></quillbot-extension-portal></p>\r\n<quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal>', '<p>asdasdasd<quillbot-extension-portal></quillbot-extension-portal></p>\r\n<quillbot-extension-portal></quillbot-extension-portal><quillbot-extension-portal></quillbot-extension-portal>', 1, '2023-06-29 03:58:02', '2023-06-29 04:40:49'),
(6, 'Private Half-Day Delhi City Tour Including Entrance Fees', '879397974.jpg|190613093.jpg|759932465.jpg|1017002417.jpg', NULL, '2543.74', 'New Delhi, India', 2, 7, 1, 1, '<p><quillbot-extension-portal></quillbot-extension-portal><span style=\"color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\">Delhi has a dizzying concentration of cultural and historical attractions. But they&rsquo;re spread throughout the city, making it difficult for first-time visitors to cover all the sights. During this convenient sightseeing jaunt through the city, tick off all the highlights in a short visit, giving you an introduction to the city without wearing you out. Choose between flexible tour times as you visit India Gate, Humayun&#39;s Tomb, Gandhi&#39;s house, and Lodhi Garden.</span></p>\r\n\r\n<ol>\r\n	<li><span style=\"color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\">An introduction to Delhi&rsquo;s top attractions,</span></li>\r\n	<li><span style=\"color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\">in your own private car Speed between locations in a chauffeured, </span></li>\r\n	<li><span style=\"color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\">air-conditioned vehicle Perfect for first-time visitors or</span></li>\r\n	<li><span style=\"color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\">travelers short on time Choose between flexible tour</span></li>\r\n	<li><span style=\"color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\">timings for added convenience</span><br style=\"box-sizing: border-box; color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\" />\r\n	&nbsp;</li>\r\n</ol>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p><quillbot-extension-portal></quillbot-extension-portal></p>\r\n\r\n<div class=\"col__TB11\" style=\"box-sizing: border-box; min-height: 1px; min-width: 0px; position: relative; padding-left: 0.75rem; padding-right: 0.75rem; color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px; width: 496.875px; flex: 0 0 50%; max-width: 50%; margin-left: 0px; right: auto; left: auto;\">\r\n<ul class=\"featureList__34Y_ noBullet__2pPd\" style=\"box-sizing: border-box; margin: 0px; padding-left: 0px;\">\r\n	<li class=\"feature__1-FD\" style=\"box-sizing: border-box; padding: 0.3125rem 0px 0.5rem; list-style: none; display: flex;\">\r\n	<div style=\"box-sizing: border-box;\">Pick-up and drop-off service</div>\r\n	</li>\r\n	<li class=\"feature__1-FD\" style=\"box-sizing: border-box; padding: 0.3125rem 0px 0.5rem; list-style: none; display: flex;\"><svg class=\"icon__3A1i icon__3ek5 greyCheckmark__1twR\" height=\"20\" viewbox=\"0 0 20 20\" width=\"20\" xmlns=\"http://www.w3.org/2000/svg\"><path clip-rule=\"evenodd\" d=\"M16.03.97c.3.3.3.77 0 1.06l-10.5 10.5a.75.75 0 01-1.1-.03L.44 8a.75.75 0 111.13-1l3.47 3.9L14.97.98c.3-.3.77-.3 1.06 0z\" fill-rule=\"evenodd\"></path></svg>\r\n	<div style=\"box-sizing: border-box;\">Private air-conditioned car with driver</div>\r\n	</li>\r\n	<li class=\"feature__1-FD\" style=\"box-sizing: border-box; padding: 0.3125rem 0px 0.5rem; list-style: none; display: flex;\"><svg class=\"icon__3A1i icon__3ek5 greyCheckmark__1twR\" height=\"20\" viewbox=\"0 0 20 20\" width=\"20\" xmlns=\"http://www.w3.org/2000/svg\"><path clip-rule=\"evenodd\" d=\"M16.03.97c.3.3.3.77 0 1.06l-10.5 10.5a.75.75 0 01-1.1-.03L.44 8a.75.75 0 111.13-1l3.47 3.9L14.97.98c.3-.3.77-.3 1.06 0z\" fill-rule=\"evenodd\"></path></svg>\r\n	<div style=\"box-sizing: border-box;\">Private tour guide service</div>\r\n	</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col__TB11\" style=\"box-sizing: border-box; min-height: 1px; min-width: 0px; position: relative; padding-left: 0.75rem; padding-right: 0.75rem; color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px; width: 496.875px; flex: 0 0 50%; max-width: 50%; margin-left: 0px; right: auto; left: auto;\">\r\n<ul class=\"featureList__34Y_ noBullet__2pPd lighterText__3GcU\" style=\"box-sizing: border-box; margin: 0px; padding-left: 0px; color: var(--viator-color-neutral-30);\">\r\n	<li class=\"feature__1-FD\" style=\"box-sizing: border-box; padding: 0.3125rem 0px 0.5rem; list-style: none; display: flex;\"><svg class=\"icon__3A1i icon__3ek5 greyCross__3dnk\" height=\"20\" viewbox=\"0 0 20 20\" width=\"20\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M3.97 14.97a.75.75 0 101.06 1.06L10 11.06l4.97 4.97a.75.75 0 101.06-1.06L11.06 10l4.97-4.97a.75.75 0 00-1.06-1.06L10 8.94 5.03 3.97a.75.75 0 00-1.06 1.06L8.94 10l-4.97 4.97z\"></path></svg>\r\n\r\n	<div style=\"box-sizing: border-box;\">Any kind of tipping.</div>\r\n	</li>\r\n	<li class=\"feature__1-FD\" style=\"box-sizing: border-box; padding: 0.3125rem 0px 0.5rem; list-style: none; display: flex;\"><svg class=\"icon__3A1i icon__3ek5 greyCross__3dnk\" height=\"20\" viewbox=\"0 0 20 20\" width=\"20\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M3.97 14.97a.75.75 0 101.06 1.06L10 11.06l4.97 4.97a.75.75 0 101.06-1.06L11.06 10l4.97-4.97a.75.75 0 00-1.06-1.06L10 8.94 5.03 3.97a.75.75 0 00-1.06 1.06L8.94 10l-4.97 4.97z\"></path></svg>\r\n	<div style=\"box-sizing: border-box;\">Any kind of meal during or after the tour</div>\r\n	</li>\r\n</ul>\r\n</div>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p class=\"stopName__1zV7\" role=\"\" style=\"box-sizing: border-box; font-weight: 600; margin: 0.25rem 0px 0.5rem; color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\">Agrasen Ki Baoli - Leamigo</p>\r\n\r\n<div style=\"box-sizing: border-box; color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\"><span style=\"box-sizing: border-box; overflow-wrap: break-word;\">stepwell</span></div>\r\n\r\n<p class=\"itemAttributes__Qsrr\" style=\"box-sizing: border-box; color: var(--viator-color-neutral-30); font-size: var(--viator-font-size-body-small); margin-top: 0.5rem; font-family: Aeonik, Helvetica, Arial, sans-serif;\">15 minutes&nbsp;&bull;&nbsp;Admission Ticket Included</p>\r\n\r\n<p class=\"itemAttributes__Qsrr\" style=\"box-sizing: border-box; color: var(--viator-color-neutral-30); font-size: var(--viator-font-size-body-small); margin-top: 0.5rem; font-family: Aeonik, Helvetica, Arial, sans-serif;\">&nbsp;</p>\r\n\r\n<p class=\"itemAttributes__Qsrr\" style=\"box-sizing: border-box; color: var(--viator-color-neutral-30); font-size: var(--viator-font-size-body-small); margin-top: 0.5rem; font-family: Aeonik, Helvetica, Arial, sans-serif;\"><span style=\"color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\">Humayun&#39;s Tomb The tomb was commissioned by Humayun&#39;s wife Hamida Banu Begum in 1562 CE and designed by Mirak Mirza Ghiyath, a Persian architect. It was the first garden-tomb on the Indian subcontinent and is located in Nizamuddin East, close to the Dina-panah citadel that Humayun founded in 1533. 40 minutes &bull; Admission Ticket Included</span><br style=\"box-sizing: border-box; color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\" />\r\n<br style=\"box-sizing: border-box; color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\" />\r\n<span style=\"color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\">Read more about Private Half-Day Delhi City Tour Including Entrance Fees - https://www.viator.com/tours/New-Delhi/Private-Half-Day-Delhi-City-Tour-including-Entrance-Fees/d804-41335P78?mcid=56757</span></p>\r\n\r\n<p><quillbot-extension-portal></quillbot-extension-portal></p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '<p><quillbot-extension-portal></quillbot-extension-portal><span style=\"color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\">Cancellation Policy You can cancel up to 24 hours in advance of the experience for a full refund. For a full refund, you must cancel at least 24 hours before the experience&rsquo;s start time. If you cancel less than 24 hours before the experience&rsquo;s start time, the amount you paid will not be refunded. Any changes made less than 24 hours before the experience&rsquo;s start time will not be accepted. Cut-off times are based on the experience&rsquo;s local time. This experience requires good weather. If it&rsquo;s canceled due to poor weather, you&rsquo;ll be offered a different date or a full refund.</span><br style=\"box-sizing: border-box; color: rgb(42, 45, 50); font-family: Aeonik, Helvetica, Arial, sans-serif; font-size: 16px;\" />\r\n&nbsp;</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', 1, '2023-07-01 03:25:01', '2023-07-01 04:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(200) DEFAULT NULL,
  `user_rating` varchar(200) DEFAULT NULL,
  `user_review` varchar(250) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `date_time` varchar(250) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`id`, `product_id`, `user_name`, `user_rating`, `user_review`, `email`, `image`, `date_time`, `created_at`, `updated_at`) VALUES
(1, 0, 'sdasd', '5', 'asd', NULL, NULL, '1688464918', '2023-07-04', '2023-07-04'),
(2, 0, 'sdfdsf', '4', 'sdfds', NULL, NULL, '1688464930', '2023-07-04', '2023-07-04'),
(3, 0, 'asAS', '5', 'ASasaS', NULL, NULL, '1688465238', '2023-07-04', '2023-07-04'),
(4, 6, 'asdsa', '2', 'sdsadsad', 'demovrintest@mailinator.com', '', '2023/07/04', '2023-07-04', '2023-07-04'),
(5, 0, 'asd', '4', 'asdasd', NULL, NULL, '1688472974', '2023-07-04', '2023-07-04'),
(6, 0, 'dassa', '4', 'asdsa', NULL, NULL, '1688546200', '2023-07-05', '2023-07-05'),
(7, 6, 'Suraj', '2', 'Good', 'suraj123@gmail.com', '', '2023/07/05', '2023-07-05', '2023-07-05'),
(8, 6, 'Manoj', '5', 'Good Service', 'manoj@gmail.com', '1804775299.png|1332716412.png|1714457082.jpg|64756994.jpg', '2023/07/05', '2023-07-05', '2023-07-05'),
(9, 6, 'Diwakar', '4', 'Greate', 'diwakar123@mailinator.com', '1511238051.png', '2023/07/06', '2023-07-06', '2023-07-06'),
(10, 1, 'Anurag', '5', 'Good Service', 'anurag@gmail.com', '1010985324.png|207865465.png|1410922260.png', '2023/07/06', '2023-07-06', '2023-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$aaf8OsTWgHL/D8dGXyixauFPJVLvr5m8LkDoDlaj2jWKBY6jpYJei', NULL, '2023-06-09 03:25:08', '2023-06-09 03:25:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_company_id_index` (`company_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `price_details`
--
ALTER TABLE `price_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_details`
--
ALTER TABLE `price_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
