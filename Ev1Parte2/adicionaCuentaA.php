<?php
include("conexion.php");
$con = conexion();

// Verifica si las claves del array POST están definidas

if (isset($_POST['id_Cuenta'], $_POST['tipocuenta'],$_POST['saldo'],  $_POST['personaID'])) {

    $id = $_POST['id_Cuenta'];
$tipocuenta = $_POST['tipocuenta'];

$saldo = $_POST['saldo'];
$personaID = $_POST['personaID'];
   



    // Verificar si el id_Ci ya existe en la tabla 
    $query = "SELECT COUNT(*) FROM cuentabancaria WHERE id_Cuenta = ?";
    $stmt = mysqli_prepare($con, $query);
   
    mysqli_stmt_bind_param($stmt, "s", $id_Cuenta);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    if ($count == 0) {
        // no existe, proceder con la inserción de cuenta
         $sql = "INSERT INTO cuentabancaria  (id_Cuenta, tipocuenta, saldo, personaID) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) 
        {
            mysqli_stmt_bind_param($stmt, "ssss", $id_Cuenta, $tipocuenta, $saldo, $personaID);
            if (mysqli_stmt_execute($stmt)) {
                Header("Location: cuentas.php");
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
        //  no existe, mostrar mensaje de error
        echo '<script>alert("El carnet de identidad del cliente no existe. Registra primero el cliente.");</script>';
    }
} else {
    // Manejar el error en caso de que la preparación de la consulta falle.
    echo "Datos incompletos en el formulario.";
}
mysqli_close($con);
?>


