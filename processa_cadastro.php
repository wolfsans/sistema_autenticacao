<?php
require 'classes/Usuario.php';
require 'classes/Autenticador.php';

$autenticador = new Autenticador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    $usuario = new Usuario($nome, $email, $senha);
    $autenticador->registrar($usuario);

    header('Location: login.php');
    exit;
}
?>