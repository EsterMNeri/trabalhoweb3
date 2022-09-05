<?php

namespace App\Model;
use App\DAO\PessoaDAO;

class PessoaModel
{
    /**
     * Declaração das propriedades conforme campos da tabela no banco de dados.
     */
    public $id, $nome, $rg, $cpf;
    public $data_nascimento, $email;
    public $telefone, $endereco;

    public $rows;


    /**
     * Declaração do método save que chamará a DAO para gravar no banco de dados
     * o model preenchido.
     */
    public function save()
    {
        

        $dao = new PessoaDAO();

           // Se id for nulo, significa que trata-se de um novo registro
        // Se id nao for nu, é um update poque a chave primária já existe.
        if($this->id == null) 
        {
            
            $dao->insert($this);
        } else {
        
            $dao->update($this);
        }
    }

    public function getAllRows(){

        

        $dao = new PessoaDAO();
        $this->rows = $dao->getAllRows();
    }

    public function getById(int $id)
    {
        

        $dao = new PessoaDAO();

        $obj = $dao->selectById($id); 

        
        return ($obj) ? $obj : new PessoaModel(); 
    }

    public function delete(int $id)
    {
        

        $dao = new PessoaDAO();
        $dao->delete($id);
    }
}