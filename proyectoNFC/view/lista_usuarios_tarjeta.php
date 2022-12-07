<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>
    <div class='d-flex justify-content-center'>
        <div id='divcentral2' class='text-center'>
            <form method='post' action=index.php?controller=tarjeta&action=setTarjeta>
                <div class='container'>
                    <div class='text-center'>LISTADO DE USUARIOS</div>
                    <div class='row border border-dark'>
                        <div class='col-1'></div>
                        <div class='col-6'>Correo/Nie</div>
                        <div class='col-5'>Tarjeta</div>
                    <?php foreach ($controller->listado as $valueD) {
                        echo "<div class='col-1'>";
                        if(null == $valueD[3]) {
                            echo "<input type='checkbox' name='usuario' value=" . $valueD[0] . ">";
                        }
                        echo "</div>";
                        echo "<div class='col-6'>" . ($valueD[4] == 2 ? $valueD[1] : $valueD[2]) . "</div>";
                        echo "<div class='col-5'>" . ($valueD[3] ?? 'Tarjeta no asignada') . "</div>";
                    } ?>
                </div>
                <input type=submit class='btn btn-primary' name='asignar' value='Asignar tarjeta'>
            </form>
        </div>
    </div>
</div>