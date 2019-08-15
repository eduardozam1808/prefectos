<?php
require_once '../../Server/Server.php';
$objServer = new Server();
$id =$_POST['id'];

$query = "DELETE FROM maestros where id = '$id'";
if ($ejecutarQuery= mysqli_query($objServer->connection(),$query)){
    echo "
    <script>
    
     try {
        $(\"#busqueda\").on('keyup', function () {
            let aBuscar = $(\"#busqueda\").val();
            let parametro = {
                \"aBuscar\": aBuscar
            };
            $.ajax({
                type: \"POST\",
                url: \"busquedaMaestro.php\",
                data: parametro,
                success: function (response) {
                    $(\"#tabla\").html(response);
                }
            }).responseText;
        }).keyup();
    } catch (e) {
    }
</script>
    
    ";

}else{
    echo "error";
}

