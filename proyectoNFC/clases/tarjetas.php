<?php
//AQUI IRAN TODAS LAS QUERYS RELACIONADAS A TARJETAS
    include('resources/conexionbd.php');
    //declaramos conexion a la BBDD como objeto
    $conex = new conexiondb();
    //obtenemos el objeto de BBDD ya iniciado
    $conn = $conex::initConex();

  class Tarjetas{
    

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
 

           

        function show_tarjetas(){
            $resultado = $GLOBALS["conn"]->query("SELECT `idTarjeta` FROM tarjetas");
         //   if ($resultado = $GLOBALS["conn"]->query("SELECT * FROM"));
            //printf("La selección devolvió %d filas.\n", $resultado->num_rows);
             /* liberar el conjunto de resultados */
               return $resultado;
               $resultado->close; 
        }

        //No se utiliza actualmente
        function show_tarjetas_noAsociadas(){
            $resultado = $GLOBALS["conn"]->query("SELECT t.idTarjeta FROM tarjetas AS t LEFT JOIN usuarios_tarjetas AS ut ON ut.idTarjeta = t.idTarjeta WHERE ut.idTarjeta IS NULL");
               return $resultado;
               $resultado->close;
        }
      
        function comprobarTarje($idTarjeta){
                     
         //  $resultado = $GLOBALS["conn"]->query("SELECT * FROM tarjetas WHERE idtarjeta ='1233456789'");
      
            //$resultado = mysqli_query($GLOBALS["conn"],("SELECT * FROM tarjetas WHERE 'idTarjeta' =".$idTarjeta));
            
            $resultado = $GLOBALS["conn"]->query("SELECT idUsuario FROM usuarios_tarjetas WHERE idTarjeta=".$idTarjeta);
            //aqui devuelve todos los datos de la tabla usuarios_tarjetas

               //mysqli_num_rows($resultado);
               
                return $resultado;
                 $resultado->close;
        }
        //comprueba si la tarjeta existe en el sistema
        function comprobarSitarjetaExiste($idTarjeta){         
            $resultado = $GLOBALS["conn"]->query("SELECT idTarjeta FROM tarjetas WHERE idTarjeta=".$idTarjeta);
            return $resultado;
            $resultado->close;
        }

        //esta funcion se encarga indicar de quien es la tarjeta 
        function comprobarUserTarjeta($idUsuario){
            $resultado = $GLOBALS["conn"]->query("SELECT idUsuario,nombre, idPerfil FROM usuarios WHERE idUsuario='$idUsuario'");
                return $resultado;
                $resultado->close;
        }

        function insertareUserTarje($dato1,$dato2){
        //echo $dato[0] . "- -";
        //$resultado = $GLOBALS["conn"]->query("INSERT INTO USUARIOS (nombre,email,departamento,idPerfil) VALUES ('".$dato[0]."','".$dato[1]."','".$dato[2]."', '2'");
        $resultado = $GLOBALS["conn"]->query("INSERT INTO `usuarios_tarjetas`(`idUsuario`, `idTarjeta`) VALUES ('$dato1','$dato2')");
        return $resultado;
        $resultado->close;
        }
        /*function comprobarTarjetaUser($dato1){
            $resultado = $GLOBALS["conn"]->query("SELECT idUserTarje FROM usuarios_tarjetas WHERE idTarjeta=".$dato1);
            return $resultado;
            $resultado->close;
        }*/
        function insertarTarjeta($dato1){
        //echo $dato[0] . "- -";
        //$resultado = $GLOBALS["conn"]->query("INSERT INTO USUARIOS (nombre,email,departamento,idPerfil) VALUES ('".$dato[0]."','".$dato[1]."','".$dato[2]."', '2'");
        $resultado = $GLOBALS["conn"]->query("INSERT INTO `tarjetas`(`idTarjeta`,`Activo`) VALUES ('$dato1', '1')");
        return $resultado;
        $resultado->close;
        }
        function comprobarBBDD($dato1){
        //echo $dato[0] . "- -";
        //$resultado = $GLOBALS["conn"]->query("INSERT INTO USUARIOS (nombre,email,departamento,idPerfil) VALUES ('".$dato[0]."','".$dato[1]."','".$dato[2]."', '2'");
        $resultado = $GLOBALS["conn"]->query("SELECT idUsuario,nombre, idPerfil FROM usuarios WHERE idUsuario='$idUsuario'");
        return $resultado;
        $resultado->close;
        }

        function comprobarActivo(){
            $resultado = $GLOBALS["conn"]->query("SELECT activo FROM tarjeta WHERE idTarjetao='$idTarjeta'");
            return $resultado;
            $resultado->close;   
        }
        
  }
?>

