======================================================
Sistema de Administracion de compañia y empleado(WIP).
======================================================

Un pequeño provecto basado en las especificaciones encontradas en este `post <https://laraveldaily.com/test-junior-laravel-developer-sample-project/>`_
el cual decidí hacer en mis horas libres, y en momentos sin internet, y con un enfoque mas orientado en experimentar que en velocidad, en general
mis objetivos en mente durante la conceptualización del sistema fueron los siguientes.

* Obtener experiencia con Docker el cual he comenzado a utilizar muy recientemente.
* Experimentar con diferentes aspectos en un entorno mas controlado y sin tanta presión.
* Practicar con mensajes mas significativos en Git.
* Intentar evaluarme a mi mismo y comprobar que tanto progreso e alcanzado este ultimo año.
* Utilización para base de otros proyectos, algo que pueda ser reutilizable o al menos sirva de punto de referencia.
* Punto de referencia para el próximo año cuando intente medir de nuevo mis mejoras.

Utilizacion
###########

- Utilizar el .env.example como base para el archivo .env
- En caso de trabajar con Docker utilizar el docker-compose.yml.example de base
- Tanto el .env como el archivo .yml están preconfigurados, por lo que pueden ser utilizados como están o se puede modificar los datos de
  mysql por datos personalizados.
- En caso de no utilizar Docker, recordar crear la base de datos primero.
- Generar Key del sistema (**php artisan key:generate**)
- Correr migraciones y seeds.
- Acceso con usuario 
  **email: "admin@admin.com"**
  **password: "password"**

**Nota:**

Debido a las especificaciones dadas no es posible (de momento, luego solo alguien con permisos administrativos podrá hacerlo) crear un nuevo
usuario, por lo que solamente se puede acceder con el usuario creado previamente.

Mejoras Planeadas a futuro
##########################

Dependiendo del panorama a futuro es posible que pueda implementar solo algunas de estas ideas, pero deseo dejarlas como recordatorio
a futuro de lo que le falta ademas las mismas las he separado por versiones, por ultimo si alguien esta interesado podria intentar trabajar
sobre las mismas como forma de practica o reto personal.

**V1.1**

* Crear traducción para español.
* Implementar multiidioma con selector de idioma en el front.

**V1.2**

* Niveles de Usuario con sus respectivos permisos.
* Modificar Seed para tener varios tipos de usuarios creados.
* Mas campos a las tablas de compañía y empleado.

**V1.3**

* Asociar empleado con compañía(s).
* Usuarios solo pueden trabajar con los datos de sus empresas y empleados asociados.

**V1.4**

* Tipos de usuario: Usuarios y Asociados.
* Usuarios pueden crear otros usuarios tipo asociados y especificar permisos y sobre que compañías pueden trabajar.
* Manejo de planes, los cuales darán las pautas para el limite de asociados, compañías y empleados que puede manejar un usuario.
* Permitir al usuario Banear, Bloquear, limitar y brindar permisos temporales de forma fácil y rápida a los asociados.

**V1.5**

* Logs de registro de todo lo que ocurre y quien lo hace.
