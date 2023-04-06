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
-- Table structure for table `textos_clientes`
--

-- CREATE TABLE IF NOT EXISTS `textos_clientes` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `id_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `texto_general` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `texto_particular` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `textos_clientes`
--

INSERT INTO `textos_clientes` (`id`, `id_cliente`, `texto_general`, `texto_particular`, `created_at`, `updated_at`) VALUES
(1, 'jl3864',
'{
	"titulo":"Dieta de 1600 Kcal aprox.",
	"parrafo1":"Calculada para tener una pérdida de alrededor de 600 - 700 g a la semana al principio, después irá bajando a 400 - 500 g por semana. Es normal que la primera semana e incluso la segunda haya bajadas muy pronunciadas, pero hazte idea de que esto solo pasa en las primeras semanas, y no vuelve a pasar. Lo normal es que la primera semana pases hambre, luego el estómago se te va haciendo a la reducción de cantidades. También es normal que el ritmo intestinal cambie un poco, al ingerir menos cantidades.",
	"parrafo2":"Para el aceite, la dosis media recomendada suele ser 120 mL por semana. Un truco/técnica para no pasarse es tener el aceite medido. Por ejemplo, tener una parte apartada semanal de aceite y gestionártelo. En las preparaciones a la plancha se puede mojar un poco la plancha/sartén con aceite, pero intenta que el alimento no se quede empapado en aceite. Cuando ponga plancha puede ser también otras formas de cocinado como horno, vapor, microondas, etc."
}',
'{
	"Ensalada":"Siempre que elijas ensalada añade 1 nuez.",
 	"Especias, ajo, cebolla y demás condimentos":"Se pueden usar libremente.",
	"Café con bebida de avena":"Tienes contemplado uno durante la tarde con medio vaso de avena y media cucharita de postre de azúcar.",
	"Cebolletas, pepinillos, toreras y berenjenas de Almagro":"Libres para comerlas cuando te apetezcan o para evitar picar otras cosas más calóricas. Puedes usarlas también durante las comidas y cenas.",
	"Especias, ajo, cebolla y demás condimentos para el cocinado":"Se pueden usar libremente.",
	"Infusiones":"Libres, siempre que sean sin endulzar. Son buenas aliadas para estar a dieta. Puedes usarlas previas a las comidas y cenas, para que te produzcan saciedad o de sobremesa para calmar el hambre si la cantidad ha sido poca y el cuerpo te pide comer más.",
	"Integral":"Como te dije, todo lo que puedas en integral mejor porque nos beneficia para la saciedad, el tránsito intestinal, los niveles de colesterol y la regulación de la glucosa en sangre.",
	"Pasta":"Recomiendo consumir pasta con volúmenes (macarrones, caracolas, espirales, etc.) y evitar las que no dejan huecos entre medias como los espaguetis o los tallarines ya que, como también importa lo que percibimos visualmente, con los huecos vemos el plato más lleno.",
	"Pepinillos, cebolletas, toreras y berenjenas de Almagro":"Libres para comerlas cuando te apetezcan o para evitar picar otras cosas más calóricas. Puedes usarlas también durante las comidas y cenas.",
	"Salsa de la pasta":"He dejado la pasta con la elaboración de salsa carbonara pero como hablamos que pensarías otra elaboración, te lo he dejado contemplado. Cuando se te ocurra, la podemos comentar."
}',
 '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(2, 'is3137',
'{
	"titulo":"Dieta de 1350 Kcal aprox.",
	"parrafo1":"Calculada para tener una pérdida de alrededor de 600 - 700 g a la semana al principio, después irá bajando a 400 - 500 g por semana. Es normal que la primera semana e incluso la segunda haya bajadas muy pronunciadas, pero hazte idea de que esto solo pasa en las primeras semanas, y no vuelve a pasar. Lo normal es que la primera semana pases hambre, luego el estómago se te va haciendo a la reducción de cantidades. También es normal que el ritmo intestinal cambie un poco, al ingerir menos cantidades.",
	"parrafo2":"Para el aceite, la dosis media recomendada suele ser 100 mL por semana. Un truco/técnica para no pasarse es tener el aceite medido. Por ejemplo, tener una parte apartada semanal de aceite y gestionártelo. En las preparaciones a la plancha se puede mojar un poco la plancha/sartén con aceite, pero intenta que el alimento no se quede empapado en aceite. Cuando ponga plancha puede ser también otras formas de cocinado como horno, vapor, microondas, etc."
}',
'{
	"Caramelos sin azúcar":"Puedes comer alguno durante la noche sin con ello te calma las ganas de comer más o de dulce. No pasar de 3 diarios.",
	"Cebolletas, pepinillos, toreras, zanahoria cruda y berenjenas de Almagro":"Libres para comerlas cuando te apetezcan o para evitar picar otras cosas más calóricas. Puedes usarlas también durante las comidas y cenas.",
	"Consejo":"Ir a desayunar al salón para no tener tentaciones de coger más cantidad. Esto es extrapolable a cualquier comida en la que te puedas encontrar ante este problema.",
	"Especias, ajo, cebolla y demás condimentos":"Se pueden usar libremente.",
	"Gelatinas Zero":"Siempre que sean de las que no superen las 15 Kcal por gelatina. Puedes comer para picar entre horas libremente.",
	"Infusiones":"Libres, siempre que sean sin endulzar. Son buenas aliadas para estar a dieta. Puedes usarlas previas a las comidas y cenas, para que te produzcan saciedad o de sobremesa para calmar el hambre si la cantidad ha sido poca y el cuerpo te pide comer más.",
	"Integral":"Como te dije, todo lo que puedas en integral mejor porque nos beneficia para la saciedad, el tránsito intestinal, los niveles de colesterol y la regulación de la glucosa en sangre.",
	"Leche":"Te he contemplado la semidesnatada pero si te apareciese el estreñimiento volveremos a la entera.",
	"Pasta":"Recomiendo consumir pasta con volúmenes (macarrones, caracolas, espirales, etc.) y evitar las que no dejan huecos entre medias como los espaguetis o los tallarines ya que, como también importa lo que percibimos visualmente, con los huecos vemos el plato más lleno.",
	"Pesos de raciones pequeñas":"Carne magra entre 80 y 100 gramos, pescado blanco entre 140 y 150 gramos, pescado azul entre 110 y 130 gramos."
}',
 '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
 (3, 'ia6472',
'{
	"titulo":"Dieta de 1300 Kcal aprox.",
	"parrafo1":"Calculada para tener una pérdida de alrededor de 500 g a la semana al principio, después irá bajando a 400 - 300 g por semana. Es normal que la primera semana e incluso la segunda haya bajadas muy pronunciadas, pero hazte idea de que esto solo pasa en las primeras semanas, y no vuelve a pasar. Lo normal es que la primera semana pases hambre, luego el estómago se te va haciendo a la reducción de cantidades. También es normal que el ritmo intestinal cambie un poco, al ingerir menos cantidades.",
	"parrafo2":"Para el aceite, la dosis media recomendada suele ser 120 mL por semana. Un truco/técnica para no pasarse es tener el aceite medido. Por ejemplo, tener una parte apartada semanal de aceite y gestionártelo. En las preparaciones a la plancha se puede mojar un poco la plancha/sartén con aceite, pero intenta que el alimento no se quede empapado en aceite. Cuando ponga plancha puede ser también otras formas de cocinado como horno, vapor, microondas, etc. Solo se puede usar aceite aparte cuando frías el pescado rebozado o el filete empanado."
}',
'{
	"Azúcar":"Donde veas que te contemplo azúcar eres libre y te recomiendo que intentes sustituirlo por edulcorante.",
	"Aliños alternativos":"Como idea puedes usar salsa de yogur, cogiendo 1 cuchara de yogur y diluyéndola en un poco de agua. Otra idea es usar una salsa de mostaza, cogiendo una cuchara de mostaza de bolitas o normal y diluyéndola en vinagre.",
	"Café con bebida de avena":"Tienes contemplado uno durante la tarde con medio vaso de avena y media cucharita de postre de azúcar.",
	"Cebolletas, pepinillos, toreras y berenjenas de Almagro":"Libres para comerlas cuando te apetezcan o para evitar picar otras cosas más calóricas. Puedes usarlas también durante las comidas y cenas.",
	"Especias, ajo, cebolla y demás condimentos para el cocinado":"Se pueden usar libremente.",
	"Infusiones":"Libres, siempre que sean sin endulzar. Son buenas aliadas para estar a dieta. Puedes usarlas previas a las comidas y cenas, para que te produzcan saciedad o de sobremesa para calmar el hambre si la cantidad ha sido poca y el cuerpo te pide comer más.",
	"Mermelada":"Que ronden las 30 Kcal por cada 100 gramos. Suelo recomendar las Helios Diet o la Hero Diet, pero puedes mirar cualquiera que esté sobre esas Kcal.",
	"Pasta":"Recomiendo consumir pasta con volúmenes (macarrones, caracolas, espirales, etc.) y evitar las que no dejan huecos entre medias como los espaguetis o los tallarines ya que, como también importa lo que percibimos visualmente, con los huecos vemos el plato más lleno.",
	"Pesos de raciones pequeñas":"Carne magra entre 80 y 100 gramos, pescado blanco entre 140 y 150 gramos, pescado azul entre 110 y 130 gramos.",
	"Sardinillas":"Puede ser otro tipo de pescado pero respeta la cantidad.",
	"Vinagre":"Libre en las ensaladas. Puedes usar la crema de vinagre para soportar mejor el poco aceite de las ensaladas. Pero sin pasarse, alguna caloría tiene, pero comparado con el aceite es muy poco."
}',
 '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
 (4, 'as6343',
'{
	"titulo":"Dieta de 1350 Kcal aprox.",
	"parrafo1":"Calculada para tener una pérdida de alrededor de 700 - 800 g a la semana al principio, después irá bajando a 400 - 500 g por semana. Es normal que la primera semana e incluso la segunda haya bajadas muy pronunciadas, pero hazte idea de que esto solo pasa en las primeras semanas, y no vuelve a pasar. Lo normal es que la primera semana pases hambre, luego el estómago se te va haciendo a la reducción de cantidades. También es normal que el ritmo intestinal cambie un poco, al ingerir menos cantidades.",
	"parrafo2":"Para el aceite, la dosis media recomendada suele ser 120 mL por semana. Un truco/técnica para no pasarse es tener el aceite medido. Por ejemplo, tener una parte apartada semanal de aceite y gestionártelo. En las preparaciones a la plancha se puede mojar un poco la plancha/sartén con aceite, pero intenta que el alimento no se quede empapado en aceite. Cuando ponga plancha puede ser también otras formas de cocinado como horno, vapor, microondas, etc."
}',
'{
	"Bebida de avena":"Mejor buscar las versiones mas ligeras dentro de las que te gusten.",
	"Gelatinas Zero":"Siempre que sean de las que no superen las 15 Kcal por gelatina. Puedes comer para picar entre horas libremente.",
	"Pasta":"Recomiendo consumir pasta con volumenes (macarrones, caracolas, espirales, etc) y evitar las que no dejan huecos entre medias como los espaguetis o los tallarines ya que, como también importa lo que percibimos visualmente, con los huecos vemos el plato mas lleno.",
	"Pepinillos, cebolletas, berenjenas de Almagro, toreras y zanahoria cruda":"Libres para comerlas cuando te apetezcan o para evitar picar otras cosas más calóricas. Puedes usarlas también durante las comidas y cenas.",
	"Pesos de raciones pequeñas":"Carne magra entre 80 y 100 gramos, pescado blanco entre 140 y 150 gramos, pescado azul entre 110 y 130 gramos.",
	"Queso fresco":"La cantidad en el desayuno serán laminas finas que justo cubran el pan."
}',
 '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
 (5, 'ep2244',
'{
	"titulo":"Dieta de 1500 Kcal aprox.",
	"parrafo1":"Calculada para tener una pérdida de alrededor de 600 - 700 g a la semana al principio, después irá bajando a 500 - 600 g por semana. Es normal que la primera semana e incluso la segunda haya bajadas muy pronunciadas, pero hazte idea de que esto solo pasa en las primeras semanas, y no vuelve a pasar. Lo normal es que la primera semana pases hambre, luego el estómago se te va haciendo a la reducción de cantidades. También es normal que el ritmo intestinal cambie un poco, al ingerir menos cantidades.",
	"parrafo2":"Para el aceite, la dosis media recomendada suele ser 150 mL por semana. Un truco/técnica para no pasarse es tener el aceite medido. Por ejemplo, tener una parte apartada semanal de aceite y gestionártelo. En las preparaciones a la plancha se puede mojar un poco la plancha/sartén con aceite, pero intenta que el alimento no se quede empapado en aceite. Cuando ponga plancha puede ser también otras formas de cocinado como horno, vapor, microondas, etc."
}',
'{
	"Cebolletas, pepinillos, toreras y berenjenas de Almagro":"Libres para comerlas cuando te apetezcan o para evitar picar otras cosas más calóricas. Puedes usarlas también durante las comidas y cenas.",
	"Cuñas de queso":"No te especifico que tengan que ser finas pero tampoco te pases en grosor. Puedes utilizar el trampeo de hacerlas cachos para que te parezca que comes mas.",
	"Especias, ajo, cebolla y demás condimentos":"Se pueden usar libremente.",
	"Infusiones":"Libres, siempre que sean sin endulzar. Son buenas aliadas para estar a dieta. Puedes usarlas previas a las comidas y cenas, para que te produzcan saciedad o de sobremesa para calmar el hambre si la cantidad ha sido poca y el cuerpo te pide comer más.",
	"Integral":"Como te dije, todo lo que puedas en integral mejor porque nos beneficia para la saciedad, el tránsito intestinal, los niveles de colesterol y la regulación de la glucosa en sangre.",
	"Leche":"Te dejo la entera pero lo idóneo si quieres acelerar la reducción de calorías, al menos por un tiempo, es que intentaras tomar la semidesnatada o la desnatada.",
	"Mantequilla":"Dentro de las mantequillas hay opciones menos calóricas. Te recomiendo probarlas.",
	"Pesos de raciones pequeñas":"Carne magra entre 80 y 100 gramos, pescado blanco entre 140 y 150 gramos, pescado azul entre 110 y 130 gramos.",
	"Vinagre":"Libre en las ensaladas. Puedes usar la crema de vinagre para soportar mejor el poco aceite de las ensaladas. Pero sin pasarse, alguna caloría tiene, pero comparado con el aceite es muy poco.",
	"Semillas":"Mientras sean semillas pequeñitas puedes usarlas siempre que quieras en las ensaladas."
}',
 '2023-04-06 04:43:15', '2023-04-06 04:43:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `textos_clientes`
--
-- ALTER TABLE `textos_clientes`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `textos_clientes`
--
-- ALTER TABLE `textos_clientes`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
