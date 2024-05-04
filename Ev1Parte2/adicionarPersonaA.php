<?php
include("conexion.php");
$con = conexion();

// Verifica si las claves del array POST están definidas
if (isset($_POST['id_Persona'], $_POST['nombre'],$_POST['apellido'],  $_POST['email'], $_POST['rol'])) {

    $id_Persona = $_POST['id_Persona'];
    $nombre = strtoupper($_POST['nombre']);
    $apellido = strtoupper($_POST['apellido']);
    $email = $_POST['email'];
    $rol = $_POST['rol'];

// Validar el formato de nombre (solo letras)
if (!preg_match('/^[\p{L}\s]+$/u', $nombre)) {
    echo '<script>alert("El nombre debe contener solo letras. Por favor, inténtalo de nuevo.");</script>';
    exit(); // Terminar el script si la validación falla
};


    // Verificar si el id_Ci ya existe en la tabla 
    $query = "SELECT COUNT(*) FROM persona WHERE id_Persona = ?";
    $stmt = mysqli_prepare($con, $query);
   
    mysqli_stmt_bind_param($stmt, "s", $id_Persona);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    if ($count == 0) {
        // El id_Ci no existe, proceder con la inserción en Responsable
         $sql = "INSERT INTO persona (id_Persona, nombre, apellido, email, rol) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) 
        {
            mysqli_stmt_bind_param($stmt, "sssss", $id_Persona, $nombre, $apellido, $email, $rol);
            if (mysqli_stmt_execute($stmt)) {
                Header("Location: clientes.php");
                exit(); // Terminar el script después de redirigir
            } else {
                // Manejar el error en caso de que la inserción falle.
                echo "Error en la inserción: " . mysqli_error($con);
            }

            mysqli_stmt_close($stmt);
        } else {
            // Manejar el error en caso de que la preparación de la consulta falle.
            echo "Error en la preparación de la consulta: " . mysqli_error($con);
        }
    } else {
        // El CI del responsable no existe, mostrar mensaje de error
        echo '<script>alert("El carnet de identidad del cliente no existe. Registra primero el cliente.");</script>';
    }
} else {
    // Manejar el error en caso de que la preparación de la consulta falle.
    echo "Datos incompletos en el formulario.";
}
mysqli_close($con);
?>


