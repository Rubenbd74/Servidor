<?php
include_once 'Cuatro_ruedas.php';
    class Camion extends Cuatro_ruedas{
        public $longitud;

        /**
         * Get de longitud
         */ 
        public function getLongitud()
        {
                return $this->longitud;
        }

        /**
         * Set de of longitud
         *
         * @return  self
         */ 
        public function setLongitud($longitud)
        {
                $this->longitud = $longitud;

                return $this;
        }
        function añadir_remolque($longitud){
            $this->setLongitud($longitud);
        }
    }