<?php
ob_start();
include 'modelo/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Libreria</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Libreria</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#libros">Libros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#autores">Autores</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contactanos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Libreria multicultural</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Contamos con una gran variedad de libros de varios autores para tu elección!</p>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <!-- Services-->


    <div class="container-fluid" id="libros">
        <br>
        <h3 class="text-center my-3">Libros</h3>
        <hr>
        <div class="row g-0 justify-content-center">
            <br>
            <?php
            $conexion = new Conexion();
            $sql = $conexion->getPDO()->query("SELECT * FROM titulos limit 6");

            while ($datos = $sql->fetch(PDO::FETCH_OBJ)) { ?>
                <div class="col-3 bg-dark mb-1 mx-1">
                    <a type="button" onclick="showBookModal('<?= $datos->id_titulo ?>')">
                        <img src="assets/img/portfolio/fullsize/libro.png" alt="<?= $datos->titulo ?>" class="img-fluid">
                    </a>
                    <h5 class="ms-2 text-white mt-1"><?= $datos->titulo ?></h5>
                    <p class="text-info ms-3 mb-3">Precio: <?= $datos->precio ?> </p>
                </div>
            <?php }
            ?>
            <a class="btn btn-primary btn-xl mt-2" href="libros.php">Ver todo</a>
        </div>
    </div>

    <br>

    <div class="container-fluid bg-dark" id="autores">
        <br>
        <h3 class="text-center my-3 text-white">Autores</h3>
        <hr class="text-white">
        <div class="row g-0 justify-content-center">
            <br>
            <?php
            $sql = $conexion->getPDO()->query("SELECT * FROM autores limit 6");
            while ($datos = $sql->fetch(PDO::FETCH_OBJ)) { ?>
                <div class="col-3 bg-dark mb-1 mx-1">
                    <img src="assets/img/portfolio/fullsize/autor.png" alt="" class="img-fluid">
                    <h5 class="ms-2 text-white mt-1"><?= $datos->nombre ?></h5>
                    <p class="text-info ms-3 mb-3">Pais: <?= $datos->pais ?></p>
                </div>
            <?php }
            ?>
            <a class="btn btn-primary btn-xl mt-2 mb-4" href="autores.php">Ver todo</a>
        </div>
    </div>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Contactanos</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">Cuentanos cualquier duda que tengas!</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <form id="contactForm" method="POST">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" data-sb-validations="required" />
                            <label for="nombre">Nombre</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">El nombre es obligatorio.</div>
                        </div>
                        <!-- correo address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="correo" name="correo" type="correo" placeholder="name@example.com" data-sb-validations="required,correo" />
                            <label for="correo">correo </label>
                            <div class="invalid-feedback" data-sb-feedback="correo:required">El correo es obligatorio.</div>
                            <div class="invalid-feedback" data-sb-feedback="correo:correo">El correo no es valido.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="asunto" name="asunto" type="text" placeholder="Cual es el asunto" data-sb-validations="required" />
                            <label for="asunto">Asunto</label>
                            <div class="invalid-feedback" data-sb-feedback="asunto:required">El asunto es obligatorio.</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="mensaje" name="mensaje" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="mensaje">Mensaje</label>
                            <div class="invalid-feedback" data-sb-feedback="mensaje:required">El mensaje es obligatorio.</div>
                        </div>
                        <?php
                        include "controlador/EnviarComentario.php";
                        ?>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-xl" id="enviar" type="submit" value="ok" name="btnenviar">Enviar</button></div>
                    </form>
                    <br>

                    <div id="comentariosBody"></div>

                </div>
            </div>
        </div>
    </section>

    <div
        class="modal fade"
        id="productModal"
        tabindex="-1"
        aria-labelledby="productModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">
                        Detalle del Producto
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
                </div>
                <div class="modal-body" id="productModalBody">
                    <!-- Los detalles se llenan dinámicamente -->
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2025 - Brian Company</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="js/details.js"></script>
    <script src="js/comentario.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <?php
    ob_end_flush(); // Envía el contenido del búfer al navegador
    ?>
</body>

</html>