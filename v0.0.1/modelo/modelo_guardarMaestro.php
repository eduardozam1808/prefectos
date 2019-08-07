<?php

require_once '../../Server/Server.php';
$objServer = new Server();

$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telCelular = $_POST['telefonoCelular'];
$telCasa = $_POST['telefonoCasa'];
$telOficina = $_POST['telefonoOficina'];
$titulo = $_POST['titulo'];
$correo = $_POST['correo'];

$query = "INSERT INTO maestros (clave, nombre, apellido, telefonoCelular, telefonoCasa, telefonoOficina, titulo, correo) VALUES ('$clave','$nombre','$apellido','$telCelular','$telCasa','$telOficina','$titulo','$correo')";

if($ejecutarQuery = mysqli_query($objServer->connection(),$query)){
    ?>
    <script>
        swal("Enviado", "Su registro se envio correctamente", "success")
    </script>
    <?php
}else{
    ?>
    <script>
        swal("Error", "El registro no se realizo correctamente", "error");
    </script>
    <?php
}