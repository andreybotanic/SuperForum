-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2013 at 04:16 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `creationdate` datetime NOT NULL,
  `creator` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `topic_id`, `creationdate`, `creator`, `text`) VALUES
(1, 1, '2013-11-12 09:54:03', 1, 'the text is so text and бугога'),
(1, 2, '2013-11-12 09:54:34', 1, 'i am a crocodile'),
(2, 1, '2013-11-12 09:56:07', 1, 'And another text is also text.'),
(3, 1, '2013-11-12 09:56:28', 1, 'But this text is not a text in fact'),
(4, 1, '2013-11-12 09:56:46', 1, 'Neither does this one.'),
(1, 3, '2013-11-12 10:14:30', 2, 'ÐšÑƒÐ¿Ð¸ ÑÐ»Ð¾Ð½Ð°)'),
(2, 3, '2013-11-12 10:16:06', 2, 'Ð‘Ð»Ð° Ð±Ð»Ð° Ð±Ð»Ð°'),
(1, 4, '2013-11-12 10:38:27', 1, 'text'),
(1, 5, '2013-11-14 11:32:26', 8, 'wewefdf'),
(2, 5, '2013-11-14 11:32:39', 8, 'reytyfgf'),
(3, 5, '2013-11-14 11:32:49', 8, 'rtyrtydfghf'),
(4, 5, '2013-11-14 11:32:58', 8, 'dsgfg'),
(5, 5, '2013-11-14 11:36:22', 1, 'srtyuhihugfdfghjkjhg'),
(6, 5, '2013-11-14 11:36:52', 1, 'dsfg'),
(1, 6, '2013-11-14 11:46:47', 1, 't'),
(1, 7, '2013-12-05 10:34:47', 1, 'Bugoga!!!!'),
(5, 1, '2013-12-16 16:46:11', 1, 'Я - нога, и я рублю кобыл.'),
(1, 0, '2013-12-19 01:41:41', 1, ''),
(1, 0, '2013-12-19 01:42:07', 1, ''),
(1, 0, '2013-12-19 01:51:22', 1, ''),
(1, 0, '2013-12-19 02:02:40', 1, ''),
(1, 0, '2013-12-19 02:03:20', 1, ''),
(1, 0, '2013-12-19 02:04:08', 1, ''),
(1, 0, '2013-12-19 02:04:45', 1, ''),
(1, 0, '2013-12-19 02:05:38', 1, ''),
(1, 0, '2013-12-19 02:06:01', 1, ''),
(2, 7, '2013-12-19 02:06:28', 1, 'fdgdfgdf'),
(3, 7, '2013-12-19 02:07:51', 1, 'sdfsdf'),
(4, 7, '2013-12-19 02:09:11', 1, 'gdfgsdfg'),
(5, 7, '2013-12-19 02:09:48', 1, ''),
(1, 0, '2013-12-19 02:16:12', 1, ''),
(6, 7, '2013-12-19 02:16:52', 1, 'dtgdsfhsfgh'),
(7, 7, '2013-12-19 02:18:53', 1, 'sdfsdfdgdfgdf'),
(8, 7, '2013-12-19 02:48:20', 1, ''),
(9, 7, '2013-12-19 02:50:04', 1, ''),
(10, 7, '2013-12-19 02:53:45', 1, 'adwwd'),
(11, 7, '2013-12-19 02:54:20', 1, 'wdwadwdasdasfdasf'),
(12, 7, '2013-12-19 03:11:25', 1, 'яяя ввв ыыы'),
(13, 7, '2013-12-19 03:12:01', 1, 'ddd ыыы ццц апп'),
(14, 7, '2013-12-19 03:16:02', 1, 'dsfsfdgfdg'),
(15, 7, '2013-12-19 03:16:23', 1, 'dsfdsfasdf'),
(16, 7, '2013-12-19 03:19:10', 1, ''),
(17, 7, '2013-12-19 03:19:28', 1, 'asdasd'),
(18, 7, '2013-12-19 03:19:43', 1, 'asdsadasd'),
(19, 7, '2013-12-19 03:19:53', 1, 'sadaswdwa'),
(20, 7, '2013-12-19 03:23:29', 1, 'asdsad'),
(21, 7, '2013-12-19 03:23:43', 1, 'asdsadsad'),
(22, 7, '2013-12-19 03:23:58', 1, 'sadsad'),
(23, 7, '2013-12-19 03:24:20', 1, 'asdsad'),
(24, 7, '2013-12-19 03:25:34', 1, 'sadsadas'),
(25, 7, '2013-12-19 03:57:43', 1, 'sadsad'),
(26, 7, '2013-12-19 03:58:02', 1, 'Хооин кема'),
(27, 7, '2013-12-19 03:58:27', 1, 'вввв'),
(28, 7, '2013-12-19 03:59:18', 1, 'sadsad'),
(29, 7, '2013-12-19 04:00:01', 1, 'dddd'),
(30, 7, '2013-12-19 04:01:13', 1, 'ddd сввы ф '),
(31, 7, '2013-12-19 04:01:29', 1, 'выавыа'),
(32, 7, '2013-12-19 04:01:38', 1, 'вввв'),
(33, 7, '2013-12-19 04:02:03', 1, 'аааа'),
(34, 7, '2013-12-19 04:03:05', 1, 'asdasd'),
(35, 7, '2013-12-19 04:03:18', 1, 'sadsad'),
(36, 7, '2013-12-19 04:04:31', 1, 'sadasdwad'),
(37, 7, '2013-12-19 04:07:41', 1, 'sadwdwad'),
(38, 7, '2013-12-19 04:08:38', 1, 'asdawdwad'),
(39, 7, '2013-12-19 04:08:46', 1, 'asdwdwad'),
(40, 7, '2013-12-19 04:08:52', 1, 'awdawdwdwa'),
(41, 7, '2013-12-19 04:09:04', 1, 'awdwadwadwa'),
(42, 7, '2013-12-19 04:11:51', 1, 'awdwada');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL,
  `creationdate` datetime NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `creationdate`, `title`, `creator`) VALUES
