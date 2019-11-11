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
            <div class="col-lg-4 justify-content-center">
                <h2 style="text-align: center; margin-top: 10px">Atualize suas informações</h2>
                <form method="post" action="<?php editar(); ?>" class="jumbotron" style="margin-top: 15px">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input required class="form-control" type='text' placeholder="Romulo Sousa Sá" id="nome" name="nome" value="<?= $pessoa['nome'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nascimento">Data de nascimento</label>
                        <div class="form-inline">
                            <input required type='date' id="nascimento" class="form-control" name="data_nascimento" value="<?= $pessoa['data_nascimento'] ?>" onblur="calcularIdade()">
                            <label id="idade" style="margin-left:15px;" value="calcularIdade()"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="escolaridade">Escolaridade</label>
                        <select required name="escolaridade" id="escolaridade" class="form-control">
                            <option value="fundamental" <?= $pessoa['escolaridade'] === 'Fundamental' ? "selected" : "" ?>>
                                Fundamental
                            </option>
                            <option value="medio" <?= $pessoa['escolaridade'] === 'Médio' ? "selected" : "" ?>>
                                Médio
                            </option>
                            <option value="superior" <?= $pessoa['escolaridade'] === 'Superior' ? "selected" : "" ?>>
                                Superior
                            </option>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required id="masculino" class="form-check-input" type="radio" value="m" <?= $pessoa['sexo'] === 'm' ? "checked" : "" ?> name="sexo">
                        <label for="masculino" class="form-check-label">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input required id="feminino" class="form-check-input" type="radio" value="f" <?= $pessoa['sexo'] === 'f' ? "checked" : "" ?> name="sexo">
                        <label for="feminino" class="form-check-label">Feminino</label>
                    </div>
                    <div class="form-group form-check" style="margin-top: 15px;">
                        <input class="form-check-input" value="s" type="checkbox" id="filhos" name="tem_filhos" <?= $pessoa['tem_filhos'] ? "checked" : "" ?>>
                        <label for="filhos" class="form-check-label">Tem filhos?</label>
                    </div>
                    <div class="justify-content-around" style="text-align: center;">
                        <a href="index.php">
                            <button type="submit" class="btn btn-primary" id="salvar">Salvar</button>
                        </a>
                        <a href="index.php" class="btn btn-primary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="main.js?<?php echo time(); ?>"></script>
    <script>
        calcularIdade();
    </script>
</body>

</html>