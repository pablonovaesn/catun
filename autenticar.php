<?php

require_once("dao/UsuarioDAO.php");

$email = $_POST["email"];
$senha = $_POST["senha"];

$usuarioDAO = new UsuarioDAO();

$usuario = $usuarioDAO->buscarUsuario($email, $senha);

if ($usuario) {
    session_start();
    $_SESSION["usuario_id"]     = $usuario["id_usuario"];
    $_SESSION["usuario_nome"]   = $usuario["nome"];

    header("Location: index.php?login=true");
} else {
    header("Location: login.php?login=false");
}
