function busqueda(termino, tipo, tabla) {
    if (termino.length == 0) {
        document.getElementById("salida").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("salida").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../php/busqueda.php?termino=" + encodeURIComponent(termino) + "&tipo=" + encodeURIComponent(tipo) + "&tabla=" + encodeURIComponent(tabla), true);
        xmlhttp.send();
    }
}
function actualizar() {
    var salida2 = document.getElementById("salida2").value;
    var dispositivo = document.getElementById("dispositivo");
    dispositivo.value = salida2;
}
function genPdf(tipo) {
    
}