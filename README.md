# Centro de recursos para la gestión del conocimiento.
El centro de recursos para la gestión del conocimiento nace como una necesidad por parte de
la Unidad de gestión del conocimiento de ASONOG para tener un
repositorio de documentos que puedan ser visualizados solo por los miembros que pertenecen a la organizacion
y los libros que puedan ser consultados por cualquier persona que desee enriquecer su conocimiento.

## Autor 
- [@josemiguel28](https://github.com/josemiguel28)

## Funcionalidades
- **Administrador**
    - Iniciar sesión
    - Ver lista de documentos
    - Ver lista de libros
    - Ver lista de usuarios
    - Crear, editar y eliminar documentos
    - Crear, editar y eliminar libros
    - Crear, editar y eliminar usuarios
    - Bitacora de acceso de usuarios

- **Colaborador**
  - Iniciar sesión
  - Ver información de un documento
  - Ver información de un libro
  - Descargar un documento
  - Descargar un libro

- **Usuario no registrado**
  - Ver información de un libro
  - Descargar un libro
  
## Tecnologias Utilizadas
- PHP
- MySQL
- JavaScript
- Tailwind CSS
- Gulp.js (para minificar código e imágenes)

### Patron de diseño 
- MVC

## Instalación
1. Descargar [apache](https://www.apachelounge.com/download/) y descomprimir en la carpeta `C:\apache`

2. Clonar el repositorio en la carpeta `htdocs` (C:\apache\htdocs)

3. Ejecutar el comando `composer install` para instalar las dependencias de PHP'

4. Ejecutar el comando `npm install` para instalar las dependencias de Node.js

5. Crear una base de datos en MySQL (la estructura de la base de datos se encuentra en `/scripts` del proyecto)

6. Modificar el archivo `.env` en la carpeta `/includes` del proyecto y configurar las variables de entorno

7. En la raiz del proyecto, moverse a la carpeta `/public` con el comando `cd public` y ejecutar el comando `php -S localhost:3000`

8. En el navegador, ingresar a la dirección `http://localhost:3000` para acceder a la aplicación

- Nota: Para el correcto funcionamiento de la aplicación, es necesario tener instalado PHP y MySQL en el servidor.

### Durante el desarrollo

- Si deseas agregar código JavaScript o imágenes estáticas, sigue estos pasos:

1. **Agregar archivos a `/src/`**:
   - Coloca el nuevo código JavaScript o las imágenes en la carpeta `/src/` del proyecto.

2. **Ejecutar Gulp**:
   - En la raíz del proyecto, abre la consola y ejecuta el siguiente comando:
     ```sh
     npx gulp
     ```
   - Esto iniciará Gulp.js y comenzará el proceso de minificación y optimización de imágenes.

3. **Ubicación de los archivos generados**:
   - Los archivos minificados y optimizados se guardarán en la carpeta `/build/` del proyecto.

4. **Referenciar los archivos**:
   - Para hacer referencia a estos archivos en tu código, usa la ruta desde `/build/`. Por ejemplo:
     ```html
     <a href="/build/img/mi_imagen.jpg"></a>
     ```

### Nota:
- Asegúrate de que las referencias a los archivos sean correctas para que se carguen adecuadamente en la aplicación.

## Estructura de directorios
El proyecto esta estructurado de la siguiente manera:

```
centro_recursos_asonog
|
+---clases                                      Carpeta que contiene clases de ayuda para la aplicación. 
|       
+---controllers						            Carpeta principal que contiene los controladores de la aplicación.
|   +---admin						            Controladores relacionados con las acciones específicas del administrador.
|   |   |   AdminController.php		            Controlador principal para las operaciones generales del administrador.
|   |   +---documentos				            Controladores para la gestión de documentos.
|   |   +---libros					            Controladores para la gestión de libros.	
|   |   +---usuarios				            Controladores para la gestión de usuarios.
|   +---auth						            Controladores relacionados con la autenticación y gestión de cuentas.
|   +---biblioteca					            Controladores relacionados con mostrar los libros a los usuarios
|   |   +---api						            Controlador para manejar la API de biblioteca
|   |           BibliotecaAPI.php	            Maneja las solicitudes de la API para obtener y filtrar libros, proporcionando respuestas paginadas y en formato JSON
|   +---colaborador					            Controladores relacionados con mostrar los libros a los usuarios
|   |   +---api						            Controlador para manejar la API de colaborador
|   |           filterDocuments.php
|   |           getPaginatedDocuments.php		Controlador para proporcionar respuestas paginadas y en formato JSON
|   +---home						            Controlador para manejar la pagina de inicio       
|   +---rol						                Controlador para consultar los diferentes roles que están registrados
|           
+---includes						            Carpeta que incluye utilidades y configuración de la base de datos
|       .env						            Variables de entorno 
|       app.php						            Este archivo es responsable de configurar el entorno y establecer una conexión con la base de datos. 
|       database.php				           	Este archivo es responsable de establecer la conexión a la base de datos MySQL.
|       funciones.php					        Este archivo contiene utilidades para el funcionamiento de la aplicación.
|       
+---models						                Carpeta responsable de interactuar con la base de datos.
|       ActiveRecord.php				        Modelo base para la interacción con la base de datos.       
|
+---public						                Carpeta pública del proyecto para recursos estáticos.
|   |   index.php					            Archivo responsable de manejar las rutas(URLs) del proyecto. 
|   |   
|   +---build						            Carpeta que contiene código e imágenes minificadas para producción
|   +---documentos     					        Carpeta que contiene los PDF de los documentos
|   +---imagenesDocumentos 				        Carpeta que contiene las imágenes de los documentos
|   +---imagenesLibros      			    	Carpeta que contiene las imágenes de los libros
|   +---libros						            Carpeta que contiene los PDF de los libros
|
+---scripts						                Script de la estructura de la base de datos
+---src							                Carpeta que contiene código fuente e imágenes estáticas.
|   +---css 
|   +---img     				            	Imágenes estáticas.
|   +---js						                Codigo de JavaScript
|       |   app.js				            	Archivo principal de JavaScript
|       |   
|       +---admin					            Carpeta relacionada con las funcionalidades del administrador.
|       |           
|       +---bibliotecaAPI				        Maneja la API de la biblioteca 
|       |   +---filterBooksByCategory			Filtra los libros 
|       |   |       request.js			    	Maneja la petición hacia la API
|       |   |           
|       |   +---showMoreBooks			    	Muestra mas libros
|       |           request.js				    Maneja la petición hacia la API
|       |           UI.js				        Muestra la interfaz con la información de la API
|       |           
|       +---documentosAPI				        Maneja la API de documentos
|       |   +---filter					        Filtra los documentos
|       |   |       herramienta.js
|       |   |       tematica.js
|       |   |       
|       |   \---showMoreDocuments			    Muestra mas documentos
|       |           request.js				    Maneja la petición hacia la API
|       |           UI.js				        Muestra la interfaz con la información de la API
|       |           
|       +---login					            Carpeta relacionada con el inicio de sesión			
|               
+---views						                Carpeta que contiene las plantillas de las vistas. 
    |   layout.php					            Archivo que contiene el header y footer.
    +---templates  					            Carpeta que contiene plantillas de las vistas.
|   composer.json					            Archivo de configuración de composer.
|   gulpfile.js						            Archivo para minificar código e imágenes.
|   Router.php						            Archivo responsable del enrutamiento.
|   tailwind.config.js 					        Archivo de configuración de Tailwind CSS.
 
```