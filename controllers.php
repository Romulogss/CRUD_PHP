<?php
include_once 'RN.php';
$pessoa = null;
$pessoas = null;
function mostrarTodos()
{
    global $pessoas;
    $pessoas = listar();
}

function obter($id = null)
{
    global $pessoa;
    $pessoa = buscar($id);
}

function adicionar()
{
    global $pessoa;
    //echo "tentou";
    if (!empty($_POST['nome']) && !empty($_POST['data_nascimento']) && !empty($_POST['escolaridade']) && !empty($_POST['sexo'])) {
        if (isset($_POST['tem_filhos'])) {
            $pessoa['tem_filhos'] = true;
        } else {
            $pessoa['tem_filhos'] = false;
        }

        $pessoa['nome'] = $_POST['nome'];
        $pessoa['data_nascimento'] = $_POST['data_nascimento'];
        $pessoa['escolaridade'] = $_POST['escolaridade'];
        $pessoa['sexo'] = $_POST['sexo'];

        salvar($pessoa);
        mostrarTodos();
        $pessoa = [];
        header('location: index.php');
    }
}

function editar()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['nome']) && isset($_POST['data_nascimento']) && isset($_POST['escolaridade']) && isset($_POST['sexo'])) {
            if (isset($_POST['tem_filhos'])) {
                $pessoa['tem_filhos'] = true;
            } else {
                $pessoa['tem_filhos'] = false;
            }

            $pessoa['nome'] = $_POST['nome'];
            $pessoa['data_nascimento'] = $_POST['data_nascimento'];
            $pessoa['escolaridade'] = $_POST['escolaridade'];
            $pessoa['sexo'] = $_POST['sexo'];

            atualizar($id, $pessoa);
            header('location: index.php');
        } else {
            global $pessoa;
            $pessoa = buscar($id);
        }
    }
}

function excluir()
{
    if (isset($_GET['id'])) {
        excluirRN($_GET['id']);
    } else {
        die("ERRO: ID não definido.");
    }

    header('location: index.php');
}
