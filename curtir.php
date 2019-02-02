<?php

include_once("dao/CurtidaDAO.php");

$id_usuario = $_POST["id_usuario"];
$id_anuncio = $_POST["id_anuncio"];

$curtidaDAO = new CurtidaDAO();
$curtidaDAO->criarCurtida($id_usuario, $id_anuncio);

header("Location: index.php");