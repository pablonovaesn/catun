<?php

class Anuncio{

    public $id_anuncio;
    public $anunciante;
    public $estado;
    public $titulo;
    public $preco;
    public $descricao;

    function Anuncio($id_anuncio, $anunciante, $estado, $titulo, $preco, $descricao) {
        $this->id_anuncio = $id_anuncio;
        $this->anunciante = $anunciante;
        $this->estado = $estado;
        $this->titulo = $titulo;
        $this->preco = $preco;
        $this->descricao = $descricao;
    }

}

?>