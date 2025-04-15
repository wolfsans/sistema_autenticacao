<?php
require 'classes/Sessao.php';
Sessao::iniciar();
header('Location: login.php');
exit;
?>