<?php

include_once("factory/Conexao.php");

class CurtidaDAO {

    function criarCurtida($id_usuario, $id_anuncio) {
        //acessar o BD
        $conFactory = new Conexao();
        $conexao = $conFactory->getConexao();

        //query
        $query = "INSERT INTO curtidas (id_usuario, id_anuncio) ";
        $query.= "VALUES ('$id_usuario', '$id_anuncio')";

        //executar query
        $resultado = mysqli_query($conexao, $query);

        return $resultado;
    }

    function checarCurtida($id_usuario, $id_anuncio) {
        //acessar o BD
        $conFactory = new Conexao();
        $conexao = $conFactory->getConexao();

        //query
        $query = "SELECT * FROM curtidas ";
        $query.= "WHERE id_usuario = '$id_usuario' && id_anuncio = '$id_anuncio'";

        //executar query
        $resultado = mysqli_query($conexao, $query);

        $rowcount = mysqli_num_rows($resultado);

        if ($rowcount > 0) {
            return true;
        }else{
            return false;
        }
    }

    function removerCurtida($id_usuario, $id_anuncio) {
        //acessar o BD
        $conFactory = new Conexao();
        $conexao = $conFactory->getConexao();

        //query
        $query = "DELETE FROM curtidas ";
        $query.= "WHERE id_usuario = '$id_usuario' && id_anuncio = '$id_anuncio'";

        //executar query
        $resultado = mysqli_query($conexao, $query);

        return $resultado;
    }

}