-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2026 at 12:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiect_bucatarie`
--

-- --------------------------------------------------------

--
-- Table structure for table `comenzi`
--

CREATE TABLE `comenzi` (
  `id_comanda` int(11) NOT NULL,
  `metoda_plata` enum('Cash','Card') NOT NULL,
  `total_plata` decimal(10,2) NOT NULL,
  `data_comanda` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comenzi`
--

INSERT INTO `comenzi` (`id_comanda`, `metoda_plata`, `total_plata`, `data_comanda`) VALUES
(1, 'Cash', 545.00, '2026-01-24 14:12:01'),
(2, 'Cash', 180.00, '2026-01-24 14:13:00'),
(3, 'Card', 970.00, '2026-01-24 15:10:06'),
(4, 'Cash', 245.00, '2026-01-24 22:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `nume` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `data_abonare` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `nume`, `email`, `data_abonare`) VALUES
(1, 'cezara', 'cezara.iurescu04@e-uvt.ro', '2026-01-24 13:09:40'),
(2, 'cezara', 'cezara.iurescu04@e-uvt.ro', '2026-01-24 20:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id` int(11) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `pret` decimal(10,2) NOT NULL,
  `descriere` text DEFAULT NULL,
  `imagine` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`id`, `nume`, `pret`, `descriere`, `imagine`) VALUES
(1, 'Turul Gastronomic al Restaurantelor Istorice', 245.00, 'Pășește în inima cartierului artistic Santa Teresa. Include un fel principal, un aperitiv și o băutură artizanală.', 'img/img_mancare.jpg'),
(2, 'Atelier de Caipirinha și Degustare de Alcool Brazilian', 180.00, 'Învață arta perfectă a cocktailului național! Vei degusta 4 tipuri diferite de Cachaça premium.', 'img/img_cocktail.jpg'),
(3, 'Turul Deserturilor: De la Açaí la Brigadeiro', 120.00, 'Vizităm cele mai faimoase cofetării din Rio, inclusiv locații istorice de peste 100 de ani.', 'img/img_deserturi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sondaj_rio`
--

CREATE TABLE `sondaj_rio` (
  `id` int(11) NOT NULL,
  `preparat` varchar(50) DEFAULT NULL,
  `voturi` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sondaj_rio`
--

INSERT INTO `sondaj_rio` (`id`, `preparat`, `voturi`) VALUES
(1, 'FEIJOADA', 45),
(2, 'COXINHA', 27),
(3, 'BRIGADEIRO', 28),
(4, 'AÇAÍ', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`id_comanda`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sondaj_rio`
--
ALTER TABLE `sondaj_rio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `preparat` (`preparat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `id_comanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sondaj_rio`
--
ALTER TABLE `sondaj_rio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
