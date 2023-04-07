-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 06:48 PM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password_hashed`) VALUES
(1, 'AdminTopG', 'admin@admin.com', '$2y$10$Oi/dBuSNYANkiSG8/JTQTOoxS3jME6geu0A0NcadyG2jfYqaNMvg6');

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `date`) VALUES
(1, 8, 9, 'Great read!', '2023-03-19 01:19:50'),
(3, 8, 8, 'amazing!', '2023-03-19 09:35:27'),
(4, 8, 10, 'I never knew the intricacy and skill required in watch photography until reading this post! The way a photographer can capture the beauty and craftsmanship of a timepiece is truly remarkable. As a lover of luxury watches myself, I now have an even deeper appreciation for the artistry that goes into creating and photographing these pieces.', '2023-03-19 14:12:39'),
(5, 8, 9, 'Great guide on maintaining watches! Regular cleaning, proper storage, regular servicing, avoiding water and magnetic fields, and gentle handling are all essential for ensuring the longevity and functionality of your watch. Don\'t forget to replace batteries and straps as needed!', '2023-03-19 14:25:19'),
(6, 10, 10, 'Thank you for taking the time to comment Top G! ', '2023-03-19 14:28:19'),
(7, 8, 11, 'sdfsdf', '2023-04-01 03:18:07');

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

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `data`) VALUES
(1, 8, 8, '2023-03-31 18:08:42'),
(2, 8, 8, '2023-03-31 18:08:50'),
(3, 8, 13, '2023-03-31 18:11:49'),
(4, 8, 4, '2023-03-31 18:17:09'),
(5, 8, 5, '2023-03-31 18:17:27'),
(6, 8, 11, '2023-03-31 18:18:00'),
(7, 8, 5, '2023-03-31 18:20:59'),
(8, 8, 5, '2023-03-31 18:21:04'),
(9, 8, 5, '2023-03-31 18:21:06'),
(10, 8, 5, '2023-03-31 18:21:08'),
(11, 8, 5, '2023-03-31 18:21:35'),
(12, 8, 5, '2023-03-31 18:21:37'),
(13, 8, 5, '2023-03-31 18:21:38'),
(14, 8, 5, '2023-03-31 18:21:40'),
(15, 8, 5, '2023-03-31 18:21:41'),
(16, 8, 10, '2023-03-31 18:29:39'),
(17, 8, 12, '2023-03-31 19:47:54'),
(18, 9, 9, '2023-03-31 20:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_request`
--

