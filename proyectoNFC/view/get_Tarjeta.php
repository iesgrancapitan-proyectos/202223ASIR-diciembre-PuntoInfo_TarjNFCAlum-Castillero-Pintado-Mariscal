<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>
    <div class='d-flex justify-content-center'>
        <div id='divcentral2' class='text-center'>
            <form method='post' action=index.php?controller=tarjeta&action=setUserTarje>
                <div class='container'>
                    <div class='text-center'>Asigna una tarjeta</div>
                    <div class='row border border-dark'>
                            <div class='col-6'>
                                <input type="text" name="nombre" id="" value="controllertarjeta&action=setUser($idTarjeta)"readonly><?php //$controller->usuario ?> 
                                <input type="hiden" name="idUsuario" id="" ><?php //$controller->usuario ?> 
                            </div>
                        </div>
                        <div class='col border border-dark'>
                            <div class='col-6'><input type="text" name="idTarjeta" id=""><!-- $_usuario --></div>
                        </div>                        
                </div>
                <input type=submit class='btn btn-primary' name='asignar' value='Asignar tarjeta'>
            </form>
        </div>
    </div>
</div>