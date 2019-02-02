<?php 
    include_once("dao/AnuncioDAO.php"); 
    session_start();

    $logado = false;

    if (isset($_SESSION["usuario_nome"]) || isset($_SESSION["usuario_id"])) {
        $nome_usuario = $_SESSION["usuario_nome"];
        $id_usuario = $_SESSION["usuario_id"];

        $logado = true;
    }
?> 

<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

        <style>
            body{
                background-color:#ccc;
            }
            #linkAnuncios{
                display:inline;
                background:transparent;
                border: none;
                cursor: pointer;
            }
        </style>
        
        <title>C.A.T.U.N!</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <div class="container">            
                <a class="navbar-brand" href="index.php">C.A.T.U.N</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="menuPrincipal">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="anunciar.php">Anunciar</a>
                        </li>     
                        <?php
                            if (!$logado) {
                        ?>   
                        <li class="nav-item">
                            <a class="nav-link" href="cadastro.php">Cadastrar</a>
                        </li>     
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Entrar</a>
                        </li>
                        <?php                                
                            }
                        ?>                        

                    </ul>

                    <?php 
                        if ($logado) {                            
                    ?>
                    <ul class="navbar-nav mr-0 mr-md-0">
                        
                        <span class="navbar-text border-right border-secondary pr-2">Olá, <?=$nome_usuario?></span>
                        
                        <form action="meusAnuncios.php" method="POST" class="bg-dark">
                            <li class="nav-item">
                                <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">
                                <button type="submit" id="linkAnuncios" class="nav-link">Meus Anúncios</button>
                            </li>
                        </form>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Sair</a>
                        </li>
                        
                    </ul> 
                    <?php
                        }
                        
                    ?>          
                </div>
            </div>
        </nav>