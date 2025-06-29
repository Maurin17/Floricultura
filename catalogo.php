<?php
require 'models/modelos.php';

session_start();


if (isset($_GET["id"]) && is_numeric($_GET['id'])) {

    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
    }

    $get_id = $_SESSION['usuario'];

    $flor_id = $_GET["id"];
    $usuario_id = $get_id['id'];
    Carrinho::add($usuario_id, $flor_id);
    header("Location: catalogo.php");
    exit();
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
        <div id="titulo">
            <h1>Catálogo</h1>
        </div>
        <div class="catalogo">
            <?php foreach (Flor::get_all() as $flor): ?>
                <div class="flores">
                    <img src="<?= $flor['imagem'] ?>">
                    <h1><?= $flor['nome'] ?></h1>
                    <span> <?= "R$ " . $flor['valor'] ?> </span>
                    <button onclick='openModal(<?= json_encode($flor); ?>)'>Saiba mais</button>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <div id="knowMore">
        <div class="modal">
            <div id="modal-img">

            </div>
            <div class="modal-info">
                <button id="modal-close-button" type="button">X</button>
                <h1 id="modal-titulo"></h1>
                <p id="modal-descricao"></p>
                <h2 id="modal-preco"></h2>

                <button id="modal-addshop-button" type="button">Adicionar ao carrinho</button>
            </div>
        </div>
    </div>

    <script src="js/shopUtils.js"></script>
</body>

</html>