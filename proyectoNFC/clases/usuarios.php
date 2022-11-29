<?php
//AQUI IRAN TODAS LAS QUERYS RELACIONADAS A PROFESORES

   // include('resources/conexionbd.php');
    //declaramos conexion a la BBDD como objeto
   // $conex = new conexiondb();
    //obtenemos el objeto de BBDD ya iniciado
    //$conn = $conex::initConex();

Class Usuarios{
         public static function instance(){
            static $instance=[];
            static $funcCalls = 0;
            //print ++$funcCalls.' - '.(++self::$funcCalls);
            if (!isset($instance[static::class])) {
                //print "(new)";
                $instance[static::class] = new static();
            }
            return $instance[static::class];
        }
 
    function listarUsers(){
        $resultado = $GLOBALS["conn"]->query("SELECT * FROM usuarios");
            //aqui devuelve todos los datos de la tabla usuarios_tarjetas

               //mysqli_num_rows($resultado);
               
                return $resultado;
                 $resultado->close;
    }
     function show_user(){
            $resultado = $GLOBALS["conn"]->query("SELECT `idUsuario`,`nombre`,`email` FROM usuarios");
         //   if ($resultado = $GLOBALS["conn"]->query("SELECT * FROM"));
            //printf("La selección devolvió %d filas.\n", $resultado->num_rows);
             /* liberar el conjunto de resultados */
               return $resultado;
               $resultado->close; 
        }
    function insertarProfesor($dato){
        //echo $dato[0] . "- -";
        //$resultado = $GLOBALS["conn"]->query("INSERT INTO USUARIOS (nombre,email,departamento,idPerfil) VALUES ('".$dato[0]."','".$dato[1]."','".$dato[2]."', '2'");
        //falta controlar el dato[0]
        $resultado = $GLOBALS["conn"]->query("INSERT INTO `usuarios`(`nombre`, `email`, `departamento`, `idPerfil`) VALUES ('','$dato[0]','$dato[1]','2')");
        return $resultado;
        $resultado->close;
         
    }
    function insertarAlumnos($dato){
        //echo $dato[0] . "- -";
        //$resultado = $GLOBALS["conn"]->query("INSERT INTO USUARIOS (nombre,email,departamento,idPerfil) VALUES ('".$dato[0]."','".$dato[1]."','".$dato[2]."', '2'");
        $resultado = $GLOBALS["conn"]->query("INSERT INTO `usuarios`(`nombre`,`nie`,`unidad`,`idPerfil`)
                                            VALUES ('$dato[0]','$dato[1]','$dato[2]','3')");
        //INSERT INTO `usuarios`(`nombre`, `nie`, `unidad`, `idPerfil`) VALUES ('jms','31001612','2ºBACHB','3');

        return $resultado;
        $resultado->close;
    }

    function borradoBDUser(){
        $resultado = $GLOBALS["conn"]->query("DELETE FROM `usuarios_tarjetas`");
        $resultado = $GLOBALS["conn"]->query("DELETE FROM `usuarios` WHERE `idPerfil`!='1'"); 
        $resultado = $GLOBALS["conn"]->query("ALTER TABLE `usuarios` AUTO_INCREMENT 1"); 
    }

    function unidad(){
        $resultado = $GLOBALS["conn"]->query("SELECT DISTINCT unidad, departamento FROM usuarios");
        return $resultado;
        $resultado->close; 
    }
    function departamento(){
        $resultado = $GLOBALS["conn"]->query("SELECT DISTINCT departamento FROM usuarios");
        return $resultado;
        $resultado->close; 
    }

    function usuarioUnidad(){
        $resultado = $GLOBALS["conn"]->query("SELECT * FROM usuarios WHERE unidad=dpto-economia-fol");
        return $resultado;
        $resultado->close; 
    }

    /*function comprobarUsuario(idUsuario){
       // $resultado = $GLOBALS["conn"]->query("SELECT t.idUsuario FROM usuarios AS t LEFT JOIN administracion AS ut ON ut.idUsuario = t.idUsuario WHERE ut.idUsuario");
        $resultado = $GLOBALS["conn"]->query("SELECT * FROM `administracion` WHERE `idUsuario`= '1'");
        return $resultado;
        $resultado->close;
    }*/
    function usuarioPorUndidad($unidad){
        $resultado = $GLOBALS["conn"]->query("SELECT * FROM `usuarios` WHERE `unidad` = '$unidad'");
        return $resultado;
        $resultado->close; 
    }

}

  

?>
