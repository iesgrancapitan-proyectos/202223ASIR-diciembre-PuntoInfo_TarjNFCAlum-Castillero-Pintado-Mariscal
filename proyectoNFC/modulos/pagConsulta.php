<?php
//show_tarjeta();
formularioComprobarTarjeta();
// menuProfesor();
	if (!isset($_POST['acceder']) ||!isset($_POST['idTarjeta'])) {
		
		echo "la tarjeta no es esta registrada o el campo esta vacio";
		
	}else {
		//show_tarjeta();
		//echo "!";
		$idTarjeta = $_POST['idTarjeta'];
		//$_SESSION['ìdTarjeta']=$idTarjeta;
			
			//aqui se llama a comprobar tarjeta en FUNCIONES.PHP
			comprobarTarjeta($idTarjeta);
			//echo "!!!";
			//show_tarjeta();
			
       // echo $idTarjeta;
	}


?>