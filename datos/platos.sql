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
'{
	"plato_1":"Pan tostado (palma de la mano sin los dedos) + Aceite (de tus 120 mL)",
	"plato_2":"Pan tostado (palma de la mano sin los dedos) + Tomate triturado",
	"plato_3":"Pan tostado (palma de la mano sin los dedos) + 2 Tortitas de avena"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(2, 'jl3864', 'media manaña',
'{
	"plato_1":"1 Fruta",
	"plato_2":"2 Cuñas de queso tierno / fresco + 6 - 8 Tomates cherry",
	"plato_3":"Media Tostada (del desayuno) + ¼ de Aguacate (máximo 1 vez a la semana)",
	"plato_4":"3 Nueces",
	"plato_5":"1 Tortita de avena",
	"plato_6":"3 Higos secos pequeños",
	"plato_7":"2 Higos secos + 1 Nuez"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(3, 'jl3864', 'comida',
'{
	"plato_1":"Legumbres con verdura",
	"plato_2":"Guisantes con jamón",
	"plato_3":"Cocido",
	"plato_4":"Arroz con marisco",
	"plato_5":"Puré de verduras",
	"plato_6":"Sopa",
	"plato_7":"Pisto casero",
	"plato_8":"Pasta boloñesa",
	"plato_9":"Menestra de verdura",
	"plato_10":"Ración pequeña de carne + guarnicion",
	"plato_11":"Corazones de alcachofas",
	"plato_12":"Brócoli"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(4, 'jl3864', 'merienda',
'{
	"plato_1":"1 Paquete de tortitas de chocolate negro",
	"plato_2":"1 Vaso pequeño de yogur de kéfir",
	"plato_3":"3 Higos secos pequeños",
	"plato_4":"2 Higos secos + 1 Nuez",
	"plato_5":"1 Fruta"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(5, 'jl3864', 'cena',
'{
	"plato_1":"Sandwich",
	"plato_2":"Sardinillas",
	"plato_3":"Puré de verduras",
	"plato_4":"Sopa",
	"plato_5":"Tortilla francesa",
	"plato_6":"Ensalada mixta",
	"plato_7":"Tortilla de patata",
	"plato_8":"Revuelto de champiñones",
	"plato_9":"Ración pequeña de pescado",
	"plato_10":"Verduras asadas",
	"plato_11":"Parrillada de verduras",
	"plato_12":"Ración pequeña de carne"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(6, 'is3137', 'desayuno',
'{
	"plato_1":"Vaso de leche desnatada",
	"plato_2":"6 Galletas sin azúcar (tamaño María)",
	"plato_3":"5 Galletas María normales",
	"plato_4":"2 Magdalenas pequeñas",
	"plato_5":"3 Biscotes + Mermelada Diet",
	"plato_6":"2 Biscotes + Margarina raspada + Mermelada Diet"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(7, 'is3137', 'media manaña',
'{
	"plato_1":"2 Tortitas de arroz o maíz (sin cobertura)",
	"plato_2":"1 Fruta",
	"plato_3":"Zumo de 2 naranjas"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(8, 'is3137', 'comida',
'{
	"plato_1":"Legumbres",
	"plato_2":"Arroz blanco + Tomate frito + 1 Huevo",
	"plato_3":"Arroz blanco + Carne",
	"plato_4":"Judías verdes con patata",
	"plato_5":"Guisantes con jamón",
	"plato_6":"Coliflor con besamel",
	"plato_7":"Patatas viudas",
	"plato_8":"Menestra de verdura",
	"plato_9":"Puré de verduras",
	"plato_10":"Ración pequeña de carne",
	"plato_11":"Ración pequeña de pescado",
	"plato_12":"Acelgas"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(9, 'is3137', 'merienda',
'{
	"plato_1":"2 Galletas María normales",
	"plato_2":"1 Pasta pequeña (tamaño té)",
	"plato_3":"1 Magdalena pequeña (máximo 2 días a la semana)",
	"plato_4":"1 Fruta"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(10, 'is3137', 'cena',
'{
	"plato_1":"3 Sardinas pequeñas",
	"plato_2":"1 Vaso de leche + Nesquik",
	"plato_3":"Sopa",
	"plato_4":"4 Croquetas",
	"plato_5":"Tortilla francesa",
	"plato_6":"Ración pequeña de pescado",
	"plato_7":"Puré de patata",
	"plato_8":"Tortilla de patatas",
	"plato_9":"Bol pequeño de gazpacho",
	"plato_10":"Ración pequeña de carne + guarnicion",
	"plato_11":"Guisantes con jamón",
	"plato_12":"Verduras asadas"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(11, 'is3137', 'recena',
'{
	"plato_1":"1 Fruta pequeña",
	"plato_2":"2 Tortas de arroz o maíz",
	"plato_3":"1 Cuña de queso fresco",
	"plato_4":"2 Onzas de chocolate negroutem"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(12, 'is3137', 'otro',
'{
	"plato_1":"2 Cuñas finas de queso semicurado + 1 Biscote",
	"plato_2":"2 Lonchas finas de jamón york + 1 Biscote",
	"plato_3":"2 Lonchas light de queso + 1 Biscote",
	"plato_4":"1 Loncha fina de queso + 1 Loncha fina de membrillo + 1 Biscote",
	"plato_5":"1 Zumo de 2 naranjas + 1 Biscote"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(13, 'ia6472', 'desayuno',
'{
	"plato_1":"1 Taza de leche semidesnatada",
	"plato_2":"4 Dedos de pan",
	"plato_3":"4 Churros (1 vez cada 15 días como máximo)",
	"plato_4":"1 Porra (1 vez cada 15 días como máximo)"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(14, 'ia6472', 'media manaña',
'{
	"plato_1":"1 Cuña de queso + 1 Dedo de pan",
	"plato_2":"Cebolla (cantidad libre)",
	"plato_3":"Lechuga (cantidad libre)",
	"plato_4":"2 Higos + 1 Nuez"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(15, 'ia6472', 'comida',
'{
	"plato_1":"Legumbres con verdura",
	"plato_2":"Sopa de cocido",
	"plato_3":"Patatas caldosas",
	"plato_4":"Alcachofas",
	"plato_5":"Ración pequeña de carne",
	"plato_6":"Ensalada de patata",
	"plato_7":"Ensalada de pasta",
	"plato_8":"Parrillada de verduras",
	"plato_9":"Judías verdes",
	"plato_10":"Cocido",
	"plato_11":"Ración pequeña de pescado",
	"plato_12":"Lentejas con verdura"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(16, 'ia6472', 'cena',
'{
	"plato_1":"Tortilla francesa",
	"plato_2":"Tortilla de patatas",
	"plato_3":"4 Empanadillas",
	"plato_4":"Ración pequeña de pescado",
	"plato_5":"Puré de verduras",
	"plato_6":"Espárragos trigueros",
	"plato_7":"Salteado de verdura",
	"plato_8":"Ración pequeña de carne",
	"plato_9":"Vichyssoise",
	"plato_10":"Hamburguesa",
	"plato_11":"Pizza",
	"plato_12":"Revuelto de setas"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(17, 'ia6472', 'recena',
'{
	"plato_1":"1 Taza de leche semidesnatada"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(18, 'as6343', 'desayuno',
'{
	"plato_1":"Té",
	"plato_2":"1 Fruta",
	"plato_3":"1 Tosta de pan de semillas tipo masa madre + Tomate triturado",
	"plato_4":"1 Tosta de pan de semillas tipo masa madre + Aceite",
	"plato_5":"1 Tosta de pan de semillas tipo masa madre + 1 Loncha de jamón",
	"plato_6":"2 Biscotes de pan tostado + 4 Cuñas finas de queso fresco",
	"plato_7":"2 Biscotes de pan tostado + 2 Lonchas de pavo trufado",
	"plato_8":"6 Galletas tipo María"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(19, 'as6343', 'media manaña',
'{
	"plato_1":"1 Fruta",
	"plato_2":"4 - 5 Avellanas",
	"plato_3":"1 Barrita de 75 Kcal",
	"plato_4":"2 Tortas de maíz"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(20, 'as6343', 'comida',
'{
	"plato_1":"Espárragos trigueros",
	"plato_2":"Calabacín a la plancha",
	"plato_3":"Legumbres con verdura",
	"plato_4":"Ensalada de legumbres",
	"plato_5":"Guisantes con jamón",
	"plato_6":"Judías verdes",
	"plato_7":"Ración pequeña de carne",
	"plato_8":"Ración pequeña de pescado",
	"plato_9":"Pasta boloñesa",
	"plato_10":"Cuscús con verdura",
	"plato_11":"Espinacas",
	"plato_12":"Salmorejo"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(21, 'as6343', 'merienda',
'{
	"plato_1":"1 Fruta",
	"plato_2":"1 Helado casero de frutas"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(22, 'as6343', 'cena',
'{
	"plato_1":"Ensaladilla rusa",
	"plato_2":"Sándwich",
	"plato_3":"Revuelto de champiñones",
	"plato_4":"Sopa",
	"plato_5":"Salmorejo",
	"plato_6":"4 - 6 Langostinos",
	"plato_7":"Verduras asadas",
	"plato_8":"3 Yogures caseros",
	"plato_9":"Puré de patatas",
	"plato_10":"2 Fajitas",
	"plato_11":"2 Empanadillas",
	"plato_12":"Sardinillas"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(23, 'as6343', 'recena',
'{
	"plato_1":"1 Fruta pequeña"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(24, 'ep2244', 'desayuno',
'{
	"plato_1":"1 Vaso de leche semidesnatada + 1 Cucharada de cereales",
	"plato_2":"2 Dedos de pan + 1 Loncha de jamón york",
	"plato_3":"2 Dedos de pan + 1 Loncha de jamón serrano",
	"plato_4":"Tostada de pan (palma de la mano) + Tomate triturado",
	"plato_5":"Tostada de pan (palma de la mano) + jamón serrano"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(25, 'ep2244', 'media manaña',
'{
	"plato_1":"2 Tortas de arroz o maíz",
	"plato_2":"1 Fruta",
	"plato_3":"1 Barrita de menos de 80 Kcal",
	"plato_4":"1 Yogur bebible desnatado",
	"plato_5":"2 -3 Zanahorias",
	"plato_6":"3 Higos secos pequeños"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(26, 'ep2244', 'comida',
'{
	"plato_1":"Legumbres con verdura",
	"plato_2":"Ensalada de legumbres",
	"plato_3":"Legumbres con chorizo",
	"plato_4":"4 Albóndigas",
	"plato_5":"Patatas con costilla",
	"plato_6":"Coliflor con besamel",
	"plato_7":"Puré de patatas",
	"plato_8":"Judías verdes",
	"plato_9":"Pasta boloñesa",
	"plato_10":"Ensalada de pasta",
	"plato_11":"Ración pequeña de carne",
	"plato_12":"Lasaña"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(27, 'ep2244', 'merienda',
'{
	"plato_1":"1 Fruta",
	"plato_2":"2 Frutas",
	"plato_3":"2 Tortas de arroz o maíz",
	"plato_4":"2 Higos secos + 1 Nuez",
	"plato_5":"1 Barrita de menos de 80 Kcal",
	"plato_6":"1 Yogur desnatado",
	"plato_7":"2 - 3 Zanahorias",
	"plato_8":"1 Helado de menos de 60 Kcal"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(28, 'ep2244', 'cena',
'{
	"plato_1":"Ensalada mixta",
	"plato_2":"Espárragos blancos",
	"plato_3":"3 Empanadillas",
	"plato_4":"Bol pequeño de gazpacho",
	"plato_5":"Tortilla francesa",
	"plato_6":"Sopa",
	"plato_7":"Ración pequeña de pescado",
	"plato_8":"Media pizza",
	"plato_9":"4 - 5 Langostinos",
	"plato_10":"Media sepia",
	"plato_11":"Revuelto de champiñones",
	"plato_12":"Salteado de verduras"
}',
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
