-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2019 at 06:05 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reojen`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_payment_transactions`
--

CREATE TABLE `app_payment_transactions` (
  `id` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` text NOT NULL,
  `payer_id` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `payment_method` text NOT NULL,
  `currency` varchar(300) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `completed_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `transaction_id_account_email` varchar(225) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_payment_transactions`
--

INSERT INTO `app_payment_transactions` (`id`, `user_id`, `payment_id`, `payer_id`, `status`, `amount`, `payment_method`, `currency`, `added_on`, `completed_on`, `transaction_id_account_email`) VALUES
(2, 78, 'PAY-14V12583132366823LIEMA3Q', '', 'created', 100, 'paypal', 'USD', '2017-11-12 16:13:11', '0000-00-00 00:00:00', ''),
(3, 78, 'PAY-4EX32008J5134830ELIEMZJA', '', 'created', 100, 'paypal', 'USD', '2017-11-12 17:05:16', '0000-00-00 00:00:00', ''),
(4, 78, 'PAY-7B902772CP391771NLIENDEY', '', 'approved', 100, 'paypal', 'USD', '2017-11-12 17:26:19', '2017-11-13 05:56:43', ''),
(5, 11, 'PAY-3PN43818ST738742TLIEV3BY', '', 'approved', 5, 'paypal', 'USD', '2017-11-13 03:23:27', '2017-11-13 15:56:12', ''),
(6, 79, 'PAY-2TD42435468643145LIEWOQI', '', 'created', 50, 'paypal', 'USD', '2017-11-13 04:04:57', '0000-00-00 00:00:00', ''),
(7, 12, 'PAY-00D56047H8963592HLIEWRMA', '', 'created', 500, 'paypal', 'USD', '2017-11-13 04:11:04', '0000-00-00 00:00:00', ''),
(130, 109, 'PAY-5AT42469CB547383MLKREFIQ', '0', 'created', 100, 'paypal', 'USD', '2018-03-09 02:45:30', '0000-00-00 00:00:00', ''),
(9, 78, 'PAY-9XY16098EK6568720LIFM2SQ', '', 'created', 200, 'paypal', 'USD', '2017-11-14 05:32:34', '0000-00-00 00:00:00', ''),
(129, 109, 'PAY-1HN31758175763544LKRDNDY', '0', 'created', 1, 'paypal', 'USD', '2018-03-09 01:53:59', '0000-00-00 00:00:00', ''),
(11, 78, 'PAY-0E1960408D146433GLIFNF6I', '', 'approved', 200, 'paypal', 'USD', '2017-11-14 05:56:50', '2017-11-14 18:27:56', ''),
(128, 109, 'PAY-3VA48698K7176842WLKRDK7Y', '0', 'created', 1, 'paypal', 'USD', '2018-03-09 01:49:27', '0000-00-00 00:00:00', ''),
(127, 138, 'PAY-8XK18280115210235LKRDE2Q', '0', 'created', 50, 'paypal', 'USD', '2018-03-09 01:36:18', '2018-03-09 07:06:46', ''),
(14, 80, 'PAY-1XY57730TX083801NLIFN3EA', '', 'created', 50, 'paypal', 'USD', '2017-11-14 06:42:00', '0000-00-00 00:00:00', ''),
(16, 78, 'PAY-1TP04003F4551972HLIFOAWY', '', 'created', 200, 'paypal', 'USD', '2017-11-14 06:53:55', '0000-00-00 00:00:00', ''),
(17, 78, 'PAY-2L797525Y4456192MLIFOAYQ', '', 'created', 200, 'paypal', 'USD', '2017-11-14 06:54:03', '0000-00-00 00:00:00', ''),
(18, 78, 'PAY-7P685442RC7575725LIFOAZQ', '', 'created', 200, 'paypal', 'USD', '2017-11-14 06:54:06', '0000-00-00 00:00:00', ''),
(19, 78, 'PAY-42W95841JH2323931LIFOA3Q', '', 'created', 200, 'paypal', 'USD', '2017-11-14 06:54:14', '0000-00-00 00:00:00', ''),
(20, 81, 'PAY-8WF71918XG847744ALIFOA7Q', '', 'created', 700, 'paypal', 'USD', '2017-11-14 06:54:30', '0000-00-00 00:00:00', ''),
(21, 81, 'PAY-3SU528819R7681237LIFOBMA', '', 'approved', 800, 'paypal', 'USD', '2017-11-14 06:55:20', '2017-11-14 19:31:25', ''),
(22, 78, 'PAY-35451301EP285792JLIFOEOQ', '', 'created', 500, 'paypal', 'USD', '2017-11-14 07:01:55', '0000-00-00 00:00:00', ''),
(23, 81, 'PAY-3DH94772SC473643BLIFOFHY', '', 'created', 1000000, 'paypal', 'USD', '2017-11-14 07:03:36', '0000-00-00 00:00:00', ''),
(24, 81, 'PAY-78Y87987VP7708310LIFOJHY', '', 'approved', 2000, 'paypal', 'USD', '2017-11-14 07:12:07', '2017-11-14 19:45:54', ''),
(25, 78, 'PAY-5RU151598F281663CLIFON4I', '', 'created', 200, 'paypal', 'USD', '2017-11-14 07:22:01', '0000-00-00 00:00:00', ''),
(26, 78, 'PAY-2WJ22143807854822LIFOOMQ', '', 'created', 200, 'paypal', 'USD', '2017-11-14 07:23:06', '0000-00-00 00:00:00', ''),
(27, 78, 'PAY-91A14378DA999725TLIFOQQA', '', 'created', 200, 'paypal', 'USD', '2017-11-14 07:27:36', '0000-00-00 00:00:00', ''),
(28, 78, 'PAY-8FK28392BA272464FLIFOUUI', '', 'created', 200, 'paypal', 'USD', '2017-11-14 07:36:25', '0000-00-00 00:00:00', ''),
(29, 78, 'PAY-94449245FC547402TLIFOVSI', '', 'created', 200, 'paypal', 'USD', '2017-11-14 07:38:25', '0000-00-00 00:00:00', ''),
(30, 78, 'PAY-3C384548WV4300618LIFOXPY', '', 'created', 200, 'paypal', 'USD', '2017-11-14 07:42:31', '0000-00-00 00:00:00', ''),
(31, 78, 'PAY-7BN17963VT759220CLIFOZWA', '', 'created', 500, 'paypal', 'USD', '2017-11-14 07:47:12', '0000-00-00 00:00:00', ''),
(32, 78, 'PAY-6EW35105YG7017430LIFO2FQ', '', 'created', 333, 'paypal', 'USD', '2017-11-14 07:48:14', '0000-00-00 00:00:00', ''),
(33, 81, 'PAY-4GV81604C05425332LIFPAHQ', '', 'created', 5000, 'paypal', 'USD', '2017-11-14 08:01:11', '0000-00-00 00:00:00', ''),
(34, 78, 'PAY-31T856742K974280MLIFPCLI', '', 'approved', 500, 'paypal', 'USD', '2017-11-14 08:05:42', '0000-00-00 00:00:00', ''),
(35, 81, 'PAY-71K34239SA961222LLIFPEUQ', '', 'created', 456, 'paypal', 'USD', '2017-11-14 08:10:34', '0000-00-00 00:00:00', ''),
(36, 78, 'PAY-7U961497P8820701RLIFVAGA', '', 'created', 9999999, 'paypal', 'USD', '2017-11-14 14:50:41', '0000-00-00 00:00:00', ''),
(37, 78, 'PAY-89H48919SE9265045LIFVBTI', '', 'approved', 120, 'paypal', 'USD', '2017-11-14 14:53:41', '2017-11-15 03:24:42', ''),
(38, 82, 'PAY-1YM82787L9246034HLJMZ2IY', '', 'created', 0.01, 'paypal', 'USD', '2018-01-13 00:16:12', '0000-00-00 00:00:00', ''),
(39, 82, 'PAY-0TK66051DV119152YLJMZ3IY', '', 'created', 0.01, 'paypal', 'USD', '2018-01-13 00:18:19', '0000-00-00 00:00:00', ''),
(40, 83, 'PAY-06M56108Y1521323ULJM3AZY', '', 'created', 0.01, 'paypal', 'USD', '2018-01-13 01:38:23', '0000-00-00 00:00:00', ''),
(41, 12, 'PAY-7S3692150E5014923LJM3CLA', '', 'created', 100, 'paypal', 'USD', '2018-01-13 01:41:40', '0000-00-00 00:00:00', ''),
(42, 12, 'PAY-6F2019377V3052056LJM5VPQ', '', 'created', 100, 'paypal', 'USD', '2018-01-13 04:39:02', '0000-00-00 00:00:00', ''),
(43, 83, 'PAY-3M707536562559540LJOIC5Q', '', 'created', 10, 'paypal', 'USD', '2018-01-15 04:54:55', '0000-00-00 00:00:00', ''),
(44, 83, 'PAY-3NA8043399426872JLJOIDLA', '', 'created', 10, 'paypal', 'USD', '2018-01-15 04:55:48', '0000-00-00 00:00:00', ''),
(45, 83, 'PAY-0EC60872Y5906504HLJOIJSI', '', 'created', 0.01, 'paypal', 'USD', '2018-01-15 05:09:05', '0000-00-00 00:00:00', ''),
(46, 83, 'PAY-2YK17362A2347010BLJOI7HY', '', 'created', 0.02, 'paypal', 'USD', '2018-01-15 05:55:19', '0000-00-00 00:00:00', ''),
(47, 83, 'PAY-6DS40918EF505640ELJOJCHQ', '', 'created', 0.02, 'paypal', 'USD', '2018-01-15 06:01:42', '0000-00-00 00:00:00', ''),
(48, 83, 'PAY-58U392810B670191JLJOJE2I', '', 'created', 0.01, 'paypal', 'USD', '2018-01-15 06:07:13', '0000-00-00 00:00:00', ''),
(49, 12, 'PAY-35N80744NH3769428LJOJRTI', '', 'created', 50, 'paypal', 'USD', '2018-01-15 06:34:29', '0000-00-00 00:00:00', ''),
(50, 12, 'PAY-2JB7099783338361HLJONWCA', '', 'created', 100, 'paypal', 'USD', '2018-01-15 11:17:04', '0000-00-00 00:00:00', ''),
(51, 12, 'PAY-3RM28654AS2586811LJONXHY', '', 'created', 0.01, 'paypal', 'USD', '2018-01-15 11:19:35', '0000-00-00 00:00:00', ''),
(52, 12, 'PAY-4DC065651T867453CLJONXVA', '', 'created', 0.01, 'paypal', 'USD', '2018-01-15 11:20:28', '0000-00-00 00:00:00', ''),
(53, 12, 'PAY-0D506995CF8587813LJONYWY', '', 'created', 0.01, 'paypal', 'USD', '2018-01-15 11:22:43', '0000-00-00 00:00:00', ''),
(54, 83, 'PAY-49896302G3268704NLJO34UY', '', 'created', 0.01, 'paypal', 'USD', '2018-01-16 03:26:51', '0000-00-00 00:00:00', ''),
(55, 83, 'PAY-7PP631296S912400JLJO36QQ', '', 'created', 0.01, 'paypal', 'USD', '2018-01-16 03:30:50', '0000-00-00 00:00:00', ''),
(56, 83, 'PAY-6VM190128X3558114LJO4AKY', '', 'created', 0.01, 'paypal', 'USD', '2018-01-16 03:34:44', '0000-00-00 00:00:00', ''),
(57, 83, 'PAY-93018220KW620790DLJO4BOQ', '', 'created', 0.01, 'paypal', 'USD', '2018-01-16 03:37:06', '0000-00-00 00:00:00', ''),
(58, 83, 'PAY-0X93985313274182LLJO4CDA', '', 'created', 0.01, 'paypal', 'USD', '2018-01-16 03:38:28', '0000-00-00 00:00:00', ''),
(59, 83, 'PAY-1H0615219C383152XLJO4GDQ', '', 'created', 0.01, 'paypal', 'USD', '2018-01-16 03:47:02', '0000-00-00 00:00:00', ''),
(60, 83, 'PAY-84G82787VG6735310LJO4IMQ', '', 'created', 0.01, 'paypal', 'USD', '2018-01-16 03:51:54', '2018-01-16 01:29:52', ''),
(126, 109, 'PAY-2CX52055W6835411SLKRDCLA', '0', 'approved', 1, 'paypal', 'USD', '2018-03-09 01:31:00', '0000-00-00 00:00:00', ''),
(125, 109, 'PAY-8EU29244E3565714BLKRC5QY', '0', 'approved', 1.244, 'paypal', 'USD', '2018-03-09 01:27:36', '0000-00-00 00:00:00', ''),
(63, 83, 'PAY-0UX46000K0143152WLJO4UNQ', '', 'created', 0.01, 'paypal', 'USD', '2018-01-16 04:17:34', '0000-00-00 00:00:00', ''),
(64, 82, 'PAY-74B50323SJ061692PLJO5HGI', '', 'created', 0.01, 'paypal', 'USD', '2018-01-16 04:57:37', '0000-00-00 00:00:00', ''),
(65, 82, 'PAY-6FK88148FA481280NLJO5HWI', '', 'created', 0.01, 'paypal', 'USD', '2018-01-16 04:58:42', '0000-00-00 00:00:00', ''),
(66, 83, 'PAY-60G46080MY247590XLJO5JQY', '', 'created', 10, 'paypal', 'USD', '2018-01-16 05:02:35', '0000-00-00 00:00:00', ''),
(67, 83, 'PAY-1B649168G35641614LJO5OCI', '', 'created', 12, 'paypal', 'USD', '2018-01-16 05:12:17', '0000-00-00 00:00:00', ''),
(68, 1, 'PAY-2G756618DC4271408LJO5XAY', '', 'created', 50, 'paypal', 'USD', '2018-01-16 05:31:24', '0000-00-00 00:00:00', ''),
(70, 1, 'PAY-7GJ47232020437304LJO53KI', '', 'created', 2, 'paypal', 'USD', '2018-01-16 05:40:33', '0000-00-00 00:00:00', ''),
(71, 3, 'PAY-1DW9846924218335TLJO553Y', '', 'created', 2, 'paypal', 'USD', '2018-01-16 05:45:59', '0000-00-00 00:00:00', ''),
(72, 83, 'PAY-125306413Y764952KLJO6CDA', '', 'created', 200, 'paypal', 'USD', '2018-01-16 05:55:00', '2018-01-16 03:25:58', ''),
(73, 83, 'PAY-0GW31744N56036632LJO6DTI', '', 'created', 0.01, 'paypal', 'USD', '2018-01-16 05:58:13', '0000-00-00 00:00:00', ''),
(74, 83, 'PAY-7U5834997M608903ALJO6ONA', '', 'created', 50, 'paypal', 'USD', '2018-01-16 06:21:16', '0000-00-00 00:00:00', ''),
(75, 1, 'PAY-8CU59703RD261242HLJO6PAI', '', 'created', 2, 'paypal', 'USD', '2018-01-16 06:22:33', '0000-00-00 00:00:00', ''),
(76, 82, 'PAY-03K451278U728574ELJO6VYY', '', 'created', 0.01, 'paypal', 'USD', '2018-01-16 06:36:59', '0000-00-00 00:00:00', ''),
(77, 83, 'PAY-05L817132U318253ULJO6W3Q', '', 'created', 100, 'paypal', 'USD', '2018-01-16 06:39:18', '0000-00-00 00:00:00', ''),
(78, 84, 'PAY-3F067976J1875711ELJSMYQA', '', 'created', 25, 'paypal', 'USD', '2018-01-21 11:52:08', '0000-00-00 00:00:00', ''),
(79, 84, 'PAY-4CV1239315753053NLJSM2DA', '', 'created', 25, 'paypal', 'USD', '2018-01-21 11:55:32', '0000-00-00 00:00:00', ''),
(80, 87, 'PAY-18940608670917925LJS2JAA', '', 'created', 0.01, 'paypal', 'USD', '2018-01-22 03:14:48', '0000-00-00 00:00:00', ''),
(81, 84, 'PAY-9SV69955T7397171ULJS22PA', '', 'created', 100, 'paypal', 'USD', '2018-01-22 03:52:05', '0000-00-00 00:00:00', ''),
(82, 12, 'PAY-8LB64781M1186200JLJS3XOQ', '', 'created', 65, 'paypal', 'USD', '2018-01-22 04:53:54', '0000-00-00 00:00:00', ''),
(83, 12, 'PAY-4W443932EX3192601LJS34FY', '', 'created', 65, 'paypal', 'USD', '2018-01-22 05:03:59', '0000-00-00 00:00:00', ''),
(84, 12, 'PAY-96S66366X9022481PLJS37UQ', '', 'created', 300, 'paypal', 'USD', '2018-01-22 05:11:23', '0000-00-00 00:00:00', ''),
(85, 12, 'PAY-70288871T0501702ELJS4BHI', '', 'created', 877, 'paypal', 'USD', '2018-01-22 05:14:45', '0000-00-00 00:00:00', ''),
(86, 12, 'PAY-0FB71370XD765991WLJS4B2Y', '', 'created', 437, 'paypal', 'USD', '2018-01-22 05:16:04', '0000-00-00 00:00:00', ''),
(87, 83, 'PAY-87T69336LW6388325LJS4S7Q', '', 'created', 0.01, 'paypal', 'USD', '2018-01-22 05:52:38', '0000-00-00 00:00:00', ''),
(88, 83, 'PAY-30466321WT311973YLJS4T7I', '', 'created', 0.01, 'paypal', 'USD', '2018-01-22 05:54:46', '0000-00-00 00:00:00', ''),
(89, 83, 'PAY-94F63738YP098832NLJS5JIY', '', 'created', 0.01, 'paypal', 'USD', '2018-01-22 06:40:11', '0000-00-00 00:00:00', ''),
(90, 82, 'PAY-50W43652JF6292742LJS6DMA', '', 'created', 0.01, 'paypal', 'USD', '2018-01-22 07:35:52', '0000-00-00 00:00:00', ''),
(91, 83, 'PAY-5X792275UY106160WLJS6HBY', '', 'created', 645, 'paypal', 'USD', '2018-01-22 07:43:43', '0000-00-00 00:00:00', ''),
(92, 84, 'PAY-034779559D058871VLJUM2IQ', '', 'created', 115, 'paypal', 'USD', '2018-01-24 12:44:59', '0000-00-00 00:00:00', ''),
(93, 84, 'PAY-9TN337259X6961348LJUM55I', '', 'created', 110, 'paypal', 'USD', '2018-01-24 12:52:45', '0000-00-00 00:00:00', ''),
(94, 84, 'PAY-8VF90925LM528804RLJUOK5Y', '', 'created', 110, 'paypal', 'USD', '2018-01-24 14:28:47', '0000-00-00 00:00:00', ''),
(95, 88, 'PAY-4KF58959P8156880MLJU2YTQ', '', 'created', 100, 'paypal', 'USD', '2018-01-25 04:37:10', '0000-00-00 00:00:00', ''),
(96, 88, 'PAY-9N2439397U402750YLJU22JI', '', 'created', 100, 'paypal', 'USD', '2018-01-25 04:40:45', '0000-00-00 00:00:00', ''),
(97, 88, 'PAY-56X78158H0314890XLJU26XA', '', 'created', 0.17, 'paypal', 'USD', '2018-01-25 04:50:12', '0000-00-00 00:00:00', ''),
(98, 88, 'PAY-93H24815WM9707205LJU3CFQ', '', 'created', 0.05, 'paypal', 'USD', '2018-01-25 04:57:34', '0000-00-00 00:00:00', ''),
(99, 88, 'PAY-8CS488274T6600519LJU3JPI', '', 'created', 100, 'paypal', 'USD', '2018-01-25 05:13:10', '0000-00-00 00:00:00', ''),
(100, 88, 'PAY-7AC30551TB2200254LJU3TLQ', '', 'created', 30, 'paypal', 'USD', '2018-01-25 05:34:14', '0000-00-00 00:00:00', ''),
(101, 88, 'PAY-4VB38995GS838124ALJU4WOY', '', 'created', 100, 'paypal', 'USD', '2018-01-25 06:49:07', '0000-00-00 00:00:00', ''),
(102, 94, 'PAY-35402969MR1596634LJVDCYI', '', 'created', 0.01, 'paypal', 'USD', '2018-01-25 14:04:57', '0000-00-00 00:00:00', ''),
(103, 94, 'PAY-00R183464P319374WLJVDL3A', '', 'created', 0.01, 'paypal', 'USD', '2018-01-25 14:24:21', '0000-00-00 00:00:00', ''),
(104, 95, 'PAY-3E057082J8813843HLJVNNAI', '', 'created', 0.01, 'paypal', 'USD', '2018-01-26 01:49:29', '0000-00-00 00:00:00', ''),
(105, 96, 'PAY-3534516366178342ALJVOBDY', '', 'created', 0.01, 'paypal', 'USD', '2018-01-26 02:32:23', '0000-00-00 00:00:00', ''),
(106, 88, 'PAY-20Y88710E7151831MLJVPZ7A', '', 'approved', 100, 'paypal', 'USD', '2018-01-26 04:33:40', '2018-01-26 02:04:31', ''),
(107, 88, 'PAY-9V9663329B715373WLJVP5KA', '', 'created', 35, 'paypal', 'USD', '2018-01-26 04:40:48', '0000-00-00 00:00:00', ''),
(108, 99, 'PAY-96U0531316721372JLJVRT7I', '', 'created', 0.01, 'paypal', 'USD', '2018-01-26 06:37:25', '0000-00-00 00:00:00', ''),
(109, 99, 'PAY-6YC80005H9586341ALJVRXTY', '', 'approved', 0.01, 'paypal', 'USD', '2018-01-26 06:45:11', '2018-01-26 04:16:27', ''),
(110, 101, 'PAY-6J160343HE855074GLJVST4A', '', 'created', 0.01, 'paypal', 'USD', '2018-01-26 07:45:28', '0000-00-00 00:00:00', ''),
(111, 12, 'PAY-99M82414PU744743GLJVSWSQ', '', 'created', 100, 'paypal', 'USD', '2018-01-26 07:51:14', '0000-00-00 00:00:00', ''),
(112, 12, 'PAY-33V174776C978211PLJVSXMA', '', 'created', 0.01, 'paypal', 'USD', '2018-01-26 07:52:56', '0000-00-00 00:00:00', ''),
(113, 83, 'PAY-81C04526HC520544RLJWAXMY', '', 'created', 10, 'paypal', 'USD', '2018-01-26 23:48:43', '0000-00-00 00:00:00', ''),
(114, 83, 'PAY-2UK20540US6009441LJWAYAI', '', 'created', 10, 'paypal', 'USD', '2018-01-26 23:50:01', '0000-00-00 00:00:00', ''),
(115, 12, 'PAY-44K10188CB3535210LJWFIRQ', '', 'created', 2, 'paypal', 'USD', '2018-01-27 04:58:23', '0000-00-00 00:00:00', ''),
(116, 104, 'PAY-8WN615417S088751WLJWH6UA', '', 'created', 1, 'paypal', 'USD', '2018-01-27 08:02:00', '0000-00-00 00:00:00', ''),
(117, 84, 'PAY-2KX19915YS376662XLJXBFBI', '', 'approved', 100, 'paypal', 'USD', '2018-01-28 12:42:21', '2018-01-28 10:21:10', ''),
(118, 84, 'PAY-24D29325JW967583TLJXBLZQ', '', 'created', 100, 'paypal', 'USD', '2018-01-28 12:56:46', '0000-00-00 00:00:00', ''),
(119, 12, 'PAY-7VR352200R9364501LJYJI7Y', '', 'created', 560, 'paypal', 'USD', '2018-01-30 10:21:27', '0000-00-00 00:00:00', ''),
(120, 84, 'PAY-8GM138737U167035HLJYKSNA', '', 'created', 100, 'paypal', 'USD', '2018-01-30 11:49:48', '0000-00-00 00:00:00', ''),
(121, 84, 'PAY-4M059048RC316553JLJYKYAQ', '', 'approved', 100, 'paypal', 'USD', '2018-01-30 12:01:46', '2018-01-30 09:34:34', ''),
(124, 113, 'PAY-2WJ22143807854822LIFOOMA', '', 'approved', 101, 'paypal', 'USD', '2018-02-22 18:30:00', '2018-02-23 04:30:00', ''),
(131, 109, 'PAY-2GS86523E2841714RLKREF5I', '0', 'created', 100, 'paypal', 'USD', '2018-03-09 02:46:53', '0000-00-00 00:00:00', ''),
(132, 109, 'PAY-4R817917RT7890708LKREG5A', '0', 'created', 100, 'paypal', 'USD', '2018-03-09 02:49:00', '0000-00-00 00:00:00', ''),
(133, 137, 'PAY-09T526037A465440XLKRFP4A', '0', 'created', 76, 'paypal', 'USD', '2018-03-09 04:16:25', '0000-00-00 00:00:00', ''),
(134, 137, 'PAY-9PG37191AL736481DLKRFQJA', '0', 'approved', 100, 'paypal', 'USD', '2018-03-09 04:17:16', '0000-00-00 00:00:00', ''),
(135, 134, 'PAY-05M64563G6250844NLKRFRWY', '0', 'approved', 100, 'paypal', 'USD', '2018-03-09 04:20:19', '0000-00-00 00:00:00', ''),
(136, 138, 'PAY-2U795112SR453973SLKRGCRA', '0', 'created', 55, 'paypal', 'USD', '2018-03-09 04:56:12', '0000-00-00 00:00:00', ''),
(137, 138, 'PAY-9H65985709617451MLKRGC2I', '0', 'approved', 55, 'paypal', 'USD', '2018-03-09 04:56:50', '2018-03-09 10:27:03', ''),
(138, 142, 'PAY-35C01468TR4370235LKRMEWI', '0', 'created', 100, 'paypal', 'USD', '2018-03-09 11:50:25', '0000-00-00 00:00:00', ''),
(139, 146, 'PAY-7J215992MK032532MLNZ2LBQ', '0', 'created', 100, 'paypal', 'USD', '2018-08-14 22:31:27', '0000-00-00 00:00:00', ''),
(140, 12, 'PAY-5GN97329D2055534RLN2EHJI', '0', 'created', 100, 'paypal', 'USD', '2018-08-15 09:46:07', '0000-00-00 00:00:00', ''),
(141, 12, 'PAY-0X785462Y0425125RLN2EOPA', '0', 'created', 100, 'paypal', 'USD', '2018-08-15 10:01:26', '0000-00-00 00:00:00', ''),
(142, 12, 'PAYID-LN2EVBI7RE26008GT5669207', '0', 'created', 100, 'paypal', 'USD', '2018-08-15 10:15:28', '0000-00-00 00:00:00', ''),
(143, 12, 'PAYID-LN2EVNQ0433648560484401K', '0', 'created', 100, 'paypal', 'USD', '2018-08-15 10:16:16', '0000-00-00 00:00:00', ''),
(144, 12, 'PAYID-LN3446A7RG48417TN2423900', '0', 'created', 100, 'paypal', 'USD', '2018-08-18 02:15:23', '0000-00-00 00:00:00', ''),
(145, 12, 'PAY-56921843WS9500020LN35W6Q', '0', 'created', 100, 'paypal', 'USD', '2018-08-18 03:10:53', '0000-00-00 00:00:00', ''),
(146, 149, 'PAYID-LN4DESQ0CB53051EE9780124', '0', 'approved', 100, 'paypal', 'USD', '2018-08-18 09:21:18', '2018-08-18 14:52:22', ''),
(147, 154, 'PAY-153243732Y1458120LN4FZQA', '0', 'approved', 100, 'paypal', 'USD', '2018-08-18 12:22:29', '2018-08-18 17:58:24', ''),
(148, 160, 'PAY-6R99258877008512ELN4HOJI', '0', 'approved', 25, 'paypal', 'USD', '2018-08-18 14:15:06', '2018-08-18 19:46:30', ''),
(149, 160, 'PAY-86412532TP379663KLN4HPGQ', '0', 'created', 25, 'paypal', 'USD', '2018-08-18 14:17:03', '0000-00-00 00:00:00', ''),
(150, 160, 'PAYID-LN4SY7A5KV17316D4096692H', '0', 'created', 25, 'paypal', 'USD', '2018-08-19 03:08:51', '0000-00-00 00:00:00', ''),
(151, 160, 'PAY-5RE57110FA4089749LN4YRLY', '0', 'approved', 75, 'paypal', 'USD', '2018-08-19 09:42:15', '2018-08-19 15:13:16', ''),
(152, 160, 'PAY-99P13827JS783652HLN4ZFCI', '0', 'created', 5, 'paypal', 'USD', '2018-08-19 10:24:18', '0000-00-00 00:00:00', ''),
(153, 160, 'PAY-9T1685005D910481MLN4ZFNY', '0', 'approved', 1, 'paypal', 'USD', '2018-08-19 10:25:03', '2018-08-19 15:55:34', ''),
(154, 171, 'PAY-09B17956EK491413NLN42XZY', '0', 'created', 40, 'paypal', 'USD', '2018-08-19 12:12:32', '0000-00-00 00:00:00', ''),
(155, 163, 'PAY-04C99189UH820020ELN46KHQ', '0', 'approved', 25, 'paypal', 'USD', '2018-08-19 16:16:39', '2018-08-19 21:47:14', ''),
(156, 163, 'PAY-3XB13800H7565441WLN46MOI', '0', 'approved', 5, 'paypal', 'USD', '2018-08-19 16:21:23', '2018-08-19 21:51:38', ''),
(157, 163, 'PAY-2MS93654EG423331VLN46O2A', '0', 'approved', 5, 'paypal', 'USD', '2018-08-19 16:26:25', '2018-08-19 21:57:08', ''),
(158, 163, 'PAY-5ER45529M40445248LN46RDI', '0', 'created', 25, 'paypal', 'USD', '2018-08-19 16:31:18', '0000-00-00 00:00:00', ''),
(159, 163, 'PAY-1G718591V32286405LN46RDQ', '0', 'created', 25, 'paypal', 'USD', '2018-08-19 16:31:19', '0000-00-00 00:00:00', ''),
(160, 163, 'PAY-8WA863357W3352713LN46REA', '0', 'created', 25, 'paypal', 'USD', '2018-08-19 16:31:21', '0000-00-00 00:00:00', ''),
(161, 163, 'PAY-76167574UB686014ALN46REI', '0', 'created', 25, 'paypal', 'USD', '2018-08-19 16:31:23', '0000-00-00 00:00:00', ''),
(162, 163, 'PAYID-LN46TDA1VB33537GY048944C', '0', 'created', 40, 'paypal', 'USD', '2018-08-19 16:35:33', '0000-00-00 00:00:00', ''),
(163, 163, 'PAY-1YS73980MW506993ELN46TXY', '0', 'created', 40, 'paypal', 'USD', '2018-08-19 16:36:56', '0000-00-00 00:00:00', ''),
(164, 163, 'PAY-7F948034JW974664SLN46UYY', '0', 'created', 40, 'paypal', 'USD', '2018-08-19 16:39:08', '0000-00-00 00:00:00', ''),
(165, 174, 'PAY-2BE57336FH071912DLN5EQHI', '0', 'created', 100, 'paypal', 'USD', '2018-08-19 23:19:03', '0000-00-00 00:00:00', ''),
(166, 174, 'PAY-6K796886F9301532FLN5ESQI', '0', 'created', 100, 'paypal', 'USD', '2018-08-19 23:23:55', '0000-00-00 00:00:00', ''),
(167, 163, 'PAY-04N933431N555223MLN5IMWI', '0', 'approved', 40, 'paypal', 'USD', '2018-08-20 03:44:01', '2018-08-20 09:15:47', ''),
(168, 163, 'PAY-8SG37140E6677250RLN5INUQ', '0', 'approved', 25, 'paypal', 'USD', '2018-08-20 03:46:02', '2018-08-20 09:16:42', ''),
(169, 12, 'PAY-4BM579608X753200HLN5NWWI', '0', 'created', 100, 'paypal', 'USD', '2018-08-20 09:46:42', '0000-00-00 00:00:00', ''),
(170, 174, 'PAY-2K0760362C350203XLN55I6Y', '0', 'approved', 100, 'paypal', 'USD', '2018-08-21 03:29:43', '2018-08-21 09:00:29', ''),
(171, 177, 'PAYID-LN6XVLY642576917N1670425', '0', 'approved', 100, 'paypal', 'USD', '2018-08-22 09:31:11', '2018-08-22 15:06:43', ''),
(172, 12, 'PAYID-LOLXBYA4R088171MA130134A', '0', 'created', 100, 'paypal', 'USD', '2018-09-11 02:09:25', '0000-00-00 00:00:00', ''),
(173, 12, '', '', 'created', 1, 'paypal', 'USD', '2018-09-11 04:17:19', '0000-00-00 00:00:00', '123AZSWE'),
(174, 12, '', '', 'created', 12, 'paypal', 'USD', '2018-09-11 04:23:03', '0000-00-00 00:00:00', 'WA21222'),
(175, 12, '', '', 'created', 13, 'paypal', 'USD', '2018-09-11 04:41:00', '0000-00-00 00:00:00', '13AC'),
(177, 12, 'sasasdasdadbbnh123', '0', 'created', 1, 'advcash', 'USD', '2018-09-11 07:51:31', '0000-00-00 00:00:00', ''),
(178, 12, 'sasasdasdadbbnh123', '0', 'created', 1, 'advcash', 'USD', '2018-09-11 08:10:25', '0000-00-00 00:00:00', ''),
(179, 12, 'sasasdasdadbbnh123', '0', 'created', 1, 'advcash', 'USD', '2018-09-11 08:10:53', '0000-00-00 00:00:00', ''),
(180, 12, 'sasasdasdadbbnh123', '0', 'created', 1, 'advcash', 'USD', '2018-09-11 08:13:14', '0000-00-00 00:00:00', ''),
(181, 12, 'sasasdasdadbbnh123', '0', 'created', 1, 'advcash', 'USD', '2018-09-11 08:16:10', '0000-00-00 00:00:00', ''),
(182, 12, '', '', 'created', 23, 'paypal', 'USD', '2018-09-11 08:22:52', '0000-00-00 00:00:00', 'test321@gmail.com'),
(183, 12, '', '', 'created', 1, 'paypal', 'USD', '2018-09-11 08:58:14', '0000-00-00 00:00:00', 'sasas'),
(184, 12, '', '', 'created', 350, 'paypal', 'USD', '2018-09-11 13:26:46', '0000-00-00 00:00:00', 'r'),
(185, 179, '', '', 'created', 12, 'paypal', 'USD', '2018-09-11 23:24:40', '0000-00-00 00:00:00', 'sa324'),
(186, 179, 'PAYID-LOMLD3I4LL07371EK318483J', '0', 'created', 12, 'paypal', 'USD', '2018-09-12 00:59:17', '0000-00-00 00:00:00', ''),
(187, 179, 'PAYID-LOMLEKI29571862JD5080722', '0', 'created', 12, 'paypal', 'USD', '2018-09-12 01:00:17', '0000-00-00 00:00:00', ''),
(188, 179, 'PAYID-LOMLFII2KK88084E7584254J', '0', 'created', 1, 'paypal', 'USD', '2018-09-12 01:02:17', '0000-00-00 00:00:00', ''),
(189, 179, 'PAYID-LOMLTLY26C6619788512451L', '0', 'created', 1, 'paypal', 'USD', '2018-09-12 01:32:24', '0000-00-00 00:00:00', ''),
(190, 12, '', '', 'created', 2, 'paypal', 'USD', '2018-09-13 06:20:23', '0000-00-00 00:00:00', 'j'),
(191, 12, '', '', 'created', 1234, 'paypal', 'USD', '2018-09-13 06:58:30', '0000-00-00 00:00:00', 'kundan@tactionsoftware.com'),
(192, 12, '', '', 'created', 345, 'paypal', 'USD', '2018-09-13 06:59:39', '0000-00-00 00:00:00', 'kundan@tactionsoftware.com'),
(193, 12, '', '', 'created', 123, 'paypal', 'USD', '2018-09-13 07:11:17', '0000-00-00 00:00:00', 'kundan@tactionsoftware.com'),
(194, 12, '', '', 'created', 23, 'paypal', 'USD', '2018-09-13 07:15:48', '0000-00-00 00:00:00', 'kundan@tac.xom'),
(195, 179, '', '', 'created', 1, 'paypal', 'USD', '2018-09-13 07:43:58', '0000-00-00 00:00:00', 'sdsdsd'),
(196, 180, '', '', 'created', 12345, 'paypal', 'USD', '2018-09-13 08:00:21', '0000-00-00 00:00:00', 'kundan@tactionsoftware.com'),
(197, 12, 'PAYID-LONWDPY5FD75097AN151882V', '0', 'created', 100, 'paypal', 'USD', '2018-09-14 01:54:06', '0000-00-00 00:00:00', ''),
(198, 12, 'PAYID-LONWETY10E44774PS902080H', '0', 'created', 100, 'paypal', 'USD', '2018-09-14 01:56:31', '0000-00-00 00:00:00', ''),
(199, 179, 'PAYID-LONWFGY8CC25657F8098735N', '0', 'created', 1, 'paypal', 'USD', '2018-09-14 01:57:46', '0000-00-00 00:00:00', ''),
(200, 12, '', '', 'created', 2, 'paypal', 'USD', '2018-09-14 02:07:14', '0000-00-00 00:00:00', 'dkjfnjsaf@knvdkn.co,'),
(201, 179, 'PAYID-LONWMDY6DS5089287316343D', '0', 'created', 1, 'paypal', 'USD', '2018-09-14 02:12:31', '0000-00-00 00:00:00', ''),
(202, 179, 'PAYID-LONWMNY7DB408702Y819164B', '0', 'created', 1, 'paypal', 'USD', '2018-09-14 02:13:11', '0000-00-00 00:00:00', ''),
(203, 179, 'PAYID-LONWM7A8PF69256FL115560W', '0', 'created', 1, 'paypal', 'USD', '2018-09-14 02:14:19', '0000-00-00 00:00:00', ''),
(204, 179, '', '', 'created', 1, '', 'EUR', '2018-09-14 03:46:06', '0000-00-00 00:00:00', 'asas'),
(205, 12, 'PAYID-LOPUJSQ5UC1504976263112H', '0', 'created', 100, 'paypal', 'USD', '2018-09-17 00:39:48', '0000-00-00 00:00:00', ''),
(206, 187, 'PAYID-LOPZFAI0KN85859XJ366191D', '0', 'created', 123, 'paypal', 'USD', '2018-09-17 06:11:24', '0000-00-00 00:00:00', ''),
(207, 187, 'PAYID-LOPZFEY53S46828JC009331R', '0', 'created', 123, 'paypal', 'USD', '2018-09-17 06:11:41', '0000-00-00 00:00:00', ''),
(208, 12, 'PAYID-LOP7LOI5AY01002W0467692C', '0', 'created', 100, 'paypal', 'USD', '2018-09-17 13:14:44', '0000-00-00 00:00:00', ''),
(209, 179, 'PAYID-LOQINRI50L52888WU787535V', '0', 'created', 1, 'paypal', 'USD', '2018-09-17 23:33:38', '0000-00-00 00:00:00', ''),
(210, 179, 'PAYID-LOQINUY0W015092SY7202332', '0', 'created', 12, 'paypal', 'USD', '2018-09-17 23:33:52', '0000-00-00 00:00:00', ''),
(211, 179, 'PAYID-LOQITCQ4K609702MC404134F', '0', 'created', 12, 'paypal', 'USD', '2018-09-17 23:45:28', '0000-00-00 00:00:00', ''),
(212, 179, 'PAYID-LOQITLY99P76813YT6636258', '0', 'created', 12, 'paypal', 'USD', '2018-09-17 23:46:04', '0000-00-00 00:00:00', ''),
(213, 179, 'PAYID-LOQIY3Y4PH4953351074650M', '0', 'created', 12, 'paypal', 'USD', '2018-09-17 23:57:49', '0000-00-00 00:00:00', ''),
(214, 149, 'PAYID-LOQL62Y2X591136MC955713F', '0', 'approved', 25, 'paypal', 'USD', '2018-09-18 03:35:20', '0000-00-00 00:00:00', ''),
(215, 154, 'PAYID-LOQMAOA6P6978205M407011N', '0', 'approved', 25, 'paypal', 'USD', '2018-09-18 03:38:46', '0000-00-00 00:00:00', ''),
(216, 163, 'PAYID-LOQMBTQ44166831WD041040E', '0', 'approved', 25, 'paypal', 'USD', '2018-09-18 03:41:16', '0000-00-00 00:00:00', ''),
(217, 174, 'PAYID-LOQMCUI23V11114LX839334S', '0', 'approved', 25, 'paypal', 'USD', '2018-09-18 03:43:27', '0000-00-00 00:00:00', ''),
(218, 189, 'PAYID-LOQROUI29G00430XY8376229', '0', 'approved', 125, 'paypal', 'USD', '2018-09-18 09:50:24', '2018-09-18 15:21:13', ''),
(219, 190, 'PAYID-LOQ7WHY41K89943WM114872U', '0', 'approved', 125, 'paypal', 'USD', '2018-09-19 02:02:25', '2018-09-19 07:32:56', ''),
(220, 0, 'PAYID-LORCROI38Y99919UW764243R', '0', 'created', 125, 'paypal', 'USD', '2018-09-19 05:16:59', '0000-00-00 00:00:00', ''),
(221, 192, 'PAYID-LORCSAA4DY23010YC824894A', '0', 'created', 125, 'paypal', 'USD', '2018-09-19 05:18:10', '2018-09-19 10:48:50', ''),
(222, 130, 'PAYID-LOSLFWI4VK823590X820853K', '0', 'approved', 125, 'paypal', 'USD', '2018-09-21 03:30:57', '0000-00-00 00:00:00', ''),
(223, 199, 'PAYID-LOTGWLY1FJ57238UK985240B', '0', 'approved', 43.75, 'paypal', 'USD', '2018-09-22 10:49:48', '0000-00-00 00:00:00', ''),
(232, 204, '', '', 'created', 125, '', 'EUR', '2018-09-24 13:10:56', '0000-00-00 00:00:00', 'mnp2004@hotmail.com'),
(233, 0, '', '', 'created', 130, '', 'EUR', '2018-09-24 14:22:28', '0000-00-00 00:00:00', 'vargas3rick7@gmail.com'),
(231, 206, '', '', 'approved', 125, '', 'EUR', '2018-09-24 05:26:41', '0000-00-00 00:00:00', 'catarina_costa01@hotmail.com'),
(227, 209, '', '', 'approved', 125, '', 'EUR', '2018-09-24 01:22:02', '0000-00-00 00:00:00', 'giorgia.webwork@gmail.com'),
(234, 203, '', '', 'approved', 125, '', 'EUR', '2018-09-24 14:22:54', '0000-00-00 00:00:00', 'vargas3rick7@gmail.com'),
(235, 208, '', '', 'approved', 125, '', 'EUR', '2018-09-24 17:56:19', '0000-00-00 00:00:00', 'N/A'),
(236, 205, '', '', 'created', 35, '', 'EUR', '2018-09-25 05:49:45', '0000-00-00 00:00:00', '15201863587@163.com'),
(237, 205, '', '', 'created', 35, '', 'EUR', '2018-09-25 09:59:48', '0000-00-00 00:00:00', '15201863587@163.com'),
(238, 204, '', '', 'created', 35, '', 'EUR', '2018-09-26 09:16:27', '0000-00-00 00:00:00', 'mariela.pascuzzo@lionbridge.com'),
(239, 204, '', '', 'created', 50, '', 'EUR', '2018-09-26 09:16:51', '0000-00-00 00:00:00', 'mariela.pascuzzo@lionbridge.com'),
(240, 12, 'PAYID-LOWP2QY34J122765K8990049', '0', 'created', 125, 'paypal', 'USD', '2018-09-27 10:26:58', '0000-00-00 00:00:00', ''),
(241, 204, 'PAYID-LOWQCZA32A254076M859483G', '0', 'created', 125, 'paypal', 'USD', '2018-09-27 10:44:35', '0000-00-00 00:00:00', ''),
(242, 204, 'PAYID-LOWQHAA76Y77282017285732', '0', 'created', 130, 'paypal', 'USD', '2018-09-27 10:53:34', '0000-00-00 00:00:00', ''),
(243, 204, 'PAYID-LOWRJDI48F43086SN884263B', '0', 'created', 125, 'paypal', 'USD', '2018-09-27 12:06:20', '0000-00-00 00:00:00', ''),
(244, 204, '', '', 'created', 125, '', 'EUR', '2018-09-27 12:08:18', '0000-00-00 00:00:00', 'mariela.pascuzzo@lionbridge.com'),
(245, 12, 'PAYID-LOW26HY6J5134007N405461F', '0', 'created', 125, 'paypal', 'USD', '2018-09-27 23:05:51', '0000-00-00 00:00:00', ''),
(246, 217, '2602133850', '0', 'approved', 5, 'Skrill', 'USD', '2019-01-12 11:27:05', '0000-00-00 00:00:00', 'verify.now.18+1@gmail.com'),
(247, 217, '2602138979', '0', 'approved', 11, 'Skrill', 'USD', '2019-01-12 11:32:46', '0000-00-00 00:00:00', 'verify.now.18+1@gmail.com'),
(248, 217, '2602151668', '0', 'approved', 21, 'Skrill', 'USD', '2019-01-12 11:43:14', '0000-00-00 00:00:00', 'verify.now.18+1@gmail.com'),
(249, 217, '2602240680', '0', 'approved', 3, 'Skrill', 'USD', '2019-01-12 13:05:23', '0000-00-00 00:00:00', 'verify.now.18+1@gmail.com'),
(250, 217, '2602266800', '0', 'approved', 5, 'Skrill', 'USD', '2019-01-12 13:28:23', '0000-00-00 00:00:00', 'verify.now.18+1@gmail.com'),
(251, 232, '2603638534', '0', 'approved', 135, 'Skrill', 'USD', '2019-01-13 23:42:49', '0000-00-00 00:00:00', 'accounting@reojen.com'),
(252, 218, '2615925198', '0', 'approved', 140, 'Skrill', 'USD', '2019-01-25 18:21:05', '0000-00-00 00:00:00', 'accounting@reojen.com'),
(253, 228, '2615944122', '0', 'approved', 10, 'Skrill', 'USD', '2019-01-25 18:36:39', '0000-00-00 00:00:00', 'accounting@reojen.com'),
(254, 240, '2616051530', '0', 'approved', 135, 'Skrill', 'USD', '2019-01-25 20:23:34', '0000-00-00 00:00:00', 'accounting@reojen.com'),
(255, 226, '2616090501', '0', 'approved', 10, 'Skrill', 'USD', '2019-01-25 21:16:52', '0000-00-00 00:00:00', 'accounting@reojen.com'),
(256, 226, '2616560814', '0', 'approved', 125, 'Skrill', 'USD', '2019-01-26 11:18:59', '0000-00-00 00:00:00', 'accounting@reojen.com');

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(11) NOT NULL,
  `setting_name` text NOT NULL,
  `setting_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `setting_name`, `setting_value`) VALUES
