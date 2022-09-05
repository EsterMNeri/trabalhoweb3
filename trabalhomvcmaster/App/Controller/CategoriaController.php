<?php


namespace App\Controller;
use App\Model\CategoriaModel;



/**
 * Classe para determinar quais rotas...
 */
class CategoriaController 
{
    public static function index() 
    {
       
        $model = new CategoriaModel();
        $model->getAllRows();

        include 'View/modules/Categoria/ListarCategoria.php';
    }

    public static function form()
    {
        
        $model = new CategoriaModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);

        include 'View/modules/Categoria/FormCategoria.php';
    }

    public static function save() {

        

        $categoria = new CategoriaModel();
        $categoria->id = $_POST['id'];
        $categoria->nome = $_POST['nome'];
        $categoria->save();

        header('location: /categoria');
    }

    public static function delete()
    {
        

        $model = new CategoriaModel();
        $model->delete( (int) $_GET['id'] );

        header("Location: /categoria");
    }
}