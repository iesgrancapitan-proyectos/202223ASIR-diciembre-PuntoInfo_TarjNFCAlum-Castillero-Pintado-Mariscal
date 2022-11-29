<?php
	
//para conectar una BBDD
class conexiondb{
	public function __construct() {
    
    }
    public function initConex(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $bd= "grancapitan";
        // Create connection
        $conn = new mysqli($servername, $username, $password,$bd);
        $conn->set_charset("utf8");
        // Check connection
            if ($conn->connect_error) {
                die("Conexión falla " . $conn->connect_error);
            }
            return $conn;

    }
  
}
 
		
			

?>

