-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 06:30 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inner_co`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`) VALUES
(20, 2),
(16, 3),
(19, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cart_item_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_item_quantity` int(11) NOT NULL,
  `cart_item_price` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_price` double(4,2) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(1, 'Simple Cleanser', 20.50, 'Our special blend of Simple cleansing goodness containing Pro-Vitamin B5, Vitamin E, Mushroom Extract, Oat-Beta Glucan, Chamomile and Green Tea Extract, helps to moisturise, tone and gently cleanse the skin and help fight the signs of premature ageing.', 'assets/img/product/Simplecleanser2.jpg'),
(2, 'Simple Moisturizer', 17.00, 'Our Simple Moisturizer is a perfect blend of ingredients to help keep your skin replenished and hydrated for up to 12 hours. Perfect for even sensitive skin. It contains Pro-Vitamin B5 helps restore, soften, and smoothen skin, vitamin E moisturize and improves skin condition , and pH balanced formula suitable for all skin types', 'assets/img/product/simplemoisturizer.jpg'),
(3, 'Simple Toner', 19.00, 'Our Simple Toner is a perfect blend of ingredients for keeping your skin toned and refreshed. Perfect for even sensitive skin. Our special blend of Simple skin toning goodness containing Pro-Vitamin B5, Chamomile, Witch Hazel and Allantoin, helps to keep your skin toned and refreshed.', 'assets/img/product/simpletoner.jpg'),
(4, 'Hada Labo Cleanser', 28.00, 'Contains advanced skin hydrating ingredient - Super Hyaluronic Acid, with twice the moisture retention capacity of Hyaluronic Acid (1gm of Hyaluronic Acid is able to hold up 6 liters of water). Replenishes essential moisture to visibly improve skin texture and prevent dryness so skin stays soft, hydrated and supple.', 'assets/img/product/HadalaboCleanser.jpg'),
(5, 'Hada Labo Toner', 36.90, 'Combines 4 types of Hyaluronic Acid to deeply hydrate skin and help preserve its optimum moisture balance. Helps to improve dehydrated skin.  Light texture. Suitable for normal / combination / oily skin. Skin pH balanced. Low irritation. Free of fragrances, mineral oil, alcohol and colorant.', 'assets/img/product/HadalaboToner.jpg'),
(6, 'Hada Labo Moisturizer', 54.90, 'Hada Labo Moisturizer consist of 4 types of hyaluronic acid (HA): large-size, medium-size, Super and Nano HA that lock, replenish and store moisture deep in skin, layer by layer. Benefits:-Its ultra light weight watery gel texture satisfy skin an instant surge, leaving a breathable skin feel.-Skin is soft, smooth and supple-Prevent moisture loss-Allow deeper penetration into skin -Boost skin hydration level-Low irritation and skin pH balanced', 'assets/img/product/HadalaboMoisturizer.jpg'),
(7, 'Innissfree Cleanser', 40.00, 'A daily all blemish care foam cleanser that removes impurities effectively and clears pores thoroughly, leaving the skin feeling hydrated.', 'assets/img/product/InnisfreeCleanser.jpg'),
(8, 'Innisfree Toner', 70.00, 'Intense moisture bouncy water skin helps to replenish skin’s moisture for a hydrated, replenished and clearer skin.', 'assets/img/product/InnisfreeToner.jpg'),
(9, 'Innisfree Moisturizer', 64.00, 'A balancing cream for deep hydration and nourishment made from green tea and green tea seeds A moisturizing and nourishing cream containing eco-friendly Jeju fresh green tea & green tea seed. More moisturizing and refreshing than ever before!.', 'assets/img/product/InnisfreeMoisturizer.jpg'),
(10, 'Innisfree Essence', 90.00, 'The formula contains Jeju skin-protecting bija oil and effectively exfoliates and addresses excess sebum.', 'assets/img/product/InnisfreeEssence.jpg'),
(11, 'Innisfree Serum ', 99.99, 'A moisturizing serum with organic Jeju green tea and green tea seeds that hydrate your skin from deep within!', 'assets/img/product/InnisfreeSerum.jpg'),
(12, 'Innisfree Clay Mask', 35.00, 'A clay mask formulated with Jeju volcanic clusters to intensively absorb excess oil and cleanse the pores.', 'assets/img/product/claymask.jpg'),
(13, 'Hada Labo Hydrating Mask', 6.90, 'Inspired by traditional Japanese sake brewing is the birth of the signature ingredient ‘Kouji’. ‘Kouji’ is the secret to the sake brewers keeping their hands smooth and youthful. It is derived from Hydrolyzed Rice Extract which is full of Vitamins, Amino Acids, Minerals and Natural Moisturizing Ingredients to keep skin soft, supple and crystal clear. Contains 21ml of Kouji Essence. Soft mask gently wraps and adhere to the skin to deeply hydrate and improve skin elasticity. A unique 3 layer mask to effectively locks in essence for optimum results.Low irritation. Free of fragrances, colorants, mineral oil and MIT preservative.', 'assets/img/product/HadalaboSheetMask.jpg'),
(14, 'Simple Cleansing Water ', 23.00, 'All skin can occasionally feel sensitive, but why is it that it seems to flare up just in time for that first date, job interview or big night out? It doesn\'t always have to be that way! With a skincare routine that’s tailor-made for sensitive skin, you’ll not only help keep skin feel calmer with some savvy TLC, you’ll be ready to fight off the first signs of sensitivity when they appear.', 'assets/img/product/SimpleCleansingWater.jpg'),
(15, 'Simple Facial Scrub', 19.30, 'Our Simple Facial Scrub is the perfect blend of ingredients for removing dead skin cells and for keeping your skin brighter and more even textured. Perfect for even sensitive skin. \r\nFor best results, apply a small amount to damp face and neck. Massage in circular movements with fingertips avoiding the eye area. Rinse away with plenty of water. Use once a week on normal/dry skin and twice a week on oily skin. Our special blend of Simple cleansing goodness containing Pro-Vitamin B5, Vitamin E and Rice Granules, helps to gently exfoliate and improve skin condition.\r\n', 'assets/img/product/SimpleScrub.jpg'),
(16, 'Hada Labo Cleansing Oil', 41.20, 'Infused with 4 types of Beauty Oils to richly nourish skin and gently melt away all types of make-up, leaving skin feeling clean, balanced and moisturized. With enhanced cleansing ability to remove impurities and stubborn make-up, including waterproof make-up and sunscreen.  Enriched with 2 types of HA to deeply hydrate skin, leaving skin moisturized, nourished and radiant-looking. Anti-Pollutant Formula – contains Moringa Oleifera Seed Oil to protect the skin against environmental pollution and reduce the ability of pollution particles from adhering to skin. Low irritation – free of preservatives, alcohol, fragrance, colorant and mineral oil.', 'assets/img/product/Hadalabocleansingoil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_firstname` text NOT NULL,
  `sales_lastname` text NOT NULL,
  `sales_phone` varchar(11) NOT NULL,
  `sales_address` text NOT NULL,
  `sales_postal` varchar(5) NOT NULL,
  `sales_city` text NOT NULL,
  `sales_state` text NOT NULL,
  `sales_grandtotal` double(5,2) NOT NULL,
  `sales_timestamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `user_id`, `sales_firstname`, `sales_lastname`, `sales_phone`, `sales_address`, `sales_postal`, `sales_city`, `sales_state`, `sales_grandtotal`, `sales_timestamp`) VALUES
(13, 2, 'test', 'test', '0123456789', 'test', '12345', 'test', 'Sabah', 28.00, '1611499001'),
(14, 2, 'test', 'test', '0123456789', 'test', '12345', 'test', 'Sabah', 97.20, '1611499378'),
(15, 2, 'test', 'test', '0123456789', 'test', '12345', 'test', 'Sabah', 36.00, '1611503416'),
(17, 4, 'test', 'test', '0123456789', 'test', '12345', 'test', 'Sabah', 28.00, '1611503454'),
(18, 2, 'abc', 'def', '0123456789', 'test', '12345', 'test', 'Sabah', 76.10, '1611506445');

-- --------------------------------------------------------

--
-- Table structure for table `sales_item`
--

CREATE TABLE `sales_item` (
  `sales_item_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sales_item_quantity` int(11) NOT NULL,
  `sales_item_price` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_item`
--

INSERT INTO `sales_item` (`sales_item_id`, `sales_id`, `product_id`, `sales_item_quantity`, `sales_item_price`) VALUES
(13, 13, 4, 1, 28.00),
(14, 14, 4, 2, 56.00),
(15, 14, 16, 1, 41.20),
(16, 15, 3, 1, 19.00),
(17, 15, 2, 1, 17.00),
(18, 17, 4, 1, 28.00),
(19, 18, 4, 1, 28.00),
(20, 18, 16, 1, 41.20),
(21, 18, 13, 1, 6.90);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_email` text NOT NULL,
  `user_rank` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_rank`) VALUES
(2, 'test', '123456', 'test@gmail.com', 1),
(3, 'Admin', 'admin', 'admin@gmail.com', 3),
(4, 'partner', 'partner', 'partner@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sales_item`
--
ALTER TABLE `sales_item`
  ADD PRIMARY KEY (`sales_item_id`),
  ADD KEY `sales_id` (`sales_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales_item`
--
ALTER TABLE `sales_item`
  MODIFY `sales_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sales_item`
--
ALTER TABLE `sales_item`
  ADD CONSTRAINT `sales_item_ibfk_1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`),
  ADD CONSTRAINT `sales_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
