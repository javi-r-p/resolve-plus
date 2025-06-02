// Gráfico de incidencias por área
fetch("json_query.php?q=incidenciasAreasAbiertas")
.then((response) => response.json())
.then((data) => {
    crearGrafico(data, "bar", "incidenciasAreas", ["#D1D5DE", "#B7B6C2", "#837569", "#657153", "#8AAA79"], "incidenciasAreas", true, true, false, true, false);
})
.catch((error) => {
    console.error("Error recuperando datos:", error);
});

// Gráfico de incidencias por criticidad
fetch("json_query.php?q=incidenciasAbiertas")
.then((response) => response.json())
.then((data) => {
    crearGrafico(data, "doughnut", "incidenciasUrgentes", ["#ff4a4a", "#609966"], "incidenciasUrgencia", false, false, false, false, true);
})
.catch((error) => {
    console.error("Error recuperando datos:", error);
});

// Gráfico de incidencias por tipo de dispositivo
fetch("json_query.php?q=incidenciasDispositivoAbiertas")
.then((response) => response.json())
.then((data) => {
    crearGrafico(data, "bar", "incidenciasDispositivo", ["#CDC392", "#E8E5DA", "#9EB7E5", "#648DE5", "#304C89"], "incidenciasDispositivo", true, true, false, true, false)
})
.catch((error) => {
    console.error("Error recuperando datos: ", error)
})

// Función de creación de gráficos
function crearGrafico(datos, tipo, id, colores, tabla, lineasY, ejeY, lineasX, ejeX, leyenda) {
    if (tabla == "incidenciasUrgencia") {
        valoresX = ["Urgentes", "No urgentes"]
    } else {
        valoresX = datos.map(resultados => resultados.denominacion)
    }
    new Chart(document.getElementById(id), {
        type: tipo,
        data: {
            labels: valoresX,
            datasets: [{
                backgroundColor: colores,
                data: datos.map(resultados => resultados.conteo)
            }]
        },
        options: {
            legend: {
                display: leyenda
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: lineasY
                    },
                    ticks: {
                        display: ejeY,
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: lineasX
                    },
                    ticks: {
                        display: ejeX
                    }
                }]
            }
        }
    });
}