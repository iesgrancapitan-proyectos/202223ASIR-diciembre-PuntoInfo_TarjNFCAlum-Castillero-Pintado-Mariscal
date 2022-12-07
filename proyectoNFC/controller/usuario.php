<?php

require_once 'model/tarjeta.php';
require_once 'model/usuario.php';

class UsuarioController
{
    public $page_title;
    public $page_error;
    public $view;

    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php');
        }
        $this->view = 'user_list';
        $this->tarjetaObj = new Tarjeta();
        $this->usuarioObj = new Usuario();
    }

    /**
     * Listado de usuarios
     */
    public function listado()
    {
        $this->select = $_POST['select'] ?? null;
        $this->listado = [];

        if (null !== $this->select) {
            $type = explode('_', $this->select)[0];
            $value = explode('_', $this->select)[1];
            $this->listado = $this->usuarioObj->getFilterUser($type, $value);
        }

        $this->departamentos = $this->usuarioObj->getDepartamentos();
        $this->unidades = $this->usuarioObj->getUnidades();
        $this->page_title = 'LISTADO DE USUARIOS';
    }

    public function eliminar()
    {
        $this->usuarios = $_POST['usuarios'] ?? null;
        if (null !== $this->usuarios) {
            $this->listado = $this->usuarioObj->delete($this->usuarios);
        }
        
        $this->listado();
    }
//llamada a la vista importar CSV
    public function importar(){
        $this->view = 'importarCSV';
        $this->page_title = 'Comienzo de Curso';

    }
    //llamada a la vista alumnosCSV

    public function alumnosCSV(){
        $this->view = 'importar_alumnos';
        $this->page_title = 'Administracion';
    }

    //lectura de csv e insercion de datos en la BBDD(alumnos)
    public function importarAlumnos(){
        //por esta linea aparece el (new)
        $this->files = $_FILES['file'] ?? null;
		//llamamos a la funcion 
		//$anadirProfe = $anadir->insertarProfesor($dato1, $dato2);
        $filename=$_FILES["file"]["name"];
        $info = new SplFileInfo($filename);
        $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
    
        if($extension == 'csv'){
            $filename = $_FILES['file']['tmp_name'];
            $handle = fopen($filename, "r");
    
            while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE ){
               // $anadirProfe = $anadir->insertarProfesor($data);
              // if (null !== $this->data) {
                $this->alumnosCSV = $this->usuarioObj->insertUsuariosAlumnos($data);
               //}
               // $this->listado = $this->usuarioObj->delete($this->usuarios);
            }
            $this->alumnosCSV();

            fclose($handle);
        }else {
            echo "El archivo no es correcto";
       // echo "<script>window.alert('Archivo no v�lido. El archivo debe ser csv.')</script>";
        }
    }

    //llamada a la vista profesoresCSV
    public function profesoresCSV(){
        $this->view = 'importar_profesores';
        $this->page_title = 'Administracion';
    }
       //lectura de csv e insercion de datos en la BBDD(profesores)
    public function importarProfesores(){
        //por esta linea aparece el (new)
        $this->files = $_FILES['file'] ?? null;
		//llamamos a la funcion 
		//$anadirProfe = $anadir->insertarProfesor($dato1, $dato2);
        $filename=$_FILES["file"]["name"];
        $info = new SplFileInfo($filename);
        $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
    
        if($extension == 'csv'){
            $filename = $_FILES['file']['tmp_name'];
            $handle = fopen($filename, "r");
    
            while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE ){
               // $anadirProfe = $anadir->insertarProfesor($data);
              // if (null !== $this->data) {
                $this->profesoresCSV = $this->usuarioObj->insertUsuariosProfesores($data);
               //}
               // $this->listado = $this->usuarioObj->delete($this->usuarios);
            }
            $this->profesoresCSV();

            fclose($handle);
        }else {
            echo "El archivo no es correcto";
       // echo "<script>window.alert('Archivo no v�lido. El archivo debe ser csv.')</script>";
        }
    }

    public function borradoUsuarios(){
        $this->view = 'importarCSV';
        $this->usuarioObj->borradoInicioCurso();
        $this->page_title = 'Administracion';
    }
    /*public function borradoUsuarios(){
        $this->view = 'importarCSV';
        $this->usuarioObj->borradoInicioCurso();
        $this->page_title = 'Administracion';
    }*/


}