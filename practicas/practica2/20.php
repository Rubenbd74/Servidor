<?php

/* Implementa un array asociativo con los siguientes valores: 
$estadio_futbol = array(
"Barcelona" => "Camp Nou", 
"Real Madrid" => "Santiago Bernabeu", 
"Valencia" => "Mestalla",
"Real Sociedad" => "Anoeta"
);

- Muestra los valores del array en una tabla, has de mostrar el índice y el valor 
asociado.
- Elimina el estadio asociado al Real Madrid.
- Vuelve a mostrar los valores para comprobar que el valor ha sido eliminado, esta 
vez en una lista numerada.
*/

$estadio_futbol = array(
"Barcelona" => "Camp Nou", 
"Real Madrid" => "Santiago Bernabeu", 
"Valencia" => "Mestalla",
"Real Sociedad" => "Anoeta"
);

print_r($estadio_futbol);
echo "</br>";
unset($estadio_futbol["Real Madrid"]); //Elimina el estadio asociado al Real Madrid
print_r($estadio_futbol);