CREATE TABLE `password_reset_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(8, 8, 'Ultimate Guide to Choosing the Perfect Watch', 'Watches are not just a tool for telling time, they are also a fashion statement and a reflection of one\'s personality. Choosing the perfect watch can be a daunting task, with so many brands, styles, and features to consider. In this ultimate guide, we will break down the key factors to consider when choosing a watch.\r\n\r\nPurpose and Occasion: The first thing to consider when choosing a watch is its purpose and the occasion you will be wearing it for. Is it for everyday wear or for special occasions? Will it be worn casually or formally? Answering these questions will help you narrow down your choices.\r\n\r\nStyle and Design: The style and design of a watch play a significant role in its overall appeal. Do you prefer a classic, timeless look or a more modern, edgy style? Do you prefer a watch with a leather strap or a metal bracelet? Consider your personal preferences and the overall aesthetic you are going for.\r\n\r\nFeatures and Functionality: Watches come with a range of features and functionalities, from basic timekeeping to advanced features like GPS, fitness tracking, and more. Determine which features are essential for you and which ones you can do without.\r\n\r\nBrand and Reputation: Choosing a reputable brand with a long-standing history in watchmaking is crucial. Not only does it guarantee the quality of the watch, but it also adds to the watch\'s overall value and prestige.\r\n\r\nMaterial and Durability: The material of the watch\'s case and strap can affect its durability and overall lifespan. Stainless steel, titanium, and ceramic are some of the most durable materials, while leather and rubber are more prone to wear and tear.\r\n\r\nPrice: Watches come in a wide range of prices, from affordable to luxurious. Set a budget for yourself and consider how much you are willing to spend on a watch.\r\n\r\nSize and Fit: A watch that fits well is not only comfortable to wear but also looks good on the wrist. Consider the size of the watch\'s case and strap, and make sure it fits comfortably on your wrist.\r\n\r\nIn conclusion, choosing the perfect watch requires careful consideration of several factors, including purpose, style, features, brand, material, price, and size. By following these guidelines, you can find a watch that not only tells time but also reflects your personality and style.', 0x75706c6f6164732f7761746368332e6a706567, '2023-03-15 23:27:42'),
(9, 9, 'Properly Maintain and Care for Your Watch', 'A watch is not just a tool for telling time, it is also a valuable accessory that requires proper maintenance and care to ensure its longevity and functionality. In this guide, we will discuss some of the best practices for maintaining and caring for your watch.\r\n\r\n1. Regular Cleaning: The first step to maintaining your watch is to keep it clean. Use a soft cloth to wipe the watch\'s case, strap, and crystal regularly to remove dirt, dust, and fingerprints. If the watch is water-resistant, you can also clean it with a mild soap and water solution.\r\n\r\n2. Avoid Exposure to Water: While some watches are designed to be water-resistant, it is still important to avoid exposing your watch to water whenever possible. If you do get your watch wet, dry it immediately to prevent water damage.\r\n\r\n3. Store Properly: When not in use, store your watch in a cool, dry place away from direct sunlight and moisture. Consider using a watch box or a watch roll to protect your watch from scratches and damage.\r\n\r\n4. Regular Servicing: Watches require regular servicing to ensure their proper functioning. The frequency of servicing depends on the type of watch and its usage. Mechanical watches require servicing every 3-5 years, while quartz watches can go up to 10 years without servicing.\r\n\r\n5. Avoid Magnetic Fields: Magnetic fields can affect the accuracy of your watch\'s timekeeping. Keep your watch away from strong magnetic fields, such as magnets, electronic devices, and speakers.\r\n\r\n6. Be Gentle: When adjusting the time or date on your watch, be gentle and avoid excessive force. Use the proper tools, such as a watch case opener or a spring bar tool, to avoid damaging the watch\'s case or strap.\r\n\r\n7. Replace Batteries and Straps: If your watch runs on a battery, replace it every 1-2 years to ensure its proper functioning. Similarly, if your watch\'s strap is worn out or damaged, replace it to avoid further damage to the watch.', 0x75706c6f6164732f7761746368342e706e67, '2023-03-15 23:37:42'),
(10, 10, 'Capturing Timeless Beauty: Exploring the Art of Watch Photography', 'Watch photography is a fascinating niche within the world of photography that requires a unique set of skills and techniques to capture the intricate details and beauty of timepieces. As timepieces are often small, complex and feature fine details, the photographer must be able to capture them in a way that highlights their beauty and craftsmanship.\r\n\r\nOne of the key challenges of watch photography is the reflection of light on the watch\'s surface, which can create unwanted glare and reflections. To overcome this, photographers use a range of lighting techniques, such as diffused lighting or polarizing filters, to reduce glare and capture the watch\'s details.\r\n\r\nAnother important aspect of watch photography is the composition of the shot. The photographer must consider the placement of the watch in the frame and how it will interact with the background, as well as the use of props and styling to enhance the overall image.\r\n\r\nIn addition to technical skills, a good watch photographer must also have a deep understanding and appreciation of the art of watchmaking. They must be able to understand the intricate details and craftsmanship of each timepiece, and convey this to the viewer through their photographs.\r\n\r\nWatch photography is often used in advertising, where images of luxury watches are used to promote a brand or product. However, it is also a popular genre among collectors and enthusiasts, who use photographs to document and share their own collections.\r\n\r\nOverall, watch photography is a challenging yet rewarding niche within the world of photography. It requires a unique set of skills and techniques, as well as a deep understanding and appreciation of the art of watchmaking. If you have a passion for both photography and watches, then watch photography may be the perfect niche for you to explore.', 0x75706c6f6164732f706f7374496d672e6a7067, '2023-03-19 06:07:54'),
(11, 10, 'Art of Watchmaking: A Brief Introduction', 'Watchmaking is a meticulous craft that involves both science and art. The process of making a watch is complex and requires skilled artisans who possess a deep understanding of the intricacies involved.\r\n\r\nHere are some of the key steps involved in the process of watchmaking:\r\n\r\nDesign: The first step in creating a watch is designing it. This involves sketching out the watch\'s appearance and function, and determining the materials that will be used.\r\n\r\nManufacturing: Once the design is complete, the manufacturing process can begin. This involves cutting and shaping the various components of the watch, such as the case, dial, and hands.\r\n\r\nAssembly: After all of the components have been manufactured, they are assembled into the final product. This includes fitting the hands onto the movement, placing the dial into the case, and attaching the strap or bracelet.\r\n\r\nTesting: Once the watch has been assembled, it must be thoroughly tested to ensure that it is accurate and functions properly. This includes testing the movement, water resistance, and other features.\r\n\r\nQuality Control: Finally, the watch undergoes a rigorous quality control process to ensure that it meets the manufacturer\'s standards. This involves inspecting every component of the watch and making any necessary adjustments or repairs.\r\n\r\nWatchmaking is an intricate and time-consuming process that requires both technical expertise and artistic skill. The result is a timepiece that not only tells time, but also reflects the artistry and craftsmanship that went into its creation.\r\n\r\n\r\n\r\n', 0x75706c6f6164732f706f7374496d67322e6a7067, '2023-03-19 06:31:08'),
(12, 8, 'History of the Wristwatch: From Fashion Accessory to Precision Timekeeping', 'The wristwatch has come a long way since its humble beginnings as a simple fashion accessory for women. Today, it is a precision timekeeping instrument that is essential for people in all walks of life. But how did we get from there to here?\r\n\r\nThe history of the wristwatch dates back to the late 19th century when pocket watches were the norm. Wristwatches were seen as a feminine accessory and were not widely accepted by men until the early 20th century. During World War I, wristwatches were issued to soldiers for practical reasons - it was much easier to tell the time on the battlefield with a wristwatch than a pocket watch.\r\n\r\nAs technology advanced, wristwatches became more accurate and reliable. In the 1960s, the introduction of quartz movements revolutionized the watch industry, making watches more affordable and accurate than ever before.\r\n\r\nToday, wristwatches are not just timekeeping instruments but also fashion statements and status symbols. From luxury Swiss brands to affordable Japanese models, there is a wristwatch for everyone. And with the rise of smartwatches, the wristwatch is once again evolving to meet the needs of modern consumers.\r\n\r\nWhether you prefer a classic mechanical watch or a high-tech smartwatch, the wristwatch is an enduring symbol of style, innovation, and precision timekeeping.', 0x75706c6f6164732f706f7374496d67332e6a7067, '2023-03-19 06:33:30'),
(13, 1, 'A Beginner\'s Guide to Watch Collecting', 'Are you new to the world of watch collecting? Whether you\'re looking to start a new hobby or just want to add a few timepieces to your collection, there are some key things to keep in mind. In this beginner\'s guide to watch collecting, we\'ll explore some tips and tricks to help you get started.\r\n\r\n\r\nDetermine Your Budget: Before you start collecting watches, it\'s important to determine your budget. Watch prices can vary greatly, from a few hundred dollars to tens of thousands. Decide how much you\'re willing to spend and stick to it.\r\n\r\nChoose Your Style: There are many different styles of watches to choose from, including dress watches, sports watches, and dive watches. Consider what type of watch would best fit your lifestyle and personal taste.\r\n\r\nDo Your Research: Once you\'ve decided on a style, do some research to find out what brands and models are popular within that category. Read reviews, watch YouTube videos, and browse online forums to get a better understanding of the options available to you.\r\n\r\nConsider Pre-Owned: If you\'re on a tight budget, consider purchasing pre-owned watches. You can find great deals on vintage and discontinued models, and some of these watches may even increase in value over time.\r\n\r\nInvest in Quality: While it may be tempting to purchase a cheaper watch to start your collection, investing in quality timepieces can pay off in the long run. Look for watches with solid movements, durable materials, and good resale value.\r\n\r\nBuild Relationships with Dealers: Building relationships with watch dealers can help you stay up-to-date on the latest models and trends. Dealers can also help you find rare and hard-to-find pieces for your collection.\r\n\r\n\r\nWatch collecting can be a rewarding hobby, but it\'s important to approach it with a plan and budget in mind. By doing your research, investing in quality, and building relationships with dealers, you can build a collection that reflects your personal style and taste.', 0x75706c6f6164732f706f7374496d67342e6a7067, '2023-03-19 06:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hashed` varchar(255) NOT NULL,
  `profile_pic` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hashed`, `profile_pic`) VALUES
(1, 'usernenen', 'tushanshahid0@gmail.com', '$2y$10$Zbtni6C5Xewti3OS3tJKUOnU.P4KHYa10cdVymOZMeduh..dCxYmi', NULL),
(8, 'Top G', 'topg@email.com', '$2y$10$b5fdcaJpAf8GsT3gvVxhhezFQ4bi6orA926coCYOe3ph2Hr.4BZjG', 0x75706c6f6164732f70726f506963312e6a7067),
(9, 'Top G2', 'topg2@email.com', '$2y$10$5PxxOIHNvXaXIQ3ryKt27OLqaUjkhb87NmIoIovLPKNySEDCTSHiy', NULL),
(10, 'JohnDoe99', 'johndoe@email.com', '$2y$10$.nEBvH/xP6JzNoZHF/P.7.h4MyWbCOW3Yr6fsGAADGd80ybKhiMLO', 0x75706c6f6164732f70726f506963322e6a7067);

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
-- Indexes for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
-- Constraints for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  ADD CONSTRAINT `password_reset_request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
