<?php

class Conexao {
    private $servidor = "localhost:3306";
    private $usuario = "root";
    private $senha = "";
    private $banco = "catun";

    function getConexao() {
        $connection = mysqli_connect(
            $this->servidor, 
            $this->usuario, 
            $this->senha, 
            $this->banco);

        $connection->set_charset("utf8");
        
        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . 
                $connection->connect_error);
        } 
        return $connection;
    }
}


?>