<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Director</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Login-screen.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php require 'header.php' ?>
    <div id="busqueda-asistencia" class="container">
        <h1 class="text-center" style="font-size: 37px;">Reportes&nbsp;</h1>
        <div class="divider"></div>
        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Buscar&nbsp;</span></div>
            <input class="form-control mr-2" type="text" id="inputtt">
            <div class="input-group-append"></div>
        </div>

        <div id="resultado">

        </div>

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
        $("#inputtt").on('keyup', function () {
            let aBuscar = $("#inputtt").val();
            let parametro = {
                "aBuscar": aBuscar
            };
            $.ajax({
                type: "POST",
                url: "buscarReportes.php",
                data: parametro,
                success: function (response) {
                    $("#resultado").html(response);
                }
            }).responseText;
        }).keyup();
    } catch (e) {
    }
</script>
</body>
</html>
