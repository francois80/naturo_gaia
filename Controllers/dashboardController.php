<?php
// protection de la page par la session auth
if(!isset($_SESSION['auth']['login'])){
    header('Location:login.php');
    exit();
}

require_once ROOT . '/Views/dashboard.php';