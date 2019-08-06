<?php

include_once '../Server/Server.php';


$objServer = new Server();

?>
<!-- End: Navbar White -->
<div id="busqueda-maestros" class="container" style="display: none;">
    <h2 class="text-center" style="font-size: 37px;">Maestros&nbsp;</h2>
    <div class="divider"></div>
    <div class="input-group mb-4 ">
        <div class="input-group-prepend">
            <span class="input-group-text">Buscar&nbsp;</span>
        </div>
        <input class="form-control mr-3" type="text" id="inputtt">
        <button class="btn btn-outline-success" data-backdrop="static" data-toggle="modal" data-target="#myModal_Profesores">Registrar</button>
        <div class="input-group-append"></div>
    </div>

</div>

<div class="container table-responsive text-center"  id="tabla2" style="display: none;">
    <table class="table table-striped table-hover">
        <thead class="" style="background: #2d2e33; color: #ffffff;">
        <tr>
            <th><i class="fas fa-key"></i> Clave</th>
            <th><img src='assets/img/titulo.png' style='width: 20px;' alt=''> Titulo</th>
            <th><i class="fas fa-user"></i> Nombre</th>
            <th><i class="fas fa-user-alt"></i> Apellido</th>
            <th><img src='assets/img/celular.png' style='width: 20px;' alt=''><br>Celular</th>
            <th><img src='assets/img/telefono.png' style='width: 20px;' alt=''>Tel.Casa</th>
            <th><img src='assets/img/phone-office.png' style='width: 20px;' alt=''>Tel.Oficina</th>
            <th><i class="far fa-envelope"></i><br> Correo</th>
            <th><i class="fas fa-edit"></i> Modificar</th>
            <th><i class="fas fa-trash-alt"></i> Eliminar</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>pf123</td>
            <td>ICO</td>
            <td>Alejandro</td>
            <td>Montes</td>
            <td>4772314223</td>
            <td>3672342</td>
            <td>3125632</td>
            <td>alejandromontes@gmail.com</td>
            <td><div class="btn" style="cursor: pointer;"><i class="fas fa-edit"></i></div></td>
            <td><div class="btn" style="cursor: pointer;"><i class="fas fa-trash-alt"></i></div></td>

        </tr>

        </tbody>
    </table>

    <!--Modal Incidencias-->
    <div id="myModal_Profesores" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background: #17a673; color: #f7f7f7; justify-content: center!important;">
                    <h4 class="modal-title" style="font-size: 16px; position: absolute;">REGISTRO DE PROFESORES</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-7">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Clave</span>
                                </div>
                                <input id="clave" type="text" class="form-control" placeholder="Clave" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                                </div>
                                <input id="nombre" type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Apellido</span>
                                </div>
                                <input id="apellido" type="text" class="form-control" placeholder="Apellido" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Titulo</label>
                                </div>
                                <select class="custom-select" id="titulo">
                                    <option value="ING">ING</option>
                                    <option value="LIC">LIC</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Tel.Celular</span>
                                </div>
                                <input id="celular" type="text" class="form-control" placeholder="Tel:Celular" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Tel.Casa</span>
                                </div>
                                <input id="casa" type="text" class="form-control" placeholder="Tel:Casa" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Tel.Oficina</span>
                                </div>
                                <input id="oficina" type="text" class="form-control" placeholder="Tel:Oficina" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Correo</span>
                                </div>
                                <input id="correo" type="text" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-5">
                            <img src="assets/img/Reporte%20I.png" style="width: 330px; position: absolute; top: 40px; left: 0" alt="">
                        </div>
                    </div>
                    <div id="panel_maestros"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="guardarMaestro();" class="btn btn-success" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function guardarMaestro() {
        let clave  = $('#clave').val();
        let nombre = $('#nombre').val();
        let apellido = $('#apellido').val();
        let titulo  = $('#titulo').val();
        let telCelular = $('#celular').val();
        let telCasa = $('#casa').val();
        let telOficina  = $('#oficina').val();
        let correo = $('#correo').val();

        let parametro = {
            "clave":clave,
            "nombre":nombre,
            "apellido":apellido,
            "titulo":titulo,
            "telCelular":telCelular,
            "telCasa":telCasa,
            "telOficina":telOficina,
            "correo":correo
        };
        $.ajax(
            {
                type:"POST",
                url:"modelo/modelo_guardarMaestro.php",
                data:parametro,
                success: function (respuesta) {
                    $('#panel_maestros').html(respuesta);
                }
            }
        ).responseText;
    }


</script>

