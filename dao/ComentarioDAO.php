<?php

include_once("factory/Conexao.php");
include_once("classes/Comentario.php");

class ComentarioDAO {

    function criarComentario($id_anuncio, $id_usuario, $msg) {
        //Acessar BD
        $conFactory = new Conexao();
        $conexao = $conFactory->getConexao();

        //Query
        $query = "INSERT INTO comentarios (id_anuncio, id_usuario, msg) ";
        $query.= "VALUES ('$id_anuncio', '$id_usuario', '$msg')";

        //Executando query
        $resultado  = mysqli_query($conexao, $query);
        $erro       = mysqli_error($conexao);
        $conexao->close();

        return [$resultado, $erro];
    }

    function listarComentarios($id_anuncio) {
        //Acessar BD
        $conFactory = new Conexao();
        $conexao = $conFactory->getConexao();

        //Query
        $query = "SELECT c.id_comentario, c.msg, c.data, u.nome as usuario ";
        $query.= "FROM comentarios AS c INNER JOIN usuarios AS u ";
        $query.= "ON c.id_usuario = u.id_usuario ";
        $query.= "WHERE c.id_anuncio = '$id_anuncio'";

        //Executando query
        $resultado = mysqli_query($conexao, $query);

        //Criar array
        $comentarios = array();

        while ($linha = mysqli_fetch_assoc($resultado)) {
            $id_comentario = $linha["id_comentario"];
            $usuario = $linha["usuario"];
            $msg = $linha["msg"];
            $data = $linha["data"];

            //criando objeto comentario
            $comentario = new Comentario($id_comentario, $usuario, $msg, $data);

            //inserindo no array
            array_push($comentarios, $comentario);
        }

        $conexao->close();
        return $comentarios;

    }


}



?>