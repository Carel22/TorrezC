<?php
include("conexion.php");
$con = conexion();
// Ejecutar la consulta SQL
$sql = "SELECT * FROM cuentabancaria";
$resultado = mysqli_query($con, $sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //$username = $_POST['cuentabancaria.id'];
    $username = $_SESSION['username']; // o obtenerlo de un formulario 
    // Modificar la consulta SQL para que incluya la cláusula WHERE
    $sql = "SELECT * FROM cuentabancaria WHERE personaID = '$username'";
    // Ejecutar la consulta SQL
    $resultado = mysqli_query($con, $sql);
  

    // Volver a ejecutar la consulta SQL para obtener los datos actualizados de las cuentas bancarias
    $resultado = mysqli_query($con, $sql);
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
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php" target="_blank">Inicio de Página</a>
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

<h1 class="text-center p-3">Registra la apertura de cuenta</h1>
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
            <input type="text" name="personaID" placeholder="Carnet de identidad del cliente">
            
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
                    <th style="background-color: #a6c8db; color: white;">Saldo de Apertura</th>
                    <th style="background-color: #a6c8db; color: white;">Saldo Actual</th>
                    
                </tr>
            </thead>

            <tbody>
    <?php while ($row = mysqli_fetch_array($resultado)): ?>
        <tr>
            <td><?= $row['id_Cuenta'] ?></td>
            <td><?= $row['tipocuenta'] ?></td>
            <td><?= $row['saldo'] ?></td>
            <!-- Mostrar la operación sobre el saldo -->
            <td>
                <?php 
                    // Obtener la última transacción para esta cuenta
                    $sql_last_transaction = "SELECT * FROM transaccionbancaria WHERE cuentaID = '{$row['id_Cuenta']}' ORDER BY id_Transaccion DESC LIMIT 1";
                    $resultado_last_transaction = mysqli_query($con, $sql_last_transaction);
                    $last_transaction = mysqli_fetch_array($resultado_last_transaction);

                   // Calcular la operación sobre el saldo
$saldo_actual = $row['saldo'];

if ($last_transaction) {
    if ($last_transaction['tipoTransaccion'] == 'Depósito') {
        $saldo_actual += $last_transaction['monto'];
    } elseif ($last_transaction['tipoTransaccion'] == 'Retiro') {
        $saldo_actual -= $last_transaction['monto'];
    } elseif ($last_transaction['tipoTransaccion'] == 'Transferencia') {
        $saldo_actual += $last_transaction['monto'];
    } else {
        echo "Sin operación";
    }
} else {
    echo "Sin transacciones";
}
echo "$saldo_actual";
                ?>
            </td>
            
            <td><a href="cambiarCuentaA.php?id=<?= $row['id_Cuenta'] ?>" class="users-table--edit">Cambiar</a></td> 
        </tr>
    <?php endwhile; ?>
</tbody>

        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
