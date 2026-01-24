-- Configurații inițiale
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET NAMES utf8mb4 */;

-- CREARE BAZĂ DE DATE (Instrucțiunea cerută de colegă)
CREATE DATABASE IF NOT EXISTS `proiect_bucatarie`;
USE `proiect_bucatarie`;

-- ȘTERGERE TABELE DACĂ EXISTĂ (Pentru a evita eroarea 1050)
DROP TABLE IF EXISTS `comenzi`;
DROP TABLE IF EXISTS `newsletter`;
DROP TABLE IF EXISTS `produse`;
DROP TABLE IF EXISTS `sondaj_rio`;

-- Tabel: comenzi
CREATE TABLE `comenzi` (
  `id_comanda` int(11) NOT NULL AUTO_INCREMENT,
  `metoda_plata` enum('Cash','Card') NOT NULL,
  `total_plata` decimal(10,2) NOT NULL,
  `data_comanda` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_comanda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabel: newsletter
CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `data_abonare` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabel: produse
CREATE TABLE `produse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) NOT NULL,
  `pret` decimal(10,2) NOT NULL,
  `descriere` text DEFAULT NULL,
  `imagine` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Date pentru produse
INSERT INTO `produse` (`nume`, `pret`, `descriere`, `imagine`) VALUES
('Feijoada Rio', 55.00, 'Fasole neagră, porc și orez.', 'https://images.unsplash.com/photo-1599307767316-776533bb941c?w=500'),
('Coxinha', 18.50, 'Crochete braziliene cu pui.', 'https://images.unsplash.com/photo-1541658016709-82737e486721?w=500'),
('Caipirinha Clasic', 25.00, 'Cocktail cu lime și cachaça.', 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?w=500');

COMMIT;