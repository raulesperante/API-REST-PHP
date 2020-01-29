<?php

require_once 'db.php';

function TodosLosProductos(){
    $query = "SELECT * FROM productos;";
    $Respuesta = ObtenerRegistro($query);
    return ConvertirUTF8($Respuesta);
}

function ProductoPorID(int $id){
    $query = "SELECT * FROM productos WHERE ProductoId={$id};";
    $Respuesta = ObtenerRegistro($query);
    return ConvertirUTF8($Respuesta);
}