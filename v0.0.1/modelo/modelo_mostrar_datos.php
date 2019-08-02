<?php
require_once '../../Server/Server.php';
$objServer = new Server();
$id = $_POST['id'];
$query = "SELECT *from asistencia where id='$id'";
$ejecutarQuery = mysqli_query($objServer->connection(),$query);

while($datos = mysqli_fetch_assoc($ejecutarQuery)){
    ?>
    <div class="input-group mb-3 my-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Aula</span>
        </div>
        <input type="text" id="aula" class="form-control" placeholder="Aula" aria-label="Aula" aria-describedby="basic-addon1" value="<?php echo $datos['aula'];?>">
    </div>

    <div class="input-group mb-3 my-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Carrera</span>
        </div>
        <input type="text" id="carrera" class="form-control" placeholder="Carrera" aria-label="Carrera" aria-describedby="basic-addon1" value="<?php echo $datos['carrera'];?>">
    </div>

    <div class="input-group mb-3 my-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Catedratico</span>
        </div>
        <input type="text" id="catedratico" class="form-control" placeholder="Catedratico" aria-label="JFG" aria-describedby="basic-addon1" value="<?php echo $datos['catedratico'];?>">
    </div>
    <div class="input-group mb-3 my-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Horario</span>
        </div>
        <input type="text" id="hora" class="form-control" placeholder="Hora" aria-label="JFG" aria-describedby="basic-addon1" value="<?php echo $datos['horario'];?>">
    </div>
    <div class="input-group mb-3 my-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Jefe Grupo</span>
        </div>
        <input type="text" id="jefeG" class="form-control" placeholder="Jefe Grupo" aria-label="JFG" aria-describedby="basic-addon1" value="<?php echo $datos['jefeGrupo'];?>">
    </div>



    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> Descripcion Reporte</span>
        </div>
        <textarea id="reporte" class="form-control"  aria-label="With textarea"></textarea>
    </div>
    <?php

}
?>
