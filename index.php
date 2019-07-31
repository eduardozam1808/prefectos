<?php
include_once './Server/Server.php';
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


<div id="navBooton" style="height: 56px;background-color: #323232;color: rgb(244,244,244);"><i
            class="icon ion-ios-list-outline"
            style="margin-right: 235px;margin-left: 229px;margin-top: 19px;font-size: 31px;"></i><i
            class="icon ion-ios-paper-outline" style="font-size: 31px;"></i></div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/bs-charts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="assets/js/theme.js"></script>
<script src="assets/js/ajaxLib.js"></script>
<script>
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

            let parametro = {
                "aBuscar": aBuscar

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


</script>
</body>

</html>
