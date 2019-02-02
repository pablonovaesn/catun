<?php

require_once("classes/Anuncio.php");
require_once("factory/Conexao.php");

class AnuncioDAO {

    function criarAnuncio($titulo, $descricao, $preco, $id_usuario, $estado){
        //Acessar BD
        $conFactory = new Conexao();
        $conexao = $conFactory->getConexao();

        //Query
        $query  =   "insert into anuncios (titulo, descricao, preco, id_usuario, estado) ";
        $query .=   "values ('$titulo', '$descricao', '$preco', '$id_usuario', '$estado')";

        //Executar query
        $resultado  = mysqli_query($conexao, $query);
        $erro       = mysqli_error($conexao);
        $conexao->close();

        return [$resultado, $erro];
    }

    function deletarAnuncio($id_anuncio){
        //Acessar BD
        $conFactory = new Conexao();
        $conexao = $conFactory->getConexao();

        //Query
        $query  =   "DELETE FROM anuncios ";
        $query .=   "WHERE id_anuncio = '$id_anuncio'";

        //executar query
        $resultado = mysqli_query($conexao, $query);

        return $resultado;
    }

    function listarAnuncios($id = null) {
        //Acessar BD
        $conFactory = new Conexao();
        $conexao = $conFactory->getConexao();

        //query
        $query = "SELECT a.id_anuncio, a.titulo, a.descricao, a.preco, a. estado, u.nome AS anunciante ";
        $query.= "FROM anuncios AS a INNER JOIN usuarios AS u ";
        $query.= "ON a.id_usuario = u.id_usuario";

        if ($id != null) {
            $query.= " WHERE a.id_usuario = '$id'";
        }

        $resultado = mysqli_query($conexao, $query);

        $anuncios = array();

        while($linha = mysqli_fetch_assoc($resultado)) {

            $id_anuncio =   $linha["id_anuncio"];
            $titulo =       $linha["titulo"];
            $estado =       $linha["estado"];
            $descricao =    $linha["descricao"];
            $preco =        $linha["preco"];
            $anunciante =   $linha["anunciante"];

            $anuncio = new Anuncio($id_anuncio, $anunciante, $estado, $titulo, $preco, $descricao);

            array_push($anuncios, $anuncio);

        }
        $conexao->close();

        return $anuncios;
    }

    function listarAnuncio($id) {
        //Acessar BD
        $conFactory = new Conexao();
        $conexao = $conFactory->getConexao();

        //query
        $query = "SELECT a.id_anuncio, a.titulo, a.descricao, a.preco, a. estado, u.nome AS anunciante ";
        $query.= "FROM anuncios AS a INNER JOIN usuarios AS u ";
        $query.= "ON a.id_usuario = u.id_usuario ";
        $query.= "WHERE a.id_anuncio = '$id' LIMIT 1";
        //$query = "SELECT * FROM anuncios WHERE id_anuncio = '$id' LIMIT 1";

        //executar query
        $resultado = mysqli_query($conexao, $query);

        $linha = mysqli_fetch_assoc($resultado);
        $id_anuncio = $linha["id_anuncio"];
        $anunciante = $linha["anunciante"];
        $titulo = $linha["titulo"];
        $preco = $linha["preco"];
        $descricao = $linha["descricao"];
        $estado = $linha["estado"];

        $anuncio = new Anuncio($id_anuncio, $anunciante, $estado, $titulo, $preco, $descricao);

        $conexao->close();

        return $anuncio;
    }

}

?>