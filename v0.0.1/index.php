<?php

include_once '../Server/Server.php';
$objServer = new Server();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <style>
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.6);
        }
    </style>
</head>

<body>
<center>
    <div style="display: none;" id="tiempoRespuesta"></div>
    <h1 style="display: none;" id="hora">08:00:00</h1>
</center>
<!-- Start: Navbar White -->
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid"><img src="assets/img/logo-udl2.png" style="width: 144px;">
        <ul class="nav navbar-nav flex-nowrap ml-auto">
            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                                                                aria-expanded="false" href="#"><i
                            class="fas fa-search"></i></a>
                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
                     aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto navbar-search w-100">
                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                                        placeholder="Search for ...">
                            <div class="input-group-append">
                                <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                     aria-labelledby="alertsDropdown"></div>
            </li>
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown no-arrow" role="presentation">
            <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                                                      aria-expanded="false" href="#"><span
                            class="d-none d-lg-inline mr-2 text-gray-600 small">Eduardo Jesus Zamora</span><img
                            class="border rounded-circle img-profile" src="assets/img/avatars/avatar5.jpeg"></a>
                <div
                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a
                            class="dropdown-item" role="presentation" href="#"><i
                                class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a
                            class="dropdown-item" role="presentation" href="#"><i
                                class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                    <a
                            class="dropdown-item" role="presentation" href="#"><i
                                class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" role="presentation" href="#"><i
                                class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
            </li>
            </li>
        </ul>
    </div>
</nav>
<!-- End: Navbar White -->
<div class="container">
    <h1 class="text-center" style="font-size: 37px;">Asistencia&nbsp;</h1>
    <div class="input-group">
        <div class="input-group-prepend"><span class="input-group-text">Buscar&nbsp;</span></div>
        <input class="form-control" type="text" id="inputtt">
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
                <select class="form-control" id="select_grupo" onchange="select_grupo();">
                    <option value="">Grupos</option>
                    <?php
                    require_once '../Server/Server.php';
                    $query = "SELECT *from asistencia";
                    $ejecutarQuery = mysqli_query($objServer->connection(),$query);

                    while($datos = mysqli_fetch_assoc($ejecutarQuery)){
                        ?>
                        <option value="<?php echo  $datos['id']?>"><?php echo $datos['grupo'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <?php
                    ?>
                <?php
                ?>
                <div id="panel_incidencias"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="btn_guardarIncidencias();" class="btn btn-success" data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-6">

                <div class="middle">
                    <a class="btn" href="#">
                        <i class="fas fa-home"></i>
                    </a>

                    <div class="btn" href="#"  style="cursor: pointer" data-backdrop="static" data-toggle="modal" data-target="#myModal_Incidencias">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <a class="btn" href="#">
                        <i class="fas fa-user-check"></i>
                    </a>
                    <a class="btn" href="#">
                        <i class="fas fa-balance-scale"></i>
                    </a>

                </div>
            </div>
            <div class="col-6 sesion">
                <div class="middle2">
                    <a class="btn" href="#">
                        <i class="fas fa-times-circle fa-2x"></i>
                    </a>
                </div>

            </div>

        </div>
    </div>
</footer>



<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
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
        let grupo = $('#select_grupo').val();
        let aula = $('#aula').val();
        let carrera = $('#carrera').val();
        let catedratico = $('#catedratico').val();
        let horario = $('#hora').val();
        let jefeGrupo = $('#jefeG').val();
        let reporte = $('#reporte').val();

        let ob = {grupo:grupo, aula:aula, carrera:carrera, catedratico:catedratico, horario:horario, jefeGrupo:jefeGrupo, reporte:reporte};

        $.ajax({
            type: "POST",
            url:"modelo/modelo_guardarIncidencias.php",
            data: ob,
            beforeSend: function(objeto){

            },
            success: function(data)
            {

                $("#panel_incidencias").html(data);


            }

        });
    }


</script>
</body>

</html>
