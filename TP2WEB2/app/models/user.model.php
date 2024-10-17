<?php
require_once 'app/models/model.php';
class UserModel extends Model {
   
    public function getUser($nombre_usuario) {    
        $query = $this->db->prepare("SELECT * FROM usuario WHERE nombre_usuario = ?");
        $query->execute([$nombre_usuario]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
}