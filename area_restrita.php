<?php
require 'classes/Usuario.php';

session_start(); 

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}


$usuario = $_SESSION['usuario']; 

?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Restrita</title>
</head>
<body>
    <h1>Bem-vindo à Área Restrita!</h1>
    <p>Olá, <?php echo htmlspecialchars($usuario->getNome()); ?>! Você está logado.</p>

    <form action="logout.php" method="post">
        <button type="submit">Sair</button>
    </form>
</body>
</html>