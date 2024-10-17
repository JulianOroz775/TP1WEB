<?php
require_once './app/models/marcas.model.php';
require_once './app/views/marcas.view.php';

class marcasController {
    private $model;
    private $view;
    private $id;

    public function __construct($res) {
        $this->model = new marcasModel();
        $this->view = new TaskView($res->user);
    }

    public function showMarcas() {
        // obtengo las marcas de la DB
        $marcas = $this->model->getMarcas();

        // mando las marcas a la vista
        return $this->view->showMarcas($marcas);
    }

    public function addMarca() {
        if (!isset($_POST['Marca']) || empty($_POST['Marca'])) {
            return $this->view->showError('Falta completar la Marca');
        }
        if (!isset($_POST['Origen']) || empty($_POST['Origen'])) {
            return $this->view->showError('Falta completar el Origen');
        }
        if (!isset($_POST['FechaFundacion']) || empty($_POST['FechaFundacion'])) {
            return $this->view->showError('Falta completar la Fecha de fundacion');
        }
    
    
        //if (!isset($_POST['priority']) || empty($_POST['priority'])) {
          //  return $this->view->showError('Falta completar la prioridad');
      //  }
    
        $marca = $_POST['Marca'];
        $origen = $_POST['Origen'];
        $fechafundacion = $_POST['FechaFundacion'];
       // $priority = $_POST['priority'];
    
        $id = $this->model->insertMarca($marca, $origen, $fechafundacion);
    
        // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
        header('Location: ' . BASE_URL);
    }

    
    public function deleteMarca($id) {
        // obtengo la tarea por id
        $task = $this->model->getMarca($id);

        if (!$task) {
            return $this->view->showError("No existe la tarea con el id=$id");
        }

        // borro la tarea y redirijo
        $this->model->eraseMarca($id);

        header('Location: ' . BASE_URL);
    }

    public function finishMarca($id) {
        $task = $this->model->getMarca($id);

        if (!$task) {
            return $this->view->showError("No existe la tarea con el id=$id");
        }

        // actualiza la tarea
        $this->model->updateMarca($id);

        header('Location: ' . BASE_URL);
    }

    
   public function mod($id){
        $this->$id=$id;
        $this->view->mod($id);

   }


   public function modMarca($id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $marca = $_POST['Marca'];
        $origen = $_POST['Origen'];
        $fechafundacion = $_POST['FechaFundacion'];

        // Actualiza la marca en la base de datos
        $this->model->modMarca($id, $marca, $origen, $fechafundacion);
        
        // Redirige a la lista de marcas
        header('Location: ' . BASE_URL . 'listar');
        exit;
    } else {
        // Manejo de error si no es un POST
        echo "Método no permitido";
    }
}

}