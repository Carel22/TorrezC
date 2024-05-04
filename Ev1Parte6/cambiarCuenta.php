<?php
include("conexion.php");
$con = conexion();
$id = $_GET['id'];  // Mantenido 'id' como está
$sql = "SELECT * FROM cuentabancaria WHERE id_='$id_Cuenta'";
$query = mysqli_query($con, $sql);
if ($query) {
    // Verificar si se obtuvieron resultados
    if (mysqli_num_rows($query) > 0) {
        // Obtener la fila como un array asociativo
        $row = mysqli_fetch_array($query);      
?>
<!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="CSS/styles.css">
            <title>Administrador-Edita Cuenta</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        </head>
        <body>
        
        <div class="container-fluid">
  <div class="row">
    <div class="col"></div>
    <div class="col-md-6" style="background-color: #a8d3b2; color: white; padding: 20px; text-align: center;">
    <h1>Edita los valores de la cuenta</h1>   
    </div>
    <div class="col"></div>
  </div>
</div>      
        <br>   
               <div class="users-form">
                <form action="editaCuenta.php" method="POST">
                    <!-- Resto del formulario utilizando $row y cambiando 'id_Ci' a 'id' -->
                    <input type="text" name="id_Cuenta" placeholder="Cambia el nombre del Area" value="<?= $row['id_Cuenta'] ?>">
                    <input type="text" name="descripcion" placeholder="Cambia su descripcion" value="<?= $row['descripcion'] ?>">
                    
                    <input type="submit" name="submit" value="Actualizar">
                </form>
                </div>

            </div>
        </body>
        </html>
        <?php
    } else {
        // No se encontraron resultados para el ID proporcionado
        echo "No se encontraron datos para el ID: $id_Area";
    }
} else {
    // Manejo de errores si la consulta no se ejecutó correctamente
    echo "Error en la consulta: " . mysqli_error($con);
}
?>



