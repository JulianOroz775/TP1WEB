<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        // Muestro el formulario de login
        return $this->view->showLogin();
    }

    public function login() {
        if (!isset($_POST['nombre_usuario']) || empty($_POST['nombre_usuario'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
    
        if (!isset($_POST['contraseña']) || empty($_POST['contraseña'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
    
        $nombre_usuario = $_POST['nombre_usuario'];
        $contraseña = $_POST['contraseña'];
    
        // Verificar que el usuario está en la base de datos
        $userFromDB = $this->model->getUser($nombre_usuario);

        // password: 123456
        // $userFromDB->password: $2y$10$xQop0wF1YJ/dKhZcWDqHceUM96S04u73zGeJtU80a1GmM.H5H0EHC
        if($userFromDB && password_verify($contraseña, $userFromDB->contraseña)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['EMAIL_USER'] = $userFromDB->nombre_usuario;
            $_SESSION['LAST_ACTIVITY'] = time();
    
            // Redirijo al home
            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showLogin('Credenciales incorrectas');
        }
    }

    public function logout() {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header('Location: ' . BASE_URL);
    }
}

