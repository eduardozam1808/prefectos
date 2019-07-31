<?php


class Server
{
    //put your code here
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "asistenciaprefectos";
    // private $port = "";

    public function connection(){
        $conexion = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $conexion;
    }

}