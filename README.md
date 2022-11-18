**ASISTENTE GENERADOR DE REPORTES**

**Resumen Del Proyecto:** Construir un módulo que permita administrar y configurar una base dedatos (independiente de su MER) para generar de forma dinámica reportes SQL mediante asistentesguiados que faciliten al usuario final la construcción de sus consultas particulares que puedan ser exportados a formatos estándar de salida como Excel, PDF o JSON (para APIs).El sistema internamente conocerá cuáles son las tablas, y columnas que estarán disponibles para losreportes, permitirá internamente configurar o conocer cómo se realizan los cruces (JOINS) entre los campos seleccionados y permitirá establecer criterios para filtros, grupos o campos calculados deacuerdo a lo que el usuario requiera sin mayor conocimiento de SQL o la estructura de datos final

**Pre Requisitos:**

-Instalación de Laravel
-Instalación de Xampp, version PHP 7.4.30
-Instalación de Composer
-Instalación Sql Server 2017

**Instrucciones de Instalación**

Una vez realizada la instalación de todos los prerrequisitos, para hacer uso de este sistema debemos de realizar la extracción de los datos que se encuentran dentro de este en la ruta de Xampp exactamente en la carpeta "Htdocs" de modo que si no situamos el sistema dentro de esta ruta no será posible hacer uso de esta.

**Instrucciones de uso**

Previamente realizada la instalación de todos los pre requisitos solicitados, al momento de hacer uso de este sistema debemos realizar una modificación en lo que refiere a el archivo .env el que hace referencia a nuestras variables de entorno donde modificaremos las líneas referentes a la base de datos que usaremos, siguiendo estos pasos: 

- **DB_CONNECTION**=sqlsrv (Modificar en caso de utilizar una conexión diferente a SQL SERVER)
- **DB_PORT**= 1433 (Puerto de la base de datos)
- **DB_HOST** = 127.0.0.1 (localhost o IP)
- **DB_DATABASE** = (Nombre de la base de dato a utilizar)
- **DB_USERNAME** = (nombre  de usuario para realizar conexión)
- **DB_PASSWORD** =  (Clave de acceso para el usuario)

Una vez completada la configuración previa de este para hacer uso del sistema, será momento de levantar nuestro servidor para utilizar el sistema con todas sus funcionalidades, para lo cual debemos encontrarnos en la ruta de "Htdocs", exactamente en la carpeta del sistema para abrir un CMD y poder inicializar el servidor, para ello utilizamos la siguiente instrucción "php artisan serve".
Posterior a inicializar nuestro servidor, este nos retornará un mensaje que se realizó de forma correcta entregándonos el "link" con el cual podremos hacer uso de este. "Starting Laravel development server: http://127.0.0.1:8000"
A continuación copiamos el enlace en nuestro navegador y podremos trabajar con nuestro generador de reportes.

