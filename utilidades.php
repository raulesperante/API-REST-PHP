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

function CrearProducto(array $array){

    $Codigo = $array[0]['Codigo'];
    $Nombre = $array[0]['Nombre'];
    $Presentacion = $array[0]['Presentacion'];

    $query = "INSERT INTO productos(Codigo, Nombre, Presentacion) VALUES ($Codigo, '$Nombre', '$Presentacion');";

    NonQuery($query);
    return true;
}