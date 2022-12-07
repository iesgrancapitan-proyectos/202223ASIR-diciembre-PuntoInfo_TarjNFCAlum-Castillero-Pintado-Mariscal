<?php

class Usuario
{

	private $conection;

	/* Set conection */
	public function getConection()
	{
		$dbObj = new conexiondb();
		$this->conection = $dbObj->initConex();
	}

	/* Save note */
	public function isAdmin(int $idUsuario): bool
	{
		$this->getConection();

		$query = $this->conection->query("SELECT * FROM administracion WHERE idUsuario=" . $idUsuario.";");

		return $query->num_rows === 1;
	}

	public function getFilterUser($type, $value)
	{
		$this->getConection();

		$query = $this->conection->query("SELECT * FROM usuarios WHERE " . $type . " = '" . $value . "';");
		$array = $query->fetch_all();

		return $array;
	}

	public function getDepartamentos()
	{
		$this->getConection();

		$query = $this->conection->query("SELECT DISTINCT departamento FROM usuarios WHERE departamento is NOT NULL;");
		$array = $query->fetch_all();

		return $array;
	}

	public function getUnidades()
	{
		$this->getConection();

		$query = $this->conection->query("SELECT DISTINCT unidad FROM usuarios WHERE unidad is NOT NULL;");
		$array = $query->fetch_all();

		return $array;
	}

	public function delete($users)
	{
		$this->getConection();

		foreach ($users as $user) {
			if ($user > 1) {
				$this->conection->query("DELETE FROM usuarios_tarjetas WHERE idUsuario=$user;");
			}
		}
	}

	public function insertUsuariosAlumnos($dato)
	{
		$this->getConection();

		$query = $this->conection->query("INSERT INTO `usuarios`(`nombre`,`nie`,`unidad`,`idPerfil`)
													VALUES ('$dato[0]','$dato[1]','$dato[2]','3');");
		if($query)
		{
			return "se han introducido los datos;";
		}
		else
		{
			return "Error";
		
		}
	}

	function insertUsuariosProfesores($dato){
        $this->getConection();
        $query = $this->conection->query("INSERT INTO `usuarios`(`nombre`, `email`, `departamento`, `idPerfil`) VALUES ('','$dato[0]','$dato[1]','2');");
		if($query)
		{
			return "se han introducido los datos;";
		}
		else
		{
			return "Error";
		
		}
    }

	function borradoInicioCurso(){
		$this->getConection();

		$query = $this->conection->query("DELETE FROM `usuarios_tarjetas` WHERE `idUsuario`!='1';");
		$query = $this->conection->query("ALTER TABLE `usuarios` AUTO_INCREMENT 1;");
		$query = $this->conection->query("DELETE FROM `usuarios` WHERE `idPerfil`!='1';"); 
		$query = $this->conection->query("ALTER TABLE `usuarios_tarjetas` AUTO_INCREMENT 1;");
	}

}