<?php
include("conexion.php");
$con = conexion();

// Inicializar variables
$search_message = "";
$query = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el formulario y obtener el CI ingresado
    $ci = $_POST['ci'];

    // Consulta para buscar el id_Persona ingresado
    $sql =  "SELECT 
    p.nombre,
    p.apellido,
    p.email,

    cb.id_Cuenta AS id_Cuenta,
    cb.tipocuenta, cb.saldo
FROM 
    Persona p
INNER JOIN 
    CuentaBancaria cb ON p.id_Persona = cb.personaID
WHERE 
    p.id_Persona = ?";


    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $ci);
        mysqli_stmt_execute($stmt);
        $query = mysqli_stmt_get_result($stmt);

        if ($query) {
            // Obtener el nombre y apellido del cliente
            $row = mysqli_fetch_assoc($query);
            $nombre_cliente = $row['nombre'];
            $apellido_cliente = $row['apellido'];
            $search_message = "Búsqueda exitosa. Cliente: $nombre_cliente $apellido_cliente";
        } else {
            $search_message = "Error en la consulta: " . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
    } else {
        $search_message = "Error en la preparaid_Personaón de la consulta: " . mysqli_error($con);
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Iniid_Personao de Página</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold  " href="#">
            <?php
include 'header.php';
?> </a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-redondo  btn-sm" href="formulario.php">Iniid_Personao de Sesión</a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" target="_blank">Clientes</a>
                    </li>

                </ul>

                </form>
            </div>
        </div>
    </nav>
    <!---->

    <br>

    <div class="users-table">
        <h2>Cliente</h2>


        ?>

        <p><?= isset($search_message) ? $search_message : "" ?></p>


        <table style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>

                    <th style="background-color: #a6c8db; color: white;">Nombre Completo</th>
                    <th style="background-color: #a6c8db; color: white;">Email</th>
                    <th style="background-color: #a6c8db; color: white;">Nª de Cuenta</th>
                    <th style="background-color: #a6c8db; color: white;">Tipo de Cuenta</th>
                    <th style="background-color: #a6c8db; color: white;">Saldo</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)) : ?>

                    <tr>
                        <th><?= $row['nombre']  . ' ' . $row['apellido'] ?></th>

                        <th><?= $row['email'] ?></th>
                        <th><?= $row['id_Cuenta'] ?></th>
                        <th><?= $row['tipocuenta'] ?></th>
                        <th><?= $row['saldo'] ?></th>
                        <?php

                        ?>
                        </th>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
    include 'footer.php';
    ?>
</body>

</html>