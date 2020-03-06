<?php
require_once ROOT . '/Utils/Database.php';
require_once ROOT . '/Models/User.php';

$errors = [];
$nameRegex = '/\w+/';
$TelRegex = "/^[0-9]{2}(\.[0-9]{2}){4}$/";
$AgeRegex = "/^[0-9]{1,2}$";
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
    //vérif nom
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));
    if (empty($lastname) || !preg_match($nameRegex, $lastname)) {
        $errors['lastname'] = 'Le nom est invalide !';
    }
    //vérif prénom
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
    if (empty($firstname) || !preg_match($nameRegex, $firstname)) {
        $errors['firstname'] = 'Le prénom est invalide !';
    }
    //vérif âge
   $age = trim(filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT));
    if (empty($age) || !preg_match($AgeRegex, $age)) {
        $errors['age'] = 'L\'âge est invalide !';
    }
    ////vérif téléphone
    $phone = trim(htmlspecialchars($_POST['phone']));
    if (empty(phone) || !preg_match($TelRegex, $phone)) {
        $errors['phone'] = 'Le téléphone est invalide !';
    }
    //vérif email
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    if (empty($email) || !filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Le mail est invalide !';
    }
    //vérif question
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));
    if (empty($message) || !preg_match($nameRegex, $message)) {
        $errors['message'] = 'La réponse à la question n\'est pas valide!';
    }
   
//    if (count($errors) == 0) {
//        $user = new User($firstname, $lastname, $email);
//
//        try {
//            $user->create();
//        } catch (PDOException $ex) {
//            echo 'La création du compte a échouée !' . $ex->getMessage();
//            die();
//        }
//    }
}
require_once ROOT . '/Views/contact.php';