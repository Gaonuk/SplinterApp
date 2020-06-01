# Entrega 3 Grupo 15 y 84:

![](../Sites/assets/img/logo_real.png)

### Sistema de usuarios y Login:
Para comenzar ir a ```http://codd.ing.puc.cl/~grupo15/index.php``` y apretar en comenzar.
Se da la opción de registrar un nuevo usuario o de iniciar sesión con un usuario existente. La contraseña *dummy* para usuarios ya existentes en la base de datos será el número ```0```.
Una vez iniciada la sesión, el usuario puede darse de baja apretando en su perfil en la esquina superior derecha, donde aparece la opción: **Delete Account** o terminar su sesion dentro de la aplicacion con la opcion **Sign Out**.

### Información Personal:
Cuando un usuario esta logueado, puede ver sus compras apretando en **Mi Perfil** en la barra izquierda. Ahí se le da la opción de ver sus entradas a museos, hoteles y tickets de transporte.

### Navegación:
En la barra lateral izquierda, se puede ver todos los **Artistas** que se encuentran en Splinter. Apretando en alguno de los artistas, se nos dirige a una pagina específica, según el artista, que muestra su descripción, fecha de nacimiento (y muerte, solo si ya falleció) y sus obras con sus fechas de realizacion respectivas. Podemos clickear directamente en el nombre de una de estas obras para obtener más detalle sobre esta.
También en la barra lateral, podemos elegir **Obras** mostrándonos todas las obras y de igual manera que con artistas, si apretamos alguno nos dirige a su página mostrando más detalles.
Para los lugares es igual, en la barra lateral elegimos **Lugares** y obtenemos todos los lugares disponibles, y si seleccionamos alguno, nos dirige a la pagina específica mostrando que obras hay e información como el precio de entrada, horarios de apertura y cierre.

Para comprar entradas de museos debemos dirigirnos a la pagina específica del museo, y bajo el precio de éste, hay un botón con la opción de **Comprar Entrada**.
Para la compra de tickets de transporte, seleccionamos en la barra lateral **Comprar Tickets**, ahí seleccionamos fecha y las ciudades y **Comprar**, esto nos mostrará las diferentes opciones, y nos permite comprar algún ticket.
Para la reserva de un hotel, funciona de manera análoga que los tickets de transporte: apretando en la barra lateral **Hacer Reserva de Hotel**, y rellenando la información solicitada.

### Procedimiento Almacenado:
En la carpeta ```Entrega3```, se encuentra el archivo ```itinerario.sql``` que define la función **f_itinerario()**, la cual crea los itinerarios posibles.
En la barra lateral, apretando en **Crear Itinerario**, podremos seleccionar los artistas que nos gustaría ver, la ciudad de origen y la fecha de salida. Apretando el botón **Buscar** nos llevará a una página que muestra todas las alternativas posibles de itinerarios para elegir.

### Funcionalidad Extra:
Añadimos un buscador general de la página, que se encuentra en la barra lateral **Buscar en la aplicación**. Que permite hacer una búsqueda de algún artista, obra o lugar. Además, cada pagina de **Artistas, Obras, Lugares** cuenta con un buscador particular para su categoría.

### Bonus:
Agregamos imágenes a los artistas, obras y lugares.

##### Grupo 15 y 84.
