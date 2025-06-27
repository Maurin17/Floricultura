<?php ; 
    require 'models/modelos.php';
    session_start();
    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floricultura</title>

    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    
    <?php require "header.php"; ?>

    <main>
        <div class="carrinho">
            <form action="" method="POST">
                <div class="catalogo">
                    <?php foreach (Carrinho::get_all($_SESSION['usuario']['id']) as $carrinho): ?>
                        <?php $flor = Flor::get($carrinho['flor_id']) ?>

                        <div class="flores">
                            <h1><?= $flor['nome'] ?></h1>
                            <h1><?= $flor['valor'] ?></h1>
                            <p><?= $flor['descricao'] ?></p>
                            <h1><?= $carrinho['quantidade'] ?></h1>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <button type="submit" name="comprar" value="comprar">COMPRAR</button>
                
            </form>
        </div>
    </main>

<body>