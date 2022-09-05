<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'config.php';
include 'autoload.php';
 
use App\Controller\{
    CategoriaController,
    PessoaController,
    ProdutoController,
};

switch($uri_parse)
{
    /*
    Estrutura:
    Caso a rota seja "/pessoa"
    O objeto PessoaControler vai executar a função "index()"
    */

    //Todos os outros comentários estão em todos os arquivos relacionados a Categoria

    //Rotas de Pessoa
    case '/pessoa':
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/save':
        PessoaController::save();
    break;

    case '/pessoa/excluir':
        PessoaController::delete();
    break;

    //Rotas de Produto
    case '/produto':
        ProdutoController::index();
    break;

    case '/produto/form':
        ProdutoController::form();
    break;

    case '/produto/save':
        ProdutoController::save();
    break;

    case '/produto/excluir':
        ProdutoController::delete();
    break;

    //Rotas de Categoria
    case '/categoria':
        CategoriaController::index();
    break;

    case '/categoria/form':
        CategoriaController::form();
    break;

    case '/categoria/save':
        CategoriaController::save();
    break;

    case '/categoria/excluir':
        CategoriaController::delete();
    break;

    default:
        echo "Erro 404";
    break;
}