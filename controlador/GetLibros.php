<?php
include_once '../modelo/conexion.php';

try {
    $libros = getLibros();

    if ($libros) {
        echo json_encode($libros);
    } else {
        echo json_encode(['error' => 'No se encontraron getLibros.']);
    }
    
} catch (Exception $e) {
    echo json_encode(['error' => 'Error en el servidor: ' . $e->getMessage()]);
}

function getLibros(){
    $conexion = new Conexion();
    $sql = $conexion->getPDO()->prepare("SELECT * FROM titulos");
    $sql->execute();

    $libros = [];
    while($datos = $sql->fetch(PDO::FETCH_OBJ)){
        $libros[] = [
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
    //si libros tiene un valor mayor a 0, devuelve el array de libros, si no devuelve null
    return count($libros) > 0 ? $libros : null;
    //return $libros[0]; // Devuelve solo el primer libro
}
?>