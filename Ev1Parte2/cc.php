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

        echo "<h2>Cuenta Corriente</h2>";
        echo "<p>Las cuentas corrientes son ideales para realizar transacciones bancarias diarias y mantener un saldo disponible para gastos regulares. Ofrecen flexibilidad y acceso inmediato al dinero.</p>";
        
        echo "<h2>¿Qué es una Cuenta Corriente?</h2>";
        echo "<p>Una Cuenta Corriente es una cuenta bancaria diseñada para realizar transacciones financieras diarias. Con una cuenta corriente, puedes depositar y retirar dinero con facilidad, ya sea mediante cheques, tarjetas de débito, transferencias electrónicas u otros métodos. Estas cuentas suelen ofrecer acceso a una chequera para emitir cheques y a una tarjeta de débito para realizar compras y retiros en cajeros automáticos. A menudo, no generan intereses sobre el saldo disponible, pero ofrecen flexibilidad y conveniencia para el manejo de tu dinero.</p>";
        echo "<ul>";
        echo "<li>Flexibilidad para realizar transacciones bancarias diarias</li>";
        echo "<li>Acceso inmediato al dinero</li>";
        echo "<li>No suelen tener una tasa de interés alta</li>";
        echo "<li>Beneficios adicionales: Exención de tarifas de mantenimiento si se mantiene un saldo mínimo, protección contra sobregiros, acceso a cajeros automáticos sin cargo, etc.</li>";
        echo "</ul>";
    
    echo "<h2>Canales de Acceso: Podrás acceder a tu caja de ahorro desde los siguientes canales de atención</h2>";
    echo "<li> Ventanilla de atención. </li>"; 
    echo "<li> Banca por internet y banca móvil </li>"; 
    echo "</ul>";
    echo "<h2>Requisitos de Apertura:</h2>";
    echo "<li> Cédula de Identidad vigente (original y fotocopia). </li>";
    echo "<li> Fotocopia de NIT, si corresponde.. </li>";
    echo "<li> Monto mínimo: dólares americanos 100.- o bolivianos 700.-</li>";
    echo "</ul>";    

        $conn->close();
        ?>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?> Cuenta Corriente
    </footer>
</body>
</html>