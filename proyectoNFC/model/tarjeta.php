<?php

class Tarjeta
{

	private $conection;

	/* Set conection */
	public function getConection(): void
	{
		$dbObj = new conexiondb();
		$this->conection = $dbObj->initConex();
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
			$query = $this->conection->query("SELECT idUsuario, email, idPerfil FROM usuarios WHERE idUsuario=" . $array["idUsuario"]);
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

	public function setUserAlumno($idUsuario){
		$this->getConection();

		$query = $this->conection->query("SELECT nie, idPerfil FROM usuarios WHERE idUsuario=".$idUsuario);
		$array = $query->fetch_assoc();
		return $array;
	} 

	/* 
	**Comprobar el estado de la tarjeta en la tabla tarjetas
	 */
	public function comprobarEstadoTarjeta($idTarjeta){
		$this->getConection();

		$query = $this->conection->query("SELECT tj.Activo, fb.idTarjeta, tb.Causa, tb, Fecha 
		FROM tarjetas as tj
		LEFT JOIN fechabajatarjetas as fb on tj.idTarjeta = fb.idTarjeta 
		WHERE idTarjeta=".$idTarjeta);
		$array = $query->fetch_assoc();
		return $array->fetch_assoc();
	} 

	public function comprobarEstado($idTarjeta){
		$this->getConection();

		$query = $this->conection->query("SELECT * FROM fechabajatarjetas WHERE idTarjeta=".$idTarjeta);
		$array = $query->fetch_assoc();
		return $array;
	} 
}