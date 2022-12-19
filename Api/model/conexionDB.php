<?php
//para conectar una BBDD
class conexiondb
{
    public function initConex()
    {
        $servername = "172.30.0.2";
        $username = "root";
        $password = "test";
        $bd = "grancapitan";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $bd);
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Conexión falla " . $conn->connect_error);
        }
        return $conn;
    }
}
