<?php

abstract class Crud {
    
    protected $db;
    protected $table;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    abstract public function insert();
    abstract public function update();
    
    public function find($id) {
        $stmt = $this->db->prepare("select * from $this->table where id=$id");
        $stmt->execute();
        return $stmt;
    }
    
    public function fetchAll() {
        $stmt = $this->db->prepare("select * from $this->table");
        $stmt->execute();
        return $stmt;
    }
    
    public function delete($id) {
        $stmt = $this->db->prepare("delete from $this->table where id=$id");
        $stmt->execute();
    }
    
}//Fecha classe Crud
