class Pedido {
    constructor(numPed, cliente, fecha, procesado, servido) {
        this.numPed = numPed;
        this.cliente = cliente;
        this.fecha = fecha;
        this.procesado = procesado;
        this.servido = servido;
    }
}
let pedidos = JSON.parse(localStorage.getItem("pedidos"));
if (!Array.isArray(pedidos)) {
    pedidos = [];
    localStorage.setItem("pedidos", JSON.stringify(pedidos));
}

function guardarPedido() {
    localStorage.setItem("pedidos", JSON.stringify(pedidos));
}

function visualizarPedidos() {
    const tbody = document.querySelector("#tablaPedidos tbody");
    tbody.innerHTML = "";

    pedidos.forEach(pedido => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td>${pedido.numPed}</td>
            <td>${pedido.cliente}</td>
            <td>${pedido.fecha}</td>
            <td>${pedido.procesado ? "Sí" : "No"}</td>
            <td>${pedido.servido ? "Sí" : "No"}</td>
        `;
        tbody.appendChild(tr);
    });
}

function añadirPedido(numPed, cliente, fecha, procesado, servido) {
    if (!Number.isInteger(numPed)) {
        alert("El número de pedido debe ser un entero.");
        return;
    }

    if (!cliente || !fecha || procesado === undefined || servido === undefined) {
        alert("Datos inválidos. Por favor, introduzca los datos correctos.");
        return;
    }

    const nuevoPedido = new Pedido(numPed, cliente, fecha, procesado, servido);
    pedidos.push(nuevoPedido);

    guardarPedido();
    visualizarPedidos();
}

function eliminarPedido() {
    const numPed = parseInt(document.getElementById("numPedidoEliminar").value, 10);
    
    if (!numPed) {
        alert("Por favor, ingrese un número de pedido para eliminar.");
        return;
    }

    const index = pedidos.findIndex(p => p.numPed === numPed);
    if (index === -1) {
        alert(`No se encuentra el pedido con el número ${numPed}`);
        return;
    }

    pedidos.splice(index, 1); 
    guardarPedido();
    visualizarPedidos();
    alert(`Pedido con número ${numPed} eliminado correctamente`);
    document.getElementById("numPedidoEliminar").value = "";
}

function modificarPedido() {
    const numPed = parseInt(document.getElementById("modNumPedido").value, 10);
    const nuevoCliente = document.getElementById("modCliente").value;
    const nuevaFecha = document.getElementById("modFecha").value;
    const nuevoProcesado = document.getElementById("modProcesado").checked;
    const nuevoServido = document.getElementById("modServido").checked;

    if (!numPed || !nuevoCliente || !nuevaFecha || nuevoProcesado === undefined || nuevoServido === undefined) {
        alert("Datos inválidos. Por favor, complete todos los campos.");
        return;
    }

    const pedido = pedidos.find(p => p.numPed === numPed);
    if (!pedido) {
        alert("No hay ningún pedido con ese número");
        return;
    }

    pedido.cliente = nuevoCliente;
    pedido.fecha = nuevaFecha;
    pedido.procesado = nuevoProcesado;
    pedido.servido = nuevoServido;

    guardarPedido();
    visualizarPedidos();
    alert(`El pedido con número ${numPed} fue modificado correctamente`);
}

function formularioModificar(numPed) {
    const pedido = pedidos.find(p => p.numPed === numPed);
    if (!pedido) {
        alert(`No se puede encontrar el pedido con número ${numPed}`);
        return;
    }

    document.getElementById("modNumPedido").value = pedido.numPed;
    document.getElementById("modCliente").value = pedido.cliente;
    document.getElementById("modFecha").value = pedido.fecha;
    document.getElementById("modProcesado").checked = pedido.procesado;
    document.getElementById("modServido").checked = pedido.servido;
    document.getElementById("modificarPedidoBtn").style.display = 'inline-block';
    document.getElementById("eliminarPedidoBtn").style.display = 'inline-block';
}

document.addEventListener("DOMContentLoaded", () => {
    visualizarPedidos();
});

document.getElementById("formAñadirPedido").addEventListener("submit", (e) => {
    e.preventDefault();

    const numPedido = parseInt(document.getElementById("numPedido").value, 10);
    const cliente = document.getElementById("cliente").value;
    const fecha = document.getElementById("fecha").value;
    const procesado = document.getElementById("procesado").checked;
    const servido = document.getElementById("servido").checked;

    añadirPedido(numPedido, cliente, fecha, procesado, servido);

    e.target.reset();
});