<?php
require_once 'controllers/ProductController.php';
require_once 'controllers/UserController.php';

$productController = new ProductController();
$userController = new UserController();

$action = isset($_GET['action']) ? $_GET['action'] : 'home';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'home':
        include 'views/home.php'; // Menampilkan halaman utama dengan menu
        break;

    // Routing untuk Produk
    case 'create':
        $productController->create();
        break;
    case 'store':
        $productController->store();
        break;
    case 'edit':
        $productController->edit($id);
        break;
    case 'update':
        $productController->update($id);
        break;
    case 'delete':
        $productController->delete($id);
        break;

    // Routing untuk User
    case 'user_create':
        $userController->create();
        break;
    case 'user_store':
        $userController->store();
        break;
    case 'user_edit':
        $userController->edit($id);
        break;
    case 'user_update':
        $userController->update($id);
        break;
    case 'user_delete':
        $userController->delete($id);
        break;

    default:
        include 'views/home.php'; // Jika tidak ada action, tampilkan menu utama
        break;
}
?>