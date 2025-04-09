<?php
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
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 mb-5 bg-Secondary" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-dark" href="index.php">Libreria</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            </div>
        </nav>
        <!-- Masthead-->

        <!-- About-->
        <!-- Services-->


        <br><br><br>
        <div class="container-fluid bg-light" id="libros">
            <br>
            <h3 class="text-center my-3">Libros</h3>
            <hr>
            <div class="row g-0 justify-content-center">
                <br>
         <?php
         $conexion = new Conexion();
         $sql = $conexion->getPDO()->query("SELECT * FROM titulos");

        while($datos = $sql->fetch(PDO::FETCH_OBJ)){ ?>
            <div class="col-3 bg-dark mb-1 mx-1">
                <img src="assets/img/portfolio/fullsize/libro.png" alt="" class="img-fluid">
                <h5 class="ms-2 text-white mt-1"><?= $datos->titulo ?></h5>
                <p class="text-info ms-3 mb-3">Precio: <?= $datos->precio ?></p>
            </div>
        <?php }
        ?>
                <a class="btn btn-primary btn-xl mt-2" href="index.php">Volver al inicio</a>
            </div>
        </div>

        <br>        


        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2025 - Brian Company</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
<?php
                // $sql = $conexion->getPDO()->query("SELECT * FROM contacto order by fecha DESC");
                // while($datos = $sql->fetch(PDO::FETCH_OBJ)){ ?>
                <!-- // <div class="contenedor-comentario mb-3 p-2 border rounded">
                // <img src="assets/img/fotoDePerfil.png" alt="Foto de perfil" width="50px" height="50px">
                // <div class="nombre-ycomentario ps-2">
                // <h5><?= $datos->nombre ?></h5>
                // <p><?= $datos->mensaje ?></p>
                // <p class="text-secondary" style="font-size : 12px;"><?= $datos->fecha ?></p>
                // </div>
                // </div> -->
                // <?php //}
                // ?>