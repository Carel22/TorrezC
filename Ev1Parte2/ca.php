<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuentas Bancarias</title>
    <link rel="stylesheet" href="CSS/style2.css">
</head>
<body>
    <header>
        <h1>Cuentas Bancarias</h1>
    </header>
    <main>
        <?php
         $servername = "localhost";
        $user = "root";
        $password = "";
    $conn = new mysqli($servername, $user, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "<h2>Cuentas de Ahorros</h2>";
        echo "<p>Una Cuenta de Ahorros es una cuenta bancaria diseñada para guardar dinero y acumular intereses a lo largo del tiempo. Con una cuenta de ahorros, puedes depositar dinero y dejarlo allí para que crezca con una tasa de interés, que suele ser más alta que la de una cuenta corriente. </p>";
        
        echo "<h2>¿Qué es una Cuenta de Ahorros?</h2>";
        echo "<p>Las cuentas de ahorros están diseñadas para ayudar a los clientes a ahorrar dinero con el tiempo. Ofrecen una tasa de interés más alta que las cuentas corrientes, lo que ayuda a aumentar el saldo con el tiempo.</p>";
        echo "<ul>";
        echo "<li>Tasa de interés más alta que las cuentas corrientes</li>";
        echo "<li>Ideal para ahorrar a largo plazo</li>";
        echo "<li>Beneficios adicionales: Posibilidad de establecer metas de ahorro, herramientas de seguimiento de gastos, acceso a préstamos preferenciales, etc.</li>";
        echo "</ul>";
        
       
    
    echo "<h2>Canales de Acceso: Podrás acceder a tu caja de ahorro desde los siguientes canales de atención</h2>";
    echo "<li> Ventanilla de atención. </li>"; 
    echo "</ul>";
    echo "<h2>Requisitos de Apertura:</h2>";
    echo "<li> Cédula de Identidad vigente (original y fotocopia). </li>";
    echo "<li> Fotocopia de NIT, si corresponde.. </li>";
    echo "<li> Monto mínimo: dólares americanos 100.- o bolivianos 700.-</li>"; 
    echo "<li> Los menores de edad deben tener entre 0 y 17 años.</li>";
    echo "</ul>";    

        $conn->close();
        ?>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?> Cuentas de Ahorros
    </footer>
</body>
</html>