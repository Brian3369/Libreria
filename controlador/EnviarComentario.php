<?php
    //include '../modelo/conexion.php';

    if(!empty($_POST['btnenviar'])) {
        if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['asunto']) || empty($_POST['mensaje'])) {
            echo "<script>console.log('Error al registrar');</script>";
            echo "<div class='alert alert-warning' role='alert'>No puede haber campos vacios</div>";
        } else {
            echo enviarComentario();
        }
    }

    function enviarComentario() {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        $fecha = date('Y-m-d H:i:s'); 
        
        $conexion = new Conexion();
        $sql = $conexion->getPDO()->prepare("INSERT INTO contacto (nombre, correo, asunto, mensaje, fecha) VALUES (?, ?, ?, ?, ?)");
        $sql->execute([$nombre, $correo, $asunto, $mensaje, $fecha]);
        if ($sql) {
            echo "<script>alert('mensaje enviado con éxito.');</script>";
            echo "<div class='alert alert-success' role='alert'>Mensaje enviado con exito</div>";
            header("Location: " . $_SERVER['PHP_SELF'] . "#contact");
            exit();
        } else {
            echo "<script>alert('Error al enviar el mensaje.');</script>";
        }
    }
?>