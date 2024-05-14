<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Define la codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Establece la escala inicial y el ancho de la pantalla -->
    <link rel="stylesheet" href="style.css"> <!-- Enlaza la hoja de estilos externa -->
    <title>Banco Junior</title> <!-- Título de la página -->
</head>
<body>
<?php
include 'head.php';
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
</picture> <!-- Fin del segundo elemento picture -->
<a href="ca.php"> <!-- Enlace con el URL destino -->
<picture> <!-- Tercer elemento picture para imágenes responsivas -->
  <source media="(min-width: 650px)" srcset="im3.jpg"> <!-- Define la imagen im3.jpg para pantallas con ancho mínimo de 650px -->
  <source media="(min-width: 465px)" srcset="im1.jpg"> <!-- Define la imagen im1.jpg para pantallas con ancho mínimo de 465px -->
  <img src="im3.jpg"> <!-- Imagen por defecto para pantallas con ancho menor a 465px -->
</picture> <!-- Fin del tercer elemento picture -->
</div> <!-- Fin del div contenedor -->
 <?php
         $servername = "localhost";
        $user = "root";
        $password = "";
    $conn = new mysqli($servername, $user, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
         $conn->close();
        ?>
    

</body>
</main>
<?php
include 'foot.php';
?>

</html>