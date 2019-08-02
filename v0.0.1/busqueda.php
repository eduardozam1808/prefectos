<?php
include_once '../Server/Server.php';
$objServer = new Server();
$hora = $_POST['hora'];
$buscar = $_POST['aBuscar'];
if ($buscar === '') {
    ?>
    <div class="table-responsive text-center" style="margin-top: 28px;">
        <table class="table table-striped table-hover">
            <thead class="" style="background: #2d2e33; color: #ffffff;">
            <tr>
                <th scope="col"><i class="fas fa-chalkboard-teacher"></i> Aula</th>
                <th><img src='assets/img/class.png' style='width: 20px;' alt=''>Grupo</th>
                <th><img src='assets/img/empleo.png' style='width: 20px;' alt=''>Carrera</th>
                <th><img src='assets/img/idioma.png' style='width: 20px;' alt=''>Optativa</th>
                <th scope="col"><i class="fas fa-user"></i> Catedratico</th>
                <th scope="col"><i class="fas fa-hourglass-start"></i> Horario</th>
                <th scope="col"><i class="fas fa-user-check"></i> No falto</th>
                <th scope="col"><i class="fas fa-user-times"></i> Si falto</th>
                <th scope="col"><i class="fas fa-user-minus"></i> Retardo</th>
                <th scope="col"><i class="fas fa-user-clock"></i> Min Tarde</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $query = "SELECT *from asistencia WHERE horario = '$hora'";
            if ($ejecutar = mysqli_query($objServer->connection(), $query)) {
                while ($datos = mysqli_fetch_assoc($ejecutar)) {
                    echo "<tr>";
                    echo "<td>" . $datos['aula'] . "</td>";
                    echo "<td>" . $datos['grupo'] . "</td>";
                    echo "<td>" . $datos['carrera'] . "</td>";
                    echo "<td>" . $datos['optativa'] . "</td>";
                    echo "<td>" . $datos['catedratico'] . "</td>";
                    echo "<td>" . $datos['horario'] . "</td>";
                    $checkName = 'asistencia' . $datos['id'];
                    switch ($datos['noFalto']) {
                        case 0:
                            echo " <td><input type='radio' onclick='seleccionar(" . $datos['id'] . ",0)' name='" . $checkName . "'></td>";
                            break;
                        case 1:
                            echo " <td><input type='radio'  onclick='seleccionar(" . $datos['id'] . ",0)' name='" . $checkName . "' checked></td>";
                            break;
                    }

                    switch ($datos['siFalto']) {
                        case 0:
                            echo " <td><input type='radio'  onclick='seleccionar(" . $datos['id'] . ",1)' name='" . $checkName . "'></td>";

                            break;
                        case 1:
                            echo " <td><input type='radio'  onclick='seleccionar(" . $datos['id'] . ",1)' name='" . $checkName . "' checked></td>";

                            break;
                    }

                    switch ($datos['retardo']) {
                        case 0:
                            echo " <td><input type='radio'  onclick='seleccionar(" . $datos['id'] . ",2)' name='" . $checkName . "'></td>";

                            break;
                        case 1:
                            echo " <td><input type='radio'  onclick='seleccionar(" . $datos['id'] . ",2)' name='" . $checkName . "' checked></td>";

                            break;
                    }


                    echo "<td>" . $datos['minTarde'] . "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><h1>No hay clases a esa hora</h1></tr>";
            }
            ?>


            </tbody>
        </table>


    </div>
    <?php
} else {

    ?>
    <div class="table-responsive text-center" style="margin-top: 28px;">
        <table class="table">
            <thead>
            <tr>
                <th>Aula</th>
                <th>Grupo</th>
                <th>Carrera</th>
                <th>Optativa</th>
                <th>Catedratico</th>
                <th>Horario</th>
                <th>No falto</th>
                <th>Si Falto</th>
                <th>Retardo</th>
                <th>Min Tarde</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $query = "SELECT *from asistencia WHERE  catedratico LIKE '%$buscar%' or aula like '%$buscar%' ";
            if ($ejecutar = mysqli_query($objServer->connection(), $query)) {
                while ($datos = mysqli_fetch_assoc($ejecutar)) {
                    echo "<tr>";
                    echo "<td>" . $datos['aula'] . "</td>";
                    echo "<td>" . $datos['grupo'] . "</td>";
                    echo "<td>" . $datos['carrera'] . "</td>";
                    echo "<td>" . $datos['optativa'] . "</td>";
                    echo "<td>" . $datos['catedratico'] . "</td>";
                    echo "<td>" . $datos['horario'] . "</td>";
                    $checkName = 'asistencia' . $datos['id'];
                    switch ($datos['noFalto']) {
                        case 0:
                            echo " <td><input type='radio' onclick='seleccionar(" . $datos['id'] . ",0)' name='" . $checkName . "'></td>";
                            break;
                        case 1:
                            echo " <td><input type='radio'  onclick='seleccionar(" . $datos['id'] . ",0)' name='" . $checkName . "' checked></td>";
                            break;
                    }

                    switch ($datos['siFalto']) {
                        case 0:
                            echo " <td><input type='radio'  onclick='seleccionar(" . $datos['id'] . ",1)' name='" . $checkName . "'></td>";

                            break;
                        case 1:
                            echo " <td><input type='radio'  onclick='seleccionar(" . $datos['id'] . ",1)' name='" . $checkName . "' checked></td>";

                            break;
                    }

                    switch ($datos['retardo']) {
                        case 0:
                            echo " <td><input type='radio'  onclick='seleccionar(" . $datos['id'] . ",2)' name='" . $checkName . "'></td>";
                            break;
                        case 1:
                            echo " <td><input type='radio'  onclick='seleccionar(" . $datos['id'] . ",2)' name='" . $checkName . "' checked></td>";

                            break;
                    }


                    echo "<td>" . $datos['minTarde'] . "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><h1>No hay clases a esa hora</h1></tr>";
            }
            ?>


            </tbody>
        </table>


    </div>
    <?php
}
