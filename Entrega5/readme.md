# Entrega 5, Grupos 15 y 84:

![](../Sites/assets/img/logo_real.png)

### Deploy de la web API:
La API se consume desde la aplicación en PHP, y está subida al servidor Heroku.


Para comenzar ir a ```http://codd.ing.puc.cl/~grupo15/index.php``` y apretar en comenzar.
Se da la opción de registrar un nuevo usuario o de iniciar sesión con un usuario existente. La contraseña *dummy* para usuarios ya existentes en la base de datos será el número ```0```.

### Consumir la API desde la aplicación PHP:
**-Ver atributos mensajes recibidos:** Cuando un usuario esta logueado, cuando está en el main, si presiona en el botón **Ver mensajes** del cuadro **Ver mensajes recibidos**, le muestra una tabla con los atributos de todos los mensajes enviados por el ususario.

**Ver atributos mensajes enviados:** También en el main, si selecciona **Ver mensajes** en la sección **Ver mensajes enviados**, se muestran los atributos de todos los mensajes enviados en una tabla.

**Enviar mensaje:** La aplicación permite enviar mensajes, cuando se selecciona **Enviar mensaje** dentro de la sección con el mismo nombre, se ingresa a un form que tiene un campo para ingresar el username del receptor y el mensaje, y al enviarlo, la aplicación avisa si fue posible enviar el mensaje, si alguno de los campos de username del receptor o mensaje está vacío, si el username no está en la base de datos, o si fue enviado con éxito.

**Busca mensajes**: En el apartado **Búsqueda de mensajes**, el botón **Buscar mensajes** te lleva a un form, donde se puede buscar ingresando entre 0 y 4 parámetros entre: texto deseado, texto requerido, palabras interdidas e ID del usuario que emite el mensaje.

**Lugares**: Si se selecciona **Mapa de mensajes**, la página ofrece ingresar una fecha inicial y una de término, y en caso de haber enviado mensajes en esa fecha muestra la ubicación en el mapa desde donde se enviaron.


### Supuestos:
Las coordenadas por defecto desde donde se envían los mensajes es Santiago, Chile, considerando la información entregada en la issue #419.

##### Grupo 15 y 84.
