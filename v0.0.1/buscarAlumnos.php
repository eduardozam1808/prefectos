<?php
    $busqueda = $_POST['buscar'];

    if($busqueda === ''){
        echo 'esta vacio';
    }else{
        echo  $busqueda;
    }
