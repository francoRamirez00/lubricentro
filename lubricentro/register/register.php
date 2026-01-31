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
    <title>Registrarse | El Piojo Lubricantes</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="login-wrapper">
        <div class="login-box">

            <h2>Registrarse</h2>

            <?php if ($mensajeError): ?>
                <div class="alert alert-danger text-center">
                    <?= $mensajeError ?>

                </div>
            <?php endif; ?>
            <p class="subtitle">Crea tu cuenta</p>

            <form method="POST" id="formRegister" action="control_register.php">
                <input type="name" name="Firstname" placeholder="Nombre/s" required>
                <input type="name" name="Lastname" placeholder="Apellido/s" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="number" name="Telefono" placeholder="Tel" required>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                <small id="passError" style="color:red; display:none;">
                    La contraseña debe tener al menos 6 caracteres y una mayúscula
                </small>
                <input type="password" id="repeatPassword" name="repeatPassword" placeholder="Repetir contraseña" required>
                <small id="repeatPassError" style="color:red; display:none;">
                    La contraseña no coincide.
                </small>
                <input type="submit" name="crear" class="btn-register" placeholder="">Crear cuenta</input>
            </form>

            <div class="extra">
                <a href="#">¿Olvidaste tu contraseña?</a>
                <span>|</span>
                <a href="#">Registrarse</a>
                <span>|</span>
                <a href="../login/login.php">¡Tengo Cuenta!</a>
            </div>

        </div>
    </div>

    <script src="../js/register.js"></script>
</body>

</html>