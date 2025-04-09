<?php
include_once "../modelo/Conexion.php";

header('Content-Type: application/json'); // Asegura que la respuesta sea JSON

try {
    $comentarios = getComentarios();

    if ($comentarios) {
        echo json_encode($comentarios);
    } else {
        echo json_encode(['error' => 'No se encontraron comentarios.']);
    }
    
} catch (Exception $e) {
    echo json_encode(['error' => 'Error en el servidor: ' . $e->getMessage()]);
}

function getComentarios() {
    $conexion = new Conexion();
    $sql = $conexion->getPDO()->prepare("SELECT * FROM contacto order by fecha desc");
    $sql->execute();

    $comentarios = [];
    while ($datos = $sql->fetch(PDO::FETCH_OBJ)) {
        $comentarios[] = [
            'id_contacto' => $datos->id_contacto,
            'nombre' => $datos->nombre,
            'correo' => $datos->correo,
            'asunto' => $datos->asunto,
            'mensaje' => $datos->mensaje,
            'fecha' => $datos->fecha
        ];
    }
    return count($comentarios) > 0 ? $comentarios : null;
}
?>