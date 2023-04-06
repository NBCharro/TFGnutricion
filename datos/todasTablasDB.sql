INSERT INTO `clientes` (`id`, `id_cliente`, `nombre_apellidos`, `telefono`, `email`, `direccion`, `fecha_inicio`, `peso_inicial`, `peso_final_1`, `peso_final_2`, `created_at`, `updated_at`) VALUES
(1, 'jl3864', 'Jose Luis Panadero Gutierrez', '926 901 067', 'jose.luis@gmail.com', 'Plaza Eduardo, 3, 0º A', '04-09-2022', 98, 90, 82, '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(2, 'is3137', 'Ismael Rodrigo Benavidez', '610 649 844', 'ismael22@malave.org', 'Calle Casanova de la Sierra, 230', '01-02-2023', 103, 83, null, '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(3, 'ia6472', 'Irene Alfonso Martinez', '913 345 643', 'cgurule@gmail.com', 'Travessera Palacios, 416, 1º B', '01-04-2023', 73, 63, null, '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(4, 'as6343', 'Ariadna Sancho Tercero', '686 930 803', 'arisan64@puente.es', 'Plaza Perea, 4, 5º E', '05-02-2023', 110, 80, null, '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(5, 'ep2244', 'Elena Prado Ibañez', '975 589 674', 'epibanez@yahoo.es', 'Avenida Ismael, 233, Bajo 6º', '18-11-2022', 79, 70, 60, '2023-04-06 04:43:15', '2023-04-06 04:43:15');

INSERT INTO `contactos_externos` (`id`, `nombre`, `telefono`, `email`, `fecha`, `mensaje`, `created_at`, `updated_at`) VALUES
(1, 'Oliver', '900 314 350', 'lucero.oliver@linares.com.es', '04-04-2023', 'Hola, estoy interesado/a en obtener información sobre tus servicios como nutricionista. Me gustaría saber cuál es tu disponibilidad para una consulta inicial y cuáles son tus tarifas. ¡Gracias!', '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(2, 'Gust', '667 627 571', 'gustavo1992@yahoo.com', '28-02-2023', 'Buen día, estoy buscando un plan de alimentación personalizado y me han recomendado tus servicios como nutricionista. ¿Podrías proporcionarme información sobre cómo trabajas y cuál es tu tarifa por sesión? Estoy muy interesado/a en programar una consulta.', '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(3, 'Luna', '654 236 842', 'lbalderas@sisneros.com', '25-03-2023', 'Hola, me llamo Luna y me gustaría saber si podrías proporcionarme información sobre tus servicios de nutrición. Estoy buscando ayuda para mejorar mi dieta y mi salud en general. ¿Tienes disponibilidad para una consulta en los próximos días?', '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(4, 'Aroa Segovia', '923 745 844', 'oulibarri@hotmail.es', '28-02-2021', 'Buenos días, estoy buscando un nutricionista que me ayude a mejorar mi dieta y a lograr mis objetivos de salud. Me gustaría programar una consulta para obtener más información sobre tus servicios y tarifas. ¿Podrías indicarme tu disponibilidad para la próxima semana?', '2023-04-06 04:43:15', '2023-04-06 04:43:15');

INSERT INTO `contactos_internos` (`id`, `id_cliente`, `fecha`, `mensaje`, `created_at`, `updated_at`) VALUES
(1, 'jl3864', '15-03-2023', 'Hola, tengo una duda sobre mi dieta. He notado que me siento con menos energía por las mañanas y quería saber si hay algún alimento que pueda incluir en mi desayuno para sentirme mejor. ¿Podrías ayudarme?', '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(2, 'as6343', '25-03-2023', 'Hola America, estoy siguiendo mi plan de alimentación al pie de la letra, pero he notado que me siento un poco hinchada después de las comidas. ¿Puede haber alguna comida en mi dieta que esté causando esto?', '2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(3, 'jl3864', '03-04-2023', 'Hola, necesito tu ayuda con mi dieta. Estoy teniendo dificultades para seguir con mis comidas programadas durante el día porque a veces tengo mucho trabajo y no me da tiempo para cocinar. ¿Podrías darme algunas recomendaciones de comidas rápidas y saludables que pueda tener a mano en mi escritorio?', '2023-04-06 04:43:15', '2023-04-06 04:43:15');

INSERT INTO `pesos` (`id`, `id_cliente`, `fecha`, `peso`, `peso_teorico`, `nota_pasos`, `created_at`, `updated_at`) VALUES
(1, 'jl3864',
"['4-9-2022','11-9-2022','18-9-2022','25-9-2022','2-10-2022','9-10-2022','16-10-2022','23-10-2022','30-10-2022','6-11-2022','13-11-2022','20-11-2022','27-11-2022','4-12-2022','11-12-2022','18-12-2022','25-12-2022','1-1-2023','8-1-2023','15-1-2023','22-1-2023','29-1-2023','5-2-2023','12-2-2023','19-2-2023','26-2-2023','5-3-2023','12-3-2023','19-3-2023','26-3-2023','2-4-2023','9-4-2023','16-4-2023','23-4-2023','30-4-2023']",
"[98.00,97.50,98.00,97.00,95.00,94.50,95.00,94.00,94.00,93.50,92.00,91.00,91.50,91.00,91.00,90.50,89.00,93.00,92.00,90.00,89.00,87.00,87.50,86.00,85.00,85.00,86.00,85.00,84.50,83.50,83.50,83.40]",
"[98.00,97.35,96.70,96.05,95.40,94.95,94.50,94.05,93.60,93.15,92.70,92.25,91.80,91.35,90.90,90.45,90.00,89.55,89.10,88.65,88.20,87.75,87.30,86.85,86.40,85.95,85.50,85.05,84.60,84.15,83.70,83.25,82.80,82.35,81.90]",
"[5,6,3,4,8,7,4,6,4,5,7,8,6,6,4,9,9,0,6,10,9,10,4,8,8,4,6,7,5,6,4,2]",
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(2, 'is3137',
"['1-2-2023','8-2-2023','15-2-2023','22-2-2023','1-3-2023','8-3-2023','15-3-2023','22-3-2023','29-3-2023','5-4-2023','12-4-2023','19-4-2023','26-4-2023','3-5-2023','10-5-2023','17-5-2023','24-5-2023','31-5-2023','7-6-2023','14-6-2023','21-6-2023','28-6-2023','5-7-2023','12-7-2023','19-7-2023','26-7-2023','2-8-2023','9-8-2023','16-8-2023','23-8-2023','30-8-2023','6-9-2023','13-9-2023','20-9-2023','27-9-2023','4-10-2023','11-10-2023','18-10-2023','25-10-2023','1-11-2023','8-11-2023','15-11-2023','22-11-2023','29-11-2023','6-12-2023','13-12-2023','20-12-2023']",
"[103.00,104.50,102.00,101.00,99.00,100.50,99.00,97.00,99.00,100.50,96.00]",
"[103.00 ,102.35 ,101.70 ,101.05 ,100.40 ,99.75 ,99.10 ,98.45 ,98.05 ,97.65 ,97.25 ,96.85 ,96.45 ,96.05 ,95.65 ,95.25 ,94.85 ,94.45 ,94.05 ,93.65 ,93.25 ,92.85 ,92.45 ,92.05 ,91.65 ,91.25 ,90.85 ,90.45 ,90.05 ,89.65 ,89.25 ,88.85 ,88.45 ,88.05 ,87.65 ,87.25 ,86.85 ,86.45 ,86.05,85.65,85.25,84.85,84.45,84.05,83.65,83.25,82.85]",
"[10,12,7,10,12,13,10,10,10,10,11]",
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(3, 'ia6472',
"['1-4-2023','8-4-2023','15-4-2023','22-4-2023','29-4-2023','6-5-2023','13-5-2023','20-5-2023','27-5-2023','3-6-2023','10-6-2023','17-6-2023','24-6-2023','1-7-2023','8-7-2023','15-7-2023','22-7-2023','29-7-2023','5-8-2023','12-8-2023','19-8-2023','26-8-2023','2-9-2023','9-9-2023','16-9-2023','23-9-2023','30-9-2023','7-10-2023']",
"[73.00, 72.50]",
"[]",
"[73.00, 72.50,72.00,71.50,71.00,70.50,70.00,69.65,69.30,68.95,68.60,68.25,67.90,67.55,67.20,66.85,66.50,66.15,65.80,65.45,65.10,64.75,64.40,64.05,63.70,63.35,63.00,62.65]",
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(4, 'as6343',
"['5-2-2023','12-2-2023','19-2-2023','26-2-2023','5-3-2023','12-3-2023','19-3-2023','26-3-2023','2-4-2023','9-4-2023','16-4-2023','23-4-2023','30-4-2023','7-5-2023','14-5-2023','21-5-2023','28-5-2023','4-6-2023','11-6-2023','18-6-2023','25-6-2023','2-7-2023','9-7-2023','16-7-2023','23-7-2023','30-7-2023','6-8-2023','13-8-2023','20-8-2023','27-8-2023','3-9-2023','10-9-2023','17-9-2023','24-9-2023','1-10-2023','8-10-2023','15-10-2023','22-10-2023','29-10-2023','5-11-2023','12-11-2023','19-11-2023','26-11-2023','3-12-2023','10-12-2023','17-12-2023','24-12-2023','31-12-2023','7-1-2024']",
"[110.00,109.50,111.00,109.00,106.00,108.50,107.00,108.00,106.00,104.50]",
"[110.00,109.20,108.40,107.60,106.80,106.00,105.20,104.40,103.60,103.00,102.40,101.80,101.20,100.60,100.00,99.40,98.80,98.20,97.60,97.00,96.40,95.80,95.20,94.60,94.00,93.40,92.80,92.20,91.60,91.00,90.40,89.80,89.20,88.60,88.00,87.40,86.80,86.20,85.6,85,84.4,83.8,83.2,82.6,82,81.4,80.8,80.2,79.6]",
"[]",
'2023-04-06 04:43:15', '2023-04-06 04:43:15'),
(5, 'ep2244',
"['18-11-2022','25-11-2022','2-12-2022','9-12-2022','16-12-2022','23-12-2022','30-12-2022','6-1-2023','13-1-2023','20-1-2023','27-1-2023','3-2-2023','10-2-2023','17-2-2023','24-2-2023','3-3-2023','10-3-2023','17-3-2023','24-3-2023','31-3-2023','7-4-2023','14-4-2023','21-4-2023','28-4-2023','5-5-2023','12-5-2023','19-5-2023','26-5-2023','2-6-2023','9-6-2023','16-6-2023','23-6-2023','30-6-2023','7-7-2023','14-7-2023','21-7-2023']",
"[79.00,79.50,79.00,76.00,76.00,77.50,76.00,73.00,76.00,72.50,74.00,73.00,74.50,73.00,70.00,72.50,69.00,75.00,71.00,70.00,70.00,67.00]",
"[5945,2044,4580,2748,7857,2561,8996,6035,5583,4655,3537,6414,5680,6797,5845,8309,6839,3129,8983,4457,5699,7331]",
"[79.00,78.25,77.50,76.75,76.00,75.25,74.50,73.75,73.25,72.75,72.25,71.75,71.25,70.75,70.25,69.75,69.25,68.75,68.25,67.75,67.25,66.75,66.25,65.75,65.25,64.75,64.25,63.75,63.25,62.75,62.25,61.75,61.25,60.75,60.25,59.75]",
'2023-04-06 04:43:15', '2023-04-06 04:43:15');

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
