<?php
include_once '../Server/Server.php';
$objServer = new Server();
session_start();

$id = $_POST['id'];
$opc = $_POST['opc'];
$query = "SELECT *from asistencia WHERE id='$id'";
$ejecutar = mysqli_query($objServer->connection(),$query);
$data = mysqli_fetch_assoc($ejecutar);

$prefectoNombre = $_SESSION['prefectoNombre'];

if($data['intento'] === '1'){

    ?>
    <style>
        .modal-backdrop
        {
            background-color: rgba(0,0,0,0.6);
        }
    </style>
    <div id="respuestaIncedencia">

    </div>
    <div id="modalIncidente"  style="display: block;" class="modal modal-backdrop" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <h2 class="text-center">Incidente de asistencia</h2>
                    <p><strong>Prefecto</strong></p><p id="prefecto"><?php echo $_SESSION['prefectoNombre']?></p></p>
                    <p><strong>Aula :</strong><p id="aula"><?php echo ' '.$data['aula']?> </p></p>
                    <p><strong>Grupo :</strong><P id="grupo"><?php echo ' '.$data['grupo']?></P> </p>
                    <p><strong>Carrera :</strong><p id="carrera"><?php echo ' '.$data['carrera']?></p> </p>
                    <p><strong>Catedratico :</strong><p id="catedratico"><?php echo ' '.$data['catedratico']?> </p></p>
                    <p><strong>Optativa :</strong><p id="optativa"><?php echo ' '.$data['optativa']?> </p></p>
                    <p><strong>Horario :</strong><p id="horario"><?php echo ' '.$data['horario']?></p> </p>
                    <p style="display: none;"><?php echo $opc?></p>
                    <center>
                        <h2>Descripcion del Incidente</h2>
                    </center>
                    <textarea style="width: 100%" id="problema">
                    </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="cerrarIncidente()" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" onclick="guardarIncidente('<?php echo $id?>')" class="btn btn-primary">Levantar Incidente</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function guardarIncidente(id) {
            let prefecto = $('#prefecto').text();
            let aula = $('#aula').text();
            let grupo = $('#grupo').text();
            let carrera = $('#carrera').text();
            let catedratico = $('#catedratico').text();
            let horario = $('#horario').text();
            let problema = $('#problema').val();
            let optativa = $('#optativa').text();
            let parametro = {
                "id":id,
                "prefecto":prefecto,
                "aula":aula,
                "grupo":grupo,
                "carrera":carrera,
                "catedratico":catedratico,
                "horario": horario,
                "optativa":optativa,
                "problema":problema
            };
            $.ajax(
                {
                    type: 'POST',
                    data: parametro,
                    url: 'modelo/modeloLevantarIncidente.php',
                    success: function (resp) {
                        $('#respuestaIncedencia').html(resp);

                    }
                }
            ).responseText;
        }

        function cerrarIncidente() {
            $('#modalIncidente').css('display','none');
            try {
                $("#inputtt").on('keyup', function () {
                    let aBuscar = $("#inputtt").val();
                    let hora =$('#hora').text();
                    let parametro = {
                        "aBuscar": aBuscar,
                        "hora":hora
                    };
                    $.ajax({
                        type: "POST",
                        url: "busqueda.php",
                        data: parametro,
                        success: function (response) {
                            $("#resultado").html(response);
                        }
                    }).responseText;
                }).keyup();
            } catch (e) {
            }


        }


    </script>

    <?php

}else{

switch ($opc) {
    case 0:
        $query = "UPDATE asistencia set noFalto = 1, siFalto = 0, retardo = 0, minTarde='00:00:00', intento = 1, prefecto = '$prefectoNombre' WHERE id = '$id'";
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
        $query = "UPDATE asistencia set noFalto = 0, siFalto = 1, retardo = 0,  intento = 1 , minTarde='00:00:00', prefecto = '$prefectoNombre' WHERE id = '$id'";
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


        break;
}
    }
