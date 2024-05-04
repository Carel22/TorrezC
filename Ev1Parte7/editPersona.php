<?php
include("conexion.php");
$con = conexion();
$id = $_POST["id_Persona"];  // Cambiado de 'id' a 'id_Persona'
$nombre = strtoupper($_POST['nombre']);
$apellido = strtoupper($_POST['apellido']);
$email = $_POST['email'];
$rol = $_POST['rol'];
$ciudad = $_POST['ciudad'];
$edad = $_POST['edad'];
$username = $_POST['username'];
$password = $_POST['password'];
// Verificar si el id_Ambiente existe en la tabla Ambiente
$sql_persona_verificar = "SELECT COUNT(*) FROM persona WHERE id_Persona = ?";
$stmt_persona_verificar = mysqli_prepare($con, $sql_persona_verificar);
mysqli_stmt_bind_param($stmt_persona_verificar, "s", $id_Persona);
mysqli_stmt_execute($stmt_persona_verificar);
mysqli_stmt_bind_result($stmt_persona_verificar, $persona_count);
mysqli_stmt_fetch($stmt_persona_verificar);
mysqli_stmt_close($stmt_persona_verificar);

    if ($persona_count >= 0  ) {
        // El id_Ambiente existe en la tabla Ambiente, proceder con la actualización
        echo "El id_Persona existe en la tabla persona. Procediendo con la actualización...<br>";

        $sql_update = "UPDATE  persona SET nombre=?, apellido=?, email=?, rol=?, ciudad=?, edad=?, username=?, password=? WHERE id_Persona=?";
        $stmt_update = mysqli_prepare($con, $sql_update);

       // Vincular los parámetros

            mysqli_stmt_bind_param($stmt_update, "sssssssss", $nombre, $apellido, $email, $rol, $ciudad, $edad,$username, $password, $id);
              // Ejecutar la consulta preparada
            if (mysqli_stmt_execute($stmt_update)) 
                {
                echo "Actualización exitosa. Redirigiendo a la página de clientes...<br>";
               
                Header("Location: clientes.php");
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
               // El id_Ci no existe en la tabla Responsables
        echo "Registre el carnet de identidad del responsable antes de asignar y/o transferir un activo.";
        }

  // Cerrar la conexión
mysqli_close($con);
?>
