<?php 
include("header.php");

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    die();
}else{
    $id_usuario = $_SESSION["usuario_id"];
}
?>

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8">                
                    <form method="POST" action="criarAnuncio.php">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="titulo">Título</label>
                                <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Título do Anúncio" required>
                            </div>                
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                            <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="custom-select" required>
                                    <option value="">Escolha...</option>
                                    <option value="novo">Novo</option>
                                    <option value="usado">Usado</option>
                                </select>                    
                            </div>
                            <div class="form-group col-md-4">
                                <label for="preco">Preço</label>
                                <input name="preco" type="text" class="form-control" id="preco" placeholder="Preço" required>
                            </div>
                        </div>            
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" required class="form-control" id="descricao" rows="5" placeholder="Insira os detalhes do anúncio."></textarea>
                        </div>
                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

                        <button type="submit" class="btn btn-block btn-primary">Anunciar</button>
                    </form>
                </div>
            </div>
        </div>
        
<?php include_once("footer.php") ?>