<?php
session_start();

$id = (int) $_GET['id'];

if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]--;

    if ($_SESSION['carrito'][$id] <= 0) {
        unset($_SESSION['carrito'][$id]);
    }
}

header("Location: carrito.php");
exit;
