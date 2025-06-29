<?php
require 'models/modelos.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header('location: login.php');
    exit();
}

$valorTotal = 0;
foreach (Carrinho::get_all($_SESSION['usuario']['id']) as $item) {
    $valorTotal += Flor::get($item['flor_id'])['valor'] * $item['quantidade'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['action']) {
        case 'deletar':
            $usuario_id = $_SESSION['usuario']['id'];
            $flor_id = $_POST["id"];

            Carrinho::delete_item($usuario_id, $flor_id);
            break;

        case 'comprar':
            Carrinho::delete_all($_SESSION['usuario']['id']);
            break;

        default:
            header("Location: carrinho.php");
            exit();
            break;
    }
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
                            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" onsubmit="return confirm('Deseja tirar <?= $flor['nome'] ?> do carrinho?')">
                                <input type="hidden" name="id" value="<?= $carrinho['flor_id'] ?>">
                                <button type="submit" name="action" value="deletar">DELETAR</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" onsubmit="return confirm('Confirma essa compra? R$ <?= $valorTotal ?>?')">
                    <div class="botao-comprar">
                        <button type="submit" name="action" value="comprar">COMPRAR</button>
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