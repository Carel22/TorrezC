<?php
include("conexion.php");
$con = conexion();

// Ejecutar la consulta SQL para obtener los usuarios y sus tipos de cuenta
$sql = "SELECT 
            p.nombre,
            p.apellido,
            GROUP_CONCAT(cb.tipocuenta) AS tipos_de_cuenta,
            SUM(cb.saldo) AS saldo_total
        FROM 
            persona p
        INNER JOIN 
            cuentabancaria cb ON p.id_Persona = cb.personaId
        GROUP BY 
            p.nombre";
$query = mysqli_query($con, $sql);
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

    <div class="users-table">
        <center><h3>Clientes y diferente Tipo de Cuentas</h3></center>

        <table>
            <thead>
                <tr>
                    <th style="background-color: #28a745; color: white;">Nombre</th>
                    <th style="background-color: #28a745; color: white;">Apellidos</th>
                    <th style="background-color: #28a745; color: white;">Tipos de Cuenta</th>
                    <th style="background-color: #28a745; color: white;">Saldo Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verificar si la consulta SQL se ejecutó correctamente
                if ($query) {
                    // Mostrar los resultados de la consulta
                    while ($fila = mysqli_fetch_assoc($query)) {
                        echo "<tr>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['apellido'] . "</td>";
                        echo "<td>" . $fila['tipos_de_cuenta'] . "</td>";
                        echo "<td>" . $fila['saldo_total'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontraron resultados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
