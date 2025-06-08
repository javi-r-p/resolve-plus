function actualizar() {
    var salida2 = document.getElementById("salida2").value;
    var dispositivo = document.getElementById("dispositivo");
    dispositivo.value = salida2;
}
/**
 * Realiza una búsqueda de un número de serie para una empresa específica y muestra los resultados en el elemento con id "resultadosSerial".
 * Si el campo de entrada con id "serial" está vacío, limpia los resultados.
 * Utiliza XMLHttpRequest para hacer una petición GET a "tec/queries.php" con los parámetros necesarios. */
function busquedaSerial(empresa) {
    var termino = document.getElementById("serial").value;
    if (termino.length == 0) {
        document.getElementById("resultadosSerial").innerHTML = "";
        return true;
    } else {
        var solicitud = new XMLHttpRequest();
        solicitud.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("resultadosSerial").innerHTML = this.responseText;
            }
        };
        solicitud.open("GET", "tec/queries.php?q=serial&serial=" + encodeURIComponent(termino) + "&empresa=" + encodeURIComponent(empresa), true);
        solicitud.send();
    }
}