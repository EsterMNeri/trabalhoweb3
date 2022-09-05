<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/produto/save" method="post">
        <fieldset>
            <legend>Cadastro de Produto</legend>
            <input name="id" id="id" type="hidden" value="<?= $model->id ?>" />
   
            <hr />
            <label for="codigo">Codigo:</label>
            <input name="codigo" id="codigo" type="number" value="<?= $model->codigo ?>" />

            <label for="produto">Produto:</label>
            <input name="produto" id="produto" type="text" value="<?= $model->produto ?>" />

            <label for="descricao">Descrição:</label>
            <input name="descricao" id="descricao" type="text" value="<?= $model->descricao ?>" />

            <label for="data">Data:</label>
            <input name="data" id="data" type="date" value="<?= $model-> data ?>" />

            <label for="valor">Valor:</label>
            <input name="valor" id="valor" type="text" value="<?= $model->valor ?>" />

            <label for="id_categoria">Categoria:</label>
            <select name="id_categoria" id="id_categoria">
            <?php foreach ($modelCategoria->rows as $item) : ?>
                    <option value="<?= $item['id'] ?>"><?= $item['nome'] ?></option>
            <?php endforeach ?>
            </select>
            
            <button type="submit">Enviar</button>
           <hr />
        </fieldset>
    </form>    
</body>
</html>