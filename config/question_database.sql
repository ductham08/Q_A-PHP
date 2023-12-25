-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 12:02 PM
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
  `currentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_history`
--

INSERT INTO `exam_history` (`id`, `id_user`, `id_topic`, `point`, `currentDate`) VALUES
(1, 11, 35, 0, '2023-12-25'),
(2, 11, 35, 0, '2023-12-25'),
(3, 11, 35, 0, '2023-12-25');

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
(1, 34, 'Dolore voluptatibus ', 'Non doloremque tempo', 'Incididunt dolore qu', 'Voluptates enim labo', 'Culpa ab molestias ', 3, '2023-12-21'),
(2, 34, 'Aliquip nostrud ut a', 'Sed eu nulla beatae ', 'Reiciendis non autem', 'Beatae officia ipsum', 'Nemo nemo reprehende', 4, '2023-12-21'),
(3, 34, 'Tempora quisquam hic', 'Consequat Omnis nat', 'Nostrum dolor non cu', 'Velit qui ullam est', 'Aliquip ullam cillum', 4, '2023-12-21'),
(4, 34, 'Provident dignissim', 'Qui ea aliqua Velit', 'Temporibus ex perfer', 'Eum dolores doloremq', 'Modi aut et ipsum co', 1, '2023-12-21'),
(5, 34, 'Cupidatat architecto', 'Fugit rerum esse co', 'Libero incididunt re', 'Error vitae officiis', 'Libero quia natus id', 2, '2023-12-21'),
(6, 34, 'Corrupti et culpa ', 'Dolore dolor ut iste', 'Sit incididunt exerc', 'Elit eligendi est ', 'Perspiciatis dolore', 1, '2023-12-21'),
(7, 35, 'Id tempor voluptatum', 'Eum et blanditiis et', 'Fugit velit illo be', 'Quisquam tempora eum', 'Harum minima rerum q', 2, '2023-12-22'),
(8, 35, 'Reprehenderit repudi', 'Do laboris perspicia', 'Et eos quia eum fug', 'Rerum in ad maiores ', 'Qui aliqua Consequa', 2, '2023-12-25');

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
(35, 'Molestias et veritat', 2, 1, '2023-12-21', 1),
(36, 'Sit est deserunt au', 3, 4, '2023-12-22', 1),
(37, 'Sed nulla veritatis ', 3, 4, '2023-12-25', 1);

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
(11, 'admin@gmail.com', 'Còm', '25f9e794323b453885f5181f1b624d0b', '2023-12-25', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
