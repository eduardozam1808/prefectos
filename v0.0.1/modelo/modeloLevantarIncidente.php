<?php
    include_once '../../Server/Server.php';
    $objServer = new Server();


    $id = $_POST['id'];
    $prefecto = $_POST['prefecto'];
    $aula = $_POST['aula'];
    $grupo = $_POST['grupo'];
    $carrera = $_POST['carrera'];
    $catedratico = $_POST['catedratico'];
    $horario = $_POST['horario'];
    $optativa = $_POST['optativa'];
    $observacion = $_POST['problema'];
    if($optativa === '' || $optativa === null){
        $optativa = 'NO';
    }else{
        $optativa  = 'SI';
    }

    $query1 = "SELECT *FROM asistencia WHERE id = '$id'";
    $ejecutarQuery1 = mysqli_query($objServer->connection(),$query1);
    $data = mysqli_fetch_assoc($ejecutarQuery1);

    if($data['problema'] === '0') {
        if ($prefecto === $data['prefecto']) {

            $query0 = "UPDATE asistencia set problema = 1 WHERE id = '$id'";
            if ($ejecutarQuery0 = mysqli_query($objServer->connection(), $query0)) {
                $query = "INSERT INTO asistenciaReporte (prefecto, aula, grupo, carrera, optativa, catedratico, horario, observacion, idAfectado) VALUE ('$prefecto','$aula','$grupo','$carrera','$optativa','$catedratico','$horario','$observacion','$id')";
                if ($ejecutarQuery = mysqli_query($objServer->connection(), $query)) {
                    echo '<script> 
swal({
  icon: "success",
  title:"Incidente levantado"
});
cerrarIncidente();</script>';
                } else {
                    'nel compa no se pudo';
                }
            } else {
                echo 'ERROR 456';
            }
        } else {
            echo "<script>
                 alert('Error no puedes levantar una incidencia si tu no la produciste');
             </script>";
        }
    }else{
        echo "
            <script>
            alert('No puedes levantar otro Incidente');
</script>
        ";
    }
