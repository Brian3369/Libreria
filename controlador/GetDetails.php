<?php
include_once "../modelo/Conexion.php";

header('Content-Type: application/json'); // Asegura que la respuesta sea JSON

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $detalle = getDetails($id);

    if ($detalle) {
        echo json_encode($detalle);
    } else {
        echo json_encode(['error' => 'No se encontraron detalles para este libro.']);
    }
} else {
    echo json_encode(['error' => 'ID no proporcionado.']);
}

function getDetails($id) {
    $conexion = new Conexion();
    $sql = $conexion->getPDO()->prepare("SELECT * FROM titulos WHERE id_titulo = ?");
    $sql->execute([$id]);

    $titulos = [];
    while($datos = $sql->fetch(PDO::FETCH_OBJ)){
        $titulos[] = [
            'id_titulo' => $datos->id_titulo,
            'titulo' => $datos->titulo,
            'tipo' => $datos->tipo,
            'id_pub' => $datos->id_pub,
            'precio' => $datos->precio,
            'avance' => $datos->avance,
            'total_ventas' => $datos->total_ventas,
            'notas' => $datos->notas,
            'fecha_pub' => $datos->fecha_pub,
            'contrato' => $datos->contrato
        ];
    }
    return $titulos[0];
    //return count($titulos) > 0 ? $titulos[0] : null;
}
?>