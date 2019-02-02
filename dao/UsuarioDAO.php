<?php

require_once("factory/Conexao.php");

class UsuarioDAO {

    function cadastrarUsuario($nome, $email, $senha) {

        $senhaMD5 = MD5($senha);

        //acessar o BD
        $conFactory = new Conexao();
        $conexao = $conFactory->getConexao();

        //query cadastro
        $query =    "INSERT INTO usuarios (nome, email, senha) ";
        $query.=    "VALUES ('$nome', '$email', '$senhaMD5')";

        //executar query
        $resultado = mysqli_query($conexao, $query);

        return $resultado;

    }

    function buscarUsuario($email, $senha){

        $senhaMD5 = MD5($senha);

        //acessar o BD
        $conFactory = new Conexao();
        $conexao = $conFactory->getConexao();

        //listar as postagens do BD
        $query =    "SELECT * FROM usuarios ";
        $query .=   "WHERE email = '$email' AND senha = '$senhaMD5'";

        $resultado = mysqli_query($conexao, $query);

        $linha = mysqli_fetch_assoc($resultado); 
        
        return $linha;
            

    }

}