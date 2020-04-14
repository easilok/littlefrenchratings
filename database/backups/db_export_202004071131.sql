-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2020 at 10:30 AM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `littlefrench`
--

--
-- Dumping data for table `configuration_user`
--

INSERT INTO `configuration_user` (`configuration_id`, `user_id`, `value`) VALUES
(1, 1, 'dark');

--
-- Dumping data for table `establishments`
--

INSERT INTO `establishments` (`id`, `name`, `address`, `parish`, `city`, `gps`, `telephone1`, `telephone2`, `telephone3`, `email`, `card`, `timetable`, `obs`, `user_id`, `locationsource_id`, `created_at`, `updated_at`) VALUES
(1, 'Taberna Londrina', 'Praça Dona Maria II, 1310', 'Famalicão', NULL, '41.406024, -8.519188', '+351964567896', NULL, NULL, 'londrina@gmail.dev', 0, NULL, 'WiFi, 41.406024, -8.519188', 1, 3, '2020-02-16 13:10:04', '2020-02-23 16:49:08'),
(2, 'Pizzaria Vieri', 'Rua Fernao Veloso 217', 'Esmoriz', 'Aveiro', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2020-03-08 17:44:09', '2020-03-08 17:44:09');

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `order`, `visible`, `cover`, `plate_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'francesinha_londrina.jpg', 0, 1, 0, 1, 1, '2020-02-24 15:33:53', '2020-03-01 22:51:34'),
(11, 'gXAE5on0H3FsKnNxeMuvYqwDW90J3zVIDmT2J3M0.jpeg', 0, 1, 0, 1, 1, '2020-03-01 22:25:02', '2020-03-01 22:51:34'),
(15, 'kkBp5dD6Wpju3vfg94Rg6wpBnhdLNRYw1iZKrZMI.jpeg', 0, 1, 0, 1, 1, '2020-03-01 22:36:27', '2020-03-01 22:51:34'),
(16, 'JQHS2Nlq5WZrGNdnG9DEh11jFB0Z0lWbsM0jwBsh.jpeg', 0, 1, 0, 1, 1, '2020-03-01 22:44:55', '2020-03-01 22:51:34'),
(17, 'BTL8BVYpCA99ehPRAxc9xIXLLa0V1Rmx4zAxwkE5.jpeg', 0, 1, 0, 1, 1, '2020-03-01 22:47:51', '2020-03-01 22:51:34'),
(18, '82BNtc603HbIjy1lADGwHBf3BGAOu8fJQM8T5tY2.jpeg', 0, 1, 0, 1, 1, '2020-03-01 22:50:05', '2020-03-01 22:51:34'),
(19, 'DMEY83qKgFRsOacqXnAo1DpRbXMaIXO5dsOaPgag.jpeg', 0, 1, 1, 1, 1, '2020-03-01 22:51:34', '2020-03-01 22:51:34'),
(20, '9DQvwbeIWgyWuTEqfSvMJPhksDerzRJ9MGMSxl4r.jpeg', 0, 1, 1, 2, 1, '2020-03-03 15:11:26', '2020-03-03 15:11:26'),
(21, 'DUjeJLzZ3fVFdbFUyWVdbx2yUzgvwl07r5pWl2aw.jpeg', 0, 1, 1, 29, 1, '2020-03-03 21:22:40', '2020-03-03 21:22:40'),
(22, 'Ms5VHk1C1RFogpbbUticVlTnGIYftBbnJsgtjIvR.png', 0, 1, 1, 30, 1, '2020-03-03 22:06:00', '2020-03-03 22:06:00'),
(23, 'ToHFBF3IS5YZSXoARjPCgx0QXI3Wme3ysVYfDoGm.jpeg', 0, 1, 0, 30, 1, '2020-03-03 22:06:00', '2020-03-03 22:06:00'),
(24, 'Pv05MVbyM63uUyQeZ4hXhLVIbB8Pzgwvhlc0B440.jpeg', 0, 1, 0, 30, 1, '2020-03-03 22:06:00', '2020-03-03 22:06:00'),
(25, 'eGAgnlH3I09lwAuEXqNBthHnE470KGCl33uJIeYA.jpeg', 0, 1, 0, 30, 1, '2020-03-03 22:06:00', '2020-03-03 22:06:00'),
(26, 'mJrwf8rOGuIBVTWZ6374RYI6fOc4v8WwriaGgrUh.jpeg', 0, 1, 0, 30, 1, '2020-03-03 22:06:00', '2020-03-03 22:06:00'),
(32, 'jlJGBiOQWCXo8ihqsoIe6T9XPROCJ0C4NtUl4c2p.jpeg', 0, 1, 1, 31, 1, '2020-03-08 18:10:31', '2020-03-08 18:10:31');

--
-- Dumping data for table `plates`
--

INSERT INTO `plates` (`id`, `name`, `price`, `obs`, `user_id`, `establishment_id`, `created_at`, `updated_at`) VALUES
(1, 'Francesinha', 10.11, 'Carne de Novilho, molho de azeite', 1, 1, '2020-02-16 22:36:12', '2020-03-01 22:36:27'),
(2, 'Cachorro', 7.00, NULL, 1, 1, '2020-02-16 22:36:12', '2020-03-03 15:11:26'),
(4, 'Pica pau', 43.00, NULL, 1, 1, '2020-02-25 18:45:31', '2020-02-25 18:45:31'),
(29, 'Hambúrger', 7.00, NULL, 1, 1, '2020-03-03 21:22:40', '2020-03-03 21:22:40'),
(30, 'O que houver', 1.00, NULL, 1, 1, '2020-03-03 22:05:59', '2020-03-03 22:05:59'),
(31, 'Francesinha', NULL, NULL, 1, 2, '2020-03-08 17:45:42', '2020-03-08 17:45:42');

--
-- Dumping data for table `plate_rating`
--

INSERT INTO `plate_rating` (`plate_id`, `rating_id`, `user_id`, `taste_id`, `rating_value`, `rating_text`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 0, 'Não é mau mas já comi melhor', '2020-02-16 22:50:11', '2020-02-16 22:50:11'),
(1, 2, 1, 3, 2, '', '2020-02-16 22:50:11', '2020-02-16 22:50:11'),
(1, 3, 1, 3, 5, '', '2020-02-16 22:50:11', '2020-02-16 22:50:11'),
(2, 1, 1, 4, 0, 'Patati Patata', '2020-03-24 11:47:49', '2020-03-24 11:47:49'),
(2, 2, 1, 4, 5, 'picante e polposo', '2020-03-24 11:47:50', '2020-03-24 11:47:50'),
(2, 3, 1, 4, 4, ' ', '2020-03-24 11:47:50', '2020-03-24 11:47:50');

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(5, 2),
(6, 1);

--
-- Dumping data for table `tastes`
--

INSERT INTO `tastes` (`id`, `plate_id`, `user_id`, `visit_at`, `price`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2020-02-16 22:50:11', 0.00, '2020-03-23 08:40:27', '2020-03-23 08:40:27'),
(4, 2, 1, '2020-03-19 00:00:00', NULL, '2020-03-23 08:48:46', '2020-03-23 08:48:46'),
(5, 29, 1, '2020-03-04 00:00:00', 12.00, '2020-03-24 12:22:49', '2020-03-24 12:22:49');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login_at`) VALUES
(1, 'admin', 'admin@littlefrench.dev', NULL, '$2y$10$o3oP1T6E823QhJCCGoBdLOY5wKThbOoJuwD5jQ0w.akIe01CKVsW.', NULL, '2020-03-23 08:26:47', '2020-03-23 08:26:47', NULL),
(2, 'Luis Pereira', 'luispereira.tkd@gmail.com', NULL, '$2y$10$aObTxCnA19jKF3.qSW8I..VpajDtn2Xt5zb.9834a7CxMt6GwGfDe', 'ib35aUStxhuS2LPmTsNqz68msCfu8qjv7H2v8BE8M9DlQ6BarHa3k7g8eCVE', '2020-03-10 19:05:47', '2020-03-10 19:07:53', NULL);
COMMIT;
