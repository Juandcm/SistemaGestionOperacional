# CodeIgniter 4 Framework

## Server Requirements

PHP version 7.2 or higher is required, with the following extensions installed: 

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

# Sistema de Gestión Operacional

## Pasos para utilizar el sistema
1) Ir a la carpeta /bd e importar la bd sgo.sql a mysql con el mismo nombre

1.5) Crear un archivo .env y copiar el contenido del archivo "env" en el archivo .env creado

2) Abrir el archivo .env y modificar la variable app.baseURL de acuerdo a la dirección donde estara el sistema alojado el sistema y la variable urlsemifull modificar los datos de acuerdo a la variable app.baseURL.

3) Si deseas modificar el tiempo de duracion de la session de Codeigniter 4 modifica la variable app.sessionExpiration de acuerdo al tiempo que deseas modificar, tomando en cuenta que el tiempo esta en base a los segundos.

4) En el archivo .env tienes que modificar las siguientes variables que se tendran que modificar de acuerdo a la bd mysql y su host, nombre de la bd, usuario de la bd y la contraseña de la bd.
database.default.hostname = localhost
database.default.database = sgo
database.default.username = root
database.default.password = 

5) Abrir el archivo en la direccion /public/interaccion/funciones.js y el archivo /public/interaccion/interaccionfuera.js. alli se debe modificar la variable direccionfull de acuerdo a la dirección que esta en la variable app.baseURL pero con la diferencia que alli se le va a colocar al final esto: "/" de este modo el javascript podra hacer las peticiones correctamente al servidor y no generara ningún inconveniente.

### Usuarios por defecto del sistema

Usuario Administrador: 
usuario: admin@admin.com
contraseña: 12345

Usuario Gerente: 
usuario: 97juandcm11@gmail.com
contraseña: 12345

Usuario Operador:
usuario: elioduran60@gmail.com
contraseña: 12345

Usuario Fin de Semana:
usuario: fin@semana.com
contraseña: 12345

