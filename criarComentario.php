<?php

include_once("dao/ComentarioDAO.php");

$id_anuncio = $_POST['id_anuncio'];
$id_usuario = $_POST['id_usuario'];
$comentario = $_POST['msg'];

$comentarioDAO = new ComentarioDAO();

$resultado = $comentarioDAO->criarComentario($id_anuncio, $id_usuario, $comentario);

if ($resultado[0]) {
    header("Location: ".$_SERVER['HTTP_REFERER']."");
} else {
    header("Location: ".$_SERVER['HTTP_REFERER']."");
}
