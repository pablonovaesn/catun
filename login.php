<?php include("header.php"); ?>

        <div class="container">

            <div class="row justify-content-center mb-3">
                <h1 class="display-4">Entrar</h1>
            </div>

            <div class="row justify-content-center">
                <form action="autenticar.php" method="POST" class="col-md-6">
                    <small id="passwordHelpInline" class="form-text text-muted text-center mb-2">
                        Preencha corretamente os dados.
                    </small>

                    <?php
                    if (isset($_GET["login"]) && $_GET["login"] == "false") { 
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Usuário e/ou senha inválido(s)!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>  
                    <?php } ?>   

                    <div class="form-group">                    
                        <label for="email">E-mail:</label>
                        <input required name="email" type="email" class="form-control" id="email" placeholder="Digite seu e-mail...">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input required name="senha" type="password" class="form-control" id="senha" placeholder="Digite sua senha...">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>

        </div>
        
<?php include("footer.php") ?>