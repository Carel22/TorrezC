<?php
include("conexion.php");
$con = conexion();
// Ejecutar la consulta SQL
$sql = "SELECT * FROM persona";
$resultado = mysqli_query($con, $sql);
//SEGUNDA
if ($_SERVER["REQUEST_METHOD"] == "POST") {

         $sql=  "SELECT 
         p.nombre,
         p.apellido,
         p.email,
         cb.id_Cuenta AS id_Cuenta,
         cb.tipocuenta
     FROM 
         Persona p
     INNER JOIN 
         CuentaBancaria cb ON p.id_Persona = cb.personaID
     WHERE 
         p.id_Persona = ?";

  $query = mysqli_query($con, $sql);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Bienvenido Director Bancario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body >
<nav class="navbar navbar-expand-lg bg-secondary">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold  text-light" href="#">
        <h5 style="line-height: 1; margin-bottom: 0;">
        
        <span class="fw-bold" style="font-size: 1.2em;">BIENVENIDO A NUESTRO BANCO JUNIOR</span>
    </h5>
  </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
          <li class="nav-item d-flex align-items-center text-light">
              <a class="btn btn-redondo  btn-sm" href="index.php">Inicio de Sesión</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="usuariodirectorClientes.php" target="_blank">Clientes</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="usuariodirectorCuenta.php" target="_blank">Cuentas Bancarias</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!---->
<!-- Formulario de búsqueda -->
<div class="users-form">
<form method="POST" action="usuariobuscarRes.php">
            <div class="input-group">
                <input class="form-control me-2" name="ci" type="text" placeholder="Introduce CI" aria-label="Introduce CI">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </div>
        </form>

</div>
<div class="users-table">
<center><h3>Usuarios Registrados</h3></center>

        <table>
            <thead>
                <tr>
                <th style="background-color: #28a745; color: white;">Carnet e Identidad</th>
                <th style="background-color: #28a745; color: white;">Nombre Completo</th>
                <th style="background-color: #28a745; color: white;">Correo</th>
                <th style="background-color: #28a745; color: white;">Rol</th>
                    
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($resultado)): ?>
                  <tr>
    <th><?= $row['id_Persona'] ?></th>
    <th><?= $row['nombre']  . ' ' . $row['apellido'] ?></th>

    <th><?= $row['email'] ?></th>
    <th><?= $row['rol'] ?></th>
   
    
    <?php 
    if (isset($row['id_Persona'])) {
      $id_Persona = $row['id_Persona'];
    } else {
      echo 'No hay información del cliente';
  }  
   
    ?>

</th>   
</tr>
<?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>


