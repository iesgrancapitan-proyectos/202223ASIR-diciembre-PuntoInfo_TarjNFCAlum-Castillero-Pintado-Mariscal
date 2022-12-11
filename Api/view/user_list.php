<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>
    <div class='d-flex justify-content-center'>
        <div id='divcentral2' class='text-center'>
            <form method='POST' name='relacionUserTarjetasForm' action='index.php?controller=usuario&action=listado'>
                <div>
                    <p>Elige un departamento o una unidad</p>
                    <select name="select">
                        <optgroup label="Departamentos">
                            <?php foreach ($controller->departamentos as $keyD => $valueD) {
                                foreach ($valueD as $keyD2 => $valueD2) {
                                    $isSelected = $valueD2 === explode('_', $controller->select)[1] ? 'selected' : '';
                                    echo "<option $isSelected name='nombre' value=departamento_" . $valueD2 . ">" . $valueD2 . "</option>";
                                }
                            } ?>
                        </optgroup>
                        <optgroup label="Unidades">
                            <?php foreach ($controller->unidades as $keyD => $valueD) {
                                foreach ($valueD as $keyD2 => $valueD2) {
                                    $isSelected = $valueD2 === explode('_', $controller->select)[1] ? 'selected' : '';
                                    echo "<option $isSelected name='nombre' value=unidad_" . $valueD2 . ">" . $valueD2 . "</option>";
                                }
                            } ?>
                        </optgroup>
                    </select>
                    <input type=submit class='btn btn-primary' name='mostrar' value='Mostrar'>
                </div>
            </form>
            <form method='post' action=index.php?controller=usuario&action=motivoBaja>
                <div class='container'>
                    <div class='text-center'>LISTADO DE USUARIOS</div>
                    <div class='row border border-dark'>
                        <div class='col-1'></div>
                        <div class='col-6'>Correo/Nie</div>
                        <div class='col-5'>Tarjeta</div>
                        <?php foreach ($controller->listado as $valueD) {
                            echo "<div class='col-1'>";
                            if (null != $valueD[3]) {
                                echo "<input type='checkbox' name='usuarios[]' value=" . $valueD[0] . ">";
                            }
                            echo "</div>";
                            echo "<div class='col-6'>" . ($valueD[4] == 2 || $valueD[4] == 1 ? $valueD[1] : $valueD[2]) . "</div>";
                            echo "<div class='col-5'>" . ($valueD[3] ?? 'Tarjeta no asignada') . "</div>";
                        } ?>
                    </div>
                </div>
                <div>
                    <input type='submit' class='btn btn-primary' name='borrar' value='borrar'>
                </div>
            </form>
        </div>
    </div>
</div>