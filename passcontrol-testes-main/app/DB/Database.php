<?php

class Database{
    
    public $conn;
    private string $local = 'localhost';
    private string $db = 'passcontrol_2';
    private string $user = 'root'
    private string $password = '';
    private string $table;

    public function __construct($table = null){
        $this->table = $table;
        $this->connecta();
    }

    public function connecta(){
        try{
            $this->conn new PDO("mysql:host=".$this->local.";dbname=".$this->db,$this->user,$this->password);
            $this->conn->setAtribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $err){
            die("Falha na conexão". $err->getMessage());
        }
    }

    public function execute($query, $binds = []){

        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        }catch(PDOException $err){
            die("Falha na conexão". $err->getMessage());
        }
    }
}

?>