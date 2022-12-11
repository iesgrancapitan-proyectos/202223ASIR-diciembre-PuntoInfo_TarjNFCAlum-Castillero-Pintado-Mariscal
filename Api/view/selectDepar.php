<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>
    <div class='d-flex justify-content-center'>
        <div id='divcentral2' class='text-center'>
            <form method='POST' name='relacionUserTarjetasForm' action='index.php?controller=tarjeta&action=listadoUsuarios'>
                <div>
                    <p>Elige un departamento</p>
                    <select name="select">
                        <optgroup label="Departamentos">
                            <?php foreach ($controller->departamentos as $keyD => $valueD) {
                                foreach ($valueD as $keyD2 => $valueD2) {
                                    echo "<option name='nombre' value=departamento_" . $valueD2 . ">" . $valueD2 . "</option>";
                                }
                            } ?>
                        </optgroup>
                    </select>
                    <input type=submit class='btn btn-primary' name='mostrar' value='Mostrar'>
                </div>
            </form>
        </div>
    </div>
</div>