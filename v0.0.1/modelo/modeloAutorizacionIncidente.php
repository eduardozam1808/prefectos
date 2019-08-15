<?php
    include_once '../../Server/Server.php';
    $objSever = new Server();

    $id = $_POST['id'];

    $query = "UPDATE asistencia set autorizacion = 1 WHERE id = '$id'";
if($ejecutarQuery = mysqli_query($objSever->connection(),$query)){
    echo '<script>alert("Se autorizo correctamente");</script>';
}else{
    echo '<script>alert("Fallo la operacion que se deseo crear");</script>';
}