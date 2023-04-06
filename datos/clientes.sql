-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 08:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tfg`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

-- CREATE TABLE IF NOT EXISTS `clientes` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `id_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `nombre_apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `fecha_inicio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `peso_inicial` double NOT NULL,
--   `peso_final_1` double NOT NULL,
--   `peso_final_2` double NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `id_cliente`, `nombre_apellidos`, `telefono`, `email`, `direccion`, `fecha_inicio`, `peso_inicial`, `peso_final_1`, `peso_final_2`, `created_at`, `updated_at`) VALUES
(1, 'jl3864', 'Jose Luis Panadero Gutierrez', '926 901 067', 'jose.luis@gmail.com', 'Plaza Eduardo, 3, 0º A', '04-09-2022', 98, 90, 82, '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(2, 'is3137', 'Ismael Rodrigo Benavidez', '610 649 844', 'ismael22@malave.org', 'Calle Casanova de la Sierra, 230', '01-02-2023', 103, 83, null, '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(3, 'ia6472', 'Irene Alfonso Martinez', '913 345 643', 'cgurule@gmail.com', 'Travessera Palacios, 416, 1º B', '01-04-2023', 73, 63, null, '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(4, 'as6343', 'Ariadna Sancho Tercero', '686 930 803', 'arisan64@puente.es', 'Plaza Perea, 4, 5º E', '05-02-2023', 110, 80, null, '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(5, 'ep2244', 'Elena Prado Ibañez', '975 589 674', 'epibanez@yahoo.es', 'Avenida Ismael, 233, Bajo 6º', '18-11-2022', 79, 70, 60, '2023-04-06 04:43:15', '2023-04-06 04:43:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
-- ALTER TABLE `clientes`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
-- ALTER TABLE `clientes`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
