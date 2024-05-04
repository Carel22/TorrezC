<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: index.php');
    exit();
}
include("conexion.php");
$con = conexion();
// Ejecutar la consulta SQL
$sql = "SELECT * FROM cuentabancaria";
$resultado = mysqli_query($con, $sql);
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
<body >
<nav class="navbar navbar-expand-lg bg-danger">
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
              <a class="nav-link active" aria-current="page" href="clientes.php" target="_blank">Clientes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" target="_blank">Cuentas Bancarias</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="transacciones.php" target="_blank">Transacciones</a>
                </li>
          </ul>
         
      </form>
        </div>
      </div>
    </nav>
<!---->
<!-- Formulario de búsqueda -->
<div class="users-form">
    <form method="POST" action="buscarCuen.php">
        <div class="input-group">
            <input class="form-control me-2" name="numcuenta" type="text" placeholder="Introduce el Nª de Cuenta" aria-label="Introduce el Nª de Cuenta">
            <button class="btn btn-outline-success" type="submit">Buscar Nª Cuenta</button>
        </div>
    </form>
</div>
<h1 class="text-center p-3">Registra la cuenta</h1>
<div class="users-form">
 
<form action="adicionaCuentaA.php" method="POST">
            <input type="text" name="id_Cuenta" placeholder="Ingresa el Id de la cuenta">
            <select name="tipocuenta">
              <option value="" selected disabled>Ingresa el tipo de cuenta</option>
               <option value="Cuenta Corriente	">Cuenta Corriente	</option>
              <option value="Cuenta de Ahorros">Cuenta de Ahorros</option> 
            <option value="Depósito A Plazo Fijo">Depósito A Plazo Fijo</option> 
          </select>
            <input type="text" name="saldo" placeholder="Ingresa el saldo">
            <input type="text" name="personaID" placeholder="Ingresa el carnet de identidad del cliente">
            
            <input type="submit" value="Agregar">
        </form>
</div>
<div class="users-table">
<center><h3>Cuentas Registradas</h3></center>

        <table>
            <thead>
                <tr>
                    <th style="background-color: #a6c8db; color: white;">Numero de cuenta</th>
                    <th style="background-color: #a6c8db; color: white;">Tipo de cuenta</th>
                    <th style="background-color: #a6c8db; color: white;">Saldo</th>
                    <th style="background-color: #a6c8db; color: white;">Carnet de Identidad del Cliente</th>
                    <th style="background-color: #a6c8db; color: white;"></th>
                    <th style="background-color: #a6c8db; color: white;"></th>
                    
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($resultado)): ?>
                  <tr>
    <th><?= $row['id_Cuenta'] ?></th>
    <th><?= $row['tipocuenta'] ?></th>
    <th><?= $row['saldo'] ?></th>
    <th><?= $row['personaID'] ?></th>
   
    <td>
    <?php 
   
    ?>
</td>
<!--editar se convierte en ACTUALIZAR--->
<th><a href="cambiarCuentaA.php?id=<?= $row['id_Cuenta'] ?>" class="users-table--edit">Actualizar</a></th>
<th><a href="borrarCuentaA.php?id=<?= $row['id_Cuenta'] ?>" class="users-table--delete" >Eliminar</a></th>   
</tr>

                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>


