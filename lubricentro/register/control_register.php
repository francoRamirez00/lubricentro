<?php

session_start();
include "../conexion.php";


// var_dump(empty($_POST["crear"]));

if (!empty($_POST["crear"])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        $_SESSION['error_login'] =
            "Campos vacios. Debe ingresar email y contraseña";
        header("Location: login.php");
        echo "error";

        exit;
    } else {
        $user_name = $_POST["Firstname"];
        $user_lastName = $_POST["Lastname"];
        $user_email = $_POST["email"];
        $tel = $_POST["Telefono"];
        $user_pass = $_POST["password"];
        // var_dump(($user_email));
        $sql = $conexion->query("SELECT * FROM usuario WHERE email = '$user_email'");
        $res = mysqli_fetch_assoc($sql);

        if ($res) {
            $_SESSION['error_login'] = "El email ingresado ya existe.
            Verifique sus datos.";
            header("Location: register.php");
        } else {
            $sqlCrearUser = "INSERT INTO usuario (nombre, apellido, email, pass, telefono, direccion, avatar, estado)
            VALUES ('$user_name', '$user_lastName',  '$user_email', '$user_pass', $tel, NULL, NULL, 'A' )";
            $conexion->query($sqlCrearUser);
            header("Location: ../index.php");
        }


        // echo "error222222222222WSS";
    }
} else {
    echo "error";
}
