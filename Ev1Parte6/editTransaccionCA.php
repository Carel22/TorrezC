<?php
include("conexion.php");
$con = conexion();
$id = $_POST["id_Transaccion"];  // Cambiado de 'id' a 'id_Transaccion'
$cuentaID = $_POST['cuentaID'];
$tipoTransaccion = $_POST['tipoTransaccion'];
$monto = $_POST['monto'];
$fechaHora = $_POST['fechaHora'];

// Verificar si la cuentaID existe en la tabla cuentabancaria
$sql_transaccion_verificar = "SELECT COUNT(*) FROM transaccionbancaria WHERE id_Transaccion = ?";
$stmt_transaccion_verificar = mysqli_prepare($con, $sql_transaccion_verificar);
mysqli_stmt_bind_param($stmt_transaccion_verificar, "s", $id_Transaccion);
mysqli_stmt_execute($stmt_transaccion_verificar);
mysqli_stmt_bind_result($stmt_transaccion_verificar, $transaccion_count);
mysqli_stmt_fetch($stmt_transaccion_verificar);
mysqli_stmt_close($stmt_transaccion_verificar);

if ($transaccion_count >= 0) {
    // La cuentaID existe en la tabla cuentabancaria, proceder con la actualización
    echo "Conexión exitosa<br>";
    echo "El id_Transaccion existe en la tabla transaccionbancaria. Procediendo con la actualización...<br>";

    $sql_update = "UPDATE transaccionbancaria SET cuentaID=?, tipoTransaccion=?, monto=?, fechaHora=? WHERE id_Transaccion=?";
    $stmt_update = mysqli_prepare($con, $sql_update);

    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt_update, "sssss", $cuentaID, $tipoTransaccion, $monto, $fechaHora, $id);

    // Ejecutar la consulta preparada
    if (mysqli_stmt_execute($stmt_update)) {
        echo "Actualización exitosa. Redirigiendo a la página de clientes...<br>";
        Header("Location: usuarioContadortransacciones.php");
    } else {
        // Manejar el error en caso de que la actualización falle.
        echo "Error en la actualización: " . mysqli_error($con);
    }
    // Cerrar la consulta preparada
    mysqli_stmt_close($stmt_update);
} else {
    // La cuentaID no existe en la tabla cuentabancaria
    echo "La cuentaID proporcionada no existe en la tabla cuentabancaria. Registre la cuenta antes de asignar o transferir una transacción.";
}

// Cerrar la conexión
mysqli_close($con);
?>
