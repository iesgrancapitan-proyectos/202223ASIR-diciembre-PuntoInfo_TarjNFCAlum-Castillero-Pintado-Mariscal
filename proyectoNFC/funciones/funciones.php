<?php 
	require_once "clases/alumnos.php";
	require_once "clases/usuarios.php";
	require_once "clases/tarjetas.php";

	//panel principal(body)
	function panelPrincipal(){
		echo "<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>";
			echo "<div class='d-flex justify-content-center'>";
				echo "<div id='divcentral2' class='text-center'>";
				echo "<h1 id='letra' class='mx-auto my-0 text-uppercase'>PORTAL</h1>";
				echo "</br></br></br></br>";
				//echo "<div>";
					echo "<a class='btn btn-primary' href='index.php?page=loginAdministracion'>Administración</a>";
					echo "<a class='btn btn-primary' href='index.php?page=pagConsulta'>Acceso Aseo</a>";
					echo "<a class='btn btn-primary' href='index.php?page=convivencia'>Convivencia</a>";
					echo "<a class='btn btn-primary' href='index.php?page=informacion'>Información</a>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	}

	function loginPrincipal(){
			
		echo "<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>";
			echo '<form method="POST" action=index.php?page=pagConsulta>';
				echo "<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>Inserte tarjeta</div>";
					echo "<div>";
						echo "<div><input type='text' name='usuario'></div>";
						echo "<div><input type='password' name='password'></div>";
					echo "</div>";
						echo "<div>";
							echo "<input type='submit' class='btn btn-primary' value='Acceder' name='acceder'>" . "\n";
							//echo "<a class='btn btn-primary' href=''>No tiene funcionalidad/atras</a>";
						echo "</div>";
					//echo "</div>";
					//No tiene funcionalidad
					//echo "<a class='btn btn-primary' href='index.php?page=..'>Información</a>";
				echo "</div>";
			echo "</form>";
		echo "</div>";
	}
	function comprobarUserLogin($usuario, $password){
		$comprobacion = Usuarios::instance();
		

		$comprobarUseAdmin= $comprobacion->comprobarUsuario($idUsuario);


	}

	/*function insert_tarjeta($idTarjeta, $activo){
		$insertTarg = tarjetas::singleton();
		$anadirtarjetas = $insertTarg->insert_User($idTarjeta, $activo);
	}*/
		function comprobarPerfil(){
			if (isset($_SESSION['perfil'])) {
				$_SESSION['perfil']='invitado';
				$_SESSION['ìdTarjeta']='';
				print_r($_SESSION['perfil']);
				//falta el select
			}else{
				//indicar que debe de logearse
				//print_r($_SESSION['perfil']);

			}
		}

	function show_tarjeta(){
	//echo "antes";
		//llamamos a la instancia Tarjetas
		$tarjs = Tarjetas::instance();
		//llamamos a la funcion 
		$tarj = $tarjs->show_tarjetas();
		print_r ($tarj);
		echo "despues";
		//return $tarj;
		foreach ($tarj as $key => $value){
			echo "despues2";
			echo $value;
		
		}
	}

	/*function doUsuarios(){
		$usuarios = Usuarios::instance();
		$users = $usuarios->listarUsers();
		//print_r($users);
		/*foreach  ($users as $key => $value){
			//echo $value['idUsuario']. "\n";

			foreach  ($value as $key2 => $value2){
				echo $value2. "\n";

			}
		}
		return $users;
	}*/
	
	function tablaUsuarios(){
		$usuarios = Usuarios::instance();
		$users = $usuarios->listarUsers();

		echo "<div class='container'>";
			echo "<div class='text-center'>LISTADO DE USUARIOS</div>";
				echo "<div class='row border border-dark ' >";
					echo "<div class='col-sm'>ID Usuario</div>";
					echo "<div class='col-sm'>Nombre</div>";
					echo "<div class='col-sm-3'>Email</div>";
					echo "<div class='col-sm'>Nie</div>";
					echo "<div class='col-sm'>Unidad</div>";
					echo "<div class='col-sm'>departamento</div>";
					echo "<div class='col-sm'>Perfil</div>";
					echo "<div class='col-sm'></div>";
				echo "</div>";
				Foreach  ($users as $key => $value){
					echo "<div class='row border-bottom border-dark'>";
				//echo $value['idUsuario']. "\n";
						echo "<div class='col-sm'>".$value['idUsuario']."</div>";
						echo "<div class='col-sm'>".$value['nombre']."</div>";
						echo "<div class='col-sm-3'>".$value['email']."</div>";
						echo "<div class='col-sm'>".$value['nie']."</div>";
						echo "<div class='col-sm'>".$value['unidad']."</div>";
						echo "<div class='col-sm'>".$value['departamento']."</div>";
						echo "<div class='col-sm'>".$value['idPerfil']."</div>";
						echo "<div class='col-sm'>";
						echo "<form method='post' action=''>";
							echo "<input type='submit' class='btn btn-primary' name='enviar' value=Modificar></div>";
							//echo "<input type='hidden' name='idBook' value=".$value['IdLibros']."> ";
						echo "</form>";
					echo "</div>";
				}
			echo "</div>";
		echo "</div>";
	}

	function formularioComprobarTarjeta(){
		echo "<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>";
			echo '<form method="POST" action=index.php?page=pagConsulta>';
			echo "<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>Inserte tarjeta</div>";
		echo "<div>";
			echo "<div><input type='text' name='idTarjeta'></div>";
				echo "</div>";
					echo "<div>";
						echo "<input type='submit' class='btn btn-primary' value='Acceder' name='acceder'>" . "\n";
						//echo "<a class='btn btn-primary' href=''>No tiene funcionalidad/atras</a>";
						echo "<a class='btn btn-primary' href='index.php?page=informacion'>Información</a>";

					echo "</div>";
				echo "</div>";
				//No tiene funcionalidad
				//echo "<a class='btn btn-primary' href='index.php?page=..'>Información</a>";
			echo "</form>";
		    //echo "<div>atras</div>";
		echo "</div>";
	}	
	function loginAdministracion(){
		echo "<div id=''>";
			//echo "<form method='post' action='.$_SERVER['PHP_SELF
			echo '<form method="POST" action=index.php?page=pagConsulta>';
				echo "<div id=''>";
					echo "<div id=''>Inserte tarjeta</div>";
					echo "<div><input type='text' name='idTarjetaAdmin'></div>";
				echo "</div>";
					echo "<div>";
					echo "<input type='submit' class='btn btn-primary' value='Acceder' name='accederAdmin'>" . "\n";
					echo "<a class='btn btn-primary' href=''>No tiene funcionalidad/atras</a></div>";
				echo "</div>";
				//No tiene funcionalidad
				//echo "<a class='btn btn-primary' href='index.php?page=..'>Información</a>";
			echo "</form>";
		    //echo "<div>atras</div>";
		echo "</div>";
	}
	


	function comprobarTarjeta($idTarjeta){
		//print_r($idTarjeta);
		//comprobarTarje($idTarjeta);
		$idUser ='';
		//por esta linea aparece el (new)
		$comprobacion = Tarjetas::instance();
		
		//llamamos a la funcion 
		$comprobacionTarjetas = $comprobacion->comprobarTarje($idTarjeta);
		//echo "despues2";
		
		//print_r ($comprobacionTarjetas);
		//echo "antes for";
		foreach ($comprobacionTarjetas as $clave => $value)  {
			//echo "despues3 ";
			//print_r($value);
			//echo $value['idUsuario'];
		//echo "despues for antes del segundo";
			foreach ($value as $key2 => $value2) {
				//echo "for 2";
				
				$idUser = $value2."</br>";
				//echo $key2." - ".$value2."<br/>";
				//echo $idUser;
			}
		}
		echo $idUser;
	
		$comprobarUser = $comprobacion->comprobarUserTarjeta($idUser);
		//$comprobarUser = $comprobacion->cpu();

		//echo "despues de la llamada a user";
		//print_r($comprobarUser);
		foreach ($comprobarUser as $clave3 => $value3)  {
			foreach ($value3 as $clave3 => $value4)  {
				//echo $value4;
				$_SESSION['perfil']=$value4;
				print_r($_SESSION['perfil']);
				redireccionUser($_SESSION['perfil']);
				//header("Location:index.php?page=indexAdmin");
			}
		}
	}
	function redireccionUser($perfilUser){
		switch ($perfilUser) {
			case '1':
				header("Location:index.php?page=indexAdmin");
				break;
			case '2':
				header("Location:index.php?page=indexProfesor");
				break;
			case '3':
				header("Location:index.php?page=indexAlumno");
				break;
			default:
				echo "esto va peor";
				break;
		}
	}

	//comprobar si la tarjeta esta activa
	function comprobarEstadoTarjeta($idTarjeta){
		if (isset($idTarjeta)) {
			//si esta activa  redirecciona correctamente
			header("Location:index.php?page=pagConsulta");
		}else{
			//si no esta activa redirecciona a la misma pagina indicandolo
			header("Location:index.php?page=pagConsulta");
		}
	}

	//MENU DE ADMINISTRADOR	
	function menuAdmin(){
		echo "<header id='medio' class='masthead'>";
			echo "<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>";
				echo "<div class='d-flex justify-content-center'>";
					echo "<div id='divcentral2' class='text-center'>";
						echo "<h1 id='letra' class='mx-auto my-0 text-uppercas'>Zona de Administración</h1>";
                   
						echo "<h2 id='letra2' class='mx-auto mt-2 mb-5 letradedia'>Elija una opción</h2>";
						echo "<h5 id='letra2' class='mx-auto mt-2 mb-5 letradedia'>El USUARIO te ha concedido permiso</h2>";
						echo "<a class='btn btn-primary' href='index.php?page=comienzoDeCurso'>ComienzoCurso</a>";
						echo "<a class='btn btn-primary' href='index.php?page=AltaTarjeta'>Alta Tarjeta</a>";
						echo "<a class='btn btn-primary' href='index.php?page=BajaTarjeta'>Baja Tarjeta</a>";
						echo "<a class='btn btn-primary' href='index.php?page=listadoUsurios'>Listado usuarios</a>";
						echo "<a class='btn btn-primary' href='index.php?page=seleccionTarjeta'>Seleccion tarjeta</a>";
						echo "<a class='btn btn-primary' href='index.php?page=cierraSesion<'>Cerrar la sesion</a>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</header>";
	}

	//MENU DEL PROFESOR
	function menuProfesor(){
		echo "<header id='medio' class='masthead'>";
			echo "<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>";
				echo "<div class='d-flex justify-content-center'>";
					echo "<div id='divcentral2' class='text-center'>";
						echo "<h1 id='letra' class='mx-auto my-0 text-uppercas'>Zona de Administración</h1>";
                   
						echo "<h2 id='letra2' class='mx-auto mt-2 mb-5 letradedia'>Elija una opción</h2>";
						echo "<h5 id='letra2' class='mx-auto mt-2 mb-5 letradedia'>El USUARIO te ha concedido permiso</h2>";

						echo "<a class='btn btn-primary' href='index.php?page=comienzoDeCurso'> ComienzoCurso</a>";
						echo "<a class='btn btn-primary' href='index.php?page=listadoUsurios'>Listado usuarios</a>";
						echo "<a class='btn btn-primary' href='index.php?page=listadoTarjetas'>Listado tarjetas</a>";
						echo "<a class='btn btn-primary' href='index.php?page=cierraSesion<'>Cerrar la sesion</a>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</header>";
	}
	//MENU DEL ALUMNO
	function menuAlumno(){
		echo "<header id='medio' class='masthead'>";
			echo "<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>";
				echo "<div class='d-flex justify-content-center'>";
					echo "<div id='divcentral2' class='text-center'>";
						echo "<h1 id='letra' class='mx-auto my-0 text-uppercas'>Zona de Administración</h1>";
                   
						echo "<h2 id='letra2' class='mx-auto mt-2 mb-5 letradedia'>Elija una opción</h2>";
						echo "<h5 id='letra2' class='mx-auto mt-2 mb-5 letradedia'>El USUARIO te ha concedido permiso</h2>";

						
						echo "<a class='btn btn-primary' href='index.php?page=listadoAlumno'>Consultar Puntos</a>";
						echo "<a class='btn btn-primary' href='index.php?page=listadoTarjetas'>Consultar estado tarjeta</a>";
						echo "<a class='btn btn-primary' href='index.php?page=cierraSesion<'>Cerrar la sesion</a>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</header>";
	}
	function seleccioTarejeta(){

		//show_tarjetas()
		
		
		$tarjetas = Tarjetas::instance();
		$usuarios = Usuarios::instance();
		
		//llamamos a la funcion 
		$mostrarTarjetas = $tarjetas->show_tarjetas_noAsociadas();
		$mostrarUsers = $usuarios->show_user();

		//print_r ($mostrarTarjetas);
		//print_r ($mostrarUsers);
		
		echo "<header id='medio' class='masthead'>";
			echo "<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>";
				echo "<div class='d-flex justify-content-center'>";
					echo "<div id='divcentral2' class='text-center'>";
						echo "<h1 id='letra' class='mx-auto my-0 text-uppercas'>Usuarios-Tarjetas</h1>";
                   
						echo "<h2 id='letra2' class='mx-auto mt-2 mb-5 letradedia'>Selecciona un usuario y una tarjeta</h2>";
						echo "<form method='POST' name='relacionUserTarjetasForm' action='index.php?page=seleccionTarjeta'>";
						echo "<div>";
						echo '<select name="usuario">';
							echo '<option name="usuarios">Elige una usuario</option>';
		    					foreach ($mostrarUsers as $key5 => $value5) {
									echo "<option name='nombre' value=".$value5['idUsuario'].">".$value5['nombre']." ".$value5['email']."</option>";
		    					}
		    				echo '</select>';
							echo "<input type='text'name='tarjeta' value='Pasa la tarjeta'>";
							/*echo '<select name="tarjeta" >';
		    					echo '<option name="tarjetas">Elige una tarjeta</option>';
		    						foreach ($mostrarTarjetas as $key3 => $value3) {
		    							foreach ($value3 as $key4=> $value4) {
										echo "<option name='tarjeta' value=".$value3['idTarjeta'].">".$value4."</option>";
		    							}
		    						}
		    				echo "</select>";*/
							echo "<input type=submit class='btn btn-primary' name='guardar' value='Guardar'>";
						echo "</div>";
						echo "<a class='btn btn-primary' href='index.php?page=indexAdmin<'>Volver</a>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</header>";
	}

	function importarCSV(){
		echo "<header id='medio' class='masthead'>";
			echo "<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>";
				echo "<div class='d-flex justify-content-center'>";
					echo "<div id='divcentral2' class='text-center'>";
						echo "<h1 id='letra' class='mx-auto my-0 text-uppercase'>Zona de Administración</h1>";
                   
						echo "<h2 id='letra2' class='mx-auto mt-2 mb-5 letradedia'>Elija una opción";
						echo "</h2>";
						echo "<form method='post' action='index.php?page=ComienzoDeCurso'>";
							echo "<input type=submit class='btn btn-primary' name='borrar' value='Borrar base de datos'>";
						echo "</form>";

						//echo "<a class='btn btn-primary' href='javascript:funcion()'>Importar datos alumnos</a>";
						echo "<a class='btn btn-primary' href='index.php?page=cargarProfesores'>Importar datos profesores</a>";
						echo "<a class='btn btn-primary' href='index.php?page=cargarAlumnos'>Importar datos alumnos</a>";
						//echo "<a class='btn btn-primary' href='index.php?page=indexAdmin'>Volver</a>";
						//esto hace que aparezca un boton atras segun el perfil en la pantalla de importar
						volverAtras($_SESSION['perfil']);
						$borrarDatos= Usuarios::instance();
						
						if (isset($_POST['borrar'])) {
							echo "hola";
							$borrarUsers = $borrarDatos->borradoBDUser();
							//borradoBDUser();
							//echo "hola2";
						//echo "<script>window.alert('la BBDD se ha borrado')</script>";
						}	
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</header>";
}
	function volverAtras($perfil){
	//print_r($_SESSION['perfil']);

		switch ($perfil) {
			case '1':
				echo "<a class='btn btn-primary' href='index.php?page=indexAdmin'>Volver</a>";
				break;
			case '2':
				echo "<a class='btn btn-primary' href='index.php?page=indexProfesor'>Volver</a>";
				break;
			case '3':
				echo "<a class='btn btn-primary' href='index.php?page=indexAlumno'>Volver</a>";
				break;
			default:
				echo "esto va peor";
				break;
		}

	}
	
	function menuImportar(){
		echo"<header id='medio' class='masthead'>";
			echo" <div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>";
				echo" <div class='d-flex justify-content-center'>";
					echo"<div id='divcentral2' class='text-center'>";
						echo"<form action='index.php?page=cargarProfesores' method='post' enctype='multipart/form-data' id='import_form'>";
							echo"<input type='file' name='file' />";
							echo"<input type='submit' class='btn btn-primary' name='enviar' value='Cargar datos'>";
						echo" </form>";
					echo"</div>";
				echo"</div>";
			echo"</div>";
		echo"</div>";
	}

function menuImportarAlumnos(){

    echo"<header id='medio' class='masthead'>";
       echo" <div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>";
           echo" <div class='d-flex justify-content-center'>";
                echo"<div id='divcentral2' class='text-center'>";
                    echo"<h1 id='letra' class='mx-auto my-0 text-uppercase'>Página de administración</h1>";
                    echo"<h2 id='letra2' class='mx-auto mt-2 mb-5 letradedia'>Adjunte CSV con los datos de los alumnos";
                    echo"</h2>";
                        echo"<form action='index.php?page=cargarAlumnos' method='post' enctype='multipart/form-data' id='import_form'>";
                            echo"<input type='file' name='file' />";
                            echo"<input type='submit' class='btn btn-primary' name='enviar' value='Cargar datos'>";
                       echo" </form><br><br>";
				echo"</div>";
			echo"</div>";
		echo"</div>";
}
function importarProfesor($archivo){
	//por esta linea aparece el (new)
		$anadir= Usuarios::instance();
		
		//llamamos a la funcion 
		//$anadirProfe = $anadir->insertarProfesor($dato1, $dato2);

      
    $filename=$_FILES["file"]["name"];
    $info = new SplFileInfo($filename);
    $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
  
	if($extension == 'csv'){
		$filename = $_FILES['file']['tmp_name'];
		$handle = fopen($filename, "r");
  
		while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE ){
			$anadirProfe = $anadir->insertarProfesor($data);
		}
		fclose($handle);
	}else {
       
	echo "<script>window.alert('Archivo no válido. El archivo debe ser csv.')</script>";
	}
}
	function importarAlumnos($archivo){
		echo "alumnos";
	//por esta linea aparece el (new)
		$anadir= Usuarios::instance();
		
		//llamamos a la funcion 
		//$anadirProfe = $anadir->insertarProfesor($dato1, $dato2);
		$filename=$_FILES["file"]["name"];
		$info = new SplFileInfo($filename);
		$extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
  
		if($extension == 'csv'){
			$filename = $_FILES['file']['tmp_name'];
			$handle = fopen($filename, "r");
  
			while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE ){
				$anadirAlumno = $anadir->insertarAlumnos($data);
			}
			fclose($handle);
		}else {
       
		echo "<script>window.alert('Archivo no válido. El archivo debe ser csv.')</script>";
		}
	}
	
	//Listado segun unidad
	function selectUnidad(){
	
		$unidad = Usuarios::instance();
		//llamamos a la funcion 
		//$mostrarUnidad = $unidad->listarUsers();
		$mostrarUnidad = $unidad->unidad();
		//$mostrarUnidad = $unidad->departamento();
		print_r ($mostrarUnidad);
		//usuarioUnidad();
		echo"<header id='medio' class='masthead'>";
			echo" <div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>";
				echo" <div class='d-flex justify-content-center'>";
					echo"<div id='divcentral2' class='text-center'>";
						echo "<form method='POST' name='relacionUserTarjetasForm' action='index.php?page=listadoUsurios'>";
						echo "<div>";
							echo "Elige la unidad del alumno";
						echo "<div>";
							
						echo "</div>";
						
						echo '<select name="unidad">';
							echo '<option name="unidad">Elige una Unidad</option>';
		    					foreach ($mostrarUnidad as $key=> $value) {
									foreach($value as $key2=> $value2){
										//echo $value2. " - ";
										echo "<option name='nombre' value=".$value2.">".$value2."</option>";
									}
		    					}
		    				echo '</select>';
							echo "<input type=submit class='btn btn-primary' name='mostrar' value='Mostrar'>";
						echo "</div>";
					echo"</div>";
				echo"</div>";
			echo"</div>";
		echo"</div>";
	}


?>