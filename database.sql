-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 12:11 AM
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
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ads_id` varchar(8) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ads` text DEFAULT NULL,
  `landing` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `expires_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `user_id`, `ads_id`, `location`, `ads`, `landing`, `status`, `created_at`, `expires_at`, `updated_at`) VALUES
(1, 1, '12345678', '500X500', 'banner.jpg', 'https://example.com', '0', '2022-08-26 07:53:18', '2022-09-26 07:51:31', '2022-08-26 07:53:18'),
(2, 1, '955966', '580x400', '1661725517_logo-part2.png', 'https://lodag', '1', '2022-08-28 23:25:17', '2022-09-28 10:10:11', '2022-08-28 23:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `beneficiary` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `user_id`, `bank_name`, `beneficiary`, `account_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'GTB', 'Ezenwa Hope', '0263450629', '2022-08-31 21:15:14', '2022-08-31 21:15:14');

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
-- Table structure for table `crypto_wallets`
--

CREATE TABLE `crypto_wallets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `usdt` text DEFAULT NULL,
  `busd` text DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crypto_wallets`
--

INSERT INTO `crypto_wallets` (`id`, `user_id`, `usdt`, `busd`, `updated_at`) VALUES
(1, 1, 'rrrrrrrrrrrrrrrrrrrrr', NULL, '2022-09-04 16:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `frontend`
--

CREATE TABLE `frontend` (
  `id` int(11) NOT NULL DEFAULT 1,
  `logo` text NOT NULL DEFAULT 'default',
  `icon` text NOT NULL DEFAULT 'default',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frontend`
--

INSERT INTO `frontend` (`id`, `logo`, `icon`, `updated_at`) VALUES
(1, '76965d6a96e0546d7c05e72ef6e8d976.png', 'a4c8cb1220adba0f5739032d45a76ffbpng', '2022-09-02 12:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` int(1) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `encryption` varchar(255) NOT NULL,
  `smtp_user` varchar(255) NOT NULL,
  `smtp_pass` varchar(255) NOT NULL,
  `smtp_email` varchar(255) NOT NULL,
  `smtp_from` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mail_settings`
--

INSERT INTO `mail_settings` (`id`, `smtp_host`, `smtp_port`, `encryption`, `smtp_user`, `smtp_pass`, `smtp_email`, `smtp_from`, `updated_at`) VALUES
(1, 'smtp.exaple.com', '465', 'ssl', 'mail@exaple.com', '1234567890', 'mail@exaple.com', 'Example Domain2', '2022-09-02 11:27:54');

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
  `ads_fee` varchar(11) NOT NULL DEFAULT '1000',
  `pstk_public_key` text DEFAULT NULL,
  `flw_public_key` text DEFAULT NULL,
  `bank_details` text DEFAULT NULL,
  `usdt_wallet` text DEFAULT NULL,
  `busd_wallet` text DEFAULT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_url`, `site_email`, `site_phone`, `seo_title`, `site_description`, `currency`, `currency_symbol`, `reg_bonus`, `min_withdraw`, `ads_fee`, `pstk_public_key`, `flw_public_key`, `bank_details`, `usdt_wallet`, `busd_wallet`, `date_updated`) VALUES
(1, 'Naira Earners', 'http://localhost/nairaearners', 'info@nairaearners.com', '1234567890', 'Naira Earners', 'This things just snapped right off', 'USD', '₦', '200', 10000, '1000', 'pk_test_80918e95a8c6c6b3179746faf7fd06d2031de9f0', NULL, NULL, NULL, NULL, '2022-09-02 09:18:01');

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
(2, 1, '200', '1', '6307BDF4EA2BE', '1', '2022-08-25 19:22:45', '2022-08-25 19:22:45'),
(3, 2, '200', '1', '630F601A97455', '1', '2022-08-31 14:20:26', '2022-08-31 14:20:26');

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
(1, 'Ezenwa Hopekell', 'Hopekell', 'hopekell05@gmail.com', '08163406955', '$2y$10$vx3.EcK4F7FPdkkU7pTZTOFQRGXZtcwwqq9ar3xCP1i7gLk0gPUbi', '31 Ndoki Road Aba', '1', '1', 'Aba', 'Abia', 'Nigeria', NULL, NULL, 'admin', 'cb07ba07022576675e421fcc320b9d9f', '2022-08-13 23:03:00', '2022-08-13 23:03:00'),
(2, 'Hope Ezenwa', 'Hopekell05', 'hopekelltech@gmail.com', '08163406955', '$2y$10$40CPbFu2W.V4y656BIftKuoZDGLiAcv.jn4YHC8H3OPyfxQ17gTwK', NULL, '1', '1', NULL, NULL, NULL, '', NULL, 'user', '837e2e2e96f4eaf5a4972d00417fc5ef', '2022-08-26 00:12:16', '2022-08-26 00:12:16');

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
(2, 1, '15200'),
(3, 2, '10200');

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
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user_id`, `method`, `amount`, `ref`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bank', '10000', '6307E8599FCB4', '2', '2022-08-25 22:27:12', '2022-08-25 22:27:21'),
(2, 2, 'Bank', '5000', '63088B9B24C4C', '2', '2022-08-26 10:00:11', '2022-08-26 10:00:11'),
(3, 1, 'Bank', '-4800', '63088BB11995E', '1', '2022-08-26 10:00:33', '2022-08-26 10:00:33'),
(4, 1, 'Bank', '1000', '63088BBC29ABC', '2', '2022-08-26 10:00:44', '2022-08-26 10:00:44'),
(5, 1, 'Bank', '-1200', '63088BD9D0B6B', '1', '2022-08-26 10:01:13', '2022-08-26 10:01:13'),
(6, 1, 'USDT', '10000', '6314C42C7900A', '2', '2022-09-04 16:28:44', '2022-09-04 16:28:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crypto_wallets`
--
ALTER TABLE `crypto_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD UNIQUE KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crypto_wallets`
--
ALTER TABLE `crypto_wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
