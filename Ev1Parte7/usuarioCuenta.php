<?php
include("conexion.php");
$con = conexion();
// Ejecutar la consulta SQL
$sql = "SELECT * FROM cuentabancaria";
$resultado = mysqli_query($con, $sql);


//SEGUNDA
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el formulario y obtener el CI ingresado
   // $cuentaID = $_POST['numcuenta'];
    // Preparar la consulta SQL con un marcador de posición '?'
    $sql = "SELECT 
               cb.tipoCuenta,
               cb.saldo,
               cb.personaID,
               cb.id_Cuenta AS id_Cuenta,
               cb.tipocuenta
           FROM 
               persona p
           INNER JOIN 
               CuentaBancaria cb ON p.id_Persona = cb.personaID
           WHERE 
               cb.id_Cuenta = ?";
    // Preparar la consulta
    $stmt = mysqli_prepare($con, $sql);
    // Vincular el valor para el marcador de posición
    mysqli_stmt_bind_param($stmt, "s", $cuentaID);
    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);
    // Obtener el resultado de la consulta
    $resultado = mysqli_stmt_get_result($stmt);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Página de cuentas bancarias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-success">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold  text-light" href="#">
        <h5 style="line-height: 1; margin-bottom: 0;">
        
        <span class="fw-bold" style="font-size: 1.2em;">BIENVENIDO A NUESTRO BANCO</span>
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
              <li class="nav-item ">
              <a class="nav-link active" aria-current="page" href="#" target="_blank">Cuentas</a>
              </li>
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="usuarioCliente.php" target="_blank">Clientes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="usuarioBancaria.php" target="_blank">Cuentas Bancarias</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="usuarioTransacciones.php" target="_blank">Transacciones</a>
                </li>
          </ul>
         
      </form>
        </div>
      </div>
    </nav>
<!---->
<!-- Formulario de búsqueda -->
<div class="users-form">
    <form method="POST" action="usuariobuscarCuen.php">
        <div class="input-group">
            <input class="form-control me-2" name="numcuenta" type="text" placeholder="Introduce el Nª de Cuenta" aria-label="Introduce Código de Activo">
            <button class="btn btn-outline-success" type="submit">Buscar Nª Cuenta</button>
        </div>
    </form>
</div>

<div class="users-table">
<center><h3>Cuentas Registradas</h3></center>

        <table>
            <thead>
                <tr>
                    <th style="background-color: #28a745; color: white;">Numero de cuenta</th>
                    <th style="background-color: #28a745; color: white;">Tipo de cuenta</th>
                    <th style="background-color: #28a745; color: white;">Saldo</th>
                    <th style="background-color: #28a745; color: white;">Carnet de Identidad del Cliente</th>
                   
                    
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($resultado)): ?>
                  <tr>
    <th><?= $row['id_Cuenta'] ?></th>
    <th><?= $row['tipocuenta'] ?></th>
    <th><?= $row['saldo'] ?></th>
    <th><?= $row['personaID'] ?></th> <td>
    <?php 
   
    ?>
</td>

</tr>

                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>


