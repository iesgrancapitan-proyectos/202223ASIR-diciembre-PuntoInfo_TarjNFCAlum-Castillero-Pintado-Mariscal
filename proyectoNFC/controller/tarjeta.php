<?php

require_once 'model/tarjeta.php';
require_once 'model/usuario.php';

class TarjetaController
{
    public $page_title;
    public $page_error;
    public $view;

    public function __construct()
    {
        $this->view = 'login_principal';
        $this->tarjetaObj = new Tarjeta();
        $this->usuarioObj = new Usuario();
    }

    /**
     * Formulario de insertar tarjeta
     */
    public function form()
    {
        if (isset($_SESSION['idTarjeta'])) {
            return $this->login();
        }
        $this->page_title = 'INSERTE TARJETA';
    }

    /**
     * Realizar login y redireccionar a la zona según idPerfil
     */
    public function login(): void
    {
        if ((!isset($_POST["idTarjeta"]) || !is_numeric($_POST["idTarjeta"])) && !isset($_SESSION['idTarjeta'])) {
            $this->view = 'login_principal';
            $this->page_title = 'INSERTE TARJETA';
            $this->page_error = 'Introduce un número correcto';
            return;
        }
        try {
            $user = $this->tarjetaObj->login($_POST);
        } catch (\Throwable $th) {
            $this->view = 'login_principal';
            $this->page_title = 'INSERTE TARJETA';
            $this->page_error = $th->getMessage();
            return;
        }
        if ($user === '') {
            $this->view = 'login_principal';
            $this->page_title = 'INSERTE TARJETA';
        } else {
            if ($this->usuarioObj->isAdmin($user['idUsuario'])) {
                $this->view = 'index_admin';
                $this->page_title = 'ADMINISTRACIÓN';
            } else {
                $this->getPerfilView($user['idPerfil']);
            }
        }
        $_GET["response"] = true;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $this->view = 'login_principal';
        $this->page_title = 'INSERTE TARJETA';
    }

    /**
     * Función que determina la vista para redireccionar al usuario
     * 
     * @param int $idPerfil
     * 
     * @return void
     */
    private function getPerfilView(int $idPerfil): void
    {
        switch ($idPerfil) {
            case '1':
                // header("Location:index.php?page=indexAdmin");
                $this->view = 'index_admin';
                $this->page_title = 'ADMINISTRACIÓN';
                break;
            case '2':
                // header("Location:index.php?page=indexProfesor");
                $this->view = 'index_profesor';
                $this->page_title = 'ZONA PROFESOR';
                break;
            case '3':
                // header("Location:index.php?page=indexAlumno");
                $this->view = 'index_alumno';
                $this->page_title = 'ZONA ALUMNO';
                break;
            default:
                $this->view = 'login_principal';
                $this->page_title = 'INSERTE TARJETA';
                break;
        }
    }
    public function selectUsersType(){
        $this->view = 'seleccionar_tipo_usuario';
        $this->page_title = 'ADMINISTRACIÓN';
    }

    public function getDepart(){
        $this->view = 'selectDepar';
        $this->page_title = 'ADMINISTRACIÓN';
        $this->departamentos = $this->usuarioObj->getDepartamentos();
    }

    public function getUnidad(){
        $this->view = 'selectUnidad';
        $this->page_title = 'ADMINISTRACIÓN';
        $this->unidades = $this->usuarioObj->getUnidades();
    }

    public function listadoUsuarios() {
        $this->select = $_POST['select'] ?? null;
        $this->listado = [];

        if (null !== $this->select) {
            $type = explode('_', $this->select)[0];
            $value = explode('_', $this->select)[1];
            $this->listado = $this->tarjetaObj->getTarjetaUsuario($type, $value);
            $this->view = 'lista_usuarios_tarjeta';
            $this->page_title = 'ADMINISTRACIÓN';
            return;
        }

        $this->view = 'seleccionar_tipo_usuario';
        $this->page_title = 'ADMINISTRACIÓN';
    }

    public function setTarjeta()
    {
        $this->usuario = $_POST['usuario'] ?? null;

        if (null !== $this->usuario) {
            $this->view = 'get_tarjeta';
            $this->page_title = 'ADMINISTRACIÓN';
        }
    }
    public function setUser(){
        $this->view = 'get_tarjeta';
        //esto esta mal
        $this->usuarioObj->setUserAlumno($this->usuario[idUsuario]);
        $this->page_title = 'Administracion';
    }

    public function accesoBano(){
        $this->view = 'acceso_bano';
        $this->page_title = 'Acceso al Baño';
    }
    public function permiso_bano(){
        $this->view = 'permiso_bano';
        $this->page_title = 'Acceso al Baño';
    }

    public function estado_tarjeta(){
        $this->view = 'estado_tarjeta';
        $this->page_title = 'Estado de la tarjeta';
    }
}
