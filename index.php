<!DOCTYPE html>
<?php
include_once 'controllers.php';
include_once 'data.php';
mostrarTodos();

?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Crudizão</title>

</head>

<body>
<div class="modal fade" id="modal-excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Pessoa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir essa pessoa?
            </div>
            <div class="modal-footer">
                <? if (isset($_GET['id'])) : ?>
                    <form action="<?php excluir(); ?>" method="get">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        <a class="btn btn-danger" id="confirm" href="#">Sim</a>
                    </form>
                <?php else : ?>
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <a class="btn btn-danger" id="confirm" href="#">Sim</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h2 style="text-align: center; margin-top: 10px">Cadastre suas informações</h2>
            <form method="post" action="<?php adicionar(); ?>" class="jumbotron" style="margin-top: 15px">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input required class="form-control" type='text' placeholder="Seu nome completo" id="nome"
                           name="nome">
                </div>
                <div class="form-group">
                    <label for="nascimento">Data de nascimento</label>
                    <div class="form-inline">
                        <input style="width: 60%;" required onblur="calcularIdade()" type='date' id="nascimento"
                               class="form-control" name="data_nascimento"
                        >
                        <label id="idade" style="margin-left:15px;"></label>
                    </div>

                </div>
                <div class="form-group">
                    <label for="escolaridade">Escolaridade</label>
                    <select required name="escolaridade" id="escolaridade" class="form-control">
                        <option value="" selected>Selecione sua escolaridade</option>
                        <option value="Fundamental">Fundamental</option>
                        <option value="Médio">Médio</option>
                        <option value="Superior">Superior</option>
                    </select>
                </div>
                <label>Sexo</label> <br>
                <div class="form-check form-check-inline">
                    <input required id="masculino" class="form-check-input" type="radio"
                           value="m" name="sexo">
                    <label for="masculino" class="form-check-label">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input required id="feminino" class="form-check-input" type="radio"
                           value="m" name="sexo">
                    <label for="feminino" class="form-check-label">Feminino</label>
                </div>
                <div class="form-group form-check" style="margin-top: 15px;">
                    <input class="form-check-input" type="checkbox" id="filhos" name="tem_filhos">
                    <label for="filhos" class="form-check-label">Tem filhos?</label>
                </div>
                <div class="justify-content-around" style="text-align: center;">
                    <a href="index.php">
                        <button type="submit" class="btn btn-primary" id="salvar">Salvar</button>
                    </a>
                    <button type="reset" class="btn btn-primary">Limpar</button>
                </div>
            </form>
        </div>
        <div class="col-lg-8 col-sm-12">
            <h2 style="text-align: center; margin-top: 10px">Cadastrados</h2>
            <table class="table table-bordered" style="text-align:center;">
                <thead>
                <tr>
                    <th scope="col" class="sr-only">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Escolaridade</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Filhos</th>
                    <th scope="col">Operações</th>
                </tr>
                </thead>
                <tbody>

                <?php if ($pessoas) : ?>

                    <?php foreach ($pessoas as $pessoa) : ?>

                        <tr>
                            <td colspan="0" class="sr-only" name="id"><?php echo $pessoa['id']; ?></td>
                            <td><?= $pessoa['nome'] ?></td>
                            <td><?= calculo_idade($pessoa['data_nascimento']) ?> anos</td>
                            <td>Ensino <?= $pessoa['escolaridade'] ?></td>
                            <td><?= $pessoa['sexo'] === "m" ? "Masculino" : "Feminino"; ?></td>
                            <td><?= $pessoa['tem_filhos'] ? "Sim" : "Não" ?></td>
                            <td>
                                <form action="<?php editar(); ?>" method="get">
                                    <a class="btn btn-sm btn-primary" href="editar.php?id=<?php echo $pessoa['id']; ?>">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                       data-target="#modal-excluir" data-pessoa="<?php echo $pessoa['id']; ?>"
                                       data-nome="<?php echo $pessoa['nome'] ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                <?php else : ?>
                    <tr>
                        <td colspan="7" style="text-align:center;">Nenhum registro encontrado</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="main.js?<?php echo time(); ?>"></script>
</body>

</html>