<?php


session_start(); ?>



<header class="header">
    <div class="header__container">

        <a href="index.php">
            <img src="/lubricentro/img/el-piojo-logo-tp.png" class="header__logo">
        </a>

        <nav>
            <ul class="nav">
                <li><a href="./productos/productos.php">Productos</a></li>
                <li><a href="./Nosotros/nosotros.html">Nosotros</a></li>
                <li><a href="#">Marcas</a></li>
                <li><a href="./contacto/contacto.html">Contacto</a></li>
            </ul>
        </nav>

        <div class="icons">
            <?php if (isset($_SESSION['usuario_email'])): ?>
                <span>Hola, <?= $_SESSION['usuario_name'] ?></span>
                <a href="./login/logout.php">Salir</a>
            <?php else: ?>
                <a href="./login/login.php">Ingresar</a>
            <?php endif; ?>
            <a href="./login/login.php">👤</a>
            <a href="./carrito/carrito.php">🛒</a>
        </div>

    </div>
</header>