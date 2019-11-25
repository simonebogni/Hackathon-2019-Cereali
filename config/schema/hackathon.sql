-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 01:01 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `item_key` varchar(255) NOT NULL,
  `item_value` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`item_key`, `item_value`, `note`) VALUES
('URL', 'localhost', 'Main site\'s URL');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `accountant_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `company_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Import'),
(2, 'Manifacturing'),
(3, 'Sale');

-- --------------------------------------------------------

--
-- Table structure for table `headquarters`
--

CREATE TABLE `headquarters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `max_hours` tinyint(3) UNSIGNED DEFAULT 8,
  `is_legal` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE `hours` (
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `headquarter_id` bigint(20) UNSIGNED NOT NULL,
  `go_in` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `go_out` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `product_area_id` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `product_area_id`) VALUES
(1, 'Flour', 'B'),
(2, 'Syrup', 'B'),
(3, 'Husked cereals', 'B'),
(4, 'Pig feed', 'C'),
(5, 'Chicken feed', 'C'),
(6, 'Sorghum', 'A'),
(7, 'Quinoa', 'A'),
(8, 'Corn', 'A'),
(9, 'Amaranth', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `product_areas`
--

CREATE TABLE `product_areas` (
  `id` char(1) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_areas`
--

INSERT INTO `product_areas` (`id`, `name`) VALUES
('C', 'Animal feed from production waste'),
('A', 'Cereals'),
('B', 'Gluten-free food');

-- --------------------------------------------------------

--
-- Table structure for table `product_batches`
--

