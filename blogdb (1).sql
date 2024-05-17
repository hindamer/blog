-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 10:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Post_Onee1', 'Baron Afanas is such self esteem and attitude goals. He wasaccidentally charred down to basically a torso, arm, and head', '2024-05-17 20:28:08'),
(2, 'Post_Twoo', 'Buried in the ground, thought dead. Came back in said form. Still lived his best life. Started his own family with The Sire and Hellhound.', '2024-05-13 22:42:31'),
(3, 'Post_Three', 'the fact that it was also added in because of crunch is a huge disappointment', '2024-05-13 22:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `secondName` varchar(30) DEFAULT NULL,
  `phoneNo` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `secondName`, `phoneNo`, `email`, `password`) VALUES
(10, 'admin', 'admin', '0100220400', 'admin@gmail.com', '$2y$10$MKsDj.d6h3.Cs6wB1J993u.'),
(12, 'alaa ', 'mohamed', '0100220400', 'alaa@gmail.com', '$2y$10$6k851Z40s7nCRuHjUMNdaOF'),
(13, 'yousef', 'mohsen', '0100701900', 'youseef@gmail.com', '$2y$10$7/1iYyEm6p5Rx22hSwD75.v'),
(14, 'hind', 'mohsen', '0100701900', 'hindmohsen2001@gmail.com', '$2y$10$YnZjkkMNrJTHbJ2bIy3pqu9'),
(15, 'noha', 'noha', '0100701900', 'noha@gmail.com', '$2y$10$QnEZ0iDcMSh2EAJqIDiLe.yjfgnfshA5nu8ovsoOBrYY3MmyLnyJS'),
(16, 'hala', 'hala', '0100701900', 'hala@gmail.com', '$2y$10$lK.4rYZ.XG8UkjL.ufThmurhdEUHV4CE05cggc5j/qs.iLtYqD6my'),
(17, 'haidy', 'hady', '0100220400', 'haidy@gmail.com', '$2y$10$bPje8BEUjnuJWGoeB2qkj.2uvUf4W6/0OChpiifPbB6eIY0nkLmz2'),
(18, 'hoda', 'ahmed', '0100701900', 'hoda@gmail.com', '$2y$10$LQ86YEZjvzGesUAZSozAfuQ9yBFq9cURG5GYFXcF6e8uU.X1gonfq'),
(19, 'alaa ', 'amer', '0100220400', 'alaa12@gmail.com', '$2y$10$vUMDO8bU8qjnS.mRBr33XeZ2L6jEBl5fFODPSURgHNnw28dL2UjOC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
