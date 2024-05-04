<?php
session_start();

include("conexion.php");
$con = conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];
    // Verificar las credenciales del usuario y su rol
    $sql = "SELECT * FROM persona WHERE username = '$username' AND password = '$password'";
    $resultado = mysqli_query($con, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $_SESSION['username'] = $username;
        $_SESSION['rol'] = $row['rol']; // Guardar el rol del usuario en la sesión

        // Redireccionar según el rol del usuario
        switch ($row['rol']) {
            case 'Usuario Regular':
                header('Location: usuarioCliente.php');
                exit();
            case 'Administrador':
                header('Location: clientes.php');
                exit();
            case 'Director Bancario':
                header('Location: usuarioDirector.php');
                exit();
            case 'Analista de BD':
                header('Location: usuarioAnalista.php');
                exit();
            case 'Cajero':
                header('Location:  usuarioContador.php');
                exit();
            default:
                $error = 'Rol de usuario desconocido.';
        }
    } else {
        $error = 'Credenciales incorrectas. Inténtalo de nuevo.';
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Iniciar Sesión</title>
    <link rel="icon" href="logotipo.png" type="image/png" sizes="128x128">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <nav class="navbar navbar-expand-lg bg-success">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold  text-light" href="#">
        <h5 style="line-height: 1; margin-bottom: 0;">
        
        <span class="fw-bold" style="font-size: 1.2em;">BIENVENIDO A NUESTRO BANCO</span>
    </h5>
  </a>
      </nav>    
<br>
    <h1>Iniciar Sesión</h1>
    <div class="users-form col-auto">
        <form method="post" action="">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" id="usuario" name="username"  class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <input type="password" id="contrasena" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol:</label>
                <input type="rol" id="rol" name="rol" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        
    </div>
    
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>



