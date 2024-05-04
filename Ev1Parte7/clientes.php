<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: index.php');
    exit();
}
include("conexion.php");
$con = conexion();
// Ejecutar la consulta SQL
$sql = "SELECT * FROM persona";
$resultado = mysqli_query($con, $sql);
//SEGUNDA
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verificar si se ha enviado el formulario y obtener el CI ingresado
  //$ci = $_POST['ci'];

  // Consulta para buscar el CI ingresado

  /*$sql = "SELECT persona.*, cuentabancaria.tipocuenta AS tipoC
          FROM persona
          INNER JOIN cuentabancaria ON persona.id_Persona = cuentabancaria.personaID
          WHERE persona.id_Persona = '$ci'";*/
         $sql=  "SELECT 
         p.nombre,
         p.apellido,
         p.email,
         p.ciudad,
         p.edad,
         p.username,
         p.password,
         cb.id_Cuenta AS id_Cuenta,
         cb.tipocuenta
     FROM 
         Persona p
     INNER JOIN 
         CuentaBancaria cb ON p.id_Persona = cb.personaID
     WHERE 
         p.id_Persona = ?";

//$query = mysqli_query($con, $sql);
} 

//$resultado = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Página de clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body >
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
              <a class="btn btn-redondo  btn-sm" href="index.php">Inicio de Sesión</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" target="_blank">Clientes</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cuentas.php" target="_blank">Cuentas Bancarias</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="transacciones.php" target="_blank">Transacciones</a>
            </li> 
          </ul>
        </div>
      </div>
    </nav>
<!---->
<!-- Formulario de búsqueda -->
<div class="users-form">
<form method="POST" action="buscarRes.php">
            <div class="input-group">
                <input class="form-control me-2" name="ci" type="text" placeholder="Introduce CI" aria-label="Introduce CI">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </div>
        </form>

</div>
    <h1 class="text-center p-3">Registrar Datos</h1>
    <div class="users-form">
        <form action="adicionarPersonaA.php" method="POST">
            <input type="text" name="id_Persona" placeholder="Ingresa la Cédula del Cliente">
            <input type="text" name="nombre" placeholder="Ingresa el Nombre del Cliente">
            <input type="text" name="apellido" placeholder="Ingresa el Apellido Paterno del Cliente">
            <input type="text" name="email" placeholder="Ingresa el Correo del Cliente">
            <select name="rol">
            <option value="" selected disabled>Elige el rol</option>
            <option value="Usuario Regular">Usuario Regular</option>
            <option value="Administrador">Administrador</option>
            <option value="Director Bancario">Director Bancario</option>
            <option value="Analista de BD">Analista de BD</option>
            <option value="Cajero">Cajero</option>
        </select>
        <select name="ciudad">
            <option value="" selected disabled>Elige el departamento</option>
            <option value="La_Paz">La_Paz</option>
            <option value="Santa_Cruz">Santa_Cruz</option>
            <option value="Cochabamba">Cochabamba</option>
            <option value="Oruro">Oruro</option>
            <option value="Potosí">Potosí</option>
            <option value="Tarija">Tarija</option>
            <option value="Beni">Beni</option>
            <option value="Pando">Pando</option>
        </select>
            <input type="text" name="edad" placeholder="Ingresa la edad Cliente">
            <input type="text" name="username" placeholder="Ingresa el nombre de Usuario">
            <input type="text" name="password" placeholder="Ingresa el nombre de Password">
            <input type="submit" value="Agregar">
        </form>
    </div>
<div class="users-table">
<center><h3>Usuarios Registrados</h3></center>

        <table>
            <thead>
                <tr>
                    <th style="background-color: #a6c8db; color: white;">Carnet e Identidad</th>
                    <th style="background-color: #a6c8db; color: white;">Nombre Completo</th>
                    <th style="background-color: #a6c8db; color: white;">Correo</th>
                    <th style="background-color: #a6c8db; color: white;">Cargo</th>
                    <th style="background-color: #a6c8db; color: white;">Ciudad</th>
                    <th style="background-color: #a6c8db; color: white;">Edad</th>
                    <th style="background-color: #a6c8db; color: white;">Username</th>
                    <th style="background-color: #a6c8db; color: white;">Password</th>
                    <th style="background-color: #a6c8db; color: white;"></th>
                    <th style="background-color: #a6c8db; color: white;"></th>
                    
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($resultado)): ?>
                  <tr>
    <th><?= $row['id_Persona'] ?></th>
    <th><?= $row['nombre']  . ' ' . $row['apellido'] ?></th>

    <th><?= $row['email'] ?></th>
    <th><?= $row['rol'] ?></th>
    <th><?= $row['ciudad'] ?></th>
    <th><?= $row['edad'] ?></th>
    <th><?= $row['username'] ?></th>
    <th><?= $row['password'] ?></th>
    
    <?php 
    if (isset($row['id_Persona'])) {
      $id_Persona = $row['id_Persona'];
    } else {
      echo 'No hay información del cliente';
  }  
   
    ?>

</th>
<!--editar se convierte en ACTUALIZAR--->
<th><a href="indexAgregar.php?id=<?= $row['id_Persona'] ?>" class="users-table--edit">Editar</a></th>
<th><a href="indexDelete.php?id=<?= $row['id_Persona'] ?>" class="users-table--delete" >Borrar</a></th>   
</tr>
<?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>


