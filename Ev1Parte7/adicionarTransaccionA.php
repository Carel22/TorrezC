<?php
include("conexion.php");
$con = conexion();
// Verifica si las claves del array POST están definidas
if (isset($_POST['id_Transaccion'], $_POST['cuentaID'],$_POST['tipoTransaccion'],  $_POST['monto'], $_POST['fechaHora'])) {

    $id_Transaccion = $_POST['id_Transaccion'];
    $cuentaID = $_POST['cuentaID'];
    $tipoTransaccion = $_POST['tipoTransaccion'];
    $monto = $_POST['monto'];
    $fechaHora = $_POST['fechaHora'];
// Verificar si el id_Ci ya existe en la tabla 
    $query = "SELECT COUNT(*) FROM transaccionbancaria WHERE id_Transaccion = ?";
    $stmt = mysqli_prepare($con, $query);
   
    mysqli_stmt_bind_param($stmt, "s", $id_Transaccion);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    if ($count == 0) {
        // El id_Ci no existe, proceder con la inserción en Responsable
         $sql = "INSERT INTO transaccionbancaria (id_Transaccion, cuentaID, tipoTransaccion, monto, fechaHora) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) 
        {
            mysqli_stmt_bind_param($stmt, "sssss", $id_Transaccion, $cuentaID, $tipoTransaccion, $monto, $fechaHora);
            if (mysqli_stmt_execute($stmt)) {
                Header("Location: transacciones.php");
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