(34, 'paypal_client_id', 'AR7WjJZCrciG56jOLWkr-PFVR7jyEgqqaVuaETAwK1ewKt9HNWcG4uKv5OymoyTP08U7hjFMIwnkYOG4'),
(33, 'smtp_security', 'tls'),
(32, 'smtp_password', 'n!pH74vHeMkpr#h&dR04'),
(31, 'smtp_user', 'support@reojen.com'),
(30, 'smtp_port', '587'),
(29, 'smtp_host', 'smtp.ionos.com'),
(28, 'mail_from_name', 'Reojen'),
(27, 'mail_from', 'no-reply@reojen.com'),
(35, 'paypal_secret_key', 'EIJ-uavRK0LCy7bx4GbVMlcDD4SxDfJ5PAWHcUjuJyy-Qc7dXKocV_NJ01baae-MVXZbDuEjr7jlPtQ8'),
(36, 'support_message_status', '1'),
(37, 'advcash_api_name', 'Reojen Co.'),
(38, 'advcash_account_email', 'astro3454@gmail.com'),
(39, 'advcash_api_password', 'O%naC6!gM9^eJ1@NEf6'),
(40, 'pay_to_email', 'accounting@reojen.com'),
(41, 'skrill_secret_word', 'jepvzwjlf'),
(42, 'skrill_merchant_id', '109686100'),
(43, 'skrill_notify_email', 'skrill-usd-payment@reojen.com'),
(44, 'skrill_mqi_password', 'j38Qbk9$wHb9^zQkP8g');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `support_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE `bankdetails` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `acname` varchar(50) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `branchadd` varchar(50) NOT NULL,
  `branchcity` varchar(50) NOT NULL,
  `swift` varchar(50) NOT NULL,
  `acno` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `change_currency`
--

CREATE TABLE `change_currency` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `currency_symbol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `change_currency`
--

