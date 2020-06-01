# Entrega 3 Grupo 15 y 84:

![](../Sites/assets/img/logo_real.png)

### Sistema de usuarios y Login:
Para comenzar ir a ```http://codd.ing.puc.cl/~grupo15/index.php``` y apretar en comenzar.
Se da la opción de registrar un nuevo usuario o de iniciar una nueva sesión. La contraseña *dummy* para cualquier usuario de la base de datos será el número ```0```.
Una vez iniciada la sesión, el usuario puede darse de baja apretando en su perfil en la esquina superior derecha, donde aparece la opción: **Delete Account**.

### Información Personal:
Cuando un usuario esta logueado, puede ver sus compras apretando en **Mi Perfil** en la barra izquierda. Ahí le da la opcion de ver sus entradas a museos, hoteles y tickets de transporte.

### Navegación:
En la barra lateral izquierda, se puede ver todos los **Artistas** que cuenta Splinter S.A. Apretando en alguno de los artistas, se nos dirige a una pagina especifica según artista que muestra la descripción, fecha y sus obras. Donde podemos clickear directamente en el nombre de la obra para obtener más detalle sobre ella.
Igualmente en la barra lateral, podemos elegir **Obras** mostrandonos todas las obras, igual que con artistas si apretamos algúna nos dirige a su página dandonos los detalles.
Para los lugares es igual, en la barra lateral elegimos **Lugares** y obtenemos todos los lugares disponibles, si seleccionamos alguno, nos dirige a la pagina especifica mostrandonos que obras hay y los artistas.

Para la compra de entrada de museos debemos dirigirnos a la pagina especifica del museo, y luego bajo el precio de este, hay un botón con la opción de **Comprar Entrada**.
Para la compra de tickets de transporte, seleccionamos en la barra lateral **Comprar Tickets**, ahi seleccionamos fecha y las ciudades y **Comprar**. Nos mostrara las diferentes opciones con la opción de comprar algúna.
Para la reserva de un hotel, funciona igual que los tickets de transporte. Apretando en la barra lateral **Hacer Reserva de Hotel**.

### Procedimiento Almacenado:
En la carpeta ```Entrega3```, se encuentra el archivo ```itinerario.sql``` que define la funcion **f_itinerario()**, la cual crea los itinerarios posibles.
Desde la aplicación en la barra lateral apretando en **Crear Itinerario**, podremos seleccionar los artistas que nos gustaría ver, la ciudad de origen y la fecha de salida. Apretando el botón **Buscar** nos cambiara de pantalla a todas las alternativas de itinerario que estan cada una en un cuadrado. 

### Funcionalidad Extra:
Añadimos un buscador general de la pagina, que se encuentra en la barra lateral **Buscar en la pagina**. Que permite hacer una busqueda de algún artista, obra, lugar. Además cada pagina de **Artistas, Obras, Lugares** cuenta con un buscador particular para su categoría.

### Bonus:
Agregamos imagenes a los artistas, obras y lugares.

##### Grupo 15 y 84.
