<?php

include_once '../Server/Server.php';


$objServer = new Server();
?>

<?php require 'header.php' ?>

<!-- End: Navbar White -->
<div id="busqueda-asistencia" class="container">
    <h1 class="text-center" style="font-size: 37px;">Asistencia&nbsp;</h1>
    <div class="divider"></div>
    <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text">Buscar&nbsp;</span></div>
        <input class="form-control mr-2" type="text" id="inputtt">
        <button class="btn btn-outline-danger" data-backdrop="static" data-toggle="modal" data-target="#myModal_Incidencias">Levantar Reporte</button>
        <div class="input-group-append"></div>
    </div>

    <div id="resultado">

    </div>
    <div id="resultadoEvento">

    </div>

</div>
<h1 style="display: none" id="idd"></h1>
<div style='display: none' id='modalTiempo' class="modal modal-backdrop" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Retardo</h5>
                <button type="button" onclick="CerrarModal()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tiempo de retardo en minutos</p>
                <input type="time" id="tiempoRetardo">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="CerrarModal()" class="btn btn-secondary" data-dismiss="modal">Cancelar
                </button>
                <button type="button" onclick="guardarTiempoRetardo()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal Incidencias-->
<div id="myModal_Incidencias" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: #17a673; color: #f7f7f7; justify-content: center!important;">
                <h4 class="modal-title" style="font-size: 16px; position: absolute;">REPORTE DE INCIDENCIAS</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <select id="select_grupo" class="form-control" onchange="select_grupo();">
                    <option value="">Grupos</option>
                    <?php
                    require_once '../Server/Server.php';
                    $query = "SELECT * from asistencia";
                    $ejecutarQuery = mysqli_query($objServer->connection(),$query);

                    while($datos = mysqli_fetch_array($ejecutarQuery)){
                        $id = $datos['id'];
                        $grupo = $datos['grupo'];
                        ?>
                        <option  value="<?php echo  $id?>"><?php echo $grupo?></option>
                        <?php
                    }
                    ?>
                </select>

                <div id="panel_incidencias"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="btn_guardarIncidencias();" class="btn btn-success" data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!--<button onclick="enviar()" class="btn btn-dark">Enviar</button>-->


<?php require 'view_maesros.php' ?>
<?php
    include_once 'plantillas/footer.php';
?>

<!--<script>
    function enviar() {
        swal("Good job!", "You clicked the button!", "success")
    }

</script>-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/bs-charts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="assets/js/theme.js"></script>
<script src="assets/js/ajaxLib.js"></script>
<script>





    function tiempo() {

        $.ajax(
            {
                type: 'POST',
                url: './tiempo/tiempo.php',
                success:function (respuesta) {
                    $('#tiempoRespuesta').html(respuesta);
                }
            }
        ).responseText;
    }

    setInterval('tiempo()',1000);

    function guardarTiempoRetardo() {
        let tiempo = $('#tiempoRetardo').val();
        let id = $('#idd').text();
        let parametro = {"tiempo": tiempo, "id": id}
        $.ajax(
            {
                type: 'POST',
                url: 'retardo.php',
                data: parametro,
                success: function (response) {
                    $("#resultado").html(response);
                }
            }
        ).responseText;
    }

    function CerrarModal() {
        $('#modalTiempo').css('display', 'none');
    }

    function seleccionar(id, opc) {
        $('#idd').text(id);
        let parametro = {"id": id, "opc": opc};
        $.ajax({
            type: "POST",
            url: "evento.php",
            data: parametro,
            success: function (response) {
                $("#resultado").html(response);
            }
        }).responseText;
    }

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


    function select_grupo() {
        let id = $("#select_grupo").val();
        //alert(" Hola "+ id);
        let param = {id:id};
        $.ajax({
            type: "POST",
            url:"modelo/modelo_mostrar_datos.php",
            data: param,
            beforeSend: function(objeto){
            },
            success: function(data)
            {

                $("#panel_incidencias").html(data);
            }
        });
    }
    
    function btn_guardarIncidencias() {
        let id = $("#id").val();
        let grupo = $('#select_grupo').val();
        let aula = $('#aula').val();
        let carrera = $('#carrera').val();
        let catedratico = $('#catedratico').val();
        let horario = $('#hora').val();
        let jefeGrupo = $('#jefeG').val();
        let reporte = $('#reporte').val();

        let ob = {id:id, grupo:grupo, aula:aula, carrera:carrera, catedratico:catedratico, horario:horario, jefeGrupo:jefeGrupo, reporte:reporte};

        $.ajax({
            type: "POST",
            url:"modelo/modelo_guardarIncidencias.php",
            data: ob,
            beforeSend: function(ob){

            },
            success: function(data)
            {

                $("#panel_incidencias").html(data);

            }

        });
    }
    
    function tablaMaestros() {
        document.getElementById('tabla-asistencia').style.display = 'none';
        document.getElementById('busqueda-asistencia').style.display = 'none';
        document.getElementById('tabla2').style.display = 'block';
        document.getElementById('busqueda-maestros').style.display = 'block';

    }
    
    function tablaAsistencia() {
        document.getElementById('tabla-asistencia').style.display = 'block';
        document.getElementById('busqueda-asistencia').style.display = 'block';
        document.getElementById('tabla2').style.display = 'none';
        document.getElementById('busqueda-maestros').style.display = 'none';
    }
    
    function btn_editarMaestro() {
        let ob = {"id": id};

        $.ajax({
            type: "POST",
            url:"view/vista_editar_maestro.php",
            data: ob,
            beforeSend: function(objeto){

            },
            success: function(data)
            {

                $("#panel_edicion").html(data);

            }
        });
    }


</script>
</body>

</html>

