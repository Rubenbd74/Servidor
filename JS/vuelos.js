class Vuelo {
    constructor(codigo, numPlazas, importe) {
        this.codigo = codigo;
        this.numPlazas = numPlazas;
        this.importe = importe;
    }
}

class VueloMuyRentable extends Vuelo {
    constructor(codigo, ingresoEstimado) {
        super(codigo);
        this.ingresoEstimado = ingresoEstimado;
    }
}

let Vuelos = JSON.parse(localStorage.getItem("Vuelos"));
if (!Array.isArray(Vuelos)) {
    Vuelos = [];
    localStorage.setItem("Vuelos", JSON.stringify(Vuelos));
}

//Se guardan en localStorage los datos
function guardarVuelo() {
    localStorage.setItem("Vuelos", JSON.stringify(Vuelos));
}

//En esta funcion visualizo los Vuelos
function visualizarVuelos() {
    const tbody = document.querySelector("#tablaVuelos tbody");
    tbody.innerHTML = ""; 

    Vuelos.forEach(Vuelo => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td>${Vuelo.codigo}</td>
            <td>${Vuelo.numPlazas}</td>
            <td>${Vuelo.importe}</td>
        `;
        tbody.appendChild(tr);
    });
}

function visualizarVuelosMuyRentables() {
    const tbody = document.querySelector("#tablaVuelosMuyRentables tbody");
    tbody.innerHTML = "";

    Vuelos.forEach(Vuelo => {
        if (Vuelo instanceof VueloMuyRentable) {
            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td>${Vuelo.codigo}</td>
                <td>${Vuelo.ingresoEstimado}</td>
            `;
            tbody.appendChild(tr);
        }
    });
}

function AñadirVuelo(codigo, numPlazas, importe) {

    codigo = document.getElementById("codigo").value;
    numPlazas = document.getElementById("numPlazas").value;
    importe = document.getElementById("importe").value;

    if (!codigo /*|| !numPlazas*/ || !importe  ) {
        alert("Datos inválidos. Por favor, complete todos los campos.");
        return;
    }

    if(numPlazas<1 || importe<1){
        alert("Datos inválidos. Las Plazas y el Importe deben ser al menos 1.");
        return;
    }

    if (importe>=20000) {
        alert("El vuelo es muy rentable");
        const nuevoVuelo = new VueloMuyRentable(codigo, numPlazas, importe);
        Vuelos.push(nuevoVuelo);
        return;
    }

    const nuevoVuelo = new Vuelo(codigo, numPlazas, importe);
    Vuelos.push(nuevoVuelo);

    guardarVuelo();
    visualizarVuelos();
}

function modificarVuelo() {
    const nuevoCodigo = parseInt(document.getElementById("modCodigo").value);
    const nuevasPlazas = document.getElementById("modNumPlazas").value;
    const nuevoImporte = document.getElementById("modImporte").value;

    if (!nuevoCodigo || !nuevasPlazas || !nuevoImporte ) {
        alert("Datos inválidos. Por favor, complete todos los campos.");
        return;
    }

    if(nuevasPlazas<1 || nuevoImporte<1){
        alert("Datos inválidos. Las Plazas y el Importe deben ser al menos 1.");
        return;
    }

    const Vuelo = Vuelos.find(p => p.codigo === codigo);
    if (!Vuelo) {
        alert("No hay ningún Vuelo con ese codigo");
        return;
    }

    const Importe = Vuelos.find(p => p.importe === importe);
    if( Importe<20000 && nuevoImporte>=20000) {
        alert("El vuelo es ahora muy rentable");

        Vuelo.codigo = nuevoCodigo;
        Vuelo.numPlazas = nuevasPlazas;
        Vuelo.importe = nuevoImporte;

        const nuevoVuelo = new VueloMuyRentable(codigo, numPlazas, importe);
        Vuelos.push(nuevoVuelo);
        return;
    }

    if( Importe>=20000 && nuevoImporte>=20000) {
        alert("El vuelo sigue siendo muy rentable");

        Vuelo.codigo = nuevoCodigo;
        Vuelo.numPlazas = nuevasPlazas;
        Vuelo.importe = nuevoImporte;

        return;
    }

    if( Importe>=20000 && nuevoImporte<20000) {
        alert("El vuelo ha dejado de ser muy rentable");
        const index = Vuelos.findIndex(p => p.importe === importe);
        if (index !== -1) {
            Vuelos.splice(index, 1);
        }

        Vuelo.codigo = nuevoCodigo;
        Vuelo.numPlazas = nuevasPlazas;
        Vuelo.importe = nuevoImporte;

        return;
    }


    guardarVuelo();
    visualizarVuelos();
    alert(`El Vuelo con codigo ${codigo} fue modificado correctamente`);
}


function Calcular() {
    const importe = parseInt(document.getElementById("importe").value);
    const numPlazas = parseInt(document.getElementById("numPlazas").value);

    const ingresoEstimado = calcularIngresoEstimado(importe, numPlazas);

    if(importe<10000) {
        alert("El vuelo es poco rentable, el ingreso estimado es: " + ingresoEstimado);
    }
    if(importe>=10000 && importe<20000) {
        alert("El vuelo es rentable, el ingreso estimado es: " + ingresoEstimado);
    }
    if(importe>=20000) {
        alert("El vuelo es muy rentable, el ingreso estimado es: " + ingresoEstimado);
    }
}

function calcularIngresoEstimado(importe, numPlazas) {
    return importe * numPlazas;
}

document.addEventListener("DOMContentLoaded", () => {
    visualizarVuelos();
});

document.getElementById("Vuelos").addEventListener("submit", (e) => {
    e.preventDefault();

    const codigo = parseInt(document.getElementById("codigo").value);
    const numPlazas = document.getElementById("numPlazas").value;
    const importe = document.getElementById("importe").value;

    añadirPedido(codigo, numPlazas, importe);

    e.target.reset();
});