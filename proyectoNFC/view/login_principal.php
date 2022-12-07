<div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>
    <form method="POST" action=index.php?controller=tarjeta&action=login>
        <div id='divcentral' class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>Tarjeta</div>
        <div class="mb-3">
            <input type='text' class="w-100" name='idTarjeta'>
        </div>
        <div>
            <input type='submit' class='btn btn-primary w-100' value='Acceder' name='acceder'>
        </div>
    </form>
</div>
<?php if ($controller->page_error) { ?>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#ff0000"></rect>
                </svg>

                <strong class="me-auto">Alerta</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php echo $controller->page_error; ?>
            </div>
        </div>
    </div>
<?php } ?>