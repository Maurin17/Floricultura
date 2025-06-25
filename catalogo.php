<!DOCTYPE html>
<html>

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
            
        </div>
    </main>

    <div id="knowMore">
        <div class="modal">
            <div id="modal-img">
                
            </div>
            <div class="modal-info">
                <button id="modal-button" type="button">X</button>
                <h1 id="modal-titulo"></h1>
                <p id="modal-descricao"></p>
                <h2 id="modal-preco"></h2>
            </div>
        </div>
    </div>
    
    <script src="js/shopUtils.js"></script>
</body>

</html>