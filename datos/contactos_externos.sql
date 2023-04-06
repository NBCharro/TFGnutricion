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
-- Table structure for table `contactos_externos`
--

-- CREATE TABLE IF NOT EXISTS `contactos_externos` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `mensaje` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactos_externos`
--

INSERT INTO `contactos_externos` (`id`, `nombre`, `telefono`, `email`, `fecha`, `mensaje`, `created_at`, `updated_at`) VALUES
(1, 'Oliver', '900 314 350', 'lucero.oliver@linares.com.es', '04-04-2023', 'Hola, estoy interesado/a en obtener información sobre tus servicios como nutricionista. Me gustaría saber cuál es tu disponibilidad para una consulta inicial y cuáles son tus tarifas. ¡Gracias!', '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(2, 'Gust', '667 627 571', 'gustavo1992@yahoo.com', '28-02-2023', 'Buen día, estoy buscando un plan de alimentación personalizado y me han recomendado tus servicios como nutricionista. ¿Podrías proporcionarme información sobre cómo trabajas y cuál es tu tarifa por sesión? Estoy muy interesado/a en programar una consulta.', '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(3, 'Luna', '654 236 842', 'lbalderas@sisneros.com', '25-03-2023', 'Hola, me llamo Luna y me gustaría saber si podrías proporcionarme información sobre tus servicios de nutrición. Estoy buscando ayuda para mejorar mi dieta y mi salud en general. ¿Tienes disponibilidad para una consulta en los próximos días?', '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(4, 'Aroa Segovia', '923 745 844', 'oulibarri@hotmail.es', '28-02-2021', 'Buenos días, estoy buscando un nutricionista que me ayude a mejorar mi dieta y a lograr mis objetivos de salud. Me gustaría programar una consulta para obtener más información sobre tus servicios y tarifas. ¿Podrías indicarme tu disponibilidad para la próxima semana?', '2023-04-06 04:43:15', '2023-04-06 04:43:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactos_externos`
--
-- ALTER TABLE `contactos_externos`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactos_externos`
--
-- ALTER TABLE `contactos_externos`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
