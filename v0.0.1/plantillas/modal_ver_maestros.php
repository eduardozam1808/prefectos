<?php
include_once '../../Server/Server.php';
$objServer = new Server();

?>

<style>
    .modal-backdrop
    {
        background-color: rgba(0,0,0,0.6);
    }
</style>
<div id="myModal_verProfesores"  style="display: block; overflow-y: auto" class="modal modal-backdrop bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #17a673; color: #f7f7f7; justify-content: center!important;">
                <h4 class="modal-title" style="font-size: 16px; position: absolute;">PROFESORES </h4>
                <button type="button" onclick="cerrarModalVer()" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="signupSection">
                    <div class="info">
                        <div class="imagen">
                            <img src="assets/img/logo-blanco.png" style="width: 130px; position: absolute; top: 40px;" alt="">
                        </div>
                        <h2>ALEJANDRO MONTES</h2>
                        <h5>55462</h5>

                    </div>

                    <form action="#" method="POST" class="signupForm" name="signupform">


                        <ul class="noBullet">
                            <li>
                                <h4>Lunes</h4>
                                <td><input class='option-input radio' type='radio'></td><h5 class="d-inline"> 09:00 </h5><h5 class="d-inline"> León, Juarez </h5><h5 class="d-inline"> 314 </h5><h5 class="d-inline"> ICO </h5><h5 class="d-inline"> POO </h5><br>
                                <td><input class='option-input radio' type='radio'></td><h5 class="d-inline"> 01:00 </h5><h5 class="d-inline"> León, Juarez </h5><h5 class="d-inline"> 314 </h5><h5 class="d-inline"> ICO </h5><h5 class="d-inline"> Programacion II </h5>
                            </li>
                            <li>
                                <h4>Martes</h4>
                                <h5 class="d-inline" style="color: #a94442"> No tiene clases el maestro </h5>
                            </li>
                            <li>
                                <h4>Miercoles</h4>
                                <td><input class='option-input radio' type='radio'></td><h5 class="d-inline"> 09:00 </h5><h5 class="d-inline"> León, Juarez </h5><h5 class="d-inline"> 314 </h5><h5 class="d-inline"> ICO </h5><h5 class="d-inline"> POO </h5><br>
                                <td><input class='option-input radio' type='radio'></td><h5 class="d-inline"> 01:00 </h5><h5 class="d-inline"> León, Juarez </h5><h5 class="d-inline"> 314 </h5><h5 class="d-inline"> ICO </h5><h5 class="d-inline"> Programacion II </h5>
                            </li>
                            <li>
                                <h4>Jueves</h4>
                                <h5 class="d-inline" style="color: #a94442"> No tiene clases el maestro </h5>
                            </li>
                            <li>
                                <h4>Viernes</h4>
                                <td><input class='option-input radio' type='radio'></td><h5 class="d-inline"> 09:00 </h5><h5 class="d-inline"> León, Juarez </h5><h5 class="d-inline"> 314 </h5><h5 class="d-inline"> ICO </h5><h5 class="d-inline"> POO </h5><br>
                                <td><input class='option-input radio' type='radio'></td><h5 class="d-inline"> 01:00 </h5><h5 class="d-inline"> León, Juarez </h5><h5 class="d-inline"> 314 </h5><h5 class="d-inline"> ICO </h5><h5 class="d-inline"> Programacion II </h5>
                            </li>

                            <li id="boton-cerrar">
                                <input onclick="cerrarModalVer()" type="button" id="join-btn" name="join" alt="Cerrar" value="Cerrar">
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


