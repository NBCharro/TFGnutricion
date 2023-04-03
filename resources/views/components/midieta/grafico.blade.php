    <div class="overflow-hidden rounded-lg shadow-lg mt-50">
        <canvas class="md:p-10 bg-gray-50 dark:bg-tertiary-700" id="chartLine"></canvas>
    </div>

    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart line -->
    <script>
        <?php
        $fecha_php = json_encode($peso_cliente['fecha']);
        $peso_php = json_encode($peso_cliente['peso']);
        $peso_final_1_php = json_encode($peso_cliente['peso_final_1']);
        $peso_final_2_php = json_encode($peso_cliente['peso_final_2']);
        $peso_teorico_php = json_encode($peso_cliente['peso_teorico']);
        $nota_pasos_php = json_encode($peso_cliente['nota_pasos']);
        echo 'const fechas = ' . $fecha_php . ";\n";
        echo 'const pesos = ' . $peso_php . ";\n";
        echo 'const peso_teorico = ' . $peso_teorico_php . ";\n";
        echo 'const peso_final_1 = ' . $peso_final_1_php . ";\n";
        echo 'let peso_final_2 = ' . $peso_final_2_php . ";\n";
        echo 'let nota_pasos = ' . $nota_pasos_php . ";\n";
        ?>
        // Borrar, es para pruebas:
        nota_pasos = "";
        peso_final_2 = "";

        // Si se ve desde el movil cambian cosas
        let pantallaGrande = true;
        let tamanoPesoTeorico = 50;
        let radioPunto = 3;
        if (window.innerWidth < 768) {
            pantallaGrande = false;
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
                data: pesos,
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
        if (nota_pasos != "") {
            datos.push({
                label: "Nota o peso",
                backgroundColor: "hsl(255, 9%, 50%)",
                borderColor: "hsl(255, 9%, 50%)",
                data: nota_pasos,
                yAxisID: 'notas_pasos'
            });
        }
        if (peso_final_2 != "") {
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
                        display: pantallaGrande,
                        position: 'chartArea',
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
                    },
                    notas_pasos: {
                        type: 'linear',
                        display: nota_pasos == "" ? false : true,
                        position: 'right',
                    },
                }
            }
        }

        var chartLine = new Chart(
            document.getElementById("chartLine"),
            configLineChart
        );
    </script>
