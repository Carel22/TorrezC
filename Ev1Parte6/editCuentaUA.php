<?php
include("conexion.php");
$con = conexion();
$id = $_POST['id_Cuenta'];
$tipocuenta = $_POST['tipocuenta'];
$saldo = $_POST['saldo'];
$personaID = $_POST['personaID'];
// Verificar si el id_Ambiente existe en la tabla Ambiente
$sql_cuenta_verificar = "SELECT COUNT(*) FROM cuentabancaria WHERE id_Cuenta = ?";
$stmt_cuenta_verificar = mysqli_prepare($con, $sql_cuenta_verificar);
mysqli_stmt_bind_param($stmt_cuenta_verificar, "s", $id_Cuenta);
mysqli_stmt_execute($stmt_cuenta_verificar);
mysqli_stmt_bind_result($stmt_cuenta_verificar, $cuenta_count);
mysqli_stmt_fetch($stmt_cuenta_verificar);
mysqli_stmt_close($stmt_cuenta_verificar);

    if ($persona_count >= 0  ) {
        // El id_Ambiente existe en la tabla Ambiente, proceder con la actualización
        echo "El id_Persona existe en la tabla persona. Procediendo con la actualización...<br>";

        $sql_update = "UPDATE  cuentabancaria SET tipocuenta=?, saldo=?, personaID=? WHERE id_Cuenta=?";
        $stmt_update = mysqli_prepare($con, $sql_update);

       // Vincular los parámetros

            mysqli_stmt_bind_param($stmt_update, "ssss", $tipocuenta, $saldo, $personaID, $id);
              // Ejecutar la consulta preparada
            if (mysqli_stmt_execute($stmt_update)) 
                {
                echo "Actualización exitosa. Redirigiendo a la página de clientes...<br>";
               
                Header("Location: usuarioAnalistacuentas.php");
                } 
            else 
                {
                // Manejar el error en caso de que la actualización falle.
                echo "Error en la actualización: " . mysqli_error($con);
                }
            // Cerrar la consulta preparada

            mysqli_stmt_close($stmt_update);
        }
        else 
        {
               // El no existe en la tabla Responsables
        echo "Registre el carnet de identidad del responsable antes de asignar y/o transferir un activo.";
        }

  // Cerrar la conexión
mysqli_close($con);
?>
