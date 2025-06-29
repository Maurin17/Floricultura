<header>
    <a id="logo" href="index.php"><img src="img/logo.svg" alt="tulipa"></a>
    <nav>
        <ul class="MenuLista">
            <li><a href="index.php">Home</a></li>
            <li><a href="catalogo.php">Catalogo</a></li>
            <li><a href="sobre.php">Sobre</a></li>
            <li><a href="contato.php">Contato</a></li>
            <?php if (isset($_SESSION['usuario'])): ?>
                <?php if ($_SESSION['usuario']['is_admin']): ?>
                    <a class="nav-user" href="admin.php"><button>Painel</button></a>
                <?php endif; ?>
                <a class="nav-user" href="carrinho.php"><button>Carrinho</button></a>
                <a class="nav-user" href="perfil.php"><button>Conta</button></a>
            <?php else: ?>
                <a href="login.php"><button>Entrar</button></a>
            <?php endif; ?>
        </ul>
    </nav>
</header>