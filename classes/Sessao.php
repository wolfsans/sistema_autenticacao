<?php
class Sessao {
    public static function iniciar() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($chave, $valor) {
        $_SESSION[$chave] = $valor;
    }

    public static function get($chave) {
        return isset($_SESSION[$chave]) ? $_SESSION[$chave] : null;
    }

    public static function destruir() {
        session_destroy();
    }
}