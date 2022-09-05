<?php


namespace App\Controller;
use App\Model\PessoaModel;


/**
 * Classes Controller são responsáveis por processar as requisições do usuário.
 * Isso significa que toda vez que um usuário chama uma rota, um método (função)
 * de uma classe Controller é chamado.
 * O método poderá devolver uma View (fazendo um include), acessar uma Model (para
 * buscar algo no banco de dados), redirecionar o usuário de rota, ou mesmo,
 * chamar outra Controller.
 */
class PessoaController 
{
    /**
     * Os métodos index serão usados para devolver uma View.
     */
    public static function index() 
    {
        
        $model = new PessoaModel();
        $model->getAllRows();
    


        include 'View/modules/Pessoa/ListaPessoas.php';
    
    }

    public static function form()
    {
       
        $model = new PessoaModel();

        if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
            $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
            // Para saber mais sobre Typecast, leia: https://tiago.blog.br/type-cast-ou-conversao-de-tipos-do-php-isso-pode-te-ajudar-muito/

        include 'View/modules/Pessoa/FormPessoa.php'; // Include da View. Note que a variável $model está disponível na View.
    }
    

    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function save() {


        // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
        // pelo usuário no formulário (note o envio via POST)
        $pessoa = new PessoaModel();
        $pessoa->id =  $_POST['id'];
        $pessoa->nome = $_POST['nome'];
        $pessoa->rg = $_POST['rg'];
        $pessoa->cpf = $_POST['cpf'];
        $pessoa->data_nascimento = $_POST['data_nascimento'];
        $pessoa->telefone = $_POST['telefone'];
        $pessoa->save();  // chamando o método save da model.

        header("Location: /pessoa"); // redirecionando o usuário para outra rota.
    }

    public static function delete()
    {
        

        $model = new PessoaModel();
        $model->delete( (int) $_GET['id'] ); 

        header("Location: /pessoa"); 
     }
}