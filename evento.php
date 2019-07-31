<?php
include_once './Server/Server.php';
$objServer = new Server();

$id = $_POST['id'];
$opc = $_POST['opc'];

switch ($opc) {
    case 0:
        $query = "UPDATE asistencia set noFalto = 1, siFalto = 0, retardo = 0, minTarde='00:00:00' WHERE id = '$id'";
        $ejecutar = mysqli_query($objServer->connection(), $query);
        echo "<script>
try {
        $(\"#inputtt\").on('keyup', function () {
            let aBuscar = $(\"#inputtt\").val();

            let parametro = {
                \"aBuscar\": aBuscar

            };
            $.ajax({
                type: \"POST\",
                url: \"busqueda.php\",
                data: parametro,
                success: function (response) {
                    $(\"#resultado\").html(response);
                }
            }).responseText;
        }).keyup();
    } catch (e) {
    }
</script>";
        break;
    case 1:
        //Si Falto
        $query = "UPDATE asistencia set noFalto = 0, siFalto = 1, retardo = 0, minTarde='00:00:00' WHERE id = '$id'";
        $ejecutar = mysqli_query($objServer->connection(), $query);
        echo "<script>
try {
        $(\"#inputtt\").on('keyup', function () {
            let aBuscar = $(\"#inputtt\").val();

            let parametro = {
                \"aBuscar\": aBuscar

            };
            $.ajax({
                type: \"POST\",
                url: \"busqueda.php\",
                data: parametro,
                success: function (response) {
                    $(\"#resultado\").html(response);
                }
            }).responseText;
        }).keyup();
    } catch (e) {
    }
</script>";
        break;
    case 2:
        echo "
        
          
         
<script>

 try {
        $(\"#inputtt\").on('keyup', function () {
            let aBuscar = $(\"#inputtt\").val();

            let parametro = {
                \"aBuscar\": aBuscar

            };
            $.ajax({
                type: \"POST\",
                url: \"busqueda.php\",
                data: parametro,
                success: function (response) {
                    $(\"#resultado\").html(response);
                 
                }
            }).responseText;
        }).keyup();
           
    } catch (e) {
    }
$('#modalTiempo').css('display','block');
</script>
           ";

        //Retardo
        /*
        $query = "UPDATE asistencia set noFalto = 0, siFalto = 0, retardo = 1 WHERE id = '$id'";
        $ejecutar = mysqli_query($objServer->connection(),$query);
        echo "<script>
try {
     $(\"#inputtt\").on('keyup', function () {
         let aBuscar = $(\"#inputtt\").val();

         let parametro = {
             \"aBuscar\": aBuscar

         };
         $.ajax({
             type: \"POST\",
             url: \"busqueda.php\",
             data: parametro,
             success: function (response) {
                 $(\"#resultado\").html(response);
             }
         }).responseText;
     }).keyup();
 } catch (e) {
 }
</script>";*/
        break;
}
