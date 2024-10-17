<?php

class TaskView {
    private $user = null;

    public function __construct($user) {
        $this->user = $user;
    }

    public function showMarcas($marcas) {
        // la vista define una nueva variable con la cantida de marcas
        $count = count($marcas);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require 'templates/lista_marcas.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

    public function mod($id){
        require 'templates/editar_marcas.phtml';
    }

}