<?php

include_once("header.php");
//session_start();
include_once("dao/ComentarioDAO.php");

$id_anuncio = $_GET["id"];


$anuncioDAO = new AnuncioDAO();
$anuncio = $anuncioDAO->listarAnuncio($id_anuncio);


$comentarioDAO = new ComentarioDAO();
$comentarios = $comentarioDAO->listarComentarios($id_anuncio);

?>

<div class="container pb-5">

    <div class="card mb-4">  
        <div class="card-header text-center text-muted">
            <h3><?=strtoupper($anuncio->estado)?></h3>
        </div>
        <div class="card-body">
            <h1 class="card-title display-4"><?=$anuncio->titulo?></h1>
            <h2 class="mb-2">&#36;<?=$anuncio->preco?></h2>
                       
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><p class="p-2 mb-0"><?=$anuncio->descricao?></p></li>   
            <li class="list-group-item text-right">Anunciante: <b><?=$anuncio->anunciante?></b></li>            
        </ul>        
    </div>

    <div class="container">

        <h3>Comentários</h3>

        <?php
            foreach($comentarios as $comentario) {
        ?>
                <hr>
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title border-bottom"><?=$comentario->usuario?>:</h5>                
                <p class="card-text"><?=$comentario->msg?></p>   
                <h6 class="text-muted text-right"><?=date("d/m/Y - H:i", strtotime($comentario->data));?></h6>          
            </div>
        </div>

        <?php
            }
        ?>

    </div>
    
    <?php
    if (isset($_SESSION["usuario_id"])) {    
        $id_usuario = $_SESSION["usuario_id"];
    ?>    

    <div class="col-md-12 clear border-top border-secondary my-4 pt-2">            
            <h4>Deixe seu Comentario</h4>
    </div>           	
                                      
        <div class="col-md-12">
                    
            <div class="container-fluid">  
                                    
                <form accept-charset="UTF-8" action="criarComentario.php" method="POST">
                    <textarea class="form-control mb-2" name="msg" placeholder="Digite uma mensagem" rows="5"></textarea>

                    <input type="hidden" name="id_anuncio" value="<?=$id_anuncio?>">
                    <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">

                    <button class="btn btn-primary" type="submit">Comentar</button>
                </form>
                
            </div>
        </div>

    <?php
        }else {
    ?>

    <div class="col-md-12 clear border-top border-secondary my-4 pt-2">            
            <h3 class="text-center">Faça login para deixar seu comentario</h3>
            <div class="row justify-content-center">
            <form action="login.php" class="d-inline">
                <button class="btn btn-primary" type="submit">Fazer Login</button>
            </form>
            </div>
    </div>         

    <?php
        }
    ?>	

</div>

<?php include_once('footer.php'); ?>