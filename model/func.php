<?php

session_start();

class func{
    private $ConDB;
    public function __construct(){
        $con = new ConDB();
        $con->connect();
        $this->ConDB = $con->conn;
    }

        public function getRabbit(){
            $sql = "SELECT * FROM test_tb";
            $query = $this->ConDB->prepare($sql);
            if($query->execute()){
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            } 
        }

        public function checkDate($today){
            $sql = "SELECT * FROM test_tb";
            $query = $this->ConDB->prepare($sql);
            if($query->execute()){
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row){  
                    $date = new DateTime($row['date']); 
                    $date->modify("-1 day");
                    $date2 = $date->format("Y-m-d");   
                    if($today == $date2){  
                        $_SESSION[$row['name']] = "อีก 1 วันจะเป็นวันคลอดของกระต่าย: ".$row['name'];
                    }
                }
            }
        }
        

    }





?>