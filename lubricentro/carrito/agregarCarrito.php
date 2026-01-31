

<?php
session_start();

if (!isset($_POST['id'])) {
    echo json_encode([
        "status" => "error",
        "message" => "ID no recibido"
    ]);
    exit;
}

$id = (int) $_POST['id'];


// Crear carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Si el producto ya está, sumamos 1
if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]++;
} else {
    $_SESSION['carrito'][$id] = 1;
}

echo json_encode([
    "status" => "ok",
    "message" => "Producto agregado",
    "carrito" => $_SESSION['carrito']
]);
