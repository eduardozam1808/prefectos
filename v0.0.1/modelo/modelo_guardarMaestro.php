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
        try {
            $("#busqueda").on('keyup', function () {
                let aBuscar = $("#busqueda").val();
                let parametro = {
                    "aBuscar": aBuscar
                };
                $.ajax({
                    type: "POST",
                    url: "busquedaMaestro.php",
                    data: parametro,
                    success: function (response) {
                        $("#tabla").html(response);
                    }
                }).responseText;
            }).keyup();
        } catch (e) {
        }
    </script>
    <?php
}else{
    ?>
    <script>
        swal("Error", "El registro no se realizo correctamente", "error");
    </script>
    <?php
}