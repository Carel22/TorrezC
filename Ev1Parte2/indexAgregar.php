<?php
include("conexion.php");
$con = conexion();
$id = $_GET['id'];  // Mantenido 'id' como está
// Verificar si el ID  existe y obtener la información
$sql = "SELECT * FROM persona WHERE id_Persona='$id'";
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
            <title>Administrador-Agregacion-de-Cliente</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        </head>
        <body>
        <nav class="navbar navbar-expand-lg bg-warning">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold  " href="#">
        <h5 style="line-height: 1; margin-bottom: 0;">
        
        <span class="fw-bold" style="font-size: 1.2em;">BIENVENIDO A NUESTRO BANCO</span>
    </h5>
  </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
          <li class="nav-item d-flex align-items-center">
              <a class="btn btn-redondo  btn-sm" href="formulario.php">Inicio de Sesión</a>
            </li>
            
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#" target="_blank">Clientes</a>
                </li>
          </ul>
      </form>
        </div>
      </div>
    </nav>
    <br>
    <h2>EDITA DATOS </h2>
        <div class="users-form">
        <form action="editPersona.php" method="POST">
                    <input type="hidden" name="id_Persona" placeholder="Cambia el ID" value="<?= $row['id_Persona'] ?>">
                    
                    <input type="text" name="nombre" placeholder="Nombre" value="<?=$row['nombre'] ?>">
                 
                <input type="text" name="apellido" placeholder="Apellido" value="<?= $row['apellido'] ?>">
                <input type="text" name="email" placeholder="Email" value="<?= $row['email'] ?>">
                <input type="text" name="rol" placeholder="Rol" value="<?= $row['rol'] ?>">
                <input type="text" name="ciudad" placeholder="Ciudad" value="<?= $row['ciudad'] ?>">
                <input type="text" name="username" placeholder="Username" value="<?= $row['username'] ?>">
                <input type="text" name="password" placeholder="Password" value="<?= $row['password'] ?>">
                <input type="text" name="edad" placeholder="Edad" value="<?= $row['edad'] ?>">
                    <input type="submit" name="submit" value="Actualizar">
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        // No se encontraron resultados para el ID proporcionado
        echo "No se encontraron datos para el ID: $id";
    }
} else {
    // Manejo de errores si la consulta no se ejecutó correctamente
    echo "Error en la consulta: " . mysqli_error($con);
}
?>