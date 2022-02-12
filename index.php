<?php
require_once 'class.php';

$pessoas = Lista::Pessoas();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Lista de Pessoas</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">CEP</th>
                            <th scope="col">UF</th>
                            <th scope="col">Data Nascimento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pessoas as $pessoa) { ?>
                            <tr>
                                <th><?php echo $pessoa->id ?></th>
                                <td><?php echo $pessoa->nome ?></td>
                                <td><?php echo $pessoa->cpf ?></td>
                                <td><?php echo $pessoa->telefone ?></td>
                                <td><?php echo $pessoa->cep ?></td>
                                <td><?php echo $pessoa->uf ?></td>
                                <td><?php echo date('d/m/Y', strtotime($pessoa->data_nascimento)) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>