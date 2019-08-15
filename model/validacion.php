<?php
include_once '../Server/Server.php';
$objServer = new Server();
session_start();

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];


$query = "SELECT *from usuarios WHERE correo LIKE '$correo'";
$ejecutarQuery = mysqli_query($objServer->connection(), $query);
while ($dato = mysqli_fetch_assoc($ejecutarQuery)) {

    if ($dato['contrasena'] === $contrasena) {
        $_SESSION['prefectoNombre'] = $dato['nombre'].' '.$dato['apellido'];
        $query = "SELECT *from versiones WHERE estable = 1";
        $ejecutarQuery = mysqli_query($objServer->connection(), $query);
        $dato = mysqli_fetch_assoc($ejecutarQuery);
        $ruta = $dato['version'].'/index.php';

       echo"<script>location.href='".$ruta."'</script>";

            } else {

        echo "
         
                <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
  <strong>¡Error!</strong> La contraseña es incorrecta
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>
                ";
    }
}
