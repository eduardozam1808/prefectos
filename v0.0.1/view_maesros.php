
<!-- End: Navbar White -->
<div id="busqueda-maestros" class="container" style="display: none;">
    <h2 class="text-center" style="font-size: 37px;">Maestros&nbsp;</h2>
    <div class="divider"></div>
    <div class="input-group " style="margin-bottom: 22px;">
        <div class="input-group-prepend">
            <span class="input-group-text">Buscar&nbsp;</span>
        </div>
        <input class="form-control mr-3" type="text" id="busqueda">
        <button class="boton btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#myModal_Profesores">Registrar</button>
        <div class="input-group-append"></div>
    </div>

</div>

<div class="container table-responsive text-center"  id="tabla2" style="display: none;">
    <div id="tabla">
    </div>
    <!--Modal Profesores-->
    <div id="myModal_Profesores" class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background: #17a673; color: #f7f7f7; justify-content: center!important;">
                    <h4 class="modal-title" style="font-size: 16px; position: absolute;">REGISTRO DE PROFESORES</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-7">
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
                                    <label class="input-group-text" for="inputGroupSelect01">Titulo</label>
                                </div>
                                <select class="custom-select" id="titulo">
                                    <option value="ING">ING</option>
                                    <option value="LIC">LIC</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Correo</span>
                                </div>
                                <input id="correo" type="text" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-5 imagen-modal">
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

<div id="respuestaModal">

</div>






<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/bs-charts.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/lib"></script>-->
<script src="assets/js/ajaxLib.js"></script>

<script>


    try {
        $("#busqueda").on('keyup', function () {
            let aBuscar = $("#busqueda").val();
            let parametro = {
                "aBuscar": aBuscar
            };
            $.ajax({
                type: "POST",
                url: "busquedaMaestro.php",
                data: parametro,
                success: function (response) {
                    $("#tabla").html(response);
                }
            }).responseText;
        }).keyup();
    } catch (e) {
    }


    function guardarMaestro() {
        let id = $('#id').val();
        let clave  = $('#clave').val();
        let nombre = $('#nombre').val();
        let apellido = $('#apellido').val();
        let telefonoCelular = $('#celular').val();
        let telefonoCasa = $('#casa').val();
        let telefonoOficina  = $('#oficina').val();
        let titulo  = $('#titulo').val();
        let correo = $('#correo').val();

        let parametro = {
            "id":id,
            "clave":clave,
            "nombre":nombre,
            "apellido":apellido,
            "telefonoCelular":telefonoCelular,
            "telefonoCasa":telefonoCasa,
            "telefonoOficina":telefonoOficina,
            "titulo":titulo,
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

    function  modificar(id) {

       //Activar el modal

        let patametro = {"id":id};
        $.ajax(
            {
                type: 'POST',
                data : patametro,
                url: './plantillas/modalMaestros.php',
                success: function (respuesta) {
                    $('#respuestaModal').html(respuesta);
                }
            }
        ).responseText;
    }

    function cerrarModalMaestros() {
        $('#myModal_Profesores_Editar').css('display','none');
    }
    
    function eliminarMaestro(id) {
        let ob = {'id':id};
        swal({
                title: "Esta seguro de cancelar",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Aceptar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
            if (isConfirm) {
                swal("Modificado", "Modificacion Correcta", "success");
                $.ajax({
                        type:'POST',
                        data:ob,
                        url:'modelo/modelo_eliminar_maestro.php',
                        success:function (respuesta) {
                            $('#respuestaModal').html(respuesta);
                        }
                }
                )
            } else {
                    swal("Cancelar", "Cancelacion correcta", "error");
                }
        });
    }
</script>


