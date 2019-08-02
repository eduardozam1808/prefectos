<?php
date_default_timezone_set('America/Mexico_City');
 $date_time = date("h:i:s");
if($date_time === "01:46:20"){
    echo "<script>
$('#hora').text('07:00:00')
 try {
        $(\"#inputtt\").on('keyup', function () {
            let aBuscar = $(\"#inputtt\").val();
            let hora =$('#hora').text();
            let parametro = {
                \"aBuscar\": aBuscar,
                \"hora\":hora

            };
            $.ajax({
                type: \"POST\",
                url: \"busqueda.php\",
                data: parametro,
                success: function (response) {
                    $(\"#resultado\").html(response);
                }
            }).responseText;
        }).keyup();
    } catch (e) {
    }

;
</script>";
}else{

}
echo "<h1 id='horaActual'>".$date_time."<h1/>";
