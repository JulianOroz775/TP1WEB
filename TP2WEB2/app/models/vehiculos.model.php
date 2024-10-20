<?php
require_once 'app/models/model.php';
class vehiculosModel extends Model {
    
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
 

}
