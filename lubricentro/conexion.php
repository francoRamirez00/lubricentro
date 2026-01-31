<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "lubricentro_simple";

$conexion = new mysqli($server, $user, $pass, $db);

if ($conexion->connect_errno) {
    die("error" . $conexion->connect_errno);
} else {
    //echo "conectado";
}
