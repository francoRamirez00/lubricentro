<?php
session_start();

$id = (int) $_GET['id'];

unset($_SESSION['carrito'][$id]);

header("Location: carrito.php");

exit;
