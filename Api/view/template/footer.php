            </div>
        </div>
        <footer class="py-3 fixed-bottom">
            <p class="text-center text-muted">Copyright &copy; Javier Mariscal | Rafa Castillero| Miguel Pintado 2022</p>
        </footer>
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

        <?php if ($controller->page_success) { ?>
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
                        <?php echo $controller->page_success; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>
    <script>
        document.getElementById('id-sun').onclick = function () {
            document.getElementById('page').classList.remove('dark-mode')
            document.getElementById('id-moon').classList.remove('active')
            this.classList.add('active')
            var image = document.getElementById('logonav');
            if (image.src.match("on")) {
                image.src = "IMG/logonav.png";
            } else {
                image.src = "IMG/logonavnoche.png";
            }
            document.getElementById('letra2').classList.add('letradedia')
            document.getElementById('letra2').classList.remove('letradenoche')
            document.getElementById('letra3').classList.add('letradedia')
            document.getElementById('letra3').classList.remove('letradenoche')
            document.getElementById('divtabla').classList.remove('tablanoche')
        }
        /*Si clicamos en el botón de la luna, añadiremos la clase css dark-mode del div 
        con id page y se aplicará el estilo active a la luna*/
        document.getElementById('id-moon').onclick = function () {
            document.getElementById('page').classList.add('dark-mode')
            document.getElementById('page').classList.add('dark-mode')
            document.getElementById('id-sun').classList.remove('active')
            this.classList.add('active')
            var image = document.getElementById('logonav');
            if (image.src.match("on")) {
                image.src = "IMG/logonavnoche.png";
            } else {
                image.src = "IMG/logonav.png";
            }
            document.getElementById('letra2').classList.remove('letradedia')
            document.getElementById('letra2').classList.add('letradenoche')
            document.getElementById('letra3').classList.remove('letradedia')
            document.getElementById('letra3').classList.add('letradenoche')
        }
    </script>
</html>