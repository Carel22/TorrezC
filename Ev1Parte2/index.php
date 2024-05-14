<?php
session_start(); // Iniciar la sesión

include("conexion.php");
$con = conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar las credenciales del administrador (consulta a la base de datos)
    $sql = "SELECT * FROM persona WHERE username = '$username' AND password = '$password'";
    $resultado = mysqli_query($con, $sql);
    if (mysqli_num_rows($resultado) > 0) {
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      header('Location: cuentas.php');
      exit();
  } else {
      $error = 'Credenciales incorrectas. Inténtalo de nuevo.';
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style2.css">
    <title>Inicio de Página</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body >
<!---->

<h1 style="background-color:DodgerBlue;color:antiquewhite">BANCO JUNIOR</h1> <!-- Título del banco con estilos en línea -->
<div class="claseBody"> <!-- Div contenedor con la clase "claseBody" -->
<?php
include'header.php';
?>
<h2>Misión</h2>
<p>En Banco Junior, nuestra misión es brindar soluciones financieras innovadoras y accesibles a nuestros clientes, ayudándolos a alcanzar sus metas financieras y mejorar su calidad de vida.</p>

<h2>Visión</h2>
<p>En Banco Junior, nuestra visión es ser el banco líder en soluciones financieras para jóvenes y familias, ofreciendo productos y servicios de calidad, con un enfoque en la tecnología y la sostenibilidad.</p>
<br> <!-- Salto de línea -->
<a href="df.php"> <!-- Enlace con el URL destino -->
<picture> <!-- Elemento picture para imágenes responsivas -->
  <source media="(min-width: 650px)" srcset="im1.jpg"> <!-- Define la imagen im1.jpg para pantallas con ancho mínimo de 650px -->
  <source media="(min-width: 465px)" srcset="im2.jpg"> <!-- Define la imagen im2.jpg para pantallas con ancho mínimo de 465px -->
  <img src="im1.jpg"> <!-- Imagen por defecto para pantallas con ancho menor a 465px -->
</picture> <!-- Fin del elemento picture -->
<a href="cc.php"> <!-- Enlace con el URL destino -->
<picture> <!-- Segundo elemento picture para imágenes responsivas -->
  <source media="(min-width: 650px)" srcset="im2.jpg"> <!-- Define la imagen im2.jpg para pantallas con ancho mínimo de 650px -->
  <source media="(min-width: 465px)" srcset="im1.jpg"> <!-- Define la imagen im1.jpg para pantallas con ancho mínimo de 465px -->
  <img src="im2.jpg"> <!-- Imagen por defecto para pantallas con ancho menor a 465px -->
</picture> <!-- Fin del segundo elemento picture --></a>
<a href="ca.php"> <!-- Enlace con el URL destino -->
<picture> <!-- Tercer elemento picture para imágenes responsivas -->
  <source media="(min-width: 650px)" srcset="im3.jpg"> <!-- Define la imagen im3.jpg para pantallas con ancho mínimo de 650px -->
  <source media="(min-width: 465px)" srcset="im1.jpg"> <!-- Define la imagen im1.jpg para pantallas con ancho mínimo de 465px -->
  <img src="im3.jpg"> <!-- Imagen por defecto para pantallas con ancho menor a 465px -->
</picture> <!-- Fin del tercer elemento picture --></a>
</div> <!-- Fin del div contenedor -->
<br>
<?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <div class="users-form col-auto">
        <form method="post" action="">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario del Cliente:</label>
                <input type="text" id="usuario" name="username"  class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña del Cliente:</label>
                <input type="password" id="contrasena" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php
include"footer.php";
?>
</body>

</html>


