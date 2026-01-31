

document.addEventListener("DOMContentLoaded", () => {

    // Selecciona todos los botones con la clase agregar-carrito
    const botones = document.querySelectorAll(".agregar-carrito");

    botones.forEach(boton => {
        boton.addEventListener("click", () => {
            const productoId = boton.getAttribute("data-id");
            agregarAlCarrito(productoId);
        });
    });

});

const agregarAlCarrito = (productoId) => {

    const datos = new FormData();//Crea un objeto FormData. 
    datos.append("id", productoId);

    fetch("../carrito/agregarCarrito.php", {
        method: "POST",//POST. Es lo apropiado para enviar datos que modifican estado (ej. agregar al carrito, cambiar stock).
        body: datos
    })
    .then(res => res.json())  // ahora esperamos JSON
    .then(data => {

        if (data.status === "ok") {

            // Actualiza el contador si lo estás usando
            const badge = document.querySelector("#carrito-count");
            if (badge) badge.textContent = data.carritoCount;

            alert("Producto agregado al carrito");

        } else {
            alert("Error: " + data.message);
        }

    })
    .catch(err => console.error("Error al agregar al carrito:", err));
};


