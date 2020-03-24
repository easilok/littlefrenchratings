-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2020 at 10:15 PM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `littlefrench`
--

--
-- Dumping data for table `establishments`
--

INSERT INTO `establishments` (`id`, `name`, `address`, `parish`, `city`, `gps`, `telephone1`, `telephone2`, `telephone3`, `email`, `card`, `timetable`, `obs`, `user_id`, `locationsource_id`, `created_at`, `updated_at`) VALUES
(1, 'Taberna Londrina', 'Praça Dona Maria II, 1310', 'Famalicão', NULL, '41.406024, -8.519188', '+351964567896', NULL, NULL, 'londrina@gmail.dev', 0, NULL, 'WiFi, 41.406024, -8.519188', 1, 3, '2020-02-16 13:10:04', '2020-02-23 16:49:08');

--
-- Dumping data for table `plates`
--

INSERT INTO `plates` (`id`, `name`, `price`, `obs`, `user_id`, `establishment_id`, `created_at`, `updated_at`) VALUES
(1, 'Francesinha', 10.11, 'Carne de Novilho, molho de azeite', 1, 1, '2020-02-16 22:36:12', '2020-03-01 22:36:27'),
(2, 'Cachorro', 7.00, '', 1, 1, '2020-02-16 22:36:12', '2020-02-16 22:36:12'),
(4, 'Pica pau', 43.00, NULL, 1, 1, '2020-02-25 18:45:31', '2020-02-25 18:45:31');

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
(19, 'DMEY83qKgFRsOacqXnAo1DpRbXMaIXO5dsOaPgag.jpeg', 0, 1, 1, 1, 1, '2020-03-01 22:51:34', '2020-03-01 22:51:34');

--
-- Dumping data for table `tastes`
--

INSERT INTO `tastes` (`id`, `plate_id`, `user_id`, `visit_at`, `price`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2020-02-16 22:48:09', 10.00, '2020-02-16 22:48:09', '2020-02-16 22:48:09'),
(4, 2, 1, '2020-02-16 22:48:09', 6.00, '2020-02-16 22:48:09', '2020-02-16 22:48:09');

--
-- Dumping data for table `plate_rating`
--

INSERT INTO `plate_rating` (`plate_id`, `rating_id`, `user_id`, `taste_id`, `rating_value`, `rating_text`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 0, 'Não é mau mas já comi melhor', '2020-02-16 22:50:11', '2020-02-16 22:50:11'),
(1, 2, 1, 3, 2, '', '2020-02-16 22:50:11', '2020-02-16 22:50:11'),
(1, 3, 1, 3, 5, '', '2020-02-16 22:50:11', '2020-02-16 22:50:11'),
(2, 1, 1, 4, 0, 'Não é mau mas já comi melhor', '2020-02-16 22:50:11', '2020-02-16 22:50:11');

COMMIT;

