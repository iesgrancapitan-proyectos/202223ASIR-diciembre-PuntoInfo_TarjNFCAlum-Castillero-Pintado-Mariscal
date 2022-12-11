<header id='medio' class='masthead'>
    <div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>
        <div class='d-flex justify-content-center'>
            <div id='divcentral2' class='text-center'>
                <h1 id='letra' class='mx-auto my-0 text-uppercase'>Zona de Administración</h1>
                <h2 id='letra2' class='mx-auto mt-2 mb-5 letradedia'>Elija una opción</h2>
                <form action='index.php?controller=usuario&action=importarUsuarios' method='post' enctype='multipart/form-data' id='import_form'>
                    <label for="profesores">Departamentos</label>
                    <input type='file' name='profesores' />
                    <br>
                    <label for="alumnos">Alumnos</label>
                    <input type='file' name='alumnos' />
                    <br>
                    <input type='submit' class='btn btn-primary' name='enviar' value='Cargar datos'>
                </form>
                <a class='btn btn-primary' href='index.php'>Volver</a>
            </div>
        </div>
    </div>
</header>