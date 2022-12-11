<header id='medio' class='masthead'>
    <div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>
        <div class='d-flex justify-content-center'>
            <div id='divcentral2' class='text-center'>
                <h2 id='letra2' class='mx-auto mt-2 mb-5 letradedia'>Elija una opción</h2>
                <!-- <h5 id='letra2' class='mx-auto mt-2 mb-5 letradedia'><?php echo $_SESSION['user']['nombre'];?></h5> -->
                <a class='btn btn-primary' href='index.php?controller=tarjeta&action=consultar_puntos'>Consultar Puntos</a>
                <a class='btn btn-primary' href='index.php?controller=tarjeta&action=estado_tarjeta'>Consultar estado tarjeta</a>
                <a class='btn btn-primary' href='index.php?controller=tarjeta&action=logout'>Cerrar la sesión</a>
            </div>
        </div>
    </div>
</header>