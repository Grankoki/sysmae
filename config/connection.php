<?php
class Connection {    
    public $db;
    
    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost; dbname=bd_iepmae','root','admin');
        } catch (PDOException $e) {
                echo "Error -->: ".$e->getMessage();
        }
    }
    
    public function CloseConnection() {
        $this->db = null;
    }
}
?>