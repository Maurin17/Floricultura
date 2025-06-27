<?php

    require "models/modelos.php";
    session_start();

    if (!isset($_SESSION['usuario'])){
        header("Location: login.php");
    }

    if (!isset($_GET["id"])) {
        header("Location: carrinho.php");
    }

    $usuario_id = $_SESSION['usuario']['id'];
    $flor_id = $_GET["id"];

    Carrinho::delete_item($usuario_id, $flor_id);
    header("Location: carrinho.php")

?>