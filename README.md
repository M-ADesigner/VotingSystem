Instalación del Proyecto:

Siga los pasos a continuación para configurar y ejecutar el proyecto en su entorno local utilizando XAMPP.

1. Requisitos:
   - XAMPP (con Apache, MySQL y PHP)
   - PHP (Versión 7.0 o superior)
   - Servidor de base de datos MySQL incluido en XAMPP

2. Configuración del Proyecto:
- Clone o descargue el repositorio en la carpeta 'htdocs' de XAMPP, cree una carpeta llamada php y guardelo llamandolo sistemaVotacion de su directorio de instalación de XAMPP.

3. Configuración de la Base de Datos:
   - Inicie el servidor Apache y MySQL en XAMPP.
   - Abra phpMyAdmin desde el panel de control de XAMPP.
   - Cree una base de datos llamada 'sistemavotos' <-- para evitar problemas con verificaciones.
   - Importe el archivo de respaldo de la base de datos 'sistemavotos.sql' proporcionado en la carpeta 'db_backup' y ejecutelo en el ambiente phpMyAdmin.

4. Configuración del Proyecto PHP:
   - Asegúrese de tener la extensión mysqli habilitada en su servidor PHP en XAMPP.

5. Configuración del Archivo de Conexión a la Base de Datos:
   - Ajuste los parámetros de conexión a la base de datos en el archivo 'db.php' ubicado en la carpeta 'core'.
   - En este caso el usuario es 'root', contraseña '', y base de datos 'sistemavotos'.

6. Acceso a la Aplicación:
   - Abra su navegador web y acceda a 'http://localhost/php/sistemaVotacion' para ver la aplicación en funcionamiento.


¡Disfrute del proyecto!
