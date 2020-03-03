<?php
require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/User.php';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    if (empty($email) || !filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        $errors['login'] = 'Le mail est invalide !';
    }

    $password = trim($_POST['password']);
    if (count($errors) == 0) {
        $user = new User();
        $user->email = $email;
        try {
            $user->getOne();
            if (password_verify($password, $user->password)) {
                $_SESSION['auth']['login'] = true;
                $_SESSION['auth']['id'] = $user->id;
                $_SESSION['auth']['lastname'] = $user->lastname;
                header('Location:dashboard.php');
                exit();
            } else {
                $errors['login'] = 'l\'identifiant ou le mot de passe est incorrect !';
            }
        } catch (PDOException $ex) {
            $errors['login'] = 'Il y a eu un problème lors de la connexion à votre compte !';
        }
    }
}
require_once ROOT . '/Views/login.php';
