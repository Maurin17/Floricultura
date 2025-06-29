<?php
require 'models/modelos.php';
session_start();

$valorTotal = 0;

if (!isset($_SESSION['usuario'])) {
    header('location: login.php');
    exit();
}

foreach (Carrinho::get_all($_SESSION['usuario']['id']) as $item) {
    $valorTotal += Flor::get($item['flor_id'])['valor'] * $item['quantidade'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Carrinho::delete_all($_SESSION['usuario']['id']);
}

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
            <?php if ($flores = Carrinho::get_all($_SESSION['usuario']['id'])): ?>
                <?php foreach ($flores as $carrinho): ?>
                    <?php $flor = Flor::get($carrinho['flor_id']) ?>
                    <div class="carrinho-flor">
                        <div class="imagem-carrinho">
                            <img src="<?= $flor['imagem'] ?>" alt="<?= $flor['nome'] ?> imagem">
                        </div>
                        <div class="flor-info">
                            <h1><?= $flor['nome'] ?></h1>
                            <p><?= $flor['descricao'] ?></p>
                        </div>
                        <div class="flor-valor">
                            <p>QT: <?= $carrinho['quantidade'] ?></p>
                            <h1>R$: <?= $flor['valor'] * $carrinho['quantidade'] ?></h1>
                        </div>

                        <div class="botao-deletar">
                            <form action="deletarCarrinho.php" method="GET">
                                <input type="hidden" name="id" value="<?= $carrinho['flor_id'] ?>">
                                <button type="submit" value="DELETAR">DELETAR</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
                <form action="" method="POST" onsubmit="return confirm('Confirma essa compra? R$ <?= $valorTotal ?>?')">
                    <div class="botao-comprar">
                        <button type="submit" name="comprar">COMPRAR</button>
                    </div>
                </form>
            <?php else: ?>
                <div class="carrinho-vazio">
                    <h2>Seu carrinho está vazio</h2>
                    <a href="catalogo.php"><button>CATALOGO</button></a>
                </div>
            <?php endif; ?>

        </div>
    </main>

    <body>

</html>