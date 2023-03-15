-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 12:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postwatch_db`
--
CREATE DATABASE IF NOT EXISTS `postwatch_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `postwatch_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hashed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `image` blob DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `content`, `image`, `date`) VALUES
(4, 1, ' Top 10 Luxury Watches for Men', ' Are you looking for a luxurious watch to add to your collection or gift to someone special? Here are the top 10 luxury watches for men that are worth the investment.\r\n\r\n1.Rolex Submariner\r\nThe Rolex Submariner is an iconic watch that has been around since 1953. It has a sleek and timeless design that is perfect for any occasion. It is also durable and waterproof, making it a great choice for diving enthusiasts.\r\n\r\n2.Omega Speedmaster\r\nThe Omega Speedmaster is another classic watch that has been worn by astronauts and endorsed by NASA. It has a sporty and sophisticated look that can be dressed up or down. It also has a chronograph function that is perfect for timing events.\r\n\r\n3.Patek Philippe Nautilus\r\nThe Patek Philippe Nautilus is a luxury watch that is designed for the modern man. It has a unique octagonal shape and a sporty yet elegant design. It is also made with high-quality materials and has a complicated mechanical movement.\r\n\r\n4.Cartier Tank\r\nThe Cartier Tank is a watch that exudes elegance and sophistication. It has a rectangular shape and a simple yet refined design. It is perfect for formal occasions and can be worn with a suit or a tuxedo.\r\n\r\n5.Breitling Navitimer\r\nThe Breitling Navitimer is a pilot\'s watch that has a rugged and masculine design. It has a chronograph function and a slide rule bezel that can be used for navigation. It is also made with high-quality materials and is built to last.\r\n\r\n6.Audemars Piguet Royal Oak\r\nThe Audemars Piguet Royal Oak is a luxury watch that is known for its unique design. It has an octagonal shape and a brushed steel finish that is both sporty and elegant. It is also made with high-quality materials and has a complicated mechanical movement.\r\n\r\n7.IWC Portugieser\r\nThe IWC Portugieser is a classic watch that has a simple and elegant design. It has a round shape and a clean dial that is easy to read. It is also made with high-quality materials and has a mechanical movement that is known for its accuracy.\r\n\r\n8.Jaeger-LeCoultre Reverso\r\nThe Jaeger-LeCoultre Reverso is a watch that has a unique reversible case. It has a simple yet refined design and is perfect for formal occasions. It is also made with high-quality materials and has a complicated mechanical movement.\r\n\r\n9.Hublot Big Bang\r\nThe Hublot Big Bang is a watch that has a bold and modern design. It has a round shape and a skeletonized dial that is both sporty and sophisticated. It is also made with high-quality materials and has a complicated mechanical movement.\r\n\r\n10.Vacheron Constantin Patrimony\r\nThe Vacheron Constantin Patrimony is a watch that has a classic and timeless design. It has a round shape and a clean dial that is easy to read. It is also made with high-quality materials and has a mechanical movement that is known for its accuracy.', 0x75706c6f6164732f7761746368312e6a7067, '2023-03-11 20:57:24'),
(5, 1, 'The Classic Rolex Submariner Watch', 'The Rolex Submariner is an iconic dive watch that has been around since the 1950s. It has a classic and timeless design that is recognizable all over the world. The watch is made from high-quality materials and has a water resistance of up to 300 meters, making it perfect for divers and water sports enthusiasts. The Submariner is available in several variations, including different colors and materials, so there\'s a perfect Submariner for everyone. If you\'re looking for a reliable and stylish dive watch, the Rolex Submariner is a great choice.', 0x75706c6f6164732f7761746368322e6a7067, '2023-03-11 21:00:53'),
(8, 8, 'Ultimate Guide to Choosing the Perfect Watch', 'Watches are not just a tool for telling time, they are also a fashion statement and a reflection of one\'s personality. Choosing the perfect watch can be a daunting task, with so many brands, styles, and features to consider. In this ultimate guide, we will break down the key factors to consider when choosing a watch.\r\n\r\nPurpose and Occasion: The first thing to consider when choosing a watch is its purpose and the occasion you will be wearing it for. Is it for everyday wear or for special occasions? Will it be worn casually or formally? Answering these questions will help you narrow down your choices.\r\n\r\nStyle and Design: The style and design of a watch play a significant role in its overall appeal. Do you prefer a classic, timeless look or a more modern, edgy style? Do you prefer a watch with a leather strap or a metal bracelet? Consider your personal preferences and the overall aesthetic you are going for.\r\n\r\nFeatures and Functionality: Watches come with a range of features and functionalities, from basic timekeeping to advanced features like GPS, fitness tracking, and more. Determine which features are essential for you and which ones you can do without.\r\n\r\nBrand and Reputation: Choosing a reputable brand with a long-standing history in watchmaking is crucial. Not only does it guarantee the quality of the watch, but it also adds to the watch\'s overall value and prestige.\r\n\r\nMaterial and Durability: The material of the watch\'s case and strap can affect its durability and overall lifespan. Stainless steel, titanium, and ceramic are some of the most durable materials, while leather and rubber are more prone to wear and tear.\r\n\r\nPrice: Watches come in a wide range of prices, from affordable to luxurious. Set a budget for yourself and consider how much you are willing to spend on a watch.\r\n\r\nSize and Fit: A watch that fits well is not only comfortable to wear but also looks good on the wrist. Consider the size of the watch\'s case and strap, and make sure it fits comfortably on your wrist.\r\n\r\nIn conclusion, choosing the perfect watch requires careful consideration of several factors, including purpose, style, features, brand, material, price, and size. By following these guidelines, you can find a watch that not only tells time but also reflects your personality and style.', 0x75706c6f6164732f7761746368332e6a706567, '2023-03-15 23:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hashed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hashed`) VALUES
(1, 'usernenen', 'tushanshahid0@gmail.com', '$2y$10$Zbtni6C5Xewti3OS3tJKUOnU.P4KHYa10cdVymOZMeduh..dCxYmi'),
(8, 'Top G', 'topg@email.com', '$2y$10$b5fdcaJpAf8GsT3gvVxhhezFQ4bi6orA926coCYOe3ph2Hr.4BZjG'),
(9, 'Top G2', 'topg2@email.com', '$2y$10$5PxxOIHNvXaXIQ3ryKt27OLqaUjkhb87NmIoIovLPKNySEDCTSHiy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
