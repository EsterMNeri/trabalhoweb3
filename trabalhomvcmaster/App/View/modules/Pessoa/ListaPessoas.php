<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pessoas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
</head>

<body>
    <h1>Lista de Pessoas</h1>
    <table class="bordered striped centered">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>RG</th>
            <th>CPF</th>
            <th>Data Nascimento</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Endereço</th>
      
 

        </tr>

        <?php foreach ($model->rows as $item) : ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['nome'] ?></td>
                <td><?= $item['rg'] ?></td>
                <td><?= $item['cpf'] ?></td>
                <td><?= $item['data_nascimento'] ?></td>
                <td><?= $item['telefone'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['endereco'] ?></td>
                <td><a href="/pessoa/form?id=<?= $item['id'] ?>">editar</a></td>
                <td><a href="/pessoa/excluir?id=<?= $item['id'] ?>">deletar</a></td>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>