INSERT INTO `change_currency` (`id`, `name`, `value`, `create_date`, `currency_symbol`) VALUES
(1, 'currency_type', 'USD', '2019-01-08 05:49:43', '<i class=\"fa fa-usd\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `description`) VALUES
(1, 'Terms and Conditions', '<div ng-if=\"!generator.isLastStep()\" ng-show=\"generator.isFirstStep()\">\n<div id=\"placeholders\">\n<h2 style=\"text-align: center;\">TERMS AND CONDITIONS</h2>\n<ol>\n<li><strong>Introduction</strong></li>\n</ol>\n<p>These Website Standard Terms and Conditions written on this webpage shall manage your use of this website. These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.</p>\n<p>Minors or people below 18 years old are not allowed to use this Website.</p>\n<ol start=\"2\">\n<li><strong>Intellectual Property Rights</strong></li>\n</ol>\n<p>Other than the content you own, under these Terms, <span ng-click=\"generator.focus(0)\" ng-mouseenter=\"generator.shake(0)\" ng-class=\"{ placeholder: generator.isFirstStep() }\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Please fill Name of Company\" ><span>{{generator.field_company}}</span></span> and/or its licensors own all the intellectual property rights and materials contained in this Website.</p>\n<p>You are granted limited license only for purposes of viewing the material contained on this Website.</p>\n<ol start=\"3\">\n<li><strong>Restrictions</strong></li>\n</ol>\n<p>You are specifically restricted from all of the following</p>\n<ul>\n<li>publishing any Website material in any other media;</li>\n<li>selling, sublicensing and/or otherwise commercializing any Website material;</li>\n<li>publicly performing and/or showing any Website material;</li>\n<li>using this Website in any way that is or may be damaging to this Website;</li>\n<li>using this Website in any way that impacts user access to this Website;</li>\n<li>using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li>\n<li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>\n<li>using this Website to engage in any advertising or marketing.</li>\n</ul>\n<p>Certain areas of this Website are restricted from being access by you and <span ng-click=\"generator.focus(0)\" ng-mouseenter=\"generator.shake(0)\" ng-class=\"{ placeholder: generator.isFirstStep() }\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Please fill Name of Company\" ><span>{{generator.field_company}}</span></span> may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</p>\n<p>In no event shall <span ng-click=\"generator.focus(0)\" ng-mouseenter=\"generator.shake(0)\" ng-class=\"{ placeholder: generator.isFirstStep() }\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Please fill Name of Company\" ><span>{{generator.field_company}}</span></span>, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  <span ng-click=\"generator.focus(0)\" ng-mouseenter=\"generator.shake(0)\" ng-class=\"{ placeholder: generator.isFirstStep() }\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Please fill Name of Company\" ><span>{{generator.field_company}}</span></span>, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>\n<ol start=\"7\">\n<li><strong>Indemnification</strong></li>\n</ol>\n<p>You hereby indemnify to the fullest extent <span ng-click=\"generator.focus(0)\" ng-mouseenter=\"generator.shake(0)\" ng-class=\"{ placeholder: generator.isFirstStep() }\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Please fill Name of Company\" ><span>{{generator.field_company}}</span></span> from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p>\n<ol start=\"8\">\n<li><strong>Severability</strong></li>\n</ol>\n<p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.</p>\n<ol start=\"9\">\n<li><strong>Variation of Terms</strong></li>\n</ol>\n<p>These Terms constitute the entire agreement between <span ng-click=\"generator.focus(0)\" ng-mouseenter=\"generator.shake(0)\" ng-class=\"{ placeholder: generator.isFirstStep() }\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Please fill Name of Company\" ><span>{{generator.field_company}}</span></span> and you in relation to your use of this Website, and supersede all prior agreements and understandings.</p>\n    </div>\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `countrycode`
--

CREATE TABLE `countrycode` (
  `id` int(11) NOT NULL,
  `iso` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `iso3` varchar(255) NOT NULL,
  `Code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countrycode`
--

INSERT INTO `countrycode` (`id`, `iso`, `name`, `Country`, `iso3`, `Code`) VALUES
(1, 'AF', 'Afghanistan', 'Afghanistan', 'AFG', '93'),
(2, 'AL', 'Albania', 'Albania', 'ALB', '355'),
(3, 'DZ', 'Algeria', 'Algeria', 'DZA', '213'),
(4, 'AS', 'American Samoa', 'American Samoa', 'ASM', '1684'),
(5, 'AD', 'Andorra', 'Andorra', 'AND', '376'),
(6, 'AO', 'Angola', 'Angola', 'AGO', '244'),
(7, 'AI', 'Anguilla', 'Anguilla', 'AIA', '1264'),
(8, 'AQ', 'Antarctica', 'Antarctica', 'ATA', '672'),
(9, 'AG', 'Antigua and Barbuda', 'Antigua and Barbuda', 'ATG', '1268'),
(10, 'AR', 'Argentina', 'Argentina', 'ARG', '54'),
(11, 'AM', 'Armenia', 'Armenia', 'ARM', '374'),
(12, 'AW', 'Aruba', 'Aruba', 'ABW', '297'),
(13, 'AU', 'Australia', 'Australia', 'AUS', '61'),
(14, 'AT', 'Austria', 'Austria', 'AUT', '43'),
(15, 'AZ', 'Azerbaijan', 'Azerbaijan', 'AZE', '994'),
(16, 'BS', 'Bahamas', 'Bahamas', 'BHS', '1242'),
(17, 'BH', 'Bahrain', 'Bahrain', 'BHR', '973'),
(18, 'BD', 'Bangladesh', 'Bangladesh', 'BGD', '880'),
(19, 'BB', 'Barbados', 'Barbados', 'BRB', '1246'),
(20, 'BY', 'Belarus', 'Belarus', 'BLR', '375'),
(21, 'BE', 'Belgium', 'Belgium', 'BEL', '32'),
(22, 'BZ', 'Belize', 'Belize', 'BLZ', '501'),
(23, 'BJ', 'Benin', 'Benin', 'BEN', '229'),
(24, 'BM', 'Bermuda', 'Bermuda', 'BMU', '1441'),
(25, 'BT', 'Bhutan', 'Bhutan', 'BTN', '975'),
(26, 'BO', 'Bolivia', 'Bolivia', 'BOL', '591'),
(27, 'BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'BIH', '387'),
(28, 'BW', 'Botswana', 'Botswana', 'BWA', '267'),
(29, 'BR', 'Brazil', 'Brazil', 'BRA', '55'),
(30, 'IO', 'British Indian Ocean Territory', 'British Indian Ocean Territory', 'IOT', '246'),
(31, 'VG', 'British Virgin Islands', 'British Virgin Islands', 'VGB', '1284'),
(32, 'BN', 'Brunei', 'Brunei', 'BRN', '673'),
(33, 'BG', 'Bulgaria', 'Bulgaria', 'BGR', '359'),
(34, 'BF', 'Burkina Faso', 'Burkina Faso', 'BFA', '226'),
(35, 'BI', 'Burundi', 'Burundi', 'BDI', '257'),
(36, 'KH', 'Cambodia', 'Cambodia', 'KHM', '855'),
(37, 'CM', 'Cameroon', 'Cameroon', 'CMR', '237'),
(38, 'CA', 'Canada', 'Canada', 'CAN', '1'),
(39, 'CV', 'Cape Verde', 'Cape Verde', 'CPV', '238'),
(40, 'KY', 'Cayman Islands', 'Cayman Islands', 'CYM', '1345'),
(41, 'CF', 'Central African Republic', 'Central African Republic', 'CAF', '236'),
(42, 'TD', 'Chad', 'Chad', 'TCD', '235'),
(43, 'CL', 'Chile', 'Chile', 'CHL', '56'),
(44, 'CN', 'China', 'China', 'CHN', '86'),
(45, 'CX', 'Christmas Island', 'Christmas Island', 'CXR', '61'),
(46, 'CC', 'Cocos Islands', 'Cocos Islands', 'CCK', '61'),
(47, 'CO', 'Colombia', 'Colombia', 'COL', '57'),
(48, 'KM', 'Comoros', 'Comoros', 'COM', '269'),
(49, 'CK', 'Cook Islands', 'Cook Islands', 'COK', '682'),
(50, 'CR', 'Costa Rica', 'Costa Rica', 'CRI', '506'),
(51, 'HR', 'Croatia', 'Croatia', 'HRV', '385'),
(52, 'CU', 'Cuba', 'Cuba', 'CUB', '53'),
(53, 'CW', 'Curacao', 'Curacao', 'CUW', '599'),
(54, 'CY', 'Cyprus', 'Cyprus', 'CYP', '357'),
(55, 'CZ', 'Czech Republic', 'Czech Republic', 'CZE', '420'),
(56, 'CD', 'Democratic Republic of the Congo', 'Democratic Republic of the Congo', 'COD', '243'),
(57, 'DK', 'Denmark', 'Denmark', 'DNK', '45'),
(58, 'DJ', 'Djibouti', 'Djibouti', 'DJI', '253'),
(59, 'DM', 'Dominica', 'Dominica', 'DMA', '1767'),
(60, 'DO', 'Dominican Republic', 'Dominican Republic', 'DOM', '1809'),
(61, 'TL', 'East Timor', 'East Timor', 'TLS', '670'),
(62, 'EC', 'Ecuador', 'Ecuador', 'ECU', '593'),
(63, 'EG', 'Egypt', 'Egypt', 'EGY', '20'),
(64, 'SV', 'El Salvador', 'El Salvador', 'SLV', '503'),
(65, 'GQ', 'Equatorial Guinea', 'Equatorial Guinea', 'GNQ', '240'),
(66, 'ER', 'Eritrea', 'Eritrea', 'ERI', '291'),
(67, 'EE', 'Estonia', 'Estonia', 'EST', '372'),
(68, 'ET', 'Ethiopia', 'Ethiopia', 'ETH', '251'),
(69, 'FK', 'Falkland Islands', 'Falkland Islands', 'FLK', '500'),
(70, 'FO', 'Faroe Islands', 'Faroe Islands', 'FRO', '298'),
(71, 'FJ', 'Fiji', 'Fiji', 'FJI', '679'),
(72, 'FI', 'Finland', 'Finland', 'FIN', '358'),
(73, 'FR', 'France', 'France', 'FRA', '33'),
(74, 'PF', 'French Polynesia', 'French Polynesia', 'PYF', '689'),
(75, 'GA', 'Gabon', 'Gabon', 'GAB', '241'),
(76, 'GM', 'Gambia', 'Gambia', 'GMB', '220'),
(77, 'GE', 'Georgia', 'Georgia', 'GEO', '995'),
(78, 'DE', 'Germany', 'Germany', 'DEU', '49'),
(79, 'GH', 'Ghana', 'Ghana', 'GHA', '233'),
(80, 'GI', 'Gibraltar', 'Gibraltar', 'GIB', '350'),
(81, 'GR', 'Greece', 'Greece', 'GRC', '30'),
(82, 'GL', 'Greenland', 'Greenland', 'GRL', '299'),
(83, 'GD', 'Grenada', 'Grenada', 'GRD', '1473'),
(84, 'GU', 'Guam', 'Guam', 'GUM', '1671'),
(85, 'GT', 'Guatemala', 'Guatemala', 'GTM', '502'),
(86, 'GG', 'Guernsey', 'Guernsey', 'GGY', '441481'),
(87, 'GN', 'Guinea', 'Guinea', 'GIN', '224'),
(88, 'GW', 'Guinea-Bissau', 'Guinea-Bissau', 'GNB', '245'),
(89, 'GY', 'Guyana', 'Guyana', 'GUY', '592'),
(90, 'HT', 'Haiti', 'Haiti', 'HTI', '509'),
(91, 'HN', 'Honduras', 'Honduras', 'HND', '504'),
(92, 'HK', 'Hong Kong', 'Hong Kong', 'HKG', '852'),
(93, 'HU', 'Hungary', 'Hungary', 'HUN', '36'),
(94, 'IS', 'Iceland', 'Iceland', 'ISL', '354'),
(95, 'IN', 'India', 'India', 'IND', '91'),
(96, 'ID', 'Indonesia', 'Indonesia', 'IDN', '62'),
(97, 'IR', 'Iran', 'Iran', 'IRN', '98'),
(98, 'IQ', 'Iraq', 'Iraq', 'IRQ', '964'),
(99, 'IE', 'Ireland', 'Ireland', 'IRL', '353'),
(100, 'IM', 'Isle of Man', 'Isle of Man', 'IMN', '441624'),
(101, 'IL', 'Israel', 'Israel', 'ISR', '972'),
(102, 'IT', 'Italy', 'Italy', 'ITA', '39'),
(103, 'CI', 'Ivory Coast', 'Ivory Coast', 'CIV', '225'),
(104, 'JM', 'Jamaica', 'Jamaica', 'JAM', '1876'),
(105, 'JP', 'Japan', 'Japan', 'JPN', '81'),
(106, 'JE', 'Jersey', 'Jersey', 'JEY', '441534'),
(107, 'JO', 'Jordan', 'Jordan', 'JOR', '962'),
(108, 'KZ', 'Kazakhstan', 'Kazakhstan', 'KAZ', '7'),
(109, 'KE', 'Kenya', 'Kenya', 'KEN', '254'),
(110, 'KI', 'Kiribati', 'Kiribati', 'KIR', '686'),
(111, 'XK', 'Kosovo', 'Kosovo', 'XKX', '383'),
(112, 'KW', 'Kuwait', 'Kuwait', 'KWT', '965'),
(113, 'KG', 'Kyrgyzstan', 'Kyrgyzstan', 'KGZ', '996'),
(114, 'LA', 'Laos', 'Laos', 'LAO', '856'),
(115, 'LV', 'Latvia', 'Latvia', 'LVA', '371'),
(116, 'LB', 'Lebanon', 'Lebanon', 'LBN', '961'),
(117, 'LS', 'Lesotho', 'Lesotho', 'LSO', '266'),
(118, 'LR', 'Liberia', 'Liberia', 'LBR', '231'),
(119, 'LY', 'Libya', 'Libya', 'LBY', '218'),
(120, 'LI', 'Liechtenstein', 'Liechtenstein', 'LIE', '423'),
(121, 'LT', 'Lithuania', 'Lithuania', 'LTU', '370'),
(122, 'LU', 'Luxembourg', 'Luxembourg', 'LUX', '352'),
(123, 'MO', 'Macau', 'Macau', 'MAC', '853'),
(124, 'MK', 'Macedonia', 'Macedonia', 'MKD', '389'),
(125, 'MG', 'Madagascar', 'Madagascar', 'MDG', '261'),
(126, 'MW', 'Malawi', 'Malawi', 'MWI', '265'),
(127, 'MY', 'Malaysia', 'Malaysia', 'MYS', '60'),
(128, 'MV', 'Maldives', 'Maldives', 'MDV', '960'),
(129, 'ML', 'Mali', 'Mali', 'MLI', '223'),
(130, 'MT', 'Malta', 'Malta', 'MLT', '356'),
(131, 'MH', 'Marshall Islands', 'Marshall Islands', 'MHL', '692'),
(132, 'MR', 'Mauritania', 'Mauritania', 'MRT', '222'),
(133, 'MU', 'Mauritius', 'Mauritius', 'MUS', '230'),
(134, 'YT', 'Mayotte', 'Mayotte', 'MYT', '262'),
(135, 'MX', 'Mexico', 'Mexico', 'MEX', '52'),
(136, 'FM', 'Micronesia', 'Micronesia', 'FSM', '691'),
(137, 'MD', 'Moldova', 'Moldova', 'MDA', '373'),
(138, 'MC', 'Monaco', 'Monaco', 'MCO', '377'),
(139, 'MN', 'Mongolia', 'Mongolia', 'MNG', '976'),
(140, 'ME', 'Montenegro', 'Montenegro', 'MNE', '382'),
(141, 'MS', 'Montserrat', 'Montserrat', 'MSR', '1664'),
(142, 'MA', 'Morocco', 'Morocco', 'MAR', '212'),
(143, 'MZ', 'Mozambique', 'Mozambique', 'MOZ', '258'),
(144, 'MM', 'Myanmar', 'Myanmar', 'MMR', '95'),
(145, 'NA', 'Namibia', 'Namibia', 'NAM', '264'),
(146, 'NR', 'Nauru', 'Nauru', 'NRU', '674'),
(147, 'NP', 'Nepal', 'Nepal', 'NPL', '977'),
(148, 'NL', 'Netherlands', 'Netherlands', 'NLD', '31'),
(149, 'AN', 'Netherlands Antilles', 'Netherlands Antilles', 'ANT', '599'),
(150, 'NC', 'New Caledonia', 'New Caledonia', 'NCL', '687'),
(151, 'NZ', 'New Zealand', 'New Zealand', 'NZL', '64'),
(152, 'NI', 'Nicaragua', 'Nicaragua', 'NIC', '505'),
(153, 'NE', 'Niger', 'Niger', 'NER', '227'),
(154, 'NG', 'Nigeria', 'Nigeria', 'NGA', '234'),
(155, 'NU', 'Niue', 'Niue', 'NIU', '683'),
(156, 'KP', 'North Korea', 'North Korea', 'PRK', '850'),
(157, 'MP', 'Northern Mariana Islands', 'Northern Mariana Islands', 'MNP', '1670'),
(158, 'NO', 'Norway', 'Norway', 'NOR', '47'),
(159, 'OM', 'Oman', 'Oman', 'OMN', '968'),
(160, 'PK', 'Pakistan', 'Pakistan', 'PAK', '92'),
(161, 'PW', 'Palau', 'Palau', 'PLW', '680'),
(162, 'PS', 'Palestine', 'Palestine', 'PSE', '970'),
(163, 'PA', 'Panama', 'Panama', 'PAN', '507'),
(164, 'PG', 'Papua New Guinea', 'Papua New Guinea', 'PNG', '675'),
(165, 'PY', 'Paraguay', 'Paraguay', 'PRY', '595'),
(166, 'PE', 'Peru', 'Peru', 'PER', '51'),
(167, 'PH', 'Philippines', 'Philippines', 'PHL', '63'),
(168, 'PN', 'Pitcairn', 'Pitcairn', 'PCN', '64'),
(169, 'PL', 'Poland', 'Poland', 'POL', '48'),
(170, 'PT', 'Portugal', 'Portugal', 'PRT', '351'),
(171, 'PR', 'Puerto Rico', 'Puerto Rico', 'PRI', '1787'),
(172, 'QA', 'Qatar', 'Qatar', 'QAT', '974'),
(173, 'CG', 'Republic of the Congo', 'Republic of the Congo', 'COG', '242'),
(174, 'RE', 'Reunion', 'Reunion', 'REU', '262'),
(175, 'RO', 'Romania', 'Romania', 'ROU', '40'),
(176, 'RU', 'Russia', 'Russia', 'RUS', '7'),
(177, 'RW', 'Rwanda', 'Rwanda', 'RWA', '250'),
(178, 'BL', 'Saint Barthelemy', 'Saint Barthelemy', 'BLM', '590'),
(179, 'SH', 'Saint Helena', 'Saint Helena', 'SHN', '290'),
(180, 'KN', 'Saint Kitts and Nevis', 'Saint Kitts and Nevis', 'KNA', '1869'),
(181, 'LC', 'Saint Lucia', 'Saint Lucia', 'LCA', '1758'),
(182, 'MF', 'Saint Martin', 'Saint Martin', 'MAF', '590'),
(183, 'PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'SPM', '508'),
(184, 'VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'VCT', '1784'),
(185, 'WS', 'Samoa', 'Samoa', 'WSM', '685'),
(186, 'SM', 'San Marino', 'San Marino', 'SMR', '378'),
(187, 'ST', 'Sao Tome and Principe', 'Sao Tome and Principe', 'STP', '239'),
(188, 'SA', 'Saudi Arabia', 'Saudi Arabia', 'SAU', '966'),
(189, 'SN', 'Senegal', 'Senegal', 'SEN', '221'),
(190, 'RS', 'Serbia', 'Serbia', 'SRB', '381'),
(191, 'SC', 'Seychelles', 'Seychelles', 'SYC', '248'),
(192, 'SL', 'Sierra Leone', 'Sierra Leone', 'SLE', '232'),
(193, 'SG', 'Singapore', 'Singapore', 'SGP', '65'),
(194, 'SX', 'Sint Maarten', 'Sint Maarten', 'SXM', '1721'),
(195, 'SK', 'Slovakia', 'Slovakia', 'SVK', '421'),
(196, 'SI', 'Slovenia', 'Slovenia', 'SVN', '386'),
(197, 'SB', 'Solomon Islands', 'Solomon Islands', 'SLB', '677'),
(198, 'SO', 'Somalia', 'Somalia', 'SOM', '252'),
(199, 'ZA', 'South Africa', 'South Africa', 'ZAF', '27'),
(200, 'KR', 'South Korea', 'South Korea', 'KOR', '82'),
(201, 'SS', 'South Sudan', 'South Sudan', 'SSD', '211'),
(202, 'ES', 'Spain', 'Spain', 'ESP', '34'),
(203, 'SD', 'Sudan', 'Sudan', 'SDN', '249'),
(204, 'LK', 'Sri Lanka', 'Sri Lanka', 'LKA', '94'),
(205, 'SR', 'Suriname', 'Suriname', 'SUR', '597'),
(206, 'SJ', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen', 'SJM', '47'),
(207, 'CH', 'Switzerland', 'Switzerland', 'CHE', '41'),
(208, 'SZ', 'Swaziland', 'Swaziland', 'SWZ', '268'),
(209, 'SY', 'Syria', 'Syria', 'SYR', '963'),
(210, 'SE', 'Sweden', 'Sweden', 'SWE', '46'),
(211, 'TW', 'Taiwan', 'Taiwan', 'TWN', '886'),
(212, 'TJ', 'Tajikistan', 'Tajikistan', 'TJK', '992'),
(213, 'TZ', 'Tanzania', 'Tanzania', 'TZA', '255'),
(214, 'TH', 'Thailand', 'Thailand', 'THA', '66'),
(215, 'TG', 'Togo', 'Togo', 'TGO', '228'),
(216, 'TK', 'Tokelau', 'Tokelau', 'TKL', '690'),
(217, 'TO', 'Tonga', 'Tonga', 'TON', '676'),
(218, 'TT', 'Trinidad and Tobago', 'Trinidad and Tobago', 'TTO', '1868'),
(219, 'TN', 'Tunisia', 'Tunisia', 'TUN', '216'),
(220, 'TR', 'Turkey', 'Turkey', 'TUR', '90'),
(221, 'TM', 'Turkmenistan', 'Turkmenistan', 'TKM', '993'),
(222, 'TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'TCA', '1649'),
(223, 'TV', 'Tuvalu', 'Tuvalu', 'TUV', '688'),
(224, 'VI', 'U.S. Virgin Islands', 'U.S. Virgin Islands', 'VIR', '1340'),
(225, 'UG', 'Uganda', 'Uganda', 'UGA', '256'),
(226, 'UA', 'Ukraine', 'Ukraine', 'UKR', '380'),
(227, 'AE', 'United Arab Emirates', 'United Arab Emirates', 'ARE', '971'),
(228, 'GB', 'United Kingdom', 'United Kingdom', 'GBR', '44'),
(229, 'US', 'United States', 'United States', 'USA', '1'),
(230, 'UY', 'Uruguay', 'Uruguay', 'URY', '598'),
(231, 'UZ', 'Uzbekistan', 'Uzbekistan', 'UZB', '998'),
(232, 'VU', 'Vanuatu', 'Vanuatu', 'VUT', '678'),
(233, 'VA', 'Vatican', 'Vatican', 'VAT', '379'),
(234, 'VE', 'Venezuela', 'Venezuela', 'VEN', '58'),
(235, 'VN', 'Vietnam', 'Vietnam', 'VNM', '84'),
(236, 'WF', 'Wallis and Futuna', 'Wallis and Futuna', 'WLF', '681'),
(237, 'EH', 'Western Sahara', 'Western Sahara', 'ESH', '212'),
(238, 'YE', 'Yemen', 'Yemen', 'YEM', '967'),
(239, 'ZM', 'Zambia', 'Zambia', 'ZMB', '260'),
(240, 'ZW', 'Zimbabwe', 'Zimbabwe', 'ZWE', '263');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(10) NOT NULL,
  `title` varchar(155) NOT NULL,
  `image` varchar(155) NOT NULL,
  `contents` varchar(60000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `title`, `image`, `contents`) VALUES
(1, 'PURCHASE A PRODUCT', '4ae5f8800001e945cb08361fc463330e.jpg', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <h2>My products </h2><br><p>You haven\'t purchased any product yet. </p>									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        '),
(2, 'Reojen Marketing Automation Softwares ', '1.png', '    <h5 align=\"center\">About the software</h5>	  <p> Reojen Marketing Automation Software enables	  businesses to create a sales and marketing strategy and map out each	 step; centralize customer interactions and daily activities; capture    new leads and automate follow-up based on preferences and needs; follow-up, contact management all from one place.You can purchase the license for 3 months to 5 years. You can renew license anytime after it expires. Log in to your Reojen Marketing Automation Software with your Reojen login credentials and start using this service.	  </p>									\n\n   <h4 align=\"center\">Features</h4>     <ol>1. Analytics / ROI Tracking</ol> <ol>2. Campaign Segmentation</ol>     <ol>3. Contact Management</ol>	   <ol>4. Content / Blogging Platform</ol>	  <ol>5. Direct Mail Management</ol>	     <ol>6. Email Drip Campaigns</ol>   <ol>7. Landing Pages / Web Forms</ol>   <ol>8. Lead Management</ol>	  <ol>9. Lead Nurturing</ol>     <ol>10. Lead Scoring</ol>      <ol>11. Multi Channel Management</ol>	 <ol>12. Multivariate Testing</ol>   <ol>13. Referrals / Affiliates</ol>	            <ol>14. Search Marketing</ol>       <ol>15. Social Marketing</ol>	 <ol>16. Web Visitor Tracking</ol>			\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        '),
(3, 'Reojen Geographic Location Based Targeted Email Lists ', '1.png', '                                                                                                                                                                                                                                                                                     \n\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <h5 align=\"center\">										\n\n                                    About Reojen Geographic Location Based Targeted Email Lists</h5>									\n\n                                <p>Get a list of 1000000 targeted email addresses for only  product_price . We have many different geographic location based targeted email lists. You can choose and purchase the email list of the geographic location you like. We use hundreds of different sources to aggregate our consumer email database. We gather raw data										\n\n                                    from our own marketing and publication offers, third party offers,										\n\n                                    online surveys, data acquisition, behavioral data and other accurate										\n\n                                    sources before we integrate proprietary enrichment sources.										\n\n                                    All email leads are 100% permission based, Can Spam compliant and										\n\n                                    updated weekly. We provide online marketers the ability to reach US										\n\n                                    local targeted audiences using quality direct email and postal										\n\n                                    marketing data.<br><br>										\n\n                                  	  Every data order passes through our email hygiene process to ensure										\n\n                                    that emails have a 95%+ delivery rate.<br><br>										\n\n                                    DON\'T GET BLOCKED!<br>										\n\n                                   	 GET SUPERIOR EMAIL DELIVERY and have successful email campaigns.								\n\n                                </p>											\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        									\n\n                                        '),
(4, 'Reojen Newsletter Sending And Email Marketing Software', '1.png', '<h5 align=\"center\">About the plan</h5>									\n\n                                <p>You can purchase the license for 3 months to 5 years. You can renew the license anytime after it expires										\n\n                                    Comes packaged with Reojen Email Marketing and Newsletter Software.										\n\n                                    Supports up to 1000000 subscribers of your newsletters.										\n\n                                    Log in to your Reojen Email Marketing and Newsletter Software										\n\n                                    with your Reojen login credential and start using this service.										\n\n                                </p>																		\n\n                                <h4 align=\"center\">Features</h4>									\n\n                                <ol>1. Intuitive template editor</ol>										\n\n                                <ol>2. Stunning and effective email templates</ol>									\n\n                                <ol>3. Clever autoresponders</ol>									\n\n                                <ol>4. Real-time email tracking</ol>									\n\n                                <ol>5. Achieve more from your email marketing</ol>									\n\n                                <ol>6. Free Inbox Inspector</ol>									\n\n                                <ol>7. Free Spam Test</ol>									\n\n                                <ol>8. Send Time optimization</ol>									\n\n                                <ol>9. Automatic A/B testing</ol>									\n\n                                <ol>10. Targeting</ol>									\n\n                                <ol>11. Personalisation and dynamic content</ol>									\n\n                                <ol>12. Multiple awards</ol>									\n\n                                <ol>13. Hundreds of happy clients</ol>			');
INSERT INTO `dashboard` (`id`, `title`, `image`, `contents`) VALUES
(5, 'Terms and Conditions', '1.jpg', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <DIV id=\"page_1\">\r\n\r\n<P class=\"p0 ft0\">Acceptable Use Policy (AUP)</P>\r\n\r\n<hr/>\r\n\r\n<P class=\"p1 ft1\">All products and services provided by Reojen may be used for lawful purposes only. Transmission or storage of any information, data or material in violation of German law is strictly prohibited. Customer agrees to indemnify and hold harmless Reojen from any claims resulting from Customer\'s use of the service which damages Customer or any other parties, including attorney\'s fees.</P>\r\n\r\n<P class=\"p2 ft1\">Reojen will not be liable for any interruptions in service or other monetary loss related to enforcement of the Reojen Terms of Service (TOS), including this Acceptable Use Policy.</P>\r\n\r\n<P class=\"p3 ft3\"><SPAN class=\"ft1\">1.</SPAN><SPAN class=\"ft2\">Services Provided</SPAN><SPAN class=\"ft1\">.</SPAN></P>\r\n\r\n<P class=\"p4 ft1\">Reojen provides Customer with <NOBR>Web-based</NOBR> sales and marketing automation software that includes <NOBR>e-mail,</NOBR> fax, voice broadcast, <NOBR>e-Commerce</NOBR> and affiliate functionality. All services provided must be used by Customer in compliance with the Reojen Terms of Service.</P>\r\n\r\n<P class=\"p3 ft3\"><SPAN class=\"ft1\">2.</SPAN><SPAN class=\"ft2\">Customer Obligations</SPAN><SPAN class=\"ft1\">.</SPAN></P>\r\n\r\n<P class=\"p5 ft1\">Customer agrees to use Reojen\'s services in a manner that is legal, appropriate and in conformity with industry standards and to respect the privacy of consumers. More specifically, Customer agrees to abide by Reojen\'s requirements governing the use of the various components of the services, as described below:</P>\r\n\r\n<P class=\"p6 ft1\"><SPAN class=\"ft1\">a.</SPAN><NOBR><SPAN class=\"ft4\">E-Mail</SPAN>.</NOBR></P>\r\n\r\n<P class=\"p7 ft1\">Reojen strictly prohibits any involvement in Unsolicited Commercial <NOBR>E-mail</NOBR> campaigns (UCE, more commonly called \"Spam\").</P>\r\n\r\n<P class=\"p8 ft1\"><SPAN class=\"ft1\">1.</SPAN><SPAN class=\"ft5\">Reojen maintains a </SPAN><NOBR>Zero-Tolerance</NOBR> policy against Spam, whether direct, indirect or through any affiliate or agent acting on the Customer\'s behalf.</P>\r\n\r\n<P class=\"p9 ft6\"><SPAN class=\"ft6\">2.</SPAN><SPAN class=\"ft7\">As determined by Reojen\'s sole discretion, Customer shall have proof that all individuals in the Customer\'s database have opted in or otherwise agreed to receive communications from Customer.</SPAN></P>\r\n\r\n<P class=\"p10 ft6\"><SPAN class=\"ft6\">3.</SPAN><SPAN class=\"ft7\">All lists used in conjunction with the services provided by Reojen are required to be 100% solicited </SPAN><NOBR>(opt-in)</NOBR> lists. This means that the individuals on the list have explicitly agreed to receive information from your business entity. The practice of bartering, purchasing or renting lists of names and sending <NOBR>e-mails</NOBR> to those people is strictly prohibited.</P>\r\n\r\n<P class=\"p11 ft1\"><SPAN class=\"ft1\">1.</SPAN><SPAN class=\"ft5\">Marketing lists containing email addresses within Reojen cannot be shared/duplicated/transferred between individual applications.</SPAN></P>\r\n\r\n<P class=\"p12 ft1\"><SPAN class=\"ft1\">4.</SPAN><SPAN class=\"ft5\">Furthermore, in accordance with </SPAN><NOBR>CAN-SPAM</NOBR> legislation, all <NOBR>e-mail</NOBR> messages sent using Reojen\'s services must use the <NOBR>Reojen-provided</NOBR> opt-</P>\r\n\r\n</DIV>\r\n\r\n<!-- #include virtual=\"/convert-pdf-to-html/includes/pdf-to-word-body-tag-between-content.htm\" --><DIV id=\"page_2\">\r\n\r\n<P class=\"p13 ft6\">out link, must include a valid physical address of the sender and must contain a clear subject line that does not mislead the recipient as to the contents of the <NOBR>e-mail.</NOBR> Customers are advised to consult their own attorney to ensure compliance with all Federal, State and local laws.</P>\r\n\r\n<P class=\"p14 ft6\"><SPAN class=\"ft6\">5.</SPAN><SPAN class=\"ft7\">The </SPAN><NOBR>opt-out</NOBR> link may not be excessively \"padded\" with <NOBR>line-breaks</NOBR> or similar means to deceive recipients.</P>\r\n\r\n<P class=\"p15 ft6\"><SPAN class=\"ft6\">6.</SPAN><SPAN class=\"ft7\">The complaint rate (\"feedback rate\") may not exceed the accepted industry standard at the time of transmission. Failure to comply will result in penalties and restrictions as defined under Violations and Penalties, below.</SPAN></P>\r\n\r\n<P class=\"p16 ft6\"><SPAN class=\"ft6\">1.</SPAN><SPAN class=\"ft7\">As of this writing, the industry standard for complaint rates is </SPAN><SPAN class=\"ft8\">less than .1% </SPAN>(1/1000) on a per Email/Internet Service Provider basis. It is Customer\'s sole responsibility to maintain under the then- current industry standard.</P>\r\n\r\n<P class=\"p17 ft1\"><SPAN class=\"ft1\">7.</SPAN><SPAN class=\"ft5\">Unsubscribe requests must be processed immediately.</SPAN></P>\r\n\r\n<P class=\" ft1\"><SPAN class=\"ft1\">b.</SPAN><SPAN class=\"ft9\">Fax</SPAN>.</P>\r\n\r\n<P class=\"p18 ft6\">Reojen strictly prohibits the use of its facsimile (\"Fax\") services for illegal or inappropriate purposes. Customer agrees that all faxing services provided by Reojen will be used only for proper legal purposes and in a lawful manner.</P>\r\n\r\n<P class=\"p19 ft1\">Customer must have permission from each recipient in order to send faxes to that recipient.</P>\r\n\r\n<P class=\"p20 ft1\"><SPAN class=\"ft1\">c.</SPAN><SPAN class=\"ft4\">Voice Broadcast</SPAN>.</P>\r\n\r\n<P class=\"p21 ft1\">Reojen strictly prohibits the use of its voice broadcasting services for illegal or unethical purposes. Customer agrees that all voice broadcast services will be used only for proper legal purposes and in a lawful manner.</P>\r\n\r\n<P class=\"p22 ft6\"><SPAN class=\"ft6\">1.</SPAN><SPAN class=\"ft7\">Customer may not send voice broadcasts to any individual listed on the National Do Not Call Registry, unless Customer has express permission from the recipient to receive voice communications from Customer.</SPAN></P>\r\n\r\n<P class=\"p23 ft1\"><SPAN class=\"ft1\">d.</SPAN><NOBR><SPAN class=\"ft9\">E-Commerce</SPAN>.</NOBR></P>\r\n\r\n<P class=\"p24 ft1\">Reojen provides <NOBR>e-Commerce</NOBR> services including Web Form(s), Sale Form(s), tracking links, redirected \"Landing Pages,\" etc. Customers may not send unsolicited communications whether through Reojen\'s services or by means of <NOBR>third-parties</NOBR> which direct individuals to any Reojen <NOBR>e-Commerce</NOBR> services that reference Reojen.</P>\r\n\r\n<P class=\"p25 ft1\"><SPAN class=\"ft1\">e.</SPAN><SPAN class=\"ft4\">Affiliates</SPAN>.</P>\r\n\r\n<P class=\"p26 ft1\">Any and all of Customer\'s affiliates are bound by the terms of the Reojen Terms of Service. Customer is solely responsible for ensuring their affiliates are compliant to the Reojen Terms of Service. Customer\'s failure to ensure their affiliates\' compliance will be subject to the enforcement these policies.</P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_3\">\r\n\r\n<P class=\"p27 ft1\"><SPAN class=\"ft1\">f.</SPAN><SPAN class=\"ft10\">Privacy Policy</SPAN>.</P>\r\n\r\n<P class=\"p28 ft1\">Customer must publish, enforce and abide by a privacy policy which protects its customers\' personal information in its possession or under its control. Such privacy policy at a minimum must be as stringent as Reojen\'s Privacy Policy. In particular, Customer agrees that it will not sell, loan or in any way pledge or hypothecate the personal information of its customers to any other person or entity by way of joint venture or any other agreement.</P>\r\n\r\n<P class=\"p29 ft3\"><SPAN class=\"ft1\">3.</SPAN><SPAN class=\"ft2\">Violations and Penalties</SPAN><SPAN class=\"ft1\">.</SPAN></P>\r\n\r\n<P class=\"p30 ft1\">Customers who fail to comply with the terms of the Reojen Terms of Service will be subject to the following penalties, including, but not limited to, <SPAN class=\"ft11\">immediate termination of service</SPAN>.</P>\r\n\r\n<P class=\"p31 ft1\"><SPAN class=\"ft1\">a.</SPAN><SPAN class=\"ft4\">Complaints</SPAN>.</P>\r\n\r\n<P class=\"p32 ft1\">A $250 investigation fee may be assessed to Customer\'s account for each complaint of unauthorized communication that Reojen receives involving a Customer\'s account. This <NOBR>non-refundable</NOBR> fee goes toward confirming complaints either digitally or verbally between sources of complaints.</P>\r\n\r\n<P class=\"p33 ft6\"><SPAN class=\"ft6\">1.</SPAN><SPAN class=\"ft7\">\"Complaints\" may include, but is not limited to individual reports e- mailed to </SPAN><A href=\"mailto:abuse@reojen.com\"><SPAN class=\"ft12\">abuse@reojen.com</SPAN></A><A href=\"mailto:abuse@reojen.com\">, </A><NOBR>third-party</NOBR> ISP complaint notifications, notification from <NOBR>anti-spam</NOBR> organizations such as \"SpamCop\" and internal heuristic research performed.</P>\r\n\r\n<P class=\"p17 ft1\"><SPAN class=\"ft1\">b.</SPAN><SPAN class=\"ft9\">Notice and Communication of Complaints</SPAN>.</P>\r\n\r\n<P class=\"p34 ft1\">Upon receiving a complaint, Reojen will notify Customer of said complaint and investigate the validity of the complaint. If Customer does not take immediate remedial action to rectify the situation, Reojen reserves the right to suspend Customer\'s service until Customer has resolved the situation to Reojen\'s satisfaction, at Reojen\'s sole discretion.</P>\r\n\r\n<P class=\"p35 ft6\"><SPAN class=\"ft6\">1.</SPAN><SPAN class=\"ft7\">\"Customer Notification\" </SPAN><NOBR>--</NOBR> Reojen will make a reasonable effort to contact Customer in the form of <NOBR>e-mail,</NOBR> telephone and login notification within the Reojen Application; sourced from information currently on file.</P>\r\n\r\n<P class=\"p36 ft1\"><SPAN class=\"ft1\">c.</SPAN><SPAN class=\"ft4\">Confirmed Violations, Unsolicited </SPAN><NOBR><SPAN class=\"ft11\">E-Mail</SPAN>.</NOBR></P>\r\n\r\n<P class=\"p37 ft1\">A $250 <NOBR>non-refundable</NOBR> investigation fee will apply per complaint in the event Reojen determines that Customer sent an unsolicited communication to a recipient who did not agree to receive communications from Customer.</P>\r\n\r\n<P class=\"p38 ft1\"><SPAN class=\"ft1\">1.</SPAN><SPAN class=\"ft5\">In the event of multiple complaints, Reojen services may be suspended in order to maintain integrity of services provided. Services </SPAN><SPAN class=\"ft13\">can only be</SPAN></P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_4\">\r\n\r\n<P class=\"p39 ft1\"><SPAN class=\"ft13\">reinstated </SPAN>by meeting the criteria as determined by Reojen to minimize and address complaints.</P>\r\n\r\n<P class=\"p27 ft1\"><SPAN class=\"ft1\">d.</SPAN><SPAN class=\"ft9\">Confirmed Violations, Complaint Rate, Reactivation Fee</SPAN>.</P>\r\n\r\n<P class=\"p40 ft1\">In the event complaint rates exceed industry standards, Reojen will immediately suspend <NOBR>e-mail</NOBR> services and notify Customer via <NOBR>e-mail</NOBR> and/or telephone.</P>\r\n\r\n<P class=\"p41 ft6\"><SPAN class=\"ft6\">1.</SPAN><SPAN class=\"ft7\">A $200 \"Service Reactivation Fee\" will be applied toward the Customer\'s account for investigation resources spent toward identifying and addressing high complaint rates.</SPAN></P>\r\n\r\n<P class=\"p17 ft11\"><SPAN class=\"ft1\">e.</SPAN><SPAN class=\"ft4\">Excessive, Widespread and/or Repeated Violations.</SPAN></P>\r\n\r\n<P class=\"p42 ft1\">In accordance with Reojen\'s <NOBR>Zero-Tolerance</NOBR> <NOBR>No-Spam</NOBR> Policy, Reojen will immediately terminate the account of any Customer found to be involved in a <NOBR>non-compliant</NOBR> marketing campaign or other widespread or repeated violation of the Reojen Terms of Service.</P>\r\n\r\n<P class=\"p43 ft1\"><SPAN class=\"ft1\">1.</SPAN><SPAN class=\"ft5\">All data contained in Customer\'s account will be permanently removed.</SPAN></P>\r\n\r\n<P class=\"p44 ft6\"><SPAN class=\"ft6\">2.</SPAN><SPAN class=\"ft7\">Customer will be held accountable for any monetary damages suffered by Reojen, due to Customer\'s actions or inactions. Such monetary damages may include, but are not limited to, loss of Web services, regulatory penalties (e.g., FTC) and punitive damages related to lost clients and revenues due to said violation.</SPAN></P>\r\n\r\n<P class=\"p45 ft1\"><SPAN class=\"ft1\">3.</SPAN><SPAN class=\"ft5\">The determination of what constitutes an \"excessive, widespread and/or repeated violation\" of this policy will be determined by Reojen.</SPAN></P>\r\n\r\n<P class=\" ft14\"><SPAN class=\"ft1\">4.</SPAN><SPAN class=\"ft2\">Reservation of Rights.</SPAN></P>\r\n\r\n<P class=\"p46 ft1\">Reojen reserves the right to terminate Customer\'s account for any violation of the Reojen Terms of Service.</P>\r\n\r\n<P class=\"p47 ft1\">Reojen reserves the following rights:</P>\r\n\r\n<P class=\"p48 ft11\"><SPAN class=\"ft1\">a.</SPAN><SPAN class=\"ft4\">Questionable Practices (\"Inappropriate Use\")</SPAN></P>\r\n\r\n<P class=\"p49 ft1\">Reojen may terminate Customer\'s account if Customer engages in any practice that is, in Reojen\'s sole discretion, objectionable, unlawful, obscene, pornographic, threatening, abusive, libelous or hateful, or that encourages conduct which would constitute a criminal offense, give rise to civil liability, or otherwise violate any local, state, national or international law. This includes, but is not limited to:</P>\r\n\r\n<P class=\"p50 ft1\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft16\">content that in any way exploits minors under 18 years of age</SPAN></P>\r\n\r\n<P class=\"p51 ft1\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft16\">viruses, worms, phishing, malware, or any other potentially harmful software</SPAN></P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_5\">\r\n\r\n<P class=\"p52 ft6\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft17\">marketing to any lists of associations, memberships, voters or realtors, or any other lists whose recipients did not express explicit consent to receive such marketing material</SPAN></P>\r\n\r\n<P class=\"p53 ft1\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft16\">products, services, or content that are often associated with abusive business practices or spam, such as:</SPAN></P>\r\n\r\n<P class=\"p54 ft6\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft17\">pornography or illicitly pornographic sexual products, including but not limited to adult magazines, video and software, escort services, dating services, or adult \"swinger\" promotions</SPAN></P>\r\n\r\n<P class=\"p55 ft1\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft16\">illegal drugs, software, media, or other goods</SPAN></P>\r\n\r\n<P class=\"p56 ft6\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft17\">manufacture, importation, posession, use and/or distribution of marijuana or any other violation of the Controlled Substances Act</SPAN></P>\r\n\r\n<P class=\"p57 ft6\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft17\">instructions on how to assemble or otherwise make bombs, or other weaponry</SPAN></P>\r\n\r\n<P class=\"p58 ft1\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft16\">online and direct pharmaceutical sales</SPAN></P>\r\n\r\n<P class=\"p55 ft1\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft16\">debt collections, credit repair and debt relief offerings</SPAN></P>\r\n\r\n<P class=\"p55 ft6\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft17\">stock picks or promotions</SPAN></P>\r\n\r\n<P class=\"p55 ft1\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft16\">\"get rich quick\" and other similar offers</SPAN></P>\r\n\r\n<P class=\"p59 ft6\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft17\">promoting pyramid schemes or network marketing (i.e. MLM) businesses</SPAN></P>\r\n\r\n<P class=\"p60 ft6\"><SPAN class=\"ft15\">ï‚§</SPAN><SPAN class=\"ft17\">odds making and betting/gambling services, including but not limited online casino games, and sporting events</SPAN></P>\r\n\r\n<P class=\"p61 ft11\"><SPAN class=\"ft1\">b.</SPAN><SPAN class=\"ft9\">Change of Terms and Conditions</SPAN></P>\r\n\r\n<P class=\"p62 ft1\">Reojen reserves the right to change the terms and conditions of this Policy, as needed. Use of Reojen\'s software and/or services by Customer after said changes constitutes Customer\'s acceptance of the new Policy.</P>\r\n\r\n<P class=\"p63 ft1\"><SPAN class=\"ft1\">0.</SPAN><SPAN class=\"ft5\">Reojen will inform Customer when significant changes are made to any policies under the Reojen Terms of Service by means of the Customer\'s e- mail, currently on file.</SPAN></P>\r\n\r\n<P class=\"p64 ft1\">ALL CUSTOMERS AND AFFILIATES ARE EXPECTED TO AGREE TO ALL TERMS CONTAINED HEREIN. DIGITAL ACCEPTANCE IS ACHIEVED WHEN CUSTOMERS OR AFFILIATES ACCESS OR IN ANY WAY USE REOJEN SERVICES.</P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_6\">\r\n\r\n<P class=\"p65 ft18\">FAILURE TO AGREE AND COMPLY WILL RESULT IN IMMEDIATE TERMINATION OF SERVICES.</P>\r\n\r\n<P class=\"p66 ft19\">Billing Policy</P>\r\n\r\n<P class=\"p67 ft20\">General Billing</P>\r\n\r\n<P class=\"p68 ft1\">Usage of Reojen products and services constitutes customer\'s acceptance of Reojen\'s billing policy, and all customers must comply with this billing policy.</P>\r\n\r\n<P class=\"p69 ft3\">Special note regarding signed contracts: If you entered into a signed contract for your services, such as an annual contract, please review your contract for specific terms relating to your obligations in addition this billing policy. In the event the terms of your signed contract conflict with these terms, the signed contract will prevail.</P>\r\n\r\n<P class=\"p70 ft23\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft22\">Unless otherwise agreed in writing, all accounts are set up on a prepaid basis, and payment must be received by Reojen before any billable product or service is provided/activated. Customers are required to keep a valid credit/debit card on file to charge for recurring monthly subscription fees, fax or voice broadcast service fees and all email overage fees.</SPAN></P>\r\n\r\n<P class=\"p71 ft23\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft22\">Subscription billing is based on availability of products and services, not based on usage. However, certain fees may be </SPAN><NOBR>usage-based</NOBR> such as fax, voice broadcast service fees, and email overages. Disabled applications will incur monthly subscription fees, regardless of availability of product in the case of a breach of online terms including but not limited to delinquent accounts.</P>\r\n\r\n<P class=\"p72 ft23\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft22\">Customers are responsible for keeping all credit/debit card details and contact information current. This can be done online through the Customer Center. To access the Customer Center, customers should log into their Reojen application, click on \"My account\" and then click \"Update your billing info\".</SPAN></P>\r\n\r\n<P class=\"p73 ft23\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft22\">All recurring subscriptions are automatically invoiced and charged to the credit/debit card on file.</SPAN></P>\r\n\r\n<P class=\"p74 ft23\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft22\">Payment receipts are available to customers upon request or through the Customer Center.</SPAN></P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_7\">\r\n\r\n<P class=\" ft20\">Billing Cycle</P>\r\n\r\n<P class=\"p75 ft25\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft24\">Credit/Debit Card Billing: All credit/debit cards are automatically charged on the customer\'s specific billing cycle date.</SPAN></P>\r\n\r\n<P class=\"p76 ft27\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft26\">Late Fee: All past due accounts may be assessed a late fee.</SPAN></P>\r\n\r\n<P class=\"p77 ft25\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft24\">Delinquent Payments: In the event any payment is 15 days past due the account may be disabled until balances are paid in full. When disabled, all access will be suspended and data will be unavailable.</SPAN></P>\r\n\r\n<P class=\"p78 ft29\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft28\">Deactivation: Once an account is delinquent 60 days, it may be cancelled due to </SPAN><NOBR>non-payment.</NOBR> Once cancelled, the customer will not be able to recover any files until the account is current. Application data may be stored for up to 90 days <NOBR>post-cancellation;</NOBR> after 90 days, application data will no longer be available. In this event, the account record and delinquent balance will be submitted to a <NOBR>third-party</NOBR> collection service.</P>\r\n\r\n<P class=\"p79 ft20\">Fees</P>\r\n\r\n<P class=\"p80 ft23\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft22\">Late Fee: Reojen may assess a $30.00 late fee for any payment that is 15 days past due.</SPAN></P>\r\n\r\n<P class=\"p81 ft23\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft22\">Chargebacks: If a customer initiates a chargeback, Reojen may assess a $50.00 processing fee for each individual chargeback.</SPAN></P>\r\n\r\n<P class=\"p81 ft23\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft22\">Returned Checks: Reojen may assess a $50.00 processing fee on each returned check.</SPAN></P>\r\n\r\n<P class=\"p74 ft23\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft22\">Collections Fee: In the event an account is submitted to a </SPAN><NOBR>third-party</NOBR> collections service, a $35.00 processing fee may be assessed to the existing account balance. This fee is in addition to any other fees previously assessed on the account.</P>\r\n\r\n<P class=\"p76 ft27\"><SPAN class=\"ft21\">âˆ™</SPAN><SPAN class=\"ft26\">Interest: Any charges not paid when due are subject to interest at a</SPAN></P>\r\n\r\n<P class=\"p82 ft30\">rate equal to the lesser of: (i) one and <NOBR>one-half</NOBR> percent (1.5%) per month; or (ii) the maximum interest rate allowed by applicable law.</P>\r\n\r\n<P class=\"p83 ft20\">Reojen Services</P>\r\n\r\n<P class=\"p69 ft1\">Kickstart Services and all other Services purchased from Reojen must be used within the timeframe specified at the time of purchase. Specifically, Kickstart Services must be used within 60 days after purchase and within 30 days after commencement of use of the Services, unless otherwise stated at purchase. Kickstart Services and all other Service fees are nonrefundable. In the event of cancellation, Reojen will not prorate any portion of unused Service fees, and amounts due to Reojen must be paid in full.</P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_8\">\r\n\r\n<P class=\" ft20\">Third Party Products and Advertising Usage</P>\r\n\r\n<P class=\"p84 ft1\">In the event Reojen collects fees for any third party products and/or services, including but not limited to advertising usage, the fees are <NOBR>non-refundable.</NOBR></P>\r\n\r\n<P class=\"p85 ft20\">Payment Methods</P>\r\n\r\n<P class=\"p86 ft1\">Reojen accepts payments via credit/debit card. Reojen currently accepts American Express, MasterCard, Discover and VISA credit/debit cards.</P>\r\n\r\n<P class=\"p85 ft20\">Subscription Billing</P>\r\n\r\n<P class=\"p87 ft1\">Invoices are generated and payments are collected at the beginning of each billing period. Customer billing periods typically begin on the day of the month in which the customer purchased the Reojen subscription. Customers must request to cancel their subscriptions at least 10 days prior to their next billing date in order to avoid being charged on the billing date. In the event of cancellation, customers will still have access to their applications through the end of their final billing period. Reojen will not prorate any portion of unused subscription services. All subscription fees are nonrefundable.</P>\r\n\r\n<P class=\"p88 ft20\">Cancellation Process</P>\r\n\r\n<P class=\"p89 ft1\"><SPAN class=\"ft11\">Creating a Cancellation request</SPAN>: A request to cancel an Reojen application must be initiated at least 10 days prior to the next invoice date. Any request to cancel an Reojen application must be made verbally with an Reojen representative at least 10 days prior to the next invoice date. Emailed requests to cancel are not acceptable. Customers are encouraged to keep records of all communications regarding cancellation.</P>\r\n\r\n<P class=\"p90 ft1\">Simply canceling the credit/debit card associated with an Reojen account does not cancel the account. Reojen will continue to treat this as an open account and the billing cycle will continue, resulting in a past due account that may be turned over to a third party collection service. It is imperative that you speak with an Reojen representative or submit an online ticket through the cancellation form if you wish to initiate cancelation of your Reojen account.</P>\r\n\r\n<P class=\"p91 ft1\"><SPAN class=\"ft11\">Finalizing the Cancellation</SPAN>: After a request to cancel has been initiated, you must speak with a member of the cancellation team to finalize the cancellation. Cancellations will take effect on the last day of the billing period in which the cancellation was processed by the cancellation team, subject to the terms of the \"Subscription Billing\" paragraph above.</P>\r\n\r\n<P class=\"p92 ft1\">Cancellation of an account does not dismiss outstanding invoices or nullify previously agreed charges, such as payments for Kickstart Services fees, charged in installments or annual contract charges, portions of which may not yet have been invoiced when you cancelled. At the time of cancellation, any outstanding balance must be settled. All cancelled accounts with an outstanding balance may be turned over to a <NOBR>third-party</NOBR> collection service.</P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_9\">\r\n\r\n<P class=\" ft20\">Billing Disputes</P>\r\n\r\n<P class=\"p93 ft6\">Each Reojen customer agrees to provide Reojen 30 days to attempt settlement of any billing dispute before disputing with any <NOBR>third-party</NOBR> credit/debit card company or bank. Should Reojen receive a chargeback from a <NOBR>third-party</NOBR> credit/debit card company or bank on the customer\'s behalf before Reojen has been given a chance to resolve the issue, Reojen has the right to charge the customer for its time spent in resolving such disputes and any associated fees incurred by Reojen, in addition to the $50 chargeback fee mentioned above. Regardless of the outcome of the chargeback, Reojen retains the right to collect on any Services or fees that are due. Reojen may submit any disputed amounts to a collection agency. Once a chargeback has been received, Reojen has the right to suspend the account until the matter is resolved.</P>\r\n\r\n<P class=\"p94 ft20\">Refunds</P>\r\n\r\n<P class=\"p89 ft1\">Subscription and Service fees, including but not limited to those related to the Kickstart Service, are nonrefundable and will not be prorated at any time.</P>\r\n\r\n<P class=\"p95 ft0 p0\">Terms of Use</P>\r\n\r\n<hr/>\r\n\r\n<P class=\"p95 ft3\">Subscription Use Agreement</P>\r\n\r\n<P class=\"p96 ft1\">IMPORTANT - READ CAREFULLY: THIS SUBSCRIPTION USE AGREEMENT (THE \"AGREEMENT\") IS A LEGAL AGREEMENT BETWEEN YOU AND ANY COMPANY YOU REPRESENT (COLLECTIVELY, \"YOU\" AND \"YOUR\") AND INFUSION SOFTWARE, INC. (\"REOJEN\").</P>\r\n\r\n<P class=\"p97 ft1\">THIS AGREEMENT APPLIES TO (1) ALL SUBSCRIPTIONS FOR REOJEN HOSTED SOFTWARE AS A SERVICE (SAAS) SOLUTIONS (INCLUDING BUT NOT LIMITED TO <NOBR>WEB-BASED</NOBR> SALES AND MARKETING AUTOMATION SOFTWARE SOLUTIONS FOR BUSINESSES, MARKETERS AND ENTREPRENEURS) AND (2) ANY OTHER RELATED SERVICES THAT REOJEN MAY PROVIDE TO YOU IN CONNECTION WITH SUCH SAAS SOLUTIONS.</P>\r\n\r\n<P class=\"p98 ft1\">PLEASE READ THE AGREEMENT CAREFULLY BEFORE CONTINUING YOUR SUBSCRIPTION REGISTRATION. BY CLICKING THE \"I ACCEPT\" BUTTON OR OTHERWISE ACCEPTING THIS AGREEMENT AS SET FORTH IN ANY ONLINE OR PRINTED ORDER FORM REFERENCING THIS AGREEMENT, YOU AND ANY COMPANY YOU REPRESENT AGREE TO FOLLOW AND BE BOUND BY THE TERMS AND CONDITIONS OF THIS AGREEMENT. IF YOU ARE AGREEING TO THIS AGREEMENT ON BEHALF OF YOUR COMPANY, YOU ARE REPRESENTING TO US THAT YOU HAVE THE AUTHORITY TO BIND YOUR COMPANY TO THIS</P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_10\">\r\n\r\n<P class=\"p99 ft1\">AGREEMENT, AND THE TERM \"YOU\" SHALL REFER TO YOUR COMPANY. IF YOU DO NOT HAVE SUCH AUTHORITY, OR IF YOU DO NOT AGREE TO ALL TERMS AND CONDITIONS OF THIS AGREEMENT, YOU MUST CHOOSE THE \"CANCEL\" BUTTON AND YOU SHALL NOT BE PERMITTED TO USE THE REOJEN SERVICE.</P>\r\n\r\n<P class=\"p85 ft31\">Article I. Definitions</P>\r\n\r\n<P class=\"p20 ft1\">For purposes of this Agreement, the definitions set forth below apply:</P>\r\n\r\n<P class=\"p100 ft1\">\"<SPAN class=\"ft11\">Authorized User</SPAN>\" means any of Your employees, consultants, contractors or agents authorized by Your administrator to access and use the Reojen Service on behalf of Your business, in each case subject to such person\'s agreement to be bound by the terms of this Agreement.</P>\r\n\r\n<P class=\"p101 ft1\">\"<SPAN class=\"ft11\">Front End Code</SPAN>\" means our user interface display and usability platform. This includes, but is not limited to, the layout, color scheme, HTML pages and source code, etc.</P>\r\n\r\n<P class=\"p102 ft1\">\"<SPAN class=\"ft11\">Reojen Materials</SPAN>\" means any documentation, user guides or other similar materials provided by Reojen to You in connection with Your use of the Reojen Service.</P>\r\n\r\n<P class=\"p103 ft1\">\"<SPAN class=\"ft11\">Reojen Service</SPAN>\" means any of the Reojen set of SaaS solutions that are developed, operated, and maintained by Reojen (and its third party service providers) and that are subscribed to through an Reojen branded or controlled website (or Reojen partner website) that includes a link to this Agreement. The definition of Reojen Service does not include any separate professional Services (as defined below) that may be purchased by You from Reojen.</P>\r\n\r\n<P class=\"p104 ft1\">\"<SPAN class=\"ft11\">Order Form</SPAN>\" means any online or written subscription order form for the Reojen Service or for Services submitted by You either during an online subscription process or separately signed by You and submitted to Reojen, and any future purchase order or order form that makes reference to this Agreement.</P>\r\n\r\n<P class=\"p105 ft1\">\"<SPAN class=\"ft13\">PHI</SPAN>\" means (i) \"protected health information\" as defined in 45 CFR Â§ 160.103, and (ii) any other patient or health information protected by the Health Insurance Portability and Accountability Act of 1996, as it may be amended from time to time (\"<SPAN class=\"ft13\">HIPAA</SPAN>\"), including the regulatory revisions implemented pursuant to the Health Information Technology for Economic and Clinical Health Act (the \"<SPAN class=\"ft13\">HITECH ACT</SPAN>\").</P>\r\n\r\n<P class=\"p106 ft1\">\"<SPAN class=\"ft13\">Services</SPAN>\" means any implementation, training or other professional services provided by Reojen to You pursuant to the terms of an Order Form.</P>\r\n\r\n<P class=\"p107 ft1\">\"<SPAN class=\"ft13\">Subscription Term</SPAN>\" means the use term for the Reojen Service set forth on Your Order Form and any additional renewals of such term.</P>\r\n\r\n<P class=\"p108 ft1\">\"<SPAN class=\"ft13\">Third Party Content</SPAN>\" means the content, including software code, that an Reojen partner or other third party may bundle with the Reojen Service, for a specific market or niche offering.</P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_11\">\r\n\r\n<P class=\"p109 ft1\">\"<SPAN class=\"ft13\">Your Data</SPAN>\" means registration information, information concerning Your Authorized Users and customers and contacts, business, marketing and financial information, and any similar data that You upload to the Reojen Service.</P>\r\n\r\n<P class=\"p85 ft31\">Article II. Use Rights and Restrictions</P>\r\n\r\n<P class=\"p110 ft1\"><SPAN class=\"ft3\">2.1</SPAN><SPAN class=\"ft32\">Use Rights; Restrictions. </SPAN>Subject to the terms of this Agreement, Reojen grants to You during the Subscription Term the <NOBR>non-transferable</NOBR> (except as permitted below), <NOBR>non-exclusive</NOBR> right to permit Your Authorized Users to access and use the Reojen Service (and any Reojen Materials provided to You) to allow You to perform contact management, automated marketing, lead tracking and other related business functions that the Reojen Service is designed to perform, subject to the following restrictions: (i) Your use of the Reojen Service may not be on behalf of third parties unless a separate agreement between You and Reojen permits use of the Reojen Service on behalf of Your clients (and in such case limited to use on behalf of clients for whom You have purchased access and use rights); (ii) except as expressly permitted herein or in a separate partner agreement between You and Reojen, You may not license, sell, rent, lease, transfer, assign, distribute, display, host, outsource otherwise commercially exploit or make the Reojen Service or the Reojen Materials available to any third party; (iii) You may not modify, make derivative works of, disassemble, reverse compile, or reverse engineer any part of the Reojen Service or Reojen Materials (provided that reverse engineering is prohibited only to the extent such prohibition is not contrary to applicable law), or access or use the Reojen Service or Reojen Materials in order to build a similar or competitive product or service; (iv) Your use of the Reojen Service (in terms of number of Authorized Users, maximum list sizes, monthly email limitations, etc.) shall conform with the restrictions set forth in the Order Form for the level of subscription purchased by You (Reojen may monitor Your compliance with these limits and if it detects overuse require that You upgrade to the appropriate higher subscription level); (v) Your use of the Reojen Service must not cause undue strain or stress on the Reojen network through excessive API calls or other <NOBR>non-standard</NOBR> use; and (v) Your use of the Reojen Service must comply with the separate Reojen Acceptable Use Policy posted on the Reojen website (<A href=\"http://www.reojen.com/\"><SPAN class=\"ft33\">www.reojen.com</SPAN></A>) as updated by Reojen from time to time.</P>\r\n\r\n<P class=\"p111 ft1\"><SPAN class=\"ft3\">2.2</SPAN><SPAN class=\"ft32\">Technical Support. </SPAN>During the Subscription Term, You will be entitled at no extra charge to access online user guides, knowledge bases and <NOBR>self-help</NOBR> tools, and any additional standard technical support resources (collectively, \"Technical Support\") for the Reojen Service offered by Reojen from time to time, the terms of conditions of which may be described and updated from time to time on the support or customer care sections of the relevant Reojen website (<A href=\"http://www.reojen.com/\"><SPAN class=\"ft33\">www.reojen.com</SPAN></A>). Reojen reserves the right to modify the posted terms and conditions for Technical Support, at any time at its sole discretion.</P>\r\n\r\n<P class=\"p112 ft1\"><SPAN class=\"ft3\">2.3</SPAN><SPAN class=\"ft32\">Intellectual Property Rights. </SPAN>Reojen shall retain all right, title and interest (including all</P>\r\n\r\n<P class=\"p113 ft1\">copyrights, patents, service marks, trademarks and other intellectual property rights) in and to the Reojen Service and Reojen Materials (including application development, business and technical methodologies, and implementation and business processes, used by Reojen to develop or provide the Reojen Service or Reojen Materials), and any and all updates, enhancements, customizations, revisions, modifications, future releases and any other changes relating to any of the foregoing. Except for the limited access and use rights granted pursuant to this Agreement,</P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_12\">\r\n\r\n<P class=\"p114 ft1\">You do not acquire any interest in the Reojen Service or Reojen Materials. You agree that any suggestions, enhancement requests, feedback, recommendations or other information provided by You or any of Your Authorized Users relating to the Reojen Service or the Reojen Materials may be used by Reojen without restriction or obligation to You.</P>\r\n\r\n<P class=\"p97 ft1\"><SPAN class=\"ft3\">2.4</SPAN><SPAN class=\"ft32\">Additional Restrictions. </SPAN>You are expressly prohibited from using any Front End Code for any purpose outside of the intended design and implementation of Your authorized use of the Reojen Service. Any replication or use of any aspect of the Front End Code or other Reojen application or Services for any purpose designed or intended to compete with Reojen\'s solutions is strictly prohibited.</P>\r\n\r\n<P class=\"p115 ft1\"><SPAN class=\"ft3\">2.5</SPAN><SPAN class=\"ft32\">Ownership of Your Data. </SPAN>As between You and Reojen, Your Data and any similar data provided to Reojen outside of the uploading process (either in hard copy or electronic format) is and shall remain Your property. To enable Reojen to provide You with the Reojen Service, and subject to the terms and conditions of this Agreement, You hereby grant to Reojen a non- exclusive right to use, copy, distribute and display Your Data solely in connection with Reojen\'s operation of the Reojen Service on Your behalf. You, not Reojen, shall have sole responsibility for the accuracy, integrity, and reliability of Your Data, and Reojen will not be responsible or liable for the deletion, correction, destruction, damage, loss or failure to store any of Your Data. Reojen will protect any of Your Data provided to Reojen as confidential in accordance with Article IV below.</P>\r\n\r\n<P class=\"p116 ft1\"><SPAN class=\"ft3\">2.6</SPAN><SPAN class=\"ft32\">Protection of PHI. </SPAN>You agree to alert Reojen in writing if you will be using the Services to store or process PHI. To the extent that You do use the Services to store or process PHI, then the terms of the â€œ<SPAN class=\"ft13\">Reojen Business Associate Agreement</SPAN>â€ will apply to any PHI stored or processed by You using the Services and the terms of the Reojen Business Associate Agreement are incorporated herein by reference. Upon either Your or Reojen\'s request, both parties will execute a signable version of the Reojen Business Associate Agreement.</P>\r\n\r\n<P class=\"p79 ft31\">Article III. Fees</P>\r\n\r\n<P class=\"p93 ft1\"><SPAN class=\"ft3\">3.1</SPAN><SPAN class=\"ft32\">Fees. </SPAN>The fees for the Reojen Service and any additional Services (\"Fees\") are set forth in the Order Form and are payable in advance, irrevocable and <NOBR>non-refundable</NOBR> except as set forth in the Order Form and this Agreement. You agree to provide Reojen with complete and accurate billing and contact information. Where payment by credit card is indicated in the Order Form, or You otherwise provide Reojen with credit card information, You authorize Reojen to bill such credit card (a) at the time that You order the Reojen Service or other Services set forth in the Order Form, (b) for any billing frequency otherwise established in the Order Form, and (c) at the time of any renewal, for the amount charged plus any applicable sales taxes for any renewed Subscription Term. If Reojen, in its discretion, permits You to make payment using a method other than a credit card, Reojen will invoice You at the time of the initial Order Form and thereafter on a monthly basis in advance of the relevant billing period, and all such amounts invoiced will be due within ten (10) days of Your receipt of Reojen\'s invoice. Late payments shall be subject to a service charge of one and <NOBR>one-half</NOBR> percent (1.5%) per month, or the maximum charge permitted by law, whichever is less.</P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_13\">\r\n\r\n<P class=\"p117 ft1\"><SPAN class=\"ft3\">3.2</SPAN><SPAN class=\"ft32\">Taxes. </SPAN>You shall pay all personal property, sales, use, <NOBR>value-added,</NOBR> withholding and similar taxes (other than taxes on Reojen\'s net income) arising from the transactions described in this Agreement, even if such amounts are not listed on an Order Form. To the extent You are exempt from sales or other taxes, You agree to provide Reojen, upon request, with the appropriate exemption certificate.</P>\r\n\r\n<P class=\"p118 ft1\"><SPAN class=\"ft3\">3.3</SPAN><NOBR><SPAN class=\"ft32\">Non-Payment;</SPAN></NOBR><SPAN class=\"ft3\"> Other Suspension Rights. </SPAN>Reojen may terminate the Reojen Service if the billing or contact information provided by You is false or fraudulent. Reojen also reserves the right, in its discretion, to suspend Your access and/or use of the Reojen Service: (i) where any payment is due but unpaid and You have been requested but failed to promptly cure such payment failure; or (ii) in the event a dispute arises on Your account as to who at Your business has authority to act or manage Your account and Reojen is not promptly provided with written instructions from the interested parties associated with Your account that fully resolves the dispute. You acknowledge and agree that it a dispute arises as to management of Your account, then (i) if the listed owner of the account is a corporation, limited liability company or other registered entity, Reojen may rely on public records (to the extent available) concerning the appropriate authorized executives or managers of Your entity; or (ii) if the listed owner is a dba or sole proprietorship, or any other entity for which public records of control are not readily accessible online, Reojen may assume that the person or entity that has been making payments on Your account has the authority to manage the account. You agree that Reojen shall not be liable to You nor to any third party for any suspension of the Reojen Service resulting from Your <NOBR>non-payment</NOBR> of Fees or from a dispute as to the management rights to Your account.</P>\r\n\r\n<P class=\"p119 ft31\">Article IV. Confidentiality; Use of Names</P>\r\n\r\n<P class=\"p120 ft1\"><SPAN class=\"ft3\">4.1</SPAN><SPAN class=\"ft32\">Confidential Information. </SPAN>For purposes of this Agreement, confidential information shall include the business terms in the Order Form, Your Data, the Reojen Service and the Reojen Materials, and any information that is clearly identified in writing at the time of disclosure as confidential or that should be reasonably understood to be confidential by the receiving party given the nature of the information and the circumstances of its disclosure (\"Confidential Information\"). Each party agrees: (a) to receive and maintain in confidence all Confidential Information disclosed to it by the other party or by a <NOBR>third-party;</NOBR> (b) not to use the Confidential Information of the other party except to the extent necessary to perform its obligations or exercise rights hereunder; (c) to limit the internal dissemination of Confidential Information to those employees and contractors of the recipient who have a need to know and an obligation to protect it; and (d) to protect the confidentiality thereof in the same manner as it protects the confidentiality of similar information and data of its own (at all times exercising at least a reasonable degree of care in the protection of such Confidential Information). Reojen will restrict its employees\' access to Your Confidential Information to only those employees necessary to successfully provide the Reojen Service. Reojen may disclose Confidential Information on a <NOBR>need-to-know</NOBR> basis to its contractors who have executed written agreements requiring them to maintain such information in strict confidence and use it only to facilitate the performance of their services for Reojen in connection with the performance of this Agreement. Confidential Information shall not include information that: (1) is known publicly; (2) is generally known in the industry before disclosure; (3) has become known publicly, without fault of the recipient, subsequent to disclosure by the disclosing party; or (4) the recipient becomes aware of from a</P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_14\">\r\n\r\n<P class=\"p121 ft1\">third party not bound by <NOBR>non-disclosure</NOBR> obligations to the disclosing party and with the lawful right to disclose such information to the recipient. This Section will not be construed to prohibit the disclosure of Confidential Information to the extent that such disclosure is required by law or order of a court or other governmental authority. The parties agree to give the other party prompt notice of the receipt of any subpoena or other similar request for such disclosure.</P>\r\n\r\n<P class=\"p122 ft1\"><SPAN class=\"ft3\">4.2</SPAN><SPAN class=\"ft32\">Credit Card Information. </SPAN>Reojen agrees that it will retain and store any provided credit card information only for the minimum amount of time required for business, legal and/or regulatory purposes, and will use standard industry practices to protect such information from unauthorized access, disclosure or use.</P>\r\n\r\n<P class=\"p123 ft6\"><SPAN class=\"ft8\">4.3</SPAN><SPAN class=\"ft34\">Use of Names in Marketing. </SPAN>You may use Reojen\'s name and credentials in an appropriate and acceptable manner for Your standard marketing promotions, provided that You agree to cease or alter such use at Reojen\'s request where such use is contrary to Reojen\'s branding policies, could cause any brand confusion in the market or is otherwise objectionable to Reojen. Similarly, Reojen may use Your business name in an appropriate and acceptable manner for standard marketing promotions, provided that Reojen agrees to cease or alter such use at Your request where such use is contrary to Your branding policies, could cause any brand confusion in the market or is otherwise objectionable to You. Acceptable and standard marketing promotions include, but are not limited to: client listings, press releases, surveys, interviews, reputable business publications, television, and web site presentation and promotion, etc.</P>\r\n\r\n<P class=\"p124 ft31\">Article V. Term & Termination</P>\r\n\r\n<P class=\"p125 ft1\"><SPAN class=\"ft3\">5.1</SPAN><SPAN class=\"ft32\">Standard Term. </SPAN>Unless a different Term is specified in a signed Order Form between You and Reojen, the Initial Term of Your subscription to an Reojen Service will begin on the submission or execution of Your Order Form and shall continue on a <NOBR>month-to-month</NOBR> basis until the subscription is terminated as provided for in this Article 5. The term of this Agreement will automatically terminate when all active Subscription Terms have been terminated.</P>\r\n\r\n<P class=\"p126 ft1\"><SPAN class=\"ft3\">5.2</SPAN><SPAN class=\"ft32\">Termination without Cause. </SPAN>Either party may terminate the Subscription Term to an Reojen Service by providing thirty (30) days\' prior written notice to the other party. Reojen\'s termination rights are in addition to any suspension rights it may have under this Agreement or the incorporated Acceptable Use Policy.</P>\r\n\r\n<P class=\"p127 ft6\"><SPAN class=\"ft8\">5.3</SPAN><SPAN class=\"ft34\">Effect of Termination. </SPAN>Upon termination of the Subscription Term, all Fees then due and payable to Reojen must be paid in full. Contingent upon its receipt of all such Fees, Reojen will continue to make Your Data available for downloading through the termination date. In addition, for a period of thirty (30) days following termination, You may arrange for the downloading of Your Data by contacting Reojen. Following this (30) day grace period, Reojen may remove Your Data from the production environment for the Reojen Service. The provisions of this Agreement which by their nature are intended to survive expiration or termination shall survive, including but not limited to obligations concerning confidentiality, protection of intellectual property, indemnification and payment of unpaid Fees and expenses.</P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_15\">\r\n\r\n<P class=\" ft31\">Article VI. Warranties/limitation of Liability/indemnity</P>\r\n\r\n<P class=\"p128 ft6\"><SPAN class=\"ft8\">6.1</SPAN><SPAN class=\"ft34\">Limited Warranties. </SPAN>Reojen warrants for a period of thirty (30) days following their delivery that all professional Services provided hereunder will be performed in a workmanlike manner, in conformity with the professional standards for comparable services in the industry. For any breach of this warranty timely reported by You, Your exclusive remedy shall be the re- performance of the deficient Services, and if Reojen is unable to <NOBR>re-perform</NOBR> the deficient Services as warranted, You shall be entitled to recover the portion of the Fees paid to Reojen for such deficient Services, and such refund shall be Reojen\'s entire liability. You warrant that Your business shall, at all times, comply with, and shall remain solely responsible for compliance with, all applicable federal, state and local laws and regulations, as well as the Reojen Acceptable Use Policy, in connection with Your use of the Reojen Service, and You agree to indemnify and hold Reojen harmless from and against any third party or government claims, including all related damages, costs and expenses (including reasonable attorneys\' fees), that arise due to Your violation of law or breach of this warranty in Your use of the Reojen Service.</P>\r\n\r\n<P class=\"p129 ft6\">All third party hardware, including but not limited to card readers, and other products included or sold with the Services are provided solely according to the warranty and other terms specified by the manufacturer, who is solely responsible for service and support for its product. For service, support, or warranty assistance, you should contact the manufacturer directly. REOJEN MAKES NO WARRANTIES, EXPRESS OR IMPLIED, WITH RESPECT TO SUCH THIRD PARTY PRODUCTS, AND EXPRESSLY DISCLAIMS ANY WARRANTY OR CONDITION OF MERCHANTABILITY, <NOBR>NON-INFRINGEMENT,</NOBR> OR FITNESS FOR A PARTICULAR PURPOSE. IN NO EVENT WILL REOJEN BE LIABLE FOR ANY INCIDENTAL, CONSEQUENTIAL, OR COVER DAMAGES ARISING OUT OF YOUR USE OF OR INABILITY TO USE THIRD PARTY PRODUCTS OR ANY AMOUNT IN EXCESS OF THE AMOUNT PAID BY YOU FOR THE PRODUCT THAT GIVES RISE TO ANY CLAIM.</P>\r\n\r\n<P class=\"p130 ft8\"><SPAN class=\"ft8\">6.2</SPAN><SPAN class=\"ft34\">Reojen Not Responsible for Third Party Content. </SPAN><SPAN class=\"ft6\">The Reojen Service may be bundled by third parties (including but not limited to Reojen marketing or content partners) with Third Party Content designed to facilitate use of the Reojen Service in certain market niches or to customize the Reojen Service for use by certain categories of target customers. To the extent that You either purchase the Reojen Service from such third parties or acquire the Third Party Content or configuration services from such third parties (even though you may purchase the core Reojen Service directly from Reojen), Reojen does not warrant in any manner and will not be responsible for such Third Party Content and You agree to look solely to the relevant third party provider (and not Reojen) if and to the extent that you have any complaints or issues relating to the Third Party Content or its interaction with an Reojen Service.</SPAN></P>\r\n\r\n<P class=\"p131 ft1\"><SPAN class=\"ft3\">6.2</SPAN><SPAN class=\"ft32\">Warranty Disclaimers. </SPAN>EACH PARTY DISCLAIMS ALL OTHER WARRANTIES,</P>\r\n\r\n<P class=\"p132 ft1\">INCLUDING BUT NOT LIMITED TO WARRANTIES OF MERCHANTABILITY, TITLE, UNINTERRUPTED SERVICE OR FITNESS FOR A PARTICULAR PURPOSE. YOU ACKNOWLEDGE THAT REOJEN SPECIFICALLY DISCLAIMS ALL WARRANTIES RELATING TO THE REOJEN SERVICE.</P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_16\">\r\n\r\n<P class=\"p133 ft6\"><SPAN class=\"ft8\">6.3</SPAN><SPAN class=\"ft34\">Limitation of Liability. </SPAN>IN NO EVENT WILL REOJEN BE LIABLE TO YOU FOR ANY INDIRECT, SPECIAL, INCIDENTAL, PUNITIVE OR CONSEQUENTIAL DAMAGES, INCLUDING, BUT NOT LIMITED TO, LOSS OF DATA, LOSS OF BUSINESS OR OTHER LOSS ARISING OUT OF OR RESULTING FROM THIS AGREEMENT EVEN IF IT HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. THE FOREGOING SHALL APPLY REGARDLESS OF WHETHER SUCH LIABILITY SOUNDS IN CONTRACT, NEGLIGENCE, TORT, STRICT LIABILITY OR ANY OTHER THEORY OF LEGAL LIABILITY. IN ADDITION, IN NO EVENT WILL REOJEN\'S CUMULATIVE LIABILITY UNDER THIS AGREEMENT EXCEED THE AMOUNT PAID BY YOU TO REOJEN DURING THE SIX MONTH PERIOD PRECEDING THE ALLEGED LIABILITY EVENT.</P>\r\n\r\n<P class=\"p124 ft31\">Article VII. General Provisions</P>\r\n\r\n<P class=\"p93 ft1\"><SPAN class=\"ft3\">7.1</SPAN><SPAN class=\"ft32\">Notice. </SPAN>Notices regarding this Agreement to Reojen shall be in writing and sent by first class mail or overnight courier (if from within Germany), or international courier, addressed to Reojen Co. Reojen may give notice applicable to Reojen\'s general customer base by means of a general notice on the Reojen Service portal, and notices specific to You by electronic mail to Your designated contact\'s email address on record with Reojen, or by written communication sent by first class mail or overnight courier (if to an address within Germany), or international courier, to Your address on record in Reojen\'s account information. All notices shall be deemed to have been given three (3) days after mailing or posting (if sent by first class mail), upon delivery in the case of courier, or twelve (12) hours after sending by confirmed facsimile, email or posting to the Reojen Service portal.</P>\r\n\r\n<P class=\"p134 ft1\"><SPAN class=\"ft3\">7.2</SPAN><SPAN class=\"ft32\">Assignment. </SPAN>You may not assign this Agreement without providing prior notice to and obtaining the consent of Reojen, which shall not be unreasonably denied provided Your account is in good standing. Any purported assignment in violation of this Section shall be void.</P>\r\n\r\n<P class=\"p135 ft1\"><SPAN class=\"ft3\">7.3</SPAN><SPAN class=\"ft32\">Integration; Modification. </SPAN>This Agreement and the information incorporated into this Agreement by written reference (including reference to information contained in a URL or referenced policy), together with any applicable Order Form, represent the parties\' entire understanding relating to the Reojen Service, the Reojen Materials and the Services, and supersede any prior or contemporaneous, conflicting or additional communications. The terms and conditions of this Agreement may only be amended by written agreement of the parties.</P>\r\n\r\n<P class=\"p136 ft1\"><SPAN class=\"ft3\">7.4</SPAN><SPAN class=\"ft32\">Governing Law; Arbitration. </SPAN>This Agreement shall be governed by the laws of the State of Arizona without giving effect to conflict of laws principles. Any and all disputes, controversies and claims arising out of or relating to this Agreement or concerning the respective rights or obligations of the parties hereto shall be settled and determined by arbitration before a panel of one (1) arbitrator in Maricopa County, Arizona, pursuant to the Commercial Rules of the American Arbitration Association then in effect. Judgment upon the award rendered may be entered in any court having jurisdiction or application may be made to such court for a judicial acceptance of the award and an order of enforcement. The parties agree that the arbitrator shall have the power to award damages, injunctive relief and reasonable attorneys\' fees and expenses to the prevailing party.</P>\r\n\r\n</DIV>\r\n\r\n<DIV id=\"page_17\">\r\n\r\n<P class=\"p137 ft1\"><SPAN class=\"ft3\">7.5</SPAN><SPAN class=\"ft32\">Force Majeure. </SPAN>Except for Your obligation to pay Fees for the Reojen Service or other Services rendered, neither party will be responsible for failure of performance due to causes beyond its control. Such causes include (without limitation) accidents, acts of God, labor disputes, actions of any government agency, shortage of materials, acts of terrorism, or the stability or availability of the Internet or a portion thereof.</P>\r\n\r\n<P class=\"p138 ft1\"><SPAN class=\"ft3\">7.6</SPAN><SPAN class=\"ft32\">Export. </SPAN>You agree that German export control laws and other applicable export and import laws govern Your use of the Reojen Service, including Reojen technology. You represent that You are neither a citizen of an embargoed country nor prohibited end user under applicable German export or <NOBR>anti-terrorism</NOBR> laws, regulations and lists. You agree not to use or export, nor allow a third party to use or export, the Reojen Service or technology in any manner that would violate applicable law, including but not limited to applicable export and import control laws and regulations.</P>\r\n\r\n<P class=\"p139 ft1\"><SPAN class=\"ft3\">7.7</SPAN><SPAN class=\"ft32\">Severability. </SPAN>If any provision of this Agreement is determined to be illegal or unenforceable, that provision will be limited to the minimum extent necessary so that this Agreement shall otherwise remain in full force and effect.</P>\r\n\r\n<P class=\"p140 ft1\"><SPAN class=\"ft3\">7.8</SPAN><SPAN class=\"ft32\">Relationship of Parties. </SPAN>No joint venture, partnership, employment, or agency relationship exists between Reojen and You as a result of this Agreement or use of the Reojen Service.</P>\r\n\r\n<P class=\"p141 ft1\"><SPAN class=\"ft3\">7.9</SPAN><SPAN class=\"ft32\">Waiver. </SPAN>The failure of either party to enforce any right or provision in this Agreement shall not constitute a waiver of such right or provision unless acknowledged and agreed to by such party in writing.</P>\r\n\r\n<P class=\"p142 ft1\"><SPAN class=\"ft3\">7.10</SPAN><SPAN class=\"ft32\">Invalidity; Waivers. </SPAN>If any provision or portion of this Agreement is held invalid, illegal, void or unenforceable as it appears in this Agreement by reason of any rule of law, administrative or judicial provision or public policy, then such provision shall be construed as being enforceable to the extent such rule of law, administrative or judicial provision or public policy allows. All other provisions of this Agreement shall nevertheless remain in full force and effect. Neither of the parties shall be deemed to have waived any of its rights, powers or remedies hereunder unless the waiving party expresses such a waiver in writing.</P>\r\n\r\n<P class=\"p143 ft1\"><SPAN class=\"ft3\">7.11</SPAN><SPAN class=\"ft32\">Government End Use. </SPAN>If You are an agency or unit of the German Government (\"Government\"), the Reojen Service is provided for ultimate Government use solely in accordance with the provisions of the Federal Acquisition Regulation (\"FAR\") and supplements thereto, including the Department of Defense (\"DoD\") FAR Supplement (\"DFARS\", set forth in this Section. Government technical data and software rights related to the Services include only those rights customarily provided to the public as defined in this Agreement. This customary commercial license is provided in accordance with FAR Â§12.211 (Technical Data) and FAR Â§12.212 (Computer Software) and, for DoD transactions, DFARS Â§ <NOBR>252.227-7015</NOBR> (Technical Data - Commercial Items) and DFARS Â§ <NOBR>252.227.7202-3</NOBR> (Rights in Commercial Computer Software or Computer Software Documentation). If the Government has a need for rights not conveyed under these terms, it must negotiate with Reojen to determine if there are acceptable terms for transferring such rights, and a mutually acceptable written addendum specifically conveying such rights must be included in any applicable contract or agreement.</P>\r\n\r\n</DIV>									\r\n\r\n                                        									\r\n\r\n                                        									\r\n\r\n                                        									\r\n\r\n                                        									\r\n\r\n                                        									\r\n\r\n                                        									\r\n\r\n                                        									\r\n\r\n                                        									\r\n\r\n                                        									\r\n\r\n                                        									\r\n\r\n                                        									\r\n\r\n                                        									\r\n\r\n                                        									\r\n                                        									\r\n                                        ');
INSERT INTO `dashboard` (`id`, `title`, `image`, `contents`) VALUES
(6, 'Privacy policy', '', '                                                <P class=\"p0 ft0\">Privacy policy</P>\n\n<hr/>\n\n<P class=\"p1 ft1\">This privacy policy sets out how Reojen uses and protects any information that you give Reojen when you use this website.</P>\n\n<P class=\"p2 ft1\">Reojen is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement.</P>\n\n<P class=\"p2 ft1\">Reojen may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes..</P>\n\n<P class=\"p3 ft3\"><SPAN class=\"ft1\">1.</SPAN><SPAN class=\"ft2\">What we collect</SPAN><SPAN class=\"ft1\">.</SPAN></P>\n\n<P class=\"p4 ft1\">We may collect the following information:</P>\n\n<P class=\"p8 ft1\"><SPAN class=\"ft1\">1.</SPAN><SPAN class=\"ft5\">Name and job title</P>\n\n<P class=\"p9 ft6\"><SPAN class=\"ft6\">2.</SPAN><SPAN class=\"ft7\">Contact information including email address</SPAN></P>\n\n<P class=\"p10 ft6\"><SPAN class=\"ft6\">3.</SPAN><SPAN class=\"ft7\">Demographic information such as postcode, preferences and interests</P>\n\n<P class=\"p10 ft6\"><SPAN class=\"ft6\">4.</SPAN><SPAN class=\"ft7\">Other information relevant to customer surveys and/or offers</P>\n\n<P class=\"p3 ft3\"><SPAN class=\"ft1\">2.</SPAN><SPAN class=\"ft2\">What we do with the information we gather</SPAN><SPAN class=\"ft1\">.</SPAN></P>\n\n<P class=\"p4 ft1\">We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:</P>\n\n<P class=\"p8 ft1\"><SPAN class=\"ft1\">1.</SPAN><SPAN class=\"ft5\">Internal record keeping.</P>\n\n<P class=\"p9 ft6\"><SPAN class=\"ft6\">2.</SPAN><SPAN class=\"ft7\">We may use the information to improve our products and services.</SPAN></P>\n\n<P class=\"p10 ft6\"><SPAN class=\"ft6\">3.</SPAN><SPAN class=\"ft7\">We may periodically send promotional emails about new products, special offers or other information which we think you may find interesting using the email address which you have provided.</P>\n\n<P class=\"p10 ft6\"><SPAN class=\"ft6\">4.</SPAN><SPAN class=\"ft7\">From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone, fax or mail. We may use the information to customise the website according to your interests.</P>\n\n<P class=\"p3 ft3\"><SPAN class=\"ft1\">3.</SPAN><SPAN class=\"ft2\">Security</SPAN><SPAN class=\"ft1\">.</SPAN></P>\n\n<P class=\"p4 ft1\">We are committed to ensuring that your information is secure. In order to prevent unauthorised access or disclosure we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online.</P>\n\n<P class=\"p3 ft3\"><SPAN class=\"ft1\">4.</SPAN><SPAN class=\"ft2\">Cookies</SPAN><SPAN class=\"ft1\">.</SPAN></P>\n\n<P class=\"p4 ft1\">A \"cookie\" is a small piece of information stored by a web server on a web browser so it can be later read back from that browser. Cookies are useful for enabling the browser to remember information specific to a given user. We place both permanent and temporary cookies in your computer\'s hard drive. The cookies do not contain any of your personally identifiable information.</p>\n\n</DIV>\n\n									\n\n                                        '),
(7, 'Refund policy', '', '                                                <h1>Returns and Refunds Policy</h1>\n\n\n\n\n\n<p>Thank you for shopping at Reojen.</p>\n\n\n\n<p>Please read this policy carefully. This is the Return and Refund Policy of Reojen.\n\n\n\n\n\n\n\n\n\n<h2>Digital products</h2>\n\n\n\n<p>We do not issue refunds for digital products once the order is confirmed and the product is sent.</p>\n\n\n\n<p>We recommend contacting us for assistance if you experience any issues receiving or downloading our products.</p>\n\n\n\n\n\n\n\n<h2>Contact us</h2>\n\n\n\n<p>If you have any questions about our Returns and Refunds Policy, please contact us:</p>\n\n\n\n<ul>\n\n<li>\n\n    <p>By visiting this page on our website: https://www.reojen.com/support.php</p>\n\n</li>\n\n</ul>\n\n\n\n									\n\n                                        '),
(8, 'Additional payment option section', '', 'Contact our customer support to get your preferred payment option								\n\n                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway`
--

CREATE TABLE `payment_gateway` (
  `id` int(11) NOT NULL,
  `slug` varchar(20) NOT NULL,
  `gateway` varchar(100) NOT NULL,
  `status` enum('0','1','3') NOT NULL COMMENT '0=inactive, 1=active, 3=delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='All the payment gateway lies here';

--
-- Dumping data for table `payment_gateway`
--

INSERT INTO `payment_gateway` (`id`, `slug`, `gateway`, `status`) VALUES
(1, 'BACS', 'TransferWise', '1'),
(2, 'WU', 'Western Union transfer', '0'),
(3, 'WT', 'Wire Transfer', '0'),
(4, 'OP', 'Okpay Money', '0'),
(5, 'SEPA', 'Sepa Country', '0');

-- --------------------------------------------------------

--
-- Table structure for table `payment_option_status`
--

CREATE TABLE `payment_option_status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_option_status`
--

INSERT INTO `payment_option_status` (`id`, `name`, `status`) VALUES
(1, 'paypal_status', 0),
(2, 'skrill_status', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `sender_email` varchar(50) DEFAULT NULL,
  `originating_country` int(11) DEFAULT NULL,
  `money_sent_type` varchar(100) DEFAULT NULL,
  `recipient_currency` varchar(40) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `mtcn` varchar(50) DEFAULT NULL,
  `wureceipt` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `payment_request_id` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`id`, `first_name`, `middle_name`, `last_name`, `sender_email`, `originating_country`, `money_sent_type`, `recipient_currency`, `amount`, `mtcn`, `wureceipt`, `user_id`, `status`, `payment_request_id`, `created_at`, `updated_at`, `date`, `time`, `is_deleted`) VALUES
(70, 'Amal', '', 'Khamaru', 'amal@gmail.com', 91, '2', '', 10, '1234', '14896736638470logo.png', 51, 0, 'MEA8 CQKN RI70', '2017-03-17 11:22:21', '0000-00-00 00:00:00', '2017-03-16', '07:44 PM GMT+05:30', 0),
(71, 'hu', '', 'hh', 'vj@hy.net', 54, '1', '', 675, '6548903215', '14896761052692Rain on tree.JPG', 12, 0, 'KTVE BWX4 7L71', '2017-03-17 11:22:21', '0000-00-00 00:00:00', '2017-03-16', '08:55 PM GMT+06:00', 0),
(72, 'Arpita', '', 'Basak', 'Abc@gmail', 354, '1', '', 13, '12345', '14897509366475Screenshot_6.png', 51, 0, 'GO0W ODZR JU72', '2017-03-17 13:12:16', '0000-00-00 00:00:00', '2017-03-17', '05:12 PM GMT+05:30', 0),
(73, 'Indrajit', 'V', 'Kaplatiya', 'ik@vpninfotech.com', 91, '1', '', 100, '123-456-7890', '15051346475235pdf.pdf', 11, 0, 'URMD BY5U WJ73', '2017-09-11 07:27:27', '0000-00-00 00:00:00', '2017-09-11', '06:27 PM GMT+05:30', 0),
(74, 'IK', '', 'VPN', 'ik@vpninfotech.com', 91, '1', '', 200, '123-456-7890', '15051936523701IMG_20072017_211201_0.png', 11, 0, 'JU56 FVRW JR74', '2017-09-11 23:50:52', '0000-00-00 00:00:00', '2017-09-12', '10:50 AM GMT+05:30', 0),
(75, 'Bishal', '', 'Pal', 'bishal.pal@infoway.us', 91, '1', '', 1, '123-456-7890', '15088538461238Desert.jpg', 76, 0, '9M0N 3H5J 1175', '2017-10-24 08:34:06', '0000-00-00 00:00:00', '2017-10-24', '07:34 PM GMT+05:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `text` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `text`, `currency`) VALUES
(1, 'test product', 40.00, '3 months', 'GBP'),
(2, 'test product 2', 45.00, 'list', 'GBP'),
(3, 'new product 3', 50.00, '3 months', 'GBP');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(6) UNSIGNED NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(45) NOT NULL,
  `value` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `create_date`, `name`, `value`) VALUES
(1, '2019-01-23 03:29:14', 'payment_type', 'SKRILL'),
(2, '2018-09-24 17:56:44', 'password_check', '0');

-- --------------------------------------------------------

--
-- Table structure for table `site_address`
--

CREATE TABLE `site_address` (
  `id` int(10) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `country` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Site address';

--
-- Dumping data for table `site_address`
--

INSERT INTO `site_address` (`id`, `company_name`, `address_line1`, `address_line2`, `city`, `state`, `post_code`, `country`) VALUES
(1, 'Reojen Co.', 'CharlottenstraÃŸe 49', '', 'Berlin', '', '10117', 78);

-- --------------------------------------------------------

--
-- Table structure for table `site_db_download_config`
--

CREATE TABLE `site_db_download_config` (
  `id` int(10) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_db_download_config`
--

INSERT INTO `site_db_download_config` (`id`, `username`, `password`, `status`) VALUES
(1, 'reoups10', 'd5a98b4bb35f23d260165e17a90a34f1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `name`, `logo`, `favicon`) VALUES
(23, 'Reojen', '5ddf2cb4182ba20aa268d41b29f44e7e.png', '1d73f717559f9a78d3171f2817f52983.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `mb_transaction_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT 'Status of the transaction: -2 failed / 2 processed / 0 pending / -1 cancelled ',
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `mb_currency` varchar(255) NOT NULL,
  `merchant_id` varchar(255) NOT NULL,
  `pay_to_email` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`id`, `user_id`, `mb_transaction_id`, `status`, `amount`, `currency`, `mb_currency`, `merchant_id`, `pay_to_email`, `payment_type`, `source`, `datetime`) VALUES
(1, '217', '2602130185', '2', '1', 'USD', 'EUR', '111321607', 'verify.now.18+1@gmail.com', '', 'Skrill', '2019-01-12 11:22:44'),
(2, '217', '2602133850', '2', '5', 'USD', 'EUR', '111321607', 'verify.now.18+1@gmail.com', '', 'Skrill', '2019-01-12 11:27:05'),
(3, '217', '2602138979', '2', '11', 'USD', 'EUR', '111321607', 'verify.now.18+1@gmail.com', '', 'Skrill', '2019-01-12 11:32:46'),
(4, '217', '2602151668', '2', '21', 'USD', 'EUR', '111321607', 'verify.now.18+1@gmail.com', '', 'Skrill', '2019-01-12 11:43:14'),
(5, '217', '2602240680', '2', '3', 'USD', 'EUR', '111321607', 'verify.now.18+1@gmail.com', '', 'Skrill', '2019-01-12 13:05:23'),
(6, '217', '2602266800', '2', '5', 'USD', 'EUR', '111321607', 'verify.now.18+1@gmail.com', '', 'Skrill', '2019-01-12 13:28:23'),
(7, '232', '2603638534', '2', '135', 'USD', 'USD', '109686100', 'accounting@reojen.com', 'VSA', 'Skrill', '2019-01-13 23:42:49'),
(8, '218', '2615925198', '2', '140', 'USD', 'USD', '109686100', 'accounting@reojen.com', 'MSC', 'Skrill', '2019-01-25 18:21:05'),
(9, '228', '2615944122', '2', '10', 'USD', 'USD', '109686100', 'accounting@reojen.com', 'VSA', 'Skrill', '2019-01-25 18:36:39'),
(10, '240', '2616051530', '2', '135', 'USD', 'USD', '109686100', 'accounting@reojen.com', 'VSA', 'Skrill', '2019-01-25 20:23:34'),
(11, '226', '2616090501', '2', '10', 'USD', 'USD', '109686100', 'accounting@reojen.com', 'VSA', 'Skrill', '2019-01-25 21:16:52'),
(12, '226', '2616560814', '2', '125', 'USD', 'USD', '109686100', 'accounting@reojen.com', 'VSA', 'Skrill', '2019-01-26 11:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(15) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transfers` varchar(255) NOT NULL,
  `name_email` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `fee` decimal(15,2) NOT NULL,
  `netamount` decimal(15,2) NOT NULL,
  `balance` decimal(15,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_types`
--

CREATE TABLE `transfer_types` (
  `id` int(11) NOT NULL,
  `transfer_type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transfer_types`
--

INSERT INTO `transfer_types` (`id`, `transfer_type_name`) VALUES
(2, 'Western Union Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) DEFAULT '******',
  `city` varchar(50) NOT NULL,
  `statep` varchar(50) DEFAULT '******',
  `country` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `com_code` varchar(300) DEFAULT NULL,
  `balance` decimal(15,2) DEFAULT '0.00',
  `priv` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `reference_number` varchar(255) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `CompanyName` varchar(150) DEFAULT NULL,
  `lname` varchar(30) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `c_password` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `Profile_pic` varchar(500) DEFAULT 'img/ProfilePic/default-profile1.jpg',
  `SecurituyQuestion1` varchar(500) DEFAULT NULL,
  `custom_question1` tinyint(2) NOT NULL DEFAULT '0',
  `Answer1` varchar(500) DEFAULT NULL,
  `SecurityQuestion2` varchar(500) DEFAULT NULL,
  `custom_question2` tinyint(2) NOT NULL DEFAULT '0',
  `Answer2` varchar(500) DEFAULT NULL,
  `Country` varchar(100) NOT NULL,
  `country_res` varchar(200) NOT NULL,
  `user_type` enum('user','admin') NOT NULL DEFAULT 'user',
  `date_of_creation` int(11) NOT NULL,
  `enable_paypal` int(11) NOT NULL DEFAULT '0',
  `pass_resetkey` varchar(45) DEFAULT NULL,
  `enable_advcash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores user information of Blueprint Auctionners Online System';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `reference_number`, `fname`, `mname`, `CompanyName`, `lname`, `mobile_no`, `password`, `c_password`, `Email`, `Address`, `Profile_pic`, `SecurituyQuestion1`, `custom_question1`, `Answer1`, `SecurityQuestion2`, `custom_question2`, `Answer2`, `Country`, `country_res`, `user_type`, `date_of_creation`, `enable_paypal`, `pass_resetkey`, `enable_advcash`) VALUES
(1, 'bJI8RFTvjCjH', 'a', 'b', 'infiny', 'c', '+910000011', '4537196ae10f6c51c24b24e52ac0bcf6', '4537196ae10f6c51c24b24e52ac0bcf6', '', '', 'img/ProfilePic/default-profile1.jpg', '', 0, 'a', '', 0, 'b', 'India', 'India', 'user', 0, 0, '', 0),
(2, '', 'NEW', 'Tcr', '', 'Net', '+88017100', 'ef749ff9a048bad0dd80807fc49e1c0d', 'ef749ff9a048bad0dd80807fc49e1c0d', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'A 1', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'A 2', 'Bangladesh', 'Bangladesh', 'user', 0, 0, '', 0),
(3, 't3Gvcu898ZCk', 'Hernando', '', '', 'Agudelo', '+85264658825', 'f7e53beddf20126d487c4fc6ec2c637c', 'f7e53beddf20126d487c4fc6ec2c637c', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'lasalle', 'In what town or city did your mother and father meet?', 0, 'cartagena', 'Hong Kong', 'Hong Kong', 'user', 0, 0, '', 0),
(4, '', 'Marianna', '', '', 'Chernykh', '+380953384373', 'b274c7f9f2f4c152c90bc087627b0e8c', 'b274c7f9f2f4c152c90bc087627b0e8c', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '21', 'In what town or city did your mother and father meet?', 0, 'Luhansk', 'Ukraine', 'Ukraine', 'user', 0, 0, '', 0),
(5, '', '', '', '', '', '+91', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 'img/ProfilePic/default-profile1.jpg', '', 0, '', '', 0, '', 'Canada', 'Egypt', 'user', 0, 0, '', 0),
(6, '', 'Tatevik', '', '', 'Sahakyan', '+37494675878', 'f21578b6179eefdc6f09e253b9d4feb5', 'f21578b6179eefdc6f09e253b9d4feb5', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, '5', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'lena', 'Armenia', 'Armenia', 'user', 0, 0, '', 0),
(7, '', 'Daria', '', '', 'Pozharko', '+380930181172', 'f5733e12ea8dcfbe651e4e2430a1997c', 'f5733e12ea8dcfbe651e4e2430a1997c', '', '', 'img/ProfilePic/default-profile1.jpg', 'In In what town or city did you meet your spouse/partner?', 0, 'Kiev', 'What is your spouse or partner\'s mother\'s maiden name?', 0, 'Revenko', 'Ukraine', 'Ukraine', 'user', 0, 0, '', 0),
(8, '', 'Sebastian', '', '', 'Najduch', '+48784073730', '0e46da039170e0034681456d35620c47', '0e46da039170e0034681456d35620c47', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '397', 'In what town or city did your mother and father meet?', 0, 'Wadowice', 'Poland', 'Poland', 'user', 0, 0, '', 0),
(9, '', 'Narmina', '', '', 'Aliyeva', '+994557864010', '7b0b6d5652ad5421106f1302f81fe6f6', '7b0b6d5652ad5421106f1302f81fe6f6', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'Azadliq Avenue 88', 'In what town or city did your mother and father meet?', 0, 'Baku', 'Azerbaijan', 'Azerbaijan', 'user', 0, 0, '', 0),
(10, '', 'Gillian', 'Ruth', '', 'Bulbeck', '+5491132165579', '200e8868b664bd9eeb3ca113d04f7570', '200e8868b664bd9eeb3ca113d04f7570', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '113 Browning Avenue', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'lottie', 'Argentina', 'Argentina', 'user', 0, 0, '', 0),
(11, '6GI74P4dmnvY', 'a', 'd', 'demo', 'as', '+915555555555', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'as', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'as', 'India', 'India', 'user', 0, 0, '', 0),
(12, 'bucxR8diCT6O', 'nil', 'b', 'abcd', 'l', '+880172016', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 'ghhftftgfcfxded7686@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite food as a child?', 0, 'answer 1', 'What was the name of the hospital where you were born?', 0, 'answer 2', 'Bangladesh', 'Bangladesh', 'admin', 0, 1, 'a46d52d38f091e23d37b72ccd7cf7170', 0),
(13, '', 'Ahmed', 'Algelany', '', 'Abdulmageed', '+201277294647', '7a833fe8696b36075097c0516e80660f', '7a833fe8696b36075097c0516e80660f', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Giza', 'In what town or city did your mother and father meet?', 0, 'Giza', 'Egypt', 'Egypt', 'user', 0, 0, '', 0),
(14, '', 'Jelmer Alexander', '', '', 'de Kok Bernat', '+34657391434', 'fe7b4f35a1d96f15d98497d484f9ff9c', 'fe7b4f35a1d96f15d98497d484f9ff9c', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'hdll', 'In what town or city did your mother and father meet?', 0, 'madrid', 'Spain', 'Spain', 'user', 0, 0, '', 0),
(15, '', 'Francesco', '', '', 'Osimanti', '+393930297529', 'c8661883e632b97ff217881a419a5e67', 'c8661883e632b97ff217881a419a5e67', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'Lucca', 'In what town or city did your mother and father meet?', 0, 'Lucca', 'Holy See (Vatican City State)', 'Holy See (Vatican City State)', 'user', 0, 0, '', 0),
(16, '', 'Kate', '', '', 'Shashkova', '+375291106794', '78a00d474f6d59253f5874f69a5e5928', '78a00d474f6d59253f5874f69a5e5928', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'Nagornaya 23', 'In what town or city did your mother and father meet?', 0, 'Klimovichi', 'Belarus', 'Belarus', 'user', 0, 0, '', 0),
(17, '', 'JASENKA', '', '', 'JASKIC', '+33628333482', 'a405bff7095c8aa723efe1c2d3f110d9', 'a405bff7095c8aa723efe1c2d3f110d9', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'LYON', 'In what town or city did your mother and father meet?', 0, 'BANJALUKA', 'France', 'France', 'user', 0, 0, '', 0),
(18, '', 'Elsa', 'Samagaio', '', 'Silva', '+351915308676', '2b65c0139a3f72a90a60bc04820d3384', '2b65c0139a3f72a90a60bc04820d3384', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'Aveiro', 'In what town or city did your mother and father meet?', 0, 'Aveiro', 'Portugal', 'Portugal', 'user', 0, 0, '', 0),
(19, '', 'Anna', '', '', 'Andre', '+393392857628', '75bac2fc706657a2da56ecfa62b485a1', '75bac2fc706657a2da56ecfa62b485a1', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '15', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Florio', 'Holy See (Vatican City State)', 'Holy See (Vatican City State)', 'user', 0, 0, '', 0),
(20, '', 'Ekaterina', '', '', 'Varivoda', '+375293429294', '225318a741b85d6ea324650df56974a4', '225318a741b85d6ea324650df56974a4', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'Voronianskogo 7', 'In what town or city did your mother and father meet?', 0, 'Minsk', 'Belarus', 'Belarus', 'user', 0, 0, '', 0),
(21, '', 'Alberto', '', '', 'Masini', '+393407064095', '878c38cde5a7f31ffa0ffae1e4d4e3e2', '878c38cde5a7f31ffa0ffae1e4d4e3e2', '', '', 'img/ProfilePic/default-profile1.jpg', 'What were the last four digits of your childhood telephone number?', 0, '2867', 'In what town or city did your mother and father meet?', 0, 'Riccione', 'Holy See (Vatican City State)', 'Holy See (Vatican City State)', 'user', 0, 0, '', 0),
(22, '', 'Maxime', '', '', 'LISOIR', '+66969209105', 'cb7ac08155d84f34c4b42253763de9b3', 'cb7ac08155d84f34c4b42253763de9b3', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'Lyon', 'In what town or city did your mother and father meet?', 0, 'Nantes', 'Thailand', 'Thailand', 'user', 0, 0, '', 0),
(23, '', 'MÃ³nica', '', '', 'Espinosa', '+34670669163', '737a4cf48fe70995884e5c0a5c080eb7', '737a4cf48fe70995884e5c0a5c080eb7', '', '', 'img/ProfilePic/default-profile1.jpg', 'In In what town or city did you meet your spouse/partner?', 0, 'Salamanca', 'In what town or city did your mother and father meet?', 0, 'Burgos', 'Spain', 'Spain', 'user', 0, 0, '', 0),
(24, '', 'Rebeca', '', '', 'GarcÃ­a', '+34658721281', '738fbf8619f7430dfabf544d5d2ba6bd', '738fbf8619f7430dfabf544d5d2ba6bd', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Instituto Andes de Caracas', 'In what town or city did your mother and father meet?', 0, 'Caracas', 'Spain', 'Spain', 'user', 0, 0, '', 0),
(25, '', 'Edgar', 'Ashot', '', 'Khachatryan', '+37498554596', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'Savoyan', 'In what town or city did your mother and father meet?', 0, 'Gyumri', 'Armenia', 'Armenia', 'user', 0, 0, '', 0),
(26, '', 'Adrian', 'E', '', 'Stefarta', '+40747765060', 'f3809e88a8b49a7d672740e2b663fbb1', 'f3809e88a8b49a7d672740e2b663fbb1', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, '29', 'In what town or city did your mother and father meet?', 0, 'chisinau', 'Romania', 'Moldova, Republic of', 'user', 0, 0, '', 0),
(27, '', 'Piotr', 'Tadeusz', '', 'Lugowski', '+34699133798', '2c5e61c74b657e524b0a744e681ef82d', '2c5e61c74b657e524b0a744e681ef82d', '', '', 'img/ProfilePic/default-profile1.jpg', 'In In what town or city did you meet your spouse/partner?', 0, 'Riga', 'In what town or city did your mother and father meet?', 0, 'Warszawa', 'Spain', 'Spain', 'user', 0, 0, '', 0),
(28, '', 'Martina', '', '', 'Pompeo', '+393490084729', '451886bda9a2281871a1322803943239', '451886bda9a2281871a1322803943239', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'yangzhou', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'pradal', 'Holy See (Vatican City State)', 'Holy See (Vatican City State)', 'user', 0, 0, '', 0),
(29, '', 'Ivan', '', '', 'Cadars', '+33635791989', '25d84a8cfc0d85a958a1d223bd62df5b', '25d84a8cfc0d85a958a1d223bd62df5b', '', '', 'img/ProfilePic/default-profile1.jpg', 'In In what town or city did you meet your spouse/partner?', 0, 'Epinal', 'What are the last five digits of your driver\'s licence number?', 0, '00032', 'France', 'France', 'user', 0, 0, '', 0),
(30, '', 'Patricia', 'Carvalho', '', 'Vasconcellos', '+4407534311612', 'b5bed943402d247353be9db12deb385e', 'b5bed943402d247353be9db12deb385e', '', '', 'img/ProfilePic/default-profile1.jpg', 'What were the last four digits of your childhood telephone number?', 0, '7768', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'InÃªs', 'United Kingdom', 'United Kingdom', 'user', 0, 0, '', 0),
(31, '', 'Uladzimir', '', '', 'Bialou', '+359878637882', '04ce9ab33c615dc28cb3839ff54b059a', '04ce9ab33c615dc28cb3839ff54b059a', '', '', 'img/ProfilePic/default-profile1.jpg', 'In In what town or city did you meet your spouse/partner?', 0, 'Minsk', 'What are the last five digits of your driver\'s licence number?', 0, '02403', 'Bulgaria', 'Bulgaria', 'user', 0, 0, '', 0),
(32, '', 'Maria', 'Fatima', '', 'Ribeiro', '+351917915533', '84e5f1616620c89e35cdbd9a459fc9cd', '84e5f1616620c89e35cdbd9a459fc9cd', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Leiros', 'In what town or city did your mother and father meet?', 0, 'espinho', 'Portugal', 'Portugal', 'user', 0, 0, '', 0),
(33, '', 'Maria', '', '', 'Vayman', '+99556843494', '1f72dff4b442404d921f67528b7b074e', '1f72dff4b442404d921f67528b7b074e', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, '144', 'In what town or city did your mother and father meet?', 0, 'Ekaterinburg', 'Georgia', 'Georgia', 'user', 0, 0, '', 0),
(34, '', 'Tony', '', 'Tony Bobo', 'Bobo', '+541136743377', 'e58fcf88c45345893e63e6112ca3c537', 'e58fcf88c45345893e63e6112ca3c537', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'joliot curie', 'In what town or city did your mother and father meet?', 0, 'vitry', 'Argentina', 'Argentina', 'user', 0, 0, '', 0),
(35, '', 'Maria', '', '', 'Vayman', '+995568434994', '1f72dff4b442404d921f67528b7b074e', '1f72dff4b442404d921f67528b7b074e', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, '144', 'In what town or city did your mother and father meet?', 0, 'Ekaterinburg', 'Georgia', 'Georgia', 'user', 0, 0, '', 0),
(36, '', 'Martina', '', '', 'Triaca', '+393397906376', '946ed1eefb5c32c3a48654ce2cbade52', '946ed1eefb5c32c3a48654ce2cbade52', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'via savona 7', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Salemi', 'Holy See (Vatican City State)', 'Holy See (Vatican City State)', 'user', 0, 0, '', 0),
(37, '', 'Chiara', '', '', 'Petrucci', '+393487766526', '1e23d6dd0dc9a715b5478d556869e804', '1e23d6dd0dc9a715b5478d556869e804', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'Via Machiavelli 114', 'In what town or city did your mother and father meet?', 0, 'Livorno', 'Holy See (Vatican City State)', 'Spain', 'user', 0, 0, '', 0),
(38, '', 'Ilaria', '', '', 'Castelli', '+447804324941', 'e37ece473d42220f791e2c881e56ed74', 'e37ece473d42220f791e2c881e56ed74', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'sacro cuore', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'rinaldi', 'United Kingdom', 'United Kingdom', 'user', 0, 0, '', 0),
(39, '', 'Fabio', '', 'Fabio Salsi Traduzioni', 'Salsi', '+51985078272', 'd1c0f384b6adef8b7dc0242cff5d9def', 'd1c0f384b6adef8b7dc0242cff5d9def', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'pascoli', 'What is the middle name of your oldest child?', 0, 'ignacio', 'Peru', 'Peru', 'user', 0, 0, '', 0),
(40, '', 'Laura', '', '', 'DÃ­az', '+34646593919', '5b39a09894460b99d7ed23b002258571', '5b39a09894460b99d7ed23b002258571', '', '', 'img/ProfilePic/default-profile1.jpg', 'What were the last four digits of your childhood telephone number?', 0, '5197', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Carmen', 'Spain', 'Spain', 'user', 0, 0, '', 0),
(41, '', 'Chiara', 'Petrucci', '', 'Petrucci', '+34611015941', '067ca503fb4b197619d9d7c54b3fe3d8', '067ca503fb4b197619d9d7c54b3fe3d8', '', '', 'img/ProfilePic/default-profile1.jpg', '', 0, 'via Machiavelli 114', '', 0, 'Livorno', 'Spain', 'Spain', 'user', 0, 0, '', 0),
(42, '', 'Roberto', '', '', 'Popolizio', '+393247935263', '8bb822db0162ce055b9e1fc3acdc252b', '8bb822db0162ce055b9e1fc3acdc252b', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'Pisa', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Maria', 'Holy See (Vatican City State)', 'Holy See (Vatican City State)', 'user', 0, 0, '', 0),
(43, '', 'Marta', '', '', 'Casals JovÃ©', '+420777576188', '39323d0240bf2fa1cf1302dea17b966f', '39323d0240bf2fa1cf1302dea17b966f', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'Pallars, 2', 'In what town or city did your mother and father meet?', 0, 'Solsona', 'Czech Republic', 'Czech Republic', 'user', 0, 0, '', 0),
(44, '', 'Manuel', '', '', 'GarcÃ­a', '+34661861007', '45b1373226b07e27812a06c32bd1e02a', '45b1373226b07e27812a06c32bd1e02a', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'Lluis Companys 13', 'In what town or city did your mother and father meet?', 0, 'Charches', 'Spain', 'Spain', 'user', 0, 0, '', 0),
(45, '', 'Test', '', '', 'Test', '+44100025', 'ef749ff9a048bad0dd80807fc49e1c0d', 'ef749ff9a048bad0dd80807fc49e1c0d', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Ans 1', 'What is your spouse or partner\'s mother\'s maiden name?', 0, 'Ans 2', 'United Kingdom', 'United Kingdom', 'user', 0, 0, '', 0),
(46, '', 'Mialisoatiana', '', '', 'Razanabololona', '+261326068727', '3aff099f3cadfbc9b04fcc86b7544ad5', '3aff099f3cadfbc9b04fcc86b7544ad5', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'belair', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'justine', 'Madagascar', 'Madagascar', 'user', 0, 0, '', 0),
(47, '', 'a', 'b', '', 'c', '+910000000034', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '1', 'In what town or city did your mother and father meet?', 0, 'Ludhiana', 'India', 'India', 'user', 0, 0, '', 0),
(48, '', 'Nikola', '', '', 'Atanasov', '+38971992392', '5966121f73914343c904a6f39c05038a', '5966121f73914343c904a6f39c05038a', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'Bibione', 'In what town or city did your mother and father meet?', 0, 'Skopje', 'Macedonia', 'Macedonia', 'user', 0, 0, '', 0),
(49, '', 'Daria', '', '', 'Gorelik', '+79851123821', '5d41402abc4b2a76b9719d911017c592', '5d41402abc4b2a76b9719d911017c592', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Integral', 'In what town or city did your mother and father meet?', 0, 'Moscow', 'Kazakhstan', 'Kazakhstan', 'user', 0, 0, '', 0),
(50, '', 'ghyjug', 'khjhuhjh', 'jhjjghjghbh', 'hjhjhgyjgy', '+2301000', 'e8dc4081b13434b45189a720b77b6818', 'e8dc4081b13434b45189a720b77b6818', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'abcdefgh', 'What is your spouse or partner\'s mother\'s maiden name?', 0, 'abcdefgh', 'Mauritius', 'Mauritius', 'user', 0, 0, '', 0),
(51, '', 'a', 'b', '', 'c', '+9100000000075', '65c59f65f3a0549cebf711743e6c64b3', '65c59f65f3a0549cebf711743e6c64b3', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'kolkata', 'What are the last five digits of your driver\'s licence number?', 0, 'howrah', 'India', 'India', 'user', 0, 0, '', 0),
(52, '', 'lijghtrv', '', '', 'hgtthggh', '+99467675645456', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', '', '', 'img/ProfilePic/default-profile1.jpg', 'In In what town or city did you meet your spouse/partner?', 0, 'ghghvb', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'hghfgfdc', 'Azerbaijan', 'Azerbaijan', 'user', 0, 0, '', 0),
(53, '', 'gh', '', '', 'g', '+1246867564465655', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', '', '', 'img/ProfilePic/default-profile1.jpg', 'In In what town or city did you meet your spouse/partner?', 0, 'j', 'What are the last five digits of your driver\'s licence number?', 0, 'k', 'Barbados', 'Barbados', 'user', 0, 0, '', 0),
(54, '', 'po', '', '', 'rg', '+1268789456321', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'sd', 'What is your spouse or partner\'s mother\'s maiden name?', 0, 'hyui', 'Antigua and Barbuda', 'Antigua and Barbuda', 'user', 0, 0, '', 0),
(55, '', 'Hiplired', '', '', 'Kiolsew', '+3739834', '35e5ff80657b6744d43021c23043346d', '35e5ff80657b6744d43021c23043346d', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'abcd', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'efgh', 'Moldova', 'Moldova', 'user', 0, 0, '', 0),
(60, '', 'a', 'b', 'Karmick', 'c', '+91000000000049', 'da24cad87f290cc2b48d1ed20f493c9c', 'da24cad87f290cc2b48d1ed20f493c9c', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'A/188', 'What is your favorite color?', 0, 'white', 'India', 'India', 'user', 0, 0, '', 0),
(62, '', 'a', 'b', '', 'c', '+91000000000067', '0e9bed91d56a8cdc904dc2d79354938b', '0e9bed91d56a8cdc904dc2d79354938b', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city did you meet your spouse/partner?', 0, 'kol', 'What are the last five digits of your driver\'s licence number?', 0, '58', 'India', 'India', 'user', 0, 0, '', 0),
(63, '', 'h', '', 'h', 'u', '+947659065', 'de88e3e4ab202d87754078cbb2df6063', 'de88e3e4ab202d87754078cbb2df6063', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is the last name of the teacher who gave you your first failing grade?', 0, 'ans', 'What was the make and model of your first car?', 0, 'ans', 'Sri Lanka', 'Sri Lanka', 'user', 0, 0, '', 0),
(64, '', 'h', '', '', 'j', '+12688765454768', 'e8dc4081b13434b45189a720b77b6818', 'e8dc4081b13434b45189a720b77b6818', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, 'f', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'f', 'Antigua and Barbuda', 'Antigua and Barbuda', 'user', 0, 0, '', 0),
(65, '', 'g', '', '', 'h', '+1268774545767', 'fb25b7c940b884834a1d9353cb21106f', 'fb25b7c940b884834a1d9353cb21106f', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite food as a child?', 0, 'Ans', 'What was the name of the hospital where you were born?', 0, 'Ans', 'Antigua and Barbuda', 'Antigua and Barbuda', 'user', 0, 0, '', 0),
(66, '', 'a', 'b', '', 'c', '+9100000063005', 'b7bc4e367b4230772d97cab2581034bf', 'b7bc4e367b4230772d97cab2581034bf', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'Ahmedabad', 'When is your anniversary?', 0, '12/12/2015', 'India', 'India', 'user', 0, 0, '', 0),
(67, '', 'pp', '', '', 'sam', '+12345678901', '1a64a010767f0725fb52111b0a9e9f84', '1a64a010767f0725fb52111b0a9e9f84', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '123', 'What are the last five digits of your driver\'s licence number?', 0, '12345', 'Canada', 'Canada', 'user', 0, 0, '', 0),
(74, '', 'Falgun', 'S', 'rigel', 'Shah', '+912222333344', '0192023a7bbd73250516f069df18b500', '0192023a7bbd73250516f069df18b500', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is the last name of the teacher who gave you your first failing grade?', 0, 'sfsdfs', 'What is your spouse or partner\'s mother\'s maiden name?', 0, 'sdfdsf', 'India', 'India', 'admin', 1493277416, 0, '', 0),
(75, '', 'Bimal', 'P', 'DDS', 'Patel', '+9122334455', '0fdf6d8829854bedeaed992a6f3ad83a', '0fdf6d8829854bedeaed992a6f3ad83a', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'sadsa', 'What is your spouse or partner\'s mother\'s maiden name?', 0, 'asdad', 'India', 'India', 'user', 1493277475, 0, '', 0),
(76, 'WBuVJs72cHtL', 'Bishal', '', 'infoway', 'Pal', '+919632587412', 'afdd0b4ad2ec172c586e2150770fbf9e', 'afdd0b4ad2ec172c586e2150770fbf9e', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '123', 'What is the middle name of your oldest child?', 0, '123', 'India', 'India', 'user', 1508743413, 0, '', 0),
(77, '', 'rtgrert', 'ertewrtewtr', 'etwet', 'ewtwetwet', '+91789652263221', '0f765bd08bc9323c33c7dae8fb0da266', '0f765bd08bc9323c33c7dae8fb0da266', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'fhagshdf', 'What was the make and model of your first car?', 0, 'hAGSDHgasdgJ', 'India', 'India', 'user', 1508997711, 0, '', 0),
(78, '1k63mHETgN1s', 'Manoj', '', 'Codebeginer', 'Thakur', '+918559058406', '5806325fbf4c1e879891a4f48237b9b9', '82e610870570834c80dea32bc7e4e745', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '64', 'What is the middle name of your oldest child?', 0, 'sonu', 'India', 'India', 'user', 1510503101, 0, '', 0),
(79, 'pE2sAtRCHbwt', 'Test', '', '', '13', '+6729468721094', '42f749ade7f9e195bf475f37a44cafcb', '42f749ade7f9e195bf475f37a44cafcb', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is the name of your favorite childhood friend?', 0, 'Password123', 'What is your favorite color?', 0, 'Password123', 'Antarctica', 'Antarctica', 'user', 1510551582, 0, '', 0),
(80, 'UbrGZemu6KDp', 'Test 14', '', '', '14', '+12689264980357', '42f749ade7f9e195bf475f37a44cafcb', '42f749ade7f9e195bf475f37a44cafcb', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite sport in high school?', 0, 'Password123', 'What was the make and model of your first car?', 0, 'Password123', 'Antigua and Barbuda', 'Antigua and Barbuda', 'user', 1510648571, 0, '', 0),
(81, 'avFHj7E3vpDB', 'Nataliia', '', '', 'Buhai', '+380636201873', '42f749ade7f9e195bf475f37a44cafcb', '42f749ade7f9e195bf475f37a44cafcb', 'ht@de.net', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'Password123', 'Who is your childhood sports hero?', 0, 'Password123', 'Austria', 'Austria', 'user', 1510649644, 0, '', 0),
(82, 'nfaFPKSj73cu', 'dev', '', 'ecomsolver', 'ecomsolver', '+911234567890', '4b3c01ebf6135478e42ec156bb05a1bc', '4b3c01ebf6135478e42ec156bb05a1bc', '', '', 'img/ProfilePic/default-profile1.jpg', 'hello', 1, 'hello', 'hello', 1, 'hello', 'India', 'India', 'user', 1515808080, 0, '', 0),
(83, 'SXVcQ4lRSKaJ', 'test', 'test', 'ecomsolver', 'test', '+91234567890', '4b3c01ebf6135478e42ec156bb05a1bc', '4b3c01ebf6135478e42ec156bb05a1bc', 'h@gt.net', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite sport in high school?', 0, 'badminton', 'Who is your childhood sports hero?', 0, 'salman', 'India', 'India', 'admin', 1515810298, 0, '', 0),
(84, 'EupRifGkjTRe', 'Tolga Han', '', '', 'Duyuler', '+905067674399', 'c36b387445c9974ae20bdef60d05e98d', 'c36b387445c9974ae20bdef60d05e98d', 'peccavi01@hotmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, 'faydali', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'ozdemir', 'Turkey', 'Turkey', 'user', 1516118025, 0, '', 0),
(87, '2VHkfuXnU6CS', 'test', 'dev', 'ecom', 'account', '+91987654321', '861f194e9d6118f3d942a72be3e51749', '861f194e9d6118f3d942a72be3e51749', '', '', 'img/ProfilePic/default-profile1.jpg', 'hello', 1, 'hello', 'hello', 1, 'hello', 'India', 'India', 'user', 1516598067, 0, '', 0),
(88, 'M6N5OxBPfKOw', 'toufik', '', '', 'elmouatamid', '+212672730508', '286d6e472210e83bd7a931826eec8d35', '286d6e472210e83bd7a931826eec8d35', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '193', 'What is your favorite color?', 0, 'Red', 'Morocco', 'Morocco', 'user', 1516603363, 0, '', 0),
(89, 'A1CfHz1NCIII', 'yigit', '', '', 'culum', '+905382149169', '06b7c15fcdeea1f1d490285841c07234', '06b7c15fcdeea1f1d490285841c07234', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'mancity', 'What is the middle name of your oldest child?', 0, 'william', 'Turkey', 'Turkey', 'user', 1516605753, 0, '', 0),
(90, '', 'Test', '', '', 'Test', '+374858097', 'f1163142fc285b6a00e998c9509d8cb3', 'f1163142fc285b6a00e998c9509d8cb3', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'kuyhdplM', 'In what town or city did your mother and father meet?', 0, 'kuyhdplM', 'Armenia', 'Armenia', 'user', 1516610787, 0, '', 0),
(91, 'zEVGTChESR2j', 'ç§¦', 'ä»•', '', 'é¹', '+8615640229768', '39140cc90b381cda60c784f8d8f772e1', '39140cc90b381cda60c784f8d8f772e1', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'å·¥è”å­å¼Ÿå°å­¦', 'What is the middle name of your oldest child?', 0, 'jingjing', 'China', 'China', 'user', 1516616104, 0, '', 0),
(92, '', 'Paolo', '', '', 'Guadin', '+393470393250', '1745e27f59a29b43c00ae7bb2cb46638', '1745e27f59a29b43c00ae7bb2cb46638', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'torricelli 10', 'What is your spouse or partner\'s mother\'s maiden name?', 0, 'Nardon', 'Italy', 'Italy', 'user', 1516634213, 0, '', 0),
(93, 'UffEUxClFglY', 'Nana', '', '', 'Khalifa', '+201228088966', '1163323415ad0408ccd797d1b4e33224', '1163323415ad0408ccd797d1b4e33224', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1949', 'Saddest day of my life', 1, '20170521', 'Egypt', 'Egypt', 'user', 1516688824, 0, '', 0),
(94, '4glidb5AWlhj', 'Etugbo', 'o', 'Steven Testing Ltd', 'Steven', '+2348130033008', '4d903d6f7ae06eb0e9798024438320d0', '4d903d6f7ae06eb0e9798024438320d0', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'dogs', 'What is your favorite color?', 0, 'green', 'Nigeria', 'Nigeria', 'user', 1516895682, 0, '', 0),
(95, 'GZi8gEIkq1Ul', 'wqw', 'qwqw', 'qwqw', 'qwqw', '+919090909090', 'ef2aab9466bb31eb4f00b44e89060998', 'ef2aab9466bb31eb4f00b44e89060998', '', '', 'img/ProfilePic/default-profile1.jpg', '12122', 1, '12121212', '1212', 1, '1212121', 'India', 'India', 'user', 1516938392, 0, '', 0),
(96, 'pAjU8si6XJID', 'Test', '', '', 'Developer', '+917508609112', '8d7b90897d921d9480e45e7cdb4e723b', '8d7b90897d921d9480e45e7cdb4e723b', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite sport in high school?', 0, 'Cricket', 'What is your favorite color?', 0, 'Black', 'India', 'India', 'user', 1516940913, 0, '', 0),
(97, 'EVG9BwtPh4d3', 'Mohan', '', '', 'Thiruvengadam', '+919500080065', '54ad2241e3ac3af3b74530858ea32c5f', '54ad2241e3ac3af3b74530858ea32c5f', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite sport in high school?', 0, 'cricket', 'What is your favorite color?', 0, 'Blue', 'India', 'India', 'user', 1516946379, 0, '', 0),
(98, 'T2Ka44Ywkekt', 'Vipin', '', 'YTS', 'Bairagi', '+919993671878', 'abeb3fee30a3404c48457aed078b388a', 'abeb3fee30a3404c48457aed078b388a', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what city or town does your nearest sibling live?', 0, 'indore', 'What was the name of the hospital where you were born?', 0, 'indore', 'India', 'India', 'user', 1516949741, 0, '', 0),
(99, 'OAFsEhUJxCLq', 'Sean', '', 'URCS', 'Serugo', '+256701721905', '3d42431e87af5fe6d243b99935da8c91', '3d42431e87af5fe6d243b99935da8c91', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city did you meet your spouse/partner?', 0, 'Kampala', 'What was the name of the hospital where you were born?', 0, 'Rubaga', 'Uganda', 'Uganda', 'user', 1516955742, 0, '', 0),
(100, 'wfmQuxglStuf', 'keshav', 'k', 'keshav infotech', 'infotech', '+919974367672', '7013f9ca80185296117440d1d216b292', '7013f9ca80185296117440d1d216b292', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '7', 'What is the middle name of your oldest child?', 0, 'amit', 'India', 'India', 'user', 1516957537, 0, '', 0),
(101, 'ULdw2RygDjNp', 'Amit', '', 'iSkylar Technologies', 'Sharma', '+918800578853', '396bc0927e610797f860596a603a6e21', '396bc0927e610797f860596a603a6e21', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1950', 'What is your favorite color?', 0, 'White', 'India', 'India', 'user', 1516959455, 0, '', 0),
(102, 'GftMMHNZBVgq', 'Sarang', 'R', '', 'Awaze', '+918087365436', '8f17fcbdd61e5214c5d6d40ee5c3fdea', '8f17fcbdd61e5214c5d6d40ee5c3fdea', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'Pp', 'What is the middle name of your oldest child?', 0, 'H', 'India', 'India', 'user', 1517036653, 0, '', 0),
(103, 'Dm2JBV8fmNPH', 'Test', '', 'xyz', 'kumar', '+91123456789', '2337efcd0f2140924ef38e42447aeb2c', '2337efcd0f2140924ef38e42447aeb2c', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'india', 'Who is your childhood sports hero?', 0, 'sachin', 'India', 'India', 'user', 1517044976, 0, '', 0),
(104, 'Qrs2vlshNA1f', 'asdasd', 'asdfasd', 'asdfasd', 'asdfasd', '+912323232323', '6a204bd89f3c8348afd5c77c717a097a', '6a204bd89f3c8348afd5c77c717a097a', '', '', 'img/ProfilePic/default-profile1.jpg', 'What were the last four digits of your childhood telephone number?', 0, 'asdf', 'What is the middle name of your oldest child?', 0, 'asdasdf', 'India', 'India', 'user', 1517047297, 0, '', 0),
(109, 'MWdWphlQ7CPG', 'Saurav', '', 'sbsgroupsdf', 'Jain', '+917869118811', '5806325fbf4c1e879891a4f48237b9b9', '5806325fbf4c1e879891a4f48237b9b9', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is the name of your favorite childhood friend?', 0, 'abcd', 'What is your oldest cousin\'s first and last name?', 0, 'XYZ', 'India', 'India', 'user', 1519022584, 0, '', 0),
(110, 'qSxgGaYUDXEq', 'sgf', 'sfg', 'sfdg', 'sdfg', '+917896541230', 'e8e423c7d068ff39e3dc61af28dd6058', 'e8e423c7d068ff39e3dc61af28dd6058', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'aaa', 'What is your favorite color?', 0, 'red', 'India', 'India', 'user', 1519023326, 0, '', 0),
(111, 'u9H7uXaDyedV', 'wer', 'wer', 'wer', 'wer', '+917869455440', 'c252273e9a9087357e2ffee46e12492b', 'c252273e9a9087357e2ffee46e12492b', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'sdf', 'In what town or city did your mother and father meet?', 0, 'sdf', 'India', 'India', 'user', 1519023618, 0, '', 0),
(112, 'j3OM5e5ecMt8', 'pradeep', 'kumar', 'sbsgroup', 'sahu', '+917869118810', '5806325fbf4c1e879891a4f48237b9b9', '5806325fbf4c1e879891a4f48237b9b9', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Govt.high school.', 'In what town or city did your mother and father meet?', 0, 'Indore', 'India', 'India', 'user', 1519036613, 0, '', 0),
(113, 'EInUwg2zd9hU', 'Deevy', '', 'Forebear Productions', 'Rick', '+919630984248', '4a3aa415a7d4aa47f841aef326a45f3d', '4a3aa415a7d4aa47f841aef326a45f3d', 'sourabh@mailinator.com', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Indore', 'What is your favorite color?', 0, 'Blue', 'India', 'India', 'user', 1519294793, 0, '', 0),
(114, 'l3550gdvTXK7', 'Test Acc', '', '', 'Two', '+672843870964', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what city or town does your nearest sibling live?', 0, 'abcd1234', 'What is your favorite color?', 0, 'abcd1234', 'Antarctica', 'Antarctica', 'user', 1519299335, 0, '', 0),
(115, 'kwd9euF9Xhtw', 'Devy', '', '', 'Rick', '+9196309842480', '4a3aa415a7d4aa47f841aef326a45f3d', '4a3aa415a7d4aa47f841aef326a45f3d', 'sourabh@mailinator.com', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '123', 'What is your favorite color?', 0, 'Blue', 'India', 'India', 'user', 1519375608, 0, '', 0),
(116, 'oq9VqXBuY8bj', 'Ravinder', '', 'aarvikinfotech', 'singh', '+918557062045', 'be05977add575832dc52655d4ad5c42e', 'be05977add575832dc52655d4ad5c42e', 'ravinder.singh@aarvikinfotech.com', '', 'img/ProfilePic/default-profile1.jpg', 'i am', 1, 'ravinder singh', 'not i am', 1, 'ravinder', 'India', 'India', 'user', 1519728216, 0, '', 0),
(117, 'BnfQOtjNUJ4D', 'sudarshan', '', 'aarvikinfotech', 'singh', '+918872385117', '43ba77deaa297867f18bcb8417f3e2ad', '43ba77deaa297867f18bcb8417f3e2ad', 'sudarshan.singh@aarvikinfotech.com', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Aarvik', 'What is the middle name of your oldest child?', 0, 'Aarvik', 'India', 'India', 'user', 1519777925, 0, '', 0),
(118, 'kD6ydLRBgKAO', 'Navjit', '', '', 'Kaur', '+919999999999', 'f0109faa5c621b66bb362db7337af9b2', 'f0109faa5c621b66bb362db7337af9b2', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Stepping Stones', 'In what town or city did your mother and father meet?', 0, 'Chandigarh', 'India', 'India', 'user', 1519795349, 0, '', 0),
(119, 'dYDyxZ4UJgSR', 'Oladapo', 'Timothy', 'Reojen.co', 'Olagoke', '+2348027625842', '0af85468686d625111a0f8ef99217dfb', '0af85468686d625111a0f8ef99217dfb', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Y and Y', 'What is the middle name of your oldest child?', 0, 'Inioluwa', 'Nigeria', 'Nigeria', 'user', 1519820768, 0, '', 0),
(120, 'KffBC7mPp483', 'j', '', '', 'i', '+6195678', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', 'h@be.net', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite food as a child?', 0, 'abcd1234', 'What was the name of the company where you had your first job?', 0, 'abcd1234', 'Australia', 'Australia', 'user', 1519833035, 0, '', 0),
(121, 'h1wQH2VwKBJ8', 'ju', '', '', 'hg', '+12689365809425', '325a2cc052914ceeb8c19016c091d2ac', '325a2cc052914ceeb8c19016c091d2ac', 'jtfghhhgfd@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, 'Abcd1234', 'What is your favorite color?', 0, 'Abcd1234', 'Antigua and Barbuda', 'Antigua and Barbuda', 'user', 1519902419, 0, '', 0),
(122, 'UdjEbYtWD0vc', 'Fir', '', '', 'Last', '+537034861053', '325a2cc052914ceeb8c19016c091d2ac', '325a2cc052914ceeb8c19016c091d2ac', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what city or town does your nearest sibling live?', 0, 'Abcd1234', 'Who is your childhood sports hero?', 0, 'Abcd1234', 'Cuba', 'Cuba', 'user', 1519981702, 0, '', 0),
(123, '8WKcjq4n7UWx', 'f', '', '', 'l', '+994765980324', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'abcd1234', 'What is your favorite color?', 0, 'abcd1234', 'Azerbaijan', 'Azerbaijan', 'user', 1520072555, 0, '', 0),
(124, 'IUDIi6YNOAdI', 'Filip', '', '', 'Dohnal', '+420735533512', 'ecbc5ab259503070ff7ba2cf5b9a9f0d', 'ecbc5ab259503070ff7ba2cf5b9a9f0d', 'dohnalfilip@email.cz', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite food as a child?', 0, 'Martin', 'What is your spouse or partner\'s mother\'s maiden name?', 0, 'Novak', 'Czech Republic', 'Czech Republic', 'user', 1520233099, 0, '', 0),
(125, 'pVoM2Sr1mwh1', 'Bhushan', '', 'modern i Infotech', 'Mahajan', '+911234567899', 'e2c71f9c5cbc6661830a374e2b5df1d9', 'e2c71f9c5cbc6661830a374e2b5df1d9', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'nasik', 'What is your favorite color?', 0, 'red', 'India', 'India', 'user', 1520244381, 0, '', 0),
(126, 'uxXFLkkJ94gk', 'Muhammad', 'Islam', '', 'Saleh', '+79611094607', 'dfb1a9db559ab795d48e580148f5b285', 'dfb1a9db559ab795d48e580148f5b285', 'smuhammed350@yahoo.com ', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'iman', 'What is your favorite color?', 0, 'red', 'Kazakhstan', 'Kazakhstan', 'user', 1520260566, 0, '', 0),
(127, 'J6ZEgrgdiOXh', 'Ahmed', '', '', 'Shalabi', '+2001027125512', '18949c4d374007bf4a79b86e6a3217ce', '18949c4d374007bf4a79b86e6a3217ce', 'ahmed_ashrf3@yahoo.com', '', 'img/ProfilePic/default-profile1.jpg', 'What were the last four digits of your childhood telephone number?', 0, '4560', 'What\'s your pet\'s name?', 1, 'ahmedgad3000', 'Egypt', 'Egypt', 'user', 1520268093, 0, '', 0),
(128, 'Ddy8VMyfpqU5', 'Test 2', '', '', 'Test 3', '+637698032758', '325a2cc052914ceeb8c19016c091d2ac', '325a2cc052914ceeb8c19016c091d2ac', 'gjfffyvgvgcfcfcgfvgccfgcf@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite food as a child?', 0, 'Abcd1234', 'When is your anniversary?', 0, 'Abcd1234', 'Philippines', 'Philippines', 'user', 1520324501, 0, '', 0),
(129, 'kYgkCCEHICCA', 'Christine', '', '', 'Loy', '+60163653836', '4c32680945bf652392d72fc3f1f94042', '4c32680945bf652392d72fc3f1f94042', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'SJK(C) KIM SEN', 'When is your anniversary?', 0, '1-11-2017', 'Malaysia', 'Malaysia', 'user', 1520342677, 0, '', 0),
(130, 'iG4u82Gn5fgO', 'Ilona', '', 'Adecco', 'Kocheva', '+79877195190', '3c78af2e2b11c2d4f4349ed801a04e2d', '3c78af2e2b11c2d4f4349ed801a04e2d', 'yailzik2@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city did you meet your spouse/partner?', 0, 'qjirfh jkf', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'afhfajyjdf', 'Kazakhstan', 'Kazakhstan', 'user', 1520343340, 0, '', 0),
(131, 'XdWkFeDD9oG9', 'Michela', 'Solange', '', 'Baiguini', '+3933840890204', '88484338058028d61a3cce947e40339d', '88484338058028d61a3cce947e40339d', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'Atalanta', 'What is your favorite color?', 0, 'verde', 'Italy', 'Italy', 'user', 1520347728, 0, '', 0),
(132, 'd99O1ZFQT9lX', 'Nourhan', '', '', 'Batran', '+201006247305', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', 'nourbatran0@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'abcd1234', 'When is your anniversary?', 0, 'abcd1234', 'Egypt', 'Egypt', 'user', 1520364042, 0, '', 0),
(133, 's9ykYLqFkPms', 'Angelica', '', '', 'Cordova', '+50231023480', 'a4bf806cc82066100cd474bdb4e0d9fe', 'a4bf806cc82066100cd474bdb4e0d9fe', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city did you meet your spouse/partner?', 0, 'Tegucigalpa', 'What was the name of the hospital where you were born?', 0, 'San Rafael', 'Guatemala', 'Guatemala', 'user', 1520369992, 0, '', 0),
(134, 'assaITjQm0Zk', 'Michela', '', '', 'Baiguini', '+393384089204', '88484338058028d61a3cce947e40339d', '88484338058028d61a3cce947e40339d', 'traduzioni.baiguini@libero.it', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'Atalanta', 'What is your favorite color?', 0, 'Verde', 'Italy', 'Italy', 'user', 1520396777, 0, '', 0),
(135, 'NiRmFkvzSPFg', 'Ismail', '', '', 'Hussein', '+9647809693189', 'fb8649d2ac29128ea128c0446e8489df', 'fb8649d2ac29128ea128c0446e8489df', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'real', 'When is your anniversary?', 0, 'real1', 'Iraq', 'Iraq', 'user', 1520425617, 0, '', 0),
(136, 'K6NjWAotFrYo', 'IRINA', '', '', 'BELOTTI', '+543512655190', '74bbd39faf0b6439beca36d159cd44b0', '74bbd39faf0b6439beca36d159cd44b0', 'irinabelotti@hotmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'san jose', 'What is yours first pet\'s name?', 1, 'nanga', 'Argentina', 'Argentina', 'user', 1520436084, 0, '', 0),
(137, 'LS8ysWXk99Gu', 'Ricardo', 'Guerini', 'Quartier Engenharia', 'Lemos', '+5527999086951', '271237738d67e42d0ff56066e1e6d429', '271237738d67e42d0ff56066e1e6d429', 'ricardo_rgl@hotmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'Vasco', 'What was the name of the hospital where you were born?', 0, 'rio doce', 'Brazil', 'Brazil', 'user', 1520443873, 0, '', 0),
(138, 'Zw4umOGUTVbn', 'Alina', '', '', 'Tsipak', '+48795036174', '8278233a21c0d763d4bdc4c1e83221e1', '8278233a21c0d763d4bdc4c1e83221e1', 'alina_tsipak@yahoo.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'Lublin', 'What is your favorite color?', 0, 'Pink', 'Poland', 'Poland', 'user', 1520504365, 0, '', 0),
(139, 'cE9BDULB9pjP', 'Frederik', '', '', 'Holm', '+455978237094', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', 'janes5981@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, 'abcd1234', 'Who is your childhood sports hero?', 0, 'abcd1234', 'Denmark', 'Denmark', 'user', 1520564775, 0, '', 0),
(140, 'S4neg1aV3AZ8', 'g', '', '', 'j', '+2497690862396', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', 'fggvghvgvgvg@google.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city did you meet your spouse/partner?', 0, 'abcd1234', 'In what town or city did your mother and father meet?', 0, 'abcd1234', 'Sudan', 'Sudan', 'user', 1520577650, 0, '', 0),
(141, 'ZBYXJndCsKFg', 'Iuliia', '', '', 'Tapkharova', '+380672846865', '016a14493b38f777252ed3ad87ca8739', '016a14493b38f777252ed3ad87ca8739', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what city or town does your nearest sibling live?', 0, 'Kiev', 'What is your favorite color?', 0, 'Green', 'Ukraine', 'Ukraine', 'user', 1520589919, 0, '', 0),
(142, 'e2P9wjQmg4CL', 'John', '', '', 'Doe', '+483860952184', 'c34a33a1eee3a0ff7afcfe03f088bddd', 'c34a33a1eee3a0ff7afcfe03f088bddd', 'test@reojen.com', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite food as a child?', 0, 'Account123', 'What was the name of the hospital where you were born?', 0, 'Account123', 'Poland', 'Poland', 'user', 1520601071, 0, '', 0),
(143, '0KNWsudhL2XI', 'Fir', '', '', 'Lst', '+2627460921864', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', 'gjgjgjhgvnbvbbb@reojen.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'h', '', 1, 'b', 'Mayotte', 'Mayotte', 'user', 1520675801, 0, '', 0),
(144, 'keSMnKAsEpmu', 'LIM', '', '', 'SIEW LUAN', '+60107963228', '5aad1eac7c0ca1a7ad7fb42e7e123037', '5aad1eac7c0ca1a7ad7fb42e7e123037', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1958', 'In what town or city did your mother and father meet?', 0, 'kelantan', 'Malaysia', 'Malaysia', 'user', 1520828002, 0, '', 0),
(145, 'ouHvH19Tvyxe', 'Kishor', 'Kumar', '', 'Yadav', '+919560759400', 'd0780a30a45456729304d1ade71dc57b', 'd0780a30a45456729304d1ade71dc57b', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '39C', 'What is your spouse or partner\'s mother\'s maiden name?', 0, 'Test', 'India', 'India', 'user', 1534249195, 0, '', 0),
(146, 'b7IQHMUVJLmh', 'hjgjhy', '', '', 'jufhhh', '+3748745687795', '99e2211ea260dc27795824326c11f723', '99e2211ea260dc27795824326c11f723', 'jgfdgfgfgh57686767@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'jgfyhfrtr53757', 'What is your oldest cousin\'s first and last name?', 0, 'jgfyhfrtr53757', 'Armenia', 'Armenia', 'user', 1534296658, 0, '', 0),
(147, 'YCO6tmy4ruRK', 'Pradeep', 'Kumar', 'Tactiuon', 'Singh', '+919911640697', 'ad663d2afbd0b860e24ff77886daf16b', 'ad663d2afbd0b860e24ff77886daf16b', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'India', 'What is your favorite color?', 0, 'blue', 'India', 'India', 'user', 1534387893, 0, '', 0),
(148, 'dpoZW1V7P6yd', 'Kaan', 'Ziya', '', 'Torun', '+905419781714', 'eb530bfecdda11acdf92c38b85333711', 'eb530bfecdda11acdf92c38b85333711', 'kaanziyatorun@hotmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1971', 'What is your favorite color?', 0, 'black', 'Turkey', 'Turkey', 'user', 1534409220, 0, '', 0),
(149, 'g0Od124Jbjpa', 'Chris', '', 'Chris Wagenaar Vertaling', 'Wagenaar', '+31637580238', '7e8ac80f06954e195e6b6fa2d806eac6', '7e8ac80f06954e195e6b6fa2d806eac6', 'ccj.wagenaar@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'Basisschool zonder hoofdletters of voorzetsels', 1, 'caegh', 'What was the name of the company where you had your first job?', 0, 'lisette', 'Netherlands', 'Netherlands', 'user', 1534411985, 0, '', 0),
(150, 'qNACJGai0vT6', 'Angel', 'Perez Rosado', 'Angel Luis Perez Translation Services, Inc.', 'Perez Rosado', '+17875476404', '0520927ad596f57d8b6453499947c730', '0520927ad596f57d8b6453499947c730', 'christsaved@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'Yankees', 'What are the last five digits of your driver\'s licence number?', 0, '30254', 'Puerto Rico', 'Puerto Rico', 'user', 1534416860, 0, '', 0),
(154, 'DRYRUglJYxlQ', 'Kristina', '', '', 'Kolessova', '+37256696598', 'f2990030d59c5a08fbc792d50c7138ea', 'f2990030d59c5a08fbc792d50c7138ea', 'christinaest@icloud.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'Tartu', 'What is your favorite color?', 0, 'Yellow', 'Estonia', 'Estonia', 'user', 1534421015, 0, '', 0),
(155, 'dMuiqrAosnOf', 'Manuela', 'Amaro', '', 'DionÃ­sio', '+351968851854', 'ed1d43a9636ea6abe556ca218214a428', 'ed1d43a9636ea6abe556ca218214a428', 'manuela_dionÃ­sio@live.com.pt', '', 'img/ProfilePic/default-profile1.jpg', 'My dog\'s name', 1, 'Fluke', 'My other dog\'s name', 1, 'Hopi', 'Portugal', 'Portugal', 'user', 1534422777, 0, '', 0),
(156, 'vuV1Ul2tgXxK', 'Vlada', '', '', 'Urmanova', '+380731580621', '3ccf3680d0d09f65a68e363a84f029a1', '3ccf3680d0d09f65a68e363a84f029a1', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city did you meet your spouse/partner?', 0, 'Kyiv', 'In what town or city did your mother and father meet?', 0, 'Ufa', 'Ukraine', 'Ukraine', 'user', 1534428772, 0, '', 0);
INSERT INTO `users` (`user_id`, `reference_number`, `fname`, `mname`, `CompanyName`, `lname`, `mobile_no`, `password`, `c_password`, `Email`, `Address`, `Profile_pic`, `SecurituyQuestion1`, `custom_question1`, `Answer1`, `SecurityQuestion2`, `custom_question2`, `Answer2`, `Country`, `country_res`, `user_type`, `date_of_creation`, `enable_paypal`, `pass_resetkey`, `enable_advcash`) VALUES
(157, 'HCZX4i8ZGT7M', 'Claudia', '', '', 'Colindres', '+50378156182', '3986c79ef76d686cc20ba39c6e2c8363', '3986c79ef76d686cc20ba39c6e2c8363', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'barsa', 'What is your favorite color?', 0, 'green', 'El Salvador', 'El Salvador', 'user', 1534429970, 0, '', 0),
(158, 'kUXqPXnYSGos', 'Victor', '', '', 'Cortez', '+50588837338', 'ce70982538f1da97a9fa776fa8c1ebe2', 'ce70982538f1da97a9fa776fa8c1ebe2', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is the name of your first pet?', 1, 'Zuca', 'What is the middle name of your oldest child?', 0, 'Stephania', 'Nicaragua', 'Nicaragua', 'user', 1534438289, 0, '', 0),
(159, 'OzZbiAMYk4vT', 'Zuzanna', '', '', 'Stogowska', '+529841792292', 'e342af11b6b81d12e4df00c95891ce02', 'e342af11b6b81d12e4df00c95891ce02', 'zuzanna.stogowska@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'WaÅ‚brzyska 55/1', 'What is your spouse or partner\'s mother\'s maiden name?', 0, 'Guillermo', 'Mexico', 'Mexico', 'user', 1534438731, 0, '', 0),
(160, 'SRiNw7WqgeaC', 'Jennifer', '', 'Richmond Translation', 'Richmond', '+4793969792', '250dcd0f1b8392fb76c2bebc7f142e09', '250dcd0f1b8392fb76c2bebc7f142e09', 'Jennifer@richmond-translation.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1944', 'In what town or city did your mother and father meet?', 0, 'Hameln', 'Norway', 'Norway', 'user', 1534449685, 0, '', 0),
(161, 'RJItl1qDAswp', 'Richard', 'Eric', '', 'Coldham', '+33758597801', 'e076fe201ae9eaad3f32b5aaacff1a4e', 'e076fe201ae9eaad3f32b5aaacff1a4e', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city did you meet your spouse/partner?', 0, 'Eilat', 'What was the make and model of your first car?', 0, 'Ford Escort', 'France', 'France', 'user', 1534475934, 0, '', 0),
(162, '3oTRnlbq3Upq', 'Anton', '', '', 'Kaptelov', '+79022552126', '4bdcc55f4afd8a336fc9292415c7dee0', '4bdcc55f4afd8a336fc9292415c7dee0', 'sakches@mail.ru', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '15a Shefskaya', 'What is your favorite color?', 0, 'black', 'Kazakhstan', 'Kazakhstan', 'user', 1534490274, 0, '', 0),
(163, '1qlTFzThuquW', 'Andrea', '', '', 'Agrillo', '+393477423818', '8c4454da760d68027d442612080dd696', '8c4454da760d68027d442612080dd696', 'agrilloandre@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'Roma', 'When is your anniversary?', 0, 'Ottobre', 'Italy', 'Italy', 'user', 1534496765, 0, '', 0),
(164, 'VxFvm78wqzF3', 'Exel', '', '', 'Miron', '+40749805733', '3bb7f9b4472d2021e9a084966613cbb2', '3bb7f9b4472d2021e9a084966613cbb2', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '1111', 'What is the middle name of your oldest child?', 0, 'Mircea', 'Romania', 'Romania', 'user', 1534502108, 0, '', 0),
(165, 'clqrayDLIzlZ', 'g', '', '', 'j', '+2667438021683', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', 'trdgdf577864@mailinator.com', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite food as a child?', 0, 'abcd1234', 'What was the name of the hospital where you were born?', 0, 'abcd1234', 'Lesotho', 'Lesotho', 'user', 1534565330, 0, '', 0),
(166, 'g2ANIVQHH8Ft', 'Emre', '', '', 'Sezgin', '+359893665601', 'f042bc2ac2f947fc590f6b7edba7d081', 'f042bc2ac2f947fc590f6b7edba7d081', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1952', 'What is the middle name of your oldest child?', 0, 'deniz', 'Bulgaria', 'Bulgaria', 'user', 1534578880, 0, '', 0),
(167, 'kTO9kvDZyV1z', 'Katarzyna', '', 'Lionbridge', 'Kurzawska', '+48734727309', 'f8e27334c9d3bc8fa00c8c4c37e4000d', 'f8e27334c9d3bc8fa00c8c4c37e4000d', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'Boston Red Sox', 'What is your favorite color?', 0, 'white', 'Poland', 'Poland', 'user', 1534591221, 0, '', 0),
(168, 'stE6KphKVhow', 'Johan', 'Manuel', '', 'Cucias', '+584121503041', 'f4c71e93acda1fdb5e83f6c160146036', 'f4c71e93acda1fdb5e83f6c160146036', 'johanx96@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Yacambu', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Ana', 'Venezuela', 'Venezuela', 'user', 1534615199, 0, '', 0),
(169, 'aS58nxQShnh3', 'Agustina', '', 'Lionbridge', 'Salguero', '+5493364298243', 'cf488c6b05c2e34b67e99d612c9b586c', 'cf488c6b05c2e34b67e99d612c9b586c', 'agus_salguero@hotmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'Argentina', 'What is your favorite color?', 0, 'Green', 'Argentina', 'Argentina', 'user', 1534629149, 0, '', 0),
(170, 'QVUcS3JrMlP5', 'Sergio', 'Antonio', 'Elance', 'Tinoco', '+50581142345', '537ebde7fa23f4ede710fa7b2b050414', '537ebde7fa23f4ede710fa7b2b050414', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'barcelona', 'nombre de mi perro', 1, 'danger', 'Nicaragua', 'Nicaragua', 'user', 1534640795, 0, '', 0),
(171, 'SFk0MDUAtxFc', 'Annemoone', '', '', 'Duong Woanya', '+233543071359', '31e7a1e503408ffbaeddef6579a076ba', '31e7a1e503408ffbaeddef6579a076ba', 'brown.ness@ymail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1933', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Hoff', 'Ghana', 'Ghana', 'user', 1534691014, 0, '', 0),
(172, 'pNi10EbGJpUj', 'Liviu', '', '', 'RÄƒican', '+40744958313', 'bb4e90a7639add09cf8629499638760c', 'bb4e90a7639add09cf8629499638760c', 'liviu.raican@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What were the last four digits of your childhood telephone number?', 0, '6268', 'What was the make and model of your first car?', 0, 'ford focus', 'Romania', 'Romania', 'user', 1534701668, 0, '', 0),
(173, 'CSYsFJfJVNis', 'Mathilde', '', '', 'Postel', '+81740221486', '75777307b956ad3e6ea7cd264913b96d', '75777307b956ad3e6ea7cd264913b96d', 'mpostel.trad@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'San Francisco', 'What was the name of the company where you had your first job?', 0, 'WDHB', 'Japan', 'Japan', 'user', 1534716403, 0, '', 0),
(174, '6icGYrUcjtlO', 'Mathilde', '', '', 'Postel', '+817040221486', '6169705aa53fff9a1f84483aa3d25e56', '6169705aa53fff9a1f84483aa3d25e56', 'mpostel.trad@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'San Francisco', 'What was the name of the company where you had your first job?', 0, 'WDHB', 'Japan', 'Japan', 'user', 1534731463, 0, '', 0),
(175, 'JEhdszDJ9ngD', 'Olga', '', '', 'Gorval', '+79807051233', '4c24466855f74bf243d8c9d82dcbe6fc', '4c24466855f74bf243d8c9d82dcbe6fc', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite food as a child?', 0, 'potatoes', 'What is your favorite color?', 0, 'green', 'Kazakhstan', 'Kazakhstan', 'user', 1534789645, 0, '', 0),
(176, 'lnWQWUbKgVoA', 'Daniel', '', '', 'Melchert', '+51959744921', 'd13eed29025175d6e73b3db035918079', 'd13eed29025175d6e73b3db035918079', 'Baltox222@gmail.con', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'Real madrid', 'Name of best male friend', 1, 'David', 'Peru', 'Peru', 'user', 1534833648, 0, '', 0),
(177, 'pHTNLrnlGCLB', 'Lujan', '', '', 'Fernandez', '+34608575505', 'd4364fc605de2a17c4d513903bf5111c', 'd4364fc605de2a17c4d513903bf5111c', 'lujan.fernandez@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1949', 'In what town or city did your mother and father meet?', 0, 'Argovejo', 'Spain', 'Spain', 'user', 1534940587, 0, '', 0),
(178, 'PL6nlaWVXNZu', 'Pradeep', 'Kumar', 'Taction', 'Singh', '+919988998877', '5806325fbf4c1e879891a4f48237b9b9', '5806325fbf4c1e879891a4f48237b9b9', 'pradeep@tactionsoftware.com', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'india', 'What was the make and model of your first car?', 0, 'maruti800', 'India', 'India', 'user', 1535944364, 0, '', 0),
(179, 'wFTBgQZezEkO', 'amit', '', '', 'gupta', '+911234567891', '5f140fd5234e21de5a90ba0829905e2e', '5f140fd5234e21de5a90ba0829905e2e', 'amit.gupt@tactionsoftware.com', '', 'img/ProfilePic/default-profile1.jpg', 'sasa', 1, '1', 'What is your spouse or partner\'s mother\'s maiden name?', 0, '2', 'India', 'India', 'user', 1536718704, 0, '25d15cc33dbe7352e5f7ae0d3c772fa6', 1),
(180, '6hLwT04o6NHu', 'Taction', 'K', 'Taction software Pvt Ltd', 'QA', '+919873036986', 'b1a6f5b65999a9772281d1e7767f86f8', 'b1a6f5b65999a9772281d1e7767f86f8', 'kundan@tactionsoftware.com', '', 'img/ProfilePic/default-profile1.jpg', 'What is the name of you first ex?', 1, 'Shikha', 'What are the last five digits of your driver\'s licence number?', 0, '12345', 'India', 'India', 'user', 1536836326, 0, '70be3f3c180f880ca9c96df570f0dc55', 0),
(181, 'zB0q1NH70wCe', 'jgjh', '', '', 'hfhy', '+6725489', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, 'abcd1234', 'When is your anniversary?', 0, 'abcd1234', 'Antarctica', 'Antarctica', 'user', 1536845509, 0, '', 0),
(182, '740Wj26NtODr', 'amit', '', '', 'gupta', '+911234567892', '8e4a0c8f9892b22c0f183d7cdfb56c3e', '8e4a0c8f9892b22c0f183d7cdfb56c3e', '', '', 'img/ProfilePic/default-profile1.jpg', 'What were the last four digits of your childhood telephone number?', 0, '1', 'What are the last five digits of your driver\'s licence number?', 0, '2', 'India', 'India', 'user', 1536920231, 0, '', 0),
(183, '2k6oSynWI74M', 'karen', 'solis', '', 'cabalonga', '+639165384855', 'cd1f10c70c069f9946f8852606c001fc', 'cd1f10c70c069f9946f8852606c001fc', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city did you meet your spouse/partner?', 0, 'davao', 'What is your favorite color?', 0, 'red', 'Philippines', 'Philippines', 'user', 1536922157, 0, '', 0),
(184, '8FOneAuf6RY3', 'Laura', '', '', 'Santoro', '+201227513024', 'a48c3c0e13ead4180fc52a43948e8813', 'a48c3c0e13ead4180fc52a43948e8813', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was your favorite food as a child?', 0, 'pizza', 'What is the middle name of your oldest child?', 0, 'rayan', 'Egypt', 'Egypt', 'user', 1537091303, 0, '', 0),
(185, 'tQQpTOVx0xsR', 'Jixiang', '', '', 'Ma', '+8613853174045', '8886ea9f73f859570e63683aba12caa7', '8886ea9f73f859570e63683aba12caa7', '243911867@qq.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1947', 'What is your favorite color?', 0, 'green', 'China', 'China', 'user', 1537149782, 0, '', 0),
(186, 'Y2wKf40iHTuP', 'amit', '', '', 'verma', '+911234567893', '8e4a0c8f9892b22c0f183d7cdfb56c3e', '8e4a0c8f9892b22c0f183d7cdfb56c3e', '', '', 'img/ProfilePic/default-profile1.jpg', 'a', 1, '1', 'b', 1, '2', 'India', 'India', 'user', 1537153816, 0, '', 0),
(187, '1CJMvFhYr82h', 'Kundan', 'k', 'Taction Quality center', 'Jha', '+918236027238', 'aede41cc06a09700a9b29e767d77804b', 'aede41cc06a09700a9b29e767d77804b', 'kundan@tactionsoftware.com', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Dumra', 'What is your favorite color?', 0, 'Black', 'India', 'India', 'user', 1537175423, 0, '9e4f7f18b588d772b1240c305bf48873', 1),
(188, 'O9WbLMEMjO6j', 'Test', '', '', 'Account', '+442659721874', '2c9341ca4cf3d87b9e4eb905d6a3ec45', '2c9341ca4cf3d87b9e4eb905d6a3ec45', '', '', 'img/ProfilePic/default-profile1.jpg', 'In what city or town does your nearest sibling live?', 0, 'Test1234', 'Who is your childhood sports hero?', 0, 'Test1234', 'United Kingdom', 'United Kingdom', 'user', 1537264427, 0, '', 0),
(189, 'Kxf6Mri1eWKR', 'Francesco', '', '', 'Di Martino Comaschi', '+393386771840', 'da32f310d3f67fd518f9b279dc05d04d', 'da32f310d3f67fd518f9b279dc05d04d', 'francescodimartinocomaschi@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'Juventus', 'What is your favorite color?', 0, 'green', 'Italy', 'Italy', 'user', 1537273716, 0, '9c397345ded30e3d345c273840d9b4b4', 0),
(190, 'xrcGf1nuLOBZ', 'Daniel', '', '', 'Manuel', '+34685465007', 'e4c321a88e0c4057c6ac4ec23988d31b', 'e4c321a88e0c4057c6ac4ec23988d31b', 'danimanbox@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Maria Moliner', 'What is your favorite color?', 0, 'Orange', 'Spain', 'Spain', 'user', 1537301188, 0, '', 0),
(191, 'vVLQvEbJrdNA', 'Teddy', '', 'Lionbridge', 'Wong', '+60167316063', 'e28d413530f0e5d7b903cdaee08cbe07', 'e28d413530f0e5d7b903cdaee08cbe07', 'thextr09@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1970', 'The best car with a VTEC', 1, 'Civic', 'Malaysia', 'Malaysia', 'user', 1537323032, 0, '', 0),
(192, 'GPxh9zAMoWwi', 'Lilian', '', 'Lionbridge', 'Jordy', '+33785653666', '29779e0df6f89c46331738e64e325d8b', '29779e0df6f89c46331738e64e325d8b', 'lyli.jordy@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1958', 'In what town or city did your mother and father meet?', 0, 'nagasaki', 'France', 'France', 'user', 1537336133, 0, '', 0),
(193, 'OHfg2TlALHwo', 'Yousouf', '', '', 'Nuckcheddy', '+23058290500', '8c99dfccbf3e7b9fef11ffbf23232354', '8c99dfccbf3e7b9fef11ffbf23232354', 'yousouf_nuckcheddy@yahoo.com', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Mesnil', 'What is your favorite color?', 0, 'Blue', 'Mauritius', 'Mauritius', 'user', 1537336756, 0, '', 0),
(194, 'P0EYEktlz8ZX', 'Alessio', '', '', 'Franceschi', '+393925072662', '4b06bb42d3c8d2ec2208da65ff88a30d', '4b06bb42d3c8d2ec2208da65ff88a30d', 'alessiofranceschi2@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '17', 'What was the name of the hospital where you were born?', 0, 'Desio', 'Italy', 'Italy', 'user', 1537340821, 0, '', 0),
(195, '1oIXyMRuvjgJ', 'debora', '', 'Lionbridge', 'F.', '+5491156584939', 'f0556d746f657925a6d64d8c4854c10d', 'f0556d746f657925a6d64d8c4854c10d', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'normal4', 'What is your favorite color?', 0, 'azul', 'Argentina', 'Argentina', 'user', 1537369781, 0, '', 0),
(196, 'JGPnzTfuwz2T', 'Jessica', '', '', 'BARBAGALLO', '+393248234042', '42069942585291b2b11ed7221ad43d9e', '42069942585291b2b11ed7221ad43d9e', 'jessicabarbagallo@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'Firenze', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Custodero', 'Italy', 'Italy', 'user', 1537370255, 0, '', 0),
(197, 'UpkpXiDUzJcL', 'Miracle', 'Marcus', '', 'Ibrahim', '+2348102619891', 'ccc4ab99ff5a0a7eec7aac50540f5f94', 'ccc4ab99ff5a0a7eec7aac50540f5f94', 'datbajjubwoi@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Dadin kowa primary school', 'In what town or city did your mother and father meet?', 0, 'Zonkwa', 'Nigeria', 'Nigeria', 'user', 1537391134, 0, '', 0),
(198, 'f50robZrdNz2', 'AmÃ©lia', 'Rita', '', 'Monteiro', '+351963642483', '1cac6bfafa45122704dab7eeb0c678aa', '1cac6bfafa45122704dab7eeb0c678aa', '', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '14188012', 'When is your anniversary?', 0, '242441513', 'Portugal', 'Portugal', 'user', 1537423621, 0, '', 0),
(199, 'mpbaDQylCeCT', 'Serena', '', '', 'Murh', '+971589383400', '5260d5243f48331c307787c2a0daf83d', '5260d5243f48331c307787c2a0daf83d', 'serenamurh@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what city or town does your nearest sibling live?', 0, 'B4o1^4Wjg', 'What was the name of the company where you had your first job?', 0, 'B4o1^4Wjg', 'United Arab Emirates', 'United Arab Emirates', 'user', 1537512129, 0, '280b79d1db2727dbf66300b5dbf38639', 0),
(200, 'igVM46yI88Bi', 'Joint', '', '', 'Smiyh', '+43634094721', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', '', '', 'img/ProfilePic/default-profile1.jpg', 'What is the name of your favorite childhood friend?', 0, 'abcd1234', 'When is your anniversary?', 0, 'abcd1234', 'Austria', 'Austria', 'user', 1537517279, 0, '', 0),
(201, '3bUcmRKyv9fA', 'Giada', '', '', 'Peano', '+393429241263', '7111e7a053931a3e56e0810656a980b0', '7111e7a053931a3e56e0810656a980b0', 'giada.luna@virgilio.it', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'Inter', 'What is your favorite color?', 0, 'Azzurro', 'Italy', 'Italy', 'user', 1537541387, 0, '', 0),
(202, 'dtet2zDb19pb', 'tiziano', '', '', 'rosano', '+393933591016', '4f2a69c00c368485fd2be92f609ef864', '4f2a69c00c368485fd2be92f609ef864', 'ilrisolutore93@yahoo.it', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'inter', 'What\'s the name of your favourite uncle?', 1, 'massimo', 'Italy', 'Italy', 'user', 1537599287, 0, '', 0),
(203, 'cob3elFzrHPA', 'Mariangel', '', '', 'Torres', '+584245325898', 'bd708713a32903b534168a2bd12b66a7', 'bd708713a32903b534168a2bd12b66a7', 'mariangeltsilva@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what city or town does your nearest sibling live?', 0, 'Sanare', 'What is your favorite color?', 0, 'Blue', 'Venezuela', 'Venezuela', 'user', 1537633388, 0, '', 0),
(204, 's4gEtX3R7nud', 'Mariela', '', '', 'Pascuzzo', '+5491160948291', 'c5158320b6658a585cbe5a69d00fa72d', 'c5158320b6658a585cbe5a69d00fa72d', 'pascuzzomariela@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'A del Valle 2553', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Turucki', 'Argentina', 'Argentina', 'user', 1537640600, 1, '', 0),
(205, 'ShniQ1MV0AvC', 'Rocky', '', '', 'Jin', '+8615201863587', 'ef56862c884849a31c5f1978121fbb56', 'ef56862c884849a31c5f1978121fbb56', '15201863587@163.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1973', 'My father\'s name', 1, 'é³æœ‰çº¢', 'China', 'China', 'user', 1537674440, 0, '', 0),
(206, '983cjHEsNNDr', 'Ana', 'Catarina Costa', '', 'Resende', '+351916935224', '36f9dff78c1495a79f9e7c909c0ada14', '36f9dff78c1495a79f9e7c909c0ada14', 'catarina_costa01@hotmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '81', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Carminda', 'Portugal', 'Portugal', 'user', 1537688058, 0, '', 0),
(207, 'ZQdvrGSY9ZPk', 'Bharat Yadav', 'Bharat', '', 'Yadav', '+919911076888', 'de9af700ba609abfbdaa17e010c37712', 'de9af700ba609abfbdaa17e010c37712', 'bharatyadav.1984@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'delhi', 'What is the middle name of your oldest child?', 0, 'yadav', 'India', 'India', 'user', 1537712652, 0, '', 0),
(208, '0Z2TTnaFPI1Q', 'LuÃ­sa', '', '', 'Pires', '+351938210334', '5123094b7628c3def3ae657196fece5f', '5123094b7628c3def3ae657196fece5f', 'luisap36@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'GlÃ³ria', 'When is your anniversary?', 0, '10 january', 'Portugal', 'Portugal', 'user', 1537720178, 0, '', 0),
(209, 'XRp3sJsJmoAt', 'Giorgia', '', '', 'Giovannini', '+393292725679', '2e3828c9d6b3e2eb2b9f876fe8285ced', '2e3828c9d6b3e2eb2b9f876fe8285ced', 'g.giorgia@live.com', '', 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'Always italian team', 'why two?', 1, 'Don\'t know, boh!', 'Italy', 'Italy', 'user', 1537730122, 0, '', 0),
(210, 'gmA1wjYpLbO2', 'akshit', '', '', 'gupta', '+911234567894', '8e4a0c8f9892b22c0f183d7cdfb56c3e', '8e4a0c8f9892b22c0f183d7cdfb56c3e', 'akshit@gmail.com', '', 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, '1', 'What are the last five digits of your driver\'s licence number?', 0, '2', 'India', 'India', 'user', 1537763234, 0, '', 0),
(211, 'LTuCTI69cUdI', 'sas', '', '', 'sas', '+911234567897', '781dd637911710fa091ad1387501d4aa', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 'img/ProfilePic/default-profile1.jpg', 'Select question', 0, '', 'Select question', 0, '', 'India', 'India', 'user', 1537770675, 0, '', 0),
(212, 'mqhLFFoiEWk9', 'kundan', 'kumar', 'QA', 'jha', '+919125863394', 'aede41cc06a09700a9b29e767d77804b', 'aede41cc06a09700a9b29e767d77804b', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'cvv', 'What was the make and model of your first car?', 0, 'vcc', 'India', 'India', 'user', 1537780500, 1, '', 0),
(213, 'oSLdotQY16jS', 'Rafael', '', '', 'GÃ³mez', '+34659939429', 'df586af9a343e0acbd87b4c0e6e914e3', 'df586af9a343e0acbd87b4c0e6e914e3', '', '', 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'TRINITARIAS', 'What is your favorite color?', 0, 'VERDE', 'Spain', 'Spain', 'user', 1537790309, 0, '', 0),
(214, 'DWCjMou9FTbK', 'Laura', '', '', 'Gonzales', '+48667444123', '42f287b3b623095278f5a2d20109325b', '42f287b3b623095278f5a2d20109325b', 'bulici@o2.pl', '', 'img/ProfilePic/default-profile1.jpg', 'In what town or city did you meet your spouse/partner?', 0, 'Czestochowa', 'When is your anniversary?', 0, 'April', 'Poland', 'Poland', 'user', 1538055550, 0, '', 0),
(215, 'uzwniG8OOM7i', 'Rafael', '', 'LIONBRIDGE TECHNOLOGIES, INC.', 'Quirino', '+5521979259097', '9063f965de0ff875abceae8eacc6d4a3', '9063f965de0ff875abceae8eacc6d4a3', 'rafaelqaraujo@yahoo.com.br', '', 'img/ProfilePic/default-profile1.jpg', 'O que hÃ¡ no quadro logo acima do seu monitor/tambÃ©m nome do seu supermercado preferido (escreva o nome em inglÃªs, letras minÃºsculas)', 1, 'bread loaf', 'Complete a frase (letras minÃºsculas): cachorreta __________', 1, 'carolina', 'Brazil', 'Brazil', 'user', 1538759918, 0, '', 0),
(216, 'Sy9RdhG7t8Ci', 'hg', 'o', 'ko', 'tr', '+2139765676678', 'e0a8aa81eb1762d529783cf587f6f422', 'e0a8aa81eb1762d529783cf587f6f422', '', NULL, 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'abcd@1234', 'What is your spouse or partner\'s mother\'s maiden name?', 0, 'abcd@1234', 'Algeria', 'Algeria', 'user', 1546648520, 0, NULL, 0),
(217, 'j7pOI5RfqCS6', 'vinay', 'chauhan', 'Example Test', 'chauhan', '+919971592741', 'e096add3993b3973ea245fa23d110701', 'e096add3993b3973ea245fa23d110701', 'vinaychauhan191@yopmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'india', 'What is your favorite color?', 0, 'red', 'India', 'India', 'user', 1546883437, 0, NULL, 0),
(218, 'UFqAkqzz6L4o', 'Simone', '', '', 'Gil Mondavi', '+595991233421', 'a5585041886c697c087ad5e183182783', 'a5585041886c697c087ad5e183182783', 'sicagimon@gmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1965', 'What is your favorite color?', 0, 'amarillo', 'Paraguay', 'Paraguay', 'user', 1546885796, 0, NULL, 0),
(219, 'lKUbsf7AqwXM', 'Anna', '', '', 'Soldenhoff', '+48607293487', '2851da2eb350995f9e3937e0943282b1', '2851da2eb350995f9e3937e0943282b1', 'asoldenhoff@wp.pl', NULL, 'img/ProfilePic/default-profile1.jpg', 'What is the name of your favorite childhood friend?', 0, 'Ania7878', 'What is your favorite color?', 0, 'blue', 'Poland', 'Poland', 'user', 1546944465, 0, NULL, 0),
(220, 'Ruj3ziVtIdxY', 'h', '', '', 'd', '+3749367103891', '689c13ef685ac0a378b9d2fc7b689e92', '689c13ef685ac0a378b9d2fc7b689e92', 'g75947@gmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'gwzclkpg45', 'What was the name of the company where you had your first job?', 0, 'gwzclkpg45', 'Armenia', 'Armenia', 'user', 1547045906, 0, NULL, 0),
(221, 'SrgFrSnfzH8n', 'h', '', '', 't', '+549275218063', '1b141a8f681c21f98d6896f331df7707', '1b141a8f681c21f98d6896f331df7707', 'vphxswhhhf53fj69@gmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 's64l4978ffjg', 'What are the last five digits of your driver\'s licence number?', 0, 's64l4978ffjg', 'Argentina', 'Argentina', 'user', 1547046114, 0, NULL, 0),
(222, 'WlvK6mQ9k2iW', 'h', '', '', 't', '+6729456219802', '5690dddfa28ae085d23518a035707282', '5690dddfa28ae085d23518a035707282', 'jlfvd55@gmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'a1234567', 'What is your favorite color?', 0, 'a1234567', 'Antarctica', 'Antarctica', 'user', 1547046453, 0, NULL, 0),
(223, 'HVzazvJBDM35', 'Cristina', 'Mihaela', 'Lionbridge', 'Botilca', '+400724341100', 'b87eee56b9230598919cce7837f3ab80', 'b87eee56b9230598919cce7837f3ab80', NULL, NULL, 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1965', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Purcaru', 'Romania', 'Romania', 'user', 1547057842, 0, NULL, 0),
(224, 'et2Ge4UUFBAr', 'lp', '', '', 'fw', '+17218260317951', '85ee745d76b11baf137b12e1eb76a183', '85ee745d76b11baf137b12e1eb76a183', 'jupvszjhplueh7845@gmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'lcz042bj74w7', 'What is your spouse or partner\'s mother\'s maiden name?', 0, 'lcz042bj74w7', 'Sint Maarten', 'Sint Maarten', 'user', 1547129590, 0, NULL, 0),
(225, 'hROgjWpPjXJp', 'Alicia', '', '', 'Lopez', '+50377370468', 'ddce1b9eb5522f99d4a1baa6691c0439', 'ddce1b9eb5522f99d4a1baa6691c0439', 'alicialopalvarez@gmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'What were the last four digits of your childhood telephone number?', 0, '2760', 'What was the name of the company where you had your first job?', 0, 'exportadora san julian', 'El Salvador', 'El Salvador', 'user', 1547145371, 0, NULL, 0),
(226, 'uypozrAv3YT7', 'Ecaterina', '', '', 'Dabija', '+37369534111', 'a350ccbb55338a4f74df7647581cd3cb', 'a350ccbb55338a4f74df7647581cd3cb', 'kate.dabija@gmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1961', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Stirbu', 'Moldova', 'Moldova', 'user', 1547186530, 0, NULL, 0),
(227, 'GBm7PFuzWsn1', 'Jean-Marc', '', '', 'Ligny', '+33650478305', 'f1ee94d8aa4fcbed144da5331ccac465', 'f1ee94d8aa4fcbed144da5331ccac465', 'jl9668@gmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1930', 'What was the make and model of your first car?', 0, 'Peugeot 404', 'France', 'France', 'user', 1547186875, 0, NULL, 0),
(228, 'Q6SHH0WHNrKx', 'Andrei', '', '', 'Matrosov', '+79101472173', '5403ee802ee448e22129a3d6be2ed404', '5403ee802ee448e22129a3d6be2ed404', 'garder.jap@gmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'First nickname', 1, 'Wunderwaffe', 'What is your favorite color?', 0, 'Blue', 'Kazakhstan', 'Kazakhstan', 'user', 1547191649, 0, NULL, 0),
(229, 'tEDuZvzcZVRj', 'Eliana', '', '', 'ifill', '+584241818012', '13194c43a753534d52bdeb4c9e6b0e03', '13194c43a753534d52bdeb4c9e6b0e03', 'ifilleli@hotmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'santa margarita', 'What was the name of the company where you had your first job?', 0, 'crea y comparte', 'Venezuela', 'Venezuela', 'user', 1547197373, 0, NULL, 0),
(230, 'BW9qxRfqEQxJ', 'Giulio', '', '', 'D\'Errico', '+447596984298', 'd983a745a0c86a3d84d8e342a2081c6c', 'd983a745a0c86a3d84d8e342a2081c6c', NULL, NULL, 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Ariberto', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Collica', 'United Kingdom', 'United Kingdom', 'user', 1547372141, 0, NULL, 0),
(231, 'Ls0FvHqEMzGp', 'ezequiel', 'ezequiel', 'reojen', 'mansilla', '+542975375878', 'aac8b00cab27876f5a749445352f27c9', 'aac8b00cab27876f5a749445352f27c9', NULL, NULL, 'img/ProfilePic/default-profile1.jpg', 'pez ?', 1, 'pez123ab', 'que pez?', 1, 'pez123ab', 'Argentina', 'Argentina', 'user', 1547372582, 0, NULL, 0),
(232, 'JX4ZsJYNoI3j', 'Andrei', '', 'Lionbridge', 'CÄƒlinoaia', '+40735152518', '19a1da79865eb789aed7d087565e3986', '19a1da79865eb789aed7d087565e3986', 'andreicalinoaia@yahoo.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, '197', 'What was the name of the hospital where you were born?', 0, 'Universitar', 'Romania', 'Romania', 'user', 1547409874, 0, NULL, 0),
(233, 'Vr1o3zgvHdRu', 'Raymer', '', '', 'Pina Perez', '+18099184734', '55e4acb746fdba7c98df07873d11a8f9', '55e4acb746fdba7c98df07873d11a8f9', 'raymer.pina@gmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'What was your favorite sport in high school?', 0, 'Swimming', 'What was the make and model of your first car?', 0, 'porsche', 'Dominican Republic', 'Dominican Republic', 'user', 1547426123, 0, NULL, 0),
(234, 'pbU5uYiyt6Vf', 'Jospeh', '', '', 'Abadoma', '+237675169188', '20d3cc2a09f6dfd6b86ce760a503fe78', '20d3cc2a09f6dfd6b86ce760a503fe78', NULL, NULL, 'img/ProfilePic/default-profile1.jpg', 'In what town or city did you meet your spouse/partner?', 0, 'Yaounde', 'In what town or city did your mother and father meet?', 0, 'Ombessa', 'Cameroon', 'Cameroon', 'user', 1547430873, 0, NULL, 0),
(235, 'o9zPDO3jXSkG', 'Liz', '', '', 'Andrade', '+447775075233', '6fb5f16221ef16f58c95110219b0ba37', '6fb5f16221ef16f58c95110219b0ba37', 'lizityping@gmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Maria Briceno', 'When is your anniversary?', 0, '23 noviembre', 'United Kingdom', 'United Kingdom', 'user', 1547531554, 0, NULL, 0),
(236, '89eoOv8e2Daj', 'Roberto', '', '', 'Sandoval', '+50587200406', '68d441513cde6f0c2d210d2c63fb4c4d', '68d441513cde6f0c2d210d2c63fb4c4d', NULL, NULL, 'img/ProfilePic/default-profile1.jpg', 'In what year was your father born?', 0, '1950', 'What is your favorite color?', 0, 'blue', 'Nicaragua', 'Nicaragua', 'user', 1548424014, 0, NULL, 0),
(237, 'eSPR0JiOYTrU', 'gu', '', '', 'ku', '+3768624076', 'e19d5cd5af0378da05f63f891c7467af', 'e19d5cd5af0378da05f63f891c7467af', NULL, NULL, 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'abcd1234', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'abcd1234', 'Andorra', 'Andorra', 'user', 1548425717, 0, NULL, 0),
(238, 'Cc02aXKXwyQ1', 'Sergio', 'A', 'Elance', 'Tinoco', '+50588786316', '131340f2b90053e5c0641a01a64be9aa', '131340f2b90053e5c0641a01a64be9aa', NULL, NULL, 'img/ProfilePic/default-profile1.jpg', 'What is your favorite team?', 0, 'barcelona', 'What is your favorite color?', 0, 'blue', 'Nicaragua', 'Nicaragua', 'user', 1548426010, 0, NULL, 0),
(239, 'hi7TqpB9lA8L', 'Maria', 'Marta', '', 'Magana', '+50377470239', '7abe2fd17274af6feb8ee9a3d1e74066', '7abe2fd17274af6feb8ee9a3d1e74066', 'mariammagana@hotmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Colegio Bautista', 'What is your grandmother\'s (on your mother\'s side) maiden name?', 0, 'Hirezi', 'El Salvador', 'El Salvador', 'user', 1548429581, 0, NULL, 0),
(240, 'bl45LC8b6ORg', 'Carlos', '', 'Listverse', 'Pardo', '+573112311288', '729b79e565c6644d20480a16cccaf3ac', '729b79e565c6644d20480a16cccaf3ac', 'nearshoredude@gmail.com', NULL, 'img/ProfilePic/default-profile1.jpg', 'What primary school did you attend?', 0, 'Santo Tomas', 'What was the name of the hospital where you were born?', 0, 'Jeep', 'Colombia', 'Colombia', 'user', 1548429687, 0, NULL, 0),
(241, '7YrzeGLBrf7l', 'Ilya', '', '', 'Egorov', '+79603136001', '1b6941701861c2905fe53195d96f8081', '1b6941701861c2905fe53195d96f8081', NULL, NULL, 'img/ProfilePic/default-profile1.jpg', 'In what town or city was your first full time job?', 0, 'Cheboksary ', 'What was the name of the company where you had your first job?', 0, 'Smak', 'Kazakhstan', 'Kazakhstan', 'user', 1548508265, 0, NULL, 0),
(242, '2fTQBznt4EhO', 'Quilfort', '', 'Quilfort', 'Frederiks', '+31636178534', '33cf6fef041107251b0f7225d2345f42', '33cf6fef041107251b0f7225d2345f42', NULL, NULL, 'img/ProfilePic/default-profile1.jpg', 'What was the house number and street name you lived in as a child?', 0, 'Sikkelstraat 2', 'What is your favorite color?', 0, 'Orange', 'Netherlands', 'Netherlands', 'user', 1549013127, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `western_union_status`
--

CREATE TABLE `western_union_status` (
  `id` int(10) NOT NULL,
  `transfer_type_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `western_union_status`
--

INSERT INTO `western_union_status` (`id`, `transfer_type_id`, `status`) VALUES
(4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wire_transfer`
--

CREATE TABLE `wire_transfer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `money_request_id` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `re_currency` varchar(10) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wire_transfer`
--

INSERT INTO `wire_transfer` (`id`, `first_name`, `last_name`, `email`, `amount`, `money_request_id`, `date`, `time`, `re_currency`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Pradip', 'Mondal', 'pm3980@gmail.com', 125, 'IBR3 RDMP C691', '2017-03-17', '', 'USD', 91, '2017-03-17 12:59:01', '0000-00-00 00:00:00'),
(2, 'Sayantan', 'Sharma', 'sayantan@gmail.com', 50, 'LYJG XH61 3SA2', '2017-03-17', '', 'USD', 91, '2017-03-17 13:29:00', '0000-00-00 00:00:00'),
(3, 'amal', 'test', 'dd@f.com', 2, 'U52Q VFCI 14K3', '2017-03-17', '', 'USD', 91, '2017-03-17 13:53:59', '0000-00-00 00:00:00'),
(4, 'Pradip', 'Mondal', 'sayantan@gmail.com', 125, 'R6U2 QT70 90H4', '2017-03-17', '', 'USD', 91, '2017-03-17 14:09:31', '0000-00-00 00:00:00'),
(5, 'Pradip', 'Mondal', 'sayantan@gmail.com', 125, 'R1F7 8L29 SYT5', '2017-03-17', '', 'USD', 91, '2017-03-17 14:19:49', '0000-00-00 00:00:00'),
(6, 'f', 'l', 'fl@a.com', 450, 'X6XO 5TUE GLO6', '2017-03-19', '', 'USD', 244, '2017-03-19 08:30:35', '0000-00-00 00:00:00'),
(7, '', '', '', 0, 'WRG4 MAJN XER0', '0000-00-00', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'j', 'b', 'jb@me.me', 5564, '04LB MP7J 3RU8', '2017-04-12', '', 'eur', 54, '2017-04-12 21:03:55', '0000-00-00 00:00:00'),
(9, 'VR', 'VPN', 'vr@vpninfotech.com', 3000, 'YLBS 5JMR 12D9', '2017-09-12', '', 'USD', 91, '2017-09-12 10:41:05', '0000-00-00 00:00:00'),
(10, 'IK', 'VPN`', 'ik@vpninfotech.com', 300, 'LKU0 PFS6 3K10', '2017-09-12', '', 'USD', 91, '2017-09-12 10:55:37', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_payment_transactions`
--
ALTER TABLE `app_payment_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_currency`
--
ALTER TABLE `change_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countrycode`
--
ALTER TABLE `countrycode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_option_status`
--
ALTER TABLE `payment_option_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_address`
--
ALTER TABLE `site_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_db_download_config`
--
ALTER TABLE `site_db_download_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_types`
--
ALTER TABLE `transfer_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `western_union_status`
--
ALTER TABLE `western_union_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wire_transfer`
--
ALTER TABLE `wire_transfer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_payment_transactions`
--
ALTER TABLE `app_payment_transactions`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;
--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bankdetails`
--
ALTER TABLE `bankdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `change_currency`
--
ALTER TABLE `change_currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countrycode`
--
ALTER TABLE `countrycode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payment_option_status`
--
ALTER TABLE `payment_option_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `site_address`
--
ALTER TABLE `site_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site_db_download_config`
--
ALTER TABLE `site_db_download_config`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transfer_types`
--
ALTER TABLE `transfer_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;
--
-- AUTO_INCREMENT for table `western_union_status`
--
ALTER TABLE `western_union_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wire_transfer`
--
ALTER TABLE `wire_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
