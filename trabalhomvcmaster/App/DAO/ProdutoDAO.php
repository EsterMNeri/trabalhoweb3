<?php

namespace App\DAO;
use App\Model\ProdutoModel;
use \PDO;


class ProdutoDAO
{
    private $conexao;

    function __construct() {
        $dsn = "mysql:host=localhost:3306;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        $this->conexao = new PDO($dsn, $user, $pass);
    }

    function insert(ProdutoModel $model){
        $sql = "INSERT INTO produto
                (codigo, produto, valor, descricao, data, id_categoria) VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->codigo);
        $stmt->bindValue(2, $model->produto);
        $stmt->bindValue(3, $model->valor);
        $stmt->bindValue(4, $model->descricao);
        $stmt->bindValue(5, $model->data);
        $stmt->bindValue(6, $model->id);
        $stmt->execute();   
    }

    public function selectById(int $id){
        

        $sql = "SELECT * FROM produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App/Model/ProdutoModel");
    }

    public function update(produtoModel $model){
        $sql = "UPDATE produto SET codigo=?, produto=?, valor=?, descricao=?, data=?, id=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->codigo);
        $stmt->bindValue(2, $model->codigo);
        $stmt->bindValue(3, $model->valor);
        $stmt->bindValue(4, $model->descricao);
        $stmt->bindValue(5, $model->data);
        $stmt->bindValue(6, $model->id);
        $stmt->execute();
    }

    function getAllRows(){
        $sql = "SELECT p.id, p.codigo, p.produto, p.valor, p.descricao, p.data, c.nome categoria FROM produto p JOIN categoria c ON c.id = p.id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}