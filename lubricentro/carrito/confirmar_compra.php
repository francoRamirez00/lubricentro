<?php
include "../conexion.php";
session_start();

//var_dump($_SESSION['usuario_id']);
//var_dump($_SESSION['usuario_email']);

// Verificamos que el usuario esté logueado
if (!isset($_SESSION['usuario_email'])) {
    header("Location: ../login/login.php");
    exit;
}

// Si el carrito está vacío, salimos
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    header("Location: carrito.php");
    exit;
}

$carrito = $_SESSION['carrito'];

// Crear la venta 
$total = 0;

// validamos stock

foreach ($carrito as $id => $cantidad) {
    $res = $conexion->query("SELECT nombre, stock FROM producto WHERE id= $id");

    $prod = $res->fetch_assoc();

    if (!$prod) {
        $_SESSION['error_carrito'] = "El producto seleccionado no existe.";
        header("Location: carrito.php");
        exit;
    }

    if ($prod['stock'] < $cantidad) {
        $_SESSION['error_carrito'] =
            "Stock insuficiente para <strong>{$prod['nombre']}</strong>. 
                Stock disponible: {$prod['stock']}";
        header("Location: carrito.php");
        exit;
    }
    // 
    //unset($_SESSION['carrito']);  // vaciás el carrito
    //header("Location: carrito.php");
    // exit;
}

foreach ($carrito as $id => $cantidad) {
    // Traemos el precio del producto
    $res = $conexion->query("SELECT precio FROM producto WHERE id = $id");
    $prod = $res->fetch_assoc();

    $total += $prod['precio'] * $cantidad;
}



// Insertamos la venta
$id_usuario = (int)$_SESSION['usuario_id']; // lo guardo en control_login
$sqlVenta = "INSERT INTO venta (id_usuario, total, fecha) VALUES ('$id_usuario','$total' , NOW())";
$conexion->query($sqlVenta);

// ID de la venta recién creada
$idVenta = $conexion->insert_id;


// Insertar cada ítem en detalle_venta y descontar stock
foreach ($carrito as $id => $cantidad) {

    // Traemos datos del producto
    $res = $conexion->query("SELECT precio, stock FROM producto WHERE id = $id");
    $prod = $res->fetch_assoc();

    $precio = $prod['precio'];
    $stockActual = $prod['stock'];

    // Insertar detalle
    $sqlDetalle = "INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio_unitario)
                    VALUES ($idVenta, $id, $cantidad, $precio)";
    $conexion->query($sqlDetalle);

    // Descontar el stock
    $nuevoStock = $stockActual - $cantidad;

    $conexion->query("UPDATE producto SET stock = $nuevoStock WHERE id = $id");
}
$_SESSION['compra_exitosa'] = true;
unset($_SESSION['carrito']);  // vaciás el carrito
header("Location: carrito.php");
exit;


// 
