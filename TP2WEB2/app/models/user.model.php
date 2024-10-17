<?php

class UserModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=concecionario1;charset=utf8', 'root', '');
    }
 
    public function getUser($nombre_usuario) {    
        $query = $this->db->prepare("SELECT * FROM usuario WHERE nombre_usuario = ?");
        $query->execute([$nombre_usuario]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
}