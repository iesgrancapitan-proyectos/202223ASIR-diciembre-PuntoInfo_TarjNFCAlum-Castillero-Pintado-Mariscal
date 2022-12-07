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
        </div>
    </div>
</div>

<form method='post' action=index.php?controller=usuario&action=eliminar>
    <div class='container'>
        <div class='text-center'>LISTADO DE USUARIOS</div>
        <div class='row border border-dark'>
            <div class='col-sm'>ID Usuario</div>
            <div class='col-sm'>Nombre</div>
            <div class='col-sm'>Correo</div>
            <div class='col-sm'>Nie</div>
            <div class='col-sm'>Unidad</div>
            <div class='col-sm'>Departamento</div>
            <div class='col-sm'>Perfil</div>
        </div>
        <?php foreach ($controller->listado as $valueD) {
            echo "<div class='row border-bottom border-dark'>";
            echo "<div class='col-sm'>";
            echo "<input type='checkbox' name='usuarios[]' value=" . $valueD[0] . ">" . $valueD[0];
            echo "</div>";
            echo "<div class='col-sm'>" . $valueD[1] . "</div>";
            echo "<div class='col-sm'>" . $valueD[2] . "</div>";
            echo "<div class='col-sm'>" . $valueD[3] . "</div>";
            echo "<div class='col-sm'>" . $valueD[4] . "</div>";
            echo "<div class='col-sm'>" . $valueD[5] . "</div>";
            echo "<div class='col-sm'>" . $valueD[6] . "</div>";
            echo "</div>";
        } ?>
    </div>
    <div>
        <input type='submit' class='btn btn-primary' name='borrar' value='borrar'>
    </div>
</form>