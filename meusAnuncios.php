<?php 
    include_once("header.php"); 
    include_once("dao/AnuncioDAO.php");
?>

<div class="container">

    <h2 class="text-center mb-3">Seus anúncios</h2>

    <div class="card-group">

        <?php
            $anuncioDAO = new AnuncioDAO();
            $anuncios = $anuncioDAO->listarAnuncios($id_usuario);
            
            if (count($anuncios) == 0) {
        ?>
            <div class="alert alert-info container-fluid text-center" role="alert">
                Você não possui anúncios cadastrados!
            </div>
        <?php                
            }
            foreach ($anuncios as $anuncio) {
        ?>

            <div class="col-md-4">
                    <div class="card border-dark mb-3">
                        <div class="card-header text-center"><?=strtoupper($anuncio->estado)?></div>
                            <div class="card-body text-dark">
                                <h4 class="card-title border-bottom"><a href="detalhesAnuncio.php?id=<?=$anuncio->id_anuncio?>" class="alert-link text-dark"><?=$anuncio->titulo?></a></h4>
                                <h5>&#36;<?=$anuncio->preco?></h5> 
                            </div>
                            <div class="card-footer">
                                    <form action="deletarAnuncio.php" method="POST">
                                        <input type="hidden" name="id_anuncio" value="<?=$anuncio->id_anuncio?>">
                                        <button type="submit" class="btn btn-block btn-outline-danger btn-sm">Apagar Anúncio</button>
                                    </form>      
                            </div>                        
                    </div>
                </div>

        <?php
            }
        ?>

    </div>

</div>

<?php include_once("footer.php"); ?>