<?php
//	require_once "header.php";

?>
   
      
        <div id="divcentral" class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div id="divcentral2" class="text-center">
                    <h1 id="letra" class="mx-auto my-0 text-uppercase">Acceso a zona de Administrador</h1>
                    <h2 id="letra2" class="mx-auto mt-2 mb-5 letradedia">Pasa la tarjeta o escribe tu codigo de administrador
                    </h2>
                    <form method="post" action="login.php" id="acceso">
                        <input type="password" name="idtarjeta"><br><br>
                        <!-- $_SERVER[HTTP_REFERER] se usa para volver atras -->
                        <?="<a class='btn btn-primary' href='$_SERVER[HTTP_REFERER]'>Volver</a>"?>
                        <input type="submit" class="btn btn-primary" value="Acceder" name="enviar">
                      
                    </form>
                   <?php/*
                        if (isset($_REQUEST['enviar']))
                        {
                            include ('conexionbd.php');
                            // Creamos la consulta
                            $idtarjeta = $_REQUEST['idtarjeta'];
                                //Para iniciar sesión
                                $queryusuario = mysqli_query($conn,"SELECT * FROM administradores WHERE idtarjeta = '$idtarjeta'");
                                $nr 		= mysqli_num_rows($queryusuario); 
                                $row2= mysqli_fetch_array($queryusuario);
                                if (($nr == 1)) 
                                    { 
                                        $query = mysqli_query($conn,"SELECT * FROM administradores WHERE IdTarjeta = '$idtarjeta'");
                                        $row = mysqli_fetch_assoc($query);
                                        $_SESSION['idusuario']=$row['idtarjeta'];
                                        $_SESSION['usuario']=$row['Nombre'];
                                        $_SESSION['date'] = date('d-m-Y h:i:s A');
                                        $_SESSION['aut'] = "SI";
                                        header("refresh:1;url=menuadmin.php");
                                    }
                                else
                                    {
                                    echo "<p class='form-control'style='color: red;'>Credenciales incorrectas...</p>";
                                    }
                            

                            // Cerramos la conexión con Mysql
                            
                            mysqli_close ($conn);}*/
                        ?>
                             
                </div>
            </div>
        </div>