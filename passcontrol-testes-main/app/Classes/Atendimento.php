<?php

require_once './App/DB/Database.php';
require_once './App/Classes/Servico.php';
require_once './App/Classes/Usuario.php';

class Atendimento {

    private $pdo;
    private $table_name = "atendimento";

    public int $id_atendimento;
    public int $id_usuario;
    public int $id_servico;
    public int $id_guiche;

    public function __construct($db) {
        $this->pdo = $db;
    }

    public function cadastrar() {
        try {
            $query = "SELECT id_usuario FROM usuario WHERE nome_usuario = :nome_usuario";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([":nome_usuario" => $this->nome_usuario]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $this->id_usuario = $user['id_usuario'];

                $sql_code = "INSERT INTO " . $this->table_name . " (id_usuario, id_servico, id_guiche) VALUES (:id_usuario, :id_servico, :id_guiche)";
                $stmt = $this->pdo->prepare($sql_code);
                $stmt->bindParam(":id_usuario", $this->id_usuario);
                $stmt->bindParam(":id_servico", $this->id_servico);
                $stmt->bindParam(":id_guiche", $this->id_guiche);

                return $stmt->execute();
            } else {
                echo "Usuário não encontrado!";
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro ao cadastrar atendimento: " . $e->getMessage();
            return false;
        }
    }

    public function buscar($where = null, $order = null, $limit = null) {
        $res = $this->pdo->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        return $res;
    }

    public function buscar_por_id($id_atendimento) {
        $obj = $this->pdo->select('id_atendimento = ' . $id_atendimento)->fetchObject(self::class);
        return $obj;
    }
}