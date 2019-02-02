<?php include_once("header.php"); ?>

        <div class="container">

        <?php
        if (isset($_GET["login"]) && $_GET["login"] == "true") {             
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Login feito com sucesso!                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>  
        <?php } ?>          
            
            <div class="card-group">

                <?php     
                    include_once("dao/AnuncioDAO.php");  
                    include_once("dao/CurtidaDAO.php");

                    $anuncioDAO = new AnuncioDAO();
                    $curtidaDAO = new CurtidaDAO();

                    $anuncios = $anuncioDAO->listarAnuncios();

                    foreach ($anuncios as $anuncio) {

                        
                ?>                

                <div class="col-md-4">
                    <div class="card border-dark mb-3">
                        <div class="card-header text-center"><?=strtoupper($anuncio->estado)?></div>
                            <div class="card-body text-dark">
                                <h4 class="card-title border-bottom"><a href="detalhesAnuncio.php?id=<?=$anuncio->id_anuncio?>" class="alert-link text-dark"><?=$anuncio->titulo?></a></h4>
                                <h5>&#36;<?=$anuncio->preco?></h5>
                                
                                <h6 class="text-right"><?=$anuncio->anunciante?></h6>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                <?php
                                    if ($logado) {
                                        $curtiu = $curtidaDAO->checarCurtida($id_usuario, $anuncio->id_anuncio);
                                    
                                        if (!$curtiu) {                                        
                                ?>
                                <div class="col">
                                    <form action="curtir.php" method="POST">
                                        <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">
                                        <input type="hidden" name="id_anuncio" value="<?=$anuncio->id_anuncio?>">
                                        <button type="submit" class="btn btn-block btn-outline-success btn-sm">Curtir</button>
                                    </form>                                    
                                </div> 
                                <?php
                                        }else {
                                ?>
                                <div class="col">
                                    <form action="descurtir.php" method="POST">
                                        <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">
                                        <input type="hidden" name="id_anuncio" value="<?=$anuncio->id_anuncio?>">
                                        <button type="submit" class="btn btn-block btn-outline-danger btn-sm">Descurtir</button>
                                    </form>                                    
                                </div> 
                                <?php
                                        }
                                    }
                                ?>
                                <div class="col">
                                    <a href="detalhesAnuncio.php?id=<?=$anuncio->id_anuncio?>" class="btn btn-block btn-outline-dark btn-sm">Comentar</a>
                                </div>                            
                                </div>
                            </div>
                        
                    </div>
                </div>

                <?php                       
                    }
                ?>               
            
            </div>  

        </div>
        
<?php include("footer.php") ?>
        