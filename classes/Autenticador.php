<?php

require 'db.php';
require 'classes/Usuario.php';


class Autenticador {
    public function registrar(Usuario $usuario) {
        global $pdo; // Use a conexão PDO

        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->execute([$usuario->getNome(), $usuario->getEmail(), $usuario->getSenha()]);
    }

    public function login($email, $senha) {
        global $pdo; // Use a conexão PDO

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return new Usuario($usuario['nome'], $usuario['email'], $usuario['senha']);
        }
        return null;
    }
}