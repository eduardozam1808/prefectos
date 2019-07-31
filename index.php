<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>loginApp</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Login-screen.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="justify-content-md-center align-items-md-center" style="font-family: Comfortaa, cursive;font-size: 8px;background-color: rgb(247,247,247);">
<div id="respuesta" style="width: 100%; height: 100px;">

</div>
<!-- Start: Google Style Login -->
<div class="shadow login-card" style="background-color: rgb(255,255,255);"><img class="profile-img-card" src="assets/img/logo-udl.png" style="width: 246px;">
    <p class="profile-name-card"> </p>
    <form class="form-signin"><span class="reauth-email"> </span><input class="form-control correo" type="email" id="inputEmail" required="" autofocus="" placeholder="Correo electronico" style="font-size: 15px;"><input class="form-control contrasena" type="password" id="inputPassword" required=""
                                                                                                                                                                                                                    placeholder="Contraseña" style="font-size: 15px;">
        <div class="checkbox"></div>
    </form><button  class="btn btn-outline-success active btn-block text-center border rounded" type="button" onclick="validar()">Iniciar sesion</button></div>
<!-- End: Google Style Login -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

<script src="v0.0.1/assets/js/ajaxLib.js"></script>
  <script>
    function validar() {
        let correo = $('.correo').val();
        let contrasena = $('.contrasena').val();
        let parametro = {"correo":correo,"contrasena":contrasena};
        $.ajax(
            {
                type:'POST',
                url:'model/validacion.php',
                data:parametro,
                success:function (result) {
                    $('#respuesta').html(result);
                }
            }
        ).responseText;
    }
</script>

</html>