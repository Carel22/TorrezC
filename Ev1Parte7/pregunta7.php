<?php
include("conexion.php");
$con = conexion();


// consulta SQL para obtener la suma total de montos por ciudad de todos los departamentos
/*$sql = "SELECT
SUM(CASE WHEN p.ciudad = 'Beni' THEN cb.saldo ELSE 0 END) AS Beni,
SUM(CASE WHEN p.ciudad = 'Chuquisaca' THEN cb.saldo ELSE 0 END) AS Chuquisaca,
SUM(CASE WHEN p.ciudad = 'Cochabamba' THEN cb.saldo ELSE 0 END) AS Cochabamba,
SUM(CASE WHEN p.ciudad = 'La_Paz' THEN cb.saldo ELSE 0 END) AS La_Paz,
SUM(CASE WHEN p.ciudad = 'Oruro' THEN cb.saldo ELSE 0 END) AS Oruro,
SUM(CASE WHEN p.ciudad = 'Pando' THEN cb.saldo ELSE 0 END) AS Pando,
SUM(CASE WHEN p.ciudad = 'Potosi' THEN cb.saldo ELSE 0 END) AS Potosi,
SUM(CASE WHEN p.ciudad = 'Santa_Cruz' THEN cb.saldo ELSE 0 END) AS Santa_Cruz,
SUM(CASE WHEN p.ciudad = 'Tarija' THEN cb.saldo ELSE 0 END) AS Tarija
FROM
persona p
JOIN
cuentabancaria cb ON p.id_Persona = cb.personaId
JOIN
(SELECT ciudad, SUM(saldo) as monto FROM cuentabancaria cb INNER JOIN persona p ON cb.personaId = p.id_Persona GROUP BY ciudad) as xx
ON p.ciudad = xx.ciudad
LIMIT 0, 25;";*/
//`La Paz` por lo del espacio
$sql = "SELECT
            SUM(CASE WHEN p.ciudad = 'Beni' THEN cb.saldo ELSE 0 END) AS Beni,
            SUM(CASE WHEN p.ciudad = 'Chuquisaca' THEN cb.saldo ELSE 0 END) AS Chuquisaca,
            SUM(CASE WHEN p.ciudad = 'Cochabamba' THEN cb.saldo ELSE 0 END) AS Cochabamba,
            SUM(CASE WHEN p.ciudad = 'La_Paz' THEN cb.saldo ELSE 0 END) AS La_Paz,
            SUM(CASE WHEN p.ciudad = 'Potosi' THEN cb.saldo ELSE 0 END) AS Potosi,
            SUM(CASE WHEN p.ciudad = 'Tarija' THEN cb.saldo ELSE 0 END) AS Tarija
            FROM
persona p
JOIN
cuentabancaria cb ON p.id_Persona = cb.personaId
JOIN
(SELECT ciudad, SUM(saldo) as monto FROM cuentabancaria cb INNER JOIN persona p ON cb.personaId = p.id_Persona GROUP BY ciudad) as xx
ON p.ciudad = xx.ciudad
LIMIT 0, 25;";


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
            <a class="nav-link active" aria-current="page" href="#" target="_blank">Clientes</a>
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
<center><h3>Clientes por Departamento</h3></center>

        <table>
            <thead>
                <tr>
                <th style="background-color: #28a745; color: white;">Beni</th>
<th style="background-color: #28a745; color: white;">Chuquisaca</th>
<th style="background-color: #28a745; color: white;">Cochabamba</th>
<th style="background-color: #28a745; color: white;">La Paz</th>
<!--<th style="background-color: #28a745; color: white;">Oruro</th>-->
<!--<th style="background-color: #28a745; color: white;">Pando</th>-->
<th style="background-color: #28a745; color: white;">Potosí</th>
<!--<th style="background-color: #28a745; color: white;">Santa Cruz</th>-->
<th style="background-color: #28a745; color: white;">Tarija</th>

                </tr>
            </thead>
            <tbody>
            <?php
                // Verificar si la consulta SQL se ejecutó correctamente
                if (isset($query)) {
                    // Variable para mantener un registro de las ciudades ya procesadas
                    $ciudades_procesadas = array();
                    // Mostrar los resultados de la consulta
                    while ($fila = mysqli_fetch_assoc($query)) {
                        // Verificar si la ciudad ya ha sido procesada
                        
                            echo "<tr>";
                            echo "<td>" . $fila['Beni'] . "</td>";
                            echo "<td>" . $fila['Chuquisaca'] . "</td>";
                            echo "<td>" . $fila['Cochabamba'] . "</td>";
                            echo "<td>" . $fila['La_Paz'] . "</td>";
                            //echo "<td>" . $fila['Oruro'] . "</td>";
                            //echo "<td>" . $fila['Pando'] . "</td>";
                            echo "<td>" . $fila['Potosi'] . "</td>";
                            //echo "<td>" . $fila['Santa_Cruz'] . "</td>";
                            echo "<td>" . $fila['Tarija'] . "</td>";
                            echo "</tr>";
                            // Agregar la ciudad a la lista de ciudades procesadas
                            
                        
                    }
                } else {
                    echo "<tr><td colspan='2'>No se encontraron resultados.</td></tr>";
                }
                ?>
            
            </tbody>
            
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <script>
        document.getElementById("redireccionarBtn").addEventListener("click", function() {
            // URL a la que quieres redireccionar
            var nuevaVentanaURL = "pregunta7.php";
            
            // Redireccionar a la nueva ventana
            window.location.href = nuevaVentanaURL;
        });
    </script>

</body>

</html>