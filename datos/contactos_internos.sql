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
-- Table structure for table `contactos_internos`
--

-- CREATE TABLE IF NOT EXISTS `contactos_internos` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `id_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `mensaje` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactos_internos`
--

INSERT INTO `contactos_internos` (`id`, `id_cliente`, `fecha`, `mensaje`, `created_at`, `updated_at`) VALUES
(1, 'jl3864', '15-03-2023', 'Hola, tengo una duda sobre mi dieta. He notado que me siento con menos energía por las mañanas y quería saber si hay algún alimento que pueda incluir en mi desayuno para sentirme mejor. ¿Podrías ayudarme?', '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(2, 'as6343', '25-03-2023', 'Hola America, estoy siguiendo mi plan de alimentación al pie de la letra, pero he notado que me siento un poco hinchada después de las comidas. ¿Puede haber alguna comida en mi dieta que esté causando esto?', '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(3, 'jl3864', '03-04-2023', 'Hola, necesito tu ayuda con mi dieta. Estoy teniendo dificultades para seguir con mis comidas programadas durante el día porque a veces tengo mucho trabajo y no me da tiempo para cocinar. ¿Podrías darme algunas recomendaciones de comidas rápidas y saludables que pueda tener a mano en mi escritorio?', '2023-04-06 04:43:15', '2023-04-06 04:43:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactos_internos`
--
-- ALTER TABLE `contactos_internos`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactos_internos`
--
-- ALTER TABLE `contactos_internos`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
