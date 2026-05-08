<?php

class AuthMiddleware {
    public static function check() {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Silakan login terlebih dahulu!";
            header("Location: index.php?action=login");
            exit;
        }
    }
}