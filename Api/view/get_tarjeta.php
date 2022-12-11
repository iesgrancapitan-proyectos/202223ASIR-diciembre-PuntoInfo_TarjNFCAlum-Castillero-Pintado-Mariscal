<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>
    <div class='d-flex justify-content-center'>
        <div id='divcentral2' class='text-center'>
            <form method='post' action=index.php?controller=tarjeta&action=setUserTarje>
                <div class='container'>
                    <div class='row'>
                        <div class='col-12 text-center'>Usuario</div>
                        <div class='col-12'>
                            <input type="text" name="nombre" value="<?php echo $controller->datos; ?>" readonly>
                            <input type="hidden" name="idUsuario" value="<?php echo $controller->idUsuario; ?>">
                        </div>
                        <div class='col-12 text-center'>Asigna una tarjeta</div>
                        <div class='col-12'>
                            <input type="text" name="idTarjeta">
                        </div>
                        <div class='col-12'>
                            <input type=submit class='btn btn-primary mt-3' name='asignar' value='Asignar tarjeta'>
                        </div>                                       
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>