CREATE TABLE `product_batches` (
  `id` bigint(20) NOT NULL,
  `quantity_sale_goal` int(11) NOT NULL,
  `quantity_online_sale_goal` int(11) NOT NULL,
  `ordinary_reference_date` datetime NOT NULL,
  `production_date` datetime NOT NULL,
  `expiry_date` datetime NOT NULL,
  `phytosanitary_information` text DEFAULT NULL,
  `packaging_provision` text DEFAULT NULL,
  `base_unit_price` decimal(10,2) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `closed_date` datetime DEFAULT NULL,
  `product_id` bigint(20) NOT NULL,
  `assigner_id` bigint(20) UNSIGNED NOT NULL,
  `assignee_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_batch_partitions`
--

CREATE TABLE `product_batch_partitions` (
  `id` bigint(20) NOT NULL,
  `quantity_sale_goal` int(11) NOT NULL,
  `advised_sale_price` decimal(10,2) NOT NULL,
  `focus_sale` tinyint(1) NOT NULL DEFAULT 0,
  `extraordinary_loss_value` decimal(10,2) NOT NULL DEFAULT 0.00,
  `extraordinary_loss_type` varchar(50) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `closed_date` datetime DEFAULT NULL,
  `product_batch_id` bigint(20) NOT NULL,
  `assigner_id` bigint(20) UNSIGNED NOT NULL,
  `assignee_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role_type_id` char(1) NOT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `product_area_id` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `role_type_id`, `department_id`, `product_area_id`) VALUES
('D3A', 'Sale Division Director - Area A', 'D', 3, 'A'),
('D3B', 'Sale Division Director - Area B', 'D', 3, 'B'),
('D3C', 'Sale Division Director - Area C', 'D', 3, 'C'),
('G3', 'Sale General Director', 'G', 3, NULL),
('S3A', 'Seller - Area A', 'S', 3, 'A'),
('S3B', 'Seller - Area B', 'S', 3, 'B'),
('S3C', 'Seller - Area C', 'S', 3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `role_types`
--

CREATE TABLE `role_types` (
  `id` char(1) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_types`
--

INSERT INTO `role_types` (`id`, `name`) VALUES
('D', 'Division Director'),
('G', 'General Director'),
('S', 'Seller');

-- --------------------------------------------------------

--
-- Table structure for table `shock_reports`
--

CREATE TABLE `shock_reports` (
  `id` bigint(20) NOT NULL,
  `shock_type_id` bigint(20) DEFAULT NULL,
  `shock_type_other` varchar(255) DEFAULT NULL,
  `damage_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shock_reports`
--

INSERT INTO `shock_reports` (`id`, `shock_type_id`, `shock_type_other`, `damage_amount`, `user_id`) VALUES
(1, NULL, 'Prova', '2000.00', 9),
(2, 5, '', '10000.00', 11),
(3, 5, '', '20000.00', 11),
(4, NULL, 'Prova', '0.00', 11),
(5, NULL, 'Prova', '0.00', 11),
(6, 4, '', '5000.00', 9);

-- --------------------------------------------------------

--
-- Table structure for table `shock_types`
--

CREATE TABLE `shock_types` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shock_types`
--

INSERT INTO `shock_types` (`id`, `name`) VALUES
(4, 'Arson'),
(5, 'Cyberattack'),
(1, 'Earthquake'),
(7, 'Intoxication cases'),
(8, 'Molds or fungi'),
(6, 'Spoiled product'),
(3, 'Theft'),
(2, 'Unavailable premises');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `role_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `city`, `role_id`) VALUES
(5, 'salegd@cerealgreen.com', '$2y$10$eh7n1FqXTE68Ju2KlMkcLORVEnZh5uaa1YqOYE8YWtrkgRR5kHb4C', 'Milano', 'G3'),
(6, 'saledda@cerealgreen.com', '$2y$10$eh7n1FqXTE68Ju2KlMkcLORVEnZh5uaa1YqOYE8YWtrkgRR5kHb4C', 'Milano', 'D3A'),
(7, 'saleddb@cerealgreen.com', '$2y$10$eh7n1FqXTE68Ju2KlMkcLORVEnZh5uaa1YqOYE8YWtrkgRR5kHb4C', 'Bologna', 'D3B'),
(8, 'saleddc@cerealgreen.com', '$2y$10$eh7n1FqXTE68Ju2KlMkcLORVEnZh5uaa1YqOYE8YWtrkgRR5kHb4C', 'Roma', 'D3C'),
(9, 'sa1@cerealgreen.com', '$2y$10$eh7n1FqXTE68Ju2KlMkcLORVEnZh5uaa1YqOYE8YWtrkgRR5kHb4C', 'Milano', 'S3A'),
(10, 'sa2@cerealgreen.com', '$2y$10$eh7n1FqXTE68Ju2KlMkcLORVEnZh5uaa1YqOYE8YWtrkgRR5kHb4C', 'Bologna', 'S3A'),
(11, 'sb1@cerealgreen.com', '$2y$10$eh7n1FqXTE68Ju2KlMkcLORVEnZh5uaa1YqOYE8YWtrkgRR5kHb4C', 'Roma', 'S3B'),
(12, 'sc1@cerealgreen.com', '$2y$10$eh7n1FqXTE68Ju2KlMkcLORVEnZh5uaa1YqOYE8YWtrkgRR5kHb4C', 'Bologna', 'S3C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`item_key`,`item_value`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`accountant_id`,`company_id`),
  ADD KEY `company_key` (`company_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `headquarters`
--
ALTER TABLE `headquarters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_key` (`user_id`);

--
-- Indexes for table `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`user_id`,`go_in`),
  ADD KEY `headquarter_key` (`headquarter_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `product_area_id` (`product_area_id`);

--
-- Indexes for table `product_areas`
--
ALTER TABLE `product_areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `product_batches`
--
ALTER TABLE `product_batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigner_id` (`assigner_id`),
  ADD KEY `assignee_id` (`assignee_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_batch_partitions`
--
ALTER TABLE `product_batch_partitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignee_id` (`assignee_id`),
  ADD KEY `assigner_id` (`assigner_id`),
  ADD KEY `product_batch_id` (`product_batch_id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `product_area_id` (`product_area_id`),
  ADD KEY `role_type_id` (`role_type_id`);

--
-- Indexes for table `role_types`
--
ALTER TABLE `role_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `shock_reports`
--
ALTER TABLE `shock_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shock_type_id` (`shock_type_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shock_types`
--
ALTER TABLE `shock_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `headquarters`
--
ALTER TABLE `headquarters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_batches`
--
ALTER TABLE `product_batches`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_batch_partitions`
--
ALTER TABLE `product_batch_partitions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shock_reports`
--
ALTER TABLE `shock_reports`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shock_types`
--
ALTER TABLE `shock_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`accountant_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `headquarters`
--
ALTER TABLE `headquarters`
  ADD CONSTRAINT `headquarters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hours`
--
ALTER TABLE `hours`
  ADD CONSTRAINT `hours_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `hours_ibfk_2` FOREIGN KEY (`headquarter_id`) REFERENCES `headquarters` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_area_id`) REFERENCES `product_areas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_batches`
--
ALTER TABLE `product_batches`
  ADD CONSTRAINT `product_batches_ibfk_1` FOREIGN KEY (`assignee_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_batches_ibfk_2` FOREIGN KEY (`assigner_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_batches_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_batch_partitions`
--
ALTER TABLE `product_batch_partitions`
  ADD CONSTRAINT `product_batch_partitions_ibfk_1` FOREIGN KEY (`assignee_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_batch_partitions_ibfk_2` FOREIGN KEY (`assigner_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_batch_partitions_ibfk_3` FOREIGN KEY (`product_batch_id`) REFERENCES `product_batches` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`product_area_id`) REFERENCES `product_areas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_ibfk_3` FOREIGN KEY (`role_type_id`) REFERENCES `role_types` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `shock_reports`
--
ALTER TABLE `shock_reports`
  ADD CONSTRAINT `shock_reports_ibfk_1` FOREIGN KEY (`shock_type_id`) REFERENCES `shock_types` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `shock_reports_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
