<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: index.php');
    exit();
}
include("conexion.php");
$con = conexion();
// Ejecutar la consulta SQL
$sql = "SELECT * FROM transaccionbancaria";
$resultado = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Página de transacciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body >
<nav class="navbar navbar-expand-lg bg-info">
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
              <a class="btn btn-redondo  btn-sm" href="index.php">Inicio de Sesión</a>
            </li> 
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="usuarioAnalista.php" target="_blank">Clientes</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="usuarioAnalistacuentas.php" target="_blank">Cuentas Bancarias</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" target="_blank">Transacciones</a>
            </li> 
          </ul>
         
      </form>
        </div>
      </div>
    </nav>

<div class="users-table">
<center><h3>Cuentas Registradas</h3></center>

        <table>
            <thead>
                <tr>
                    <th style="background-color: #a6c8db; color: white;">Identificacion Transaccion</th>
                    <th style="background-color: #a6c8db; color: white;">Nº de cuenta</th>
                    <th style="background-color: #a6c8db; color: white;">Tipo de Transaccion</th>
                    <th style="background-color: #a6c8db; color: white;">Monto</th>
                    <th style="background-color: #a6c8db; color: white;">Fecha y Hora</th>
                    <th style="background-color: #a6c8db; color: white;"></th>
                    <th style="background-color: #a6c8db; color: white;"></th>
                    
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($resultado)): ?>
                  <tr>
    <th><?= $row['id_Transaccion'] ?></th>
    <th><?= $row['cuentaID'] ?></th>
    <th><?= $row['tipoTransaccion'] ?></th>
    <th><?= $row['monto'] ?></th>
    <th><?= $row['fechaHora'] ?></th>
    
    <?php 
   
    ?>
</td>



<!--editar se convierte en ACTUALIZAR--->
<th><a href="cambiarTransaccionUA.php?id=<?= $row['id_Transaccion'] ?>" class="users-table--edit">Actualizar</a></th>
<th><a href="borrarTransaccionUA.php?id=<?= $row['id_Transaccion'] ?>" class="users-table--delete" >Eliminar</a></th>   
</tr>

                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>


