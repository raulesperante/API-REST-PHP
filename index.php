<?php

/*
 * Códigos HTTP
 * 405 Method Not Allowed
 * 200 OK
 * Get y Post
 * 
 * $_GET['url'] trae la url actual
 * 
 * Pregunta con los namespaces hay que hacer require_one ?
 * 
 */

require_once 'utilidades.php';



if (isset($_GET['url'])) {

    $var = $_GET['url'];
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        // Explicación de esta expresión regular
        // Si la expresión fuera /[0-9]+/, ''  lo que pasaría
        // es que se reemplazarían todos los números por espacios en blanco
        // pero con /[^0-9]+/, '', lo que pasa es que todo lo que no
        // no sea un numero será reemplazado con un blanco
        // --- Lo que hace esto es devolver un numero de la url ---
        $numero = intval(preg_replace('/[^0-9]+/', '', $var), $base = 10);

        switch ($var) {
            case 'productos':
                $resp = TodosLosProductos();
                print_r(json_encode($resp));
                http_response_code(200);      
            break;
            case "productos/$numero":
                $resp = ProductoPorID($numero);
                print_r(json_encode($resp));
                http_response_code(200);
            break;

            default;
        }
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // Trae el body de la request sin formatear
        $postBody = file_get_contents('php://input');
        print_r(json_decode($postBody));
        //print_r(json_decode($postBody));
        //$postBody = json_decode($postBody);
        //print_r($postBody);
        http_response_code(200);
    } else {
        http_response_code(405);
    }
}else{
    // metadata
    
}



/*
 * 
 * Ejemplos con respuestas
 if($_SERVER['REQUEST_METHOD'] == 'GET'){
    echo 'GET';
    http_response_code(200);
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo 'POST';
    http_response_code(200);
}else{
    http_response_code(405);
}

 */