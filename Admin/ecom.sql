-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 06:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`) VALUES
(2, 'books', 1),
(3, 'Mens', 1),
(5, 'Accesories', 1),
(7, 'kids', 1),
(8, 'Womens', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` text NOT NULL,
  `subject` text NOT NULL,
  `comment` longtext NOT NULL,
  `added_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone_no`, `subject`, `comment`, `added_on`) VALUES
(3, 'Anurag', 'p98kuratkar@gmail.com', '8855012574', 'test', 'tesjhbkjnkjhjkhkjhjkhkjhkjhkjhk kjhk kj kjhkjhkjhkjhkjh kjhkjhkjhkjh kjkjh hkjhkjhlk; lkjltydg kgff', '2020-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `customer_name` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `mobile` text NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `item_name`, `customer_name`, `quantity`, `price`, `mobile`, `address`, `status`) VALUES
(14, 'Worlds Great Leaders', 'test test', 1, '89', '1234567890', 'test test test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `mrp` double NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(455) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `category`, `product_name`, `mrp`, `price`, `qty`, `image`, `description`, `status`) VALUES
(24, 5, 'Accesories', 'Zaveri Pearls Ring for Women (Green)', 470, 120, 1, 'Zaveri Pearls Ring for Women (Green).jpg', 'Brand	ZAVERI PEARLS\r\nResizable?	Y\r\nMaterial	Non Precious Metal\r\nModel Number	ZPFK9147\r\nRing Size﻿	Adjustable\r\nRing Size Lower Range	Adjustable\r\nRing Size Upper Range	Adjustable\r\nItem Length	3.03 Inches', 1),
(25, 2, 'books', 'Worlds Great Leaders', 149, 89, 3, 'Worlds great leaders.jpg', 'Biographies of inspirational personalities for kisds.\r\nA meticulously researched book, which celebrates the achievements of charismatic, powerful and influential leaders who have shaped world history. Age appropriate content, fun facts and bold illustrations will appeal to the curiosity of young inquisitive minds and help them develop their reading skills and General Knowledge.', 1),
(26, 3, 'Mens', 'test55', 250, 120, 1, '123997.jpg', 'test', 1),
(28, 3, 'Mens', 'car', 250, 120, 1, 'image.jpg', 'test', 1),
(30, 7, 'kids', 'Lotus fancy dress costume for kids (3-7 yrs)', 400, 150, 1, 'lotus costume.jpg', 'This LOTUS Flower costume is made up of Butter crepe material ( Durable Cotton) and is non-itching, Non-Allergic and very Hygienic for kids.\r\n\r\nThis costume includes:\r\n\r\nGreen Color Body Suit\r\nLotus Shaped Cutout\r\nLotus Leaves\r\n \r\n\r\nIt is suitable for kids in the age group of 3 to 7 years. It is easy to wear and will give nice and amazing look to your kids.', 1),
(31, 7, 'kids', 'Airforce Costume for Kids (3-7 YEARS)', 530, 210, 2, 'airforce costume.jpg', 'AIRFORCE Fancy Dress Costume inculcate your child as our helpers for our nation.  This Costume is made of Cotton and Easy to wear for kids. It can be used by both BOYS/ GIRLS. It’s free in size.\r\n\r\nThis costume includes:\r\n\r\nTop (Shirt)\r\nBottom(Pants)\r\nBelt\r\nCap\r\n It is suitable for kids in the age group of 3 to 7 years. It is easy to wear and will give nice and amazing look to your kids.', 1),
(32, 5, 'Accesories', 'Yellow Chimes Stainless Steel Ring for Men & Boys', 230, 70, 1, 'Yellow Chimes Stainless Steel Ring for Men & Boys.jpg', 'Classic, Weighty and Durable, excellent scratch resistant performance. Perfect 8mm width, suitable for Men.\r\nPLATING - IPS process of plating makes it never fading of color, and keeps the shine.\r\nPREMIUM QUALITY: Pure surgical stainless steel is used to make this product, which doesnt cause any harm to skin. Nickel free and Lead free as per International Standards. No harm to health.\r\nPerfect 8mm width, Best suitable for Men.Size is US 9, which in 1.9', 1),
(33, 2, 'books', 'The Spy', 170, 70, 3, 'The Spy.jpg', 'In his new novel, Paulo Coelho, bestselling author of The Alchemist and Adultery, brings to life one of history\'s most enigmatic women: Mata Hari. \r\n\r\nHER ONLY CRIME WAS TO BE AN INDEPENDENT WOMAN\r\n \r\nWhen Mata Hari arrived in Paris she was penniless.  Within months she was the most celebrated woman in the city.\r\n \r\nAs a dancer, she shocked and delighted audiences; as a courtesan, she bewitched the era’s richest and most powerful men.\r\n \r\nBut as paran', 1),
(34, 2, 'books', 'The Secret', 325, 115, 1, 'The Secret.jpg', 'Regarded as a life-changing read by many readers, The Secret by Rhonda Byrne is a self-help book that embarks to motivate the reader about a universal paradigm about success that can be achieved though it remains hidden for most people. The book explores about unveiling this little secret which may transform how people look at things and lead them on to the road of success and true happiness.\r\n\r\nAccording to the author, the book makes proper use of th', 1),
(35, 2, 'books', 'Chanakya Neeti', 235, 95, 2, 'Chanakya Neeti.jpg', 'Strategies for Success\r\n“An action contemplated shouldn’t ever be advertised;\r\nBut kept a secret like a mantra, and revealed in time.”\r\nWe all feel stuck at times. There could be many reasons for this—issues at work, unhappy family life, financial troubles or embarrassing social situations. Most of us could use a little advice in these circumstances. Chanakya Neeti provides precisely that guidance to face life’s many daunting challenges.\r\nChanakya, th', 1),
(36, 5, 'Accesories', 'GIVA Silver Zircon Solitaire Pendant', 1299, 350, 1, 'pendant.jpg', 'GIVA is a premium, top quality silver jewelry brand serving customers with exquisite, minimalist and high-quality stylish jewelry in the latest fashion. Every jewelry sold by GIVA is designed by the in-house designing team and is sold directly to the consumers. All our jewelry is BIS hallmarked and tested for 100% purity. We currently sell in more than 10 countries worldwide. A perfect pearl necklace that reminds of the full moon, showering it’s light', 1),
(37, 5, 'Accesories', 'Natural Amethyst Pendant Pencil Shape Crystal Stone Pendant', 425, 147, 3, 'Natural Amethyst Pendant Pencil Shape Crystal Stone Pendant.jpg', 'Natural Crystal Stone Amethyst Pencil Pendant | Length : 30-35 mm | Width - 10-15 mm Approx. Charged By Reiki Grand Master & Vastu Expert\r\nNatural Healing Stone Pendant for Reiki Healing, Crystal Healing, Numerology, Tarot, Astrology & Feng Shui\r\n100% Authentic, Original and Natural Healing Stone / Crystal - small holes, crack marks on the surface or inside the stones are often visible\r\nMaterial : Natural Healing Stones See Images & Product Descriptio', 1),
(38, 7, 'kids', 'Police Costume for Kids (3-7 YRS)', 500, 200, 3, 'police costume.jpg', 'ARMY Fancy Dress Costume inculcate your child as our helpers for our nation.  This Costume is made of Cotton and Easy to wear for kids. It can be used by both BOYS/ GIRLS. It’s free in size.\r\n\r\nThis costume includes:\r\n\r\nTop (Shirt)\r\nBottom(Pants)\r\nBelt\r\nCap\r\n It is suitable for kids in the age group of 3 to 7 years. It is easy to wear and will give nice and amazing look to your kids.', 1),
(39, 7, 'kids', 'Military Costume', 450, 200, 3, 'military costume.jpg', 'Military Fancy Dress Costume inculcate your child as our helpers for our nation.  This Costume is made of Cotton and Easy to wear for kids. It can be used by both BOYS/ GIRLS. It’s free in size.\r\n\r\nThis costume includes:\r\n\r\nTop (Shirt)\r\nBottom(Pants)\r\nBelt\r\nCap\r\n It is suitable for kids in the age group of 3 to 7 years. It is easy to wear and will give nice and amazing look to your kids.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `mobile`, `address`) VALUES
(6, 'Rook', '$2y$10$xzl.HJEVYhekSMwD9.sZveCmgS24yRNt3rLf.CYRYHceCG3vcB7XK', '', '', 'p98kuratkar@gmail.com', '', ''),
(7, 'test', '$2y$10$S3d0s2oSZsRMsauiw16kq.ygGyqczHPh8LnCvoZKwaHsGOmOUv16W', 'test', 'test', 'test@test.com', '1234567890', 'test test test'),
(8, 'admin', '$2y$10$fmeBX2MSsdZsFfR/FKchReczr0dgBERzW.rByy1PCJ91bIiF3trWe', '', '', 'admin@support.com', '', ''),
(9, 'anurag', '$2y$10$LzGd9CMz84vyRhDs6c3M..GyoEK8ULkQ6CI6KJQAftwEK716bxUh6', 'Anurag', 'Kuratkar', 'p98kuratkar@gmail.com', '1234567890', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
