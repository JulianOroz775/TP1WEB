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
        // obtengo los vehiculos de la DB
        $vehiculos = $this->model->getVehiculosMarca($marca);

        // mando los vehiculos a la vista
        return $this->view->showVehiculos($vehiculos);
    }

    public function addTask() {
        if (!isset($_POST['title']) || empty($_POST['title'])) {
            return $this->view->showError('Falta completar el título');
        }
    
        if (!isset($_POST['priority']) || empty($_POST['priority'])) {
            return $this->view->showError('Falta completar la prioridad');
        }
    
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];
    
        $id = $this->model->insertTask($title, $description, $priority);
    
        // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
        header('Location: ' . BASE_URL);
    }

    
    public function deleteTask($id) {
        // obtengo la tarea por id
        $task = $this->model->getVehiculo($id);

        if (!$task) {
            return $this->view->showError("No existe la tarea con el id=$id");
        }

        // borro la tarea y redirijo
        $this->model->eraseTask($id);

        header('Location: ' . BASE_URL);
    }

    public function finishTask($id) {
        $task = $this->model->getVehiculo($id);

        if (!$task) {
            return $this->view->showError("No existe la tarea con el id=$id");
        }

        // actualiza la tarea
        $this->model->updateTask($id);

        header('Location: ' . BASE_URL);
    }
}

