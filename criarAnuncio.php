<?php 
        require_once("dao/AnuncioDAO.php"); 
        
        $id_usuario = $_POST["id_usuario"];
        $titulo = $_POST["titulo"];
        $estado = $_POST["estado"];
        $preco = $_POST["preco"];
        $descricao = $_POST["descricao"];

        
        $anuncioDAO = new AnuncioDAO();
        $res = $anuncioDAO->criarAnuncio($titulo, $descricao,  $preco, $id_usuario, $estado);

        header("Location: index.php");
/*
        if ($resultado[0]) {
            header("Location: index.php?criado=false");
        } else {
            header("Location: index.php?criado=true");
        }*/