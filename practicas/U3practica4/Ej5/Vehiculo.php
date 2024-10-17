<?php
abstract class Vehiculo {
    public $color;
    public $peso;

    public function __construct($color,$peso)
    {
        $this->color = $color;
        $this->peso = $peso;
    }

    public function circula() {
        echo "El vehículo circula</br>";
    }
    
    abstract function añadir_persona($peso_persona);


    /**
     * Get de color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set de color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get de peso
     */ 
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set de peso
     *
     * @return  self
     */ 
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }
    public function __toString() {
        return "Color " . $this->color . " Peso: " . $this->peso . " kg.</br>";
    }
}