<?php
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/middlewares/verify.auth.middleware.php';
require_once 'app/controllers/marcas.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/vehiculos.controller.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'listar'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// tabla de ruteo

// listar  -> TaskController->showTask();
// nueva  -> TaskController->addTask();
// eliminar/:ID  -> TaskController->deleteTask($id);
// finalizar/:ID -> TaskController->finishTask($id);
// ver/:ID -> TaskController->view($id); COMPLETAR

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'showVehiculo':
        $controller = new vehiculosController($res);
         // Verificar si hay un parámetro
         if (isset($params[1])) {
            $id = $params[1];
            $controller->showVehiculo($id);
        } else {
            echo "Error: No se proporcionó la marca.";
        }
        break; // Agregado el break aquí

    case 'showVehiculos':
        sessionAuthMiddleware($res);
        $controller = new vehiculosController($res);
        
        // Verificar si hay un parámetro
        if (isset($params[1])) {
            $marca = $params[1];
            $controller->showVehiculos($marca);
        } else {
            echo "Error: No se proporcionó la marca.";
        }
        break; // Agregado el break aquí
    // viejo
    case 'listar':
        sessionAuthMiddleware($res);
        $controller = new marcasController($res);
        
        $controller->showMarcas();
        break;
    case 'nueva':
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $controller = new marcasController($res);
        $controller->addMarca();
        break;
    case 'eliminar':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $controller = new marcasController($res);
        $controller->deleteMarca($params[1]);
        break;
    case 'finalizar':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $controller = new marcasController($res);
        $controller->finishMarca($params[1]);
        
        break;
    case 'editar':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new marcasController($res);
        $controller->mod($params[1]);
        break;
        
    case 'modTask':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new marcasController($res);
        $controller->modMarca($params[1]);
        break;
   
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
    default: 
        echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
        break;
}