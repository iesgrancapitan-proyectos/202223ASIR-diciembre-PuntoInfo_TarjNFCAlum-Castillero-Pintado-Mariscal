<header id='medio' class='masthead'>
    <div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>
        <div class='d-flex justify-content-center'>
            <div id='divcentral2' class='text-center'>
                <h1 id='letra' class='mx-auto my-0 text-uppercase'>Zona de Administración</h1>

                <h2 id='letra2' class='mx-auto mt-2 mb-5 letradedia'>Elija una opción
                </h2>
                <!--<form method='post' action='index.php?page=ComienzoDeCurso'>
                    <input type=submit class='btn btn-primary' name='borrar' value='Borrar base de datos'>
                </form>-->
                <a class='btn btn-primary' onclick="confirmar(event)" href='index.php?controller=usuario&action=borradoUsuarios'>Borrado de BBDD</a>
				<a class='btn btn-primary' href='index.php?controller=usuario&action=profesoresCSV'>Importar datos profesores</a>
                <a class='btn btn-primary' href='index.php?controller=usuario&action=alumnosCSV'>Importar datos alumnos</a>
                <a class='btn btn-primary' href='javascript:history.go(-1)'>Volver</a>
<!--                 <a class='btn btn-primary' href='index.php?controller=tarjeta&action=login'>Volver</a> -->
            </div>
        </div>
    </div>
</header>
<script>
    /*
    * Se realiza un dialogo de confirmación para el borrado de los datos
    */
    function confirmar(event) {
        if(!confirm("¿Quieres borrar la base de datos?")) {
            event.preventDefault();
        }
    }
</script>