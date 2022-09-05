<?php

 namespace App\Model;
 use App\DAO\CategoriaDAO;


class CategoriaModel
{
    public $id, $nome;

    public $rows;

    public function save()
    {
       

        $dao = new CategoriaDAO();

        if($this->id == null) {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAllRows(){
        

        $dao = new CategoriaDAO();

        $this->rows = $dao->getAllRows();
    }

    public function getById(int $id){
        
        $dao = new CategoriaDAO();
        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new CategoriaModel();
    }

    public function delete(int $id)
    {
        

        $dao = new CategoriaDAO();
        $dao->delete($id);
    }
}