<?php 
    require 'models/modelos.php';
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('location: login.php');
        exit();
    } elseif (!$_SESSION['usuario']['is_admin']) {
        header('location: index.php');
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floricultura</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "header.php" ?>

    <main>
        <div class="carrinho">
            <?php foreach (Flor::get_all() as $flor): ?>
                <div class="admin-painel-flor">
                    <img src="<?= $flor['imagem'] ?>" alt="<?= $flor['nome'] ?>Imagem">
                    <div class="admin-painel-flor-info">
                        <div class="admin-painel-flor-header">
                            <h1><?= $flor['nome'] ?></h1>
                            <h2>R$ <?= $flor['valor'] ?></h2>
                        </div>
                        <div class="admin-painel-flor-content">
                            <p><?= $flor['descricao'] ?></p>
                        </div>
                    </div>
                    <div>
                        <button type="button">Edit</button>
                    </div>
                    <div>
                        <a href="deletarCatalogo.php?id=<?= $flor['id'] ?>"><button type="button">Delete</button></a>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="admin-painel-adicionar">
                <a href="adicionarCatalogo.php"><button type="button">Adicionar</button></a>
            </div>
        </div>
    </main>
</body>

</html>