<?php

	menuImportarAlumnos();
	//echo "<script>window.alert('la BBDD se ha borrado')</script>";
	//header("Location:index.php?page=comienzoDeCurso");
	$anadir= Usuarios::instance();

if (isset($_POST['enviar'])){
	 echo "holap";
	 importarAlumnos($_FILES['file']);
	 print_r($_FILES['file']);
	
}
  
        
?>