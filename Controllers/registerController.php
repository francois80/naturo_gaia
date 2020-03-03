<?php

require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/User.php';

$errors = [];
$nameRegex = '/\w+/';
$passwordRegex = '/^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])?[\w!@#$%^&*]{8,}$/';

if(isset($_POST['checkmail'])){
     $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        $user = new User();
        $user->email = $email;
        if($user->checkEmail()){
            exit('notOk');
        }
        exit('ok');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isSubmit = true;
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
    if (empty($firstname) || !preg_match($nameRegex, $firstname)) {
        $errors['firstname'] = 'Le prénom est invalide !';
    }
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));
    if (empty($lastname) || !preg_match($nameRegex, $lastname)) {
        $errors['lastname'] = 'Le nom est invalide !';
    }
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    if (empty($email) || !filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Le mail est invalide !';
    }

    $password = trim($_POST['password']);
    if (empty($password) || !preg_match($passwordRegex, $password)) {
        $errors['password'] = 'Le mot de passe doit comporter au moins 8 caractères !';
    }
    $password_confirmation = trim($_POST['password_confirmation']);
    if (empty($password) || $password != $password_confirmation) {
        $errors['password_confirmation'] = 'Les mots de passe sont differents !';
    }
    if (!isset($_POST['terms'])) {
        $errors['terms'] = 'Veuillez accepter les conditions d\'utilisation !';
    }

    if (count($errors) == 0) {
        $user = new User($firstname, $lastname, $email, password_hash($password, PASSWORD_BCRYPT));

        try {
            $user->create();
        } catch (PDOException $ex) {
            echo 'La création du compte a échouée !' . $ex->getMessage();
            die();
        }
    }
}

require_once ROOT . '/Views/register.php';
