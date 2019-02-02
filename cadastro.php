<?php include("header.php"); ?>

        <div class="container">

            <div class="row justify-content-center mb-3">
                <h1 class="display-4">Cadastre-se</h1>
            </div>

            <div class="row justify-content-center">
                <form class="col-md-6" method="POST" action="cadastrar.php">

                    <?php 
                    if (isset($_GET["cadastro"]) && $_GET["cadastro"] == "true") { 
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Usuário cadastrado com sucesso!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    }                        
                    ?>

                    <div class="form-group">
                        <label for="nome">Nome: <span class="text-danger">*</span></label>
                        <input required name="nome" type="text" class="form-control" id="nome" placeholder="Digite seu nome...">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail: <span class="text-danger">*</span></label>
                        <input required name="email" type="email" class="form-control" id="email" placeholder="Digite seu e-mail...">
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha: <span class="text-danger">*</span></label>
                        <input required name="senha" type="password" class="form-control" id="senha" placeholder="Digite sua senha...">
                        <small id="passwordHelpBlock" class="form-text text-muted text-right">
                            <span class="text-danger">*</span> Campos obrigatórios.
                        </small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>

        </div>
        
<?php include("footer.php") ?>