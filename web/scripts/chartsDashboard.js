// Gráfico de incidencias por área
fetch("json_query.php?tabla=incidenciasAreasAbiertas")
.then((response) => response.json())
.then((data) => {
    crearGrafico(data, "bar", "Incidencias por área",  "incidenciasAreas", ["#ff4d4d", "#fdff70", "#46a6ff", "#b668ff", "#ffc265"], "incidenciasAreas");
})
.catch((error) => {
    console.error("Error recuperando datos:", error);
});
// Gráfico de incidencias por técnico
fetch("json_query.php?tabla=incidenciasAbiertas")
.then((response) => response.json())
.then((data) => {
    crearGrafico(data, "doughnut", "Incidencias por criticidad", "incidenciasUrgentes", ["#ff4a4a", "#ffd549"], "incidenciasUrgencia");
})
.catch((error) => {
    console.error("Error recuperando datos:", error);
});

// Función de creación de gráficos
function crearGrafico(datos, tipo, titulo, id, colores, tabla) {
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
            legend: { display: false },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            title: {
                display: true,
                text: titulo
            }
        }
    });
}