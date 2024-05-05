<?php
include("conexion.php");
$con = conexion();
$id = $_GET['id'];  // Mantenido 'id' como está
// Verificar si el ID  existe y obtener la información
$sql = "SELECT * FROM transaccionbancaria WHERE id_Transaccion='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    // Verificar si se obtuvieron resultados
    if (mysqli_num_rows($query) > 0) {
        // Obtener la fila como un array asociativo
        $row = mysqli_fetch_array($query);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="CSS/styles.css">
            <title>Editar Transaccion </title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        </head>
        <body>
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
                  <a class="nav-link active" aria-current="page" href="usuarioAnalista.php" target="_blank">Clientes</a>
                </li>
                <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="usuarioAnalistacuentas.php" target="_blank">Cuentas Bancarias</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="usuarioAnalistatransacciones.php" target="_blank">Transacciones</a>
            </li> 
          </ul>
         
      </form>
        </div>
      </div>
    </nav>
    <br>
    <h2>EDITA DATOS </h2>
        <div class="users-form">
        <form action="editTransaccionUAT.php" method="POST">
                  

            <input type="text" name="id_Transaccion" placeholder="Ingresa el Nª de la cuenta"value="<?= $row['id_Transaccion'] ?>">
            <input type="text" name="cuentaID" placeholder="Ingresa el Nª cuenta"value="<?= $row['cuentaID'] ?>">
            
            <select name="tipoTransaccion">
              <option value="" selected disabled>Ingresa el tipo de transferencia</option>
               <option value="Depósito	">Depósito	</option>
              <option value="Retiro">Retiro</option> 
            <option value="Transferencia">Transferencia</option> 
          </select>
                   
            <input type="text" name="monto" placeholder="Ingresa el monto"value="<?= $row['monto'] ?>">
            <input type="text" name="fechaHora" placeholder="Ingresa la fecha"value="<?= $row['fechaHora'] ?>">
            
            <input type="submit" value="Agregar">
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        // No se encontraron resultados para el ID proporcionado
        echo "No se encontraron datos para el ID: $id";
    }
} else {
    // Manejo de errores si la consulta no se ejecutó correctamente
    echo "Error en la consulta: " . mysqli_error($con);
}
?>