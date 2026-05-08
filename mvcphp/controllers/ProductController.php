<?php
require_once __DIR__ . '/../models/ProductModel.php';
class ProductController {
    private $model;

    public function __construct() {
        $this->model = new ProductModel();
    }

    public function index() {
        $products = $this->model->getAllProducts();
        include __DIR__ . '/../views/product_list.php';
    }

    public function create() {
        include __DIR__ . '/../views/product_form.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $this->model->addProduct($name, $price);
            header("Location: index.php");
        }
    }

    public function edit($id) {
        $product = $this->model->getProductById($id);
        include __DIR__ . '/../views/product_form.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $this->model->updateProduct($id, $name, $price);
            header("Location: index.php");
        }
    }

    public function delete($id) {
        $this->model->deleteProduct($id);
        header("Location: index.php");
    }
}
?>