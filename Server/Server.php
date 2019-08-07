<?php


class Server
{
    //put your code here
    private $host = "167.71.84.220";
    private $user = "ednux1808";
    private $password = '87$uuue$$jdj1808jjdjdyunycabkk3773';
    private $database = "asistenciaprefectos";
    private $port = "3306";

    public function connection(){
        $conexion = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $conexion;
    }

}