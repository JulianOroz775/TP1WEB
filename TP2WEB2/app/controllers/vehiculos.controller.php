<?php
require_once './app/models/vehiculos.model.php';
require_once './app/views/vehiculos.view.php';

class vehiculosController {
    private $model;
    private $view;

    public function __construct($res) {
        $this->model = new vehiculosModel();
        $this->view = new vehiculosView($res->user);
    }

    public function showVehiculo($id){

        $vehiculo = $this->model->getVehiculo($id);

        return $this->view->showVehiculo($vehiculo);

    }
    public function showVehiculos($marca) {
        $vehiculos = $this->model->getVehiculos($marca);

        return $this->view->showVehiculos($vehiculos);
    }
    public function addVehiculo() { //TERMINAR
        if (!isset($_POST['marca']) || empty($_POST['marca'])) {
            return $this->view->showError('Falta completar el Modelo');
        }
        if (!isset($_POST['kilometros']) || empty($_POST['kilometros'])) {
            return $this->view->showError('Falta completar los Kilometros');
        }
        if (!isset($_POST['patente']) || empty($_POST['patente'])) {
            return $this->view->showError('Falta completar la Patente');
        }
        if (!isset($_POST['modelo']) || empty($_POST['modelo'])) {
            return $this->view->showError('Falta completar el Modelo');
        }

        $marca = $_POST['marca'];
        $Kilometros = $_POST['kilometros'];
        $Patente = $_POST['patente'];
        $Modelo = $_POST['modelo'];
    
        $id = $this->model->insertVehiculo($marca ,$Kilometros, $Patente, $Modelo );
    
        header('Location: ' . BASE_URL);
    }
    public function deleteVehiculo($id) {

        $vehiculo = $this->model->getVehiculo($id);

        if (!$vehiculo) {
            return $this->view->showError("No existe el vehiculo con el id=$id");
        }

        $this->model->eraseVehiculo($id);

        header('Location: ' . BASE_URL);
    }
    public function finishVehiculo($id) {
        $vehiculo = $this->model->getVehiculo($id);

        if (!$vehiculo) {
            return $this->view->showError("No existe el Vehiculo con el id=$id");
        }

        $this->model->updateVehiculo($id);

        header('Location: ' . BASE_URL);
    }
    
   public function mod($id){
    $this->$id=$id;
    $this->view->mod($id);
}

    public function modVehiculo($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $marca = $_POST['Marca'];
            $kilometros = $_POST['Kilometros'];
            $patente = $_POST['Patente'];
            $modelo = $_POST['Modelo'];

            $this->model->modVehiculo($id, $marca, $kilometros, $patente, $modelo);
            
            header('Location: ' . BASE_URL . 'listar');
            exit;
        } else {
            echo "Método no permitido";
        }
    }
}

