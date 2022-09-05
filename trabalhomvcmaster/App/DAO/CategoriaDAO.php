<?php
 
 namespace App\DAO;
 use App\Model\CategoriaModel;
 use \PDO;

class CategoriaDAO
{
    private $conexao;

    function __construct() {
        $dsn = "mysql:host=localhost:3306;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        $this->conexao = new PDO($dsn, $user, $pass);
    }

    function insert(CategoriaModel $model){
        $sql = "INSERT INTO categoria
                (nome) VALUES (?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
  
    }

    function getAllRows(){
        $sql = "SELECT * FROM categoria";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById(int $id){
        

        $sql = "SELECT * FROM categoria WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App/Model/CategoriaModel");
    }

    public function update(CategoriaModel $model){
        $sql = "UPDATE categoria SET nome=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->id);
        $stmt->execute();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM categoria WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}