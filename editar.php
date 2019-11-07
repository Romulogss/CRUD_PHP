<!DOCTYPE html>
<?php
include_once 'controllers.php';
editar();
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Crudizão</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 style="text-align: center; margin-top: 10px">Atualize suas informações</h2>
                <form method="post" action="<?php editar(); ?>" class="jumbotron" style="margin-top: 15px">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input required class="form-control" type='text' placeholder="Romulo Sousa Sá" id="nome" name="nome" value="<?php if (!empty($pessoa['nome'])) echo $pessoa['nome'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nascimento">Data de nascimento</label>
                        <input required type='date' id="nascimento" class="form-control" name="data_nascimento" value="<?php if (!empty($pessoa['data_nascimento'])) echo $pessoa['data_nascimento'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="escolaridade">Escolaridade</label>
                        <select required name="escolaridade" id="escolaridade" class="form-control">
                            <option value="" <?php if(empty($pessoa['escolaridade'])) echo "selected" ?>>Escolha sua escolaridade</option>
                            <option value="fundamental" <?php if($pessoa['escolaridade'] === 'fundamental') echo "selected" ?>>Fundamental</option>
                            <option value="medio" <?php if($pessoa['escolaridade'] === 'medio') echo "selected" ?>>Médio</option>
                            <option value="superior" <?php if($pessoa['escolaridade'] === 'superior') echo "selected" ?>>Superior</option>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required id="masculino" class="form-check-input" type="radio" value="m" <?php if (!empty($pessoa['sexo'])) if($pessoa['sexo']==='m') echo "checked"; ?> name="sexo">
                        <label for="masculino" class="form-check-label">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required id="feminino" class="form-check-input" type="radio" value="f" <?php if (!empty($pessoa['sexo'])) if($pessoa['sexo']==='f') echo "checked"; ?> name="sexo">
                        <label for="feminino" class="form-check-label">Feminino</label>
                    </div>
                    <div class="form-group form-check" style="margin-top: 15px;">
                        <input class="form-check-input" value="s" type="checkbox" id="filhos" name="tem_filhos" <?php if($pessoa['tem_filhos']) echo "checked";?> >
                        <label for="filhos" class="form-check-label">Tem filhos?</label>
                    </div>
                    <div class="justify-content-around" style="text-align: center;">
                        <a href="index.php"><button type="submit" class="btn btn-primary" id="salvar">Salvar</button></a>
                        <a href="index.php" class="btn btn-primary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>