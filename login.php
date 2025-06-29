<?php
require "models\modelos.php";
session_start();

$a = isset($_GET['a']) ? $_GET['a'] : '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($a === "registrar") {
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $senha = $_POST["senha"];

        Usuario::create($nome, $sobrenome, $email, $telefone, $senha);
        header("Location: ?a=entrar");
        exit();
    } else {
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);

        $user = Usuario::get(null, $email, $senha);
        if ($user) {
            $_SESSION["usuario"] = $user;
            header("Location: index.php");
            exit();
        } else {
            $erroLogin = "Email ou senha incorretos.";
        }
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
        <?php if ($a === 'registrar'): ?>
            <div id="titulo">
                <h1>Cadastre-se</h1>
            </div>
            <div class="login">
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>?a=registrar" method="POST">
                    <div class="input-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" pattern=".{2,}" title="Necessário ter 2 ou mais caracteres" placeholder="Seu Nome" required>
                    </div>
                    <div class="input-group">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" name="sobrenome" id="sobrenome" pattern=".{2,}" title="Necessário ter 2 ou mais caracteres" placeholder="Seu Sobrenome" required>
                    </div>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="Insira um email válido" placeholder="Seu Email" required>
                    </div>
                    <div class="input-group">
                        <label for="telefone">Telefone</label>
                        <input type="tel" name="telefone" id="telefone" pattern="\(\d{2}\)\s\d{4,5}-\d{4}$" title="Insira um número de telefone válido" placeholder="(xx) xxxxx-xxxx" required>
                    </div>
                    <div class="input-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$" title="Insira uma senha válida" placeholder="Sua Senha" required>
                        <div class="checklist-senha">
                            <ul class="checklist">
                                <li class="item-lista">8 caracteres</li>
                                <li class="item-lista">Número</li>
                                <li class="item-lista">Minuscula</li>
                                <li class="item-lista">Maiuscula</li>
                                <li class="item-lista">Caractere especial</li>
                            </ul>
                        </div>
                    </div>
                    <div class="input-group"><span>
                            <input type="checkbox" name="aceitar-termos" id="aceitar-termos" class="aceitar-termos" required>
                            <label for="aceitar-termos" class="label-aceitar-termos">Eu concordo com os <a href="#" class="term-service">termos de serviço</a></label>
                    </div></span>
                    <div class="input-group">
                        <input type="submit" class="submit-button" value="registrar">
                    </div>
                </form>
                <a href="?a=entrar">Entrar</a>
            </div>
        <?php else: ?>
            <div id="titulo">
                <h1>Entre</h1>
            </div>
            <div class="login">
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" title="Insira um email válido" placeholder="Seu Email" required>
                    </div>
                    <div class="input-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" title="Insira uma senha válida" placeholder="Sua Senha" required>
                    </div>
                    <div class="input-group">
                        <input type="submit" class="submit-button" value="Entrar">
                    </div>
                </form>
                <a href="?a=registrar">Registrar</a>
            </div>
    </main>
<?php endif; ?>
<script src="js\formUtils.js"></script>
</body>

</html>