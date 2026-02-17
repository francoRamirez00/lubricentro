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

$conexion->begin_transaction();
// Crear la venta 
$total = 0;

try {

    // validamos stock

    foreach ($carrito as $id => $cantidad) {
        $stmt = $conexion->prepare("SELECT nombre, stock FROM producto WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
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
        $stmt = $conexion->prepare("SELECT precio FROM producto WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $prod = $res->fetch_assoc();

        $total += $prod['precio'] * $cantidad;
    }



    // Insertamos la venta
    $id_usuario = (int)$_SESSION['usuario_id']; // lo guardo en control_login
    $stmt = $conexion->prepare("INSERT INTO venta (id_usuario, total, fecha) VALUES (?, ?, NOW())");
    $stmt->bind_param("id", $id_usuario, $total); // i=integer, d=double
    $stmt->execute();

    // ID de la venta recién creada
    $idVenta = $conexion->insert_id;


    // Insertar cada ítem en detalle_venta y descontar stock
    foreach ($carrito as $id => $cantidad) {

        // Traemos datos del producto
        $stmtProducto = $conexion->prepare("SELECT precio, stock FROM producto WHERE id = ?");
        $stmtProducto->bind_param("i", $id);
        $stmtProducto->execute();
        $res = $stmtProducto->get_result();
        $prod = $res->fetch_assoc();

        $precio = $prod['precio'];
        $stockActual = $prod['stock'];

        // Insertar detalle
        $stmtDetalle = $conexion->prepare(
            "INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)"
        );
        $stmtDetalle->bind_param("iiid", $idVenta, $id, $cantidad, $precio);
        $stmtDetalle->execute();

        // Descontar el stock
        $nuevoStock = $stockActual - $cantidad;

        $stmtStock = $conexion->prepare("UPDATE producto SET stock = ? WHERE id = ?");
        $stmtStock->bind_param("ii", $nuevoStock, $id);
        $stmtStock->execute();
    }

    $conexion->commit();
    $_SESSION['compra_exitosa'] = true;
    unset($_SESSION['carrito']);  // vaciás el carrito
    header("Location: carrito.php");
    exit;
} catch (Exception $e) {

    $conexion->rollback();
    $_SESSION['error_carrito'] = "Error al procesar la compra.";
    header("Location: carrito.php");
    exit;
}

// 
