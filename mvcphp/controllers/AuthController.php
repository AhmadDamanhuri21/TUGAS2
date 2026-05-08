<?php
require_once __DIR__ . '/../models/UserModel.php';

class AuthController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    // TAMPILKAN HALAMAN LOGIN
    public function login() {
        include __DIR__ . '/../views/login.php';
    }

    // PROSES LOGIN
    public function process() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // VALIDASI KOSONG
        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Email dan password wajib diisi!";
            header("Location: index.php?action=login");
            exit;
        }

        $user = $this->model->getUserByEmail($email);

        // CEK EMAIL
        if (!$user) {
            $_SESSION['error'] = "Email tidak terdaftar!";
            header("Location: index.php?action=login");
            exit;
        }

        // CEK PASSWORD
        if (!password_verify($password, $user['password'])) {
            $_SESSION['error'] = "Password salah!";
            header("Location: index.php?action=login");
            exit;
        }

        // LOGIN BERHASIL
        $_SESSION['user'] = $user;
        header("Location: index.php");
        exit;
    }

    // LOGOUT
    public function logout() {
    session_start();

    $_SESSION = []; // kosongin semua data

    session_destroy(); // hancurin session

    session_start(); // bikin session baru khusus buat pesan
    $_SESSION['success'] = "Berhasil logout!";

    header("Location: index.php?action=login");
    exit;
    }

}