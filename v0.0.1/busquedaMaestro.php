<?php
    include_once '../Server/Server.php';
    $objServer = new Server();
    $buscar = $_POST['aBuscar'];



    if($buscar === ''){
        ?>
        <div class="table-responsive text-center table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-dark table-hover">
                <thead class="" style="background: #2d2e33; color: #ffffff;">
                <tr>
                    <th><i class="fas fa-key"></i><br> Clave</th>
                    <th><i class="fas fa-user"></i><br> Nombre</th>
                    <th><i class="fas fa-user-alt"></i> <br> Apellido</th>
                    <th><i class="fas fa-eye-slash"></i><br> Ver </th>
                    <!--<th><i class="fas fa-trash-alt"></i><br> Eliminar</th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT *from maestros ";
                $ejecutarQuery = mysqli_query($objServer->connection(),$query);
                while ($datos = mysqli_fetch_assoc($ejecutarQuery)) {
                    echo "<tr>";
                    echo "<td>" . $datos['clave'] . "</td>";
                    echo "<td>" . $datos['nombre'] . "</td>";
                    echo "<td>" . $datos['apellido'] . "</td>";
                    //echo "<td><div onclick='modificar(".$datos['id'].")' style=\"cursor: pointer;\"><i class=\"fas fa-eye-slash\"></i></div></td>";
                    //echo "<td><div style=\"color: #f7f7f7;\" onclick='eliminarMaestro(".$datos['id'].")' class=\"btn\" style=\"cursor: pointer;\"><i class=\"fas fa-trash-alt\"></i></div></td>";
                    echo "<td><div onclick='verMaestro()' style=\"cursor: pointer;\"><i class=\"fas fa-eye-slash\"></i></div></td>";

                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>

        </div>


        <?php
    }else{
        $query = "SELECT *from maestros WHERE clave LIKE '%$buscar%' or nombre LIKE '%$buscar%' or apellido LIKE '%$buscar%' or correo LIKE '%$buscar%' ";
        $ejecutarQuery  =mysqli_query($objServer->connection(),$query);
        ?>
        <div class="table-responsive text-center table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-dark table-hover">
            <thead class="" style="background: #2d2e33; color: #ffffff;">
            <tr>
                <th><i class="fas fa-key"></i><br> Clave</th>
                <th><i class="fas fa-user"></i><br> Nombre</th>
                <th><i class="fas fa-user-alt"></i> <br> Apellido</th>
                <th><i class="fas fa-eye-slash"></i><br> Ver </th>
                <!--<th><i class="fas fa-trash-alt"></i><br> Eliminar</th>-->
            </tr>
            </thead>
            <tbody>
        <?php
        while ($datos = mysqli_fetch_assoc($ejecutarQuery)){
            echo "<tr>";
            echo "<td>" . $datos['clave'] . "</td>";
            echo "<td>" . $datos['nombre'] . "</td>";
            echo "<td>" . $datos['apellido'] . "</td>";
            //echo "<td><div style=\"color: #f7f7f7; cursor: pointer;\" onclick=\"modificar()\" class=\"btn\" data-backdrop=\"static\" data-toggle=\"modal\" data-target=\"#myModal_Profesores_Editar\" style=\"cursor: pointer;\"><i class=\"fas fa-eye-slash\"></i></div></td>";
            //echo "<td><div style=\"color: #f7f7f7;\" class=\"btn\" style=\"cursor: pointer;\"><i class=\"fas fa-trash-alt\"></i></div></td>";
            echo "<td><div onclick='verMaestro()' style=\"cursor: pointer;\"><i class=\"fas fa-eye-slash\"></i></div></td>";
            echo "</tr>";
        }
        echo "
           </tbody>
        </table>
    </div>
        ";

    }
