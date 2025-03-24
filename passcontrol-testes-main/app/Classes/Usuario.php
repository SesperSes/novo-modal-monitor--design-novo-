<?php

require_once './App/DB/Database.php';

class Usuario {

    private $pdo;
    private $table_name = "usuario";
    
    public int $id_usuario;
    public string $nome_usuario;

    public function __construct($db) {
        $this->pdo = $db;
    }

    public function cadastrar() {
        try {
            $sql_code = "INSERT INTO " . $this->table_name . " (nome_usuario) VALUES (:nome_usuario)";
            $stmt = $this->pdo->prepare($sql_code);
            $stmt->bindParam(":nome_usuario", $this->nome_usuario);
    
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

    public function buscar_por_id($id_usuario) {
        $obj = $this->pdo->select('id_usuario = ' . $id_usuario)->fetchObject(self::class);
        return $obj;
    }
}

