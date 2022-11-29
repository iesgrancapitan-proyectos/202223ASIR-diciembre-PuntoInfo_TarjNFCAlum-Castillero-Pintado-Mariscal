<?php
	$unidades = Usuarios::instance();
	$unidad = "";
	selectUnidad();
	if (isset($_POST['mostrar'])) {

		$unidad = $_REQUEST['unidad'];
		//echo $unidad;

		$listarUsers = $unidades->usuarioUnidad();
		print ($listarUsers);
	}
	//tablaUsuarios();
	$tabla_Usurios = $unidades->usuarioPorUndidad($unidad);
	//foreach($tabla_Usurios as $key => $value){
		//foreach($value as $key2 => $value2){
		//echo $value2." - ";
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
				Foreach  ($tabla_Usurios as $key => $value){
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
	//}
	//}

	//print_r($tabla_Usurios);

//tablaUsuarios();
?>