<?php
function  conexion(){
    $servername = "localhost";
    //$username = "root";
    //$password = "";
    // por seguridad del ingreso a la BD
    $username = "root";
    //$password = "Km46c#1966";
    $password = "";
    $dbname = "BDCarla";

    
    //connection-> conexion
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