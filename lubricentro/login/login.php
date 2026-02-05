<?php

session_start();

include "../conexion.php";





if (isset($_SESSION['error_login'])) {
    $mensajeError = $_SESSION['error_login'];
    unset($_SESSION['error_login']);
} else {
    $mensajeError = null;
}


?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión | El Piojo Lubricantes</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="login-wrapper">
        <div class="login-box">

            <h2>Iniciar sesión</h2>

            <?php if ($mensajeError): ?>
                <div class="alert alert-danger text-center">
                    <?= $mensajeError ?>

                </div>
            <?php endif; ?>
            <p class="subtitle">Accedé a tu cuenta</p>

            <form method="POST" action="control_login.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                <small id="passError" style="color:red; display:none;">
                    La contraseña debe tener al menos 6 caracteres y una mayúscula
                </small>
                <input type="submit" name="ingresar" class="btn-login">Ingresar</input>
            </form>

            <div class="extra">

                <span>|</span>
                <a href="../register/register.php">Registrarse</a>
                <span>|</span>
                <a href="../index.php">Inicio</a>
            </div>

        </div>
    </div>


    <script src="../js/login.js"></script>
</body>

</html>