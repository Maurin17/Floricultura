<?php
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
            <?php foreach (Carrinho::get_all($_SESSION['usuario']['id']) as $carrinho): ?>
                <?php $flor = Flor::get($carrinho['flor_id']) ?>
                <div class="carrinho-flor">
                    <div class="imagem-carrinho">
                        <img src="<?= $flor['imagem'] ?>" alt="<?= $flor['nome'] . "imagem" ?>">
                    </div>
                    <div class="flor-info">
                        <h1><?= $flor['nome'] ?></h1>
                        <p><?= $flor['descricao'] ?></p>
                    </div>
                    <div class="flor-valor">
                        <p>QT: <?= $carrinho['quantidade'] ?></p>
                        <h1>R$: <?= $flor['valor']*$carrinho['quantidade'] ?></h1>
                    </div>

                    <div class="botao-deletar">
                        <a href="deletarItem.php?id=<?= $carrinho['flor_id']?>"><button type="button">DELETAR</button></a>
                    </div>
                </div>
                <?php endforeach; ?>

                
                <form action="" method="POST">
                    <div class="botao-comprar">
                        <button type="submit" name="comprar">COMPRAR</button>
                    </div>
                </form>
        </div>
    </main>

    <body>

</html>