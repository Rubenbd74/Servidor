class Piezas {
    constructor(numPieza, largo, ancho, grosor, color, ambasCaras, cortada) {
        this.numPieza = numPieza;
        this.largo = largo;
        this.ancho = ancho;
        this.grosor = grosor;
        this.color = color;
        this.ambasCaras = ambasCaras;
        this.cortada = cortada;

        this.superficie = this.calcularSuperficie();
        this.volumen = this.calcularVolumen();
    }

    calcularSuperficie() {
        return this.largo * this.ancho; 
    }

    calcularVolumen() {
        return this.largo * this.ancho * this.grosor; 
    }
}

let piezas = JSON.parse(localStorage.getItem("piezas")) || [];
piezas = piezas.map(piezaData => Object.assign(new Piezas(), piezaData));

function guardarPiezas() {
    localStorage.setItem("piezas", JSON.stringify(piezas));
}

function visualizarPiezas() {
    const tbody = document.querySelector("#tablaPedidos tbody");
    tbody.innerHTML = "";

    piezas.forEach(pieza => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td>${pieza.numPieza}</td>
            <td>${pieza.largo} cm</td>
            <td>${pieza.ancho} cm</td>
            <td>${pieza.grosor} cm</td>
            <td>${pieza.color}</td>
            <td>${pieza.superficie.toFixed(2)} cm²</td>
            <td>${pieza.volumen.toFixed(2)} cm³</td>
        `;

        tr.addEventListener("click", () => formularioModificacion(pieza.numPieza));

        tbody.appendChild(tr);
    });
}

function añadirPieza(numPieza, largo, ancho, grosor, color, ambasCaras, cortada) {
    if (piezas.some(p => p.numPieza === numPieza)) {
        alert(`Ya existe una pieza con el número ${numPieza}`);
        return;
    }
    if (!Number.isInteger(numPieza)) {
        alert("El número de pieza debe ser un entero");
        return;
    }
    if (!largo || !ancho || !grosor || !color || ambasCaras === undefined || cortada === undefined) {
        alert("Datos inválidos. Por favor, introduzca los datos correctos");
        return;
    }
    const nuevaPieza = new Piezas(numPieza, largo, ancho, grosor, color, ambasCaras, cortada);
    piezas.push(nuevaPieza);
    guardarPiezas();
    visualizarPiezas();
}

function eliminarPieza() {
    const numPieza = parseInt(document.getElementById("numPiezaEliminar").value, 10);
    if (!numPieza) {
        alert("Por favor, ingrese un número de pieza correcto para eliminar");
        return;
    }
    const index = piezas.findIndex(p => p.numPieza === numPieza);
    if (index === -1) {
        alert(`No se encuentra la pieza con el número ${numPieza}`);
        return;
    }
    piezas.splice(index, 1);
    guardarPiezas();
    visualizarPiezas();
    alert(`Pieza con número ${numPieza} eliminada correctamente`);
    document.getElementById("numPiezaEliminar").value = "";
}

function modificarPieza() {
    const numPieza = parseInt(document.getElementById("modNumPieza").value, 10);
    const nuevoLargo = parseFloat(document.getElementById("modLargo").value);
    const nuevoAncho = parseFloat(document.getElementById("modAncho").value);
    const nuevoGrosor = parseFloat(document.getElementById("modGrosor").value);
    const nuevoColor = document.getElementById("modColor").value;

    if (!numPieza || !nuevoLargo || !nuevoAncho || !nuevoGrosor || !nuevoColor) {
        alert("Datos inválidos. Por favor, complete todos los campos");
        return;
    }

    const pieza = piezas.find(p => p.numPieza === numPieza);
    if (!pieza) {
        alert("No hay ninguna pieza con ese número");
        return;
    }

    pieza.largo = nuevoLargo;
    pieza.ancho = nuevoAncho;
    pieza.grosor = nuevoGrosor;
    pieza.color = nuevoColor;
    pieza.superficie = pieza.calcularSuperficie();
    pieza.volumen = pieza.calcularVolumen();

    guardarPiezas();
    visualizarPiezas();
    alert(`La pieza con número ${numPieza} fue modificada correctamente`);
}

document.addEventListener("DOMContentLoaded", () => {
    visualizarPiezas();
});

document.getElementById("formularioAñadir").addEventListener("submit", (e) => {
    e.preventDefault();

    const numPieza = parseInt(document.getElementById("numPieza").value, 10);
    const largo = parseFloat(document.getElementById("largo").value);
    const ancho = parseFloat(document.getElementById("ancho").value);
    const grosor = parseFloat(document.getElementById("grosor").value);
    const color = document.getElementById("color").value.trim();
    const ambasCaras = document.getElementById("ambasCaras").checked;
    const cortada = document.getElementById("cortada").checked;

    añadirPieza(numPieza, largo, ancho, grosor, color, ambasCaras, cortada);

    e.target.reset(); 
});

document.getElementById("formularioModificacion").addEventListener("submit", (e) => {
    e.preventDefault();
    modificarPieza();
});