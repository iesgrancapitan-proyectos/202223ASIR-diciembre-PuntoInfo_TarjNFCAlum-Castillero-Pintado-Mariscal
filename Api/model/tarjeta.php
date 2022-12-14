<?php

class Tarjeta
{

	private $conection;

	/* Set conection */
	public function getConection(): void
	{
		$dbObj = new conexiondb();
		$this->conection = $dbObj->initConex();
		$db2Obj = new conexiondb();
		$this->conection2 = $db2Obj->pruebaConex();
	}

	/* Get user */
	public function login($param)
	{
		$this->getConection();
		$idTarjeta = isset($param["idTarjeta"]) ? $param["idTarjeta"] : $_SESSION['idTarjeta'];

		$query = $this->conection->query("SELECT idUsuario FROM usuarios_tarjetas WHERE idTarjeta=" . $idTarjeta);
		if ($query->num_rows === 0) throw new Exception("No se ha encontrado esta tarjeta");

		$_SESSION['idTarjeta'] = $idTarjeta;

		$array = $query->fetch_assoc();

		if (count($array) > 0) {
			$query = $this->conection->query("SELECT idUsuario, email, nie, idPerfil FROM usuarios WHERE idUsuario=" . $array["idUsuario"]);
			if ($query->num_rows === 0) throw new Exception("No se ha podido recuperar los datos del usuario asociado a la tarjeta");
			$user = $query->fetch_assoc();
			$_SESSION['user'] = $user;
		}

		return $user;
	}

	public function getTarjetaUsuario($type, $value)
	{
		$this->getConection();

		$query = $this->conection->query(
			"SELECT usuarios.idUsuario, usuarios.email, usuarios.nie, tarjetas.idTarjeta, usuarios.idPerfil
			FROM usuarios
			LEFT JOIN usuarios_tarjetas ON usuarios_tarjetas.idUsuario = usuarios.idUsuario
			LEFT JOIN tarjetas ON tarjetas.idTarjeta = usuarios_tarjetas.idTarjeta
			WHERE " . $type . " = '" . $value . "';"
		);
		$array = $query->fetch_all();

		return $array;
	}

	public function setUserTarjeta($idUsuario, $idTarjeta){
		$this->getConection();

		$estadoTarjeta = $this->comprobarEstadoTarjeta($idTarjeta);
		if (null == $estadoTarjeta) {
			$this->conection->query("INSERT INTO tarjetas(idTarjeta, activo) VALUES ('$idTarjeta', 1)");
			$this->conection->query("INSERT INTO usuarios_tarjetas(idUsuario, idTarjeta) VALUES ('$idUsuario', '$idTarjeta')");
		} else {
			// la tarjeta esta ocupada. introduce otra tarjeta
		}
	} 

	/* 
	**Comprobar el estado de la tarjeta en la tabla tarjetas
	 */
	public function comprobarEstadoTarjeta($idTarjeta){
		$this->getConection();
		$query = $this->conection->query("SELECT activo FROM tarjetas WHERE idTarjeta=".$idTarjeta);
		return $query->fetch_assoc();
	} 

	public function comprobarEstado($idTarjeta){
		$this->getConection();

		$query = $this->conection->query("SELECT * FROM fechabajatarjetas WHERE idTarjeta=".$idTarjeta);
		$array = $query->fetch_assoc();
		return $array;
	} 

	public function comprobarUserBano($idTarjeta){
		$this->getConection();
		$query = $this->conection->query("SELECT idUsuario FROM usuarios_tarjetas WHERE idTarjeta=  ".$idTarjeta);
		$usuario = $query->fetch_assoc();
		
		if (null === $usuario) {
			return false;
		}

		$nie = $this->conection->query("SELECT `nie` FROM `usuarios` WHERE `idUsuario` = ".$usuario['idUsuario']);

		return $nie->fetch_assoc();
	}

	public function borradoAsociacion($usuarios, $motivo){
		$this->getConection();
		$now = date('Y-m-d');
		foreach ($usuarios as $idUsuario) {
			$query = $this->conection->query("SELECT idTarjeta FROM usuarios_tarjetas WHERE idUsuario=  ".$idUsuario);
			$tarjeta = $query->fetch_assoc();
			$idTarjeta = $tarjeta['idTarjeta'];
			$this->conection->query("INSERT INTO fechabajatarjetas(idTarjeta, Causa, Fecha) VALUES ('$idTarjeta', '$motivo', '$now')");
			$this->conection->query("DELETE FROM `usuarios_tarjetas` WHERE `idTarjeta`=". $idTarjeta);
			$this->conection->query("UPDATE `tarjetas` SET `activo`= 0 WHERE `idTarjeta` =" . $idTarjeta);
		}
	}
}