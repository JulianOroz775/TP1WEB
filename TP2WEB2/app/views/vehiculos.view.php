<?php

class vehiculosView {
    private $user = null;

    public function __construct($user) {
        $this->user = $user;
    }

    public function showVehiculo($vehiculo) {
        
        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require 'templates/lista_vehiculo.phtml';
    }

    public function showVehiculos($vehiculos) {
        // la vista define una nueva variable con la cantida de marcas
        $count = count($vehiculos);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require 'templates/lista_vehiculos.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
    public function mod($id){
        require 'templates/editar_vehiculo.phtml';
    }

}