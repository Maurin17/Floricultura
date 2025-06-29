<?php
require 'models/modelos.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
    exit();
}

$usuario = Usuario::get($_SESSION['usuario']['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['action']) {
        case 'Atualizar':
            $id = $_SESSION['usuario']['id'];
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

            Usuario::update($id, $nome, $sobrenome, $email, $telefone);
            header('location: perfil.php');
            exit();
            break;

        case 'Excluir':
            Usuario::delete($_SESSION['usuario']['id']);
            header('location: logout.php');
            exit();
            break;

        default:
            header('location: perfil.php');
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

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php require "header.php" ?>

    <main>
        <div id="titulo">
            <h1>Minha conta</h1>
        </div>
        <div class="flor-form">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <div class="input-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite o nome da flor" value="<?= $usuario['nome'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" id="sobrenome" name="sobrenome" placeholder="Digite o sobrenome da flor" value="<?= $usuario['sobrenome'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Digite o email da flor" value="<?= $usuario['email'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" placeholder="Digite o telefone da flor" value="<?= $usuario['telefone'] ?>" required>
                </div>
                <div class="input-group">
                    <input type="submit" class="submit-button" name="action" value="Atualizar">
                </div>
            </form>
            <div class="input-group">
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                    <input type="submit" class="submit-button" name="action" value="Excluir">
                </form>
            </div>
            <div class="input-group">
                <a href="logout.php"><input type="button" class="submit-button" value="Sair"></a>
            </div>
        </div>
    </main>

    <script src="js/formUtils.js"></script>
</body>

</html>