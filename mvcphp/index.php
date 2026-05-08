<?php
session_start();

require_once 'routes.php';
require_once 'middleware/AuthMiddleware.php';

// INIT CONTROLLER
require_once 'controllers/ProductController.php';
require_once 'controllers/UserController.php';

$productController = new ProductController();
$userController = new UserController();

$action = $_GET['action'] ?? 'home';

switch ($action) {

    // ===== AUTH =====
    case 'login':
        require_once 'controllers/AuthController.php';
        (new AuthController())->login();
        break;

    case 'login_process':
        require_once 'controllers/AuthController.php';
        (new AuthController())->process();
        break;

    case 'logout':
        require_once 'controllers/AuthController.php';
        (new AuthController())->logout();
        break;

    // ===== PROTECTED =====
    case 'home':
        AuthMiddleware::check();
        require_once 'views/home.php';
        break;

    case 'index': // produk
        AuthMiddleware::check();
        $productController->index();
        break;

    case 'user_index':
        AuthMiddleware::check();
        $userController->index();
        break;

    // ===== DEFAULT =====
    default:
        $_SESSION['error'] = "Halaman tidak ditemukan";
        header("Location: index.php?action=home");
        exit;
}