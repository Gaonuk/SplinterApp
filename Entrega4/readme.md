# Entrega 4 Grupo 15 y 84:

### Inicialización:
Para iniciar la API, ejecutamos **pipenv shell** y luego **python routes.py** al pararnos en el directorio del .zip

### Acceso:
Para acceder a cada funcionalidad, basta con acceder al servidor desde algún **navegador**, o desde **postman** en caso de requerir algún método distinto del GET.
Luego, encontraremos cada funcionalidad en su ruta específica, así, los mensajes se encuentran en **/messages**, con la posibilidad de crear, borrar, o ver todos (la creación y eliminación se realiza indicando el método -y el documento JSON en caso de la creación-). Además, permite ver los mensajes entre 2 usuarios, indicando el **id1** y el **id2** en el query string (si alguno de estos valores es nulo, retorna todos los mensajes). Junto a esto, se puede indicar el id del mensaje en la ruta **/messages/<id>**, para ver solamente ese usuario.
Los usuarios los encontramos en **/users** y para acceder a alguno específico, accedemos a **/users/<id>**, donde se muestran además todos sus mensajes.
Finalmente, podemos acceder a la búsqueda por texto desde la ruta **/text_search**, donde luego se especifica el texto a buscar, el prohibido y el requerido al indicarlo en el body del JSON en el **postman** con método **GET**.

### Formato:
Cada respuesta de la respectiva consulta se entrega en formato **jsonify**, por lo que se visualiza cada atributo de cada elemento que cumpla con las condiciones de la consulta.

### Supuestos:
- Las rutas deben introducirse sin el **/** después de lo solicitado, por ejemplo debe entregarse de la forma **/messages** y no **/messages/**, porque de esta forma no se encontrará resultado.
- El query string de la ruta **/messages** está hecho para mostrar los mensajes entre 2 usuarios, solamente cuando se indican en **id1** e **id2** respectivamente.