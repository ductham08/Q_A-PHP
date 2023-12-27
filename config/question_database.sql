-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 09:39 AM
-- Server version: 8.0.16
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `question_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_history`
--

CREATE TABLE `exam_history` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `point` float NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `currentDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_history`
--

INSERT INTO `exam_history` (`id`, `id_user`, `id_topic`, `point`, `data`, `currentDate`) VALUES
(18, 11, 41, 10, 'a:2:{i:0;a:2:{s:2:\"id\";s:2:\"16\";s:6:\"answer\";s:1:\"2\";}i:1;a:2:{s:2:\"id\";s:2:\"17\";s:6:\"answer\";s:1:\"3\";}}', '2023-12-27 11:15:54'),
(19, 11, 42, 10, 'a:1:{i:0;a:2:{s:2:\"id\";s:2:\"18\";s:6:\"answer\";s:1:\"1\";}}', '2023-12-27 11:25:35'),
(20, 11, 42, 0, 'a:1:{i:0;a:1:{s:2:\"id\";s:2:\"18\";}}', '2023-12-27 14:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answerA` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answerB` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answerC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answerD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correctAnswer` int(11) NOT NULL,
  `currentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `id_topic`, `question`, `answerA`, `answerB`, `answerC`, `answerD`, `correctAnswer`, `currentDate`) VALUES
(16, 41, '1 + 1 = ?', '1', '2', '3', '4', 2, '2023-12-27'),
(17, 41, '1 + 2 = ?', '1', '2', '3', '4', 3, '2023-12-27'),
(18, 42, 'Tìm đáp án: 1 + 1 - 2 + 8 * 2 = ?', '16', '15', '10', '8', 1, '2023-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `currentDate` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `type`, `rank`, `currentDate`, `id_user`) VALUES
(41, 'Toán học Lớp 1', 1, 1, '2023-12-27', 1),
(42, 'Toán học lớp 2', 1, 1, '2023-12-27', 1),
(43, 'Văn học 10', 1, 3, '2023-12-27', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pasword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currentDate` date NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `full_name`, `pasword`, `currentDate`, `avatar`, `role`) VALUES
(11, 'admin@gmail.com', 'Thắm', '25f9e794323b453885f5181f1b624d0b', '2023-12-25', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_history`
--
ALTER TABLE `exam_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_history`
--
ALTER TABLE `exam_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
