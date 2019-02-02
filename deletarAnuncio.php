<?php

    include_once("dao/AnuncioDAO.php");

    $id_anuncio = $_POST["id_anuncio"];

    $anuncioDAO = new AnuncioDAO();

    $resultado = $anuncioDAO->deletarAnuncio($id_anuncio);

    header("Location: ".$_SERVER['HTTP_REFERER']."");
    