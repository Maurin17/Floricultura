<?php
require 'models/modelos.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header('location: login.php');
} elseif (!$_SESSION['usuario']['is_admin']) {
    header('location: index.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
        $tipo = $_FILES['imagem']['type'];

        Flor::update($id, $nome, $valor, $descricao, $imagem, $tipo);
    } else {
        Flor::update($id, $nome, $valor, $descricao);
    }
    header('location: admin.php');
    exit();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: admin.php');
    exit();
}

$flor = Flor::get($_GET['id']);
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
        <div id="titulo">
            <h1>Editar</h1>
        </div>
        <div class="flor-form">
            <form id="flr-form" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $flor['id'] ?>">
                <div class="input-group">
                    <img src="<?= $flor['imagem'] ?>" alt="">
                    <label for="imagem">Selecione uma Imagem</label>
                    <input type="file" id="imagem" name="imagem" />
                </div>
                <div class="input-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite o nome da flor" value="<?= $flor['nome'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="valor">Valor</label>
                    <input type="number" step="0.01" name="valor" placeholder="Digite o valor da flor" value="<?= $flor['valor'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="descricao">Descricao</label>
                    <textarea form="flr-form" name="descricao" id="descricao" placeholder="Digite o descricao da flor" rows="4" maxlength="254" required><?= $flor['descricao'] ?></textarea>
                </div>
                <div class="input-group">
                    <input type="submit" class="submit-button" value="Atualizar">
                </div>
            </form>
        </div>
    </main>
</body>

</html>