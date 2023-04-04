<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function pruebas()
    {

        $mock_texto_dietas = $this->mock_texto_dietas();

        return view('welcome')->with('texto_dietas', $mock_texto_dietas);
    }

    public function index()
    {
        return view('inicio');
    }

    public function midieta()
    {
        $datos_cliente = $this->mock_midieta_grafico();
        $mock_platos = $this->mock_midieta_tabla();
        $mock_texto_dietas = $this->mock_texto_dietas();
        return view('midieta')->with('peso_cliente', $datos_cliente)->with('platos', $mock_platos)->with('texto_dietas', $mock_texto_dietas);
    }

    // Mock de datos. Temporal
    public function mock_texto_dietas()
    {
        $texto = [
            'titulo' => 'Dieta de 1300 Kcal aprox.',
            'parrafo1' => 'Calculada para tener una pérdida de alrededor de 400 - 500 g a la semana al principio, después irá bajando a 300 g por semana. Es normal que la primera semana e incluso la segunda haya bajadas muy pronunciadas, pero hazte idea de que esto solo pasa en las primeras semanas, y no vuelve a pasar. Lo normal es que la primera semana pases hambre, luego el estómago se te va haciendo a la reducción de cantidades. También es normal que el ritmo intestinal cambie un poco, al ingerir menos cantidades',
            'parrafo2' => 'Para el aceite, la dosis media recomendada suele ser 120 mL por semana. Un truco/técnica para no pasarse es tener el aceite medido. Por ejemplo, tener una parte apartada semanal de aceite y gestionártelo. En las preparaciones a la plancha se puede mojar un poco la plancha/sartén con aceite, pero intenta que el alimento no se quede empapado en aceite. Cuando ponga plancha puede ser también otras formas de cocinado como horno, vapor, microondas, etc. Solo se puede usar aceite aparte cuando frías el pescado rebozado o el filete empanado',
            'Azúcar' => 'donde veas que te contemplo azúcar eres libre y te recomiendo que intentes sustituirlo por edulcorante',
            'Aliños alternativos' => 'como idea puedes usar salsa de yogur, cogiendo 1 cuchara de yogur y diluyéndola en un poco de agua. Otra idea es usar una salsa de mostaza, cogiendo una cuchara de mostaza de bolitas o normal y diluyéndola en vinagre',
            'Café con bebida de avena' => 'tienes contemplado uno durante la tarde con medio vaso de avena y media cucharita de postre de azúcar',
            'Cebolletas, pepinillos, toreras y berenjenas de Almagro' => 'libres para comerlas cuando te apetezcan o para evitar picar otras cosas más calóricas. Puedes usarlas también durante las comidas y cenas',
            'Especias, ajo, cebolla y demás condimentos para el cocinado' => 'se pueden usar libremente',
            'Infusiones' => 'libres, siempre que sean sin endulzar. Son buenas aliadas para estar a dieta. Puedes usarlas previas a las comidas y cenas, para que te produzcan saciedad o de sobremesa para calmar el hambre si la cantidad ha sido poca y el cuerpo te pide comer más',
            'Mermelada' => 'que ronden las 30 Kcal por cada 100 gramos. Suelo recomendar las Helios Diet o la Hero Diet, pero puedes mirar cualquiera que esté sobre esas Kcal',
            'Pasta' => 'recomiendo consumir pasta con volúmenes (macarrones, caracolas, espirales, etc.) y evitar las que no dejan huecos entre medias como los espaguetis o los tallarines ya que, como también importa lo que percibimos visualmente, con los huecos vemos el plato más lleno',
            'Pesos de raciones pequeñas' => 'carne magra entre 80 y 100 gramos, pescado blanco entre 140 y 150 gramos, pescado azul entre 110 y 130 gramos',
            'Sardinillas' => 'puede ser otro tipo de pescado pero respeta la cantidad',
            'Vinagre' => 'libre en las ensaladas. Puedes usar la crema de vinagre para soportar mejor el poco aceite de las ensaladas. Pero sin pasarse, alguna caloría tiene, pero comparado con el aceite es muy poco'
        ];
        return $texto;
    }

    public function mock_midieta_tabla()
    {
        $mock_platos = [
            'id_cliente' => 'jl0304',
            'desayuno' => [
                'cereales all bran plus',
                'fritos snack',
                'germen de trigo',
                'cereales miel pops', 'copos maiz azucarados frosties'
            ],
            'mediamanana' => ['barritas golde grahams', 'arroz inflado chocolateado'],
            'comida' => [
                'higado cerdo',
                'morcilla de embutido',
                'golden grahams',
                'fabada asturiana litoral',
                'callos a la madrileña la tila',
                'lentejas',
                'lentejas con chorizo litoral',
                'higado ternera',
                'pastel manzana hojaldre',
                'galletas choco flakes',
                'donettes',
                'lomo embuchado'
            ],
            'merienda' => [
                'doritos',
                'melocoton seco orejon',
                'cebada',
                'castaña',
                'nueces',
                'donut normal'
            ],
            'cena' => [
                'pure de patata',
                'tomate frito',
                'arroz inflado kellogs',
                'mejillon fresco',
                'albondigas la tila',
                'pate higado cerdo',
                'avena',
                'anchoas en aceite',
                'nesquik',
                'croissant chocolate',
                'bollycao',
                'huevo codorniz'
            ],
            'recena' => [
                'bocabits',
                'pipas girasol sin cascara',
                'trigo inflado azucarado smacks',
                'lenteja seca'
            ],
            'otro' => [
                'piñones sin cascara',
                'alubias secas'
            ]
        ];
        return $mock_platos;
    }

    public function mock_midieta_grafico()
    {
        $mock_datos_pesos = [
            'id_cliente' => 'jl0304',
            'fecha' => [
                '3-4-2023', '10-4-2023', '17-4-2023', '24-4-2023', '1-5-2023', '8-5-2023', '15-5-2023', '22-5-2023', '29-5-2023', '5-6-2023', '12-6-2023', '19-6-2023', '26-6-2023', '3-7-2023', '10-7-2023', '17-7-2023', '24-7-2023', '31-7-2023', '7-8-2023', '14-8-2023', '21-8-2023', '28-8-2023', '4-9-2023', '11-9-2023', '18-9-2023', '25-9-2023', '2-10-2023', '9-10-2023', '16-10-2023', '23-10-2023', '30-10-2023', '6-11-2023', '13-11-2023', '20-11-2023', '27-11-2023', '4-12-2023', '11-12-2023', '18-12-2023'
            ],
            'peso' => [
                77.00, 75.40, 73.80, 73.50, 74.40, 73.70, 73.20, 72.00, 72.50, 72.40, 71.40, 70.95, 70.51, 70.07, 69.64, 69.20, 68.76, 68.33, 67.89, 67.45, 67.01, 66.58, 66.14, 65.70, 65.26, 64.83, 64.39, 63.95, 63.52, 63.08, 62.64, 62.20, 61.77, 61.33, 60.89, 60.45, 60.02, 59.58
            ],
            'nota_pasos' => [
                9, 2, 5, 2, 0, 8, 7, 4, 10, 10, 9, 7, 4, 7, 6, 8, 1, 4, 0, 7, 0, 10, 4, 2, 0, 5, 2, 3, 2, 9, 10, 3, 3, 0, 0, 6, 5, 9
            ],
            'peso_teorico' => [
                77.00, 76.20, 75.40, 74.75, 74.10, 73.45, 72.80, 72.15, 71.50, 71.05, 70.60, 70.15, 69.70, 69.25, 68.80, 68.35, 67.90, 67.45, 67.00, 66.55, 66.10, 65.65, 65.20, 64.75, 64.75, 63.48, 62.98, 62.47, 61.97, 61.47, 60.96, 60.46, 59.96, 59.96, 59.96, 59.96, 59.96, 59.96
            ]
        ];
        $mock_datos_cliente = [
            'peso_final_1' => 65,
            'peso_final_2' => 60
        ];
        $peso_final_1_array = array_fill(0, count($mock_datos_pesos['fecha']), $mock_datos_cliente['peso_final_1']);
        $peso_final_2_array = array_fill(0, count($mock_datos_pesos['fecha']), $mock_datos_cliente['peso_final_2']);
        $mock_datos = [...$mock_datos_pesos, 'peso_final_1' => $peso_final_1_array, 'peso_final_2' => $peso_final_2_array];
        return $mock_datos;
    }
}
