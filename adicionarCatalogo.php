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
        <div class="flor-form">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                <div class="flor-form-item">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite o nome da flor" required>
                </div>
                <div class="flor-form-item">
                    <label for="valor">valor</label>
                    <input type="text" id="valor" name="valor" placeholder="Digite o valor da flor" required>
                </div>
                <div class="flor-form-item">
                    <label for="descricao">descricao</label>
                    <input type="text" id="descricao" name="descricao" placeholder="Digite o descricao da flor" required>
                </div>
                <div class="flor-form-item">
                    <label for="imagem">imagem</label>
                    <input type="file" id="imagem" name="imagem" required>
                </div>
                <input type="submit" value="enviar">
            </form>
        </div>
    </main>
</body>

</html>