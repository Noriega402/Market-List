<?php
// Declaramos las variables de conexión
$ServerName = "bbqklate9jeap921dzzg-mysql.services.clever-cloud.com";
$Username = "upouv4azdcbtfvl7";
$Password = "9l0imjy0k4AjRBxkFQxD";
$NameBD = "bbqklate9jeap921dzzg";
// Creamos la conexión con MySQL
$conexion = new mysqli($ServerName, $Username, $Password, $NameBD);
// Revisamos la Conexión MySQL
if ($conexion->connect_error) {
    die("Ha fallado la conexión: " . $conexion->connect_error);
}
// Enviamos un mensaje de conexión correcta
//echo "Conectado correctamente";
// echo "<h2>Resultados desde Servidor Remoto</h2>";
/* Pedimos la información remota */
$consulta = "SELECT id, nombres, apellidos,correo FROM usuarios";
$resultados = $conexion->query($consulta);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/314db632b8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Usuarios del Sistema</title>
</head>

<body>
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="#"><img src="img/logo.svg" alt="" class="logo"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 justify-content-center ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.html"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./store.html"><i class="fas fa-store icon"></i> Tienda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./consulta.php"><i class="fas fa-user"></i> Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-mail-bulk icon"></i> Contactanos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-users icon"></i> Soporte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-sign-in-alt icon"></i> Iniciar Sesión</a>
                </li>
                <button class="btn btn-primary btn-sm ml-3 login">Registrate</button>
            </ul>
        </div>
    </nav>


    <div class="container-fluid mt-5">
        <table class="table table-bordered table-hover table-condense">
            <thead class="bg-light">
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRES</th>
                    <th scope="col">APELLIDOS</th>
                    <th scope="col">CORREOS</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                    <?php
                        if ($resultados->num_rows > 0) {
                            // Salida de la consulta mediante el ciclo WHILE
                            while($registro = $resultados->fetch_assoc()) {
                                echo "<tr>";
                                    echo "<th scope='row' class='text-center'>".$registro["id"]."</th>";
                                    echo "<td>".$registro["nombres"]."</td>";
                                    echo "<td>".$registro["apellidos"]."</td>";
                                    echo "<td>".$registro["correo"]."</td>";
                                echo "</tr>";
                            }
                        } else {
                            // Imprimimos si no hay ningun resultado.
                            echo "<b class='text-white'>0 resultados</b>";
                        }
                    ?>
            </tbody>
        </table>
    </div>


</body>

</html>