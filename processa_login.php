<?php
require 'classes/Autenticador.php';
require 'classes/Sessao.php';


Sessao::iniciar();

$autenticador = new Autenticador();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    $lembrar = isset($_POST['lembrar']);

    
    $usuario = $autenticador->login($email, $senha);
    if ($usuario) {
        
        Sessao::set('usuario', $usuario);

        
        if ($lembrar) {
            setcookie('email', $usuario->getEmail(), time() + (86400 * 30), "/"); // 30 dias
        }

        header('Location: area_restrita.php');
        exit();
    } else {
        echo "Credenciais inválidas.";
    }
}
?>