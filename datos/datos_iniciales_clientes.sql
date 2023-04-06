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
-- Table structure for table `datos_iniciales_clientes`
--

-- CREATE TABLE IF NOT EXISTS `datos_iniciales_clientes` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `id_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `pregunta_respuesta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`pregunta_respuesta`)),
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datos_iniciales_clientes`
--

INSERT INTO `datos_iniciales_clientes` (`id`, `id_cliente`, `fecha`, `pregunta_respuesta`, `created_at`, `updated_at`) VALUES
(1, 'jl3864', '27-12-1991', 
'{
	\"¿Se ha puesto anteriormente a dieta? ¿Cosas positivas que te aportaron esas dietas?\":\"Sí, he seguido diferentes dietas en el pasado. Me han ayudado a perder peso y a mejorar mi alimentación en general.\",
	\"¿Tienes el hábito de desayunar regularmente? ¿Motivo? Indica qué desayunos suele hacer.\":\"Sí, trato de desayunar todos los días para tener energía durante la mañana. Por lo general, desayuno una taza de yogur con frutas y granola o una tostada integral con aguacate y huevo.\",
	\"¿Tienes el hábito de comer algo a media mañana regularmente? ¿Motivo? Indica qué sueles hacerte.\":\"A veces suelo comer algo a media mañana si tengo hambre. Por lo general, me hago un batido de proteínas con frutas o un puñado de frutos secos para mantenerme saciado hasta el almuerzo.\",
	\"¿Te gusta picar entre horas? ¿Qué picoteas?\":\"Sí, a veces me gusta picar algo entre horas. Suelo comer frutas o verduras crudas, como zanahorias o pepinos.\",
	\"¿Llegas con ansiedad a alguna de la tomas? ¿A cuál?\":\"A veces llego con ansiedad a la cena, especialmente si he tenido un día muy estresante. Trato de controlar mi ansiedad haciendo una cena nutritiva y equilibrada que me haga sentir satisfecho y tranquilo.\",
	\"¿Te gustan los alimentos muy salados? ¿Qué tipo de sal usa?\":\"No me gustan los alimentos muy salados. Trato de evitar el uso excesivo de sal en mis comidas y, cuando la uso, prefiero usar sal marina o sal del Himalaya, que son opciones más saludables.\"
}', 
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(2, 'is3137', '20-02-2012',
'{
	\"¿Hay algún alimento o hábito que quieras incorporar en la dieta?\":\"Me gustaría incorporar más alimentos ricos en fibra en mi dieta, como legumbres y cereales integrales, ya que sé que son importantes para mi salud digestiva.\",
	\"¿Cuánto pan come en cada comida y de que tipo?\":\"Trato de limitar mi consumo de pan, pero cuando lo como, suelo optar por pan integral o de centeno. Normalmente solo como una rebanada en cada comida.\",
	\"¿Tomas café? ¿Tipo, cantidad, dulzor?\":\"Sí, tomo café por las mañanas. Me gusta el café negro sin azúcar, pero a veces le agrego un poco de leche de almendras para suavizar el sabor.\",
	\"¿Te gustan los alimentos muy salados? ¿Qué tipo de sal usa?\":\"No me gustan los alimentos muy salados. Trato de evitar el uso excesivo de sal en mis comidas y, cuando la uso, prefiero usar sal marina o sal del Himalaya, que son opciones más saludables.\",
	\"¿Le gusta mucho los alimentos dulces? ¿Qué utiliza normalmente para endulzar?\":\"Me gusta el sabor dulce, pero trato de limitar mi consumo de azúcar. A veces utilizo miel o stevia como alternativas más saludables al azúcar procesado.\"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(3, 'ia6472', '20-02-2012',
'{
	\"¿Se ha puesto anteriormente a dieta? ¿Cosas positivas que te aportaron esas dietas?\":\"Sí, he intentado hacer dieta en el pasado para mejorar mi salud y mi apariencia física. He aprendido que las dietas restrictivas no funcionan a largo plazo y que lo mejor es hacer cambios graduales y sostenibles en mi estilo de vida para obtener resultados duraderos.\",
	\"¿Tienes el hábito de comer algo a media mañana regularmente? ¿Motivo? Indica qué sueles hacerte.\":\"Sí, suelo tomar un pequeño tentempié a media mañana para mantener mi energía y evitar la sensación de hambre hasta la siguiente comida. Suelo hacerme una fruta o un puñado de frutos secos.\",
	\"¿Te gusta picar entre horas? ¿Qué picoteas?\":\"A veces me apetece picar entre horas, pero trato de elegir opciones saludables como frutas, verduras o yogur natural. También me gusta hacerme un smoothie casero de vez en cuando.\",
	\"¿Llegas con ansiedad a alguna de la tomas? ¿A cuál?\":\"A veces llego con ansiedad a la cena, especialmente si he tenido un día muy estresante. Trato de ser consciente de mis emociones y encontrar formas de relajarme antes de la cena, como hacer yoga o meditar durante unos minutos.\",
	\"¿Fumas? ¿Cuánto?\":\"No, no fumo.\",
	\"¿Cocinas tú en casa?\":\"Sí, trato de cocinar la mayoría de mis comidas en casa para tener un mayor control sobre lo que como y elegir opciones más saludables. Me gusta experimentar con nuevas recetas y ingredientes para mantener mi alimentación interesante.\"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(4, 'as6343', '20-02-2012',
'{
	\"¿Se ha puesto anteriormente a dieta? ¿Cosas positivas que te aportaron esas dietas?\":\"No he seguido ninguna dieta anteriormente\",
	\"¿Tienes el hábito de desayunar regularmente? ¿Motivo? Indica qué desayunos suele hacer.\":\"Sí, suelo desayunar todos los días porque me ayuda a empezar el día con energía. Normalmente tomo un café con leche, una tostada con aceite y tomate y una pieza de fruta.\",
	\"¿Llegas con ansiedad a alguna de la tomas? ¿A cuál?\":\"Sí, a veces llego con ansiedad a la cena. Me gusta comer algo ligero antes de dormir, como una ensalada o una sopa.\",
	\"¿Cocinas tú en casa?\":\"Sí, suelo cocinar en casa la mayoría de las veces. Me gusta preparar comidas saludables y variadas.\",
	\"¿Te gustan los alimentos muy salados? ¿Qué tipo de sal usa?\":\"No me gustan los alimentos muy salados. Si uso sal, suelo utilizar sal marina o sal baja en sodio.\",
	\"¿Cuánto pan come en cada comida y de que tipo?\":\"Suelo comer una rebanada de pan integral en cada comida. Me gusta más el pan integral porque es más nutritivo.\",
	\"¿Qué comidas y cenas sueles hacer con mayor frecuencia?\":\"Suelo hacer comidas y cenas variadas, pero algunas de mis opciones favoritas son ensaladas con proteína, pescado a la plancha con verduras al vapor, y arroz integral con verduras y legumbres.\"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(5, 'ep2244', '20-02-2012',
'{
	\"¿Hay algún alimento o hábito que quieras incorporar en la dieta?\":\"Sí me gustaría incorporar más frutas y verduras en mi dieta diaria.\",
	\"¿Toma refrescos habitualmente?\":\"No, trato de limitar mi consumo de refrescos y bebidas azucaradas en general.\",
	\"¿Te gustan los alimentos muy salados? ¿Qué tipo de sal usa?\":\"No soy muy fan de los alimentos muy salados, pero cuando cocino utilizo sal de mar.\",
	\"¿Le gusta mucho los alimentos dulces? ¿Qué utiliza normalmente para endulzar?\":\"Me gustan los alimentos dulces, pero trato de consumirlos con moderación. Cuando endulzo algo, utilizo azúcar morena o miel.\",
	\"¿Cocinas tú en casa?\":\"Sí, cocino en casa la mayoría de las veces.\",
	\"¿Bebes alcohol? ¿Qué tipo de alcohol? ¿Frecuencia?\":\"Sí, ocasionalmente bebo cerveza o vino los fines de semana, pero trato de limitar mi consumo y mantenerlo en moderación.\"
}',
'2023-04-06 04:43:15', '2023-04-06 04:43:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datos_iniciales_clientes`
--
-- ALTER TABLE `datos_iniciales_clientes`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datos_iniciales_clientes`
--
-- ALTER TABLE `datos_iniciales_clientes`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
