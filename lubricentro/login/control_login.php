<?php

session_start();
include "../conexion.php";

// var_dump(empty($_POST["ingresar"]));
if (!empty($_POST["ingresar"])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        $_SESSION['error_login'] =
            "Campos vacios. Debe ingresar email y contraseña";
        header("Location: login.php");

        exit;
    } else {

        $user = $_POST["email"];
        $pass = $_POST["password"];

        $sql = $conexion->query("SELECT * FROM usuario WHERE email = '$user' AND pass = '$pass'");

        if ($usuario = $sql->fetch_assoc()) {
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_name'] = $usuario['nombre'];
            $_SESSION['usuario_id'] = $usuario['id'];
            header("Location: ../index.php");
            // exit;
        } else {
            $_SESSION['error_login'] = "Email o contraseña son incorrectos. Vuelve a intentar";
            header("Location: login.php");
            exit;
        }
    }
} else {
    echo "error";
}
