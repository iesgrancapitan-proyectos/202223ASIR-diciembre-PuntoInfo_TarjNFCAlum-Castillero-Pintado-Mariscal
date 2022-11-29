<?php

$usuario='';
$tarjeta='';
//echo "hola";
seleccioTarejeta();

if (isset($_POST['guardar'])){
	// echo "holap";
	//echo $_REQUEST['usuario'];
	//echo $_REQUEST['tarjeta'];
	$usuario =  $_REQUEST['usuario'];
	//$tarjeta =  $_REQUEST['tarjeta'];
	$tarjeta =  $_POST['tarjeta'];
	$tarjetas = Tarjetas::instance();
	//echo "Al usuario ".$usuario. " Se le ha añadido la tarjeta ".$tarjeta;

	//print_r($tarjeta);
		if ($tarjeta=='') {
		//se comprueba que el campo no este vacio
			echo "introduzca una tarjeta";
		//COMPROBAR SI LA TARJETA YA ESTA AÑADIDA EN LA BBDD
		}else{
		$comprobarTarjeta= $tarjetas->comprobarSitarjetaExiste($tarjeta);
		//print_r($comprobarTarjeta);
			if ($comprobarTarjeta->num_rows==0) {
				$insertarTarje= $tarjetas->insertarTarjeta($tarjeta);
				echo " se introduce tarjeta";

			}else{
				echo "la tarjeta ya existe";
			}
			$comprobarTarjeta2= $tarjetas->comprobarTarje($tarjeta);

			if ($comprobarTarjeta2->num_rows==0) {
				$insertarUserTarje= $tarjetas->insertareUserTarje($usuario,$tarjeta);
			}else{
				echo "la tarjeta ya esta asociada ";

			}

	
		echo " <br/> ";
		echo " <br/> ";
		print_r($comprobarTarjeta2);
		
		}
	
}
	$usuario=null;
	$tarjeta=null;
	echo $usuario;
	echo $tarjeta;




?>