<?php
function abriBancoDeDados()
{
    try {

        $conexao = new mysqli('localhost', 'root', '', 'crud');
        mysqli_set_charset($conexao, 'utf8');
        return $conexao;
    } catch (Exception $e) {
        echo $e->getMessage();
        return null;
    }
}

function fecharBandoDeDados($banco)
{
    try {
        mysqli_close($banco);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function buscar($id = null)
{
    $banco = abriBancoDeDados();
    $achou = null;
    try {
        if ($id) {
            $sql = "SELECT * FROM pessoa WHERE id=" . $id;
            $resultado = $banco->query($sql);

            if ($resultado->num_rows > 0) {
                $achou = $resultado->fetch_assoc();
            }
        } else {
            $sql = "SELECT * FROM pessoa";
            $resultado = $banco->query($sql);

            if ($resultado->num_rows > 0) {
                $achou = $resultado->fetch_all(MYSQLI_ASSOC);
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = 'danger';
    }

    fecharBandoDeDados($banco);
    return $achou;
}

function salvar($data = null)
{
    $banco = abriBancoDeDados();
    $colunas = null;
    $valores = null;

    foreach ($data as $chave => $valor) {
        $colunas .= trim($chave, "'") . ",";
        $valores .= "'$valor',";
    }

    $colunas = rtrim($colunas, ',');
    $valores = rtrim($valores, ',');

    $sql = "INSERT INTO pessoa " . "(id,$colunas)" . " VALUES " . "(NULL,$valores);";

    try {
        $banco->query($sql);
        $_SESSION['message'] = 'Registrado com sucesso!';
        $_SESSION['type'] = 'sucess';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }

    fecharBandoDeDados($banco);
}

function atualizar($id = 0, $data = null)
{
    $banco = abriBancoDeDados();
    $itens = null;

    foreach ($data as $chave => $valor) {
        $itens .= trim($chave, "'") . "='$valor',";
    }

    $itens = rtrim($itens, ",");

    $sql = "UPDATE pessoa SET $itens WHERE id=" . $id;

    try {
        $banco->query($sql);
        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }

    fecharBandoDeDados($banco);
}

function remover($id)
{
    $banco = abriBancoDeDados();

    try {
        if ($id) {
            $sql = "DELETE FROM pessoa WHERE id=" . $id;
            $resultado = $banco->query($sql);

            if ($resultado = $banco->query($sql)) {
                $_SESSION['message'] = "Registro Removido com Sucesso.";
                $_SESSION['type'] = 'success';
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }

    fecharBandoDeDados($banco);
}
