<?php
require_once 'app/models/model.php';
class vehiculosModel extends Model {
    
 
    public function getVehiculos($marca) {    
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
    public function insertVehiculo($marca,$Kilometros, $Patente, $Modelo) { 
        $query = $this->db->prepare('INSERT INTO vehiculos(marca, Kilometros, Patente, Modelo) VALUES (?, ?, ?, ?)');
        $query->execute([$marca, $Kilometros, $Patente, $Modelo]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
    
    public function eraseVehiculo($id) {
        $query = $this->db->prepare('DELETE FROM vehiculos WHERE id = ?');
        $query->execute([$id]);
    }

    public function updateVehiculo($id) {        
        $query = $this->db->prepare('UPDATE vehiculos SET finalizada = 1 WHERE id = ?');
        $query->execute([$id]);
    }

    public function modVehiculo($id, $marca, $kilometros, $patente, $modelo) {
        $query = $this->db->prepare("UPDATE vehiculos SET Marca = ?, Kilometros = ?, Patente = ?, Modelo = ? WHERE id = ?");
        $query->execute([$marca, $kilometros, $patente, $modelo, $id]);
    }

}
