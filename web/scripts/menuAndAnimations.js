function abrirMenu () {
    var menu = document.getElementById("menuLateral");
    menu.classList.remove = "display-none";
    menu.classList.add = "menuLateral";
    menu.style.transform = "translateX(0%)";
    menu.style.display = "block";
}
function cerrarMenu () {
    var menu = document.getElementById("menuLateral");
    menu.classList.remove = "menuLateral";
    menu.style.transform = "translateX(-100%)";
    menu.classList.add = "display-none";
}