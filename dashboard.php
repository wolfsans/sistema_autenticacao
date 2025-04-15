<?php
require 'classes/Sessao.php';

function verificarAutenticacao() {
    if (!Sessao::get('usuario')) {
        header('Location: login.php');
        exit;
    }
}
verificarAutenticacao();


Sessao::iniciar();

$usuarioNome = Sessao::get('usuario');
$emailCookie = $_COOKIE['email'] ?? null;

if (!$usuarioNome) {
    header('Location: login.php');
    exit;
}
?>
<h1>Bem-vindo, <?php echo htmlspecialchars($usuarioNome); ?>!</h1>
<?php if ($emailCookie): ?>
    <p>Seu e-mail salvo: <?php echo htmlspecialchars($emailCookie); ?></p>
<?php endif; ?>

<a href="logout.php">Logout</a>

