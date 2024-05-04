//<?php

function  conexion(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "BDCarla";
    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password);
    mysqli_select_db($conn, $dbname);
    // Verificar conexión
    if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
    }
    echo "Conexión exitosa";
    return $conn;
}


?>