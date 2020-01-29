<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'db_almacenes';
$port = '3306';

// Conexión

$conexion = new mysqli($server, $user, $pass, $database, $port);

if($conexion->connect_error){
    die($conexion->connect_error);
}

// Guardar, modificar, eliminar
function NonQuery($sqlstr, $conexion = null){
    if(!$conexion) global $conexion;
    
    $result = $conexion->query($sqlstr);
    return $result->affect_row;
    
}

// Devuelve un array de json
function ObtenerRegistro(string $sqlstr, string $conexion = null){
    if(!$conexion) global $conexion;
    
    $result = $conexion->query($sqlstr);
    $resultArray = array();
    
    foreach ($result as $registro){
        $resultArray[] = $registro;
    }
    return $resultArray;
    
}

function ConvertirUTF8(array $array): array{
    // Es como una función map
    array_walk_recursive($array, function(&$item, $key){
        if(!mb_detect_encoding($item, "utf-8", true)){
            $item = utf8_encode($item);
        } 
    });
    return $array;
}
