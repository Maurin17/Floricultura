<?php
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
        <section class="banner">
            <div id="titulo-banner">
                <h1>Elegância, afeto e sofisticação em cada detalhe.</h1>
                <p>Flores que traduzem sentimentos e tornam momentos inesquecíveis.</p>
            </div>
            <div class="static-img banner-img">

            </div>
        </section>

        <section class="menu-options">
            <a href="catalogo.php" class="option">
                <img src="img\catalogo.svg" alt="image">
                <h1>Catalogo</h1>
                <p>Venha conhecer nossos produtos</p>
            </a>
            <a href="sobre.php" class="option">
                <img src="img\sobre.svg" alt="image">
                <h1>Sobre</h1>
                <p>Descubra quem somos</p>
            </a>
            <a href="contato.php" class="option">
                <img src="img\contato.svg" alt="image">
                <h1>Contato</h1>
                <p>Fale com a gente</p>
            </a>
        </section>
    </main>
</body>

</html>