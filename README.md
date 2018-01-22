PROYECTO DE SISTEMAS DISTRIBUIDOS 
Realizado por: Sergio Basurto, Juan Guerrero, Pablo Rugel.
	     
Descripción: Implementar un sistema web, con una arquitectura de microservicios y una caché para reducir la latencia de acceso a la base de datos.
	
Instrucciones:

1) Web browser -> http

2) Reverse proxy (envia solicitudes de contenido de muchos clientes a distintos servidores en Internet) 

->RPC (Programa que utiliza una PC para ejecutar codigo en otra PC remota sin tener que preocuparse por las comunicaciones entre ambas.) (Cliente inicia proceso al servidor que ejecute cierto procedimiento y éste envi de vuelta el resultado de dicha operación al cliente.)

->Microservicios (Para su implementacion utilizaremos SPRING BOOT y SPRING CLOUD) (Pequeños servicios, cada uno ejecutandose de forma autonoma y se comunican entre si mediante mecanismos livianos. Ejemplo: Peticiones REST sobre HTTP por medio de sus APIs.)

3) Database y Cache
Se muestra el almacenamiento y la recuperación de información en una instancia memcache, cargando los datos de MySQL.


