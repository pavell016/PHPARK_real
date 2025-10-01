<?php

session_start(); // important abans de qualsevol sortida

require_once __DIR__ . '/FormValidator.php';
use App\FormValidator;

$errors = [];
$old = ['username' => '', 'email' => '', 'gender' => '', 'interests' => []];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new FormValidator($_POST);

    if ($validator->validate()) {
        // Guardar a BBDD
        // Missatge flash
        $_SESSION['flash_success'] = "Registration OK. Welcome, " . $validator->old()['username'] . "!";

        // PRG (POST-Redirect-GET) → redirigim a evitar reenvio del formulari
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $errors = $validator->errors();
        $old = $validator->old();
    }
}

// Recuperem missatge flash (si n’hi ha) i l’esborrem
if (isset($_SESSION['flash_success'])) {
    $success = $_SESSION['flash_success'];
    unset($_SESSION['flash_success']);
}
