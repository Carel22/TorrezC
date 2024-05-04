<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuentas Bancarias</title>
    <link rel="stylesheet" href="styles2.css">
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

    echo "<h2>Depósito A Plazo Fijo</h2>";
    echo "<p>En Banco Junior entendemos la importancia de hacer crecer tu dinero de forma segura y confiable. Es por eso que te ofrecemos nuestro exclusivo servicio de Depósito a Plazo Fijo, una oportunidad de inversión diseñada para optimizar tus ahorros y asegurar un futuro financiero estable.</p>";
    
    echo "<h2>¿Qué es un Depósito a Plazo Fijo?</h2>";
    echo"<p>Un Depósito a Plazo Fijo es una inversión que te permite depositar una suma de dinero por un período de tiempo determinado, con la seguridad de obtener una tasa de interés fija garantizada. Esta opción de inversión es ideal para aquellos que buscan seguridad y estabilidad en sus finanzas.</p>";
    echo "<p>Beneficios de nuestro Depósito a Plazo Fijo:</p>";
    echo "<ul>";
    echo"<li>Tasa de interés competitiva: Te ofrecemos tasas de interés altamente competitivas para maximizar el rendimiento de tus ahorros.</li>";
    echo"<li> Seguridad y confiabilidad: Con [Nombre del Banco], puedes tener la tranquilidad de que tus fondos están protegidos y respaldados por una institución financiera de renombre.</li>";
    echo"<li> Flexibilidad de plazos: Adaptamos nuestros plazos de inversión a tus necesidades, ofreciendo opciones que van desde corto hasta largo plazo.</li>";
    echo"<li> Intereses garantizados: Obtén rendimientos predecibles y estables, ya que la tasa de interés se fija al momento de realizar el depósito.</li>";
    echo "<li>Beneficios adicionales: Posibilidad de reinvertir intereses automáticamente, opciones de retiro anticipado con penalización reducida, acceso a servicios de asesoramiento financiero, etc.</li>";
    echo "</ul>";
    
    echo "<h2>Canales de Acceso: Podrás acceder a tu caja de ahorro desde los siguientes canales de atención</h2>";
    echo "<li> Ventanilla de atención. </li>";
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
        &copy; <?php echo date("Y"); ?> Deposito Financiero
    </footer>
</body>
</html>