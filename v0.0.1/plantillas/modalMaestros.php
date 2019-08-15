<?php
include_once '../../Server/Server.php';
$objServer = new Server();

    $id = $_POST['id'];

    $query = "SELECT *from maestros WHERE id = '$id'";
    $ejecutar = mysqli_query($objServer->connection(),$query);
    $data = mysqli_fetch_assoc($ejecutar);
    ?>
<style>
    .modal-backdrop
    {
        background-color: rgba(0,0,0,0.6);
    }
</style>
<div id="myModal_Profesores_Editar"  style="display: block; overflow-y: auto" class="modal modal-backdrop bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #17a673; color: #f7f7f7; justify-content: center!important;">
                <h4 class="modal-title" style="font-size: 16px; position: absolute;">EDITAR PROFESORES </h4>
                <button type="button" onclick="cerrarModalMaestros()" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="panel_guardar_edicion"></div>
                <div class="row">
                    <div class="col-md-12 col-lg-7">
                        <input type="hidden" id="id" value="<?php echo $id?>">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Clave</span>
                            </div>
                            <input id="claveMaestro" type="text" value="<?php echo $data['clave']?>" class="form-control" placeholder="Clave" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                            </div>
                            <input id="nombreMaestro" type="text" value="<?php echo $data['nombre']?>" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Apellido</span>
                            </div>
                            <input id="apellidoMaestro" type="text" value="<?php echo $data['apellido']?>" class="form-control" placeholder="Apellido" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Tel.Celular</span>
                            </div>
                            <input id="celularMaestro" type="text" value="<?php echo $data['telefonoCelular']?>" class="form-control" placeholder="Tel:Celular" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Tel.Casa</span>
                            </div>
                            <input id="casaMaestro" type="text" value="<?php echo $data['telefonoCasa']?>" class="form-control" placeholder="Tel:Casa" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Tel.Oficina</span>
                            </div>
                            <input id="oficinaMaestro" type="text" value="<?php echo $data['telefonoOficina']?>" class="form-control" placeholder="Tel:Oficina" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Titulo</label>
                            </div>

                            <select class="custom-select" id="tituloMaestro">
                                <?php
                                if($data['titulo'] === 'ING'){
                                    ?>
                                    <option value="ING">ING</option>
                                    <option value="LIC">LIC</option>
                                    <?php
                                }else{
                                    ?>
                                    <option value="LIC">LIC</option>
                                    <option value="ING">ING</option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Correo</span>
                            </div>
                            <input id="correoMaestro" type="text" value="<?php echo $data['correo']?>" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    <div class="col-5 imagen-modal">
                        <img src="assets/img/Reporte I.png" style="width: 330px; position: absolute; top: 40px; left: 0" alt="">
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" onclick="cerrarModalMaestros()" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="guardarEdicion();" class="btn btn-success" data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>


<script>
    function guardarEdicion(){
        let id =$("#id").val();
        let clave = $("#claveMaestro").val();
        let nombre = $("#nombreMaestro").val();
        let apellido = $("#apellidoMaestro").val();
        let telefonoCelular = $("#celularMaestro").val();
        let telefonoCasa = $("#casaMaestro").val();
        let telefonoOficina = $("#oficinaMaestro").val();
        let titulo = $("#tituloMaestro").val();
        let correo = $("#correoMaestro").val();

        let ob = {"id":id, "clave":clave, "nombre":nombre, "apellido":apellido, "telefonoCelular":telefonoCelular, "telefonoCasa":telefonoCasa,
        "telefonoOficina":telefonoOficina, "titulo":titulo, "correo":correo};

        $.ajax({
            type: "POST",
            url:"./modelo/modelo_guardar_edicion.php",
            data: ob,
            beforeSend: function(ob){

            },
            success: function(data)
            {

                $("#panel_guardar_edicion").html(data);
                $('#myModal_Profesores_Editar').css('display','none');
            }

        });
    }
</script>
