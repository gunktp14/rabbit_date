<?php
class ConDB{
    public $conn;

    public function connect(){
        try{
            $this->conn = new PDO("mysql:host=localhost;dbname=date_db","root","");
        }catch(PDOException $e){
            echo $e->getMessage(); 
        }
    }
} 
?>