<?php

require_once 'model/tarjeta.php';
require_once 'model/usuario.php';

class TarjetaController
{
    public $page_title;
    public $page_error;
    public $page_success;
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
                $this->view = 'index_admin';
                $this->page_title = 'ADMINISTRACIÓN';
                break;
            case '2':
                $this->view = 'index_profesor';
                $this->page_title = 'ZONA PROFESOR';
                break;
            case '3':
                $this->view = 'index_alumno';
                $this->page_title = 'ZONA ALUMNO';
                break;
            default:
                $this->view = 'login_principal';
                $this->page_title = 'INSERTE TARJETA';
                break;
        }
    }

    public function selectUsersType()
    {
        $this->view = 'seleccionar_tipo_usuario';
        $this->page_title = 'ADMINISTRACIÓN';
    }

    public function getDepart()
    {
        $this->view = 'selectDepar';
        $this->page_title = 'ADMINISTRACIÓN';
        $this->departamentos = $this->usuarioObj->getDepartamentos();
    }

    public function getUnidad()
    {
        $this->view = 'selectUnidad';
        $this->page_title = 'ADMINISTRACIÓN';
        $this->unidades = $this->usuarioObj->getUnidades();
    }

    public function listadoUsuarios()
    {
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
        $this->select = $_POST['select'] ?? null;
        $this->usuario = $_POST['usuario'] ?? null;

        if ('' == $this->usuario) {
            $type = explode('_', $this->select)[0];
            $value = explode('_', $this->select)[1];
            $this->listado = $this->tarjetaObj->getTarjetaUsuario($type, $value);
            $this->view = 'lista_usuarios_tarjeta';
            $this->page_title = 'ADMINISTRACIÓN';
            $this->page_error = 'Selecciona un usuario válido';
            return;
        }

        $this->datos = explode('_', $this->usuario)[0];
        $this->idUsuario = explode('_', $this->usuario)[1];
        $this->view = 'get_tarjeta';
        $this->page_title = 'ADMINISTRACIÓN';
    }


    public function setUserTarje()
    {
        $this->idUsuario = $_POST['idUsuario'] ?? null;
        $this->idTarjeta = $_POST['idTarjeta'] ?? null;
        $this->datos = $_POST['nombre'] ?? null;

        if ((!$this->idUsuario && !$this->idTarjeta) || !preg_match("/^[0-9]+$/", $this->idTarjeta)) {
            $this->view = 'get_tarjeta';
            $this->page_title = 'ADMINISTRACIÓN';
            $this->page_error = 'Introduce una tarjeta válida';
            return;
        }

        /* https://www.php.net/manual/es/function.preg-match.php */
        $this->tarjetaObj->setUserTarjeta($this->idUsuario, $this->idTarjeta);
        $this->view = 'seleccionar_tipo_usuario';
        $this->page_title = 'ADMINISTRACIÓN';
        $this->page_success = 'Tarjeta asociada';
    }

    public function accesoBano()
    {
        $this->profesor = $_SESSION['user']['email'];
        $this->view = 'acceso_bano';
        $this->page_title = 'Acceso al Baño';
    }

    public function permiso_bano()
    {
        $this->profesor = $_SESSION['user']['email'];
        $tarjeta = $_POST['idTarjeta'];

        if (!$tarjeta) {
            $this->view = 'acceso_bano';
            $this->page_title = 'Acceso al Baño';
            $this->page_error = 'Introduce una tarjeta correcta';
            return;
        }

        $nieAlumno = $this->tarjetaObj->comprobarUserBano($tarjeta);

        if (!$nieAlumno) {
            $this->view = 'acceso_bano';
            $this->page_title = 'Acceso al Baño';
            $this->page_error = 'El usuario no existe';
            return;
        }

        $url = "http://cpd.iesgrancapitan.org:9280/api.php?nie={$nieAlumno['nie']}&profe=$this->profesor";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_HTTPGET, true);
        $data = curl_exec($curl);

        if (trim($data) == '"SI"') {
            $this->view = 'aseo_libre';
            $this->page_title = 'Acceso Concedido';
        } else {
            $this->view = 'aseo_ocupado';
            $this->page_title = 'Acceso Denegado';
        }
    }

    public function estado_tarjeta()
    {
        $this->view = 'estado_tarjeta';
        $this->page_title = 'Estado de la tarjeta';
    }

    public function borradoAsociacion()
    {
        $usuarios = $_POST['usuarios'] ?? null;
        $motivo = $_POST['motivo'] ?? null;

        $this->tarjetaObj->borradoAsociacion($usuarios, $motivo);

        header('Location: index.php?controller=usuario&action=listado');
    }
}