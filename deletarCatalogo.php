<?php
require 'models/modelos.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header('location: login.php');
} elseif (!$_SESSION['usuario']['is_admin']) {
    header('location: index.php');
    exit();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: admin.php');
}

Flor::delete($_GET['id']);
header('location: admin.php');
exit();
