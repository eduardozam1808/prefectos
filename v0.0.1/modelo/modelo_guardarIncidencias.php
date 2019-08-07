<?php
require_once '../../Server/Server.php';
$objServer = new Server();

$grupo =$_POST['grupo'];
$aula = $_POST['aula'];
$carrera = $_POST['carrera'];
$jefeGrupo = $_POST['jefeGrupo'];
$reporte = $_POST['reporte'];

$sql0 = "SELECT * FROM asistencia where id = '$grupo'";
$ejecutarQuery0 = mysqli_query($objServer->connection(),$sql0);
$dato = mysqli_fetch_assoc($ejecutarQuery0);
$newgrupo = $dato['grupo'];
//$sql ="UPDATE insidencias set grupo = $grupo, aula = $aula, carrera = $carrera, jefeGrupo= $jefeGrupo, descripcionReporte = $reporte where id = $id";
$sql = "INSERT INTO insidencias (grupo, aula, carrera, jefeGrupo, descripcionReporte) VALUES ('$newgrupo', '$aula', '$carrera', '$jefeGrupo', '$reporte')";

if($ejecutarQuery = mysqli_query($objServer->connection(),$sql)){
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



