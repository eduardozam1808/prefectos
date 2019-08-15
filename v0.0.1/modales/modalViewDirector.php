<?php
    include_once '../../Server/Server.php';
    $objSever = new Server();

    $id = $_POST['id'];
    $query = "SELECT *from asistenciaReporte WHERE id = '$id'";
    $ejecutarQuery = mysqli_query($objSever->connection(),$query);
    $datas = mysqli_fetch_assoc($ejecutarQuery);
    ?>
<style>
    .modal-backdrop
    {
        background-color: rgba(0,0,0,0.6);
    }
</style>
<div id="modalAsistecia" style="display: block;" class="modal modal-backdrop" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h3 class="text-center font-weight-light">Inccidente de asistencia</h3>
                <br>
                <a>Prefecto <strong><?php echo $datas['prefecto']?></strong> a quien corresponda le hago saber por este medio que paso un incidente con el evento  de asistencia y retardos. el catedratico afectado es <strong><?php echo $datas['catedratico']?></strong>
                el cual su horario en la aula <strong><?php echo $datas['aula']?> </strong> es a las <strong><?php echo $datas['horario']?></strong></a>
            </div>
            <div class="modal-footer">
                <button type="button" onclick=" cerrar() " class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" onclick="autorizarCambio('<?php echo $datas["idAfectado"]?>');" class="btn btn-primary">Autorizar Cambios</button>
            </div>
        </div>
    </div>
</div>

