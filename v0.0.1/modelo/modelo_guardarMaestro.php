<?php

    include_once '../../Server/Server.php';
    $objServer = new Server();

    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $titulo = $_POST['titulo'];
    $telCelular = $_POST['telCelular'];
    $telCasa = $_POST['telCasa'];
    $telOficina = $_POST['telOficina'];
    $correo = $_POST['correo'];

    $query = "INSERT INTO maestros (clave, nombre, apellido, telCelular, telCasa, telOficina, titulo, correo) VALUES ('$clave','$nombre','$apellido','$telCelular','$telCasa','$telOficina','$titulo','$correo')";
    if($ejecutarQuery = mysqli_query($objServer->connection(),$query)){
        echo "Exito..";
    }else{
        echo "fallo..";
    }

echo 'HOLA';