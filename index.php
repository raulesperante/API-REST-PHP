<?php

/*
 * Códigos HTTP
 * 405 Method Not Allowed
 * 200 OK
 * Get y Post
 * 
 * $_GET['url'] trae la url actual
 * 
 * 
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
        $conver = json_decode($postBody, true);
        // Si no hubo error al convertir a json
        if(json_last_error() == 0){
            switch ($var) {
                case 'productos':
                    CrearProducto($conver);
    
                    http_response_code(200);      
                break;
                default;
            }
        }else{
            http_response_code(400);
        }



    } else {
        http_response_code(405);
    }
}else{
    ?>
    <!-- Parte html -->
    <link rel="stylesheet" href="public/estilo.css" type="text/css">
    <div class="container">
        <h1>Metadata</h1>
        <div class="divbody">
            <p>Productos</p>
            <code>
                POST /productos
            </code>
            <code>
                GET /productos
                <br>
                GET /productos/id
            </code>
        </div>

    </div>

<?php    
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
 ?>