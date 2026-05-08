<?php
require_once __DIR__ . '/../models/UserModel.php';
class UserController {
    private $model;
    public function __construct() {
        $this->model = new UserModel();
    }
    public function index() {
        $users = $this->model->getAllUsers();
        include __DIR__ . '/../views/user_list.php';    
    }
    public function create () {
        include __DIR__ . '/../views/user_form.php';
    }
    public function store () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password =
            password_hash($_POST['password'],
            PASSWORD_DEFAULT);
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->model->addUser($name, $email);
            header("Location: index.php?action=user_index");
        }
    }
    public function edit ($id) {
        $user = $this->model->getUserById($id);
        include __DIR__ . '/../views/user_form.php';
    }
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->model->updateUser($id, $name, $email);
            header("Location: index.php?action=user_index");
        }
    }
    public function delete ($id) {
        $this->model->deleteUser($id);
        header("Location: index.php?action=user_index");
    }
} 
?>