<?php

/*

El alumno creará los ficheros indicados en el enunciado.
- Una vez finalizado el examen subirá comprimidos a la plataforma los ficheros llamando a dicho fichero
nombre_apellido1, dicha fichero incluirá los módulos PHP correspondientes a la resolución del examen, así 
como la captura de pantalla con la creación del usuario jugador.
- El examen ha de realizar sin utilizar código de javascript, es uso de este lenguaje hará que se obtengan 0
puntos en el ejercicio que se haya utilizado.
- El alumno puede realizar la prueba de conocimientos usando todos los apuntes, prácticas y ejercicios
resueltos que considere oportunos, puede reutilizar todo el código que considere necesario, para ello puede usar un lápiz de memoria donde tendrá almacenado todo el material que desee.
- Se presuponen los conocimientos necesarios de HTML y SQL para poder realizar las pruebas de conocimientos
de este módulo satisfactoriamente.
- El examen está valorado sobre 10 puntos

    Inicio del ejercicio
-A partir de una tabla de datos llamada jugadores, se importará la estructura del fichero facilitado a tal fin desde phpMyAdmin creando para 
 ello una base de datos llamada CARTAS.

Se facilita un módulo de php llamado entrada.php, dicho módulo es un formulario de entrada que pide login y clave como el que se puede 
ver debajo

Pantalla a mostrar:

Iniciar sesión                          Iniciar sesión 
                                        Credenciales incorrectas. Inténtalo de nuevo.
Usuario: cuadro de texto                Usuario: cuadro de texto
Contraseña: cuadro de texto             Contraseña: cuadro de texto
Entrar                                  Entrar

Ejercicio 1 – Introducir el resultado del jeroglífico del día (6 puntos)
Crear un módulo llamado mostrarcartas.php. Este módulo consiste en un juego de cartas en las que aparecen seis cartas boca abajo 
siempre en parejas de dos colocadas de forma aleatoria, se muestran a continuación alguna de las combinaciones posibles. 

Posible combinación 1
    copas_03.jpg copas_02.jpg copas_02.jpg copas_03.jpg copas_05.jpg copas_05.jpg
Posible combinación 2
    copas_02.jpg copas_02.jpg copas_05.jpg copas_03.jpg copas_05.jpg copas_03.jpg
Posible combinación 3
    copas_02.jpg copas_03.jpg copas_05.jpg copas_05.jpg copas_03.jpg copas_02.jpg

A partir de una de las combinaciones posibles se ha de diseñar una pantalla similar al que se muestra debajo, en dicha pantalla se ha de dar 
la bienvenida al usuario que está jugando. Inicialmente el juego comenzará con la pantalla cumpliendo las siguientes condiciones:

    - Se genera de una combinación de 6 cartas aleatoria  en parejas de 2 que se recordará a lo largo de la jugada. 
    - El número de CARTAS LEVANTADAS estará a 0 o vació. 
    - Las casillas de PAREJA estarán vacías (se podrán seleccionar  valores entre 1 y 6). 
    - Todas las cartas boca abajo (en negro). 

A partir de este punto comienza el juego, se ha de pulsar uno de los 6 botones de Levantar carta, esto hará que aparezca volteada la carta 
que ocupe dicha posición (como se puede ver en la imagen se pulsó el botón  Levantar carta 4), esta operación se puede repetir las veces 
que  se  desee  sin  que  cambie  la  combinación  aleatoria  generada  al  inicio  de  la  jugada.  Cada  vez  que  se  levante  una  carta  se  ha  de 
incrementar  en  una  unidad  la  caja  Cartas  levantadas,  una  vez  que  sepamos  que  posiciones  ocupa  una  pareja  las  introduciremos  en  las 
cajas Pareja y pulsaremos el botón Comprobar, lo que nos hará pasar a la página de comprobaciones .

Pantalla a mostrar:

Bienvenid@, nombre del usuario

Cartas levantadas: 4

Levantar carta: 1, Levantar carta: 2, Levantar carta: 3, Levantar carta: 4, Levantar carta: 5, Levantar carta: 6
Pareja 1: 1, Pareja 2: 4    Comprobar

boca_abajo.jpg, boca_abajo.jpg, boca_abajo.jpg, copas_02.jpg.jpg, boca_abajo.jpg, boca_abajo.jpg

a) Mostrar el mensaje de bienvenida nombre del usuario que ha accedido (0,25 puntos). 
b) Generar los 6 botones de Levantar carta en un formulario dinámico (un solo botón) correctamente  (1 punto). 
c) Generar las cajas de pareja (valores entre 1 y 6) y el botón comprobar (0,25 punto). 
d) Generar una combinación aleatoria de 6 cartas con combinaciones de 2 como la que se indica en los ejemplos (1,5 punto). 
e) Generar una secuencia de 6 cartas boca abajo (0,5 puntos) 
f) Que  al  pulsar  cada  uno  de  los  6  botones  Levantar  carta  se  muestre  la  carta  correspondiente  y  no  se  pierda  la  combinación 
generada aleatoria .Cada vez que se pulsa de un nuevo botón de Levantar Carta se ha de poner de nuevo todas boca abajo excepto 
la  que  se  ha  pulsado  el  botón  .    Si  no  se  pone  de  nuevo  la  carta  boca  abajo  se  restarán  1,25  puntos  del  total.  Si  se  pierde  la 
combinación aleatoria en cada pulsación se restarán  1,25 puntos del total. (2,5 puntos)

Ejercicio 3 – Ver resultados 4 puntos 
Al pulsar el botón comprobar se pasa al módulo de resultado.php. La pantalla  ha de mostrar la información que se puede ver debajo, si la 
combinación de posiciones que introdujo el usuario corresponde a una pareja de cartas, si es así indicará “Acierto posiciones X y Z después 
de N intentos”, si el usuario ha fallado se mostrará “Fallo posiciones X y Z después de N intentos”. Si es acierto se sumará 1  puntos  en  el 
campo puntos y el número de intentos en el campo Extra en la tabla jugador. Si es fallo se restará 1 punto en el campo puntos y el número 
de intentos en el campo Extra en la tabla jugador.  Además se mostrará la tabla de puntos por jugador una vez actualizada.

Pantalla mostrada: 

Bienvenid@, nombre del jugador

Fallo posiciones X y Z despues de N intentos

Se le restará 1 punto, así como 3 intentos

Puntos por Jugador
 ____________________________________
|Nombre      | Puntos        | Extra |
|____________|_______________|_______|
|Jugador1    | 0             | 0     |
|____________|_______________|_______|
|Jugador2    | 0             | 0     |
|____________|_______________|_______|
|Jugador3    | 0             | 0     |
|____________|_______________|_______|
|Jugador4    |-1             | 10    |
|____________|_______________|_______|
|Jugador5    | 0             | 0     |
|____________|_______________|_______|
|Jugador6    | 0             | 0     |
|____________|_______________|_______|
|Jugador7    | 2             | 7     |
|____________|_______________|_______|

a) Mostrar correctamente el mensaje de bienvenida (0,25 puntos). 
b) Mostrar correctamente el mensaje de Fallo (1 puntos). 
c) Mostrar correctamente el mensaje de Acierto (1  puntos). 
d) Actualizar correctamente en la base de datos los puntos y los extra (0,75 puntos). 
e) Mostrar correctamente la tabla de datos 1 vez actualizada (1 puntos)