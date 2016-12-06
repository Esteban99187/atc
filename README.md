# atc

Instalación:

1- Instalar WampServer
2- Instalar PostgreSQL
3- Habilitar Extensiones pgsql y pdo_pgsql
4- Agregar en la variable PATH el directorio bin y lib de la instalación del Postgresql.
5- Modificar el archivo phpmyadmin.conf para otorgar acceso a todos. 
	Remover linea (Deny from all)
	Modificar linea (Allow from 127.0.0.1) por (Allow from all)
6- Crear usuario admin en MySQL y Postgresql 
7- Crear BD atcsistem en MySQL y Postgresql
8- Restaurar backup en MySQL y Postgresql