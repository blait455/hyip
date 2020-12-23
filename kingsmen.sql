-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2020 at 02:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kingsmen`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_site`
--

CREATE TABLE `about_site` (
  `id` int(1) NOT NULL,
  `about` text NOT NULL,
  `terms` text NOT NULL,
  `privacy_policy` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_site`
--

INSERT INTO `about_site` (`id`, `about`, `terms`, `privacy_policy`, `created_at`, `updated_at`) VALUES
(1, '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\"text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humours.</p>', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\"text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humours.</p>', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\"text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humours.</p>', '2020-02-09 08:42:14', '2020-02-09 07:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$XH3iJ2/4W6l0342WIW0hheV6N635XmpGGbOx3dofQsq0TSgNtdKYO', '', '2020-02-13 14:03:56', '2020-02-13 13:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `admin_bank`
--

CREATE TABLE `admin_bank` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bank_name` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `swift` varchar(32) NOT NULL,
  `iban` varchar(32) NOT NULL,
  `acct_no` varchar(15) NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_bank`
--

INSERT INTO `admin_bank` (`id`, `name`, `bank_name`, `address`, `swift`, `iban`, `acct_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Boomchart', 'Citi bank', 'Somewhere in uk', '5444', '5678876', '12345678982', 1, '2020-02-10 15:14:07', '2020-02-10 14:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(16) NOT NULL,
  `user_id` int(16) NOT NULL,
  `trx` varchar(16) NOT NULL,
  `log` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `user_id`, `trx`, `log`, `created_at`, `updated_at`) VALUES
