<?php
include_once 'DAO.php';

    function listar(){
        return buscar();
    }


    function salvarRN($data) {
        salvar($data);
    }

    function editarRN($id, $data) {
        if($id != null && $id != 0){
            atualizar($id, $data);
        }
    }

    function excluirRN($id){
         remover($id);
         header('location: index.php');
    }
