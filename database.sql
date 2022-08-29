-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 12:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `nairaearners`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `country_currency` varchar(100) NOT NULL,
  `country_symbol` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_currency`, `country_symbol`, `created_at`, `updated_at`) VALUES
(1, 'Nigeria', 'NGN', '₦', '2022-08-20 18:29:12', '2022-08-20 18:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(1) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_url` text NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_phone` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `site_description` text NOT NULL,
  `currency` varchar(5) DEFAULT 'USD',
  `currency_symbol` varchar(10) DEFAULT '$',
  `reg_bonus` varchar(11) NOT NULL DEFAULT '200',
  `min_withdraw` int(11) NOT NULL DEFAULT 10000,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_url`, `site_email`, `site_phone`, `seo_title`, `site_description`, `currency`, `currency_symbol`, `reg_bonus`, `min_withdraw`, `date_updated`) VALUES
(1, 'Naira Earners', 'http://localhost/nairaearners', 'info@nairaearners.com', '000000', 'Naira Earners', 'This things just snapped right off', 'USD', '$', '200', 10000, '2022-08-08 18:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `type` enum('1','0') NOT NULL,
  `tx_ref` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `type`, `tx_ref`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2000', '1', '', '1', '2022-08-25 18:56:23', '2022-08-25 18:56:23'),
(2, 1, '200', '1', '6307BDF4EA2BE', '1', '2022-08-25 19:22:45', '2022-08-25 19:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `email_verify` enum('0','1') NOT NULL DEFAULT '0',
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `user_role` enum('user','admin') NOT NULL DEFAULT 'user',
  `token_code` text NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `password`, `address`, `status`, `email_verify`, `city`, `province`, `country`, `ref`, `avatar`, `user_role`, `token_code`, `regdate`, `date_updated`) VALUES
(1, 'Ezenwa Hopekell', 'Hopekell', 'hopekell05@gmail.com', '08163406955', '$2y$10$vx3.EcK4F7FPdkkU7pTZTOFQRGXZtcwwqq9ar3xCP1i7gLk0gPUbi', '31 Ndoki Road Aba', '1', '1', 'Aba', 'Abia', 'Nigeria', NULL, NULL, 'admin', 'cb07ba07022576675e421fcc320b9d9f', '2022-08-13 23:03:00', '2022-08-13 23:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` varchar(50) NOT NULL DEFAULT '100.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `balance`) VALUES
(2, 1, '200');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user_id`, `method`, `amount`, `ref`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '', '10000', '6307E8599FCB4', '0', '2022-08-25 22:27:12', '2022-08-25 22:27:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `settings` ADD `ads_fee` VARCHAR(1000) NOT NULL AFTER `min_withdraw`;

CREATE TABLE `ads` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `user_id` INT(11) NOT NULL , `location` VARCHAR(255) NOT NULL , `ads` TEXT NOT NULL , `landing` TEXT NOT NULL , `status` ENUM('1','0') NOT NULL DEFAULT '0' , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `expires_at` DATETIME NOT NULL , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `ads` ADD `ads_id` VARCHAR(8) NOT NULL AFTER `user_id`;

COMMIT;
