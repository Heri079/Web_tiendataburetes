let carrito = {};

function agregarAlCarrito(producto, precio) {
    if (carrito[producto]) {
        carrito[producto].cantidad++;
    } else {
        carrito[producto] = { precio, cantidad: 1 };
    }
    actualizarCarrito();
}

function vaciarCarrito() {
    carrito = {};
    actualizarCarrito();
}

function quitarDelCarrito(producto) {
    if (carrito[producto] && carrito[producto].cantidad > 0) {
        carrito[producto].cantidad--;
        if (carrito[producto].cantidad === 0) {
            delete carrito[producto];
        }
        actualizarCarrito();
    }
}

function actualizarCarrito() {
    const itemsCarrito = document.getElementById('itemsCarrito');
    const totalCarritoElement = document.getElementById('totalCarrito');
    itemsCarrito.innerHTML = '';

    let totalCarrito = 0;

    Object.keys(carrito).forEach(producto => {
        const div = document.createElement('div');
        const subtotal = carrito[producto].precio * carrito[producto].cantidad;
        totalCarrito += subtotal;

        div.innerHTML = `${producto} - Cantidad: ${carrito[producto].cantidad} - Subtotal: $${subtotal.toFixed(2)} <button onclick="quitarDelCarrito('${producto}')">Quitar uno</button>`;
        itemsCarrito.appendChild(div);
    });

    totalCarritoElement.textContent = `Total Carrito: $${totalCarrito.toFixed(2)}`;
}







        
    