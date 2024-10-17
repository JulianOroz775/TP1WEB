<?php

class vehiculosModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=concecionario1;charset=utf8', 'root', '');
    }
 
    public function getVehiculos() {
        // 2. Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM vehiculos');
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $vehiculos = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $vehiculos;
    }
 
    public function getVehiculosMarca($marca) {    
        $query = $this->db->prepare('SELECT * FROM vehiculos WHERE Marca = ?');
        $query->execute([$marca]);   
    
        $vehiculos = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $vehiculos;
    }

    public function getVehiculo($id) {    
        $query = $this->db->prepare('SELECT * FROM vehiculos WHERE id = ?');
        $query->execute([$id]);   
    
        $vehiculo = $query->fetch(PDO::FETCH_OBJ);
    
        return $vehiculo;
    }
 
    public function insertTask($title, $description, $priority, $finished = false) { 
        $query = $this->db->prepare('INSERT INTO tareas(titulo, descripcion, prioridad, finalizada) VALUES (?, ?, ?, ?)');
        $query->execute([$title, $description, $priority, $finished]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
 
    public function eraseTask($id) {
        $query = $this->db->prepare('DELETE FROM tareas WHERE id = ?');
        $query->execute([$id]);
    }

    public function updateTask($id) {        
        $query = $this->db->prepare('UPDATE tareas SET finalizada = 1 WHERE id = ?');
        $query->execute([$id]);
    }
}