(1, 11, 'j7MtFMVvoMPmNUFW', 'Check how much would be earned from buying Diamond', '2020-07-04 08:55:05', '2020-07-04 08:55:05'),
(2, 11, 'vj7fjWFrUEercnh7', 'Cancelled Recurring payment for #OHWmRxAQhyEbI54S', '2020-07-04 08:56:45', '2020-07-04 08:56:45'),
(17, 11, 'h8jet1ahKMbrNSvM', 'Failed coupon check for coupon code #swdfghgf', '2020-07-04 09:24:54', '2020-07-04 09:24:54'),
(18, 11, 'r7Jq7EVFsWKsuRNE', 'Started attempt to purchase Gold', '2020-07-04 09:32:48', '2020-07-04 09:32:48'),
(21, 11, 'K01WPUqtbIBMeLlj', 'Purchased plan #Gold', '2020-07-04 09:34:01', '2020-07-04 09:34:01'),
(22, 11, 'Q07XEFK13nqJdYrB', 'Log out - ::1', '2020-07-04 09:36:07', '2020-07-04 09:36:07'),
(23, 11, 'jAYdkT5W8zkNNcAI', 'Updated account details', '2020-07-04 09:50:16', '2020-07-04 09:50:16'),
(24, 11, 'UfcuCWUEmWOX2iq3', 'Logged out - ::1', '2020-07-04 09:54:55', '2020-07-04 09:54:55'),
(25, 11, 'mvM4xAJ56NzmRzKt', 'Logged In', '2020-07-04 09:55:15', '2020-07-04 09:55:15'),
(26, 11, 'iIUQLGMvqc8RGRUZ', 'Created Funding Request of100USD via Voguepay', '2020-07-04 10:01:39', '2020-07-04 10:01:39'),
(27, 11, 'carrChyFLxruQI9T', 'Logged In', '2020-07-04 13:45:03', '2020-07-04 13:45:03'),
(28, 11, 'eAO1qZpeH95cmbs3', 'Logged out - ::1', '2020-07-04 13:48:02', '2020-07-04 13:48:02'),
(29, 34, '8xFqGrwaikIjUKHC', 'Logged In', '2020-07-04 13:49:00', '2020-07-04 13:49:00'),
(30, 34, 'tq3XC2sdHyURMRLN', 'Logged out - ::1', '2020-07-04 13:49:10', '2020-07-04 13:49:10'),
(31, 11, 'MiD42hiGHKvZMUgS', 'Logged In', '2020-07-04 13:50:41', '2020-07-04 13:50:41'),
(32, 11, 'Rd8iOY0DIlhoRer3', 'Logged out - ::1', '2020-07-04 13:51:05', '2020-07-04 13:51:05'),
(33, 34, 'Rom7xOvUcPrpBW0W', 'Logged In', '2020-07-04 13:51:26', '2020-07-04 13:51:26'),
(34, 34, 'u54lBkJz16IgLNST', 'Started attempt to purchase Gold', '2020-07-04 13:52:11', '2020-07-04 13:52:11'),
(35, 34, 'c1APhoQ2OhMIfmtJ', 'Purchased plan #Gold', '2020-07-04 13:52:13', '2020-07-04 13:52:13'),
(36, 34, 'ivZnkCZimCvz8u1x', 'Logged out - ::1', '2020-07-04 13:52:45', '2020-07-04 13:52:45'),
(37, 36, 'k136i0ubEzWpbKYc', 'Logged out - ::1', '2020-07-04 14:20:30', '2020-07-04 14:20:30'),
(38, 36, 'ghjZlmTpXDJEPs29', 'Logged In', '2020-07-04 14:20:40', '2020-07-04 14:20:40'),
(39, 36, '0AuvvdN1wivjBCGh', 'Created Funding Request of 100USD via PayPal', '2020-07-04 14:20:51', '2020-07-04 14:20:51'),
(40, 36, 'bgsafXM0iNcBNcYD', 'Started Transfer request', '2020-07-04 14:21:13', '2020-07-04 14:21:13'),
(41, 36, 'fpOaFgsOY9tRQM7E', 'Transfered $30 to user@test.com', '2020-07-04 14:21:15', '2020-07-04 14:21:15'),
(42, 36, 'CwPA2qoexmw4IsAU', 'Logged out - ::1', '2020-07-04 14:30:28', '2020-07-04 14:30:28'),
(43, 11, 'm4RGS1JmnQO29cro', 'Logged In', '2020-07-04 14:38:51', '2020-07-04 14:38:51'),
(44, 11, 'HW4yY3iPTem2qwqp', 'Logged In', '2020-07-05 09:29:13', '2020-07-05 09:29:13'),
(45, 11, 'HOut9Jrq4R7KXjAu', 'Logged In', '2020-07-05 12:01:44', '2020-07-05 12:01:44'),
(46, 36, '4kUsIXd24EncrSfS', 'Logged In', '2020-07-06 16:20:26', '2020-07-06 16:20:26'),
(47, 36, 'c3HeeiGxwsX6TGOW', 'Started attempt to purchase Starter', '2020-07-06 16:29:00', '2020-07-06 16:29:00'),
(48, 36, 'mWybZHOmTGD03e85', 'Purchased plan #Starter', '2020-07-06 16:29:02', '2020-07-06 16:29:02'),
(49, 36, 'cQxBh2rSoKqjUsfD', 'Logged out - ::1', '2020-07-06 17:27:58', '2020-07-06 17:27:58'),
(50, 11, '2q5rbscK5l2ACjtE', 'Logged In', '2020-07-07 17:09:30', '2020-07-07 17:09:30'),
(51, 11, 'nlzlBotMb3fbKvSR', 'Logged out - ::1', '2020-07-07 17:09:35', '2020-07-07 17:09:35'),
(52, 11, 'NGb5PfTZEAvNKiGV', 'Logged In', '2020-07-07 17:24:03', '2020-07-07 17:24:03'),
(53, 11, 'u2n1foyVdfvB6i9U', 'Logged In', '2020-07-07 17:24:12', '2020-07-07 17:24:12'),
(54, 11, 'us10CKq7z34TmC4Y', 'Logged out - ::1', '2020-07-07 17:24:19', '2020-07-07 17:24:19'),
(55, 11, 'rK1yhflh7EZQQQmy', 'Logged In', '2020-07-07 17:34:24', '2020-07-07 17:34:24'),
(56, 11, 'V9lWFJn7oj6YhoIJ', 'Logged In', '2020-07-07 17:34:37', '2020-07-07 17:34:37'),
(57, 11, 'W8yIHbyZOczeaT1m', 'Logged out - ::1', '2020-07-07 17:35:52', '2020-07-07 17:35:52'),
(58, 11, 'y90OsALqonvlydh3', 'Logged In', '2020-07-07 17:35:56', '2020-07-07 17:35:56'),
(59, 11, 'fOdXO6za93a6YQ7g', 'Logged out - ::1', '2020-07-07 17:35:58', '2020-07-07 17:35:58'),
(60, 11, 'suvkEMVWtbxncvyF', 'Logged out - ::1', '2020-07-07 19:00:24', '2020-07-07 19:00:24'),
(61, 11, 'laClZySB5R09crY0', 'Logged out - ::1', '2020-07-07 19:03:47', '2020-07-07 19:03:47'),
(62, 11, 'n4ddk69nEtxE6w8r', 'Logged In', '2020-07-07 19:03:51', '2020-07-07 19:03:51'),
(63, 11, 'vDk7Zf7SBkxfz3mb', 'Logged out - ::1', '2020-07-07 19:04:00', '2020-07-07 19:04:00'),
(64, 11, 'ePXe6O0mgQV29kLq', 'Logged In', '2020-07-07 19:04:04', '2020-07-07 19:04:04'),
(65, 11, '5SAaiuEkzZYxuvjR', 'Logged out - ::1', '2020-07-07 19:04:08', '2020-07-07 19:04:08'),
(66, 11, 'LG6kTvJb3PXqI4yO', 'Logged In', '2020-07-07 19:04:12', '2020-07-07 19:04:12'),
(67, 11, 'aL5KWdARdvSVAQ7w', 'Logged out - ::1', '2020-07-07 19:04:16', '2020-07-07 19:04:16'),
(68, 11, '1Hw3VWcO4ujfEiOB', 'Logged In', '2020-07-07 19:04:20', '2020-07-07 19:04:20'),
(69, 11, '949lgDNuM3lBSSGF', 'Logged out - ::1', '2020-07-07 19:04:44', '2020-07-07 19:04:44'),
(70, 11, 'oGJ31r20Cr2h3ax1', 'Logged In', '2020-07-07 19:06:13', '2020-07-07 19:06:13'),
(71, 11, 'nSvreqMZ2PFFp4o3', 'Logged out - ::1', '2020-07-07 19:07:04', '2020-07-07 19:07:04'),
(72, 11, 'thwWfCB3pSXT2H9n', 'Logged In', '2020-07-07 19:07:12', '2020-07-07 19:07:12'),
(73, 11, 'v1yluZvAQ3CoNKNN', 'Logged out - ::1', '2020-07-07 19:07:35', '2020-07-07 19:07:35'),
(74, 11, 'c1tY6ZQGrYwJMrxk', 'Logged In', '2020-07-07 19:15:59', '2020-07-07 19:15:59'),
(75, 11, 'whv27IAHjjXJcpSU', 'Logged out - ::1', '2020-07-07 19:16:40', '2020-07-07 19:16:40'),
(76, 11, 'ZDDm50qFqOdeZAwi', 'Logged In', '2020-07-07 19:22:47', '2020-07-07 19:22:47'),
(77, 11, '9w3PdveTb0jnrU20', 'Logged In', '2020-07-07 19:22:52', '2020-07-07 19:22:52'),
(78, 11, 'WTGVnhmHrKW9iLoJ', 'Logged out - ::1', '2020-07-07 19:22:55', '2020-07-07 19:22:55'),
(79, 11, 'DMszUju95gAf83WS', 'Logged In', '2020-07-07 19:22:59', '2020-07-07 19:22:59'),
(80, 11, 'c0ZEZnigF2CHjSG8', 'Logged out - ::1', '2020-07-07 19:23:03', '2020-07-07 19:23:03'),
(81, 11, 'vQ1s5Vg3LoyiK6j1', 'Logged In', '2020-07-07 22:32:01', '2020-07-07 22:32:01'),
(82, 11, 'NrRwrIyn7M0l6U4K', 'Logged out - ::1', '2020-07-07 22:41:30', '2020-07-07 22:41:30'),
(83, 11, 'Fa5i2RU6GfeilHdn', 'Logged In', '2020-07-07 22:41:46', '2020-07-07 22:41:46'),
(84, 11, 'IDtOfyplVCIIGraJ', 'Updated account details', '2020-07-07 22:50:00', '2020-07-07 22:50:00'),
(85, 11, 'GBVL1XmVtpRHu8HL', 'Updated account details', '2020-07-07 22:51:47', '2020-07-07 22:51:47'),
(86, 11, 'rsHK6ULzivT3B3UD', 'Updated account details', '2020-07-07 22:51:51', '2020-07-07 22:51:51'),
(87, 11, 'FKRsI835fkDwJK4z', 'Updated account details', '2020-07-07 22:51:56', '2020-07-07 22:51:56'),
(88, 11, '7ywq4BLzkRqEHtgS', 'Updated account details', '2020-07-07 22:55:14', '2020-07-07 22:55:14'),
(89, 11, 'XvlqzDaCKf2RlTkl', 'Updated account details', '2020-07-07 22:55:16', '2020-07-07 22:55:16'),
(90, 11, 'AXNi4IIydpAEy1zU', 'Updated account details', '2020-07-07 22:55:47', '2020-07-07 22:55:47'),
(91, 11, '1ehNC7fOZO4kYOVH', 'Updated account details', '2020-07-07 22:55:49', '2020-07-07 22:55:49'),
(92, 11, 'r0PW7aA6FZrK8Vwg', 'Updated account details', '2020-07-07 22:57:01', '2020-07-07 22:57:01'),
(93, 11, 'mvZgDQyysnbsy8v4', 'Updated account details', '2020-07-07 22:57:03', '2020-07-07 22:57:03'),
(94, 11, 'iXpYC526AQGaSqTu', 'Updated account details', '2020-07-07 22:59:03', '2020-07-07 22:59:03'),
(95, 11, 'ElZ01R3oDYhAAuxq', 'Updated account details', '2020-07-07 23:00:23', '2020-07-07 23:00:23'),
(96, 11, 'zpXewIyWVtj2m602', 'Updated account details', '2020-07-07 23:00:27', '2020-07-07 23:00:27'),
(97, 11, 'MVgvixA3No0wtSsP', 'Updated account details', '2020-07-07 23:00:32', '2020-07-07 23:00:32'),
(98, 11, 'C0PcuU3bGOie5IRf', 'Updated account details', '2020-07-07 23:01:11', '2020-07-07 23:01:11'),
(99, 11, 'zYswOKSuVZqLveLI', 'Updated account details', '2020-07-07 23:01:16', '2020-07-07 23:01:16'),
(100, 11, 'rjBoRfSKrJB2rkDE', 'Updated account details', '2020-07-07 23:01:19', '2020-07-07 23:01:19'),
(101, 11, 'Ixuj3Szsttob3maM', 'Updated account details', '2020-07-07 23:01:50', '2020-07-07 23:01:50'),
(102, 11, 'Q6V2S4GQZ5C0lmJy', 'Updated account details', '2020-07-07 23:02:05', '2020-07-07 23:02:05'),
(103, 11, 'UJ27io7Q8zrdCozw', 'Updated account details', '2020-07-07 23:02:08', '2020-07-07 23:02:08'),
(104, 11, '8TDfl9CVvbjTnFXQ', 'Updated account details', '2020-07-07 23:07:52', '2020-07-07 23:07:52'),
(105, 11, 'wgw8EcI24aVdRKUh', 'Updated account details', '2020-07-07 23:07:54', '2020-07-07 23:07:54'),
(106, 11, 'R3Hxjl0V1MeY5cXA', 'Updated account details', '2020-07-07 23:10:47', '2020-07-07 23:10:47'),
(107, 11, 'm0p2uzgyPI5uU6ZX', 'Updated account details', '2020-07-07 23:10:50', '2020-07-07 23:10:50'),
(108, 11, 'wkl6r6xQixkL9Mlm', 'Updated account details', '2020-07-07 23:12:41', '2020-07-07 23:12:41'),
(109, 11, 'NT70Vw30iu50Hhph', 'Updated account details', '2020-07-07 23:12:44', '2020-07-07 23:12:44'),
(110, 11, 'xeiQnhFkdIJJzB89', 'Updated account details', '2020-07-07 23:12:55', '2020-07-07 23:12:55'),
(111, 11, '4PeObR5aJ5JlkbcU', 'Updated account details', '2020-07-07 23:12:57', '2020-07-07 23:12:57'),
(112, 11, 'wQ9ELNYdsKn44eMV', 'Updated account details', '2020-07-07 23:13:17', '2020-07-07 23:13:17'),
(113, 11, '2YvMOAaY3ui9JCzx', 'Updated account details', '2020-07-07 23:13:36', '2020-07-07 23:13:36'),
(114, 11, 'AmLI2RqQFWGb6Mms', 'Updated account details', '2020-07-07 23:15:52', '2020-07-07 23:15:52'),
(115, 11, 'gMiTJvroT5Tcwcgk', 'Updated account details', '2020-07-07 23:15:54', '2020-07-07 23:15:54'),
(116, 11, '10XvmipE4pJnE9Vb', 'Updated account details', '2020-07-07 23:17:24', '2020-07-07 23:17:24'),
(117, 11, '9IffAwwuANqbvPQx', 'Updated account details', '2020-07-07 23:17:36', '2020-07-07 23:17:36'),
(118, 11, 'LDU7pA72FuWaOGfE', 'Logged In', '2020-07-08 03:23:38', '2020-07-08 03:23:38'),
(119, 11, 'h1ry3RMZxHvGYrMN', 'Created Funding Request of 100USD via Flutterwave', '2020-07-08 03:47:49', '2020-07-08 03:47:49'),
(120, 11, 'DC402Zd6HIy0OGd5', 'Created Funding Request of 100USD via Flutterwave', '2020-07-08 04:09:54', '2020-07-08 04:09:54'),
(121, 11, '7ohvH8nKWIZem4EW', 'Verified Funding Request of106USD via Flutterwave', '2020-07-08 04:34:08', '2020-07-08 04:34:08'),
(122, 11, 'mqdth9dcn3oFBGA4', 'Verified Funding Request of106USD via Flutterwave', '2020-07-08 04:35:33', '2020-07-08 04:35:33'),
(123, 11, '4s2jZLbujJz9ru7p', 'Verified Funding Request of106USD via Flutterwave', '2020-07-08 04:37:07', '2020-07-08 04:37:07'),
(124, 11, 'UNO6b7UEoSv4TG5Z', 'Verified Funding Request of106USD via Flutterwave', '2020-07-08 04:40:15', '2020-07-08 04:40:15'),
(125, 11, 'Qn5x1mB03aVRNoTg', 'Created Funding Request of 100USD via Flutterwave', '2020-07-08 04:51:37', '2020-07-08 04:51:37'),
(126, 11, '7XH363aWYU6CnDeA', 'Verified Funding Request of 106USD via Flutterwave', '2020-07-08 04:52:30', '2020-07-08 04:52:30'),
(127, 11, 'sMK3eHOHCLCh6xkm', 'Verified Funding Request of 103.031USD via PayPal', '2020-07-08 04:58:05', '2020-07-08 04:58:05'),
(128, 11, 'yuIqAe1A6lgXVe9R', 'Verified Funding Request of 103.03USD via CoinPayment BTC', '2020-07-08 04:59:42', '2020-07-08 04:59:42'),
(129, 11, '2P0eSaTNkIPuYWHL', 'Created Funding Request of 100USD via Flutterwave', '2020-07-08 05:07:26', '2020-07-08 05:07:26'),
(130, 11, 'oxciPVOBEHkEJ2eq', 'Verified Funding Request of 106USD via Flutterwave', '2020-07-08 05:08:19', '2020-07-08 05:08:19'),
(131, 11, 'x6yCV3ZZJLmGiZK1', 'Created Funding Request of 200USD via Stripe', '2020-07-08 05:38:04', '2020-07-08 05:38:04'),
(132, 11, 'ekEjoRVq2cj7TeRZ', 'Logged In', '2020-07-08 09:33:11', '2020-07-08 09:33:11'),
(133, 11, 'qb4ExJnQKSkhyAEd', 'Logged out - ::1', '2020-07-08 09:42:37', '2020-07-08 09:42:37'),
(134, 37, 'KKbT5ayeiFVV3mJ0', 'Logged In', '2020-07-08 09:47:51', '2020-07-08 09:47:51'),
(135, 37, 'EZSI9ESNvNNKr95D', 'Logged out - ::1', '2020-07-08 09:51:03', '2020-07-08 09:51:03'),
(136, 11, 'gyLJdWRSE43cX8CN', 'Logged In', '2020-07-08 10:03:26', '2020-07-08 10:03:26'),
(137, 11, 'vQhhtF1WODojGEeC', 'Logged In', '2020-07-08 10:03:30', '2020-07-08 10:03:30'),
(138, 11, 'HTVkJNvEuaSpQzif', 'Logged out - ::1', '2020-07-08 10:59:13', '2020-07-08 10:59:13'),
(139, 11, 'WdiPRNNpZGD14jyn', 'Logged In', '2020-07-08 10:59:17', '2020-07-08 10:59:17'),
(140, 11, 'TCky7SfU66XvWKgi', 'Logged In', '2020-07-08 15:47:33', '2020-07-08 15:47:33'),
(141, 11, 'xt9szpyIDgJ1oM14', 'Created Funding Request of 100USD via Paystack', '2020-07-08 17:01:50', '2020-07-08 17:01:50'),
(142, 11, 'peIqwxqAEypSQwU4', 'Created Funding Request of 300USD via Flutterwave', '2020-07-08 17:02:29', '2020-07-08 17:02:29'),
(143, 11, 'u4juOHTTqhzULYue', 'Created Funding Request of 100USD via PayPal', '2020-07-08 17:03:01', '2020-07-08 17:03:01'),
(144, 11, 'N49LGCsRMfnENy0n', 'Logged In', '2020-07-08 19:38:41', '2020-07-08 19:38:41'),
(145, 11, 'hP8sGLpyl1O9GiOB', 'Created Funding Request of 100USD via Stripe', '2020-07-08 19:38:48', '2020-07-08 19:38:48'),
(146, 11, 'csoIsVxF5OgLK7vM', 'Logged out - ::1', '2020-07-08 19:50:35', '2020-07-08 19:50:35'),
(147, 11, 'NgsGQjreJbx23wdZ', 'Logged In', '2020-07-08 19:51:04', '2020-07-08 19:51:04'),
(148, 11, 'vmyoElETuzUjTC5A', 'Logged out - ::1', '2020-07-08 20:00:48', '2020-07-08 20:00:48'),
(149, 11, 'PIyFOoULeJINHNn1', 'Logged In', '2020-07-08 21:53:17', '2020-07-08 21:53:17'),
(150, 11, 'YomBKrBde4X3wQd1', 'Logged In', '2020-07-08 21:53:22', '2020-07-08 21:53:22'),
(151, 11, 'OtPqIOYpnRfwE1fR', 'Logged In', '2020-07-08 21:56:19', '2020-07-08 21:56:19'),
(152, 11, 'AMWA1ViLDBPSOVc8', 'Logged In', '2020-07-08 21:56:24', '2020-07-08 21:56:24'),
(153, 11, 'uZgMJjesZZMn1Vnj', 'Logged out - ::1', '2020-07-08 22:05:18', '2020-07-08 22:05:18'),
(154, 11, 'VpffDax0Bi1xz3ZJ', 'Logged In', '2020-07-08 22:05:32', '2020-07-08 22:05:32'),
(155, 11, 'yurh9tbPRoLPJOeC', 'Logged In', '2020-07-08 22:07:54', '2020-07-08 22:07:54'),
(156, 11, 'g25w3UxMJTsocDXW', 'Logged In', '2020-07-08 22:08:03', '2020-07-08 22:08:03'),
(157, 11, 'UZuqHarMsQiOwbZv', 'Logged out - ::1', '2020-07-08 22:11:06', '2020-07-08 22:11:06'),
(158, 11, 'bIE2pSz6qXZSL2SA', 'Logged In', '2020-07-08 22:11:37', '2020-07-08 22:11:37'),
(159, 11, 'kTgp9l4VKlpIEQKP', 'Logged In', '2020-07-08 22:12:24', '2020-07-08 22:12:24'),
(160, 11, 'gVlkTJdJKQBQz03J', 'Logged In', '2020-07-08 22:12:33', '2020-07-08 22:12:33'),
(161, 11, 'lpi8HHxOK9ymxjCS', 'Logged In', '2020-07-08 22:12:47', '2020-07-08 22:12:47'),
(162, 11, 'TJvNatfvdot7zS6W', 'Logged In', '2020-07-09 10:48:28', '2020-07-09 10:48:28'),
(163, 11, 'yuxjRCzwh2Hdwxta', 'Logged In', '2020-07-09 17:36:00', '2020-07-09 17:36:00'),
(164, 11, 'WlY47shjdvF1uwIE', 'Logged In', '2020-07-09 17:40:24', '2020-07-09 17:40:24'),
(165, 11, 'JhNGC9OKlWCKy5oB', 'Logged In', '2020-07-09 17:40:28', '2020-07-09 17:40:28'),
(166, 11, 'xiMfs8aKbR0G6rKa', 'Logged In', '2020-07-09 17:41:41', '2020-07-09 17:41:41'),
(167, 11, 'CuaaIOJpjSLuOY3V', 'Logged In', '2020-07-09 17:41:45', '2020-07-09 17:41:45'),
(168, 11, 'km67wHisREu5JUqS', 'Logged In', '2020-07-09 17:42:54', '2020-07-09 17:42:54'),
(169, 11, 'jbhUjgAgXCvQpem9', 'Logged In', '2020-07-09 17:42:59', '2020-07-09 17:42:59'),
(170, 11, 'A4uPEnkFE1OMnMHW', 'Logged In', '2020-07-09 17:47:08', '2020-07-09 17:47:08'),
(171, 11, 'foaWcaYM2U0hFoIw', 'Logged In', '2020-07-09 17:47:13', '2020-07-09 17:47:13'),
(172, 11, 'wSr1YiyUzG7HExxI', 'Logged out - ::1', '2020-07-09 17:47:35', '2020-07-09 17:47:35'),
(173, 11, 'bPubq5dJZwdndchg', 'Logged In', '2020-07-09 17:59:39', '2020-07-09 17:59:39'),
(174, 11, 'HnpyW0xuDScg9E6n', 'Created Funding Request of 100USD via Flutterwave', '2020-07-09 18:01:12', '2020-07-09 18:01:12'),
(175, 11, 'udsAlwAmkvQ6gLhH', 'Logged In', '2020-07-12 14:16:42', '2020-07-12 14:16:42'),
(176, 11, 'xcqJ9lqEmRxxT81N', 'Logged In', '2020-07-12 14:16:42', '2020-07-12 14:16:42'),
(177, 11, 'NcOlRu6WYyVVv43T', 'Updated account details', '2020-07-12 14:23:49', '2020-07-12 14:23:49'),
(178, 11, 'nyQrWBR5fEU8GmWq', 'Updated account details', '2020-07-12 14:29:36', '2020-07-12 14:29:36'),
(179, 11, 'LTFfKPs7cz93Fte4', 'Submitted withdraw requesthTCl9UQ8vEGtvmWp', '2020-07-12 14:35:40', '2020-07-12 14:35:40'),
(180, 11, 's1jUCxx9Zf1eHoT8', 'Logged In', '2020-07-20 21:01:22', '2020-07-20 21:01:22'),
(181, 11, 'dfqsjTpU9p0xFjQN', 'Logged In', '2020-07-22 05:29:20', '2020-07-22 05:29:20'),
(182, 11, 'jU8i6UkYQ61SxMhp', 'Logged out - ::1', '2020-07-22 05:31:18', '2020-07-22 05:31:18'),
(183, 11, 'Vwbaxmr7JelPxnyd', 'Logged In', '2020-07-22 06:25:19', '2020-07-22 06:25:19'),
(184, 11, 'mXQoJeVbO30nQxgn', 'Logged out - ::1', '2020-07-22 06:25:23', '2020-07-22 06:25:23'),
(185, 11, 'JKlyXMMCvmdVnwiI', 'Logged In', '2020-07-22 06:25:28', '2020-07-22 06:25:28'),
(186, 11, 'GED24H1z8K1GZtHN', 'Logged In', '2020-07-22 06:25:29', '2020-07-22 06:25:29'),
(187, 11, 'CYK5Zly5WcTrNJng', 'Logged out - ::1', '2020-07-22 06:36:11', '2020-07-22 06:36:11'),
(188, 11, 'h61dI9XdQWo4MSFm', 'Logged In', '2020-07-22 13:16:04', '2020-07-22 13:16:04'),
(189, 11, 'PH1PvaBmSaSmz2if', 'Logged out - ::1', '2020-07-22 13:29:25', '2020-07-22 13:29:25'),
(190, 37, 'xYbric50CVc9q663', 'Logged In', '2020-07-22 13:29:50', '2020-07-22 13:29:50'),
(191, 37, 'RYLqxbZplgwGRTbL', 'Logged In', '2020-07-22 13:30:07', '2020-07-22 13:30:07'),
(192, 11, 'ds982BQiRTognRnw', 'Logged In', '2020-07-22 13:30:22', '2020-07-22 13:30:22'),
(193, 11, 'Mx4d2HO5GXGodHQk', 'Logged In', '2020-07-22 13:30:58', '2020-07-22 13:30:58'),
(194, 11, 'LuTB0l40cuYMMSCf', 'Logged In', '2020-07-22 13:31:04', '2020-07-22 13:31:04'),
(195, 11, 'OqEnJfPsb7DOrnkP', 'Logged out - ::1', '2020-07-22 13:31:12', '2020-07-22 13:31:12'),
(196, 37, '6qlKuDrRTcP2QnsA', 'Logged In', '2020-07-22 13:31:31', '2020-07-22 13:31:31'),
(197, 37, 'xA8xcfDE2vbIwIG8', 'Logged In', '2020-07-22 13:31:40', '2020-07-22 13:31:40'),
(198, 37, 'Vxnc1LD64z34NJoi', 'Started attempt to purchase Starter', '2020-07-22 13:32:23', '2020-07-22 13:32:23'),
(199, 37, 'wpnVK0esAeVF7FjG', 'Purchased plan #Starter', '2020-07-22 13:32:26', '2020-07-22 13:32:26'),
(200, 11, 'ETNhbVOVBQ9MyUeo', 'Logged In', '2020-07-22 13:36:59', '2020-07-22 13:36:59'),
(201, 11, 'MpwNgCcGk3Hdkshj', 'Logged In', '2020-07-22 13:37:04', '2020-07-22 13:37:04'),
(202, 11, 'ACGgNbMbcR3ig3iu', 'Logged out - ::1', '2020-07-25 09:02:43', '2020-07-25 09:02:43'),
(203, 11, 'BFzBNyLNGDmqhs2g', 'Logged In', '2020-07-25 09:36:44', '2020-07-25 09:36:44'),
(204, 11, '1MkFQUng9xL0aVpn', 'Updated withdraw requestM2FLNRfjYhDWStB4', '2020-07-25 09:37:27', '2020-07-25 09:37:27'),
(205, 11, 'I5sEilt6KSKHVRbd', 'Logged out - ::1', '2020-07-25 09:37:43', '2020-07-25 09:37:43'),
(206, 11, 'JUei3MAYBPbShDTp', 'Logged In', '2020-07-28 15:32:21', '2020-07-28 15:32:21'),
(207, 11, 'GUDXparRfOUZboAb', 'Created Funding Request of 100USD via Flutterwave', '2020-07-28 15:32:28', '2020-07-28 15:32:28'),
(208, 11, 'UybMlWEMbXHel3BK', 'Logged In', '2020-07-28 21:09:28', '2020-07-28 21:09:28'),
(209, 11, 'zPWHuo3jqBDGdjhx', 'Created Funding Request of 100USD via Paystack', '2020-07-28 21:25:36', '2020-07-28 21:25:36'),
(210, 11, 'LzcSpjGwwH5hdhAy', 'Created Funding Request of 100USD via Flutterwave', '2020-07-29 14:28:15', '2020-07-29 14:28:15'),
(211, 11, 'PTrdc32N5JyOoaVO', 'Updated account details', '2020-07-29 15:26:55', '2020-07-29 15:26:55'),
(212, 11, 'xIvtB4cC9gCxCAyj', 'Changed account photo', '2020-07-29 15:32:43', '2020-07-29 15:32:43'),
(213, 11, 'GFKcT952RNjoVHRe', 'Logged out - ::1', '2020-07-29 16:13:31', '2020-07-29 16:13:31'),
(214, 11, 'V09zhicMAXO2NUkc', 'Logged In', '2020-07-29 16:15:20', '2020-07-29 16:15:20'),
(215, 11, 'IdBOcfWXafpXvu5l', 'Created Funding Request of 100USD via Paystack', '2020-07-29 16:15:35', '2020-07-29 16:15:35'),
(216, 11, 'z1bGoNEsDk8HLz7H', 'Created Funding Request of 100USD via Voguepay', '2020-07-29 16:16:07', '2020-07-29 16:16:07'),
(217, 11, 'qheS4zbuFxVRcZIt', 'Created Funding Request of 100USD via CoinPayment BTC', '2020-07-29 16:39:13', '2020-07-29 16:39:13'),
(218, 11, 'vZw9Vb1rDFisw5WU', 'Created Funding Request of 100USD via Paystack', '2020-07-29 17:22:44', '2020-07-29 17:22:44'),
(219, 11, 'ZU3D8pMEqkBvjFRg', 'Created Funding Request of 100USD via Flutterwave', '2020-07-29 17:23:01', '2020-07-29 17:23:01'),
(220, 11, 'R7SjYJoFccL8BLol', 'Logged out - ::1', '2020-07-29 19:06:06', '2020-07-29 19:06:06'),
(221, 11, 'FYQqAOXBambylMLf', 'Logged In', '2020-07-29 19:09:48', '2020-07-29 19:09:48'),
(222, 11, 'aFIdgWBrjtIxHxRD', 'Logged out - ::1', '2020-07-29 20:36:15', '2020-07-29 20:36:15'),
(223, 11, '9UjKUMerEX9qyIDn', 'Logged In', '2020-07-29 23:13:56', '2020-07-29 23:13:56'),
(224, 11, '0JePwDBOVrjJqWVv', 'Logged In', '2020-07-30 09:28:10', '2020-07-30 09:28:10'),
(225, 11, 'wU20u0flOujAyWi4', 'Logged In', '2020-07-30 09:50:21', '2020-07-30 09:50:21'),
(226, 11, 'U0Xzc5Y0fTOavoZO', 'Logged In', '2020-07-30 12:27:13', '2020-07-30 12:27:13'),
(227, 11, 'DRe1Alicass3eYn8', 'Logged out - ::1', '2020-07-30 12:31:42', '2020-07-30 12:31:42'),
(228, 11, 'uYnAutpdQ2Qti1M8', 'Logged In', '2020-07-30 23:42:48', '2020-07-30 23:42:48'),
(229, 11, 'nMY5fTGe3pgG6bOa', 'Logged In', '2020-07-30 23:42:52', '2020-07-30 23:42:52'),
(230, 11, 'HJkqmIHlyPqIIRAP', 'Logged In', '2020-07-31 17:27:59', '2020-07-31 17:27:59'),
(231, 11, 'dBc7PSDf2B5Ppthh', 'Logged In', '2020-07-31 17:44:12', '2020-07-31 17:44:12'),
(232, 11, 'X3hVBgQsikgXBNdv', 'Logged In', '2020-07-31 17:51:35', '2020-07-31 17:51:35'),
(233, 11, 'Cp2ulNVhIS8bbJzE', 'Logged In', '2020-07-31 17:54:53', '2020-07-31 17:54:53'),
(234, 11, 'umSyky3FfKPRwidD', 'Logged In', '2020-07-31 17:55:23', '2020-07-31 17:55:23'),
(235, 11, 'Vi37mQyBjs3mfLm1', 'Logged In', '2020-07-31 17:55:28', '2020-07-31 17:55:28'),
(236, 11, 'ZXq7DrvmzBV7YKYd', 'Logged In', '2020-08-01 20:21:25', '2020-08-01 20:21:25'),
(237, 11, 'TbputMN0xgIipI3R', 'Logged In', '2020-08-01 20:22:17', '2020-08-01 20:22:17'),
(238, 11, '5Lh9hUy66WWEyyk3', 'Logged In', '2020-08-02 16:19:11', '2020-08-02 16:19:11'),
(239, 11, 'i29kfn4SsekP8sv5', 'Logged In', '2020-08-02 16:19:53', '2020-08-02 16:19:53'),
(240, 11, 'rrg1G2ebwjRs0JjD', 'Logged In', '2020-08-02 16:24:20', '2020-08-02 16:24:20'),
(241, 11, 'JhdGQPc3mkHnUQzY', 'Logged In', '2020-08-02 18:22:04', '2020-08-02 18:22:04'),
(242, 11, 'kbdqNawc78sbbd4o', 'Logged In', '2020-08-03 09:00:29', '2020-08-03 09:00:29'),
(243, 11, 'PjchtYTjgNX7NP8M', 'Logged In', '2020-08-03 09:05:14', '2020-08-03 09:05:14'),
(244, 11, '77dDpHUhbvARtgt6', 'Logged In', '2020-08-03 09:57:43', '2020-08-03 09:57:43'),
(245, 38, 'Qj2WD1yHUN9Azu3B', 'Logged In', '2020-12-22 02:13:51', '2020-12-22 02:13:51'),
(246, 38, 'AqIF9nPkMzZYDzEE', 'Created Funding Request of 500USD via Stripe', '2020-12-22 02:18:53', '2020-12-22 02:18:53'),
(247, 38, '7sU8IwL92Utfz1bU', 'Created Funding Request of 5000USD via Blockchain BTC', '2020-12-22 02:19:26', '2020-12-22 02:19:26'),
(248, 38, 'mxIyS5i6eQne53lA', 'Logged out - UNKNOWN', '2020-12-22 02:38:27', '2020-12-22 02:38:27'),
(249, 38, 'GeyQ54ocoXQHcoIO', 'Logged In', '2020-12-23 00:37:23', '2020-12-23 00:37:23'),
(250, 38, 'fhxqRBAfevlemeGW', 'Started attempt to purchase Elite', '2020-12-23 03:01:44', '2020-12-23 03:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `bank_transfer`
--

CREATE TABLE `bank_transfer` (
  `id` int(11) NOT NULL,
  `user_id` int(32) NOT NULL,
  `trx` varchar(32) DEFAULT NULL,
  `amount` int(32) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(32) NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_transfer`
--

INSERT INTO `bank_transfer` (`id`, `user_id`, `trx`, `amount`, `details`, `image`, `status`, `created_at`, `updated_at`) VALUES
(13, 11, 'HjQQ1uYbHuIw3k48', 20000, 'lkrgk rk gr', '1589286534_user.jpg', 1, '2020-05-12 12:30:01', '2020-05-12 11:30:01'),
(14, 11, 'wl3mNvoKaDXmpb9a', 2000, 'hello', '1590881420_user.jpg', 0, '2020-05-30 22:30:20', '2020-05-30 22:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `full_name`, `mobile`, `email`, `message`, `seen`, `created_at`, `updated_at`) VALUES
(3, 'Castro Marvel', '+2349072963268', 'castrowebfirm@gmail.com', 'jbhbh', 0, '2020-01-31 16:21:57', '0000-00-00 00:00:00'),
(4, 'Castro Marvel', '+2349072963268', 'castrowebfirm@gmail.com', 'hkvvh', 0, '2020-01-31 16:21:57', '0000-00-00 00:00:00'),
(7, 'fdghj', '345678987', 'f@d.com', 'jhbkn', 0, '2020-04-03 16:36:37', '2020-04-03 16:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(32) NOT NULL,
  `code` varchar(8) NOT NULL,
  `percent` float NOT NULL,
  `status` int(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `percent`, `status`, `created_at`, `updated_at`) VALUES
(2, 'hjvdvv63', 12, 1, '2020-07-04 06:56:16', '2020-07-04 05:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country`, `currency`, `name`, `symbol`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Albania', 'Leke', 'ALL', 'Lek', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(2, 'America', 'Dollars', 'USD', '$', 1, '2020-03-31 08:29:11', '0000-00-00 00:00:00'),
(3, 'Afghanistan', 'Afghanis', 'AFN', '؋', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(4, 'Argentina', 'Pesos', 'ARS', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(5, 'Aruba', 'Guilders', 'AWG', 'ƒ', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(6, 'Australia', 'Dollars', 'AUD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(7, 'Azerbaijan', 'New Manats', 'AZN', 'ман', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(8, 'Bahamas', 'Dollars', 'BSD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(9, 'Barbados', 'Dollars', 'BBD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(10, 'Belarus', 'Rubles', 'BYR', 'p.', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(11, 'Belgium', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(12, 'Beliz', 'Dollars', 'BZD', 'BZ$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(13, 'Bermuda', 'Dollars', 'BMD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(14, 'Bolivia', 'Bolivianos', 'BOB', '$b', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(15, 'Bosnia and Herzegovina', 'Convertible Marka', 'BAM', 'KM', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(16, 'Botswana', 'Pula', 'BWP', 'P', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(17, 'Bulgaria', 'Leva', 'BGN', 'лв', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(18, 'Brazil', 'Reais', 'BRL', 'R$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(19, 'Britain (United Kingdom)', 'Pounds', 'GBP', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(20, 'Brunei Darussalam', 'Dollars', 'BND', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(21, 'Cambodia', 'Riels', 'KHR', '៛', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(22, 'Canada', 'Dollars', 'CAD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(23, 'Cayman Islands', 'Dollars', 'KYD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(24, 'Chile', 'Pesos', 'CLP', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(25, 'China', 'Yuan Renminbi', 'CNY', '¥', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(26, 'Colombia', 'Pesos', 'COP', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(27, 'Costa Rica', 'Colón', 'CRC', '₡', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(28, 'Croatia', 'Kuna', 'HRK', 'kn', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(29, 'Cuba', 'Pesos', 'CUP', '₱', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(30, 'Cyprus', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(31, 'Czech Republic', 'Koruny', 'CZK', 'Kč', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(32, 'Denmark', 'Kroner', 'DKK', 'kr', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(33, 'Dominican Republic', 'Pesos', 'DOP ', 'RD$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(34, 'East Caribbean', 'Dollars', 'XCD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(35, 'Egypt', 'Pounds', 'EGP', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(36, 'El Salvador', 'Colones', 'SVC', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(37, 'England (United Kingdom)', 'Pounds', 'GBP', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(38, 'Euro', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(39, 'Falkland Islands', 'Pounds', 'FKP', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(40, 'Fiji', 'Dollars', 'FJD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(41, 'France', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(42, 'Ghana', 'Cedis', 'GHC', '¢', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(43, 'Gibraltar', 'Pounds', 'GIP', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(44, 'Greece', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(45, 'Guatemala', 'Quetzales', 'GTQ', 'Q', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(46, 'Guernsey', 'Pounds', 'GGP', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(47, 'Guyana', 'Dollars', 'GYD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(48, 'Holland (Netherlands)', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(49, 'Honduras', 'Lempiras', 'HNL', 'L', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(50, 'Hong Kong', 'Dollars', 'HKD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(51, 'Hungary', 'Forint', 'HUF', 'Ft', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(52, 'Iceland', 'Kronur', 'ISK', 'kr', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(53, 'India', 'Rupees', 'INR', 'Rp', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(54, 'Indonesia', 'Rupiahs', 'IDR', 'Rp', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(55, 'Iran', 'Rials', 'IRR', '﷼', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(56, 'Ireland', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(57, 'Isle of Man', 'Pounds', 'IMP', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(58, 'Israel', 'New Shekels', 'ILS', '₪', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(59, 'Italy', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(60, 'Jamaica', 'Dollars', 'JMD', 'J$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(61, 'Japan', 'Yen', 'JPY', '¥', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(62, 'Jersey', 'Pounds', 'JEP', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(63, 'Kazakhstan', 'Tenge', 'KZT', 'лв', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(64, 'Korea (North)', 'Won', 'KPW', '₩', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(65, 'Korea (South)', 'Won', 'KRW', '₩', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(66, 'Kyrgyzstan', 'Soms', 'KGS', 'лв', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(67, 'Laos', 'Kips', 'LAK', '₭', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(68, 'Latvia', 'Lati', 'LVL', 'Ls', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(69, 'Lebanon', 'Pounds', 'LBP', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(70, 'Liberia', 'Dollars', 'LRD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(71, 'Liechtenstein', 'Switzerland Francs', 'CHF', 'CHF', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(72, 'Lithuania', 'Litai', 'LTL', 'Lt', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(73, 'Luxembourg', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(74, 'Macedonia', 'Denars', 'MKD', 'ден', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(75, 'Malaysia', 'Ringgits', 'MYR', 'RM', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(76, 'Malta', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(77, 'Mauritius', 'Rupees', 'MUR', '₨', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(78, 'Mexico', 'Pesos', 'MXN', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(79, 'Mongolia', 'Tugriks', 'MNT', '₮', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(80, 'Mozambique', 'Meticais', 'MZN', 'MT', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(81, 'Namibia', 'Dollars', 'NAD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(82, 'Nepal', 'Rupees', 'NPR', '₨', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(83, 'Netherlands Antilles', 'Guilders', 'ANG', 'ƒ', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(84, 'Netherlands', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(85, 'New Zealand', 'Dollars', 'NZD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(86, 'Nicaragua', 'Cordobas', 'NIO', 'C$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(87, 'Nigeria', 'Nairas', 'NGN', '₦', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(88, 'North Korea', 'Won', 'KPW', '₩', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(89, 'Norway', 'Krone', 'NOK', 'kr', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(90, 'Oman', 'Rials', 'OMR', '﷼', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(91, 'Pakistan', 'Rupees', 'PKR', '₨', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(92, 'Panama', 'Balboa', 'PAB', 'B/.', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(93, 'Paraguay', 'Guarani', 'PYG', 'Gs', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(94, 'Peru', 'Nuevos Soles', 'PEN', 'S/.', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(95, 'Philippines', 'Pesos', 'PHP', 'Php', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(96, 'Poland', 'Zlotych', 'PLN', 'zł', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(97, 'Qatar', 'Rials', 'QAR', '﷼', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(98, 'Romania', 'New Lei', 'RON', 'lei', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(99, 'Russia', 'Rubles', 'RUB', 'руб', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(100, 'Saint Helena', 'Pounds', 'SHP', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(101, 'Saudi Arabia', 'Riyals', 'SAR', '﷼', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(102, 'Serbia', 'Dinars', 'RSD', 'Дин.', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(103, 'Seychelles', 'Rupees', 'SCR', '₨', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(104, 'Singapore', 'Dollars', 'SGD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(105, 'Slovenia', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(106, 'Solomon Islands', 'Dollars', 'SBD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(107, 'Somalia', 'Shillings', 'SOS', 'S', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(108, 'South Africa', 'Rand', 'ZAR', 'R', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(109, 'South Korea', 'Won', 'KRW', '₩', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(110, 'Spain', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(111, 'Sri Lanka', 'Rupees', 'LKR', '₨', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(112, 'Sweden', 'Kronor', 'SEK', 'kr', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(113, 'Switzerland', 'Francs', 'CHF', 'CHF', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(114, 'Suriname', 'Dollars', 'SRD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(115, 'Syria', 'Pounds', 'SYP', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(116, 'Taiwan', 'New Dollars', 'TWD', 'NT$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(117, 'Thailand', 'Baht', 'THB', '฿', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(118, 'Trinidad and Tobago', 'Dollars', 'TTD', 'TT$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(119, 'Turkey', 'Lira', 'TRY', 'TL', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(120, 'Turkey', 'Liras', 'TRL', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(121, 'Tuvalu', 'Dollars', 'TVD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(122, 'Ukraine', 'Hryvnia', 'UAH', '₴', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(123, 'United Kingdom', 'Pounds', 'GBP', '£', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(124, 'United States of America', 'Dollars', 'USD', '$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(125, 'Uruguay', 'Pesos', 'UYU', '$U', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(126, 'Uzbekistan', 'Sums', 'UZS', 'лв', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(127, 'Vatican City', 'Euro', 'EUR', '€', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(128, 'Venezuela', 'Bolivares Fuertes', 'VEF', 'Bs', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(129, 'Vietnam', 'Dong', 'VND', '₫', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(130, 'Yemen', 'Rials', 'YER', '﷼', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(131, 'Zimbabwe', 'Zimbabwe Dollars', 'ZWD', 'Z$', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(132, 'India', 'Rupees', 'INR', '₹', 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gateway_id` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `try` int(11) NOT NULL DEFAULT 0,
  `secret` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `gateway_id`, `amount`, `charge`, `usd`, `btc_amo`, `btc_wallet`, `trx`, `status`, `try`, `secret`, `txn_id`, `status_url`, `created_at`, `updated_at`) VALUES
(150, 11, 107, '1033', '33', '12.91', '0', '', 'tuRRWSHf9H7YKtvu', 0, 0, NULL, NULL, NULL, '2020-04-03 19:11:20', '2020-04-03 19:11:20'),
(151, 11, 106, '106', '6', '1.33', '0', '', 'YdSVouOapjCXHxyQ', 0, 0, NULL, NULL, NULL, '2020-06-06 14:42:37', '2020-06-06 14:42:37'),
(152, 11, 505, '103.03', '3.0300000000000002', '1.29', '0', '', 'NsdfYLqFVCZYNcFv', 0, 0, NULL, NULL, NULL, '2020-06-06 15:26:51', '2020-06-06 15:26:51'),
(153, 11, 107, '106', '6', '1.33', '0', '', '85fo0jDWVnCqYhOF', 0, 0, NULL, NULL, NULL, '2020-06-30 16:50:59', '2020-06-30 16:50:59'),
(154, 11, 505, '103.03', '3.0300000000000002', '1.29', '0', '', 'vuJE9hQIqGuFG9s4', 1, 0, NULL, NULL, NULL, '2020-07-03 20:26:15', '2020-07-08 04:59:42'),
(155, 11, 106, '106', '6', '1.33', '0', '', 'xNtXH1Qeb2v8knNZ', 0, 0, NULL, NULL, NULL, '2020-07-04 10:00:45', '2020-07-04 10:00:45'),
(156, 11, 106, '106', '6', '1.33', '0', '', 'OjzpHecDEUfPCqlJ', 0, 0, NULL, NULL, NULL, '2020-07-04 10:01:39', '2020-07-04 10:01:39'),
(158, 11, 108, '106', '6', '1.33', '0', '', 'JTHCGsQFfJkNbSC3', 0, 0, NULL, NULL, NULL, '2020-07-08 03:47:49', '2020-07-08 03:47:49'),
(159, 11, 108, '106', '6', '1.33', '0', '', '5v0ZvUYwa4JN1qap', 1, 0, NULL, NULL, NULL, '2020-07-08 04:09:54', '2020-07-08 04:46:44'),
(160, 11, 108, '106', '6', '1.33', '0', '', 'DCgr86zL1ZIQqwt9', 1, 0, NULL, NULL, NULL, '2020-07-08 04:51:37', '2020-07-08 04:52:30'),
(161, 11, 108, '106', '6', '1.33', '0', '', 'khbt7S8EmtWednu1', 1, 0, 'Gg3f56yM', NULL, NULL, '2020-07-08 05:07:26', '2020-07-08 05:08:19'),
(162, 11, 103, '204', '4', '2.55', '0', '', 'dBbaSTmEh8C9UVuv', 0, 0, 'H7PKv8Tk', NULL, NULL, '2020-07-08 05:38:04', '2020-07-08 05:38:04'),
(163, 11, 107, '106', '6', '1.33', '0', '', 'GPvfJZucl0ALLdZD', 0, 0, 'C1Nb0Iv1', NULL, NULL, '2020-07-08 17:01:50', '2020-07-08 17:01:50'),
(164, 11, 108, '312', '12', '3.9', '0', '', 'Bgz6CYE3Sle3yZhb', 0, 0, 'ZQzGPsHW', NULL, NULL, '2020-07-08 17:02:29', '2020-07-08 17:02:29'),
(165, 11, 101, '103.031', '3.031', '1.29', '0', '', '56GU9mRwFL2srqeC', 0, 0, 'Yf9R3Asj', NULL, NULL, '2020-07-08 17:03:01', '2020-07-08 17:03:01'),
(166, 11, 103, '103', '3', '1.29', '0', '', 'XatIBjMU27Snucqn', 0, 0, 'pX3sx8uf', NULL, NULL, '2020-07-08 19:38:48', '2020-07-08 19:38:48'),
(167, 11, 108, '106', '6', '1.33', '0', '', 'yo0IrhuxKDPv6Ahh', 0, 0, 'jZ3vFs0I', NULL, NULL, '2020-07-09 18:01:12', '2020-07-09 18:01:12'),
(168, 11, 108, '106', '6', '1.33', '0', '', '8z4mRtThldvGrnVK', 0, 0, '6A0pCP1f', NULL, NULL, '2020-07-28 15:32:28', '2020-07-28 15:32:28'),
(169, 11, 107, '106', '6', '1.33', '0', '', 'Bx83t12iZwpeq3lI', 0, 0, '5rtlLAoU', NULL, NULL, '2020-07-28 21:25:36', '2020-07-28 21:25:36'),
(170, 11, 108, '106', '6', '1.33', '0', '', 'tfDdMrzJtaHIY0K1', 0, 0, 'R6KPZ6un', NULL, NULL, '2020-07-29 14:28:15', '2020-07-29 14:28:15'),
(171, 11, 107, '106', '6', '1.33', '0', '', 'mXtau4cRUlXGyrns', 0, 0, 'VSy6mQRu', NULL, NULL, '2020-07-29 16:15:35', '2020-07-29 16:15:35'),
(172, 11, 106, '106', '6', '1.33', '0', '', 'CuilaPMwAIgUpqlK', 0, 0, 'x5aCHLOL', NULL, NULL, '2020-07-29 16:16:07', '2020-07-29 16:16:07'),
(173, 11, 505, '103.03', '3.0300000000000002', '1.29', '0.00915000', '37MBtygNKGM2AqH9Gg37142bNaZCj4QnnQ', 'ns6wd2YIqrZNHocr', 0, 0, 'C4T9v7Pc', NULL, NULL, '2020-07-29 16:39:13', '2020-07-29 16:46:44'),
(174, 11, 107, '106', '6', '1.33', '0', '', 'SN3JbihOzelmIOgW', 0, 0, '9CZCGZg0', NULL, NULL, '2020-07-29 17:22:44', '2020-07-29 17:22:44'),
(175, 11, 108, '106', '6', '1.33', '0', '', 'iAFfqeCm98qc7DMo', 0, 0, 'hoIIqo0t', NULL, NULL, '2020-07-29 17:23:01', '2020-07-29 17:23:01'),
(176, 38, 103, '507', '7', '6.34', '0', '', 'uJMs0f5nCXQTlpbL', 0, 0, '8K3VZf6y', NULL, NULL, '2020-12-22 02:18:53', '2020-12-22 02:18:53'),
(177, 38, 501, '5026', '26', '62.83', '0', '', 'oNXDAUs2uekLk9Zh', 0, 0, 'IIODLeU3', NULL, NULL, '2020-12-22 02:19:26', '2020-12-22 02:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `etemplates`
--

CREATE TABLE `etemplates` (
  `id` int(10) UNSIGNED NOT NULL,
  `esender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emessage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twilio_sid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twilio_auth` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twilio_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etemplates`
--

INSERT INTO `etemplates` (`id`, `esender`, `mobile`, `emessage`, `twilio_sid`, `twilio_auth`, `twilio_number`, `created_at`, `updated_at`) VALUES
(1, 'support@boomchart.com.ng', '+1234567890', '<div class=\"wrapper\" style=\"background-color: #f2f2f2;\"><br />\r\n<table class=\"layout layout--no-gutter\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff; height: 271px;\" width=\"592\" align=\"center\">\r\n<tbody>\r\n<tr style=\"height: 271px;\">\r\n<td class=\"column\" style=\"padding: 0px; text-align: left; vertical-align: top; color: #60666d; font-size: 14px; line-height: 21px; font-family: sans-serif; width: 590px; height: 271px;\"><br />\r\n<div style=\"margin-left: 20px; margin-right: 20px;\"><span style=\"font-size: large;\">Hi {{name}},<br /></span>\r\n<p><strong>{{message}}</strong></p>\r\n</div>\r\n<div style=\"margin-left: 20px; margin-right: 20px; margin-bottom: 24px;\">&nbsp;</div>\r\n<div style=\"margin-left: 20px; margin-right: 20px; margin-bottom: 24px;\">&nbsp;</div>\r\n<div style=\"margin-left: 20px; margin-right: 20px; margin-bottom: 24px;\">\r\n<p class=\"size-14\" style=\"margin-top: 0; margin-bottom: 0; font-size: 14px; line-height: 21px;\">Thanks,<br /><strong>KINGSMEN</strong></p>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', 'AC590b33681d6cee2fd264805fef3f357c', '822ba44fbff66ddfd8494ce853aaaa8b', '+12562429305', '2018-01-09 23:45:09', '2020-06-09 14:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(32) NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(43, 'What is Kingsmen?', '<p>Kingsmen is a registered digital asset investment firm based in the UK. The platform, which includes advanced basic and technical analysis at the source of high return performance, offers high &amp; fixed interest return. Aiming for success with its international investor network, experienced team, privileged information from business and technology world; Bynamic stands out from its competitors with its proven quality and ease of use. The company, which is managed under the leadership of people who think and foresee the future, is committed to achieving high returns from well-diversified portfolios and prioritizing clients.</p>', '2020-07-30 00:21:48', '2020-07-29 23:21:48'),
(44, 'Guaranteed interest returns, but how?', '<p>Digital assets are a class of assets considered dangerous and inconvenient. Many reasons such as liquidity, money laundering accusation, uncertainty of regulation, access restriction, volatile markets, functionality inquiries reduce trust in these assets. We believe that the risk factor should be eliminated for all people who believe that finance will rise on distributed systems. That\'s why we offer high interest returns to platform investors. With careful and detailed examination of market conditions, daily trading volume, expectations; we change our portfolio distribution and adjust our investment strategy. With this active fund management, you enjoy the fixed interest rate return on the user side.</p>', '2020-02-18 22:41:05', '2020-02-18 21:41:05'),
(45, 'What are company principles?', '<p>Successful investment management companies base their business on a core investment philosophy, and Bynamic is no different. Although we offer innovative and specific strategies through digital asset funds, an overarching theme runs through the investment guidance we provide to clients&mdash; focus on those things within your control. There are basically four principles that we attach great importance to: <br /><br /><strong>1) Create clear, appropriate investment goals:</strong> An appropriate investment goal should be measureable and attainable. Success should not depend on outsize investment returns or impractical saving or spending requirements. <br /><br /><strong>2) Develop a suitable asset allocation using broadly diversified funds: </strong>A sound investment strategy starts with an asset allocation befitting the portfolio\'s objective. The allocation should be built upon reasonable expectations for risk and returns and use diversified investments to avoid exposure to unnecessary risks. <br /><br /><strong>3) Minimize cost: </strong>Markets are unpredictable. Costs are forever. The lower your costs, the greater your share of an investment\'s return. And research suggests that lower-cost investments have tended to outperform higher-cost alternatives. To hold onto even more of your return, manage for efficiency. You can\'t control the markets, but you can control the bite of costs and efficiency. <br /><br /><strong>4) Maintain perspective and long-term discipline: </strong>Investing can provoke strong emotions. In the face of market turmoil, some investors may find themselves making impulsive decisions or, conversely, becoming paralyzed, unable to implement an investment strategy or rebalance a portfolio as needed. Discipline and perspective can help them remain committed to a long-term investment program through periods of market uncertainty.</p>', '2020-02-18 22:41:41', '2020-02-18 21:41:41'),
(46, 'What are digital assets and how are they valued?', '<p>Digital assets distributed ledger based electronic means of exchanges. Transactions involving them are secured by cryptography, and they have dedicated servers for verification of transactions and the creation of extra units. The most popular of them are Bitcoin, Ethereum, Litecoin, etc. All digital assets are valued by price action, and as a result, almost total control is in the hand of the investing public.</p>', '2020-02-18 22:43:17', '2020-02-18 21:43:17'),
(50, 'How can i ask for support?', '<p>We are here to help you with any problems and questions you may encounter while using the platform and during your investment experience. You can always contact or turn the situation into an opportunity</p>', '2020-02-18 21:44:52', '2020-02-18 21:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gateimg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `main_name`, `name`, `gateimg`, `minamo`, `maxamo`, `fixed_charge`, `percent_charge`, `rate`, `val1`, `val2`, `status`, `created_at`, `updated_at`) VALUES
(101, 'PayPal', 'PayPal', 'paypal.png', '5', '1000', '0.511', '2.52', '80', 'dafuture355@gmail.com', '', 1, NULL, '2018-06-21 11:59:34'),
(102, 'PerfectMoney', 'Perfect Money', 'perfectmoney.png', '20', '20000', '2', '1', '80', 'U5376900', 'G079qn4Q7XATZBqyoCkBteGRg', 1, NULL, '2018-05-20 11:58:59'),
(103, 'Stripe', 'Stripe', 'stripe.png', '20', '20000', '2', '1', '80', 'sk_test_4eC39HqLyjWDarjtT1zdp7dc', 'G079qn4Q7XATZBqyoCkBteGRg', 1, NULL, '2018-05-20 11:58:59'),
(104, 'Skrill', 'Skrill', 'skrill.png', '10', '50000', '3', '3', '80', 'demoqco@sun-fish.com', 'skrill', 1, NULL, '2018-05-20 12:01:09'),
(106, 'Voguepay', 'Voguepay', 'voguepay.png', '10', '50000', '3', '3', '80', '', 'sk_test_4eC39HqLyjWDarjtT1zdp7dc', 1, NULL, '2018-05-20 12:01:09'),
(107, 'Paystack', 'Paystack', 'paystack.png', '10', '50000', '3', '3', '80', 'pk_live_293d04f581857487ef9b5cd8cd0f843f7728c3be', NULL, 1, NULL, '2020-02-09 21:34:23'),
(108, 'Flutterwave', 'Flutterwave', 'flutterwave.png', '10', '50000', '3', '3', '80', 'FLWPUBK_TEST-31d61a13026483fc38f15f0e90232374-X', 'FLWSECK-03808c7b30689d75303a54ec1127cc9a-X', 1, NULL, '2018-05-20 12:01:09'),
(501, 'Blockchain.info', 'Blockchain BTC', 'blockchain.png', '1', '20000', '1', '0.5', '80', 'a5f1cf3b6b418fc6304ff7e186041b73c19c2d3e16dedac6c1cafa64704d1e2e', 'xpub6CjfQJqY6Ctz1ccjTpVR7NAqKAKgJ5XDbpbxM2MTRUhznBXoE7Lo8NW749FNZheLfC9EcqAh2RRRtjbQ2ztxXJmiwVnQZNWJxgfeFSphpQM', 1, NULL, '2020-06-30 16:26:16'),
(505, 'CoinPayment - BTC', 'CoinPayment BTC', 'coinpayment.png', '1', '50000', '0.51', '2.52', '80', '77f90f5d5cb242bec85eb1f4ec2e5cec6afee88ed0896965bb19887811040b2a', 'dDe9E59433F702a7220c8c71460500DAc023E199BF95d556d1cF4d8bE90609c0', 1, NULL, '2020-06-30 16:26:08'),
(506, 'CoinPayment - ETH', 'CoinPayment ETH', 'coinpayment.png', '1', '50000', '0.51', '2.52', '80', '77f90f5d5cb242bec85eb1f4ec2e5cec6afee88ed0896965bb19887811040b2a', 'dDe9E59433F702a7220c8c71460500DAc023E199BF95d556d1cF4d8bE90609c0', 1, NULL, '2020-06-30 16:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(32) NOT NULL,
  `image_link` varchar(128) NOT NULL,
  `image_link2` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `image_link`, `image_link2`, `created_at`, `updated_at`) VALUES
(1, 'images/logo_1608656769.png', 'images/favicon_1585938263.jpg', '2020-12-22 17:06:09', '2020-12-22 22:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(32) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` varchar(32) NOT NULL,
  `updated_at` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(4, 'AML Policy', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>', 1, '2019-07-31 11:43:14', '2019-11-11 01:21:30'),
(6, 'Diversity', '<header>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n<div>\r\n<div>\r\n<div>\r\n<h1>Diversity</h1>\r\n<p>Individuals. Ideas. Inspiration. Yes, we\'re open</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</header>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div data-nn-conditional=\"\">\r\n<div>\r\n<p>Diversity and inclusion matter in our business. An inclusive and diverse workforce makes us better leaders and contributes to a more innovative, dynamic and, ultimately, more successful company. And, variety helps us meet the needs of our diverse client base.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div data-nn-conditional=\"\">\r\n<h2 id=\"col1textimage\">Inclusiveness</h2>\r\n<div>\r\n<p>We promote inclusion and encourage open dialogue to draw out everyone\'s opinions and perspectives. We recognize a diverse range of contributions to keep our people energetic, engaged and inspired. And we are a signatory to the UN Standards of Conduct for Business regarding tackling LGBTI discrimination around the world.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div>\r\n<div data-nn-conditional=\"\">\r\n<h2 id=\"col2textimage\">Flexibility</h2>\r\n<div>\r\n<p>We offer a modern, flexible working environment. We work where and how it\'s most appropriate according to individual, role and team requirements.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 1, '2020-02-15 23:02:32', '2020-02-16 20:47:41'),
(7, 'Sponsoring', '<div class=\"pageheadline pageheadline__base\">\r\n<h2 class=\"pageheadline__title\"><span class=\"pageheadline__hl pageheadline__hl--xsmall\">The big picture</span></h2>\r\n</div>\r\n<div class=\"leadtext leadtext__base\">\r\n<div class=\"leadtext__rte\">\r\n<p>We&rsquo;re passionate about supporting the places where we live and work. Through our long-standing sponsorships of motor sports and contemporary art, we connect with communities in new and exciting ways every day. It&rsquo;s our way of understanding how the world works, one pit stop and brush stroke at a time.</p>\r\n</div>\r\n</div>', 1, '2020-02-15 23:06:08', '2020-02-15 23:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'ronnie@gmail.com', 'IFsbuBWs5ZgZcoQGMivzLXy8XCvOne', '2018-05-16 01:28:41', NULL),
(2, 'ronnie@gmail.com', 'fHkcBEMW78ef43pmSswx8kVHqLcgDx', '2018-05-23 00:19:47', NULL),
(3, 'ronnie@gmail.com', 'tNPjzNUcsdEYeSPCutmDy8VfbECMUY', '2018-05-23 00:28:28', NULL),
(4, 'ronniearea@gmail.com', 'GXtEiyl8MGzNwMR5tNdRCEI7dTyuVX', '2018-05-27 16:02:22', NULL),
(5, 'abirkhan75@gmail.com', 'Z6sHQHOATk5fluqi0vAJeyqzEd0ZXz', '2018-05-27 05:54:38', NULL),
(6, 'haha@haha.co', 'IDx0BrjOWN6p0FGFpmOdgG6wrdtqO2', '2018-05-28 21:20:01', NULL),
(7, 'haha@haha.co', 'dD4UFej2PEFSEmBil48SJPw1l2zUSv', '2018-05-28 21:26:54', NULL),
(8, 'haha@haha.co', 'gbchqenwrcLnZPhzdjAtpR92V8vwwm', '2018-05-28 21:51:15', NULL),
(9, 'ronniearea@gmail.com', 'aDcOh1kIodnZh7xS1PIfWsQhMpgMdz', '2018-07-07 00:17:52', NULL),
(10, 'ronniearea@gmail.com', 'f1cIXMOls67f0fZTNgrabFt2gz1Tm3', '2018-07-07 00:18:43', NULL),
(11, 'ronniearea@gmail.com', 'otlQ1ZqDnK3fG4ppUJzah8vML0hbWZ', '2018-08-10 22:45:31', NULL),
(12, 'ronniearea@gmail.com', 'voucnaTSJ9zVb68fE89HFlTxpFV5ci', '2018-11-10 06:32:43', NULL),
(13, 'user@test.com', '4eUH4Lgx90OC18eXcDnlczyHNWcr2B', '2020-01-31 10:14:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `sub_cat` varchar(50) DEFAULT NULL,
  `percent` varchar(32) DEFAULT NULL,
  `duration` varchar(128) NOT NULL,
  `period` varchar(32) NOT NULL,
  `min_deposit` varchar(128) NOT NULL,
  `amount` varchar(128) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `ref_percent` float DEFAULT NULL,
  `bonus` float DEFAULT NULL,
  `compound` double DEFAULT NULL,
  `image` varchar(32) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `name`, `description`, `category`, `sub_cat`, `percent`, `duration`, `period`, `min_deposit`, `amount`, `status`, `ref_percent`, `bonus`, `compound`, `image`, `created_at`, `updated_at`) VALUES
(6, 'Standard', 'Capitals are withdrawable', 'Investment', 'Crypto (bitcoin)', '5', '1', 'Month', '1000', '5000', 1, 5, 2.5, NULL, NULL, '2020-12-22 21:01:44', '2020-12-23 02:01:44'),
(7, 'silver', 'Capitals are withdrawable', 'Investment', 'Crypto (bitcoin)', '7.5', '1', 'Month', '5000', '20000', 1, 1.5, 5, NULL, NULL, '2020-12-22 20:58:04', '2020-12-23 01:58:04'),
(10, 'Gold', 'Capitals are withdrawable', 'Investment', 'Crypto (bitcoin)', '10', '2', 'Month', '20100', '50000', 1, 2.3, 7.5, NULL, NULL, '2020-12-22 21:00:58', '2020-12-23 02:00:58'),
(13, 'Elite', 'Capitals are withdrawable', 'Investment', 'Crypto (bitcoin)', '12.5', '2', 'Month', '50000', '200000', 1, 3, 10, NULL, NULL, '2020-12-22 21:04:11', '2020-12-23 02:04:11'),
(14, 'Platinum', 'Capitals are withdrawable', 'Investment', 'Crypto (bitcoin)', '15', '1', 'Month', '200001', '500000', 1, 5, 12.5, NULL, NULL, '2020-12-22 21:08:21', '2020-12-23 02:08:21'),
(15, 'Apple', 'Withdraw once in 7 days', 'Investment', 'Stock', '5', '1', 'Month', '499', NULL, 1, NULL, NULL, NULL, NULL, '2020-12-22 21:23:43', '2020-12-23 02:23:43'),
(16, 'Tesla', 'Withdraw once in 7 days', 'Investment', 'Stock', '5', '3', 'Week', '1999', NULL, 1, NULL, NULL, NULL, NULL, '2020-12-22 21:42:49', '2020-12-23 02:22:16'),
(17, 'Retail traders', 'LEVERAGE 1:500 Deposit and start trading your capital [experienced traders only]', 'Forex trade', NULL, NULL, '1', 'Day', '100', NULL, 1, NULL, NULL, NULL, NULL, '2020-12-23 02:48:45', '2020-12-23 02:48:45'),
(18, 'Automation trades', 'Profit share 70/30, we take 30', 'Forex trade', NULL, NULL, '1', 'Month', '5000', NULL, 1, NULL, NULL, NULL, NULL, '2020-12-23 02:53:16', '2020-12-23 02:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `profits`
--

CREATE TABLE `profits` (
  `id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `plan_id` int(32) NOT NULL,
  `amount` float NOT NULL,
  `profit` float NOT NULL,
  `status` int(2) NOT NULL,
  `trx` varchar(16) NOT NULL,
  `end_date` varchar(32) NOT NULL,
  `date` varchar(32) NOT NULL,
  `recurring` int(1) DEFAULT 0,
  `bonus` double DEFAULT NULL,
  `coupon` int(1) DEFAULT 0,
  `c_code` varchar(8) DEFAULT NULL,
  `c_percent` int(3) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profits`
--

INSERT INTO `profits` (`id`, `user_id`, `plan_id`, `amount`, `profit`, `status`, `trx`, `end_date`, `date`, `recurring`, `bonus`, `coupon`, `c_code`, `c_percent`, `created_at`, `updated_at`) VALUES
(100, 11, 6, 99, 60.39, 1, 'wmpsnWgOVYmzjaGO', '2021-10-03 08:20:44', '2020-04-03 08:20:44', 0, NULL, 0, NULL, NULL, '2020-08-03 10:00:29', '2020-08-03 09:00:29'),
(101, 11, 10, 600, 1281, 2, '4BnBHyiCnDY1DSmZ', '2020-07-31 17:46:00', '2020-05-31 17:46:00', 1, NULL, 0, NULL, NULL, '2020-08-01 21:21:25', '2020-08-01 20:21:25'),
(102, 11, 6, 199, 31.84, 1, 'IyQ6c3g4fdvbLkcX', '2022-01-01 21:58:03', '2020-07-01 21:58:03', 1, NULL, 0, NULL, NULL, '2020-08-03 10:00:29', '2020-08-03 09:00:29'),
(103, 11, 13, 1000, 1650, 1, 'OHWHhjlCvGDLpKq4', '2020-09-04 07:08:42', '2020-07-04 07:08:42', 0, NULL, 0, NULL, NULL, '2020-08-03 10:00:29', '2020-08-03 09:00:29'),
(109, 11, 6, 100, 15, 1, 'OHWmRxAQhyEbI54S', '2022-01-04 08:33:20', '2020-07-04 08:33:20', 0, NULL, 1, 'hjvdvv63', 12, '2020-08-03 10:00:29', '2020-08-03 09:00:29'),
(110, 11, 6, 100, 15, 1, 'jb3HlxyjGxj0zM9A', '2022-01-04 10:20:46', '2020-07-04 10:20:46', 0, NULL, 0, NULL, NULL, '2020-08-03 10:40:22', '2020-08-03 09:40:22'),
(111, 11, 6, 100, 15, 1, 'JRQXcLcoujruRtxU', '2022-01-04 10:20:59', '2020-07-04 10:20:59', 0, NULL, 1, 'hjvdvv63', 12, '2020-08-03 10:40:22', '2020-08-03 09:40:22'),
(112, 11, 10, 500, 525, 1, 'OYxiMA0wqLNQrpEO', '2020-09-04 10:34:01', '2020-07-04 10:34:01', 1, NULL, 0, NULL, NULL, '2020-08-03 10:40:22', '2020-08-03 09:40:22'),
(113, 34, 10, 500, 0, 1, '7PaWIxda9jcuWJVZ', '2020-09-04 14:52:13', '2020-07-04 14:52:13', 0, NULL, 0, NULL, NULL, '2020-07-04 13:52:13', '2020-07-04 13:52:13'),
(115, 37, 6, 150, 0, 1, 'VBOmD7DGYJ4ZtFGQ', '2022-01-22 14:32:26', '2020-07-22 14:32:26', 0, NULL, 0, NULL, NULL, '2020-07-22 13:32:26', '2020-07-22 13:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `ref_id` int(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`id`, `user_id`, `ref_id`, `created_at`, `updated_at`) VALUES
(1, 30, 11, '2020-02-19 23:26:48', '2020-02-19 22:25:52'),
(2, 33, 11, '2020-06-01 00:16:05', '2020-06-01 00:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `ref_earning`
--

CREATE TABLE `ref_earning` (
  `id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `ref_id` varchar(16) DEFAULT NULL,
  `referral` int(32) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_earning`
--

INSERT INTO `ref_earning` (`id`, `user_id`, `plan_id`, `ref_id`, `referral`, `amount`, `created_at`, `updated_at`) VALUES
(1, 30, 6, '4aV6EcszhLyVT1kg', 11, 10, '2020-06-06 18:45:48', '2020-02-20 07:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `reply_support`
--

CREATE TABLE `reply_support` (
  `id` int(32) NOT NULL,
  `ticket_id` varchar(32) NOT NULL,
  `reply` text NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_support`
--

INSERT INTO `reply_support` (`id`, `ticket_id`, `reply`, `status`, `created_at`, `updated_at`) VALUES
(1, '888883', 'hello', 0, '2020-02-14 09:02:40', '0000-00-00 00:00:00'),
(2, '888883', 'We are working on your issue', 0, '2020-02-14 09:02:40', '0000-00-00 00:00:00'),
(3, '888883', 'hi', 0, '2020-02-14 08:20:58', '2020-02-14 08:20:58'),
(4, '888883', 'sdfg', 1, '2020-02-15 13:47:56', '2020-02-15 13:47:56'),
(5, '888883', 'sdfg', 1, '2020-02-15 13:48:46', '2020-02-15 13:48:46'),
(6, '1581775991', 'ok', 1, '2020-02-19 15:24:24', '2020-02-19 15:24:24'),
(7, 'sHzyERi8sSOZ17hp', 'hey', 1, '2020-06-06 15:39:13', '2020-06-06 15:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `image_link` varchar(32) DEFAULT NULL,
  `review` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `occupation`, `image_link`, `review`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Jason Well', 'Forex trader', 'update_1581806819.jpg', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', 1, '2020-02-15 22:46:59', '2020-02-15 21:46:59'),
(12, 'JacK Mill', 'Market analyst', 'update_1581806843.jpg', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', 1, '2020-02-15 22:47:23', '2020-02-15 21:47:23'),
(13, 'Micheal Pete', 'Forex analyst', 'update_1581806792.jpg', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', 1, '2020-02-15 22:46:32', '2020-02-15 21:46:32'),
(14, 'Big brother', 'Web developer', 'update_1581806914.jpg', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', 1, '2020-02-15 22:48:34', '2020-02-15 21:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(32) NOT NULL,
  `title` text NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Industry best practices', 'braille', 'Express4x supports a variety of the most popular digital currencies.', '2020-12-22 22:28:55', '2020-12-23 03:28:55'),
(2, 'Protected by insurance', 'certificate', 'Cryptocurrency stored on our servers is covered by our insurance policy.', '2020-02-18 17:26:44', '2020-02-18 16:26:44'),
(3, 'Secure Storage Facility', 'puzzle-piece', 'We store the vast majority of the digital assets in secure offline storage.', '2020-05-29 07:26:08', '2020-02-18 16:31:49'),
(4, 'Account Certified Privacy', 'coffee', 'We will never share your private data without your permission', '2020-06-01 00:48:12', '2020-02-18 16:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(32) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `site_name` varchar(200) DEFAULT NULL,
  `site_desc` text DEFAULT NULL,
  `tawk_id` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `mobile` varchar(128) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `balance_reg` double DEFAULT NULL,
  `email_notify` int(2) DEFAULT NULL,
  `sms_notify` int(2) DEFAULT NULL,
  `kyc` int(2) DEFAULT NULL,
  `email_verification` int(2) DEFAULT NULL,
  `sms_verification` int(2) DEFAULT NULL,
  `registration` int(2) DEFAULT NULL,
  `withdraw_charge` varchar(191) DEFAULT NULL,
  `transfer_charge` int(3) DEFAULT NULL,
  `referral` int(2) NOT NULL DEFAULT 0,
  `recaptcha` int(1) DEFAULT 0,
  `language` int(1) DEFAULT 1,
  `blog` int(1) DEFAULT 1,
  `d_c` varchar(8) DEFAULT NULL,
  `m_c` varchar(8) DEFAULT NULL,
  `s_c` varchar(8) DEFAULT NULL,
  `services` int(1) DEFAULT 0,
  `plan` int(1) DEFAULT 0,
  `review` int(1) DEFAULT 0,
  `team` int(1) DEFAULT 0,
  `stat` int(1) DEFAULT 0,
  `contact` int(1) DEFAULT 0,
  `faq` int(1) DEFAULT 0,
  `upgrade_status` int(1) NOT NULL DEFAULT 0,
  `upgrade_fee` double DEFAULT NULL,
  `transfer` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `site_name`, `site_desc`, `tawk_id`, `email`, `mobile`, `address`, `balance_reg`, `email_notify`, `sms_notify`, `kyc`, `email_verification`, `sms_verification`, `registration`, `withdraw_charge`, `transfer_charge`, `referral`, `recaptcha`, `language`, `blog`, `d_c`, `m_c`, `s_c`, `services`, `plan`, `review`, `team`, `stat`, `contact`, `faq`, `upgrade_status`, `upgrade_fee`, `transfer`, `created_at`, `updated_at`) VALUES
(1, 'The easiest place to invest', 'Expres4x', 'Expres4x platform is at your service with its user-friendly features, secure infrastructure that make a difference.', NULL, 'admin@express4x.com', '+1234567894, +2345666666', '47 Nungua Link Road 2nd Floor,\r\nBigboss,England', 10, 1, 0, 1, 1, 0, 1, '4', 5, 1, 0, 1, 1, '#ffffff', '#f9f0e1', '#efb028', 1, 1, 1, 1, 1, 1, 1, 0, NULL, 0, '2020-12-22 22:08:50', '2020-12-23 03:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(2) NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'https://facebook.com/', '2020-02-09 08:09:22', '2020-02-09 07:09:22'),
(2, 'instagram', 'https://instagram.com/', '2020-01-24 22:09:58', '0000-00-00 00:00:00'),
(3, 'twitter', 'https://twitter.com/', '2020-01-24 22:09:58', '0000-00-00 00:00:00'),
(4, 'skype', NULL, '2020-02-15 22:59:58', '2020-02-15 21:59:58'),
(5, 'pinterest', NULL, '2020-02-15 23:00:20', '2020-02-15 22:00:20'),
(7, 'linkedin', NULL, '2020-02-15 23:00:07', '2020-02-15 22:00:07'),
(8, 'youtube', NULL, '2020-02-15 22:59:48', '2020-02-15 21:59:48'),
(9, 'whatsapp', 'https://whatsapp.com/', '2020-02-09 08:09:38', '2020-02-09 07:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(32) NOT NULL,
  `subject` text NOT NULL,
  `priority` varchar(8) NOT NULL,
  `message` text NOT NULL,
  `status` int(2) NOT NULL,
  `user_id` int(32) NOT NULL,
  `ticket_id` varchar(16) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `subject`, `priority`, `message`, `status`, `user_id`, `ticket_id`, `created_at`, `updated_at`) VALUES
(8, 'Issue with withdrawal', 'Low', 'Waiting for your reply', 0, 11, 'sHzyERi8sSOZ17hp', '2020-05-29 22:49:22', '2020-05-29 22:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `image` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `position`, `facebook`, `twitter`, `linkedin`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Alexey Titov', 'Chief Executive Officer', 'https://facebook.com/boomchart', 'https://facebook.com/boomchart', 'https://facebook.com/boomchart', 1, 'team_1596040896.jpg', '2020-07-29 16:41:36', '2020-07-29 15:41:36'),
(2, 'Alexey Titov', 'Chief Executive Officer', 'https://facebook.com/boomchart', 'https://facebook.com/boomchart', 'https://facebook.com/boomchart', 1, 'team_1596040864.jpg', '2020-07-29 16:41:04', '2020-07-29 15:41:04'),
(3, 'Alexey Titov', 'Chief Executive Officer', 'https://facebook.com/boomchart', 'https://facebook.com/boomchart', 'https://facebook.com/boomchart', 1, 'team_1596040879.jpg', '2020-07-30 10:20:28', '2020-07-30 09:20:28'),
(4, 'Micheal Pete', 'Technical Officer', 'https://facebook.com/', 'https://twitter.com/', 'https://twitter.com/', 1, 'team_1596040796.jpg', '2020-07-29 16:39:56', '2020-07-29 15:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(32) NOT NULL,
  `ref_id` varchar(32) NOT NULL,
  `amount` varchar(32) NOT NULL,
  `charge` int(11) DEFAULT NULL,
  `sender_id` int(32) NOT NULL,
  `receiver_id` int(32) DEFAULT NULL,
  `temp` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `ref_id`, `amount`, `charge`, `sender_id`, `receiver_id`, `temp`, `status`, `created_at`, `updated_at`) VALUES
(40, 'sxNNaeizYHPbkBHW', '1900', 100, 11, NULL, 'e@d.com', 2, '2020-06-01 01:01:37', '2020-06-01 00:01:37'),
(41, '0UygkuxjALvZSBD6', '6850', 150, 11, NULL, 'g@d.com', 2, '2020-05-26 21:56:22', '2020-05-26 20:56:22'),
(44, 'rvLA690yQ1iWtVr2', '1000', 50, 11, 34, NULL, 1, '2020-07-04 13:51:01', '2020-07-04 13:51:01'),
(45, 'Lh3YyBFrR4f3nRH8', '30', 2, 36, 11, NULL, 1, '2020-07-04 14:21:15', '2020-07-04 14:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `trending`
--

CREATE TABLE `trending` (
  `id` int(8) NOT NULL,
  `title` text NOT NULL,
  `details` text NOT NULL,
  `image` varchar(64) NOT NULL,
  `cat_id` int(32) NOT NULL,
  `views` int(32) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trending`
--

INSERT INTO `trending` (`id`, `title`, `details`, `image`, `cat_id`, `views`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Budget for Your Winter Trip to Cancun', '<p>It may be cold at home, but winter months are the peak season for Caribbean beaches, and for good reason: With beautiful scenery, tropical weather, and a dazzling array of adventure opportunities, a trip to sunny Mexico can be the perfect cure for the winter blues.</p>', 'post_1585828221.jpg', 2, 11, 1, '2020-06-12 09:03:35', '2020-06-12 08:03:35'),
(10, 'We are still choosing to help you grow your money and your confidence', '<p>We don&rsquo;t have a crystal ball, and can&rsquo;t predict when rates will change again, but we wanted to clearly communicate what&rsquo;s happening today. We believe that maintaining our high Protected Goals Account rates&mdash;and rewarding the choice to save&mdash;will help our customers continue to feel confident with their money.</p>', 'post_1585828243.jpg', 2, 2, 1, '2020-04-02 11:50:44', '2020-04-02 10:50:44'),
(11, 'Prioritize your savings goals based on what you really want.', '<p>You know you should be saving, but what should you save for first? Prioritizing your savings goals can be confusing. Here&rsquo;s how to sift through it all.</p>', 'post_1585828288.jpg', 2, 6, 1, '2020-04-03 17:08:24', '2020-04-03 16:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `trending_cat`
--

CREATE TABLE `trending_cat` (
  `id` int(8) NOT NULL,
  `categories` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trending_cat`
--

INSERT INTO `trending_cat` (`id`, `categories`, `created_at`, `updated_at`) VALUES
(2, 'Inspiration', '2020-01-24 22:13:56', '0000-00-00 00:00:00'),
(3, 'Company', '2020-01-24 22:13:56', '0000-00-00 00:00:00'),
(4, 'Engineering', '2020-01-24 22:13:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ui_design`
--

CREATE TABLE `ui_design` (
  `id` int(11) NOT NULL,
  `s6_title` text DEFAULT NULL,
  `s7_title` text DEFAULT NULL,
  `s8_title` text DEFAULT NULL,
  `s8_body` text DEFAULT NULL,
  `s7_body` text DEFAULT NULL,
  `s7_image` varchar(32) DEFAULT NULL,
  `s6_body` text DEFAULT NULL,
  `s6_image` varchar(32) DEFAULT NULL,
  `s5_title` text DEFAULT NULL,
  `s5_body` text DEFAULT NULL,
  `s4_title` text DEFAULT NULL,
  `s4_body` text DEFAULT NULL,
  `s4_image` varchar(32) DEFAULT NULL,
  `s3_title` text DEFAULT NULL,
  `s3_body` text DEFAULT NULL,
  `s3_image` varchar(32) DEFAULT NULL,
  `s2_image` varchar(32) DEFAULT NULL,
  `s2_title` text DEFAULT NULL,
  `s2_body` text DEFAULT NULL,
  `s1_title` text DEFAULT NULL,
  `header_title` text DEFAULT NULL,
  `header_body` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `item1_title` text DEFAULT NULL,
  `item1_body` text DEFAULT NULL,
  `item2_title` text DEFAULT NULL,
  `item2_body` text DEFAULT NULL,
  `item3_title` text DEFAULT NULL,
  `item3_body` text DEFAULT NULL,
  `team` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ui_design`
--

INSERT INTO `ui_design` (`id`, `s6_title`, `s7_title`, `s8_title`, `s8_body`, `s7_body`, `s7_image`, `s6_body`, `s6_image`, `s5_title`, `s5_body`, `s4_title`, `s4_body`, `s4_image`, `s3_title`, `s3_body`, `s3_image`, `s2_image`, `s2_title`, `s2_body`, `s1_title`, `header_title`, `header_body`, `created_at`, `updated_at`, `item1_title`, `item1_body`, `item2_title`, `item2_body`, `item3_title`, `item3_body`, `team`) VALUES
(1, 'Focused, Active Management of  High-Growth Digital Assets.', 'Backed by strong global partners', 'Diversify your investment porfolio', 'Express4x is fully legit and officially registered company whose activities are regulated by the financial control authorities under the jurisdiction of the United Kingdom. Accepting our terms of coorperation, you can be absolutely sure of getting a guaranteed profit and full return on your investment.', 'Express4x is backed by notable investors as well as some of the best payments companies on the planet.Pulvinar neque laoreet suspendisse interdum consectetur libero id faucibus. Ac felis donec et odio pellentesque diam volutpat commodo. Tristique magna sit amet purus gravida quis blandit.', 'section4_1608676039.png', 'Express4x Ltd is a registered investment platform providing digital asset investment management services to individuals. We provide a dynamic investment solution to clients in need of a self-operating portfolio, as well as a smart fund with flexible time and investment amount.Kingsmen Ltd is a registered investment platform providing digital asset investment management services to individuals. We provide a dynamic investment solution to clients in need of a self-operating portfolio, as well as a smart fund with flexible time and investment amount.Kingsmen Ltd is a registered investment platform providing digital asset investment management services to individuals. We provide a dynamic investment solution to clients in need of a self-operating portfolio, as well as a smart fund with flexible time and investment amount.', 'section6_1608675863.png', 'Build your savings without even trying.', 'Turn on Round-up Rules and start saving up effortlessly. Whenever you make a purchase, Goals make it easy to save for the things you want or want to do. There’s no need for spreadsheets or extra apps to budget and track your money.', 'One Of The Most Trusted Trading Platform', 'Here are a few reasons why you should choose us', 'section3_1608675627.png', 'Choose your pricing policy which affordable', 'The Experts Team', 'section2_1608675534.png', 'section1_1608675971.png', 'Explore an ever-expanding world of trading', 'Express4x, one of the best and safest crypto asset investment firm, was established to provide intelligent portfolios with its expert investors, customer-priority approach, safe and high-tech investment tools. Eliminating the risk factor to earn from digital assets, the platform is created to offer exclusive interest return.', 'Market leaders use app to reach their brand & business.', 'Get Free $100 On Every $5000 Deposit', 'Express4x platform is at your service with its user-friendly features, secure infrastructure and applications that make a difference.', '2020-02-21 07:12:02', '2020-12-23 03:30:20', 'Register', 'Only 1 minute and you\'re in. Enter the information you need to become a platform trader and start right away.', 'Invest', 'Invest and sit back. You can follow your investment status at any time and invest in limited time special offers.', 'Cashout anytime', 'Your investment is eligible to withdraw anytime after the first 24 hours.', 'Our dedicated team members that ensure you get your moneys worth');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `image` varchar(32) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `balance` varchar(64) NOT NULL,
  `profit` varchar(64) NOT NULL DEFAULT '0',
  `ref_bonus` varchar(64) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `ip_address` varchar(32) NOT NULL,
  `last_login` varchar(32) DEFAULT NULL,
  `kyc_link` varchar(32) DEFAULT NULL,
  `kyc_status` int(2) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `verification_code` varchar(191) NOT NULL,
  `sms_code` varchar(191) NOT NULL,
  `phone_verify` tinyint(4) NOT NULL,
  `email_verify` tinyint(4) NOT NULL,
  `email_time` datetime NOT NULL,
  `phone_time` datetime NOT NULL,
  `googlefa_secret` varchar(64) DEFAULT NULL,
  `fa_status` int(1) DEFAULT 0,
  `trade_share` varchar(3) DEFAULT 'on',
  `total_profit` int(32) DEFAULT 0,
  `trade_bonus` double DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fa_expiring` varchar(32) DEFAULT NULL,
  `upgrade` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `image`, `email`, `first_name`, `last_name`, `balance`, `profit`, `ref_bonus`, `password`, `phone`, `status`, `ip_address`, `last_login`, `kyc_link`, `kyc_status`, `remember_token`, `address`, `verification_code`, `sms_code`, `phone_verify`, `email_verify`, `email_time`, `phone_time`, `googlefa_secret`, `fa_status`, `trade_share`, `total_profit`, `trade_bonus`, `created_at`, `updated_at`, `fa_expiring`, `upgrade`) VALUES
(11, 'user', 'user1596040363avatar.jpeg', 'user@test.com', 'CEN', 'Bruce', '23410.03', '2206.2608', '160', '$2y$10$Mu4K74ihiCpF8qyBKk58F.94ek4zqePxAdtkjXmr12aUOHfmNG4B6', '123456783', 0, '::1', '2020-08-03 10:57:43', '', 0, '6MJY0iKmMpcSAi9wGCSmJUApNEZpl5IF4AylZtoy1454jxI1rGVoPQpWdAZY', '47 Nungua Link Road 2nd Floor, Bigboss,England', '', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 0, 'on', 3702, 0, '2020-01-26 16:37:07', '2020-08-03 09:57:43', NULL, 0),
(33, 'sjhvsss', NULL, 's@a.com', 'jhsdvh', 'sonjsjs', '10', '0', '0', '$2y$10$h.SIpDbDOOcDoCyBzPq.nOLDW9W2FSMXdtBxAGiciedWGGlL8Ji9m', NULL, 0, '::1', NULL, NULL, 0, NULL, NULL, 'CPKY6N', 'XPM5VB', 1, 0, '2020-06-01 01:21:05', '2020-06-01 01:21:05', NULL, 0, 'on', 3733, 0, '2020-06-01 00:16:05', '2020-06-01 00:16:05', NULL, 0),
(34, 'ddddd', NULL, 's@s.com', 'jdch', 'kjbcdb', '510', '0', '0', '$2y$10$u5tWyyBKVqh.NZi.W5VeAO1eoYpjaCxoy0MMJPPYjYtHlVw5Dzadu', NULL, 0, '::1', '2020-07-04 14:51:26', NULL, 0, NULL, NULL, 'KCC5CZ', '1QCXTP', 1, 1, '2020-06-11 08:34:32', '2020-06-11 08:34:32', NULL, 0, 'on', 244, 0, '2020-06-11 07:29:32', '2020-07-04 13:52:13', NULL, 0),
(38, 'mcjovial', NULL, 'jovial@email.com', 'jovial', 'emy', '10', '0', '0', '$2y$10$zrsXtfjsz8JynmYW5mOsz.ueBwqyrNJPIPzpsC2Jm2ohGO9ryZsiW', NULL, 0, 'UNKNOWN', '2020-12-22 19:37:23', NULL, 0, NULL, NULL, 'ML0AJM', 'VIWWLX', 1, 1, '2020-12-21 21:15:48', '2020-12-21 21:15:48', NULL, 0, 'on', 0, 0, '2020-12-22 02:10:48', '2020-12-23 00:37:23', NULL, 0),
(39, 'meyou', NULL, 'me@email.com', 'me', 'you', '10', '0', '0', '$2y$10$zQu09YZMscEDNW18e9tGs.T3hiKnEZmdP2EEzOKv860xw5.m5k6o2', NULL, 0, 'UNKNOWN', NULL, NULL, 0, NULL, NULL, 'EVXTAT', 'EA5WR5', 1, 0, '2020-12-21 21:47:06', '2020-12-21 21:47:06', NULL, 0, 'on', 0, 0, '2020-12-22 02:42:06', '2020-12-22 02:42:06', NULL, 0),
(40, 'meyoul', NULL, 'men@email.com', 'mel', 'you', '10', '0', '0', '$2y$10$p3PRYQ87lG8kFZ.0EI/9VuwufltwEdfZR2vOxiKwe77QPQYoLuAZG', NULL, 0, 'UNKNOWN', NULL, NULL, 0, NULL, NULL, 'VHU6JX', 'MKOL2F', 1, 1, '2020-12-21 22:01:15', '2020-12-21 22:01:15', NULL, 0, 'on', 0, 0, '2020-12-22 02:56:15', '2020-12-22 03:01:48', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawm`
--

CREATE TABLE `withdrawm` (
  `id` int(32) NOT NULL,
  `method` varchar(128) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawm`
--

INSERT INTO `withdrawm` (`id`, `method`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Bitcoin	', 0, '2020-01-30 08:25:31', '0000-00-00 00:00:00'),
(11, 'Litecoin', 0, '2020-01-30 08:25:31', '0000-00-00 00:00:00'),
(12, 'Bitcoin Cash', 0, '2020-01-30 08:25:31', '0000-00-00 00:00:00'),
(14, 'Stellar', 1, '2020-02-09 14:12:15', '2020-02-09 13:12:15'),
(15, 'Dash', 1, '2020-02-09 14:12:25', '2020-02-09 13:12:25'),
(16, 'Paypal', 1, '2020-02-09 14:12:34', '2020-02-09 13:12:34'),
(17, 'Perfect money', 1, '2020-02-09 14:13:12', '2020-02-09 13:13:12'),
(18, 'Skrill', 1, '2020-02-09 14:13:07', '2020-02-09 13:13:07'),
(19, 'Payu', 1, '2020-02-09 14:13:02', '2020-02-09 13:13:02'),
(20, 'Voguepay', 1, '2020-02-09 14:12:58', '2020-02-09 13:12:58'),
(21, 'Flutter wave', 1, '2020-02-09 14:12:04', '2020-02-09 13:12:04'),
(22, 'Paystack', 1, '2020-02-09 14:03:58', '2020-02-09 13:03:58'),
(23, 'Ethereum', 0, '2020-07-03 11:18:51', '2020-07-03 10:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `w_history`
--

CREATE TABLE `w_history` (
  `id` int(32) NOT NULL,
  `reference` varchar(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `amount` int(32) NOT NULL,
  `charge` int(11) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `coin_id` varchar(32) NOT NULL,
  `type` int(2) NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_history`
--

INSERT INTO `w_history` (`id`, `reference`, `user_id`, `amount`, `charge`, `status`, `coin_id`, `type`, `details`, `created_at`, `updated_at`) VALUES
(67, 'M2FLNRfjYhDWStB4', 11, 1000, NULL, 0, '16', 1, 'support@boomchart.com.ngn', '2020-07-25 10:37:27', '2020-07-25 09:37:27'),
(68, '1m0dcrG9mN0vieMI', 11, 3000, NULL, 0, '17', 2, '1234566773', '2020-04-02 14:30:25', '2020-04-02 13:30:25'),
(69, 'FYUAufw7CEvgtLqv', 11, 970, 30, 1, '16', 1, 'dafure355@gmail.com', '2020-06-09 15:25:08', '2020-06-09 14:25:08'),
(70, 'eaIVPDCXEwk2E7Ae', 11, 291, 9, 1, '17', 2, 'dafuture355@gmail.com', '2020-06-09 15:25:00', '2020-06-09 14:25:00'),
(71, '2aV6EcszhLyVT1kg', 11, 2910, 90, 1, '16', 2, 'dafuture355@gmail.com', '2020-06-09 15:24:52', '2020-06-09 14:24:52'),
(72, 'aHa2M9sMfD415V2V', 11, 960, 40, 0, '16', 2, 'dafuture355@gmail.com', '2020-06-10 09:35:40', '2020-06-10 09:35:40'),
(73, 'hTCl9UQ8vEGtvmWp', 11, 1040, 40, 0, '22', 2, 'fdgxhcjvkbln;m', '2020-07-12 14:35:40', '2020-07-12 14:35:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_site`
--
ALTER TABLE `about_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_bank`
--
ALTER TABLE `admin_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_transfer`
--
ALTER TABLE `bank_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etemplates`
--
ALTER TABLE `etemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profits`
--
ALTER TABLE `profits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_earning`
--
ALTER TABLE `ref_earning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_support`
--
ALTER TABLE `reply_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trending`
--
ALTER TABLE `trending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trending_cat`
--
ALTER TABLE `trending_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ui_design`
--
ALTER TABLE `ui_design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawm`
--
ALTER TABLE `withdrawm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `w_history`
--
ALTER TABLE `w_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_bank`
--
ALTER TABLE `admin_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `bank_transfer`
--
ALTER TABLE `bank_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `etemplates`
--
ALTER TABLE `etemplates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `profits`
--
ALTER TABLE `profits`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_earning`
--
ALTER TABLE `ref_earning`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reply_support`
--
ALTER TABLE `reply_support`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `trending`
--
ALTER TABLE `trending`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trending_cat`
--
ALTER TABLE `trending_cat`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ui_design`
--
ALTER TABLE `ui_design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `withdrawm`
--
ALTER TABLE `withdrawm`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `w_history`
--
ALTER TABLE `w_history`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
