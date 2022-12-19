
- LAMP NFC
- Descripción del proyecto

Nuestro proyecto se centra en la mejora de una AppWeb que agiliza el tramite de ir al baño por parte de los profesores dentro del instituto. Consta de una base de datos propia, entorno propio y una conexión a la intranet del instituto donde consulta los datos.
Pueden ver el tutorial de descarga del entorno en el siguiente enlace.

El despliegue minimo que se necesita para poder ejecutar las instancias en docker es tener docker instalado en nuestro equipo junto con los archivos correspondientes para su necesaria instalación. Si se trata de un host Windows se requiere el WSL2 (Subsistema que permite ejecutar aplicaciones de linux en windows).

- [Tutorial Docker](https://github.com/iesgrancapitan-proyectos/202223ASIR-diciembre-PuntoInfo_TarjNFCAlum-Castillero-Pintado-Mariscal/wiki/7.-Tutorial-Docker)

- Información Primaria para el despliegue de la web.
    - Descargar el repositorio de [GITHUB](https://github.com/iesgrancapitan-proyectos/202223ASIR-diciembre-PuntoInfo_TarjNFCAlum-Castillero-Pintado-Mariscal).
    - Dirigirnos a la carpeta donde esta ubicado el archivo Docker Compose ("C:/Usuarios/Rafa/Docker/Docker_Compose/").
    - Copiar la url donde esta ubicado el archivo docker compose y hacer un CD en powershell para dirigirnos a la carpeta.
    - Ejecutar (docker-compose up -d) para su correspondiente descarga.
    - Copiar la web que esta ubicada en la carpeta de API y moverla a la carpeta (www) que crea el archivo docker compose para su implementación.
    - Abrir el navegador web para su visionado.

- Para realizar nuestro proyecto se necesitan:

    - Instancia en el servidor del IES GRAN CAPITAN
    - Lector NFC
    - Tarjetas NFC

- Los lenguajes que hemos usado para la creación de todo el proyecto han sido:

    - HTML
    - CSS
    - PHP
    - JAVASCRIPT

- Para el despliegue de una AppWeb necesitamos la instancia con:

   - Apache
   - PHP
   - MySQL/MariaDB
   - PhpMyAdmin

- Informacion sobre cómo usarlo

  - Tiene un uso realmente intuitivo en el que solamente tendremos que pasar las tarjetas nfc. Aunque hemos creado unos manuales tanto como para el administrador       como para el usuario.

  - [Manual Administrador](https://github.com/iesgrancapitan-proyectos/202223ASIR-diciembre-PuntoInfo_TarjNFCAlum-Castillero-Pintado-Mariscal/wiki/9.1-Manual-administrador)
  - [Manual Usuario](https://github.com/iesgrancapitan-proyectos/202223ASIR-diciembre-PuntoInfo_TarjNFCAlum-Castillero-Pintado-Mariscal/wiki/9.2-Manual-Usuario)


- Autores

Autores del proyecto: Rafael Castillero López | Miguel Angel Pintado | Javier Mariscal

Supervisora: Mari Carmen Tripiana Profesora de Informática del IES Gran Capitán (Córdoba)
