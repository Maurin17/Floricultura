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
    $nome = $_POST['nome'];
    $valor = floatval($_POST['valor']);
    $descricao = $_POST['descricao'];
    $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
    $tipo = $_FILES['imagem']['type'];

    Flor::create($nome, $valor, $descricao, $imagem, $tipo);
    header('location: admin.php');
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
        <div class="flor-form">
            <form id="flr-form" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite o nome da flor" required>
                </div>
                <div class="input-group">
                    <label for="valor">Valor</label>
                    <input type="number" step="0.01" name="valor" placeholder="Digite o valor da flor" required>
                </div>
                <div class="input-group">
                    <label for="descricao">Descrição</label>
                    <textarea form="flr-form" name="descricao" id="descricao" placeholder="Digite a descrição da flor" rows="4" maxlength="254" required></textarea>
                </div>
                <div class="input-group">
                    <label for="imagem">Selecione uma Imagem</label>
                    <input type="file" id="imagem" name="imagem" required/>
                </div>
                <div class="input-group">
                    <input type="submit" class="submit-button" value="Adicionar">
                </div>
            </form>
        </div>
    </main>
</body>

</html>