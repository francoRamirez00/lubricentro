<?php
include 'conexion.php';

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>El Piojo Lubricentro</title>
</head>

<body>

    <main class="main">



        <section class="hero">
            <video autoplay muted loop playsinline class="hero__video">
                <source src="./img/video/OfertaAceites-Horizontal.mp4" type="video/mp4">
            </video>
            <header class="header">
                <div class="header__container">

                    <a href="index.php">
                        <img src="/lubricentro/img/el-piojo-logo-tp.png" class="header__logo">
                    </a>

                    <nav>
                        <ul class="nav">
                            <li><a href="./productos/productos.php">Productos</a></li>
                            <li><a href="./Nosotros/nosotros.php">Nosotros</a></li>
                            <li><a href="./marca/marca.php">Marcas</a></li>
                            <li><a href="./contacto/contacto.php">Contacto</a></li>
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
            <div class="hero__overlay"></div>

            <div class="hero__content">
                <h1>TU LUBRICENTRO<br>de confianza</h1>
                <p>
                <h4>Aceites para auto, moto y camión</h4>
                </p>
                <a href="./productos/productos.php" class="hero__btn">
                    Descubrí nuestros productos
                </a>
            </div>
        </section>

        <div class="container container__help">
            <h2>¡Podemos ayudarte!</h2>
            <p>
                Contamos con un soporte tecnico via whatsapp para ayudarte en la compra y en los productos que necesites.
            </p>
            <ul class="list__help">
                <li class="list__help-item">SOMOS DISTRIBUIDORES DE MARCAS DE PRIMERA CALIDAD PARA EL CUIDADO DE TU AUTOMOTOR. </li>
                <li class="list__help-item">Productos 100% originales</li>
                <li class="list__help-item">EnvÍos a todo el pais</li>
                <li class="list__help-item">Horario de atencion: 9 a 15</li>

            </ul>
            <form class="button__container">
                <a href="./contacto/contacto.php">Mas info</a>
            </form>
        </div>





    </main>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary " style="background-color: #e4e3e3;" id="footer__social">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Contacta con nosotros en nuestras redes sociales</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                    </i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-tiktok" viewBox="0 0 16 16">
                            <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                        </svg>
                    </i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg>
                    </i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                        </svg>
                    </i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <a href="index.html"><img class="header__logo" src="./img/el-piojo-logo-tp.png"></a>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Productos
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Aceites</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Anticongelantes</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Grasas</a>
                        </p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->

                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Ubicacion</h6>
                        <p>
                            <i class="fas fa-home me-3"></i>Zapala , Neuquen
                        </p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>Elpiojo@gmail.com
                        </p>
                        <p>
                            <i class="fas fa-phone me-3"></i>+ 54 2942 56 8930
                        </p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgb(228, 26, 26);">
            © 2025 Copyright:
            <a class="text-reset fw-bold" href="./index.html">Elpiojolubricantes.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>




</body>

</html>