<?php
    include_once '../Server/Server.php';
    $objServer = new Server();
    $buscar = $_POST['aBuscar'];
    if($buscar === ''){
        ?>
        <div id="tabla-asistencia" class="table-responsive text-center mt-4" >
            <table class="table table-striped table-hover">
                <thead class="" style="background: #2d2e33; color: #ffffff;">

                </thead>
                <tbody>
                <?php

                $query = "SELECT *from asistenciaReporte";
                if ($ejecutar = mysqli_query($objServer->connection(), $query)) {
                    while ($datos = mysqli_fetch_assoc($ejecutar)) {
                        echo "<tr>";
                        echo "<td>" . $datos['prefecto'] . "</td>";
                        echo "<td>" . $datos['aula'] . "</td>";
                        echo "<td>" . $datos['grupo'] . "</td>";
                        echo "<td>" . $datos['carrera'] . "</td>";
                        echo "<td>" . $datos['observacion'] . "</td>";
                        echo "<td><a style='cursor: pointer;' onclick='ver(".$datos['id'].")'>ver</a></td>";
                        echo "<td><a style='cursor: pointer;' onclick='eliminar(".$datos['id'].")'>eliminar</a></td>";
                        echo "</tr>";
                    }
                }
                ?>


                </tbody>
            </table>


        </div>





        <?php
    }else{
        echo  $buscar;
    }

