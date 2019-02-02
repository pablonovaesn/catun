<?php

    require_once("dao/UsuarioDAO.php"); 

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $usuarioDAO = new UsuarioDAO();
    $resultado = $usuarioDAO->cadastrarUsuario($nome, $email, $senha);

    header("Location: cadastro.php?cadastro=true");

?>