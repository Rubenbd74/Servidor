<?php
    include_once 'Vehiculo.php';
    include_once 'Camion.php';
    include_once 'Coche.php';
    include_once 'Dos_ruedas.php';
    include_once 'Cuatro_ruedas.php';

        $coche = new Coche("verde", 1400);
        $coche->añadir_persona(65);
        $coche->añadir_persona(65);
        echo"El color del coche es: ".$coche->getColor()."<br>";
        echo"El peso del coche es: ".$coche->getPeso()."<br>";
        
        $coche->setColor("rojo");
        $coche->añadir_cadenas_nieve(2);

        echo "Color de el coche: ".$coche->getColor()." Numero de cadenas: ". $coche->getNumero_cadenas_nieve()."</br>";

        $dos_ruedas = new Dos_ruedas("negro",120);
        $dos_ruedas->poner_gasolina(20);

        echo "Color de el dos ruedas: ".$dos_ruedas->getColor()." Peso: ". $dos_ruedas->getPeso()."</br>";

        $camion = new Camion("azul",10000);
        $camion->setLongitud(10);
        $camion->setNumero_Puertas(2);
        $camion->añadir_remolque(5);
        $camion->añadir_persona(80);
        echo"El color del camion es: ".$camion->getColor()."<br>";
        echo"El peso del camion es: ".$camion->getPeso()."<br>";
        echo"El peso del camion es: ".$camion->getNumero_Puertas()."<br>";