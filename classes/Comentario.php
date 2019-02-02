<?php

    class Comentario {
        public $id_comentario;
        public $usuario;
        public $msg;        
        public $data;        
        //public $id_anuncio;

        function Comentario($id_comentario, $usuario, $msg, $data){

            $this->id_comentario = $id_comentario;
            $this->usuario = $usuario;
            $this->msg = $msg;
            $this->data = $data;
        }

    }

?>