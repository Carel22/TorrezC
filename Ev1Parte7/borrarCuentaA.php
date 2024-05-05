<?php
include("conexion.php");
$con = conexion();
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_Cuenta = $_GET['id'];
    
    // Eliminar las transacciones asociadas a la cuenta
    $sql_delete_transacciones = "DELETE FROM transaccionbancaria WHERE CuentaID = ?";
    $stmt_delete_transacciones = mysqli_prepare($con, $sql_delete_transacciones);
    mysqli_stmt_bind_param($stmt_delete_transacciones, "i", $id_Cuenta);
    mysqli_stmt_execute($stmt_delete_transacciones);
    mysqli_stmt_close($stmt_delete_transacciones);

    // Ahora puedes eliminar la cuenta
    $sql_delete_cuenta = "DELETE FROM cuentabancaria WHERE id_Cuenta = ?"; // Corrección aquí
    $stmt_delete_cuenta = mysqli_prepare($con, $sql_delete_cuenta);
    mysqli_stmt_bind_param($stmt_delete_cuenta, "i", $id_Cuenta);

    if (mysqli_stmt_execute($stmt_delete_cuenta)) {
        // Redirige a otra página después de eliminar si es necesario
        header("Location: usuarioAnalistacuentas.php");
    } else {
        echo "Error al eliminar la cuenta: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt_delete_cuenta);
} else {
    echo "No se ha proporcionado un ID válido para eliminar.";
}
mysqli_close($con);
?>