<?php
include("conexion.php");
$con = conexion();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_Persona = $_GET['id'];
    
    $sql = "DELETE FROM persona WHERE id_Persona = ?";
    $stmt = mysqli_prepare($con, $sql);

    mysqli_stmt_bind_param($stmt, "s", $id_Persona);

    if (mysqli_stmt_execute($stmt)) {
    
        // Redirige a otra página después de eliminar si es necesario
        header("Location: usuarioAnalista.php");
    } else {
        echo "Error al eliminar el responsable: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "No se ha proporcionado un ID válido para eliminar.";
}

mysqli_close($con);
?>
