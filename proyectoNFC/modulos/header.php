<?php
	session_start();
	include 'funciones/funciones.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <!-- header('Content-Type: text/html; charset=ISO-8859-1');-->

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="style_menuadmin.css">
		<link rel="stylesheet" type="text/css" href="/style/style.css" media="screen" />
		<title>Consulta Servicio</title>
		<link rel="shortcut icon" href="IMG/favicon2.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@600&display=swap" rel="stylesheet"></head>

	   

		 <!-- Option 1: Bootstrap Bundle with Popper -->
			   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>

		
			<script src="javascript/indextablas.js"></script>
				<div class="container-btn-mode">
					<div id="id-sun" class="btn-mode sun active">
						<i class="fas fa-sun"></i>
					</div>
					<div id="id-moon" class="btn-mode moon">
						<i class="fas fa-moon"></i>
					</div>
				</div>
		 <nav class="navbar navbar-expand-lg navbar-light " id="mainNav">
		<!-- <div aling='center'>
		   <img id="logo" src="imagenes/GClogo.jpg" alt="IES GRAN CAPITÁN" alt="" height='150' ; />GRAN CAPITAN
		</div>-->
	</nav>
	</head>

	<!--<?php 
		echo "<form method='post' action=".$_SERVER['PHP_SELF'].">";
			echo "<input type='submit' name='enviar' value='Enviar '>";
		echo "</form>";
		if (isset($_POST['enviar'])) {
			
			show_tarjeta();
		}
	?>-->

	<body>
	