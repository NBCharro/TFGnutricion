// Si se ve desde el movil cambian cosas
let tamanoPesoTeorico = 50;
let radioPunto = 3;
if (window.innerWidth < 768) {
    tamanoPesoTeorico = 20;
    radioPunto = 0;
}

// Si estamos en dark mode cambiamos el color de la fuente de la leyenda
let colorLeyenda = document.body.classList.contains('dark') ? '#3DBEFF' : "black";

// Creo el set de datasets para pintar en la grafica
let datos = [{
    label: "Peso",
    backgroundColor: "hsl(217, 57%, 51%)",
    borderColor: "hsl(217, 57%, 51%)",
    data: pesos.filter(function (value) {
        return value !== 0;
    }),
    yAxisID: 'pesos',
},
{
    label: "Peso final 1",
    backgroundColor: "hsl(75, 57%, 51%)",
    borderColor: "hsl(75, 57%, 51%)",
    data: peso_final_1,
    yAxisID: 'pesos',
},
];
// Si no hay pasos o notas, no se agrega
if (nota_pasos.length != 0) {
    let suma = 0;
    for (let i = 0; i < nota_pasos.length; i++) {
        suma += nota_pasos[i];
    }
    const media = suma / nota_pasos.length;
    const nombre_nota_pasos = media <= 10 ? 'Nota' : 'Pasos';
    datos.push({
        label: nombre_nota_pasos,
        backgroundColor: "hsl(255, 9%, 50%)",
        borderColor: "hsl(255, 9%, 50%)",
        data: nota_pasos.filter(function (value) {
            return value !== 0;
        }),
        yAxisID: 'notas_pasos'
    });
}
if (peso_final_2[0] != 0) {
    // El peso se crea automaticamente como un array, si es 0 es que no hay peso_final_2
    datos.push({
        label: "Peso final 2",
        backgroundColor: "hsl(10, 57%, 51%)",
        borderColor: "hsl(10, 57%, 51%)",
        data: peso_final_2,
        yAxisID: 'pesos',
    });
}
// El peso teorico tiene que quedar por debajo de todas las demas lineas
datos.push({
    label: "Peso teorico",
    backgroundColor: "hsl(150, 57%, 51%)",
    borderColor: "hsl(150, 57%, 51%)",
    data: peso_teorico,
    borderWidth: tamanoPesoTeorico,
    hoverBorderWidth: 100,
    pointBorderWidth: 0,
    yAxisID: 'pesos',
});

// Creamos la grafica
const labels = fechas;
const data = {
    labels: labels,
    datasets: datos,
};

const configLineChart = {
    type: "line",
    data,
    options: {
        plugins: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    color: colorLeyenda,
                    boxWidth: 0,
                    boxHeight: 0
                }
            }
        },
        elements: {
            point: {
                pointRadius: radioPunto,
            }
        },
        scales: {
            pesos: {
                type: 'linear',
                display: true,
                position: 'left',
                beginAtZero: false,
                suggestedMin: Math.min(...peso_teorico) - Math.min(...peso_teorico) * 0.05,
                suggestedMax: Math.max(...peso_teorico) + Math.max(...peso_teorico) * 0.05
            },
            notas_pasos: {
                type: 'linear',
                display: nota_pasos == "" ? false : true,
                position: 'right',
                suggestedMin: 0,
                suggestedMax: 10
            }
        },
    }
}

var chartLine = new Chart(
    document.getElementById("chartLine"),
    configLineChart
);
