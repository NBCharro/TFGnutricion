-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 08:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:0


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tfg`
--

-- --------------------------------------------------------

--
-- Table structure for table `platos`
--

-- CREATE TABLE IF NOT EXISTS `platos` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `id_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `accion` enum('desayuno','media mañana','comida','merienda','cena','recena','otro') COLLATE utf8mb4_unicode_ci NOT NULL,
--   `platos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`platos`)),
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `platos`
--

INSERT INTO `platos` (`id`, `id_cliente`, `accion`, `platos`, `created_at`, `updated_at`) VALUES
(1, 'jl3864', 'desayuno',
'[
	"Pan tostado (palma de la mano sin los dedos) + Aceite (de tus 120 mL)",
	"Pan tostado (palma de la mano sin los dedos) + Tomate triturado",
	"Pan tostado (palma de la mano sin los dedos) + 2 Tortitas de avena"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(2, 'jl3864', 'media manaña',
'[
	"1 Fruta",
	"2 Cuñas de queso tierno / fresco + 6 - 8 Tomates cherry",
	"Media Tostada (del desayuno) + ¼ de Aguacate (máximo 1 vez a la semana)",
	"3 Nueces",
	"1 Tortita de avena",
	"3 Higos secos pequeños",
	"2 Higos secos + 1 Nuez"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(3, 'jl3864', 'comida',
'[
	"Legumbres con verdura",
	"Guisantes con jamón",
	"Cocido",
	"Arroz con marisco",
	"Puré de verduras",
	"Sopa",
	"Pisto casero",
	"Pasta boloñesa",
	"Menestra de verdura",
	"Ración pequeña de carne + guarnicion",
	"Corazones de alcachofas",
	"Brócoli"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(4, 'jl3864', 'merienda',
'[
	"1 Paquete de tortitas de chocolate negro",
	"1 Vaso pequeño de yogur de kéfir",
	"3 Higos secos pequeños",
	"2 Higos secos + 1 Nuez",
	"1 Fruta"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(5, 'jl3864', 'cena',
'[
	"Sandwich",
	"Sardinillas",
	"Puré de verduras",
	"Sopa",
	"Tortilla francesa",
	"Ensalada mixta",
	"Tortilla de patata",
	"Revuelto de champiñones",
	"Ración pequeña de pescado",
	"Verduras asadas",
	"Parrillada de verduras",
	"Ración pequeña de carne"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(6, 'is3137', 'desayuno',
'[
	"Vaso de leche desnatada",
	"6 Galletas sin azúcar (tamaño María)",
	"5 Galletas María normales",
	"2 Magdalenas pequeñas",
	"3 Biscotes + Mermelada Diet",
	"2 Biscotes + Margarina raspada + Mermelada Diet"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(7, 'is3137', 'media manaña',
'[
	"2 Tortitas de arroz o maíz (sin cobertura)",
	"1 Fruta",
	"Zumo de 2 naranjas"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(8, 'is3137', 'comida',
'[
	"Legumbres",
	"Arroz blanco + Tomate frito + 1 Huevo",
	"Arroz blanco + Carne",
	"Judías verdes con patata",
	"Guisantes con jamón",
	"Coliflor con besamel",
	"Patatas viudas",
	"Menestra de verdura",
	"Puré de verduras",
	"Ración pequeña de carne",
	"Ración pequeña de pescado",
	"Acelgas"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(9, 'is3137', 'merienda',
'[
	"2 Galletas María normales",
	"1 Pasta pequeña (tamaño té)",
	"1 Magdalena pequeña (máximo 2 días a la semana)",
	"1 Fruta"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(10, 'is3137', 'cena',
'[
	"3 Sardinas pequeñas",
	"1 Vaso de leche + Nesquik",
	"Sopa",
	"4 Croquetas",
	"Tortilla francesa",
	"Ración pequeña de pescado",
	"Puré de patata",
	"Tortilla de patatas",
	"Bol pequeño de gazpacho",
	"Ración pequeña de carne + guarnicion",
	"Guisantes con jamón",
	"Verduras asadas"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(11, 'is3137', 'recena',
'[
	"1 Fruta pequeña",
	"2 Tortas de arroz o maíz",
	"1 Cuña de queso fresco",
	"2 Onzas de chocolate negroutem"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(12, 'is3137', 'otro',
'[
	"2 Cuñas finas de queso semicurado + 1 Biscote",
	"2 Lonchas finas de jamón york + 1 Biscote",
	"2 Lonchas light de queso + 1 Biscote",
	"1 Loncha fina de queso + 1 Loncha fina de membrillo + 1 Biscote",
	"1 Zumo de 2 naranjas + 1 Biscote"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(13, 'ia6472', 'desayuno',
'[
	"1 Taza de leche semidesnatada",
	"4 Dedos de pan",
	"4 Churros (1 vez cada 15 días como máximo)",
	"1 Porra (1 vez cada 15 días como máximo)"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(14, 'ia6472', 'media manaña',
'[
	"1 Cuña de queso + 1 Dedo de pan",
	"Cebolla (cantidad libre)",
	"Lechuga (cantidad libre)",
	"2 Higos + 1 Nuez"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(15, 'ia6472', 'comida',
'[
	"Legumbres con verdura",
	"Sopa de cocido",
	"Patatas caldosas",
	"Alcachofas",
	"Ración pequeña de carne",
	"Ensalada de patata",
	"Ensalada de pasta",
	"Parrillada de verduras",
	"Judías verdes",
	"Cocido",
	"Ración pequeña de pescado",
	"Lentejas con verdura"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(16, 'ia6472', 'cena',
'[
	"Tortilla francesa",
	"Tortilla de patatas",
	"4 Empanadillas",
	"Ración pequeña de pescado",
	"Puré de verduras",
	"Espárragos trigueros",
	"Salteado de verdura",
	"Ración pequeña de carne",
	"Vichyssoise",
	"Hamburguesa",
	"Pizza",
	"Revuelto de setas"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(17, 'ia6472', 'recena',
'[
	"1 Taza de leche semidesnatada"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(18, 'as6343', 'desayuno',
'[
	"Té",
	"1 Fruta",
	"1 Tosta de pan de semillas tipo masa madre + Tomate triturado",
	"1 Tosta de pan de semillas tipo masa madre + Aceite",
	"1 Tosta de pan de semillas tipo masa madre + 1 Loncha de jamón",
	"2 Biscotes de pan tostado + 4 Cuñas finas de queso fresco",
	"2 Biscotes de pan tostado + 2 Lonchas de pavo trufado",
	"6 Galletas tipo María"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(19, 'as6343', 'media manaña',
'[
	"1 Fruta",
	"4 - 5 Avellanas",
	"1 Barrita de 75 Kcal",
	"2 Tortas de maíz"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(20, 'as6343', 'comida',
'[
	"Espárragos trigueros",
	"Calabacín a la plancha",
	"Legumbres con verdura",
	"Ensalada de legumbres",
	"Guisantes con jamón",
	"Judías verdes",
	"Ración pequeña de carne",
	"Ración pequeña de pescado",
	"Pasta boloñesa",
	"Cuscús con verdura",
	"Espinacas",
	"Salmorejo"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(21, 'as6343', 'merienda',
'[
	"1 Fruta",
	"1 Helado casero de frutas"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(22, 'as6343', 'cena',
'[
	"Ensaladilla rusa",
	"Sándwich",
	"Revuelto de champiñones",
	"Sopa",
	"Salmorejo",
	"4 - 6 Langostinos",
	"Verduras asadas",
	"3 Yogures caseros",
	"Puré de patatas",
	"2 Fajitas",
	"2 Empanadillas",
	"Sardinillas"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(23, 'as6343', 'recena',
'[
	"1 Fruta pequeña"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(24, 'ep2244', 'desayuno',
'[
	"1 Vaso de leche semidesnatada + 1 Cucharada de cereales",
	"2 Dedos de pan + 1 Loncha de jamón york",
	"2 Dedos de pan + 1 Loncha de jamón serrano",
	"Tostada de pan (palma de la mano) + Tomate triturado",
	"Tostada de pan (palma de la mano) + jamón serrano"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(25, 'ep2244', 'media manaña',
'[
	"2 Tortas de arroz o maíz",
	"1 Fruta",
	"1 Barrita de menos de 80 Kcal",
	"1 Yogur bebible desnatado",
	"2 -3 Zanahorias",
	"3 Higos secos pequeños"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(26, 'ep2244', 'comida',
'[
	"Legumbres con verdura",
	"Ensalada de legumbres",
	"Legumbres con chorizo",
	"4 Albóndigas",
	"Patatas con costilla",
	"Coliflor con besamel",
	"Puré de patatas",
	"Judías verdes",
	"Pasta boloñesa",
	"Ensalada de pasta",
	"Ración pequeña de carne",
	"Lasaña"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(27, 'ep2244', 'merienda',
'[
	"1 Fruta",
	"2 Frutas",
	"2 Tortas de arroz o maíz",
	"2 Higos secos + 1 Nuez",
	"1 Barrita de menos de 80 Kcal",
	"1 Yogur desnatado",
	"2 - 3 Zanahorias",
	"1 Helado de menos de 60 Kcal"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(28, 'ep2244', 'cena',
'[
	"Ensalada mixta",
	"Espárragos blancos",
	"3 Empanadillas",
	"Bol pequeño de gazpacho",
	"Tortilla francesa",
	"Sopa",
	"Ración pequeña de pescado",
	"Media pizza",
	"4 - 5 Langostinos",
	"Media sepia",
	"Revuelto de champiñones",
	"Salteado de verduras"
]',
'2023-04-06 04:43:15', '2023-04-06 04:43:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `platos`
--
-- ALTER TABLE `platos`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `platos`
--
-- ALTER TABLE `platos`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
