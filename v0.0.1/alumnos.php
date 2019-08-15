<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Alumnos</h1>
    </center>
    <br>
<input id="buscador" type="text" value="">
<div id="resultadoBusqueda">

</div>
</body>
<script src="assets/js/ajaxLib.js"></script>
<script>
    try{
        $("#buscador").on('keyup', function () {
            let letraBuscar = $('#buscador').val();
            let parametro = {"buscar":letraBuscar};
            $.ajax(
                {
                    type:'POST',
                    data:parametro,
                    url:'buscarAlumnos.php',
                    success: function (extracion) {
                        $('#resultadoBusqueda').html(extracion);
                    }
                }
            )
            });
    }catch (e) {

    }
</script>
</html>