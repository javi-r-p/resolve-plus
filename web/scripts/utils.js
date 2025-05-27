function copiar(elemento) {
    // var cadena = document.getElementById(elemento).innerHTML;
    // console.log(cadena)
    // navigator.clipboard.writeText(cadena);
    // alert("Número de serie " + cadena + " copiado al portapapeles")
  let text = document.getElementById("numeroSerie").innerHTML;
  const copyContent = async () => {
    try {
      await navigator.clipboard.writeText(text);
      console.log('Content copied to clipboard');
    } catch (err) {
      console.error('Failed to copy: ', err);
    }
  }
}