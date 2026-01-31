<?php
include "../conexion.php";

session_start();



// Verificamos que el usuario esté logueado
if (!isset($_SESSION['usuario_email'])) {
    header("Location: ../login/login.php");
    exit;
}


if (isset($_SESSION['carrito'])) {
    $carrito = $_SESSION['carrito'];
} else {
    $carrito = [];
}


if (isset($_SESSION['error_carrito'])) {
    $mensajeError = $_SESSION['error_carrito'];
    unset($_SESSION['error_carrito']);
} else {
    $mensajeError = null;
}



$total = 0;



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>El Piojo Lubricentro</title>
</head>

<header class="header">
    <div class="header__container">


        <a href="../index.php"><img class="header__logo" src="../img/el-piojo-logo-tp.png"></a>
        <nav class="header__nav">

            <ul class="nav__list">
                <li class="nav__list-item"><a href="../productos/productos.php">Productos</a></li>
                <li class="nav__list-item"><a href="../Nosotros/nosotros.html">¿Quienes somos?</a></li>
                <li class="nav__list-item"><a href="#">Marcas</a></li>
                <li class="nav__list-item"><a href="../contacto/contacto.html">Contacto</a></li>

            </ul>

        </nav>

        <div class="usuario-carrito">
            <div class="usuario">
                <a href="../login/login.php"><button>👤</button></a> <!-- Icono del carrito -->
            </div>
            <div class="carrito">
                <a href="carrito.php"><button>🛒</button></a> <!-- Icono del carrito -->
            </div>

        </div>



    </div>

    <form action="#" method="GET" class="search-form">
        <input type="text" placeholder="Buscar..." aria-label="Buscar">
        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg></button>
    </form>
    <div class="container container__main">

    </div>
</header>

<body>
    <section class="container my-5">

        <h2 class="mb-4">🛒 Carrito de compras</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Importe</th>
                        <th>Quitar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if ($mensajeError): ?>
                        <div class="alert alert-danger text-center">
                            <?= $mensajeError ?>
                        </div>
                    <?php endif; ?>



                    <?php if (isset($_SESSION['compra_exitosa'])): ?>
                        <div class="alert alert-success">
                            ✅ Compra realizada con éxito
                        </div>
                        <?php unset($_SESSION['compra_exitosa']); ?>
                    <?php endif; ?>




                    <?php if (empty($carrito)): ?>
                        <tr>
                            <td colspan="4">El carrito está vacío</td>
                        </tr>
                    <?php else: ?>

                        <?php foreach ($carrito as $id => $cantidad): ?>

                            <?php
                            $res = mysqli_query($conexion, "SELECT * FROM producto WHERE id = $id");
                            $producto = mysqli_fetch_assoc($res);

                            if (!$producto) continue;

                            $subtotal = $producto['precio'] * $cantidad;
                            $total += $subtotal;
                            ?>

                            <tr>
                                <td class="text-start">
                                    <strong><?= $producto['nombre'] ?></strong>
                                </td>

                                <td>
                                    <a href="restar.php?id=<?= $id ?>" class="btn btn-sm btn-outline-danger">−</a>
                                    <span class="badge bg-primary"><?= $cantidad ?></span>
                                    <a href="sumar.php?id=<?= $id ?>" class="btn btn-sm btn-outline-danger">+</a>
                                </td>

                                <td>
                                    $<?= number_format($subtotal, 0, ',', '.') ?>
                                </td>

                                <td>
                                    <a href="quitar.php?id=<?= $id ?>" class="btn btn-sm btn-danger">✖</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- TOTAL -->
        <div class="text-end mt-4">
            <h4 class="text-end mt-4">
                Total:
                <strong class="text-success">
                    $<?= number_format($total, 0, ',', '.') ?>
                </strong>
            </h4>

            <a href="confirmar_compra.php" class="btn btn-success btn-lg mt-3">
                Finalizar Compra
            </a>
        </div>

    </section>
</body>

</html>