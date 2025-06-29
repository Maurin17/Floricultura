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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Flor::delete($_POST['id']);
    header('location: admin.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

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
                    <img src="<?= htmlspecialchars($flor['imagem']) ?>" alt="<?= htmlspecialchars($flor['nome']) ?>Imagem">
                    <div class="admin-painel-flor-info">
                        <div class="admin-painel-flor-header">
                            <h1><?= htmlspecialchars($flor['nome']) ?></h1>
                            <h2>R$ <?= htmlspecialchars($flor['valor']) ?></h2>
                        </div>
                        <div class="admin-painel-flor-content">
                            <p><?= htmlspecialchars($flor['descricao']) ?></p>
                        </div>
                    </div>
                    <form action="editarCatalogo.php" method="GET">
                        <input type="hidden" name="id" value="<?= $flor['id'] ?>">
                        <button type="submit">Editar</button>
                    </form>
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir o item <?= $flor['nome'] ?>?')">
                        <input type="hidden" name="id" value="<?= $flor['id'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                </div>
            <?php endforeach; ?>
            <div class="admin-painel-adicionar">
                <a href="adicionarCatalogo.php"><button type="button">Adicionar</button></a>
            </div>
        </div>
    </main>
</body>

</html>