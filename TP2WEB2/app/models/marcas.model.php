<?php

class TaskModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=concecionario1;charset=utf8', 'root', '');
    }
 
    public function getMarcas() {
        // 2. Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM marcas1');
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $marcas = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $marcas;
    }
 
    public function getMarca($id) {    
        $query = $this->db->prepare('SELECT * FROM marcas1 WHERE id = ?');
        $query->execute([$id]);   
    
        $marca = $query->fetch(PDO::FETCH_OBJ);
    
        return $marca;
    }
 
    public function insertMarca($marca, $origen, $fechafundacion, $finished = null) { 
        $query = $this->db->prepare('INSERT INTO marcas1(Marca, Origen, FechaFundacion, finalizada) VALUES (?, ?, ?, ?)');
        $query->execute([$marca, $origen, $fechafundacion, $finished]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
 
    public function eraseMarca($id) {
        $query = $this->db->prepare('DELETE FROM marcas1 WHERE id = ?');
        $query->execute([$id]);
    }

    public function updateMarca($id) {        
        $query = $this->db->prepare('UPDATE marcas1 SET finalizada = 1 WHERE id = ?');
        $query->execute([$id]);
    }

    public function modMarca($id, $marca, $origen, $fechafundacion) {
        $query = $this->db->prepare("UPDATE marcas1 SET Marca = ?, Origen = ?, FechaFundacion = ? WHERE id = ?");
        $query->execute([$marca, $origen, $fechafundacion, $id]);
    }
}