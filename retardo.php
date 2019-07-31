<?php
    include_once './Server/Server.php';
    $objServer = new Server();
    $tiempo = $_POST['tiempo'];
    $id = $_POST['id'];

    $query = "UPDATE asistencia set noFalto = 0, siFalto = 0, retardo = 1, minTarde = '$tiempo' WHERE id = '$id'";
    $ejecutar = mysqli_query($objServer->connection(),$query);
    echo"
        <script>
        $('#modalTiempo').css('display','none');
        
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
</script>
    
    ";