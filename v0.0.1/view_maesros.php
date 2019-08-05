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
    <div id="myModal_Profesores" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background: #17a673; color: #f7f7f7; justify-content: center!important;">
                    <h4 class="modal-title" style="font-size: 16px; position: absolute;">REGISTRO DE PROFESORES</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <label>Clave:</label>
                    <input type="text" id="clave"><br>
                    <label>Titulo</label>
                    <select id="titulo">
                        <option value="LIC">LIC</option>
                        <option value="ING">ING</option>
                    </select><br>
                    <label>Nombre</label>
                    <input type="text" id="nombre"><br>
                    <label>Apellido</label>
                    <input type="text" id="apellido"><br>
                    <label>Tel.Celular</label>
                    <input type="tel" id="celular"><br>
                    <label>Tel.Casa</label>
                    <input type="tel" id="casa"><br>
                    <label>Tel.Oficina</label>
                    <input type="tel" id="oficina"><br>
                    <label>Correo</label>
                    <input type="email" id="correo">
                    <div id="panel_incidencias"></div>
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
                    $('#panel_incidencias').html(respuesta);
                }
            }
        ).responseText;
    }


</script>

