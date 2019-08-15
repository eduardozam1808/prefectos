<?php

require_once '../../Server/Server.php';
$objServer = new Server();

$id= $_POST['id'];
$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefonoCelular = $_POST['telefonoCelular'];
$telefonoCasa = $_POST['telefonoCasa'];
$telefonoOficina = $_POST['telefonoOficina'];
$titulo = $_POST['titulo'];
$correo = $_POST['correo'];

$query = "UPDATE maestros set clave = '$clave', nombre = '$nombre', apellido = '$apellido', telefonoCelular = '$telefonoCelular', telefonoCasa = '$telefonoCasa', 
telefonoOficina= '$telefonoOficina', titulo = '$titulo', correo = '$correo' where id = '$id'";

if ($ejecutar = mysqli_query($objServer->connection(), $query)){
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


