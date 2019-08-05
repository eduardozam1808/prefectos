<?php
require_once '../../Server/Server.php';
$objServer = new Server();

$grupo =$_POST['grupo'];
$aula = $_POST['aula'];
$carrera = $_POST['carrera'];
$jefeGrupo = $_POST['jefeGrupo'];
$reporte = $_POST['reporte'];

//$sql ="UPDATE insidencias set grupo = $grupo, aula = $aula, carrera = $carrera, jefeGrupo= $jefeGrupo, descripcionReporte = $reporte where id = $id";
$sql = "INSERT INTO insidencias ( grupo, aula, carrera, jefegrupo, descripcionreporte) VALUES ('$grupo', '$aula', '$carrera', '$jefeGrupo', '$reporte')";
$ejecutarQuery =mysqli_query($objServer->connection(),$sql);

if ($ejecutarQuery === TRUE){
    echo "<script>

</script>";

}



