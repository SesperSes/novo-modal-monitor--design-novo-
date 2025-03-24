<?php

require_once './App/DB/Database.php';

class Servico{

    private $pdo;
    private $table_name = "guiche";

    public int $id_servico;
    public string $num_guiche;

    public function __construct($db) {
        $this->pdo = $db;
    }

    public function cadastrar() {
        try {
            $sql_code = "INSERT INTO " . $this->table_name . " (num_guiceh) VALUES (:num_guiche)";
            $stmt = $this->pdo->prepare($sql_code);
            $stmt->bindParam(":num_guiche", $this->num_guiche);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
            return false;
        }
    }

    public function buscar($where = null, $order = null, $limit = null) {
        $res = $this->pdo->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        return $res;
    }

    public function buscar_por_id($id_guiche) {
        $obj = $this->pdo->select('id_guiche = ' . $id_guiche)->fetchObject(self::class);
        return $obj;
    }
}