(1, '2013-11-12 09:54:03', 'theme 1', 1),
(2, '2013-11-12 09:54:34', 'just another theme', 1),
(3, '2013-11-12 10:14:30', 'I am a theme from another user', 2),
(4, '2013-11-12 10:38:27', 'theme 5', 1),
(5, '2013-11-14 11:32:26', 'I am a theme from another user', 8),
(6, '2013-11-14 11:46:47', 'the gosaimasu', 1),
(7, '2013-12-05 10:34:47', 'abrakadabra', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `nick` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `mail` text COLLATE utf8_unicode_ci NOT NULL,
  `regdate` datetime NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nick`, `password`, `mail`, `regdate`, `avatar`) VALUES
(1, 'delphist2008', '2b748f7b1d68aa857e86e8fe90048eda', 'delphist2008@gmail.com', '2013-10-31 10:08:46', 'userpic_1.png'),
(2, 'andreybotanic', '2b748f7b1d68aa857e86e8fe90048eda', 'a@a', '2013-11-12 10:13:51', 'userpic_2.bmp'),
(3, 'q', '2b748f7b1d68aa857e86e8fe90048eda', '1234@d', '2013-11-14 10:31:13', 'default.png'),
(4, 'ssdsad', 'db519bd0db772609639925a46ba54a74', '11@rrr', '2013-11-14 10:32:36', 'default.png'),
(5, '123', '2b748f7b1d68aa857e86e8fe90048eda', '1@w', '2013-11-14 11:07:17', 'default.png'),
(6, '131243', '2b748f7b1d68aa857e86e8fe90048eda', '1@4', '2013-11-14 11:08:37', 'default.png'),
(7, '2134', '2b748f7b1d68aa857e86e8fe90048eda', '1@e', '2013-11-14 11:10:07', 'default.png'),
(8, 'dewsw', '2b748f7b1d68aa857e86e8fe90048eda', '1@ee', '2013-11-14 11:31:53', 'default.png'),
(9, '1111', '2b748f7b1d68aa857e86e8fe90048eda', 'd@d', '2013-12-16 18:14:10', 'default.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
